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

							var_dump(wbc()->options->get_option($option_key,$ui_ele['id'].'_image'));

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

	public function elementor_form($object,$form) {

		if(!empty($form) and is_array($form)) {
			foreach ($form as $form_key => $form_value) {
				if(!empty($form_value['appearence_controls']) and !empty($form_value['appearence_controls'][2]) and !empty($form_value['appearence_controls'][2]['id'])) {
					$form_key = $form_value['appearence_controls'][2]['id'];
				}

				if( !empty($form_value['type']) and !empty($form_value['appearence_controls']) ) {
					

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
									'label' => $form_value['appearence_controls'][0],
									'type' => \Elementor\Controls_Manager::WYSIWYG,
									'default' => '',
									'placeholder' => '',
								]
							);

							if($form_value['type']=='a') {
								$object->add_control(
									$form_key.'_link',
									[
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
								);
							}

							break;
						
						case 'img':
						case 'image':
						case 'video':

							$object->add_control(
								$form_key.'_path',
								[
									'label' => $form_value['appearence_controls'][0],
									'type' => \Elementor\Controls_Manager::MEDIA,
									'default' => [
										'url' => \Elementor\Utils::get_placeholder_image_src(),
									],
								]
							);

/*							$object->add_control(
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

				}
				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type'])){
						$this->elementor_form($object,$form_value['child']);
					} else {
						$this->elementor_form($object,array($form_value['child']));
					}
				}
			}
		}
	}

	public function elementor_render($settings,$form) {
		if(!empty($form) and is_array($form)) {
			foreach ($form as $form_key => $form_value) {
				
				$safe_form_key = $form_key;
				if(!empty($form_value['appearence_controls']) and !empty($form_value['appearence_controls'][2]) and !empty($form_value['appearence_controls'][2]['id'])) {
					$form_key = $form_value['appearence_controls'][2]['id'];
				}

				if( !empty($form_value['type']) and !empty($form_value['appearence_controls']) ) {

					switch ($form_value['type']) {
						case 'p':
						case 'text':
						case 'div':
						case 'span':
						case 'button':
						case 'header':
						case 'a':
							
							$element_text = ( $settings[$form_key] );
							//echo $element_text;
							if(!empty($element_text)){
								if(isset($form_value['preHTML'])){
									$form[$safe_form_key]['preHTML'] = $element_text;
								} elseif(isset($form_value['postHTML'])) {
									$form[$safe_form_key]['postHTML'] = $element_text;
								}
							}	

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

				}
				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type'])){
						$form[$safe_form_key]['child'] = $this->elementor_render($settings,$form_value['child']);
					} else {
						$form[$safe_form_key]['child'] = $this->elementor_render($settings,array($form_value['child']))[0];
					}
				}
			}
		}
		return $form;
	}
}
