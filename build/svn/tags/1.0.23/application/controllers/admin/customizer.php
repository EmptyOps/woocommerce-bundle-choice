<?php 

namespace eo\wbc\controllers\admin;

defined( 'ABSPATH' ) || exit;

class Customizer {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	private function __construct() {
		// no implementation
	}

	public function customizer_assets(){
		wp_enqueue_style( 'eowbc_customizer_css', constant('EOWBC_ASSET_URL').'css/'.stripslashes('customizer.css') );

		wp_enqueue_script('eowbc_selector_js',constant('EOWBC_ASSET_URL').'js/'.stripslashes('rev_select.js'), array( 'jquery'), '', true );

		wp_enqueue_script('eowbc_customizer_js',constant('EOWBC_ASSET_URL').'js/'.stripslashes('customizer.js'), array( 'jquery'), '', true );
	}

	public static function run() {

		global $wp_customize;
	    if( ! defined( 'DOING_AJAX' ) && (!function_exists('is_ajax') || !is_ajax()) && empty(wbc()->sanitize->get("wc-ajax")) and !empty($wp_customize)) {
	    	
	    	add_action('admin_enqueue_scripts',array(self::$_instance,'customizer_assets'));	   

            add_action('wp_enqueue_scripts',array(self::$_instance,'customizer_assets'));	   
	    }
	    
	    //wbc()->load->asset('css','customizer');
		//wbc()->load->asset('js','customizer');

		add_action('customize_register', function($wp_customize) {
	        //adding section in wordpress customizer   
	        $wp_customize->add_section('woo_bundle_choice', array(
	            'title'          => 'BUNDLOICE (formerly Woo Choice Plugin)',
	            'active_callback' => 'is_front_page'
	        ));

	        //adding setting for copyright text
	        $wp_customize->add_setting('btn_position_setting_text', array(
	            'default'        => '',
	            'type' => 'option',
	        ));

	        $wp_customize->add_control('btn_position_setting_selector_text', array(
	            'label'   => "Click below to enable section and select area on the home page and then buttons will appear in this area.",
	            'section' => 'woo_bundle_choice',
	            'settings'   => 'btn_position_setting_text',
	            'type'    => 'text',            
	        ));

	        
	        $wp_customize->add_setting('btn_position_setting_btn', array(
	            'default'        => 'Enable Selection',
	            'type' => 'option',
	        ));

	        $wp_customize->add_control('btn_position_setting_selector_btn', array(
	            'label'   => '',
	            'section' => 'woo_bundle_choice',
	            'settings'   => 'btn_position_setting_btn',
	            'type'    => 'button', 
	            'input_attrs' => array('class' => 'button button-primary'),
	        ));
	        return $wp_customize;
	    });
	}
}
