<?php


/*
*	WBC base Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Model {

	private static $_instance = null;

	protected $tab_key_prefix = '';

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}


	public function get( $form_definition ) {

	    return $form_definition;
	}

	public function save( $form_definition, $is_auto_insert_for_template=false ) {

        return $res;
	}

	public function delete( $ids, $key/*,$by_key=false*/, $check_by_id=false ) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    $res["key"] = $key;
    	// $key = $saved_tab_key;

   	
		$list_data = unserialize(wbc()->options->get_option_group($key,"a:0:{}"));
		$res["keydata"] = array_keys($list_data);
		$list_data_updated = array();
        
        $delete_cnt = 0;
        foreach ($list_data as $fdkey=>$item) {
            
            if( !in_array( (($check_by_id and isset($item["id"])) ? $item["id"] : $fdkey), $ids)) {
            	$list_data_updated[$fdkey] = $item; 
            }
            else {
            	$delete_cnt++;
            }
        }

        wbc()->options->update_option_group( $key, serialize($list_data_updated) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deleted'); 

        return $res;
	}

	// commented due to param mismatch, in child class fix the number of param and then uncomment it
	// public function activate( $ids, $saved_tab_key ,$by_key=false) {

 //        return $res;
	// }

	// commented due to param mismatch, in child class fix the number of param and then uncomment it
	// public function deactivate( $ids, $saved_tab_key ,$by_key=false) {

 //        return $res;
	// }

	public function fetch_filter(&$res) {

		return $res;
	}	
}

