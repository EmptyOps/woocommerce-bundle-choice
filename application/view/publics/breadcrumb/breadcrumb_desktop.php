<?php
if(isset($_GET['FIRST']) and isset($_GET['SECOND'])) {
    $html='<!-- Widget start Wordpress plugin - WooCommerce Product bundle choice --><div class="eo-wbc-container container spui-semantic-breadcrumb" style="direction: ltr;">';
        //$html.='<div class="ui ordered steps">';
        $html.='<div class="ui steps spui-semantic-steps">'; 
        if(!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_fixed_navigation'))){
            $_step = 0;
            $_order = 0;
            if(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->wc->slug2slug(wbc()->sanitize->get('BEGIN'))==$breadcrumb_ui::$first_slug){                    
                 $html.=$breadcrumb_ui::eo_wbc_breadcumb_first_html($step,1).$breadcrumb_ui::eo_wbc_breadcumb_second_html($step,2);
            } elseif(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->wc->slug2slug(wbc()->sanitize->get('BEGIN'))==$breadcrumb_ui::$second_slug) {
                $html.=$breadcrumb_ui::eo_wbc_breadcumb_first_html($step,2).$breadcrumb_ui::eo_wbc_breadcumb_second_html($step,1);
            }                

        }  else {         

             if(wbc()->wc->slug2slug($begin)==$breadcrumb_ui::$first_slug)
            {
                $html.=$breadcrumb_ui::eo_wbc_breadcumb_first_html($step,1).$breadcrumb_ui::eo_wbc_breadcumb_second_html($step,2);
            }
            elseif (wbc()->wc->slug2slug($begin)==$breadcrumb_ui::$second_slug/*get_option('eo_wbc_second_slug')*/)
            {
                $html.=$breadcrumb_ui::eo_wbc_breadcumb_second_html($step,1).$breadcrumb_ui::eo_wbc_breadcumb_first_html($step,2);
            }
        }
        

            $html .= '<div data-href="' . (
                (empty(wbc()->sanitize->get('EO_CHANGE')) XOR empty(wbc()->sanitize->get('EO_VIEW'))) &&
                !empty(wbc()->sanitize->get('FIRST')) &&
                !empty(wbc()->sanitize->get('SECOND'))
                    ? esc_url(get_bloginfo('url') . '/index.php' . wbc()->options->get_option('configuration', 'review_page') /*get_option('eo_wbc_review_page')*/
                        . '?' . wbc()->common->http_query(array(
                            'EO_WBC' => 1,
                            'BEGIN' => wbc()->sanitize->get('BEGIN'),
                            'STEP' => 3,
                            'FIRST' => wbc()->sanitize->get('FIRST'),
                            'SECOND' => wbc()->sanitize->get('SECOND')
                        )))
                    : '#'
            ) . '" class="' . esc_attr((($step == 3) ? 'active ' : ((!empty($breadcrumb_ui::$first) || !empty($breadcrumb_ui::$second)) ? 'completed ' : (!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb) ? '' : 'disabled')))) . ' step spui-semantic-step" onclick="window.location.href=jQuery(this).data(\'href\');">';

                    ob_start();
                    $template = wbc()->options->get_option('configuration','config_alternate_breadcrumb','default');
                    if(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_2') {                            
                        
                        wbc()->load->template('publics/breadcrumb/final_step_alternate_desktop_2',array('preview_name'=>$breadcrumb_ui::$preview_name,'preview_icon'=>$breadcrumb_ui::$preview_icon));

                        
                    } elseif(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_1') {

                        wbc()->load->template('publics/breadcrumb/final_step_alternate_desktop_1',array('preview_name'=>$breadcrumb_ui::$preview_name,'preview_icon'=>$breadcrumb_ui::$preview_icon));
                        
                    } elseif($template!='default') {

                        wbc()->load->template('publics/breadcrumb/final_step_alternate_desktop_'.$template,array('preview_name'=>$breadcrumb_ui::$preview_name,'preview_icon'=>$breadcrumb_ui::$preview_icon));
                        
                    } else {                            
                       wbc()->load->template('publics/breadcrumb/final_step_desktop',array('preview_name'=>$breadcrumb_ui::$preview_name,'preview_icon'=>$breadcrumb_ui::$preview_icon,'first'=>$breadcrumb_ui::$first,'second'=>$breadcrumb_ui::$second,'set'=>$breadcrumb_ui::$set,'tmp_set'=>$breadcrumb_ui::$tmp_set));
                    }
            $html.=ob_get_clean();
            $html.='</div>';
        $html.='</div>';
    $html.='</div>';

    if(wbc()->options->get_option('appearance_breadcrumb','showhide_icons','0')/*get_option('eo_wbc_show_hide_breadcrumb_icon','0')*/==='1'){
        $html.="<style>.eo-wbc-container>.ui.ordered.steps .step:before{content:''}</style>";
    }
    echo esc_html($html);   
    if(false){ 
        $html.="<script>
                    jQuery(document).ready(function(){ jQuery('.onclick_redirect').on('click',function(){ 
                            var _step = jQuery(this);
                            var _rem_url = jQuery(_step).find('[data-remove-url]');
                            if(_rem_url.length>0) { 
                                window.location.href=jQuery(_rem_url[0]).data('remove-url');
                            } else { 
                                window.location.href = jQuery(_step).data('begin'); 
                            }
                        });
                        jQuery('[data-clickable_breadcrumb]').on('click',function(){
                            window.location.href = jQuery(this).data('clickable_breadcrumb'); 
                        });
                    }); 
                </script>";
        echo esc_html($html);   
    }        
    $inline_script = 
    "jQuery(document).ready(function(){ jQuery('.onclick_redirect').on('click',function(){ \n" .
    "        var _step = jQuery(this);\n" .
    "        var _rem_url = jQuery(_step).find('[data-remove-url]');\n" .
    "        if(_rem_url.length>0) { \n" .
    "            window.location.href=jQuery(_rem_url[0]).data('remove-url');\n" .
    "        } else { \n" .
    "            window.location.href = jQuery(_step).data('begin'); \n" .
    "        }\n" .
    "    });\n" .
    "    jQuery('[data-clickable_breadcrumb]').on('click',function(){\n" .
    "        window.location.href = jQuery(this).data('clickable_breadcrumb'); \n" .
    "    });\n" .
    "}); \n";

    wbc()->load->add_inline_script('', $inline_script, 'common');
}
