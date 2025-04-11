<?php
/*
 *	Utilities Model SP Extensions Api.
 */
namespace eo\wbc\model\utilities;

defined('ABSPATH') || exit;

wbc()->load->model('publics/eowbc_base_model_publics');

use eo\wbc\system\core\publics\Eowbc_Base_Model_Publics;

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

	private static function apply_input_by_method(&$url, &$post_fields, $api_settings, $payload, $args) {

		$payload = array('payload' => base64_encode( json_encode($payload) ));
		
		if( 'wp_remote_get' == $args['method'] ) {

			$query_string = array_merge($api_settings, $payload);

			// Build the query string
			$query_string = http_build_query($query_string);

			$url .= (strpos($url, '?') !== FALSE ? '&' . $query_string : "?" . $query_string);
		} elseif( 'wp_remote_post' == $args['method'] ) {

			// ACTIVE_TODO aa array merge opretion karu che pan a haji wp_remote_post ma jeva post perameter support kare che post mate k data mate na perameter e wise confirm karavanu and test karavanu baki che.	--	to hi & --	to pi
			$post_fields = array_merge($api_settings, $payload);
		}
	}

	public static function call($url, $api_settings, $payload = null, $throw_types = array('error'), $args = array()) {

		// wbc_pr('call function call');

		self::additional_data($api_settings, $payload);

		// wbc_pr($api_settings);
		// wbc_pr($payload);
		// die('call function payload log');

		// $url .= (strpos($url, '?') !== FALSE ? $api_settings : "?" . $api_settings);

		if( !is_array($api_settings) ) {

			if( is_string($api_settings) ) {

				$api_settings_temp = null;
				parse_str($api_settings, $api_settings_temp);
				$api_settings = $api_settings_temp;
			}
		}

		if( !isset($args['method']) ) {

			$args['method'] = "wp_remote_get";
		}
		// wbc_pr($api_settings);
		// die('call function after apply_input_by_method');
		$post_fields = null;

		self::apply_input_by_method($url, $post_fields, $api_settings, $payload, $args);


		// wbc_pr($url);
		// die('call function after apply_input_by_method');
		$result = null;

		if( 'wp_remote_get' == $args['method'] ) {

			$result = wp_remote_get($url, array('timeout' => 36));
		} elseif( 'wp_remote_post' == $args['method'] ) {

			// ACTIVE_TODO niche no wp_remote_post call ne documetion joi ne confirm karavanu baki che. and post_fields variabla che e function apply_input_by_method ma format thay che.
			$result = wp_remote_post($url, $post_fields);
		}

		// wbc_pr($result);
		// die('call function after if else');
		$parsed = \eo\wbc\system\core\publics\Eowbc_Base_Model_Publics::parse_response($result, $args['method']);

		// wbc_pr($result);
		// wbc_pr($parsed);
		// die('call function to call parse_response');
		wbc_free_memory($result);
		// wbc_pr($result);
		// die('wbc_free_memory call');

		return $parsed;
	}

	private static function additional_data(&$query_string, &$payload) {

		if( empty($query_string) ) {

			$query_string = "";
		} else {

			$query_string .= '&';
		}

		$query_string .= "token=" . wbc()->options->get_option('extras_extras_configuration','token') . '&';

		if( !is_array($payload) ) {
			
			$payload = array();
		}

		if( !isset($payload['fctr']) ) {

			$payload['fctr'] = array();
		}

		// ACTIVE_TODO as and when we required the user agent support we need to pass it from here.	--	to h & --  to pi
		$payload['fctr']['user_agent'] = '';

		$query_string_temp = self::active_theme_and_plugins();

		$query_string_temp_1 = null;

		parse_str($query_string_temp, $query_string_temp_1);

		$payload['fctr'] = array_merge($payload['fctr'], $query_string_temp_1);

		if( !isset($payload['sp_api_bpfa']) ) {

			$payload['sp_api_bpfa'] = array();
		}

		$payload['sp_api_bpfa']['pc'] = wbc()->options->get_option('appearance_global','theme_primary_color');
		$payload['sp_api_bpfa']['sc'] = wbc()->options->get_option('appearance_global','theme_secondary_color');

		$payload['sp_api_bpfa']['pcs90'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_90');
		$payload['sp_api_bpfa']['scs90'] = wbc()->options->get_option('appearance_global','theme_secondary_color_shade_light_90');

		$payload['sp_api_bpfa']['pcs80'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_80');
		$payload['sp_api_bpfa']['scs80'] = wbc()->options->get_option('appearance_global','theme_secondary_color_shade_light_80');

		// $payload['sp_api_bpfa']['pcs70'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_70');
		// $payload['sp_api_bpfa']['scs70'] = wbc()->options->get_option('appearance_global','theme_secondary_color_shade_light_70');

		$payload['sp_api_bpfa']['pcs60'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_60');
		$payload['sp_api_bpfa']['scs60'] = wbc()->options->get_option('appearance_global','theme_secondary_color_shade_light_60');

		$payload['sp_api_bpfa']['pcs50'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_50');
		$payload['sp_api_bpfa']['scs50'] = wbc()->options->get_option('appearance_global','theme_secondary_color_shade_light_50');

		$payload['sp_api_bpfa']['pcs40'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_40');
		$payload['sp_api_bpfa']['scs40'] = wbc()->options->get_option('appearance_global','theme_secondary_color_shade_light_40');

		// $payload['sp_api_bpfa']['pcs20'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_20');
		// $payload['sp_api_bpfa']['scs20'] = wbc()->options->get_option('appearance_global','theme_secondary_color_shade_light_20');

		$payload['sp_api_bpfa']['pcs95'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_95');
		$payload['sp_api_bpfa']['pcs85'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_85');
		$payload['sp_api_bpfa']['pcs75'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_75');
		$payload['sp_api_bpfa']['pcs70'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_70');
		$payload['sp_api_bpfa']['pcs30'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_30');
		$payload['sp_api_bpfa']['pcs20'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_20');
		$payload['sp_api_bpfa']['pcs10'] = wbc()->options->get_option('appearance_global','theme_primary_color_shade_light_10');


		// wbc_pr( $payload );
		// die('additional_data last');
	}

	private static function active_theme_and_plugins() {

		// -- here we need to put the appropriate code for fetching the active theme and plugins. -- to h & -- to pi done.

		$query_string = '';
		// $active_plugins_slugs = array();
		// $active_plugins_versions = array();
		$active_plugins = array();
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
					// $active_plugins_slugs[] = dirname($plugin_path);
					// $active_plugins_versions[] = $plugin_info['Version'];
					$active_plugins[dirname($plugin_path)] = $plugin_info['Version'];
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

			// --	active_child_theme_slug no available hoy to ano spport may be mp pase add karavavo padase.	-- to h done
			$query_string .= "active_theme_slug=" .  $active_parent_theme_slug . "&";
			$query_string .= "active_theme_version=" .  $active_parent_theme_version . "&";
			$query_string .= "active_child_theme_slug=" .  $active_theme_slug . "&";
			$query_string .= "active_child_theme_version=" .  $active_theme_version . "&";
		} else {

			$query_string .= "active_theme_slug=" .  $active_theme_slug . "&";
			$query_string .= "active_theme_version=" .  $active_theme_version . "&";

			// --	active_child_theme_slug no available hoy to ano spport may be mp pase add karavavo padase.	-- to h done
				// NOTE: below two line of code added for abow point on 17-12-2024
			$query_string .= "active_child_theme_slug=&";
			$query_string .= "active_child_theme_version=&";
		}

		// $query_string .= "active_plugins_slugs=" . explode("," , $active_plugins_slugs) . "&";
		// $query_string .= "active_plugins_versions=" . explode("," , $active_plugins_versions) . "&";
		foreach ($active_plugins as $slug => $version) {
			$query_string .= $slug . "=" . $version . "&";
		}

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

	public static function hooks() {

		ACTIVE_TODO/TODO if ever we face any problems for this webhook code then we can simply move it from here to applicable submodule and so on from where also the extensions could be able to access it. the problems that might be of concern are secutiry problems, performance concern(least likely) or some other such things. -- to h
		add_action('rest_api_init', function() {

		    self::sp_wbc_webhook_register_route();
		});
    }

    private static function process_form_definition($mode, $form_definition, $args) {
    	// die('process_form_definition start');
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty( $args["hook_callback_args"]["sp_frmb_saved_tab_key"] ) ? $args["hook_callback_args"]["sp_frmb_saved_tab_key"] : ""; 

		// NOTE: if ever we have any other field to skip then add here.
		$skip_fileds = array(/* 'sp_frmb_saved_tab_key' */ $saved_tab_key);
		
		$save_as_data = array();	
		$save_as_data_meta = array();	

    	//loop through form tabs and save 	    
	    foreach ($form_definition as $key => $tab) {
	    	// wbc_pr('form_definition111');
	    	// wbc_pr($key);
	    	// wbc_pr($saved_tab_key);
	    	// wbc_pr('form_definition 78941');

	    	if( 'save' == $mode && $key != $saved_tab_key ) {
	    		continue;
	    	}

	    	// wbc_pr($key);
	    	// wbc_pr($saved_tab_key);
	    	// wbc_pr('ggggggggg');
	    	// --	nicheno key_clean variable comment karavo padashe kem k tene variable dipendency che so jaroor no hoy to comment. -- to h & -- to pi done.	
	    	// $key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key); 
	    	//$res['data_form'][]= $tab;
			$is_table_save = false;	//	ACTIVE_TODO/TODO it should be passed from child maybe or make dynamic as applicable. ($key == $this->tab_key_prefix."d_fconfig" or $key == $this->tab_key_prefix."s_fconfig" or $key=='filter_set') ? true : false;

			$table_data = array();
			$tab_specific_skip_fileds = array();	//ACTIVE_TODO/TODO it will be spported only if the hook pass it and so it is available here in this process_form_definition function in $args variable. means when the process_form_definition function called here from the hooks bound in this class from abow admin_hooks function.

	    	foreach ($tab["form"] as $fk => $fv) {

	    		// wbc_pr('form_definition 22222');
			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) ) {

			    	//skip fields where applicable
					if( 'save' == $mode && in_array($fk, $skip_fileds) ) {
		    			continue;
		    		}

			    	//skip fields where applicable
					if( isset($fv["eas"]) && is_array($fv["eas"]) ) {
						// wbc_pr('eas if in');
						$tab["form"][$fk] = self::inject_onclick_attr($mode, $form_definition, $fv["eas"], $fv);

						$section_fields = self::retrieve_section_fields($tab["form"], $fv["eas"], $fk);
						// wbc_pr('section_should_make_call');	
						if( self::section_should_make_call($mode, $form_definition, $fv["eas"], $fk, $section_fields) ) {

							// wbc_pr('section_should_make_call in');	
							
							$payload = array();
							$payload['fctr'] = array();

							foreach ($section_fields as $sfk => $sfv) {

								if( in_array($sfv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) ) {
									
									$payload['fctr'][$sfk] = self::field_value_for_payload($mode, $fk, $sfk, $sfv);

								}
							}

							// wbc_pr( $payload );
							// die('process_form_definition 1111');
							$parsed = self::call($fv["eas"]["au"] . $fv["eas"]["ep"], "ihk=".$fv["eas"]["ihk"], $payload, array());

							// wbc_pr($parsed);
							// die('parsed');

							$is_apply_response_msg = self::is_apply_response_msg($parsed, $fv["eas"]);

							$res = $args['res'];

							$tab["form"] = self::apply_response_msg($is_apply_response_msg, $mode, $tab["form"], $section_fields, $parsed, $fk, $res);

							$args['res'] = $res;

							// wbc_pr('befor should_do_stat_changes if');
							// wbc_pr($tab["form"]);
							// wbc_pr('aaaaaaaaaa');
							if( self::should_do_stat_changes($mode, $parsed) ) {

								// die('inside should_do_stat_changes if');

								$tab["form"] = self::apply_stat_changes_to_section($mode, $tab["form"], $section_fields, $parsed, $fk);
								// wbc_pr($tab["form"]);

							}

							// wbc_pr('should_handle_response 1111111');
							// wbc_pr($mode);
							// wbc_pr($parsed);
							// die('should_handle_response parsed');
							if( self::should_handle_response($mode, $parsed) ) {

								// die('inside should_handle_response if');
								\eo\wbc\system\core\publics\Eowbc_Base_Model_Publics::handle_response($parsed, array());		
							}
							// die('inside should_handle_response if 123114');
						}

						$form_definition[$key]["form"] = $tab["form"];
						
					}
			    }
			}
	    }
	    // die('mode 111');
	    // wbc_pr($form_definition);
    	if( $mode == 'get' ) {
    		// die('mode222');
    		return $form_definition;
    	} else {
    		// die('mode3333');
    		//default mode save
    		return $args['res'];
    	}
    }

    private static function inject_onclick_attr($mode, $form_definition, $section_property, $fv) {

    	if( 'save' == $mode ) {

    		return $fv;
    	}

    	if( empty($fv['attr']) ) {

    		$fv['attr'] = array();
    	}

    	if( !is_array($fv['attr']) ) {

    		throw new \Exception("WBC Form Builder: The eas field should define the 'attr' property in array format only. Other type format is not supported.", 1); 
    	}

    	// NOTE : This is done to ensure backward compatibility.
    	if( !isset($fv['attr']['onclick']) ) {

    		$fv['attr']['onclick'] = '';
    	}

    	$fv['attr']['onclick'] = "alert('Important! Since you have changed the switch, after save action, the api settings will be updated so you need to test the related feature on the website frontend and elsewhere as applicable. And this applies to changes made to any field of this switch section so be sure to test related feature when you change any field of this switch section.');" . $fv['attr']['onclick'];

    	return $fv;
    }

    private static function section_should_make_call($mode, $form_definition, $section_property, $fk, $section_fields) {

    	if( 'get' == $mode ) {

    		return true;
    	}

    	if( 'save' == $mode ) {

			foreach ($section_fields as $sfk => $sfv) {

				if( $fk == $sfk || $sfv['type'] == 'checkbox' ) {

					if( 
						( empty( wbc()->options->get_option($section_property['tab_key'], /* $fk */$sfk) ) && isset($_POST[/* $fk */$sfk]) ) 
						|| 
						( !empty( wbc()->options->get_option($section_property['tab_key'], /* $fk */$sfk) ) && !isset($_POST[/* $fk */$sfk]) ) 
					) {

						return true;
					}
				} else {

					if( wbc()->options->get_option($section_property['tab_key'], /* $fk */$sfk) != wbc()->sanitize->post($sfk) ) {

						return true;
					}
				}
			}
    	}

    	return false;
    }

    private static function retrieve_section_fields($tab_form, $section_property, $fk) {

    	$section_fields = array();

    	foreach ($tab_form as $fk_inner => $fv_inner) {

    		if( $fk == $fk_inner || (isset($fv_inner['easf']) && $fk == $fv_inner['easf']) ) {

    			$section_fields[$fk_inner] = $fv_inner;
    		}
    	}

    	return $section_fields;
    }

	private static function field_value_for_payload($mode, $fk, $sfk, $sfv) {

		$value = ($mode == 'get' ? $sfv['value'] : wbc()->sanitize->post($sfk));

		if( $fk == $sfk || $sfv["type"] == 'checkbox' ) {

			if( !empty($value) ) {

				$value = 1;
			} else {

				$value = /* 0 */-1;
			}
		}

		return $value;
    }

    private static function is_apply_response_msg($parsed, $section_property) {

    	if( isset($parsed['type']) && !( 'success' == $parsed['type'] && ('success' == $parsed['sub_type'] && !( isset($section_property['dap']) && $section_property['dap'] ) ) ) ) {

    		return true;
    	}

    	return false;
    }

    private static function apply_response_msg($is_apply_response_msg, $mode, $tab_form, $section_fields, $parsed, $fk, &$res) {

    	if( !$is_apply_response_msg ) {

    		return $tab_form;
    	}

    	// --	hear we need to prepare the $res form $parsed by creating empty array and so on. -- to h & -- to pi 	done.
    	// $res = $parsed;

    	if( 'save' == $mode ) {

    		// --	from hear most probabely we need to return $res and it will be not prepared by should_return function most probabely. -- to h & -- to pi	done.
    		// NOTE: here we need to set in $res the type != success. but we have set all the standard proparty like type, sub_type and so on to ensure that if it have required on underlying layers then they can directly use it. and type != success condition is not nessesry so that is not applyed and type is set for the all scenarios. 
    		$res = array('type' => $parsed['type'], 'msg' => $parsed['msg'], 'sub_type' => $parsed['sub_type'], 'sub_msg' => $parsed['sub_msg']);
    	}

    	if( 'get' == $mode ) {

    		$msg = null;

    		if( 'success' != $parsed['type'] ) {

    			$msg = $parsed['msg'];
    		} else {

    			$msg = $parsed['sub_msg'];
    		}

    		$tab_form = self::inject_visible_info_field($mode, $tab_form, $section_fields, $parsed, $fk, $msg);
    	}

    	return $tab_form;
    }

    private static function should_do_stat_changes($mode, $parsed) {

    	if( 'get' == $mode && ( isset($parsed['type']) && !( 'success' == $parsed['type'] && ('success' == $parsed['sub_type'] || 'warning' == $parsed['sub_type']) ) ) ) {

    		return false;
    	}

    	if( 'save' == $mode ) {

    		return false;
    	}

    	return true;
    }

    private static function should_handle_response($mode, $parsed) {
    	// wbc_pr($mode);
    	// wbc_pr($parsed);
    	// die('should_handle_response 1542');
    	if( 'get' == $mode && ( isset($parsed['type']) && ( 'success' == $parsed['type'] && ('success' == $parsed['sub_type'] || 'warning' == $parsed['sub_type']) ) ) ) {

    		return false;
    	}

    	if( 'save' == $mode && ( isset($parsed['type']) && 'success' != $parsed['type'] ) ) {

    		return false;
    	}

    	return true;
    }

    private static function apply_stat_changes_to_section($mode, $tab_form, $section_fields, $parsed, $fk) {

    	// die('apply_stat_changes_to_section');
    	foreach ($section_fields as $sfk => $sfv) {

    		if( $fk == $sfk ) {

				// ACTIVE_TODO_OC_START
    			// --	most probabely we need to make here the switch as non interactive by removeing the applicable proparty entirely or proparty attribute. 
				// ACTIVE_TODO_OC_END
    		} else {

    			// die('apply_stat_changes_to_section else');
    			$string_class = null;
    			$remove_class_index = null;
    			
    			//	in semantic hidden class for hide.
    			//	in semantic show class for show.
    			if( is_array($tab_form[$sfk]['size_class']) ) {
				    
				    $remove_class_index = array_search('hidden', $tab_form[$sfk]['size_class']);
				} else {
				    
				    $string_class = explode(' ', $tab_form[$sfk]['size_class']);
				    
				    $remove_class_index = array_search('hidden', $string_class); 
				}

				if( isset($remove_class_index) && $remove_class_index !== false ) {
				    
				    if( is_array($tab_form[$sfk]['size_class']) ) {
				        
				        unset($tab_form[$sfk]['size_class'][$remove_class_index]);
				    } else {
				        
				        unset($string_class[$remove_class_index]);
				        $tab_form[$sfk]['size_class'] = implode(' ', $string_class); 
				    }
				}
    		}
    	}
    	// wbc_pr($tab_form);
		// die('tab frommmmmmmm');
    	return $tab_form;
    }

    private static function inject_visible_info_field($mode, $tab_form, $section_fields, $parsed, $fk, $msg) {

    	$style = null;

    	$type = $parsed['type'] != 'success' ? $parsed['type'] : $parsed['sub_type'];

    	$style .= $type == 'error' ? 'color: red;' : '';
		$style .= $type == 'warning' ? 'background-color: yellow;' : '';
		$style .= $type == 'success' ? 'color: green;' : '';

    	$visible_info = array(
				    		'label' => eowbc_lang($msg),
				    		'type' => 'visible_info',
				    		'class' => array('small'),
				    		// 'size_class'=>array('sixteen','wide'),
				    		'attr'=>array('style = "'.$style.'"'),
	    				);
    	// wbc_pr($visible_info);
    	$tab_form = wbc()->common->array_insert_before($tab_form, $fk, $fk.'_eas_visible_info', $visible_info, true);
    	// wbc_pr($tab_form);
    	return $tab_form;
    }

    private static function sp_wbc_webhook_register_route() {

        register_rest_route('sp-wbc-webhook/v1', '/receive', array(
            'methods'  => 'POST',
            'callback' => function($request) {

                return self::sp_wbc_webhook_listener($request);
            },
            'permission_callback' => '__return_true'
        ));
    }

    private static function sp_wbc_webhook_listener(WP_REST_Request $request) {

        // Step 1: Get API key from request headers
        $headers = $request->get_headers();
        $api_key = isset($headers['api-key']) ? $headers['api-key'][0] : '';

        // Step 2: Validate API key using activate/deactivate token
        $valid_api_key = get_option('extra_sub_tab_token');
        if (!$api_key || $api_key !== $valid_api_key) {

            return new WP_REST_Response([
                'type' => 'error',
                'msg'  => 'Unauthorized: Invalid API Key'
            ], 403);
        }

        // Step 3: Get JSON input
        $data = $request->get_json_params();

        // Step 4: Call filter hook
        $response = apply_filters('sp_wbc_webhook_process', array(
            'type' => 'success',
            'msg'  => 'Webhook processed successfully'
        ), $data);

        // Step 5: Return the filtered response
        return rest_ensure_response($response);
    }
}
