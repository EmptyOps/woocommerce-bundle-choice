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

		public static function log_file_path(){ 
			return constant('EOWBC_LOG_DIR').'debug.log';
		}

		public static function db_option_name(){ 
			return 'wbc_error_log';
		}

		public static function write_to_log($log) {
			//	Just create log file if not exists.
			if (file_exists(EOWBC_Error_Handler::log_file_path())) {
				try {
					if( $fh = @fopen(EOWBC_Error_Handler::log_file_path(), 'w+') ) {
						fclose($fh);	
					}	
				}
				catch(Exception $e) {
					// TODO as the task is planned in asana in future we should show warning that log file is not writable even though we are using the fallback option 
				}
			}

			if( !empty($log) ) {
				$log = implode($log);		
			}
			else {
				$log = '';
			}

			// check again if file exists, if file write permission issues are there which means by any means the target dir is not writable it may not exist and in that case we shall choose the best feasible alternative fallback option  
			if (file_exists(EOWBC_Error_Handler::log_file_path())) {
				if( !empty($log) ) {
					error_log($log,3,EOWBC_Error_Handler::log_file_path());	
				}
				else {
					file_put_contents(EOWBC_Error_Handler::log_file_path(), $log);
				}
			}
			else {
				// the best feasible alternative fallback option 
				// right now we have use wp options db api, that is quite stable as per wp history but as per logging standard it's not the appropriate option for as per the logging standards but since its the most stable and easily accessible option we are chosing to use it
				if( function_exists('wbc') && !empty(wbc()->options) && is_object(wbc()->options) ) {
					wbc()->options->set(EOWBC_Error_Handler::db_option_name(), (!empty($log) ? wbc()->options->get(EOWBC_Error_Handler::db_option_name(), '') : '' ) . $log );
				}
				else {
					update_option(EOWBC_Error_Handler::db_option_name(), (!empty($log) ? get_option(EOWBC_Error_Handler::db_option_name(), '') : '' ) . $log );
				}
			}
		}

		public static function get_from_log() {

			// check again if file exists, then we assume that file log option is used  
			if (file_exists(EOWBC_Error_Handler::log_file_path())) {
				return file_get_contents(EOWBC_Error_Handler::log_file_path());
			}
			else {
				if( function_exists('wbc') && !empty(wbc()->options) && is_object(wbc()->options) ) {
					return wbc()->options->get(EOWBC_Error_Handler::db_option_name());
				}
				else {
					return get_option(EOWBC_Error_Handler::db_option_name());
				}
			}
		}

		public function shutdown() {

			$error = error_get_last();

			if(!empty($error)){	        		        
	        	        	
	        	$error_file_segments = explode(DIRECTORY_SEPARATOR,$error['file']);        	
	        	
	        	if( in_array(constant('EOWBC_BASE_DIRECTORY'),$error_file_segments) ) {
					
	        		// if it's the vary warning of the file write permission of this logger tool then just set a notification option and ignore logging this error
	        		if( strpos($error['file'], 'tool-error-handler.php') !== FALSE && strpos($error['message'], 'failed to open stream: Permission denied') !== FALSE ) {
	        			// TODO save option for notification here so that on next admin page load notification can be shown

	        			//skip logging this error/warning
	        			return;
	        		}

					$log=array();
					$log[]='['.date( 'M d Y H:i:s' ).'] ';
					$log[]=$this->error_type[(int)$error['type']].' in ';
					$log[]=$error['file'];
					$log[]=' at line number '.$error['line'];
					$log[]=PHP_EOL;
					$log[]=json_encode($error['message']);
					$log[]=PHP_EOL;

		     	   	//error_log(implode($log),3,constant('EOWBC_LOG_DIR').'debug.log');
		     	   	EOWBC_Error_Handler::write_to_log( $log );
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

			// //	Just create log file if not exists.
			// if (!file_exists(constant('EOWBC_LOG_DIR').'debug.log')) {
			// 	fclose(fopen(constant('EOWBC_LOG_DIR').'debug.log', 'w'));
			// }         
			
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

		   	// error_log(implode($log),3,constant('EOWBC_LOG_DIR').'debug.log');
		   	EOWBC_Error_Handler::write_to_log( $log );

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
			// file_put_contents(constant('EOWBC_LOG_DIR').'debug.log', '');
			EOWBC_Error_Handler::write_to_log( null );

			update_option('eowbc_warning_count',0);
			update_option('eowbc_error_count',0);
		}
		
		public static function get_subject(){
			return 'Error log from the '.home_url();
		}

		public static function get_logs(){
			$errors = EOWBC_Error_Handler::get_from_log(); //file_get_contents(constant('EOWBC_LOG_DIR').'debug.log');

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
