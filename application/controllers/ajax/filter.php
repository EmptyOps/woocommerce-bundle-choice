<?php
namespace eo\wbc\controllers\ajax;
class Filter
{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	function range($term,$min,$max,$numeric_range=FALSE) {
        $list=array();        
        if($numeric_range) {	

        	$list=get_terms(array('taxonomy'=>$term,'hide_empty'=>FALSE));  

        	$min = str_replace(',', '.', $min);
        	$max = str_replace(',', '.', $max);

        	$list=array_filter($list,function($element) use($min,$max){

				return ( (float)str_replace(',','.',$element->name) >= (float)$min AND (float)str_replace(',','.',$element->name) <= (float)$max );
			});			
			$list_slug = array();
			array_walk($list,function($e) use(&$list_slug){
            	array_push($list_slug,$e->term_id);
            });
			$list = $list_slug;					
		
		} else {

            $list=get_terms(array('taxonomy'=>$term,'hide_empty'=>FALSE));                
            
            $list_slug = array();
            array_walk($list,function($e) use(&$list_slug){
            	$list_slug[$e->term_id]=$e->slug;
            });
			$_min=array_search($min,array_values($list_slug));
			$_max=array_search($max,array_values($list_slug));								
			$list = array_slice(array_keys($list_slug),$_min,($_max-$_min)+1);
        
        }
        
        return $list;
    }

    public function lookup($return_query = false,$sql_join = '',$order_sql = ''){
    	
    	$pids = array();

    	/*$table_columns = unserialize(wbc()->options->get_option('lookup_manager','table_columns',serialize(array())));*/
    	$table_columns = unserialize(wbc()->options->get_option('sp_lookup_manager','table_columns',serialize(array())));
		
        if(empty($table_columns)){        	
        	return ['pids'=>array(),'result_count'=>0];
        }

    	if(isset($_REQUEST['products_in']) AND !empty(wbc()->sanitize->request('products_in')) ) {
    		$pids = explode(',',wbc()->sanitize->request('products_in'));        	
        }

        $category_fields = array();
        $attribute_fields = array();
        $checklist_attribute_fields = array();
        $_category_query_list = array();

        if( isset($_REQUEST['_category']) OR isset($_REQUEST['_current_category']) ) {

        	if(!empty(wbc()->sanitize->request('_category'))) {
        		//////////////////////////////////////////////////
        		$__category_list = array_unique(array_filter(explode(',', wbc()->sanitize->request('_category'))));

        		if(!in_array('cat_link',$__category_list)){
        			$__category_list[]='cat_link';
        		}

				foreach($__category_list  as $_category) {
					////////////////////////
					//echo $_category.PHP_EOL;

					if(isset($_REQUEST['cat_filter_'.$_category]) && (!empty(wbc()->sanitize->request('cat_filter_'.$_category))) ) {

						$result_false = false;
												
						foreach ( array_filter(explode(',',wbc()->sanitize->request('cat_filter_'.$_category))) as $_category_field_index=>$_category_field) {
						
							$_category_field_chunk = array_filter(explode('+',$_category_field));

							if(!empty($_category_field_chunk) and is_array($_category_field_chunk)) {
								
								foreach($_category_field_chunk as $_category_field_chunk_) {
									if(!empty($table_columns['category'][$_category_field_chunk_])){
										if('cat_filter_cat_link' !== 'cat_filter_'.$_category && !empty(wbc()->sanitize->request('cat_filter_cat_link'))) {

											$_category_query_list[] = $_category_field_chunk_;

										} else {
											if(empty($category_fields[$_category_field_index])) {
												$category_fields[$_category_field_index] = array();
											}

											$category_fields[$_category_field_index][] = $_category_field_chunk_;
										}
									} else {
										$result_false = true;
									}		
								}
							} else {
								$result_false = true;
							}							
						}
																		
						if(empty($category_fields) and $result_false === true){
							return ['pids'=>array(),'result_count'=>0];
						}
                    }
				}        		
        	} 
        	
        	if(!empty(wbc()->sanitize->request('_category_query')) and empty(wbc()->sanitize->request('CAT_LINK'))) {
        		$_category_query = array_filter(explode(',',wbc()->sanitize->request('_category_query')));

        		foreach ($_category_query as $_category_field) {
        			$_category_field = array_filter(explode('+',$_category_field));
					if(!empty($_category_field)) {
						$_category_query_list[] = $_category_field;
					}
				}
        	}

        	if(empty($category_fields) and  !empty(wbc()->sanitize->request('_current_category'))) {
        		
        		foreach (array_filter(explode(',',wbc()->sanitize->request('_current_category'))) as $_category_field_index=>$_category_field) {
					if(!empty($table_columns['category'][$_category_field])){						
						$category_fields[$_category_field_index] = array();
						$category_fields[$_category_field_index][] = $_category_field;
					}
				}
        	}

        	///////////////////////////////////////////////
            //Filter section for attributes
            ///////////////////////////////////////////////  
            if(!empty(wbc()->sanitize->request('_attribute'))) {
            	foreach (array_filter(explode(',', wbc()->sanitize->request('_attribute'))) as $attr) {


            		if(!empty($table_columns['attribute'][$attr])) {

	            		if (isset($_REQUEST['checklist_'.$attr]) && !empty(wbc()->sanitize->request('checklist_'.$attr))) {

	            			$checklist_attributes = array();
	            			foreach (array_filter(explode(',',wbc()->sanitize->request('checklist_'.$attr))) as $_attribute_field) {
	            				
								$_attribute_field = get_term_by('slug',$_attribute_field,$attr);
								
								if(!empty($_attribute_field) and !is_wp_error($_attribute_field)){
									$checklist_attributes[] = $_attribute_field->term_id;
								}
							}

							if(!empty($checklist_attributes)) {
								$checklist_attribute_fields[$attr] = $checklist_attributes;
							}

	                    } elseif(isset($_REQUEST['min_'.$attr]) && isset($_REQUEST['max_'.$attr])){
	                        
	                        if ( is_numeric(wbc()->sanitize->request('min_'.$attr)) && is_numeric(wbc()->sanitize->request('max_'.$attr)) ) {

	                        	$min_max_attributes =  $this->range($attr,wbc()->sanitize->request('min_'.$attr),wbc()->sanitize->request('max_'.$attr),true);

	                        	if(!empty($min_max_attributes)) {
									$attribute_fields[$attr] = $min_max_attributes;
								}
	                        }
	                        else {

	                        	$range_attributes = $this->range($attr,wbc()->sanitize->request('min_'.$attr),wbc()->sanitize->request('max_'.$attr));
	                        	if(!empty($range_attributes)) {
									$attribute_fields[$attr] = $range_attributes;
								}
	                        }                   
	                    }
	                }                    
                }
            }
        }

        if(empty($category_fields)){
        	if(empty(wbc()->sanitize->get('eo_wbc_filter'))) {

        		$current_category_page = get_queried_object();
        		if(!empty($current_category_page) and property_exists($current_category_page,'slug')) {
					$category_fields ='(`'.$current_category_page->slug.'` != 0)';
        		} else {
        			$category_fields = 1;	
        		}				
        	} else {
        		$category_fields = 1;
        	}
        } else {
        	$field_query_and = array();

        	foreach ($category_fields as $field_and_index=>$field_and) {
        		if(is_array($field_and) and !empty(array_filter($field_and))) {
        			$field_query_or = array();
        			foreach ($field_and as $field_or_index=>$field_or) {
        				$field_query_or[]="`${field_or}` != 0";
        			}

        			$field_query_and[] = "(" .implode(' AND ',$field_query_or) .")";

        		} else{
        			$field_query_and[] = "`${field_and}` != 0";	
        		}
        	}

        	$category_fields = "(" .implode(' OR ',$field_query_and) .")"; 

        	/*if(wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_category','and')==='and'){
        		$category_fields = "(" .implode(' AND ',$field_query) .")"; 
        	} else {
        		$category_fields = "(" .implode(' OR ',$field_query) .")"; 
        	}*/
        }
        
        if(empty($_category_query_list)){
        	$_category_query_list = 1;
        } else {
        	$field_query = array();
        	foreach ($_category_query_list as $field) {
        		if(is_array($field) and !empty($field)){
        			$field_values = array();
        			foreach ($field as $field_value) {
        				$field_values[] = "`${field_value}` != 0";
        			}
        			$field_query[]="(" .implode(' AND ',$field_values) .")";
        		}else{
        			$field_query[]="`${field}` != 0";	
        		}
        	}

        	if(wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_category','and')==='and'){
        		$_category_query_list = "(" .implode(' AND ',$field_query) .")"; 
        	} else {
        		$_category_query_list = "(" .implode(' OR ',$field_query) .")"; 
        	}
        }
       
        if(empty($attribute_fields)){
        	$attribute_fields = 1;
        } else {
        	$field_query = array();
        	foreach ($attribute_fields as $key => $field) {
        		if(is_array($field)){
        			$field[] = -1;
        		}
        		$field_query[]="(`${key}` IN(".implode(',',$field)."))";
        	}
        	$attribute_fields = "(" .implode(' AND ', $field_query). ")";
        }

        if(empty($checklist_attribute_fields)){
        	/*$checklist_attribute_fields = 1;*/
        } else {
        	$field_query = array();
        	foreach ($checklist_attribute_fields as $key => $field) {

        		if(is_array($field)){
        			$field[] = -1;
        		}
        		
        		$field_query[]="(`${key}` IN(".implode(',',$field)."))";
        	}
        	$attribute_fields.=" AND (" .implode(' OR ',$field_query) .")"; 
        }

        global $wpdb;
        $lookup_table = $wpdb->prefix."sp_product_lookup";
        
        /*echo "SELECT `product_id`,`parent_id` FROM `{$lookup_table}` ${sql_join} WHERE stock_status='instock' AND ${category_fields} AND ( ${_category_query_list} ) AND ${attribute_fields} ${order_sql}";;
        die();*/

        $per_page = (wc_get_default_products_per_row() * wc_get_default_product_rows_per_page());
        $current_page = ((empty($_REQUEST['paged'])?1: str_replace(',','',$_REQUEST['paged']))-1)*$per_page;

        /*echo "SELECT SQL_CALC_FOUND_ROWS `product_id`,`parent_id` FROM `{$lookup_table}` ${sql_join} WHERE stock_status='instock' AND ${category_fields} AND ( ${_category_query_list} ) AND ${attribute_fields} ${order_sql} LIMIT ${current_page},${per_page}";
        die();*/

        /*"SELECT SQL_CALC_FOUND_ROWS `product_id`,`parent_id` FROM `{$lookup_table}` ${sql_join} WHERE stock_status='instock' AND ${category_fields} AND ( ${_category_query_list} ) AND ${attribute_fields} ${order_sql} GROUP BY(`parent_id`) LIMIT ${current_page},${per_page}"*/
       	        
        if($return_query) {
        	return "SELECT SQL_CALC_FOUND_ROWS `product_id`,`parent_id` FROM `{$lookup_table}` ${sql_join} WHERE stock_status='instock' AND ${category_fields} AND ( ${_category_query_list} ) AND ${attribute_fields} ${order_sql} LIMIT ${current_page},${per_page}";
        }
       
        $result = $wpdb->get_results("SELECT SQL_CALC_FOUND_ROWS `product_id`,`parent_id` FROM `{$lookup_table}` ${sql_join} WHERE stock_status='instock' AND ${category_fields} AND ( ${_category_query_list} ) AND ${attribute_fields} ${order_sql}  LIMIT ${current_page},${per_page}",'ARRAY_N');

        $result_count = ($wpdb->get_var('SELECT FOUND_ROWS()'));

        /*SQL_CALC_FOUND_ROWS*/
       	$pids = array();
        if(!empty($result) and !is_wp_error($result)){
        	
        	foreach ($result as $value) {

        		$pids[] = (empty($value[1])?$value[0]:$value[1]); 
        	}        	
        }

		$pids = array_unique($pids);		
		return ['pids'=>$pids,'result_count'=>$result_count];
    }


	//////////////////////////////////////////////////////////////////////////////////////////////////
	//  Enable non table based filter that loads whole page at front :)
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function filter() {

		if(!empty(wbc()->sanitize->get('eo_wbc_filter'))) {
			
			


			if(empty($_REQUEST['paged'])) {

				if(empty($_REQUEST['product-page'])) {
					$_REQUEST['paged'] = 1;
					$_POST['paged'] = 1;
					$_GET['paged'] = 1;
				} else {

					$_REQUEST['paged'] = $_REQUEST['product-page'];
					$_POST['paged'] = $_REQUEST['product-page'];
					$_GET['paged'] = $_REQUEST['product-page'];
				}
			} else {
				$_REQUEST['paged'] = str_replace(',','',$_REQUEST['paged']);

				$_REQUEST['product-page'] = $_REQUEST['paged'];
				$_POST['product-page'] = $_REQUEST['paged'];
				$_GET['product-page'] = $_REQUEST['paged'];
			}

			/*add_action('woocommerce_after_shop_loop',function(){
				die();
			});*/

		    add_filter('pre_get_posts',function($query ) {

		    	$_GET = apply_filters('filter_widget_ajax_pre_get',$_GET);		        	
		    	
		    	if(apply_filters('eowbc_filter_override',false) and (!empty($_REQUEST['eo_wbc_filter']))) {
		            echo json_encode(apply_filters('eowbc_filter_response',array()));
		            die();
		        }
		        
   		        if( $query->is_main_query() and !empty($query->query_vars['product_cat'])) {

		        	if( version_compare( constant('WC_VERSION'), '3.6' ) >=0) {
		        		
		        		$ids = $this->lookup();
		        		
		        		$result_count = $ids['result_count'];
		        		$ids = $ids['pids'];
						

						if(!empty(wbc()->sanitize->get('eo_wbc_filter')) and !empty($ids)) {
							
							add_filter('woocommerce_shortcode_products_query_results',function($results) use($result_count) {

								
								$results->total = $result_count;
								$results->total_pages = ceil($result_count / wc_get_loop_prop('per_page') );
								$results->current = (empty($_REQUEST['paged'])?1:str_replace(',','',$_REQUEST['paged']));
								$results->per_page = wc_get_loop_prop('per_page');

								wc_set_loop_prop('total',$result_count);
								wc_set_loop_prop('total_pages',ceil($result_count / wc_get_loop_prop('per_page') ));
								wc_set_loop_prop('current',(empty($_REQUEST['paged'])?1:str_replace(',','',$_REQUEST['paged'])));
								wc_set_loop_prop('per_page',wc_get_loop_prop('per_page'));
								return $results;								
							});
							
							echo do_shortcode('[products ids="'.implode(',',$ids).'" class="eowbc_ajax" paginate="true"]');
							die();
						} else {

							wc_set_loop_prop( 'total', $result_count );
							wc_set_loop_prop('total_pages',ceil($result_count / wc_get_loop_prop('per_page') ));
							wc_set_loop_prop('current',(empty($_REQUEST['paged'])?1:str_replace(',','',$_REQUEST['paged'])));							
						}

		        		$query->set('post_type',array('product', 'product_variation'));
		        		
		        		if(!empty($ids)) {
			        		$query->set('post__in',$ids);
				        } else {
				        	$query->set('post__in',array(-1));
				        }
						
				        unset($_GET['min_price']);
				        unset($_GET['max_price']);
				        unset($_POST['min_price']);
				        unset($_POST['max_price']);
				        unset($_REQUEST['min_price']);
				        unset($_REQUEST['max_price']);

						$query->set('tax_query',array());

				        //return $query;	

				    } else {
				    	if( $query->is_main_query() and !empty($query->query_vars['product_cat'])) {

				        	if(isset($_GET['products_in']) AND !empty(wbc()->sanitize->get('products_in')) ) {
				        		$query->set('post__in',explode(',',wbc()->sanitize->get('products_in')));			        	
					        }

				        	if( isset($_GET['_category']) OR isset($_GET['_current_category']) ) {

				        		$old_tax_query = $query->get('tax_query');

					            $old_tax_query_taxonomy = array();

					            $tax_query = array();
				        		
				                if(!empty(wbc()->sanitize->get('_category'))) {

				                    foreach( array_unique(array_filter(explode(',', wbc()->sanitize->get('_category')))) as $_category){
				                    	
				                        if(isset($_GET['cat_filter_'.$_category]) && (!empty(wbc()->sanitize->get('cat_filter_'.$_category))) ) {                           
				                            $tax_query[]=array(
				                                'taxonomy' => 'product_cat',
				                                'field' => 'slug',
				                                'terms' =>array_filter(explode(',',wbc()->sanitize->get('cat_filter_'.$_category))),
				                                'compare'=>'EXISTS IN',
				                                'include_children' => false
				                            );
				                            $tax_query['relation'] = 'AND';
				                        }
				                    }  
				                }
				                
				                if(empty($tax_query) and !empty(wbc()->sanitize->get('_current_category'))) {

				                    $tax_query[]=array(
				                        'taxonomy' => 'product_cat',
				                        'field' => 'slug',
				                        'terms' => explode(',',wbc()->sanitize->get('_current_category')),
				                        'compare'=>'EXISTS IN',
				                        'include_children' => false
				                    );

				                    $__current_category__ = array_filter(explode(',',wbc()->sanitize->get('_current_category')));
				                    if(!empty($__current_category__)) {
				                    	$query->set('product_cat', array_filter(explode(',',wbc()->sanitize->get('_current_category')))[0]);	
				                    }		                    
				                }

				                if(!empty(wbc()->sanitize->get('_current_category')) and !empty($tax_query) ) {
				                	// remove the default query if the tax query is available

									$_current_category_term = wbc()->wc->get_term_by('slug',explode(',',wbc()->sanitize->get('_current_category'))[0],'product_cat');             	
									if(!empty($_current_category_term) and !is_wp_error($_current_category_term) and property_exists($_current_category_term,'term_id')){
										
										$_current_category_term_id = $_current_category_term->term_id;
										if(is_array($old_tax_query) and !empty($old_tax_query)){
											foreach ($old_tax_query as $old_tax_query_key => $old_tax_query_value) {
												if(!empty($old_tax_query_value['terms']) and is_array($old_tax_query_value) and in_array($_current_category_term_id,$old_tax_query_value['terms'])){

													if(count($old_tax_query_value['terms'])==1){
														unset($old_tax_query[$old_tax_query_key]);
													} elseif(array_search($_current_category_term_id,$old_tax_query_value['terms']) !==false) { 

														unset($old_tax_query[$old_tax_query_key]['terms'][array_search($_current_category_term_id,$old_tax_query_value['terms'])]);
													}
												}
											}
										}
									}
				                }	

				                //$query->set('tax_query',$tax_query);	                
				                /*$query->set('tax_query',$tax_query);*/

				                ///////////////////////////////////////////////
			                    //Filter section for attributes
			                    ///////////////////////////////////////////////
			                    $__attribute = (empty($_GET['_attribute'])?'':$_GET['_attribute']);
			                    if(is_string($__attribute)) {
			                    	$__attribute = sanitize_text_field($__attribute);

			                    	$__attribute = array_filter(explode(',',$__attribute));
			                    } elseif(is_array($__attribute)) {
			                    	$__attribute = array_filter($__attribute);
			                    }

				                if(!empty($__attribute)) {

					                foreach ($__attribute as $attr) {

					                    if(isset($_GET['min_'.$attr]) && isset($_GET['max_'.$attr])){
					                        
					                        if ( is_numeric(wbc()->sanitize->get('min_'.$attr)) && is_numeric(wbc()->sanitize->get('max_'.$attr)) ) {

					                            $tax_query[]=array(
					                                'taxonomy' => $attr,
					                                'field' => 'term_id',
					                                'terms' => $this->range($attr,wbc()->sanitize->get('min_'.$attr),wbc()->sanitize->get('max_'.$attr),true),
					                                'compare'=>'EXISTS IN'
					                            );
					                        }
					                        else {

					                            $tax_query[]=array(
					                                'taxonomy' => $attr,
					                                'field' => 'term_id',
					                                'terms' => $this->range($attr,wbc()->sanitize->get('min_'.$attr),wbc()->sanitize->get('max_'.$attr)),
					                                'compare'=>'EXISTS IN'
					                            );
					                        }                   
					                    }
					                    elseif (isset($_GET['checklist_'.$attr]) && !empty(wbc()->sanitize->get('checklist_'.$attr))) {
					                        $tax_query[]=array(
					                            'taxonomy' => $attr,
					                            'field' => 'slug',
					                            'terms' => array_filter(explode(',',wbc()->sanitize->get('checklist_'.$attr))),
					                            'compare'=>'EXISTS IN'
					                        );     
					                    } 
					                }
					                
					            }

					            //$query->set('tax_query',$tax_query);
					            //print_r($tax_query);
					           
					            if(is_array($old_tax_query) and !empty($old_tax_query)){
					            	$old_tax_query_taxonomy = array_column($old_tax_query,'taxonomy');
					            }
					            
					            if(is_array($old_tax_query_taxonomy) AND !empty($old_tax_query_taxonomy)){
					            	if(in_array('product_visibility',$old_tax_query_taxonomy) and count($old_tax_query_taxonomy)==1) {

					            		$query->set('tax_query',$tax_query);
					            		
						            } else {
						            	$query->add('tax_query',$tax_query);
						            }	
					            } else {
					            	$query->add('tax_query',$tax_query);
					            }
					            			            			            
				                //die();
				            }

				            $meta_quer_args = $query->get('meta_query');/* array('relation' => 'AND')*/;

				            if(!empty($_REQUEST['min_price']) and !empty($_REQUEST['max_price']) and empty($meta_quer_args)) {
				                $meta_quer_args[] = array(
		                                                'key'     => '_price',
		                                                'value'   => array(
		                                                                str_replace('$','',$_REQUEST['min_price']),
		                                                                str_replace('$','',$_REQUEST['max_price'])
		                                                            ),
		                                                'type'    => 'NUMERIC',
		                                                'compare' => 'BETWEEN',
		                                        );
				                /*$meta_quer_args[] = array(
		                                                'key'     => '_regular_price',
		                                                'value'   => array(
		                                                                str_replace('$','',$_REQUEST['min_price']),
		                                                                str_replace('$','',$_REQUEST['max_price'])
		                                                            ),
		                                                'type'    => 'NUMERIC',
		                                                'compare' => 'BETWEEN',
		                                        );*/

				                $meta_quer_args['relation'] = 'AND';
				            }
				            
				            // meta query price per carat
				            if(!empty($_REQUEST['min__price_per_caret']) and !empty($_REQUEST['max__price_per_caret'])) {
				                $meta_quer_args[] = array(
		                                                'key'     => '_price_per_caret',
		                                                'value'   => array(
		                                                                str_replace('$','',$_REQUEST['min__price_per_caret']),
		                                                                str_replace('$','',$_REQUEST['max__price_per_caret'])
		                                                            ),
		                                                'type'    => 'NUMERIC',
		                                                'compare' => 'BETWEEN',
		                                        );
				            }

				            // if param _meta_field has query data            
				            if(!empty($_GET['_meta_field'])) {

				                $query_metas = array_filter( explode(',',$_GET['_meta_field']) );

				                if(!empty($query_metas)) {

				                    $meta_list = array_values(unserialize(wbc()->options->get_option_group('list_custom_attribute_filters_map_master',"a:0:{}")));

				                    foreach($query_metas as $meta_key) {
				                        
				                        $meta_filter_data = $meta_list[array_search($meta_key,array_column($meta_list,'meta_key'))];
				                                                
				                        if(!empty($_GET['_meta_field_'.$meta_key])) {

				                            if($meta_filter_data['value_type'] === 'boolean') {
				                                $meta_quer_args[] = array(
				                                       'relation' => 'OR',
				                                        array(
				                                            'key'     => $meta_key,
				                                            'value'   => 1,
				                                            'compare' => '='
				                                        ),
				                                        array(
				                                            'key'     => $meta_key,
				                                            'compare' => 'EXISTS',
				                                        ),
				                                );
				                            } elseif ($meta_filter_data['value_type'] === 'days') {
				                                $meta_quer_args[] = array(                                       
				                                    'key' => $meta_key,
				                                    'value' => $_GET['_meta_field_'.$meta_key],
				                                    'compare' => '<=',
				                                    'type' => 'DATE'
				                                );
				                            }

				                        }
				                    }
				                }
				            }

				            $query->set('meta_query',$meta_quer_args);

				            if( property_exists($query,'query') ){
					        	//unset($query->query);
					        	$query->query = array();
					        }
					        if( property_exists($query,'tax_query') ){

					        	//unset($query->tax_query);
					        	$query->tax_query = array();
					        }		        
					        $query->query_vars['suppress_filters'] = true;

			        	}
			        }		        		        
			        return apply_filters('filter_widget_ajax_post_query',$query);
			    }

		    });		   
		}
	}	
}