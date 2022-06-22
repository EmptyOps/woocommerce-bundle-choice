<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Tiny_features' ) ) {
	class Tiny_features extends \eo\wbc\controllers\admin\Controller {

		private static $_instance;
		public static function instance() {
		if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {
			parent::set_base_key('yet-to-be-defined');	

			parent::set_base_key_suffix('yet-to-be-defined');

		}

		public function should_init(){

	        // TODO implement as required 
	    }

	    public function init( $args = null ) { 
	    
			// since legacy admins are saving on form submit so we may need to have save called from the init function or other relevant function of the controller, but in the same style as the save is called from ajax resolver means with form_definition and so on 
				//	so in case of legacy admin call it from here, and yeah it should be before getUI call so that aftre render repopulates saved data on the same page load event 
			if($args['is_legacy_admin'] == true) {
				$args['page_section'] = 'sp_variations';	
				$args['form_definition'] = $this->get_legacy_form_definition($args['page_section'], $args);	

				\eo\wbc\model\admin\Tiny_features::instance()->save( $args['form_definition'], false, $args );
			}

	        \eo\wbc\controllers\admin\menu\page\Tiny_features::instance()->getUI($args);
	    }

		private function getUI($args = null){
		
			if($args['is_legacy_admin'] == true) {
				\eo\wbc\model\admin\Tiny_features::instance()->render_ui( $args['form_definition'], $args );
			} else {
				\eo\wbc\model\admin\Tiny_features::instance()->render_ui( $this->get_form_definition( $args), $args );
			}
	        
	    }

	    public function get_form_definition($args = null){

	    }	    

	    private function get_legacy_form_definition( $page_section, $args=null ) {

	    	$form_definition = null;	
	    	if( $page_section == 'sp_variations' ) {

		    	$form_definition = array(
					'sp_variations'=>array(
						'label'=>"Gallery Images and Video(optionsUI)",
						'form'=>array(
							'sp_frmb_saved_tab_key'=>array(
								'type'=>'hidden',
								'value'=>'sp_variations',
							),

							'devider1'=>array(
								'label'=>'Gallery Images',
								'type'=>'devider'
							),

							'gallary_images'=>array(
								'label'=>' ',
								'type'=>'icon',
								'sanitize'=>'sanitize_text_field',
								'dynamic_add_support_start'=>true,
								'value'=>array(''),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'save_as'=>'post_meta',
								'dynamic_add_support_end'=>true,
							),

							'devider2'=>array(
								'label'=>'Video & Custum Field',
								'type'=>'devider'
							),

							'video_custum_field'=>array(
								'label'=>'',
								'type'=>'file',
								'sanitize'=>'sanitize_text_field',
								'value'=>array(''),
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'save_as'=>'post_meta',
							),

							'video_segment'=>array(
								'label'=>'(Video)',
								'type'=>'segment'
							),

							'sp_variations_video_url'=>array(
								'label'=>'',
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'save_as'=>'post_meta',
							),
							'video_url_segment'=>array(
								'label'=>'(Video Url)',
								'type'=>'segment'
							),
							
							'devider3'=>array(
								'label'=>' ',
								'type'=>'devider'
							),

							'gallary_images2'=>array(
								'label'=>' ',
								'type'=>'icon',
								'sanitize'=>'sanitize_text_field',
								'dynamic_add_support_start'=>true,
								'value'=>array(''),
								'multiple_add_support'=>'start',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								/*'save_as'=>'post_meta',*/
								'dynamic_add_support_end'=>true,
							),
							'images_segment'=>array(
								'label'=>'(Images)',
								'type'=>'segment'
							)

							/*'submit_button'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'attr'=>array("data-action='save'",'data-tab_key="sp_variations"'),
								'inline'=>false
							),*/
						)	
					)
				);
		    }

			// maybe this hook is need to be moved controller right before the form_definition is passed to parent class function. and the form_definition will be filter parameter. -- and yeah there would be one hook only that maybe needed. not separate needed for render and save 
			apply_filters('sp_variations_data_before_admin_form_render', $form_definition);

			// return $form_definition;
			return parent::get_form_defination__( array('form_definition'=>$form_definition) );
	    }
	}
}		
