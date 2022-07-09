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

		public function asset($type,$path,$param = array(),$version="",$load_instantly=false,$is_prefix_handle=false,$localize_var=null,$localize_var_val=null) {

			if(!apply_filters('wbc_load_asset_filter',true,$type,$path,$param,$version,$load_instantly)) {
				return true;
			}

			$_path = '';
			$_handle = ( $is_prefix_handle ? "sp_wbc_" : "" ) . str_replace(' ','-',str_replace('/','-',$path));			
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

						// ACTIVE_TODO below if block is temporary, and we can not support localize on directly loads. and if we should then that would be direct script echo here with json_encode of var to be localized -- to s 
						if( !empty($localize_var) && !empty($localize_var_val) ) {
	
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

							wp_localize_script(
							    $_handle,
							    $localize_var,
							    $localize_var_val
							);
						}

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

						if( !empty($localize_var) && !empty($localize_var_val) ) {

							wp_localize_script(
							    $_handle,
							    $localize_var,
							    $localize_var_val
							);
						}
					}
					break;
				case 'asset.php':	//	NOTE: it is important here to note that this asset loading block is fundamentally different from other asset loading blocks here since it is loading assets that are implemented in the php file
					$_path = ( isset($data['ASSET_DIR']) ? $data['ASSET_DIR'].$path : $path );	

					if(isset($param[0]) && ($param[0]=='jquery' || $param[0]=='jQuery')) {
						echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/'.(!empty($version)?$version:"3.4.1").'/jquery.min.js"></script>';
						unset($param[0]);
					}

					// ACTIVE_TODO/TODO we have mixed here the deps(dependancies) param with the script parameters, so that should be fixed. -- to s 
					// 	--	and in this function rename $param to $dependancies to avoid confusion -- to s
					extract($param);
					require_once $_path;
					break;
				case 'localize':

					wbc_pr( "localize " . $_handle );	
					wp_localize_script($_handle,array_keys($param)[0],$param[array_keys($param)[0]]);
					break;				
				default:				
					break;
			}			
		}

	    public function template_path($args){

	        /*function will accept the args param=null ... which will support the param like template_option_key, option_group_key 
	            from that it will read template key  -- to b done
	                and based on that it will load the files from the template folder which will be as per the wp template folder structure standards  -- to b done
	                
	                    the default template key must be default so that in template folder user can always find file named default.php  -- to b done
	                        and now planned to have the folder for default as well for avoiding confusion and improving readability. and wbc swatches folder may have the default folder also and that will contain color(swatches) or button widget as default.

	                        ACTIVE_TODO if the particular extension have more than one widget then the other widgets would in its specific folder like breadcrumb, filters etc. -- to b 

	                            so the args param will support one more parameter like widget_key and if it is empty then the root folder of the template will be considered otherwise the specific inner folder -- to b done
	                                widget_key flow is skipped and the implementation is erased
			*/


	        $template_dir = isset( $args['template_sub_dir']) ? $args['template_sub_dir'].'/' : '';

	        $template_key = null;

	        $template_key_option = '';

	        if(!empty($args['template_option_key'])) {
	            $template_key_option = wbc()->options->get_option($args['option_group_key'],$args['template_option_key'],isset($args['template_option_default'])?$args['template_option_default']:'');
	        }

            $template_dir = str_replace('{{template_key}}',$template_key_option,$template_dir);

	        if (!empty($args['template_key'])) {
	            $template_key = $args['template_key'];

                $template_key = str_replace('{{template_key}}',$template_key_option,$template_key);

	        } else {
	            $template_key = $template_key_option;
	        }

	        return $template_dir.$template_key;
	    }

		public function template( $template_path, $data=array(),$is_template_dir_extended = false,$singleton_function = null,$is_return_template = false,$is_devices_templates = false) {
			//	load template file under /view directory
			//wbc_pr($template_path);
			$path = null;
			if ($is_template_dir_extended) {
				$path = constant( strtoupper( $singleton_function ).'_TEMPLATE_DIR_EXTENDED').$template_path.".php";
			}else{
				$path = constant('EOWBC_TEMPLATE_DIR').$template_path.".php";
			}
			

			//devices templtes  
			if($is_devices_templates){
	        	$template_path_new = null;

		        if(strpos($path,'{{template_key_device}}') !== FALSE){

		            if (wbc_is_mobile()) {

		                $template_path_new = str_replace('{{template_key_device}}','mobile',$path);

		            }else{

		                $template_path_new = str_replace('{{template_key_device}}','desktop',$path);
		            }

		            if (file_exists($template_path_new)) {
		                
		                $path = $template_path_new;
		            }
		            // wbc_pr( "path >>>>>>>>>>>>>>>>>>>>>>> " . $path );
		            // wbc_pr( "template_path_new >>>>>>>>>>>>>>>>>>>>>>> " . $template_path_new );
		            //	die();


		        }
		    }


		    $path = apply_filters('eowbc_template_path',$path,$template_path,$data);

			if(defined('EOWBC_TEMPLATE_DIR')) {
				if( file_exists( $path ) ) {
					
					if(!empty($data) and is_array($data)){
						extract($data);
					}
					require $path;

					if ($is_return_template) {
						return $template;
					}
				}
				else 
				{
					//exception handling
					if( true || constant('WP_DEBUG') == true )
					{
						// throw new Exception("template file '".constant('EOWBC_TEMPLATE_DIR').$template_path.".php' is not found");
						throw new Exception("template file '".$path."' is not found, actual non filtered path was '".constant('EOWBC_TEMPLATE_DIR').$template_path.".php'");
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

		public function explicit_class_loader( $explicit_class_loader_config ) {

      		$dirs_n_files = null; 
      		if( is_admin() ) {
      			$dirs_n_files = isset($explicit_class_loader_config['admin']) ? $explicit_class_loader_config['admin'] : array();
      		} else {
      			$dirs_n_files = isset($explicit_class_loader_config['frontend']) ? $explicit_class_loader_config['frontend'] : array();
      		}

      		$this->load_classes_array($dirs_n_files);

      		//	for both
  			if( isset($explicit_class_loader_config['both']) ) {

	      		$this->load_classes_array($explicit_class_loader_config['both']);
  			} 
		}

		private function load_classes_array($dirs_n_files) {

			if(!empty($dirs_n_files)){

				foreach ($dirs_n_files as $key=>$val) {

					if( $val['type'] == 'dir' ) {

						if( empty($val['path']) ) {
							//	in case of empty do nothing, since config array maybe incomplete or in progress. but maybe we are required to throw error for a straight and strict flow 
							throw new \Exception("Directory path must not be empty, check your explicit_class_loader config array", 1);
							
						}
						$this->load_classes( $val['path'], isset($val['is_also_subdirs']) ? $val['is_also_subdirs'] : null);
						
					} else {

						$this->load_class_file( $val['path'] );
					}					
				}	
			}
		}

		// loads classes from the dir path 
		private function load_classes($path, $is_recurssive = false)
		{
			// $actual_link = __DIR__;
			$files = scandir($path);
			$files = array_diff(scandir($path), array('.', '..'));

			foreach($files as $file)
			{
			  if(is_dir($path.'/'.$file))
			  {
			      if($is_recurssive)
			      {
			          $this->load_classes( $path.'/'.$file, $is_recurssive);
			      }
			  }
			 else
			 {
			          if(($file != ".") 
			             && ($file != "..")
			             && (strtolower(substr($file, strrpos($file, '.') + 1)) == 'php'))
			          {
			          // echo '<LI><a href="'.$file.'">',$actual_link.'/'.$path.'/'.$file.'</a>';
			          	$this->load_class_file( $path.'/'.$file ); 
			         }
			     }
			}	
		}

		private function load_class_file( $path ) {

			if( empty($path) ) {
				//	in case of empty do nothing, since config array maybe incomplete or in progress. but maybe we are required to throw error for a straight and strict flow 
				throw new \Exception("File path must not be empty, check your explicit_class_loader config array", 1);
				
			}
			
			if( wbc()->file->extension_from_path( $path ) != 'php' ) {
				throw new \Exception("The php files are only supported so far in the explicit_class_loader, check your file extension", 1);
				
			}

			if( wbc()->file->file_exists( $path ) ) {
				require_once $path;
			} else {
				throw new \Exception("The file you requested to load through the explicit_class_loader config is not found, please check if the file at path ".$path." actually exist.", 1);
				
			}
		}

	}
}