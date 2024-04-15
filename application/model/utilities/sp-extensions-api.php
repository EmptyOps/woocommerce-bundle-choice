<?php
/*
 *	Utilities Model SP Extensions Api.
 */
namespace eo\wbc\model\utilities;

defined('ABSPATH') || exit;

class SP_Extensions_Api
{

	private static $_instance = null;

	private $extension_slug = null;
	private $extension_name = null;
	private $singleton_function = null;
	private $admin_page_slug = null;
	private $admin_page_template = null;

	public static function instance()
	{

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);

		if (!isset(self::$_instance)) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct($extension_slug, $extension_name = null, $singleton_function = null, $admin_page_slug = null, $admin_page_template = null)
	{

		if (empty($extension_slug)) {
			throw new Exception("Sorry, only construct method with SP extensions api's slug etc parameters is supported, so pass SP extensions api's slug etc parameters as parameters to construct method. Default construct method is not supported.", 1);
		}

		$this->extension_slug = $extension_slug;
		$this->extension_name = $extension_name;
		$this->singleton_function = $singleton_function;
		$this->admin_page_slug = $admin_page_slug;
		$this->admin_page_template = $admin_page_template;
	}

	public function set_extension_slug()
	{
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function extension_slug()
	{
		return $this->extension_slug;
	}

	public function set_extension_name()
	{
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function extension_name()
	{
		return $this->extension_name;
	}

	public function set_singleton_function()
	{
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function singleton_function()
	{
		return $this->singleton_function;
	}

	public function set_admin_page_slug()
	{
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function admin_page_slug()
	{
		// return !empty($this->admin_page_slug) ? $this->admin_page_slug : $this->extension_slug;
		return $this->admin_page_slug;
	}

	public function set_admin_page_template()
	{
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function admin_page_template()
	{
		return $this->admin_page_template;
	}

	public static function call($url, $query_string, $payload = null)
	{

		self::additional_data($query_string, $payload);

		$url .= (strpos($url, "?") === false) ? "?$query_string" : "$query_string";

		$result = wp_remote_get($url);

		--	we need to save the result of above call and then check it there is any stardered wordprees error otherwise return the result and in there is the error a return the result acodingly. -- to h
	}

	private static function additional_data(&$query_string, &$payload)
	{

		$query_string = self::active_theme_and_plugins();
	}

	private static function active_theme_and_plugins()
	{

		-- here we need to put the appropriate code for fetching the active theme and plugins. -- to h & -- to pi 


	}

}
