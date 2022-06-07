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

	public function legacy_admin(){

		private function admin_data_tab_render( $attributes, $attributes_options, $extra_args ) {
		private function admin_data_tab_save( $attributes, $attributes_options, $extra_args ) {
	}

	private function admin_data_tab_inline_css(){
		?>
		<style>
				        .spui_custum_row {
				            float: left;
				            width: 100%;
				        }
				        .form-row.form-row-first.spui_custum_assets {
				            width: 100%;
				            float: left;
				        }
				        .spui_form_row_title {
				            float: left;
				            width: 100%;
				            /* border-bottom: 1px solid #eee; */
				            padding-bottom: .5rem;
				            margin-bottom: 0.5rem;
				        }
				        .spui_form_asset_container.upload_image {
				            float: left;
				            width: 100%;
				            display: flex;
				            align-items: flex-start;
				            position: relative;
				            flex-wrap: wrap;
				        }
				        .spui_form_asset_container a.upload_image_button {
				            margin-right: 7px;
				        }
				        .spui_asset_upload_cta {
				            align-self: center;
				        }
				        .spui_asset_upload_cta a.btn {
				            width: 50px;
				            height: 50px;
				            display: flex;
				            text-align: center;
				            font-size: 30px;
				            line-height: 1;
				            align-items: center;
				            justify-content: center;
				            padding: 1rem;
				        }
				        .spui_asset_upload_cta a.btn {
				            padding: 1rem;
				            background: #fff;
				            border: 1px solid #4183c4;
				        }

				        .spui_form_second_row {
				            float: left !important;
				            width: 100% !important;
				            margin-top: .5rem;
				            margin-bottom: 0.5rem;
				            border-bottom: 1px solid #eee;
				            padding-bottom: 0.5rem;
				        }

				        .spui_custum_video_container {
				            float: left;
				            width: 100%;
				            display: flex;
				            flex-wrap: wrap;
				            gap: 1em;
				            align-items: center;
				        }
				        .spui_video_links {
				            flex: 0 0 3%;
				        }
				        .spui_video_links a.btn img.img-fluid {
				            max-width: 100%;
				            display: block;
				        }
				        .spui_video_input_field {
				            flex: 0 1 44%;
				            border-right: 1px solid #eee;
				            padding-right: 1rem;
				        }
				        .asset_section_two {
				            flex: 0 1 12%;
				        }
				        .asset_content {
				            flex: 0 1 100%;
				            text-align: center;
				        }
				        .spui_custum_video_container p {
				            padding-top: .2rem;
				        }
				        .spui_video_input_field p {
				            text-align: center;
				            text-transform: capitalize;
				        }
				        .spui_video_links p {
				            text-align: center;
				            text-transform: capitalize;
				        }

		</style>
		<?php
	}

	private function admin_data_tab_render( $attributes, $attributes_options, $extra_args ) {

		

		add_action('woocommerce_product_after_variable_attributes', function(){
			$variation_id   = absint( $variation->ID );
			// $gallery_images = get_post_meta( $variation_id, 'woo_variation_gallery_images', true );
			$gallery_images = get_post_meta( $variation_id, 'sp_variations_data', true );


			apply_filters('sp_variations_data_before_admin_form_render', 'admin_data_tab_render');

			$this->admin_data_tab_inline_css();

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
		, 10, 3 );
	}

	private function admin_data_tab_save( $attributes, $attributes_options, $extra_args ) {

		need to be execured once, no matter how many extensions call it. 


		hook to register attributes that define variations 


		hook to register logical fields that requires variations specific data save 
		
		if ( !empty( wbc()->sanitize->post['woo_variation_gallery'] ) ) {

			if ( !empty( wbc()->sanitize->post['woo_variation_gallery'][ $variation_id ] ) ) {
			
				// drashti ne kevanu 6 update_post_meta
				$gallery_image_ids = array_map( 'absint', wbc()->sanitize->post['woo_variation_gallery'][ $variation_id ] );
				update_post_meta( $variation_id, 'sp_variations_data', $gallery_image_ids );
			} else {
				delete_post_meta( $variation_id, 'sp_variations_data' );
			}
		} else {
			delete_post_meta( $variation_id, 'sp_variations_data' );
		}
		
	}

	public function render_ui() {
		
	}


}
