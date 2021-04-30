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

	public static function run() {
		global $wp_customize;
	    if( ! defined( 'DOING_AJAX' ) && (!function_exists('is_ajax') || !is_ajax()) && empty(wbc()->sanitize->get("wc-ajax")) and !empty($wp_customize)) {
	    	//wbc()->load->asset('js','customizer');
	        ob_start();
	        ?>        
	            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	            <link rel="stylesheet" type="text/css" href="<?php echo constant('EOWBC_ASSET_URL').'css/'.stripslashes('customizer.css'); ?>"/>	            
	            <script src="<?php echo constant('EOWBC_ASSET_URL').'js/'.stripslashes('rev_select.js'); ?>"></script>
	            <script src="<?php echo constant('EOWBC_ASSET_URL').'js/'.stripslashes('customizer.js'); ?>"></script>

	        <?php
	        echo ob_get_clean();        
	    }
	    
	    //wbc()->load->asset('css','customizer');
		//wbc()->load->asset('js','customizer');

		add_action('customize_register', function($wp_customize) {
	        //adding section in wordpress customizer   
	        $wp_customize->add_section('woo_bundle_choice', array(
	            'title'          => 'Woo Bundle Choice',
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
	    });
	}
}
