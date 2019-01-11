<?php
class YC_Breadcrumb
{
    public static function add_css()
    {
        add_action( 'wp_enqueue_scripts',function(){
            wp_register_style('breadcumb',plugins_url('/css/breadcumb.css',__FILE__));
            wp_enqueue_style('breadcumb');
        }); 
    }  
    public static function add_breadcrumb($step=1,$begin)
    {
        $html='<br/><br/><div id="crumbs">
              <ul>';
        
        if($begin==get_option('yc_first_slug'))
        {
            $html.=self::breadcumb_first_html($step,1).self::breadcumb_second_html($step,2);
        }
        elseif ($begin==get_option('yc_second_slug'))
        {
            $html.=self::breadcumb_second_html($step,1).self::breadcumb_first_html($step,2);
        }
        $html.='<li';
        if($step>=3){ $html.=' class="active"'; }
        
        $html.='><div><span class="step">3 </span>&nbsp;<span class="step-name">'.(get_option('yc_collaction_title')?get_option('yc_collaction_title'):"Preview").'</span><div></li></div>';        
        return $html;             
    }
    private static function breadcumb_first_html($step,$order)
    {
        $html='<li';
        if($step>=$order){ $html.=' class="active"';}
        $html.='><div><span class="step">'.$order.' </span>&nbsp;<span class="step-name">'.get_option('yc_first_name').'</span></div></li>';
        return $html;
    }
    private static function breadcumb_second_html($step,$order)
    {
        $html='<li';
        if($step>=$order){ $html.=' class="active"';}
        $html.='><div><span class="step">'.$order.' </span>&nbsp;<span class="step-name">'.get_option('yc_second_name').'</span></div></li>';
        return $html;
    }
}
?>