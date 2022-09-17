<?php 

//	the common global vars -- these common global vars will load before any js layer or even inline javascript of the wbc, extensions and themes 


//	enqueue common assets 
add_action( ( !is_admin() ? 'wp_enqueue_scripts' : 'admin_enqueue_scripts'),function(){

?>

	<script type="text/javascript">
		//	define namespaces 
		window.document.splugins = window.document.splugins || {};
		window.document.splugins.common = window.document.splugins.common || {};
		window.document.splugins.admin = window.document.splugins.admin || {};

		<?php 

		if( is_admin() ){

			?>
			window.document.splugins.admin.is_legacy_admin_page = <?php echo ((apply_filters('sp_is_legacy_admin_page', true)) ? "true" : "false");?>; 
			<?php 
		}

		?>

		window.document.splugins.common.is_category_page = <?php echo ((is_product_category()) ? "true" : "false");?>; 

		window.document.splugins.common.is_item_page = <?php echo ((is_product()) ? "true" : "false");?>;

		window.document.splugins.common.is_mobile = <?php echo ((wbc_is_mobile()) ? "true" : "false");?>;
		
		window.document.splugins.common.is_tablet = <?php echo ((wbc_is_mobile()) ? "true" : "false");?>;
		

	</script>
<?php  
		
	if( is_shop() || is_product_category() || is_product() ) {
	
		// ACTIVE_TODO even though now we are going to use the underscore js but so far it is only by the optionsUI feature so skip loading it here for the rest of features and just put the if condition here for lighter experience to all other users -- to s 
		//	NOTE: below asset will load in footer, so far it is loading from header only because of the chained dependancy on the common js dependancy of the wc-cart variation asset given below 
		wp_enqueue_script('underscore'/*, includes_url('js') . '/underscore.min.js'*/ );	 
		// echo '<script src="'.includes_url('js') . '/underscore.min.js'.'"></script>';
	}

	if (!is_admin()) {
		
		$swatches_configs = array();
		$gallery_images_configs = array();

		$swatches_configs['attribute_types']            = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->sp_variations_swatches_supported_attribute_types(array('is_base_type_only'=>true));
		$swatches_configs['product_variations_configs'] = wbc()->config->product_variations_configs();

	// ACTIVE_TODO admin options need to b loaded from variations.assets.php where b have already prepare all options -- to s 
		$swatches_configs['options'] = array('show_variation_label' => false, 'clickable_out_of_stock' => false);	
		
		$gallery_images_configs['types'] 					  = \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->sp_variations_gallery_images_supported_types(array('is_base_type_only'=>true));
		$gallery_images_configs['product_variations_configs'] = wbc()->config->product_variations_configs();
		

		$gallery_images_configs['base_container_selector']    = '.spui-sp-variations-gallery-images';
		$gallery_images_configs['base_container_loop_selector']    = '.spui-sp-variations-loop-gallery-images';

		$gallery_images_configs['template'] 				  = array('slider'=>array('id'=>'sp_slzm_slider_image_loop'), 'zoom'=>array('id'=>'sp_slzm_zoom_image_loop'));	
		$gallery_images_configs['classes'] 				      = array('slider'=>array('container'=>'sp-variations-gallery-images-slider','loop_container'=>'sp-variations-gallery-images-slider-loop'), 'zoom'=>array('container'=>'sp-variations-gallery-images-zoom'));	

		// ACTIVE_TODO we neet to manage the loding secuance here so that any zoom layers including external plugin implimentetion layers can add filter do it 
		$gallery_images_configs['template']['zoom']['all_in_dom'] = apply_filters('sp_slzm_zoom_template_all_in_dom',0);

		// ----loop---	
		$gallery_images_configs['template_loop'] 				  = array('slider'=>array('id'=>'sp_slzm_loop_slider_image_loop'), 'zoom'=>array('id'=>'sp_slzm_loop_zoom_image_loop'));		
		$gallery_images_configs['classes_loop'] 				      = array('slider'=>array('container'=>'sp-variations-loop-gallery-images-slider','loop_container'=>'sp-variations-loop-gallery-images-slider-loop'), 'zoom'=>array('container'=>'sp-variations-loop-gallery-images-zoom'));		
		// ACTIVE_TODO we neet to manage the loding secuance here so that any zoom layers including external plugin implimentetion layers can add filter do it 	
		$gallery_images_configs['template_loop']['zoom']['all_in_dom'] = apply_filters('sp_slzm_loop_zoom_template_all_in_dom',0);	

		$gallery_images_configs['options'] = array('gallery_reset_on_variation_change'=>false,
																 'tiny_features_option_ui_loop_box_hover_media_index'=>wbc()->options->get_option('tiny_features','tiny_features_option_ui_loop_box_hover_media_index','0'));

		// ACTIVE_TODO asset enque and other asset flows
			// --  first need to confirm that minified asset only are loaded -- to t
			// --  and also that only necesary and partialy build assets are loaded -- to t 
			// --  ned to make the versions dynamic of assets based on plugin, extensions and themes if there is no other versions system to maintan -- to s & -- to h
		// ACTIVE_TODO/TODO when the variations and its child modules are moved out from the below loaded common js then at that time, also move te wc-cart variation dependancy mentioned below 
	
		wbc()->load->asset('js','common',array('jquery','wc-add-to-cart-variation'),"0.1.4",false,true,'common_configs',array('swatches_config'=>$swatches_configs, 'gallery_images_configs'=>$gallery_images_configs),true);
		
	} else {

		wbc()->load->asset('js','common',array('jquery'),"0.1.4",false,true);
	}

}, 999);


add_action('wp_footer',function(){               
   ?>
   <script>
    	jQuery(document).ready(function() {

    		window.document.splugins.wbc.pagination.api.init();

			window.document.splugins.wbc.filters.api.init();

			window.document.splugins.wbc.filter_sets.api.init();

    		if(window.document.splugins.common.is_item_page || window.document.splugins.common.is_category_page) {
    
		        // window.setTimeout(function(){

		            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init();
		            
		        // }, 2500);

			}

        	if(window.document.splugins.common.is_item_page) {

		        // window.setTimeout(function(){

		            // window.document.splugins.wbc.variations.gallery_images.api.init();
		            base_container = jQuery( ( window.document.splugins.common._o( common_configs.gallery_images_configs, 'base_container_selector') ? common_configs.configs.base_container_selector : '.variations_form' ) );      
		            jQuery(base_container).sp_wbc_variations_gallery_images();

		        // },2000);

			}

			if(window.document.splugins.common.is_category_page) {

		        // window.setTimeout(function(){

		            // window.document.splugins.wbc.variations.gallery_images.single_product.api.init();
		            base_container = jQuery( ( window.document.splugins.common._o( common_configs.gallery_images_configs, 'base_container_loop_selector') ? common_configs.configs.base_container_selector : '.variations_form' ) );      
		            jQuery(base_container).sp_wbc_variations_gallery_images_feed_page();

		        // },2000);

			}

     		var base_container_swatches = null;
        	if(window.document.splugins.common.is_item_page) {
			    
		        // window.setTimeout(function(){
		            // window.document.splugins.wbc.variations.swatches.api.init();
		            base_container = jQuery( ( window.document.splugins.common._o( common_configs.swatches_config, 'base_container_selector') ? common_configs.configs.base_container_selector : '.variations_form' ) );      
		            jQuery(base_container).sp_wbc_variations_swatches();

		            base_container_swatches = base_container;

		        // },2000);    
			}

			if(window.document.splugins.common.is_category_page) {
			    
		        // window.setTimeout(function(){

		            // window.document.splugins.wbc.variations.swatches.feed_page.api.init();
		            base_container = jQuery( ( window.document.splugins.common._o( common_configs.swatches_config, 'base_container_loop_selector') ? common_configs.configs.base_container_selector : '.variations_form' ) );      
		            jQuery(base_container).sp_wbc_variations_swatches_feed_page();

		            base_container_swatches = base_container;

		        // },2000);    

			}

			jQuery(base_container_swatches).check_variations();
    	});
   </script>    
  <?php      
}, PHP_INT_MAX);

?>