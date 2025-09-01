<?php


/*
*	A form builder class to generate form based on the array of params recived.
*/

namespace eo\wbc\model\admin;
use eo\wbc\model\interfaces\Builder;

defined( 'ABSPATH' ) || exit;

class Form_Builder implements Builder {

	private static $_instance = null;

	private $is_load_asset_done = null; 

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function build(array $form){

		$this->load_asset();	

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

						$tab_menu.='<a class="item '.(!$active?'active':'').'" data-tab="'.esc_attr($tab_slug).'" '.(isset($tab_data['attr'])?$this->process_property($tab_data['attr']):'').'>'.esc_html($tab_data['label']).'</a>';
						$tab_segment.='<div class="ui tab '.(!$active?'active':'').'" data-tab="'.esc_attr($tab_slug).'">';
						if(!$active){ $active = true; }
						if(!empty($tab_data['form']) and is_array($tab_data['form'])){

							$dynamic_add_support_html = null;
							$das_fields_details_for_export = null;
							foreach ($tab_data['form'] as $id => $form_element) {

								//	NOTE: the das form element version will be kept for das only while the main stream will cleaned first of everything else 
								$das_id = $id;
								$das_form_element = $form_element;
								$this->das_clean_form_element($id, $form_element);	

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


									// $form_element = $this->process_property_group($form_element, $id);

									// foreach ($sub_elements as $skey => $svalue) {
									// 	if( isset($form_element[$svalue]) )
									// 	{
									// 		$form_element[$svalue] = $this->process_property_group($form_element[$svalue], $svalue);
									// 	}
									// }
									$form_element = $this->process_property_group_wrapper($form_element, $id, $sub_elements);

									//	NOTE: the das vars are also processed here with property group flows so that they can also receive support of the property group flows. and similarly if there are any other such supports required then that also should be applied here.  
									if( $this->is_dynamic_add_in_progress($form_element, $dynamic_add_support_html) ) {
										$das_form_element = $this->process_property_group_wrapper($das_form_element, $das_id, $sub_elements);
									}

									$tab_segment.=$this->render_template("in_tab_segment", $form_element);

									$this->process_dynamic_add_support($id, $form_element, $sub_elements, $dynamic_add_support_html, $tab_segment, $das_fields_details_for_export, $das_id, $das_form_element);
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
								?><div class="<?php echo esc_attr (isset($form_element["inline_class"]) ? $this->process_property($form_element["inline_class"]) : ""); ?> <?php echo (isset($form_element["inline"]) && $form_element["inline"]) ? "inline" : ""; ?> fields"><?php
						}

						wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);

						if (
						    (!isset($form_element['next_inline']) || !$form_element['next_inline']) && $form_element['type'] != 'devider' && $form_element['type'] != 'hidden' ) {
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
							?><div class="<?php echo $form_element["inline"]) ? "inline" : ""; ?> fields"><?php
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

			if( empty($form['no_form_tag']) ) {

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
			} else {

				return $form_html;	
			}
		}
	}

	private function render_template(string $type, $form_element, $sub_type = null) {

		if( $type == "in_tab_segment" ) {

			ob_start();
			
			if( (!isset($form_element['prev_inline']) || !$form_element['prev_inline']) && $form_element['type']!='devider' && $form_element['type']!='hidden' ){
				?><div class="<?php echo esc_attr (isset($form_element["inline_class"]) ? $this->process_property($form_element["inline_class"]) : ""); ?> <?php echo (isset($form_element["inline"]) && $form_element["inline"]) ? "inline" : ""; ?> fields"><?php
			}

			wbc()->load->template('component/form/input_'.$form_element['type'],$form_element);

			if( (!isset($form_element['next_inline']) || !$form_element['next_inline']) && $form_element['type']!='devider' && $form_element['type']!='hidden' ){
				?></div><?php
			}

			// if($form_element['type']=='devider'){
				//	$tab_segment.=ob_get_clean();

					if( $sub_type == "for_js_template" or $sub_type == "for_plus_button" ) {

						return ob_get_clean();	
					} else {

						// ACTIVE_TODO/TODO in future this function should recieve the flag that says if the das is in progress then only it should apply replace and avoid otherwise 
						return str_replace("{{data.added_counter}}", "", ob_get_clean());	
					}
			// } else {
			// 	$tab_segment.='<div class="fields">'.ob_get_clean().'</div>';
			// }

		}
	}

	public function process_property_group_wrapper(array $form_element, string $id, $sub_elements) {
		
		$form_element = $this->process_property_group($form_element, $id);

		foreach ($sub_elements as $skey => $svalue) {
			if( isset($form_element[$svalue]) )
			{
				$form_element[$svalue] = $this->process_property_group($form_element[$svalue], $svalue);
			}
		}

		return $form_element;
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


	public static function dynamic_add_support_config() {

		return array( 'js_templating_lib'=>'wp','added_counter_sep'=>wbc()->config->separator()/*."das".wbc()->config->separator()*/ );
	}

	private function das_added_counter_format($added_counter) {

		//	NOTE: this format should be created and applied by this class layer and the js layer of this form module and that is why this function should be kept private only, always. 

		return ( self::dynamic_add_support_config()['added_counter_sep'] . $added_counter . self::dynamic_add_support_config()['added_counter_sep'] );
	}

	private function js_template_wrap(string $id, string $in_progress_html) {

		// wrap with tag as appliable as per the js_templating_lib 
		if( self::dynamic_add_support_config()['js_templating_lib'] == 'wp' ) {
			if(false){
				return '<script type="text/html" id="tmpl-'.$id.'">' . $in_progress_html . '</script>';
			}
			wbc()->load->get_inline_script_tag($in_progress_html,array('id'=>'tmpl-'.$id));
			 
		}
			
	}
		
	public function das_form_definition_support($args) {

		if( wbc()->sanitize->get('is_test') == 1 ) {
			wbc()->common->var_dump( "Form_Builder das_form_definition_support" );
		}

		if( $args["sub_action"] != "save" && empty($args['data']['id']) && empty($args['data_raw']) ) {

			//	just return the default value if it do not required any processing 
			return $args['form_definition'];	
		}

		//	NOTE: due to true condition below the non tab based forms will not be supported. and either there is no plan to support nonn tab based forms for this das support and either way there should be no plan to support the non tab based forms as they are not as per the standards 
		if(true || !empty($form['tabs'])){

			$save_as_data = array();	

			foreach ($args['form_definition'] as $tab_slug => $tab_data) {

				if(!empty($tab_data['form']) and is_array($tab_data['form'])){

					$dynamic_add_support_html = null;
					$dynamic_add_support_elements = null;

					$newform = array();
					foreach ($tab_data['form'] as $id => $form_element) {

						//	NOTE: the das form element version will be kept for das only while the main stream will cleaned first of everything else 
						$das_id = $id;
						$das_form_element = $form_element;
						$this->das_clean_form_element($id, $form_element);	
						// if( wbc()->sanitize->get('is_test') == 1 ) {
						// 	wbc()->common->var_dump( "Form_Builder das_form_definition_support duplicating elements for simulation das_id " . $das_id . " id " . $id );
						// }

						$newform[$id] = $form_element;

						if(!empty($form_element['type'])) {

							if( $form_element['type'] == "skip" ){
								continue;
							}

							if( $form_element['type'] == "table" ){
								continue;
							}

							//	NOTE: the das vars are also processed here with property group flows so that they can also receive support of the property group flows. and similarly if there are any other such supports required then that also should be applied here.  
							if( $this->is_dynamic_add_in_progress($form_element, $dynamic_add_support_html) ) {

								//	nothing to do here so far 
							}

							if( $this->is_dynamic_add_in_progress($form_element, $dynamic_add_support_html) ) {

								if( $dynamic_add_support_html == null ) {	
									$dynamic_add_support_html = "dummy html";
									$dynamic_add_support_elements = array();
								}

								$dynamic_add_support_elements[$das_id] = $das_form_element;	
							}

							if( $this->is_dynamic_add_ended( $form_element ) ) {

								$plus_button_id = $this->das_plus_button_id($id);

								$das_counter_field_id = $this->das_counter_field_id($plus_button_id);	

								$added_counter = 0;

								// during post save 
								// 	maybe everything will be handled by the form builder like detecting the added counter field post data and simulating based on that 
								if( $args["sub_action"] == "save" ) {

									$added_counter = wbc()->sanitize->post($das_counter_field_id);
								} else if( !empty($args['data']['id'])/*as long as entity id is available means it is not mere add mode but edit mode so then just ensure that repopulate support is provided.*/ ) {

									// ACTIVE_TODO/TODO in future we would like to avoid the extra get call to db, by providing what is fetched from here, back to the caller. so they do not fetch it again during actual get. however it will make sense only when reducing one call have significant difference. -- to s  

									if( empty($fv['save_as']) or $fv['save_as'] == "default" ) {

										// ACTIVE_TODO we will need it very soon. so implement it. -- to s. to seamlessly do it here, simply get the option group based on the base_key property that we have added to cover such requirements.  
										// 	ACTIVE_TODO and the plan is to replace all forms of dapii and so on with das support, where the edit mode is not supported due to the dynamic form limitation which is created there. but now with help of das support we can provide dynamic form and also edit support will be built once this if condition is implemented. -- to s 
										// 		ACTIVE_TODO however if for any form or form section of dapii or other, if the user experience is affected due to this change then we need to do the needful but we can never compromise user expereince for the reusability -- to h and -- to s 

									} elseif( $fv['save_as'] == "post_meta" ) {

										if( !isset($save_as_data['post_meta']) ) {

											$save_as_data['post_meta'] = get_post_meta( $args['data']['id'], $tab_slug.'_data', true );	
										}
									}

									$added_counter = isset($save_as_data['post_meta'][$das_counter_field_id]) ? $save_as_data['post_meta'][$das_counter_field_id] : $added_counter;
									
								} else if( !empty($args['data_raw']) ) {

									$dm_based_field = null;

									foreach ($args['dm']['map_fields'] as $dm_key=>$dm_value) {

										if ( isset($args['dm']['sp_eids'][$dm_key]['extra_2']) and strpos($das_counter_field_id, $args['dm']['sp_eids'][$dm_key]['extra_2']) !== false ) {

											if(!isset($args['cn'])) {

												if(isset($args['data_raw'][$dm_key])) {

													$dm_based_field = $dm_key;   
												} else {

													$dm_based_field = null;
												}

											} else {

												if( isset( $args['data_raw'][ $args['cn'][$dm_key] ] ) ) {

													$dm_based_field = $args['cn'][$dm_key];   
												} else {

													$dm_based_field = null;
												}
											}

											break;
										}
									}

									if (!empty($dm_based_field)) {
									
										$added_counter = ( isset($args['data_raw'][$dm_based_field]) ? ( is_array($args['data_raw'][$dm_based_field]) ? sizeof($args['data_raw'][$dm_based_field])-1 : 0 ) : $added_counter );
									}
								}



								//	ACTIVE_TODO during filter save (edit mode)


								if( wbc()->sanitize->get('is_test') == 1 ) {
									wbc()->common->var_dump( "Form_Builder das_form_definition_support sub_action " . $args["sub_action"] );
									wbc()->common->var_dump( "Form_Builder das_form_definition_support das_counter_field_id " . $das_counter_field_id );
									wbc()->common->var_dump( "Form_Builder das_form_definition_support added_counter " . $added_counter );
								}
								// if( $dynamic_add_support_html == null ) {	
								// 	$dynamic_add_support_html = "dummy html";
								// 	$dynamic_add_support_elements = array();
								// }

								//	simulate form array here by duplicating the appliable form elements 
								if( $added_counter >= 1 ) {

									for($i=1; $i<=$added_counter; $i++) {

										foreach ($dynamic_add_support_elements as $element_id => $element) {

											// ACTIVE_TODO note that for repopulate form mode, the repopulation should happen from the js layers as we planned for ensuring similar flow of creating the das form fields, and that will also ensure the cleanliness and especially no additional maintaining of additional layers. 

											//	repace the counter placeholder with actual counter 
											$element_id = str_replace("{{data.added_counter}}", $this->das_added_counter_format($i), $element_id);	

											// ACTIVE_TODO if required then in future we will need to replace recursiely all elements of array including the multidimensional arrays of any elements where it is appliable 										

											$newform[$element_id] = $element;	
											if( wbc()->sanitize->get('is_test') == 1 ) {
												wbc()->common->var_dump( "Form_Builder das_form_definition_support duplicating elements for simulation element_id " . $element_id );
												wbc()->common->pr( $newform[$element_id] );		
											}
										}

									}
								}

								$dynamic_add_support_html = null;
								$dynamic_add_support_elements = null;
							}
						}
					}

					$args['form_definition'][$tab_slug]['form'] = $newform;

					// if( wbc()->sanitize->get('is_test') == 1 ) {

					// 	wbc_pr("Form_Builder das_form_definition_support form_definition");
					// 	wbc_pr($args['form_definition'][$tab_slug]['form']);
					// }
				}
			}


		} 

		return $args['form_definition'];	
	}

	private function is_dynamic_add_in_progress(array $form_element, $in_progress_html) {

		if( !empty($form_element['dynamic_add_support']) or !empty($form_element['dynamic_add_support_start']) or !empty($in_progress_html)/*if group is already in progress*/ ) {

			return true;	
		}

	}

	private function is_dynamic_add_ended(array $form_element) {

		if( !empty($form_element['dynamic_add_support'])/*if only one element*/ or !empty($form_element['dynamic_add_support_end']) ) {

			return true;	
		}

	}

	private function das_clean_form_element(string &$field_id, array &$form_element) {

		//	clean the form element for the standard flow, but yeah it will be for placeholder cleanings only. the flags related to das will still be kept as it is. 

		$field_id = str_replace("{{data.added_counter}}", "", $field_id);

		// ACTIVE_TODO do the form_element cleaning also, and after that we do not need to manage the cleaning in the render_template or anywhere else. just this function will take care of everything related to cleaning. 

	}

	private function process_dynamic_add_support(string $field_id, array $form_element, $sub_elements, &$in_progress_html, &$container_html, &$das_fields_details_for_export, $das_field_id, $das_form_element) {

		if( $this->is_dynamic_add_in_progress($form_element, $in_progress_html) ) {

			if( $in_progress_html == null ) {	
				$in_progress_html = "";
				$das_fields_details_for_export = array();
			}


			//	check if the added_counter placeholder is already set if not then set at last 
			if( strpos($das_field_id, '{{data.added_counter}}') === FALSE ) {

				$das_form_element['id'] = $das_field_id."{{data.added_counter}}";	
			}

			$in_progress_html.=$this->render_template("in_tab_segment", $das_form_element, "for_js_template");
			$das_fields_details_for_export[$das_form_element['id']] = wbc()->common->array_slice_keys( $das_form_element, array('type') );
		}

		//	check if it is only one element or if group is ending, then just wrap with template tags, set in parent container html and empty the in progress html 
		if( $this->is_dynamic_add_ended( $form_element ) ) {

			$container_html.=$this->js_template_wrap($field_id, $in_progress_html);

			//	add plus button. by default it will be added from here but if the button support is disabled explicitly then it will not be added from here. 
			if( !isset($form_element['dynamic_add_support_plus_button']) or !empty($form_element['dynamic_add_support_plus_button']) ) {

				$plus_button_id = $this->dynamic_add_support_plus_button( $field_id, $sub_elements, $container_html, $das_fields_details_for_export );

				$this->das_plus_button_dependancies( $plus_button_id, $sub_elements, $container_html);
			}

			$in_progress_html = null;
			$das_fields_details_for_export = null;
		}

	}
		
	private function das_plus_button_id(string $field_id) {

		return $field_id."_plus_button";
	}

	private function dynamic_add_support_plus_button(string $field_id, $sub_elements, &$container_html, $das_fields_details_for_export) {

		$plus_button_id = $this->das_plus_button_id($field_id);

		$button = array(
				'label'=>eowbc_lang('+'),
				'type'=>'link',
				'class'=>array('button', 'secondary'),
				'attr'=>array('href="javascript:void(0);"', "onclick='window.document.splugins.common.admin.form_builder.api.das_add( \"".esc_attr($field_id)."\", \"".esc_attr($plus_button_id)."\", \"wp\" ); return false;'", 'data-das_fields=\''.json_encode($das_fields_details_for_export).'\'')

			);

		$button = $this->process_property_group_wrapper($button, $plus_button_id, $sub_elements);

		$container_html.=$this->render_template("in_tab_segment", $button,  "for_plus_button");

		return $plus_button_id;	
	}
		
	private function das_counter_field_id(string $plus_button_id) {

		return $plus_button_id."_added_count";
	}
		
	private function das_plus_button_dependancies(string $plus_button_id, $sub_elements, &$container_html) {

		$field = array(
				'type'=>'hidden',
				'value'=>'0'

			);

		$field = $this->process_property_group_wrapper($field, $this->das_counter_field_id($plus_button_id), $sub_elements);

		$container_html.=$this->render_template("in_tab_segment", $field, "for_plus_button");
	}

		
	private function load_asset() {

		if( ! $this->is_load_asset_done ) {

			$this->is_load_asset_done = true;	

			// ACTIVE_TODO it is not neceesary here to use wp_enqueue_scripts since it is coming at the sequenece in loading sequenece that may be after the wp_enqueue_scripts so now we need to create one such condition maybe in the asset.php switch block in the asset function called below and then that condition will add action if required or otherwise simply load asset directly -- to s 
				// ACTIVE_TODO and if it may help on admin the community says the hook admin_enqueue_scripts would work only -- to s 
			// add_action( 'wp_enqueue_scripts',function(){

				wbc()->load->asset( 'asset.php', constant( 'EOWBC_ASSET_DIR' ).'admin/form_builder.asset.php', array( 'configs' => array( 'das'=>$this->dynamic_add_support_config() ) ) );
			// }, 9999);
		}
	}

	public static function savable_types() {
		return array("text","checkbox","color","hidden","radio","select","textarea","icon","time",'number','link','date');
	}

	public static function clean_form_properties( $form_definition, $fields_to_keep = array() ) {

		// clin the entire abowe sp_variations_data form propertys as planned and keep here only key,type,value,etc...
	    foreach ($form_definition as $key => $tab) {

			foreach ($tab["form"] as $fk => $fv) {
				if( $fv["type"] == "table" ) {
					
					// ACTIVE_TODO here we shoud erase all other such type like table in if above wich are not nassasary for us one this layer -- to s & -- to a
					$form_definition[$key]["form"][$fk] = null;
				}
				else {

					foreach($fv as $fv_key => $fv_value){

						if( !in_array( $fv_key, $fields_to_keep )/*$fv_key != 'type' && $fv_key != 'value'*/ ){

							unset($form_definition[$key]["form"][$fk][$fv_key]);

						}						
					}						
				}		  
			}
	    }

	    return $form_definition;

	}

}
