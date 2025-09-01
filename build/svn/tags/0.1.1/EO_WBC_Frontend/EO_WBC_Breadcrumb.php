<?php
class EO_WBC_Breadcrumb
{
    public static function eo_wbc_add_css()
    {
        add_action( 'wp_enqueue_scripts',function(){
            wp_register_style('breadcumb',plugins_url('/css/eo_wbc_breadcumb.css',__FILE__));
            wp_enqueue_style('breadcumb');
        }); 
    }  
    public static function eo_wbc_add_breadcrumb($step=1,$begin)
    {
        $html='<br/><br/><div id="crumbs">
              <ul>';
        
        if($begin==get_option('eo_wbc_first_slug'))
        {
            $html.=self::eo_wbc_breadcumb_first_html($step,1).self::eo_wbc_breadcumb_second_html($step,2);
        }
        elseif ($begin==get_option('eo_wbc_second_slug'))
        {
            $html.=self::eo_wbc_breadcumb_second_html($step,1).self::eo_wbc_breadcumb_first_html($step,2);
        }
        $html.='<li';
        if($step>=3){ $html.=' class="active"'; }
        
        $html.='><div><span class="step">3 </span>&nbsp;<span class="step-name">'.(get_option('eo_wbc_collection_title')?get_option('eo_wbc_collection_title'):"Preview").'</span><div></li></div>';        
        return $html;             
    }
    private static function eo_wbc_breadcumb_first_html($step,$order)
    {
        $html='<li';
        if($step>=$order){ $html.=' class="active"';}
        $html.='><div><span class="step">'.$order.' </span>&nbsp;<span class="step-name">'.get_option('eo_wbc_first_name').'</span></div></li>';
        return $html;
    }
    private static function eo_wbc_breadcumb_second_html($step,$order)
    {
        $html='<li';
        if($step>=$order){ $html.=' class="active"';}
        $html.='><div><span class="step">'.$order.' </span>&nbsp;<span class="step-name">'.get_option('eo_wbc_second_name').'</span></div></li>';
        return $html;
    }
}
?>