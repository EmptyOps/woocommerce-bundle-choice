<?php

defined( 'ABSPATH' ) || exit;

class Cache_Manager {

	private static $_instance = null;

	public static function getInstance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function generate_cache(){
		
		if(!wp_cache_get('cache_taxonomy','eo_wbc')) {

			$cache_taxonomy = get_transient('eo_wbc_cache_taxonomy');			
			if($cache_taxonomy===false) {

				$cache_taxonomy = $this->cache_taxonomy();
				set_transient('eo_wbc_cache_taxonomy', $cache_taxonomy, HOUR_IN_SECONDS);
			} 									
			wp_cache_set('cache_taxonomy', $cache_taxonomy , 'eo_wbc', HOUR_IN_SECONDS);			
		}

		if(!wp_cache_get( 'cache_maps', 'eo_wbc')) {
			wp_cache_set('cache_maps',$this->cache_maps(),'eo_wbc',HOUR_IN_SECONDS);
		}
		//var_dump(wp_cache_get('cache_taxonomy','eo_wbc'));
		//var_dump(wp_cache_get( 'cache_maps', 'eo_wbc'));		
	}

	private function cache_taxonomy(){		

		$_taxonomy_ = wc_get_attribute_taxonomies();
    
    	if(!empty($_taxonomy_) and !is_wp_error($_taxonomy_)) {
    		$cache = array();
	        foreach ($_taxonomy_ as $taxonomy) {
	            
	            $taxonomy_slug = wc_attribute_taxonomy_name($taxonomy->attribute_name);	            

	            if((function_exists('taxonomy_exists') and taxonomy_exists($taxonomy_slug)) or 
	               (is_taxonomy($taxonomy_slug))) {

	                $taxonomy_terms = get_terms(array('taxonomy'=>$taxonomy_slug,'hide_empty'=>false));
	                usort($taxonomy_terms,function($a,$b){
	                    if((float)$a->name and (float)$b->name){
	                        return $a->name > $b->name;
	                    } elseif(is_string($a->name) and is_string($b->name)) {
	                        return strnatcmp($a->name,$b->name);
	                    } else {
	                        return true;
	                    }
	                });      

	                $cache[$taxonomy_slug] = $taxonomy_terms;                      
	            }                                                    
	        }
	        return $cache;
	    } else {
	    	return array();
	    }
	}	

	private function cache_maps(){
		
		$maps = unserialize(get_option('eo_wbc_cat_maps',"a:0:{}"));
		if(!is_wp_error($maps) and !empty($maps)) {

			$maps = array_map(function($map){
			 	
			 	$first_part = explode(',',$map[0]);
			 	$second_part = explode(',',$map[1]);
			 	
			 	if(count($first_part)>1) {			 		
					$map[0] = $this->terms_between(EO_WBC_Support::get_term_by_term_taxonomy_id($first_part[0])->taxonomy,$first_part[0],$first_part[1]);			 		
			 	} else {
			 		$map[0] = $first_part;
			 	}

			 	if(count($second_part)>1) {			 		
					$map[1] = $this->terms_between(EO_WBC_Support::get_term_by_term_taxonomy_id($second_part[0])->taxonomy,$second_part[0],$second_part[1]);			 		
			 	} else {
			 		$map[1] = $second_part;
			 	}
			 	return $map;			 	

			 },$maps);
			return $maps;
		} else {
			return array();
		}
	}

	private function terms_between($taxonomy, $begining_term, $end_term) { 

		$terms = wp_cache_get('cache_taxonomy','eo_wbc');
		$terms = $terms[$taxonomy];

		/*array_walk($terms,function($term,$index) use(&$terms){
			$terms[$index] = (array)$term;
		});*/
		$begining_marked_status = false;
		$end_marked_status = false;

		$terms = array_filter($terms,function($term) use(&$begining_marked_status, &$end_marked_status,&$begining_term,&$end_term){
			
			if($begining_marked_status==true and $end_marked_status==true) {
				return false;				
			} else {
				
				if($begining_marked_status==false){	//If no begining is marked

					if($term->term_taxonomy_id==$begining_term) {
						$begining_marked_status = true;
						return true;
					} else {
						return false;
					}
				} else {	//Begining is marked

					if($end_marked_status==false or ($end_term == $term->term_taxonomy_id)) {
						if($end_term == $term->term_taxonomy_id) {
							$end_marked_status = true;
						}
						return true;
					} else {
						return false;
					}
					
				}
			}			
		});

		$terms =array_map(function($term){
			return $term->term_taxonomy_id;			
		},$terms);
		if(!empty($terms)){
			return array_values($terms);		
		} else {
			return array();
		}
		
	}
}

add_action('init',function(){
	$cache_manager = Cache_Manager::getInstance();

	$cache_manager->generate_cache();
	/*add_action( 'clean_taxonomy_cache', array($cache_manager,'generate_cahce'), 10 );
    add_action( 'before_delete_post', array($cache_manager,'generate_cahce') );
    add_action( 'save_post', array($cache_manager,'generate_cahce') );*/
},10,3);   
