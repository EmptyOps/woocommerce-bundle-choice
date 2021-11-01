<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/eowbc_model');

class Eowbc_Related_Mapping /*extends Eowbc_Model*/ {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function get( $form_definition) {
		
		//loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	//loop through form fields and read values from options and store in the form_definition 
			foreach ($tab["form"] as $fk => $fv) {
				if( $fv["type"] == "table" ) {
					// wbc()->options->update_option_group( 'mapping_'.$key, serialize(array()) );
					$mapping_data = unserialize(wbc()->options->get_option_group($key,"a:0:{}"));
					/*var_dump($key);*/

					/*wbc()->common->pr($mapping_data, false, false);*/

					$body = array();
					foreach ($mapping_data as $rk => $rv) {
						$row = array();

						//
						$row[] =array(
								'is_header' => 0, 
								'val' => '',
								'is_checkbox' => true, 
								'checkbox'=> array('id'=>$rv["id"],'value'=>array(),'options'=>array($rv["id"]=>''),'class'=>'','where'=>'in_table')
							);

						// foreach ($rv as $rvk => $rvv) {
						foreach ($form_definition[$key]["form"][$fk]["head"][0] as $ck => $cv) {

							if(empty($cv["field_id"])) { continue; }
							$rvk = $cv["field_id"];
							$rvv = ( !isset($rv[$rvk]) || wbc()->common->nonZeroEmpty($rv[$rvk]) ) ?  "" : $rv[$rvk];

							//skip the id and other applicable fields 
							if( $rvk == "id" || $rvk == "first_term_range" || $rvk == "second_term_range" ) {
								continue;
							}
							
							if( $rvk == "first_term" ) {

								if($rv["first_term_set_all"]){
									
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"]['first_term_attribute'], $rv['first_term_attribute']);

									$row[] = array( 'val' => !is_array($val)?$val:$val["label"] ,'link'=>1,'edit_id'=>$rk);
								}
								/*var_dump(wbc()->common->nonZeroEmpty($rv["first_term_range"]));*/
								/*if( strpos($rvv, 'pid_')==0 ){
									
									$product = wbc()->wc->get_product((int)substr($rvv,4));

									$row[] = array( 'val' => ((is_wp_error($product) or empty($product))? '':$product->get_name()),'link'=>1,'edit_id'=>$rk);	
								}
								else*/elseif( wbc()->common->nonZeroEmpty($rv["first_term_range"]) ) {

									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									$row[] = array( 'val' => !is_array($val)?$val:$val["label"] ,'link'=>1,'edit_id'=>$rk);	
								}
								else {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);

									$val1 = wbc()->common->dropdownSelectedvalueText($tab["form"]["first_term_range"], $rv["first_term_range"]);

									$row[] = array( 'val' =>  "Range from <strong>".(!is_array($val)?$val:$val["label"])."</strong> to <strong>".(!is_array($val1)?$val1:$val1["label"])."</strong>" ,'link'=>1,'edit_id'=>$rk);
								}	
							}
							else if( $rvk == "second_term" ) {
								if($rv["first_term_set_all"]){
									
									$row[] = array( 'val' => "Upper Bound:<strong>".($rv['second_term_upper_limit'])."</strong><br/>Lower Bound:<strong>".($rv['second_term_down_limit'])."</strong>" );
									
								}
								/*if( strpos($rvv, 'pid_')==0 ){
									
									$product = wbc()->wc->get_product((int)substr($rvv,4));

									$row[] = array( 'val' => ((is_wp_error($product) or empty($product))? '':$product->get_name()));	

								} else*/elseif( wbc()->common->nonZeroEmpty($rv["second_term_range"])/* || wbc()->common->nonZeroEmpty($rv["range_second"])*/ ) {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									$row[] = array( 'val' => !is_array($val)?$val:$val["label"] );
								}
								else {
									$val = wbc()->common->dropdownSelectedvalueText($tab["form"][$rvk], $rvv);
									$val1 = wbc()->common->dropdownSelectedvalueText($tab["form"]["second_term_range"], $rv["second_term_range"]);
									$row[] = array( 'val' => "Range from <strong>".(!is_array($val)?$val:$val["label"])."</strong> to <strong>".(!is_array($val1)?$val1:$val1["label"])."</strong>" );
								}	
							}
							else {
								$row[] = array( 'val' => $rvv );	
							}
						}

						$body[] = $row;
					}
					
					$form_definition[$key]["form"][$fk]["body"]= $body;
				}
				else {
					$form_definition[$key]["form"][$fk]["value"] = wbc()->options->get_option($key,$fk, isset($form_definition[$key]["form"][$fk]["value"]) ? $form_definition[$key]["form"][$fk]["value"] : '');	
				}
			    
			}
	    }

	    /*wbc()->common->pr($form_definition['recently_purchased_map_master']['form']['list']['body'], false, false);*/

	    return $form_definition; 
	}

	public function save( $form_definition, $is_auto_insert_for_template=false,$prefix='' ) {
		
		wbc()->sanitize->clean($form_definition);
		wbc()->validate->check($form_definition);
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
		wbc()->load->model('admin\form-builder');

		$saved_tab_key = !empty(wbc()->sanitize->post("saved_tab_key")) ? wbc()->sanitize->post("saved_tab_key") : ""; 
		$skip_fileds = array('saved_tab_key','resolver_path');
		
	    //loop through form tabs and save 
	    foreach ($form_definition as $key => $tab) {
	    	if( $key != $saved_tab_key ) {
	    		continue;
	    	}

			$is_table_save = ($key === $prefix.'_map_master' ? true : false);
			$table_data = array();

			$tab_specific_skip_fileds = $is_table_save ? array($prefix.'_list_bulk') : array();

	    	foreach ($tab["form"] as $fk => $fv) {

			    //loop through form fields, read from POST/GET and save
			    //may need to check field type here and read accordingly only
			    //only for those for which POST is set

			    if( in_array($fv["type"], \eo\wbc\model\admin\Form_Builder::savable_types()) && (isset($_POST[$fk]) || $fv["type"]=='checkbox')) {
			    	//skip fields where applicable
					if( in_array($fk, $skip_fileds) ) {
		    			continue;
		    		}

		    		if( in_array($fk, $tab_specific_skip_fileds) ) {
		    			continue;
		    		}

		    		//save
			    	if( $is_table_save ) {
			    		$table_data[$fk] = ( isset($_POST[$fk]) ? wbc()->sanitize->post($fk) : '' ); 
			    	}
			    	else {

			    		wbc()->options->update_option($key,$fk,(isset($_POST[$fk])? wbc()->sanitize->post($fk):''));
			    	}
			    }
			}

			if( $is_table_save ) {

				$mapping_data = unserialize(wbc()->options->get_option_group($key,"a:0:{}"));

		        if(!empty(wbc()->sanitize->post($prefix.'_map_master_id')) and !empty($mapping_data[wbc()->sanitize->post($prefix.'_map_master_id')])) {

		        	$table_data["id"] = wbc()->common->createUniqueId();
		        	$mapping_data[wbc()->sanitize->post($prefix.'_map_master_id')] = $table_data;
		        	wbc()->options->update_option_group($key, serialize($mapping_data) );

		        	$res["msg"] = eowbc_lang('Mapping Updated Successfully'); 
		        	return $res;
			        
		        } else{
			        foreach ($mapping_data as $fdkey=>$value) {
			            
			            $match_found = false;
			            
			                if(($value["first_term"]==$table_data["first_term"] and $value["first_term_range"]==$table_data["first_term_range"]) and ($value["second_term"]==$table_data["second_term_range"])) {                 
			                    $match_found = true;
			                    break;
			                } elseif( ($value["second_term"]==$table_data["first_term"] and $value["second_term_range"]==$table_data["first_term_range"]) and ($value["first_term"]==$table_data["second_term"] and $value["first_term_range"]==$table_data["second_term_range"]) ) {
			                    $match_found = true;
			                    break;
			                }

			            if ($match_found) { 
			                $res["type"] = "error";
			    			$res["msg"] = eowbc_lang('Mapping Already Exists');
			                return $res;
			            }
			        }
			    }

				$table_data["id"] = wbc()->common->createUniqueId();
		        $mapping_data[$table_data["id"]] = $table_data;

		        wbc()->options->update_option_group($key, serialize($mapping_data) );

		        $res["msg"] = eowbc_lang('New Mapping Added Successfully'); 
			}

	    }

        return $res;
	}

	public function delete( $ids, $key, $check_by_id=false) {
		
		$check_by_id = true;		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    $res["key"] = $key;
    	// $key = $saved_tab_key;

   	
		$list_data = unserialize(wbc()->options->get_option_group($key,"a:0:{}"));
		$res["keydata"] = array_keys($list_data);
		$list_data_updated = array();
        
        $delete_cnt = 0;
        foreach ($list_data as $fdkey=>$item) {
            
            if( !in_array( (($check_by_id and isset($item["id"])) ? $item["id"] : $fdkey), $ids)) {
            	$list_data_updated[$fdkey] = $item; 
            }
            else {
            	$delete_cnt++;
            }
        }

        wbc()->options->update_option_group( $key, serialize($list_data_updated) );
        $res["msg"] = $delete_cnt . " " . eowbc_lang('record(s) deleted'); 

        return $res;
	}

	public function fetch_map(&$res,$prefix) {
		$map = unserialize(wbc()->options->get_option_group($prefix.'_map_master'));
		
		if(!empty($map[wbc()->sanitize->post('id')])){
			$res['msg'] = json_encode($map[wbc()->sanitize->post('id')]);
		} else {
			$res['type'] = 'error';
			$res['msg'] = 'Selected item does not exists!';
		}		
		return $res;
	}	


	public function related_mapping($prefix='',$limit=3) {
				
		$map = unserialize(wbc()->options->get_option_group($prefix.'_map_master'));

		$map = apply_filters($prefix.'_map_master',$map);
		
		if(empty(wbc()->sanitize->post('product_id'))){
			return array();
		}		

  		$product = wc_get_product(wbc()->sanitize->post('product_id'));
  		
  		if( empty($product) or is_wp_error($product) ) {
			return array();
		}		

  		$product_cats = $product->get_category_ids();
  		$default_attributes = $product->get_default_attributes();
  		$attributes = $product->get_attributes();

  		if(empty($default_attributes) and is_array($default_attributes) and !empty($attributes) and is_array($attributes) and count($default_attributes)!==count($attributes) ){

  			foreach ($attributes as $attribute_key=> $attribute) {
  				if(empty($default_attributes[$attribute_key])){
  					$_option = $attribute->get_options();
  					if (!empty($_option) and is_array($_option)) {
  						$_option = $_option[0];
  						$_option_term = wbc()->wc->get_term_by('id',$_option,$attribute_key);
  						if(!empty($_option_term) and !is_wp_error($_option_term)){
  							$default_attributes[$attribute_key] = $_option_term->slug;
  						}
  					}  					
  				}	
  			}
  		}

  		$_category = array();
  		$_attribute = array();
  		$_price = array();
  		$args = array(          
            'posts_per_page' => $limit,                  
            'post_type' => ['product'],
            'orderby' => 'title',
            'post_status'=>'publish',
            'paged' => 1,
        );

        $meta_query = array('relation' => 'AND');
        $tax_query = array('relation' => 'AND');


        if(!empty($product_cats)){

        	$this_category_list = array();
        	foreach($product_cats as $product_cat_id) {
        		$this_category_list[] = array(
	                        'taxonomy' => 'product_cat',
	                        'field' => 'id',
	                        'terms' => array($product_cat_id),
	                        'compare'=>'EXISTS IN'
	                    );
        	}

        	if(!empty($this_category_list)){

        		$this_category_list['relation'] = 'AND';
        		$tax_query[] = 	$this_category_list;
        	}	        
	    }

        

  		if(!empty($map) and is_array($map)){
  			foreach ($map as $map_key => $map_value) {
  				if(!empty($map_value['first_term_set_all'])){
  					if($map_value['first_term_attribute'] === '__price__'){
  						
		                    /*$meta_query[] = array(
		                            'key'     => '_price',
		                            'value'   => array(
		                            				$product->get_price()-abs($map_value['second_term_down_limit'])
		                                            ,
		                                            $product->get_price()-1,
		                                        ),
		                            'type'    => 'numeric',
		                            'compare' => 'BETWEEN',
		                    );

		                    if(empty($map_value['second_term_upper_limit'])) {
		                    	$meta_query[] = array(
		                            'key'     => '_price',
		                            'value'   => abs($product->get_price()+1),
		                            'type'    => 'numeric',
		                            'compare' => '>',
			                    );
		                    } else {
		                    	$meta_query[] = array(
		                            'key'     => '_price',
		                            'value'   => array(
		                            				$product->get_price()+1
		                                            ,
		                                            $product->get_price()+abs($map_value['second_term_down_limit'])
		                                        ),
		                            'type'    => 'numeric',
		                            'compare' => 'BETWEEN',
			                    );
		                    } */
		                    $meta_query[] = array(
		                            'key'     => '_price',
		                            'value'   => array(
		                            				$product->get_price()-abs($map_value['second_term_down_limit'])
		                                            ,
		                                            $product->get_price()+abs($map_value['second_term_upper_limit']),
		                                        ),
		                            'type'    => 'numeric',
		                            'compare' => 'BETWEEN',
		                    );
  					} elseif( array_key_exists('pa_'.$map_value['first_term_attribute'],$default_attributes) ) {
  						
  						$range_list = $this->get_range_terms($map_value['first_term_attribute'],$default_attributes['pa_'.$map_value['first_term_attribute']],$map_value['second_term_upper_limit'],$map_value['second_term_down_limit']);

  						if(!empty($range_list)){
  							$tax_query[]=array(
                                    'relation' => 'AND',
                                    array(
                                      	'orderby'=>'meta_value',
                                      	'taxonomy' =>$range_list['taxonomy'],
                                    	'field' => 'term_id',
                                        'terms' => array_keys($range_list['terms']),
                                        'compare'=>'EXISTS IN'
                                    ),
                                );
  						}

  					}
  				} else {
  					
  					$first_term = wbc()->wp->get_term_by_term_taxonomy_id($map_value['first_term']);
					$second_term =  wbc()->wp->get_term_by_term_taxonomy_id($map_value['second_term']);
					
					$first_term_range = wbc()->wp->get_term_by_term_taxonomy_id($map_value['first_term_range']);
					$second_term_range = wbc()->wp->get_term_by_term_taxonomy_id($map_value['second_term_range']);

  					$range_list_first = $this->get_range_between_terms($first_term,$second_term,$first_term_range,$second_term_range);

  					$range_list_second = $this->get_range_between_terms($second_term,$first_term,$second_term_range,$first_term_range);

  					$final_list = array();
  					$final_list_type = 1; // default_category.

  					if( !empty($range_list_first) and array_key_exists($range_list_first['taxonomy'], $default_attributes) )  {

  						$test_term = wbc()->wc->get_term_by('slug',$default_attributes[$range_list_first['taxonomy']],$range_list_first['taxonomy']);

  						if(!empty($test_term) and !is_wp_error($test_term) and !empty($range_list_first['terms'][$test_term->term_id]) ) {
  							$final_list = $range_list_second;
  							$final_list_type = 0;
  						}

  					} 
  					if (empty($final_list) and !empty($range_list_second) and array_key_exists($range_list_second['taxonomy'], $default_attributes) ) {

  						$test_term = wbc()->wc->get_term_by('slug',$default_attributes[$range_list_second['taxonomy']],$range_list_second['taxonomy']);

  						if(!empty($test_term) and !is_wp_error($test_term) and !empty($range_list_second['terms'][$test_term->term_id]) ) {
  							$final_list = $range_list_first;
  							$final_list_type = 0;
  						}
  						
  					} 

  					if (empty($final_list) and !empty($range_list_first) and $range_list_first['taxonomy']==='product_cat') {
  						
  						if( array_intersect($product_cats,$range_list_first['terms']) ){
  							$final_list = $range_list_second;
  						}

  					}

  					if ( empty($final_list) and !empty($range_list_second) and $range_list_second['taxonomy']==='product_cat' ) {
						
						if( array_intersect($product_cats,$range_list_first['terms']) ){
  							$final_list = $range_list_first;
  						}  						
  					}

  					if(!empty($final_list)){
  						if($final_list_type) {
  							$tax_query[]=array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => $final_list['terms'],
                                    'compare'=>'EXISTS IN'
                                )
                            ); 
  						} else {
  							
  							$tax_query[]=array(
                                'relation' => 'AND',
                                array(
                                  	'orderby'=>'meta_value',
                                  	'taxonomy' =>$final_list['taxonomy'],
                                	'field' => 'term_id',
                                    'terms' =>  array_keys($final_list['terms']),
                                    'compare'=>'EXISTS IN'
                                ),
                            );	  						
  						}
  					}
  				}
  			}
  		}

  		if(!empty($meta_query)){
  			$args['meta_query'] = $meta_query;
  		}

  		if(!empty($tax_query)){
  			$args['tax_query'] =$tax_query;	
  		}

  		// mahesh@emptyops.com -- 12-08-2021 -- all products except this one.
  		$args['post__not_in'] = array($product->get_id());

  		/*echo "<pre>";
  		print_r($args);
  		echo "</pre>";*/

  		$query = new \WP_Query( $args );
  		$products_list = array();

  		if( $query->have_posts() ){
  			while( $query->have_posts() ){
  				$query->the_post();
  				$_product= wc_get_product( get_the_ID() /*$post->ID*/);
  				$products_list[] = $_product;
  			} 
  		}
  		return $products_list;
	}

	public function get_range_terms($taxonomy,$term,$upper_limit,$lower_limit) {
		$term = wbc()->wc->get_term_by('slug',$term,'pa_'.$taxonomy);
		if(!empty($term) and !is_wp_error($term) and is_object($term)){
			
		
			$term_list = get_terms(array('taxonomy'=>'pa_'.$taxonomy,'hide_empty'=>FALSE,'orderby' => 'menu_order'));
			$formated_term_list = array();
			if(!empty($term_list) and is_array($term_list)){
				foreach ($term_list as $term_list_key => $term_list_value) {

					if( is_numeric($term->name) ){
						$formated_term_list[$term_list_value->term_id] = $term_list_value->name;						
					} else {
						$formated_term_list[$term_list_value->term_id] = $term_list_value->slug;
					}
				}
			}

			if( is_numeric($term->name) ){
				asort($formated_term_list);
			}
			
			$term_index = is_numeric($term->name) ? array_search($term->name,$formated_term_list) : array_search($term->slug,$formated_term_list);

			$term_index = array_search($term_index,array_keys($formated_term_list));


			if(!empty($upper_limit) and is_numeric($upper_limit)){
				$upper_limit++ ;
			} elseif(empty($upper_limit) OR !is_numeric($upper_limit)) {
				$upper_limit = 0;
			}
			
			if(empty($lower_limit) OR !is_numeric($lower_limit)) {
				$lower_limit = 0;
			}


			$lower_limit_index = $term_index - $lower_limit;
			$upper_limit_index = $lower_limit + $upper_limit;

			if($lower_limit<0){
				$lower_limit = 0;
			}

			$term_list = array_slice($formated_term_list,$lower_limit_index,$upper_limit_index,true);

			return array('taxonomy'=>'pa_'.$taxonomy,'terms'=>$term_list);
			
		} else {
			return array();
		}
	}	

	public function get_range_between_terms($first_term,$second_term,$first_term_range,$second_term_range) {
		
		if( (!empty($first_term) and !empty($second_term) and !empty($first_term_range) and !empty($second_term_range)) 

			and  

			( ($first_term->taxonomy===$first_term_range->taxonomy and $second_term->taxonomy===$second_term_range->taxonomy) and ($first_term->parent===$first_term_range->parent and $second_term->parent===$second_term_range->parent) )

		) {
			
			if($second_term->taxonomy === 'product_cat'){

				$categories = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'menu_order', 'parent'=>$second_term->parent));

				if(!empty($categories) and is_array($categories)) {

					$category_list = array();
					foreach ($categories as $category) {
						$category_list[] = $category->term_id;
					}

					$start_index = array_search($second_term->term_id,$category_list);
					$end_index = (array_search($second_term_range->term_id,$category_list)-$start_index)+1;

					$term_list = array_slice($category_list,$start_index,$end_index);

					return array('taxonomy'=>'product_cat','terms'=>$term_list);
				}

			} else {
				
				$attributes =get_terms(array('taxonomy'=>$second_term->taxonomy,'hide_empty'=>FALSE,'orderby' => 'menu_order'));
				

				$term_list = array();
				if(!empty($attributes) and is_array($attributes)){
					foreach ($attributes as $attributes_key => $attributes_value) {

						if( is_numeric($second_term->name) ){
							$term_list[$attributes_value->term_id] = $attributes_value->name;						
						} else {
							$term_list[$attributes_value->term_id] = $attributes_value->slug;
						}
					}
				}

				if( is_numeric($second_term->name) ){
					asort($term_list);
				}
				
				$start_index = is_numeric($second_term->name) ? array_search($second_term->name,$term_list) : array_search($second_term->slug,$term_list);

				$start_index = array_search($start_index,array_keys($term_list));

				$end_index = is_numeric($second_term_range->name) ? array_search($second_term_range->name,$term_list) : array_search($second_term_range->slug,$term_list);
														
				$end_index = (array_search($end_index,array_keys($term_list))-$start_index)+1;
				
				$term_list = array_slice($term_list,$start_index,$end_index);
				
				return array('taxonomy'=>$second_term->taxonomy,'terms'=>$term_list);
			}
		}
		
		return array();

	}

}
