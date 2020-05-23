<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Product {

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
        /*die();*/
        do_action('wbc_pre_product_page');        
        $this->specification_view();
        do_action('wbc_post_product_page');        
    }    

    function specification_view() {
        if(wbc()->options->get_option('tiny_features','specification_view_status',false) and wbc()->options->get_option('tiny_features','specification_view_default_status',false)){

            add_action('woocommerce_after_single_product_summary',function(){
                wbc()->load->template('publics/features/specification_view');            
            });
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
        }
    }
}
