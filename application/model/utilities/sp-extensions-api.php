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

	public static function call($url, $query_string, $payload = null, $throw_types = array('error')) {

		self::additional_data($query_string, $payload);

		$url .= (strpos($url, '?') !== FALSE ? $query_string : "?" . $query_string);

		$result = wp_remote_get($url);

		$parsed = \eo\wbc\system\core\publics\Eowbc_Base_Model_Publics::parse_response($result, 'wp_remote_get');

		wbc_free_memory($result);

		return $parsed;
	}

	private static function additional_data(&$query_string, &$payload) {

		if( empty($query_string) ) {

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

		$saved_tab_key = !empty( $args["hook_callback_args"]["sp_frmb_saved_tab_key"] ) ? $args["hook_callback_args"]["sp_frmb_saved_tab_key"] : ""; 
		$skip_fileds = array('sp_frmb_saved_tab_key');
		
		$save_as_data = array();	
		$save_as_data_meta = array();	

    	//loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {

	    	if( 'save' == $mode && $key != $saved_tab_key ) {
	    		continue;
	    	}
	    	
	    	$key_clean = ((!empty($this->tab_key_prefix) and strpos($key,$this->tab_key_prefix)===0)?substr($key,strlen($this->tab_key_prefix)):$key);
	    	//$res['data_form'][]= $tab;
			$is_table_save = false;	//	ACTIVE_TODO/TODO it should be passed from child maybe or make dynamic as applicable. ($key == $this->tab_key_prefix."d_fconfig" or $key == $this->tab_key_prefix."s_fconfig" or $key=='filter_set') ? true : false;

			$table_data = array();
			$tab_specific_skip_fileds = array();	ACTIVE_TODO/TODO it will spported only if the hook pass it and so it is available hear in this process_form_definition function in $args variable. means when the process_form_definition function called hear from the hooks fire in this class from abow admin_hooks function.

	    	foreach ($tab["form"] as $fk => $fv) {

			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) ) {

			    	//skip fields where applicable
					if( 'save' == $mode && in_array($fk, $skip_fileds) ) {
		    			continue;
		    		}

			    	//skip fields where applicable
					if( isset($fv["eas"]) && is_array($fv["eas"]) ) {

						$tab["form"][$fk] = self::inject_onclick_attr($mode, $form_definition, $fv["eas"], $fv);

						$section_fields = self::retrieve_section_fields($tab["form"], $fv["eas"], $fk);

						if( self::section_should_make_call($mode, $form_definition, $fv["eas"], $fk, $section_fields) ) {

							$form_definition[$key]["form"] = $tab["form"];

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


							$parsed = self::call($fv["eas"]["au"] . $fv["eas"]["ep"], "ihk=".$fv["eas"]["ihk"], $payload, array());


							$is_positive = self::is_response_positive($parsed);

							$tab["form"] = self::apply_response_msg($is_positive, $mode, $tab["form"], $section_fields, $parsed, $fk);

							$res = null;
							if( self::should_do_stat_changes($mode, $parsed, $res) ) {

								$tab["form"] = self::apply_stat_changes_to_section($mode, $tab["form"], $section_fields, $parsed, $fk);

								return $res;
							}

							if( self::should_handle_response($mode, $parsed, $res) ) {

								\eo\wbc\system\core\publics\Eowbc_Base_Model_Publics::handle_response($parsed, array());		
							}
						}
					}
			    }
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

    	--	'get' == $mode ni if maravani jaroor ahi che.	-- to h & -- to pi

    	if( empty($fv['attr']) ) {

    		$fv['attr'] = array();
    	}

    	if( !is_array($fv['attr']) ) {

    		throw new \Exception("WBC Form Builder: The eas field should define the 'attr' property in array format only. Other type format is not supported.", 1); 
    	}

    	NOTE : This is done to ensure backward compatibility.
    	if( !isset($fv['attr']['onclick']) ) {

    		$fv['attr']['onclick'] = '';
    	}

    	--	nichena msg ma last ma "if you have changed any field of this switch section." text che ene chenge kari ne "when you change any field of this switch section.".	-- to h
    	$fv['attr']['onclick'] = "alert('Important! Since you have changed the switch, after save action, the api settings will be updated so you need to test the related feature on the website frontend and elsewhere as applicable. And this applies to changes made to any field of this switch section so be sure to test related feature if you have changed any field of this switch section.');" . $fv['attr']['onclick'];

    	return $fv;
    }

    private static function section_should_make_call($mode, $form_definition, $section_property, $fk, $section_fields) {

    	if( 'get' == $mode ) {

    		return true;
    	}

    	if( 'save' == $mode ) {

    		--	below if is not finlize yet.
    		--	may be we have covered hear only the checkbox type filds but not other so need to conferm about that. -- to h
    			--	$fv need to be add as argument in this function. -- to h & -- to pi
    		if( 
    			( 
    				empty( wbc()->options->get_option($section_property['tab_key'], $fk) ) 
    				&& 
    				( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) 
    					&& ( isset($_POST[$fk]) || $fv["type"]=='checkbox') ) 
    			) 
    			|| 
    			( 
    				!empty( wbc()->options->get_option($section_property['tab_key'], $fk) ) 
    				&& 
    				( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) 
    					&& ( !isset($_POST[$fk]) || $fv["type"]=='checkbox') ) 
    			) 
    		) {

    			return true;
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

    private static function is_response_positive($parsed) {

    	if( isset($parsed['type']) && ('success' == $parsed['type'] && ('success' == $parsed['sub_type'] || 'warning' == $parsed['sub_type'])) ) {

    		return true;
    	}

    	return false;
    }

    private static function apply_response_msg($is_positive, $mode, $tab_form, $section_fields, $parsed, $fk) {

    	if( $is_positive ) {

    		return;
    	}

    	--	hear we need to prepare the $res form $parsed by creating empty array and save. -- to h & -- to pi 	done.
    	// $res = $parsed;

    	if( 'save' == $mode ) {

    		--	from hear most probabely we need to return $res and it will be not prepared by should_return function most probabely. -- to h & -- to pi
    		NOTE: hear we need to set in $res the type != success. but we have set all the standard proparty like type, sub_type and so on to ensuer that if it have required on underlayen layers then teke and directly use it and type != success condition is not nessesry so that is not applyed and type is set for the all scenario. 
    		$res = array('type' => $parsed['type'], 'msg' => $parsed['msg'], 'sub_type' => $parsed['sub_type'], 'sub_msg' => $parsed['sub_msg']);
    	}

    	if( 'get' == $mode ) {

    		$msg = null;

    		if( 'success' !== $parsed['type'] ) {

    			$msg = $parsed['msg'];
    		} else {

    			$msg = $parsed['sub_msg'];
    		}

    		$tab_form = self::inject_visible_info_field($mode, $tab_form, $section_fields, $parsed, $fk, $msg);
    	}

    	return $tab_form;
    }

    private static function should_do_stat_changes($mode, $parsed, &$res) {

    	if( 'get' == $mode && ( isset($parsed['type']) && !('success' == $parsed['sub_type'] || 'warning' == $parsed['sub_type']) ) ) {

    		return false;
    	}

    	if( 'save' == $mode ) {

    		--	hear we need to diside what is need to be done.
    		return false;
    	}

    	return true;
    }

    private static function should_handle_response($mode, $parsed, &$res) {

    	if( 'get' == $mode && ( isset($parsed['type']) && ('success' == $parsed['sub_type'] || 'warning' == $parsed['sub_type']) ) ) {

    		return false;
    	}

    	if( 'save' == $mode && ( isset($parsed['type']) && 'success' != $parsed['type'] ) ) {

    		return false;
    	}

    	return true;
    }

    private static function apply_stat_changes_to_section($mode --	253.11.4 na recoding ma aa perameter ne remove karavnu kidhu par aa peramter use ma hovathi te remove karyu nathi., $tab_form, $section_fields, $parsed, $fk) {

    	foreach ($section_fields as $sfk => $sfv) {

    		if( $fk == $sfk ) {

    			--	most probabely we need to make here the switch as non interactive by removeing the applicable proparty entirely or proparty attribute. 
    		} else {

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

    	--	most probabely from here we need to return if $mode is save but stil there might be somthing that we need to handle for the save mode but it is mostly unlikely that we have somthing to do . so simply remove the open comment after this function finalizes  -- to h & -- to pi
    	if( 'save' == $mode ) {

    		return $mode;	--	most probabely record pramane aya return karavano intent khali return karavano hase $mode nai.
    	}

    	return $tab_form;
    }

    private static function inject_visible_info_field($mode, $tab_form, $section_fields, $parsed, $fk, $msg) {

    	$style = null;

    	$style .= $parsed['type'] === 'error' ? 'color: red;' : '';
		$style .= $parsed['type'] === 'warning' ? 'background-color: yellow;' : '';

    	$visible_info = array(
				    		'label' => eowbc_lang($msg),
				    		'type' => 'visible_info',
				    		'class' => array('small'),
				    		// 'size_class'=>array('sixteen','wide'),
				    		'attr'=>array('style = "'.$style.'"'),
	    				);

    	--	ahi may be after add karavnu avse so me to add just a argument spport inside below function.	-- to h & -- to pi
    	$tab_form = wbc()->common->array_insert_before($tab_form, $fk, $fk.'_eas_visible_info', $visible_info, true);

    	return $tab_form;
    }
}
