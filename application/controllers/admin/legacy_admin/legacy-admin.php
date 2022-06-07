<?php
namespace eo\wbc\controllers\admin\legacy_admin;

defined( 'ABSPATH' ) || exit;

class Legacy_Admin
{

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

         //Initiate Orders Page
        \eo\wbc\controllers\admin\orders\Orders::instance()->init(); 
     
    }

   
}