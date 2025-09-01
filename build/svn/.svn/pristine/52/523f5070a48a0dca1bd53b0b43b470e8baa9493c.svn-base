<?php


/*
*	WBC base Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Base_Model {

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

	public function ignore_fields(){
		return apply_filters('eowbc_admin_save_ignore_fields',array('resolver','resolver_path','saved_tab_key'));
	}

	public function get( $form_definition = array() , $params = array()) {

		$menu_key = '';
		$table_ids = array();

		if(!empty($params)) {
			$menu_key = empty($params['menu_key']) ? '' : $params['menu_key'];
			$table_ids = empty($params['table_ids']) ? array() : $params['table_ids'];
		}

	    //loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {

	    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);

	    	// Only process the forms
	    	if(!empty($tab['form'])){
		    	//loop through form fields and read values from options and store in the form_definition 
				foreach ($tab["form"] as $fk => $fv) {
					if( $fv["type"] == "table" ) {
						
						$table_data = unserialize(wbc()->options->get_option_group($menu_key.'_'.$key,"a:0:{}"));
						$table_fields = array_column($fv['head'][0],'field_id');
						$body = array();

						// TODO had just put the empty array check but we should found in what cases the option is set to empty/null etc. which is not expected and possible behaviour
						if( !wbc()->common->isEmptyArr($table_data) ) {

							foreach ($table_data as $rk => $rv) {
								$row = array();
								
								$row[] =array(
										'val' => '',
										'is_checkbox' => true, 
										'checkbox'=> array('id'=>$rk,'value'=>array(),'options'=>array($rk=>''),'class'=>'','where'=>'in_table')
									);
								
								$disabled = empty($rv[$key_clean.'_add_enabled'])?true:false;
								
								// foreach ($rv as $rvk => $rvv) {
								foreach ($form_definition[$key]["form"][$fk]["head"][0] as $ck => $cv) {
									if(empty($cv["field_id"])) { continue; }

									$rvk = $cv["field_id"];

									$rvv = ( !isset($rv[$rvk]) || wbc()->common->nonZeroEmpty($rv[$rvk]) ) ?  "" : $rv[$rvk];
									
									// Skip these fields.
									// To override this use eowbc_ignore_fields filter.
									if( !in_array($rvk,$table_fields) ) {
										continue;
									}

									if(!empty($form_definition[$key]["form"][$cv['field_id']]) and $form_definition[$key]["form"][$cv['field_id']]['type']=='checkbox'){

										$row[] = array( 'val' => $rvv == 1 ? "Yes" : "No" ,'disabled'=>$disabled);
									}

									if(!empty($form_definition[$key]["form"][$cv['field_id']]) and $form_definition[$key]["form"][$cv['field_id']]['type']=='select') {

										$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);

										if($rvk == $key_clean."_".$menu_key){
											$row[] = array( 'val' => !is_array($val)?$val:$val["label"] ,'disabled'=>$disabled, 'link'=>($rvk == $key_clean."_filter"),'edit_id'=>$rk);	
										} else {
											$row[] = array( 'val' => !is_array($val)?$val:$val["label"] ,'disabled'=>$disabled);	
										}
									} else {
										if(!empty($row) and count($row)==1) {
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
	    }

	    return $form_definition;
	}

	public function save( $form_definition = array(),$menu_key = '',$is_table_save = false,$insert_template=false ) {

		wbc()->sanitize->clean($form_definition);
		wbc()->validate->check($form_definition);
		
		$res = 1;
			    
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty(wbc()->sanitize->post("saved_tab_key")) ? wbc()->sanitize->post("saved_tab_key") : ""; 
		$skip_fileds = $this->ignore_fields();

		do_action('eowbc_admin_save_before',$this,$form_definition,$insert_template,$saved_tab_key,$skip_fileds);
		
				
	    

	    if(!empty($form_definition[$saved_tab_key])) {

	    	$tab = $form_definition[$saved_tab_key];
	    	$key = $saved_tab_key;
	    
	    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);
			
			$table_data = array();
			$tab_specific_skip_fileds = $is_table_save ? array($this->tab_key_prefix.'_bulk') : array();

	    	foreach ($tab["form"] as $fk => $fv) {

			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set

			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && ( isset($_POST[$fk]) || $fv["type"]=='checkbox') ) {

			    	//skip fields where applicable
					if( in_array($fk, $skip_fileds) or in_array($fk, $tab_specific_skip_fileds)) {
		    			continue;
		    		}

		    		//save
			    	if( $is_table_save ) {

			    		$table_data = do_action('eowbc_admin_save_table_before',$$table_data,$this,$fv,$fk,$tab['form']);
			    			 
			    		$table_data[$fk] = ( isset($_POST[$fk]) ? wbc()->sanitize->post($fk) : '' ); 			    		
			    	}
			    	else {			    		
			    		// Save direclty to the menu option.
			    		wbc()->options->update_option($menu_key.'_'.$key,$fk,(isset($_POST[$fk])? ( wbc()->sanitize->post($fk) ):'' ) );
			    	}
			    }
			}

			if( $is_table_save ) {

				$table_data = unserialize(wbc()->options->get_option_group($menu_key.'_'.$key,"a:0:{}"));

		        if(is_array($table_data) and !empty($table_data)){

		        	if(!empty(wbc()->sanitize->post($key_clean.'_id')) and !empty($table_data[wbc()->sanitize->post($key_clean.'_id')])) {
		        		$table_data[wbc()->sanitize->post($key_clean.'_id')] = $table_data;
		        		
		    			wbc()->options->update_option_group( $menu_key.'_'.$key, serialize($table_data) );
		    			// Update was successfull so 2.
		                return 2;
		        	} else {

				        foreach ($table_data as $fdkey=>$item) {

				            if ( apply_filters('eowbc_admin_save_update_row_check',$item[$key_clean.'_'.$menu_key]==$table_data[$key_clean."_".$menu_key], $item, $fdkey, $table_data) ) { 

				            	if( $insert_template ) {
					            	$table_data[$fdkey][$key_clean.'_add_enabled'] = 1;

					    			wbc()->options->update_option_group( 'filters_'.$key, serialize($table_data) );
					    			// return 0 as worked but expectadly failed.
					                return 0;
				            	}
				            	else {
					                // return -1 as failed to complete process.
					                return -1;
				            	}
				            }

				        }
				    }
			    }

		        $table_data[wbc()->common->createUniqueId()] = $table_data;

		        wbc()->options->update_option_group( $menu_key.'_'.$key, serialize($table_data));
		        // a new row is added to the column so 1.
		        $res = 1;
			}
	    }
        return $res;
	}

	public function delete( $ids, $key, $menu_key='', $by_key=false ) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    $res["key"] = $key;
    	   	
		$table_data = unserialize(wbc()->options->get_option_group($menu_key.'_'.$key,"a:0:{}"));
		
		$table_updated = array();
        
        $delete_cnt = 0;
        foreach ($table_data as $fdkey=>$item) {
            
            if( !in_array( (($by_key and isset($item["id"])) ? $item["id"] : $fdkey), $ids)) {
            	$table_updated[$fdkey] = $item; 
            }
            else {
            	$delete_cnt++;
            }
        }

        wbc()->options->update_option_group( $menu_key.'_'.$key, serialize($table_updated) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deleted'); 

        return $res;
	}

	public function activate( $ids, $key, $menu_key='' ,$by_key=false) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);

		$table_data = unserialize(wbc()->options->get_option_group($menu_key.'_'.$key,"a:0:{}"));
		$table_updated = array();
        
        $activate_cnt = 0;
        foreach ($table_data as $fdkey=>$item) {
            if($by_key and in_array($fdkey, $ids)){
            	$table_data[$fdkey][$key_clean."_add_enabled"]=1;
                $delete_cnt++;
            } 
            
            elseif (isset($item[$key."_".$menu_key]) && in_array($item[$key."_".$menu_key], $ids)) { 
                
                $table_data[$fdkey][$key_clean."_add_enabled"]=1;
                $activate_cnt++;
            }            
        }

        wbc()->options->update_option_group( $menu_key.'_'.$key, serialize($table_data) );
        $res["msg"] = $activate_cnt . " " . eowbc_lang('record(s) activated'); 

        return $res;
	}

	public function deactivate( $ids, $key, $menu_key='', $by_key=false) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);
		$table_data = unserialize(wbc()->options->get_option_group($menu_key.'_'.$key,"a:0:{}"));
		        
        $deactivate_cnt = 0;
        foreach ($table_data as $fdkey=>$item) {
            
            if($by_key and in_array($fdkey, $ids)){
            	$table_data[$fdkey][$key_clean."_add_enabled"]=0;
                $deactivate_cnt++;
            } 			
            elseif (isset($item[$key."_".$menu_key]) && in_array($item[$key."_".$menu_key], $ids) ) { 
                $table_data[$fdkey][$key_clean."_add_enabled"]=0;
                $deactivate_cnt++;
            }            
        }

        wbc()->options->update_option_group( $menu_key.'_'.$key, serialize($table_data) );
        $res["msg"] = $deactivate_cnt . " " . eowbc_lang('record(s) deactivated'); 

        return $res;
	}

	public function fetch($menu_key = '',$res = array()) {
		
		$key = wbc()->sanitize->post('saved_tab_key');
		$data = unserialize(wbc()->options->get_option_group($menu_key.'_'.$key,"a:0:{}"));

		if(!empty($data[wbc()->sanitize->post('id')])) {
			$res['type'] = 'success';
			$res['msg'] = json_encode($data[wbc()->sanitize->post('id')]);
		} else {
			$res['type'] = 'error';
			$res['msg'] = 'Selected item does not exists!';
		}		
		return $res;
	}	
}

