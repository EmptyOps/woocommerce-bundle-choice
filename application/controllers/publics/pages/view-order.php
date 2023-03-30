<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class View_Order {

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
        $this->eo_wbc_add_css();
        $this->eo_wbc_render();        
    }   

    public function eo_wbc_add_css()
    {
      add_action('wp_head',function(){
           ?>
            <style> .eo_wbc_column-2{ width: 300px; } .eo_wbc_column-1{ width:300px; } .eo_wbc_column-2,.eo_wbc_column-1{ float: left; padding: 0px; font-size: small; padding-right: 15px; padding-bottom: 15px; box-sizing: border-box; max-width: 200px; } .eo_wbc_row::after { content: ""; clear: both; display: table; } @media screen and (max-width: 500px) { .eo_wbc_column-2,.eo_wbc_column-1{ width: 100%; } } </style>
           <?php  
        });
    }

    public function eo_wbc_render(){
       //require_once 'EO_WBC_Support.php';        
        add_action('woocommerce_view_order',function($order_id){
            global $wpdb,$sets;
            $query='select * from `'.$wpdb->prefix.'eo_wbc_order_maps` where order_id='.$order_id;
            $sets=$wpdb->get_row($query,'ARRAY_A');
            $sets=(json_decode($sets['order_map']));
            //wbc()->common->pr($sets);            
            ?>
                <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('table.shop_table.order_details>tbody').html('<?php echo $this->get_sets($sets); ?>');
                });    
            </script>
            <?php
        });
    }

    public function get_sets($sets)
    {        
        if(count($sets)>0)
        {
            $rows='';
            foreach ($sets as $set)
            {
                $rows.=$this->get_set($set);
            }
            return $rows;
        }        
    }

    public function get_set($set)
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
        $row="<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><tr>".
            "<td class=\'eo_wbc_row\'>".
              "<span class=\'eo_wbc_column-1\'>".
                  wbc()->wc->eo_wbc_get_product($set[0][0])->get_image("thumbnail")."&nbsp;&nbsp;<p>".
                  wbc()->wc->eo_wbc_get_product($set[0][0])->get_title().
                  ($set[0][2]  ? "<br/>&nbsp; -&nbsp;".
                    implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($set[0][2],(array)$set[0]['variation'])):'').
                  "&nbsp;X&nbsp;{$set[0][1]}</p>";
                    $price+=get_post_meta($set[0][2]?$set[0][2]:$set[0][0],'_price',TRUE)*$set[0][1];
                              
        if($set[1]){
           $row.="</span><span class=\'eo_wbc_column-2\'>".
                wbc()->wc->eo_wbc_get_product($set[1][0])->get_image("thumbnail").
                "&nbsp;&nbsp;<p>".
                wbc()->wc->eo_wbc_get_product($set[1][0])->get_title().
                ($set[1][2]  ? "<br/>&nbsp; -&nbsp;".
                  implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($set[1][2],(array)$set[1]['variation'])):'').
                "&nbsp;X&nbsp;{$set[1][1]}</p>";
            $price+=get_post_meta($set[1][2]?$set[1][2]:$set[1][0],'_price',TRUE)*$set[1][1];
        }
        
        $row.="</span>".
            "</td>".
              "<td style=\"min-width:auto;\">".
                "<p>".__(wc_price($price),'woo-bundle-choice')."</p>".
              "</td>".
            "</tr>";

        return $row;
    }

}