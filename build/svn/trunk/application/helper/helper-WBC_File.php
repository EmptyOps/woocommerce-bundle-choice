<?php 
defined( 'ABSPATH' ) || exit;

class WBC_File {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function directory_separator() {
	
		return DIRECTORY_SEPARATOR;	
	}

	//	NOTE: for extracting extension from filename or path only, for urls use the url function
	public function extension_from_path($filepath) {
	
		return strtolower( pathinfo($filepath, PATHINFO_EXTENSION) );	
	}

	public function file_exists($filepath) {
		return file_exists( $filepath );
	}

	/**
	 *
	 */
	public function file_write( $filepath, $content )
	{
		$fp = fopen( $filepath, "w") or die("Unable to open file ".$filepath);
		fwrite( $fp, $content);
		fclose( $fp );
	}

	/**
	 *
	 */
	public  function file_read( $filepath )
	{
		$content = null;

		if( $this->file_exists($filepath) ) {
			
			$fp = fopen($filepath, "r");

			$content = fread($fp, filesize($filepath));
			fclose($fp);
		}

		return $content;
	}

	/**
	 *
	 */
	public function file_lines( $filepath )
	{
		return file( $filepath );
	}

	public function rename_file($source, $dest) {
		return rename( $source, $dest );
	}

	public function delete_file($filepath) {
		return $this->unlink($filepath);
	}

	public function unlink($filepath) {
		return unlink( $filepath );
	}

	//	not supporting recursion yet, and when we support recursion as a simple precaution GET based param or something of that sort that requires devs to specify in URL or so would save from disasters some time. but anyway the ultimate solution is always follow the backup and workflow policies accurately like working max on staging domain and never even debug such things on live. so debug at max on staging only. 
	public function list_files( $in_dir, $filter_by=null ) {

		$files = array();
		$source = $in_dir;

		$dir = opendir( $source );
		while( false !== ( $file = readdir( $dir ) ) )
		{
			if ( ( $file != '.' ) && ( $file != '..' ) )
			{
				if( is_dir( $source . '/' . $file ) )
				{

					//	implement recursion here 
				}
				else
				{

					if( empty($filter_by) or strpos($file, $filter_by) !== FALSE ) {

						$files[] = $source . '/' . $file;
					}
				}
			}
		}
		closedir($dir);

		return $files;
	}

	//	not supporting recursion yet, and when we support recursion as a simple precaution GET based param or something of that sort that requires devs to specify in URL or so would save from disasters some time. but anyway the ultimate solution is always follow the backup and workflow policies accurately like working max on staging domain and never even debug such things on live. so debug at max on staging only. 
	public function delete_files( $in_dir, $filter_by=null ) {
		
		$files = $this->list_files( $in_dir, $filter_by );

		foreach ($files as $key => $file) {

			$this->unlink($file);				
		}
	}

	public function save_json($filepath, $data) {
		return $this->file_write( $filepath, json_encode($data) );
	}

	public function get_json($filepath) {
		return json_decode( $this->file_read( $filepath ), true );
	}

	public function save_csv($filepath, $rows, $header_row=null, $is_append=false) {
		
		// Open a file in write mode ('w')
		$fp = fopen($filepath, (empty($is_append) ? 'w' : 'a'));

		// TODO if required we may need to provide support for generating header_row here
		    
	    if(!empty($header_row)) {

	    	fputcsv($fp, $header_row);

	    }

		// Loop through file pointer and a line
		foreach ($rows as $fields) {
		    fputcsv($fp, $fields);
		}
		  
		fclose($fp);

		return true;
	}

	// public function get_csv($filepath) {
	// 	return json_decode( $this->file_read( $filepath ), true );
	// }

	// /* 
	//   filename without extension 
	//   ex: file_core_name('toto.jpg') -> 'toto'
	// */
	// function file_core_name($file_name)
	// {
	// 	$exploded = explode('.', $file_name);
 
	// 	// if no extension
	// 	if (count($exploded) == 1)
	// 	{
	// 		return $file_name;
	// 	}
 
	// 	// remove extension
	// 	array_pop($exploded);
 
	// 	return implode('.', $exploded);
	// }
	 
	// /* 
	//   file extension 
	//   ex: file_extension('toto.jpg') -> 'jpg'
	// */
	 
	// if ( ! function_exists('file_extension'))
	// {
	// 	function file_extension($path)
	// 	{
	// 		$extension = substr(strrchr($path, '.'), 1);
	// 		return $extension;
	// 	}
	// }
	 
	// /* 
	//   file size 
	//   ex: file_size('toto.jpg') -> '3.3 MB'
	// */
	// if ( ! function_exists('file_size'))
	// {
	// 	function file_size($path)
	// 	{
	// 		$num = filesize($path);
	 
	// 		// code from byte_format()
	// 		$CI =& get_instance();
	// 		$CI->lang->load('number');
	 
	// 		$decimals = 1;
	 
	// 		if ($num >= 1000000000000) 
	// 		{
	// 			$num = round($num / 1099511627776, 1);
	// 			$unit = $CI->lang->line('terabyte_abbr');
	// 		}
	// 		elseif ($num >= 1000000000) 
	// 		{
	// 			$num = round($num / 1073741824, 1);
	// 			$unit = $CI->lang->line('gigabyte_abbr');
	// 		}
	// 		elseif ($num >= 1000000) 
	// 		{
	// 			$num = round($num / 1048576, 1);
	// 			$unit = $CI->lang->line('megabyte_abbr');
	// 		}
	// 		elseif ($num >= 1000) 
	// 		{
	// 			$decimals = 0; // decimals are not meaningful enough at this point
	 
	// 			$num = round($num / 1024, 1);
	// 			$unit = $CI->lang->line('kilobyte_abbr');
	// 		}
	// 		else
	// 		{
	// 			$unit = $CI->lang->line('bytes');
	// 			return number_format($num).' '.$unit;
	// 		}
	 
	// 		$str = number_format($num, $decimals).' '.$unit;
	 
	// 		$str = str_replace(' ', '&nbsp;', $str);
	// 		return $str;
	// 	}
	// }


	// /**
	//  * return file name with extension from path provided
	//  */
	// function hefile_fileName( $path )
	// {
	// 	return basename( $path );
	// }


	// /**
	//  * tells weather given path is file
	//  */
	// function hefile_isFile( $path )
	// {
	// 	return is_file( BASE_DIR.$path );
	// }

	// /**
	//  * tells weather given path is directory
	//  */
	// function hefile_isDir( $path )
	// {
	// 	return is_dir( BASE_DIR.$path );
	// }

	// /**
	//  * check file exists: wrapper function
	//  */
	// function hefile_isFileExistsByExtType( $path, $filetype )
	// {
	// 	$allowed_types = array();
	// 	if($filetype == 'image') 	
	// 	{	$allowed_types = array( "gif", "jpg", "png", "jpeg", "JPEG" ); 	}
		
	// 	foreach ($allowed_types as $k=>$ar)
	// 	{
	// 		if( file_exists( BASE_DIR.$path.".".$ar ) )
	// 		{
	// 			return $ar;
	// 		}
	// 	}
		
	// 	return FALSE;
	// }


	// /**
	//  * check directory exists: wrapper function
	//  */
	// function hefile_isDirExists( $path, $is_abs_path=false )
	// {
	// 	if( !$is_abs_path )
	// 		return file_exists( BASE_DIR.$path );
	// 	else
	// 		return file_exists( $path );
		
	// }

	public function dir_exists($dirpath) {
		return file_exists( $dirpath );
	}

	// /**
	//  * make dir: wrapper function
	//  */
	// function hefile_mkDirectory( $path )
	// {
	// 	return mkdir( BASE_DIR.$path );
	// }

	// /**
	//  * create directory: wrapper function
	//  * 
	//  * @param $is_abs_path weather the path specfied is absolute if yes then no need of appending BASE_DIR
	//  */
	// function hefile_createDir( $dir, $is_abs_path=false )
	// {
	// 	if( !$is_abs_path )
	// 		return mkdir( BASE_DIR . $dir );
	// 	else 
	// 		return mkdir( $dir );
	// }

	public function create_dir($dirpath) {
		return mkdir( $dirpath );
	}

	public function dir_first_file($dirpath, $file_extension='csv') {

		// Get the list of files and directories in the directory
		$fileList = scandir($dirpath);

		// Filter out directories and get the first file
		$firstFilePath = null;

		foreach ($fileList as $file) {

	    	$filePath = $dirpath . $this->directory_separator() . $file;

	    	if (is_file($filePath)) {

		        if( $this->extension_from_path($filePath) == $file_extension ) {

		        	$firstFilePath = $filePath;

			        break; // Stop the loop after finding the first file
		        }	
		    }
		}

		return $firstFilePath;
			
	}

	// /**
	//  * copy file: wrapper function
	//  */
	// function hefile_copyFile( $source, $dest )
	// {
	// 	return copy( BASE_DIR.$source, BASE_DIR.$dest );
	// }

	// /**
	//  * copy dir: wrapper function
	//  */
	// function hefile_copyDir( $source, $dest )
	// {
	// 	/**
	// 	 * creat destination directory if not exists
	// 	 */
	// 	if( !hefile_isDirExists( $dest, true ) )
	// 	{
	// 		hefile_createDir( $dest, true );
	// 	}
		
	// 	$dir = opendir( $source );
	// 	while( false !== ( $file = readdir( $dir ) ) )
	// 	{
	// 		if ( ( $file != '.' ) && ( $file != '..' ) )
	// 		{
	// 			if( is_dir( $source . '/' . $file ) )
	// 			{
	// 				hefile_copyDir($source . '/' . $file,$dest . '/' . $file);
	// 			}
	// 			else
	// 			{
	// 				copy( $source . '/' . $file, $dest . '/' . $file );
	// 			}
	// 		}
	// 	}
	// 	closedir($dir);
	// }

	// /**
	//  * rename file: wrapper function
	//  */
	// function hefile_rename( $source, $dest )
	// {
	// 	return rename( BASE_DIR.$source, BASE_DIR.$dest );
	// }

	// /**
	//  *
	//  */
	// function hefile_fileWrite( $filename, $content )
	// {
	// 	$fp = fopen( BASE_DIR . $filename, "w") or die("Unable to open file!");
	// 	fwrite( $fp, $content);
	// 	fclose( $fp );
	// }

	// /**
	//  *
	//  */
	// function hefile_fileRead( $filename )
	// {
	// 	return file_get_contents( BASE_DIR.$filename );
	// }

	// /**
	//  *
	//  */
	// function hefile_fileLines( $filename )
	// {
	// 	return file( BASE_DIR.$filename );
	// }


	// /**
	//  * @abstract
	//  */
	// function hefile_convertPdfToText( $file_pdf, $file_text )
	// {
	// 	$command = "pdftotext -layout ".$file_pdf." ".$file_text;
	// 	exec( $command );
	// }

	/**
	 * deletes the file
	 */
	function hefile_imfile_remove( $filename )
	{
		return unlink( BASE_DIR.$filename );
	}

	// /**
	//  * remove dir : wrapper function
	//  */
	// function hefile_removeDir( $dirPath )
	// {
	// 	return rmdir( BASE_DIR . $dirPath ); 
	// }

	// /**
	//  * remove dir recursive: wrapper function
	//  */
	// function hefile_removeDirRecursive( $dirPath, $is_abs_path=false )
	// {
	// 	/**
	// 	 * return if not exists
	// 	 */
	// 	if( !hefile_isDirExists( $dirPath ) )
	// 	{
	// 		return FALSE;
	// 	}

	// 	if( substr($dirPath, strlen($dirPath) - 1, 1) != '/' ) 
	// 	{
	// 		$dirPath .= '/';
	// 	}
		
	// 	$files;
	// 	//fixed a bug on 17-07-2017
	// 	if( !$is_abs_path )
	// 		$files = glob( BASE_DIR . $dirPath . '*', GLOB_MARK);
	// 	else 
	// 		$files = glob( $dirPath . '*', GLOB_MARK);
	// 	foreach ($files as $file) 
	// 	{
	// // 		echo "here 1 ".$file."<br>";
	// 		if (is_dir($file)) 
	// 		{
	// // 			echo "here 2 ".$file."<br>";
	// 			hefile_removeDirRecursive($file, true);
	// 		} 
	// 		else 
	// 		{
	// // 			echo "here 3 ".$file."<br>";
	// 			unlink($file);
	// 		}
	// 	}
	// 	rmdir($dirPath);
		
	// 	return TRUE;
	// }

	// /**
	//  * remove particular directory from path, like "u/" directory since FTP conn made to asset directory directly
	//  * e.g. @param $dirToRemove= "u/" remove that and replace with @param $replace optional default to ""(empty)
	//  */
	// function hefile_removeDirFromPath( $path, $dirToRemove, $replace="" )
	// {
	// 	return str_replace($dirToRemove, $replace, $path);
	// }

}

function wbc_extension_from_path($filepath) {

	return wbc()->file->extension_from_path($filepath);
}


function wbc_file_exists($filepath) {

	return wbc()->file->file_exists($filepath);

}

function wbc_file_write( $filepath, $content )
{

	return wbc()->file->file_write($filepath, $content);

}

function wbc_file_read( $filepath )
{

	return wbc()->file->file_read($filepath);
	
}

function wbc_file_lines( $filepath )
{

	return wbc()->file->file_lines($filepath);

}

function wbc_rename_file($source, $dest) {

	return wbc()->file->rename_file($source, $dest);

}

function wbc_delete_file($filepath) {

	return wbc()->file->delete_file($filepath);

}

function wbc_unlink($filepath) {

	return wbc()->file->unlink($filepath);

}

function wbc_list_files( $in_dir, $filter_by=null ) {

	return wbc()->file->list_files($in_dir, $filter_by);

}

function wbc_delete_files( $in_dir, $filter_by=null ) {
	
	return wbc()->file->delete_files($in_dir, $filter_by);

}

function wbc_save_json($filepath, $data) {

	return wbc()->file->save_json($filepath, $data);

}

function wbc_get_json($filepath) {

	return wbc()->file->get_json($filepath);

}