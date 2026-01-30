<?php

namespace eo\wbc\controllers\admin;

defined( 'ABSPATH' ) || exit;

class Controller extends \eo\wbc\controllers\Controller {

	private static $_instance = null;

	// base_key -- the slug of the page, main key of the option group of the particular module should be defined based on this key 
	private $base_key = null;

	// base_key_suffix -- so if there are custom logic then that controller can be handled 
	private $base_key_suffix = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	/*public function __construct() {
		
	}	*/

	public function get_base_key() {

		return $this->base_key;
	}

	protected function set_base_key($base_key) {

		$this->base_key = $base_key;
	}

	public function get_base_key_suffix() {

		return $this->base_key_suffix;
	}

	protected function set_base_key_suffix($base_key_suffix) {

		$this->base_key_suffix = $base_key_suffix;
	}

	protected function _get($name) {

	}

	protected function _set() {

	}

	protected function _call() {

	}

	public function pre_process_form_definition($form_definition,$args = array()) {
		
		$separator = wbc()->config->separator();

		// ACTIVE_TODO need to add recursion only till level 3 or 4 for replacingn {{id}} -- to s		
		foreach($form_definition as $tab_slug => $tab_data) {

			foreach($tab_data['form'] as $fdfk=>$fdfv) {
					
				if (strpos($fdfk,'{{id}}') !== false) {
					
					unset($form_definition[$tab_slug]['form'][$fdfk]);
					$fdfk = (str_replace('{{id}}',$separator.$args['data']['id'].$separator,$fdfk));
					$form_definition[$tab_slug]['form'][$fdfk] = $fdfv;
				}
			}
		}
		return $form_definition; 
	}

	public function get_form_defination($args = array()){
		// To do here.
	}



	// ACTIVE_TODO need to refactor get_form_defination function on all admin controllers including the theme admin controllers and ensure one flow only which like below a static function with args param -- to s
	// 	ACTIVE_TODO but yeah __ at last in the name should be dropped. -- to s
			// ACTIVE_TODO and there is spell mistake type in above and below function need to fix that too, to bring it in like with function defs in all controllers -- to s 
	public function get_form_defination__($args = null) {

		// during post save 
		// 	maybe everything will be handled by the form builder like detecting the added counter field post data and simulating based on that 
		if( ( !empty($_POST) && empty(wbc()->sanitize->post("sub_action")) ) or wbc()->sanitize->post("sub_action") == "save" ) {

			$args["sub_action"] = "save";
		} else {

			$args["sub_action"] = "";
		}
			
		// during the featch filter 	
		// 	ACTIVE_TODO it will determine the post related data if required like save tab key that was there in that model but nothing else like that id and so on 
		// 		ACTIVE_TODO and this fetch filter data will be passed to the form builder function 
					//	NOTE: now the id based repopulate support for das will populate its part of the form(using js layers for rendering) repopulation. 

		// and then the rest just will be handled by form builder 
		// 	and that will return the processed form definition 
		return \eo\wbc\model\admin\Form_Builder::instance()->das_form_definition_support($args);	
	}

	public function get_legacy_ui_definition($section, $args=null){
		return $this->get_form_defination__($args);
	}

	/*public function get_admin_form($args = array()){
		$form_defination = $this->get_form_defination($args);
		if(!empty($form_defination['admin_form'])){
			return $form_defination['admin_form'];
		}
	}*/
	public function default_uis($type,$exceptance) {
		/*--a code /sp_theme_ui/application/view/ui/Base_Builder.php sathe marj karalo chhe.*/
		$defaults = array(
			'label'=>array('text','color','back_color','font_family','font_size','visibility'),
			'p'=>array('text','color','back_color','font_family','font_size','visibility'),
			'span'=>array('text','color','back_color','font_family','font_size','visibility'),
			'header'=>array('text','color','back_color','font_family','font_size','visibility'),
			'sub_header'=>array('text','color','back_color','font_family','font_size','visibility'),
			'checkbox'=>array('checkbox'),
			'text'=>array('text','color','font_size','visibility'),
			'no_text'=>array('color','font_size','visibility'),
			'image'=>array('height','width','image','visibility'),
			'img'=>array('height','width','image','visibility'),
			'button'=>array('text','color','back_color','font_family','font_size','radius','visibility'),
			'container'=>array('height','width','margin_left','margin_right','visibility'),
			'wc_attribute_field'=>array('attribute','checkbox','text','visibility'),
			'a'=>array(/*'href',*/'url','text','color','font_size','visibility'),
			'td'=>array('text','color','back_color','font_family','font_size','visibility'),
		);

		$collection = array();

		if(!empty($defaults[$type])) {
			$collection = $defaults[$type];

			if(!empty($exceptance)) {
				foreach ($exceptance as $exc) {
					if( array_search($exc,$collection)!==false ) {
						unset($collection[array_search($exc,$collection)]);
					}
				}
			}			
		}
		return $collection;
	}

	public function generate_form_wrapper($form_definition, $singleton_function, $tab_key_prefix, $page_title_prefix, $page_sections, $mdl_obj) {

		$controls = array('appearence_controls'=>'Appearence Controls',
			'configuration_controls'=>'Configuration Controls',
			'data_controls'=>'Data Controls'
		);

		foreach($controls as $control_key=>$control_title){

			$form = array();
			foreach($page_sections as $ps_key=>$ps_title){

				$ui_definition = null;
				if (method_exists($mdl_obj,'ui_'.$control_key.'_definition')) {

					$ui_definition = $mdl_obj->{'ui_'.$control_key.'_definition'}(null, $ps_key);

				}

				if (!empty($ui_definition)) {
					
					$form_part = $this->generate_form(/*$publics_form*/$ui_definition['controls'], $control_key, true);

					if (!empty($form_part)) {

						$form = array_merge(
						    $form,
						    array(
						        $singleton_function . '_' . $control_key . '_' . $ps_key . '_accordian_start' => array(
						            'type' => 'accordian',
						            'section_type' => 'start',
						            'class' => array('field', 'styled'),
						            'label' => '<span class="ui large text">' . esc_html($ps_title) . '</span>',
						        ),
						    ),
						    $form_part,
						    array(
						        $singleton_function . '_' . $control_key . '_' . $ps_key . '_accordian_end' => array(
						            'type' => 'accordian',
						            'section_type' => 'end',
						        ),
						    )
						);
					}
				}

			}

			if(!wbc_isEmptyArr($form)){

				$tab_key = $singleton_function.'_'.$tab_key_prefix.'_'.$control_key;

				$form['save'] = array(
					'label'=>'Save',
					'type'=>'button',		
					'class'=>array('primary'),
					'attr'=>array("data-action='save'",'data-tab_key="'.esc_attr($tab_key).'"')	
				);

				$form_definition[$tab_key] = array('label'=>trim($page_title_prefix.' '.$control_title),'form'=>$form);		
			}

		}

		return $form_definition;
		
	}

	public function generate_form($form,$key='appearence_controls',$is_ui_definition = false) {
		if(empty($form) or !is_array($form)){
			return array();
		}
		
		wbc()->load->model('admin/form-elements');
		$controls = array();

		$admin_ui = \eo\wbc\model\admin\Form_Elements::instance();
		
		foreach ($form as $form_key => $form_value) {
			
			// ACTIVE_TODO is the use of xor intentional or just a silly mistake, lets confirm and replace it with the or when required if it is affecting our team and user experience. or otherwise mark it as todo by 3rd revision. -- to h 
			if(!empty($form_value[$key]) and ( empty($this->check_show_on_admin) xor (!empty($form_value[$key][2]) and !empty($form_value[$key][2]['show_on_admin']) ) ) ) {	

				$control_element = array();
				$excep_controls = array();
				

				if(!empty($form_value[$key][1]) and is_array($form_value[$key])) {
					$excep_controls = $form_value[$key][1];
				} elseif (!empty($form_value[$key][1])  and is_string($form_value[$key])) {
					$excep_controls = explode(',',$form_value[$key][1]);
				}

				/*echo "<pre>";
				print_r($form_value[$key][2]);
				echo "</pre>";
				die();*/

				// lup attr 

				// ACTIVE_TODO here instad of having our team and user to specify the node_type adishnaly for the controls fild it is beter if we can refacter it so that it can read dieracly from the ui array, so lats do it as long as it is posibul without lusing the balnche of the modules capling or cohesion. but it seems that like the das node count default fild below it is not possibel without compromising on the lusly cupled modules standerd, but lats think about if it is possibel. other wish as long as thar is no way and it seems naturel to lat users define it hard coded way lats mark it as invalid.
					// -- 	configuration controls and data controls ma node_type set karvanu avchhe? so far NO done 
				if( !empty($form_value[$key][2]) and ( !empty($form_value[$key][2]['type']) or !empty($form_value[$key][2]['node_type']) ) ) {

					$dynamic_type = ( !empty($form_value[$key][2]['type']) ? $form_value[$key][2]['type'] : $form_value[$key][2]['node_type'] );

					$control_element = $this->default_uis(/*$form_value[$key][2]['type']*/$dynamic_type,$excep_controls);
					if(empty($control_element)/* and $form_value['type'] === 'hidden'*/){
						$control_element = array(/*$form_value[$key][2]['type']*/$dynamic_type);
					}

				} elseif(!empty($form_value['type'])) {
					$control_element = $this->default_uis($form_value['type'],$excep_controls);
				} 

				if( !empty($control_element) or ( $key == 'data_controls' and !empty($form_value[$key][2]['das_node_enabled']) ) ){

					$controls[$form_key.'_form_segment'] = array(
						'label'=> $form_value[$key][0],
						'type'=>'devider',
					);

					if( !empty($control_element) ) {

						$controls = $this->generate_form_controls($controls, $control_element, $form_value, $key,$form_key, $admin_ui, $is_ui_definition);

						if (!empty($form_value[$key][2]['das_node_enabled'])) {
					
							$das_node_count = wbc()->options->get_option($form_value[$key][2]['data_tab_key'],$form_key."_das_node_count",(isset($form_value[$key][2]['das_node_count_default']) ? $form_value[$key][2]['das_node_count_default'] : 0),false,false);

							if($das_node_count > 0){
								
								for($i = 0; $i<$das_node_count; $i++) {

									$controls = $this->generate_form_controls($controls, $control_element, $form_value, $key,($form_key.'_'.$i), $admin_ui, $is_ui_definition);
								}
							}
						}

					}

					// ACTIVE_TODO here we are depanding on the das node count default fild that is set from the data controls but in fusher we sud refacter the code as long as it is possible with loosely cupled flow to ansyor that the default count seting is read from the ui array diractly instad of dipanding on the defolt that is need to be set sapratly. but i thing thar is no essy way and if we do sumthing than it well not be lusly cupled so may be it is the work that we need our team and user to do to achive this. but if it is possibel than lats do it other wish we can mark it is todo or mac this point invalid.
					// ACTIVE_TODO and in futcher we may lick to provide on admin the increase or decrease support directly on the particular appearence or configuration tab instead of asking user to increase or decrease fast on the data tab. so that user expereince can be improved but as long as it is simple and feasible, and when and if we do that than afcorse we can use the sam das support that is added for the form builder but that exactly can not be used on form array but we can at least us that javascript api. lats do it if required by 3rd revision other wish we can mark it as todo. -- to h & -- to b 
					if( $key == 'data_controls' and !empty($form_value[$key][2]['das_node_enabled']) ) {

						$controls[$form_key.'_das_node_count'] = array(
							'label'=>'increase/decrease '.$form_value[$key][0],
							'type'=>'number',
							'value'=> ( !empty($form_value[$key][2]['das_node_count_default']) ? $form_value[$key][2]['das_node_count_default'] : 0 ),							
							'sanitize'=>'sanitize_text_field',
							'size_class'=>array(''),
						);
					}
				}
			}

			/*if(!empty($form_value['data_controls']) and !empty($form_value['data_controls']['type']) and $form_value['data_controls']['type'] === 'send_email_on_click'){
				
				$control_key = $form_key.'email_header_template_text';
				
				$controls['email_header_template_text'] = array(
					'label'=>'Email Header',
					'type'=>'text',
					'value'=>wbc()->options->get_option($form_value['data_controls']['tab_key'],'email_header_template_text'),
					'class'=>array('fluid','eight','wide',),						
					'sanitize'=>'sanitize_text_field',
					'id'=>'eorad_email_header',
					'tab_key'=>$form_value['data_controls']['tab_key']);
				$controls['email_body_template_textarea'] = array(
					'label'=>'Email Header',
					'type'=>'textarea',
					'value'=>wbc()->options->get_option($form_value['data_controls']['tab_key'],'email_body_template_textarea'),
					'class'=>array('fluid','eight','wide',),						
					'sanitize'=>'sanitize_text_field',
					'id'=>'eorad_email_header',
					'tab_key'=>$form_value['data_controls']['tab_key']);
			}*/

			if(!empty($form_value['child']) or (empty($form_value['type']) and !empty($form_value) and is_array($form_value)) ){

				$child_control = array();

				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type']) and count($form_value['child'])>1) {
						$child_control = $this->generate_form($form_value['child'],$key);
					} else{
						$child_control = $this->generate_form([$form_value['child']],$key);
					}
					
				} elseif(empty($form_value['type']) and !empty($form_value) and is_array($form_value)) {
					$child_control = $this->generate_form($form_value,$key);
				}

				if(!empty($child_control)){
					$controls = array_replace($controls,$child_control);
				}
			}
		}

		//echo "<pre>";
		//print_r($controls);
		//echo "</pre>";

		return $controls;
	}

	private function generate_form_controls($controls, $control_element, $form_value, $key, $form_key, $admin_ui, $is_ui_definition = false) {

		foreach ($control_element as $control) {

			// NOTE: here we are implementing some specific and necessary peoperties for the elements which is required to be done at the defecto layer like from here.
			$control_args = null;

			if( $is_ui_definition ) {

				if( 'text' == $control ) {
					
					if( isset($form_value[$key][2]['original_text']) ) {

						$control_args = array();

						// ACTIVE_TODO in future in addition to help text we may also like to detect the text property of this field from the get text call and check if it is modifed from the laguage file(we can check by comparing the value retrieved from gettext call against the value of original_text property of the appearance control, and maybe the gettext call value would be directly available in the prehtml property of ui node so we may not need to do anything for aquring the value of gettext call) then we can show warning here that or disable this text field that this is no more applicable.
						
						$control_args['info'] = array(
													'label'=>'<b>If you are editing the text from the language files then this text property will not work from here.</b>',
													'type'=>'visible_info',
													'class'=>array('medium'),
												);
					}
				} elseif( 'attribute' == $control ) {

					$control_args = array();

					$control_args['is_sp_eid'] = true; 
				}
			}

			if(empty($form_value[$key][2])){

				if( $control_args === null ) {

					$controls[$form_key.'_'.$control] = call_user_func_array(array($admin_ui,$control),array($form_key.'_'.$control,$form_value[$key][0]));
				} else {

					$controls[$form_key.'_'.$control] = call_user_func_array(array($admin_ui,$control),array($form_key.'_'.$control,$form_value[$key][0],$control_args));
				}

			} else {

				$control_key = $form_key.'_'.$control;

				// --here jo apdy id had coded support karva hot to ano support ds mate ansyor karvo padchhe nitar hard coded id atlist nava emplymentshon ma ni use kari shaky or simply no kariy to chale am hoy to betar chhe. so lat simply figerat out and jo us karva pady am hoy or we can not mins confrom karvu posibul no hoy to simply wbc ui builder ma aa je singel cot ma id paramiter chhe jay jay us thayelu hoy te find kari ne puchi thei apdy teno ahi support confrom kari shky -- to h & -- to b done 
				// 	-- we can not use id for das other wish it well be com vari canfuging -- to h done 
				if( $is_ui_definition ) {

					// NOTE: disabled below if because for the ui_definition based upgraded layer the id_key and the form_key is alaways same. and when the form_key reach above it have some overrides so need to take that into consideration so this is commented. 
					// if(!empty($form_value[$key][2]['id_key'])){

					// 	$control_key = $form_value[$key][2]['id_key'].'_'.$control;
					// }
				} else {

					if(!empty($form_value[$key][2]['id'])){

						$control_key = $form_value[$key][2]['id'].'_'.$control;
					}
				}

				if( $is_ui_definition ) {

					if( is_array($control_args) ) {

						$form_value[$key][2] = array_replace($form_value[$key][2], $control_args);
					}
				}

				$controls[$control_key] = call_user_func_array(array($admin_ui,$control),array($control_key,$form_value[$key][0],$form_value[$key][2]));
			}
		}

		return $controls;

	}

		// return all appearance control data to be dumped in to json
	// format must include `form_control_key` as third array element and the id if necessary.
	
	public function generate_json_dump($form,$key='appearence_controls') {

		if(empty($form) or !is_array($form)){
			return array();
		}
		
		wbc()->load->model('admin/form-elements');
		$controls = array();

		$admin_ui = \eo\wbc\model\admin\Form_Elements::instance();
		
		foreach ($form as $form_key => $form_value) {
			
			// ACTIVE_TODO is the use of xor intentional or just a silly mistake, lets confirm and replace it with the or when required if it is affecting our team and user experience. or otherwise mark it as todo by 3rd revision. -- to h 
			if(!empty($form_value[$key]) and ( empty($this->check_show_on_admin) xor (!empty($form_value[$key][2]) and !empty($form_value[$key][2]['show_on_admin']) ) ) ) {	

				$control_element = array();
				$excep_controls = array();
				

				if(!empty($form_value[$key][1]) and is_array($form_value[$key])) {
					$excep_controls = $form_value[$key][1];
				} elseif (!empty($form_value[$key][1])  and is_string($form_value[$key])) {
					$excep_controls = explode(',',$form_value[$key][1]);
				}
			
				if(!empty($form_value[$key][2]) and  !empty($form_value[$key][2]['type'])) {

					$control_element = $this->default_uis($form_value[$key][2]['type'],$excep_controls);
					if(empty($control_element)/* and $form_value['type'] === 'hidden'*/){

						$control_element = array($form_value[$key][2]['type']);
					}

				} elseif(!empty($form_value['type'])) {
					$control_element = $this->default_uis($form_value['type'],$excep_controls);
				} 

				if(!empty($control_element)){



					/*$controls[$form_key.'_form_segment'] = array(
						'label'=> $form_value[$key][0],
						'type'=>'devider',
					);*/
					
					$form_control_key = '';
					if(!empty($form_value[$key][2]['form_control_key'])) {
						$form_control_key = $form_value[$key][2]['form_control_key'];
					}

					if(!empty($form_value[$key][2]['control_key'])) {
						$form_control_key = $form_value[$key][2]['control_key'];
					}

					foreach ($control_element as $control) {

						if(empty($form_value[$key][2])){
							$controls[$form_key.'_'.$control] = wbc()->options->get_option($form_control_key,$form_key.'_'.$control); /*call_user_func_array(array($admin_ui,$control),array($form_key.'_'.$control,$form_value[$key][0]))*/;
						} else {
							$control_key = $form_key.'_'.$control;
							if(!empty($form_value[$key][2]['id'])){
								$control_key = $form_value[$key][2]['id'].'_'.$control;
							}

							//var_dump($form_control_key,$control_key);

							$controls[$form_key][$control] =  wbc()->options->get_option($form_control_key,$control_key); 
							if($control === 'image' and is_numeric($controls[$form_key][$control])) {
								$controls[$form_key][$control] = wp_get_attachment_url($controls[$form_key][$control]);
							}
							
							/*call_user_func_array(array($admin_ui,$control),array($control_key,$form_value[$key][0],$form_value[$key][2]))*/;
							
						}
					}
				}
			}

			if(!empty($form_value['child']) or (empty($form_value['type']) and !empty($form_value) and is_array($form_value)) ){

				$child_control = array();

				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type']) and count($form_value['child'])>1) {
						$child_control = $this->generate_form($form_value['child'],$key);
					} else{
						$child_control = $this->generate_form([$form_value['child']],$key);
					}
					
				} elseif(empty($form_value['type']) and !empty($form_value) and is_array($form_value)) {
					$child_control = $this->generate_form($form_value,$key);
				}

				if(!empty($child_control)){
					$controls = array_replace($controls,$child_control);
				}
			}
		}

		return $controls;
	}
	
	public function get_control_data($form,$key='') {
		if(empty($form) or !is_array($form) or empty($key)) {
			return array();
		}
		
		wbc()->load->model('admin/form-elements');
		$controls_data = array();

		$admin_ui = \eo\wbc\model\admin\Form_Elements::instance();
		
		foreach ($form as $form_key => $form_value) {
			
			if(!empty($form_value['data_controls']) and !empty($form_value['data_controls']['type'])) {	
				if( (is_string($form_value['data_controls']['type']) and $form_value['data_controls']['type']===$key) or (is_array($form_value['data_controls']['type']) and array_search($key,$form_value['data_controls']['type'])!==false) ) {

					$label = '';
					if(!empty($form_value['data_controls']['label'])){
						$label = $form_value['data_controls']['label'];
					} elseif(!empty($form_value['label'])){
						$label = $form_value['label'];
					}

					$control_id = $form_key;
					if(!empty($form_value['data_controls']['name'])) {
						$control_id = $form_value['data_controls']['name'];
					} elseif(!empty($form_value['data_controls']['id'])) {
						$control_id = $form_value['data_controls']['id'];
					} elseif(!empty($form_value['name'])){
						$control_id = $form_value['name'];
					} elseif(!empty($form_value['id'])){
						$control_id = $form_value['id'];
					}

					$controls_data[$control_id]=array('label'=>$label,'value'=>wbc()->sanitize->post($control_id));
				}
			}

			if(!empty($form_value['child']) or (empty($form_value['type']) and !empty($form_value) and is_array($form_value)) ){

				$child_controls_data = array();

				if(!empty($form_value['child'])) {
					if(empty($form_value['child']['type']) and count($form_value['child'])>1) {
						$child_controls_data = $this->get_control_data($form_value['child'],$key);
					} else{
						$child_controls_data = $this->get_control_data([$form_value['child']],$key);
					}
					
				} elseif(empty($form_value['type']) and !empty($form_value) and is_array($form_value)) {
					$child_controls_data = $this->get_control_data($form_value,$key);
				}

				if(!empty($child_controls_data)){
					$controls_data = array_replace($controls_data,$child_controls_data);
				}
			}
		}

		return $controls_data;
	}

	
}