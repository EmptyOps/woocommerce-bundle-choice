<?php
/** 
* Plugin Name: Woocommerce Bundle Choice
* Plugin URI: https://wordpress.org/plugins/woocommerce-bundle-choice/
* Description: An E-Commerce tool that let your customer's buy product in a set and create map that relates between your product categories.
* Version: 0.1.5
* Author: emptyopssphere
* Author URI: https://profiles.wordpress.org/emptyopssphere
* Requires at least: 3.5
* Tested up to: 5.1
* License: GPLv3+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/


//Block direct access intrusion.
if (!defined('ABSPATH')) exit;

//load plugin.php to get access to get_plugin_data method.
require_once ABSPATH.'wp-admin/includes/plugin.php';

//Define plugin specification which is available in this file.
define('EO_WBC_PLUGIN_NAME',get_plugin_data(__FILE__)['Name']);
define('EO_WBC_PLUGIN_VERSION',get_plugin_data(__FILE__)['Version']);

//Load the core module to perform actvation/deactivation/uninstall.
require_once 'EO_WBC_Core/EO_WBC_Core.php';
//Load the file with main functionality.
require_once 'EO_WBC_Choice.php';

//Powering up the core which activate/deactivate and uninstall plugin.
//Inject Activation, Deactivation and Uninstall hooks
new EO_WBC_Core(__FILE__);

//Begin action only if all plugins are loaded.
add_action('plugins_loaded',function(){
    new EO_WBC_Choice();
},15);

//Add Setting Link adjecent to Plugin Name in Admin's Plugin Panel
add_filter('plugin_action_links_'.plugin_basename(__FILE__),function($links){
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=eo-wbc-setting' ) .
        '">' . __('Settings') . '</a>';
        return $links;
},30);
?>
