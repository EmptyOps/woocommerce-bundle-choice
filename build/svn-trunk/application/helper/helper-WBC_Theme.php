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

		$base_dir = constant('EOWBC_ASSET_DIR');
		if(!empty($param['base_dir'])){
			$base_dir = $param['base_dir'];
		}

		$path = implode('/',array_filter(explode('/',$path)));		
		$path = $base_dir.$type.'/'.'theme/'.basename(get_stylesheet_directory_uri()).'/'.$path.'.php';		
		if(file_exists($path)){
			require_once $path;
		}
	}
}
