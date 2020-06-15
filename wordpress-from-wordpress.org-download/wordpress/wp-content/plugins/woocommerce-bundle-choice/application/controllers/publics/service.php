<?php
namespace eo\wbc\controllers\publics;
defined( 'ABSPATH' ) || exit;

class Service {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function run() {		
		$this->add_shortcode();
	}

	function add_shortcode() {		
		// The two buttons shortcode.
		if( wbc()->options->get_option('configuration','buttons_page')==2 or wbc()->options->get_option('configuration','buttons_page')==3 ) {			
            add_shortcode('woo-bundle-choice-btn',function(){
            	echo wbc()->load->template('publics/buttons');
            });                              
        }

        // The specification view shortcode
        if(wbc()->options->get_option('tiny_features','specification_view_status',false) and wbc()->options->get_option('tiny_features','specification_view_shortcode_status',false)){

        	add_shortcode('woo-bundle-choice-specification-view',function(){
        		ob_start();
            	wbc()->load->template('publics/features/specification_view');
            	echo ob_get_clean();
            });	
        }
	}
}
