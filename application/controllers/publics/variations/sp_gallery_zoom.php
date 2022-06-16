<?php
namespace eo\wbc\controller\publics\variations;
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

    public function should_init(){

     --- ACTIVE_TODO implments

    }

    public function init(){

        \eo\wbc\model\publics\variations\SP_Model_Gallery_Zoom::instance()->init_core();
        
        --- get ui call
        
        \eo\wbc\model\publics\variations\SP_Model_Gallery_Zoom::instance()->render_core();
    }

    private function selectron(){

    }

    public function selectron_hook_render(){

        \eo\wbc\controller\publics\variations\SP_Gallery_Zoom::instance()->getUI();

    }

    private function getUI(){
        \eo\wbc\model\publics\variations\SP_Model_Gallery_Zoom::instance()->render_ui( $this->get_ui_definition());
    }

    private function get_ui_definition($args = null){

       /* if (!in_array($args)) {
            $args = array();
        }
        $args['template_option_key'] = 'diffrent_size_configure';
        $args['option_group_key'] = 'templat_size';
        $args['plugin_slug'] = sp_tv()->SP_Extension()->singleton_function();

        return parent::get_ui_definition($args);*/

    }

}