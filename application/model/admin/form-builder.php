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

						if( !empty($form["active_tab_onload"]) ) {
							if( $form["active_tab_onload"] == $tab_slug ) {
								$active = false;	//set false so that it is set active! that is how below code's logic to set the active tab is :-(
							}
							else {
								$active = true;
							}
						}

						$tab_menu.='<a class="item '.(!$active?'active':'').'" data-tab="'.$tab_slug.'" '.(isset($tab_data['attr'])?$this->process_property($tab_data['attr']):'').'>'.$tab_data['label'].'</a>';
						$tab_segment.='<div class="ui tab '.(!$active?'active':'').'" data-tab="'.$tab_slug.'">';
						if(!$active){ $active = true; }
						if(!empty($tab_data['form']) and is_array($tab_data['form'])){
							foreach ($tab_data['form'] as $id => $form_element) {

								if(!empty($form_element['type'])) {

									if( $form_element['type'] == "skip" ){
										continue;
									}

									if( $form_element['type'] == "table" ){
										wbc()->load->model('admin\table-builder');
										ob_start();
										Table_Builder::instance()->build($form_element);
										$tab_segment.=ob_get_clean();
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
									
									if( (!isset($form_element['prev_inline']) || !$form_element['prev_inline']) && $form_element['type']!='devider' && $form_element['type']!='hidden' ){
										?><div class="<?php echo isset($form_element["inline_class"]) ? $this->process_property($form_element["inline_class"]) : ""; ?> <?php echo (isset($form_element["inline"]) && $form_element["inline"]) ? "inline" : ""; ?> fields"><?php
									}

									wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);

									if( (!isset($form_element['next_inline']) || !$form_element['next_inline']) && $form_element['type']!='devider' && $form_element['type']!='hidden' ){
										?></div><?php
									}

									// if($form_element['type']=='devider'){
										$tab_segment.=ob_get_clean();
									// } else {
									// 	$tab_segment.='<div class="fields">'.ob_get_clean().'</div>';
									// }
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

							if( $form_element['type'] == "skip" ){
								continue;
							}

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
									
							if( (!isset($form_element['prev_inline']) || !$form_element['prev_inline']) && $form_element['type']!='devider' && $form_element['type']!='hidden' ){
								?><div class="<?php echo isset($form_element["inline_class"]) ? $this->process_property($form_element["inline_class"]) : ""; ?> <?php echo (isset($form_element["inline"]) && $form_element["inline"]) ? "inline" : ""; ?> fields"><?php
							}

							wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);

							if( (!isset($form_element['next_inline']) || !$form_element['next_inline']) && $form_element['type']!='devider' && $form_element['type']!='hidden' ){
								?></div><?php
							}

							// if($form_element['type']=='devider'){
								$form_html.=ob_get_clean();
							// } else {
							// 	$form_html.='<div class="fields">'.ob_get_clean().'</div>';
							// }
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

			//in case the submit button is specified outside all tabs, appliable when tabs are enabled for form 
			if( isset($form['submit_button']) ) {
				$id = !empty($form['submit_button']['id']) ? $form['submit_button']['id'] : "submit_button";
				$form_element = $form['submit_button'];
				if(!empty($form_element['type'])) {

					$form_element = $this->process_property_group($form_element, $id);

					foreach ($sub_elements as $skey => $svalue) {
						if( isset($form_element[$svalue]) )
						{
							$form_element[$svalue] = $this->process_property_group($form_element[$svalue], $svalue);
						}
					}

					ob_start();
							
					if( (!isset($form_element['prev_inline']) || !$form_element['prev_inline']) && $form_element['type']!='devider' && $form_element['type']!='hidden' ){
						?><div class="<?php echo (isset($form_element["inline"]) && $form_element["inline"]) ? "inline" : ""; ?> fields"><?php
					}

					wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);

					if( (!isset($form_element['next_inline']) || !$form_element['next_inline']) && $form_element['type']!='devider' && $form_element['type']!='hidden' ){
						?></div><?php
					}

					$form_html.=ob_get_clean();
				}
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

	/**
	 * $special_type	active_inactive, icon, image etc.
	 */
	public function ui_controls_collection(string $field_id, string $field_label, array $hide_defaults=array(), array $additional_fields=array(), array $info_text_overrides=array(), string $special_type=null, array $default_values = array() )  {
		
		$collection = array();

		//TODO section title or section container ???


		//defaults 
		if( !in_array("text", $hide_defaults) )
		{
			$collection[$field_id.'_text'] = array(
				'label'=>$field_label.' '.eowbc_lang('Text'),
				'type'=>'text',
				'sanitize'=>'sanitize_text_field',
				'validate'=>array('required'=>''),
				// 'class'=>array('fluid'),
				'size_class'=>array('eight','wide'),
				'inline'=>false,
				'value'=>( array_key_exists("text", $default_values) ? $default_values["text"] : "" ),
				'visible_info'=>array( 'label'=>( array_key_exists("text", $info_text_overrides) ? $info_text_overrides["text"] : eowbc_lang('Sets specified text on '.$field_label) ),
					'type'=>'visible_info',
					'class'=>array('small'),
					// 'size_class'=>array('sixteen','wide'),
				),
			);
		}

		if( !in_array("font", $hide_defaults) )
		{
			$collection[$field_id.'_font'] = array(
				'label'=>$field_label.' '.eowbc_lang('Text Font'),
				'type'=>'text',
				// 'class'=>array('fluid'),
				'sanitize'=>'sanitize_text_field',
				'size_class'=>array('four','wide'),
				'inline'=>false,

				'visible_info'=>array( 'label'=>( array_key_exists("font", $info_text_overrides) ? $info_text_overrides["font"] : eowbc_lang('Specify the font family to be used on '.$field_label) ),
					'type'=>'visible_info',
					'class'=>array('small'),
					// 'size_class'=>array('sixteen','wide'),
				),
			);
		}

		if( !in_array("radius", $hide_defaults) )
		{
			$collection[$field_id.'_radius'] = array(
				'label'=>$field_label.' '.eowbc_lang('Radius (px)'),
				'type'=>'text',
				'sanitize'=>'sanitize_text_field',
				'validate'=>array('required'=>'','postfix'=>['px']),
				// 'class'=>array('fluid'),
				'size_class'=>array('four','wide'),
				'inline'=>false,

				'visible_info'=>array( 'label'=>( array_key_exists("radius", $info_text_overrides) ? $info_text_overrides["radius"] : eowbc_lang('Sets specified radius on '.$field_label) ),
					'type'=>'visible_info',
					'class'=>array('small'),
					// 'size_class'=>array('sixteen','wide'),
				),
			);
		}

		if( !in_array("backcolor", $hide_defaults) )
		{
			$ftot = 1;
			if( $special_type == "active_inactive" )
			{
				$ftot += 1;
			}

			for($fi=0; $fi<$ftot; $fi++)
			{
				$special_lbl = $ftot < 2 ? "" : ( $fi == 0 ? eowbc_lang("Active ") : eowbc_lang("Inactive ") );
				$field_id_suffix = ($fi==0?"_active":"_inactive");

				$collection[$field_id.'_backcolor_lbl'.$field_id_suffix] = array(
					'label'=>$field_label.' '.$special_lbl.eowbc_lang('Background Color'),
					'type'=>'label',
					'validate'=>array('required'=>''),
					// 'class'=>array('fluid'),
					'sanitize'=>'sanitize_hex_color',
					'size_class'=>array('eight','wide'),
					'inline'=>true,

					'info_icon'=>array( 'text'=>( array_key_exists("backcolor", $info_text_overrides) ? $info_text_overrides["backcolor"] : eowbc_lang('Sets specified color as background color on '.$field_label.( $special_lbl == "" ? "" : ' while its '.$special_lbl) ) ),
						'type'=>'info_icon',
					),
				);

				$collection[$field_id.'_backcolor'.$field_id_suffix] = array(
					'type'=>'color',
					'size_class'=>array('eight','wide'),
					'inline'=>false,
				);
			}
		}

		if( !in_array("hovercolor", $hide_defaults) )
		{
			$collection[$field_id.'_hovercolor_lbl'] = array(
				'label'=>$field_label.' '.eowbc_lang('Hover Color'),
				'type'=>'label',
				// 'class'=>array('fluid'),
				'validate'=>array('required'=>''),
				'sanitize'=>'sanitize_hex_color',
				'size_class'=>array('eight','wide'),
				'inline'=>true,

				'info_icon'=>array( 'text'=>( array_key_exists("hovercolor", $info_text_overrides) ? $info_text_overrides["hovercolor"] : eowbc_lang('Sets specified color as hover color on '.$field_label) ),
					'type'=>'info_icon',
				),
			);

			$collection[$field_id.'_hovercolor'] = array(
				'type'=>'color',
				'size_class'=>array('eight','wide'),
				'inline'=>false,
			);
		}

		if( !in_array("textcolor", $hide_defaults) )
		{
			$collection[$field_id.'_textcolor_lbl'] = array(
				'label'=>$field_label.' '.eowbc_lang('Text Color'),
				'type'=>'label',
				// 'class'=>array('fluid'),
				'validate'=>array('required'=>''),
				'sanitize'=>'sanitize_hex_color',
				'size_class'=>array('eight','wide'),
				'inline'=>true,
				'info_icon'=>array( 'text'=>( array_key_exists("textcolor", $info_text_overrides) ? $info_text_overrides["textcolor"] : eowbc_lang('Sets specified color as text color on '.$field_label) ),
					'type'=>'info_icon',
				),
			);

			$collection[$field_id.'_textcolor'] = array(
				'type'=>'color',
				'size_class'=>array('eight','wide'),
				'inline'=>false,
			);
		}

		if( !in_array("bordercolor", $hide_defaults) )
		{
			$collection[$field_id.'_bordercolor_lbl'] = array(
				'label'=>$field_label.' '.eowbc_lang('Border Color'),
				'type'=>'label',
				// 'class'=>array('fluid'),
				'validate'=>array('required'=>''),
				'sanitize'=>'sanitize_hex_color',
				'size_class'=>array('eight','wide'),
				'inline'=>true,

				'info_icon'=>array( 'text'=>( array_key_exists("bordercolor", $info_text_overrides) ? $info_text_overrides["bordercolor"] : eowbc_lang('Sets specified color as border color on '.$field_label) ),
					'type'=>'info_icon',
				),
			);

			$collection[$field_id.'_bordercolor'] = array(
				'type'=>'color',
				'size_class'=>array('eight','wide'),
				'inline'=>false,
			);
		}


		//additional fields
		foreach ($additional_fields as $key => $value) {
			$field_id = $value["field_id"];
			$field_label = $value["field_label"];

			if( $value["type"] == "color" )	{
				$ftot = 1;
				if( $special_type == "active_inactive" ) {
					$ftot += 1;
				}

				for($fi=0; $fi<$ftot; $fi++) {
					$special_lbl = $ftot < 2 ? "" : ( $fi == 0 ? eowbc_lang("Active ") : eowbc_lang("Inactive ") );
					$field_id_suffix = ($fi==0?"_active":"_inactive");

					$collection[$field_id.'_backcolor_lbl'.$field_id_suffix] = array(
						'label'=>$field_label.' '.$special_lbl.eowbc_lang('Color'),
						'type'=>'label',
						'sanitize'=>'sanitize_text_field',
						// 'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>true,

						'info_icon'=>array( 'text'=>( array_key_exists($field_id.$fi, $info_text_overrides) ? $info_text_overrides[$field_id.$fi] : eowbc_lang('Sets specified color as background color on '.$field_label.( $special_lbl == "" ? "" : ' while its '.$special_lbl) ) ),
							'type'=>'info_icon',
						),
					);

					$collection[$field_id.'_backcolor'.$field_id_suffix] = array(
						'type'=>'color',
						'size_class'=>array('eight','wide'),
						'inline'=>false,
					);
				}
			}
			elseif ($value["type"] == "checkbox") {
				$collection[$field_id] = array(
					'label'=>$field_label,
					'type'=>'checkbox',
					'value'=>array('1'),
					'options'=>(isset($value["options"]) ? $value["options"] : array('1'=>' ')),
					'sanitize'=>'sanitize_text_field',
					'class'=>array('fluid'),						
					// 'size_class'=>array('eight','wide'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>( array_key_exists($field_id, $info_text_overrides) ? $info_text_overrides[$field_id] : "" ),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					),
				);

				if( !empty($value["attrs"]) ) {
					$collection[$field_id] = array_merge( $collection[$field_id], $value["attrs"] );
				}
			}
			elseif ($value["type"] == "text") {
				$collection[$field_id] = array(
					'label'=>$field_label,
					'type'=>'text',
					'value'=>(array_key_exists($field_id, $default_values) ? $default_values[$field_id] : ""),
					// 'class'=>array('fluid'),
					'sanitize'=>'sanitize_text_field',
					'size_class'=>array('four','wide'),
					'inline'=>false,

					'visible_info'=>array( 'label'=>( array_key_exists($field_id, $info_text_overrides) ? $info_text_overrides[$field_id] : "" ),
						'type'=>'visible_info',
						'class'=>array('small'),
						// 'size_class'=>array('sixteen','wide'),
					),
				);

				if( !empty($value["attrs"]) ) {
					$collection[$field_id] = array_merge( $collection[$field_id], $value["attrs"] );
				}
			}
		}


		return $collection;
	}

	public static function savable_types() {
		return array("text","checkbox","color","hidden","radio","select","textarea","icon","time",'number','link','date');
	}

}
