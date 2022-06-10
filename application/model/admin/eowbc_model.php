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

	public function activate_deactivate( $ids, $saved_tab_key ,$by_key=false) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
    	$key = $saved_tab_key;
    	
    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);

		$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
		$filter_data_updated = array();
        
        $delete_cnt = 0;
        foreach ($filter_data as $fdkey=>$item) {
            if($by_key and in_array($fdkey, $ids)){
            	$filter_data[$fdkey][$key_clean."_add_enabled"]=1;
                $delete_cnt++;
            } 
            // since it was generating undefined index warning, added isset at first in below condition, but I believe this condition has no use and should be removed. 
            elseif (isset($item[$key."_filter"]) && in_array($item[$key."_filter"], $ids)) { 
                //$filter_data_updated[] = $item; 
                $filter_data[$fdkey][$key_clean."_add_enabled"]=1;
                $delete_cnt++;
            }            
        }

        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) activated'); 

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

