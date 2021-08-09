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
		
		/*wbc()->options->update_option('configuration','config_category',1);
		wbc()->options->update_option('configuration','config_map',1);*/
		add_action('template_redirect',function(){

			$bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));
			if(!empty($bonus_features['filters_shop_cat']) and ( is_shop() || is_product_category()) and empty(wbc()->sanitize->get('EO_WBC'))) {


			    \eo\wbc\controllers\publics\pages\Shop_Category_Filter::instance()->init();
			}

			if(is_product() and !empty(wbc()->sanitize->get('eowbc_askq'))) {

			    \eo\wbc\controllers\publics\pages\Product_Question::instance()->init();
			}
			
			if(is_product() and wbc()->options->get_option('tiny_features','tiny_features_hide_sku_category_product_page',false)) {
				
				remove_action( 'woocommerce_single_product_summary',
'woocommerce_template_single_meta', 40 );
				add_filter( 'wc_product_sku_enabled', '__return_false' );
			}
		});

		//	Strart frontend seervices
		\eo\wbc\controllers\publics\Service::instance()->run();

		
		$features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array()))));
		
        if(	!empty(array_intersect(array_values($features),array_keys(wbc()->config->get_builders())))
        		and        	
        	wbc()->options->get_option('configuration','config_category',0) == 1
             	and
            wbc()->options->get_option('configuration','config_map',0) == 1
        ){
        	
        	// Support for new url from old url structure.
        	// @since 1.0.0 
        	// prior to 1.0.0 old url was supported
        	if(!empty(wbc()->sanitize->get('EO_WBC')) and isset($_GET['BEGIN']) and isset($_GET['STEP']) and !isset($_GET['FIRST']) and !isset($_GET['SECOND'])){
        		$_GET['FIRST']='';
        		$_GET['SECOND']='';
        	}


        	add_action('template_redirect',function(){
        		
        		self::instance()->enable_session();        		
        		if(is_front_page()) {
				    \eo\wbc\controllers\publics\pages\Home::instance()->init();

				} elseif(is_shop()) {
			    	\eo\wbc\controllers\publics\pages\Shop::instance()->init();

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
			    	
					\eo\wbc\controllers\publics\pages\Order_Received::instance()->init();	    

			    } elseif (wbc()->wc->is_wc_endpoint_url('view-order')) {
			    	
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
