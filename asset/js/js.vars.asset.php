<?php 

//	the common global vars -- these common global vars will load before any js layer or even inline javascript of the wbc, extensions and themes 


//	enqueue common assets 
add_action( ( !is_admin() ? 'wp_enqueue_scripts' : 'admin_enqueue_scripts'),function(){
	
	if( wbc()->sanitize->get('is_test') == 1 ) {
		wbc_pr('js_var_is_loaded');
	}
if(false){
?>

	<script type="text/javascript">
	
		// var log = console.log;
		// console.log = function () {
			
		// 	var base_log = null;
		// 	// window.temp = arguments[0];

		// 	if(typeof arguments[0] == 'string'){

		// 		var conditions = [arguments[0].indexOf('] ') >= 0,
		// 			arguments[0].indexOf('gim_feed [') >= 0,
		// 			arguments[0].indexOf('gim [') >= 0,
		// 			arguments[0].indexOf('vs [') >= 0,
		// 			arguments[0].indexOf('A_OFF') >= 0,
		// 			arguments[0].indexOf('A_ON') >= 0				
		// 			];

		// 		for (let i = 0; i < conditions.length; i++) {
		// 			var condition = false;
		// 			if(conditions[i]){
		// 				condition = true;
		// 				break;
		// 			}
		// 		};
		// 	}

		// 	if(condition){

		// 		base_log = false;
		// 	}else{
		// 		base_log = true;

		// 	}

		// 	if(base_log){

		//     log.apply(console, arguments);
		// 	}

		// }

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

		window.document.splugins.common.is_shop_page = <?php echo ((is_shop()) ? "true" : "false");?>; 

		window.document.splugins.common.is_category_page = <?php echo ((is_product_category()) ? "true" : "false");?>; 

		window.document.splugins.common.is_item_page = <?php echo ((is_product()) ? "true" : "false");?>;

		window.document.splugins.common.is_mobile = <?php echo ((wbc_is_mobile()) ? "true" : "false");?>;
		
		window.document.splugins.common.is_tablet = <?php echo ((wbc_is_mobile()) ? "true" : "false");?>;	

	</script>
<?php  
}
	$apply_filters_sp_is_legacy_admin_page = ((apply_filters('sp_is_legacy_admin_page', true)) ? "true" : "false");
	$wbc_common_current_theme_key = wbc()->common->current_theme_key();
	$is_shop = ((is_shop()) ? "true" : "false");
	$is_product_category = ((is_product_category()) ? "true" : "false");
	$is_product = ((is_product()) ? "true" : "false");
	$wbc_is_mobile = ((wbc_is_mobile()) ? "true" : "false");
	$is_admin = false;
	if( is_admin() ) {
		$is_admin = true;
	}
    "// var log = console.log;\n" .
    "    // commented code uper if false ma or backup file ma jova malse\n" .

    "// define namespaces \n" .
    "window.document.splugins = window.document.splugins || {};\n" .
    "window.document.splugins.common = window.document.splugins.common || {};\n" .
    "window.document.splugins.admin = window.document.splugins.admin || {};\n" .
    "\n" .

    " ".
    	(
    		$is_admin == true
    		?
			    "\n" .
			    "    window.document.splugins.common.is_admin = true;\n" .
			    "\n" .
			    "    window.document.splugins.admin.is_legacy_admin_page = ".$apply_filters_sp_is_legacy_admin_page."; \n" 
		   	:
   				"    window.document.splugins.common.is_admin = false;\n" 	 	
    	) .

    "\n" .
    "window.document.splugins.common.current_theme_key = '".$wbc_common_current_theme_key."';\n" .
    "\n" .
    "window.document.splugins.common.is_shop_page =  ".$is_shop."; \n" .
    "\n" .
    "window.document.splugins.common.is_category_page = ".$is_product_category."; \n" .
    "\n" .
    "window.document.splugins.common.is_item_page =  ".$is_product.";\n" .
    "\n" .
    "window.document.splugins.common.is_mobile = ".$wbc_is_mobile.";\n" .
    "\n" .
    "window.document.splugins.common.is_tablet = ".$wbc_is_mobile."; \n" .
    "\n";
	wbc()->load->add_inline_script( '', $inline_script, 'common' );
		
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
	
		wbc()->load->asset('js','common',array('jquery','wc-add-to-cart-variation'),"0.1.4",false,true,'common_configs',array('swatches_config'=>$swatches_configs, 'gallery_images_configs'=>$gallery_images_configs),true);

		// ACTIVE_TODO temp. hold for removel and we need to remove as soon as we refactore the loading sequance of filter widget class and load asset function og that class. so it is highly temporary. and we need to fix if we face issues whwrw filter feature is not active on certain pages but still that is loading below asset then we need to prevent that also and other such issues.
		if( is_shop() || is_product_category() ) {
			
			 wbc()->load->asset('js', 'publics/eo_wbc_filter', array('jquery'), "", false, true, null, null, true);

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

		wbc()->load->asset('js','common',array('jquery'),"0.1.4",false,true);
	}

},( !is_admin() ? 999 : 5) );


add_action('wp_footer',function(){ 
	if(false){   
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

								if ( form.useAjax ) {
									
									console.log('A_OFF show_variation [onFindVariation] 1 if');

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

									console.log('A_OFF show_variation [onFindVariation] 1 else');

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
							// console.log(this);

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
							console.log('A_OFF show_variation wc_add_to_cart_variation_params');
							console.log(wc_add_to_cart_variation_params);
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
							// console.log(this);

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

    	});
   </script>
  	<?php
  	}
  	$inline_script = 
	"console.log('[js.vars.asset wp_footer]');\n" .
	"// console.log(\"js.vras.asset outer ready event\");\n" .
	"\n" .
	"jQuery(document).ready(function() {\n" .
	"\n" .
	"    console.log('[js.vars.asset wp_footer] document.ready');\n" .
	"\n" .
	"    if (window.document.splugins.common.is_category_page || window.document.splugins.common.is_shop_page) {\n" .
	"        \n" .
	"        console.log('[js.vars.asset wp_footer] is_category_page');\n" .
	"        \n" .
	"        // added on 30-06-2023\n" .
	"        // NOTE: even though we have checked in the below script if the eo_wbc_object is not available, then it is created, but as per the structure, we need to skip execution.And till we do not refactor the loading of scripts and execution further, we need the below if. Ideally, we should not load this js file if the filters widget is not rendered on the particular page.\n" .
	"        if (typeof(eo_wbc_object) != 'undefined') {\n" .
	"            \n" .
	"            window.document.splugins.wbc.pagination.api.init();\n" .
	"            \n" .
	"            window.document.splugins.wbc.filters.api.init();\n" .
	"            window.document.splugins.wbc.filter_sets.api.init();\n" .
	"        }\n" .
	"    }\n" .
	"\n" .
	"    // ACTIVE_TODO we should confirm once and then disable the category condition or part below because it seems unnecessary for the category page. or is it necessary for the purple theme loopbox slider? or for the tableview sidebar or popup if it has jQuery slider or zoom?\n" .
	"    if (window.document.splugins.common.is_item_page || window.document.splugins.common.is_category_page) {\n" .
	"\n" .
	"        // window.setTimeout(function(){\n" .
	"\n" .
	"        console.log('[js.vars.asset wp_footer] document.ready 01');\n" .
	"        window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init();\n" .
	"        console.log('[js.vars.asset wp_footer] document.ready 02');\n" .
	"        \n" .
	"        // }, 2500);\n" .
	"\n" .
	"    }\n" .
	"\n" .

	"    console.log('[js.vars.asset wp_footer] document.ready 03');\n" .
	"\n" .
	"    console.log(window.document.splugins.common.is_item_page);\n" .
	"\n" .
	"    if (window.document.splugins.common.is_item_page) {\n" .
	"        \n" .
	"        console.log('[js.vars.asset wp_footer] gim');\n" .
	"\n" .
	"        // window.setTimeout(function(){\n" .
	"\n" .
	"        // window.document.splugins.wbc.variations.gallery_images.api.init();\n" .
	"        base_container = jQuery((window.document.splugins.common._o(common_configs.gallery_images_configs, 'base_container_selector') ? common_configs.gallery_images_configs.base_container_selector : '.variations_form'));\n" .
	"        console.log('[js.vars.asset wp_footer] gim 01');\n" .
	"        console.log(base_container);\n" .
	"        jQuery(base_container).sp_wbc_variations_gallery_images();\n" .
	"\n" .
	"        base_container_simple = jQuery((window.document.splugins.common._o(common_configs.gallery_images_configs, 'base_container_selector_simple') ? common_configs.gallery_images_configs.base_container_selector_simple : null /*ACTIVE_TODO_OC_START need to update here the base_container_selectore ACTIVE_TODO_OC_END*/));\n" .
	"        console.log('[js.vars.asset wp_footer] gim 02');\n" .
	"        console.log(base_container);\n" .
	"        \n" .
	"        jQuery(base_container_simple).sp_wbc_variations_gallery_images({product_type:'simple'});\n" .
	"\n" .
	"        // },2000);\n" .
	"\n" .
	"    }\n" .
	"\n" .
	"    if (window.document.splugins.common.is_category_page) {\n" .
	"\n" .
	"        console.log('[js.vars.asset wp_footer] gim_feed');\n" .
	"\n" .
	"        // window.setTimeout(function(){\n" .
	"\n" .
	"        // window.document.splugins.wbc.variations.gallery_images.feed_page.api.init();\n\n" .
	"        var base_container_loop_feed_page = jQuery((window.document.splugins.common._o(common_configs.gallery_images_configs, 'base_container_loop_selector') ? common_configs.gallery_images_configs.base_container_loop_selector : '.variations_form'));\n" .
	"        console.log('[js.vars.asset wp_footer] gim_feed variations');\n" .
	"        console.log(base_container_loop_feed_page);\n" .
	"        \n" .
	"        jQuery(base_container_loop_feed_page).sp_wbc_variations_gallery_images_feed_page();\n" .
	"        // ACTIVE_TODO_OC_START\n" .
	"        // ACTIVE_TODO Below ajax complete will have a serious issue when the other ajax invokes this function means other than the eowbc js ajax call. So we need to simply bind on the success on render HTML notification simply the eowbs filter HTML notification and remove the ajax complete dependency from here and when that notification is fired inside the subscribe function here we can simply init the required modules. ya so simply put all the code that is the ajaxComplete function into the subscribe function of our notification module. -- to h\n" .
	"        //  -- But still it not be inuf because the notification has a base container means host diffidency and that cannot be used here because of the uncertainly of that container and even if firing that global notification that is also lead to the same issue for which the base_container based on notifications are created. So we simply need to we simplify the filter module calling synchronization and make sure that for the fundamental filter search calls to that main function of filter wrapper or something such of the web, ajax is a being we need to make sure that the fundamental filter event there is only one selector of the container that is used. means we need to differentiate this search call of the category page from other search calls that may be happening from the diamond quiz popup, and other such things. And then we can simply use that container selector here -- to h\n" .
	"        //  --    now after a while to fix some unwanted ajax-related bug the index of based URL condition is added below, but obviously that is not the intended standard fix since it will prevent some ajax events which we want to let them go inside but they will not be with below condition. So now we need a reliable fix to this whole ajaxComplete problem. Actually, we should simply rely on the ajaxComplete which we have inside a particular jQuery plugin of ours like sp_wbc_variations_swatches or sp_wbc_variations_gallery_images have that. and most probably the community standard must be that otherwise we need to do research on that and figure out the appropriate standard architecture implementation.\n" .
	"        // ACTIVE_TODO_OC_END\n" .
	"        \n" .
	"        jQuery(document).ajaxComplete(function (event, request, settings) {\n" .
	"            \n" .
	"            if (settings.url.indexOf('/product-category/') >= 0) {\n" .
	"                \n" .
	"                base_container_loop_feed_page = jQuery((window.document.splugins.common._o(common_configs.gallery_images_configs, 'base_container_loop_selector') ? common_configs.gallery_images_configs.base_container_loop_selector : '.variations_form'));\n" .
	"\n" .
	"                console.log('[js.vars.asset wp_footer] gim_feed ajaxComplete variations');\n" .
	"                console.log(jQuery(base_container_loop_feed_page));\n" .
	"                \n" .
	"                jQuery(base_container_loop_feed_page).sp_wbc_variations_gallery_images_feed_page();   \n" .
	"            }\n\n\n" .
	"        });\n" .
	"\n" .
	"        // console.log('[js.vars.asset wp_footer] gim_feed simple');\n" .
	"        var base_container_loop_simple_feed_page = jQuery((window.document.splugins.common._o(common_configs.gallery_images_configs, 'base_container_loop_selector_simple') ? common_configs.gallery_images_configs.base_container_loop_selector_simple : null /*ACTIVE_TODO_OC_START need to update here the base_container_selectore ACTIVE_TODO_OC_END*/));\n" .
	"        var loop_simple_feed_page_options = {product_type:'simple'};\n" .
	"        jQuery(base_container_loop_simple_feed_page).sp_wbc_variations_gallery_images_feed_page(loop_simple_feed_page_options);\n" .
	"        // ACTIVE_TODO_OC_START\n" .
	"        // ACTIVE_TODO Below ajax complete will have a serious issue when the other ajax invokes this function means other than the eowbc js ajax call. So we need to simply bind on the success on render HTML notification simply the eowbs filter HTML notification and remove the ajax complete dependency from here and when that notification is fired inside the subscribe function here we can simply init the required modules. ya so simply put all the code that is the ajaxComplete function into the subscribe function of our notification module. -- to h\n" .
	"        //  -- But still it not be inuf because the notification has a base container means host diffidency and that cannot be used here because of the uncertainly of that container and even if firing that global notification that is also lead to the same issue for which the base_container based on notifications are created. So we simply need to we simplify the filter module calling synchronization and make sure that for the fundamental filter search calls to that main function of filter wrapper or something such of the web, ajax is a being we need to make sure that the fundamental filter event there is only one selector of the container that is used. means we need to differentiate this search call of the category page from other search calls that may be happening from the diamond quiz popup, and other such things. And then we can simply use that container selector here -- to h\n" .
	"        //  --    now after a while to fix some unwanted ajax-related bug the index of based URL condition is added below, but obviously that is not the intended standard fix since it will prevent some ajax events which we want to let them go inside but they will not be with below condition. So now we need a reliable fix to this whole ajaxComplete problem. Actually, we should simply rely on the ajaxComplete which we have inside a particular jQuery plugin of ours like sp_wbc_variations_swatches or sp_wbc_variations_gallery_images have that. and most probably the community standard must be that otherwise we need to do research on that and figure out the appropriate standard architecture implementation.\n" .
	"        // ACTIVE_TODO_OC_END\n" .
	"        \n" .
	"        jQuery(document).ajaxComplete(function (event, request, settings) {\n" .
	"            \n" .
	"            if (settings.url.indexOf('/product-category/') >= 0) {\n" .
	"                // ACTIVE_TODO temp. below setTimeout is temporary. But maybe we may like to make this timeout setting permanent if 360 flows require it.\n" .
	"                setTimeout(function(){\n" .
	"\n" .
	"                    console.log('[js.vars.asset wp_footer] gim_feed ajaxComplete simple');\n" .
	"                    var base_container_loop_simple_feed_page = jQuery((window.document.splugins.common._o(common_configs.gallery_images_configs, 'base_container_loop_selector_simple') ? common_configs.gallery_images_configs.base_container_loop_selector_simple : null /*ACTIVE_TODO_OC_START need to update here the base_container_selectore ACTIVE_TODO_OC_END*/));\n" .
	"                    \n" .
	"                    console.log(base_container_loop_simple_feed_page);\n" .
	"\n" .
	"                    jQuery(base_container_loop_simple_feed_page).sp_wbc_variations_gallery_images_feed_page(loop_simple_feed_page_options);\n" .
	"\n" .
	"                }, 500);\n" .
	"            }\n" .
	"        });\n" .
	"        \n" .
	"        // },2000);\n\n" .
	"    }\n" .
	"\n" .

	"    var base_container_swatches = null;\n" .
	"    if (window.document.splugins.common.is_item_page) {\n" .
	"        \n" .
	"        // console.log('[js.vars.asset wp_footer] vs');\n" .
	"        \n" .
	"        // window.setTimeout(function(){\n" .
	"        // window.document.splugins.wbc.variations.swatches.api.init();\n" .
	"        base_container = jQuery((window.document.splugins.common._o(common_configs.swatches_config, 'base_container_selector') ? common_configs.swatches_config.base_container_selector : '.variations_form'));\n" .
	"        jQuery(base_container).sp_wbc_variations_swatches();\n" .
	"\n" .
	"        base_container_swatches = base_container;\n" .
	"        \n" .
	"        // },2000);    \n" .
	"    }\n" .
	"\n" .
	"    if (window.document.splugins.common.is_category_page) {\n" .
	"        \n" .
	"        // console.log('[js.vars.asset wp_footer] vs_feed');\n" .
	"        \n" .
	"        // window.setTimeout(function(){\n\n" .
	"        // window.document.splugins.wbc.variations.swatches.feed_page.api.init();\n" .
	"        base_container_loop_feed_page = jQuery((window.document.splugins.common._o(common_configs.swatches_config, 'base_container_loop_selector') ? common_configs.swatches_config.base_container_loop_selector : '.variations_form'));\n" .
	"        jQuery(base_container_loop_feed_page).sp_wbc_variations_swatches_feed_page();\n" .
	"        // ACTIVE_TODO_OC_START\n" .
	"        // ACTIVE_TODO Below ajax complete will have a serious issue when the other ajax invokes this function means other than the eowbc js ajax call. So we need to simply bind on the success on render HTML notification simply the eowbs filter HTML notification and remove the ajax complete dependency from here and when that notification is fired inside the subscribe function here we can simply init the required modules. ya so simply put all the code that is the ajaxComplete function into the subscribe function of our notification module. -- to h\n" .
	"        //  -- But still it not be inuf because the notification has a base container means host diffidency and that cannot be used here because of the uncertainly of that container and even if firing that global notification that is also lead to the same issue for which the base_container based on notifications are created. So we simply need to we simplify the filter module calling synchronization and make sure that for the fundamental filter search calls to that main function of filter wrapper or something such of the web, ajax is a being we need to make sure that the fundamental filter event there is only one selector of the container that is used. means we need to differentiate this search call of the category page from other search calls that may be happening from the diamond quiz popup, and other such things. And then we can simply use that container selector here -- to h\n" .
	"        // ACTIVE_TODO_OC_END	 		           \n" .
	"        jQuery(document).ajaxComplete(function (event, request, settings) {\n\n" .
	"            console.log('[js.vars.asset wp_footer] vs_feed ajaxComplete');\n\n" .
	"            // console.log('[js.vars.asset wp_footer] vs_feed ajaxComplete');\n" .
	"            if (settings.url.indexOf('/product-category/') >= 0) {\n" .
	"                \n" .
	"                base_container_loop_feed_page = jQuery((window.document.splugins.common._o(common_configs.swatches_config, 'base_container_loop_selector') ? common_configs.swatches_config.base_container_loop_selector : '.variations_form'));\n" .
	"                \n" .
	"                console.log('[js.vars.asset wp_footer] vs_feed ajaxComplete if');\n" .
	"                console.log(base_container_loop_feed_page);\n" .
	"\n" .
	"                jQuery(base_container_loop_feed_page).sp_wbc_variations_swatches_feed_page();\n" .
	"            }\n\n" .
	"        });\n" .
	"        \n" .
	"        base_container_swatches = base_container_loop_feed_page;\n" .
	"        \n" .
	"        // },2000);    \n\n" .
	"    }\n" .
	"\n" .
	"    // jQuery(base_container_swatches).check_variations();\n" .
	"    jQuery('.variations_form').trigger('check_variations');\n" .
	"\n" .
	"    // ACTIVE_TODO temp. aa code temporary mukelo se variation_form mate @a \n" .

	"    window.setTimeout(function() {\n" .
	"        /*global wc_add_to_cart_variation_params */\n" .
	"        ;(function ( \$, window, document, undefined ) {\n" .
	"            var VariationForm = function( \$form ) {\n" .
	"                var self = this;\n" .
	"                console.log('A_OFF show_variation [VariationForm]');\n" .
	"                self.\$form = \$form;\n" .
	"                self.\$attributeFields = \$form.find( '.variations select' );\n" .
	"                self.\$singleVariation = \$form.find( '.single_variation' );\n" .
	"                self.\$singleVariationWrap = \$form.find( '.single_variation_wrap' );\n" .
	"                self.\$resetVariations = \$form.find( '.reset_variations' );\n" .
	"                self.\$product = \$form.closest( '.product' );\n" .
	"                self.variationData = \$form.data( 'product_variations' );\n" .
	"                self.useAjax = false === self.variationData;\n" .
	"                self.xhr = false;\n" .
	"                self.loading = true;\n" .
	"                self.\$singleVariationWrap.show();\n" .
	"                self.\$form.off( '.wc-variation-form' );\n" .
	"                self.getChosenAttributes = self.getChosenAttributes.bind( self );\n" .
	"                self.findMatchingVariations = self.findMatchingVariations.bind( self );\n" .
	"                self.isMatch = self.isMatch.bind( self );\n" .
	"                self.toggleResetLink = self.toggleResetLink.bind( self );\n" .
	"                \$form.on( 'click.wc-variation-form', '.reset_variations', { variationForm: self }, self.onReset );\n" .
	"                \$form.on( 'reload_product_variations', { variationForm: self }, self.onReload );\n" .
	"                \$form.on( 'hide_variation', { variationForm: self }, self.onHide );\n" .
	"                \$form.on( 'show_variation', { variationForm: self }, self.onShow );\n" .
	"                \$form.on( 'click', '.single_add_to_cart_button', { variationForm: self }, self.onAddToCart );\n" .
	"                \$form.on( 'reset_data', { variationForm: self }, self.onResetDisplayedVariation );\n" .
	"                \$form.on( 'reset_image', { variationForm: self }, self.onResetImage );\n" .
	"                \$form.on( 'change.wc-variation-form', '.variations select', { variationForm: self }, self.onChange );\n" .
	"                \$form.on( 'found_variation.wc-variation-form', { variationForm: self }, self.onFoundVariation );\n" .
	"                \$form.on( 'check_variations.wc-variation-form', { variationForm: self }, self.onFindVariation );\n" .
	"                \$form.on( 'update_variation_values.wc-variation-form', { variationForm: self }, self.onUpdateAttributes );\n" .
	"                setTimeout( function() {\n" .
	"                    \$form.trigger( 'check_variations' );\n" .
	"                    \$form.trigger( 'wc_variation_form', self );\n" .
	"                    self.loading = false;\n" .
	"                }, 100 );\n" .
	"            };\n" .
	"            VariationForm.prototype.onReset = function( event ) {\n" .
	"                event.preventDefault();\n" .
	"                event.data.variationForm.\$attributeFields.val( '' ).trigger( 'change' );\n" .
	"                event.data.variationForm.\$form.trigger( 'reset_data' );\n" .
	"            };\n" .
	"            VariationForm.prototype.onReload = function( event ) {\n" .
	"                var form = event.data.variationForm;\n" .
	"                form.variationData = form.\$form.data( 'product_variations' );\n" .
	"                form.useAjax = false === form.variationData;\n" .
	"                form.\$form.trigger( 'check_variations' );\n" .
	"            };\n" .
	"            VariationForm.prototype.onHide = function( event ) {\n" .
	"                event.preventDefault();\n" .
	"                event.data.variationForm.\$form\n" .
	"                    .find( '.single_add_to_cart_button' )\n" .
	"                    .removeClass( 'wc-variation-is-unavailable' )\n" .
	"                    .addClass( 'disabled wc-variation-selection-needed' );\n" .
	"                event.data.variationForm.\$form\n" .
	"                    .find( '.woocommerce-variation-add-to-cart' )\n" .
	"                    .removeClass( 'woocommerce-variation-add-to-cart-enabled' )\n" .
	"                    .addClass( 'woocommerce-variation-add-to-cart-disabled' );\n" .
	"            };\n" .
	"            VariationForm.prototype.onShow = function( event, variation, purchasable ) {\n" .
	"                event.preventDefault();\n" .
	"                if ( purchasable ) {\n" .
	"                    event.data.variationForm.\$form\n" .
	"                        .find( '.single_add_to_cart_button' )\n" .
	"                        .removeClass( 'disabled wc-variation-selection-needed wc-variation-is-unavailable' );\n" .
	"                    event.data.variationForm.\$form\n" .
	"                        .find( '.woocommerce-variation-add-to-cart' )\n" .
	"                        .removeClass( 'woocommerce-variation-add-to-cart-disabled' )\n" .
	"                        .addClass( 'woocommerce-variation-add-to-cart-enabled' );\n" .
	"                } else {\n" .
	"                    event.data.variationForm.\$form\n" .
	"                        .find( '.single_add_to_cart_button' )\n" .
	"                        .removeClass( 'wc-variation-selection-needed' )\n" .
	"                        .addClass( 'disabled wc-variation-is-unavailable' );\n" .
	"                    event.data.variationForm.\$form\n" .
	"                        .find( '.woocommerce-variation-add-to-cart' )\n" .
	"                        .removeClass( 'woocommerce-variation-add-to-cart-enabled' )\n" .
	"                        .addClass( 'woocommerce-variation-add-to-cart-disabled' );\n" .
	"                }\n" .
	"                if ( wp.mediaelement ) {\n" .
	"                    event.data.variationForm.\$form.find( '.wp-audio-shortcode, .wp-video-shortcode' )\n" .
	"                        .not( '.mejs-container' )\n" .
	"                        .filter(\n" .
	"                            function () {\n" .
	"                                return ! \$( this ).parent().hasClass( 'mejs-mediaelement' );\n" .
	"                            }\n" .
	"                        )\n" .
	"                        .mediaelementplayer( wp.mediaelement.settings );\n" .
	"                }\n" .
	"            };\n" .

	"    VariationForm.prototype.onAddToCart = function( event ) {\n" .
	"        if ( \$( this ).is('.disabled') ) {\n" .
	"            event.preventDefault();\n" .
	"            if ( \$( this ).is('.wc-variation-is-unavailable') ) {\n" .
	"                window.alert( wc_add_to_cart_variation_params.i18n_unavailable_text );\n" .
	"            } else if ( \$( this ).is('.wc-variation-selection-needed') ) {\n" .
	"                window.alert( wc_add_to_cart_variation_params.i18n_make_a_selection_text );\n" .
	"            }\n" .
	"        }\n" .
	"    };\n" .
	"    VariationForm.prototype.onResetDisplayedVariation = function( event ) {\n" .
	"        var form = event.data.variationForm;\n" .
	"        form.\$product.find( '.product_meta' ).find( '.sku' ).wc_reset_content();\n" .
	"        form.\$product\n" .
	"            .find( '.product_weight, .woocommerce-product-attributes-item--weight .woocommerce-product-attributes-item__value' )\n" .
	"            .wc_reset_content();\n" .
	"        form.\$product\n" .
	"            .find( '.product_dimensions, .woocommerce-product-attributes-item--dimensions .woocommerce-product-attributes-item__value' )\n" .
	"            .wc_reset_content();\n" .
	"        form.\$form.trigger( 'reset_image' );\n" .
	"        form.\$singleVariation.slideUp( 200 ).trigger( 'hide_variation' );\n" .
	"    };\n" .
	"    VariationForm.prototype.onResetImage = function( event ) {\n" .
	"        event.data.variationForm.\$form.wc_variations_image_update( false );\n" .
	"    };\n" .
	"    VariationForm.prototype.onFindVariation = function( event, chosenAttributes ) {\n" .
	"        var form              = event.data.variationForm,\n" .
	"            attributes        = 'undefined' !== typeof chosenAttributes ? chosenAttributes : form.getChosenAttributes(),\n" .
	"            currentAttributes = attributes.data;\n" .
	"        console.log('A_OFF show_variation [onFindVariation]');\n" .
	"        console.log(attributes);\n" .
	"        if ( attributes.count && attributes.count === attributes.chosenCount ) {\n" .
	"            console.log('A_OFF show_variation [onFindVariation] 1');\n" .
	"            if ( form.useAjax ) {\n" .
	"                console.log('A_OFF show_variation [onFindVariation] 1 if');\n" .
	"                if ( form.xhr ) {\n" .
	"                    form.xhr.abort();\n" .
	"                }\n" .
	"                form.\$form.block( { message: null, overlayCSS: { background: '#fff', opacity: 0.6 } } );\n" .
	"                currentAttributes.product_id  = parseInt( form.\$form.data( 'product_id' ), 10 );\n" .
	"                currentAttributes.custom_data = form.\$form.data( 'custom_data' );\n" .
	"                form.xhr                      = \$.ajax( {\n" .
	"                    url: wc_add_to_cart_variation_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_variation' ),\n" .
	"                    type: 'POST',\n" .
	"                    data: currentAttributes,\n" .
	"                    success: function( variation ) {\n" .
	"                        if ( variation ) {\n" .
	"                            form.\$form.trigger( 'found_variation', [ variation ] );\n" .
	"                        } else {\n" .
	"                            form.\$form.trigger( 'reset_data' );\n" .
	"                            attributes.chosenCount = 0;\n" .
	"                            if ( ! form.loading ) {\n" .
	"                                form.\$form\n" .
	"                                    .find( '.single_variation' )\n" .
	"                                    .after(\n" .
	"                                        '<p class=\"wc-no-matching-variations woocommerce-info\">' +\n" .
	"                                        wc_add_to_cart_variation_params.i18n_no_matching_variations_text +\n" .
	"                                        '</p>'\n" .
	"                                    );\n" .
	"                                form.\$form.find( '.wc-no-matching-variations' ).slideDown( 200 );\n" .
	"                            }\n" .
	"                        }\n" .
	"                    },\n" .
	"                    complete: function() {\n" .
	"                        form.\$form.unblock();\n" .
	"                    }\n" .
	"                } );\n" .
	"            } else {\n" .
	"                console.log('A_OFF show_variation [onFindVariation] 1 else');\n" .
	"                form.\$form.trigger( 'update_variation_values' );\n" .
	"                var matching_variations = form.findMatchingVariations( form.variationData, currentAttributes ),\n" .
	"                    variation           = matching_variations.shift();\n" .
	"                if ( variation ) {\n" .
	"                    form.\$form.trigger( 'found_variation', [ variation ] );\n" .
	"                } else {\n" .
	"                    form.\$form.trigger( 'reset_data' );\n" .
	"                    attributes.chosenCount = 0;\n" .
	"                    if ( ! form.loading ) {\n" .
	"                        form.\$form\n" .
	"                            .find( '.single_variation' )\n" .
	"                            .after(\n" .
	"                                '<p class=\"wc-no-matching-variations woocommerce-info\">' +\n" .
	"                                wc_add_to_cart_variation_params.i18n_no_matching_variations_text +\n" .
	"                                '</p>'\n" .
	"                            );\n" .
	"                        form.\$form.find( '.wc-no-matching-variations' ).slideDown( 200 );\n" .
	"                    }\n" .
	"                }\n" .
	"            }\n" .
	"        } else {\n" .
	"            form.\$form.trigger( 'update_variation_values' );\n" .
	"            form.\$form.trigger( 'reset_data' );\n" .
	"        }\n" .
	"        form.toggleResetLink( attributes.chosenCount > 0 );\n" .
	"    };\n" .
	"    VariationForm.prototype.onFoundVariation = function( event, variation ) {\n" .
	"        console.log('A_OFF show_variation [onFoundVariation]');\n" .
	"        var form           = event.data.variationForm,\n" .
	"            \$sku           = form.\$product.find( '.product_meta' ).find( '.sku' ),\n" .
	"            \$weight        = form.\$product.find(\n" .
	"                '.product_weight, .woocommerce-product-attributes-item--weight .woocommerce-product-attributes-item__value'\n" .
	"            ),\n" .
	"            \$dimensions    = form.\$product.find(\n" .
	"                '.product_dimensions, .woocommerce-product-attributes-item--dimensions .woocommerce-product-attributes-item__value'\n" .
	"            ),\n" .
	"            \$qty           = form.\$singleVariationWrap.find( '.quantity' ),\n" .
	"            purchasable    = true,\n" .
	"            variation_id   = '',\n" .
	"            template       = false,\n" .
	"            \$template_html = '';\n" .
	"        if ( variation.sku ) {\n" .
	"            \$sku.wc_set_content( variation.sku );\n" .
	"        } else {\n" .
	"            \$sku.wc_reset_content();\n" .
	"        }\n" .
	"        if ( variation.weight ) {\n" .
	"            \$weight.wc_set_content( variation.weight_html );\n" .
	"        } else {\n" .
	"            \$weight.wc_reset_content();\n" .
	"        }\n" .
	"        if ( variation.dimensions ) {\n" .
	"            // Decode HTML entities.\n" .
	"            \$dimensions.wc_set_content( \$.parseHTML( variation.dimensions_html )[0].data );\n" .
	"        } else {\n" .
	"            \$dimensions.wc_reset_content();\n" .
	"        }\n" .
	"        form.\$form.wc_variations_image_update( variation );\n" .
	"        if ( ! variation.variation_is_visible ) {\n" .
	"            template = wp_template( 'unavailable-variation-template' );\n" .
	"        } else {\n" .
	"            template     = wp_template( 'variation-template' );\n" .
	"            variation_id = variation.variation_id;\n" .
	"        }\n" .
	"        \$template_html = template( {\n" .
	"            variation: variation\n" .
	"        } );\n" .
	"        \$template_html = \$template_html.replace( '/*<![CDATA[*/', '' );\n" .
	"        \$template_html = \$template_html.replace( '/*]]>*/', '' );\n" .
	"        form.\$singleVariation.html( \$template_html );\n" .
	"        form.\$form.find( 'input[name=\"variation_id\"], input.variation_id' ).val( variation.variation_id ).trigger( 'change' );\n" .

    "// Hide or show qty input\n" .
    "if ( variation.is_sold_individually === 'yes' ) {\n" .
    "    \$qty.find( 'input.qty' ).val( '1' ).attr( 'min', '1' ).attr( 'max', '' ).trigger( 'change' );\n" .
    "    \$qty.hide();\n" .
    "} else {\n" .
    "\n" .
    "    var \$qty_input = \$qty.find( 'input.qty' ),\n" .
    "        qty_val    = parseFloat( \$qty_input.val() );\n" .
    "\n" .
    "    if ( isNaN( qty_val ) ) {\n" .
    "        qty_val = variation.min_qty;\n" .
    "    } else {\n" .
    "        qty_val = qty_val > parseFloat( variation.max_qty ) ? variation.max_qty : qty_val;\n" .
    "        qty_val = qty_val < parseFloat( variation.min_qty ) ? variation.min_qty : qty_val;\n" .
    "    }\n" .
    "\n" .
    "    \$qty_input.attr( 'min', variation.min_qty ).attr( 'max', variation.max_qty ).val( qty_val ).trigger( 'change' );\n" .
    "    \$qty.show();\n" .
    "}\n" .
    "\n" .
    "// Enable or disable the add to cart button\n" .
    "if ( ! variation.is_purchasable || ! variation.is_in_stock || ! variation.variation_is_visible ) {\n" .
    "    purchasable = false;\n" .
    "}\n"

	"        if ( form.\$singleVariation.text().trim() ) {\n" .
	"            form.\$singleVariation.slideDown( 200 ).trigger( 'show_variation', [ variation, purchasable ] );\n" .
	"        } else {\n" .
	"            form.\$singleVariation.show().trigger( 'show_variation', [ variation, purchasable ] );\n" .
	"        }\n" .
	"    };\n" .

	"    VariationForm.prototype.onChange = function( event ) {\n" .
	"        var form = event.data.variationForm;\n" .
	"        form.\$form.find( 'input[name=\"variation_id\"], input.variation_id' ).val( '' ).trigger( 'change' );\n" .
	"        form.\$form.find( '.wc-no-matching-variations' ).remove();\n" .
	"        if ( form.useAjax ) {\n" .
	"            form.\$form.trigger( 'check_variations' );\n" .
	"        } else {\n" .
	"            form.\$form.trigger( 'woocommerce_variation_select_change' );\n" .
	"            form.\$form.trigger( 'check_variations' );\n" .
	"        }\n" .
	"        // Custom event for when variation selection has been changed\n" .
	"        form.\$form.trigger( 'woocommerce_variation_has_changed' );\n" .
	"    };\n" .
	"    VariationForm.prototype.addSlashes = function( string ) {\n" .
	"        string = string.replace( /'/g, '\\\\\\'' );\n" .
	"        string = string.replace( /\"/g, '\\\\\\\"' );\n" .
	"        return string;\n" .
	"    };\n" .
	"    VariationForm.prototype.onUpdateAttributes = function( event ) {\n" .
	"        var form              = event.data.variationForm,\n" .
	"            attributes        = form.getChosenAttributes(),\n" .
	"            currentAttributes = attributes.data;\n" .
	"        if ( form.useAjax ) {\n" .
	"            return;\n" .
	"        }\n" .
	"        form.\$attributeFields.each( function( index, el ) {\n" .
	"            var current_attr_select     = \$( el ),\n" .
	"                current_attr_name       = current_attr_select.data( 'attribute_name' ) || current_attr_select.attr( 'name' ),\n" .
	"                show_option_none        = \$( el ).data( 'show_option_none' ),\n" .
	"                option_gt_filter        = ':gt(0)',\n" .
	"                attached_options_count  = 0,\n" .
	"                new_attr_select         = \$( '<select/>' ),\n" .
	"                selected_attr_val       = current_attr_select.val() || '',\n" .
	"                selected_attr_val_valid = true;\n" .
	"            if ( ! current_attr_select.data( 'attribute_html' ) ) {\n" .
	"                var refSelect = current_attr_select.clone();\n" .
	"                refSelect.find( 'option' ).removeAttr( 'attached' ).prop( 'disabled', false ).prop( 'selected', false );\n" .
	"                current_attr_select.data(\n" .
	"                    'attribute_options', refSelect.find( 'option' + option_gt_filter ).get()\n" .
	"                );\n" .
	"                current_attr_select.data( 'attribute_html', refSelect.html() );\n" .
	"            }\n" .
	"            new_attr_select.html( current_attr_select.data( 'attribute_html' ) );\n" .
	"            var checkAttributes = \$.extend( true, {}, currentAttributes );\n" .
	"            checkAttributes[ current_attr_name ] = '';\n" .
	"            var variations = form.findMatchingVariations( form.variationData, checkAttributes );\n" .
	"            for ( var num in variations ) {\n" .
	"                if ( typeof( variations[ num ] ) !== 'undefined' ) {\n" .
	"                    var variationAttributes = variations[ num ].attributes;\n" .
	"                    for ( var attr_name in variationAttributes ) {\n" .
	"                        if ( variationAttributes.hasOwnProperty( attr_name ) ) {\n" .
	"                            var attr_val         = variationAttributes[ attr_name ],\n" .
	"                                variation_active = '';\n" .
	"                            if ( attr_name === current_attr_name ) {\n" .
	"                                if ( variations[ num ].variation_is_active ) {\n" .
	"                                    variation_active = 'enabled';\n" .
	"                                }\n" .
	"                                if ( attr_val ) {\n" .
	"                                    attr_val = \$( '<div/>' ).html( attr_val ).text();\n" .
	"                                    var \$option_elements = new_attr_select.find( 'option' );\n" .
	"                                    if ( \$option_elements.length ) {\n" .
	"                                        for (var i = 0, len = \$option_elements.length; i < len; i++) {\n" .
	"                                            var \$option_element = \$( \$option_elements[i] ),\n" .
	"                                                option_value = \$option_element.val();\n" .
	"                                            if ( attr_val === option_value ) {\n" .
	"                                                \$option_element.addClass( 'attached ' + variation_active );\n" .
	"                                                break;\n" .
	"                                            }\n" .
	"                                        }\n" .
	"                                    }\n" .
	"                                } else {\n" .
	"                                    new_attr_select.find( 'option:gt(0)' ).addClass( 'attached ' + variation_active );\n" .
	"                                }\n" .
	"                            }\n" .
	"                        }\n" .
	"                    }\n" .
	"                }\n" .
	"            }\n" .
	"            attached_options_count = new_attr_select.find( 'option.attached' ).length;\n" .
	"            if ( selected_attr_val ) {\n" .
	"                selected_attr_val_valid = false;\n" .
	"                if ( 0 !== attached_options_count ) {\n" .
	"                    new_attr_select.find( 'option.attached.enabled' ).each( function() {\n" .
	"                        var option_value = \$( this ).val();\n" .
	"                        if ( selected_attr_val === option_value ) {\n" .
	"                            selected_attr_val_valid = true;\n" .
	"                            return false; // break.\n" .
	"                        }\n" .
	"                    });\n" .
	"                }\n" .
	"            }\n" .

	"    if ( attached_options_count > 0 && selected_attr_val && selected_attr_val_valid && ( 'no' === show_option_none ) ) {\n" .
	"        new_attr_select.find( 'option:first' ).remove();\n" .
	"        option_gt_filter = '';\n" .
	"    }\n" .
	"    new_attr_select.find( 'option' + option_gt_filter + ':not(.attached)' ).remove();\n" .
	"    // if(false){\n" .
	"    // Finally, copy to DOM and set value.\n" .
	"    current_attr_select.html( new_attr_select.html() );\n" .
	"    // }\n" .
	"    current_attr_select.find( 'option' + option_gt_filter + ':not(.enabled)' ).prop( 'disabled', true );\n" .
	"    if ( selected_attr_val ) {\n" .
	"        if ( selected_attr_val_valid ) {\n" .
	"            current_attr_select.val( selected_attr_val );\n" .
	"        } else {\n" .
	"            current_attr_select.val( '' ).trigger( 'change' );\n" .
	"        }\n" .
	"    } else {\n" .
	"        current_attr_select.val( '' ); // No change event to prevent infinite loop.\n" .
	"    }\n" .
	"    });\n" .
	"    // Custom event for when variations have been updated.\n" .
	"    form.\$form.trigger( 'woocommerce_update_variation_values' );\n" .
	"};\n" .
	"VariationForm.prototype.getChosenAttributes = function() {\n" .
	"    var data   = {};\n" .
	"    var count  = 0;\n" .
	"    var chosen = 0;\n" .
	"    console.log('A_OFF show_variation [getChosenAttributes]');\n" .
	"    console.log(this.\$attributeFields);\n" .
	"    console.log(this);\n" .
	"    this.\$attributeFields.each( function() {\n" .
	"        var attribute_name = \$( this ).data( 'attribute_name' ) || \$( this ).attr( 'name' );\n" .
	"        var value          = \$( this ).val() || '';\n" .
	"        console.log('A_OFF show_variation [getChosenAttributes] loop');\n" .
	"        console.log(value);\n" .
	"        if ( value.length > 0 ) {\n" .
	"            chosen ++;\n" .
	"        }\n" .
	"        count ++;\n" .
	"        data[ attribute_name ] = value;\n" .
	"    });\n" .
	"    return {\n" .
	"        'count'      : count,\n" .
	"        'chosenCount': chosen,\n" .
	"        'data'       : data\n" .
	"    };\n" .
	"};\n" .
	"VariationForm.prototype.findMatchingVariations = function( variations, attributes ) {\n" .
	"    var matching = [];\n" .
	"    for ( var i = 0; i < variations.length; i++ ) {\n" .
	"        var variation = variations[i];\n" .
	"        if ( this.isMatch( variation.attributes, attributes ) ) {\n" .
	"            matching.push( variation );\n" .
	"        }\n" .
	"    }\n" .
	"    return matching;\n" .
	"};\n" .
	"VariationForm.prototype.isMatch = function( variation_attributes, attributes ) {\n" .
	"    var match = true;\n" .
	"    for ( var attr_name in variation_attributes ) {\n" .
	"        if ( variation_attributes.hasOwnProperty( attr_name ) ) {\n" .
	"            var val1 = variation_attributes[ attr_name ];\n" .
	"            var val2 = attributes[ attr_name ];\n" .
	"            if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {\n" .
	"                match = false;\n" .
	"            }\n" .
	"        }\n" .
	"    }\n" .
	"    return match;\n" .
	"};\n" .
	"VariationForm.prototype.toggleResetLink = function( on ) {\n" .
	"    if ( on ) {\n" .
	"        if ( this.\$resetVariations.css( 'visibility' ) === 'hidden' ) {\n" .
	"            this.\$resetVariations.css( 'visibility', 'visible' ).hide().fadeIn();\n" .
	"        }\n" .
	"    } else {\n" .
	"        this.\$resetVariations.css( 'visibility', 'hidden' );\n" .
	"    }\n" .
	"};\n" .
	"\$.fn.wc_variation_form = function() {\n" .
	"    console.log('A_OFF show_variation [wc_variation_form]');\n" .
	"    new VariationForm( this );\n" .
	"    return this;\n" .
	"};\n" .
	"\$.fn.wc_set_content = function( content ) {\n" .
	"    if ( undefined === this.attr( 'data-o_content' ) ) {\n" .
	"        this.attr( 'data-o_content', this.text() );\n" .
	"    }\n" .
	"    this.text( content );\n" .
	"};\n" .
	"\$.fn.wc_reset_content = function() {\n" .
	"    if ( undefined !== this.attr( 'data-o_content' ) ) {\n" .
	"        this.text( this.attr( 'data-o_content' ) );\n" .
	"    }\n" .
	"};\n"
	"\n" .
    "    /**\n" .
    "     * Stores a default attribute for an element so it can be reset later\n" .
    "     */\n" .
    "    \$.fn.wc_set_variation_attr = function( attr, value ) {\n" .
    "        if ( undefined === this.attr( 'data-o_' + attr ) ) {\n" .
    "            this.attr( 'data-o_' + attr, ( ! this.attr( attr ) ) ? '' : this.attr( attr ) );\n" .
    "        }\n" .
    "        if ( false === value ) {\n" .
    "            this.removeAttr( attr );\n" .
    "        } else {\n" .
    "            this.attr( attr, value );\n" .
    "        }\n" .
    "    };\n" .
    "\n" .
    "    /**\n" .
    "     * Reset a default attribute for an element so it can be reset later\n" .
    "     */\n" .
    "    \$.fn.wc_reset_variation_attr = function( attr ) {\n" .
    "        if ( undefined !== this.attr( 'data-o_' + attr ) ) {\n" .
    "            this.attr( attr, this.attr( 'data-o_' + attr ) );\n" .
    "        }\n" .
    "    };\n" .
    "\n" .
    "    /**\n" .
    "     * Reset the slide position if the variation has a different image than the current one\n" .
    "     */\n" .
    "    \$.fn.wc_maybe_trigger_slide_position_reset = function( variation ) {\n" .
    "        var \$form                = \$( this ),\n" .
    "            \$product             = \$form.closest( '.product' ),\n" .
    "            \$product_gallery     = \$product.find( '.images' ),\n" .
    "            reset_slide_position = false,\n" .
    "            new_image_id         = ( variation && variation.image_id ) ? variation.image_id : '';\n" .
    "\n" .
    "        if ( \$form.attr( 'current-image' ) !== new_image_id ) {\n" .
    "            reset_slide_position = true;\n" .
    "        }\n" .
    "\n" .
    "        \$form.attr( 'current-image', new_image_id );\n" .
    "\n" .
    "        if ( reset_slide_position ) {\n" .
    "            \$product_gallery.trigger( 'woocommerce_gallery_reset_slide_position' );\n" .
    "        }\n" .
    "    };\n" .
    "\n" .
    "    /**\n" .
    "     * Sets product images for the chosen variation\n" .
    "     */\n" .
    "    \$.fn.wc_variations_image_update = function( variation ) {\n" .
    "        var \$form             = this,\n" .
    "            \$product          = \$form.closest( '.product' ),\n" .
    "            \$product_gallery  = \$product.find( '.images' ),\n" .
    "            \$gallery_nav      = \$product.find( '.flex-control-nav' ),\n" .
    "            \$gallery_img      = \$gallery_nav.find( 'li:eq(0) img' ),\n" .
    "            \$product_img_wrap = \$product_gallery\n" .
    "                .find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' )\n" .
    "                .eq( 0 ),\n" .
    "            \$product_img      = \$product_img_wrap.find( '.wp-post-image' ),\n" .
    "            \$product_link     = \$product_img_wrap.find( 'a' ).eq( 0 );\n" .
    "\n" .
    "        if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {\n" .
    "            // See if the gallery has an image with the same original src as the image we want to switch to.\n" .
    "            var galleryHasImage = \$gallery_nav.find( 'li img[data-o_src=\"' + variation.image.gallery_thumbnail_src + '\"]' ).length > 0;\n" .
    "\n" .
    "            // If the gallery has the image, reset the images. We'll scroll to the correct one.\n" .
    "            if ( galleryHasImage ) {\n" .
    "                \$form.wc_variations_image_reset();\n" .
    "            }\n" .
    "\n" .
    "            // See if the gallery has a matching image we can slide to.\n" .
    "            var slideToImage = \$gallery_nav.find( 'li img[src=\"' + variation.image.gallery_thumbnail_src + '\"]' );\n" .
    "\n" .
    "            if ( slideToImage.length > 0 ) {\n" .
    "                slideToImage.trigger( 'click' );\n" .
    "                \$form.attr( 'current-image', variation.image_id );\n" .
    "                window.setTimeout( function() {\n" .
    "                    \$( window ).trigger( 'resize' );\n" .
    "                    \$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );\n" .
    "                }, 20 );\n" .
    "                return;\n" .
    "            }\n" .
    "\n" .
    "            \$product_img.wc_set_variation_attr( 'src', variation.image.src );\n" .
    "            \$product_img.wc_set_variation_attr( 'height', variation.image.src_h );\n" .
    "            \$product_img.wc_set_variation_attr( 'width', variation.image.src_w );\n" .
    "            \$product_img.wc_set_variation_attr( 'srcset', variation.image.srcset );\n" .
    "            \$product_img.wc_set_variation_attr( 'sizes', variation.image.sizes );\n" .
    "            \$product_img.wc_set_variation_attr( 'title', variation.image.title );\n" .
    "            \$product_img.wc_set_variation_attr( 'data-caption', variation.image.caption );\n" .
    "            \$product_img.wc_set_variation_attr( 'alt', variation.image.alt );\n" .
    "            \$product_img.wc_set_variation_attr( 'data-src', variation.image.full_src );\n" .
    "            \$product_img.wc_set_variation_attr( 'data-large_image', variation.image.full_src );\n" .
    "            \$product_img.wc_set_variation_attr( 'data-large_image_width', variation.image.full_src_w );\n" .
    "            \$product_img.wc_set_variation_attr( 'data-large_image_height', variation.image.full_src_h );\n" .
    "            \$product_img_wrap.wc_set_variation_attr( 'data-thumb', variation.image.src );\n" .
    "            \$gallery_img.wc_set_variation_attr( 'src', variation.image.gallery_thumbnail_src );\n" .
    "            \$product_link.wc_set_variation_attr( 'href', variation.image.full_src );\n" .
    "        } else {\n" .
    "            \$form.wc_variations_image_reset();\n" .
    "        }\n" .
    "\n" .
    "        window.setTimeout( function() {\n" .
    "            \$( window ).trigger( 'resize' );\n" .
    "            \$form.wc_maybe_trigger_slide_position_reset( variation );\n" .
    "            \$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );\n" .
    "        }, 20 );\n" .
    "    };\n" .
    "\n" .
    "    /**\n" .
    "     * Reset main image to defaults.\n" .
    "     */\n" .
    "    \$.fn.wc_variations_image_reset = function() {\n" .
    "        var \$form             = this,\n" .
    "            \$product          = \$form.closest( '.product' ),\n" .
    "            \$product_gallery  = \$product.find( '.images' ),\n" .
    "            \$gallery_nav      = \$product.find( '.flex-control-nav' ),\n" .
    "            \$gallery_img      = \$gallery_nav.find( 'li:eq(0) img' ),\n" .
    "            \$product_img_wrap = \$product_gallery\n" .
    "                .find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' )\n" .
    "                .eq( 0 ),\n" .
    "            \$product_img      = \$product_img_wrap.find( '.wp-post-image' ),\n" .
    "            \$product_link     = \$product_img_wrap.find( 'a' ).eq( 0 );\n" .
    "\n" .
    "        \$product_img.wc_reset_variation_attr( 'src' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'width' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'height' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'srcset' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'sizes' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'title' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'data-caption' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'alt' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'data-src' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'data-large_image' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'data-large_image_width' );\n" .
    "        \$product_img.wc_reset_variation_attr( 'data-large_image_height' );\n" .
    "        \$product_img_wrap.wc_reset_variation_attr( 'data-thumb' );\n" .
    "        \$gallery_img.wc_reset_variation_attr( 'src' );\n" .
    "        \$product_link.wc_reset_variation_attr( 'href' );\n" .
    "    };\n" .
    "\n" .
    "    \$(function() {\n" .
    "        console.log('A_OFF show_variation wc_add_to_cart_variation_params');\n" .
    "        console.log(wc_add_to_cart_variation_params);\n" .
    "        if ( typeof wc_add_to_cart_variation_params !== 'undefined' ) {\n" .
    "            \$( '.variations_form' ).each( function() {\n" .
    "                // console.log('A_OFF show_variation [load] loop');\n" .
    "                // console.log(this);\n" .
    "                \$( this ).wc_variation_form();\n" .
    "            });\n" .
    "        }\n" .
    "    });\n" .
    "\n" .
    "    /**\n" .
    "     * Matches inline variation objects to chosen attributes\n" .
    "     * @deprecated 2.6.9\n" .
    "     * @type {Object}\n" .
    "     */\n" .

    "    var wc_variation_form_matcher = {\n" .
"        find_matching_variations: function( product_variations, settings ) {\n" .
"            var matching = [];\n" .
"            for ( var i = 0; i < product_variations.length; i++ ) {\n" .
"                var variation    = product_variations[i];\n\n" .
"                if ( wc_variation_form_matcher.variations_match( variation.attributes, settings ) ) {\n" .
"                    matching.push( variation );\n" .
"                }\n" .
"            }\n" .
"            return matching;\n" .
"        },\n" .
"        variations_match: function( attrs1, attrs2 ) {\n" .
"            var match = true;\n" .
"            for ( var attr_name in attrs1 ) {\n" .
"                if ( attrs1.hasOwnProperty( attr_name ) ) {\n" .
"                    var val1 = attrs1[ attr_name ];\n" .
"                    var val2 = attrs2[ attr_name ];\n" .
"                    if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {\n" .
"                        match = false;\n" .
"                    }\n" .
"                }\n" .
"            }\n" .
"            return match;\n" .
"        }\n" .
"    };\n\n" .
"    /**\n" .
"     * Avoids using wp.template where possible in order to be CSP compliant.\n" .
"     * wp.template uses internally eval().\n" .
"     * @param {string} templateId\n" .
"     * @return {Function}\n" .
"     */\n" .
"    var wp_template = function( templateId ) {\n" .
"        var html = document.getElementById( 'tmpl-' + templateId ).textContent;\n" .
"        var hard = false;\n" .
"        // any <# #> interpolate (evaluate).\n" .
"        hard = hard || /<#\s?data\./.test( html );\n" .
"        // any data that is NOT data.variation.\n" .
"        hard = hard || /{{{?\s?data\.(?!variation\.).+}}}?/.test( html );\n" .
"        // any data access deeper than 1 level e.g.\n" .
"        // data.variation.object.item\n" .
"        // data.variation.object['item']\n" .
"        // data.variation.array[0]\n" .
"        hard = hard || /{{{?\s?data\.variation\.[\w-]*[^\s}]/.test ( html );\n" .
"        if ( hard ) {\n" .
"            return wp.template( templateId );\n" .
"        }\n" .
"        return function template ( data ) {\n" .
"            var variation = data.variation || {};\n" .
"            return html.replace( /({{{?)\s?data\.variation\.([\w-]*)\s?(}}}?)/g, function( _, open, key, close ) {\n" .
"                // Error in the format, ignore.\n" .
"                if ( open.length !== close.length ) {\n" .
"                    return '';\n" .
"                }\n" .
"                var replacement = variation[ key ] || '';\n" .
"                // {{{ }}} => interpolate (unescaped).\n" .
"                // {{  }}  => interpolate (escaped).\n" .
"                // https://codex.wordpress.org/Javascript_Reference/wp.template\n" .
"                if ( open.length === 2 ) {\n" .
"                    return window.escape( replacement );\n" .
"                }\n" .
"                return replacement;\n" .
"            });\n" .
"        };\n" .
"    };\n\n" .
"    })( jQuery, window, document );\n" .
"   }, 1000);\n" .

 "    jQuery(document).ajaxComplete(function (event, request, settings) {\n" .
 "        if(settings.url.indexOf('/product-category/') >= 0){\n" .
 "            window.setTimeout(function(){\n" .
 "                /*global wc_add_to_cart_variation_params */\n" .
 "                ;(function ( \$, window, document, undefined ) {\n" .
 "                    /**\n" .
 "                     * VariationForm class which handles variation forms and attributes.\n" .
 "                     */\n" .
 "                    var VariationForm = function( \$form ) {\n" .
 "                        var self = this;\n" .
 "                        console.log('A_ON show_variation [VariationForm]');\n" .
 "                        // console.log(\$form);\n" .
 "                        // console.log(this);\n" .
 "\n" .
 "                        self.\$form                = \$form;\n" .
 "                        self.\$attributeFields     = \$form.find( '.variations select' );\n" .
 "                        self.\$singleVariation     = \$form.find( '.single_variation' );\n" .
 "                        self.\$singleVariationWrap = \$form.find( '.single_variation_wrap' );\n" .
 "                        self.\$resetVariations     = \$form.find( '.reset_variations' );\n" .
 "                        self.\$product             = \$form.closest( '.product' );\n" .
 "                        self.variationData        = \$form.data( 'product_variations' );\n" .
 "                        self.useAjax              = false === self.variationData;\n" .
 "                        self.xhr                  = false;\n" .
 "                        self.loading              = true;\n" .
 "\n" .
 "                        // Initial state.\n" .
 "                        self.\$singleVariationWrap.show();\n" .
 "                        self.\$form.off( '.wc-variation-form' );\n" .
 "\n" .
 "                        // Methods.\n" .
 "                        self.getChosenAttributes    = self.getChosenAttributes.bind( self );\n" .
 "                        self.findMatchingVariations = self.findMatchingVariations.bind( self );\n" .
 "                        self.isMatch                = self.isMatch.bind( self );\n" .
 "                        self.toggleResetLink        = self.toggleResetLink.bind( self );\n" .
 "\n" .
 "                        // Events.\n" .
 "                        \$form.on( 'click.wc-variation-form', '.reset_variations', { variationForm: self }, self.onReset );\n" .
 "                        \$form.on( 'reload_product_variations', { variationForm: self }, self.onReload );\n" .
 "                        \$form.on( 'hide_variation', { variationForm: self }, self.onHide );\n" .
 "                        \$form.on( 'show_variation', { variationForm: self }, self.onShow );\n" .
 "                        \$form.on( 'click', '.single_add_to_cart_button', { variationForm: self }, self.onAddToCart );\n" .
 "                        \$form.on( 'reset_data', { variationForm: self }, self.onResetDisplayedVariation );\n" .
 "                        \$form.on( 'reset_image', { variationForm: self }, self.onResetImage );\n" .
 "                        \$form.on( 'change.wc-variation-form', '.variations select', { variationForm: self }, self.onChange );\n" .
 "                        \$form.on( 'found_variation.wc-variation-form', { variationForm: self }, self.onFoundVariation );\n" .
 "                        \$form.on( 'check_variations.wc-variation-form', { variationForm: self }, self.onFindVariation );\n" .
 "                        \$form.on( 'update_variation_values.wc-variation-form', { variationForm: self }, self.onUpdateAttributes );\n" .
 "\n" .
 "                        // Init after gallery.\n" .
 "                        setTimeout( function() {\n" .
 "                            \$form.trigger( 'check_variations' );\n" .
 "                            \$form.trigger( 'wc_variation_form', self );\n" .
 "                            self.loading = false;\n" .
 "                        }, 100 );\n" .
 "                    };\n" .

"\n" .

    "/**\n" .
    " * Reset all fields.\n" .
    " */\n" .
    "VariationForm.prototype.onReset = function( event ) {\n" .
    "    event.preventDefault();\n" .
    "    event.data.variationForm.\$attributeFields.val( '' ).trigger( 'change' );\n" .
    "    event.data.variationForm.\$form.trigger( 'reset_data' );\n" .
    "};\n"

 "    /**\n" .
 "     * Reload variation data from the DOM.\n" .
 "     */\n" .
 "    VariationForm.prototype.onReload = function( event ) {\n" .
 "        var form           = event.data.variationForm;\n" .
 "        form.variationData = form.\$form.data( 'product_variations' );\n" .
 "        // console.log('A_ON show_variation [onReload]');\n" .
 "        // console.log(form.\$form);\n" .
 "        // console.log(form.variationData);\n" .
 "        form.useAjax       = false === form.variationData;\n" .
 "        form.\$form.trigger( 'check_variations' );\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * When a variation is hidden.\n" .
 "     */\n" .
 "    VariationForm.prototype.onHide = function( event ) {\n" .
 "        event.preventDefault();\n" .
 "        event.data.variationForm.\$form\n" .
 "            .find( '.single_add_to_cart_button' )\n" .
 "            .removeClass( 'wc-variation-is-unavailable' )\n" .
 "            .addClass( 'disabled wc-variation-selection-needed' );\n" .
 "        event.data.variationForm.\$form\n" .
 "            .find( '.woocommerce-variation-add-to-cart' )\n" .
 "            .removeClass( 'woocommerce-variation-add-to-cart-enabled' )\n" .
 "            .addClass( 'woocommerce-variation-add-to-cart-disabled' );\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * When a variation is shown.\n" .
 "     */\n" .
 "    VariationForm.prototype.onShow = function( event, variation, purchasable ) {\n" .
 "        event.preventDefault();\n" .
 "        if ( purchasable ) {\n" .
 "            event.data.variationForm.\$form\n" .
 "                .find( '.single_add_to_cart_button' )\n" .
 "                .removeClass( 'disabled wc-variation-selection-needed wc-variation-is-unavailable' );\n" .
 "            event.data.variationForm.\$form\n" .
 "                .find( '.woocommerce-variation-add-to-cart' )\n" .
 "                .removeClass( 'woocommerce-variation-add-to-cart-disabled' )\n" .
 "                .addClass( 'woocommerce-variation-add-to-cart-enabled' );\n" .
 "        } else {\n" .
 "            event.data.variationForm.\$form\n" .
 "                .find( '.single_add_to_cart_button' )\n" .
 "                .removeClass( 'wc-variation-selection-needed' )\n" .
 "                .addClass( 'disabled wc-variation-is-unavailable' );\n" .
 "            event.data.variationForm.\$form\n" .
 "                .find( '.woocommerce-variation-add-to-cart' )\n" .
 "                .removeClass( 'woocommerce-variation-add-to-cart-enabled' )\n" .
 "                .addClass( 'woocommerce-variation-add-to-cart-disabled' );\n" .
 "        }\n" .
 "\n" .
 "        // If present, the media element library needs initialized on the variation description.\n" .
 "        if ( wp.mediaelement ) {\n" .
 "            event.data.variationForm.\$form.find( '.wp-audio-shortcode, .wp-video-shortcode' )\n" .
 "                .not( '.mejs-container' )\n" .
 "                .filter(\n" .
 "                    function () {\n" .
 "                        return ! \$( this ).parent().hasClass( 'mejs-mediaelement' );\n" .
 "                    }\n" .
 "                )\n" .
 "                .mediaelementplayer( wp.mediaelement.settings );\n" .
 "        }\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * When the cart button is pressed.\n" .
 "     */\n" .
 "    VariationForm.prototype.onAddToCart = function( event ) {\n" .
 "        if ( \$( this ).is('.disabled') ) {\n" .
 "            event.preventDefault();\n" .
 "\n" .
 "            if ( \$( this ).is('.wc-variation-is-unavailable') ) {\n" .
 "                window.alert( wc_add_to_cart_variation_params.i18n_unavailable_text );\n" .
 "            } else if ( \$( this ).is('.wc-variation-selection-needed') ) {\n" .
 "                window.alert( wc_add_to_cart_variation_params.i18n_make_a_selection_text );\n" .
 "            }\n" .
 "        }\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * When displayed variation data is reset.\n" .
 "     */\n" .
 "    VariationForm.prototype.onResetDisplayedVariation = function( event ) {\n" .
 "        var form = event.data.variationForm;\n" .
 "        form.\$product.find( '.product_meta' ).find( '.sku' ).wc_reset_content();\n" .
 "        form.\$product\n" .
 "            .find( '.product_weight, .woocommerce-product-attributes-item--weight .woocommerce-product-attributes-item__value' )\n" .
 "            .wc_reset_content();\n" .
 "        form.\$product\n" .
 "            .find( '.product_dimensions, .woocommerce-product-attributes-item--dimensions .woocommerce-product-attributes-item__value' )\n" .
 "            .wc_reset_content();\n" .
 "        form.\$form.trigger( 'reset_image' );\n" .
 "        form.\$singleVariation.slideUp( 200 ).trigger( 'hide_variation' );\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * When the product image is reset.\n" .
 "     */\n" .
 "    VariationForm.prototype.onResetImage = function( event ) {\n" .
 "        event.data.variationForm.\$form.wc_variations_image_update( false );\n" .
 "    };\n" .

 "    /**\n" .
 "     * Looks for matching variations for current selected attributes.\n" .
 "     */\n" .
 "    VariationForm.prototype.onFindVariation = function( event, chosenAttributes ) {\n" .
 "        var form              = event.data.variationForm,\n" .
 "            attributes        = 'undefined' !== typeof chosenAttributes ? chosenAttributes : form.getChosenAttributes(),\n" .
 "            currentAttributes = attributes.data;\n" .
 "        console.log('A_ON show_variation [onFindVariation]');\n" .
 "        console.log(attributes);\n" .
 "\n" .
 "        if ( attributes.count && attributes.count === attributes.chosenCount ) {\n" .
 "            \n" .
 "            console.log('A_ON show_variation [onFindVariation] 1');\n" .
 "\n" .
 "            if ( form.useAjax ) {\n" .
 "                \n" .
 "                console.log('A_ON show_variation [onFindVariation] 1 if');\n" .
 "\n" .
 "                if ( form.xhr ) {\n" .
 "                    form.xhr.abort();\n" .
 "                }\n" .
 "                form.\$form.block( { message: null, overlayCSS: { background: '#fff', opacity: 0.6 } } );\n" .
 "                currentAttributes.product_id  = parseInt( form.\$form.data( 'product_id' ), 10 );\n" .
 "                currentAttributes.custom_data = form.\$form.data( 'custom_data' );\n" .
 "                form.xhr                      = \$.ajax( {\n" .
 "                    url: wc_add_to_cart_variation_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_variation' ),\n" .
 "                    type: 'POST',\n" .
 "                    data: currentAttributes,\n" .
 "                    success: function( variation ) {\n" .
 "                        if ( variation ) {\n" .
 "                            form.\$form.trigger( 'found_variation', [ variation ] );\n" .
 "                        } else {\n" .
 "                            form.\$form.trigger( 'reset_data' );\n" .
 "                            attributes.chosenCount = 0;\n" .
 "\n" .
 "                            if ( ! form.loading ) {\n" .
 "                                form.\$form\n" .
 "                                    .find( '.single_variation' )\n" .
 "                                    .after(\n" .
 "                                        '<p class=\"wc-no-matching-variations woocommerce-info\">' +\n" .
 "                                        wc_add_to_cart_variation_params.i18n_no_matching_variations_text +\n" .
 "                                        '</p>'\n" .
 "                                    );\n" .
 "                                form.\$form.find( '.wc-no-matching-variations' ).slideDown( 200 );\n" .
 "                            }\n" .
 "                        }\n" .
 "                    },\n" .
 "                    complete: function() {\n" .
 "                        form.\$form.unblock();\n" .
 "                    }\n" .
 "                } );\n" .
 "            } else {\n" .
 "\n" .
 "                console.log('A_ON show_variation [onFindVariation] 1 else');\n" .
 "\n" .
 "                form.\$form.trigger( 'update_variation_values' );\n" .
 "\n" .
 "                var matching_variations = form.findMatchingVariations( form.variationData, currentAttributes ),\n" .
 "                    variation           = matching_variations.shift();\n" .
 "\n" .
 "                // console.log('A_ON show_variation [onFindVariation] 1 else variation');\n" .
 "                // console.log(form.\$form);\n" .
 "                // console.log(variation);\n" .
 "                \n" .
 "                if ( variation ) {\n" .
 "                    \n" .
 "                    // console.log('A_ON show_variation [onFindVariation] 1 else if');\n" .
 "\n" .
 "                    form.\$form.trigger( 'found_variation', [ variation ] );\n" .
 "                } else {\n" .
 "                    form.\$form.trigger( 'reset_data' );\n" .
 "                    attributes.chosenCount = 0;\n" .
 "\n" .
 "                    if ( ! form.loading ) {\n" .
 "                        form.\$form\n" .
 "                            .find( '.single_variation' )\n" .
 "                            .after(\n" .
 "                                '<p class=\"wc-no-matching-variations woocommerce-info\">' +\n" .
 "                                wc_add_to_cart_variation_params.i18n_no_matching_variations_text +\n" .
 "                                '</p>'\n" .
 "                            );\n" .
 "                        form.\$form.find( '.wc-no-matching-variations' ).slideDown( 200 );\n" .
 "                    }\n" .
 "                }\n" .
 "            }\n" .
 "        } else {\n" .
 "            form.\$form.trigger( 'update_variation_values' );\n" .
 "            form.\$form.trigger( 'reset_data' );\n" .
 "        }\n" .
 "\n" .
 "        // Show reset link.\n" .
 "        form.toggleResetLink( attributes.chosenCount > 0 );\n" .
 "    };\n" .

 "\n" .
 "    /**\n" .
 "     * Triggered when a variation has been found which matches all attributes.\n" .
 "     */\n" .
 "    VariationForm.prototype.onFoundVariation = function( event, variation ) {\n" .
 "\n" .
 "        console.log('A_ON show_variation [onFoundVariation]');\n" .
 "\n" .
 "        var form           = event.data.variationForm,\n" .
 "            \$sku           = form.\$product.find( '.product_meta' ).find( '.sku' ),\n" .
 "            \$weight        = form.\$product.find(\n" .
 "                '.product_weight, .woocommerce-product-attributes-item--weight .woocommerce-product-attributes-item__value'\n" .
 "            ),\n" .
 "            \$dimensions    = form.\$product.find(\n" .
 "                '.product_dimensions, .woocommerce-product-attributes-item--dimensions .woocommerce-product-attributes-item__value'\n" .
 "            ),\n" .
 "            \$qty           = form.\$singleVariationWrap.find( '.quantity' ),\n" .
 "            purchasable    = true,\n" .
 "            variation_id   = '',\n" .
 "            template       = false,\n" .
 "            \$template_html = '';\n" .
 "\n" .
 "        if ( variation.sku ) {\n" .
 "            \$sku.wc_set_content( variation.sku );\n" .
 "        } else {\n" .
 "            \$sku.wc_reset_content();\n" .
 "        }\n" .
 "\n" .
 "        if ( variation.weight ) {\n" .
 "            \$weight.wc_set_content( variation.weight_html );\n" .
 "        } else {\n" .
 "            \$weight.wc_reset_content();\n" .
 "        }\n" .
 "\n" .
 "        if ( variation.dimensions ) {\n" .
 "            // Decode HTML entities.\n" .
 "            \$dimensions.wc_set_content( \$.parseHTML( variation.dimensions_html )[0].data );\n" .
 "        } else {\n" .
 "            \$dimensions.wc_reset_content();\n" .
 "        }\n" .
 "\n" .
 "        form.\$form.wc_variations_image_update( variation );\n" .
 "\n" .
 "        if ( ! variation.variation_is_visible ) {\n" .
 "            template = wp_template( 'unavailable-variation-template' );\n" .
 "        } else {\n" .
 "            template     = wp_template( 'variation-template' );\n" .
 "            variation_id = variation.variation_id;\n" .
 "        }\n" .
 "\n" .
 "        \$template_html = template( {\n" .
 "            variation: variation\n" .
 "        } );\n" .
 "        \$template_html = \$template_html.replace( '/*<![CDATA[*/', '' );\n" .
 "        \$template_html = \$template_html.replace( '/*]]>*/', '' );\n" .
 "\n" .
 "        form.\$singleVariation.html( \$template_html );\n" .
 "        form.\$form.find( 'input[name=\"variation_id\"], input.variation_id' ).val( variation.variation_id ).trigger( 'change' );\n" .
 "\n" .
 "        // Hide or show qty input\n" .
 "        if ( variation.is_sold_individually === 'yes' ) {\n" .
 "            \$qty.find( 'input.qty' ).val( '1' ).attr( 'min', '1' ).attr( 'max', '' ).trigger( 'change' );\n" .
 "            \$qty.hide();\n" .
 "        } else {\n" .
 "\n" .
 "            var \$qty_input = \$qty.find( 'input.qty' ),\n" .
 "                qty_val    = parseFloat( \$qty_input.val() );\n" .
 "\n" .
 "            if ( isNaN( qty_val ) ) {\n" .
 "                qty_val = variation.min_qty;\n" .
 "            } else {\n" .
 "                qty_val = qty_val > parseFloat( variation.max_qty ) ? variation.max_qty : qty_val;\n" .
 "                qty_val = qty_val < parseFloat( variation.min_qty ) ? variation.min_qty : qty_val;\n" .
 "            }\n" .
 "\n" .
 "            \$qty_input.attr( 'min', variation.min_qty ).attr( 'max', variation.max_qty ).val( qty_val ).trigger( 'change' );\n" .
 "            \$qty.show();\n" .
 "        }\n" .
 "\n" .
 "        // Enable or disable the add to cart button\n" .
 "        if ( ! variation.is_purchasable || ! variation.is_in_stock || ! variation.variation_is_visible ) {\n" .
 "            purchasable = false;\n" .
 "        }\n" .
 "\n" .
 "        // Reveal\n" .
 "        if ( form.\$singleVariation.text().trim() ) {\n" .
 "\n" .
 "            // console.log('A_ON show_variation [onFoundVariation] if');\n" .
 "            // console.log(form.\$singleVariation);\n" .
 "\n" .
 "            form.\$singleVariation.slideDown( 200 ).trigger( 'show_variation', [ variation, purchasable ] );\n" .
 "        } else {\n" .
 "            // console.log('A_ON show_variation [onFoundVariation] else');\n" .
 "            form.\$singleVariation.show().trigger( 'show_variation', [ variation, purchasable ] );\n" .
 "        }\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Triggered when an attribute field changes.\n" .
 "     */\n" .
 "    VariationForm.prototype.onChange = function( event ) {\n" .
 "        var form = event.data.variationForm;\n" .
 "\n" .
 "        form.\$form.find( 'input[name=\"variation_id\"], input.variation_id' ).val( '' ).trigger( 'change' );\n" .
 "        form.\$form.find( '.wc-no-matching-variations' ).remove();\n" .
 "\n" .
 "        if ( form.useAjax ) {\n" .
 "            form.\$form.trigger( 'check_variations' );\n" .
 "        } else {\n" .
 "            form.\$form.trigger( 'woocommerce_variation_select_change' );\n" .
 "            form.\$form.trigger( 'check_variations' );\n" .
 "        }\n" .
 "\n" .
 "        // Custom event for when variation selection has been changed\n" .
 "        form.\$form.trigger( 'woocommerce_variation_has_changed' );\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Escape quotes in a string.\n" .
 "     * @param {string} string\n" .
 "     * @return {string}\n" .
 "     */\n" .
 "    VariationForm.prototype.addSlashes = function( string ) {\n" .
 "        string = string.replace( /'/g, '\\\\\\'' );\n" .
 "        string = string.replace( /\"/g, '\\\\\\\"' );\n" .
 "        return string;\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Updates attributes in the DOM to show valid values.\n" .
 "     */\n" .
 "    VariationForm.prototype.onUpdateAttributes = function( event ) {\n" .
 "        var form              = event.data.variationForm,\n" .
 "            attributes        = form.getChosenAttributes(),\n" .
 "            currentAttributes = attributes.data;\n" .
 "\n" .
 "        if ( form.useAjax ) {\n" .
 "            return;\n" .
 "        }\n" .
 "\n" .
 "        // Loop through selects and disable/enable options based on selections.\n" .
 "        form.\$attributeFields.each( function( index, el ) {\n" .
 "            var current_attr_select     = \$( el ),\n" .
 "                current_attr_name       = current_attr_select.data( 'attribute_name' ) || current_attr_select.attr( 'name' ),\n" .
 "                show_option_none        = \$( el ).data( 'show_option_none' ),\n" .
 "                option_gt_filter        = ':gt(0)',\n" .
 "                attached_options_count  = 0,\n" .
 "                new_attr_select         = \$( '<select/>' ),\n" .
 "                selected_attr_val       = current_attr_select.val() || '',\n" .
 "                selected_attr_val_valid = true;\n" .
 "\n" .
 "            // Reference options set at first.\n" .
 "            if ( ! current_attr_select.data( 'attribute_html' ) ) {\n" .
 "                var refSelect = current_attr_select.clone();\n" .
 "\n" .
 "                refSelect.find( 'option' ).removeAttr( 'attached' ).prop( 'disabled', false ).prop( 'selected', false );\n" .
 "\n" .
 "                // Legacy data attribute.\n" .
 "                current_attr_select.data(\n" .
 "                    'attribute_options',\n" .
 "                    refSelect.find( 'option' + option_gt_filter ).get()\n" .
 "                );\n" .
 "                current_attr_select.data( 'attribute_html', refSelect.html() );\n" .
 "            }\n" .
 "\n" .
 "            new_attr_select.html( current_attr_select.data( 'attribute_html' ) );\n" .
 "\n" .
 "            // The attribute of this select field should not be taken into account when calculating its matching variations:\n" .
 "            // The constraints of this attribute are shaped by the values of the other attributes.\n" .
 "            var checkAttributes = \$.extend( true, {}, currentAttributes );\n" .
 "\n" .
 "            checkAttributes[ current_attr_name ] = '';\n" .
 "\n" .
 "            var variations = form.findMatchingVariations( form.variationData, checkAttributes );\n" .
 "\n" .
 "            // console.log('A_ON show_variation [onUpdateAttributes] variations');\n" .
 "            // console.log(variations);\n" .
 "\n" .
 "\n" .
 "    // Loop through variations.\n" .
 "    for ( var num in variations ) {\n" .
 "        if ( typeof( variations[ num ] ) !== 'undefined' ) {\n" .
 "            var variationAttributes = variations[ num ].attributes;\n" .
 "\n" .
 "            // console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes');\n" .
 "            // console.log(variationAttributes);\n" .
 "\n" .
 "            for ( var attr_name in variationAttributes ) {\n" .
 "\n" .
 "                // console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop');\n" .
 "\n" .
 "                if ( variationAttributes.hasOwnProperty( attr_name ) ) {\n" .
 "\n" .
 "                    // console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if');\n" .
 "\n" .
 "                    var attr_val         = variationAttributes[ attr_name ],\n" .
 "                        variation_active = '';\n" .
 "\n" .
 "                    if ( attr_name === current_attr_name ) {\n" .
 "\n" .
 "                        // console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if');\n" .
 "\n" .
 "                        if ( variations[ num ].variation_is_active ) {\n" .
 "\n" .
 "                            // console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if if1');\n" .
 "\n" .
 "                            variation_active = 'enabled';\n" .
 "                        }\n" .
 "\n" .
 "                        if ( attr_val ) {\n" .
 "\n" .
 "                            // console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if if2');\n" .
 "\n" .
 "                            // Decode entities.\n" .
 "                            attr_val = \$( '<div/>' ).html( attr_val ).text();\n" .
 "\n" .
 "                            // Attach to matching options by value. This is done to compare\n" .
 "                            // TEXT values rather than any HTML entities.\n" .
 "                            var \$option_elements = new_attr_select.find( 'option' );\n" .
 "                            if ( \$option_elements.length ) {\n" .
 "\n" .
 "                                // console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if if2 if');\n" .
 "\n" .
 "                                for (var i = 0, len = \$option_elements.length; i < len; i++) {\n" .
 "                                    var \$option_element = \$( \$option_elements[i] ),\n" .
 "                                        option_value = \$option_element.val();\n" .
 "\n" .
 "                                    if ( attr_val === option_value ) {\n" .
 "                                        \$option_element.addClass( 'attached ' + variation_active );\n" .
 "                                        break;\n" .
 "                                    }\n" .
 "                                }\n" .
 "                            }\n" .
 "                        } else {\n" .
 "\n" .
 "                            // console.log('A_ON show_variation [onUpdateAttributes] loop variationAttributes loop if if else');\n" .
 "\n" .
 "                            // Attach all apart from placeholder.\n" .
 "                            new_attr_select.find( 'option:gt(0)' ).addClass( 'attached ' + variation_active );\n" .
 "                        }\n" .
 "                    }\n" .
 "                }\n" .
 "            }\n" .
 "        }\n" .
 "    }\n" .
 "\n" .
 "    // Count available options.\n" .
 "    attached_options_count = new_attr_select.find( 'option.attached' ).length;\n" .
 "\n" .
 "    // Check if current selection is in attached options.\n" .
 "    if ( selected_attr_val ) {\n" .
 "        selected_attr_val_valid = false;\n" .
 "\n" .
 "        if ( 0 !== attached_options_count ) {\n" .
 "            new_attr_select.find( 'option.attached.enabled' ).each( function() {\n" .
 "                var option_value = \$( this ).val();\n" .
 "\n" .
 "                if ( selected_attr_val === option_value ) {\n" .
 "                    selected_attr_val_valid = true;\n" .
 "                    return false; // break.\n" .
 "                }\n" .
 "            });\n" .
 "        }\n" .
 "    }\n" .
 "\n" .
 "    // Detach the placeholder if:\n" .
 "    // - Valid options exist.\n" .
 "    // - The current selection is non-empty.\n" .
 "    // - The current selection is valid.\n" .
 "    // - Placeholders are not set to be permanently visible.\n" .
 "    if ( attached_options_count > 0 && selected_attr_val && selected_attr_val_valid && ( 'no' === show_option_none ) ) {\n" .
 "        new_attr_select.find( 'option:first' ).remove();\n" .
 "        option_gt_filter = '';\n" .
 "    }\n" .
 "\n" .
 "    // Detach unattached.\n" .
 "    new_attr_select.find( 'option' + option_gt_filter + ':not(.attached)' ).remove();\n" .
 "\n" .
 "    // if(false){\n" .
 "    // Finally, copy to DOM and set value.\n" .
 "    current_attr_select.html( new_attr_select.html() );\n" .
 "    // }\n" .
 "    current_attr_select.find( 'option' + option_gt_filter + ':not(.enabled)' ).prop( 'disabled', true );\n" .
 "\n" .
 "    // Choose selected value.\n" .
 "    if ( selected_attr_val ) {\n" .
 "        // If the previously selected value is no longer available, fall back to the placeholder (it's going to be there).\n" .
 "        if ( selected_attr_val_valid ) {\n" .
 "            current_attr_select.val( selected_attr_val );\n" .
 "        } else {\n" .
 "            current_attr_select.val( '' ).trigger( 'change' );\n" .
 "        }\n" .
 "    } else {\n" .
 "        current_attr_select.val( '' ); // No change event to prevent infinite loop.\n" .
 "    }\n" .
 "});\n" .
 "\n" .
 "/**\n" .
 " * Custom event for when variations have been updated.\n" .
 " */\n" .
 "form.\$form.trigger( 'woocommerce_update_variation_values' );\n" .
 "};\n" .

 "\n" .
 "    /**\n" .
 "     * Get chosen attributes from form.\n" .
 "     * @return array\n" .
 "     */\n" .
 "    VariationForm.prototype.getChosenAttributes = function() {\n" .
 "        var data   = {};\n" .
 "        var count  = 0;\n" .
 "        var chosen = 0;\n" .
 "\n" .
 "        // console.log('A_ON show_variation [getChosenAttributes]');\n" .
 "        // console.log(this.\$attributeFields);\n" .
 "        // console.log(this);\n" .
 "\n" .
 "        this.\$attributeFields.each( function() {\n" .
 "            var attribute_name = \$( this ).data( 'attribute_name' ) || \$( this ).attr( 'name' );\n" .
 "            var value          = \$( this ).val() || '';\n" .
 "\n" .
 "            // console.log('A_ON show_variation [getChosenAttributes] loop');\n" .
 "            // console.log(value);\n" .
 "\n" .
 "            if ( value.length > 0 ) {\n" .
 "                chosen ++;\n" .
 "            }\n" .
 "\n" .
 "            count ++;\n" .
 "            data[ attribute_name ] = value;\n" .
 "        });\n" .
 "\n" .
 "        return {\n" .
 "            'count'      : count,\n" .
 "            'chosenCount': chosen,\n" .
 "            'data'       : data\n" .
 "        };\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Find matching variations for attributes.\n" .
 "     */\n" .
 "    VariationForm.prototype.findMatchingVariations = function( variations, attributes ) {\n" .
 "        var matching = [];\n" .
 "        for ( var i = 0; i < variations.length; i++ ) {\n" .
 "            var variation = variations[i];\n" .
 "\n" .
 "            if ( this.isMatch( variation.attributes, attributes ) ) {\n" .
 "                matching.push( variation );\n" .
 "            }\n" .
 "        }\n" .
 "        return matching;\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * See if attributes match.\n" .
 "     * @return {Boolean}\n" .
 "     */\n" .
 "    VariationForm.prototype.isMatch = function( variation_attributes, attributes ) {\n" .
 "        // console.log('A_ON show_variation [isMatch]');\n" .
 "        // console.log(variation_attributes);\n" .
 "        var match = true;\n" .
 "        for ( var attr_name in variation_attributes ) {\n" .
 "\n" .
 "            // console.log('A_ON show_variation [isMatch] loop');\n" .
 "            // console.log(variation_attributes);\n" .
 "            // console.log(attr_name);\n" .
 "\n" .
 "            if ( variation_attributes.hasOwnProperty( attr_name ) ) {\n" .
 "                var val1 = variation_attributes[ attr_name ];\n" .
 "                var val2 = attributes[ attr_name ];\n" .
 "                \n" .
 "                // console.log('A_ON show_variation [isMatch] loop if');\n" .
 "                // console.log(val1);\n" .
 "\n" .
 "                if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {\n" .
 "                    match = false;\n" .
 "                }\n" .
 "            }\n" .
 "        }\n" .
 "        return match;\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Show or hide the reset link.\n" .
 "     */\n" .
 "    VariationForm.prototype.toggleResetLink = function( on ) {\n" .
 "        if ( on ) {\n" .
 "            if ( this.\$resetVariations.css( 'visibility' ) === 'hidden' ) {\n" .
 "                this.\$resetVariations.css( 'visibility', 'visible' ).hide().fadeIn();\n" .
 "            }\n" .
 "        } else {\n" .
 "            this.\$resetVariations.css( 'visibility', 'hidden' );\n" .
 "        }\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Function to call wc_variation_form on jquery selector.\n" .
 "     */\n" .
 "    \$.fn.wc_variation_form = function() {\n" .
 "        \n" .
 "        console.log('A_ON show_variation [wc_variation_form]');\n" .
 "        // console.log(this);\n" .
 "\n" .
 "        new VariationForm( this );\n" .
 "        return this;\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Stores the default text for an element so it can be reset later\n" .
 "     */\n" .
 "    \$.fn.wc_set_content = function( content ) {\n" .
 "        if ( undefined === this.attr( 'data-o_content' ) ) {\n" .
 "            this.attr( 'data-o_content', this.text() );\n" .
 "        }\n" .
 "        this.text( content );\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Stores the default text for an element so it can be reset later\n" .
 "     */\n" .
 "    \$.fn.wc_reset_content = function() {\n" .
 "        if ( undefined !== this.attr( 'data-o_content' ) ) {\n" .
 "            this.text( this.attr( 'data-o_content' ) );\n" .
 "        }\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Stores a default attribute for an element so it can be reset later\n" .
 "     */\n" .
 "    \$.fn.wc_set_variation_attr = function( attr, value ) {\n" .
 "        if ( undefined === this.attr( 'data-o_' + attr ) ) {\n" .
 "            this.attr( 'data-o_' + attr, ( ! this.attr( attr ) ) ? '' : this.attr( attr ) );\n" .
 "        }\n" .
 "        if ( false === value ) {\n" .
 "            this.removeAttr( attr );\n" .
 "        } else {\n" .
 "            this.attr( attr, value );\n" .
 "        }\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Reset a default attribute for an element so it can be reset later\n" .
 "     */\n" .
 "    \$.fn.wc_reset_variation_attr = function( attr ) {\n" .
 "        if ( undefined !== this.attr( 'data-o_' + attr ) ) {\n" .
 "            this.attr( attr, this.attr( 'data-o_' + attr ) );\n" .
 "        }\n" .
 "    };\n" .
 "\n" .

 "\n" .
 "    /**\n" .
 "     * Reset the slide position if the variation has a different image than the current one\n" .
 "     */\n" .
 "    \$.fn.wc_maybe_trigger_slide_position_reset = function( variation ) {\n" .
 "        var \$form                = \$( this ),\n" .
 "            \$product             = \$form.closest( '.product' ),\n" .
 "            \$product_gallery     = \$product.find( '.images' ),\n" .
 "            reset_slide_position = false,\n" .
 "            new_image_id         = ( variation && variation.image_id ) ? variation.image_id : '';\n" .
 "\n" .
 "        if ( \$form.attr( 'current-image' ) !== new_image_id ) {\n" .
 "            reset_slide_position = true;\n" .
 "        }\n" .
 "\n" .
 "        \$form.attr( 'current-image', new_image_id );\n" .
 "\n" .
 "        if ( reset_slide_position ) {\n" .
 "            \$product_gallery.trigger( 'woocommerce_gallery_reset_slide_position' );\n" .
 "        }\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Sets product images for the chosen variation\n" .
 "     */\n" .
 "    \$.fn.wc_variations_image_update = function( variation ) {\n" .
 "        var \$form             = this,\n" .
 "            \$product          = \$form.closest( '.product' ),\n" .
 "            \$product_gallery  = \$product.find( '.images' ),\n" .
 "            \$gallery_nav      = \$product.find( '.flex-control-nav' ),\n" .
 "            \$gallery_img      = \$gallery_nav.find( 'li:eq(0) img' ),\n" .
 "            \$product_img_wrap = \$product_gallery\n" .
 "                .find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' )\n" .
 "                .eq( 0 ),\n" .
 "            \$product_img      = \$product_img_wrap.find( '.wp-post-image' ),\n" .
 "            \$product_link     = \$product_img_wrap.find( 'a' ).eq( 0 );\n" .
 "\n" .
 "        if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {\n" .
 "            // See if the gallery has an image with the same original src as the image we want to switch to.\n" .
 "            var galleryHasImage = \$gallery_nav.find( 'li img[data-o_src=\"' + variation.image.gallery_thumbnail_src + '\"]' ).length > 0;\n" .
 "\n" .
 "            // If the gallery has the image, reset the images. We'll scroll to the correct one.\n" .
 "            if ( galleryHasImage ) {\n" .
 "                \$form.wc_variations_image_reset();\n" .
 "            }\n" .
 "\n" .
 "            // See if gallery has a matching image we can slide to.\n" .
 "            var slideToImage = \$gallery_nav.find( 'li img[src=\"' + variation.image.gallery_thumbnail_src + '\"]' );\n" .
 "\n" .
 "            if ( slideToImage.length > 0 ) {\n" .
 "                slideToImage.trigger( 'click' );\n" .
 "                \$form.attr( 'current-image', variation.image_id );\n" .
 "                window.setTimeout( function() {\n" .
 "                    \$( window ).trigger( 'resize' );\n" .
 "                    \$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );\n" .
 "                }, 20 );\n" .
 "                return;\n" .
 "            }\n" .
 "\n" .
 "            \$product_img.wc_set_variation_attr( 'src', variation.image.src );\n" .
 "            \$product_img.wc_set_variation_attr( 'height', variation.image.src_h );\n" .
 "            \$product_img.wc_set_variation_attr( 'width', variation.image.src_w );\n" .
 "            \$product_img.wc_set_variation_attr( 'srcset', variation.image.srcset );\n" .
 "            \$product_img.wc_set_variation_attr( 'sizes', variation.image.sizes );\n" .
 "            \$product_img.wc_set_variation_attr( 'title', variation.image.title );\n" .
 "            \$product_img.wc_set_variation_attr( 'data-caption', variation.image.caption );\n" .
 "            \$product_img.wc_set_variation_attr( 'alt', variation.image.alt );\n" .
 "            \$product_img.wc_set_variation_attr( 'data-src', variation.image.full_src );\n" .
 "            \$product_img.wc_set_variation_attr( 'data-large_image', variation.image.full_src );\n" .
 "            \$product_img.wc_set_variation_attr( 'data-large_image_width', variation.image.full_src_w );\n" .
 "            \$product_img.wc_set_variation_attr( 'data-large_image_height', variation.image.full_src_h );\n" .
 "            \$product_img_wrap.wc_set_variation_attr( 'data-thumb', variation.image.src );\n" .
 "            \$gallery_img.wc_set_variation_attr( 'src', variation.image.gallery_thumbnail_src );\n" .
 "            \$product_link.wc_set_variation_attr( 'href', variation.image.full_src );\n" .
 "        } else {\n" .
 "            \$form.wc_variations_image_reset();\n" .
 "        }\n" .
 "\n" .
 "        window.setTimeout( function() {\n" .
 "            \$( window ).trigger( 'resize' );\n" .
 "            \$form.wc_maybe_trigger_slide_position_reset( variation );\n" .
 "            \$product_gallery.trigger( 'woocommerce_gallery_init_zoom' );\n" .
 "        }, 20 );\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Reset main image to defaults.\n" .
 "     */\n" .
 "    \$.fn.wc_variations_image_reset = function() {\n" .
 "        var \$form             = this,\n" .
 "            \$product          = \$form.closest( '.product' ),\n" .
 "            \$product_gallery  = \$product.find( '.images' ),\n" .
 "            \$gallery_nav      = \$product.find( '.flex-control-nav' ),\n" .
 "            \$gallery_img      = \$gallery_nav.find( 'li:eq(0) img' ),\n" .
 "            \$product_img_wrap = \$product_gallery\n" .
 "                .find( '.woocommerce-product-gallery__image, .woocommerce-product-gallery__image--placeholder' )\n" .
 "                .eq( 0 ),\n" .
 "            \$product_img      = \$product_img_wrap.find( '.wp-post-image' ),\n" .
 "            \$product_link     = \$product_img_wrap.find( 'a' ).eq( 0 );\n" .
 "\n" .
 "        \$product_img.wc_reset_variation_attr( 'src' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'width' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'height' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'srcset' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'sizes' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'title' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'data-caption' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'alt' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'data-src' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'data-large_image' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'data-large_image_width' );\n" .
 "        \$product_img.wc_reset_variation_attr( 'data-large_image_height' );\n" .
 "        \$product_img_wrap.wc_reset_variation_attr( 'data-thumb' );\n" .
 "        \$gallery_img.wc_reset_variation_attr( 'src' );\n" .
 "        \$product_link.wc_reset_variation_attr( 'href' );\n" .
 "    };\n" .
 "\n" .
 "    \$(function() {\n" .
 "        if ( typeof wc_add_to_cart_variation_params !== 'undefined' ) {\n" .
 "            \$( '.variations_form' ).each( function() {\n" .
 "                // console.log('A_ON show_variation [load] loop');\n" .
 "                // console.log(this);\n" .
 "                \$( this ).wc_variation_form();\n" .
 "            });\n" .
 "        }\n" .
 "    });\n" .
 "\n" .
 "    /**\n" .
 "     * Matches inline variation objects to chosen attributes\n" .
 "     * @deprecated 2.6.9\n" .
 "     * @type {Object}\n" .
 "     */\n" .
 "    var wc_variation_form_matcher = {\n" .
 "        find_matching_variations: function( product_variations, settings ) {\n" .
 "            var matching = [];\n" .
 "            for ( var i = 0; i < product_variations.length; i++ ) {\n" .
 "                var variation    = product_variations[i];\n" .
 "\n" .
 "                if ( wc_variation_form_matcher.variations_match( variation.attributes, settings ) ) {\n" .
 "                    matching.push( variation );\n" .
 "                }\n" .
 "            }\n" .
 "            return matching;\n" .
 "        },\n" .
 "        variations_match: function( attrs1, attrs2 ) {\n" .
 "            var match = true;\n" .
 "            for ( var attr_name in attrs1 ) {\n" .
 "                if ( attrs1.hasOwnProperty( attr_name ) ) {\n" .
 "                    var val1 = attrs1[ attr_name ];\n" .
 "                    var val2 = attrs2[ attr_name ];\n" .
 "                    if ( val1 !== undefined && val2 !== undefined && val1.length !== 0 && val2.length !== 0 && val1 !== val2 ) {\n" .
 "                        match = false;\n" .
 "                    }\n" .
 "                }\n" .
 "            }\n" .
 "            return match;\n" .
 "        }\n" .
 "    };\n" .
 "\n" .
 "    /**\n" .
 "     * Avoids using wp.template where possible in order to be CSP compliant.\n" .
 "     * wp.template uses internally eval().\n" .
 "     * @param {string} templateId\n" .
 "     * @return {Function}\n" .
 "     */\n" .

 "\n" .
 "    var wp_template = function( templateId ) {\n" .
 "        var html = document.getElementById( 'tmpl-' + templateId ).textContent;\n" .
 "        var hard = false;\n" .
 "        // any <# #> interpolate (evaluate).\n" .
 "        hard = hard || /<#\\s?data\\./.test( html );\n" .
 "        // any data that is NOT data.variation.\n" .
 "        hard = hard || /{{{?\\s?data\\.(?!variation\\.).+}}}?/.test( html );\n" .
 "        // any data access deeper than 1 level e.g.\n" .
 "        // data.variation.object.item\n" .
 "        // data.variation.object['item']\n" .
 "        // data.variation.array[0]\n" .
 "        hard = hard || /{{{?\\s?data\\.variation\\.[\\w-]*[^\\s}]/.test ( html );\n" .
 "        if ( hard ) {\n" .
 "            return wp.template( templateId );\n" .
 "        }\n" .
 "        return function template ( data ) {\n" .
 "            var variation = data.variation || {};\n" .
 "            return html.replace( /({{{?)\\s?data\\.variation\\.([\\w-]*)\\s?(}}}?)/g, function( _, open, key, close ) {\n" .
 "                // Error in the format, ignore.\n" .
 "                if ( open.length !== close.length ) {\n" .
 "                    return '';\n" .
 "                }\n" .
 "                var replacement = variation[ key ] || '';\n" .
 "                // {{{ }}} => interpolate (unescaped).\n" .
 "                // {{  }}  => interpolate (escaped).\n" .
 "                // https://codex.wordpress.org/Javascript_Reference/wp.template\n" .
 "                if ( open.length === 2 ) {\n" .
 "                    return window.escape( replacement );\n" .
 "                }\n" .
 "                return replacement;\n" .
 "            });\n" .
 "        };\n" .
 "    };\n" .
 "\n" .

 "                })( jQuery, window, document );\n" .
 "            },1000);\n" .
 "        }\n" .
 "    });\n" .


	"});\n"

	wbc()->load->add_inline_script( '', $inline_script, 'common' );

/*}, PHP_INT_MAX);*/
// -- aya priority PHP_INT_MAX hoy to under nu add_inline_script function work notu kartu @a 02-02-2024
}, 10);


?>