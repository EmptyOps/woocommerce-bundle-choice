<?php 

//	the common global vars -- these common global vars will load before any js layer or even inline javascript of the wbc, extensions and themes 


$hook = (defined('SP_WBC_ARBU') && constant('SP_WBC_ARBU') === true) ? 'wbc_enqueue_scripts' : 'wp_enqueue_scripts';
aa ajax ringbuilder time karelu hook nu wp ni jgya ae wbc use kariye chhiye.
//	enqueue common assets 
// add_action( ( !is_admin() ? 'wp_enqueue_scripts' : 'admin_enqueue_scripts'),function(){
add_action( ( !is_admin() ? $hook : 'admin_enqueue_scripts'),function(){
//	enqueue common assets 
// add_action( ( !is_admin() ? 'wp_enqueue_scripts' : 'admin_enqueue_scripts'),function(){

// add_action('wbc_enqueue_scripts', function () {
	
	if( wbc()->sanitize->get('is_test') == 1 ) {
		wbc_pr('js_var_is_loaded');
	}

?>

	<script type="text/javascript">
	
		//	define namespaces 
		window.document.splugins = window.document.splugins || {};
		window.document.splugins.common = window.document.splugins.common || {};
		window.document.splugins.admin = window.document.splugins.admin || {};

		<?php 

		if( is_admin() ){

			?>

			window.document.splugins.common.is_admin = <?php echo "true";?>;

			window.document.splugins.admin.is_legacy_admin_page = <?php echo ((apply_filters('sp_is_legacy_admin_page', true)) ? "true" : "false");?>; 
			<?php 
		} else {

			?>
			window.document.splugins.common.is_admin = <?php echo "false";?>;
			<?php
			
		}

		?>

    	window.document.splugins.common.current_theme_key = '<?php echo wbc()->common->current_theme_key(); ?>';
    	
    	window.document.splugins.common.site_url = '<?php echo wbc_site_url(); ?>';

    	window.document.splugins.common.ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';

		window.document.splugins.common.is_shop_page = <?php 
		echo ((is_shop()) ? "true" : "false");?>; 

		— SP_WBC_PSFAR possible to skip for ajax ring builder
		global $wp_query;
		window.document.splugins.common.is_category_page = <?php echo ((is_product_category()) 
				|| (
			        defined('SP_WBC_ARBU')
			        && constant('SP_WBC_ARBU') === true
			        && method_exists($wp_query, 'get_queried_object')
			        && !empty($wp_query->get_queried_object()->term_id)
			        && empty(wbc()->sanitize->get('EO_WBC'))
			    )
			) ? "true" : "false");?>; 
		-- old che and hirenbhai ne batvi ne niche old if kadhi nakhvi.
		window.document.splugins.common.is_item_page = <?php echo ((is_product()) ? "true" : "false");?>;
		— SP_WBC_PSFAR possible to skip for ajax ring builder
		<?php
		global $product;
		?>
		<script>
		    <?php if (is_product() || (defined('SP_WBC_ARBU') && constant('SP_WBC_ARBU') === true)) { ?>
		        
		        <?php if (defined('SP_WBC_ARBU') && constant('SP_WBC_ARBU') === true) { ?>
		            
		            <?php if (defined('SP_WBC_ARBU') && constant('SP_WBC_ARBU') === true && !empty($product) && method_exists($product, 'get_id') && !empty($product->get_id())) { ?>
		                window.document.splugins.common.is_item_page = true;
		            <?php } ?>
		        
		        <?php } else { ?>
		            window.document.splugins.common.is_item_page = true;
		        <?php } ?>
		    
		    <?php } else { ?>
		        window.document.splugins.common.is_item_page = false;
		    <?php } ?>
		</script>


		window.document.splugins.common.is_mobile = <?php echo ((wbc_is_mobile()) ? "true" : "false");?>;
		
		window.document.splugins.common.is_tablet = <?php echo ((wbc_is_mobile()) ? "true" : "false");?>;	

		window.document.splugins.common.ajax_url = '<?php echo admin_url('admin-ajax.php');?>';

		window.document.splugins.common.is_nice_urls_enabled = <?php echo ((wbc_is_nice_urls_enabled()) ? "true" : "false");?>;	

		// window.document.splugins.common.ajax_url = '<?php echo admin_url('admin-ajax.php');?>';	
		
		window.document.splugins.common.is_pair_builder = <?php echo ((wbc()->sanitize->get('EO_WBC') == 1) ? "true" : "false");?>;	

	</script>
<?php  
	
	— SP_WBC_PSFAR possible to skip for ajax ring builder
	global $wp_query;
	if (
	    is_shop()
	    || (
	        is_product_category()
	        || (
	            defined('SP_WBC_ARBU')
	            && constant('SP_WBC_ARBU') === true
	            && method_exists($wp_query, 'get_queried_object')
	            && !empty($wp_query->get_queried_object()->term_id)
	            && empty(wbc()->sanitize->get('EO_WBC'))
	        )
	    )
	    || (
	    	is_product()
	    	|| defined('SP_WBC_ARBU') && constant('SP_WBC_ARBU') === true 
	    )
	) {
    	if (defined('SP_WBC_ARBU') && constant('SP_WBC_ARBU') === true) {
    		
    		global $product;

	    	if (defined('SP_WBC_ARBU') && constant('SP_WBC_ARBU') === true && !empty($product) && method_exists($product, 'get_id') && !empty($product->get_id())) {



	        	// ACTIVE_TODO even though now we are going to use the underscore js but so far it is only by the optionsUI feature so skip loading it here for the rest of features and just put the if condition here for lighter experience to all other users -- to s 
				//	NOTE: below asset will load in footer, so far it is loading from header only because of the chained dependancy on the common js dependancy of the wc-cart variation asset given below 
				wp_enqueue_script('underscore'/*, includes_url('js') . '/underscore.min.js'*/ );	 
				// echo '<script src="'.includes_url('js') . '/underscore.min.js'.'"></script>';
	    	}
    	} else {

			// ACTIVE_TODO even though now we are going to use the underscore js but so far it is only by the optionsUI feature so skip loading it here for the rest of features and just put the if condition here for lighter experience to all other users -- to s 
			//	NOTE: below asset will load in footer, so far it is loading from header only because of the chained dependancy on the common js dependancy of the wc-cart variation asset given below 
			wp_enqueue_script('underscore'/*, includes_url('js') . '/underscore.min.js'*/ );	 
			// echo '<script src="'.includes_url('js') . '/underscore.min.js'.'"></script>';
    	}

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
		

		$gallery_images_configs['base_container_selector']    = '.variations_form'/*'.spui-sp-variations-gallery-images'*/;
		$gallery_images_configs['base_container_loop_selector']    = '.variations_form'; //'.spui-sp-variations-loop-gallery-images';

		// for simple type
		$gallery_images_configs['base_container_selector_simple']    =  '.spui-sp-variations-gallery-images-simple';
		$gallery_images_configs['base_container_loop_selector_simple']    = '.spui-sp-variations-loop-gallery-images-simple';

		$gallery_images_configs['template'] 				  = array('slider'=>array('id'=>'sp_slzm_slider_image_loop'), 'zoom'=>array('id'=>'sp_slzm_zoom_image_loop'));	
		$gallery_images_configs['classes'] 				      = array('slider'=>array('container'=>'sp-variations-gallery-images-slider','loop_container'=>'sp-variations-gallery-images-slider-loop'), 'zoom'=>array('container'=>'sp-variations-gallery-images-zoom'));	

		// ACTIVE_TODO we neet to manage the loding secuance here so that any zoom layers including external plugin implimentetion layers can add filter do it 
		$gallery_images_configs['template']['zoom']['all_in_dom'] = apply_filters('sp_slzm_zoom_template_all_in_dom',0);

		// ----loop---	
		$gallery_images_configs['template_loop'] 				  = array('slider'=>array('id'=>'sp_slzm_loop_slider_image_loop'), 'zoom'=>array('id'=>'sp_slzm_loop_zoom_image_loop'));		
		$gallery_images_configs['classes_loop'] 				      = array('slider'=>array('container'=>'sp-variations-loop-gallery-images-slider','loop_container'=>'sp-variations-loop-gallery-images-slider-loop'), 'zoom'=>array('container'=>/*'sp-variations-loop-gallery-images-zoom'*/'#sp_variations_loop_gallery_images_zoom_{product_id}'));		
		// ACTIVE_TODO we neet to manage the loding secuance here so that any zoom layers including external plugin implimentetion layers can add filter do it 	
		$gallery_images_configs['template_loop']['zoom']['all_in_dom'] = apply_filters('sp_slzm_loop_zoom_template_all_in_dom',0);	

		$gallery_images_configs['options'] = array('gallery_reset_on_variation_change'=>false,
																 'tiny_features_option_ui_loop_box_hover_media_index'=>/*wbc()->options->get_option('tiny_features','tiny_features_option_ui_loop_box_hover_media_index','2')*/apply_filters('ssm_vrtns_loop_box_hover_media_type',wbc()->options->get_option('tiny_features','tiny_features_option_ui_loop_box_hover_media_index','2')));

		// ACTIVE_TODO asset enque and other asset flows
			// --  first need to confirm that minified asset only are loaded -- to t
			// --  and also that only necesary and partialy build assets are loaded -- to t 
			// --  ned to make the versions dynamic of assets based on plugin, extensions and themes if there is no other versions system to maintan -- to s & -- to h
		// ACTIVE_TODO/TODO when the variations and its child modules are moved out from the below loaded common js then at that time, also move te wc-cart variation dependancy mentioned below 
		
		if(!is_front_page()){
			// die("19555");

			// $file_suffix = (defined('WBC_SCRIPT_DEBUG') && WBC_SCRIPT_DEBUG) ? '' : '.min';
			$file_suffix = '';

			$common_config = [
			        'swatches_config'        => $swatches_configs,
			        'gallery_images_configs' => $gallery_images_configs,
			    ];

			    echo "2055555";
			    wbc()->load->asset(
			        'js',
			        'common',
			        array('jquery','wc-add-to-cart-variation'),
			        '0.1.4',             // version (consider using plugin version constant)
			        false,               // (header) or true for footer
			        true,                // assume this flag triggers localization
			        'common_configs',    // JS object name
			        $common_config,      // data array
			        true                 // maybe enqueue or print (as per WBC API)
			    );
			    echo "217777";

			// echo '<script src="' 
			//      . plugins_url('common' . $file_suffix . '.js', __FILE__) 
			//      . '?ver=0.1.4"></script>';


			// echo '<script>
			// window.common_configs = ' . wp_json_encode([
			//     'swatches_config'        => wbc()->config->product_variations_configs(),
			//     'gallery_images_configs' => wbc()->config->product_variations_configs(),
			// ]) . ';
			// </script>';



			// $file_suffix = (WBC_SCRIPT_DEBUG) ? '' : '.min';
			// wbc()->load->asset('js','common'.$file_suffix,array('jquery','wc-add-to-cart-variation'),"0.1.4",false,true,'common_configs',array('swatches_config'=>$swatches_configs, 'gallery_images_configs'=>$gallery_images_configs),true);
		}

		// ACTIVE_TODO temp. hold for removel and we need to remove as soon as we refactore the loading sequance of filter widget class and load asset function og that class. so it is highly temporary. and we need to fix if we face issues whwrw filter feature is not active on certain pages but still that is loading below asset then we need to prevent that also and other such issues.
		global $wp_query;
		— SP_WBC_PSFAR possible to skip for ajax ring builder
		if (( is_shop() || is_product_category() )|| ( defined('SP_WBC_ARBU')&& constant('SP_WBC_ARBU') === true&& method_exists($wp_query, 'get_queried_object')&& !empty($wp_query->get_queried_object()->term_id)&& empty(wbc()->sanitize->get('EO_WBC')))) {

			 $file_suffix = (WBC_SCRIPT_DEBUG) ? '' : '.min';
			 wbc()->load->asset('js', 'publics/eo_wbc_filter'.$file_suffix, array('jquery'), "", false, true, null, null, true);

			// $site_url = get_site_url();
			// $product_url = '';
			// $filter_prefix = '';
			// wbc()->load->asset('js', 'publics/eo_wbc_filter', array( 'eo_wbc_object' => array(
			// 	'eo_product_url'=>$product_url,
			// 	//'eo_view_tabular'=>($current_category=='solitaire'?1:0),
			// 	'disp_regular'=>wbc()->options->get('eo_wbc_e_tabview_status',false)/*get_option('eo_wbc_e_tabview_status',false)*/?1:0,
			// 	'eo_admin_ajax_url'=>admin_url( 'admin-ajax.php'),
			// 	'eo_part_site_url'=>get_site_url().'/index.php',
			// 	'eo_part_end_url'=>'/'.$product_url,
			// 	'eo_cat_site_url'=>$site_url,
			// 	'eo_cat_query'=>http_build_query($_GET),
			// 	'btnfilter_now'=>(empty(wbc()->options->get_option('filters_'.$filter_prefix.'filter_setting','filter_setting_btnfilter_now'))?false:true),
			// 	'btnreset_now'=>(empty(wbc()->options->get_option('filters_'.$filter_prefix.'filter_setting','filter_setting_reset_now'))?false:true),
			// 	'_prefix_' => $filter_prefix,
			// )), "", false, true, null, null, true);
		}
		
	} else {
		if(!is_front_page()){
			$file_suffix = (WBC_SCRIPT_DEBUG) ? '' : '.min';
			wbc()->load->asset('js','common'.$file_suffix,array('jquery'),"0.1.4",false,true);
		}
	}

},( !is_admin() ? 999 : 5) );


add_action('wp_footer',function(){               
   ?>
   	<script>
		console.log('[js.vars.asset wp_footer]');
    	// console.log("js.vras.asset outer ready event");
    	
    	jQuery(document).ready(function() {
    		
			console.log('[js.vars.asset wp_footer] document.ready');

 	 		if(window.document.splugins.common.is_category_page || window.document.splugins.common.is_shop_page) {
 
				console.log('[js.vars.asset wp_footer] is_category_page');
				
				// added on 30-06-2023
				// NOTE: even though we have checked in below script if the eo_wbc_object is not available then it is created but as per the structure we need to skip execution. And till we do not refactor the loading of scripts and execution further we need below if. Ideally we should not load this js file if the filters widget is not rendered on the particular page. 
				if( typeof(eo_wbc_object) != 'undefined'){
	    		
	    			window.document.splugins.wbc.pagination.api.init();
					
					window.document.splugins.wbc.filters.api.init();
					window.document.splugins.wbc.filter_sets.api.init();
	    		}
	    			
			}
			// console.log("[vs] if upper SP_VARIATIONS_LOADED");
<?php
	   		if (defined('SP_VARIATIONS_LOADED') && SP_VARIATIONS_LOADED == true) { ?>

	   			// console.log("[vs] SP_VARIATIONS_LOADED if undr condition chek pachi");

	   			// ACTIVE_TODO we should confirm once and then disable category condition or part below because it seems unnecessary for the category page. or is it necessary for the purple theme loopbox slider? or for the tableview sidebar or popup if it has jQuery slider or zoom? 
	    		if(window.document.splugins.common.is_item_page || window.document.splugins.common.is_category_page) {
	    
			        // window.setTimeout(function(){

							console.log('[js.vars.asset wp_footer] document.ready 01');
			            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init();
							console.log('[js.vars.asset wp_footer] document.ready 02');
			            
			        // }, 2500);

				}

				console.log('[js.vars.asset wp_footer] document.ready 03');

				console.log(window.document.splugins.common.is_item_page);

	        	if(window.document.splugins.common.is_item_page) {
		
					console.log('[js.vars.asset wp_footer] gim');

			        // window.setTimeout(function(){

			            // window.document.splugins.wbc.variations.gallery_images.api.init();
			            base_container = jQuery( ( window.document.splugins.common._o( common_configs.gallery_images_configs, 'base_container_selector') ? common_configs.gallery_images_configs.base_container_selector : '.variations_form' ) );      
			            console.log('[js.vars.asset wp_footer] gim 01');
			            console.log(base_container);
			            jQuery(base_container).sp_wbc_variations_gallery_images();

			            base_container_simple = jQuery( ( window.document.splugins.common._o( common_configs.gallery_images_configs, 'base_container_selector_simple') ? common_configs.gallery_images_configs.base_container_selector_simple : null /*ACTIVE_TODO_OC_START need to update here the base_container_selectore ACTIVE_TODO_OC_END */) );      
			            console.log('[js.vars.asset wp_footer] gim 02');
			            console.log(base_container);
			            
			            jQuery(base_container_simple).sp_wbc_variations_gallery_images({product_type:'simple'});

			        // },2000);


				}

				if(window.document.splugins.common.is_category_page) {

					console.log('[js.vars.asset wp_footer] gim_feed');

			        // window.setTimeout(function(){

			            // window.document.splugins.wbc.variations.gallery_images.feed_page.api.init();

			            var base_container_loop_feed_page = jQuery( ( window.document.splugins.common._o( common_configs.gallery_images_configs, 'base_container_loop_selector') ? common_configs.gallery_images_configs.base_container_loop_selector : '.variations_form' ) );      
							console.log('[js.vars.asset wp_footer] gim_feed variations');
							console.log(base_container_loop_feed_page);
							
			            jQuery(base_container_loop_feed_page).sp_wbc_variations_gallery_images_feed_page();
			            // ACTIVE_TODO_OC_START
					      // ACTIVE_TODO Below ajax complete will have serious issue when the other ajax invokes this function means other than the eowbc js ajax call. So we need to simply bind on the success on render HTML notification simply the eowbs filter HTML notification and remove the ajax complete dependency from here and when that notification is fired inside the subscribe function here we can simply init the required modules. ya so simply put all the code that is the ajaxComplete function into the subscribe function of our notification module. -- to h
					      // 	-- But still it not be inuf because the notification has a base container means host diffidency and that can not be used here because of the uncertainly of that container and even if firing that global notification that is also lead to the same issue for which the base_container based on notification are created. So we simply need to we simply the filter module calling sycuantion and make sure that for the fundamental filter search calls to that main function of filter wrapper or something such of the web, ajax is a being we need to make sure that the fundamental filter event there is only one selector of the container that is used. means we need to diffrenciat this search call of the category page from other search calls that may be happening from the diamond quiz popup, and other such things. And then we can simply use that container selector here -- to h       
				      	// 	--	now after a while to fix some unwanted ajax related bug the index of based url condition is added below, but obviously that is not the intended standard fix since it will prevent some ajax events which we want to let them go inside but they will not be with below condition. so now we need a reliable fix to this whole ajaxComplete problem. actually we should simply rely on the ajaxComplete which we have inside particular jQuery plugin of ours like sp_wbc_variations_swatches or sp_wbc_variations_gallery_images have that. and most probably the community standard must be that otherwise we need to do research on that and figure out the appropriate standard architecture implementation. 
					      // ACTIVE_TODO_OC_END	
					      jQuery(document).ajaxComplete(function (event, request, settings) {
			            	
			            	if(settings.url.indexOf('/product-category/') >= 0){
		
					            base_container_loop_feed_page = jQuery( ( window.document.splugins.common._o( common_configs.gallery_images_configs, 'base_container_loop_selector') ? common_configs.gallery_images_configs.base_container_loop_selector : '.variations_form' ) );      

									console.log('[js.vars.asset wp_footer] gim_feed ajaxComplete variations');
									console.log(jQuery(base_container_loop_feed_page));

				            	jQuery(base_container_loop_feed_page).sp_wbc_variations_gallery_images_feed_page();   
			            	}


					      });

							// console.log('[js.vars.asset wp_footer] gim_feed simple');
			            var base_container_loop_simple_feed_page = jQuery( ( window.document.splugins.common._o( common_configs.gallery_images_configs, 'base_container_loop_selector_simple') ? common_configs.gallery_images_configs.base_container_loop_selector_simple : null /*ACTIVE_TODO_OC_START need to update here the base_container_selectore ACTIVE_TODO_OC_END */) );    
			            var loop_simple_feed_page_options = {product_type:'simple'};
			            jQuery(base_container_loop_simple_feed_page).sp_wbc_variations_gallery_images_feed_page(loop_simple_feed_page_options);
			            // ACTIVE_TODO_OC_START
					      // ACTIVE_TODO Below ajax complete will have serious issue when the other ajax invokes this function means other than the eowbc js ajax call. So we need to simply bind on the success on render HTML notification simply the eowbs filter HTML notification and remove the ajax complete dependency from here and when that notification is fired inside the subscribe function here we can simply init the required modules. ya so simply put all the code that is the ajaxComplete function into the subscribe function of our notification module. -- to h
					      // 	-- But still it not be inuf because the notification has a base container means host diffidency and that can not be used here because of the uncertainly of that container and even if firing that global notification that is also lead to the same issue for which the base_container based on notification are created. So we simply need to we simply the filter module calling sycuantion and make sure that for the fundamental filter search calls to that main function of filter wrapper or something such of the web, ajax is a being we need to make sure that the fundamental filter event there is only one selector of the container that is used. means we need to diffrenciat this search call of the category page from other search calls that may be happening from the diamond quiz popup, and other such things. And then we can simply use that container selector here -- to h       
				      	// 	--	now after a while to fix some unwanted ajax related bug the index of based url condition is added below, but obviously that is not the intended standard fix since it will prevent some ajax events which we want to let them go inside but they will not be with below condition. so now we need a reliable fix to this whole ajaxComplete problem. actually we should simply rely on the ajaxComplete which we have inside particular jQuery plugin of ours like sp_wbc_variations_swatches or sp_wbc_variations_gallery_images have that. and most probably the community standard must be that otherwise we need to do research on that and figure out the appropriate standard architecture implementation. 
					      // ACTIVE_TODO_OC_END	

					      jQuery(document).ajaxComplete(function (event, request, settings) {
			            	
			            	if(settings.url.indexOf('/product-category/') >= 0){
							      // ACTIVE_TODO temp. below setTimeout is temparary. But may be we may like to make this time out setting permanant if 360 flow requirs it.	            
									setTimeout(function(){

										console.log('[js.vars.asset wp_footer] gim_feed ajaxComplete simple');
					         		var base_container_loop_simple_feed_page = jQuery( ( window.document.splugins.common._o( common_configs.gallery_images_configs, 'base_container_loop_selector_simple') ? common_configs.gallery_images_configs.base_container_loop_selector_simple : null /*ACTIVE_TODO_OC_START need to update here the base_container_selectore ACTIVE_TODO_OC_END */) );    

					            	console.log(base_container_loop_simple_feed_page);

						            jQuery(base_container_loop_simple_feed_page).sp_wbc_variations_gallery_images_feed_page(loop_simple_feed_page_options);

									},500);
								}

					      });

			        // },2000);

				}

	     		var base_container_swatches = null;
	        	if(window.document.splugins.common.is_item_page) {
				    	
						// console.log('[js.vars.asset wp_footer] vs');

			        // window.setTimeout(function(){
			            // window.document.splugins.wbc.variations.swatches.api.init();
			            base_container = jQuery( ( window.document.splugins.common._o( common_configs.swatches_config, 'base_container_selector') ? common_configs.swatches_config.base_container_selector : '.variations_form' ) );      
			            jQuery(base_container).sp_wbc_variations_swatches();

			            base_container_swatches = base_container;

			        // },2000);    
				}

				if(window.document.splugins.common.is_category_page) {
				    	
					// console.log('[js.vars.asset wp_footer] vs_feed');

			        // window.setTimeout(function(){

			            // window.document.splugins.wbc.variations.swatches.feed_page.api.init();
			            base_container_loop_feed_page = jQuery( ( window.document.splugins.common._o( common_configs.swatches_config, 'base_container_loop_selector') ? common_configs.swatches_config.base_container_loop_selector : '.variations_form' ) );      
			            jQuery(base_container_loop_feed_page).sp_wbc_variations_swatches_feed_page();
			            // ACTIVE_TODO_OC_START
					      // ACTIVE_TODO Below ajax complete will have serious issue when the other ajax invokes this function means other than the eowbc js ajax call. So we need to simply bind on the success on render HTML notification simply the eowbs filter HTML notification and remove the ajax complete dependency from here and when that notification is fired inside the subscribe function here we can simply init the required modules. ya so simply put all the code that is the ajaxComplete function into the subscribe function of our notification module. -- to h
					      // 	-- But still it not be inuf because the notification has a base container means host diffidency and that can not be used here because of the uncertainly of that container and even if firing that global notification that is also lead to the same issue for which the base_container based on notification are created. So we simply need to we simply the filter module calling sycuantion and make sure that for the fundamental filter search calls to that main function of filter wrapper or something such of the web, ajax is a being we need to make sure that the fundamental filter event there is only one selector of the container that is used. means we need to diffrenciat this search call of the category page from other search calls that may be happening from the diamond quiz popup, and other such things. And then we can simply use that container selector here -- to h       
					      // ACTIVE_TODO_OC_END	 		            
					      jQuery(document).ajaxComplete(function (event, request, settings) {
								
								console.log('[js.vars.asset wp_footer] vs_feed ajaxComplete');
								
								// console.log('[js.vars.asset wp_footer] vs_feed ajaxComplete');
			            	if(settings.url.indexOf('/product-category/') >= 0){
			            		
			            		base_container_loop_feed_page = jQuery( ( window.document.splugins.common._o( common_configs.swatches_config, 'base_container_loop_selector') ? common_configs.swatches_config.base_container_loop_selector : '.variations_form' ) );      
			            		
			            		console.log('[js.vars.asset wp_footer] vs_feed ajaxComplete if');
									console.log(base_container_loop_feed_page);

				            	jQuery(base_container_loop_feed_page).sp_wbc_variations_swatches_feed_page();
			            	}
			            	
					      });

			            base_container_swatches = base_container_loop_feed_page;

			        // },2000);    

				}

				// jQuery(base_container_swatches).check_variations();
					jQuery('.variations_form').trigger('check_variations');

				// ACTIVE_TODO temp. aa code temparary mukelo se variation_form mate @a 
				window.setTimeout(function(){
					/*global wc_add_to_cart_variation_params */
					;(function ( $, window, document, undefined ) {
							console.log('--A_OFF show_variation--');

							/**
							 * VariationForm class which handles variation forms and attributes.
							 */
							var VariationForm = function( $form ) {
								var self = this;
								console.log('A_OFF show_variation [VariationForm]');
								// console.log($form);
								// console.log(this);

								self.$form                = $form;
								self.$attributeFields     = $form.find( '.variations select' );
								self.$singleVariation     = $form.find( '.single_variation' );
								self.$singleVariationWrap = $form.find( '.single_variation_wrap' );
								self.$resetVariations     = $form.find( '.reset_variations' );
								self.$product             = $form.closest( '.product' );
								self.variationData        = $form.data( 'product_variations' );
								self.useAjax              = false === self.variationData;
								self.xhr                  = false;
								self.loading              = true;

								// Initial state.
								self.$singleVariationWrap.show();
								self.$form.off( '.wc-variation-form' );

								// Methods.
								self.getChosenAttributes    = self.getChosenAttributes.bind( self );
								self.findMatchingVariations = self.findMatchingVariations.bind( self );
								self.isMatch                = self.isMatch.bind( self );
								self.toggleResetLink        = self.toggleResetLink.bind( self );

								// Events.
								$form.on( 'click.wc-variation-form', '.reset_variations', { variationForm: self }, self.onReset );
								$form.on( 'reload_product_variations', { variationForm: self }, self.onReload );
								$form.on( 'hide_variation', { variationForm: self }, self.onHide );
								$form.on( 'show_variation', { variationForm: self }, self.onShow );
								$form.on( 'click', '.single_add_to_cart_button', { variationForm: self }, self.onAddToCart );
								$form.on( 'reset_data', { variationForm: self }, self.onResetDisplayedVariation );
								$form.on( 'reset_image', { variationForm: self }, self.onResetImage );
								$form.on( 'change.wc-variation-form', '.variations select', { variationForm: self }, self.onChange );
								$form.on( 'found_variation.wc-variation-form', { variationForm: self }, self.onFoundVariation );
								$form.on( 'check_variations.wc-variation-form', { variationForm: self }, self.onFindVariation );
								$form.on( 'update_variation_values.wc-variation-form', { variationForm: self }, self.onUpdateAttributes );

								// Init after gallery.
								setTimeout( function() {
									$form.trigger( 'check_variations' );
									$form.trigger( 'wc_variation_form', self );
									self.loading = false;
								}, 100 );
							};

							/**
							 * Reset all fields.
							 */
							VariationForm.prototype.onReset = function( event ) {
								event.preventDefault();
								event.data.variationForm.$attributeFields.val( '' ).trigger( 'change' );
								event.data.variationForm.$form.trigger( 'reset_data' );
							};

							/**
							 * Reload variation data from the DOM.
							 */
							VariationForm.prototype.onReload = function( event ) {
								var form           = event.data.variationForm;
								form.variationData = form.$form.data( 'product_variations' );
								// console.log('A_OFF show_variation [onReload]');
								// console.log(form.$form);
								// console.log(form.variationData);
								form.useAjax       = false === form.variationData;
								form.$form.trigger( 'check_variations' );
							};

							/**
							 * When a variation is hidden.
							 */
							VariationForm.prototype.onHide = function( event ) {
								event.preventDefault();
								event.data.variationForm.$form
									.find( '.single_add_to_cart_button' )
									.removeClass( 'wc-variation-is-unavailable' )
									.addClass( 'disabled wc-variation-selection-needed' );
								event.data.variationForm.$form
									.find( '.woocommerce-variation-add-to-cart' )
									.removeClass( 'woocommerce-variation-add-to-cart-enabled' )
									.addClass( 'woocommerce-variation-add-to-cart-disabled' );
							};

							/**
							 * When a variation is shown.
							 */
							VariationForm.prototype.onShow = function( event, variation, purchasable ) {
								event.preventDefault();
								if ( purchasable ) {
									event.data.variationForm.$form
										.find( '.single_add_to_cart_button' )
										.removeClass( 'disabled wc-variation-selection-needed wc-variation-is-unavailable' );
									event.data.variationForm.$form
										.find( '.woocommerce-variation-add-to-cart' )
										.removeClass( 'woocommerce-variation-add-to-cart-disabled' )
										.addClass( 'woocommerce-variation-add-to-cart-enabled' );
								} else {
									event.data.variationForm.$form
										.find( '.single_add_to_cart_button' )
										.removeClass( 'wc-variation-selection-needed' )
										.addClass( 'disabled wc-variation-is-unavailable' );
									event.data.variationForm.$form
										.find( '.woocommerce-variation-add-to-cart' )
										.removeClass( 'woocommerce-variation-add-to-cart-enabled' )
										.addClass( 'woocommerce-variation-add-to-cart-disabled' );
								}

								// If present, the media element library needs initialized on the variation description.
								if ( wp.mediaelement ) {
									event.data.variationForm.$form.find( '.wp-audio-shortcode, .wp-video-shortcode' )
										.not( '.mejs-container' )
										.filter(
											function () {
												return ! $( this ).parent().hasClass( 'mejs-mediaelement' );
											}
										)
										.mediaelementplayer( wp.mediaelement.settings );
								}
							};

							/**
							 * When the cart button is pressed.
							 */
							VariationForm.prototype.onAddToCart = function( event ) {
								if ( $( this ).is('.disabled') ) {
									event.preventDefault();

									if ( $( this ).is('.wc-variation-is-unavailable') ) {
										window.alert( wc_add_to_cart_variation_params.i18n_unavailable_text );
									} else if ( $( this ).is('.wc-variation-selection-needed') ) {
										window.alert( wc_add_to_cart_variation_params.i18n_make_a_selection_text );
									}
								}
							};

							/**
							 * When displayed variation data is reset.
							 */
							VariationForm.prototype.onResetDisplayedVariation = function( event ) {
								var form = event.data.variationForm;
								form.$product.find( '.product_meta' ).find( '.sku' ).wc_reset_content();
								form.$product
									.find( '.product_weight, .woocommerce-product-attributes-item--weight .woocommerce-product-attributes-item__value' )
									.wc_reset_content();
								form.$product
									.find( '.product_dimensions, .woocommerce-product-attributes-item--dimensions .woocommerce-product-attributes-item__value' )
									.wc_reset_content();
								form.$form.trigger( 'reset_image' );
								form.$singleVariation.slideUp( 200 ).trigger( 'hide_variation' );
							};

							/**
							 * When the product image is reset.
							 */
							VariationForm.prototype.onResetImage = function( event ) {
								event.data.variationForm.$form.wc_variations_image_update( false );
							};

							/**
							 * Looks for matching variations for current selected attributes.
							 */
							VariationForm.prototype.onFindVariation = function( event, chosenAttributes ) {
								var form              = event.data.variationForm,
									attributes        = 'undefined' !== typeof chosenAttributes ? chosenAttributes : form.getChosenAttributes(),
									currentAttributes = attributes.data;
								console.log('A_OFF show_variation [onFindVariation]');
								console.log(attributes);

								if ( attributes.count && attributes.count === attributes.chosenCount ) {
									
									console.log('A_OFF show_variation [onFindVariation] 1');
									console.log(form);

									if ( form.useAjax ) {
										

										if ( form.xhr ) {
											form.xhr.abort();
										}
										console.log('A_OFF show_variation [onFindVariation] 1 if');
										console.log(form.$form);
										
										form.$form.block( { message: null, overlayCSS: { background: '#fff', opacity: 0.6 } } );
										currentAttributes.product_id  = parseInt( form.$form.data( 'product_id' ), 10 );
										currentAttributes.custom_data = form.$form.data( 'custom_data' );
										form.xhr                      = $.ajax( {
											url: wc_add_to_cart_variation_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_variation' ),
											type: 'POST',
											data: currentAttributes,
											success: function( variation ) {
												if ( variation ) {
													form.$form.trigger( 'found_variation', [ variation ] );
												} else {
													form.$form.trigger( 'reset_data' );
													attributes.chosenCount = 0;

													if ( ! form.loading ) {
														form.$form
															.find( '.single_variation' )
															.after(
																'<p class="wc-no-matching-variations woocommerce-info">' +
																wc_add_to_cart_variation_params.i18n_no_matching_variations_text +
																'</p>'
															);
														form.$form.find( '.wc-no-matching-variations' ).slideDown( 200 );
													}
												}
											},
											complete: function() {
												form.$form.unblock();
											}
										} );
									} else {

										console.log('A_OFF show_variation [onFindVariation] 1 else');
										console.log(currentAttributes);

										form.$form.trigger( 'update_variation_values' );

										var matching_variations = form.findMatchingVariations( form.variationData, currentAttributes ),
											variation           = matching_variations.shift();

										// console.log('A_OFF show_variation [onFindVariation] 1 else variation');
										// console.log(form.$form);
										// console.log(variation);
										
										if ( variation ) {
											
											// console.log('A_OFF show_variation [onFindVariation] 1 else if');

											form.$form.trigger( 'found_variation', [ variation ] );
										} else {
											form.$form.trigger( 'reset_data' );
											attributes.chosenCount = 0;

											console.log('A_OFF show_variation [onFindVariation] 1 else else');
											console.log(form);
		
											if ( ! form.loading ) {
												console.log('A_OFF show_variation [onFindVariation] 1 else else if');
												form.$form
													.find( '.single_variation' )
													.after(
														'<p class="wc-no-matching-variations woocommerce-info">' +
														wc_add_to_cart_variation_params.i18n_no_matching_variations_text +
														'</p>'
													);
												form.$form.find( '.wc-no-matching-variations' ).slideDown( 200 );
											}
										}
									}
								} else {
									form.$form.trigger( 'update_variation_values' );
									form.$form.trigger( 'reset_data' );
								}

								// Show reset link.
								form.toggleResetLink( attributes.chosenCount > 0 );
							};

							/**
							 * Triggered when a variation has been found which matches all attributes.
							 */
							VariationForm.prototype.onFoundVariation = function( event, variation ) {

								console.log('A_OFF show_variation [onFoundVariation]');

								var form           = event.data.variationForm,
									$sku           = form.$product.find( '.product_meta' ).find( '.sku' ),
									$weight        = form.$product.find(
										'.product_weight, .woocommerce-product-attributes-item--weight .woocommerce-product-attributes-item__value'
									),
									$dimensions    = form.$product.find(
										'.product_dimensions, .woocommerce-product-attributes-item--dimensions .woocommerce-product-attributes-item__value'
									),
									$qty           = form.$singleVariationWrap.find( '.quantity' ),
									purchasable    = true,
									variation_id   = '',
									template       = false,
									$template_html = '';

								if ( variation.sku ) {
									$sku.wc_set_content( variation.sku );
								} else {
									$sku.wc_reset_content();
								}

								if ( variation.weight ) {
									$weight.wc_set_content( variation.weight_html );
								} else {
									$weight.wc_reset_content();
								}

								if ( variation.dimensions ) {
									// Decode HTML entities.
									$dimensions.wc_set_content( $.parseHTML( variation.dimensions_html )[0].data );
								} else {
									$dimensions.wc_reset_content();
								}

								form.$form.wc_variations_image_update( variation );

								if ( ! variation.variation_is_visible ) {
									template = wp_template( 'unavailable-variation-template' );
								} else {
									template     = wp_template( 'variation-template' );
									variation_id = variation.variation_id;
								}

								$template_html = template( {
									variation: variation
								} );
								$template_html = $template_html.replace( '/*<![CDATA[*/', '' );
								$template_html = $template_html.replace( '/*]]>*/', '' );

								form.$singleVariation.html( $template_html );
								form.$form.find( 'input[name="variation_id"], input.variation_id' ).val( variation.variation_id ).trigger( 'change' );

								// Hide or show qty input
								if ( variation.is_sold_individually === 'yes' ) {
									$qty.find( 'input.qty' ).val( '1' ).attr( 'min', '1' ).attr( 'max', '' ).trigger( 'change' );
									$qty.hide();
								} else {

									var $qty_input = $qty.find( 'input.qty' ),
										qty_val    = parseFloat( $qty_input.val() );

									if ( isNaN( qty_val ) ) {
										qty_val = variation.min_qty;
									} else {
										qty_val = qty_val > parseFloat( variation.max_qty ) ? variation.max_qty : qty_val;
										qty_val = qty_val < parseFloat( variation.min_qty ) ? variation.min_qty : qty_val;
									}

									$qty_input.attr( 'min', variation.min_qty ).attr( 'max', variation.max_qty ).val( qty_val ).trigger( 'change' );
									$qty.show();
								}

								// Enable or disable the add to cart button
								if ( ! variation.is_purchasable || ! variation.is_in_stock || ! variation.variation_is_visible ) {
									purchasable = false;
								}

								// Reveal
								if ( form.$singleVariation.text().trim() ) {
			
									// console.log('A_OFF show_variation [onFoundVariation] if');
									// console.log(form.$singleVariation);
				
									form.$singleVariation.slideDown( 200 ).trigger( 'show_variation', [ variation, purchasable ] );
								} else {
									// console.log('A_OFF show_variation [onFoundVariation] else');
									form.$singleVariation.show().trigger( 'show_variation', [ variation, purchasable ] );
								}
							};

							/**
							 * Triggered when an attribute field changes.
							 */
							VariationForm.prototype.onChange = function( event ) {
								var form = event.data.variationForm;

								console.log('A_OFF show_variation [onChange]');
								
								form.$form.find( 'input[name="variation_id"], input.variation_id' ).val( '' ).trigger( 'change' );
								form.$form.find( '.wc-no-matching-variations' ).remove();

								if ( form.useAjax ) {
									form.$form.trigger( 'check_variations' );
								} else {
									form.$form.trigger( 'woocommerce_variation_select_change' );
									form.$form.trigger( 'check_variations' );
								}

								// Custom event for when variation selection has been changed
								form.$form.trigger( 'woocommerce_variation_has_changed' );
							};

							/**
							 * Escape quotes in a string.
							 * @param {string} string
							 * @return {string}
							 */
							VariationForm.prototype.addSlashes = function( string ) {
								string = string.replace( /'/g, '\\\'' );
								string = string.replace( /"/g, '\\\"' );
								return string;
							};

							/**
							 * Updates attributes in the DOM to show valid values.
							 */
							VariationForm.prototype.onUpdateAttributes = function( event ) {
								var form              = event.data.variationForm,
									attributes        = form.getChosenAttributes(),
									currentAttributes = attributes.data;

								if ( form.useAjax ) {
									return;
								}

								// Loop through selects and disable/enable options based on selections.
								form.$attributeFields.each( function( index, el ) {
									var current_attr_select     = $( el ),
										current_attr_name       = current_attr_select.data( 'attribute_name' ) || current_attr_select.attr( 'name' ),
										show_option_none        = $( el ).data( 'show_option_none' ),
										option_gt_filter        = ':gt(0)',
										attached_options_count  = 0,
										new_attr_select         = $( '<select/>' ),
										selected_attr_val       = current_attr_select.val() || '',
										selected_attr_val_valid = true;

									// Reference options set at first.
									if ( ! current_attr_select.data( 'attribute_html' ) ) {
										var refSelect = current_attr_select.clone();

										refSelect.find( 'option' ).removeAttr( 'attached' ).prop( 'disabled', false ).prop( 'selected', false );

										// Legacy data attribute.
										current_attr_select.data(
											'attribute_options',
											refSelect.find( 'option' + option_gt_filter ).get()
										);
										current_attr_select.data( 'attribute_html', refSelect.html() );
									}

									new_attr_select.html( current_attr_select.data( 'attribute_html' ) );

									// The attribute of this select field should not be taken into account when calculating its matching variations:
									// The constraints of this attribute are shaped by the values of the other attributes.
									var checkAttributes = $.extend( true, {}, currentAttributes );

									checkAttributes[ current_attr_name ] = '';

									var variations = form.findMatchingVariations( form.variationData, checkAttributes );
		
									// console.log('A_OFF show_variation [onUpdateAttributes] variations');
									// console.log(variations);

									// Loop through variations.
									for ( var num in variations ) {
										if ( typeof( variations[ num ] ) !== 'undefined' ) {
											var variationAttributes = variations[ num ].attributes;
				
											// console.log('A_OFF show_variation [onUpdateAttributes] loop variationAttributes');
											// console.log(variationAttributes);

											for ( var attr_name in variationAttributes ) {

												// console.log('A_OFF show_variation [onUpdateAttributes] loop variationAttributes loop');

												if ( variationAttributes.hasOwnProperty( attr_name ) ) {

													// console.log('A_OFF show_variation [onUpdateAttributes] loop variationAttributes loop if');

													var attr_val         = variationAttributes[ attr_name ],
														variation_active = '';

													if ( attr_name === current_attr_name ) {

														// console.log('A_OFF show_variation [onUpdateAttributes] loop variationAttributes loop if if');

														if ( variations[ num ].variation_is_active ) {
															
															// console.log('A_OFF show_variation [onUpdateAttributes] loop variationAttributes loop if if if1');

															variation_active = 'enabled';
														}

														if ( attr_val ) {
															
															// console.log('A_OFF show_variation [onUpdateAttributes] loop variationAttributes loop if if if2');

															// Decode entities.
															attr_val = $( '<div/>' ).html( attr_val ).text();

															// Attach to matching options by value. This is done to compare
															// TEXT values rather than any HTML entities.
															var $option_elements = new_attr_select.find( 'option' );
															if ( $option_elements.length ) {
																
																// console.log('A_OFF show_variation [onUpdateAttributes] loop variationAttributes loop if if if2 if');

																for (var i = 0, len = $option_elements.length; i < len; i++) {
																	var $option_element = $( $option_elements[i] ),
																		option_value = $option_element.val();

																	if ( attr_val === option_value ) {
																		$option_element.addClass( 'attached ' + variation_active );
																		break;
																	}
																}
															}
														} else {
															
															// console.log('A_OFF show_variation [onUpdateAttributes] loop variationAttributes loop if if else');

															// Attach all apart from placeholder.
															new_attr_select.find( 'option:gt(0)' ).addClass( 'attached ' + variation_active );
														}
													}
												}
											}
										}
									}

									// Count available options.
									attached_options_count = new_attr_select.find( 'option.attached' ).length;

									// Check if current selection is in attached options.
									if ( selected_attr_val ) {
										selected_attr_val_valid = false;

										if ( 0 !== attached_options_count ) {
											new_attr_select.find( 'option.attached.enabled' ).each( function() {
												var option_value = $( this ).val();

												if ( selected_attr_val === option_value ) {
													selected_attr_val_valid = true;
													return false; // break.
												}
											});
										}
									}

									// Detach the placeholder if:
									// - Valid options exist.
									// - The current selection is non-empty.
									// - The current selection is valid.
									// - Placeholders are not set to be permanently visible.
									if ( attached_options_count > 0 && selected_attr_val && selected_attr_val_valid && ( 'no' === show_option_none ) ) {
										new_attr_select.find( 'option:first' ).remove();
										option_gt_filter = '';
									}

									// Detach unattached.
									new_attr_select.find( 'option' + option_gt_filter + ':not(.attached)' ).remove();

	// if(false){
									// Finally, copy to DOM and set value.
									current_attr_select.html( new_attr_select.html() );
	// }
									current_attr_select.find( 'option' + option_gt_filter + ':not(.enabled)' ).prop( 'disabled', true );

									// Choose selected value.
									if ( selected_attr_val ) {
										// If the previously selected value is no longer available, fall back to the placeholder (it's going to be there).
										if ( selected_attr_val_valid ) {
											current_attr_select.val( selected_attr_val );
										} else {
											current_attr_select.val( '' ).trigger( 'change' );
										}
									} else {
										current_attr_select.val( '' ); // No change event to prevent infinite loop.
									}
								});

								// Custom event for when variations have been updated.
								form.$form.trigger( 'woocommerce_update_variation_values' );
							};

							/**
							 * Get chosen attributes from form.
							 * @return array
							 */
							VariationForm.prototype.getChosenAttributes = function() {
								var data   = {};
								var count  = 0;
								var chosen = 0;

								console.log('A_OFF show_variation [getChosenAttributes]');
								console.log(this.$attributeFields);
								console.log(this);

								this.$attributeFields.each( function() {
									var attribute_name = $( this ).data( 'attribute_name' ) || $( this ).attr( 'name' );
									var value          = $( this ).val() || '';

									console.log('A_OFF show_variation [getChosenAttributes] loop');
									console.log(value);

									if ( value.length > 0 ) {
										chosen ++;
									}

									count ++;
									data[ attribute_name ] = value;
								});

								return {
									'count'      : count,
									'chosenCount': chosen,
									'data'       : data
								};
							};

							/**
							 * Find matching variations for attributes.
							 */
							VariationForm.prototype.findMatchingVariations = function( variations, attributes ) {
								var matching = [];
								for ( var i = 0; i < variations.length; i++ ) {
									var variation = variations[i];

									if ( this.isMatch( variation.attributes, attributes ) ) {
										matching.push( variation );
									}
								}
								return matching;
							};

							/**
							 * See if attributes match.
							 * @return {Boolean}
							 */
							VariationForm.prototype.isMatch = function( variation_attributes, attributes ) {
								// console.log('A_OFF show_variation [isMatch]');
								// console.log(variation_attributes);
								var match = true;
								for ( var attr_name in variation_attributes ) {
									
									// console.log('A_OFF show_variation [isMatch] loop');
									// console.log(variation_attributes);
									// console.log(attr_name);

									if ( variation_attributes.hasOwnProperty( attr_name ) ) {
										var val1 = variation_attributes[ attr_name ];
										var val2 = attributes[ attr_name ];
										
										// console.log('A_OFF show_variation [isMatch] loop if');
										// console.log(val1);

										if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {
											match = false;
										}
									}
								}
								return match;
							};

							/**
							 * Show or hide the reset link.
							 */
							VariationForm.prototype.toggleResetLink = function( on ) {
								if ( on ) {
									if ( this.$resetVariations.css( 'visibility' ) === 'hidden' ) {
										this.$resetVariations.css( 'visibility', 'visible' ).hide().fadeIn();
									}
								} else {
									this.$resetVariations.css( 'visibility', 'hidden' );
								}
							};

							/**
							 * Function to call wc_variation_form on jquery selector.
							 */
							$.fn.wc_variation_form = function() {
								
								console.log('A_OFF show_variation [wc_variation_form]');
								console.log(this);

								new VariationForm( this );
								return this;
							};

							/**
							 * Stores the default text for an element so it can be reset later
							 */
							$.fn.wc_set_content = function( content ) {
								if ( undefined === this.attr( 'data-o_content' ) ) {
									this.attr( 'data-o_content', this.text() );
								}
								this.text( content );
							};

							/**
							 * Stores the default text for an element so it can be reset later
							 */
							$.fn.wc_reset_content = function() {
								if ( undefined !== this.attr( 'data-o_content' ) ) {
									this.text( this.attr( 'data-o_content' ) );
								}
							};

							/**
							 * Stores a default attribute for an element so it can be reset later
							 */
							$.fn.wc_set_variation_attr = function( attr, value ) {
								if ( undefined === this.attr( 'data-o_' + attr ) ) {
									this.attr( 'data-o_' + attr, ( ! this.attr( attr ) ) ? '' : this.attr( attr ) );
								}
								if ( false === value ) {
									this.removeAttr( attr );
								} else {
									this.attr( attr, value );
								}
							};

							/**
							 * Reset a default attribute for an element so it can be reset later
							 */
							$.fn.wc_reset_variation_attr = function( attr ) {
								if ( undefined !== this.attr( 'data-o_' + attr ) ) {
									this.attr( attr, this.attr( 'data-o_' + attr ) );
								}
							};

							/**
							 * Reset the slide position if the variation has a different image than the current one
							 */
							$.fn.wc_maybe_trigger_slide_position_reset = function( variation ) {
								var $form                = $( this ),
									$product             = $form.closest( '.product' ),
									$product_gallery     = $product.find( '.images' ),
									reset_slide_position = false,
									new_image_id         = ( variation && variation.image_id ) ? variation.image_id : '';

								if ( $form.attr( 'current-image' ) !== new_image_id ) {
									reset_slide_position = true;
								}

								$form.attr( 'current-image', new_image_id );

								if ( reset_slide_position ) {
									$product_gallery.trigger( 'woocommerce_gallery_reset_slide_position' );
								}
							};

							/**
							 * Sets product images for the chosen variation
							 */
							$.fn.wc_variations_image_update = function( variation ) {
								var $form             = this,
									$product          = $form.closest( '.product' ),
									$product_gallery  = $product.find( '.images' ),
									$gallery_nav      = $product.find( '.flex-control-nav' ),
									$gallery_img      = $gallery_nav.find( 'li:eq(0) img' ),
									$product_img_wrap = $product_gallery
										.find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' )
										.eq( 0 ),
									$product_img      = $product_img_wrap.find( '.wp-post-image' ),
									$product_link     = $product_img_wrap.find( 'a' ).eq( 0 );

								if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
									// See if the gallery has an image with the same original src as the image we want to switch to.
									var galleryHasImage = $gallery_nav.find( 'li img[data-o_src="' + variation.image.gallery_thumbnail_src + '"]' ).length > 0;

									// If the gallery has the image, reset the images. We'll scroll to the correct one.
									if ( galleryHasImage ) {
										$form.wc_variations_image_reset();
									}

									// See if gallery has a matching image we can slide to.
									var slideToImage = $gallery_nav.find( 'li img[src="' + variation.image.gallery_thumbnail_src + '"]' );

									if ( slideToImage.length > 0 ) {
										slideToImage.trigger( 'click' );
										$form.attr( 'current-image', variation.image_id );
										window.setTimeout( function() {
											$( window ).trigger( 'resize' );
											$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );
										}, 20 );
										return;
									}

									$product_img.wc_set_variation_attr( 'src', variation.image.src );
									$product_img.wc_set_variation_attr( 'height', variation.image.src_h );
									$product_img.wc_set_variation_attr( 'width', variation.image.src_w );
									$product_img.wc_set_variation_attr( 'srcset', variation.image.srcset );
									$product_img.wc_set_variation_attr( 'sizes', variation.image.sizes );
									$product_img.wc_set_variation_attr( 'title', variation.image.title );
									$product_img.wc_set_variation_attr( 'data-caption', variation.image.caption );
									$product_img.wc_set_variation_attr( 'alt', variation.image.alt );
									$product_img.wc_set_variation_attr( 'data-src', variation.image.full_src );
									$product_img.wc_set_variation_attr( 'data-large_image', variation.image.full_src );
									$product_img.wc_set_variation_attr( 'data-large_image_width', variation.image.full_src_w );
									$product_img.wc_set_variation_attr( 'data-large_image_height', variation.image.full_src_h );
									$product_img_wrap.wc_set_variation_attr( 'data-thumb', variation.image.src );
									$gallery_img.wc_set_variation_attr( 'src', variation.image.gallery_thumbnail_src );
									$product_link.wc_set_variation_attr( 'href', variation.image.full_src );
								} else {
									$form.wc_variations_image_reset();
								}

								window.setTimeout( function() {
									$( window ).trigger( 'resize' );
									$form.wc_maybe_trigger_slide_position_reset( variation );
									$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );
								}, 20 );
							};

							/**
							 * Reset main image to defaults.
							 */
							$.fn.wc_variations_image_reset = function() {
								var $form             = this,
									$product          = $form.closest( '.product' ),
									$product_gallery  = $product.find( '.images' ),
									$gallery_nav      = $product.find( '.flex-control-nav' ),
									$gallery_img      = $gallery_nav.find( 'li:eq(0) img' ),
									$product_img_wrap = $product_gallery
										.find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' )
										.eq( 0 ),
									$product_img      = $product_img_wrap.find( '.wp-post-image' ),
									$product_link     = $product_img_wrap.find( 'a' ).eq( 0 );

								$product_img.wc_reset_variation_attr( 'src' );
								$product_img.wc_reset_variation_attr( 'width' );
								$product_img.wc_reset_variation_attr( 'height' );
								$product_img.wc_reset_variation_attr( 'srcset' );
								$product_img.wc_reset_variation_attr( 'sizes' );
								$product_img.wc_reset_variation_attr( 'title' );
								$product_img.wc_reset_variation_attr( 'data-caption' );
								$product_img.wc_reset_variation_attr( 'alt' );
								$product_img.wc_reset_variation_attr( 'data-src' );
								$product_img.wc_reset_variation_attr( 'data-large_image' );
								$product_img.wc_reset_variation_attr( 'data-large_image_width' );
								$product_img.wc_reset_variation_attr( 'data-large_image_height' );
								$product_img_wrap.wc_reset_variation_attr( 'data-thumb' );
								$gallery_img.wc_reset_variation_attr( 'src' );
								$product_link.wc_reset_variation_attr( 'href' );
							};

							$(function() {
								// console.log('A_OFF wc_add_to_cart_variation_params');
								// console.log(wc_add_to_cart_variation_params);
								if ( typeof wc_add_to_cart_variation_params !== 'undefined' ) {
									$( '.variations_form' ).each( function() {
										// console.log('A_OFF show_variation [load] loop');
										// console.log(this);
										$( this ).wc_variation_form();
									});
								}
							});

							/**
							 * Matches inline variation objects to chosen attributes
							 * @deprecated 2.6.9
							 * @type {Object}
							 */
							var wc_variation_form_matcher = {
								find_matching_variations: function( product_variations, settings ) {
									var matching = [];
									for ( var i = 0; i < product_variations.length; i++ ) {
										var variation    = product_variations[i];

										if ( wc_variation_form_matcher.variations_match( variation.attributes, settings ) ) {
											matching.push( variation );
										}
									}
									return matching;
								},
								variations_match: function( attrs1, attrs2 ) {
									var match = true;
									for ( var attr_name in attrs1 ) {
										if ( attrs1.hasOwnProperty( attr_name ) ) {
											var val1 = attrs1[ attr_name ];
											var val2 = attrs2[ attr_name ];
											if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {
												match = false;
											}
										}
									}
									return match;
								}
							};

							/**
							 * Avoids using wp.template where possible in order to be CSP compliant.
							 * wp.template uses internally eval().
							 * @param {string} templateId
							 * @return {Function}
							 */
							var wp_template = function( templateId ) {
								var html = document.getElementById( 'tmpl-' + templateId ).textContent;
								var hard = false;
								// any <# #> interpolate (evaluate).
								hard = hard || /<#\s?data\./.test( html );
								// any data that is NOT data.variation.
								hard = hard || /{{{?\s?data\.(?!variation\.).+}}}?/.test( html );
								// any data access deeper than 1 level e.g.
								// data.variation.object.item
								// data.variation.object['item']
								// data.variation.array[0]
								hard = hard || /{{{?\s?data\.variation\.[\w-]*[^\s}]/.test ( html );
								if ( hard ) {
									return wp.template( templateId );
								}
								return function template ( data ) {
									var variation = data.variation || {};
									return html.replace( /({{{?)\s?data\.variation\.([\w-]*)\s?(}}}?)/g, function( _, open, key, close ) {
										// Error in the format, ignore.
										if ( open.length !== close.length ) {
											return '';
										}
										var replacement = variation[ key ] || '';
										// {{{ }}} => interpolate (unescaped).
										// {{  }}  => interpolate (escaped).
										// https://codex.wordpress.org/Javascript_Reference/wp.template
										if ( open.length === 2 ) {
											return window.escape( replacement );
										}
										return replacement;
									});
								};
							};

						})( jQuery, window, document );
				},1000);

		      	jQuery(document).ajaxComplete(function (event, request, settings) {

					if(settings.url.indexOf('/product-category/') >= 0){

						window.setTimeout(function(){
							/*global wc_add_to_cart_variation_params */
							;(function ( $, window, document, undefined ) {
								console.log('--A_ON show_variation--');
								/**
								 * VariationForm class which handles variation forms and attributes.
								 */
								var VariationForm = function( $form ) {
									var self = this;
									console.log('A_ON show_variation [VariationForm]');
									// console.log($form);
									// console.log(this);

									self.$form                = $form;
									self.$attributeFields     = $form.find( '.variations select' );
									self.$singleVariation     = $form.find( '.single_variation' );
									self.$singleVariationWrap = $form.find( '.single_variation_wrap' );
									self.$resetVariations     = $form.find( '.reset_variations' );
									self.$product             = $form.closest( '.product' );
									self.variationData        = $form.data( 'product_variations' );
									self.useAjax              = false === self.variationData;
									self.xhr                  = false;
									self.loading              = true;

									// Initial state.
									self.$singleVariationWrap.show();
									self.$form.off( '.wc-variation-form' );

									// Methods.
									self.getChosenAttributes    = self.getChosenAttributes.bind( self );
									self.findMatchingVariations = self.findMatchingVariations.bind( self );
									self.isMatch                = self.isMatch.bind( self );
									self.toggleResetLink        = self.toggleResetLink.bind( self );

									// Events.
									$form.on( 'click.wc-variation-form', '.reset_variations', { variationForm: self }, self.onReset );
									$form.on( 'reload_product_variations', { variationForm: self }, self.onReload );
									$form.on( 'hide_variation', { variationForm: self }, self.onHide );
									$form.on( 'show_variation', { variationForm: self }, self.onShow );
									$form.on( 'click', '.single_add_to_cart_button', { variationForm: self }, self.onAddToCart );
									$form.on( 'reset_data', { variationForm: self }, self.onResetDisplayedVariation );
									$form.on( 'reset_image', { variationForm: self }, self.onResetImage );
									$form.on( 'change.wc-variation-form', '.variations select', { variationForm: self }, self.onChange );
									$form.on( 'found_variation.wc-variation-form', { variationForm: self }, self.onFoundVariation );
									$form.on( 'check_variations.wc-variation-form', { variationForm: self }, self.onFindVariation );
									$form.on( 'update_variation_values.wc-variation-form', { variationForm: self }, self.onUpdateAttributes );

									// Init after gallery.
									setTimeout( function() {
										$form.trigger( 'check_variations' );
										$form.trigger( 'wc_variation_form', self );
										self.loading = false;
									}, 100 );
								};

								/**
								 * Reset all fields.
								 */
								VariationForm.prototype.onReset = function( event ) {
									event.preventDefault();
									event.data.variationForm.$attributeFields.val( '' ).trigger( 'change' );
									event.data.variationForm.$form.trigger( 'reset_data' );
								};

								/**
								 * Reload variation data from the DOM.
								 */
								VariationForm.prototype.onReload = function( event ) {
									var form           = event.data.variationForm;
									form.variationData = form.$form.data( 'product_variations' );
									// console.log('A_ON show_variation [onReload]');
									// console.log(form.$form);
									// console.log(form.variationData);
									form.useAjax       = false === form.variationData;
									form.$form.trigger( 'check_variations' );
								};

								/**
								 * When a variation is hidden.
								 */
								VariationForm.prototype.onHide = function( event ) {
									event.preventDefault();
									event.data.variationForm.$form
										.find( '.single_add_to_cart_button' )
										.removeClass( 'wc-variation-is-unavailable' )
										.addClass( 'disabled wc-variation-selection-needed' );
									event.data.variationForm.$form
										.find( '.woocommerce-variation-add-to-cart' )
										.removeClass( 'woocommerce-variation-add-to-cart-enabled' )
										.addClass( 'woocommerce-variation-add-to-cart-disabled' );
								};

								/**
								 * When a variation is shown.
								 */
								VariationForm.prototype.onShow = function( event, variation, purchasable ) {
									event.preventDefault();
									if ( purchasable ) {
										event.data.variationForm.$form
											.find( '.single_add_to_cart_button' )
											.removeClass( 'disabled wc-variation-selection-needed wc-variation-is-unavailable' );
										event.data.variationForm.$form
											.find( '.woocommerce-variation-add-to-cart' )
											.removeClass( 'woocommerce-variation-add-to-cart-disabled' )
											.addClass( 'woocommerce-variation-add-to-cart-enabled' );
									} else {
										event.data.variationForm.$form
											.find( '.single_add_to_cart_button' )
											.removeClass( 'wc-variation-selection-needed' )
											.addClass( 'disabled wc-variation-is-unavailable' );
										event.data.variationForm.$form
											.find( '.woocommerce-variation-add-to-cart' )
											.removeClass( 'woocommerce-variation-add-to-cart-enabled' )
											.addClass( 'woocommerce-variation-add-to-cart-disabled' );
									}

									// If present, the media element library needs initialized on the variation description.
									if ( wp.mediaelement ) {
										event.data.variationForm.$form.find( '.wp-audio-shortcode, .wp-video-shortcode' )
											.not( '.mejs-container' )
											.filter(
												function () {
													return ! $( this ).parent().hasClass( 'mejs-mediaelement' );
												}
											)
											.mediaelementplayer( wp.mediaelement.settings );
									}
								};

								/**
								 * When the cart button is pressed.
								 */
								VariationForm.prototype.onAddToCart = function( event ) {
									if ( $( this ).is('.disabled') ) {
										event.preventDefault();

										if ( $( this ).is('.wc-variation-is-unavailable') ) {
											window.alert( wc_add_to_cart_variation_params.i18n_unavailable_text );
										} else if ( $( this ).is('.wc-variation-selection-needed') ) {
											window.alert( wc_add_to_cart_variation_params.i18n_make_a_selection_text );
										}
									}
								};

								/**
								 * When displayed variation data is reset.
								 */
								VariationForm.prototype.onResetDisplayedVariation = function( event ) {
									var form = event.data.variationForm;
									form.$product.find( '.product_meta' ).find( '.sku' ).wc_reset_content();
									form.$product
										.find( '.product_weight, .woocommerce-product-attributes-item--weight .woocommerce-product-attributes-item__value' )
										.wc_reset_content();
									form.$product
										.find( '.product_dimensions, .woocommerce-product-attributes-item--dimensions .woocommerce-product-attributes-item__value' )
										.wc_reset_content();
									form.$form.trigger( 'reset_image' );
									form.$singleVariation.slideUp( 200 ).trigger( 'hide_variation' );
								};

								/**
								 * When the product image is reset.
								 */
								VariationForm.prototype.onResetImage = function( event ) {
									event.data.variationForm.$form.wc_variations_image_update( false );
								};

								/**
								 * Looks for matching variations for current selected attributes.
								 */
								VariationForm.prototype.onFindVariation = function( event, chosenAttributes ) {
									var form              = event.data.variationForm,
										attributes        = 'undefined' !== typeof chosenAttributes ? chosenAttributes : form.getChosenAttributes(),
										currentAttributes = attributes.data;
									console.log('A_ON show_variation [onFindVariation]');
									console.log(attributes);

									if ( attributes.count && attributes.count === attributes.chosenCount ) {
										
										console.log('A_ON show_variation [onFindVariation] 1');

										if ( form.useAjax ) {
											
											console.log('A_ON show_variation [onFindVariation] 1 if');

											if ( form.xhr ) {
												form.xhr.abort();
											}
											form.$form.block( { message: null, overlayCSS: { background: '#fff', opacity: 0.6 } } );
											currentAttributes.product_id  = parseInt( form.$form.data( 'product_id' ), 10 );
											currentAttributes.custom_data = form.$form.data( 'custom_data' );
											form.xhr                      = $.ajax( {
												url: wc_add_to_cart_variation_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_variation' ),
												type: 'POST',
												data: currentAttributes,
												success: function( variation ) {
													if ( variation ) {
														form.$form.trigger( 'found_variation', [ variation ] );
													} else {
														form.$form.trigger( 'reset_data' );
														attributes.chosenCount = 0;

														if ( ! form.loading ) {
															form.$form
																.find( '.single_variation' )
																.after(
																	'<p class="wc-no-matching-variations woocommerce-info">' +
																	wc_add_to_cart_variation_params.i18n_no_matching_variations_text +
																	'</p>'
																);
															form.$form.find( '.wc-no-matching-variations' ).slideDown( 200 );
														}
													}
												},
												complete: function() {
													form.$form.unblock();
												}
											} );
										} else {

											console.log('A_ON show_variation [onFindVariation] 1 else');

											form.$form.trigger( 'update_variation_values' );

											var matching_variations = form.findMatchingVariations( form.variationData, currentAttributes ),
												variation           = matching_variations.shift();

											// console.log('A_ON show_variation [onFindVariation] 1 else variation');
											// console.log(form.$form);
											// console.log(variation);
											
											if ( variation ) {
												
												// console.log('A_ON show_variation [onFindVariation] 1 else if');

												form.$form.trigger( 'found_variation', [ variation ] );
											} else {
												form.$form.trigger( 'reset_data' );
												attributes.chosenCount = 0;

												if ( ! form.loading ) {
													form.$form
														.find( '.single_variation' )
														.after(
															'<p class="wc-no-matching-variations woocommerce-info">' +
															wc_add_to_cart_variation_params.i18n_no_matching_variations_text +
															'</p>'
														);
													form.$form.find( '.wc-no-matching-variations' ).slideDown( 200 );
												}
											}
										}
									} else {
										form.$form.trigger( 'update_variation_values' );
										form.$form.trigger( 'reset_data' );
									}

									// Show reset link.
									form.toggleResetLink( attributes.chosenCount > 0 );
								};

								/**
								 * Triggered when a variation has been found which matches all attributes.
								 */
								VariationForm.prototype.onFoundVariation = function( event, variation ) {

									console.log('A_ON show_variation [onFoundVariation]');

									var form           = event.data.variationForm,
										$sku           = form.$product.find( '.product_meta' ).find( '.sku' ),
										$weight        = form.$product.find(
											'.product_weight, .woocommerce-product-attributes-item--weight .woocommerce-product-attributes-item__value'
										),
										$dimensions    = form.$product.find(
											'.product_dimensions, .woocommerce-product-attributes-item--dimensions .woocommerce-product-attributes-item__value'
										),
										$qty           = form.$singleVariationWrap.find( '.quantity' ),
										purchasable    = true,
										variation_id   = '',
										template       = false,
										$template_html = '';

									if ( variation.sku ) {
										$sku.wc_set_content( variation.sku );
									} else {
										$sku.wc_reset_content();
									}

									if ( variation.weight ) {
										$weight.wc_set_content( variation.weight_html );
									} else {
										$weight.wc_reset_content();
									}

									if ( variation.dimensions ) {
										// Decode HTML entities.
										$dimensions.wc_set_content( $.parseHTML( variation.dimensions_html )[0].data );
									} else {
										$dimensions.wc_reset_content();
									}

									form.$form.wc_variations_image_update( variation );

									if ( ! variation.variation_is_visible ) {
										template = wp_template( 'unavailable-variation-template' );
									} else {
										template     = wp_template( 'variation-template' );
										variation_id = variation.variation_id;
									}

									$template_html = template( {
										variation: variation
									} );
									$template_html = $template_html.replace( '/*<![CDATA[*/', '' );
									$template_html = $template_html.replace( '/*]]>*/', '' );

									form.$singleVariation.html( $template_html );
									form.$form.find( 'input[name="variation_id"], input.variation_id' ).val( variation.variation_id ).trigger( 'change' );

									// Hide or show qty input
									if ( variation.is_sold_individually === 'yes' ) {
										$qty.find( 'input.qty' ).val( '1' ).attr( 'min', '1' ).attr( 'max', '' ).trigger( 'change' );
										$qty.hide();
									} else {

										var $qty_input = $qty.find( 'input.qty' ),
											qty_val    = parseFloat( $qty_input.val() );

										if ( isNaN( qty_val ) ) {
											qty_val = variation.min_qty;
										} else {
											qty_val = qty_val > parseFloat( variation.max_qty ) ? variation.max_qty : qty_val;
											qty_val = qty_val < parseFloat( variation.min_qty ) ? variation.min_qty : qty_val;
										}

										$qty_input.attr( 'min', variation.min_qty ).attr( 'max', variation.max_qty ).val( qty_val ).trigger( 'change' );
										$qty.show();
									}

									// Enable or disable the add to cart button
									if ( ! variation.is_purchasable || ! variation.is_in_stock || ! variation.variation_is_visible ) {
										purchasable = false;
									}

									// Reveal
									if ( form.$singleVariation.text().trim() ) {
				
										// console.log('A_ON show_variation [onFoundVariation] if');
										// console.log(form.$singleVariation);
					
										form.$singleVariation.slideDown( 200 ).trigger( 'show_variation', [ variation, purchasable ] );
									} else {
										// console.log('A_ON show_variation [onFoundVariation] else');
										form.$singleVariation.show().trigger( 'show_variation', [ variation, purchasable ] );
									}
								};

								/**
								 * Triggered when an attribute field changes.
								 */
								VariationForm.prototype.onChange = function( event ) {
									var form = event.data.variationForm;

									form.$form.find( 'input[name="variation_id"], input.variation_id' ).val( '' ).trigger( 'change' );
									form.$form.find( '.wc-no-matching-variations' ).remove();

									if ( form.useAjax ) {
										form.$form.trigger( 'check_variations' );
									} else {
										form.$form.trigger( 'woocommerce_variation_select_change' );
										form.$form.trigger( 'check_variations' );
									}

									// Custom event for when variation selection has been changed
									form.$form.trigger( 'woocommerce_variation_has_changed' );
								};

								/**
								 * Escape quotes in a string.
								 * @param {string} string
								 * @return {string}
								 */
								VariationForm.prototype.addSlashes = function( string ) {
									string = string.replace( /'/g, '\\\'' );
									string = string.replace( /"/g, '\\\"' );
									return string;
								};

								/**
								 * Updates attributes in the DOM to show valid values.
								 */
								VariationForm.prototype.onUpdateAttributes = function( event ) {
									var form              = event.data.variationForm,
										attributes        = form.getChosenAttributes(),
										currentAttributes = attributes.data;

									if ( form.useAjax ) {
										return;
									}

									// Loop through selects and disable/enable options based on selections.
									form.$attributeFields.each( function( index, el ) {
										var current_attr_select     = $( el ),
											current_attr_name       = current_attr_select.data( 'attribute_name' ) || current_attr_select.attr( 'name' ),
											show_option_none        = $( el ).data( 'show_option_none' ),
											option_gt_filter        = ':gt(0)',
											attached_options_count  = 0,
											new_attr_select         = $( '<select/>' ),
											selected_attr_val       = current_attr_select.val() || '',
											selected_attr_val_valid = true;

										// Reference options set at first.
										if ( ! current_attr_select.data( 'attribute_html' ) ) {
											var refSelect = current_attr_select.clone();

											refSelect.find( 'option' ).removeAttr( 'attached' ).prop( 'disabled', false ).prop( 'selected', false );

											// Legacy data attribute.
											current_attr_select.data(
												'attribute_options',
												refSelect.find( 'option' + option_gt_filter ).get()
											);
											current_attr_select.data( 'attribute_html', refSelect.html() );
										}

										new_attr_select.html( current_attr_select.data( 'attribute_html' ) );

										// The attribute of this select field should not be taken into account when calculating its matching variations:
										// The constraints of this attribute are shaped by the values of the other attributes.
										var checkAttributes = $.extend( true, {}, currentAttributes );

										checkAttributes[ current_attr_name ] = '';

										var variations = form.findMatchingVariations( form.variationData, checkAttributes );
			
										// console.log('A_ON show_variation [onUpdateAttributes] variations');
										// console.log(variations);

										// Loop through variations.
										for ( var num in variations ) {
											if ( typeof( variations[ num ] ) !== 'undefined' ) {
												var variationAttributes = variations[ num ].attributes;
					
												// console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes');
												// console.log(variationAttributes);

												for ( var attr_name in variationAttributes ) {

													// console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop');

													if ( variationAttributes.hasOwnProperty( attr_name ) ) {

														// console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if');

														var attr_val         = variationAttributes[ attr_name ],
															variation_active = '';

														if ( attr_name === current_attr_name ) {

															// console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if');

															if ( variations[ num ].variation_is_active ) {
																
																// console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if if1');

																variation_active = 'enabled';
															}

															if ( attr_val ) {
																
																// console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if if2');

																// Decode entities.
																attr_val = $( '<div/>' ).html( attr_val ).text();

																// Attach to matching options by value. This is done to compare
																// TEXT values rather than any HTML entities.
																var $option_elements = new_attr_select.find( 'option' );
																if ( $option_elements.length ) {
																	
																	// console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if if2 if');

																	for (var i = 0, len = $option_elements.length; i < len; i++) {
																		var $option_element = $( $option_elements[i] ),
																			option_value = $option_element.val();

																		if ( attr_val === option_value ) {
																			$option_element.addClass( 'attached ' + variation_active );
																			break;
																		}
																	}
																}
															} else {
																
																// console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if else');

																// Attach all apart from placeholder.
																new_attr_select.find( 'option:gt(0)' ).addClass( 'attached ' + variation_active );
															}
														}
													}
												}
											}
										}

										// Count available options.
										attached_options_count = new_attr_select.find( 'option.attached' ).length;

										// Check if current selection is in attached options.
										if ( selected_attr_val ) {
											selected_attr_val_valid = false;

											if ( 0 !== attached_options_count ) {
												new_attr_select.find( 'option.attached.enabled' ).each( function() {
													var option_value = $( this ).val();

													if ( selected_attr_val === option_value ) {
														selected_attr_val_valid = true;
														return false; // break.
													}
												});
											}
										}

										// Detach the placeholder if:
										// - Valid options exist.
										// - The current selection is non-empty.
										// - The current selection is valid.
										// - Placeholders are not set to be permanently visible.
										if ( attached_options_count > 0 && selected_attr_val && selected_attr_val_valid && ( 'no' === show_option_none ) ) {
											new_attr_select.find( 'option:first' ).remove();
											option_gt_filter = '';
										}

										// Detach unattached.
										new_attr_select.find( 'option' + option_gt_filter + ':not(.attached)' ).remove();

		// if(false){
										// Finally, copy to DOM and set value.
										current_attr_select.html( new_attr_select.html() );
		// }
										current_attr_select.find( 'option' + option_gt_filter + ':not(.enabled)' ).prop( 'disabled', true );

										// Choose selected value.
										if ( selected_attr_val ) {
											// If the previously selected value is no longer available, fall back to the placeholder (it's going to be there).
											if ( selected_attr_val_valid ) {
												current_attr_select.val( selected_attr_val );
											} else {
												current_attr_select.val( '' ).trigger( 'change' );
											}
										} else {
											current_attr_select.val( '' ); // No change event to prevent infinite loop.
										}
									});

									// Custom event for when variations have been updated.
									form.$form.trigger( 'woocommerce_update_variation_values' );
								};

								/**
								 * Get chosen attributes from form.
								 * @return array
								 */
								VariationForm.prototype.getChosenAttributes = function() {
									var data   = {};
									var count  = 0;
									var chosen = 0;

									// console.log('A_ON show_variation [getChosenAttributes]');
									// console.log(this.$attributeFields);
									// console.log(this);

									this.$attributeFields.each( function() {
										var attribute_name = $( this ).data( 'attribute_name' ) || $( this ).attr( 'name' );
										var value          = $( this ).val() || '';

										// console.log('A_ON show_variation [getChosenAttributes] loop');
										// console.log(value);

										if ( value.length > 0 ) {
											chosen ++;
										}

										count ++;
										data[ attribute_name ] = value;
									});

									return {
										'count'      : count,
										'chosenCount': chosen,
										'data'       : data
									};
								};

								/**
								 * Find matching variations for attributes.
								 */
								VariationForm.prototype.findMatchingVariations = function( variations, attributes ) {
									var matching = [];
									for ( var i = 0; i < variations.length; i++ ) {
										var variation = variations[i];

										if ( this.isMatch( variation.attributes, attributes ) ) {
											matching.push( variation );
										}
									}
									return matching;
								};

								/**
								 * See if attributes match.
								 * @return {Boolean}
								 */
								VariationForm.prototype.isMatch = function( variation_attributes, attributes ) {
									// console.log('A_ON show_variation [isMatch]');
									// console.log(variation_attributes);
									var match = true;
									for ( var attr_name in variation_attributes ) {
										
										// console.log('A_ON show_variation [isMatch] loop');
										// console.log(variation_attributes);
										// console.log(attr_name);

										if ( variation_attributes.hasOwnProperty( attr_name ) ) {
											var val1 = variation_attributes[ attr_name ];
											var val2 = attributes[ attr_name ];
											
											// console.log('A_ON show_variation [isMatch] loop if');
											// console.log(val1);

											if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {
												match = false;
											}
										}
									}
									return match;
								};

								/**
								 * Show or hide the reset link.
								 */
								VariationForm.prototype.toggleResetLink = function( on ) {
									if ( on ) {
										if ( this.$resetVariations.css( 'visibility' ) === 'hidden' ) {
											this.$resetVariations.css( 'visibility', 'visible' ).hide().fadeIn();
										}
									} else {
										this.$resetVariations.css( 'visibility', 'hidden' );
									}
								};

								/**
								 * Function to call wc_variation_form on jquery selector.
								 */
								$.fn.wc_variation_form = function() {
									
									console.log('A_ON show_variation [wc_variation_form]');
									console.log(this);

									new VariationForm( this );
									return this;
								};

								/**
								 * Stores the default text for an element so it can be reset later
								 */
								$.fn.wc_set_content = function( content ) {
									if ( undefined === this.attr( 'data-o_content' ) ) {
										this.attr( 'data-o_content', this.text() );
									}
									this.text( content );
								};

								/**
								 * Stores the default text for an element so it can be reset later
								 */
								$.fn.wc_reset_content = function() {
									if ( undefined !== this.attr( 'data-o_content' ) ) {
										this.text( this.attr( 'data-o_content' ) );
									}
								};

								/**
								 * Stores a default attribute for an element so it can be reset later
								 */
								$.fn.wc_set_variation_attr = function( attr, value ) {
									if ( undefined === this.attr( 'data-o_' + attr ) ) {
										this.attr( 'data-o_' + attr, ( ! this.attr( attr ) ) ? '' : this.attr( attr ) );
									}
									if ( false === value ) {
										this.removeAttr( attr );
									} else {
										this.attr( attr, value );
									}
								};

								/**
								 * Reset a default attribute for an element so it can be reset later
								 */
								$.fn.wc_reset_variation_attr = function( attr ) {
									if ( undefined !== this.attr( 'data-o_' + attr ) ) {
										this.attr( attr, this.attr( 'data-o_' + attr ) );
									}
								};

								/**
								 * Reset the slide position if the variation has a different image than the current one
								 */
								$.fn.wc_maybe_trigger_slide_position_reset = function( variation ) {
									var $form                = $( this ),
										$product             = $form.closest( '.product' ),
										$product_gallery     = $product.find( '.images' ),
										reset_slide_position = false,
										new_image_id         = ( variation && variation.image_id ) ? variation.image_id : '';

									if ( $form.attr( 'current-image' ) !== new_image_id ) {
										reset_slide_position = true;
									}

									$form.attr( 'current-image', new_image_id );

									if ( reset_slide_position ) {
										$product_gallery.trigger( 'woocommerce_gallery_reset_slide_position' );
									}
								};

								/**
								 * Sets product images for the chosen variation
								 */
								$.fn.wc_variations_image_update = function( variation ) {
									var $form             = this,
										$product          = $form.closest( '.product' ),
										$product_gallery  = $product.find( '.images' ),
										$gallery_nav      = $product.find( '.flex-control-nav' ),
										$gallery_img      = $gallery_nav.find( 'li:eq(0) img' ),
										$product_img_wrap = $product_gallery
											.find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' )
											.eq( 0 ),
										$product_img      = $product_img_wrap.find( '.wp-post-image' ),
										$product_link     = $product_img_wrap.find( 'a' ).eq( 0 );

									if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
										// See if the gallery has an image with the same original src as the image we want to switch to.
										var galleryHasImage = $gallery_nav.find( 'li img[data-o_src="' + variation.image.gallery_thumbnail_src + '"]' ).length > 0;

										// If the gallery has the image, reset the images. We'll scroll to the correct one.
										if ( galleryHasImage ) {
											$form.wc_variations_image_reset();
										}

										// See if gallery has a matching image we can slide to.
										var slideToImage = $gallery_nav.find( 'li img[src="' + variation.image.gallery_thumbnail_src + '"]' );

										if ( slideToImage.length > 0 ) {
											slideToImage.trigger( 'click' );
											$form.attr( 'current-image', variation.image_id );
											window.setTimeout( function() {
												$( window ).trigger( 'resize' );
												$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );
											}, 20 );
											return;
										}

										$product_img.wc_set_variation_attr( 'src', variation.image.src );
										$product_img.wc_set_variation_attr( 'height', variation.image.src_h );
										$product_img.wc_set_variation_attr( 'width', variation.image.src_w );
										$product_img.wc_set_variation_attr( 'srcset', variation.image.srcset );
										$product_img.wc_set_variation_attr( 'sizes', variation.image.sizes );
										$product_img.wc_set_variation_attr( 'title', variation.image.title );
										$product_img.wc_set_variation_attr( 'data-caption', variation.image.caption );
										$product_img.wc_set_variation_attr( 'alt', variation.image.alt );
										$product_img.wc_set_variation_attr( 'data-src', variation.image.full_src );
										$product_img.wc_set_variation_attr( 'data-large_image', variation.image.full_src );
										$product_img.wc_set_variation_attr( 'data-large_image_width', variation.image.full_src_w );
										$product_img.wc_set_variation_attr( 'data-large_image_height', variation.image.full_src_h );
										$product_img_wrap.wc_set_variation_attr( 'data-thumb', variation.image.src );
										$gallery_img.wc_set_variation_attr( 'src', variation.image.gallery_thumbnail_src );
										$product_link.wc_set_variation_attr( 'href', variation.image.full_src );
									} else {
										$form.wc_variations_image_reset();
									}

									window.setTimeout( function() {
										$( window ).trigger( 'resize' );
										$form.wc_maybe_trigger_slide_position_reset( variation );
										$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );
									}, 20 );
								};

								/**
								 * Reset main image to defaults.
								 */
								$.fn.wc_variations_image_reset = function() {
									var $form             = this,
										$product          = $form.closest( '.product' ),
										$product_gallery  = $product.find( '.images' ),
										$gallery_nav      = $product.find( '.flex-control-nav' ),
										$gallery_img      = $gallery_nav.find( 'li:eq(0) img' ),
										$product_img_wrap = $product_gallery
											.find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' )
											.eq( 0 ),
										$product_img      = $product_img_wrap.find( '.wp-post-image' ),
										$product_link     = $product_img_wrap.find( 'a' ).eq( 0 );

									$product_img.wc_reset_variation_attr( 'src' );
									$product_img.wc_reset_variation_attr( 'width' );
									$product_img.wc_reset_variation_attr( 'height' );
									$product_img.wc_reset_variation_attr( 'srcset' );
									$product_img.wc_reset_variation_attr( 'sizes' );
									$product_img.wc_reset_variation_attr( 'title' );
									$product_img.wc_reset_variation_attr( 'data-caption' );
									$product_img.wc_reset_variation_attr( 'alt' );
									$product_img.wc_reset_variation_attr( 'data-src' );
									$product_img.wc_reset_variation_attr( 'data-large_image' );
									$product_img.wc_reset_variation_attr( 'data-large_image_width' );
									$product_img.wc_reset_variation_attr( 'data-large_image_height' );
									$product_img_wrap.wc_reset_variation_attr( 'data-thumb' );
									$gallery_img.wc_reset_variation_attr( 'src' );
									$product_link.wc_reset_variation_attr( 'href' );
								};

								$(function() {
									// console.log('A_ON wc_add_to_cart_variation_params');
									// console.log(wc_add_to_cart_variation_params);
									if ( typeof wc_add_to_cart_variation_params !== 'undefined' ) {
										$( '.variations_form' ).each( function() {
											// console.log('A_ON show_variation [load] loop');
											// console.log(this);
											$( this ).wc_variation_form();
										});
									}
								});

								/**
								 * Matches inline variation objects to chosen attributes
								 * @deprecated 2.6.9
								 * @type {Object}
								 */
								var wc_variation_form_matcher = {
									find_matching_variations: function( product_variations, settings ) {
										var matching = [];
										for ( var i = 0; i < product_variations.length; i++ ) {
											var variation    = product_variations[i];

											if ( wc_variation_form_matcher.variations_match( variation.attributes, settings ) ) {
												matching.push( variation );
											}
										}
										return matching;
									},
									variations_match: function( attrs1, attrs2 ) {
										var match = true;
										for ( var attr_name in attrs1 ) {
											if ( attrs1.hasOwnProperty( attr_name ) ) {
												var val1 = attrs1[ attr_name ];
												var val2 = attrs2[ attr_name ];
												if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {
													match = false;
												}
											}
										}
										return match;
									}
								};

								/**
								 * Avoids using wp.template where possible in order to be CSP compliant.
								 * wp.template uses internally eval().
								 * @param {string} templateId
								 * @return {Function}
								 */
								var wp_template = function( templateId ) {
									var html = document.getElementById( 'tmpl-' + templateId ).textContent;
									var hard = false;
									// any <# #> interpolate (evaluate).
									hard = hard || /<#\s?data\./.test( html );
									// any data that is NOT data.variation.
									hard = hard || /{{{?\s?data\.(?!variation\.).+}}}?/.test( html );
									// any data access deeper than 1 level e.g.
									// data.variation.object.item
									// data.variation.object['item']
									// data.variation.array[0]
									hard = hard || /{{{?\s?data\.variation\.[\w-]*[^\s}]/.test ( html );
									if ( hard ) {
										return wp.template( templateId );
									}
									return function template ( data ) {
										var variation = data.variation || {};
										return html.replace( /({{{?)\s?data\.variation\.([\w-]*)\s?(}}}?)/g, function( _, open, key, close ) {
											// Error in the format, ignore.
											if ( open.length !== close.length ) {
												return '';
											}
											var replacement = variation[ key ] || '';
											// {{{ }}} => interpolate (unescaped).
											// {{  }}  => interpolate (escaped).
											// https://codex.wordpress.org/Javascript_Reference/wp.template
											if ( open.length === 2 ) {
												return window.escape( replacement );
											}
											return replacement;
										});
									};
								};

							})( jQuery, window, document );
						},1000);
		      		}
	    		});
<?php	    	
			} ?>
		});
   	</script>    
  <?php      
}, PHP_INT_MAX);

?>
