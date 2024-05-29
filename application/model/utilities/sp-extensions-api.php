<?php
/*
 *	Utilities Model SP Extensions Api.
 */
namespace eo\wbc\model\utilities;

defined('ABSPATH') || exit;

wbc()->load->model('publics/eowbc_base_model_publics');

use eo\wbc\model\publics\Eowbc_Base_Model_Publics;

class SP_Extensions_Api extends Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function configuration_run() {
		--	shude we rename extars check hook below to somthing like extars configrtion check or configrtion check?
		do_action('sp_wbc_extras_check');
	}

	public function configuration_check($config) {

		if( empty(wbc()->sanitize->get('sp_ext_ecac')) || wbc()->sanitize->get('sp_ext_ecac') != 1 ) {
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

						self::instance()->configuration_update_result(false, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, $item, $current_url );

						add_action($item['key'], function() use($plugin_slug, $curr_theme_key, $section_key, $rv, $key, $current_url) {
			
							self::instance()->configuration_update_result(true, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, null, $current_url );

						});
					}
					elseif( $item['type'] == 'filter' ) {

						self::instance()->configuration_update_result(false, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, $item, $current_url );

						add_filter($item['key'], function() use($plugin_slug, $curr_theme_key, $section_key, $rv, $key, $current_url) {

							self::instance()->configuration_update_result(true, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, null, $current_url );

						}, $item['filter_priority_1'], $item['filter_priority_2']);
					}
					else {
						throw new \Exception("Eowbc_Extras_Check: The provided type ".$item['type']." is not supported yet, send request to dev team for adding support for it.", 1);
						
					}

				}
			}
			
		}

		$result = self::call($url --	this perameter need to be passed from the particular extensions so based on plugin slug we need to call the single tone function and hear the plugin slug is most probably single tone function name so need to retry the api url to call from the extensions config_class config_helpaer function);

		$this->configuration_update_result($result, $plugin_slug);

	}

	public function configuration_update_result($result, $plugin_slug, $curr_theme_key, $section_key, $required_key, $key, $item, $current_url) {

		$opt_grp = wbc()->options->get_option_group('ecacr_'.$plugin_slug,array());

		if( !isset($opt_grp[$curr_theme_key]) ) $opt_grp[$curr_theme_key] = array();
		if( !isset($opt_grp[$curr_theme_key][$section_key]) ) $opt_grp[$curr_theme_key][$section_key] = array();
		if( !isset($opt_grp[$curr_theme_key][$section_key][$required_key]) ) $opt_grp[$curr_theme_key][$section_key][$required_key] = array();

		if( !isset($opt_grp[$curr_theme_key][$section_key][$required_key][$key]) && is_array($item) )	{
			$opt_grp[$curr_theme_key][$section_key][$required_key][$key] = $item;
		}

		$opt_grp[$curr_theme_key][$section_key][$required_key][$key]['tested_on_url'] = $current_url;
		$opt_grp[$curr_theme_key][$section_key][$required_key][$key]['result'] = $result;

		wbc()->options->update_option_group('ecacr_'.$plugin_slug,$opt_grp);

	}

	public static function call($url, $query_string, $payload = null) {

		self::additional_data($query_string, $payload);

		$url .= (strpos($url, '?') ? $query_string : "?" . $query_string);

		$result = wp_remote_get($url);

		--	we need to check the result of above call and then check if there is any stardered wordprees error otherwise return the result and if there is the error then return the result acodingly. -- to h

		if ( empty($result) ) {

			throw new /Exception("There is some error in the call response.", 1);
		} elseif ( is_wp_error($result) ) {

			throw new /Exception("There is some error in the api call. error massege: " . $result->get_error_message());
		}

		return $result;
	}

	private static function additional_data(&$query_string, &$payload) {

		if ( empty($query_string) ) {

			$query_string = "";
		}

		$query_string .= self::active_theme_and_plugins();
	}

	private static function active_theme_and_plugins() {

		-- here we need to put the appropriate code for fetching the active theme and plugins. -- to h & -- to pi 

		$query_string = '';
		$active_plugins_slugs = array();
		$active_plugins_version = array();
		$active_themes_slugs = '';
		$active_themes_version = '';

		if ( function_exists('get_plugins') ) {

			$plugins=get_plugins();	

			// Loop through each installed plugin
			foreach ($plugins as $plugin_path => $plugin_info) {

				// Check if the plugin is active
				if (is_plugin_active($plugin_path)) {

					// If active, add it to the active plugins array
					$active_plugins_slugs[] = dirname($plugin_path);
					$active_plugins_version[] = $plugin_info['Version'];
				}

			}

		}

		if( function_exists('wp_get_theme') ) {

			$theme=wp_get_theme();
		} else {
			
			$theme=get_current_theme();
		}	

		$parent_themes = $theme->parent();

		if ( $parent_themes ) {

			$active_themes_slugs = $parent_themes->get_template(); // This will get the directory (slug) of the parent theme
			$active_themes_version = $parent_themes->get('Version');
		} else {

			$active_themes_slugs = $theme->get_template();
			$active_themes_version = $theme->get('Version');
		}

		$query_string .= "active_plugins_slugs=" . explode("," , $active_plugins_slugs) . "&";
		$query_string .= "active_plugins_version=" . explode("," , $active_plugins_version) . "&";
		$query_string .= "active_themes_slugs=" .  $active_themes_slugs . "&";
		$query_string .= "active_themes_version=" .  $active_themes_version . "&";

		return $query_string;

	}

}
