<?php

defined( 'ABSPATH' ) || exit;

class Migration_010004 {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}
	
	public static function run() {
		self::instance()->db();
		self::instance()->option();
	}

	public function db() {

	}

	public function option() {
		
		$mapping = unserialize(wbc()->options->get('eowbc_option_mapping_map_creation_modification','a:0:{}'));

		//$mapping = unserialize(get_option('eo_wbc_cat_maps',"a:0:{}"));
		if(!empty($mapping) and is_array($mapping)){
			//$new_mapping = array();
			foreach ($mapping as $map_key => $map_value) {
				
				if(empty($map_value['eo_wbc_first_category_range'])){
					$mapping[$map_key]['range_first'] = false;
				}

				if(empty($map_value['eo_wbc_second_category_range'])){
					$mapping[$map_key]['range_second'] = false;
				}				             
			}			
			
			wbc()->options->set('eowbc_option_mapping_map_creation_modification',serialize($mapping));			
		}		
	}
}