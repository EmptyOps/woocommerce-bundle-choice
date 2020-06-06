<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Filters {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}


	public function get( $form_definition ) {
		
		//loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	//loop through form fields and read values from options and store in the form_definition 
			foreach ($tab["form"] as $fk => $fv) {
				if( $fv["type"] == "table" ) {
					$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));

					$fv["body"] = array();
					foreach ($filter_data as $rk => $rv) {
						$row = array();

						//
						$row[] =array(
								'is_header' => 0, 
								'val' => '',
								'is_checkbox' => true, 
								'checkbox'=> array('id'=>'dummy','value'=>array('row0_col0_chk'),'options'=>array('row0_col0_chk'=>''),'class'=>'','where'=>'in_table')
							);
						foreach ($rv as $rvk => $rvv) {
							$row[] = $rvv;
						}

						$fv["body"][] = $row;
					}
				}
				else {
					$form_definition[$key]["form"][$fk]["value"] = wbc()->options->get_option('filters_'.$key,$fk, isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '');	
				}
			    
			}
	    }

	    return $form_definition;
	}


	public function save( $form_definition ) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty($_POST["saved_tab_key"]) ? $_POST["saved_tab_key"] : ""; 
		
	    //loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	if( $key != $saved_tab_key ) {
	    		continue;
	    	}

			$is_table_save = $key != "altr_filt_widgts" ? true : false;
			$table_data = array();

	    	foreach ($tab["form"] as $fk => $fv) {
			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set
			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && isset($_POST[$fk]) ) {
			    	if( $is_table_save ) {
			    		$table_data[$fk] = (empty($_POST[$fk])? '': sanitize_text_field( $_POST[$fk] ) ); 
			    	}
			    	else {
			    		wbc()->options->update_option('filters_'.$key,$fk,(empty($_POST[$fk])? '': sanitize_text_field( $_POST[$fk] ) ) );
			    	}
			    }
			}

			if( $is_table_save ) {

				$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
		        
		        foreach ($filter_data as $key=>$item) {
		            
		            if ($item['name']==$table_data["filter"]) { 
		                $res["type"] = "error";
		    			$res["msg"] = eowbc_lang('Filter Already Exists');
		                return $res;
		            }
		        }

		        $filter_data[] = $table_data;

		        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );
		        $res["msg"] = eowbc_lang('New Filter Added Successfully'); 
			}

	    }

        return $res;
	}
	
}
