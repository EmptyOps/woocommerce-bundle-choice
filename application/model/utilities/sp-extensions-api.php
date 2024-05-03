<?php
/*
 *	Utilities Model SP Extensions Api.
 */
namespace eo\wbc\model\utilities;

defined('ABSPATH') || exit;

class SP_Extensions_Api {

	private static $_instance = null;

	private $extension_slug = null;
	private $extension_name = null;
	private $singleton_function = null;
	private $admin_page_slug = null;
	private $admin_page_template = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);

		if (!isset(self::$_instance)) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct($extension_slug, $extension_name = null, $singleton_function = null, $admin_page_slug = null, $admin_page_template = null) {

		if (empty($extension_slug)) {
			throw new Exception("Sorry, only construct method with SP extensions api's slug etc parameters is supported, so pass SP extensions api's slug etc parameters as parameters to construct method. Default construct method is not supported.", 1);
		}

		$this->extension_slug = $extension_slug;
		$this->extension_name = $extension_name;
		$this->singleton_function = $singleton_function;
		$this->admin_page_slug = $admin_page_slug;
		$this->admin_page_template = $admin_page_template;
	}

	public function configuration_run(){
		do_action('sp_wbc_extras_check');
	}

	public function configuration_check($config){

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
						throw new \Exception("Eowbc_Extras_Check: The provided type ".$item['type']." is not supported yet, send request to dev team for adding support for it.", 1);
						
					}

				}
			}
			
		}

		$result = self::call($url --this perameter need to be passed from the particular extensions so based on plugin slug we need to call the single tone function and hear the plugin slug is most probably single tone function name so need to retry the api url to call from the extensions config_class config_helpaer function);

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

	public function set_extension_slug() {
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function extension_slug() {
		return $this->extension_slug;
	}

	public function set_extension_name() {
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function extension_name() {
		return $this->extension_name;
	}

	public function set_singleton_function() {
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function singleton_function() {
		return $this->singleton_function;
	}

	public function set_admin_page_slug() {
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function admin_page_slug() {
		// return !empty($this->admin_page_slug) ? $this->admin_page_slug : $this->extension_slug;
		return $this->admin_page_slug;
	}

	public function set_admin_page_template() {
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function admin_page_template() {
		return $this->admin_page_template;
	}

	public static function call($url, $query_string, $payload = null) {

		self::additional_data($query_string, $payload);

		$url .= (str_contains($url, '?') ? $query_string : "?" . $query_string);

		$result = wp_remote_get($url);

		--	we need to check the result of above call and then check if there is any stardered wordprees error otherwise return the result and if there is the error then return the result acodingly. -- to h
	}

	private static function additional_data(&$query_string, &$payload) {

		if (empty($query_string)) {

			$query_string = "";
		}

		$query_string .= self::active_theme_and_plugins();
	}

	private static function active_theme_and_plugins() {

		-- here we need to put the appropriate code for fetching the active theme and plugins. -- to h & -- to pi 

		$plugins = '';
		$active_plugins = array();

		if (function_exists('get_plugins')) {

			$plugins=get_plugins();	

			// Loop through each installed plugin
			foreach ($plugins as $plugin_path => $plugin_info) {

				// Check if the plugin is active
				if (is_plugin_active($plugin_path)) {

					// If active, add it to the active plugins array
					$active_plugins[] = $plugin_info['Name'];
				}

			}

		}

		echo "Active Plugins:<br>";
		foreach ($active_plugins as $active_plugin) {

			echo "- $active_plugin<br>";
		}

		$theme = null;

		if(function_exists('wp_get_theme')){

			$theme=wp_get_theme();
		} else {
			
			$theme=get_current_theme();
		}	

		$active_theme_name = $theme->get('Name');
		$active_theme_version = $theme->get('Version');

		// Output active theme information
		echo "Active Theme Name: $active_theme_name <br>";
		echo "Active Theme Version: $active_theme_version <br>";

	}

}
