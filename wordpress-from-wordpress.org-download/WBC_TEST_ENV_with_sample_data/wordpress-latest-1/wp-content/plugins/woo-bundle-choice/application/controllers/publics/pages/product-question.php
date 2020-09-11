<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Product_Question {

    private static $_instance = null;
    private $button_drawn;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
            self::$_instance->button_drawn = false;
        }

        return self::$_instance;
    }

    private function __construct() {        
    }

    public function init() {
        add_action('woocommerce_after_add_to_cart_button',array($this,'eowbc_askq_button'));        
    }    

    function eowbc_askq_button() {
        if(empty($this->button_drawn)){
            $this->button_drawn = true;
            wbc()->load->asset('css','fomantic/semantic.min');
            wbc()->load->asset('js','fomantic/semantic.min');
            $product_id = get_the_ID();
            wbc()->load->template('publics/product_question',compact(array('product_id')));
        }
    }    

}