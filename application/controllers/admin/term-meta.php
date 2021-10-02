<?php
namespace eo\wbc\controllers\admin;

defined( 'ABSPATH' ) || exit;

class Term_Meta {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function add_attrubute_term_form($attribute) {

		$this->taxonomy = wbc()->sanitize->get('taxonomy');
		$this->attribute_slug = substr($attribute,3);
		wbc()->load->model('category-attribute');
		$this->attribute = \eo\wbc\model\Category_Attribute::instance()->get_attribute($this->attribute_slug);

		add_action('admin_enqueue_scripts',function(){		
			wp_enqueue_media();				
		});

		add_action('current_screen', array($this,'init_terms_form'));
		add_action('created_term', array($this,'save_terms'), 10, 3);
		add_action('edit_term', array($this,'save_terms'), 10, 3);
		add_action( 'admin_footer',function(){
			wc_enqueue_js(
				"jQuery(document).ready(function( $ ) {						
					jQuery('input#submit.button.button-primary').off('click');
				});"
			);
		});
		//die();
	}

	public function init_terms_form(){
		
		if (wc_get_attribute_taxonomies()) {
			
			foreach (wc_get_attribute_taxonomies() as $tax) {
				
				add_action('pa_' . $tax->attribute_name . '_add_form_fields', array($this, 'add_attribute_field'));
				
				add_action('pa_' . $tax->attribute_name . '_edit_form_fields', array($this, 'edit_attributre_field'), 10, 2);

				add_filter('manage_edit-pa_' . $tax->attribute_name . '_columns', array(&$this, 'attribute_columns'));
				
				add_filter('manage_pa_' . $tax->attribute_name . '_custom_column', array(&$this, 'attribute_column'), 10, 3);
			}
		}		
	}
	
	public function add_attribute_field() {

		if(!empty($this->attribute)) {
			$this->woocommerce_add_attribute_thumbnail_field();
			switch ($this->attribute->attribute_type) {
				case 'color':					
					$this->color_chooser();
					break;

				case 'image' or 'image_text' or 'dropdown_image' or 'dropdown_image_only':
					$this->image_chooser();
					break;

				case 'button':
					break;				
			}
		}
	}
	

	public function edit_attributre_field($term, $taxonomy) {
		if(!empty($this->attribute)) {
			$this->woocommerce_edit_attributre_thumbnail_field($term,$taxonomy);
			switch ($this->attribute->attribute_type) {
				case 'color':					
					$this->color_chooser(true,$term, $taxonomy);
					break;

				case 'image' or 'image_text' or 'dropdown_image' or 'dropdown_image_only':
					$this->image_chooser(true,$term, $taxonomy);
					break;

				case 'button':
					break;				
			}

		}
	}

	public function color_chooser($is_edit = false,$term = false, $taxonomy = false) {

		ob_start();
		?>
			<div class="form-field term-slug-wrap">
				<?php if($is_edit): ?>
					<th scope="row" valign="top">
				<?php endif; ?>
						<label for="tag-slug">Color</label>
				<?php if($is_edit): ?>
					</th>
					<td>
				<?php endif; ?>				
				<input name="wbc_color" id="wbc_color" type="color" class="wbc_color"  style="width: 94%;" value='<?php echo ($is_edit?get_term_meta( $term->term_id,'wbc_color',true):''); ?>'>	
				<p>Choose a color to be shown as option on variation form.</p>
				<?php if($is_edit): ?>
					</td>
				<?php endif; ?>
			</div>			
		<?php
		echo ob_get_clean();
	}	

	public function image_chooser($is_edit = false,$term = false, $taxonomy = false) {
		global $woocommerce;
		$image_src = '';
		if ($is_edit) {
			$image_src = get_term_meta( $term->term_id,'wbc_attachment',true);
			if(empty($image_src)){
				$image_src = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
			}
		} else {
			$image_src = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
		}
		ob_start();				
		?>		
		<div class="form-field" style="overflow:visible;">			
			<?php if($is_edit): ?>
				<th scope="row" valign="top">
			<?php endif; ?>
				<label><?php _e('Image', 'woo-bundle-choice'); ?></label>
			<?php if($is_edit): ?>
					</th>
					<td>
			<?php endif; ?>					
				<div>
					<input type="hidden" name="wbc_attachment" value="<?php echo $image_src; ?>" id="wbc_attachment">
					<img src="<?php echo $image_src; ?>" width="100" height="100" id="wbc_thumb_img"/>
				</div>
				<br/>				
				<div>					
					<button class="ui button wbc_thumb_button button" style="padding: 0.6em;">
						<?php _e('Choose Image', 'woo-bundle-choice'); ?>						
					</button>					
				</div>
				
				<script type="text/javascript">					

					jQuery(document).on("click",".wbc_thumb_button",function(){
						wp_media = wp.media({
							title: 'Term Image',
							button: {
								text: 'Choose Image'
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
			<?php if($is_edit): ?>
				</td>
			<?php endif; ?>
		</div>		
		<?php		
		echo ob_get_clean();
	}
							

	//Saves the product attribute taxonomy term data
	public function save_terms($term_id, $tt_id, $taxonomy) {
		
		//var_dump($_REQUEST);		
		if(isset($_POST['wbc_attachment'])) {			

			function_exists( 'update_term_meta' ) ? update_term_meta( $term_id,'wbc_attachment',wbc()->sanitize->post('wbc_attachment')) : update_metadata( 'woocommerce_term', $term_id,'wbc_attachment',wbc()->sanitize->post('wbc_attachment') );

		} elseif(isset($_POST['wbc_color'])) {			

			function_exists( 'update_term_meta' ) ? update_term_meta( $term_id,'wbc_color',wbc()->sanitize->post('wbc_color') ) : update_metadata( 'woocommerce_term', $term_id,'wbc_color',wbc()->sanitize->post('wbc_color') );
		}		

		if(isset($_POST['wbc_attachment_thumb'])) {			

			function_exists( 'update_term_meta' ) ? update_term_meta( $term_id,$taxonomy . '_attachment',wbc()->sanitize->post('wbc_attachment_thumb')) : update_metadata( 'woocommerce_term', $term_id,$taxonomy . '_attachment',wbc()->sanitize->post('wbc_attachment_thumb') );

		}
	}

	public function attribute_columns($columns) {
		$columns = $this->woocommerce_product_attribute_columns($columns);
		$column_title = '';
		$column_key = '';
		if(!empty($this->attribute)) {			
			switch ($this->attribute->attribute_type) {
				case 'color':					
					$column_title = 'Color';
					$column_key = 'color';
					break;

				case 'image' or 'image_text' or 'dropdown_image' or 'dropdown_image_only':
					$column_title = 'Image';
					$column_key = 'image';
					break;				
			}
		}

		if(is_array($columns) and !empty($columns)){
			$__columns = array();		
			$__columns['cb'] = $columns['cb'];			
			$__columns[$column_key] = __($column_title, 'woo-bundle-choice');			
			unset($columns['cb']);			
			$columns = array_merge($__columns, $columns);	
		}
		return $columns;
	}

	public function attribute_column($columns, $column, $id) {
		$columns = $this->woocommerce_product_attribute_column($columns, $column, $id);
		global $woocommerce; 
		if ($column == 'color'){			
			$color = '#ffffff';			
			if (get_term_meta( $id,'wbc_color')) {
	            $color = get_term_meta( $id,'wbc_color',true);	            
	        } 

	        if(empty($color)) {
	        	$color = '#ffffff';			
	        }			
			$columns .= '<div style="height:48px;width:48px;background-color: '.$color.';"></div>';

		} elseif (in_array($column,array('image','image_text','dropdown_image','dropdown_image_only'))) {
			$src='';
			if (get_term_meta( $id, 'wbc_attachment')) {

	            $src = get_term_meta( $id, 'wbc_attachment');
	            if(is_array($src)){
	                $src = $src[0];
	            }            
	        } else {
	            $src = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
	        }			
			$columns .= '<img src="' . esc_url( $src ) . '" alt="' . esc_attr__( 'Thumbnail', 'woo-bundle-choice' ) . '" class="wp-post-image" height="48" width="48" />';
		}
		//die($columns);
		return $columns;
	}

	//The field used when adding a new term to an attribute taxonomy
	public function woocommerce_add_attribute_thumbnail_field() {
		global $woocommerce;				
		?>		
		<div class="form-field" style="overflow:visible;">
			
			<div id="swatch-photo">
				<label><?php _e('Thumb Image', 'woo-bundle-choice'); ?></label>
				
				<div>
					<input type="hidden" name="wbc_attachment_thumb" id="wbc_attachment_thumb">
					<img src="<?php echo $woocommerce->plugin_url() . '/assets/images/placeholder.png' ?>" width="60" height="60" id="wbc_attachment_thumb_img"/>
				</div>				
				<div>					
					<button type="submit" class="wbc_attachment_thumb_button button">
						<?php _e('Add/Edit image', 'woo-bundle-choice'); ?>						
					</button>					
				</div>
				
				<script type="text/javascript">					

					jQuery(document).on("click",".wbc_attachment_thumb_button",function(){
						wp_media = wp.media({
							title: 'Term Thumb Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						})
						.on('select', function() {

							var attachment = wp_media.state().get('selection').first().toJSON();
							jQuery('#wbc_attachment_thumb_img').attr('src', attachment.url);
							jQuery('#wbc_attachment_thumb').val( attachment.url);
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
		
		if (get_term_meta( $term->term_id, $taxonomy . '_attachment',true)) {

            $src = get_term_meta( $term->term_id, $taxonomy . '_attachment',true);            
        } else {
            $src = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
        }

		?>		
		<tr class="form-field" style="overflow:visible;">			
			<th scope="row" valign="top">
				<label><?php _e('Image', 'woo-bundle-choice'); ?></label>
			</th>			
			<td>
				<div>
					<input type="hidden" name="wbc_attachment_thumb" id="wbc_attachment_thumb" value="<?php _e($src); ?>">
					<img src="<?php _e($src); ?>" width="60" height="60" id="wbc_attachment_thumb_img"/>
				</div>
					
				<div>					
					<button type="submit" class="wbc_attachment_thumb_button button">
						<?php _e('Add/Edit image', 'woo-bundle-choice'); ?>						
					</button>				
				</div>
				
				<script type="text/javascript">	
					jQuery(document).on("click",".wbc_attachment_thumb_button",function(){
						wp_media = wp.media({
							title: 'Term Thumb Image',
							button: {
								text: 'Choose Image'
							},
							multiple: false
						})
						.on('select', function() {

							var attachment = wp_media.state().get('selection').first().toJSON();
							jQuery('#wbc_attachment_thumb_img').attr('src', attachment.url);
							jQuery('#wbc_attachment_thumb').val( attachment.url);
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
			$__columns['thumbnail'] = __('Thumbnail', 'woo-bundle-choice');			
			unset($columns['cb']);			
			$columns = array_merge($__columns, $columns);	
		}
		return $columns;
	}

	//Renders the custom column as defined in woocommerce_product_attribute_columns.
	public function woocommerce_product_attribute_column($columns, $column, $id) {
		
		global $woocommerce; 

		if ($column == 'thumbnail') :			

			$src='';
			if (get_term_meta( $id, $this->taxonomy . '_attachment',true)) {
	            $src = get_term_meta( $id, $this->taxonomy . '_attachment',true);            
	        } else {
	            $src = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
	        }			
			$columns .= '<img src="' . esc_url( $src ) . '" alt="' . esc_attr__( 'Thumbnail', 'woo-bundle-choice' ) . '" class="wp-post-image" height="48" width="48" />';
		endif;		
		return $columns;
	}

	public function add_taxonomy_type() {

		// Add additional type so we get the kind of the attribute's behaviour.
		add_filter( 'product_attributes_type_selector',function($type){
			$type['button']='Button';
			$type['color']='Color';
			$type['image']='Icon';
			$type['image_text']='Icons with Text';
			$type['dropdown_image']='Dropdown with Icons';
			$type['dropdown_image_only']='Dropdown with Icons Only';
			$type['dropdown']='Dropdown';

			return $type;
		}, 10, 1 );

		add_action( 'woocommerce_after_edit_attribute_fields',array($this,'edit_taxonomy_form'), 10, 1 );
		add_action( 'woocommerce_after_add_attribute_fields',array($this,'add_taxonomy_form'), 10, 1 );
	}

	public function add_taxonomy_form() {
		ob_start();
		?>
			<div class="form-field term-slug-wrap">				
				<label for="tag-slug">Ribbon Color</label>
				<input name="wbc_color" id="wbc_color" type="color" class="wbc_color"  style="width: 94%;" value=''>	
				<p>Choose a color for the ribbon on variation form.</p>
			</div>			
		<?php
		echo ob_get_clean();
	}

	public function edit_taxonomy_form() {	
		
		if(empty(wbc()->sanitize->get('edit'))) return;
		
		$taxonomy_id = wbc()->sanitize->get('edit');
		/*wbc()->load->model('category-attribute');
		eo\wbc\model\Category_Attribute::instance()->get_attribute($taxonomy_id);*/
		
		ob_start();
		?>
			<div class="form-field term-slug-wrap">				
				<th scope="row" valign="top">				
					<label for="tag-slug">Ribbon Color</label>				
				</th>
				<td>
					<input name="wbc_color" id="wbc_color" type="color" class="wbc_color"  style="width: 94%;" value='<?php echo get_term_meta( $taxonomy_id ,'wbc_ribbon_color',true); ?>'>	
					<p>Choose a color for the ribbon on variation form.</p>
				</td>
			</div>			
		<?php
		echo ob_get_clean();
	}

	public function save_taxonomy_form($id, $data) {
		if(!empty(wbc()->sanitize->post('wbc_color'))) {
			update_term_meta($id,'wbc_ribbon_color',wbc()->sanitize->post('wbc_color'));
		}		
	}
}


