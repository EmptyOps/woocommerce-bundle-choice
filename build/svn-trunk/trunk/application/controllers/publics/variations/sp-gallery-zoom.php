<?php
namespace eo\wbc\controllers\publics\variations;
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

    public static function should_init($args = array()){

        /*--- ACTIVE_TODO implments*/
        return true;
    }

    public function init($args = array()){

        \eo\wbc\model\publics\variations\SP_Model_Gallery_Zoom::instance()->init_core();
        
        // ACTIVE_TODO_OC_START
        // --- get ui call
        // ACTIVE_TODO_OC_END
        
        \eo\wbc\model\publics\variations\SP_Model_Gallery_Zoom::instance()->render_core();

        \eo\wbc\controllers\publics\variations\SP_Gallery_Zoom::instance()->selectron('zoom_images',$args);

        $this->getUI(null,$args);
    }

    private function selectron($page_section,$args = array()){

        $args['page_section'] = $page_section;

        if ($page_section == 'zoom_images') {

            add_filter('sp_slzm_zoom_images_html',function($html,$images_data) use($page_section,$args){

                $args['hook_callback_args'] = array();
                $args['hook_callback_args']['html'] = $html;
                $args['hook_callback_args']['images_data'] = $images_data;

                return $this->selectron_hook_render($page_section,'zoom_images_html',$args);
            },10,2);

        }       

    }

    public function selectron_hook_render($page_section,$container_class,$args = array()){

        if ($page_section == 'zoom_images') {
            if ($container_class == 'zoom_images_html') {
                $data = $args['hook_callback_args']['images_data'];
                unset($args['hook_callback_args']);
                return $this->load_view($data,$args);
            }
        }else{

            \eo\wbc\controller\publics\variations\SP_Gallery_Zoom::instance()->getUI();
        }
    }

    private function load_view($data,$args = array()){

        $args['data'] = $data;
        return $this->getUI($args['page_section'],$args);

    }

    private function getUI($page_section,$args = array()){

        $args['page_section'] = $page_section;
        
        if ($page_section == 'zoom_images') {

            $args['page_section'] = 'zoom_images';
            return $this->get_ui_definition($args);

        }else{  

           \eo\wbc\model\publics\variations\SP_Model_Gallery_Zoom::instance()->render_ui( $this->get_ui_definition($args));
        }
        
    }

    protected function get_ui_definition($args = array()){

        if (!isset($args['data'])) {

            $args['data'] = array();

        }

        $args['singleton_function'] = 'wbc';

        if ($args['page_section'] == 'zoom_images') {

            $args['data']['template_data'] = array(); 
            $args['data']['template_data']['template_key'] = 'gallery_zoom_{{template_key_device}}_image_loop_content';
            $args['data']['template_data']['template_sub_dir'] = 'single-product/gallery-zoom';
            $args['data']['template_data']['data'] = $args['data'];
            $args['data']['template_data']['singleton_function'] = 'wbc';

            $args['widget_key'] = '';
            $args['template_sub_dir'] = 'single-product/gallery-zoom';
            $args['template_option_key'] = '';
            $args['option_group_key'] = '';
            $args['template_key'] = 'gallery_zoom_{{template_key_device}}_image_loop';

        }

        return parent::get_ui_definition($args);

       /* if (!in_array($args)) {
            $args = array();
        }
        $args['template_option_key'] = 'diffrent_size_configure';
        $args['option_group_key'] = 'templat_size';
        $args['plugin_slug'] = sp_tv()->SP_Extension()->singleton_function();

        return parent::get_ui_definition($args);*/

    }

}