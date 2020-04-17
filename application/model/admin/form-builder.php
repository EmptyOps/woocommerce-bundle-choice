<?php


/*
*	A form builder class to generate form based on the array of params recived.
*/

namespace eo\wbc\model\admin;
use eo\wbc\model\interfaces\Builder;

defined( 'ABSPATH' ) || exit;

class Form_Builder implements Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function build(array $form){

		if(!empty($form) and is_array($form) and !empty($form['id']) /*and !empty($form['title'])*/){
			
			$form_html = '';
			$sub_elements = array('visible_info', 'info_icon');

			if(!empty($form['data']) and is_array($form['data'])) {
				
				if(!empty($form['tabs'])){
					$tab_menu = '<div class="ui pointing secondary menu">';
					$tab_segment = '';
					$active = false;
					foreach ($form['data'] as $tab_slug => $tab_data) {

						$tab_menu.='<a class="item '.(!$active?'active':'').'" data-tab="'.$tab_slug.'">'.$tab_data['label'].'</a>';
						$tab_segment.='<div class="ui tab '.(!$active?'active':'').'" data-tab="'.$tab_slug.'">';
						if(!$active){ $active = true; }
						if(!empty($tab_data['form']) and is_array($tab_data['form'])){
							foreach ($tab_data['form'] as $id => $form_element) {

								if(!empty($form_element['type'])) {
									$form_element = $this->process_property_group($form_element, $id);

									foreach ($sub_elements as $skey => $svalue) {
										if( isset($form_element[$svalue]) )
										{
											$form_element[$svalue] = $this->process_property_group($form_element[$svalue], $svalue);
										}
									}

									ob_start();
									
									wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);
									if($form_element['type']=='devider'){
										$tab_segment.=ob_get_clean();
									} else {
										$tab_segment.='<div class="fields">'.ob_get_clean().'</div>';
									}
								}
							}
						}
						$tab_segment.='</div>';
					}
					$tab_menu.= '</div>';

					$form_html.=$tab_menu.$tab_segment;

				} else {
					foreach ($form['data'] as $id => $form_element) {
						if(!empty($form_element['type'])) {
							$form_element = $this->process_property_group($form_element, $id);

							foreach ($sub_elements as $skey => $svalue) {
								if( isset($form_element[$svalue]) )
								{
									$form_element[$svalue] = $this->process_property_group($form_element[$svalue], $svalue);
								}
							}

							ob_start();
									
							wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);
							if($form_element['type']=='devider'){
								$tab_segment.=ob_get_clean();
							} else {
								$tab_segment.='<div class="fields">'.ob_get_clean().'</div>';
							}
						}
					}
				}
				/*foreach ($form['data'] as $id => $form_element) {

					if(!empty($form_element['type'])) {

						if( $form_element['type'] == "table" ){
							wbc()->load->model('admin\table-builder');
							ob_start();
							Table_Builder::instance()->build($form_element);
							$form_html.=ob_get_clean();
							continue;
						}

						$form_element = $this->process_property_group($form_element, $id);

						foreach ($sub_elements as $skey => $svalue) {
							if( isset($form_element[$svalue]) )
							{
								$form_element[$svalue] = $this->process_property_group($form_element[$svalue], $svalue);
							}
						}

						ob_start();
						
						if( !isset($form_element['prev_inline']) || !$form_element['prev_inline'] ){
							?><div class="<?php echo $form_element["inline"] ? "inline" : ""; ?> fields"><?php
						}
						
						wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);

						if( !isset($form_element['next_inline']) || !$form_element['next_inline'] ){
							?></div><?php
						}

						$form_html.=ob_get_clean();
					}
				}*/
			}

			wbc()->load->template('component/form/form',
				array(
					'form_html'=>$form_html,
					'id'=>str_replace(' ','_',$form['id']),
					'title'=>isset($form['title'])?$form['title']:'',
					'method'=>isset($form['method'])?$form['method']:'GET',
					'class'=>isset($form['class'])?$this->process_property($form['class']):'',
					'attr'=>isset($form['attr'])?$this->process_property($form['attr']):''
				)
			);
		}
	}

	public function process_property_group(array $form_element, string $id) {
		
		if(isset($form_element['class'])){
			$form_element['class'] = $this->process_property($form_element['class']);
		} else {
			$form_element['class'] ='';
		}

		if(isset($form_element['attr'])){
			$form_element['attr'] = $this->process_property($form_element['attr']);
		} else {
			$form_element['attr'] ='';
		}

		if(isset($form_element['size_class'])){
			$form_element['size_class'] = $this->process_property($form_element['size_class']);
		} else {
			$form_element['size_class'] ='';
		}

		$form_element['id'] = str_replace(' ','_', $id);

		return $form_element;
	}

	public function process_property(array $property) {
		
		if(!empty($property) and is_array($property)) {
			
			return sanitize_text_field(implode(' ', $property));

		} else {

			return '';
		}
	}
}
