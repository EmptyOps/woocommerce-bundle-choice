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
				<label><?php esc_html_e('Filter Selected Image', 'woo-bundle-choice'); ?></label>
			<?php if($is_edit): ?>
					</th>
					<td>
			<?php endif; ?>	

				<div>
					<input type="hidden" name="wbc_attachment" id="wbc_attachment">
					<img src="<?php echo esc_url($image_src); ?>" width="100" height="100" id="wbc_thumb_img"/>
				</div>

				<br/>				
				<div>					
					<button class="ui button wbc_thumb_button button" style="padding: 0.6em;">
						<?php esc_html_e('Choose Image', 'woo-bundle-choice'); ?>						
					</button>					
				</div>
				<?php 
				// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$inline_script =
				    "jQuery(document).on(\"click\",\".wbc_thumb_button\",function(){\n" .
				    "    wp_media = wp.media({\n" .
				    "        title: 'Filter Selected Image',\n" .
				    "        button: {\n" .
				    "            text: 'Choose Image'\n" .
				    "        },\n" .
				    "        multiple: false\n" .
				    "    })\n" .
				    "    .on('select', function() {\n" .
				    "        var attachment = wp_media.state().get('selection').first().toJSON();\n" .
				    "        jQuery('#wbc_thumb_img').attr('src', attachment.url);\n" .
				    "        jQuery('#wbc_attachment').val( attachment.url);\n" .
				    "    })\n" .
				    "    .open();\n" .
				    "    return false;\n" .
				    "});\n";
				wbc()->load->add_inline_script('', $inline_script, 'common');
				?>		
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


