<?php
/**
 * Plugin Name: Woocommerce Bundled Choice
 * Name: Woocommerce Bundled Choice
 * Description: An E-Commerce tool that let your customer's buy product in a set and create map that relates between your product categories.   
 * Version: 0.1.0
 * Author: Hsquare
 * Author URI: www.hsquaretech.com 
 * Donate link: ---
 * Tags: --
 * Developer: Mahesh Patel
 * Developer URI: ---
 * Requires at least: 4.9.8
 * Tested up to: 5.0
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

require_once ABSPATH.'wp-admin/includes/plugin.php';
define('PLUGIN_NAME',get_plugin_data( __FILE__ )['Name']);
define('PLUGIN_VERSION',get_plugin_data( __FILE__ )['Version']);

require_once 'YC_Core/YC_Core.php';
require_once 'YC_Choice.php';

new YC_Core(__FILE__);//Inject Activation, Deactivation and Uninstall hooks

add_action('plugins_loaded',function(){
    new YC_Choice();
},10);

//Add Setting Link adjecent to Plugin Name in Admin's Plugin Panel
add_filter('plugin_action_links_'.plugin_basename(__FILE__),function($links){
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=yc-setting' ) .
        '">' . __('Settings') . '</a>';
        return $links;
});
?>
