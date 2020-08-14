<?php 
defined( 'ABSPATH' ) || exit;

class WBC_Theme {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	public function load($type='css',$path='main',$param = array()) {
		 constant('EOWBC_ASSET_URL').'js'.'/'.$path.'.js';	
		$path = implode('/',array_filter(explode('/',$path)));		
		$path = constant('EOWBC_ASSET_DIR').$type.'/'.'theme/'.wbc()->wp->get_template().'/'.$path.'.php';		
		if(file_exists($path)){
			require_once $path;
		}
	}
}
