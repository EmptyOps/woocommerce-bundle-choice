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
			/*$list=array_filter($list_slug,function($index) use($_min,$_max){
				return !($index >= $_min AND $index <= $_max);
			},ARRAY_FILTER_USE_KEY);*/				
			/*$list=array_column($list,'term_id');*/				
        }
        return $list;
    }

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//  Enable non table based filter that loads whole page at front :)
	//////////////////////////////////////////////////////////////////////////////////////////////////
	public function filter() {			
		
		if(!empty(wbc()->sanitize->get('eo_wbc_filter'))) {
						
		    add_filter('pre_get_posts',function($query ) {		    		

		    	$_GET = apply_filters('filter_widget_ajax_pre_get',$_GET);		        	
		    	
		    	if(apply_filters('eowbc_filter_override',false) and (!empty($_REQUEST['eo_wbc_filter']))) {
		            echo json_encode(apply_filters('eowbc_filter_response',array()));
		            die();
		        }
		        
   		        if( $query->is_main_query() and !empty($query->query_vars['product_cat'])) {

		        	if(isset($_GET['products_in']) AND !empty(wbc()->sanitize->get('products_in')) ) {
		        		$query->set('post__in',explode(',',wbc()->sanitize->get('products_in')));			        	
			        }

		        	if( isset($_GET['_category']) OR isset($_GET['_current_category']) ){

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

		        return apply_filters('filter_widget_ajax_post_query',$query);
		    });		   
		}
	}	
}