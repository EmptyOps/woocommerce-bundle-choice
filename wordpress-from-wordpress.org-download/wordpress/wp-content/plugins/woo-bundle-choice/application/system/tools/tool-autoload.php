<?php
/**
*	The autoloader function
*	- load class,interface,traits alike
*	- use PSR-0 autloader standard
*/

defined( 'ABSPATH' ) || exit;

spl_autoload_register(function( $class ) {
	// First, separate the components of the incoming file.
	$path = explode( '\\', $class );

	if((empty($path[0]) or empty($path[1])) or $path[0] !== 'eo' or $path[1] !== 'wbc') return;

	// Test passed, so additional check is not needed [locate and load file]
	unset($path[0]);
	unset($path[1]);
	
	$path = array_filter(array_values($path));

	// Get the last index of the array. This is the class we're loading.
	if ( isset( $path[ count( $path ) - 1 ] ) ) {
		$class_file = strtolower( $path[ count( $path ) - 1 ] );

		// The classname has an underscore, so we need to replace it with a hyphen for the file name.
		$class_file = str_ireplace( '_', '-', $class_file );
		$class_file = "${class_file}.php";

	} else {

		return;
	}

	/**
	 * Find the fully qualified path to the class file by iterating through the $file_path array.
	 * We ignore the first index since it's always the top-level package. The last index is always
	 * the file so we append that at the end.
	 */
	$plugin_dir = trailingslashit(constant('EOWBC_DIRECTORY'));


	array_walk($path,function($path_part,$path_index) use(&$path){
		$path[$path_index] = trailingslashit($path_part);
	});

	array_pop($path);

	$path = $plugin_dir.trailingslashit('application').implode('',$path).$class_file;
			
	// Now we include the file.	
	if ( file_exists( $path ) ) {	
		include_once( $path );
	} else {
		error_log($path);	
	}
});

