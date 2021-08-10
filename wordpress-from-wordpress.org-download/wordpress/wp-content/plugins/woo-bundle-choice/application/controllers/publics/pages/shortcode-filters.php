<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Shortcode_Filters extends Category {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {        
        $this->is_shortcode_filter = true;
        $this->filter_prefix ='shortflt_';
    }

    public function init() {
        
        // parent::instance()->is_shortcode_filter = true;
        // parent::instance()->filter_prefix ='shortflt_';

        parent::init();                    
        add_filter( 'eowbc_filter_widget_loader','__return_false');
    }    
}