<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/eowbc_model');

class Eowbc_Theme_Adaption extends Eowbc_Model {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function get( $form_definition, $args = null ) {
		
		$page_slug = wbc()->sanitize->get('page');
		$plugin_slug = explode("---", $page_slug)[0];
		$theme_adaption_config = apply_filters('sp_wbc_theme_adaption_config',$plugin_slug);

		//loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {

	    	//loop through form fields and read values from options and store in the form_definition 
			foreach ($tab["form"] as $fk => $fv) {
				if( $fv["type"] == "table" ) {

					if( $fv['id'] == 'eowbc_run_check_list' ) {

						$body = array();
						foreach ($theme_adaption_config['widget_sections'] as $rk => $rv) {

							$row = array();

							//
							// $row[] =array(
							// 		'is_header' => 0, 
							// 		'val' => '',
							// 		'is_checkbox' => true, 
							// 		'checkbox'=> array('id'=>'','value'=>array(),'options'=>array(0=>''),'class'=>'','where'=>'in_table')
							// 	);

							$row[] = array( 'val' => $rk );
							$row[] = array('val' => "<a href=\"" . esc_url(wbc()->common->site_url($rv['test_slug'], 'thadc=1&test_sec_key=' . $rk)) . "\" target=\"_blank\">Check</a>" /*,'link'=>1,'edit_id'=>$rk*/ );
							$row[] = array( 'val' => 'Failing' );

							$body[] = $row;
						}

					}
					elseif( $fv['id'] == 'eowbc_result_list' ) {

						$theme_adcheck_result = wbc()->options->get_option_group('thadcr_'.$plugin_slug,array());
						$body = array();
						foreach ($theme_adcheck_result as $curr_theme_key => $sections) {

							$row = array();
							$row[] = array( 'val' => 'Theme => ' . $curr_theme_key, 'colspan'=>6 );
							$body[] = $row; 

							foreach ($sections as $section_key => $section) {

								$row = array();
								$row[] = array( 'val' => $section_key );

								foreach ($section as $required_key => $items) {

									$row_new = $row;
									$row_new[] = array( 'val' => $required_key );
									foreach ($items as $itemkey => $item) {

										$row_new_new = $row_new;
										$row_new_new[] = array( 'val' => $item['key'] );
										$row_new_new[] = array( 'val' => $item['type'] );
										$row_new_new[] = array( 'val' => $item['tested_on_url'] );
										$row_new_new[] = array( 'val' => $item['result'] );
										$body[] = $row_new_new; 
									}

								}	
								
							}

						}

					}
					else {
						// wbc()->options->update_option_group( 'theme_adaption_'.$key, serialize(array()) );
						$theme_adaption_data = unserialize(wbc()->options->get_option_group('theme_adaption_'.$key,"a:0:{}"));
						//wbc()->common->pr($theme_adaption_data, false, false);

						$body = array();
						foreach ($theme_adaption_data as $rk => $rv) {
							$row = array();

							//
							$row[] =array(
									'is_header' => 0, 
									'val' => '',
									'is_checkbox' => true, 
									'checkbox'=> array('id'=>$rv["id"],'value'=>array(),'options'=>array($rv["id"]=>''),'class'=>'','where'=>'in_table')
								);

							// foreach ($rv as $rvk => $rvv) {
							foreach ($form_definition[$key]["form"][$fk]["head"][0] as $ck => $cv) {
								if(empty($cv["field_id"])) { continue; }
								$rvk = $cv["field_id"];
								$rvv = ( !isset($rv[$rvk]) || wbc()->common->nonZeroEmpty($rv[$rvk]) ) ?  "" : $rv[$rvk];

								//skip the id and other applicable fields 
								if( $rvk == "id" || $rvk == "range_first" || $rvk == "range_second" || $rvk == "eo_wbc_first_category_range" || $rvk == "eo_wbc_second_category_range" ) {
									continue;
								}
								
								if( $rvk == "eo_wbc_first_category" ) {								
									if( strpos($rvv, 'pid_')===0 ){
										
										$product = wbc()->wc->get_product((int)substr($rvv,4));

										$row[] = array( 'val' => ((is_wp_error($product) or empty($product))? '':$product->get_name()),'link'=>1,'edit_id'=>$rk);	
									}
									elseif( wbc()->common->nonZeroEmpty($rv["eo_wbc_first_category_range"]) || wbc()->common->nonZeroEmpty($rv["range_first"]) ) {
										
										$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
										$row[] = array( 'val' => !is_array($val)?$val:$val["label"] ,'link'=>1,'edit_id'=>$rk);	
									}
									else {									
										$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
										$val1 = wbc()->common->dropdownSelectedvalueText($tab["form"]["eo_wbc_first_category_range"], $rv["eo_wbc_first_category_range"]);
										$row[] = array( 'val' =>  "Range from <strong>".esc_html(!is_array($val)?$val:$val["label"])."</strong> to <strong>".esc_html(!is_array($val1)?$val1:$val1["label"])."</strong>" ,'link'=>1,'edit_id'=>$rk);
									}	
								}
								else if( $rvk == "eo_wbc_second_category" ) {
									if( strpos($rvv, 'pid_')===0 ){
										
										$product = wbc()->wc->get_product((int)substr($rvv,4));

										$row[] = array( 'val' => ((is_wp_error($product) or empty($product))? '':$product->get_name()));	

									} elseif( wbc()->common->nonZeroEmpty($rv["eo_wbc_second_category_range"]) || wbc()->common->nonZeroEmpty($rv["range_second"]) ) {
										$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
										$row[] = array( 'val' => !is_array($val)?$val:$val["label"] );
									}
									else {
										$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
										$val1 = wbc()->common->dropdownSelectedvalueText($tab["form"]["eo_wbc_second_category_range"], $rv["eo_wbc_second_category_range"]);
										$row[] = array( 'val' => "Range from <strong>".esc_html(!is_array($val)?$val:$val["label"])."</strong> to <strong>".esc_html(!is_array($val1)?$val1:$val1["label"])."</strong>" );
									}	
								}
								else {
									$row[] = array( 'val' => $rvv );	
								}
							}

							$body[] = $row;
						}
						
					}
					
					$form_definition[$key]["form"][$fk]["body"]= $body;
				}
				else {
					$form_definition[$key]["form"][$fk]["value"] = wbc()->options->get_option('theme_adaption_'.$key,$fk, isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '');	
				}
			    
			}
	    }

	    return $form_definition; 
	}

	public function save( $form_definition, $is_auto_insert_for_template=false, $args = null ) {
		
		wbc()->sanitize->clean($form_definition);
		wbc()->validate->check($form_definition);
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty(wbc()->sanitize->post("saved_tab_key")) ? wbc()->sanitize->post("saved_tab_key") : ""; 
		$skip_fileds = array('saved_tab_key');
		
	    //loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	if( $key != $saved_tab_key ) {
	    		continue;
	    	}

			$is_table_save = $key != "prod_theme_adaption_pref" ? true : false;
			$table_data = array();
			$tab_specific_skip_fileds = $is_table_save ? array('eowbc_price_control_methods_list_bulk') : array();

	    	foreach ($tab["form"] as $fk => $fv) {

			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set

			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && (isset($_POST[$fk]) || $fv["type"]=='checkbox')) {
			    	//skip fields where applicable
					if( in_array($fk, $skip_fileds) ) {
		    			continue;
		    		}

		    		if( in_array($fk, $tab_specific_skip_fileds) ) {
		    			continue;
		    		}

		    		//save
			    	if( $is_table_save ) {
			    		$table_data[$fk] = ( isset($_POST[$fk]) ? wbc()->sanitize->post($fk) : '' ); 
			    	}
			    	else {

			    		wbc()->options->update_option('theme_adaption_'.$key,$fk,(isset($_POST[$fk])? wbc()->sanitize->post($fk):'' ));
			    	}
			    }
			}

			if( $is_table_save ) {

				// global $wpdb;        
		  //       $eo_wbc_first_category=$_POST['eo_wbc_first_category'];
		  //       $eo_wbc_second_category=$_POST['eo_wbc_second_category'];

		  //       if(!empty($_POST['range_first'])) {
		  //           $eo_wbc_first_category=$eo_wbc_first_category.','.$_POST['eo_wbc_first_category_range'];
		  //       }    
		        
		  //       if(!empty($_POST['range_second'])) {
		  //           $eo_wbc_second_category=$eo_wbc_second_category.','.$_POST['eo_wbc_second_category_range'];
		  //       }

		  //       $eo_wbc_add_discount=$_POST['eo_wbc_add_discount']?$_POST['eo_wbc_add_discount']:0;

				$theme_adaption_data = unserialize(wbc()->options->get_option_group('theme_adaption_'.$key,"a:0:{}"));
				//print_r($theme_adaption_data);
				//die();
		        if(!empty(wbc()->sanitize->post('map_creation_modification_id')) and !empty($theme_adaption_data[wbc()->sanitize->post('map_creation_modification_id')])) {
		        	$table_data["id"] = wbc()->common->createUniqueId();
		        	$theme_adaption_data[wbc()->sanitize->post('map_creation_modification_id')] = $table_data;
		        	wbc()->options->update_option_group( 'theme_adaption_'.$key, serialize($theme_adaption_data) );
		        	//update cache
			        \Cache_Manager::getInstance()->update_map_caches();
		        	$res["msg"] = eowbc_lang('Theme_Adaption Updated Successfully'); 
		        	return $res;
			        
		        } else{
			        foreach ($theme_adaption_data as $fdkey=>$value) {
			            
			            $match_found = false;
			            // foreach ($item as $key=>$value) {    

			                if(($value["eo_wbc_first_category"]==$table_data["eo_wbc_first_category"] and $value["eo_wbc_first_category_range"]==$table_data["eo_wbc_first_category_range"]) and ($value["eo_wbc_second_category"]==$table_data["eo_wbc_second_category"] and $value["eo_wbc_second_category_range"]==$table_data["eo_wbc_second_category_range"])) {                 
			                    $match_found = true;
			                    break;
			                } elseif(($value["eo_wbc_second_category"]==$table_data["eo_wbc_first_category"] and $value["eo_wbc_second_category_range"]==$table_data["eo_wbc_first_category_range"]) and ($value["eo_wbc_first_category"]==$table_data["eo_wbc_second_category"] and $value["eo_wbc_first_category_range"]==$table_data["eo_wbc_second_category_range"])) {
			                    $match_found = true;
			                    break;
			                }
			            // }

			            if ($match_found) { 
			                $res["type"] = "error";
			    			$res["msg"] = eowbc_lang('Theme_Adaption Already Exists');
			                return $res;
			            }
			        }
			    }

				$table_data["id"] = wbc()->common->createUniqueId();
		        $theme_adaption_data[$table_data["id"]] = $table_data;

		        wbc()->options->update_option_group( 'theme_adaption_'.$key, serialize($theme_adaption_data) );

		        //update cache
		        \Cache_Manager::getInstance()->update_map_caches();

		        // TODO here it is better if we set it to 1 only if length of theme_adaption_data is greater than zero and otherwise set to 0 if user removes maps and so on 
				wbc()->options->update_option('configuration','config_map',1);

		        $res["msg"] = eowbc_lang('New Theme_Adaption Added Successfully'); 
			}

	    }

        return $res;
	}

	public function delete( $ids, $saved_tab_key, $check_by_id=false ) {
		$check_by_id=true;
        return parent::delete( $ids, 'theme_adaption_'.$saved_tab_key, $check_by_id );
	}

	public function fetch_map(&$res) {
		$map = unserialize(wbc()->options->get_option_group('theme_adaption_map_creation_modification'));		
		
		if(!empty($map[wbc()->sanitize->post('id')])){
			$res['msg'] = json_encode($map[wbc()->sanitize->post('id')]);
		} else {
			$res['type'] = 'error';
			$res['msg'] = 'Selected item does not exists!';
		}		
		return $res;
	}	

}
