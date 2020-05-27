<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Preview {

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


        $this->att_link =array();

        if (isset($_GET['EO_WBC'])) {
            $this->eo_wbc_render(); //Render View and Routings
            $this->eo_wbc_config();            //Disable 'Add to Cart Button' and Set 'Sold Individually'
            $this->eo_wbc_add_breadcrumb();    //Add Breadcrumb
                        
        } elseif (get_option('eo_wbc_pair_status',false)=='1') {
            $this->eo_wbc_make_pair();
        }          
    }    

}