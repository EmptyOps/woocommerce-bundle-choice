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

	        --- ACTIVE_TODO implments
	    }

	    public function init( $args = null ) { 
	        \eo\wbc\controllers\admin\menu\page\Tiny_features::instance()->getUI($args);
	    }

		private function getUI($args = null){
			if($args['is_legacy_admin'] == true){
				\eo\wbc\model\admin\Tiny_features::instance()->render_ui( $this->get_legacy_ui_definition('sp_variations', $args), $args );
			}
			else{
				\eo\wbc\model\admin\Tiny_features::instance()->render_ui( $this->get_ui_definition( $args), $args );
			}
	        
	    }

	    public function get_ui_definition($args = null){

	    }	    

	    private function get_legacy_ui_definition( $section, $args=null ) {

	    	$form_definition = array(
				'sp_variations'=>array(
					'label'=>"Gallery Images and Video(optionsUI)",
					'form'=>array(
						'sp_variations_image'=>array(
							'label'=>'Video &amp; Custum Field',
							'type'=>'icon',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('filter_setting_status'),
							'class'=>array(),
							'size_class'=>array('eight','wide'),
							'inline'=>true,
							'save_as'=>'post_meta',
						),
						'sp_variations_video'=>array(
							'label'=>'Video',
							'type'=>'file',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('filter_setting_status'),
							'class'=>array(),
							'size_class'=>array('eight','wide'),
							'inline'=>true,
							'save_as'=>'post_meta',
						),
						'sp_variations_video_url'=>array(
							'label'=>'Video',
							'type'=>'text',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('filter_setting_status'),
							'class'=>array(),
							'size_class'=>array('eight','wide'),
							'inline'=>true,
							'save_as'=>'post_meta',
						),
						'sp_variations_image2'=>array(
							'label'=>'images',
							'type'=>'icon',
							'sanitize'=>'sanitize_text_field',
							'value'=>array('filter_setting_status'),
							'class'=>array(),
							'size_class'=>array('eight','wide'),
							'inline'=>true,
							'save_as'=>'post_meta',
						)
					);	
				);
			);
			// return $form_definition;
			return parent::get_legacy_ui_definition( array('form_definition'=>$form_definition) );
	    }
	}
}		
