<?php 
defined( 'ABSPATH' ) || exit;

class WBC_Config {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	// one of the benefit of it is, it loads admin specifi class on admin side only and frontend specific class on frontend only
	public function explicit_class_loader_config( $singleton_functionUpper ) {

		return array(
			'admin'=> array(

				// NOTE: for type dir it is critically important to note that, make sure the dir specified do not have any file that have script execute directly in core php way means when the file included using require once and so on 
				// array( 'type'=>'dir', 'path'=> '' ), 
		 		// array( 'type'=>'file', 'path'=> constant($singleton_functionUpper.'_DIRECTORY')."/application/model/publics/component/sp-cafjkj.php" )
				array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY').'application/system/core/publics/eowbc_base_model_publics.php' ), 

		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/controllers/admin/legacy_admin/legacy-admin.php" ), 

			), 
			'frontend'=> array(

				// NOTE: for type dir it is critically important to note that, make sure the dir specified do not have any file that have script execute directly in core php way means when the file included using require once and so on 
				array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY').'application/system/core/publics/eowbc_base_model_publics.php' ), 

				array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/controllers/publics/variations/sp-gallery-slider.php" ), 
				array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/controllers/publics/variations/sp-gallery-zoom.php" ), 

		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/model/admin/eowbc_model.php" ), 

				// TODO temp . remove it as sun as selectron autolode is updated
				array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."vendor/sphereplugins/selectron/application/controller/publics/Controller.php" ),
				array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."vendor/sphereplugins/selectron/application/controller/publics/container/container.php" ),
				array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."vendor/sphereplugins/selectron/vendor/autoload.php" ),

		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/controllers/publics/feed/loop/selectron/sp-slctrn-swatches-reset-link.php" ),
		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/controllers/publics/feed/loop/selectron/sp-slctrn-swatches-cart-form.php" ),


		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/system/core/sp-ui-builder.php" ),
		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/system/core/sp-page-builder.php" ),

			), 
			'both'=> array(

				array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY').'application/system/core/publics/sp-query.php' ), 

		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/model/publics/component/eowbc_filter_widget.php" ), 
		 		
		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/controllers/extensions-http-handler.php" ), 

		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/model/publics/data_model/sp-wbc-product.php" ), 

		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."application/model/publics/data_model/sp-wbc-data-layer.php" ),

		 		array( 'type'=>'file', 'path'=> constant('EOWBC_DIRECTORY')."/application/model/admin/eowbc_tiny_features.php" ),	 		

			)	

		);
	}

	public function get_all_feature() {
		return array_replace($this->get_features(),$this->get_bonus_features());
	}

	public function get_features() {
		return apply_filters('sp_wbc_features',array(
			'ring_builder'=>'Ring Builder',
			'api_integrations'=>'Diamond APIs Integrations',
			'pair_maker'=>'Pair Maker',
			'guidance_tool'=>'Guidance Tool',
		));
	}

	public function get_bonus_features() {
		return array(			
			'filters_shortcode'=>'Shortcode Filters',
			'filters_shop_cat'=>'Filters for Shop/Category Page',
			'opts_uis_item_page'=>'Options UI for Item Page',
			'spec_view_item_page'=>'Specifications View for Item Page',
			'price_control'=>'Price Control',
		);
	}

	public function get_available_samples() {
		// NOTE: Pair maker sample data is removed because of some serious concerns.
		return array('ring_builder'/*,'pair_maker'*/,'filters_shop_cat');
	}

	public function get_inventory_types() {
		return array(
			'jewelry'=>'Jewelry',
			'clothing'=>'Clothing',
			'home_decor'=>'Home Decor',
			'others'=>'Others'
		);
	} 

	public function get_builders() {
		return array(
			'ring_builder'=>'Ring Builder',
			'pair_maker'=>'Pair Maker',
			'guidance_tool'=>'Guidance Tool',
			'filters_shop_cat'=>'Shop/Category Page'
		);
	}

	public function required_hooks_n_filters_etc() {
		return array(			
			'plugin_slug' => 'woo-bundle-choice', 
			'widget_sections'=>array(
				'category_page' => array(
					'test_slug' => '/product-category/eo_setting_shape_cat', 
					'mandatory' => array(
						array(
							'key' => 'woocommerce_before_main_content', 
							'label' => '', 	//user friendly name (optional)
							'type' => 'filter',	
							'filter_priority_1' => 10,	
							'filter_priority_2' => 1	
						)
					),
					'recommended' => array(
						array(
							'key' => 'woocommerce_before_main_content', 
							'label' => '', 	//user friendly name (optional)
							'type' => 'filter',	
							'filter_priority_1' => 10,	
							'filter_priority_2' => 1	
						)
					)
				), 
				'item_page' => array(
					'test_slug' => '/product-item-page-slug/of-our-sample-data-base-product', 
					'mandatory' => array(
						array(
							'key' => 'woocommerce_before_add_to_cart_button', 
							'label' => '', 	//user friendly name (optional)
							'type' => 'action'	
						)
					),
					'recommended' => array(
						array(
							'key' => 'woocommerce_product_additional_information', 
							'label' => '', 	//user friendly name (optional)
							'type' => 'action',	
							'filter_priority_1' => 10,	
							'filter_priority_2' => 1	
						)
					)
				), 
			)
		);
	}

	public function separator() {
		//	NOTE: it is critically important to note that special characters in this separator had created unknown and un-notified issue in js and dom processing and it is a fact that special characters would create problem in any deep corners of system and the bug may take lot of time to be found. so if required increase the number of underscores in the below separator but using any special characters is not a good idea 
		return "____"; 
	}
	
	public function product_variations_configs(){

		return array( 
			'sp_variations_attributes'=> array( 


			),
			'sp_variations_data_fields'=> array( 

			),
			'sp_variations_swatches_cat_display_limit' => 3,

			'is_gallery_images_type_based_template' => 1,

		);
	}
}
