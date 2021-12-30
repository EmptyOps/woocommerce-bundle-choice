<?php
namespace eo\wbc\model;
/*
*	A UI builder class to generate UI based on the array of params recived.
*/
use eo\wbc\model\interfaces\Builder;

defined( 'ABSPATH' ) || exit;

class UI_Builder implements Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function build(array $ui,$option_key='',$process_form = true){

		$ui_generator = \eo\wbc\controllers\admin\Controller::instance();
		if(!empty($ui) and is_array($ui)){
			
			foreach ($ui as $ui_key => $ui_ele) {
								
				if(!empty($ui_ele['type'])) {

					if(empty($ui_ele['id']) and is_string($ui_key)) {
						$ui_ele['id'] = $ui_key;
					}

					if(empty($ui_ele['name']) and is_string($ui_key)) {
						$ui_ele['name'] = $ui_key;
					}

					if(!empty($ui_ele['appearence_controls']) and !empty($ui_ele['id']) and $process_form) {
						
						$controls = $ui_generator->default_uis('label',$ui_ele['appearence_controls'][1]);
						
						if(in_array('text',$controls)) {
							
							if(empty($ui_ele['label'])){
								$ui_ele['label'] = '';
							}

							$ui_ele['label'] = wbc()->options->get_option($option_key,$ui_ele['id'].'_text',$ui_ele['label'],true,true);					
						}

						if(in_array('image',$controls)) {
							die();
							if(empty($ui_ele['src'])){
								$ui_ele['src'] = '';
							}

							$ui_ele['src'] = wbc()->options->get_option($option_key,$ui_ele['id'].'_image',$ui_ele['src'],true,true);					
						}

						
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

					}
					
					$ui_ele['option_key'] =$option_key;
					$ui_ele['process_form'] =$process_form;
					// passing self contained object so the template can use the child parameter in the $ui_ele to created a nested complax UI.
					$ui_ele['builder'] = $this;					
					wbc()->load->template('core/ui/components/'.$ui_ele['type'],$ui_ele);
				}
			}

		}
	}

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
}
