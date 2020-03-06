<?php
/** 
* Plugin Name: WooCommerce Product Bundle Choice | Ring Builder, Pair Maker and Guidance Tool
* Plugin URI: https://wordpress.org/plugins/woocommerce-bundle-choice/
* Description: An E-Commerce tool that let your customer's buy product in a set and create map that relates between your product categories.
* Version: 0.5.61
* Author: emptyopssphere
* Author URI: https://profiles.wordpress.org/emptyopssphere
* Requires at least: 3.5
* Tested up to: 5.3.2
* License: GPLv3+
* License URI: http://www.gnu.org/licenses/gpl-3.0.txt
* Text Domain: woo-bundle-choice
* Domain Path: /languages
*/

//Block direct access intrusion.
if (!defined('ABSPATH')) exit;

require_once 'EO_WBC_ERROR_HANDLER.php';

//load plugin.php to get access to get_plugin_data method.
require_once ABSPATH.'wp-admin/includes/plugin.php';

//Define plugin specification which is available in this file.
define('EO_WBC_PLUGIN_NAME',get_plugin_data(__FILE__)['Name']);
define('EO_WBC_PLUGIN_FILE',__FILE__);
define('EO_WBC_PLUGIN_VERSION',get_plugin_data(__FILE__)['Version']);
define('EO_WBC_PLUGIN_DIR',plugin_dir_path( __FILE__ ));
define('EO_WBC_PLUGIN_ICO',plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/icon.png'));
define('EO_WBC_PLUGIN_ICO_BIG',plugins_url(basename(constant('EO_WBC_PLUGIN_DIR')).'/EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_Img/EO_WBC_Cart.png'));

//Load support file...
if(!class_exists('EO_WBC_Support')) {
    require_once apply_filters('eo_wbc_support','EO_WBC_Admin/EO_WBC_Support.php',33);
}

//Load the core module to perform actvation/deactivation/uninstall.
require_once 'EO_WBC_Core/EO_WBC_Core.php';

//Load the file with main functionality.
require_once 'EO_WBC_Choice.php';

//Powering up the core which activate/deactivate and uninstall plugin.
new EO_WBC_Core(__FILE__);

//Begin action only if all plugins are loaded.
add_action('plugins_loaded',function(){   
    
    // Generate caches.
    require_once 'class-cache-manager.php';
    /*add_action('init',function(){
        var_dump(wp_cache_get('cache_taxonomy','eo_wbc'));    
    });*/
    

    //var_dump(get_post_meta( 413, '_product_attributes' ));    
    if(defined( 'DOING_AJAX' )) {

        add_action( 'wp_ajax_eo_wbc_home_error_report',function(){            
            throw new Exception("WooCommerce Product Bundle Choice failed to integrate with theme at page ".$_POST['page'],1);
        });            
        add_action( 'wp_ajax_nopriv_eo_wbc_home_error_report',function(){            
            throw new Exception("WooCommerce Product Bundle Choice failed to integrate with theme at page ".$_POST['page'],1);
        });            

        add_action( 'wp_ajax_eo_wbc_home_send_error_report',function(){            
            require_once(EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Error.php');
            eo_wbc_send_error_report();
            echo true;
            wp_die();
        });            
        add_action( 'wp_ajax_nopriv_eo_wbc_home_send_error_report',function(){            
            require_once(EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/EO_WBC_View_Error.php');
            eo_wbc_send_error_report();
            echo true;
            wp_die();
        });
    }

    load_plugin_textdomain( 'woo-bundle-choice', false, basename( dirname( __FILE__ ) ) . '/languages');
        
    add_action( 'wp_enqueue_scripts',function(){

        add_action('eo_wbc_autoload_css',function($path){

            $css_name='eo_wbc_'.str_replace(array('/','.'),'_',stripslashes($path));
            $css_file=plugin_dir_url(__FILE__).'css/'.stripslashes($path);

            wp_register_style( $css_name,$css_file);
            wp_enqueue_style($css_name);
        });

        add_action('eo_wbc_autoload_js',function($path){
            $js_name='eo-wbc-'.str_replace(array('/','.'),'_',stripslashes($path));
            $js_file=plugin_dir_url(__FILE__).'js/'.stripslashes($path);
            wp_register_script( $js_name,$js_file);
            wp_enqueue_script($js_name);
        });

        add_action('eo_wbc_autoload_inline_js',function($script){
            ?><script>jQuery(document).ready(function($){<?php echo $script; ?>});</script><?php
        });
        add_action('eo_wbc_autoload_inline_css',function($style){
            add_action('wp_footer',function() use ($style){
                ?><style><?php echo $style; ?></style><?php    
            });            
        });

        //the includes below shall beremoved and added via do_action method.
        wp_register_style( 'eo_wbc_step_style',plugin_dir_url(__FILE__).'css/step.min.css',true);
        wp_enqueue_style( 'eo_wbc_step_style' );

        wp_register_style( 'eo-wbc-grid-style',plugin_dir_url(__FILE__).'css/grid.min.css',true);
        wp_enqueue_style( 'eo-wbc-grid-style' );

        wp_register_style( 'eo-wbc-button-style',plugin_dir_url(__FILE__).'css/button.min.css',true);
        wp_enqueue_style( 'eo-wbc-button-style' );      

        wp_register_style( 'eo-wbc-custom-step-style',plugin_dir_url(__FILE__).'css/eo-step.min.css',true);
        wp_enqueue_style( 'eo-wbc-custom-step-style' );

        wp_register_style( 'eo-wbc-ui-css',plugin_dir_url(__FILE__).'css/fomantic/semantic.min.css','2.8.1');
        //wp_enqueue_style( 'eo-wbc-ui-css');      

        wp_register_script( 'eo-wbc-ui-js',plugin_dir_url(__FILE__).'js/fomantic/semantic.min.js',array('jquery'),'2.8.1',true);
        wp_enqueue_script( 'eo-wbc-ui-js');   

        wp_register_style( 'eo-material-anim',plugin_dir_url(__FILE__).'css/material-anim.css',true);
        wp_enqueue_style( 'eo-material-anim');             
        
        /*get_theme_mod( 'my-custom-color' );*/
    },100);

    add_action( 'get_footer',function(){
        wp_enqueue_style( 'eo-wbc-ui-css');
    },100);

    //require_once 'EO_WBC_Template.php';

    new EO_WBC_Choice();
    //If WooCommerce is not active then exit from here....
    if(class_exists( 'WooCommerce' )){
        eo_wbc_woocommerce_available_actions();        
    }

    add_action('customize_register', function($wp_customize) {
        //adding section in wordpress customizer   
        $wp_customize->add_section('woo_bundle_choice', array(
            'title'          => 'Woo Bundle Choice',
            'active_callback' => 'is_front_page'
        ));

        //adding setting for copyright text
        $wp_customize->add_setting('btn_position_setting_text', array(
            'default'        => '',
            'type' => 'option',
        ));

        $wp_customize->add_control('btn_position_setting_selector_text', array(
            'label'   => "Click below to enable section and select area on the home page and then buttons will appear in this area.",
            'section' => 'woo_bundle_choice',
            'settings'   => 'btn_position_setting_text',
            'type'    => 'text',            
        ));

        
        $wp_customize->add_setting('btn_position_setting_btn', array(
            'default'        => 'Enable Selection',
            'type' => 'option',
        ));

        $wp_customize->add_control('btn_position_setting_selector_btn', array(
            'label'   => '',
            'section' => 'woo_bundle_choice',
            'settings'   => 'btn_position_setting_btn',
            'type'    => 'button', 
            'input_attrs' => array('class' => 'button button-primary'),
        ));
    });        

    if( ! defined( 'DOING_AJAX' )){
        
        add_action( 'wp_enqueue_scripts',function(){
            wp_register_style( 'eo-material-anim',plugin_dir_url(__FILE__).'css/material-anim.css',true);
            wp_enqueue_style( 'eo-material-anim');
        });
    }   
    if( ! defined( 'DOING_AJAX' ) and is_admin() ) {
        ob_start();
        ?>        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>                   
            
            jQuery(document).ready(function($){   

                var getUniqueSelector = function (el) {
                      if (!el) { return; }
                      var selectors=Array();            
                      
                      $.each($(el).parentsUntil('body').add($(el)),function(index,element){
                          
                          if($(element).length>0){

                              var selector = (element.tagName || '').toLowerCase();
                              if (element.id) {
                                selector += '#' + element.id;
                              }
                              
                              for (var i = 0, len = element.attributes.length; i < len; i++) {
                                if((element.attributes[i].name).trim()=='class'){

                                    value=((element.attributes[i].value).replace(/red-border-section/g,'')).trim();  
                                    if(value!=''){
                                        selector += '[' + element.attributes[i].name + '="' + ((element.attributes[i].value).replace(/red-border-section/g,'')).trim() + '"]';    
                                    }
                                }                    
                              }
                              var parent = $(element).parent();
                              var sameTagSiblings = parent.children(selector);                                                  
                              /*if (sameTagSiblings.length > 1) { */
                                  var allSiblings = parent.children();
                                  var index = allSiblings.index(element) + 1;                        
                                  selector += ':nth-child(' + index + ')';                        
                              /*}*/
                              selectors.push(selector);
                          }
                      });
                      return selectors.join('>');
                };                     

                $(document).on('click','#_customize-input-btn_position_setting_selector_btn',function(e){
                    
                    if($(this).val()=='Selection Enabled'){
                        
                        $(this).val('Enable Selection');                                
                        $("#customize-preview iframe").contents().find('.red-border-section').removeClass('red-border-section');
                        $("#customize-preview iframe").contents().off('mouseenter','div,section,article,span,main,p');

                    } else {
                        
                        $(this).val('Selection Enabled');    
                        $("#customize-preview iframe").contents().on('mouseenter','div,section,article,span,main,p',function(e){
                            $("#customize-preview iframe").contents().find('.red-border-section').removeClass('red-border-section');
                            $(this).addClass('red-border-section');
                        });         
                    }

                    $("#customize-preview iframe").contents().on('click','.red-border-section',function(){

                        $("#_customize-input-btn_position_setting_selector_text").val(getUniqueSelector(this));
                        $('#_customize-input-btn_position_setting_selector_btn').val('Enable Selection');                        
                        jQuery("#_customize-input-btn_position_setting_selector_text").trigger('change');
                    });
                    
                });
            });                
        </script>                
    <?php                
    }

},15);

//Add Setting Link adjecent to Plugin Name in Admin's Plugin Panel
add_filter('plugin_action_links_'.plugin_basename(__FILE__),function($links){
    
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=eo-wbc-setting' ) .
        '">' . __('Settings','woo-bundle-choice') . '</a>';
        return $links;
},30);

if( !function_exists('eo_wbc_woocommerce_available_actions') ){

    function eo_wbc_woocommerce_available_actions() {
        
        /**
        *   --------------------------------------------------------------
        *   adding action hook to fees calculation so that we can apply 
        *   discount on specific combinations only.
        *   --------------------------------------------------------------
        */
        add_action( 'woocommerce_cart_calculate_fees',function($cart) {      
               
            if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

            $total_discount=0;

            foreach (wc()->session->get('EO_WBC_MAPS',array()) as $set) {

                if(count($set)==2){
                    
                    if(function_exists('eo_wbc_get_set_discount')){

                        eo_wbc_get_set_discount($set,$total_discount);
                    }            
                }
            }

            $cart->add_fee( __('Discount','woo-bundle-choice'), -$total_discount, true, 'standard' );     
        });

        /**
        *   --------------------------------------------------------------
        *   function to calculate discount and return them to action 
        *   hook 'woocommerce_cart_calculate_fees'.
        *   
        *   we wrote this code here because it wasn't working inside 
        *   any other class, it might be fault of woocommerce.
        *   --------------------------------------------------------------
        */
        if( !function_exists('eo_wbc_get_set_discount') ){

            function eo_wbc_get_set_discount($set,&$discount)
            {   
                if(empty($set['FIRST']) || empty($set['SECOND'])) return $discount;

                global $wpdb; 
                if(!class_exists('EO_WBC_Support'))       
                {
                    require_once apply_filters('eo_wbc_front_support','EO_WBC_Admin/EO_WBC_Support.php',33);
                }    
                
                $first_cat_tax=(wp_get_post_terms($set['FIRST'][0],get_taxonomies()));
                foreach ($first_cat_tax as $key => $cat_tax) {                    
                    $first_cat_tax[$key]=$cat_tax->term_taxonomy_id;
                }
                $first_cat_tax=implode(',',$first_cat_tax);

                $second_cat_tax=(wp_get_post_terms($set['SECOND'][0],get_taxonomies()));
                foreach ($second_cat_tax as $key => $cat_tax) {                    
                    $second_cat_tax[$key]=$cat_tax->term_taxonomy_id;
                }
                $second_cat_tax=implode(',',$second_cat_tax);

                if(empty($first_cat_tax) or empty($second_cat_tax)) return 0;

                $query="SELECT `discount` FROM `".$wpdb->prefix."eo_wbc_cat_maps` WHERE  `first_cat_id` in({$first_cat_tax}) and `second_cat_id` in({$second_cat_tax}) or `first_cat_id` in({$second_cat_tax}) and `second_cat_id` in({$first_cat_tax})";                

                $discount_rates=$wpdb->get_results($query,'ARRAY_N');

                $_first_product = EO_WBC_Support::eo_wbc_get_product(empty($set['FIRST'][2])?$set['FIRST'][0]:$set['FIRST'][2]);
                $_second_product = EO_WBC_Support::eo_wbc_get_product(empty($set['SECOND'][2])?$set['SECOND'][0]:$set['SECOND'][2]);

                $discount = 0;
                
                if(!empty($_first_product) and !empty($_second_product) and !is_wp_error($_first_product) and !is_wp_error($_second_product)){

                    $set_total= $_first_product->get_price() *  $set['FIRST'][1]
                                    +
                                $_second_product->get_price() * $set['SECOND'][1];

                    if(!empty($discount_rates)){

                        foreach ($discount_rates as $rate) {
                            
                            $discount_value=($set_total * str_replace('%','',$rate[0]))/100;

                            $set_total-=$discount_value;
                            $discount+=$discount_value;
                        }         
                    }
                }

                return $discount;
            }
        }


        /*
        *
        * Enable shortcode in the widget area. 
        *
        */
        add_filter( 'widget_text', 'do_shortcode' );

        
        /*
        *
        * AJAX FILTER .............................
        *
        */
        require_once apply_filters('eo_wbc_filter','EO_WBC_Filter.php');
        $eo_wbc_filter=new EO_WBC_Filter();
    }
}

//product search result based on ajax request.
add_action( 'wp_ajax_eowbc_search_product',function(){

    $include_variations=false;
    check_ajax_referer( 'eowbc_search_product', 'security' );

    if ( empty( $term ) && isset( $_GET['term'] ) ) {
        $term = (string) wc_clean( wp_unslash( $_GET['term'] ) );
    }

    if ( empty( $term ) ) {
        wp_die();
    }

    if ( ! empty( $_GET['limit'] ) ) {
        $limit = absint( $_GET['limit'] );
    } else {
        $limit = absint( apply_filters( 'woocommerce_json_search_limit', 30 ) );
    }

    $include_ids = ! empty( $_GET['include'] ) ? array_map( 'absint', (array) wp_unslash( $_GET['include'] ) ) : array();
    $exclude_ids = ! empty( $_GET['exclude'] ) ? array_map( 'absint', (array) wp_unslash( $_GET['exclude'] ) ) : array();

    $data_store = WC_Data_Store::load( 'product' );
    $ids        = $data_store->search_products( $term, '', (bool) $include_variations, false, $limit, $include_ids, $exclude_ids );

    $product_objects = array_filter( array_map( 'wc_get_product', $ids ), 'wc_products_array_filter_readable' );
    $products        = array();

    foreach ( $product_objects as $product_object ) {
        $formatted_name = $product_object->get_formatted_name();
        $managing_stock = $product_object->managing_stock();

        if ( $managing_stock && ! empty( $_GET['display_stock'] ) ) {
            $stock_amount    = $product_object->get_stock_quantity();
            /* Translators: %d stock amount */
            $formatted_name .= ' &ndash; ' . sprintf( __( 'Stock: %d', 'woocommerce' ), wc_format_stock_quantity_for_display( $stock_amount, $product_object ) );
        }

        $products[ $product_object->get_id() ] = rawurldecode( $formatted_name );
    }    

    array_walk($products,function($product,$id) use(&$products){             
        $products[$id]=array($product,wp_get_attachment_image_src(get_post_thumbnail_id($id),array(64,64))[0]);
    });            
    
    wp_send_json( apply_filters( 'woocommerce_json_search_found_products', $products ) );
});


?>
