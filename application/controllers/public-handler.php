<?php 

namespace eo\wbc\controllers;

defined( 'ABSPATH' ) || exit;

class Public_Handler {

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

	public static function process(){
		/*
		*	root method to process all the frontend requests.
		*/		
		do_action( 'before_public_process_request' );		
		//Perform plugin's task only if both configuration and mapping are completed.
        if(
        	wbc()->options->get_option('configuration','config_category',0) == 1
             	and
            wbc()->options->get_option('configuration','config_map',0) == 1
        ){
        	//	Strart frontend seervices

        	\eo\wbc\controllers\publics\Service::instance()->run();

        	add_action('template_redirect',function(){
        		
        		self::instance()->enable_session();        		
        		if(is_front_page()) {
				    \eo\wbc\controllers\publics\pages\Home::instance()->init();

				} elseif (is_product_category()) {
			        \eo\wbc\controllers\publics\pages\Category::instance()->init();

			    } elseif(is_product()) {			    	
			    	\eo\wbc\controllers\publics\pages\Product::instance()->init();

			    } elseif(is_page('Product Review')) {
					\eo\wbc\controllers\publics\pages\Preview::instance()->init();        
					
			    } elseif(is_cart()) {
			    	\eo\wbc\controllers\publics\pages\Cart::instance()->init();
			    
			    } elseif (is_checkout() && !is_order_received_page()) {
			    	\eo\wbc\controllers\publics\pages\Checkout::instance()->init();	

			    } elseif (is_order_received_page()) {
			    	//it is due to some bug in auto loader that we had to load some classes manually, let's fix at asap
			    	require_once EOWBC_DIRECTORY.'application/controllers/publics/pages/order_received.php';

					\eo\wbc\controllers\publics\pages\Order_Received::instance()->init();	    

			    } elseif (wbc()->wc->is_wc_endpoint_url('view-order')) {
			    	//it is due to some bug in auto loader that we had to load some classes manually, let's fix at asap
			    	require_once EOWBC_DIRECTORY.'application/controllers/publics/pages/view_order.php';

					\eo\wbc\controllers\publics\pages\View_Order::instance()->init();

			    }
        	},20);        	
        }
		do_action( 'after_public_process_request' );
	}

	public function enable_session() {
		/*
		*	Enable session at user request to save data between each page navigation.
		*/
		 if( function_exists('wc') and !empty(wc()->session) and function_exists('is_user_logged_in') and !is_user_logged_in() )
        {                   
        	wc()->session->set_customer_session_cookie(TRUE);
        }
	}   
}
