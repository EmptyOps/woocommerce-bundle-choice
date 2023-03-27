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

	public function build(array $ui,$option_key='',$process_form = true,$ui_generator = null, $ui_definition = null){

		\sp\wbc\system\core\SP_Ui_Builder::instance()->build($ui, $option_key, $process_form,$ui_generator);

		$ui_generator = \eo\wbc\controllers\admin\Controller::instance();
		if(!empty($ui) and is_array($ui)){
			
			foreach ($ui as $ui_key => $ui_ele) {
				
				-- a if /sp_theme_ui/application/view/ui/Base_Builder.php build function  ni chhe
				if(!empty($ui_definition['controls'][$ui_key]['configuration_controls']) and !empty($ui_definition['controls'][$ui_key]['configuration_controls'][2])){

					if(!empty($ui_definition['controls'][$ui_key]['configuration_controls'][2]['action']) and $ui_definition['controls'][$ui_key]['configuration_controls'][2]['action']==='toggle_section') {

						$_data_key_ = $ui_definition['controls'][$ui_key]['configuration_controls'][2]['id'];
						$_option_key_ = $ui_definition['controls'][$ui_key]['configuration_controls'][2]['control_key'];

						$type = '';
						if(!empty($ui_ele['type'])){
							$type = $ui_ele['type'];
						} 

						if(!empty($ui_definition['controls'][$ui_key]['configuration_controls'][2]['type'])) {
							$type = $ui_definition['controls'][$ui_key]['configuration_controls'][2]['type'];
						}

						if(!empty($type)) {
							$_data_key_.='_'.$type;
						}
						
						if(wbc()->options->get_option($_option_key_,$_data_key_)){
							continue;
						} else {
							$this->process_build($ui_key,$ui_ele,$ui,$option_key,$process_form,$ui_generator,isset($ui_definition['controls'][$ui_key])?$ui_definition['controls'][$ui_key]:null);		
						}
					} else {
						$this->process_build($ui_key,$ui_ele,$ui,$option_key,$process_form,$ui_generator,isset($ui_definition['controls'][$ui_key])?$ui_definition['controls'][$ui_key]:null);
					}

				} else {
					$this->process_build($ui_key,$ui_ele,$ui,$option_key,$process_form,$ui_generator,isset($ui_definition['controls'][$ui_key])?$ui_definition['controls'][$ui_key]:null);
				}
			}

		}
	}

	private function process_build($ui_key,$ui_ele,$ui,$option_key='',$process_form = true,$ui_generator = null, $ui_element_definition = null) {

		\sp\wbc\system\core\SP_Ui_Builder::instance()->process_build($ui_key,$ui_ele,$ui,$option_key,$process_form,$ui_generator);

		if(!empty($ui_ele['type'])) {

			if(empty($ui_ele['id']) and is_string($ui_key)) {
				$ui_ele['id'] = $ui_key;
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
						    $attribute.=" ${attr_key}=\"".implode(',',$attr_value)."\" ";
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

	
			//if(!empty($ui_ele['appearence_controls']) and !empty($ui_ele['id']) and $process_form) {
			if (!empty($ui_element_definition['appearence_controls']) and !empty($ui_ele['id']) and $process_form) {
				
				
				$control_group = '';
				if(!empty($ui_element_definition['appearence_controls'][1]['type'])) {
					$control_group = $ui_element_definition['appearence_controls'][1]['type'];
				} elseif(!empty($ui_ele['type'])){
					$control_group = $ui_ele['type'];
				} else {
					$control_group = 'label';
				}

				ACTIVE_TODO as aplicabel we need to do imprument or revision of the default_uis function for the below. but only if that is aplicabel or nashshori for the ui builder imprument. other wish simply markisid todo max by the fast or secnd revishon -- to h -- to b 
				$controls = $ui_generator->default_uis($control_group/*'label'*/,$ui_element_definition['appearence_controls'][1]);

				if(!empty($ui_element_definition['appearence_controls'][2]['control_key'])){
					$option_key = $ui_element_definition['appearence_controls'][2]['control_key'];
				}
				
				$customizer_value = get_theme_mod($ui_ele['id']);
				
				if(in_array('text',$controls)) {
					
					if(empty($ui_ele['label'])){
						$ui_ele['label'] = '';
					}

					/*------------------
					-- a code sp_theme_ui/application/view/ui/Base_Builder.php no process_build() no che*/

					$ui_ele['label'] = wbc()->options->get_option($option_key,$ui_ele['id'].'_text',$ui_ele['label'],true,true);
					if(isset($ui_ele['postHTML'])) {

						$ui_ele['postHTML'] = wbc()->options->get_option($option_key,$ui_ele['id'].'_text',$ui_ele['postHTML'],true,true);
					} elseif (!empty($ui_ele['preHTML'])){

						$ui_ele['preHTML'] = wbc()->options->get_option($option_key,$ui_ele['id'].'_text',$ui_ele['preHTML'],true,true);
					}

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
					die();
					if(empty($ui_ele['src'])){
						$ui_ele['src'] = '';
					}

					/*-------------------
					-- a code sp_theme_ui/application/view/ui/Base_Builder.php no process_build() no che*/

					$ui_ele['src'] = wbc()->options->get_option($option_key,$ui_ele['id'].'_image',$ui_ele['src'],true,true);

					$__width__ = wbc()->options->get_option($option_key,$ui_ele['id'].'_width',$ui_ele['src'],true,true);
					$__height__ = wbc()->options->get_option($option_key,$ui_ele['id'].'_height',$ui_ele['src'],true,true);

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

						$ui_ele['attr'] .= " style='${dimensions_css}' ";
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

				if(in_array('href',$controls)) {
			
					if(empty($ui_ele['href'])){
						$ui_ele['href'] = '';
					}
					
					$ui_ele['href'] = wbc()->options->get_option($option_key,$ui_ele['id'].'_url',$ui_ele['href'],true,true);

					if(!empty($customizer_value)) {
						$ui_ele['href'] = $customizer_value;
					}

				}

				/*-----------------*/

				if(in_array('color',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='color:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_color','',true,true).' !important;';
				}

				if(in_array('back_color',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='background-color:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_back_color','',true,true).' !important;';
				}

				if(in_array('font_family',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='font-family:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_font_family','',true,true).' !important;';
				}

				if(in_array('font_size',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='font-size:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_font_size','',true,true).' !important;';
				}					

				if(in_array('height',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='height:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_height','',true,true).' !important;';
				}	

				if(in_array('width',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='width:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_width','',true,true).' !important;';
				}	

				if(in_array('radius',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='radius:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_radius','',true,true).' !important;';
				}

				if(in_array('margin_left',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='margin-left:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_margin_left','',true,true).' !important;';
				}

				if(in_array('margin_right',$controls)) {
					
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}

					$ui_ele['style'].='margin-right:'.wbc()->options->get_option($option_key,$ui_ele['id'].'_margin_right','',true,true).' !important;';
				}

				if(in_array('visibility',$controls)) {
			
					if(empty($ui_ele['style'])){
						$ui_ele['style'] = '';
					}


					if (wbc()->options->get_option($option_key,$ui_ele['id'].'_visibility',-1,true,true) == 1) {
						//$ui_ele['style'].='display: none !important;';
						return;	//simply return from here and skip addind element 
					}
			
				}					

			}
			-------------------------
			-- a code sp_theme_ui/application/view/ui/Base_Builder.php no process_build() no che

			--submodul ma move kervano che.....  but we need to dished the function overied flow or the hooks but hooks cims anneshryi exjshiv at this plse --to h & to b
			//if(!empty($ui_ele['configuration_controls']) and !empty($ui_ele['configuration_controls'][2])){
			if (!empty($ui_element_definition['configuration_controls']) and !empty($ui_element_definition['configuration_controls'][2]) ) {
				if( !empty($ui_element_definition['configuration_controls'][2]['type']) and $ui_element_definition['configuration_controls'][2]['type']=='wc_attribute_field'){

					if(!empty($ui_element_definition['configuration_controls'][2]['option_key']) and !empty($ui_element_definition['configuration_controls'][2]['id'])){

						global $post;
						if(!empty($post) and !is_wp_error($post)){
							$product = wc_get_product($post->ID);	

							if(!empty($product) and !is_wp_error($product)) {
								$item_attributes = $product->get_attributes();

								$_data_key_ = $ui_element_definition['configuration_controls'][2]['id'];
								$_option_key_ = $ui_element_definition['configuration_controls'][2]['option_key'];


								$__data__ = '';

								if( !empty(wbc()->options->get_option($_option_key_,$_data_key_.'_attribute')) and !empty($item_attributes['pa_'.wbc()->options->get_option($_option_key_,$_data_key_.'_attribute')])) {

							    	$data_term = $item_attributes['pa_'.wbc()->options->get_option($_option_key_,$_data_key_.'_attribute')];

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

					    		} elseif (!empty(wbc()->options->get_option($_option_key_,$_data_key_.'_text')) and empty($__data__) ) {
					    			$___term_empty = true;
					    			$__data__ = wbc()->options->get_option($_option_key_,$_data_key_.'_text');
					    		} elseif(empty($__data__)) {
					    			$___term_empty = true;
					    			$__data__ = 'N/A';
					    		}

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

			--submodul ma move kervano che.....  but we need to dished the function overied flow or the hooks but hooks cims anneshryi exjshiv at this plse --to h & to b
				// -- also we need to mac syore that we refacter and upgrad the ajax handlare to send mail which is in controllers ajax folder -- to h & -- to b done
			// if(!empty($ui_ele['data_controls']) and !empty($ui_ele['data_controls']['type'])){
			if(!empty($ui_element_definition['data_controls']) and !empty($ui_element_definition['data_controls']['type'])){
				if($ui_element_definition['data_controls']['type'] === 'example_exshon'){
					
					// NOTE: from here we are not duing the do_action but in future if required than we can also do do_action for manged type for the type suported here on the wbc leyer. so wen if you do that the simply we can move the do_action from the else below to below the this vole if else an makit aplicabel for all if and else condishon. the men reshon regading anneshshory hooks we need to now cep the hook feld wery lick so allthe nessory hook well be added. 

				} else {

					do_action('sp_ui_builder_build_data_controls_type', $ui_element_definition['data_controls']);
				}
			}

			
			--jo submodul ma koy template rakvanu hoy to or any way submodul module ma template host karvanu suport ni jarur padchhe -- to h & to b
			sp_tui()->load->template('ui/element/'.$ui_ele['type'],$ui_ele);

			-------------------------
			$ui_ele['option_key'] =$option_key;
			$ui_ele['process_form'] =$process_form;
			// passing self contained object so the template can use the child parameter in the $ui_ele to created a nested complax UI.
			$ui_ele['builder'] = $this;

			ACTIVE_TODO_OC_START			
			ACTIVE_TODO even though it is vital to avoid keeping duplicates but till the form builder is not refactored till the form builder or say old version of ui builder also will load the duplicate components from the folder 'core/ui/components/'. but we must refactor the form builder or atleast refactor this part only so that we can avoid this huge duplicate code. lets do max by 1st or 2nd revision. -- to h & -- to b 
			ACTIVE_TODO_OC_END
			wbc()->load->template('ui/element/'/*'core/ui/components/'*/.$ui_ele['type'],$ui_ele);
		}
	}

	ACTIVE_TODO_OC_START
	-a function most probly refactored karvana and simply remove thei jachhe wen we impliment extenl page builder suport -- to h & to b
	ACTIVE_TODO_OC_END
	public function elementor_form($object,$form,$depth=0,$parent_key='') {

		if(!empty($form) and is_array($form)) {
			foreach ($form as $form_key => $form_value) {
				
				$preserve_form_key = $form_key;

				if(!empty($form_value['appearence_controls']) and !empty($form_value['appearence_controls'][2]) and !empty($form_value['appearence_controls'][2]['id'])) {
					$form_key = $form_value['appearence_controls'][2]['id'];
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

	ACTIVE_TODO_OC_START
	-a function most probly refactored karvana and simply remove thei jachhe wen we impliment extenl page builder suport -- to h & to b
	ACTIVE_TODO_OC_END
	public function elementor_render($settings,$form,$depth='') {
		if(!empty($form) and is_array($form)) {
			foreach ($form as $form_key => $form_value) {
				
				$safe_form_key = $form_key;
				if(!empty($form_value['appearence_controls']) and !empty($form_value['appearence_controls'][2]) and !empty($form_value['appearence_controls'][2]['id'])) {
					$form_key = $form_value['appearence_controls'][2]['id'];
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
										$form[$safe_form_key]['attr'] = array('style'=>$css);
									} else {
										if(empty($form[$safe_form_key]['attr']['style'])) {
											$form[$safe_form_key]['attr']['style'] = $css;
										} else {
											$form[$safe_form_key]['attr']['style'].=$css;	
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
									$form[$safe_form_key]['attr'] = array('style'=>$css);
								} else {
									if(empty($form[$safe_form_key]['attr']['style'])) {
										$form[$safe_form_key]['attr']['style'] = $css;
									} else {
										$form[$safe_form_key]['attr']['style'].=$css;	
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
	-system core mathi a function delete karva na chhe and jay thie a function juna ui builder ma call thaya hoy teni jagye a class ma call karva na chhe a most probly theme adpshon check root file ma woo choice plugins extension ni root file ma thei call thyela hachhe -- to h & to b
	public function theme_adaption_check() {
		if( !empty(wbc()->sanitize->get('thadc')) && wbc()->sanitize->get('thadc') == 1 ) {
			wbc()->load->model('utilities/eowbc_theme_adaption_check');
			Eowbc_Theme_Adaption_Check::instance()->run();
		}
	}

	-system core mathi a function delete karva na chhe and jay thie a function juna ui builder ma call thaya hoy teni jagye a class ma call karva na chhe a most probly theme adpshon check root file ma woo choice plugins and extension ma thei call thyela hachhe -- to h & to b
	public static function js_template_wrap(string $id, string $html, string $js_templating_lib) {

		// wrap with tag as appliable as per the js_templating_lib 
		if( $js_templating_lib == 'wp' ) {

			return '<script type="text/html" id="tmpl-'.$id.'">' . $html . '</script>'; 
		}
			
	}
}
