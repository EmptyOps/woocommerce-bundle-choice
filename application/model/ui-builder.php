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

	public function build(array $ui,$option_key=''){

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

					if(!empty($ui_ele['appearence_controls']) and !empty($ui_ele['id'])){
						
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
					// passing self contained object so the template can use the child parameter in the $ui_ele to created a nested complax UI.
					$ui_ele['builder'] = $this;					
					wbc()->load->template('core/ui/components/'.$ui_ele['type'],$ui_ele);
				}
			}

		}
	}
}
