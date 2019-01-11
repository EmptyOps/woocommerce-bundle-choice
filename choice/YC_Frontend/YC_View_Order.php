<?php
class YC_View_Order
{
    public function __construct()
    {        
        require_once 'YC_Support.php';        
        add_action('woocommerce_view_order',function($order_id){
            global $wpdb,$sets;
            $query='select * from `'.$wpdb->prefix.'yc_order_maps` where order_id='.$order_id;
            $sets=$wpdb->get_row($query,'ARRAY_A');
            $sets=(json_decode($sets['order_map']));
            ?>
                <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('table.shop_table.order_details>tbody').html('<?php echo $this->get_sets($sets); ?>');
                });    
        		</script>
            <?php
        });
        add_action('wp_head',function(){
           ?>
           	<style>
                .column-2{
                  float: left;
                  width: 330px;
                  padding: 0px;
                }
                .column-1{
                  float: left;
                  width:calc(100%-330px);
                  padding: 0px;
                }
                
                /* Clear floats after image containers */
                .row::after {
                  content: "";
                  clear: both;
                  display: table;
                }
                @media screen and (max-width: 500px) {
                  .column-2{
                    width: 100%;
                  }
                  .column-1{
                    width: 100%;
                  }
                }
            </style>
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
        $price=0;
        $row="<tr>".
            "<td class=\'row\'>".
            "<span class=\'column-2\'>".
            YC_Support::wc_get_product($set[0][0])->get_image("thumbnail");
        if($set[1]){
           $row.=YC_Support::wc_get_product($set[1][0])->get_image("thumbnail");
        }
        
        $row.="</span><span class=\'column-1\'><p>".YC_Support::wc_get_product($set[0][0])->get_title().($set[0][2]  ? "<br/>&nbsp; -&nbsp;".implode(',',YC_Support::wc_get_product_variation_attributes($set[0][2])):'')."&nbsp;X&nbsp;{$set[0][1]}</p>";
        $price+=get_post_meta($set[0][2]?$set[0][2]:$set[0][0],'_price',TRUE)*$set[0][1];
        if($set[1]){
            $row.="<p>".YC_Support::wc_get_product($set[1][0])->get_title().($set[1][2]  ? "<br/>&nbsp; -&nbsp;".implode(',',YC_Support::wc_get_product_variation_attributes($set[1][2])):'')."&nbsp;X&nbsp;{$set[1][1]}</p>";
            $price+=get_post_meta($set[1][2]?$set[1][2]:$set[1][0],'_price',TRUE)*$set[1][1];
        }
         
        $row.="</span>".
            "</td>".
            "<td style=\"min-width:auto;\">".
            "<p>".get_woocommerce_currency_symbol(get_option('woocommerce_currency'))." ".($price)."</p>".
            "</td>".
            "</tr>";
        return $row;
    }
}
?>