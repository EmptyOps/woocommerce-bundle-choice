<?php

/**
*
*  EO_WBC_Template: change the path of template file at runtime.
*
*/
class EO_WBC_Template
{
  function __construct(){

    add_filter( 'woocommerce_locate_template',array($this,'change_template'),10,3);
  }

  /**
  * @method return absolute path to the plugin.
  * @param void
  * @return string: path of the plugin with trailing slash.
  */
  private function plugin_path() {

    return plugin_dir_path( __FILE__ );
    /*return untrailingslashit( plugin_dir_path( __FILE__ ) );*/
  }

  function change_template($template,$template_name,$template_path){
        
    $_template=$template;

    //If template path is empty then add template path from woocommerce.
    if ( ! $template_path ) $template_path = WC()->template_url;

    //template path to the plugin's directory.
    $plugin_path=$this->plugin_path().'woocommerce/';

    // Modification: Get the template from this plugin, if it exists
    if(file_exists($plugin_path . $template_name ))
      $template = $plugin_path . $template_name;

    // Use default template
    if ( ! $template )
      $template = $_template;
    //var_dump($template);
    // Return what we found
    return $template;
  }
}

//new EO_WBC_Template();

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
/*function woo_template_replace( $located, $template_name, $args, $template_path, $default_path ) {

if( file_exists( plugin_dir_path(__FILE__) . 'templates/' . $template_name ) ) {
    $located = plugin_dir_path(__FILE__) . 'templates/' . $template_name;
}

return $located;
}


function woo_get_template_part( $template , $slug , $name ) {

if( empty( $name ) ) {
    if( file_exists( plugin_dir_path(__FILE__) . "/templates/{$slug}.php" ) ) {
        $template = plugin_dir_path(__FILE__) . "/templates/{$slug}.php";
    }
} else {
    if( file_exists( plugin_dir_path(__FILE__) . "/templates/{$slug}-{$name}.php" ) ) {
        $template = plugin_dir_path(__FILE__) . "/templates/{$slug}-{$name}.php";
    }
return $template;
}

add_filter( 'wc_get_template' , 'woo_template_replace' , 10 , 5 );

add_filter( 'wc_get_template_part' , 'woo_get_template_part' , 10 , 3 );*/
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
