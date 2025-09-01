<?php

if(!class_exists('EO_WBC_CatAt')){
	/**
	 * Class to create product category, attribute and add them to the products
	 */
	class EO_WBC_CatAt {
		/* 	array(
			    array(
			    	'thumb' => 'images/uploads/cat09.png',
			    	'name' => 'Cat 9',
			    	'description' => 'Cat 9 description',
			    	'slug' => 'cat-9',
			    	'parent' => 0
			    	'child'
			    	),

			    array(
			    	'thumb' => 'images/uploads/cat10.png',
			    	'name' => 'Cat 10',
			    	'description' => 'Cat 10 description',
			    	'slug' => 'cat-10',
			    	'parent' => 8
			    	)			    
			);
		*/
		public function create_category($args) {
			if(!empty($args) AND is_array($args)) {
				foreach($args as $index=>$cat) {					
					//to be removed
				   $cat_id=$this->create_category_factory($cat);					
				   $args[$index]['id']=$cat_id;
				}
				return $args;
			} else {
				return FALSE;				
			}
		}

		/**
			array(
				array(
					'title'=>'Diamond 24050',
					'thumb'=>'',
					'content'=>'Loream Ipsum',
					'regular_price'=>'',
					'sale_price'=>'',
					'price'=>'',
					'type'=>'variable', //simple | variable
					'category'=>array('eo_ring_halo_cat','eo_ring_pave_cat'),
					'attribute'=>array('pa_colour'=>array(
															'name'=>'pa_colour',
															'value'=>'D|E|F',
															'position'=>0,
															'is_visible'=>1,
															'is_variation'=>1,
															'is_taxonomy'=>1															
														),
										'pa_fluorescence'=>array(
															'name'=>'pa_fluorescence',
															'value'=>'Faint|Slight)',
															'position'=>0,
															'is_visible'=>1,
															'is_variation'=>1,
															'is_taxonomy'=>1
														)
										),
					'variation'=>array(
									array(
										'regular_price'=>'15',
										'price'=>'10'
										'qty'=>'2',
										'terms'=>array('D','Faint')
									),
									array(
										'regular_price'=>'10',
										'price'=>'7'
										'qty'=>'3',
										'terms'=>array('F','Slight')
									)
								)
				)				
			)
		*/		
		public function create_products($args) {			
			
			if(!empty($args) || is_array($args)) {


				//////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////
				foreach ($args as $index => $product) {
						
					$product_id= wp_insert_post( array(
					    'post_author' => get_current_user_id(),
					    'post_title' => $product['title'],
					    'post_content' => $product['content'],
					    'post_status' => 'publish',
					    'post_type' => "product",
					));

					wp_set_object_terms( $product_id,$product['type'],'product_type');
					wp_set_object_terms( $product_id,$product['category'],'product_cat');					
					update_post_meta( $product_id, '_product_attributes', $product['attribute'] );

					foreach ($product['attribute'] as $attr_index => $attribute) {
						wp_set_object_terms( $product_id, explode('|',$attribute['value']) , $attr_index );						
					}

					$parent_id = $product_id;
					foreach ($product['variation'] as $var_index => $variation) {
						$variation_data = array(
						    'post_title'   => $product['title'],
						    'post_content' => $product['content'],
						    'post_status'  => 'publish',
						    'post_parent'  => $parent_id,
						    'post_type'    => 'product_variation'
						);						

						$variation_id = wp_insert_post( $variation_data );
						update_post_meta( $variation_id, '_regular_price',$variation['regular_price'] );
						update_post_meta( $variation_id, '_price', $variation['price']);						
						update_post_meta( $variation_id, '_manage_stock','no' );
						update_post_meta( $variation_id, '_backorders','no' );
						update_post_meta( $variation_id, '_manage_stock','no' );
						
						if(!empty($variation['terms'])){
							foreach($variation['terms'] as $key=>$value){										
								update_post_meta( $variation_id, 'attribute_'.$key,$value);					
							}						
						}
						WC_Product_Variable::sync( $parent_id );
					}
				}				

				/*if($post_id){
				    $attach_id = get_post_meta($product->parent_id, "_thumbnail_id", true);
				    add_post_meta($post_id, '_thumbnail_id', $attach_id);
				}*/			
			}
		}

		/* 	array(
			    array(
			    	'label' => 'Attribute 1',
			    	'terms' => array('at1','at2')
			    ),
				array(
			    	'label' => 'Attribute 2',
			    	'terms' => array('at3','at4')
			    )
			);
		*/
		function create_attribute( $args ){

		    if(!empty($args) AND is_array($args)){
		    	
		    	foreach ($args as $index=>$attribute) {

		    		if(!isset($attribute['label']) && !isset($attribute['terms'])) return;
		    		//adding post data to store data in posts
		    		$data = array(
				        'name'   => wp_unslash($attribute['label']),
				        'slug'    => wc_sanitize_taxonomy_name(wp_unslash($attribute['label'])),
				        'type'    => 'select',
				        'order_by' => 'menu_order',
				        'has_archives'  => 1, // Enable archives ==> true (or 1)
				    );		

		    		$id = wc_create_attribute( $data );	    
		    		
		    		/*if(is_wp_error($id)){		    			
		    			var_dump(get_taxonomy('pa_'.wc_sanitize_taxonomy_name(wp_unslash($attribute['label'])))['term_id']);
		    		}*/

		    		register_taxonomy( 'pa_'.$data['slug'] ,array( 'product' ),$data);
		    		if(empty($attribute['range'])){
			    		foreach ($attribute['terms'] as $term) {
			    			@wp_insert_term( $term ,'pa_'.$data['slug'] );
			    		}
			    	}
			    	else{
			    		if(!empty($attribute['terms']['min']) && !empty($attribute['terms']['max'])) {
			    			for($i=1;$i<=20;$i++){
			    				@wp_insert_term( (((int)$attribute['terms']['max']-(int)$attribute['terms']['min'])/20)*$i  ,'pa_'.$data['slug'] );		
			    			}
			    		}			    		
			    	}
		    		unregister_taxonomy( 'pa_'.$data['slug'] );
		    		$args[$index]['id']=$ID;
		    	}
		    	return $args;
		    }	    
		}

		private function create_category_factory( $cat ){

			if(!empty($cat) AND is_array($cat)) {
				$param=array(
			            'description'=> $cat['description'],
			            'slug' => $cat['slug'],			            
			        );

				if(!empty($cat['parent'])) {

					$param['parent'] = $cat['parent'];
				}
				
			    $id = wp_insert_term(
			        $cat['name'], // the term 
			        'product_cat', // the taxonomy
			        $param
			    );			    

			    if(!is_wp_error($id) || isset($id->error_data['term_exists'])) {

			    	$thumb_id=0;
			    	$thumb_id=$this->add_image_gallary($cat['thumb']);

			    	$cat_id = null;
			    	if(is_array($id)) {
						
						$cat_id=isset($id['term_id']) ? $id['term_id'] : null;			    		

						if( isset( $id['term_id'] ) ){

				    		update_term_meta( $cat_id, 'thumbnail_id', absint( $thumb_id ) );	
				    	}

			    	}
			    	elseif (is_object($id)) {

			    		if(is_wp_error($id)){

			    			$cat_id=isset($id->error_data['term_exists'])?$id->error_data['term_exists']:null;
			    		}
			    	}					

					if(!empty($cat['child'])) {

				    	foreach ($cat['child'] as $child) {

				    		$child['parent']=$cat_id;				    		
				    		$this->create_category_factory($child);
				    	}
			    	}

			    	if(isset($cat_id)){
			    		return $cat_id;
			    	} else {
			    		return false;
			    	}
			    } else {
			    	if(isset($id['term_id'])){
			    		return $id['term_id'];
			    	} else {
			    		return false;
			    	}			    	
			    }			    
			}
		}

		/* Add image to the wordpress image media gallary */
		private function add_image_gallary($path) {

			$name = basename($path);

			$attachment_check=new Wp_Query( array(
		        'posts_per_page' => 1,
		        'post_type'      => 'attachment',
		        'name'           => implode('-',explode(' ',strtolower($name))).'-image'
		    ));

		    if ( $attachment_check->have_posts() ) {
		      $posts=$attachment_check->get_posts();
		      return $posts[0]->ID;
		    }

			$file = wp_upload_bits($name, null, file_get_contents($path));

			if (!$file['error']) {

				$type = wp_check_filetype($name, null );

				$attachment = array(
					'post_mime_type' => $type['type'],
					'post_parent' => null,
					'post_title' => preg_replace('/\.[^.]+$/', '', $name),
					'post_content' => '',
					'post_status' => 'inherit'
				);

				$id = wp_insert_attachment( $attachment, $file['file'], null );

				if (!is_wp_error($id)) {

					require_once(ABSPATH . "wp-admin" . '/includes/image.php');

					$data = wp_generate_attachment_metadata( $id, $file['file'] );

					wp_update_attachment_metadata( $id, $data );

					return $id;

				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
	}
}