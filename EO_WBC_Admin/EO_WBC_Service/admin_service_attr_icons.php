<?php
namespace admin\service;
class AttrIcons{
	
	public function __construct(){
		
		$this->is_attributes_page = false;
		if (!empty($_GET['taxonomy']) and strpos($_GET['taxonomy'], 'pa_') !== false ){
			$this->is_attributes_page = true;
			$this->taxonomy = $_GET['taxonomy'];
			$this->meta_key = 'wbc_thumb_';
		}		

		if (is_admin()) {
			
			add_action('admin_enqueue_scripts',function(){
				if($this->is_attributes_page){
					wp_enqueue_media();
				}
			});
			
			add_action('current_screen', array(&$this, 'init_attribute_image_selector'));

			add_action('created_term', array(&$this, 'woocommerce_attribute_thumbnail_field_save'), 10, 3);
			
			add_action('edit_term', array(&$this, 'woocommerce_attribute_thumbnail_field_save'), 10, 3);	

			add_action( 'admin_footer',function(){
				
				wc_enqueue_js(
					"jQuery(document).ready(function( $ ) {						
						jQuery('input#submit.button.button-primary').off('click');
					});"
				);
			});		
		}
	}

	public function init_attribute_image_selector(){
		if($this->is_attributes_page) {			
			
			if (wc_get_attribute_taxonomies()) {
				
				foreach (wc_get_attribute_taxonomies() as $tax) {

					add_action('pa_' . $tax->attribute_name . '_add_form_fields', array(&$this, 'woocommerce_add_attribute_thumbnail_field'));
					
					add_action('pa_' . $tax->attribute_name . '_edit_form_fields', array(&$this, 'woocommerce_edit_attributre_thumbnail_field'), 10, 2);

					add_filter('manage_edit-pa_' . $tax->attribute_name . '_columns', array(&$this, 'woocommerce_product_attribute_columns'));
					
					add_filter('manage_pa_' . $tax->attribute_name . '_custom_column', array(&$this, 'woocommerce_product_attribute_column'), 10, 3);
				}
			}
		}
	}

	//Saves the product attribute taxonomy term data
	public function woocommerce_attribute_thumbnail_field_save($term_id, $tt_id, $taxonomy) {
	
		if(isset($_POST['wbc_attachment'])) {			

			$res = function_exists( 'update_term_meta' ) ? update_term_meta( $term_id, $taxonomy . '_attachment',$_POST['wbc_attachment'] ) : update_metadata( 'woocommerce_term', $term_id, $taxonomy . '_attachment',$_POST['wbc_attachment'] );
		}		
	}

	//The field used when adding a new term to an attribute taxonomy
	public function woocommerce_add_attribute_thumbnail_field() {
		global $woocommerce;				
		?>		
		<div class="form-field" style="overflow:visible;">
			
			<div id="swatch-photo">
				<label><?php _e('Thumbnail', 'woo-bundle-choice'); ?></label>
				
				<div>
					<input type="hidden" name="wbc_attachment" id="wbc_attachment">
					<img src="<?php echo $woocommerce->plugin_url() . '/assets/images/placeholder.png' ?>" width="100" height="100" id="wbc_thumb_img"/>
				</div>				
				<div>					
					<button type="submit" class="wbc_thumb_button button">
						<?php _e('Add/Edit image', 'woo-bundle-choice'); ?>						
					</button>					
				</div>
				
				<script type="text/javascript">					

					jQuery(document).on("click",".wbc_thumb_button",function(){
						wp_media = wp.media({
							title: 'Add Media',
							button: {
								text: 'Insert Image'
							},
							multiple: false
						})
						.on('select', function() {

							var attachment = wp_media.state().get('selection').first().toJSON();
							jQuery('#wbc_thumb_img').attr('src', attachment.url);
							jQuery('#wbc_attachment').val( attachment.url);
						})
						.open();
						return false;
					});				
				</script>
				<div class="clear"></div>
			</div>
		</div>		
		<?php		
	}

	//Update the thumb data.
	public function woocommerce_edit_attributre_thumbnail_field($term, $taxonomy) {
		
		global $woocommerce;				
		$src = '';
		
		if (get_term_meta( $term->term_id, $this->taxonomy . '_attachment')) {

            $src = get_term_meta( $term->term_id, $this->taxonomy . '_attachment');
            if(is_array($src)) {
                $src = $src[0];
            }            
        } else {
            $src = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
        }

		?>		
		<tr class="form-field" style="overflow:visible;">			
			<th scope="row" valign="top">
				<label><?php _e('Image', 'phoen-visual-attributes'); ?></label>
			</th>			
			<td>
				<div>
					<input type="hidden" name="wbc_attachment" id="wbc_attachment" value="<?php echo $src; ?>">
					<img src="<?php echo $src; ?>" width="100" height="100" id="wbc_thumb_img"/>
				</div>
					
				<div>					
					<button type="submit" class="wbc_thumb_button button">
						<?php _e('Add/Edit image', 'woo-bundle-choice'); ?>						
					</button>					
				</div>
				
				<script type="text/javascript">	
					jQuery(document).on("click",".wbc_thumb_button",function(){
						wp_media = wp.media({
							title: 'Add Media',
							button: {
								text: 'Insert Image'
							},
							multiple: false
						})
						.on('select', function() {
							var attachment = wp_media.state().get('selection').first().toJSON();
							jQuery('#wbc_thumb_img').attr('src', attachment.url);
							jQuery('#wbc_attachment').val( attachment.url);
						})
						.open();
						return false;
					});				
				</script>
				<div class="clear"></div>
			</td>
		</tr>
		<?php
	}

	//Registers a column for this attribute taxonomy for this image.
	public function woocommerce_product_attribute_columns($columns) {
		if(is_array($columns) and !empty($columns)){
			$__columns = array();		
			$__columns['cb'] = $columns['cb'];			
			$__columns[$this->meta_key] = __('Thumbnail', 'woo-bundle-choice');			
			unset($columns['cb']);			
			$columns = array_merge($__columns, $columns);	
		}
		return $columns;
	}

	//Renders the custom column as defined in woocommerce_product_attribute_columns.
	public function woocommerce_product_attribute_column($columns, $column, $id) {
		
		global $woocommerce; 

		if ($column == $this->meta_key) :			

			$src='';
			if (get_term_meta( $id, $this->taxonomy . '_attachment')) {

	            $src = get_term_meta( $id, $this->taxonomy . '_attachment');
	            if(is_array($src)){
	                $src = $src[0];
	            }            
	        } else {
	            $src = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
	        }			
			$columns .= '<img src="' . esc_url( $src ) . '" alt="' . esc_attr__( 'Thumbnail', 'woo-bundle-choice' ) . '" class="wp-post-image" height="48" width="48" />';
		endif;		
		return $columns;
	}
}
new AttrIcons();
