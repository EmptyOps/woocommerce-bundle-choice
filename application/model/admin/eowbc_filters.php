<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/eowbc_model');

class Eowbc_Filters extends Eowbc_Model {

	private static $_instance = null;

	public $tab_key_prefix = '';

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

	    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);
	    	//loop through form fields and read values from options and store in the form_definition 
			foreach ($tab["form"] as $fk => $fv) {
				if( $fv["type"] == "table" ) {
					// wbc()->options->update_option_group( 'filters_'.$key, serialize(array()) );
					$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
					
					//wbc()->common->pr($form_definition, false, false);
					// wbc()->common->var_dump('table data for key '.$key);
					//wbc()->common->pr($filter_data, false, false);

					$body = array();

					// TODO had just put the empty array check but we should found in what cases the option is set to empty/null etc. which is not expected and possible behaviour
					if( !wbc()->common->isEmptyArr($filter_data) ) {

						foreach ($filter_data as $rk => $rv) {
							$row = array();
							
							$row[] =array(
									'val' => '',
									'is_checkbox' => true, 
									'checkbox'=> array('id'=>($fv['id']=='filter_sets_list'?$rk:($key.$rv[$key_clean.'_filter'])),'value'=>array(),'options'=>array(/*$rv[$key.'_filter']*/$rk=>''),'class'=>'','where'=>'in_table')
								);
							
							$disabled = empty($rv[$key_clean.'_add_enabled'])?true:false;
							
							// foreach ($rv as $rvk => $rvv) {
							foreach ($form_definition[$key]["form"][$fk]["head"][0] as $ck => $cv) {
								if(empty($cv["field_id"])) { continue; }
								$rvk = $cv["field_id"];							
								$rvv = ( !isset($rv[$rvk]) || wbc()->common->nonZeroEmpty($rv[$rvk]) ) ?  "" : $rv[$rvk];
								
								//skip the id
								if( in_array($rvk,array($key_clean."_dependent",$key_clean."_type",$key_clean."_add_help",$key_clean."_add_help_text",$key_clean."_add_enabled")) ) {
									continue;
								}

								if( $rvk == $key_clean."_is_advanced" ) {
									$row[] = array( 'val' => $rvv == 1 ? "Yes" : "No" ,'disabled'=>$disabled);
								}
								else if( $rvk == $key_clean."_add_reset_link" ) {
									$row[] = array( 'val' => $rvv == 1 ? "Yes" : "No" ,'disabled'=>$disabled);
								}							
								else if( $rvk == $key_clean."_input_type" || $rvk == $key_clean."_filter" ) {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									if(!is_array($val) and empty($val)) {
										$val = '#';
									}
									/*if(empty($val)){
										$val = $rvv;
									}*/

									if($rvk == $key_clean."_filter"){
										$row[] = array( 'val' => !is_array($val)?$val:$val["label"] ,'disabled'=>$disabled, 'link'=>($rvk == $key_clean."_filter"),'edit_id'=>$rk);	
									} else {
										$row[] = array( 'val' => !is_array($val)?$val:$val["label"] ,'disabled'=>$disabled);	
									}
									
								}elseif(!empty($form_definition[$key]["form"][$cv['field_id']]) and $form_definition[$key]["form"][$cv['field_id']]['type']=='select') {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									if($rvk==($key_clean.'_set') and empty($val)) {
										$val = 'Default';
									}
									$row[] = array( 'val' => $val ,'disabled'=>$disabled);
								} else {
									if(!empty($row) and count($row)==1){
										$row[] = array( 'val' => $rvv,'disabled'=>$disabled, 'link'=>1,'edit_id'=>$rk);	
									} else { 
										$row[] = array( 'val' => $rvv ,'disabled'=>$disabled);
									}
								}
							}

							$body[] = $row;
						}

					}

					$form_definition[$key]["form"][$fk]["body"] = $body;
				}
				else {
					if(empty($form_definition[$key]["form"][$fk]["force_value"])){
						$form_definition[$key]["form"][$fk]["value"] = wbc()->options->get_option('filters_'.$key,$fk, isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '');		
					}					
				}
			    
			}
	    }

	    return $form_definition;
	}

	public function switch_template_5(){
		wbc()->options->update_option('filters_filter_setting','filter_setting_price_filter_width','37.5%');
		wbc()->options->update_option('appearance_filter','header_font','Avenir');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dde5ed');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');
		wbc()->options->update_option('appearance_filters','slider_track_backcolor_active',sanitize_hex_color('#9bb8d3'));
		wbc()->options->update_option('appearance_filters','slider_nodes_backcolor_active',sanitize_hex_color('#9bb8d3'));		
	}

	public function switch_template_4(){
		wbc()->options->update_option('filters_filter_setting','filter_setting_price_filter_width','50%');
		wbc()->options->update_option('appearance_filter','header_font','ZapfHumanist601BT-Roman');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#f7f7f7');	
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');
		wbc()->options->update_option('appearance_filters','slider_track_backcolor_active',sanitize_hex_color('#3e9f8e'));
		wbc()->options->update_option('appearance_filters','slider_nodes_backcolor_active',sanitize_hex_color('#3e9f8e'));
	}

	public function switch_template_3(){
		wbc()->options->update_option('filters_filter_setting','filter_setting_price_filter_width','50%');
		wbc()->options->update_option('appearance_filter','header_font','Avenir');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dde5ed');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');
		wbc()->options->update_option('appearance_filters','slider_track_backcolor_active',sanitize_hex_color('#9bb8d3'));
		wbc()->options->update_option('appearance_filters','slider_nodes_backcolor_active',sanitize_hex_color('#9bb8d3'));		
	}

	public function switch_template_2(){
		$this->switch_template_1();
	}

	public function switch_template_1(){
		wbc()->options->update_option('filters_filter_setting','filter_setting_price_filter_width','50%');
		wbc()->options->update_option('appearance_filter','header_font','ZapfHumanist601BT-Roman');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dde5ed');
		//wbc()->options->update_option('appearance_breadcrumb','breadcrumb_backcolor_inactive','#ffffff');
		wbc()->options->update_option('appearance_filters','slider_track_backcolor_active',sanitize_hex_color('#000000'));
		wbc()->options->update_option('appearance_filters','slider_nodes_backcolor_active',sanitize_hex_color('#000000'));		
	}

	public function save( $form_definition, $is_auto_insert_for_template=false ) {
		
		wbc()->sanitize->clean($form_definition);
		wbc()->validate->check($form_definition);
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    //$res['post']=$_POST;
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty(wbc()->sanitize->post("saved_tab_key")) ? wbc()->sanitize->post("saved_tab_key") : ""; 
		$skip_fileds = array('saved_tab_key');
		
		if($saved_tab_key == $this->tab_key_prefix.'altr_filt_widgts') {
			$res['ef'] = wbc()->sanitize->post('first_category_altr_filt_widgts');
			$res['tf'] = wbc()->options->get_option('filters_'.$this->tab_key_prefix.'altr_filt_widgts','first_category_altr_filt_widgts');
			if(!empty(wbc()->sanitize->post('first_category_altr_filt_widgts')) and wbc()->sanitize->post('first_category_altr_filt_widgts')!=wbc()->options->get_option('filters_'.$this->tab_key_prefix.'altr_filt_widgts','first_category_altr_filt_widgts') ) {
				
				if(wbc()->sanitize->post('first_category_altr_filt_widgts')=='fc5'){
					$this->switch_template_5();
				} elseif(wbc()->sanitize->post('first_category_altr_filt_widgts')=='fc4'){
					$this->switch_template_4();
				} elseif (wbc()->sanitize->post('first_category_altr_filt_widgts')=='fc3') {
					$this->switch_template_3();
				} elseif (wbc()->sanitize->post('first_category_altr_filt_widgts')=='fc2') {
					$this->switch_template_2();
				} elseif (wbc()->sanitize->post('first_category_altr_filt_widgts')=='fc1') {
					$this->switch_template_1();
				}

				$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$this->tab_key_prefix.'d_fconfig',"a:0:{}"));
				
				if(!empty($filter_data)){
					$ids = array_keys($filter_data);
					$this->deactivate( $ids,$this->tab_key_prefix.'d_fconfig',1 );
					$ids = array();
					foreach ($filter_data as $filter_key=>$filter) {
						if(isset($filter['filter_template']) and wbc()->sanitize->post('first_category_altr_filt_widgts')==$filter['filter_template']) {
							//$ids[] = $filter['d_fconfig_filter'];
							$ids[] = $filter_key;
						}
					}					
					$ids = apply_filters('eowbc_admin_form_filters_save_changable_ids', $ids, $filter_data,wbc()->sanitize->post('first_category_altr_filt_widgts'));

					if(empty($ids)) {
						wbc()->load->model('admin/sample_data/eowbc_filter_samples');
						$sample = \eo\wbc\model\admin\sample_data\Filter_Samples::instance();
						if(method_exists($sample,wbc()->sanitize->post('first_category_altr_filt_widgts'))) {
							$sample->save(call_user_func(array($sample,wbc()->sanitize->post('first_category_altr_filt_widgts'))),$this->tab_key_prefix);
						}
						
					} else {
						$this->activate( $ids,$this->tab_key_prefix.'d_fconfig',1);	
					}
					
				} else {
					wbc()->load->model('admin/sample_data/eowbc_filter_samples');
					$sample = \eo\wbc\model\admin\sample_data\Filter_Samples::instance();
					if(method_exists($sample,wbc()->sanitize->post('first_category_altr_filt_widgts'))) {
						$sample->save(call_user_func(array($sample,wbc()->sanitize->post('first_category_altr_filt_widgts'))),$this->tab_key_prefix);	
					}
				}
			}

			if(!empty(wbc()->sanitize->post('second_category_altr_filt_widgts')) and wbc()->sanitize->post('second_category_altr_filt_widgts')!=wbc()->options->get_option('filters_'.$this->tab_key_prefix.'altr_filt_widgts','second_category_altr_filt_widgts') ) {

				if(wbc()->sanitize->post('second_category_altr_filt_widgts')=='sc5'){
					$this->switch_template_5();
				}elseif(wbc()->sanitize->post('second_category_altr_filt_widgts')=='sc4'){
					$this->switch_template_4();
				} elseif (wbc()->sanitize->post('second_category_altr_filt_widgts')=='sc3') {
					$this->switch_template_3();
				} elseif (wbc()->sanitize->post('second_category_altr_filt_widgts')=='sc2') {
					$this->switch_template_2();
				} elseif (wbc()->sanitize->post('second_category_altr_filt_widgts')=='sc1') {
					$this->switch_template_1();
				}

				$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$this->tab_key_prefix.'s_fconfig',"a:0:{}"));
				if(!empty($filter_data)){
					$ids =array_keys($filter_data);
					$this->deactivate( $ids,$this->tab_key_prefix.'s_fconfig',1);
					$ids = array();
					foreach ($filter_data as $filter_key=>$filter) {
						if( isset($filter['filter_template']) and wbc()->sanitize->post('second_category_altr_filt_widgts')==$filter['filter_template']) {
							//$ids[] = $filter['s_fconfig_filter'];
							$ids[] = $filter_key;							
						}
					}
					$ids = apply_filters('eowbc_admin_form_filters_save_changable_ids', $ids, $filter_data,wbc()->sanitize->post('second_category_altr_filt_widgts'));

					if(empty($ids)){
						wbc()->load->model('admin/sample_data/eowbc_filter_samples');
						$sample = \eo\wbc\model\admin\sample_data\Filter_Samples::instance();
						if(method_exists($sample,wbc()->sanitize->post('second_category_altr_filt_widgts'))) {
							$res['meta'] = call_user_func(array($sample,wbc()->sanitize->post('second_category_altr_filt_widgts')));

							$sample->save(call_user_func(array($sample,wbc()->sanitize->post('second_category_altr_filt_widgts'))));	
						}
						
					} else {
						$this->activate( $ids,$this->tab_key_prefix.'s_fconfig',1);
					}					
				} else {
					wbc()->load->model('admin/sample_data/eowbc_filter_samples');
						$sample = \eo\wbc\model\admin\sample_data\Filter_Samples::instance();
					if(method_exists($sample,wbc()->sanitize->post('second_category_altr_filt_widgts'))){							
						$sample->save(call_user_func(array($sample,wbc()->sanitize->post('second_category_altr_filt_widgts'))));	
					}
				}				
			}
		}
		
	    //loop through form tabs and save 
	    
	    foreach ($form_definition as $key => $tab) {
	    	if( $key != $saved_tab_key ) {
	    		continue;
	    	}
	    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);
	    	//$res['data_form'][]= $tab;
			$is_table_save = ($key == $this->tab_key_prefix."d_fconfig" or $key == $this->tab_key_prefix."s_fconfig" or $key=='filter_set') ? true : false;

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
			    			
			    			if($fk=='d_fconfig_ordering' and !empty(wbc()->sanitize->post('first_category_altr_filt_widgts'))){
			    				$table_data['filter_template'] = apply_filters('eowbc_admin_form_filters_save_d_filter_template',wbc()->sanitize->post('first_category_altr_filt_widgts'));
			    			} elseif ($fk == "s_fconfig_ordering" and !empty(wbc()->sanitize->post('second_category_altr_filt_widgts'))) {
			    				$table_data['filter_template'] = apply_filters('eowbc_admin_form_filters_save_s_filter_template',wbc()->sanitize->post('second_category_altr_filt_widgts'));
			    			}			    			
				    		$table_data[$fk] = (int)wbc()->sanitize->post($fk); 	
			    		}
			    		else {
			    			$table_data[$fk] = ( isset($_POST[$fk]) ? wbc()->sanitize->_post($fk) : '' ); 
			    		}
			    	}
			    	else {			    		
			    		
			    		wbc()->options->update_option('filters_'.$key,$fk,(isset($_POST[$fk])? ( wbc()->sanitize->post($fk) ):'' ) );
			    	}
			    }
			}

			if( $is_table_save ) {

				$filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));

		        if(is_array($filter_data) and !empty($filter_data)){

		        	if(!empty(wbc()->sanitize->post($key_clean.'_id')) and !empty($filter_data[wbc()->sanitize->post($key_clean.'_id')])) {
		        		$filter_data[wbc()->sanitize->post($key_clean.'_id')] = $table_data;
		        		$res["type"] = "success";
		    			$res["msg"] = eowbc_lang('Filter updated successfully');
		    			wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );
		                return $res;
		        	} else {
				        foreach ($filter_data as $fdkey=>$item) {
				          
				            if ( apply_filters('eowbc_ajax_filters_check_duplicate', ($item[$key_clean.'_filter']==$table_data[$key_clean."_filter"] and !empty($item['filter_template']) and !empty($table_data['filter_template']) and $item['filter_template']==$table_data['filter_template'] ),$item,$table_data,$key_clean ) ) { 
				            	if( $is_auto_insert_for_template ) {

				            		$filter_data[wbc()->common->createUniqueId()] = $table_data;

							        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data));

					            	/*$filter_data[$fdkey][$key_clean.'_add_enabled'] = 1;
					                $res["type"] = "error";
					    			$res["msg"] = eowbc_lang('Filter Already Exists and activated');
					    			wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );*/
					                return $res;
				            	}
				            	else {
					                $res["type"] = "error";
					    			$res["msg"] = eowbc_lang('Filter already exists '.(($filter_data[$fdkey][$key_clean.'_add_enabled']==1) ? 'and enabled' : 'but is disabled, you should enable it.'));
					                return $res;
				            	}
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

	public function delete( $ids, $saved_tab_key /*,$by_key=false*/, $check_by_id=false ) {
		
		// $res = array();
		// $res["type"] = "success";
	 //    $res["msg"] = "";
	    
  //   	$key = $saved_tab_key;
   	
		// $filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));
		// $filter_data_updated = array();
        
  //       $delete_cnt = 0;
  //       $res["ids"] = $ids;
  //       $res['filters'] = $filter_data;
  //       foreach ($filter_data as $fdkey=>$item) {
            
  //           if($by_key and !in_array($fdkey, $ids)) {
  //           	$filter_data_updated[wbc()->common->createUniqueId()] = $item; 
  //           } elseif ( !$by_key and !in_array($item[$key."_filter"], $ids) ) { 
  //               $filter_data_updated[wbc()->common->createUniqueId()] = $item; 
  //           }
  //           else {
  //           	$delete_cnt++;
  //           }
  //       }

  //       wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data_updated) );
  //       $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deleted'); 

  //       return $res;

		return parent::delete( $ids, 'filters_'.$saved_tab_key/*, $by_key*/, $check_by_id );
	}

	public function activate( $ids, $saved_tab_key ,$by_key=false) {
		
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

	public function deactivate( $ids, $saved_tab_key ,$by_key=false) {
		
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
            	$filter_data[$fdkey][$key_clean."_add_enabled"]=0;
                $delete_cnt++;
            } 
			// since it was generating undefined index warning, added isset at first in below condition, but I believe this condition has no use and should be removed. 
            elseif (isset($item[$key."_filter"]) && in_array($item[$key."_filter"], $ids) ) { 
                $filter_data[$fdkey][$key_clean."_add_enabled"]=0;
                $delete_cnt++;
            }            
        }

        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deactivated'); 

        return $res;
	}

	public function fetch_filter(&$res) {
		//$first = unserialize(wbc()->options->get_option_group('filters_'.$this->tab_key_prefix.'d_fconfig'));
		//$second = unserialize(wbc()->options->get_option_group('filters_'.$this->tab_key_prefix.'s_fconfig'));
		$key = wbc()->sanitize->post('saved_tab_key');
		$data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));

		if(!empty($data[wbc()->sanitize->post('id')])){
			$res['msg'] = json_encode($data[wbc()->sanitize->post('id')]);
		}
		/*
		if(!empty($first[wbc()->sanitize->post('id')])){
			$res['msg'] = json_encode($first[wbc()->sanitize->post('id')]);
		} elseif (!empty($second[wbc()->sanitize->post('id')])) {
			$res['msg'] = json_encode($second[wbc()->sanitize->post('id')]);
		}*/ else {
			$res['type'] = 'error';
			$res['msg'] = 'Selected item does not exists!';
		}		
		return $res;
	}	
}


$diamond_category = wbc()->wc->get_term_by( 'slug','eo_diamond_shape_cat','product_cat');
$setting_category = wbc()->wc->get_term_by( 'slug','eo_setting_shape_cat','product_cat');

if( !is_ajax() ) {
	if((is_wp_error($diamond_category) or is_wp_error($setting_category) or empty($diamond_category) or empty($setting_category))) {
		ob_start();
		?>
			<script>
				jQuery(document).ready(function($){
					$("[name='first_category_altr_filt_widgts'],[name='second_category_altr_filt_widgts']").on('change',function(){
						eowbc_toast_common('warning','Warning: It is recommended that you add sample data and then select and save your desired template. So that alternate widget templates can setup preview filters and make your work easy to set up them later. If the sample data is not available no preview filters can be set and you will need to add filters manually.<br><br>Also note that your existing filters will be disabled, you can enable them later at anytime by using bulk activate action.',20000);
	                    
					});
				});
			</script>
		<?php
		echo ob_get_clean();
	}
	else {
		ob_start();
		?>
			<script>
				jQuery(document).ready(function($){
					$("[name='first_category_altr_filt_widgts'],[name='second_category_altr_filt_widgts']").on('change',function(){
						eowbc_toast_common('warning','Note that your existing filters will be disabled, and the new sample filters will be added. You can enable your existing filters later at anytime by using bulk activate action.',10000);
	                    
					});
				});
			</script>
		<?php
		echo ob_get_clean();
	}
}
