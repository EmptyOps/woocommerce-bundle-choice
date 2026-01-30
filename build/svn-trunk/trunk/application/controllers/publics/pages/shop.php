<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Shop {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {        
    }

    public function init() {
        $this->tiny_feature_filter();
    }

    public function tiny_feature_filter() {
        $tiny_feature_filter_status = wbc()->options->get_option('tiny_features','shop_cat_filter_location_shop');
        
        if(!empty($tiny_feature_filter_status)) {            
            \eo\wbc\controllers\publics\Tiny_Filter::instance()->init();
        }
    }
}