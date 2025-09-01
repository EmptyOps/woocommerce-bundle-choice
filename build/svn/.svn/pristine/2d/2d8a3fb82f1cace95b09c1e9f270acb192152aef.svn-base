<?php
/** 
* Plugin Name: Woocommerce Bundle Choice
* Plugin URI: https://wordpress.org/plugins/woocommerce-bundle-choice/
* Description: An E-Commerce tool that let your customer's buy product in a set and create map that relates between your product categories.
* Version: 0.1.3
* Author: emptyopssphere
* Author URI: https://profiles.wordpress.org/emptyopssphere
* Requires at least: 3.5
* Tested up to: 5.0.3
* License: GPLv3+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/
if ( ! defined( 'ABSPATH' ) ) exit;

require_once ABSPATH.'wp-admin/includes/plugin.php';

define('EO_WBC_PLUGIN_NAME',get_plugin_data( __FILE__ )['Name']);
define('EO_WBC_PLUGIN_VERSION',get_plugin_data( __FILE__ )['Version']);

require_once 'EO_WBC_Core/EO_WBC_Core.php';
require_once 'EO_WBC_Choice.php';

new EO_WBC_Core(__FILE__);//Inject Activation, Deactivation and Uninstall hooks

add_action('plugins_loaded',function(){
    new EO_WBC_Choice();
},10);

//Add Setting Link adjecent to Plugin Name in Admin's Plugin Panel
add_filter('plugin_action_links_'.plugin_basename(__FILE__),function($links){
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=eo-wbc-setting' ) .
        '">' . __('Settings') . '</a>';
        return $links;
});

?>
