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


	public function render_ui_sub_process($form, $args = null) {

		echo \eo\wbc\model\admin\Form_Builder::instance()->build($form);

		if( !empty($args['is_legacy_admin']) ) {

			echo '<script type="text/javascript">window.document.splugins.admin.do_event_binding();</script>';
		} else {

		}		
		
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

							if( !isset($save_as_data['post_meta']) and !empty($args['id']) ) {

								// NOTE: id is standard column name that we use for our options module based simple entity storage, so for the legacy admin flows also where necessary we can simply use the same where the necessity arise to maintain one uniqid and I think it will be almost always. 
								$save_as_data['post_meta'] = get_post_meta( $args['id'], $args['page_section'].'_data', true );	
							}
						}

						if(empty($form_definition[$key]["form"][$fk]["force_value"])){
							-- need to mac us of data mapping here and in below statement as applicabel.
							//$form_definition[$key]["form"][$fk]["value"] = ( isset($save_as_data['post_meta'][$fk]) ? $save_as_data['post_meta'][$fk] : ( isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] :'' ) );
							if (isset($args['data_raw'][$fk])) {

								$form_definition[$key]["form"][$fk]["value"] = $args['data_raw'][$fk];

							} elseif( isset($save_as_data['post_meta'][$fk]) ){

								$form_definition[$key]["form"][$fk]["value"] = $save_as_data['post_meta'][$fk]; 

							} else{

								if( isset($form_definition[$key]["form"][$fk]["value"]) ){

									 $form_definition[$key]["form"][$fk]["value"] = $form_definition[$key]["form"][$fk]["value"];

								} else{

									$form_definition[$key]["form"][$fk]["value"] = '';

								}

							}
							
							-- am melu tu /woo-bundle-choice/application/model/publics/data_model/sp-wbc-variations.php: line 569
							// ACTIVE_TODO/TODO implement 
							if( !empty($args['is_convert_das_to_array'])){
								
							}

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
			
			wbc()->sanitize->clean($form_definition);
			wbc()->validate->check($form_definition);
			$res = array();
			$res["type"] = "success";
		    $res["msg"] = "";
		    //$res['post']=$_POST;
			wbc()->load->model('admin\form-builder');

			$saved_tab_key = !empty(wbc()->sanitize->post("sp_frmb_saved_tab_key")) ? wbc()->sanitize->post("sp_frmb_saved_tab_key") : ""; 
			$skip_fileds = array('sp_frmb_saved_tab_key');
			
			if($saved_tab_key == $this->tab_key_prefix.'altr_filt_widgts') {

				// NOTE: tab specific logic 
					// NOTE: however since it is implementation in the base model so the tab specific conditional blocks can not come here but should be in the particular child class 
			}
			
			$save_as_data = array();	
			$save_as_data_meta = array();	

		    //loop through form tabs and save 
		    foreach ($form_definition as $key => $tab) {
		    	if( $key != $saved_tab_key ) {
		    		continue;
		    	}
		    	
		    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);
		    	//$res['data_form'][]= $tab;
				$is_table_save = false;	//	ACTIVE_TODO/TODO it should be passed from child maybe or make dynamic as applicable. ($key == $this->tab_key_prefix."d_fconfig" or $key == $this->tab_key_prefix."s_fconfig" or $key=='filter_set') ? true : false;

				$table_data = array();
				$tab_specific_skip_fileds = array();	//	ACTIVE_TODO/TODO it should be passed from child maybe or make dynamic as applicable.  $is_table_save ? array('eowbc_price_control_methods_list_bulk','eowbc_price_control_sett_methods_list_bulk') : array();

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

						if( empty($fv['save_as']) or $fv['save_as'] == "default" ) {

							// TODO implement

				    		//save
					    	if( $is_table_save ) {

					    		// ACTIVE_TODO/TODO to cover logic like below commented logic what we can do is implement maybe callback or simply the hooks mechanisam, but maybe the callbacks are simple and easy to debug and enough for such requirements. so can do callbacks like we did for some class heirarchies -- to s 
					    		// if( $fk == "d_fconfig_ordering" || $fk == "s_fconfig_ordering" )  {
					    			
					    		// 	if($fk=='d_fconfig_ordering' and !empty(wbc()->sanitize->post('first_category_altr_filt_widgts'))){
					    		// 		$table_data['filter_template'] = apply_filters('eowbc_admin_form_filters_save_d_filter_template',wbc()->sanitize->post('first_category_altr_filt_widgts'));
					    		// 	} elseif ($fk == "s_fconfig_ordering" and !empty(wbc()->sanitize->post('second_category_altr_filt_widgts'))) {
					    		// 		$table_data['filter_template'] = apply_filters('eowbc_admin_form_filters_save_s_filter_template',wbc()->sanitize->post('second_category_altr_filt_widgts'));
					    		// 	}			    			
						    	// 	$table_data[$fk] = (int)wbc()->sanitize->post($fk); 	
					    		// }
					    		// else {
					    			$table_data[$fk] = ( isset($_POST[$fk]) ? wbc()->sanitize->_post($fk) : '' ); 
					    		// }
					    	}
					    	else {			    		
					    		
					    		wbc()->options->update_option('filters_'.$key,$fk,(isset($_POST[$fk])? ( wbc()->sanitize->post($fk) ):'' ) );
					    	}
						} elseif( $fv['save_as'] == "post_meta" ) {

							if( !isset($save_as_data['post_meta']) ) {

								$save_as_data['post_meta'] = array();	
							}

							if( isset($_POST[$fk]) ) {

								$save_as_data_meta['post_meta_found'] = true;	
							}

							$save_as_data['post_meta'][$fk] = ( isset($_POST[$fk]) ? wbc()->sanitize->_post($fk) : '' ); 
						}

				    }
				}

				//loop through save_as_data and save 
			    foreach ($save_as_data as $sadk => $sadv) {

			    	// NOTE: normally for our standard admn layer there is maybe no flow of deleting record if that is not detected, and as far as I can say the delete action is available only for the table/entity based form where user can delete in bulk and so on. but here it is for storage efficiency, cleanlieness and so on the post meta are deleted and will be followed in similar manner for other similar save_as options. 

			    	if( $sadk == "post_meta" ) {
						
						// TODO we may like to use post meta api functions like get_post_meta(used above), update_post_meta/delete_post_meta(used below) through our common wp helper 

						if ( !empty( $save_as_data_meta['post_meta_found'] ) ) {
							update_post_meta( $args['id'], $args['page_section'].'_data', $sadv );
						} else {
							delete_post_meta( $args['id'], $args['page_section'].'_data' );
						}
			    	}
			    }

				if( $is_table_save ) {

					// ACTIVE_TODO/TODO implement 

					// $filter_data = unserialize(wbc()->options->get_option_group('filters_'.$key,"a:0:{}"));

					  //       if(is_array($filter_data) and !empty($filter_data)){

					  //       	if(!empty(wbc()->sanitize->post($key_clean.'_id')) and !empty($filter_data[wbc()->sanitize->post($key_clean.'_id')])) {
					  //       		$filter_data[wbc()->sanitize->post($key_clean.'_id')] = $table_data;
					  //       		$res["type"] = "success";
					  //   			$res["msg"] = eowbc_lang('Filter updated successfully');
					  //   			wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );
					  //               return $res;
					  //       	} else {
					//         foreach ($filter_data as $fdkey=>$item) {
					          
					//             if ( apply_filters('eowbc_ajax_filters_check_duplicate', ($item[$key_clean.'_filter']==$table_data[$key_clean."_filter"] and !empty($item['filter_template']) and !empty($table_data['filter_template']) and $item['filter_template']==$table_data['filter_template'] ),$item,$table_data,$key_clean ) ) { 
					//             	if( $is_auto_insert_for_template ) {

					//             		$filter_data[wbc()->common->createUniqueId()] = $table_data;

					// 			        wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data));

					// 	            	/*$filter_data[$fdkey][$key_clean.'_add_enabled'] = 1;
					// 	                $res["type"] = "error";
					// 	    			$res["msg"] = eowbc_lang('Filter Already Exists and activated');
					// 	    			wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data) );*/
					// 	                return $res;
					//             	}
					//             	else {
					// 	                $res["type"] = "error";
					// 	    			$res["msg"] = eowbc_lang('Filter already exists '.(($filter_data[$fdkey][$key_clean.'_add_enabled']==1) ? 'and enabled' : 'but is disabled, you should enable it.'));
					// 	                return $res;
					//             	}
					//             }

					//         }
					//     }
				 //    }

					  //       $filter_data[wbc()->common->createUniqueId()] = $table_data;

					  //       wbc()->options->update_option_group( 'filters_'.$key, serialize($filter_data));
					        
					  //       $res["msg"] = eowbc_lang('New Filter Added Successfully'); 
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

			wbc()->load->asset('js','admin-js',array('jquery'),"0.1.4",false,true,null,null,true);
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

