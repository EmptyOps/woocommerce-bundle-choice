<?php

if(!class_exists('WBC_Loader')) {

	class WBC_Loader {

		private static $_instance;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() { 

			//	no implemetations 
		}

		public function asset($type,$path,$param = array(),$version="",$load_instantly=false) {

			if(!apply_filters('wbc_load_asset_filter',true,$type,$path,$param,$version,$load_instantly)) {
				return true;
			}

			$_path = '';
			$_handle = str_replace(' ','-',str_replace('/','-',$path));			
			switch ($type) {
				case 'css':
					$_path = constant('EOWBC_ASSET_URL').'css'.'/'.$path.'.css';
					if($load_instantly) {
						echo '<link rel="stylesheet" type="text/css" href="'.$_path.'">';
					}
					else {
						if(empty($version)) {
							wp_register_style($_handle, $_path);	
						}
						else {
							wp_register_style($_handle, $_path, $version);	
						}
						wp_enqueue_style($_handle);
					}
					break;
				case 'js':
					$_path = constant('EOWBC_ASSET_URL').'js'.'/'.$path.'.js';	

					if($load_instantly) {
						if(isset($param[0]) && ($param[0]=='jquery' || $param[0]=='jQuery')) {
							echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
						}
						echo '<script src="'.$_path.'"></script>';
					}
					else {
						if(empty($param)){
							$param = array('jquery');

						}

						if(empty($version)) {
							wp_register_script($_handle, $_path, $param );
						}
						else {
							wp_register_script($_handle, $_path, $param, $version );
						}				
						wp_enqueue_script($_handle);					
					}
					break;
				case 'localize':
					wp_localize_script($_handle,array_keys($param)[0],$param[array_keys($param)[0]]);
					break;				
				default:				
					break;
			}			
		}

		public function template( $template_path, $data=array() ) {
			//	load template file under /view directory
			
			$path = apply_filters('eowbc_template_path',constant('EOWBC_TEMPLATE_DIR').$template_path.".php",$template_path,$data);

			if(defined('EOWBC_TEMPLATE_DIR')) {
				if( file_exists( $path ) ) {
					
					if(!empty($data) and is_array($data)){
						extract($data);
					}
					require $path;
				}
				else 
				{
					//exception handling
					if( true || constant('WP_DEBUG') == true )
					{
						throw new Exception("template file '".constant('EOWBC_TEMPLATE_DIR').$template_path.".php' is not found");
					}
					else 
					{
						//else show warning
					}
				}
			}			
		}

		public function library( $library_path ) {
			//	load library file under /library directory
		}

		public function helper( $helper_path ) {
			//	load helper file under /helper directory
		}

		public function model( $model_path ) {
			//	load model file under /model directory
			defined('EOWBC_MODEL_DIR') || define('EOWBC_MODEL_DIR', constant('EOWBC_DIRECTORY').'application/model/');
			if(file_exists(constant('EOWBC_MODEL_DIR').$model_path.".php")) {

				require_once trailingslashit(constant('EOWBC_MODEL_DIR')).$model_path.'.php';				
			}
		}

		public function built_in($type,$handle,$param = array(),$version=""){

			if ($type == "fomantic") {

				//ACTIVE_TODO as planned override the handle after 1/2 revisions are done, and then override it to standard fomantic key only which means handle will be one only for built_in asset of type fomantic so system wide it is loaded once only -- to s
				if (empty($handle)) {

					$handle = 'fomantic';
				}

				//ACTIVE_TODO in future we would like to load it using above asset function only to ensure reusability and avoid duplicate code -- to s
				wp_register_style( $handle.'-css',constant('EOWBC_ASSET_URL').'css/fomantic/semantic.min.css','2.8.1');
	    		wp_enqueue_style( $handle.'-css');      

		        wp_register_script( $handle.'-js',constant('EOWBC_ASSET_URL').'js/fomantic/semantic.min.js',array('jquery'));
		        wp_enqueue_script( $handle.'-js');   
		    }

		}
	}
}