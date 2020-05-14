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
						fclose(constant('EOWBC_LOG_DIR').'debug.log', 'w');
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
		     	   	if($error_code==1 or $error_code==4){
		     	   		update_option('eowbc_error_count',get_option('eowbc_error_count',0)+1);	
		     	   	} elseif ($error_code == 2 or $error_code == 8) {
						update_option('eowbc_warning_count',get_option('eowbc_warning_count',0)+1);     	   		
		     	   	}	     	   	
	     	    }
	    	}
	    }
	    

		public static function log($message) {

			//	Just create log file if not exists.
			if (!file_exists(constant('EOWBC_LOG_DIR').'debug.log')) {
				fclose(fopen(constant('EOWBC_LOG_DIR').'debug.log', 'w'));
			}         
			
			$log=array();
			$log[]='['.date( 'M d Y H:i:s' ).'] ';
			$log[]='User Error';
			$log[]='---';
			$log[]='---';
			$log[]=PHP_EOL;
			$log[]=$message;
			$log[]=PHP_EOL;

		   	error_log(implode($log),3,constant('EOWBC_LOG_DIR').'debug.log');
		   	update_option('eowbc_warning_count',get_option('eowbc_warning_count',0)+1);

		   	return true;
		}
	}	
	call_user_func(array('EOWBC_Error_Handler','instance'));
}
