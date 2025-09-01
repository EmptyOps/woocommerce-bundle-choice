<?php
function EO_WBC_Shutdown(){	

	 $_error_type = array(
		E_ERROR => 'ERROR', E_WARNING => 'WARNING', E_PARSE => 'Parse Error',
		E_NOTICE => 'Notice', E_CORE_ERROR => 'CORE ERROR', E_CORE_WARNING => 'Core Warning',
		E_COMPILE_ERROR => 'Compile Error', E_COMPILE_WARNING => 'Compile Warning',
		E_USER_ERROR => 'User Error', E_USER_WARNING => 'User Warning', E_USER_NOTICE => 'User Notice',
		E_STRICT => 'Strict Error', E_RECOVERABLE_ERROR => 'Recoverable Error',
		E_DEPRECATED => 'Deprecated', E_USER_DEPRECATED => 'User Deprecated'
    );
	
    if(error_get_last()!== null){

        $e=error_get_last();        
        if(is_array($e) || is_object($e)){
        	        	
        	$_error_file_segment=explode(DIRECTORY_SEPARATOR,$e['file']);        	
        	$_plugin_dir_segment=basename(__DIR__);

        	if( in_array($_plugin_dir_segment,$_error_file_segment) ){

	        	if (!file_exists(EO_WBC_PLUGIN_DIR.'eo_debug.txt')) {
					$_file=fopen(EO_WBC_PLUGIN_DIR.'eo_debug.txt', 'w');
					fclose($_file);
				}         
				
				$log=array();
				$log[]='['.date( 'M d Y H:i:s' ).'] ';
				$log[]=$_error_type[(int)$e['type']].' in ';
				$log[]=$e['file'];
				$log[]=' at line number '.$e['line'];
				$log[]=PHP_EOL;
				$log[]=json_encode($e['message']);
				$log[]=PHP_EOL;

	     	   	error_log(implode($log),3,EO_WBC_PLUGIN_DIR.'eo_debug.txt');
	     	   	
	     	   	if((int)$e['type']<=4){
	     	   		update_option('eo_wbc_error_report',get_option('eo_wbc_error_report',0)+1);	
	     	   	}	     	   	
     	   }
    	}
    }
}

function EO_WBC_Log_Message($msg){
	if(empty($msg)) return false;	

	$_error_type = array(
		E_ERROR => 'ERROR', E_WARNING => 'WARNING', E_PARSE => 'Parse Error',
		E_NOTICE => 'Notice', E_CORE_ERROR => 'CORE ERROR', E_CORE_WARNING => 'Core Warning',
		E_COMPILE_ERROR => 'Compile Error', E_COMPILE_WARNING => 'Compile Warning',
		E_USER_ERROR => 'User Error', E_USER_WARNING => 'User Warning', E_USER_NOTICE => 'User Notice',
		E_STRICT => 'Strict Error', E_RECOVERABLE_ERROR => 'Recoverable Error',
		E_DEPRECATED => 'Deprecated', E_USER_DEPRECATED => 'User Deprecated'
    );

	if (!file_exists(EO_WBC_PLUGIN_DIR.'eo_debug.txt')) {
		$_file=fopen(EO_WBC_PLUGIN_DIR.'eo_debug.txt', 'w');
		fclose($_file);
	}         
	
	$log=array();
	$log[]='['.date( 'M d Y H:i:s' ).'] ';
	$log[]='User Error';
	$log[]='-----';
	$log[]='-----';
	$log[]=PHP_EOL;
	$log[]=$msg;
	$log[]=PHP_EOL;

   	error_log(implode($log),3,EO_WBC_PLUGIN_DIR.'eo_debug.txt');
   	update_option('eo_wbc_error_report',get_option('eo_wbc_error_report',0)+1);
}

register_shutdown_function('EO_WBC_Shutdown');
