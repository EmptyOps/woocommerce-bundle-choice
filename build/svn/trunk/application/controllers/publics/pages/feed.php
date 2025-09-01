<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Feed extends \eo\wbc\controllers\publics\Controller{

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
        return true;
    }

    public function init($args = array()){

        // if( wbc()->sanitize->get('is_test') == 2 ) {
        //     wbc()->common->var_dump( "wbc feed init");
        // }
        
        if(self::instance()->should_load_options_view()) {
            
            define('SP_VARIATIONS_LOADED', true);
            
            // if( wbc()->sanitize->get('is_test') == 2 ) {
            //     wbc()->common->var_dump( "wbc feed init if");
            // }

            $args['data'] = \eo\wbc\model\publics\SP_Model_Feed::instance()->get_data('swatches_init');
            $args['page_section'] = 'swatches';
            self::instance()->selectron($args['page_section'],$args);
            
            // ACTIVE_TODO when we do product simple type implementation at that time most probably we need to move below section out of if or just implement the simple type counter part in else block of this if condition 
            $args['data'] = \eo\wbc\model\publics\SP_Model_Feed::instance()->get_data('gallery_images_init');
            $args['page_section'] = 'gallery_images';
            self::instance()->selectron($args['page_section'],$args);

            $args['data'] = \eo\wbc\model\publics\SP_Model_Feed::instance()->get_data('swatches_cart_form');
            $args['page_section'] = 'swatches_cart_form';
            self::instance()->selectron($args['page_section'],$args);

            $args['data'] = \eo\wbc\model\publics\SP_Model_Feed::instance()->get_data('swatches_reset_link');
            $args['page_section'] = 'swatches_reset_link';
            self::instance()->selectron($args['page_section'],$args);
        }

        $this->getUI(null,$args);
    }

    public function should_load_options_view() {

        $bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));

        if( ( !isset($_GET['EO_WBC']) and !empty($bonus_features['opts_uis_item_page']) )/*(!isset($_GET['EO_WBC']) and wbc()->options->get_option('tiny_features','tiny_features_option_ui_toggle_status',false))*/ or ( isset($_GET['EO_WBC']) and wbc()->options->get_option('appearance_product_page','show_options_ui_in_pair_builder',false) ) ){

            $tiny_features_enable_only_for_categories = wbc()->options->get_option('tiny_features','tiny_features_enable_only_for_categories');
            
            $show_on_categories = !empty($tiny_features_enable_only_for_categories) ? explode(',', $tiny_features_enable_only_for_categories) : array();

            // if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc feed should_load_options_view if 1"); wbc_pr($tiny_features_enable_only_for_categories);}

            if( !wbc_isEmptyArr($show_on_categories) ) { 

                // if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc feed should_load_options_view if 2");}

                global $wp_query;

                $term_taxonomy_id = null;
                if(!empty($wp_query->get_queried_object()) and property_exists($wp_query->get_queried_object(),'term_taxonomy_id')) {

                    // if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc feed should_load_options_view if 3");}

                    $term_taxonomy_id = $wp_query->get_queried_object()->term_taxonomy_id;
                }

                if( !empty($term_taxonomy_id) and in_array( $term_taxonomy_id, $show_on_categories) ) {

                    return true;
                } else {
                    
                    // if( wbc()->sanitize->get('is_test') == 2 ) {wbc()->common->var_dump( "wbc feed should_load_options_view else 3.1");}

                    return false;       
                }
            }

            return true;
        }
    }

    public function selectron_hook_render($page_section,$container_class,$builtin_container = false, $args = array()){
        
        if ($page_section == 'swatches') {
            if ($container_class == 'swatches') {

                $args['product'] = $args['hook_callback_args']['product'];
                $args['is_return_html'] = $args['hook_callback_args']['is_return_html'];
                // $args['extra_args'] = $args['hook_callback_args']['extra_args'];
                // unset($args['hook_callback_args']);

                $data = \eo\wbc\model\publics\SP_Model_Feed::instance()->prepare_swatches_data($args);
                if (!empty($data['is_return_default_html'])) {    

                    return $data['html'];
                }

                //wbc_pr($data); die();
                return $this->load_view($data,$args);
            }

        } elseif ($page_section == 'gallery_images' ) {
            if ($container_class == 'gallery_images') {
                // $data = \eo\wbc\model\publics\SP_Model_Feed::instance()->prepare_swatches_data($args);
                // if (!empty($data['is_return_default_html'])) {
                //     return $data['html'];
                // }
                // //wbc_pr($data); die();
                // return $this->load_view($data,$args);

                $args['product'] = $args['hook_callback_args']['product'];
                $args['extra_args'] = $args['hook_callback_args']['extra_args'];
                unset($args['hook_callback_args']);

                \eo\wbc\model\publics\SP_Model_Feed::instance()->render_gallery_images_template_callback($args);
            }

        } elseif ($page_section == 'swatches_cart_form') {

            if ($container_class == 'SP_SLCTRN_Swatches_Cart_Form') {
                
                remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
                add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart', 30 );

                /*ACTIVE_TODO_OC_START
                --  here we have no compatibilitys patches planed so far but we may like to add here the compatibility patch for the select option link issue that we have noted on 4 themes during testing -- to h
                remove_action( 'woocommerce_before_shop_loop', '????????', 10 );
                \eo\wbc\model\SP_WBC_Compatibility::instance()->loop_render_compatability('before_shop_loop_item_loop_thumbnail_action', $args);
            
                add_action( 'woocommerce_before_shop_loop', function() use($page_section,$args) { 

                });
                ACTIVE_TODO_OC_END*/

                // $data = $args['hook_callback_args'];
                // unset($args['hook_callback_args']);
                // return $this->load_view($data,$args);
            }

        } elseif ($page_section == 'swatches_reset_link') {

            if ($container_class == 'SP_SLCTRN_Swatches_Reset_Link') {

                return \eo\wbc\model\publics\SP_Model_Feed::instance()->prepare_swatches_reset_link_data($args)['content'];
            }

        } else{
            \eo\wbc\controller\publics\Feed::instance()->getUI(null);
        }
    }

    private function selectron($page_section,$args = array()){
        //--    move below to options controller selectron function -- to b done
            //--    and from init function of the same controller call the selectron with page_section=swatches and args param that init may have or null -- to b  done
                //--    so selectron will also have two param like getUI of options controller -- to b done 
                    //--    and from within callback function call the selectron hook render or something such function, with the hook args set in the args var and also the page_section param and also the container_class(for the particular hook) param -- to b done        
                        //--    and then create function prepare_swatches_data in single-product model in wbc, and move all code inside below to that selectron hook render in its swatches section -- to b done
        if ($page_section == 'gallery_images') {
            
            // remove
            remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
            \eo\wbc\model\SP_WBC_Compatibility::instance()->loop_render_compatability('before_shop_loop_item_loop_thumbnail_action', $args);
            
            add_action( 'woocommerce_before_shop_loop_item_title', function() use($page_section,$args) {
                
                global $product;
                
                // if( wbc()->sanitize->get('is_test') == 1 ) {
                //     wbc_pr('Feed selectron');
                //     wbc_pr($product);
                // }
                do_action( 'sp_wbc_woo_template_loop_product_thumbnail', $product, null);


            }, 15 );

            add_action('sp_wbc_woo_template_loop_product_thumbnail', function($product, $extra_args) use($page_section,$args) {  

                $args['hook_callback_args'] = array();
                $args['hook_callback_args']['product'] = $product;
                if( wbc()->sanitize->get('is_test') == 1 ) {

                    wbc_pr('feed selectron_hook_render args2');
                    wbc_pr($args);
                }
                // $args['hook_callback_args']['hook_args'] = $hook_args;
                $args['hook_callback_args']['extra_args'] = $extra_args;

                return $this->selectron_hook_render($page_section,'gallery_images',false,$args);

            }, 15, 2);

        } elseif ($page_section == 'swatches') {

            add_filter( 'woocommerce_dropdown_variation_attribute_options_html',  function($html, $hook_args) use($page_section,$args){
                if( wbc()->sanitize->get('is_test') == 1 ) {

                    wbc_pr('feed selectron_hook_render swatches if');
                    wbc_pr($args);
                }        
                return apply_filters ( 'sp_wbc_get_variation_attr_opts_html',$html, $hook_args, null, false);

            }, 200, 2);

            add_filter('sp_wbc_get_variation_attr_opts_html',function($html, $hook_args, $product, $is_return_html) use($page_section,$args){


                $args['hook_callback_args'] = array();
                $args['hook_callback_args']['html'] = $html;
                $args['hook_callback_args']['hook_args'] = $hook_args;
                $args['hook_callback_args']['product'] = $product;
                $args['hook_callback_args']['is_return_html'] = $is_return_html;


                return $this->selectron_hook_render($page_section,'swatches',false,$args);
                
            }, 200, 4);

        } else if ($args['page_section'] == 'swatches_cart_form') {

            $SP_SLCTRN_Swatches_Cart_Form_class = "\\sp\\wbc\\controller\\publics\\feed\\loop\\selectron\\SP_SLCTRN_Swatches_Cart_Form";                      
            $SP_SLCTRN_Swatches_Cart_Form_object = call_user_func(array($SP_SLCTRN_Swatches_Cart_Form_class,'instance'));

            $sections = array(
                $page_section=>array(
                    'handler_object'=>$SP_SLCTRN_Swatches_Cart_Form_object,
                    'default_action'=>'woocommerce_before_shop_loop',
                    'default_params'=>'',
                    'default_priority'=>110,
                    'section'=>$page_section
                )                    
            );

            \sp\selectron\controller\publics\Publics::render('wbc',$sections);

        } else if ($args['page_section'] == 'swatches_reset_link') {

            $SP_SLCTRN_Swatches_Reset_Link_class = "\\sp\\wbc\\controller\\publics\\feed\\loop\\selectron\\SP_SLCTRN_Swatches_Reset_Link";                      
            $SP_SLCTRN_Swatches_Reset_Link_object = call_user_func(array($SP_SLCTRN_Swatches_Reset_Link_class,'instance'));

            $sections = array(
                $page_section=>array(
                    'handler_object'=>$SP_SLCTRN_Swatches_Reset_Link_object,
                    'default_action'=>'woocommerce_reset_variations_link',
                    'default_render_method'=>'add_filter',
                    'default_params'=>'1',
                    'default_priority'=>'10',
                    'section'=>$page_section
                )                    
            );
            \sp\selectron\controller\publics\Publics::render('wbc',$sections);

        }
    }

    private function load_view($data,$args = array()){
        // NOTE: since so far we do not needed to create the view class and the actual ui is also coming from the templates folder so, so far not creating the view class. and just implementing the required logic from here. but if it become necessary then in future create the view class. 

        if ($args['page_section'] == 'gallery_images') {

            $this->render_swatches_data_by_attribute_type($data,$args);
        } elseif ($args['page_section'] == 'swatches') {

            return $this->render_swatches_data_by_attribute_type($data,$args);

        }
    }

    private function getUI($page_section,$args = array()){
        $args['page_section'] = $page_section;
        
        if ($page_section == 'woo_dropdown_attribute_html' or $page_section == 'variable_item' or $page_section == 'variable_item_wrapper') {
            return $this->get_ui_definition($args);
        

        }else{  

            \eo\wbc\model\publics\SP_Model_Feed::instance()->render_ui( $this->get_ui_definition($args) );
        }
    } 

    protected function get_ui_definition($args = array()){
        
        if (!isset($args['data'])) {

            $args['data'] = array();

        }

        $args['singleton_function'] = 'wbc';

        $type = isset($args['data']['woo_dropdown_attribute_html_data']['type']) ? $args['data']['woo_dropdown_attribute_html_data']['type'] : null;
        
        /*ACTIVE_TODO_OC_START
        and make all four templates below dynamic, based on the points added on data layer and also there might be some on the template files -- to b 
        ACTIVE_TODO_OC_END*/

        if ($args['page_section'] == 'woo_dropdown_attribute_html') {
            
            if( wbc()->sanitize->get('is_test') == 1 ) {
                // wbc_pr('woo_dropdown_attribute-template_part');
                var_dump('wbc feed woo_dropdown_attribute_html');
            }
            
            //drop type var from below and set name of the one only template, simply set it hardcoded -- to b done
            $args['data']['template_data'] = array();
            $args['data']['template_data']['template_key'] = 'woo_dropdown_attribute-template_part';
            $args['data']['template_data']['template_sub_dir'] = 'loop/variations-swatches/woo_dropdown_attribute';
            $args['data']['template_data']['data'] = $args['data'];
            $args['data']['template_data']['singleton_function'] = 'wbc';


            $args['widget_key'] = '';
            $args['template_sub_dir'] = 'loop/variations-swatches/woo_dropdown_attribute';
            $args['template_option_key'] = '';
            $args['option_group_key'] = '';
            $args['template_key'] = 'woo_dropdown_attribute';
            $args['singleton_function'] = 'wbc';


        }else if ($args['page_section'] == 'variable_item') {

            /*ACTIVE_TODO_OC_START
            dropd template part from both actual key params below, it will be loaded from inside the below main template -- to b 
                --  from inside the commong template below the particular template would be loaded -- to b 
                    --  and on this note for non dropdown types we can simply one file and load their specific option_template_part from there. but lets keep theme together only if they share common code -- to b 
                --  and from that particular template the their option_template_part would be loaded 
                --  so there would be some heirarchical if conditions that will be required, the conditions would be based on $type -- to b 
                ACTIVE_TODO_OC_END*/
            $args['data']['template_data'] = array();
            $args['data']['template_data']['template_key'] = 'sp_variations_optionsUI-common-option_template_part';
            $args['data']['template_data']['template_sub_dir'] = 'loop/variations-swatches';
            $args['data']['template_data']['data'] = $args['data'];
            $args['data']['template_data']['singleton_function'] = 'wbc';

            $args['widget_key'] = '';
            $args['template_sub_dir'] = 'loop/variations-swatches';
            $args['template_option_key'] = '';
            $args['option_group_key'] = '';
            $args['template_key'] = 'sp_variations_optionsUI-common';
            $args['singleton_function'] = 'wbc';
           

        }else if ($args['page_section'] == 'variable_item_wrapper') {

            // drop type var from below and set name of the one only template, simply set it hardcoded -- to b done

            $args['widget_key'] = '';
            $args['template_sub_dir'] = 'loop/variations-swatches';
            $args['template_option_key'] = '';
            $args['option_group_key'] = '';
            $args['template_key'] = 'sp_variations_optionsUI-common-ribbon_wrapper';
            $args['singleton_function'] = 'wbc';

            

        }/*else {
            $args['template_sub_dir'] = '';
            $args['template_option_key'] = '';
            $args['option_group_key'] = '';
            $args['template_key'] = '';
            $args['plugin_slug'] = '';
        }*/
        /*ACTIVE_TODO_OC_START
        --  in parent class function add if condition, that if template_option_key and template_key both is empty then simply return $template -- to b 
            --  so at top define the null $template var -- to b 
        ACTIVE_TODO_OC_END*/
        return parent::get_ui_definition($args);

       /* --- Publics.php no hook_render function no code che
        $react_templat = wbc()->options->get_option('diffrent_size_configure','templat_size');
        if ($react_templat == 'react_template') {
            
        }else{
        }*/
    }

    public function render_swatches_data_by_attribute_type($data,$args = array()){

        $result_html = '';

        // put ui-builder in autoloader function in config file and then remove load model ui builder statement from everywhere -- to b
        $ui = $this->render_woo_dropdown_attribute_html_data($data,$args);
        // ACTIVE_TOOD below calls to theme ui page builder class was upgraded to SP_WBC_Page_Builder class function calls so that we can remove the dependancy on the theme ui package. however there is one catch instead of calling the ui builder build function(like extensions are doing) we are calling the page builder class's build page widgets function so still need to upgrade that as requierd as well as if we face any issues related this upgrade then need to take care of it. as well as need to note carefully that the calls are upgraded but it is not yet supporting the appearance, configuration and data controls. for that the respective functions need to be created inside the respective model and then pass the ui_definition in below function call to enable support for that. so lets do it during the wbc upgrade or max by 1st or 2nd revision. -- to h 
        // $result_html .= \sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui, 'woo_dropdown_attribute_html', array(), $args['is_return_html']);
        $result_html .= \eo\wbc\model\SP_WBC_Page_Builder::build_page_widgets($ui, 'woo_dropdown_attribute_html', array(), $args['is_return_html']);         


        if ($data['woo_dropdown_attribute_html_data']['args']['sp_variations_swatches_show_on_shop_page'] == 1) { 

            $html = apply_filters('sp_render_swatches_data_by_attribute_type',null,$data);

            if (!empty($html)) {
                $ui = $html;
            }else{

                $data['variable_item_ui'] = $this->render_variable_item_data($data,$args);

                $ui = $this->render_variable_item_wrapper_data($data,$args );           
            }
            //wbc_pr($ui); die();

            if( wbc()->sanitize->get('is_test') == 1 ) {

                wbc_pr("wbc Feed render_swatches_data_by_attribute_type inner if");
                // wbc_pr($data['variable_item_ui']);
            }

            // ACTIVE_TOOD below calls to theme ui page builder class was upgraded to SP_WBC_Page_Builder class function calls so that we can remove the dependancy on the theme ui package. however there is one catch instead of calling the ui builder build function(like extensions are doing) we are calling the page builder class's build page widgets function so still need to upgrade that as requierd as well as if we face any issues related this upgrade then need to take care of it. as well as need to note carefully that the calls are upgraded but it is not yet supporting the appearance, configuration and data controls. for that the respective functions need to be created inside the respective model and then pass the ui_definition in below function call to enable support for that. so lets do it during the wbc upgrade or max by 1st or 2nd revision. -- to h 
            // $result_html .= \sp\theme\view\ui\builder\Page_Builder::instance()->build_page_widgets($ui, 'swatches', array(), $args['is_return_html']);
            $result_html .= \eo\wbc\model\SP_WBC_Page_Builder::build_page_widgets($ui, 'swatches', array(), $args['is_return_html']);               
        }

        return $result_html;
    }

    public function render_woo_dropdown_attribute_html_data($data,$args = array()){

        $args['data'] = $data;
        return $this->getUI('woo_dropdown_attribute_html',$args);

    }

    public function render_variable_item_data($data,$args = array()){

        $args['data'] = $data;
        return $this->getUI('variable_item',$args);

    }

    public function render_variable_item_wrapper_data($data,$args = array()){

        $args['data'] = $data;
        return $this->getUI('variable_item_wrapper',$args);

    }

    public function ajax($args = array()){

        $args['page_section'] == 'get_default_gallery';

        $args['data'] = \eo\wbc\model\publics\SP_Model_Feed()::instance()->get_data('get_default_gallery_init');

        \eo\wbc\controller\publics\Feed::instance()->selectron('get_default_gallery');

        $args['page_section'] == 'get_variation_gallery';

        $args['data'] = \eo\wbc\model\publics\SP_Model_Feed()::instance()->get_data('get_variation_gallery_init');

        \eo\wbc\controller\publics\Feed::instance()->selectron('get_variation_gallery');

    }

    protected function ajax_response($data, $args = array()){
        ob_start();

        wp_send_json( $data );
    }
}
