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

		// ACTIVE_TODO we mostly confirmed that built in asset function ned to be createad, we had some older points noted some wher retlated to simantic loding and as of now allso keeping in mind thei ui builder -- to h and -- to b
		// 	-- ACTIVE_TODO the main idea for above function is to allways ensure commun handler key for given biltin asset -- to h and -- to b
		public function built_in_asset($asset_group) {
			
			/*if(!apply_filters('wbc_load_asset_filter',true,$asset_group,$path,$deps,$version,$load_instantly)) {
				return true;
			}*/

			// ACTIVE_TODO right now we are doing a temporary solution of preventing loading of asset multiple times using the constant option but later we need to apply the standard solution. 
			$constant = 'SP_WBC_BUILT_IN_ASSET_'.$asset_group.'_LOADED';
        	
        	if( wbc()->sanitize->get('is_test') == 1 ) {
			
				wbc_pr('built_in_asset constant');
				wbc_pr($constant);
			}
			
			if(defined($constant)){

				return false;

			}

			define($constant,true);


			switch ($asset_group) {

				case 'bootstrap':

		        	if( wbc()->sanitize->get('is_test') == 1 ) {
					
						wbc_pr('bootstrap case constant is '. $constant);
					}

					if (false) {
						?>
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
						<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
						<?php
					}

					wbc()->load->asset('css','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',array(),"",true,true,null,null,false,true,null,true);
					wbc()->load->asset('js','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', wbc()->common->current_theme_key() != "themes___purple_theme" ? array():array('jquery'),"",true,true,null,null,false,true,null,true);
					wbc()->load->asset('js','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',wbc()->common->current_theme_key() != "themes___purple_theme" ? array():array('jquery'),"",true,true,null,null,false,true,null,true);	
					break;		
				case 'semantic':
					//ACTIVE_TODO update code below to use wbc()->load->asset function call insted of below dairact wp api call.
					// -- aa hook comment karyo se jyare me asset na funation mathi sematic no call lagto hato tyare built_in_asset no maryo tyare comment karyu se @a 20-11-2023
					// add_action( 'wp_enqueue_scripts',function() { 
			        	
			            wp_register_style('fomantic-semantic.min',constant('EOWBC_ASSET_URL').'css/fomantic/semantic.min.css');
			            wp_enqueue_style( 'fomantic-semantic.min');
			            wp_register_script('fomantic-semantic.min',constant('EOWBC_ASSET_URL').'js/fomantic/semantic.min.js',array('jquery'),false);    
			            wp_enqueue_script( 'fomantic-semantic.min');        
		       		// },100);	
					break;

				case 'react':

					wbc()->load->asset('js','https://unpkg.com/react@18/umd/react.production.min.js',array(),"",true,true,null,null,false,true,null,true);

					break;

		        case 'ion_rangeSlider':
		        	
		        	if( wbc()->sanitize->get('is_test') == 1 ) {
    				
						wbc_pr('ion_rangeSlider case constant is '. $constant);
    				}
		        	
					wbc()->load->asset('css', constant('EOWBC_ASSET_URL') . 'css/rangeslider/ion.rangeSlider.min.css',array(),"",true,true,null,null,false,true,null,true);
					wbc()->load->asset('js', constant('EOWBC_ASSET_URL') . 'js/rangeslider/ion.rangeSlider.min.js', wbc()->common->current_theme_key() != "themes___purple_theme" ? array():array('jquery'),"",true,true,null,null,false,true,null,true);
					break;
				case 'wc_price':
		        	
		        	if( wbc()->sanitize->get('is_test') == 1 ) {
    				
						wbc_pr('wc_price case constant is '. $constant);
    				}
		        	
		        	add_action( 'wp_enqueue_scripts', function() {

		        	    // Enqueue the external script wc_price.js
		        	    wp_enqueue_script( 'wc-price-js', constant( 'EOWBC_ASSET_URL' ) . 'js/woocommerce-price/wc_price.js', array( 'jquery' ), '1.0', false );

		        	    // Prepare WooCommerce settings to pass to JavaScript
		        	    $wc_store_object = array(
		        	        'currency_symbol' => html_entity_decode( get_woocommerce_currency_symbol( get_woocommerce_currency() ), ENT_QUOTES, 'UTF-8' ),
		        	        'currency_position' => get_option( 'woocommerce_currency_pos', true ),
		        	        'decimal_separator' => wc_get_price_decimal_separator(),
		        	        'currency_format_trim_zeros' => wc_get_price_thousand_separator(),
		        	        'currency_format_num_decimals' => wc_get_price_decimals(),
		        	        'price_format' => get_woocommerce_price_format(),
		        	    );

		        	    // Add inline script with the WooCommerce settings
		        	    wp_add_inline_script( 'wc-price-js', 'var wc_settings_args = ' . wp_json_encode( $wc_store_object ) . ';' );
		        	});
					break;
				default:				
					break;
			}			
		}
 
		private function asset_load_instantly($path,$param,$version,$load_instantly,$is_prefix_handle,$localize_var,$localize_var_val,$in_footer,$is_absolute_url,$singleton_function,$_path){

			 // ACTIVE_TODO below function is temporary
			$this->asset('localize_data',$path,$param,$version,$load_instantly,$is_prefix_handle,$localize_var,$localize_var_val,$in_footer,$is_absolute_url,$singleton_function);

			// if(isset($param[0]) && ($param[0]=='jquery' || $param[0]=='jQuery')) {
			if(in_array('jquery', $param) || in_array('jQuery', $param)) {
				echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
			}
			
			if(in_array('underscore', $param)) {
				echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.3/underscore-min.js"></script>';
			}
			
			if(in_array('wc-add-to-cart-variation', $param)) {
				echo '<script src="'.wbc()->common->site_url(). '/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min.js'.'"></script>';
			}

			echo '<script src="'.$_path.'"></script>';

		}

		public function asset($type,$path,$param = array(),$version="",$load_instantly=false,$is_prefix_handle=false,$localize_var=null,$localize_var_val=null,$in_footer = false,$is_absolute_url = false,$singleton_function = null,$is_skip_jquery = false) {
		
			// NOTE: load_instantly solution provided here is for expesional scenarios only. and for the most of the users on the free support tickets and so on we must fix the actual loading problems to ensure that for most of the scenarios not even platforms the standard solution work and this solution is to be used hardcoded and for temporary periods only for some specific user environments and in the quick support requirements.
			// NOTE: this solution assumes the loading sequance of caller, so it must be handled carefully and clearly by the loading sequances of the caller.
			// 	NOTE: so it is realy importnt that there is not even single hook in the non load_instantly layers or section here in this function or in the dependent function of this function


			// hardcoded override for the load instantly option
				// TODO whenever it become necessory then make even this flag solution dynamic instead of managing hardcoded.
			// $load_instantly = true;

			if(!apply_filters('wbc_load_asset_filter',true,$type,$path,$param,$version,$load_instantly)) {
				return true;
			}

			$_path = '';
			$_handle = ( $is_prefix_handle ? "sp_wbc_" : "" ) . str_replace(' ','-',str_replace('/','-',$path));			
			switch ($type) {
				case 'css':
					if ($is_absolute_url) {
						$_path = $path/*$_path*/;
					}else {
						$_path = constant('EOWBC_ASSET_URL').'css'.'/'.$path.'.css';
					}

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
					if ($is_absolute_url) {
						$_path = $path/*$_path*/;
					
					} elseif( !empty( $singleton_function ) ) {

						$_path = constant( strtoupper( $singleton_function ).'_ASSET_URL').'js'.'/'.$path.'.js';	
					} else {
						
						$_path = constant('EOWBC_ASSET_URL').'js'.'/'.$path.'.js';	
					}

					if($load_instantly) {

						// ACTIVE_TODO below if block is temporary, and we can not support localize on directly loads. and if we should then that would be direct script echo here with json_encode of var to be localized -- to s 
						if( !empty($localize_var) && !empty($localize_var_val) ) {
	
							if(empty($param) and !$is_skip_jquery){
								$param = array('jquery');

							}

							/*if(empty($version)) {
								wp_register_script($_handle, $_path, $param, false, $in_footer );
							}
							else {
								wp_register_script($_handle, $_path, $param, $version, $in_footer );
							}				
							wp_enqueue_script($_handle);					

							wp_localize_script(
							    $_handle,
							    $localize_var,
							    $localize_var_val
							);*/
						}
						// echo "_handle  : ";
						// echo $_handle;
						// echo " path  :  ";
						// echo $path;

						if(empty($in_footer)){

							// wbc_pr("in_footer inner if");
							$this->asset_load_instantly($path,$param,$version,$load_instantly,$is_prefix_handle,$localize_var,$localize_var_val,$in_footer,$is_absolute_url,$singleton_function,$_path);
						}else{

							// wbc_pr("in_footer inner else");							
							add_action('wp_footer',function() use($path,$param,$version,$load_instantly,$is_prefix_handle,$localize_var,$localize_var_val,$in_footer,$is_absolute_url,$singleton_function){

								$this->asset_load_instantly($path,$param,$version,$load_instantly,$is_prefix_handle,$localize_var,$localize_var_val,$in_footer,$is_absolute_url,$singleton_function,$_path);
							}, 5);
						}
						
					}
					else {
						if(empty($param) and !$is_skip_jquery){
							$param = array('jquery');

						}

							if(empty($version)) {
								wp_register_script($_handle, $_path, $param, false, $in_footer );
							}
							else {
								wp_register_script($_handle, $_path, $param, $version, $in_footer );
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

					if($load_instantly) {

						return $this->asset('localize_data',$path,$param,$version,$load_instantly,$is_prefix_handle,$localize_var,$localize_var_val,$in_footer,$is_absolute_url,$singleton_function);
					}

					// wbc_pr( "localize " . $_handle );	
					// wbc_pr( $param );	
					// wbc_pr( "localize 1 " );	
					// wbc_pr( array_keys($param)[0] );	
					// wbc_pr( "localize 2" );	
					// wbc_pr( $param[array_keys($param)[0]] );	

					wp_localize_script($_handle,array_keys($param)[0],$param[array_keys($param)[0]]);
					break;

				case 'localize_data':
					// debug_print_backtrace();
					// wbc_pr('localize_var');
					// wbc_pr($localize_var);
					// wbc_pr('localize_var_val');
					// wbc_pr($localize_var_val);

					// NOTE: should never be used for js file configs. and only be used if there is exteam requirement of independent configs or data dumping. 
						// NOTE: and since this is about dump to browser so loading sequance hooks and the output buffer should be kept in mind. 
					if( !empty($localize_var) && !empty($localize_var_val) ) {
					//echo "load_localize_data inner if";
										
						?>
						<script>
							var <?php echo $localize_var; ?> = JSON.parse('<?php echo json_encode($localize_var_val); ?>');
						</script>
						<?php

					} elseif( !empty(array_keys($param)[0]) && !empty($param[array_keys($param)[0]]) ) {
					// echo "localize_data inner else";
					// wbc_pr('load_param');
					// wbc_pr($param);
						?>
						<script>
							var <?php echo array_keys($param)[0]; ?> = JSON.parse('<?php echo json_encode($param[array_keys($param)[0]]); ?>');
						</script>
						<?php
					
					}
					break;				
				default:				
					break;
			}			
		}
		
		public function template_key_option($args){

	        
	        $template_key_option = '';

	        if(!empty($args['template_option_key'])) {
	            $template_key_option = wbc()->options->get_option($args['option_group_key'],$args['template_option_key'],isset($args['template_option_default'])?$args['template_option_default']:'');
	        }

	        return $template_key_option;
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

	        $template_key_option = $this->template_key_option($args);

            $template_dir = str_replace('{{template_key}}',$template_key_option,$template_dir);

	        if (!empty($args['template_key'])) {
	            $template_key = $args['template_key'];

                $template_key = str_replace('{{template_key}}',$template_key_option,$template_key);

	        } else {
	            $template_key = $template_key_option;
	        }

	        if (empty($args['is_absolute_path'])) {

	         	return $template_dir.$template_key;

	        } else {

	        	return constant( strtoupper( $args['singleton_function'] ).'_TEMPLATE_DIR_EXTENDED').$template_dir.$template_key.".php";
	        }

	    }

		public function template( $template_path, $data=array(),$is_template_dir_extended = false,$singleton_function = null,$is_return_template = false,$is_devices_templates = false, $alternate_widget_hook = null,$template_key_option = null) {
			//	load template file under /view directory
			//wbc_pr($template_path);
			$path = null;
			if ($is_template_dir_extended) {

				if (empty($alternate_widget_hook)) {
					$path = constant( strtoupper( $singleton_function ).'_TEMPLATE_DIR_EXTENDED').$template_path.".php";
				}else{
					$path = constant(apply_filters($alternate_widget_hook,strtoupper( $singleton_function ).'_TEMPLATE_DIR_EXTENDED',$template_path,$data,$template_key_option) ).$template_path.".php";
				}
				
			}else{
				$path = constant('EOWBC_TEMPLATE_DIR').$template_path.".php";
			}
			

			//devices templtes  
			if($is_devices_templates){
	        	$template_path_new = null;

		        if(strpos($path,'{{template_key_device}}') !== FALSE){

		        	// ACTIVE_TODO temp: wen we enabel back the mobile site at that time remove below false condition. 
		            if (false and wbc_is_mobile()) {

		                $template_path_new = str_replace('{{template_key_device}}','mobile',$path);

		            }else{

		                $template_path_new = str_replace('{{template_key_device}}','desktop',$path);
		            }

		            if (file_exists($template_path_new)) {
		                
		                $path = $template_path_new;
		            } else {

		            	$template_path_new = str_replace('{{template_key_device}}','desktop',$path);
		            	$path = $template_path_new;
		            }

		            // wbc_pr( "path >>>>>>>>>>>>>>>>>>>>>>> " . $path );
		            // wbc_pr( "template_path_new >>>>>>>>>>>>>>>>>>>>>>> " . $template_path_new );
		            	//die();


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

			// added on 24-01-2023 @h & @s
			if( !is_array($files) ) {

				return;
			}

			$files = array_diff($files, array('.', '..'));

			foreach($files as $file)
			{
				if(is_dir($path.'/'.$file)){

				    if($is_recurssive) {

				        $this->load_classes( $path.'/'.$file, $is_recurssive);
				    }
				} else {
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