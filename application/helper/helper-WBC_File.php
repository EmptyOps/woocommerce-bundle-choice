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

	public function file_exists($filepath) {
		
	}

	public function rename_file($filepath) {
		
	}

	public function delete_file($filepath) {
		
	}

	public function unlink($filepath) {
		
	}

	public function save_json($filepath, $data) {
		throw new Exception("Implement...", 1);
		
	}

	public function get_json($filepath) {
		
	}

}
