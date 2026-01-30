<?php


/*
*	Utilities Model Theme Adaption Check.
*/

namespace eo\wbc\model\utilities;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('publics/eowbc_base_model_publics');

use eo\wbc\model\publics\Eowbc_Base_Model_Publics;

class Eowbc_Theme_Adaption_Check extends Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function run(){
		do_action('sp_wbc_theme_adaption_check');
	}

	public static function current_theme_key() {
		return wbc()->common->current_theme_key();
	}

	public function check($config){

		if( empty(wbc()->sanitize->get('thadc')) || wbc()->sanitize->get('thadc') != 1 ) {
			return;
		}

		$curr_theme_key = self::current_theme_key();

		$test_sec_key = wbc()->sanitize->get('test_sec_key');

		$plugin_slug = $config['plugin_slug'];
		foreach ($config['widget_sections'] as $section_key => $section) {

			if( $section_key != $test_sec_key ) {
				continue;
			}

			$current_url = wbc()->common->current_url();

			$required_types = array('mandatory','recommended');

			foreach ($required_types as $rk => $rv) {

				if( !isset($section[$rv]) ) {
					continue;
				}

				foreach ($section[$rv] as $key => $item) {

					if( $item['type'] == 'action' ) {

						self::instance()->update_result(false, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, $item, $current_url );

						add_action($item['key'], function() use($plugin_slug, $curr_theme_key, $section_key, $rv, $key, $current_url) {
			
							self::instance()->update_result(true, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, null, $current_url );

						});
					}
					elseif( $item['type'] == 'filter' ) {

						self::instance()->update_result(false, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, $item, $current_url );

						add_filter($item['key'], function() use($plugin_slug, $curr_theme_key, $section_key, $rv, $key, $current_url) {

							self::instance()->update_result(true, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, null, $current_url );

						}, $item['filter_priority_1'], $item['filter_priority_2']);
					}
					else {
						throw new \Exception("Eowbc_Theme_Adaption_Check: The provided type ".$item['type']." is not supported yet, send request to dev team for adding support for it.", 1);
						
					}

				}
			}
			
		}
	}

	public function update_result($result, $plugin_slug, $curr_theme_key, $section_key, $required_key, $key, $item, $current_url ) {

		$opt_grp = wbc()->options->get_option_group('thadcr_'.$plugin_slug,array());

		if( !isset($opt_grp[$curr_theme_key]) ) $opt_grp[$curr_theme_key] = array();
		if( !isset($opt_grp[$curr_theme_key][$section_key]) ) $opt_grp[$curr_theme_key][$section_key] = array();
		if( !isset($opt_grp[$curr_theme_key][$section_key][$required_key]) ) $opt_grp[$curr_theme_key][$section_key][$required_key] = array();

		if( !isset($opt_grp[$curr_theme_key][$section_key][$required_key][$key]) && is_array($item) )	{
			$opt_grp[$curr_theme_key][$section_key][$required_key][$key] = $item;
		}

		$opt_grp[$curr_theme_key][$section_key][$required_key][$key]['tested_on_url'] = $current_url;
		$opt_grp[$curr_theme_key][$section_key][$required_key][$key]['result'] = $result;

		wbc()->options->update_option_group('thadcr_'.$plugin_slug,$opt_grp);

	}

}
