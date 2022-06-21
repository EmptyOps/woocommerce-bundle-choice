<?php

/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/eowbc_model');

class Tiny_Features extends Eowbc_Model {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function render_ui($form_definition, $args = null) {

		$form = array();

		$form['id']='dapii_apis';
		$form['title']='<h2>APIs & Configuration</h2>';
		$form['method']='POST';
		$form['tabs'] = true;
		$form['is_legacy_admin'] = isset($args['is_legacy_admin']) ? $args['is_legacy_admin'] : false;
		$form['no_form_tag'] = !empty($args['is_legacy_admin']) ? true : false;
		$form['attr']= array('data-is_per_tab_save="true"');


		if( !empty($args['is_legacy_admin']) ) {

			//	in case of legacy admin bind to hooks if applicable otherwise can simply call render ui sub process function 
			if( $args['page_section'] == 'sp_variations' ) {

				add_action('woocommerce_product_after_variable_attributes', function( $loop, $variation_data, $variation ) use($form_definition, $form, $args) {
				
					// NOTE: id is standard column name that we use for our options module based simple entity storage, so for the legacy admin flows also where necessary we can simply use the same where the necessity arise to maintain one uniqid and I think it will be almost always. 
					$args['id'] = absint( $variation->ID );

					$form['data'] = self::instance()->get( $form_definition, $args );


					if( false ) {

					?>

						<div class="spui_custum_row sp_variations" data-variation_id="<?php echo $variation_id ; ?>" data-product_id = "<?php ?>">
					        <div class="form-row form-row-first spui_custum_assets">
					              <div class="spui_form_row_title">
					                  <h5><?php echo eowbc_lang("Gallery Image", 'woo-bundle-choice') ?></h5>
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
					                  <h5> <?php echo eowbc_lang("Video &amp; Custum Field", 'woo-bundle-choice') ?></h5>
					            </div>
					            <div class="spui_custum_video_container">
					                <div class="spui_video_links">
					                    <a href="#" class="btn">
					                        <img src="https://cdn-icons.flaticon.com/png/512/797/premium/797592.png?token=exp=1653727260~hmac=c2ce871afdfde03d00785cbf295ff801" class="img-fluid">
					                    </a>
					                    <p> <?php echo eowbc_lang("video", 'woo-bundle-choice') ?></p>
					                </div>
					    
					                <div class="spui_video_input_field">
					                    <input type="text" class="short wc_input_decimal" style="" name="variable_weight[0]" id="variable_weight0" value="" placeholder="">
					                    <p> <?php echo eowbc_lang("video url", 'woo-bundle-choice') ?></p>
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
					                        <p> <?php echo eowbc_lang("images", 'woo-bundle-choice') ?></p>
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
										<a href="#" data-product_variation_loop="<?php echo absint( $loop ) ?>" data-product_variation_id="<?php echo esc_attr( $variation_id ) ?>" class="button-primary add-woo-variation-gallery-image"><?php esc_html_e( 'Add Variation Gallery Image', 'woo-variation-gallery' ) ?></a>
										<?php if ( ! woo_variation_gallery()->is_pro() ): ?>
											<a target="_blank" href="<?php echo esc_url( woo_variation_gallery()->get_backend()->get_pro_link() ) ?>" style="display: none" class="button woo-variation-gallery-pro-button"><?php esc_html_e( 'Upgrade to pro to add more images and videos', 'woo-variation-gallery' ) ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>

					<?php
					}

					$this->render_ui_sub_process($form, $args);

				}, 10, 3 );
			}

		} else {

			$form['data'] = self::instance()->get( $form_definition, $args );

			$this->render_ui_sub_process($form, $args);
		}		
	}

	public function render_ui_sub_process($form, $args = null) {

		echo \eo\wbc\model\admin\Form_Builder::instance()->build($form);

		parent::load_asset($args);	
		
		//	if there is any module specific js or css then it should be loaded view file or asset.php file -- both have their pros and cons. but I think asset.php is for flows var a asset file was necessary and where view is available we can simply put such js/css stuff there but in case of the admin also now we are moving the render related logic model and so maybe there will be little things in the view file 
		
	}

	public function get( $form_definition, $args = null ) {
		
		if( !empty($args['is_legacy_admin']) ) {

			$form_definition = parent::get( $form_definition, $args );	
		} else {

		}

	    return $form_definition;
	}

	public function save( $form_definition, $is_auto_insert_for_template=false, $args = null ) {

		$res = null;			
		
		if( !empty($args['is_legacy_admin']) ) {

			//	in case of legacy admin bind to hooks if applicable otherwise can simply call render ui sub process function 
			if( $args['page_section'] == 'sp_variations' ) {

				add_action( 'woocommerce_save_product_variation', function( $variation_id, $loop ) {

					$args['id'] = absint( $variation_id );

					// maybe this hook is need to be moved controller right before the form_definition is passed to parent class function. and the form_definition will be filter parameter. -- and yeah there would be one hook only that maybe needed. not separate needed for render and save 
					// apply_filters('sp_variations_data_before_save', '');

					$res = parent::save( $form_definition, $is_auto_insert_for_template, $args );	
				}, 10, 2 );
			}

		} else {


		}

        return $res;
	}

}
