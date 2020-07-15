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
					
					// wbc()->common->pr($form_definition, false, false);
					// wbc()->common->pr($filter_data, false, false);

					$body = array();

					foreach ($filter_data as $rk => $rv) {
						$row = array();

						$row[] =array(
								'val' => '',
								'is_checkbox' => true, 
								'checkbox'=> array('id'=>$key.$rv[$key.'_filter'],'value'=>array(),'options'=>array(/*$rv[$key.'_filter']*/$rk=>''),'class'=>'','where'=>'in_table')
							);
						$disabled = empty($rv[$key.'_add_enabled'])?true:false;
						
						// foreach ($rv as $rvk => $rvv) {
						foreach ($form_definition[$key]["form"][$fk]["head"][0] as $ck => $cv) {
							if(empty($cv["field_id"])) { continue; }
							$rvk = $cv["field_id"];
							$rvv = ( !isset($rv[$rvk]) || wbc()->common->nonZeroEmpty($rv[$rvk]) ) ?  "" : $rv[$rvk];

							//skip the id
							if( in_array($rvk,array($key."_dependent",$key."_type",$key."_add_help",$key."_add_help_text",$key."_add_enabled")) ) {
								continue;
							}

							if( $rvk == $key."_is_advanced" ) {
								$row[] = array( 'val' => $rvv == 1 ? "Yes" : "No" ,'disabled'=>$disabled);
							}
							else if( $rvk == $key."_add_reset_link" ) {
								$row[] = array( 'val' => $rvv == 1 ? "Yes" : "No" ,'disabled'=>$disabled);
							}
							else if( $rvk == $key."_input_type" || $rvk == $key."_filter" ) {
								$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
								$row[] = array( 'val' => !is_array($val)?$val:$val["label"] ,'disabled'=>$disabled);	
							}
							else {
								$row[] = array( 'val' => $rvv ,'disabled'=>$disabled);
							}
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

	public function switch_template_4(){
		wbc()->options->update_option('appearance_filter','header_font','ZapfHumanist601BT-Roman');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#f7f7f7');	
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');
		wbc()->options->update_option('appearance_filters','slider_track_backcolor_active',sanitize_hex_color('#3e9f8e'));
		wbc()->options->update_option('appearance_filters','slider_nodes_backcolor_active',sanitize_hex_color('#3e9f8e'));
	}

	public function switch_template_3(){

		wbc()->options->update_option('appearance_filter','header_font','Avenir');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dde5ed');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');
		wbc()->options->update_option('appearance_filters','slider_track_backcolor_active',sanitize_hex_color('#9bb8d3'));
		wbc()->options->update_option('appearance_filters','slider_nodes_backcolor_active',sanitize_hex_color('#9bb8d3'));		
	}

	public function save( $form_definition, $is_auto_insert_for_template=false ) {
		
		wbc()->sanitize->clean($form_definition);
		wbc()->validate->check($form_definition);
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    //$res['post']=$_POST;
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty($_POST["saved_tab_key"]) ? $_POST["saved_tab_key"] : ""; 
		$skip_fileds = array('saved_tab_key');
		
		if($saved_tab_key == 'altr_filt_widgts') {
						
			if(!empty($_POST['first_category_altr_filt_widgts']) and $_POST['first_category_altr_filt_widgts']!=wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts') ) {
				if($_POST['first_category_altr_filt_widgts']=='fc4'){
					$this->switch_template_4();
				} elseif ($_POST['first_category_altr_filt_widgts']=='fc3') {
					$this->switch_template_3();
				}

				$filter_data = unserialize(wbc()->options->get_option_group('filters_d_fconfig',"a:0:{}"));				
				if(!empty($filter_data)){
					$ids = array_keys($filter_data);
					$this->deactivate( $ids,'d_fconfig',1 );
					$ids = array();
					foreach ($filter_data as $filter_key=>$filter) {
						if($_POST['first_category_altr_filt_widgts']==$filter['filter_template']){
							//$ids[] = $filter['d_fconfig_filter'];
							$ids[] = $filter_key;
						}
					}
					
					$ids = apply_filters('eowbc_admin_form_filters_save_changable_ids', $ids, $filter_data,$_POST['first_category_altr_filt_widgts']);

					if(empty($ids)) {
						wbc()->load->model('admin/sample_data/eowbc_filter_samples');
						$sample = \eo\wbc\model\admin\sample_data\Filter_Samples::instance();
						if(method_exists($sample,$_POST['first_category_altr_filt_widgts'])) {
							$sample->save(call_user_func(array($sample,$_POST['first_category_altr_filt_widgts'])));
						}
						
					} else {
						$this->activate( $ids,'d_fconfig',1);	
					}
					
				} else {
					wbc()->load->model('admin/sample_data/eowbc_filter_samples');
					$sample = \eo\wbc\model\admin\sample_data\Filter_Samples::instance();
					if(method_exists($sample,$_POST['first_category_altr_filt_widgts'])) {
						$sample->save(call_user_func(array($sample,$_POST['first_category_altr_filt_widgts'])));	
					}
				}
			}

			if(!empty($_POST['second_category_altr_filt_widgts']) and $_POST['second_category_altr_filt_widgts']!=wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts') ) {

				if($_POST['second_category_altr_filt_widgts']=='sc4'){
					$this->switch_template_4();
				} elseif ($_POST['second_category_altr_filt_widgts']=='sc3') {
					$this->switch_template_3();
				}

				$filter_data = unserialize(wbc()->options->get_option_group('filters_s_fconfig',"a:0:{}"));
				if(!empty($filter_data)){
					$ids =array_keys($filter_data);
					$this->deactivate( $ids,'s_fconfig',1);
					$ids = array();
					foreach ($filter_data as $filter_key=>$filter) {
						if($_POST['second_category_altr_filt_widgts']==$filter['filter_template']){
							//$ids[] = $filter['s_fconfig_filter'];
							$ids[] = $filter_key;							
						}
					}
					$ids = apply_filters('eowbc_admin_form_filters_save_changable_ids', $ids, $filter_data,$_POST['second_category_altr_filt_widgts']);
					if(empty($ids)){
						wbc()->load->model('admin/sample_data/eowbc_filter_samples');
						$sample = \eo\wbc\model\admin\sample_data\Filter_Samples::instance();
						if(method_exists($sample,$_POST['second_category_altr_filt_widgts'])){
							$res['meta'] = call_user_func(array($sample,$_POST['second_category_altr_filt_widgts']));
							$sample->save(call_user_func(array($sample,$_POST['second_category_altr_filt_widgts'])));	
						}
						
					} else {
						$this->activate( $ids,'s_fconfig',1);
					}					
				} else {
					wbc()->load->model('admin/sample_data/eowbc_filter_samples');
						$sample = \eo\wbc\model\admin\sample_data\Filter_Samples::instance();
					if(method_exists($sample,$_POST['second_category_altr_filt_widgts'])){							
						$sample->save(call_user_func(array($sample,$_POST['second_category_altr_filt_widgts'])));	
					}
				}				
			}
		}
		
	    //loop through form tabs and save 
	    
	    foreach ($form_definition as $key => $tab) {
	    	if( $key != $saved_tab_key ) {
	    		continue;
	    	}
	    	//$res['data_form'][]= $tab;
			$is_table_save = ($key != "altr_filt_widgts" and $key != "filter_setting") ? true : false;
			$table_data = array();
			$tab_specific_skip_fileds = $is_table_save ? array('eowbc_price_control_methods_list_bulk','eowbc_price_control_sett_methods_list_bulk') : array();

	    	foreach ($tab["form"] as $fk => $fv) {

			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set

			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && ( isset($_POST[$fk]) || $fv["type"]=='checkbox'  ) ) {

			    	//skip fields where applicable
					if( in_array($fk, $skip_fileds) ) {
		    			continue;
		    		}

		    		if( in_array($fk, $tab_specific_skip_fileds) ) {
		    			continue;
		    		}
		    		//save
			    	if( $is_table_save ) {
			    		if( $fk == "d_fconfig_ordering" || $fk == "s_fconfig_ordering" )  {
			    			
			    			if($fk=='d_fconfig_ordering' and !empty($_POST['first_category_altr_filt_widgts'])){
			    				$table_data['filter_template'] = apply_filters('eowbc_admin_form_filters_save_d_filter_template',$_POST['first_category_altr_filt_widgts']);
			    			} elseif ($fk == "s_fconfig_ordering" and !empty($_POST['second_category_altr_filt_widgts'])) {
			    				$table_data['filter_template'] = apply_filters('eowbc_admin_form_filters_save_s_filter_template',$_POST['second_category_altr_filt_widgts']);
			    			}

				    		$table_data[$fk] = (int)$_POST[$fk]; 	
			    		}
			    		else {
			    			$table_data[$fk] = ( isset($_POST[$fk]) ? $_POST[$fk] : '' ); 
			    		}
			    	}
			    	else {			    		
			    		
			    		wbc()->options->update_option('filters_'.$key,$fk,(isset($_POST[$fk])? ( $_POST[$fk] ):'' ) );
			    	}
			    }
			}

			if( $is_table_save ) {

				$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));

		        if(is_array($filter_data) and !empty($filter_data)){


			        foreach ($filter_data as $fdkey=>$item) {
			            
			            if ($item[$key.'_filter']==$table_data[$key."_filter"] and !empty($item['filter_template']) and !empty($table_data['filter_template']) and $item['filter_template']==$table_data['filter_template']) { 
			            	if( $is_auto_insert_for_template ) {
				            	$filter_data[$fdkey][$key.'_add_enabled'] = 1;
				                $res["type"] = "error";
				    			$res["msg"] = eowbc_lang('Filter Already Exists and activated');
				    			wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );
				                return $res;
			            	}
			            	else {
				                $res["type"] = "error";
				    			$res["msg"] = eowbc_lang('Filter already exists '.(($filter_data[$fdkey][$key.'_add_enabled']==1) ? 'and enabled' : 'but is disabled, you should enable it.'));
				                return $res;
			            	}
			            }
			        }
			    }

		        $filter_data[wbc()->common->createUniqueId()] = $table_data;

		        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data));
		        
		        $res["msg"] = eowbc_lang('New Filter Added Successfully'); 
			}

	    }

        return $res;
	}

	public function delete( $ids, $saved_tab_key ,$by_key=false) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
    	$key = $saved_tab_key;

		$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
		$filter_data_updated = array();
        
        $delete_cnt = 0;
        $res["ids"] = $ids;
        $res['filters'] = $filter_data;
        foreach ($filter_data as $fdkey=>$item) {
            
            if($by_key and !in_array($fdkey, $ids)) {
            	$filter_data_updated[wbc()->common->createUniqueId()] = $item; 
            } elseif ( !$by_key and !in_array($item[$key."_filter"], $ids) ) { 
                $filter_data_updated[wbc()->common->createUniqueId()] = $item; 
            }
            else {
            	$delete_cnt++;
            }
        }

        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data_updated) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deleted'); 

        return $res;
	}

	public function activate( $ids, $saved_tab_key ,$by_key=false) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
    	$key = $saved_tab_key;

		$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
		$filter_data_updated = array();
        
        $delete_cnt = 0;
        foreach ($filter_data as $fdkey=>$item) {
            if($by_key and in_array($fdkey, $ids)){
            	$filter_data[$fdkey][$key."_add_enabled"]=1;
                $delete_cnt++;
            } elseif (in_array($item[$key."_filter"], $ids)) { 
                //$filter_data_updated[] = $item; 
                $filter_data[$fdkey][$key."_add_enabled"]=1;
                $delete_cnt++;
            }            
        }

        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) activated'); 

        return $res;
	}

	public function deactivate( $ids, $saved_tab_key ,$by_key=false) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
    	$key = $saved_tab_key;

		$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
		$filter_data_updated = array();
        
        $delete_cnt = 0;
        foreach ($filter_data as $fdkey=>$item) {
            
            if($by_key and in_array($fdkey, $ids)){
            	$filter_data[$fdkey][$key."_add_enabled"]=0;
                $delete_cnt++;
            } elseif (in_array($item[$key."_filter"], $ids) ) { 
                $filter_data[$fdkey][$key."_add_enabled"]=0;
                $delete_cnt++;
            }            
        }

        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deactivated'); 

        return $res;
	}

	public function fetch_filter(&$res) {
		$first = unserialize(wbc()->options->get_option_group('filters_d_fconfig'));
		if(!empty($first[$_POST['id']])){
			$res['msg'] = json_encode($first[$_POST['id']]);
		} elseif (!empty($second[$_POST['id']])) {
			$res['msg'] = json_encode($second[$_POST['id']]);
		} else {
			$res['msg'] = 'error';
			$res['msg'] = 'Selected filter does not exists!';
		}		
		return $res;
	}

	
}


$diamond_category = get_term_by( 'slug','eo_diamond_shape_cat','product_cat');
$setting_category = get_term_by( 'slug','eo_setting_shape_cat','product_cat');


if((is_wp_error($diamond_category) or is_wp_error($setting_category) or empty($diamond_category) or empty($setting_category)) and !is_ajax()) {
	ob_start();
	?>
		<script>
			jQuery(document).ready(function($){
				$("[name='first_category_altr_filt_widgts'],[name='second_category_altr_filt_widgts']").on('change',function(){
					eowbc_toast_common('warning','For alternate widget templates to setup preview filters and make your work easy to set up them, it is recommended that you add sample data and then select and save your desired template. If the sample is not available no preview filters can be set and you will need to add filters manually.',15000);
                    
				});
			});
		</script>
	<?php
	echo ob_get_clean();
}