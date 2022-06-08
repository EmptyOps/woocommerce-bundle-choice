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
			parent::set_base_key("wbc_");	

			parent::set_base_key_suffix($base_key_suffix);
		}

		public function should_init(){

	        --- ACTIVE_TODO implments
	    }

	    public function init( $args = null ) { 
	        \eo\wbc\controllers\admin\menu\page\Tiny_features::instance()->getUI();
	    }

		private function getUI(){
	        \eo\wbc\model\admin\Tiny_features::instance()->render_ui( $this->get_legacy_ui_definition() );
	    }	    

	    private function get_legacy_ui_definition( $section, $args=null ) {

	    	$form_definition = array(
				'tiny_features'=>array(
					'label'=>"Tiny Features",
					'form'=>array(
						'tiny_features_image'=>array(
							'label'=>'Video &amp; Custum Field',
							'type'=>'file',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('filter_setting_status'),
							'class'=>array(),
							'size_class'=>array('eight','wide'),
							'inline'=>true,
						),
						'tiny_features_video'=>array(
							'label'=>'Video',
							'type'=>'file',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('filter_setting_status'),
							'class'=>array(),
							'size_class'=>array('eight','wide'),
							'inline'=>true,
						),
						'tiny_features_image2'=>array(
							'label'=>'images',
							'type'=>'file',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('filter_setting_status'),
							'class'=>array(),
							'size_class'=>array('eight','wide'),
							'inline'=>true,
						)
					);	
				);
			);
			// return $form_definition;
			return parent::get_legacy_ui_definition__( array('form_definition'=>$form_definition) );
	    }
	}
}		
