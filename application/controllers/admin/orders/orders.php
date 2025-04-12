<?php
namespace eo\wbc\controllers\admin\orders;

defined( 'ABSPATH' ) || exit;

class Orders
{

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {        
    }

    public function init() {
      add_action('woocommerce_admin_order_data_after_order_details',function($order){
           global $wpdb;
           $sets=$wpdb->get_row('select * from `'.$wpdb->prefix.'eo_wbc_order_maps` where order_id='.$order->get_order_number(),'ARRAY_A');

           if(empty($sets['order_map'])){
            return true;
                //$sets['order_map'] = json_encode(array());
            }

           $sets=(json_decode($sets['order_map']));
           add_action('admin_footer',function() use ($sets){
                $call_user_func_array_eo_wbc_get_sets = call_user_func_array(array(__CLASS__,'eo_wbc_get_sets'),[$sets]);
                // NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
                $inline_script =
                    "if(document.getElementById('order_items_list')){\n" .
                    "    document.getElementById('order_items_list').innerHTML='".$call_user_func_array_eo_wbc_get_sets."';\n" .
                    "}\n" .
                    "else\n" .
                    "{\n" .
                    "    document.getElementById('order_line_items').innerHTML='".$call_user_func_array_eo_wbc_get_sets."';\n" .
                    "}";
                wbc()->load->add_inline_script('', $inline_script, 'common');    
           });
       });
    }
    
   //Method that has collection of sets and invoke `get_set` method for details.
   public function eo_wbc_get_sets($sets)
   {
       if(!empty($sets))
       {
           $rows='';
           foreach ($sets as $set)
           {
               $rows.=$this->eo_wbc_get_set($set);
           }
           return $rows;
       }
   }
   
   //Method to get detail about single set
   public function eo_wbc_get_set($set)
   {   
      if(!empty($set[0])){
          $set[0] = (array) $set[0];    
          if(!isset($set[0]['variation'])){
            $set[0]['variation'] = array();
          }
      }

      if(!empty($set[1])){
          $set[1] = (array) $set[1];    
          if(!isset($set[1]['variation'])){
            $set[1]['variation'] = array();
          }
      }
       $price=0;
       $row="<tr>".
           "<td style=\"min-width:330px;vertical-align: middle;\">".wbc()->wc->eo_wbc_get_product($set[0][0])->get_image("thumbnail")."&nbsp;";
       if($set[1]){
           $row.=wbc()->wc->eo_wbc_get_product($set[1][0])->get_image("thumbnail");
       }
       $row.="</td>".
           "<td style=\"vertical-align: middle;\">".
           "<h5>".esc_html(wbc()->wc->eo_wbc_get_product( empty($set[0][2])?$set[0][0]:$set[0][2])->get_title()).($set[0][2]  ? "<br/>&nbsp; -".esc_html(implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($set[0][2],(array)$set[0]['variation']))):'')."</h5>";
       if($set[1]){
           $row.="<h5>".esc_html(wbc()->wc->eo_wbc_get_product( empty($set[1][2])?$set[1][0]:$set[1][2] )->get_title()).($set[1][2]  ? "<br/>&nbsp; -".esc_html(implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($set[1][2],(array)$set[1]['variation']))):'')."</h5>";
       }
       $row.="</td>".
           "<td style=\"vertical-align: middle;\">".
           "<p>".get_woocommerce_currency_symbol(get_option('woocommerce_currency')).esc_html(get_post_meta($set[0][2]?$set[0][2]:$set[0][0],'_price',TRUE))."</p>";
       
       $price+=get_post_meta($set[0][2]?$set[0][2]:$set[0][0],'_price',TRUE)*$set[0][1];
       
       if($set[1]){            
           $row.="<p>".get_woocommerce_currency_symbol(get_option('woocommerce_currency')).esc_html(get_post_meta($set[1][2]?$set[1][2]:$set[1][0],'_price',TRUE))."</p>";
            
           $price+=get_post_meta($set[1][2]?$set[1][2]:$set[1][0],'_price',TRUE)*$set[1][1];
       }
       $row.="</td>".
           "<td style=\"vertical-align: middle;\" >".
           "<h5>".esc_html($set[0][1])."</h5>";
       if($set[1]){
           $row.="<h5>".esc_html($set[1][1])."</h5>";
       }
           $row.="</td>".
           "<td style=\"min-width:40px;text-align:right;vertical-align: middle;\">".
           "".wc_price($price)."".
           "</td>".
           "</tr>";
       return $row;
   }
   
}