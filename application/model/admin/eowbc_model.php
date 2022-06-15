<?php


/*
*	WBC base Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Model {

	private static $_instance = null;

	protected $tab_key_prefix = '';

	private $is_load_asset_done = null; 

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}


	public function get( $form_definition, $args = null ) {

		// NOTE: with this function implementation now instead of using the fetch_filter function the get function would be used with id passed in the args parameter. if it is not feasible for all layers in the meantime we will keep using it atleast for the legacy admin.	
		
		if( !empty($args['is_legacy_admin']) ) {

			$save_as_data = array();	
			//loop through form tabs 
		    foreach ($form_definition as $key => $tab) {

		    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);

		    	//loop through form fields and read values from options and store in the form_definition 
				foreach ($tab["form"] as $fk => $fv) {
					if( $fv["type"] == "table" ) {


					}
					else {

						if( empty($fv['save_as']) or $fv['save_as'] == "default" ) {

							// TODO implement
						} elseif( $fv['save_as'] == "post_meta" ) {

							if( !isset($save_as_data['post_meta']) ) {

								$save_as_data['post_meta'] = get_post_meta( $args['id'], $args['page_section'].'_data', true );	
							}
						}

						if(empty($form_definition[$key]["form"][$fk]["force_value"])){
							$form_definition[$key]["form"][$fk]["value"] = ( isset($save_as_data['post_meta'][$fk]) ? $save_as_data['post_meta'][$fk] : ( isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '' ) );		
						}					
					}
				    
				}
		    }
		} else {

			throw new Exception("ACTIVE_TODO implement, implement and then have all child classes of respective admin models does call this function. -- to s. On a side note, can use this for frontend get_data layers also but it sounds likely deeply mixing the models. anyway we can atleast use the form_definition on our get_data function layers of the frontend models like single product model, and this sounds like balanced approach maybe but not sure about if it appropriate balance of cohesion and coupling between models.", 1);
		}

	    return $form_definition;
	}

	public function save( $form_definition, $is_auto_insert_for_template=false, $args = null ) {
		
		if( !empty($args['is_legacy_admin']) ) {
			
			if ( !empty( wbc()->sanitize->post['woo_variation_gallery'] ) ) {
				if ( !empty( wbc()->sanitize->post['woo_variation_gallery'][ $variation_id ] ) ) {
					$gallery_image_ids = array_map( 'absint', wbc()->sanitize->post['woo_variation_gallery'][ $variation_id ] );
					update_post_meta( $variation_id, 'sp_variations_data', $gallery_image_ids );
				} else {
					delete_post_meta( $variation_id, 'sp_variations_data' );
				}
			} else {
				delete_post_meta( $variation_id, 'sp_variations_data' );
			}
			


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

		} else {

			throw new Exception("ACTIVE_TODO implement, implement and then have all child classes of respective admin models does call this function. -- to s.", 1);
		}

        return $res;
	}

	public function delete( $ids, $key/*,$by_key=false*/, $check_by_id=false ) {

		throw new Exception("ACTIVE_TODO implement, implement and then have all child classes of respective admin models does call this function. -- to s.", 1);
		
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

		throw new Exception("ACTIVE_TODO implement, implement and then have all child classes of respective admin models does call this function. -- to s.", 1);
		
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

		throw new Exception("ACTIVE_TODO implement, implement and then have all child classes of respective admin models does call this function. -- to s.", 1);

		return $res;
	}	
		
	protected function load_asset($args = null) {

		if( ! $this->is_load_asset_done ) {

			$this->is_load_asset_done = true;	

		
			if( !empty($args['is_legacy_admin']) ) {

				$this->legacy_admin_css();	
			} 

			wbc()->load->asset('js','admin-js');
			wp_localize_script(
			    'admin-js',
			    'eowbc_object',
			    array('admin_url'=>admin_url( 'admin-ajax.php'))
			);
		}
	}

	private function legacy_admin_css() {

		// ACTIVE_TODO move below css to legacy-admin.css file and load that asset file instead of inline below -- to s 
		?>
		<style>
				        .spui_custum_row {
				            float: left;
				            width: 100%;
				        }
				        .form-row.form-row-first.spui_custum_assets {
				            width: 100%;
				            float: left;
				        }
				        .spui_form_row_title {
				            float: left;
				            width: 100%;
				            /* border-bottom: 1px solid #eee; */
				            padding-bottom: .5rem;
				            margin-bottom: 0.5rem;
				        }
				        .spui_form_asset_container.upload_image {
				            float: left;
				            width: 100%;
				            display: flex;
				            align-items: flex-start;
				            position: relative;
				            flex-wrap: wrap;
				        }
				        .spui_form_asset_container a.upload_image_button {
				            margin-right: 7px;
				        }
				        .spui_asset_upload_cta {
				            align-self: center;
				        }
				        .spui_asset_upload_cta a.btn {
				            width: 50px;
				            height: 50px;
				            display: flex;
				            text-align: center;
				            font-size: 30px;
				            line-height: 1;
				            align-items: center;
				            justify-content: center;
				            padding: 1rem;
				        }
				        .spui_asset_upload_cta a.btn {
				            padding: 1rem;
				            background: #fff;
				            border: 1px solid #4183c4;
				        }

				        .spui_form_second_row {
				            float: left !important;
				            width: 100% !important;
				            margin-top: .5rem;
				            margin-bottom: 0.5rem;
				            border-bottom: 1px solid #eee;
				            padding-bottom: 0.5rem;
				        }

				        .spui_custum_video_container {
				            float: left;
				            width: 100%;
				            display: flex;
				            flex-wrap: wrap;
				            gap: 1em;
				            align-items: center;
				        }
				        .spui_video_links {
				            flex: 0 0 3%;
				        }
				        .spui_video_links a.btn img.img-fluid {
				            max-width: 100%;
				            display: block;
				        }
				        .spui_video_input_field {
				            flex: 0 1 44%;
				            border-right: 1px solid #eee;
				            padding-right: 1rem;
				        }
				        .asset_section_two {
				            flex: 0 1 12%;
				        }
				        .asset_content {
				            flex: 0 1 100%;
				            text-align: center;
				        }
				        .spui_custum_video_container p {
				            padding-top: .2rem;
				        }
				        .spui_video_input_field p {
				            text-align: center;
				            text-transform: capitalize;
				        }
				        .spui_video_links p {
				            text-align: center;
				            text-transform: capitalize;
				        }

		</style>
		<?php
	}

}

