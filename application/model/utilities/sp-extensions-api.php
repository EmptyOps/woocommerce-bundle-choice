<?php
/*
 *	Utilities Model SP Extensions Api.
 */
namespace eo\wbc\model\utilities;

defined('ABSPATH') || exit;

wbc()->load->model('publics/eowbc_base_model_publics');

use eo\wbc\model\publics\Eowbc_Base_Model_Publics;

class SP_Extensions_Api extends Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function configuration_run() {

		--	shude we rename extars check hook below to somthing like extars configrtion check or configrtion check?
		do_action('sp_wbc_extras_check');
	}

	public function configuration_check($config) {

		if( empty(wbc()->sanitize->get('sp_ext_ecac')) || wbc()->sanitize->get('sp_ext_ecac') != 1 ) {
			return;
		}

		$curr_theme_key = self::current_theme_key();

		$test_sec_key = wbc()->sanitize->get('test_sec_key');

		$plugin_slug = $config['plugin_slug'];
		foreach ($config['widget_sections'] as $section_key => $section) {

			if( $section_key != $test_sec_key ) {
				continue;
			}

			$current_url = wbc()->common->current_url();

			$required_types = array('mandatory','recommended');

			foreach ($required_types as $rk => $rv) {

				if( !isset($section[$rv]) ) {
					continue;
				}

				foreach ($section[$rv] as $key => $item) {

					if( $item['type'] == 'action' ) {

						self::instance()->configuration_update_result(false, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, $item, $current_url );

						add_action($item['key'], function() use($plugin_slug, $curr_theme_key, $section_key, $rv, $key, $current_url) {
			
							self::instance()->configuration_update_result(true, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, null, $current_url );

						});
					}
					elseif( $item['type'] == 'filter' ) {

						self::instance()->configuration_update_result(false, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, $item, $current_url );

						add_filter($item['key'], function() use($plugin_slug, $curr_theme_key, $section_key, $rv, $key, $current_url) {

							self::instance()->configuration_update_result(true, $plugin_slug, $curr_theme_key, $section_key, $rv, $key, null, $current_url );

						}, $item['filter_priority_1'], $item['filter_priority_2']);
					}
					else {
						throw new \Exception("Eowbc_Extras_Check: The provided type ".$item['type']." is not supported yet, send request to dev team for adding support for it.", 1);
						
					}

				}
			}
			
		}

		$result = self::call($url --	this perameter need to be passed from the particular extensions so based on plugin slug we need to call the single tone function and hear the plugin slug is most probably single tone function name so need to retry the api url to call from the extensions config_class config_helpaer function);

		$this->configuration_update_result($result, $plugin_slug);

	}

	public function configuration_update_result($result, $plugin_slug, $curr_theme_key, $section_key, $required_key, $key, $item, $current_url) {

		$opt_grp = wbc()->options->get_option_group('ecacr_'.$plugin_slug,array());

		if( !isset($opt_grp[$curr_theme_key]) ) $opt_grp[$curr_theme_key] = array();
		if( !isset($opt_grp[$curr_theme_key][$section_key]) ) $opt_grp[$curr_theme_key][$section_key] = array();
		if( !isset($opt_grp[$curr_theme_key][$section_key][$required_key]) ) $opt_grp[$curr_theme_key][$section_key][$required_key] = array();

		if( !isset($opt_grp[$curr_theme_key][$section_key][$required_key][$key]) && is_array($item) )	{
			$opt_grp[$curr_theme_key][$section_key][$required_key][$key] = $item;
		}

		$opt_grp[$curr_theme_key][$section_key][$required_key][$key]['tested_on_url'] = $current_url;
		$opt_grp[$curr_theme_key][$section_key][$required_key][$key]['result'] = $result;

		wbc()->options->update_option_group('ecacr_'.$plugin_slug,$opt_grp);

	}

	public static function call($url, $query_string, $payload = null) {

		self::additional_data($query_string, $payload);

		$url .= (strpos($url, '?') !== FALSE ? $query_string : "?" . $query_string);

		$result = wp_remote_get($url);

		$parsed = \eo\wbc\system\core\publics\Eowbc_Base_Model_Publics::parse_response($result, 'wp_remote_get');

		wbc_free_memory($result);

		return $parsed;
	}

	private static function additional_data(&$query_string, &$payload) {

		if ( empty($query_string) ) {

			$query_string = "";
		}

		$query_string .= self::active_theme_and_plugins();
	}

	private static function active_theme_and_plugins() {

		// -- here we need to put the appropriate code for fetching the active theme and plugins. -- to h & -- to pi done.

		$query_string = '';
		$active_plugins_slugs = array();
		$active_plugins_versions = array();
		$active_theme_slug = '';
		$active_theme_version = '';
		$active_parent_theme_slug = '';
		$active_parent_theme_version = '';

		if( function_exists('get_plugins') ) {

			$plugins=get_plugins();	

			// Loop through each installed plugin
			foreach ($plugins as $plugin_path => $plugin_info) {

				// Check if the plugin is active
				if( is_plugin_active($plugin_path) ) {

					// If active, add it to the active plugins array
					$active_plugins_slugs[] = dirname($plugin_path);
					$active_plugins_versions[] = $plugin_info['Version'];
				}

			}

		}

		if( function_exists('wp_get_theme') ) {

			$theme=wp_get_theme();
		} else {
			
			$theme=get_current_theme();
		}

		$active_theme_slug = $theme->get_template();
		$active_theme_version = $theme->get('Version');	

		$parent_themes = $theme->parent();

		if( $parent_themes ) {

			$active_parent_theme_slug = $parent_themes->get_template(); // This will get the directory (slug) of the parent theme
			$active_parent_theme_version = $parent_themes->get('Version');

			$query_string .= "active_parent_theme_slug=" .  $active_parent_theme_slug . "&";
			$query_string .= "active_parent_theme_version=" .  $active_parent_theme_version . "&";
		}

		$query_string .= "active_plugins_slugs=" . explode("," , $active_plugins_slugs) . "&";
		$query_string .= "active_plugins_versions=" . explode("," , $active_plugins_versions) . "&";
		$query_string .= "active_theme_slug=" .  $active_theme_slug . "&";
		$query_string .= "active_theme_version=" .  $active_theme_version . "&";

		return $query_string;
	}

	public static function admin_hooks() {

		add_filter('wbc_form_builder_model_after_get', function($form_definition, $hooked_args){

			$args = array();
			$args['hook_callback_args'] = $hooked_args;

			return self::process_form_definition('get', $form_definition, $args);
		}, 50, 2);

		add_filter('wbc_form_builder_model_before_save', function($res, $form_definition, $is_auto_insert_for_template, $hooked_args){

			$args = array();
			$args['res'] = $res;
			$args['hook_callback_args'] = $hooked_args;
			$args['is_auto_insert_for_template'] = $is_auto_insert_for_template;

			return self::process_form_definition('save', $form_definition, $args);
		}, 50, 4);
    }

    private static function process_form_definition($mode, $form_definition, $args) {

		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty(wbc()->sanitize->post("sp_frmb_saved_tab_key")) ? wbc()->sanitize->post("sp_frmb_saved_tab_key") : ( !empty( $args["sp_frmb_saved_tab_key"] ) ? $args["sp_frmb_saved_tab_key"] : "" ); 
		$skip_fileds = array('sp_frmb_saved_tab_key');
		
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
			$tab_specific_skip_fileds = array();

	    	foreach ($tab["form"] as $fk => $fv) {

			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set
				
			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types())) {

			    	//skip fields where applicable
					if( isset($fv["eas"]) && is_array($fv["eas"] ) {

						$fv = self::inject_onclick_attr($mode, $form_definition, $fv["eas"], $fv);

						if( self::section_should_make_call($mode, $form_definition, $fv["eas"], $fk) ) {

							$section_fields = self::retrieve_section_fields($mode, $tab["form"], $fv["eas"], $fk);

							$payload = array();
							$payload['data'] = array();

							foreach ($section_fields as $sfk => $sfv) {

								if( in_array($sfv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) ) {

									$payload['data'][$sfk] = $sfv['value'];

									if( $fk == $sfk ) {

										if( !empty($sfv['value']) ) {

											$payload['data'][$sfk] = 1;
										} else {

											$payload['data'][$sfk] = 0;
										}
									}
								}
							}


							$parsed = self::call($fv["eas"]["au"] . $fv["eas"]["ep"], , $payload);


							$is_positive = self::is_response_positive($parsed);

							$form_definition[$key]["form"] = self::apply_response_msg($is_positive, $mode, $tab["form"], $section_fields, $parsed);

							$res = null;
							if( self::should_return($is_positive, $mode, $section_fields, $parsed, $res) ) {

								return $res;
							}

							self::apply_stat_changes_to_section($is_positive, $mode, $form_definition, $section_fields, $parsed);

							\eo\wbc\system\core\publics\Eowbc_Base_Model_Publics::handle_response($mode, $parsed);
						}

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

						/*ACTIVE_TODO_OC_START
						ACTIVE_TODO currently we are doing isset on the isset($args['data_raw']) instead of isset($args['data_raw'][$fk]) means without checking on the $fk so if we face any issues during edit or delete or some such action then need to manage accoringly. 
						ACTIVE_TODO_OC_END*/
						if( isset($_POST[$fk]) or isset($args['data_raw']/*[$fk]*/) ) {

							$save_as_data_meta['post_meta_found'] = true;	
						}

						if(!empty($args['data_raw'])) {
							// -- as per the flow planned/thought of we ma need only litel logzic here.
							// 	-- may be all that we need to do is simply read from the form definition itself instad of the post in the below if --to h & -- to s.
							// 		-- and so since data_raw will not going to passed so maybe the above not empty if condition need to be adjusted with something else -- to h & -- to s
							// 			-- i had thougt of doing not empty condition in form_definition using $fk but since some value might be set to 0 or empty so not empty will not work and not even isset because isset maybe become true even for normal case of the else condition below.
							// 				NOTE: it feels that we can not do anything else except the isset so in below if in the ternary operator simply the isset is assed 
							if (true /*true or since no dependancy on the dm based field so far*/ or !empty($dm_based_field)) {

								// ACTIVE_TODO here we are reading the directly passed custom data inside data_raw element, which is bad practice for security. so we should refactor this as soon as we get a chance and make sure that we either sanitize this or we use the standard input method on we like the post, get, request. but I think it is better that we simply sanitize this custom data by passing it to our sanitize library in the function which is accepting custom data.
								$save_as_data['post_meta'][$fk] = ( isset($fv/*[$fk]*/['value']) ? $fv/*[$fk]*/['value'] : '' );

							}

						} else {
							$save_as_data['post_meta'][$fk] = ( isset($_POST[$fk]) ? wbc()->sanitize->_post($fk) : '' ); 
						}
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

			}

	    }

    	if( $mode == 'get' ) {

    		return $form_definition;
    	} else {

    		//default mode save
    		return $args['res'];
    	}
    }

    private static function inject_onclick_attr($mode, $form_definition, $section_property, $fv) {

    	if( empty($fv['attr']) ) {

    		$fv['attr'] = array();
    	}

    	if( !is_array($fv['attr']) ) {

    		throw new \Exception("wbc form builder : The eas filed should defined the 'attr' property in array format only. the string format is not sported.", 1); 
    	}

    	NOTE : This is done to anchor decode compatibility.
    	if( !isset($fv['attr']['onclick']) ) {

    		$fv['attr']['onclick'] = '';
    	}

    	$fv['attr']['onclick'] = "alert('Since you have changed the switch, after save action the api settings will be updated so you need to test the related feature on the website frontend and elsewhere as applicable. And this applies to changes made to any field of this switch section so be sure to test related feature if you have changed any field of this switch section.');" . $fv['attr']['onclick'];

    	return $fv;
    }

    private static function section_should_make_call($mode, $form_definition, $section_property, $fk) {

    	if( 'get' == $mode ) {

    		return true;
    	}

    	if( 'save' == $mode ) {

    		if( ( empty( wbc()->options->get_option($section_property['tab_key'], $fk)) && isset( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && ( isset($_POST[$fk]) || $fv["type"]=='checkbox') ) ) || ( !empty( wbc()->options->get_option($section_property['tab_key'], $fk) ) && !isset( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && ( isset($_POST[$fk]) || $fv["type"]=='checkbox') ) ) ) {

    			return true;
    		}
    	}

    	return false;
    }

    private static function retrieve_section_fields($mode, $tab_form, $section_property, $fk) {

    	$section_fields = array();

    	foreach ($tab_form as $fk_inner => $fv_inner) {

    		if( $fk == $fk_inner || (isset($fv_inner['easf']) && $fk == $fv_inner['easf']) ) {

    			$section_fields[] = $fv_inner;
    		}
    	}

    	return $section_fields;
    }

    private static function is_response_positive($parsed) {

    	if( isset($parsed['type']) && 'success' == $parsed['type'] ) {

    		return true;
    	}

    	return false;
    }

    private static function apply_response_msg($is_positive, $mode, $tab_form, $section_fields, $parsed) {

    	if($is_positive){

    		return ;
    	}

    	--	hear we need to prepear the $res form $parsed by creating empty array and save. -- to h & -- to pi
    	$res = $parsed

    	return $tab_form;
    }

    private static function should_return($is_positive, $mode, $section_fields, $parsed, &$res) {

    	return false;
    }

    private static function apply_stat_changes_to_section($is_positive, $mode, $form_definition, $section_fields, $parsed) {

    	--	most obabely form here we need to return if $mode is save but stil there might be somthing that we need to handle for the save mode but it is mostly unlikely that we have somthing to do . so simply remove the open comment after this function finalizes  -- to h to pi
    	if( 'save' == $mode ) {

    		return $mode;
    	}
    }
}
