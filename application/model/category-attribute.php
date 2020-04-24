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

	public function get_category($parent_id = 0,$prefix = '') {
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
            $categories[$_category->term_taxonomy_id] = $prefix.$_category->name;
            $categories =array_merge($categories,$this->get_category($_category->term_id,'-'));
        }
        return $categories;
	}
	
}
