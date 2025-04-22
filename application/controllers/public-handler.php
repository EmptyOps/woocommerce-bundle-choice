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


		if(!empty($_GET['EO_WBC'])) {
			add_filter('WPML_filter_link',function($url, $lang_info){
				$__get = /*$_GET*/wbc()->sanitize->_read_global_sanitized('get');
				unset($__get['lang']);
				$query_url=http_build_query($__get);
				if(strpos($url,'/?')!==false) {
					if(substr($url,-1)==='&'){
						$url.=$query_url;
					} else {
						$url.='&'.$query_url;	
					}					
				} elseif(strpos($url,'?')!==false) {
					if(substr($url,-1)==='&'){
						$url.=$query_url;
					} else {
						$url.='&'.$query_url;	
					}				
				} else {
					$url = untrailingslashit($url).'/?'.$query_url;					
				}
				return $url;			
			},11,2);
		}


		// 10-08-2021 mahesh@emptyops.com
		// Intial load optimization -- fire intial load filters to avoid initil ajax call.
		/*if(isset($_GET['EO_WBC']) and !empty($_GET['EO_WBC']) and empty($_GET['_category'])) {
	        // on load filter
	        $_GET['eo_wbc_filter']=1;
	        if(!empty($_GET['CAT_LINK'])){			            
	            $_GET['_category']='cat_link';
	            $_REQUEST['_category']='cat_link';
	            $_GET['cat_filter_cat_link']=$_GET['CAT_LINK'];
	            $_REQUEST['cat_filter_cat_link']=$_GET['CAT_LINK'];
	        }
	        \eo\wbc\controllers\ajax\Filter::instance()->filter();
	        unset($_GET['eo_wbc_filter']);
	    }*/

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
		
		/*var_dump(!empty(array_intersect(array_values($features),array_keys(wbc()->config->get_builders()))),	
        	wbc()->options->get_option('configuration','config_category',0) == 1,
            wbc()->options->get_option('configuration','config_map',0) == 1);
		die();*/

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
        		// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
        		// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
        		// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
        		$_GET['FIRST']='';
        		$_GET['SECOND']='';
        	}

        	add_action('init',function(){
	        	// 10-08-2021 mahesh@emptyops.com
				// Intial load optimization -- fire intial load filters to avoid initil ajax call.
	        	/*add_action('template_redirect',function(){
	        		if (is_product_category()) {*/
			        	if(isset($_GET['EO_WBC']) and !empty($_GET['EO_WBC']) and empty($_GET['_category'])) {
			        		// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
			        		// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
			        		// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
				            // on load filter
				            $_GET['eo_wbc_filter']=1;
				            if(!empty($_GET['CAT_LINK'])){	
				            	// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
				            	// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
				            	// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.		            
				                $_GET['_category']='cat_link';
				                $_REQUEST['_category']='cat_link';
				                $_GET['cat_filter_cat_link']= \eo\wbc\model\SP_WBC_Router::instance()->set_query_params_formatted( 'to_form_field', 
												                array('prod_cat'), 
												                \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_form_field_raw',
																				                array('prod_cat'),
																				                'REQUEST',
																				                null)); //$_GET['CAT_LINK'];
				                $_REQUEST['cat_filter_cat_link']= \eo\wbc\model\SP_WBC_Router::instance()->set_query_params_formatted( 'to_form_field', 
												                array('prod_cat'), 
												                \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_form_field_raw',
																				                array('prod_cat'),
																				                'REQUEST',
																				                null)); //$_GET['CAT_LINK'];
				            }


				            // ACTIVE_TODO here we need to provide filter_prefix support since now the switch and caegory settings are in the filter sets tab 
				            // 	ACTIVE_TODO it might be challenging to determine the filter_prefix here, so also think about it if it is the right layer here to implement below logic or lets just think about moving it to the filters class layers of the frontend class heirarchy 
				            // 	--	ACTIVE_TODO it seems that Shop_Category_Filter and shortcode filters have no or limited support but lets implement the filter_prefix support everywhere. right now it is noticed at frontend filters form template. 
				            /*ACTIVE_TODO_OC_START
				            hire nid to detarmind navigetd Category in most conseravative way posibul
				            	-- what is the right leyar for this? lats use router class if that is approaite.
				            ACTIVE_TODO_OC_END*/
				            $is_first_root_category = true;
				            $filter_sets = unserialize(wbc()->options->get_option_group('filters_filter_set',"a:0:{}"));
							//wbc()->common->pr($filter_sets);
							if(!empty($filter_sets) and is_array($filter_sets)){
								foreach ($filter_sets as $filter_sets_key => $filter_sets_val) {
									//$filter_sets[$filter_sets_key] = $filter_sets_val['filter_set_name'];
									//if(wbc()->options->get_option('filters_filter_setting','filter_setting_advance_two_tabs')) {

									if ( ( $is_first_root_category and !empty($filter_sets_val['filter_set_two_tabs_first']) ) or
        								(!$is_first_root_category and !empty($filter_sets_val['filter_set_two_tabs_second']))
    									) {
											
						            	$_first_tab_id = $filter_sets_val['filter_set_category']; //wbc()->options->get_option('filters_filter_setting','filter_setting_advance_first_category');
						            	$_first_tab_key = $filter_sets_key; //wbc()->options->get_option('filters_filter_setting','filter_setting_advance_first_tabs');
						            	/*$_second_tab_id = wbc()->options->get_option('filters_filter_setting','filter_setting_advance_second_category');
						            	$_second_tab_key = wbc()->options->get_option('filters_filter_setting','filter_setting_advance_second_tabs');*/

						            	$_current_category_id = false;

						            	if(!empty($_REQUEST[$_first_tab_key])) {
						            		$_current_category_id = $_first_tab_id;
						            	} /*elseif(!empty($_REQUEST[$_second_tab_key])) {			            		
						            		$_current_category_id = $_second_tab_id;
						            	}*/

						            	if(!empty($_current_category_id)) {
						            		
						            		$_current_category_object = wbc()->wc->get_term_by('term_id',$_current_category_id,'product_cat');
						            		if(!empty($_current_category_object) and !is_wp_error($_current_category_object)) {
						            			// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
						            			// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
						            			// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
							            		$_GET['_current_category'] = $_current_category_object->slug;
							                	$_REQUEST['_current_category']= $_current_category_object->slug;

							                	if(!empty($_GET['_category'])){
							                		// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
							                		// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
							                		// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
							                		$_GET['_category'] .= ','.$_current_category_object->slug;
							                		$_REQUEST['_category'] .= ','.$_current_category_object->slug;
							                	} else {
							                		// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
							                		// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
							                		// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
							                		$_GET['_category'] = $_current_category_object->slug;
							                		$_REQUEST['_category'] = $_current_category_object->slug;
							                	}
							                }

							                break;
						            	}
						            }
						            //}
								}
							}				            

				            \eo\wbc\controllers\ajax\Filter::instance()->filter();
				            unset($_GET['eo_wbc_filter']);
				        }
				    /*}
			    });*/
			});


        	add_action('template_redirect',function(){

        		self::instance()->enable_session();        		
        		if(is_front_page()) {
				    \eo\wbc\controllers\publics\pages\Home::instance()->init();

				} elseif(is_shop()) {
			    	\eo\wbc\controllers\publics\pages\Shop::instance()->init();

			    	if(\eo\wbc\controllers\publics\pages\Feed::should_init()) {
			    		\eo\wbc\controllers\publics\pages\Feed::instance()->init();
			    	}

			    } elseif (is_product_category()) {
			        \eo\wbc\controllers\publics\pages\Category::instance()->init();

			        if(\eo\wbc\controllers\publics\pages\Feed::should_init()) {
			    		\eo\wbc\controllers\publics\pages\Feed::instance()->init();
			    	}

			    } elseif(is_product()) {

			    	\eo\wbc\controllers\publics\pages\Product::instance()->init();

			    } elseif(is_page(__('Product Review','woo-bundle-choice'))) {
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
