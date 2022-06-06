<?php
/**
 *	SP WBC Variations class 
 */

namespace eo\wbc\model\publics;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Variations;

class SP_WBC_Variations extends SP_Variations {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	public function render_ui(){

	}
	public function load_asset(){

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

	public static function admin_data_tab_render( $attributes, $attributes_options, $extra_args ) {

		

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


	public static function admin_data_tab_save( $attributes, $attributes_options, $extra_args ) {

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

	public static function fetch_data( $product, maybe no other arguments are necessary like variation_id since we are going to use on single product page and from there it should load the default variation or all the variations as applicable as per the legacy flows. can also check that other plugin to find out or confirm about legacy flow. and then return the data saved from our variations admin tab defined above of default variations or all variations as applicable as per the legacy standards. $extra_args=array() ) {

		$sp_variations_data = array();	//	NOTE: this is default object format of $sp_variations_data and when there is no data available it will return empty array instead of the null or false etc. 

		this function will return also the default(or say the data that are supported and provided by legacy api) data as applicable like below image or all other such applicable default data 
		if ( $variation_image_id ) {
			// Add Variation Default Image
			array_unshift( $gallery_images, $variation_image_id );
		} else {
			// Add Product Default Image

			/*if ( has_post_thumbnail( $product_id ) ) {
				array_unshift( $gallery_images, get_post_thumbnail_id( $product_id ) );
			}*/
			$parent_product          = wc_get_product( $product_id );
			$parent_product_image_id = $parent_product->get_image_id();
			$placeholder_image_id    = get_option( 'woocommerce_placeholder_image', 0 );

			if ( ! empty( $parent_product_image_id ) ) {
				array_unshift( $gallery_images, $parent_product_image_id );
			} else {
				array_unshift( $gallery_images, $placeholder_image_id );
			}
		}

		we need to atleast return the attachment properties like post title, and so on so that they can be used as the alt tag. and we should pass if there are any other properties that needs to be used now like that plugin had returned many properties 

		also to implement the hook woocommerce_available_variation so this function will return only required data like js vars related or maybe not that one either because that can be set from the hook woocommerce_available_variation and since it is about loading the script of vars so maybe even this function will only do necessary things here like fetching and returning variations and the hook woocommerce_available_variation should be implemented in the ssm single product model that is just planned 
			-- ACTIVE_TODO/TODO we may also like to implement our own filter to disable our variations slider/zoom or entire variations support on specific categories or product, but that we will do only when that is required by any user demand. 
			--	also need to implement hook wc_ajax_get_default_gallery and also the hook wc_ajax_get_variation_gallery and just like above this hooks will also be implemented in the single product model 
				--	and maybe it is important to note that with these ajax hooks maybe woocommerce is handling all management including the changing of images in the dom, but that is not possible by woo since that do not have the bare tempalate of html or does it have? maybe it have, lets check their hooks 
					--	and so if that is possible then we do not need to manage that in our javascript layer -- ACTIVE_TODO and if that possible then we can even try sending variations images even when our slider/zoom is disabled in a hope that other slider zoom plugins read our images data and implement it(I think they will normally get the data since it is clear woo standard hooks, but now I doubt if all variations hooks are for supporting such functions because they by default are not providing the multiple variations option but maybe they are publishing hoooks for their extensions and so for others it also work?). if these hooks are for that function then it is highly likely that works -- ACTIVE_TODO and in that case we will just test the 5 sliders and 5 zoom plugin to confirm that they work well with our standard hooks implementation. 
						--	one thing that just came to the mind is that we may need to trigger the legacy variations change event when our sp_variations attribute widgets option elements like(icon panel, slider or dropdown etc. does change) 
							--	so far have not noticed that but m must have managed it somewhere because without that the prices would not be changing 

		return $sp_variations_data;
	}


}