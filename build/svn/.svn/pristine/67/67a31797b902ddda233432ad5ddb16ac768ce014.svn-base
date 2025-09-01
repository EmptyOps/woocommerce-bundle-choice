<?php
/** 
* Plugin Name: WooCommerce Bundle Choice
* Plugin URI: https://wordpress.org/plugins/woocommerce-bundle-choice/
* Description: An E-Commerce tool that let your customer's buy product in a set and create map that relates between your product categories.
* Version: 0.5.3
* Author: emptyopssphere
* Author URI: https://profiles.wordpress.org/emptyopssphere
* Requires at least: 3.5
* Tested up to: 5.2.2
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
define('EO_WBC_PLUGIN_VERSION',get_plugin_data(__FILE__)['Version']);
define('EO_WBC_PLUGIN_DIR',plugin_dir_path( __FILE__ ));

define('EO_WBC_PLUGIN_ICO',plugins_url('woo-bundle-choice/EO_WBC_Admin/EO_WBC_Config/icon.png'));

//Load support file...
if(!class_exists('EO_WBC_Support'))       
{
    require_once apply_filters('eo_wbc_front_support','EO_WBC_Admin/EO_WBC_Support.php',33);
}

//Load the core module to perform actvation/deactivation/uninstall.
require_once 'EO_WBC_Core/EO_WBC_Core.php';

//Load the file with main functionality.
require_once 'EO_WBC_Choice.php';

//Powering up the core which activate/deactivate and uninstall plugin.
new EO_WBC_Core(__FILE__);

//Begin action only if all plugins are loaded.
add_action('plugins_loaded',function(){

    load_plugin_textdomain( 'woo-bundle-choice', false, basename( dirname( __FILE__ ) ) . '/languages');

    new EO_WBC_Choice();
    //If WooCommerce is not active then exit from here....
    if(class_exists( 'WooCommerce' )){
        eo_wbc_woocommerce_available_actions();        
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


                $query="SELECT `discount` FROM `".$wpdb->prefix."eo_wbc_cat_maps` WHERE  `first_cat_id` in({$first_cat_tax}) and `second_cat_id` in({$second_cat_tax}) or `first_cat_id` in({$second_cat_tax}) and `second_cat_id` in({$first_cat_tax})";                

                $discount_rates=$wpdb->get_results($query,'ARRAY_N');

                $set_total= EO_WBC_Support::eo_wbc_get_product(empty($set['FIRST'][2])?$set['FIRST'][0]:$set['FIRST'][2])->get_price() *  $set['FIRST'][1]
                                +
                            EO_WBC_Support::eo_wbc_get_product(empty($set['SECOND'][2])?$set['SECOND'][0]:$set['SECOND'][2])->get_price() * $set['SECOND'][1];

                foreach ($discount_rates as $rate) {
                    
                    $discount_value=($set_total * str_replace('%','',$rate[0]))/100;

                    $set_total-=$discount_value;
                    $discount+=$discount_value;
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
?>