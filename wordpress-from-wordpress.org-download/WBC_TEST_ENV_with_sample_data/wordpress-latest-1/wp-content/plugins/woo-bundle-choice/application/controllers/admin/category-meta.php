<?php
namespace eo\wbc\controllers\admin;

defined( 'ABSPATH' ) || exit;

class Category_Meta {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function add_category_term_form($attribute) {

		add_action('admin_enqueue_scripts',function(){		
			wp_enqueue_media();				
		});

		add_action('current_screen', array($this,'init_terms_form'));		
		add_action( 'admin_footer',function(){
			wc_enqueue_js(
				"jQuery(document).ready(function( $ ) {						
					jQuery('input#submit.button.button-primary').off('click');
				});"
			);
		});
	}

	public function init_terms_form(){
		/*add_action('created_term', array($this,'save_terms'), 10, 3);
		add_action('edit_term', array($this,'save_terms'), 10, 3);*/
		add_action('create_product_cat', array($this,'save_terms'), 10, 1);
		add_action('edited_product_cat', array($this,'save_terms'), 10, 1);

		
		add_action('product_cat_add_form_fields', array($this, 'add_field'),10,1);				
		add_action('product_cat_edit_form_fields', array($this, 'edit_field'), 10, 1);
		add_filter('manage_edit-product_cat_columns', array($this, 'columns'),10,1);		
		add_filter('manage_product_cat_custom_column', array($this, 'column'), 10,3);
	}
	
	public function add_field($term) {
		$this->image_chooser(false,$term);
	}


	public function edit_field($term) {
		
		$this->image_chooser(true,$term);		
	}
	
	public function image_chooser($is_edit = false,$term = false) {
		global $woocommerce;
		$image_src = '';
		if ($is_edit and !empty(get_term_meta( $term->term_id,'wbc_attachment',true))) {
			$image_src = get_term_meta( $term->term_id,'wbc_attachment',true);
		} else {
			$image_src = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
		}
		ob_start();				
		?>		
		<div class="form-field" style="overflow:visible;">			
			<?php if($is_edit): ?>
				<th scope="row" valign="top">
			<?php endif; ?>
				<label><?php _e('Filter Selected Image', 'woo-bundle-choice'); ?></label>
			<?php if($is_edit): ?>
					</th>
					<td>
			<?php endif; ?>					
				<div>
					<input type="hidden" name="wbc_attachment" id="wbc_attachment">
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
							title: 'Filter Selected Image',
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
	public function save_terms($term_id) {
		
		//var_dump($_REQUEST);		
		if(isset($_POST['wbc_attachment'])) {			

			function_exists( 'update_term_meta' ) ? update_term_meta( $term_id,'wbc_attachment',wbc()->sanitize->post('wbc_attachment')) : update_metadata( 'woocommerce_term', $term_id,'wbc_attachment',wbc()->sanitize->post('wbc_attachment') );
		}
	}

	public function columns($columns) {

		$column_title = 'Image';
		$column_key = 'image';

		if(is_array($columns) and !empty($columns)){
			$__columns = array();
			if(!empty($columns['cb'])){
				$__columns['cb'] = $columns['cb'];				
				unset($columns['cb']);			
			}			
			$__columns[$column_key] = __($column_title, 'woo-bundle-choice');
			$columns = array_merge($__columns, $columns);	
		}
		return $columns;
	}

	public function column($columns, $column, $id) {
		
		global $woocommerce; 
		if ($column == 'image') {
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

}


