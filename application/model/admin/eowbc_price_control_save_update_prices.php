<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Price_Control_Save_Update_Prices {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public static function api_price_markup($price) {
		return $price;
	}

	public function save($eo_wbc_jpc_form_data) {
		wbc()->sanitize->clean($eo_wbc_jpc_form_data);

		wbc()->validate->check($eo_wbc_jpc_form_data);
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
	    //update_option('eo_wbc_jpc_data',serialize($eo_wbc_jpc_form_data));
	    wbc()->options->update_option('price_control','rules_data',(empty($eo_wbc_jpc_form_data)? '':serialize( $eo_wbc_jpc_form_data ) ) );
	    
	 //    $jpc_data = json_decode( stripslashes( unserialize( wbc()->options->get_option('price_control','rules_data',serialize(array())) ) ), true );
		// wbc()->common->var_dump($jpc_data,$force_debug = false,$die = true);

        return $res;
	}
	
	public function update_product( $product, $store ) {
		$this->update_prices($product->get_id(),$product,null);
	}

	public function catch_get_term($slug, $taxonomy) {

		static $terms = array();
		if (empty($terms[$taxonomy.'#'.$slug])) {
			$terms[$taxonomy.'#'.$slug] = get_term_by( 'slug', $slug, $taxonomy );
		}
		return $terms[$taxonomy.'#'.$slug];		
	}

	public function catch_get_range( $min, $max, $taxonomy , $numeric) {
		
		static $terms = array();
		if(empty($terms[$taxonomy."#".$min->name."#".$max->name])) {

			$terms_list =get_terms( array(
				'taxonomy' => $taxonomy,
	            'orderby' => (empty($numeric)?'name':'menu_order'),
	            'order' => 'ASC'
	        ) );

			$refined_list = array();

			if(!empty($terms_list) and is_array($terms_list)) {

				$buffer_status = false;
				foreach( $terms_list as $term ) {
					if($term->name == $min->name) {
						$buffer_status = true;
					}

					if(!empty($buffer_status)){
						$refined_list[] = $term;
					}

					if($term->name == $max->name) {
						$buffer_status = true;
					}
				}
			}

			$terms[$taxonomy."#".$min->name."#".$max->name] = $refined_list;
		}		

		return $terms[$taxonomy."#".$min->name."#".$max->name];        
	}


	public function update_prices( $post_ID=null, $post=null, $update=null){

		/*$starttime = microtime(true);*/

		if(!empty($_REQUEST['action']) and sanitize_text_field($_REQUEST['action'])==='trash' ) {
			return true;
		}

		$jpc_data = array();
	    $jpc_str = wbc()->options->get_option('price_control','rules_data', false);
	    if( $jpc_str ) {
	    	
	    	$jpc_data = json_decode( stripslashes( unserialize( $jpc_str ) ), true );
	    	if(empty($jpc_data)){
	    		return false;
	    	}
	    }

		if(!empty($post_ID)) {

			$__product__ = wbc()->wc->get_product($post_ID);

			
			if(!empty($jpc_data) and is_array($jpc_data) and !empty($__product__) and !is_wp_error($__product__)) {

				echo ($__product__->get_sku());
				// loop through the price rule

				foreach($jpc_data as $jpc_row) {

					if(!empty($jpc_row) and is_array($jpc_row)) {

						$update_status = true;

						// check the entry of the price rules where all must be match to make it true, so any one goes false whole entry looses.
						/*echo "<pre>==========================================";
						print_r($jpc_row);
						echo "==========================================</pre>";*/

						foreach($jpc_row as $jpc_data_row) {

							if(!empty($jpc_data_row['field_name'])) {

								if(intval($jpc_data_row['field_type']) === 1) {

									// attribute									
									if($jpc_data_row['cmp_value'] === 'between' and !empty($jpc_data_row['field_value'])) {

										if(!empty( current($jpc_data_row['value_data']) ) and !empty( end($jpc_data_row['value_data']) ) ) {

											$min_term = $this->catch_get_term($jpc_data_row['value_data'][0],'pa_'.$jpc_data_row['field_value']);
											$max_term = $this->catch_get_term($jpc_data_row['value_data'][1],'pa_'.$jpc_data_row['field_value']);

											if(!empty($min_term) and !empty($max_term) and !is_wp_error($min_term) and !is_wp_error($max_term)) {

												$product_attribute_value = $__product__->get_attribute('pa_'.$jpc_data_row['field_value']);

												if(is_numeric($min_term->name) and is_numeric($max_term->name)) {
													/*echo "<pre>#################################################";
													print_r([
														'min_term'=>$min_term,
														'max_term'=>$max_term,
														'value'=>$product_attribute_value,
														'status'=>(($min_term->name <= $product_attribute_value) and ($max_term->name >= $product_attribute_value))
													]);
													echo "#################################################</pre>";*/
													// its numeric range													
													if( ($min_term->name <= $product_attribute_value) and ($max_term->name >= $product_attribute_value) ) {

														/*$update_status = true;*/
													} else {
														$update_status = false;
													}													
												} else {
													// its string range
													$terms_list = $this->catch_get_range($min_term,$max_term,'pa_'.$jpc_data_row['field_value']);

													$terms_list = array_column($terms_list,'name');

													if( in_array($product_attribute_value, $terms_list ) ) {
														/*$update_status = true;*/
													} else {
														$update_status = false;
													}
												}
											} else {
												$update_status = false;
											}

										}

									} elseif($jpc_data_row['cmp_value'] === 'in') {
										$product_attribute_value = $__product__->get_attribute('pa_'.$jpc_data_row['field_value']);

										$the_term = $this->catch_get_term($jpc_data_row['value_data'][0],'pa_'.$jpc_data_row['field_value']);

										if($the_term->name === $product_attribute_value) {
											/*$update_status = true;*/
										} else {
											$update_status = false;
										}
									}

								} else {
									// category
									$category_ids = $__product__->get_category_ids();
									$category_term_slug = $jpc_data_row['field_value'];
									$category_term = $this->catch_get_term($jpc_data_row['field_value'],'product_cat');

									if(!empty($category_term) and !is_wp_error($category_term)) {

										if(in_array($category_term->term_id,$category_ids)) {
											/*$update_status = true;*/
										} else {
											$update_status = false;
										}
									}

								}
							}
						}

						//var_dump($update_status);

						if(!empty($update_status)) {
							// update the product

							if(!empty(end($jpc_row)['ratio_price'])) {
	                    	
		                    	$increment_ratio = end($jpc_row)['ratio_price'];

		                    	if(!empty($__product__->get_regular_price())) {

		                    		/*echo "<pre>";
		                    		print_r([
		                    			'regular_price'=> $__product__->get_regular_price(),
		                    			'update' =>($__product__->get_regular_price()*(1+($increment_ratio/100))),
		                    			'inc'=>$increment_ratio
		                    		]);
		                    		echo "</pre>";*/

		                    		update_post_meta($post_ID,'_regular_price',$__product__->get_regular_price()*(1+($increment_ratio/100)));
		                    	}

		                    	if(!empty($__product__->get_sale_price())) {		                    		

		                    		/*echo "<pre>";
		                    		print_r([
		                    			'_sale_price'=> $__product__->get_sale_price(),
		                    			'update' =>($__product__->get_sale_price()*(1+($increment_ratio/100))),
		                    			'inc'=>$increment_ratio
		                    		]);
		                    		echo "</pre>";*/

		                    		update_post_meta($post_ID,'_sale_price',$__product__->get_sale_price()*(1+($increment_ratio/100)));
		                    	}

		                    	if(!empty($__product__->get_price())) {

		                    		/*echo "<pre>";
		                    		print_r([
		                    			'_price'=> $__product__->get_price(),
		                    			'update' =>($__product__->get_price()*(1+($increment_ratio/100))),
		                    			'inc'=>$increment_ratio
		                    		]);
		                    		echo "</pre>";*/

		                    		update_post_meta($post_ID,'_price',$__product__->get_price()*(1+($increment_ratio/100)));                    		
		                    	}
		                    	wc_delete_product_transients( $post_ID);
		                    } else {

			                    if(!empty( end($jpc_row)['sales_price'])) {
			                    	//here seems bug should be regular_price instead of sales_price
			                        //update_post_meta($post_ID,'_price',end($jpc_row)->sales_price);
			                        update_post_meta($post_ID,'_price',end($jpc_row)['regular_price']);
			                        update_post_meta($post_ID,'_sale_price',end($jpc_row)['sales_price']);

			                    } else{
			                        delete_post_meta($post_ID,'_sale_price');                    
			                        update_post_meta($post_ID,'_price',end($jpc_row)['regular_price']);
			                    }            
			                    update_post_meta($post_ID,'_regular_price',end($jpc_row)['regular_price']);
			                    wc_delete_product_transients( $post_ID );
			                }
						}
					}
				}
			}

			/*die();*/

		} else {

			// fetch all the ids based of the rules
			if(!empty($jpc_data) and is_array($jpc_data)) {

				$res["type"] = "success";
	    		$res["msg"] = "";
	    		$update_cnt = 0;

				foreach($jpc_data as $jpc_row) {

					if(!empty($jpc_row) and is_array($jpc_row)) {

						$query = array();

						foreach($jpc_row as $jpc_data_row) {

							if(!empty($jpc_data_row['field_name'])) {

								if(intval($jpc_data_row['field_type']) === 1) {
									
									// attribute									
									if($jpc_data_row['cmp_value'] === 'between' and !empty($jpc_data_row['field_value'])) {

										if(!empty( current($jpc_data_row['value_data']) ) and !empty( end($jpc_data_row['value_data']) ) ) {

											$min_term = $this->catch_get_term(current($jpc_data_row['value_data']),'pa_'.$jpc_data_row['field_value']);
											$max_term = $this->catch_get_term(end($jpc_data_row['value_data']),'pa_'.$jpc_data_row['field_value']);

											if(!empty($min_term) and !empty($max_term) and !is_wp_error($min_term) and !is_wp_error($max_term)) {

												if(is_numeric($min_term->name) and is_numeric($max_term->name)) {
													$query[]=array(
						                                'taxonomy' => 'pa_'.$jpc_data_row['field_value'],
						                                'field' => 'term_id',
						                                'terms' => array_column($this->catch_get_range($min_term,$max_term,'pa_'.$jpc_data_row['field_value'],true),'term_id'),
						                                'compare'=>'EXISTS IN'
						                            );
												} else {
													// its string range
													$query[]=array(
						                                'taxonomy' => 'pa_'.$jpc_data_row['field_value'],
						                                'field' => 'term_id',
						                                'terms' => array_column($this->catch_get_range($min_term,$max_term,'pa_'.$jpc_data_row['field_value']),'term_id'),
						                                'compare'=>'EXISTS IN'
						                            );													
												}
											}

										}

									} elseif($jpc_data_row['cmp_value'] === 'in') {
										$product_attribute_value = $__product__->get_attribute('pa_'.$jpc_data_row['field_value']);

										$the_term = $this->catch_get_term(current($jpc_data_row['value_data']),'pa_'.$jpc_data_row['field_value']);

										$query[]=array(
			                                'taxonomy' => 'pa_'.$jpc_data_row['field_value'],
			                                'field' => 'term_id',
			                                'terms' => $the_term->term_id,
			                                'compare'=>'EXISTS IN'
			                            );
									}

								} else {
									// category
									$category_ids = $__product__->get_category_ids();
									$category_term_slug = $jpc_data_row['field_value'];
									$category_term = $this->catch_get_term($jpc_data_row['field_value'],'product_cat');

									if(!empty($category_term) and !is_wp_error($category_term)) {

										$query[]=array(
			                                'taxonomy' => 'product_cat',
			                                'field' => 'term_id',
			                                'terms' => $category_term->term_id,
			                                'compare'=>'EXISTS IN'
			                            );
									}

								}
							}
						}

						$query['relation'] = 'AND';
						$args = array(          
			                'posts_per_page' => -1 ,
			                'post_type' => ['product'],
			                'post_status'=>'publish',			                
			                'tax_query' => $query
			            );

			            $query = new \WP_Query( $args );
			    		            

			            if( $query->have_posts() ) {

			            	while( $query->have_posts() ) {
			            		$update_cnt++;
			            		$__product__ = wbc()->wc->get_product(get_the_ID());
			            		$post_ID = get_the_ID();

			            		if(!empty($__product__) and !is_wp_error($__product__)) {

			            			if(!empty(end($jpc_row)['ratio_price'])) {
	                    	
				                    	$increment_ratio = end($jpc_row)['ratio_price'];

				                    	if(!empty($__product__->get_regular_price())) {
				                    		update_post_meta($post_ID,'_regular_price',$__product__->get_regular_price()*(1+($increment_ratio/100)));
				                    	}

				                    	if(!empty($__product__->get_sale_price())) {		                    		
				                    		update_post_meta($post_ID,'_sale_price',$__product__->get_sale_price()*(1+($increment_ratio/100)));
				                    	}

				                    	if(!empty($__product__->get_price())) {
				                    		update_post_meta($post_ID,'_price',$__product__->get_price()*(1+($increment_ratio/100)));		                    		
				                    	}
				                    	wc_delete_product_transients( $post_ID );
				                    } else {

					                    if(!empty( end($jpc_row)['sales_price'])) {
					                    	//here seems bug should be regular_price instead of sales_price
					                        //update_post_meta($post_ID,'_price',end($jpc_row)->sales_price);
					                        update_post_meta($post_ID,'_price',end($jpc_row)['regular_price']);
					                        update_post_meta($post_ID,'_sale_price',end($jpc_row)['sales_price']);

					                    } else{
					                        delete_post_meta($post_ID,'_sale_price');                    
					                        update_post_meta($post_ID,'_price',end($jpc_row)['regular_price']);
					                    }            
					                    update_post_meta($post_ID,'_regular_price',end($jpc_row)['regular_price']);
					                    wc_delete_product_transients( $post_ID );
					                }
			            		}
			            	}
			            }
			            
					}
				}
				$res["msg"] = $update_cnt." times product(s) prices updated";

			} else {
				$res["type"] = "error";
	    		$res["msg"] = "No input data provided";
			}

			return $res;
		}
		/* END OF NEW CODE IMPLEMENTATION */
		return true;


		/*echo microtime(true) - $starttime;
		die();*/

		//when called from hook 
        if ( !is_null($post) ) {
        	if( $post->post_type != 'product' || is_null($post_ID) ) {
        	   	return;	
        	}
        }

		$res["type"] = "success";
	    $res["msg"] = "";
	    
	    global $wpdb;

	    $q_gen="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE ({$wpdb->prefix}term_taxonomy.taxonomy='product_cat' ) OR ({$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%') )";

	    $q_cat="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy='product_cat' )";
	    
	    $q_att="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%' )";                
	    	    
	    $jpc_data = array();
	    $jpc_str = wbc()->options->get_option('price_control','rules_data', false);
	    if( $jpc_str ) {
	    	
	    	$jpc_data = json_decode( stripslashes( unserialize( $jpc_str ) ), true );
	    	if(empty($jpc_data)){
	    		return false;
	    	}
	    }


	    
	    if( !is_null($post_ID) ) {

	    	//return false;
	    	//here we need smarter way to keep only those rules in jpc_data of which category or attribute condition/criteria/range have the post_ID in its range, is is important for performance/effciency also 
		    //$jpc_data = array( $todo_keep_applicable_rules_only );
		}

		$update_cnt = 0;
		$variations_cnt = 0;
		$res["msg"] = $update_cnt." times product(s) prices updated";


		echo microtime(true) - $starttime;
	    die();

	    if(is_array($jpc_data) OR is_object($jpc_data)){

	        foreach ($jpc_data as $q_data) {

	            if( !is_null($post_ID) ) {
	            	
		            $query=$q_gen;

		            for($l=0;$l < (count($q_data)-1);$l++){
		            	$_field_data=$q_data[$l];
		            	if(!empty( $_field_data['field_type'] )){

		                
			                if($_field_data['field_type']==0) {
			                    //is category
			                    $query=" ( SELECT * FROM {$q_cat} AS T1 WHERE slug = '".$_field_data->field_value."' AND object_id IN ( SELECT object_id FROM {$query} AS T2 ) )";
			                }else {
			                    //is attribute                        
			                    $query=" ( SELECT * FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data['field_value']}' AND ".($_field_data['cmp_value']=="between"?" name BETWEEN '".explode('-',$_field_data['value_name'])[0]."' AND '".explode('-',$_field_data['value_name'])[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data['value_data'][0]))."') ")." AND object_id IN ( SELECT object_id FROM {$query} AS T2 ) ) ";
			                }        
			            }
		            }
		            $_query = "SELECT object_id FROM {$query} AS T";
	            	$rs = array_unique(array_filter( array_column($rs, 'object_id') ));

	            } else {
	            	$rs = array( $post_ID );
	            }

	            if(!empty($post_ID)) {
	            	if(in_array($post_ID,$rs)) {
	            		$rs = array( $post_ID );	
	            	} else {
	            		$rs = array();	
	            	}
	            }

	            //Only for simple products.
	            if(is_array($rs) || is_object($rs)){                        
	                
	                foreach ($rs as $post_id) {
	                	$update_cnt++;
	                    
	                	$__product__ = wbc()->wc->get_product($post_id);

	                	if(!empty(end($q_data)['ratio_price'])) {
	                    	
	                    	$increment_ratio = end($q_data)['ratio_price'];

	                    	if(!empty($__product__->get_regular_price())) {

	                    		//echo "__regular_price ". $__product__->get_regular_price() . " / ".$__product__->get_regular_price()*(1+($increment_ratio/100));

	                    		update_post_meta($post_id,'_regular_price',$__product__->get_regular_price()*(1+($increment_ratio/100)));
	                    		//$__product__->set_regular_price($__product__->get_regular_price()*(1+($increment_ratio/100)));
	                    	}

	                    	if(!empty($__product__->get_sale_price())) {
	                    		//echo "_sale_price ". $__product__->get_sale_price() . " / ".$__product__->get_sale_price()*(1+($increment_ratio/100));
	                    		update_post_meta($post_id,'_sale_price',$__product__->get_sale_price()*(1+($increment_ratio/100)));
	                    		//$__product__->set_sale_price($__product__->get_sale_price()*(1+($increment_ratio/100)));
	                    	}

	                    	if(!empty($__product__->get_price())) {

	                    		//echo "_price ". $__product__->get_price() . " / ".$__product__->get_price()*(1+($increment_ratio/100));

	                    		update_post_meta($post_id,'_price',$__product__->get_price()*(1+($increment_ratio/100)));
	                    		//$__product__->set_price($__product__->get_price()*(1+($increment_ratio/100)));
	                    	}
	                    	
	                    	$__product__->save();

	                    	//wc_delete_product_transients( $post_id->object_id );
	                    } else {

		                    if(!empty( end($q_data)->sales_price)) {
		                    	//here seems bug should be regular_price instead of sales_price
		                        //update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->sales_price);
		                        update_post_meta($post_id,'_price',end($q_data)['regular_price']);
		                        update_post_meta($post_id,'_sale_price',end($q_data)['sales_price']);

		                    } else{
		                        delete_post_meta($post_id,'_sale_price');                    
		                        update_post_meta($post_id,'_price',end($q_data)['regular_price']);
		                    }            
		                    update_post_meta($post_id,'_regular_price',end($q_data)['regular_price']);
		                    wc_delete_product_transients( $post_id );
		                }
	                }
	            }
	            
	            if( !is_null($post_ID) ) {
	            	$query=" ( SELECT ID FROM {$wpdb->prefix}posts WHERE post_parent IN ( {$_query} ) ) ";

		            for($l=0;$l<count($q_data)-1;$l++){
		                
		                $_field_data=$q_data[$l];               

		                if($_field_data['field_type']==1){                                
		                    //is attribute                        
		                    $query=" ( SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key='attribute_pa_{$_field_data['field_value']}' AND meta_value IN ( SELECT slug FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data['field_value']}' AND ".($_field_data['cmp_value']=="between"?" name BETWEEN '".explode('-',$_field_data['value_name'])[0]."' AND '".explode('-',$_field_data['value_name'])[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data['value_data'][0]))."') ")." )  AND post_id IN ( {$query} ) ) ";
		                }        
		            }

	            	$rs=$wpdb->get_results($query);
	            	$rs = array_unique( array_filter( array_column($rs,'post_id') ) );
	            }

	            if(!empty($post_ID)) {
	            	if(in_array($post_ID,$rs)) {
	            		$rs = array( $post_ID );	
	            	} else {
	            		$rs = array();	
	            	}
	            }

	            //Only for simple products.
	            if(is_array($rs) || is_object($rs)) {                        
	                	            	
	                foreach ($rs as $pid) {     

	                	$pid = intval($pid);

	                	//echo $post_id.'<br/>';

	                	$update_cnt++;
	                	/*$pid = 0;
	                	if(is_object($post_id)){
	                		$pid = $post_id->post_id;
	                	} elseif(is_array($post_id)){
	                		$pid = $post_id['post_id'];
	                	}*/

	                	if(!empty(end($q_data)['ratio_price'])) {
	                    	
	                    	$increment_ratio = end($q_data)['ratio_price'];
	                    	
	                    	update_post_meta($pid,'_price', get_post_meta($pid,'_price',true)*(1+($increment_ratio/100)));

	                    	update_post_meta($pid,'_sale_price', get_post_meta($pid,'_sale_price',true)*(1+($increment_ratio/100)));

	                    	update_post_meta($pid,'_regular_price', get_post_meta($pid,'_regular_price',true)*(1+($increment_ratio/100)));
	                    	
	                    	wc_delete_product_transients( $pid );
	                    } else {

		                    if(!empty($q_data[count($q_data)-1]->sales_price)){

		                        update_post_meta($pid,'_price',$q_data[count($q_data)-1]->sales_price);
		                        update_post_meta($pid,'_sale_price',$q_data[count($q_data)-1]->sales_price);

		                    } else{
		                        delete_post_meta($pid,'_sale_price');                    
		                        update_post_meta($pid,'_price',$q_data[count($q_data)-1]->regular_price);
		                    }            
		                    if(!empty($q_data[count($q_data)-1]->regular_price)){
		                    	update_post_meta($pid,'_regular_price',$q_data[count($q_data)-1]->regular_price); 
		                    }
		                    wc_delete_product_transients($pid);  
		                }
	                }
	            }
	        }

			$res["msg"] = $update_cnt." times product(s) prices updated";
	    }
	    else {
	    	$res["type"] = "error";
	    	$res["msg"] = "No input data provided";
	    }



        return $res;
	}
	
}
