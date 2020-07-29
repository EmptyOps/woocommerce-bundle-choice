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

        $category_id = wbc()->options->get_option('filters_sc_filter_setting','shop_cat_filter_category');
        $category_page_status = wbc()->options->get_option('filters_sc_filter_setting','sc_shop_cat_filter_location_cat');

       
        if(empty($category_page_status) or $this->eo_wbc_get_category() !== get_term_by('id',$category_id,'product_cat')->slug) return false;

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

        parent::init();                    
    }    
}