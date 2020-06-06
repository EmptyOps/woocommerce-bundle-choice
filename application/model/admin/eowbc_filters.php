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
					// wbc()->options->update_option_group( 'filters_'.$key, serialize(array()) );
					$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
					// wbc()->common->pr($filter_data, false, false);

					$body = array();
					foreach ($filter_data as $rk => $rv) {
						$row = array();

						//
						$row[] =array(
								'val' => '',
								'is_checkbox' => true, 
								'checkbox'=> array('id'=>$key.$rv[$key.'_filter'],'value'=>array(),'options'=>array($rv[$key.'_filter']=>''),'class'=>'','where'=>'in_table')
							);

						foreach ($rv as $rvk => $rvv) {
							//skip the id
							if( $rvk == $key."_dependent" || $rvk == $key."_type" ) {
								continue;
							}

							$row[] = array( 'val' => $rvv );
						}

						$body[] = $row;
					}

					$form_definition[$key]["form"][$fk]["body"] = $body;
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
		$skip_fileds = array('saved_tab_key');
		
	    //loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	if( $key != $saved_tab_key ) {
	    		continue;
	    	}

			$is_table_save = $key != "altr_filt_widgts" ? true : false;
			$table_data = array();
			$tab_specific_skip_fileds = $is_table_save ? array('eowbc_price_control_methods_list_bulk','eowbc_price_control_sett_methods_list_bulk') : array();

	    	foreach ($tab["form"] as $fk => $fv) {

			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set
			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && isset($_POST[$fk]) ) {
			    	//skip fields where applicable
					if( in_array($fk, $skip_fileds) ) {
		    			continue;
		    		}

		    		if( in_array($fk, $tab_specific_skip_fileds) ) {
		    			continue;
		    		}

		    		//save
			    	if( $is_table_save ) {
			    		if( $fk == "d_fconfig_ordering" || $fk == "s_fconfig_ordering" ) {
				    		$table_data[$fk] = (int)$_POST[$fk]; 	
			    		}
			    		else {
			    			$table_data[$fk] = (empty($_POST[$fk])? $_POST[$fk]: sanitize_text_field( $_POST[$fk] ) ); 
			    		}
			    	}
			    	else {
			    		wbc()->options->update_option('filters_'.$key,$fk,(empty($_POST[$fk])? $_POST[$fk]: sanitize_text_field( $_POST[$fk] ) ) );
			    	}
			    }
			}

			if( $is_table_save ) {

				$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
		        
		        foreach ($filter_data as $fdkey=>$item) {
		            
		            if ($item[$key.'_filter']==$table_data[$key."_filter"]) { 
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

	public function delete( $ids, $saved_tab_key ) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
    	$key = $saved_tab_key;

		$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
		$filter_data_updated = array();
        
        $delete_cnt = 0;
        foreach ($filter_data as $fdkey=>$item) {
            
            if ( !in_array($item[$key."_filter"], $ids) ) { 
                $filter_data_updated[] = $item; 
            }
            else {
            	$delete_cnt++;
            }
        }

        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data_updated) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deleted'); 

        return $res;
	}
	
}
