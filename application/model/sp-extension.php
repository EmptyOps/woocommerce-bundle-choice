<?php
/*
*	SP Extensions' base entity class Model.
*/

namespace eo\wbc\model;

defined( 'ABSPATH' ) || exit;

class SP_Extension {

	private static $_instance = null;

	private $extension_slug = null;
	private $extension_name = null;
	private $singleton_function = null;
	private $admin_page_slug = null;
	private $admin_page_template = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
		
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct( $extension_slug, $extension_name=null, $singleton_function=null, $admin_page_slug=null, $admin_page_template=null ) {

		if( empty($extension_slug) ) {
			throw new Exception("Sorry, only construct method with SP extension's slug etc parameters is supported, so pass SP extension's slug etc parameters as parameters to construct method. Default construct method is not supported.", 1);
		}

		$this->extension_slug = $extension_slug;
		$this->extension_name = $extension_name;
		$this->singleton_function = $singleton_function;
		$this->admin_page_slug = $admin_page_slug;
		$this->admin_page_template = $admin_page_template;
	}

	public function set_extension_slug(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function extension_slug(){
		return $this->extension_slug;
	}

	public function set_extension_name(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function extension_name(){
		return $this->extension_name;
	}

	public function set_singleton_function(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function singleton_function(){
		return $this->singleton_function;
	}

	public function set_admin_page_slug(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function admin_page_slug(){
		// return !empty($this->admin_page_slug) ? $this->admin_page_slug : $this->extension_slug;
		return $this->admin_page_slug;
	}

	public function set_admin_page_template(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}
	public function admin_page_template(){
		return $this->admin_page_template;
	}

}
