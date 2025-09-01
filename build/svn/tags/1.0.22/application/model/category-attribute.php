<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model;

defined( 'ABSPATH' ) || exit;

class Category_Attribute{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

  public function get_single_category(int $id) {    
    return wbc()->wc->get_term_by('term_taxonomy_id',$id,'product_cat');
  }

	public function get_category($parent_id = 0,$prefix = '-') {
		/*
		*	Takes two parameter parent_id for marking the parent category and prefix to add extra string before the term_label
		*	Retruns an array with term_taxonomy_id as key and term_label as value.
		*/
		$category = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => $parent_id,
            'taxonomy' => 'product_cat'
        ));
        
        $categories=array();       	
        foreach ($category as $_category) {                                	
            $categories[$_category->term_taxonomy_id] = \substr($prefix,1).$_category->name;
            // using array_replace to merge the array by keeping the keys.
            $categories = array_replace($categories,$this->get_category($_category->term_id,$prefix.\substr($prefix,0,1)));
        }        
        return $categories;
	}

	public function get_category_link( $category ) {
		
		if(empty($category)){ return false; } 

		$link = get_term_link( $category,'product_cat');

      	if(empty($link) or is_wp_error($link)) {
        	$link = get_bloginfo('url').'index.php/'.wbc()->wc->wc_permalink('category_base').'/'.$category;
      	} else {
        	$link = esc_url($link);  
      	}
      
      	if(strpos($link, '?')!==false){
          $link.='&';
      	} else {
          $link.='?';
      	}

      	return $link;      
	}	

  public function get_attribute($param = '') {
    if(!empty($param)) {
      if(is_numeric($param)) {
        if(function_exists('wc_get_attribute')){
           return wc_get_attribute($param);
        } else {

          foreach (wc_get_attribute_taxonomies() as $attribute) {

            if($attribute->attribute_id==$param){
                return $attribute;
            }                    
          }
          return false;         
        }
      } elseif( is_string($param)) {
        
        foreach (wc_get_attribute_taxonomies() as $attribute) {

          if($attribute->attribute_name==$param){
              return $attribute;
          }                    
        }
        return false;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function get_attributs() {    
    $attributes=array();
    foreach (wc_get_attribute_taxonomies() as $item) {                     
      $attributes[$item->attribute_name]= $item->attribute_label;            
    }
    return $attributes;    
  }
}
