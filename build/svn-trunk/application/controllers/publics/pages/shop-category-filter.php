<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Shop_Category_Filter extends Category {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {        
        $this->is_shop_cat_filter = true;
        $this->filter_prefix ='sc_';
    }

    public function init() {

        $shop_page_status = wbc()->options->get_option('filters_sc_filter_setting','sc_shop_cat_filter_location_shop');

        $category_id = wbc()->options->get_option('filters_sc_filter_setting','shop_cat_filter_category');
        $category_page_status = wbc()->options->get_option('filters_sc_filter_setting','sc_shop_cat_filter_location_cat');
       
                
        $is_shop = is_shop();
        $is_product_category = is_product_category();
        
        $category_term = array_map(function($id){
            $term = wbc()->wc->get_term_by('id',$id,'product_cat');
            if(!empty($term) and !is_wp_error($term)){
                return $term->slug;
            }
        },explode(',',$category_id ));
        
        ///wbc()->common->pr($category_term);

        //$category_term = get_term_by('id',$category_id,'product_cat');
        if( 
            ( $is_shop && empty($shop_page_status) )
            || 
            ( $is_product_category && (empty($category_term) or !is_array($category_term) or empty($category_page_status) or !in_array($this->eo_wbc_get_category(),$category_term) ) 
            )
            ||
            ( !$is_shop && !$is_product_category )
        ) {
            return false;
        }
        
        // parent::instance()->is_shop_cat_filter = true;
        // parent::instance()->filter_prefix ='sc_';

        add_filter('eowbc_table_view_forced',function(){
            return true;
        });
        /*
        if(class_exists('EO_WBC_E_TabView')){
            die();
            $table_object = new EO_WBC_E_TabView();
            $table_object->load_asset();
        }*/
        add_filter('eowbc_filter_widget_filters',function($filter){
            $_category = $this->eo_wbc_get_category();
            $_filter = array();
            if(!empty($filter) and is_array($filter)){
                foreach ($filter as $item) {                    
                    if(empty($item['filter_category'])){
                        $_filter[]=$item;  
                    } else{
                        $term = wbc()->wc->get_term_by('id',$item['filter_category'],'product_cat');
                        if(!empty($term) and !is_wp_error($term) and property_exists($term,'slug') and ($_category === $term->slug)) {
                            $_filter[] = $item;
                        }
                    }    
                }
                return $_filter;
            }
            return array();
        }); 

        parent::init();                    
    }    
}