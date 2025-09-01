<?php
/*
*	SP Query class 
*/

namespace eo\wbc\system\core\publics;

defined( 'ABSPATH' ) || exit;   

class SP_Query {

	// private $query = null;

	// private static $global_query = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
	}

	public function __construct() {

	}

	// public function __construct() {
	// 	throw new Exception("Sorry, only construct method with platform_key etc parameters is supported, so pass platform_key etc parameters as parameters to construct method. Default construct method is not supported.", 1);
	// }

	// private function set_query($query){
	// 	$this->query = $query;
	// }

	// public function get_query(){
	// 	return $this->query;
	// }

	// private static function set_global_query($query){
	// 	self::$global_query = $query;
	// }

	// public function get_global_query(){
	// 	return self::$global_query;
	// }

	// /**
	//  *	this object function is supposed to be called by independent process which needs a separate query on feed page or any other page for example by plugin or extension modules
	//  */
	// public function allocate_and_register_query() {
		
	// 	if ( empty($this->platform->platform_key()) ) {
	// 		$this->set_query( new WP_Query() );
	// 	}

	// 	return true;
	// }

	// /**
	//  *	this class function is supposed to be called by any process which intend to use global query object 
	//  */
	// public static function allocate_and_register_global_query() {

	// 	if( isset(self::$global_query)) {
	// 		return false;
	// 	}
		
	// 	if ( empty($this->platform->platform_key()) ) {
	// 		self::set_global_query( new WP_Query() );
	// 	}

	// 	return true;
	// }

	private function valid_query($query) {
		return (isset($query) ? $query : (new WP_Query()));
	}

	public function prepare_query( $input_method='GET', $additional_data=array() ) {

		if ( empty(wbc()->platform->platform_key()) ) {
		    add_filter('pre_get_posts',function($query ) use($input_method, $additional_data) {		    		

		        $query = $this->prepare_query_direct( $query, $input_method, $additional_data );

		        return $query;
		    });		   
		}
	}

	public function prepare_query_direct( $query=null, $input_method=null, $additional_data=array() ) {
        
		if( wbc()->sanitize->get('is_test') == 1 ) {

			wbc_pr("wbc prepare_query_directe");
		}

		$query = $this->valid_query($query);
        // $_DATA = empty($input_method) ? null : ( $input_method == 'GET' ? $_GET : $_POST );
        $_DATA = empty($input_method) ? null : ( $input_method == 'GET' ? $_GET : ( $input_method == 'REQUEST' ? $_REQUEST : $_POST ) );
        $input_method_small = empty($input_method) ? null : strtolower( $input_method );

        if( !empty($input_method) and $query->is_main_query() and !empty($query->query_vars['product_cat'])) {

	        if( wbc()->sanitize->get('is_test') == 1 ) {

				wbc_pr("wbc prepare_query_directe inner if");
			}

        	$query = $this->post__in( $_DATA, $query, $input_method_small );

        	$query = $this->tax_query( $_DATA, $query, $input_method_small ); 

        	$query = $this->meta_query( $_DATA, $query, $input_method_small ); 


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

        if( wbc()->sanitize->get('is_test') == 1 ) {

			wbc_pr("wbc prepare_query_directe above return");
		}

        return $query;
	}

	private function post__in( $_DATA, $query, $input_method_small ) {
    	if(isset($_DATA['products_in']) AND !empty(wbc()->sanitize->{$input_method_small}('products_in')) ) {
    		$query->set('post__in', $this->post__in_data($input_method_small));			        	
        }

        return $query;
	}

	public function post__in_data( $input_method_small ) {
		return explode(',',wbc()->sanitize->{$input_method_small}('products_in'));			        	
	}

	private function tax_query( $_DATA, $query, $input_method_small ) {
    	if( isset($_DATA['_category']) OR isset($_DATA['_current_category']) ){

    		$old_tax_query = $query->get('tax_query');

            $old_tax_query_taxonomy = array();

            $tax_query = array();
    		
            if(!empty(wbc()->sanitize->{$input_method_small}('_category'))) {

                foreach( $this->tax_query_data($input_method_small, '_category') as $_category){
                	
                    if(isset($_DATA['cat_filter_'.$_category]) && (!empty(wbc()->sanitize->{$input_method_small}('cat_filter_'.$_category))) ) {                           
                        $tax_query[]=array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' =>$this->tax_query_data($input_method_small, 'cat_filter_', $_category),
                            'compare'=>'EXISTS IN',
                            'include_children' => false
                        );
                        $tax_query['relation'] = 'AND';
                    }
                    /*ACTIVE_TODO_OC_START
                    ACTIVE_TODO need to finalaize -- to a & -- to h
                    		for now we hade applied below else block, but nide to confirm once firmly ACTIVE_TODO
	  					ACTIVE_TODO if we can not confirm at bashed on the understanding of router and quarry layer and we can simply than lets skip it as active todo and if there are any issue comes up for tableview query layer especially the tableview legacy query layer which is now commented than we can think about it
	  				ACTIVE_TODO_OC_END*/
                    // --- aa code sp_tableview/application/model/publics/sp-model-query.php mathi move thayo se @a ---
                    // --- start ---                    
                    else {
                    	/*ACTIVE_TODO_OC_START
                        -- below code is aditional in tableview and is not there in wbc so we must check if it is really nessasary before running the code -- to h
                        ACTIVE_TODO_OC_END*/
                        $tax_query[]=array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => array( $_category ),
                                'compare'=>'EXISTS IN'
                            )
                        );                    
                    }
                    // --- end ---
                }  
            }
            
            if(empty($tax_query) and !empty(wbc()->sanitize->{$input_method_small}('_current_category'))) {

                $tax_query[]=array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $this->tax_query_data($input_method_small, '_current_category'),
                    'compare'=>'EXISTS IN',
                    'include_children' => false
                );

                $__current_category__ = $this->tax_query_data($input_method_small, '_current_category__array_filter');
                if(!empty($__current_category__)) {
                	$query->set('product_cat', $__current_category__[0]);	
                }		                    
            }

            if(!empty(wbc()->sanitize->{$input_method_small}('_current_category')) and !empty($tax_query) ) {
            	// remove the default query if the tax query is available

				$_current_category_term = wbc()->wc->get_term_by('slug',$this->tax_query_data($input_method_small, '_current_category')[0],'product_cat');             	
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
            $__attribute = (empty($_DATA['_attribute'])?'':$_DATA['_attribute']);
            if(is_string($__attribute)) {
            	$__attribute = sanitize_text_field($__attribute);

            	$__attribute = array_filter(explode(',',$__attribute));
            } elseif(is_array($__attribute)) {
            	$__attribute = array_filter($__attribute);
            }

            if(!empty($__attribute)) {

                foreach ($__attribute as $attr) {

                    if(isset($_DATA['min_'.$attr]) && isset($_DATA['max_'.$attr])){
                        
                        if ( is_numeric(wbc()->sanitize->{$input_method_small}('min_'.$attr)) && is_numeric(wbc()->sanitize->{$input_method_small}('max_'.$attr)) ) {

                            $tax_query[]=array(
                                'taxonomy' => $attr,
                                'field' => 'term_id',
                                'terms' => $this->range($attr,wbc()->sanitize->{$input_method_small}('min_'.$attr),wbc()->sanitize->{$input_method_small}('max_'.$attr),true),
                                'compare'=>'EXISTS IN'
                            );
                            /*ACTIVE_TODO_OC_START
		                    ACTIVE_TODO need to finalaize -- to a & -- to h
		                    		most likely we nide this logic but notte that the moved structure is different than from where it is moved  -- to a & -- to h
			  					ACTIVE_TODO if we can not confirm it based on the understanding of router and quarry layer and we can simply than lets keep it as active todo and if there are any issue comes up for tableview query layer especially the tableview legacy query layer which is now commented than we can think about it                            
                            --- aa code sp_tableview/application/model/publics/sp-model-query.php mathi move karyo se @a ---
                            --- start ---                            
                            -- below code is aditional in tableview and is not there in wbc so we must check if it is really nessasary before running the code -- to h
                            array(
                                'taxonomy' => $attr,
                                'operator' => 'NOT EXISTS'
                            ),array(
                                'key' => $attr,
                                'value' => false,
                                'type' => 'BOOLEAN'
                            )
                            --- end ---
                            ACTIVE_TODO_OC_END*/
                        }
                        else {

                            $tax_query[]=array(
                                'taxonomy' => $attr,
                                'field' => 'term_id',
                                'terms' => $this->range($attr,wbc()->sanitize->{$input_method_small}('min_'.$attr),wbc()->sanitize->{$input_method_small}('max_'.$attr)),
                                'compare'=>'EXISTS IN'
                            );
                            /*ACTIVE_TODO_OC_START
		                    ACTIVE_TODO need to finalaize -- to a & -- to h
									most likely we nide this logic but notte that the moved structure is different than from where it is moved  -- to a & -- to h
			  					ACTIVE_TODO if we can not confirm it based on the understanding of router and quarry layer and we can simply than lets keep it as active todo and if there are any issue comes up for tableview query layer especially the tableview legacy query layer which is now commented than we can think about it                            
                            --- aa code sp_tableview/application/model/publics/sp-model-query.php mathi move karyo se @a ---
                            --- start ---
                            array(
                                'taxonomy' => $attr,
                                'operator' => 'NOT EXISTS'
                            ),array(
                                'key' => $attr,
                                'value' => false,
                                'type' => 'BOOLEAN'
                            )                                                       
							--- end ---   
							ACTIVE_TODO_OC_END*/                         
                        }                   
                    }
                    elseif (isset($_DATA['checklist_'.$attr]) && !empty(wbc()->sanitize->{$input_method_small}('checklist_'.$attr))) {
                        $tax_query[]=array(
                            'taxonomy' => $attr,
                            'field' => 'slug',
                            'terms' => $this->tax_query_checklist_data( $input_method_small, 'checklist_'.$attr ),
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

        return $query;
	}

	public function tax_query_data( $input_method_small, $field, $key=null ) {
		if( $field == '_category') {
			return array_unique(array_filter(explode(',', wbc()->sanitize->{$input_method_small}($field))));
		}
		elseif( $field == '_category__no_array_unique') {
			return array_filter(explode(',', wbc()->sanitize->{$input_method_small}('_category')));
		}
		elseif ( $field == 'cat_filter_') {
			return array_filter(explode(',',wbc()->sanitize->{$input_method_small}($field.$key)));
		}
		elseif ( $field == '_current_category') {
			return explode(',',wbc()->sanitize->{$input_method_small}($field));
		}
		elseif ( $field == '_current_category__array_filter') {
			return array_filter(explode(',',wbc()->sanitize->{$input_method_small}('_current_category')));
		}
		elseif ( $field == 'CAT_LINK') {
			return array_filter(explode(',',wbc()->sanitize->{$input_method_small}('CAT_LINK') ));
		}
		elseif ( $field == '_attribute') {
			return array_filter(explode(',',wbc()->sanitize->{$input_method_small}('_attribute') ));
		}
		elseif ( $field == 'sku' ) {

			if(wbc()->sanitize->get('is_test') == 1) {
				
				wbc_pr("SP_Query tax_query_data");
				wbc_pr(wbc()->sanitize->{$input_method_small}('sku'));
				wbc_pr(explode(',',wbc()->sanitize->{$input_method_small}('sku') ));
			}
			
			return array_filter(explode(',',wbc()->sanitize->{$input_method_small}('sku') ));
		}

		return null;			        	
	}

	public function tax_query_checklist_data( $input_method_small, $field ) {

		return array_filter(explode(',',wbc()->sanitize->{$input_method_small}($field)));			        	
	}

	private function range($term,$min,$max,$numeric_range=FALSE) {
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
			/*$list=array_filter($list_slug,function($index) use($_min,$_max){
				return !($index >= $_min AND $index <= $_max);
			},ARRAY_FILTER_USE_KEY);*/				
			/*$list=array_column($list,'term_id');*/				
        }
        return $list;
    }

	private function meta_query( $_DATA, $query, $input_method_small ) {

        $meta_quer_args = $query->get('meta_query');/* array('relation' => 'AND')*/;

        // make the data layer dynamic here as required, as of now the data layer is static and reads only from the _REQUEST 
        //	TODO sanitize the input data here before passing to query, it is noted that so far not sanitized because sanitize function was affecting price values somehow. But maybe it couldn't be the case
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
        
        //	TODO shouldn't it be moved to the numeric extension? 
        // // meta query price per carat
        // if(!empty($_REQUEST['min__price_per_caret']) and !empty($_REQUEST['max__price_per_caret'])) {
        //     $meta_quer_args[] = array(
        //                             'key'     => '_price_per_caret',
        //                             'value'   => array(
        //                                             str_replace('$','',$_REQUEST['min__price_per_caret']),
        //                                             str_replace('$','',$_REQUEST['max__price_per_caret'])
        //                                         ),
        //                             'type'    => 'NUMERIC',
        //                             'compare' => 'BETWEEN',
        //                     );
        // }
        $meta_quer_args = apply_filters('sp_query_meta_query_args', $meta_quer_args);

        //	TODO shouldn't it be moved to the cust attr extension? 
		//	TODO sanitize the input data here before passing to query
        // if param _meta_field has query data            
        if(!empty($_DATA['_meta_field'])) {

            $query_metas = array_filter( explode(',',$_DATA['_meta_field']) );

            if(!empty($query_metas)) {

                $meta_list = array_values(unserialize(wbc()->options->get_option_group('list_custom_attribute_filters_map_master',"a:0:{}")));

                foreach($query_metas as $meta_key) {
                    
                    $meta_filter_data = $meta_list[array_search($meta_key,array_column($meta_list,'meta_key'))];
                                            
                    if(!empty($_DATA['_meta_field_'.$meta_key])) {

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
                                'value' => $this->meta_query_data( $input_method_small, '_meta_field_'.$meta_key, $_DATA ),
                                'compare' => '<=',
                                'type' => 'DATE'
                            );
                        }

                    }
                }
            }
        }
        $query->set('meta_query',$meta_quer_args);

        return $query;
    }

	public function meta_query_data( $input_method_small, $field, $_DATA, $key=null, $args=array() ) {
		if( $field == '_meta_field__array_filter' ) {
			return array_filter(explode(',', wbc()->sanitize->{$input_method_small}('_meta_field')));
		}
		elseif( $field == '_meta_field_' ) {
			return array(wbc()->sanitize->{$input_method_small}('_meta_field_'.$key));
		}
		else {
			return $_DATA[$field];			        	
		}
	}

    public function get_term($tax,$slug){
    	$term = get_term_by('slug',$slug,$tax);    	
    	if(is_wp_error($term) or empty($term)){
    		return false;
    	}
    	return $term;
    }

    public function attribute_lists($term,$list,$is_preserve_keys = false){    	
    	$new_list = array();
    	if(!empty($term) and !empty($list) and is_array($list)){    		
    		foreach ($list as $l_key=>$list_item) {
    			$term_obj = $this->get_term($term,$list_item);    			   			
    			//	TODO @mahesh in below condition there seems a bug, it should be checking the empty case for term_obj
    			if(!empty($term)){

    				if($is_preserve_keys) {

   		 				$new_list[$l_key]= $term_obj->name;    				
       				} else {

       					$new_list[]= $term_obj->name;
       				}
    			}
    		}
    	} 	    	
    	return $new_list;
    }

    public function attribute_range($term,$min,$max,$is_return_slugs_also=false) {

        $list=array();
        $list=get_terms(array('taxonomy'=>$term,'hide_empty'=>FALSE));                        
        $list_slug = array();
        array_walk($list,function($e) use(&$list_slug){
            $list_slug[$e->slug]=$e->name;
        });
        $_min=array_search($min,array_keys($list_slug));
        $_max=array_search($max,array_keys($list_slug));                              
        $list = array_slice(array_values($list_slug),$_min,($_max-$_min)+1);  

        $slugs = null;
        if($is_return_slugs_also) {

	        $slugs = array_slice(array_keys($list_slug),$_min,($_max-$_min)+1);  
        }

        if($is_return_slugs_also) {

        	return array($list, $slugs);
		}
        
        return $list;
    }  
}
