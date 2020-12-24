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

    	$table_columns = unserialize(wbc()->options->get_option('lookup_manager','table_columns',serialize(array())));

        if(empty($table_columns)){
        	return array();
        }

    	if(isset($_REQUEST['products_in']) AND !empty(wbc()->sanitize->request('products_in')) ) {
    		$pids = explode(',',wbc()->sanitize->request('products_in'));        	
        }

        $category_fields = array();
        $attribute_fields = array();
        $checklist_attribute_fields = array();

        if( isset($_REQUEST['_category']) OR isset($_REQUEST['_current_category']) ) {

        	if(!empty(wbc()->sanitize->request('_category'))) {
        		//////////////////////////////////////////////////
        		//echo wbc()->sanitize->request('_category').PHP_EOL;

				foreach( array_unique(array_filter(explode(',', wbc()->sanitize->request('_category')))) as $_category) {
					////////////////////////
					//echo $_category.PHP_EOL;

					if(isset($_REQUEST['cat_filter_'.$_category]) && (!empty(wbc()->sanitize->request('cat_filter_'.$_category))) ) {
						////////////////////////////////////////////////////////
						//echo 'FIELD: '.wbc()->sanitize->request('cat_filter_'.$_category).PHP_EOL;
						$result_false = false;
						foreach (array_filter(explode(',',wbc()->sanitize->request('cat_filter_'.$_category))) as $_category_field) {
							//////////////////////////////
							//echo 'ITEM: '.$_category_field.PHP_EOL;
							if(!empty($table_columns['category'][$_category_field])){
								$category_fields [] = $_category_field;
							} else {
								$result_false = true;
							}
						}

						if(empty($category_fields) and $result_false === true){
							$category_fields['product_id']='-1';
						}
                    }
				}        		
        	} 

        	if(empty($category_fields) and  !empty(wbc()->sanitize->request('_current_category'))) {
        		foreach (array_filter(explode(',',wbc()->sanitize->request('_current_category'))) as $_category_field) {
					if(!empty($table_columns['category'][$_category_field])){
						$category_fields [] = $_category_field;
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
        	$category_fields = 1;
        } else {
        	$field_query = array();
        	foreach ($category_fields as $field) {
        		$field_query[]="`${field}` != 0";
        	}
        	$category_fields = "(" .implode(' OR ',$field_query) .")"; 
        }

        if(empty($attribute_fields)){
        	$attribute_fields = 1;
        } else {
        	$field_query = array();
        	foreach ($attribute_fields as $key => $field) {
        		$field_query[]="(`${key}` IN(".implode(',',$field)."))";
        	}
        	$attribute_fields = "(" .implode(' AND ', $field_query). ")";
        }

        if(empty($checklist_attribute_fields)){
        	/*$checklist_attribute_fields = 1;*/
        } else {
        	$field_query = array();
        	foreach ($checklist_attribute_fields as $key => $field) {
        		$field_query[]="(`${key}` IN(".implode(',',$field)."))";
        	}
        	$attribute_fields.=" AND (" .implode(' OR ',$field_query) .")"; 
        }

        

        global $wpdb;

        if($return_query) {
        	return "SELECT `product_id`,`parent_id` FROM `{$wpdb->wc_product_meta_lookup}` ${sql_join} WHERE stock_status='instock' AND ${category_fields} AND ${attribute_fields} ${order_sql}";
        }

        /*echo "SELECT `product_id`,`parent_id` FROM `{$wpdb->wc_product_meta_lookup}` ${sql_join} WHERE ${category_fields} AND ${attribute_fields} ${order_sql}";
        die();*/
       
        $result = $wpdb->get_results("SELECT `product_id`,`parent_id` FROM `{$wpdb->wc_product_meta_lookup}` ${sql_join} WHERE stock_status='instock' AND ${category_fields} AND ${attribute_fields} ${order_sql}",'ARRAY_N');


        if(!empty($result) and !is_wp_error($result)){

        	foreach ($result as $value) {
        		$pids[] = empty($value[1])?$value[0]:$value[1]; 
        	}
        }
		
		$pids = array_unique($pids);
		return $pids;
    }


	//////////////////////////////////////////////////////////////////////////////////////////////////
	//  Enable non table based filter that loads whole page at front :)
	//////////////////////////////////////////////////////////////////////////////////////////////////

	public function filter() {			
		
		if(!empty(wbc()->sanitize->get('eo_wbc_filter'))) {
			
		    add_filter('pre_get_posts',function($query ) {		    		

		        if( $query->is_main_query() ) {

		        	if( version_compare( constant('WC_VERSION'), '3.6' ) >=0) {
		        		$ids = $this->lookup();		        		

		        		if(!empty($ids)) {
			        		$query->set('post__in',$ids);
				        } else {
				        	$query->set('post__in',array(-1));
				        }
						/*echo "<pre>";
				        print_r($query);
				        echo "</pre>";*/

				        return $query;				        
		        	} else {

			        	if(isset($_GET['products_in']) AND !empty(wbc()->sanitize->get('products_in')) ) {
			        		$query->set('post__in',explode(',',wbc()->sanitize->get('products_in')));			        	
				        }

			        
			        	if( isset($_GET['_category']) OR isset($_GET['_current_category']) ){

			        		$old_tax_query = $query->get('tax_query');
				            $old_tax_query_taxonomy = array();

			        		$tax_query=array('relation' => 'AND');
			                if(!empty(wbc()->sanitize->get('_category'))) {

			                    foreach( array_unique(array_filter(explode(',', wbc()->sanitize->get('_category')))) as $_category){
			                    	
			                        if(isset($_GET['cat_filter_'.$_category]) && (!empty(wbc()->sanitize->get('cat_filter_'.$_category))) ) {                           
			                            $tax_query[]=array(
			                                'taxonomy' => 'product_cat',
			                                'field' => 'slug',
			                                'terms' =>array_filter(explode(',',wbc()->sanitize->get('cat_filter_'.$_category))),
			                                'compare'=>'EXISTS IN'
			                            );                    
			                        }
			                    }  
			                }
			                elseif(!empty(wbc()->sanitize->get('_current_category'))) {

			                    $tax_query[]=array(
			                        'taxonomy' => 'product_cat',
			                        'field' => 'slug',
			                        'terms' => explode(',',wbc()->sanitize->get('_current_category')),
			                        'compare'=>'EXISTS IN'
			                    );
			                }

			                if(!empty(wbc()->sanitize->get('_current_category')) and !empty($tax_query) ) {
			                	// remove the default query if the tax query is available

								$_current_category_term = get_term_by('slug',explode(',',wbc()->sanitize->get('_current_category'))[0],'product_cat');             	
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
			                if(!empty(wbc()->sanitize->get('_attribute'))) {

				                foreach (array_filter(explode(',', wbc()->sanitize->get('_attribute'))) as $attr) {

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
				            
				            //if(is_array($old_tax_query))
				            /*echo "<pre>";			            
				            print_r($query->get('tax_query'));
				            unset($_GET['EO_WBC']);
			                echo "</pre>";*/
			                //die();
			            }
			        }
		        }		       
		    });		   
		}
	}	
}