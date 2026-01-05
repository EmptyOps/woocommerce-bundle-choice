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




			
				// add_action('pa_' . $tax->attribute_name . '_add_form_fields', array($this, 'add_attribute_field_display_limit'));
				
				// add_action('pa_' . $tax->attribute_name . '_edit_form_fields', array($this, 'edit_attributre_field_display_limit'), 10, 2);

				// add_filter('manage_edit-pa_' . $tax->attribute_name . '_columns', array(&$this, 'attribute_columns_display_limit'));
				
				// add_filter('manage_pa_' . $tax->attribute_name . '_custom_column', array(&$this, 'attribute_column_display_limit'), 10, 3);

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

	public function add_attribute_field_display_limit() {

		if(!empty($this->attribute)) {
			// $this->woocommerce_add_attribute_thumbnail_field();

			$this->display_limit();
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

	public function edit_attributre_field_display_limit($term, $taxonomy) {
		if(!empty($this->attribute)) {
			// $this->woocommerce_edit_attributre_thumbnail_field($term,$taxonomy);
			
			$this->display_limit();

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
				<input name="wbc_color" id="wbc_color" type="color" class="wbc_color" style="width: 94%;" value="<?php echo esc_attr(($is_edit ? get_term_meta($term->term_id, 'wbc_color', true) : '')); ?>">
				<p>Choose a color to be shown as option on variation form.</p>
				<?php if($is_edit): ?>
					</td>
				<?php endif; ?>
			</div>			
		<?php
		echo ob_get_clean();
	}	

	public function display_limit($is_edit = false,$term = false, $taxonomy = false) {

		ob_start();
		?>
			<div class="form-field term-slug-wrap">	
				<input name="sp_variations_swatches_cat_display_limit" id="sp_variations_swatches_cat_display_limit" type="number" class="sp_variations_swatches_cat_display_limit"  style="width: 94%;">	
				<p>Limit number of swatches options to display on shop/category page Loopbox.</p>
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
				<label><?php esc_html_e('Image', 'woo-bundle-choice'); ?></label>
			<?php if($is_edit): ?>
					</th>
					<td>
			<?php endif; ?>					
				<div>
					<input type="hidden" name="wbc_attachment" value="<?php echo esc_url($image_src); ?>" id="wbc_attachment">
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
				    "        title: 'Term Image',\n" .
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

	public function attribute_columns_display_limit($columns) {
		// $columns = $this->woocommerce_product_attribute_columns($columns);
		$column_title = '';
		$column_key = '';
		if(!empty($this->attribute)) {			
			
			$column_title = 'Display Limit(Loopbox)';
			$column_key = 'sp_variations_swatches_cat_display_limit';	
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
			$columns .= '<div style="height:48px;width:48px;background-color: '.esc_attr($color).';"></div>';

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

	public function attribute_column_display_limit($columns, $column, $id) {
		
		// $columns = $this->woocommerce_product_attribute_column($columns, $column, $id);
		global $woocommerce; 

		$limit = wbc()->config->product_variations_configs()['sp_variations_swatches_cat_display_limit'];			
		if (get_term_meta( $id,'sp_variations_swatches_cat_display_limit')) {
            
            $limit = get_term_meta( $id,'sp_variations_swatches_cat_display_limit',true);
        } 

        if (empty($limit)) {
        	$limit = wbc()->config->product_variations_configs()['sp_variations_swatches_cat_display_limit'];			
        }			
		$columns .= '<div '.esc_attr($limit).' ></div>';

		return $columns;
	}

	//The field used when adding a new term to an attribute taxonomy
	public function woocommerce_add_attribute_thumbnail_field() {
		global $woocommerce;				
		?>		
		<div class="form-field" style="overflow:visible;">
			
			<div id="swatch-photo">
				<label><?php esp_html_e('Thumb Image', 'woo-bundle-choice'); ?></label>
				
				<div>
					<input type="hidden" name="wbc_attachment_thumb" id="wbc_attachment_thumb">
					<img src="<?php echo esc_url($woocommerce->plugin_url()) . '/assets/images/placeholder.png'; ?>" width="60" height="60" id="wbc_attachment_thumb_img"/>
				</div>

				<div>					
					<button type="submit" class="wbc_attachment_thumb_button button">
						<?php esp_html__e('Add/Edit image', 'woo-bundle-choice'); ?>						
					</button>					
				</div>
				<?php 
				// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$inline_script =
				    "jQuery(document).on(\"click\",\".wbc_attachment_thumb_button\",function(){\n" .
				    "    wp_media = wp.media({\n" .
				    "        title: 'Term Thumb Image',\n" .
				    "        button: {\n" .
				    "            text: 'Choose Image'\n" .
				    "        },\n" .
				    "        multiple: false\n" .
				    "    })\n" .
				    "    .on('select', function() {\n" .
				    "        var attachment = wp_media.state().get('selection').first().toJSON();\n" .
				    "        jQuery('#wbc_attachment_thumb_img').attr('src', attachment.url);\n" .
				    "        jQuery('#wbc_attachment_thumb').val( attachment.url);\n" .
				    "    })\n" .
				    "    .open();\n" .
				    "    return false;\n" .
				    "});\n";
				wbc()->load->add_inline_script('', $inline_script, 'common');	
				?>
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
				<label><?php esc_html_e('Image', 'woo-bundle-choice'); ?></label>
			</th>			
			<td>
				<div>
					<input type="hidden" name="wbc_attachment_thumb" id="wbc_attachment_thumb" value="<?php _e(esc_url($src)); ?>">
					<img src="<?php _e(esc_url($src)); ?>" width="60" height="60" id="wbc_attachment_thumb_img"/>
				</div>
					
				<div>					
					<button type="submit" class="wbc_attachment_thumb_button button">
						<?php esc_html_e('Add/Edit image', 'woo-bundle-choice'); ?>						
					</button>				
				</div>
				<?php 
				// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$inline_script =
				    "jQuery(document).on(\"click\",\".wbc_attachment_thumb_button\",function(){\n" .
				    "    wp_media = wp.media({\n" .
				    "        title: 'Term Thumb Image',\n" .
				    "        button: {\n" .
				    "            text: 'Choose Image'\n" .
				    "        },\n" .
				    "        multiple: false\n" .
				    "    })\n" .
				    "    .on('select', function() {\n" .
				    "        var attachment = wp_media.state().get('selection').first().toJSON();\n" .
				    "        jQuery('#wbc_attachment_thumb_img').attr('src', attachment.url);\n" .
				    "        jQuery('#wbc_attachment_thumb').val( attachment.url);\n" .
				    "    })\n" .
				    "    .open();\n" .
				    "    return false;\n" .
				    "});\n";
				wbc()->load->add_inline_script('', $inline_script, 'common');	
				?>	
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

		/*ACTIVE_TODO_OC_START
		@s admin pannel ma field add karvnu 6 woocommerce attribute page par jay already mahesh bhai e 1-2 field add karel 6 tya admin na section ma add akaravanu chhe. -- to s 
		ACTIVE_TODO_OC_END*/

		// Add additional type so we get the kind of the attribute's behaviour.
		add_filter( 'product_attributes_type_selector',function($type){

			$type = array_merge($type, \eo\wbc\model\publics\data_model\SP_WBC_Variations::instance()->sp_variations_swatches_supported_attribute_types());


			return $type;
		}, 10, 1 );

		add_action( 'woocommerce_after_edit_attribute_fields',array($this,'edit_taxonomy_form'), 10, 1 );
		add_action( 'woocommerce_after_add_attribute_fields',array($this,'add_taxonomy_form'), 10, 1 );

		add_action( 'woocommerce_after_edit_attribute_fields',array($this,'edit_taxonomy_form_feild_1'), 10, 1 );
		add_action( 'woocommerce_after_add_attribute_fields',array($this,'add_taxonomy_form_feild_1'), 10, 1 );
		
		add_action( 'woocommerce_after_edit_attribute_fields',array($this,'edit_taxonomy_form_feild_2'), 10, 1 );
		add_action( 'woocommerce_after_add_attribute_fields',array($this,'add_taxonomy_form_feild_1'), 10, 1 );
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
					<input name="wbc_color" id="wbc_color" type="color" class="wbc_color"  style="width: 94%;" value="<?php echo esc_attr(get_term_meta( $taxonomy_id, 'wbc_ribbon_color', true)); ?>">
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


	public function add_taxonomy_form_feild_1() {
		ob_start();
		?>
			<div class="form-field term-slug-wrap">				
				<label for="tag-slug">Display Limit(Loopbox)</label>
				<input name="sp_variations_swatches_cat_display_limit" id="sp_variations_swatches_cat_display_limit" type="number" value="<?php echo esc_attr(wbc()->config->product_variations_configs()['sp_variations_swatches_cat_display_limit']); ?>" class="sp_variations_swatches_cat_display_limit"  style="width: 94%;">
				<p>Limit number of swatches options to display on shop/category page Loopbox.</p>
			</div>	

		<?php
		echo ob_get_clean();
	}

	public function edit_taxonomy_form_feild_1() {	
		
		if(empty(wbc()->sanitize->get('edit'))) return;
		
		$taxonomy_id = wbc()->sanitize->get('edit');
		/*wbc()->load->model('category-attribute');
		eo\wbc\model\Category_Attribute::instance()->get_attribute($taxonomy_id);*/
		
		ob_start();
		?>
			
			<?php 
				$display_limit = get_term_meta( $taxonomy_id ,'sp_variations_swatches_cat_display_limit',true);
				if (empty($display_limit)) {
					$display_limit = wbc()->config->product_variations_configs()['sp_variations_swatches_cat_display_limit'];
				}
			?>
			<div class="form-field term-slug-wrap">				
				<th scope="row" valign="top">				
					<label for="tag-slug">Display Limit(Loopbox)</label>				
				</th>
				<td>
				    <input name="sp_variations_swatches_cat_display_limit" id="sp_variations_swatches_cat_display_limit" type="number" class="sp_variations_swatches_cat_display_limit" style="width: 94%;" value="<?php echo esc_attr($display_limit); ?>">
				    <p>Limit the number of swatch options to display on the shop/category page Loopbox.</p>
				</td>
			</div>

		<?php
		echo ob_get_clean();
	}

	public function save_taxonomy_form_feild_1($id, $data) {
		
		if(!empty(wbc()->sanitize->post('sp_variations_swatches_cat_display_limit'))) {
			update_term_meta($id,'sp_variations_swatches_cat_display_limit',wbc()->sanitize->post('sp_variations_swatches_cat_display_limit'));
		}	


	}


	public function add_taxonomy_form_feild_2() {
		ob_start();
		?>
			<div class="form-field term-slug-wrap">				
				<label for="tag-slug">Show on shop page(Loopbox)</label>
				<input name="sp_variations_swatches_show_on_shop_page" id="sp_variations_swatches_show_on_shop_page" type="checkbox" value="1" checked class="sp_variations_swatches_show_on_shop_page"  style="width: 94%;" >	
				<p>Show swatches options for this attribute on shop/category page Loopbox.</p>
			</div>	

		<?php
		echo ob_get_clean();
	}

	public function edit_taxonomy_form_feild_2() {	
		
		if(empty(wbc()->sanitize->get('edit'))) return;
		
		$taxonomy_id = wbc()->sanitize->get('edit');
		/*wbc()->load->model('category-attribute');
		eo\wbc\model\Category_Attribute::instance()->get_attribute($taxonomy_id);*/
		
		ob_start();
		?>
			<?php 
				$show_on_shop_page = get_term_meta( $taxonomy_id ,'sp_variations_swatches_show_on_shop_page',true);
				if (empty($show_on_shop_page)) {
					$show_on_shop_page = 1;
				}
			?>
			<div class="form-field term-slug-wrap">				
				<th scope="row" valign="top">				
					<label for="tag-slug">Show on shop page(Loopbox)</label>				
				</th>
				<td>
					<input name="sp_variations_swatches_show_on_shop_page" id="sp_variations_swatches_show_on_shop_page" type="checkbox" class="sp_variations_swatches_show_on_shop_page" style="width: 94%;" value="1"<?php echo ($show_on_shop_page == 1 ? ' checked' : ''); ?>>
					<p>Show swatches options for this attribute on shop/category page Loopbox.</p>
				</td>
			</div>
		<?php
		echo ob_get_clean();
	}

	public function save_taxonomy_form_feild_2($id, $data) {
		
		if(!empty(wbc()->sanitize->post('sp_variations_swatches_show_on_shop_page'))) {
			update_term_meta($id,'sp_variations_swatches_show_on_shop_page',wbc()->sanitize->post('sp_variations_swatches_show_on_shop_page'));
		}else{
			update_term_meta($id,'sp_variations_swatches_show_on_shop_page',-1);
		}

	}
}


