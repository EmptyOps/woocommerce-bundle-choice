<?php
namespace eo\tv\controller\publics\variations;
defined( 'ABSPATH' ) || exit;

class SP_Gallery_Zoom extends \eo\wbc\controllers\publics\Controller{
 
    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {
        
    }

}