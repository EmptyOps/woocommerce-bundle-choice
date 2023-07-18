<?php 

if(!empty($path) and file_exists($path.'.php')) {
	ob_start();
	require $path.'.php';
	echo ob_get_clean();		
}
