<?php
/**
*	Class to perform error handling task.
*	Tasks:
*		- Log Errors
*		- Report Errors
*		- Clean Errol Log
*/

defined( 'ABSPATH' ) || exit;

if(!class_exists('EOWBC_Error_Handler')){
	
	class EOWBC_Error_Handler {

		private static $_instance = null;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {
			
			$this->error_type = array(
				E_ERROR => 'ERROR', E_WARNING => 'WARNING', E_PARSE => 'Parse Error',
				E_NOTICE => 'Notice', E_CORE_ERROR => 'CORE ERROR', E_CORE_WARNING => 'Core Warning',
				E_COMPILE_ERROR => 'Compile Error', E_COMPILE_WARNING => 'Compile Warning',
				E_USER_ERROR => 'User Error', E_USER_WARNING => 'User Warning', E_USER_NOTICE => 'User Notice',
				E_STRICT => 'Strict Error', E_RECOVERABLE_ERROR => 'Recoverable Error',
				E_DEPRECATED => 'Deprecated', E_USER_DEPRECATED => 'User Deprecated'
		    );

			register_shutdown_function(array($this,'shutdown'));
		}

		public function shutdown() {

			$error = error_get_last();

			if(!empty($error)){	        		        
	        	        	
	        	$error_file_segments = explode(DIRECTORY_SEPARATOR,$error['file']);        	
	        	
	        	if( in_array(constant('EOWBC_BASE_DIRECTORY'),$error_file_segments) ) {

		        	//	Just create log file if not exists.
					if (!file_exists(constant('EOWBC_LOG_DIR').'debug.log')) {
						fclose(fopen(constant('EOWBC_LOG_DIR').'debug.log', 'w'));
					}
					
					$log=array();
					$log[]='['.date( 'M d Y H:i:s' ).'] ';
					$log[]=$this->error_type[(int)$error['type']].' in ';
					$log[]=$error['file'];
					$log[]=' at line number '.$error['line'];
					$log[]=PHP_EOL;
					$log[]=json_encode($error['message']);
					$log[]=PHP_EOL;

		     	   	error_log(implode($log),3,constant('EOWBC_LOG_DIR').'debug.log');
		     	   	$error_code = (int)$error['type'];
     	   			EOWBC_Error_Handler::update_counts($error_code);	     	   	
	     	    }
	    	}
	    }
	    
	    public static function update_counts($error_code=-1) { 
	    	if($error_code==1 or $error_code==4){
     	   		update_option('eowbc_error_count',get_option('eowbc_error_count',0)+1);	
     	   	} elseif ($error_code == -1 or $error_code == 2 or $error_code == 8) {
				update_option('eowbc_warning_count',get_option('eowbc_warning_count',0)+1);     	   		
     	   	}
	    }

		public static function log($message, $error_code=-1) {

			//	Just create log file if not exists.
			if (!file_exists(constant('EOWBC_LOG_DIR').'debug.log')) {
				fclose(fopen(constant('EOWBC_LOG_DIR').'debug.log', 'w'));
			}         
			
			if( $error_code == -1 ) {
				$log=array();
				$log[]='['.date( 'M d Y H:i:s' ).'] ';
				$log[]='User Error';
				$log[]='---';
				$log[]='---';
				$log[]=PHP_EOL;
				$log[]=$message;
				$log[]=PHP_EOL;
			}
			else {
				$log=array();
				$log[]='['.date( 'M d Y H:i:s' ).'] ';
				$log[]=$error_code;
				$log[]='---';
				$log[]='---';
				$log[]=PHP_EOL;
				$log[]=$message;
				$log[]=PHP_EOL;
			}

		   	error_log(implode($log),3,constant('EOWBC_LOG_DIR').'debug.log');

		   	// update_option('eowbc_warning_count',get_option('eowbc_warning_count',0)+1);
		   	EOWBC_Error_Handler::update_counts($error_code);	

		   	return true;
		}

		public static function eo_wbc_get_system_details(){

			$user_data=wp_get_current_user();

			$wp_version=get_bloginfo('version');	
			$name=$user_data->data->display_name;
			$email=$user_data->data->user_email;

			include_once( ABSPATH.'wp-admin/includes/plugin.php' );

			$plugins='';
			$available_plugins='';
			if(function_exists('get_plugins')){		

				$plugins=get_plugins();		
				$available_plugins=json_encode(
										array_combine(
											array_column($plugins,'Name'),
											array_column($plugins,'Version')
										)
									);
			}
			$active_plugins=get_option('active_plugins');
			
			if(!empty($plugins)){
				array_walk($active_plugins,function(&$val,$index,$plugins){
					$val=$plugins[$val]['Name'];
				},$plugins);
			}			

			$active_plugins=implode(', ', $active_plugins);

			$theme=FALSE;
			if(function_exists('wp_get_theme')){
				$theme=wp_get_theme();
			} else{
				$theme=get_current_theme();
			}		

			$details='-------------------------------------------------------';

			$nl='
	';
			$details.=$nl.'-------------------------------------------------------'.$nl;
			$details.='Name: '.$name.$nl;
			$details.='Email: '.$email.$nl;
			$details.='WP version: '.$wp_version.$nl;
			$details.='Plugins: '.$available_plugins.$nl;
			$details.='Active Plugins: '.$active_plugins.$nl;
			$details.='Active theme: '.$theme->get('Name').$nl;
			$details.='Theme Version: '.$theme->get('Version').$nl;

			return $details;
		}
		
		public static function clean_send(){
			file_put_contents(constant('EOWBC_LOG_DIR').'debug.log', '');
			update_option('eowbc_warning_count',0);
			update_option('eowbc_error_count',0);
		}
		
		public static function get_subject(){
			return 'Error log from the '.home_url();
		}

		public static function get_logs(){
			$errors=file_get_contents(constant('EOWBC_LOG_DIR').'debug.log');

			if(!empty($errors)){
				$errors=$errors.self::eo_wbc_get_system_details();
			}

			return $errors;
		}

		public static function eo_wbc_send_error_report(){
			if( isset($_POST["is_sent_from_front_end"]) && wbc()->sanitize->post("is_sent_from_front_end") == 1 ) {
				if(wp_mail('emptyopssphere@gmail.com,mahesh@emptyops.com', self::get_subject(), self::get_logs())) {
					self::clean_send();
				}	
			}
			else {
				if(wp_mail('emptyopssphere@gmail.com,mahesh@emptyops.com',wbc()->sanitize->post("send_error_log_subject"),wbc()->sanitize->post("eo_wbc_view_error"))) {
					self::clean_send();
				}
			}
		}
	}	
	call_user_func(array('EOWBC_Error_Handler','instance'));
}
