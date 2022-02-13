<?php
/*
*	SP Product class 
*/

namespace eo\wbc\system\core\data_model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Entity;

class SP_Product extends SP_Entity {

	private static $_instance = null;

	private $platform_key = null;
	private $platform_name = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
	}

	public function __construct( $platform_key, $platform_name ) {

		$this->platform_key = $platform_key;
		$this->platform_name = $platform_name;
	}

	public function __construct() {
		throw new Exception("Sorry, only construct method with platform_key etc parameters is supported, so pass platform_key etc parameters as parameters to construct method. Default construct method is not supported.", 1);
	}

	public static function createFromArray($data_array){
		$this->create();
	}

	protected function create() {

		if(!empty($this->product) and is_array($this->product) and !empty($this->category)){
			
			$product = $this->product;
			$category = $this->category;
			
			$__name__ = null;
			for($i = 0; $i< count($product); $i++) {				 
				 $field = $product[$i];
				if($field[2]=='name'){
					$__name__ = $field[1];
				}
			}
			
			if ( empty($__name__) ){
				return true;			
			}


			/////////////////////////////
			// update 22-12-2020
			////////////////////////////
			$is_remove = false;
			$is_update_image = false;
			$is_sample_image_added = null;

			$product_columns = array_column($this->product,2);
			if(array_search('_action_column',$product_columns) !== false) {
				$action_column_index = array_search('_action_column',$product_columns);
				if( trim(strtolower(sanitize_text_field($this->product[$action_column_index][1]))) === 'remove'){
					$is_remove = true;
				}
			} elseif(array_search('_update_column',$product_columns) !== false) {
				$update_image_column_index = array_search('_update_column',$product_columns);
				if( trim(strtolower(sanitize_text_field($this->product[$update_image_column_index][1]))) === 'yes') {
					$is_update_image = true;
				}
			}

			//////////////////////////

			$__sub_category__ = null;
			for($i = 0; $i< count($product); $i++) {				 
				 $field = $product[$i];
				if($field[2]=='sub_category'){
					$__sub_category__ = $field[1];
				}
			}

			//////////////////////////////////////////
			///////// Changed@mahesh -- Thumb 
			$__thumb__ = null;
			for($i = 0; $i< count($product); $i++) {				 
				 $field = $product[$i];
				if($field[2]=='thumb'){
					$__thumb__ = $field[1];
				}
			}

			if(empty($__thumb__)){
				$product[] = array('thumb','sample_thumb','thumb');
			}

			$sku = '';
			if(array_search('sku',array_column($product,2)) !== false) {
				$sku = $product[array_search('sku',array_column($product,2) )][1];

				//////////////////////////////////////////////////////////////////////////
				// Sentry check if the SKU is repeated then remove the additional entries
				/////////////////////////////////////////////////////////////////////////
				global $wpdb;
				$product_ids = $wpdb->get_results($wpdb->prepare(
					"
					SELECT posts.ID
					FROM {$wpdb->posts} as posts
					INNER JOIN {$wpdb->wc_product_meta_lookup} AS lookup ON posts.ID = lookup.product_id
					WHERE
					posts.post_type IN ( 'product', 'product_variation' )
					AND posts.post_status != 'trash'
					AND lookup.sku = %s",
					trim($sku)
				),'ARRAY_A');

				if( !empty($product_ids) ) {

					$product_ids = array_column($product_ids,'ID');

					if(count($product_ids) > 1) {
						for ($sku_product_index = 1; $sku_product_index < count($product_ids); $sku_product_index++) { 
							if(!empty($product_ids[$sku_product_index])) {

								$sku_product = wc_get_product($product_ids[$sku_product_index]);
								if(!is_wp_error($sku_product) and !empty($sku_product)) {
									$this->delete_product($sku_product);
								}
							}
						}
					}
				}
				///////////////////////////////////////////////////////////////////////////////
				// Sentry check ends.
				///////////////////////////////////////////////////////////////////////////////
			}
						
			///////////////////////////////////////
			/////////////--END--///////////////////
			$p = null;
			//If the product is to be updated then search by the name.

			if(!empty($sku)) {
				$product_id = wc_get_product_id_by_sku(trim($sku));
				if(!empty($product_id)) {
					$p = wc_get_product($product_id);
					if(!is_wp_error($p) and !empty($p)){
						if($is_remove) {
							$this->delete_product($p);							
							return true;
						}
					}
				}

				if(constant('EO_DAPII_DEBUG')){ \EOWBC_Error_Handler::log("ENTRY BY SKU ${sku} PID: ${product_id}"); }

			} elseif(!empty($__name__)) {

				if(constant('EO_DAPII_DEBUG')){ \EOWBC_Error_Handler::log('ENTRY BY NAME '.serialize($product)); }

				$old_product = get_page_by_title( $__name__, OBJECT, 'product' );

				if(!is_wp_error($old_product) and !empty($old_product)){
					
					if('publish' === get_post_status( $old_product->ID )){

						$p = wc_get_product($old_product->ID);

						// update 22-12-2020
						if($is_remove) {
							$this->delete_product($p);							
							return true;
						}
						/////////////////						
					}					
				}
			}

			// in case the new name is provided 
			// and added remove action
			if($is_remove) {				
				return true;
			}
			
			if(is_wp_error($p) or empty($p)){
				
				$p = new WC_Product_Simple();
				$p->set_stock_quantity(1);
			}			

			$old_attachment_ids = $p->get_gallery_image_ids();
			$gallery_ids = array();
			
			$discount = 0;
			$sales_price = 0;
			$regular_price =0;

			$attributes = array();
			$meta = array();

			$__category = array();

			/*echo "<pre>";
			print_r($product);
			echo "</pre>";*/

			foreach ($product as $field) {
				if(empty($field[0]) or empty($field[2])){
					continue;
				}

				switch ($field[2]) {
					case 'name':
						$p->set_name($field[1]);
						break;					
					case 'sku':
						if(wc_product_has_unique_sku( $p->get_id(), $field[1] )){
							$p->set_sku($field[1]);
						}
						break;
					case 'regular_price':
						$regular_price = $field[1];
						$p->set_regular_price($field[1]);
						break;
					case 'sales_price':
						$sales_price = $field[1];
						//$p->set_sale_price($field[1]);
						break;
					case 'discount':
						$discount = $field[1];
						//$p->set_sale_price($field[1]);						
						break;		
					case 'lenght':
						$p->set_length($field[1]);
						break;									
					case 'width':
						$p->set_width($field[1]);
						break;
					case 'height':
						$p->set_height($field[1]);
						break;
					case 'weight':
						$p->set_weight($field[1]);
						break;
					case 'thumb': //thumb
						
						if(!empty($field[1])){		

							if(strpos($field[1],'//')===0){
								$field[1] = substr($field[1],2);
							}

							if($field[1] === 'sample_thumb' || $field[1]===wc()->plugin_url() . '/assets/images/placeholder.png') {
								break;
							}

							if( (empty($p->get_image()) or empty($p->get_image_id())) or strpos($p->get_image(),'woocommerce-placeholder')!==false) {
								
								$attach_id = $this->add_attachment($field[1]);

								if(empty($attach_id)){

									$attach_id = \eo\dapii\classes\api\Diamond_API_Lib::getInstance()->shape_based_image($__sub_category__,true);

									if($attach_id === wc()->plugin_url() . '/assets/images/placeholder.png') {
										$attach_id = false;
									}

									$is_sample_image_added = true;
								} else {
									$is_sample_image_added = false;
								}
								
								if( !empty($attach_id) and !is_wp_error($attach_id) and !empty(intval($attach_id)) ) {									
									$p->set_image_id($attach_id);
									/*$p->save();*/
								}
							} else {
								
								if(!empty(wbc()->sanitize->post('action')) and wbc()->sanitize->post('action')==='do_api_sync') {		
									
									// update on manual sync
									$attach_id = $this->add_attachment($field[1]);

									if(empty($attach_id)){
										$attach_id = \eo\dapii\classes\api\Diamond_API_Lib::getInstance()->shape_based_image($__sub_category__,true);
										$is_sample_image_added = true;
									} else {
										$is_sample_image_added = false;
									}
									
									if( !empty($attach_id) and !is_wp_error($attach_id) and !empty(intval($attach_id))) {

										if(!empty(get_post_meta($p->get_id(),'_has_sample_image',true))){
											$p->set_image_id($attach_id);
											/*$p->save();*/	
										} else {
											$ptid = $p->get_image_id();	

											$this->remove_image($ptid);

											$p->set_image_id($attach_id);
											/*$p->save();*/
										}										
									}
								} elseif(!empty($is_update_image)) {
									
									$attach_id = $this->add_attachment(esc_url( $field[1]));
									
									if( !empty($attach_id) and !is_wp_error($attach_id) and !empty(intval($attach_id)) ) {
										
										if(!empty(get_post_meta($p->get_id(),'_has_sample_image',true))){
											
											$p->set_image_id($attach_id);
											/*$p->save();*/	
										} else {
											$ptid = get_post_thumbnail_id($p->get_id());	
											$this->remove_image($ptid);
											$p->set_image_id($attach_id);
											/*$p->save();*/
										}
									}else {										
										$attach_id = \eo\dapii\classes\api\Diamond_API_Lib::getInstance()->shape_based_image($__sub_category__,true);
										$is_sample_image_added = true;
										$p->set_image_id($attach_id);
										/*$p->save();*/
									}
								} elseif(get_post_meta($p->get_id(),'_has_sample_image',true)) {									
									$attach_id = $this->add_attachment($field[1]);
									if( !empty($attach_id) and !is_wp_error($attach_id) and !empty(intval($attach_id)) ) {	
										$p->set_image_id($attach_id);
										/*$p->save();*/
										$is_sample_image_added = false;
									}
								}							
							}
						}
						/* else {
							return false;
						}*/						
						break;

					case 'cond_thumb': //thumb on condition with update
						if(!empty($field[1])){	
							if( (empty($p->get_image_id())) ) {

								$attach_id = $this->add_attachment($field[1]);
								if(empty($attach_id)){								
									$attach_id = \eo\dapii\classes\api\Diamond_API_Lib::getInstance()->shape_based_image($__sub_category__,true);								
									$is_sample_image_added = true;
									
									if(!empty($attach_id)){
										update_post_meta($attach_id,'_attachment_API_URL',trim(wp_get_attachment_link($attach_id)));
									}
								} else {
									$is_sample_image_added = false;
									update_post_meta($attach_id,'_attachment_API_URL',trim($field[1]));
								}
																				
								if( !empty($attach_id) and !is_wp_error($attach_id) and !empty(intval($attach_id))) {
									
									$p->set_image_id($attach_id);
									/*$p->save();*/
								}							
							} else {
								// update on manual sync
								$ptid = $p->get_image_id();
								
								if(get_post_meta($ptid,'_attachment_API_URL',true)!==trim($field[1])) {

									$attach_id = $this->add_attachment($field[1]);									
									if( !empty($attach_id) and !is_wp_error($attach_id) and !empty(intval($attach_id)) ) {
										
										if(!empty(get_post_meta($p->get_id(),'_has_sample_image',true))){		
											$p->set_image_id($attach_id);	
											/*$p->save();*/
										} else {		
											$this->remove_image($ptid);
											$p->set_image_id($attach_id);
											/*$p->save();*/
										}

										update_post_meta($attach_id,'_attachment_API_URL',trim($field[1]));
										$is_sample_image_added = false;
									}							
								}							
							}
						}
						/* else {
							return false;
						}*/
						break;
					case 'gallary': //gallary						
						if(!empty($field[1]) and empty($old_attachment_ids)) {
							$attach_id = $this->add_attachment($field[1]);							
							if( !empty($attach_id) and !is_wp_error($attach_id) ) {
								$gallery_ids[] = $attach_id;								
							}
						}
						break;
					case 'stock_status':
						$p->set_stock_status($field[1]=='Available'?'instock':'outofstock');
						break;
					case 'certi_link':
						$meta['_certificate_link']=$field[1];
						break;
					case 'video_link':
						$meta['_video_link']=$field[1];
						break;
					case 'meta':
						$meta[$field[0]]=$field[1];
						break;
					case 'sub_category':

						foreach (explode(',',$field[1]) as $sub_cat) {
							$sub_cat = trim($sub_cat);

							$cat_term = term_exists( sanitize_title($sub_cat), 'product_cat',$this->category);
							
							if(!empty($cat_term)) {
						   		array_push($__category,$cat_term['term_id']);
						   	} else {

								$new_category=wp_insert_term(
									        $sub_cat, // the term 
									        'product_cat', // the taxonomy
									        array(
									            'description'=> '',
									            'slug' => sanitize_title($sub_cat),
									            'parent' => $category
									        )
									    );

							    if(!is_wp_error($new_category) and !empty($new_category)) {
							        $new_category_id = isset( $new_category['term_id'] ) ? $new_category['term_id'] : 0;
							        array_push($__category,$new_category_id);					        
							    }	
							}
						}

						$__categories__ = explode(',',$field[1]);
						if(!empty($__categories__) and is_array($__categories__)){
							$meta['_meta_shape']= $__categories__[0];	
						} elseif(is_string($__categories__)) {
							$meta['_meta_shape']= $__categories__;	
						}						

						break;
					default:						
						if(substr($field[2],0,3)=='pa_'){
							$attributes[$field[2]] = $field[1];
						}
				}
			}

			if(!empty($gallery_ids)) {
				$p->set_gallery_image_ids($gallery_ids);
			}
			
			if($discount != 0 and $regular_price != 0){
				
				$sales_price = $regular_price - $discount;

			} elseif(!isset($product['sales_price'])) {
				
				$sales_price = $regular_price;
			}
			
			if($sales_price!=0){
				$p->set_sale_price($sales_price);
			}

			//$p->set_sold_individually(true);
			array_push($__category,$category);	

			$p->set_category_ids($__category);

			if(!empty($attributes)){

				$__attributes = array();
				
				foreach ($attributes as $attr=>$value) {
					
					$taxonomy = $this->get_taxonomy_by_slug($attr);
					
					if($taxonomy and !is_wp_error($taxonomy)){
						$tax_data= array (
									'attribute_name'     => $taxonomy->name,
									'attribute_taxonomy' => $taxonomy->slug,
									'attribute_id'       => $taxonomy->id,
									'term_ids'           => array(),
								);
						
						$term = get_term_by('name',$value,$taxonomy->slug);

						if(is_wp_error($term) or empty($term)){

							$term = term_exists( $value, $taxonomy->slug );
						}

						if(is_wp_error($term) or empty($term)){

							$term = wp_insert_term( $value, $taxonomy->slug );
						}

						$term = (array)$term;

						if(!isset($tax_data['term_ids'])){
							$tax_data['term_ids'] = array();
						}

						if(!is_wp_error($term) and isset($term['term_id'])) {
							$tax_data['term_ids'][] = $term['term_id'];
						}

						$_attribute      = new WC_Product_Attribute();

						$_attribute->set_id( $tax_data['attribute_id'] );
						$_attribute->set_name( $tax_data['attribute_taxonomy'] );
						$_attribute->set_options( $tax_data['term_ids'] );
						$_attribute->set_position( 1 );
						$_attribute->set_visible( true );
						$_attribute->set_variation( false );
						
						$__attributes[] = $_attribute;						
					}
				}

				$p->set_attributes( $__attributes );			
			}
			
			$p->save();
			$product_id = $p->get_id();

			if(!empty($old_attachment_ids) and is_array($old_attachment_ids)){
				foreach ($old_attachment_ids as $old_attachment_id) {
					wp_delete_attachment($old_attachment_id,true);
					wp_delete_post($old_attachment_id);
				}
			}

			if(!empty($meta['certi_link'])){
				$meta['_certificate_link'] = $meta['certi_link'];
			}

			if(!empty($meta) and !empty($product_id)){
				foreach ($meta as $key=>$value) {
					update_post_meta($product_id,$key,$value);
				}
			}
			// update 22-12-2020
			if($is_sample_image_added===true){
				update_post_meta($product_id,'_has_sample_image',true);
			} elseif($is_sample_image_added===false) {
				update_post_meta($product_id,'_has_sample_image',false);
			}
			////////////////////////////////////////////////////////
			$bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));
        	if(!empty($bonus_features['price_control'])){
				\eo\wbc\model\admin\Eowbc_Price_Control_Save_Update_Prices::instance()->update_product($p,false);
			}

			return $product_id;			
		} else {
			return false;
		}
		
	}

}
