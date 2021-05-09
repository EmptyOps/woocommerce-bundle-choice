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
				
				if( !empty($form_value['type']) and !empty($form_value['appearence_controls']) ) {

					switch ($form_value['type']) {
						case 'p':
						case 'text':
						case 'div':
						case 'span':
						case 'button':
							
							$object->add_control(
								$form_key,
								[
									'label' => $form_value['appearence_controls'][0],
									'type' => \Elementor\Controls_Manager::TEXT,
									'default' => '',
									'placeholder' => '',
								]
							);

							break;
						
						case 'img':
						case 'image':

							$object->add_control(
								$form_key,
								[
									'label' => $form_value['appearence_controls'][0],
									'type' => \Elementor\Controls_Manager::MEDIA,
									'default' => [],
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
				
				if( !empty($form_value['type']) and !empty($form_value['appearence_controls']) ) {

					switch ($form_value['type']) {
						case 'p':						
						case 'div':
						case 'span':
						case 'button':
							$element_text = ( $settings[$form_key] );
							if(!empty($element_text)){
								if(isset($form_value['preHTML'])){
									$form[$form_key]['preHTML'] = $element_text;
								} elseif(isset($form_value['postHTML'])) {
									$form[$form_key]['postHTML'] = $element_text;
								}
							}
							
							break;
						
						case 'img':
						case 'image':
							if(isset($form_value['src'])){
								$image_url = ( $settings[$form_key]['url'] );
								if(!empty($image_url)) {
									$form[$form_key]['src'] = 	$image_url;	
								}								
							}
							break;
					}				

				}
				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type'])){
						$form[$form_key]['child'] = $this->elementor_render($settings,$form_value['child']);
					} else {
						$form[$form_key]['child'] = $this->elementor_render($settings,array($form_value['child']))[0];
					}
				}
			}
		}
		return $form;
	}
}
