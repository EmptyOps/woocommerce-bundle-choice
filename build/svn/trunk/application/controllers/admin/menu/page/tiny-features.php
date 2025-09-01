<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Tiny_features' ) ) {
	class Tiny_features extends \eo\wbc\controllers\admin\Controller {

		private static $_instance;
		public static function instance() {
		if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {
			parent::set_base_key('yet-to-be-defined');	

			parent::set_base_key_suffix('yet-to-be-defined');

		}

		public function should_init(){

	        // TODO implement as required 
	    }

	    public function init( $args = array() ) { 
	    
			// since legacy admins are saving on form submit so we may need to have save called from the init function or other relevant function of the controller, but in the same style as the save is called from ajax resolver means with form_definition and so on 
				//	so in case of legacy admin call it from here, and yeah it should be before getUI call so that aftre render repopulates saved data on the same page load event 
			if(!empty($args['is_legacy_admin'])) {
				$args['page_section'] = 'sp_variations';

				//temp
				if(!empty($args['temporary_get_form_directly'])) {
					return $this->get_legacy_form_definition($args['page_section'], $args);	
				}

				//\eo\wbc\model\admin\Tiny_features::instance()->save( $args['form_definition'], false, $args );
				//$this->selectron('sp_variations_save',$args);
			}

	        //\eo\wbc\controllers\admin\menu\page\Tiny_features::instance()->getUI($args);
	        $this->selectron($args['page_section'],$args);


	        \eo\wbc\controllers\admin\menu\page\Tiny_features::instance()->getUI(null);
	    }

	    public function selectron_hook_render($page_section,$container_class,$args = array()){
	    	if ($page_section == 'sp_variations') {
	    		if ($container_class == 'sp_variations_html') {
	    			$args['data'] = $args['hook_callback_args'];
                	unset($args['hook_callback_args']);
	    			\eo\wbc\controllers\admin\menu\page\Tiny_features::instance()->getUI($args);

	    		} else if ($container_class == 'sp_variations_save_html') {
	    			$args['data'] = $args['hook_callback_args'];
                	unset($args['hook_callback_args']);

                	$args['page_section'] = 'sp_variations';

	    			\eo\wbc\model\admin\Tiny_features::instance()->save( $this->get_legacy_form_definition('sp_variations', $args), false, $args );
	    		}
	    	} 
	    }

	    private function selectron($page_section,$args = array()){
			if ($page_section == 'sp_variations') {

				add_action( 'woocommerce_save_product_variation', function( $variation_id, $loop ) use($page_section,$args){

					$args['hook_callback_args'] = array();
					$args['hook_callback_args']['id'] = absint( $variation_id );

					// maybe this hook is need to be moved controller right before the form_definition is passed to parent class function. and the form_definition will be filter parameter. -- and yeah there would be one hook only that maybe needed. not separate needed for render and save 
					// apply_filters('sp_variations_data_before_save', '');

					return $this->selectron_hook_render($page_section,'sp_variations_save_html',$args);
				}, 10, 2 );

				add_action('woocommerce_product_after_variable_attributes', function( $loop, $variation_data, $variation ) use($page_section,$args) {

					$args['hook_callback_args'] = array();
	            	
					// NOTE: id is standard column name that we use for our options module based simple entity storage, so for the legacy admin flows also where necessary we can simply use the same where the necessity arise to maintain one uniqid and I think it will be almost always. 
					$args['hook_callback_args']['id'] = absint( $variation->ID );

					// ACTIVE_TODO_OC_START
					// need to use the wp media manager popup so in the file input that you added, please add the format field support -- to s 
					// 	--	which should accept the allowed file extensions as an option -- to s 
					// 		--	but yeah for now we will support only specific types, so for that create function in form builder class. like there is that savable type function -- to s 
					// 		--	and regarding our video field that should accept only mp4 -- to s 
					// 		--	ACTIVE_TODO and on validation layer of form builder, we may need to add support for file field validation. which simply validates the uploaded file extensions, so the validate property of the form array should now accept the allowed_file_types as a key. or is it already? I think not -- to s 

					// - need to research if video_url type can be saved as the wp attachement while still keeping the url external, but if it is possible then we can get video thumb etc support  -- to s
					// -- and if it is not possible then need to research on whether other plugins support video thumb or just static video play icon  -- to s
					// -- and in case if video is uploaded as attachment then we are planning to use what wp media manager provide or video thumb. -- to s
					// ACTIVE_TODO_OC_END 		
					if( false ) {

					?>

						<div class="spui_custum_row sp_variations" data-variation_id="<?php echo esc_attr($variation_id); ?>" data-product_id="<?php ?>">
							<div class="form-row form-row-first spui_custum_assets">
								<div class="spui_form_row_title">
									<h5><?php echo esc_html(eowbc_lang("Gallery Image", 'woo-bundle-choice')); ?></h5>
								</div>
								<div class="spui_form_asset_container upload_image asset_section_one">
									<a href="#" class="upload_image_button tips">
										<img src="http://localhost/fresh/wp-content/plugins/woocommerce/assets/images/placeholder.png">
										<input type="hidden" name="upload_image_id[0]" class="upload_image_id" value="0">        
									</a>
									<div class="spui_asset_upload_cta">
										<a href="#" class="btn">+</a>   
									</div>
								</div>  
							</div>

							<div class="form-row form-row-first upload_image spui_form_second_row">
								<div class="spui_form_row_title">
									<h5><?php echo esc_html(eowbc_lang("Video &amp; Custom Field", 'woo-bundle-choice')); ?></h5>
								</div>
								<div class="spui_custum_video_container">
									<div class="spui_video_links">
										<a href="#" class="btn">
											<img src="https://cdn-icons.flaticon.com/png/512/797/premium/797592.png?token=exp=1653727260~hmac=c2ce871afdfde03d00785cbf295ff801" class="img-fluid">
										</a>
										<p><?php echo esc_html(eowbc_lang("video", 'woo-bundle-choice')); ?></p>
									</div>

									<div class="spui_video_input_field">
										<input type="text" class="short wc_input_decimal" style="" name="variable_weight[0]" id="variable_weight0" value="" placeholder="">
										<p><?php echo esc_html(eowbc_lang("video url", 'woo-bundle-choice')); ?></p>
									</div> 

									<div class="spui_form_asset_container upload_image asset_section_two">
										<a href="#" class="upload_image_button tips">
											<img src="http://localhost/fresh/wp-content/plugins/woocommerce/assets/images/placeholder.png">
											<input type="hidden" name="upload_image_id[0]" class="upload_image_id" value="0">        
										</a>
										<div class="spui_asset_upload_cta">
											<a href="#" class="btn">+</a>   
										</div>
										<div class="asset_content">
											<p><?php echo esc_html(eowbc_lang("images", 'woo-bundle-choice')); ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div data-product_variation_id="<?php echo esc_attr( $variation_id ) ?>" class="form-row form-row-full woo-variation-gallery-wrapper">
							<div class="woo-variation-gallery-postbox">
								<div class="postbox-header">
									<h2><?php esc_html_e( 'Variation Product Gallery', 'woo-variation-gallery' ) ?></h2>
									<button type="button" class="handle-div" aria-expanded="true">
										<span class="toggle-indicator" aria-hidden="true"></span>
									</button>
								</div>

								<div class="woo-variation-gallery-inside">
									<div class="woo-variation-gallery-image-container">
										<ul class="woo-variation-gallery-images">
											<?php
											if ( is_array( $gallery_images ) && ! empty( $gallery_images ) ) {
												include dirname( __FILE__ ) . '/admin-template.php';
											}
											?>
										</ul>
									</div>
									<div class="add-woo-variation-gallery-image-wrapper hide-if-no-js">
										<a href="#" data-product_variation_loop="<?php echo esc_attr(absint( $loop )) ?>" data-product_variation_id="<?php echo esc_attr( $variation_id ) ?>" class="button-primary add-woo-variation-gallery-image"><?php esc_html_e( 'Add Variation Gallery Image', 'woo-variation-gallery' ) ?></a>
										<?php if ( ! woo_variation_gallery()->is_pro() ): ?>
											<a target="_blank" href="<?php echo esc_url( woo_variation_gallery()->get_backend()->get_pro_link() ) ?>" style="display: none" class="button woo-variation-gallery-pro-button"><?php esc_html_e( 'Upgrade to pro to add more images and videos', 'woo-variation-gallery' ) ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>

					<?php
					}

					return $this->selectron_hook_render($page_section,'sp_variations_html',$args);

				}, 10, 3 );


				add_action( 'woocommerce_process_product_meta', function( $id /* $variation_id, $loop*/ ) use($page_section,$args){

					if( wbc()->sanitize->get('is_test') == 1 ) {
						wbc_pr('tiny_features_selectron_inner_woocommerce_process_product_meta');
					}

					global $post;

					// NOTE: the wc product type detaction seems not possible here but if it is posible by standerd api hooks or standerd api than need to set it below.
					$type = null; //$post->post_type;	//$post->is_type('simple') ? 'simple' : 'variable';

					// NOTE: we needed to add if condition here for the simple type so that only if the product is simple type then only this form is rendered otherwise the issue we may face is that the form may be created for two diffrerent tab for the variable products 		
					// ACTIVE_TODO below if is commented becose product type detections is not posibble here and so as of now the form is rendering for both in simple and variable type. But as soon as we get chanse we must disable the form for varible type any how. and since stander api dosn't since to be supporting product type detection we may need to creat wc product object and something such to take care of it but we need to do it presizely using if api option is available and othore wise using the other options.and the fact is that if it reline on wc product option and than that will be not available product save on add mode that is also chalanging
					// if($type != 'simple'){
					
					// 	return; 
					// }


					$args['hook_callback_args'] = array();
					$args['hook_callback_args']['id'] = absint( $id /*$variation_id*/ );

					$args['product_type'] = $type;

					// maybe this hook is need to be moved controller right before the form_definition is passed to parent class function. and the form_definition will be filter parameter. -- and yeah there would be one hook only that maybe needed. not separate needed for render and save 
					// apply_filters('sp_variations_data_before_save', '');

					return $this->selectron_hook_render($page_section,'sp_variations_save_html',$args);
				}, 10, 2 );

				add_action('woocommerce_product_options_inventory_product_data', function( /*$loop, $variation_data, $variation*/ ) use($page_section,$args) {

					if( wbc()->sanitize->get('is_test') == 1 ) {
						wbc_pr('tiny_features_selectron_inner_woocommerce_product_options_inventory_product_data');
					}

					global $post;

					// NOTE: the wc product type detaction seems not possible here but if it is posible by standerd api hooks or standerd api than need to set it below.
					$type = null; //$post->post_type;	//$post->is_type('simple') ? 'simple' : 'variable';

					if( wbc()->sanitize->get('is_test') == 1 ) {
						wbc_pr('tiny_features_selectron_inner');
						wbc_pr($type);
						wbc_pr($post);
					}

					// NOTE: we needed to add if condition here for the simple type so that only if the product is simple type then only this form is rendered otherwise the issue we may face is that the form may be created for two diffrerent tab for the variable products 
					// ACTIVE_TODO below if is commented becose product type detections is not posibble here and so as of now the form is rendering for both in simple and variable type. But as soon as we get chanse we must disable the form for varible type any how. and since stander api dosn't since to be supporting product type detection we may need to creat wc product object and something such to take care of it but we need to do it presizely using if api option is available and othore wise using the other options.and the fact is that if it reline on wc product option and than that will be not available product save on add mode that is also chalanging
					// if($type != 'simple'){

					// 	return; 
					// }


					$args['hook_callback_args'] = array();
	            	
					// NOTE: id is standard column name that we use for our options module based simple entity storage, so for the legacy admin flows also where necessary we can simply use the same where the necessity arise to maintain one uniqid and I think it will be almost always. 
					$args['hook_callback_args']['id'] = absint( /*$variation*/$post->ID );
		
					$args['product_type'] = $type;

					return $this->selectron_hook_render($page_section,'sp_variations_html',$args);

				}, 10, 3 );

			} 
	    }

		private function getUI($args = array()){
		
			if(!empty($args['is_legacy_admin'])) {
				\eo\wbc\model\admin\Tiny_features::instance()->render_ui( $this->get_legacy_form_definition($args['page_section'], $args), $args );
			} else {
				\eo\wbc\model\admin\Tiny_features::instance()->render_ui( $this->get_form_definition( $args), $args );
			}
	        
	    }

	    public function get_form_definition($args = array()){

	    }	    

	    private function get_legacy_form_definition( $page_section, $args=array() ) {

	    	$form_definition = null;	
	    	if( $page_section == 'sp_variations' ) {

		    	$form_definition = array(
					$page_section/*'sp_variations'*/=>array(
						'label'=>"Gallery Images and Video(optionsUI)",
						'form'=>array(
							'sp_frmb_saved_tab_key'=>array(
								'type'=>'hidden',
								'value'=>'sp_variations',
							),

							'devider1{{id}}'=>array(
								'label'=>'Gallery Images',
								'type'=>'devider'
							),

							'sp_variations_gallery_images{{id}}{{data.added_counter}}'=>array(
								'label'=>' ',
								'type'=>'icon',
								'sanitize'=>'sanitize_text_field',
								'dynamic_add_support_start'=>true,
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'save_as'=>'post_meta',
								'dynamic_add_support_end'=>true,
							),

							'devider2{{id}}'=>array(
								'label'=>'Video',
								'type'=>'devider'
							),

							'sp_variations_video{{id}}'=>array(
								'label'=>'',
								'type'=>'file',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'save_as'=>'post_meta',
							),

							'video_segment{{id}}'=>array(
								'label'=>'(Video)',
								'type'=>'segment'
							),

							'sp_variations_video_url{{id}}'=>array(
								'label'=>'',
								'type'=>'text',
								'sanitize'=>'sanitize_text_field',
								'value'=>'',
								'class'=>array(),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'save_as'=>'post_meta',
							),
							'video_url_segment{{id}}'=>array(
								'label'=>'(Video Url)',
								'type'=>'segment'
							),
							
							'devider3{{id}}'=>array(
								'label'=>' ',
								'type'=>'devider'
							),

							/*'submit_button'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'attr'=>array("data-action='save'",'data-tab_key="sp_variations"'),
								'inline'=>false
							),*/
						)	
					)
				);
		    }

			// maybe this hook is need to be moved controller right before the form_definition is passed to parent class function. and the form_definition will be filter parameter. -- and yeah there would be one hook only that maybe needed. not separate needed for render and save 
			$form_definition = apply_filters('sp_variations_data_before_admin_form_render', $form_definition);

			$form_definition = \eo\wbc\controllers\admin\Controller::instance()->pre_process_form_definition($form_definition,$args);

			$args['form_definition'] = $form_definition;	

			// return $form_definition;
			return parent::get_form_defination__( $args );
	    }
	}
}		
