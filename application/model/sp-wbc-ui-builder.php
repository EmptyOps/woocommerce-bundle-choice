<?php
/*
*	A UI builder class to generate UI based on the array of params recived.
*/
namespace eo\wbc\model;
use eo\wbc\model\interfaces\Builder;
use eo\wbc\model\utilities\Eowbc_Theme_Adaption_Check;

defined( 'ABSPATH' ) || exit;

class SP_WBC_Ui_Builder extends \sp\wbc\system\core\SP_Ui_Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	// ACTIVE_TODO_OC_START
	// -- As observed in the options layer, in the option halper layer, the get option function have the overrides paramiter wech is by default (overrides) equal to true, so lets just set it to false for the all get option call within wbc ui builder and maybe also within the generate_form funaction layer but if it is a complicated to confirm for generate form then simply do it here in the wbc ui builder and all other ui builder and page builder classes so lat simply check 6 classes  -- to h & -- to b
	// ACTIVE_TODO_OC_END
	public function build($ui,$option_key='',$process_form = true,$ui_generator = null, $ui_definition = null){

		parent::build($ui, $option_key, $process_form,$ui_generator, $ui_definition);
		
		if ($ui_generator === null) {
			
			// --ui_builder.php mathi $ui_generator avyo chhe
			$ui_generator = \eo\wbc\controllers\admin\Controller::instance();
		}

		if(!empty($ui) and is_array($ui)){
			
			foreach ($ui as $ui_key => $ui_ele) {

				// wbc_pr('ffffffffffffff');
				// wbc_pr($ui_key);
				// wbc_pr($ui_ele);

				$ui_ele_id_key = isset($ui_ele['id_key']) ? $ui_ele['id_key'] : null ;
				
				// -- a if /sp_theme_ui/application/view/ui/Base_Builder.php build function ni chhe
				if(!empty($ui_definition['controls'][$ui_ele_id_key]['configuration_controls']) and !empty($ui_definition['controls'][$ui_ele_id_key]['configuration_controls'][2])){

					if(!empty($ui_definition['controls'][$ui_ele_id_key]['configuration_controls'][2]['action']) and $ui_definition['controls'][$ui_ele_id_key]['configuration_controls'][2]['action']==='toggle_section') {

						$_data_key_ = $ui_definition['controls'][$ui_ele_id_key]['configuration_controls'][2][/*'id'*/'id_key'];
						$_option_key_ = $ui_definition['controls'][$ui_ele_id_key]['configuration_controls'][2]['control_key'];

						$type = '';
						if(!empty($ui_ele['type'])){
							$type = $ui_ele['type'];
						} 

						if(!empty($ui_definition['controls'][$ui_ele_id_key]['configuration_controls'][2]['type'])) {
							$type = $ui_definition['controls'][$ui_ele_id_key]['configuration_controls'][2]['type'];
						}

						if(!empty($type)) {
							$_data_key_.='_'.$type;
						}
						
						if(wbc()->options->get_option($_option_key_,$_data_key_)){
							continue;
						} else {
							$this->call_process_build($ui_key,$ui_ele,$ui,$option_key,$process_form,$ui_generator,isset($ui_definition['controls'][$ui_ele_id_key])?$ui_definition['controls'][$ui_ele_id_key]:null,$ui_definition);		
						}
					} else {
						$this->call_process_build($ui_key,$ui_ele,$ui,$option_key,$process_form,$ui_generator,isset($ui_definition['controls'][$ui_ele_id_key])?$ui_definition['controls'][$ui_ele_id_key]:null,$ui_definition);
					}

				} else {
					$this->call_process_build($ui_key,$ui_ele,$ui,$option_key,$process_form,$ui_generator,isset($ui_definition['controls'][$ui_ele_id_key])?$ui_definition['controls'][$ui_ele_id_key]:null,$ui_definition);
				}
			}

		}
	}

	private function call_process_build($ui_key,$ui_ele,$ui,$option_key='',$process_form = true,$ui_generator = null, $ui_element_definition = null, $ui_definition = null){

		// NOTE: The das node support added in the ui builder is standard support with the simple and naturel structure. and the user can use this support to increase or decrease field no matter if it is supported on the wp customizer and external page builders like elementor and so on, which means if user can use this support than even if they do not use the increase or decrease support of the wp customizer or external page builders than also they can be fine with their requirement otherwise they are also free to use the support of the wp customizer or external page builder to increase or decrease in which case they can skip using this support. 

		$this->process_build($ui_key, $ui_ele, $ui, $option_key, $process_form, $ui_generator, $ui_element_definition,$ui_definition);

		if (!empty($ui_ele['das_node'])) {

			if (!empty($ui_ele['id_key'])) {

				$id_key_org = $ui_ele['id_key']; 

				$das_node_count = wbc()->options->get_option($ui_element_definition['data_controls'][2]['tab_key'],$id_key_org."_das_node_count",(isset($ui_ele['das_node_defaults']) ? sizeof($ui_ele['das_node_defaults']) : 0),false,false);

				for($i = 0; $i<$das_node_count; $i++) {

					// --	here we most probably need to set id_key for the das node at $i index no matter if it is set in defaults or not. beucase otherwise if the id_key used of main node than it will override the main nodes admin options so it seems fundamental and we may have missed this in the flow -- to h done 
					if (isset($ui_ele['das_node_defaults'][$i])) {
						
						//if (empty($ui_ele['das_node_defaults'][$i]['id_key'])) {
							
							$ui_ele['das_node_defaults'][$i]['id_key'] = /*$ui_ele['id_key']*/$id_key_org."_".$i;
						//}
					} else {

						$ui_ele['id_key'] = /*$ui_ele['id_key']*/$id_key_org."_".$i;
					}

					// ACTIVE_TODO this is wary sansitiv flow issue here that we need to pass the broad layer variables data lick $ui_definition and so on to deep down to all the layer and than that is calling back the main function so we need to refactor it and mac sur that recarshon hapans only from the build funaction or next to the sub call_process_build function and the depandancy on passing $ui_definition all the way to the element files is removed. so simply this is a reyali bade flow we need to refactor it as sun as we get sanche. and lats do is max by the 2ed revision and any how.-- to h & -- to b
					$this->process_build(
						$i/*$ui_key*/, 

						isset($ui_ele['das_node_defaults'][$i]) ? $ui_ele['das_node_defaults'][$i] : $ui_ele, 

						$ui, 
						$option_key, 
						$process_form, 
						$ui_generator, 

						// isset($ui_definition['controls'][$ui_ele['das_node_defaults'][$i]['id_key']]) ? $ui_definition['controls'][$ui_ele['das_node_defaults'][$i]['id_key']] : 
						$ui_element_definition,

						$ui_definition
					);
				}
			}
		}
	}

	protected function process_build($ui_key,$ui_ele,$ui,$option_key='',$process_form = true,$ui_generator = null, $ui_element_definition = null, $ui_definition = null) {

		parent::process_build($ui_key,$ui_ele,$ui,$option_key,$process_form,$ui_generator,$ui_element_definition,$ui_definition);

		if(!empty($ui_ele['type'])) {

			if(empty($ui_ele['id_key']) and is_string($ui_key)) {
				$ui_ele['id_key'] = $ui_key;
			}

			if(empty($ui_ele['name']) and is_string($ui_key)) {
				$ui_ele['name'] = $ui_key;
			}

			/*------------------------
			-- a code sp_theme_ui/application/view/ui/Base_Builder.php no process_build() no che*/

			if(!empty($ui_ele['class']) and is_array($ui_ele['class'])) {
				$ui_ele['class'] = implode(' ', $ui_ele['class']);
			}

			if(!empty($ui_ele['child']) and !empty($ui_ele['child']['type'])) {
				$ui_ele['child'] = array($ui_ele['child']);
			}

			if(!empty($ui_ele['attr']) and is_array($ui_ele['attr'])) {
			    
				//$ui_ele['child'] = array($ui_ele['child']);
				$attribute='';
				foreach ($ui_ele['attr'] as $attr_key => $attr_value) {
					// @bhavesh - 18-06-2021 -- modification due to error : array to string conversion
					//$attribute.=" ${attr_key}=\"${attr_value}\" ";
					if(!is_null($attr_value)) {

						if(is_array($attr_value)) {

						    //$attribute.=" ${attr_key}=".implode(',',$attr_value);
						    $attribute.=" ${attr_key}=\"".esc_attr(implode(',',$attr_value))."\" ";
						} else {

						    $attribute.=" ${attr_key}=\"${attr_value}\" ";
						}
						
					} else {

						// NOTE: the support for custom attributes is now added. which means in attr_value if null is passed then whatever is availabale in attr_key is echoed as the attribute.
						$attribute.=" ${attr_key} ";
					}
				}
				$ui_ele['attr'] = $attribute;
			}

			/*-------------------------*/

	
			//if(!empty($ui_ele['appearence_controls']) and !empty($ui_ele['id_key']) and $process_form) {
			if (!empty($ui_element_definition['appearence_controls']) and !empty($ui_ele['id_key']) and $process_form) {
				
				
				$control_group = '';
				if(!empty($ui_element_definition['appearence_controls'][1]['type'])) {
					$control_group = $ui_element_definition['appearence_controls'][1]['type'];
				} elseif(!empty($ui_ele['type'])){
					$control_group = $ui_ele['type'];
				} else {
					$control_group = 'label';
				}

				// ACTIVE_TODO as aplicabel we need to do impruvment or revision of the default_uis function for the below. but only if that is aplicabel or nashshori for the ui builder impruvment. other wish simply mark it as todo max by the fast or secnd revishon -- to h -- to b 
				$controls = $ui_generator->default_uis($control_group/*'label'*/,$ui_element_definition['appearence_controls'][1]);

				if(!empty($ui_element_definition['appearence_controls'][2]['control_key'])){
					$option_key = $ui_element_definition['appearence_controls'][2]['control_key'];
				}
				
				$customizer_value = get_theme_mod($ui_ele['id_key']);
				
				if(in_array('text',$controls)) {
					
					if(empty($ui_ele['label'])){
						$ui_ele['label'] = '';
					}

					/*------------------
					-- a code sp_theme_ui/application/view/ui/Base_Builder.php no process_build() no che*/

					$is_get_text_applicable = false;

					if( isset($ui_element_definition['appearence_controls']) ) { 

						if(  !empty($ui_element_definition['appearence_controls'][2]['original_text']) ) {

							if( $ui_element_definition['appearence_controls'][2]['original_text'] != $ui_ele['label'] ) {

								$is_get_text_applicable = true;
							}
						}
					}

					$ui_ele['label'] = ($is_get_text_applicable ? $ui_ele['label'] : wbc()->options->get_option($option_key,$ui_ele['id_key'].'_text',$ui_ele['label'],true,true));
					if(isset($ui_ele['postHTML'])) {

						$is_get_text_applicable = false;

						if( isset($ui_element_definition['appearence_controls']) ) { 

							if(  !empty($ui_element_definition['appearence_controls'][2]['original_text']) ) {

								if( $ui_element_definition['appearence_controls'][2]['original_text'] != $ui_ele['postHTML'] ) {

									$is_get_text_applicable = true;
								}
							}
						}

						$ui_ele['postHTML'] = ($is_get_text_applicable ? $ui_ele['postHTML'] : wbc()->options->get_option($option_key,$ui_ele['id_key'].'_text',$ui_ele['postHTML'],true,true));

					} elseif (!empty($ui_ele['preHTML'])){

						$is_get_text_applicable = false;

						if( isset($ui_element_definition['appearence_controls']) ) { 

							if(  !empty($ui_element_definition['appearence_controls'][2]['original_text']) ) {

								if( $ui_element_definition['appearence_controls'][2]['original_text'] != $ui_ele['preHTML'] ) {

									$is_get_text_applicable = true;
								}
							}
						}

						$ui_ele['preHTML'] = ($is_get_text_applicable ? $ui_ele['preHTML'] : wbc()->options->get_option($option_key,$ui_ele['id_key'].'_text',$ui_ele['preHTML'],true,true));
					}

					// ACTIVE_TODO_OC_START
					// 	-- when we implement the support for customizer and external page builders like elementor and so on at that time need to upgrade below if and do the needful so that $customizer_value variable that is overriding label, prehtml and so on below does not affected if they are not supposed to be affected. -- to h
					// ACTIVE_TODO_OC_END
					if(!empty($customizer_value)) {

						$ui_ele['label'] = $customizer_value;				
						if(isset($ui_ele['postHTML'])) {

							$ui_ele['postHTML'] = $customizer_value;
						} else {
							
							$ui_ele['preHTML'] = $customizer_value;	
						}
						
					}

					/*---------------------*/				
				}

				if(in_array('image',$controls)) {

					if(empty($ui_ele['src'])){
						$ui_ele['src'] = '';
					}

					/*-------------------
					-- a code sp_theme_ui/application/view/ui/Base_Builder.php no process_build() no che*/

					$ui_ele['src'] = wbc()->options->get_option($option_key,$ui_ele['id_key'].'_image',$ui_ele['src'],true,true);

					$__width__ = wbc()->options->get_option($option_key,$ui_ele['id_key'].'_width',$ui_ele['src'],true,true);
					$__height__ = wbc()->options->get_option($option_key,$ui_ele['id_key'].'_height',$ui_ele['src'],true,true);

					$dimensions_css = "";
					if(!empty($__width__)) {
						$dimensions_css .= "width:".$__width__.";";
					}

					if(!empty($__height__)) {
						$dimensions_css .= "height:".$__height__.";";
					}


					/*if(!empty(trim($dimensions_css))) {
						if(!isset($ui_ele['attr'])) {
							$ui_ele['attr'] = '';	
						}*/

					if(!empty(trim($dimensions_css)) and !empty($ui_ele['attr']) and is_array($ui_ele['attr'])) {

						$ui_ele['attr'] .= " style='".esc_attr(${dimensions_css})."' ";
					}
					
					if(is_numeric($ui_ele['src'])){
						$ui_ele['src'] = wp_get_attachment_url($ui_ele['src']);
					}
										
					//$ui_ele['src'] = $customizer_value;

					if(!empty($customizer_value)) {
						$ui_ele['src'] = $customizer_value;
					}

					/*----------------------*/			
				}

				
				/*--------------
				-- a code sp_theme_ui/application/view/ui/Base_Builder.php no process_build() no che*/

				if(in_array(/*'href'*/'url',$controls)) {
			
					if(empty($ui_ele['href'])){
						$ui_ele['href'] = '';
					}
					
					$ui_ele['href'] = wbc()->options->get_option($option_key,$ui_ele['id_key'].'_url',$ui_ele['href'],true,true);

					if(!empty($customizer_value)) {
						$ui_ele['href'] = $customizer_value;
					}

				}

				/*-----------------*/

				if(in_array('color',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='color:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_color','',true,true).' !important;';
				}

				if(in_array('back_color',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='background-color:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_back_color','',true,true).' !important;';
				}

				if(in_array('font_family',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='font-family:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_font_family','',true,true).' !important;';
				}

				if(in_array('font_size',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='font-size:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_font_size','',true,true).' !important;';
				}					

				if(in_array('height',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='height:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_height','',true,true).' !important;';
				}	

				if(in_array('width',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='width:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_width','',true,true).' !important;';
				}	

				if(in_array('radius',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='radius:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_radius','',true,true).' !important;';
				}

				if(in_array('margin_left',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='margin-left:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_margin_left','',true,true).' !important;';
				}

				if(in_array('margin_right',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='margin-right:'.wbc()->options->get_option($option_key,$ui_ele['id_key'].'_margin_right','',true,true).' !important;';
				}

				if(in_array('visibility',$controls)) {
			
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}


					if (wbc()->options->get_option($option_key,$ui_ele['id_key'].'_visibility',-1,true,true) == 1) {
						//$ui_ele['style'].='display: none !important;';
						return;	//simply return from here and skip addind element 
					}
			
				}					

			}

			// -------------------------
			// -- a code sp_theme_ui/application/view/ui/Base_Builder.php no process_build() no che

			// ACTIVE_TODO_OC_START
			// --submodul ma move kervano che.....  but we need to dished the function overied flow or the hooks but hooks cims anneshryi exjshiv at this plse --to h & to b
			// ACTIVE_TODO_OC_END
			//if(!empty($ui_ele['configuration_controls']) and !empty($ui_ele['configuration_controls'][2])){
			if (!empty($ui_element_definition['configuration_controls']) and !empty($ui_element_definition['configuration_controls'][2]) ) {
				if( !empty($ui_element_definition['configuration_controls'][2]['type']) and $ui_element_definition['configuration_controls'][2]['type']=='wc_attribute_field'){

					if(!empty($ui_element_definition['configuration_controls'][2]['option_key']) and !empty($ui_element_definition['configuration_controls'][2][/*'id'*/'id_key'])){

						// ACTIVE_TODO_OC_START
						// // NOTE: even though so far wc_attribute_field is used on the product page ui widgets but it can simply work within the loop scope of the archive and so on layers. it can work simply because the global $post variable refer to the reference of the post object in loop.
						// 	ACTIVE_TODO however we need to run and test it once before we consider using it within the loop scope. -- to h 
						// ACTIVE_TODO_OC_END

						global $post;
						if(!empty($post) and !is_wp_error($post)){
							$product = wc_get_product($post->ID);	

							if(!empty($product) and !is_wp_error($product)) {
								$item_attributes = $product->get_attributes();

								$_data_key_ = $ui_element_definition['configuration_controls'][2][/*'id'*/'id_key'];
								$_option_key_ = $ui_element_definition['configuration_controls'][2]['option_key'];


								$__data__ = '';

								$sp_eid = wbc()->options->get_option($_option_key_,$_data_key_.'_attribute');

								$attribute_slug = null;

								if( !empty( $sp_eid ) ) {

									$attribute_slug = wbc()->wc->id_to_slug('attr',\eo\wbc\system\core\publics\Eowbc_Base_Model_Publics::split_sp_eid($sp_eid)[2]);
								}

								// if( !empty(wbc()->options->get_option($_option_key_,$_data_key_.'_attribute')) and !empty($item_attributes['pa_'.wbc()->options->get_option($_option_key_,$_data_key_.'_attribute')])) {
								if( !empty($attribute_slug) and !empty($item_attributes[/*'pa_'.*/$attribute_slug])) {

							    	// $data_term = $item_attributes['pa_'.wbc()->options->get_option($_option_key_,$_data_key_.'_attribute')];
							    	$data_term = $item_attributes[/*'pa_'.*/$attribute_slug];

							    	if(!empty($data_term) and !is_wp_error($data_term) and !empty($data_term->get_options())){
							    		$data_term = get_term_by('id',$data_term->get_options()[0],$data_term->get_name());
							    		
							    		if(!empty($data_term) and !is_wp_error($data_term)) {
							    			$__data__ = $data_term->name;
							    		}
							    	}
							    }
							    
							    $___term_empty = false;

							    if (!empty(wbc()->options->get_option($_option_key_,$_data_key_.'_checkbox')) and empty($__data__) ) {
							    	$___term_empty = true;
							    	if(empty($ui_ele['class'])){
							    		$ui_ele['class']=" d-none ";	
							    	} else{
					    				$ui_ele['class'].=" d-none ";
					    			}

					    		} 
					    		// ACTIVE_TODO here it is better if we can refactor the ui builder layers further and can use the standard appearance controls for managing the static label like text property for wc_attribute field which would be applicable when the attribute has no option selected for particular post or wc product or maybe simply applicable in all cases. lets do it by 3rd revision or mark it is as todo. 
					    		elseif (!empty(wbc()->options->get_option($_option_key_,$_data_key_.'_text')) and empty($__data__) ) {
					    			$___term_empty = true;
					    			$__data__ = wbc()->options->get_option($_option_key_,$_data_key_.'_text');
					    		} elseif(empty($__data__)) {
					    			$___term_empty = true;
					    			$__data__ = 'N/A';
					    		}

					    		// ACTIVE_TODO_OC_START
					    		// --	below layers needs refactoring where it needs to manage the ct, mm, % and so on hardcoded part, it should be simply either %s and everything else can not be managed here. and anyway it might not be necessary either as long as the preHTML and postHTML values are not unnecessarily taking care of the ct, mm, % and so on.
					    		// ACTIVE_TODO_OC_END
					    		if(isset($ui_ele['value'])){
					    			if(!empty($__data__)) {
					    				$ui_ele['value'] = sprintf($ui_ele['value'],$__data__);
					    			} else {

					    			}
				    				
				    			} elseif(isset($ui_ele['preHTML'])) {
				    				
				    				if($___term_empty){
				    					$ui_ele['preHTML'] = str_replace('ct','',str_replace('mm','',str_replace('%','',sprintf($ui_ele['preHTML'],$__data__))));
				    				} else {
				    					$ui_ele['preHTML'] = sprintf($ui_ele['preHTML'],$__data__);	
				    				}
				    				
				    			} elseif(isset($ui_ele['postHTML'])) {
				    				


				    				if($___term_empty){
				    					
				    					$ui_ele['postHTML'] = str_replace('ct','',str_replace('mm','',str_replace('%','',sprintf($ui_ele['postHTML'],$__data__))));
				    				} else {
				    					$ui_ele['postHTML'] = sprintf($ui_ele['postHTML'],$__data__);	
				    				}
				    				
				    			} else {
				    				if($___term_empty and !empty($ui_ele['value'])) {
				    					$ui_ele['value'] = str_replace('ct','',str_replace('mm','',str_replace('%','',sprintf($ui_ele['value'],$__data__))));
				    				} else {
				    					$ui_ele['value'] = $__data__;	
				    				}
				    			}



							}
						}

					}

				}
			}

			// --submodul ma move kervano che.....  but we need to dished the function overied flow or the hooks but hooks cims anneshryi exjshiv at this plse --to h & to b done
				// -- also we need to mac syore that we refacter and upgrad the ajax handlare to send mail which is in controllers ajax folder -- to h & -- to b done
			// if(!empty($ui_ele['data_controls']) and !empty($ui_ele['data_controls']['type'])){
			if(!empty($ui_element_definition['data_controls']) and !empty($ui_element_definition['data_controls']['type'])){
				if($ui_element_definition['data_controls']['type'] === 'example_action'){
					
					// NOTE: from here we are not duing the do_action but in future if required than we can also do do_action for manged type for the type suported here on the wbc leyer. so wen if you do that then simply we can move the do_action from the else below, to below the this vole if else and make it aplicabel for all if and else condishon. the men reshon we are avoiding anneshshory hooks is that we need to now keep the hook footprint very light so only the nessory hook well be added. 

				} else {

					do_action('sp_ui_builder_build_data_controls_type', $ui_element_definition['data_controls'], $ui_ele['id_key'], isset($ui_ele['id']) ? $ui_ele['id'] : '', $this /*as long as it is not nashesary it is a recommended that we do not rely on this object passing to keep it simple, but if it is required then we can pass it as well as if required we may also need to pass the caller obj wich is calling this class so not $this but the vary class wich is calling this function layer*/ );
				}
			}

			// -------------------------

			$ui_ele['option_key'] =$option_key;
			$ui_ele['process_form'] =$process_form;
			// passing self contained object so the template can use the child parameter in the $ui_ele to created a nested complax UI.
			$ui_ele['builder'] = $this;

			// ACTIVE_TODO this is very sensitive flow issue here that we need to pass this broad layers variables and data like $ui_definition and so on deep down to all the layers and that is callling back this main build function so we need to refactor it and make sure that recursion happens only from the build function or max to the call process_build function and the depandancy of passing $ui_definition all the way to the element files. so simply this is a really bad flow and we need to refacrtor it as soon as we get chance and lets do it max by the second revision anyhow. -- to h & -- to b 
			$ui_ele['ui_definition'] = $ui_definition;

			// ACTIVE_TODO_OC_START			
			// ACTIVE_TODO even though it is vital to avoid keeping duplicates but till the form builder is not refactored till the form builder or say old version of ui builder also will load the duplicate components from the folder 'core/ui/components/'. but we must refactor the form builder or atleast refactor this part only so that we can avoid this huge duplicate code. lets do max by 1st or 2nd revision. -- to h & -- to b 
			// ACTIVE_TODO_OC_END
			wbc()->load->template('ui/element/'/*'core/ui/components/'*/.$ui_ele['type'],$ui_ele);
		}
	}

	//ACTIVE_TODO_OC_START
	// -a function most probly refactored karvana or simply ahiya thei remove thei jachhe wen we impliment externl page builder suport -- to h & to b
	// ACTIVE_TODO_OC_END
	public function elementor_form($object,$form,$depth=0,$parent_key='') {

		if(!empty($form) and is_array($form)) {
			foreach ($form as $form_key => $form_value) {
				
				$preserve_form_key = $form_key;

				if(!empty($form_value['appearence_controls']) and !empty($form_value['appearence_controls'][2]) and !empty($form_value['appearence_controls'][2][/*'id'*/'id_key'])) {
					$form_key = $form_value['appearence_controls'][2][/*'id'*/'id_key'];
				}
				$form_key.=$parent_key;

				if( !empty($form_value['type'])/* and !empty($form_value['appearence_controls'])*/ ) {
					
					switch ($form_value['type']) {
						case 'p':
						case 'text':
						case 'div':
						case 'span':
						case 'button':
						case 'header':
						case 'a':
							
							$object->add_control(
								$form_key,
								[
									'label' => empty($form_value['appearence_controls'])?'Container(Level: '.$depth.' Sibling: '.$preserve_form_key.')' :$form_value['appearence_controls'][0],
									'type' => \Elementor\Controls_Manager::WYSIWYG,
									'default' => '',
									'placeholder' => '',
								]
							);

							if($form_value['type']=='a') {
								$object->add_control(
									$form_key.'_link',
									[
										'label' => empty($form_value['appearence_controls'])?'Container Link(Level: '.$depth.' Sibling: '.$preserve_form_key.')' :$form_value['appearence_controls'][0].' Link',
										'type' => \Elementor\Controls_Manager::URL,										
										'placeholder' => '',
										'show_external' => true,
										'default' => [
											'url' => '',
											'is_external' => true,
											'nofollow' => true,
										],
									]
								);
							}

							break;
						
						case 'img':
						case 'image':
						case 'video':

							$object->add_control(
								$form_key.'_path',
								[
									'label' => empty($form_value['appearence_controls']) ? 'Asset':$form_value['appearence_controls'][0],
									'type' => \Elementor\Controls_Manager::MEDIA,
									'default' => [
										'url' => \Elementor\Utils::get_placeholder_image_src(),
									],
								]
							);

							/*$object->add_control(
								$form_key.'_dimension',
								[
									'label' => $form_value['appearence_controls'][0],
									'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
									'default' => [],
								]
							);*/
							$object->add_group_control(
								\Elementor\Group_Control_Image_Size::get_type(),
								[
									'name' => $form_key.'_dimension'/*'thumbnail'*/, // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
									'exclude' => [ 'custom' ],
									'include' => [],
									'default' => 'large',
								]
							);							
							break;						
					}

					if(in_array($form_value['type'],['p','text','div','span','button','header','a','img','image','video'])){
						$object->add_control(
							$form_key.'_position',
							[
								'label'=> (empty($form_value['appearence_controls'])?'Container(Level: '.$depth.' Sibling: '.$preserve_form_key.')' :$form_value['appearence_controls'][0]). ' Position',
								'type'=>\Elementor\Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%', 'em' ]
							]
						);
					}

				}
				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type'])){
						$this->elementor_form($object,$form_value['child'],$depth+1,$form_key);
					} else {
						$this->elementor_form($object,array($form_value['child']),$depth+1,$form_key);
					}
				}
			}
		}
	}

	// ACTIVE_TODO_OC_START
	// -a function most probly refactored karvana or simply ahiya thei remove thei jachhe wen we impliment externl page builder suport -- to h & to b
	// ACTIVE_TODO_OC_END
	public function elementor_render($settings,$form,$depth='') {
		if(!empty($form) and is_array($form)) {
			foreach ($form as $form_key => $form_value) {
				
				$safe_form_key = $form_key;
				if(!empty($form_value['appearence_controls']) and !empty($form_value['appearence_controls'][2]) and !empty($form_value['appearence_controls'][2][/*'id'*/'id_key'])) {
					$form_key = $form_value['appearence_controls'][2][/*'id'*/'id_key'];
				}
				$form_key.=$depth;

				if( !empty($form_value['type'])/* and !empty($form_value['appearence_controls'])*/ ) {

					switch ($form_value['type']) {
						case 'p':
						case 'text':
						case 'div':
						case 'span':
						case 'button':
						case 'header':
						case 'a':
								
							if($form_value['type']=='p' || $form_value['type']=='div' || $form_value['type']=='span') {
								//die();
							}	
							/*echo "<pre>";
							var_dump($form_key);
							print_r($settings[$form_key]);
							///print_r($settings);
							echo "</pre>";*/

							$element_text = ( $settings[$form_key] );
							//echo $element_text.'<br/>';
							//echo $safe_form_key;
														
							//echo $element_text;
							if(!empty($element_text)){

								if(isset($form_value['preHTML'])){
									$form[$safe_form_key]['preHTML'] = $element_text;
								} elseif(isset($form_value['postHTML'])) {
									$form[$safe_form_key]['postHTML'] = $element_text;
								} else {									
									$form[$safe_form_key]['postHTML'] = $element_text;
								}								
							}

							/*if($parent_id==='0' or $parent_id===0) {*/

								$css = array();
								
								if(!empty($settings['_background_background'])) {
									if($settings['_background_background'] === 'classic') {
										if(!empty($settings['_background_color'])){
											$css[] = "background-color:".$settings['_background_color'];
										}
										/*$css*/
									} else{
										//gradient
									}

								}
								if(!empty($css)){
									$css = implode(';',$css).';';
									if(empty($form[$safe_form_key]['attr'])){
										$form[$safe_form_key]['attr'] = array('style'=>esc_attr($css));
									} else {
										if(empty($form[$safe_form_key]['attr']['style'])) {
											$form[$safe_form_key]['attr']['style'] = esc_attr($css);
										} else {
											$form[$safe_form_key]['attr']['style'].=esc_attr($css);	
										}									
									}
								}
							/**/

							if($form_value['type']=='a') {

								$target = $settings[$form_key.'_link']['is_external'] ? ' target="_blank"' : '';
								$nofollow = $settings[$form_key.'_link']['nofollow'] ? ' rel="nofollow"' : '';
								$url = $settings[$form_key.'_link']['url'];
								$custom_attribute = $settings[$form_key.'_link']['custom_attributes'];
								
								$attr = str_replace('|',' ',$custom_attribute);
								$attr.=$target.$nofollow;

								if(isset($form_value['href'])){
									$form[$safe_form_key]['href'] = $url;
									if(empty($form[$safe_form_key]['attr'])) {
										$form[$safe_form_key]['attr'] = array($attr);
									} elseif(is_array($form[$safe_form_key]['attr'])) {
										$form[$safe_form_key]['attr'][] = $attr;
									} else {
										$form[$safe_form_key]['attr'].=' '.$attr;
									}									
								}

								/*if($form_value['type']=='p' || $form_value['type']=='div' || $form_value['type']=='span') {
									echo "<pre>";
									print_r($settings[$form_key]);
									echo "</pre>";
									die();
								}*/


								//echo '<a href="' . $settings['website_link']['url'] . '"' . $target . $nofollow . '> ... </a>';

								/*$object->add_control(
									$form_key.'_link',									[
										'label' => $form_value['appearence_controls'][0].' Link',
										'type' => \Elementor\Controls_Manager::URL,										
										'placeholder' => '',
										'show_external' => true,
										'default' => [
											'url' => '',
											'is_external' => true,
											'nofollow' => true,
										],
									]
								);*/
							}

							break;
						
						case 'img':
						case 'image':
						case 'video':							
							if(isset($form_value['src'])){

								$image_url = ( $settings[$form_key.'_path']['id'] );
								if(!empty($image_url)) {

									$form[$safe_form_key]['src'] = 	\Elementor\Group_Control_Image_Size::get_attachment_image_src($settings[$form_key.'_path']['id'],$form_key.'_dimension',$settings);	
								}								
							}
							break;
					}	

					if(in_array($form_value['type'],['p','text','div','span','button','header','a','img','image','video'])){
						
						$css = array();
						
						if(
							(!empty($settings[$form_key.'_position']['top']) or $settings[$form_key.'_position']['top']==0) 

							or

							(!empty($settings[$form_key.'_position']['right']) or $settings[$form_key.'_position']['right']==0)

							or

							(!empty($settings[$form_key.'_position']['bottom']) or $settings[$form_key.'_position']['bottom']==0)

							or

							(!empty($settings[$form_key.'_position']['left']) or $settings[$form_key.'_position']['left']==0)
						) {
							
							
							if(!empty($settings[$form_key.'_position']['top']) or $settings[$form_key.'_position']['top']==0) {
								
								$css[] = 'top:'.$settings[$form_key.'_position']['top'].$settings[$form_key.'_position']['unit'];
							}

							if(!empty($settings[$form_key.'_position']['right']) or $settings[$form_key.'_position']['right']==0) {
								$css[] = 'right:'.$settings[$form_key.'_position']['right'].$settings[$form_key.'_position']['unit'];
							}

							if(!empty($settings[$form_key.'_position']['bottom']) or $settings[$form_key.'_position']['bottom']==0) {
								$css[] = 'bottom:'.$settings[$form_key.'_position']['bottom'].$settings[$form_key.'_position']['unit'];
							}

							if(!empty($settings[$form_key.'_position']['left']) or $settings[$form_key.'_position']['left']==0) {
								$css[] = 'left:'.$settings[$form_key.'_position']['left'].$settings[$form_key.'_position']['unit'];
							}

							if(!empty($css)){

								$css[] = 'position:relative';

								$css = implode(';',$css).';';
								if(empty($form[$safe_form_key]['attr'])){								
									$form[$safe_form_key]['attr'] = array('style'=>esc_attr($css));
								} else {
									if(empty($form[$safe_form_key]['attr']['style'])) {
										$form[$safe_form_key]['attr']['style'] = esc_attr($css);
									} else {
										$form[$safe_form_key]['attr']['style'].=esc_attr($css);	
									}									
								}							
							}
						}						

						/*$form[$safe_form_key]['src'] = 	\Elementor\Group_Control_Image_Size::get_attachment_image_src($settings[$form_key.'_path']['id'],$form_key.'_dimension',$settings);	

						$object->add_control(
							$form_key.'_position',
							[
								'label'=> (empty($form_value['appearence_controls'])?'Container(Level: '.$depth.' Sibling: '.$preserve_form_key.')' :$form_value['appearence_controls'][0]). ' Position',
								'type'=>\Elementor\Controls_Manager::DIMENSIONS
							]
						);*/
					}			

				}
				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type'])){
						$form[$safe_form_key]['child'] = $this->elementor_render($settings,$form_value['child'],$form_key);
					} else {
						$form[$safe_form_key]['child'] = $this->elementor_render($settings,array($form_value['child']),$form_key)[0];
					}
				}
			}
		}		
		return $form;
	}

	// added on 01-01-2022
	// -system core mathi a function delete karva na chhe done
	// ACTIVE_TODO_OC_START
	// -- and jay thie a function juna ui builder ma call thaya hoy teni jagye aa class ma call karva na chhe, aa most probly theme adpshon check function, woo choice plugins root file ma thei and extension ni root file ma thei call thyela hachhe -- to h & to b
	// ACTIVE_TODO_OC_END
	public function theme_adaption_check() {
		if( !empty(wbc()->sanitize->get('thadc')) && wbc()->sanitize->get('thadc') == 1 ) {
			wbc()->load->model('utilities/eowbc_theme_adaption_check');
			Eowbc_Theme_Adaption_Check::instance()->run();
		}
	}

	// - system core mathi a function delete karva na chhe done
	// ACTIVE_TODO_OC_START
	// -- and jay thie a function juna ui builder ma call thaya hoy teni jagye aa class ma call karva na chhe -- to h & to b
	// ACTIVE_TODO_OC_END
	public static function js_template_wrap(string $id, string $html, string $js_templating_lib) {

		// wrap with tag as appliable as per the js_templating_lib 
		if( $js_templating_lib == 'wp' ) {
			if(false){
				return '<script type="text/html" id="tmpl-'.$id.'">' . $html . '</script>'; 
			}
			
			wbc()->load->get_inline_script_tag($html,array('id'=>'tmpl-'.$id));
		}

	}

	public function build_and_return($ui,$option_key='',$process_form = true,$ui_generator = null, $ui_definition = null){

		$html = parent::build_and_return($ui, $option_key, $process_form,$ui_generator, $ui_definition);

        ob_start();

        $this->build($ui, $option_key, $process_form, $ui_generator, $ui_definition);

        $html = ob_get_clean();

		return $html;
	}
}