<?php
namespace eo\wbc\model\publics\component;

class EOWBC_Breadcrumb
{
    public static $set = null;
    public static $tmp_set = null;
    public static $first = null;
    public static $second = null;

    public static $first_name = '';
    public static $second_name = '';

    public static $first_slug = '';
    public static $second_slug = '';

    public static $first_url = '';
    public static $second_url = '';

    public static $preview_name = '';

    public static $first_icon = '';
    public static $second_icon = '';
    public static $preview_icon = '';

    public static $clickable_breadcrumb = false;

    public static function eo_wbc_add_css(){        
        wp_die("eo_wbc_add_css called, upgrade the function as per new version DP branch ");
       require_once 'css/eo_wbc_breadcrumb.php';
    }  
    
    public static function eo_wbc_add_breadcrumb($step=1,$begin){
        
        wbc()->load->model('category-attribute');
        $model_category_attribute = \eo\wbc\model\Category_Attribute::instance();
        wbc()->load->model('images');
        $model_images = \eo\wbc\model\Images::instance();

        $first_name = $model_category_attribute->get_single_category(wbc()->options->get_option('configuration','first_name'));
        if(!is_wp_error($first_name) and !empty($first_name)){
            self::$first_name = apply_filters('eowbc_breadcrumb_first_name',$first_name->name);
            self::$first_slug = apply_filters('eowbc_breadcrumb_first_slug',$first_name->slug);
        }

        $second_name = $model_category_attribute->get_single_category(wbc()->options->get_option('configuration','second_name'));
        if(!is_wp_error($second_name) and !empty($second_name)){
            self::$second_name = apply_filters('eowbc_breadcrumb_second_name',$second_name->name);
            self::$second_slug = apply_filters('eowbc_breadcrumb_second_slug',$second_name->slug);
        }

        $preview_name = wbc()->options->get_option('configuration','preview_name');
        
        if(is_wp_error($preview_name) or empty($preview_name)){
            self::$preview_name = apply_filters('eowbc_breadcrumb_preview_name','Preview');
        } else {
            self::$preview_name = apply_filters('eowbc_breadcrumb_preview_name',$preview_name);
        }
        
        self::$first_icon = apply_filters('eowbc_breadcrumb_first_icon',$model_images->id2url(wbc()->options->get_option('configuration','first_icon')));
        
        self::$second_icon = apply_filters('eowbc_breadcrumb_second_icon',$model_images->id2url(wbc()->options->get_option('configuration','second_icon')));
        
        self::$preview_icon = apply_filters('eowbc_breadcrumb_preview_icon',$model_images->id2url(wbc()->options->get_option('configuration','preview_icon')));

        $set=apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE));
        $tmp_set=apply_filters('eowbc_breadcrumb_tmp_set',wbc()->session->get('TMP_EO_WBC_SETS',FALSE));

        self::$first_url = \eo\wbc\model\Category_Attribute::instance()->get_category_link(self::$first_slug);
        if(!empty(self::$first_url)){
            self::$first_url=self::$first_url.'EO_WBC=1&BEGIN='.self::$first_slug.'&STEP=1&FIRST=&SECOND=';
        }

        self::$second_url = \eo\wbc\model\Category_Attribute::instance()->get_category_link(self::$second_slug);
        if(!empty(self::$second_url)){
            self::$second_url=self::$second_url.'EO_WBC=1&BEGIN='.self::$second_slug.'&STEP=1&FIRST=&SECOND=';
        }
        
        self::$clickable_breadcrumb = (wbc()->sanitize->get('STEP')==1 && !empty(wbc()->options->get_option('configuration','config_clickable_breadcrumb')));

        if(!empty($set) and !is_wp_error($set)){

            self::$set = $set;
            self::$tmp_set = $tmp_set; 
            if(!empty($set['FIRST'])){
                //self::$first=EO_WBC_Support::eo_wbc_get_product((int)($set['FIRST'][2]?$set['FIRST'][2]:$set['FIRST'][0]));  
                self::$first= wbc()->wc->eo_wbc_get_product((int)($set['FIRST'][2]?$set['FIRST'][2]:$set['FIRST'][0]));
            }

            if(empty(self::$first) and !empty(wbc()->sanitize->get('FIRST')) and !empty($tmp_set) and $tmp_set['FIRST'][0]==wbc()->sanitize->get('FIRST')) {
                
                //self::$first=EO_WBC_Support::eo_wbc_get_product((int)($tmp_set['FIRST'][2]?$tmp_set['FIRST'][2]:$tmp_set['FIRST'][0]));
                self::$first=wbc()->wc->eo_wbc_get_product((int)($tmp_set['FIRST'][2]?$tmp_set['FIRST'][2]:$tmp_set['FIRST'][0]));
            }
            
            if(!empty($set['SECOND'])){
                // self::$second=EO_WBC_Support::eo_wbc_get_product((int)($set['SECOND'][2]?$set['SECOND'][2]:$set['SECOND'][0]));
                self::$second=wbc()->wc->eo_wbc_get_product((int)($set['SECOND'][2]?$set['SECOND'][2]:$set['SECOND'][0]));                
            }                        

            if(empty(self::$second) and !empty(wbc()->sanitize->get('SECOND')) and !empty($tmp_set) and $tmp_set['SECOND'][0]==wbc()->sanitize->get('SECOND')) {
                // self::$second=EO_WBC_Support::eo_wbc_get_product((int)($tmp_set['SECOND'][2]?$tmp_set['SECOND'][2]:$tmp_set['SECOND'][0]));
                self::$second=wbc()->wc->eo_wbc_get_product((int)($tmp_set['SECOND'][2]?$tmp_set['SECOND'][2]:$tmp_set['SECOND'][0]));
            }
        }

        //hiren added on 03-06-2020, as replacement to global loading of old version
        self::eo_wbc_enque_asset();

        /**
            CLASS: 
            -------------------------------------------------
            ordered - mark as rodered type of breadcrumb.
            completed - mark as completed and add check mark.
            disabled - incomplete breadcrumb.
            title - set title on breadcrumb.
            description - set description on breadcrumb.
         */
        if(wp_is_mobile()){
            return self::eo_wbc_breadcrumb_mobile($step,$begin);
        } else {           
            return self::eo_wbc_breadcrumb_desktop($step,$begin);
        }
    }

    //hiren added on 03-06-2020, as replacement to global loading of old version
    private static function eo_wbc_enque_asset() {
        // add_action( 'wp_enqueue_scripts',function(){ 
            wbc()->load->asset('css','fomantic/semantic.min',array(),'2.8.1');
            wbc()->load->asset('js','fomantic/semantic.min',array(),'2.8.1');
        // },100);
            wbc()->load->template('publics/breadcrumb/css');
    }

    private static function eo_wbc_breadcrumb_mobile($step=1,$begin){
        ob_start();
        ?>
        <div class="ui container unstackable steps" style="width: 100% !important; min-width: unset; max-width: unset; margin: auto; margin-bottom: 1em;">
            <?php 
            if(!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_fixed_navigation'))) {
                 if(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->sanitize->get('BEGIN')==self::$first_slug){                    
                    self::eo_wbc_breadcumb_first_html_mobile($step,1).self::eo_wbc_breadcumb_second_html_mobile($step,2);
                } elseif(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->sanitize->get('BEGIN')==self::$second_slug) {
                    self::eo_wbc_breadcumb_first_html_mobile($step,2).self::eo_wbc_breadcumb_second_html_mobile($step,1);
                }

            }  else {
                if($begin==self::$first_slug/*get_option('eo_wbc_first_slug')*/) {

                self::eo_wbc_breadcumb_first_html_mobile($step,1).self::eo_wbc_breadcumb_second_html_mobile($step,2);

                } elseif ($begin==self::$second_slug/*get_option('eo_wbc_second_slug')*/)  {

                self::eo_wbc_breadcumb_second_html_mobile($step,1).self::eo_wbc_breadcumb_first_html_mobile($step,2);
                }
            }
            self::eo_wbc_breadcumb_final_html_mobile($step);
            ?>

            
        </div>
        <script>
            jQuery(document).ready(function(){ 
                /*jQuery('.onclick_redirect').on('click',function(){ 
                    var _step = jQuery(this);
                    var _rem_url = jQuery(_step).find('[data-remove-url]');
                    if(_rem_url.length>0) { 
                        window.location.href=jQuery(_rem_url[0]).data('remove-url');
                    } else { 
                        window.location.href = jQuery(_step).data('begin'); 
                    }
                });*/
                jQuery('[data-clickable_breadcrumb]').on('click',function(){
                    window.location.href = jQuery(this).data('clickable_breadcrumb'); 
                });
            }); 
        </script>
        <?php 
        return ob_get_clean();
    }

    public static function eo_wbc_breadcumb_first_html_mobile($step,$order) {

        $sesssion_product_id = '#';
        if(apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE))) {
            $_session_set=apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE));
            if(!empty($_session_set['FIRST'])) {
                $sesssion_product_id = empty($_session_set['FIRST'][2])?$_session_set['FIRST'][0]:$_session_set['FIRST'][2];    
            }
        }

        $template = wbc()->options->get_option('configuration','config_alternate_breadcrumb_mobile','default');
        
        wbc()->load->template('publics/breadcrumb/first_step_mobile_'.$template, array("step"=>$step,"order"=>$order,"first"=>self::$first_name,"first_obj"=>self::$first,"first"=>self::$first,"view_url"=>(!empty(wbc()->sanitize->get('FIRST')) ? self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('FIRST'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id))));
        

    }

    public static function eo_wbc_breadcumb_second_html_mobile($step,$order){

        $sesssion_product_id = '#';
        if(apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE))) {
            $_session_set=apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE));
            if(!empty($_session_set['SECOND'])) {
                $sesssion_product_id = empty($_session_set['SECOND'][2])?$_session_set['SECOND'][0]:$_session_set['SECOND'][2];    
            }
        }

        $template = wbc()->options->get_option('configuration','config_alternate_breadcrumb_mobile','default');

        wbc()->load->template('publics/breadcrumb/second_step_mobile_'.$template,array("step"=>$step,"order"=>$order,"second"=>self::$second_name,"second_obj"=>self::$second,"second"=>self::$second,"view_url"=>(!empty(wbc()->sanitize->get('SECOND')) ? self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('SECOND')?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id))))); 
    }

    public static function eo_wbc_breadcumb_final_html_mobile($step) {
        $template = wbc()->options->get_option('configuration','config_alternate_breadcrumb_mobile','default');

        wbc()->load->template('publics/breadcrumb/final_step_mobile_'.$template, array("step"=>$step,'preview_name'=>self::$preview_name));
    }

    private static function eo_wbc_breadcrumb_desktop($step=1,$begin){
        $html='<!-- Widget start Wordpress plugin - WooCommerce Product bundle choice --><div class="eo-wbc-container container">';
            //$html.='<div class="ui ordered steps">';
            $html.='<div class="ui steps">'; 
            if(!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_fixed_navigation'))){
                $_step = 0;
                $_order = 0;
                if(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->sanitize->get('BEGIN')==self::$first_slug){                    
                     $html.=self::eo_wbc_breadcumb_first_html($step,1).self::eo_wbc_breadcumb_second_html($step,2);
                } elseif(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->sanitize->get('BEGIN')==self::$second_slug) {
                    $html.=self::eo_wbc_breadcumb_first_html($step,2).self::eo_wbc_breadcumb_second_html($step,1);
                }                

            }  else {         

                 if($begin==self::$first_slug)
                {
                    $html.=self::eo_wbc_breadcumb_first_html($step,1).self::eo_wbc_breadcumb_second_html($step,2);
                }
                elseif ($begin==self::$second_slug/*get_option('eo_wbc_second_slug')*/)
                {
                    $html.=self::eo_wbc_breadcumb_second_html($step,1).self::eo_wbc_breadcumb_first_html($step,2);
                }
	        }
           
                $html.='<div data-href="'.( (empty(wbc()->sanitize->get('EO_CHANGE')) XOR empty(wbc()->sanitize->get('EO_VIEW')) ) && !empty(wbc()->sanitize->get('FIRST')) && !empty(wbc()->sanitize->get('SECOND'))?get_bloginfo('url').'/index.php'
                    .wbc()->options->get_option('configuration','review_page')/*get_option('eo_wbc_review_page')*/
                    .'?'.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>wbc()->sanitize->get('SECOND'))):'#' ).'" class="'.(($step==3)?'active ':((!(empty(self::$first) and empty(self::$second)))?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))).' step" onclick="window.location.href=jQuery(this).data(\'href\');">';
                        ob_start();
                        $template = wbc()->options->get_option('configuration','config_alternate_breadcrumb','default');
                        if(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_2') {                            
                            
                            wbc()->load->template('publics/breadcrumb/final_step_alternate_desktop_2',array('preview_name'=>self::$preview_name,'preview_icon'=>self::$preview_icon));

                            
                        } elseif(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_1') {

                            wbc()->load->template('publics/breadcrumb/final_step_alternate_desktop_1',array('preview_name'=>self::$preview_name,'preview_icon'=>self::$preview_icon));
                            
                        } elseif($template!='default') {

                            wbc()->load->template('publics/breadcrumb/final_step_alternate_desktop_'.$template,array('preview_name'=>self::$preview_name,'preview_icon'=>self::$preview_icon));
                            
                        } else {                            
                           wbc()->load->template('publics/breadcrumb/final_step_desktop',array('preview_name'=>self::$preview_name,'preview_icon'=>self::$preview_icon,'first'=>self::$first,'second'=>self::$second,'set'=>self::$set,'tmp_set'=>self::$tmp_set));
                        }
                $html.=ob_get_clean();
                $html.='</div>';
            $html.='</div>';
        $html.='</div>';

        if(wbc()->options->get_option('appearance_breadcrumb','showhide_icons','0')/*get_option('eo_wbc_show_hide_breadcrumb_icon','0')*/==='1'){
            $html.="<style>.eo-wbc-container>.ui.ordered.steps .step:before{content:''}</style>";
        } 
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

        return $html;
    }

    private static function eo_wbc_breadcumb_first_html($step,$order){

        $sesssion_product_id = '#';
        if(apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE))) {
            $_session_set=apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE));
            if(!empty($_session_set['FIRST'])) {
                $sesssion_product_id = empty($_session_set['FIRST'][2])?$_session_set['FIRST'][0]:$_session_set['FIRST'][2];    
            }
        }

        ob_start();
        $template = wbc()->options->get_option('configuration','config_alternate_breadcrumb','default');
    	if(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_1') {
            wbc()->load->template('publics/breadcrumb/first_step_alternate_desktop_1', array("step"=>$step,"order"=>$order,"first"=>self::$first,"view_url"=>(!empty(wbc()->sanitize->get('FIRST')) ? self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('FIRST'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id)),'first_icon'=>self::$first_icon,"first_name"=>self::$first_name,'first_slug'=>self::$first_slug)); 
            	
    	} elseif(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_2') {
            wbc()->load->template('publics/breadcrumb/first_step_alternate_desktop_2', array("step"=>$step,"order"=>$order,"first"=>self::$first,"view_url"=>(!empty(wbc()->sanitize->get('FIRST')) ? self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('FIRST'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id)),'first_icon'=>self::$first_icon,"first_name"=>self::$first_name,'first_slug'=>self::$first_slug)); 
                
        } elseif($template!='default') {
            wbc()->load->template('publics/breadcrumb/first_step_alternate_desktop_'.$template, array("step"=>$step,"order"=>$order,"first"=>self::$first,"view_url"=>(!empty(wbc()->sanitize->get('FIRST')) ? self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('FIRST'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id)),'first_icon'=>self::$first_icon,"first_name"=>self::$first_name,'first_slug'=>self::$first_slug)); 
                
        } else {
            wbc()->load->template('publics/breadcrumb/first_step_desktop', array("step"=>$step,"order"=>$order,"first"=>self::$first,"view_url"=>(!empty(wbc()->sanitize->get('FIRST')) ? self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('FIRST'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('FIRST'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('FIRST')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id)),'first_icon'=>self::$first_icon,"first_name"=>self::$first_name,'first_slug'=>self::$first_slug)); 
            	
    	}        
        return ob_get_clean();
    }

    private static function eo_wbc_breadcumb_second_html($step,$order){

        $sesssion_product_id = '#';
        if(apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE))) {
            $_session_set=apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE));
            if(!empty($_session_set['SECOND'])) {
                $sesssion_product_id = empty($_session_set['SECOND'][2])?$_session_set['SECOND'][0]:$_session_set['SECOND'][2];    
            }
        }

        ob_start();
    	$template = wbc()->options->get_option('configuration','config_alternate_breadcrumb','default');
        if(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_1') {
            wbc()->load->template('publics/breadcrumb/second_step_alternate_desktop_1', array("step"=>$step,"order"=>$order,"second"=>self::$second,"view_url"=>(!empty(wbc()->sanitize->get('SECOND'))?self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('SECOND'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id)),'second_icon'=>self::$second_icon,"second_name"=>self::$second_name,'second_slug'=>self::$second_slug));

    	} elseif(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_2') {
            wbc()->load->template('publics/breadcrumb/second_step_alternate_desktop_2', array("step"=>$step,"order"=>$order,"second"=>self::$second,"view_url"=>(!empty(wbc()->sanitize->get('SECOND'))?self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('SECOND'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id)),'second_icon'=>self::$second_icon,"second_name"=>self::$second_name,'second_slug'=>self::$second_slug));

        } elseif($template!='default') {
            wbc()->load->template('publics/breadcrumb/second_step_alternate_desktop_'.$template, array("step"=>$step,"order"=>$order,"second"=>self::$second,"view_url"=>(!empty(wbc()->sanitize->get('SECOND'))?self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('SECOND'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id)),'second_icon'=>self::$second_icon,"second_name"=>self::$second_name,'second_slug'=>self::$second_slug));

        } else {
            
            wbc()->load->template('publics/breadcrumb/second_step_desktop', array("step"=>$step,"order"=>$order,"second"=>self::$second,"view_url"=>(!empty(wbc()->sanitize->get('SECOND'))?self::eo_wbc_breadcrumb_view_url(wbc()->sanitize->get('SECOND'),$order):'#'),"change_url"=>(!empty(wbc()->sanitize->get('SECOND'))?self::eo_wbc_breadcrumb_change_url($order,wbc()->sanitize->get('SECOND')):self::eo_wbc_breadcrumb_change_url($order,$sesssion_product_id)),'second_icon'=>self::$second_icon,"second_name"=>self::$second_name,'second_slug'=>self::$second_slug));
    	}
       return ob_get_clean();     
    }

    public static function eo_wbc_breadcrumb_view_url($product_id,$order){
        //var_dump(self::eo_wbc_breadcrumb_get_category($product_id));
        
        $product_url = get_permalink($product_id);

        if(strpos($product_url,'?') !==false) {
            $product_url.='&';
        } else {
            $product_url.='?';
        }


        if(self::eo_wbc_breadcrumb_get_category($product_id)==self::$first_slug/*get_option('eo_wbc_first_slug')*/) {

            return ($product_url.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>sanitize_text_field($order),'FIRST'=>sanitize_text_field(empty(wbc()->sanitize->get('FIRST'))?'':wbc()->sanitize->get('FIRST')),'SECOND'=>sanitize_text_field(empty(wbc()->sanitize->get('SECOND'))?'':wbc()->sanitize->get('SECOND')),'EO_VIEW'=>1)));

            
        }
        elseif (self::eo_wbc_breadcrumb_get_category($product_id)==self::$second_slug/*get_option('eo_wbc_second_slug')*/) {

            return $product_url.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>sanitize_text_field($order),'FIRST'=>sanitize_text_field(empty(wbc()->sanitize->get('FIRST'))?'':wbc()->sanitize->get('FIRST')),'SECOND'=>sanitize_text_field(empty(wbc()->sanitize->get('SECOND'))?'':wbc()->sanitize->get('SECOND')),'EO_VIEW'=>1));
        } 
    } 

    public static function eo_wbc_breadcrumb_change_url($order,$product_id){        
        $url='';


        $first_id = wbc()->sanitize->get('FIRST');
        $second_id= wbc()->sanitize->get('SECOND');

        if(apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE))) {
            $_session_set=apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE));
            if(empty($first)){            
                if(!empty($_session_set['FIRST'])) {
                    $first_id = empty($_session_set['FIRST'][2])?$_session_set['FIRST'][0]:$_session_set['FIRST'][2];    
                }
            }

            if(empty($second_id)){
                if(!empty($_session_set['SECOND'])) {
                    $second_id = empty($_session_set['SECOND'][2])?$_session_set['SECOND'][0]:$_session_set['SECOND'][2];
                }                
            }
        }

        $chage_product_id=$product_id;
        if(wbc()->session->get('TMP_EO_WBC_SETS',FALSE) and empty(apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE)))) {            
            $_session_set=wbc()->session->get('TMP_EO_WBC_SETS',FALSE);

            if(!empty($_session_set)) {
                if(!empty($_session_set['FIRST'][0])) {
                    $first_id = $_session_set['FIRST'][0];
                }

                if(!empty($_session_set['SECOND'][0])) {
                    $second_id = $_session_set['SECOND'][0];
                }
            }

            if(!($_session_set['FIRST'][0]==$chage_product_id && $_session_set['SECOND'][0]==$chage_product_id)){
                if($_session_set['FIRST'][2]==$chage_product_id){
                    $chage_product_id=$_session_set['FIRST'][0];

                } elseif ($_session_set['SECOND'][2] == $chage_product_id) {
                    $chage_product_id=$_session_set['SECOND'][0];
                }
            }
        }

        if ($order==1) {

            if(self::eo_wbc_breadcrumb_get_category($chage_product_id)==self::$first_slug) {

                $first_url = \eo\wbc\model\Category_Attribute::instance()->get_category_link(self::$first_slug);        
                $url=$first_url.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>self::$first_slug,'STEP'=>1,'FIRST'=>'','SECOND'=>$second_id,'EO_CHANGE'=>1));
            } elseif (self::eo_wbc_breadcrumb_get_category($chage_product_id)==self::$second_slug) {

                $second_url = \eo\wbc\model\Category_Attribute::instance()->get_category_link(self::$second_slug);
                $url=$second_url.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>self::$second_slug,'STEP'=>1,'FIRST'=>$first_id,'SECOND'=>'','EO_CHANGE'=>1));
            }
        }
        elseif ($order==2) {

            $product=NULL;
            if(self::eo_wbc_breadcrumb_get_category($chage_product_id)==self::$first_slug) {
                if(empty($second_id)) return '#';
                $product=wc_get_product($second_id);
                //$product=new \WC_Product($first_id);
            }
            elseif (self::eo_wbc_breadcrumb_get_category($chage_product_id)==self::$second_slug) {        
                if(empty($first_id)) return '#';                
                $product= wc_get_product($first_id);
                //$product=new \WC_Product($second_id);
            }

            /*echo "<pre>";
            print_r(apply_filters('eowbc_breadcrumb_set',wbc()->session->get('EO_WBC_SETS',FALSE)));
            echo "</pre>";

            var_dump($product->get_id());*/

            if(empty($product)) return '#';            
            $variable_status=FALSE;//status if product is varaible in nature.
            $cart=NULL;//storage variable for cart data if redirected from 'Add to cart' action.
            
            if($product->is_type( 'variable' )) {

                $variable_status=TRUE;
            }

            if(method_exists($product,'get_id')) {

                $post_id=$product->get_id();

            } else {

                $post_id=$product->ID;
            } 

            $terms=wp_get_post_terms($post_id,get_taxonomies(),array('fields'=>'ids'));
            $maps = apply_filters('eowbc_product_maps',wp_cache_get( 'cache_maps', 'eo_wbc'));
            $groups = wbc()->options->get_option_group('eowbc_mapping_group',"a:0:{}");
            $group_keys = array();

            if(!empty($groups)) {
                $groups = unserialize(wbc()->options->get_option_group('eowbc_mapping_group'));
                if(is_array($groups) and !empty($groups)) {
                    foreach ($groups as $gkey => $gvalue) {
                        $group_keys = array_merge($group_keys,$gvalue);
                    }
                }
            }

            $is_cleanup = apply_filters( 'eowbc_product_maps_is_reset_cleanup',1);

            if($is_cleanup and !empty($maps) and is_array($maps)) {
                
                $new_maps = array();            
                foreach ($maps as $key => $map) {
                    if(empty($map['save_builder'])){
                        $new_maps[$key] = $map;
                    }                
                }            
                $maps = $new_maps;
            }


            $category=array();        
            
            if(!is_wp_error($terms) and !empty($terms) and is_array($terms) and is_array($maps) ){

                if($variable_status)
                {   
                    $new_terms=array();
                    foreach ($terms as $term_id) {
                        $term_object=get_term_by('term_taxonomy_id',$term_id,'category');
                        if($term_object->taxonomy=='product_cat' 
                            or
                            in_array(
                                $term_object->slug,
                                array_values(wc_get_product_variation_attributes($cart['variation_id']))) 
                        ){
                            $new_terms[]=$term_id;
                        }          
                    }
                    $terms=$new_terms;
                }

                // Gather all target of the maps           
                $map_column = 0;
                if(self::eo_wbc_breadcrumb_get_category($post_id)==self::$first_slug) { $map_column = 0; }
                elseif(self::eo_wbc_breadcrumb_get_category($post_id)==self::$second_slug) { $map_column = 1; }
                
                $product_code = "pid_{$post_id}";
                            
                if(!empty($terms) and is_array($terms)){
                    $terms =array_filter(array_map(function($map) use(&$terms,&$map_column,&$product_code,&$category){
                        
                        if(array_intersect($terms,$map[$map_column])){
                            if($map_column == 0) return $map[1];
                            else return $map[0];
                        } elseif(in_array( $product_code, $map[$map_column] )) {                    
                            if($map_column == 0){
                                $category = array_merge( $category, $map[1] );
                            } else {
                                $category = array_merge( $category, $map[0] );
                            }
                            return false;
                        } else {
                            return false;
                        }                
                    },$maps));
                }
            }
         
            //remove empty array space and duplicate values
            $category=array_unique(array_filter($category));        
            
            $cat=array();//array to hold category slugs
            $tax=array();//array to hold taxonomy slugs

            $gcat=array();//array to hold category slugs
            $gtax=array();//array to hold taxonomy slugs

            if(!is_wp_error($terms) and !empty($terms)) {
                array_walk($terms,function($term) use(&$cat,&$tax){
                    $_term_ = null;
                    if(is_array($term)) {
                        foreach ($term as $_term_) {
                            $_term_ = get_term_by('term_taxonomy_id', $_term_);
                            if(!is_wp_error($_term_) and !empty($_term_)) {
                                $_taxonomy_ = $_term_->taxonomy;                            
                                if($_taxonomy_==='product_cat') {

                                    $cat[]= $_term_->slug;

                                } elseif( substr($_taxonomy_,0,3) =='pa_' ) {

                                    $tax[substr($_term_->taxonomy,3)][] = $_term_->slug;
                                }
                            }
                        }
                    } else {
                        $_term_ = get_term_by('term_taxonomy_id', $_term_);

                        if(!is_wp_error($_term_) and !empty($_term_)) {
                            $_taxonomy_ = $_term_->taxonomy;                        
                            if($_taxonomy_==='product_cat') {

                                $cat[]= $_term_->slug;

                            } elseif( substr($_taxonomy_,0,3) =='pa_' ) {
                                
                                $tax[substr($_term_->taxonomy,3)][] = $_term_->slug;
                            }
                        }
                    }
                });


                // group run
                foreach ($terms as $term_key => $term_value) {
                    
                    if(in_array($term_key,$group_keys)!==false) {

                        $_term_ = null;
                        if(is_array($term_value)) {
                            foreach ($term_value as $_term_id) {
                                $_term_ = get_term_by('term_taxonomy_id', $_term_id);
                                if(!is_wp_error($_term_) and !empty($_term_)) {
                                    $_taxonomy_ = $_term_->taxonomy;                            
                                    if($_taxonomy_==='product_cat') {

                                        $group_keys_id  = self::get_group_id4map($groups,$term_key,$terms);

                                        if(array_search($_term_->slug,$cat)!==false) {
                                            unset($cat[array_search($_term_->slug,$cat)]);
                                        }

                                        $gcat[$group_keys_id][]= $_term_->slug;

                                    } elseif( substr($_taxonomy_,0,3) =='pa_' ) {

                                        $gtax[substr($_term_->taxonomy,3)][] = $_term_->slug;
                                    }
                                }
                            }
                        } else {
                            $_term_ = get_term_by('term_taxonomy_id', $_term_id);

                            if(!is_wp_error($_term_) and !empty($_term_)) {
                                $_taxonomy_ = $_term_->taxonomy;
                                if($_taxonomy_==='product_cat') {

                                    /*$gcategory[$term_key][]= $_term_->slug;*/
                                    $group_keys_id  = self::get_group_id4map($groups,$term_key);

                                    if(array_search($_term_->slug,$cat)!==false) {
                                        unset($cat[array_search($_term_->slug,$cat)]);
                                    }

                                    $gcat[$group_keys_id][]= $_term_->slug;

                                } elseif( substr($_taxonomy_,0,3) =='pa_' ) {
                                    
                                    $gtax[substr($_term_->taxonomy,3)][] = $_term_->slug;
                                }
                            }
                        }

                    }
                }
            }
           
            $link='';

            /*echo "<pre>";
            print_r([$cat,$tax,$gcat,$gtax,$terms]);
            echo "</pre>";
            die();*/

            //if category maping is available then make url filter to category
            //else add default category to the link.
            
            $link=(self::eo_wbc_breadcrumb_get_category($chage_product_id)==wbc()->options->get_option('configuration','first_slug'))
                            ? (self::$first_slug)
                            : (self::$second_slug);


            $CAT_LINK = '';

            if(is_array($cat) && !empty($cat)) {
                // $link=implode( (get_option('eo_wbc_map_cat_pref','and')==='and'?'+':',') , $category );                  
                $CAT_LINK=implode( (wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_category','and')==='and'?'+':',') , array_unique($cat) );
            }
                
            if(is_array($gcat) && !empty($gcat)) {        
                
                foreach ($gcat as $gcat_key=>$gcat_value) {
                    if(is_array($gcat_value)) {
                        $gcat[$gcat_key] = implode( '+' , array_unique($gcat_value) );
                    }
                }
                            
                if(!empty($CAT_LINK)) {
                    $CAT_LINK.=(wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_category','and')==='and'?'+':',').implode((wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_category','and')==='and'?'+':','), array_unique($gcat) );
                } else {
                    $CAT_LINK.=implode( (wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_category','and')==='and'?'+':',') , array_unique($gcat) );                  
                }
            }

            $link.="/?";

            if(!empty($CAT_LINK)) {
                $link.='CAT_LINK='.urlencode($CAT_LINK).'&';
            }
            
            if(is_array($tax) && !empty($tax)) {            
                
                $filter_query=array();
                // $attr_pref=get_option('eo_wbc_map_attr_pref','or');
                $attr_pref=wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_attribute','or');
                $glue=($attr_pref === 'or' ? ',' : '+' );           

                foreach ($tax as  $_tax => $_tems) {
                    $filter_query["query_type_{$_tax}"] = $attr_pref;
                    $filter_query["filter_{$_tax}"] = implode($glue,array_unique(array_filter($_tems)));
                }
                $link.=http_build_query($filter_query).'&';            
            }    

            if(is_array($gtax) && !empty($gtax)){            
                
                $filter_query=array();
                // $attr_pref=get_option('eo_wbc_map_attr_pref','or');
                $attr_pref=wbc()->options->get_option('mapping_prod_mapping_pref','prod_mapping_pref_attribute','or');
                $glue=($attr_pref === 'or' ? ',' : '+' );           

                foreach ($gtax as  $_tax => $_tems) {
                    $filter_query["query_type_{$_tax}"] = $attr_pref;
                    $filter_query["filter_{$_tax}"] = implode($glue,array_unique(array_filter($_tems)));
                }
                $link.=http_build_query($filter_query).'&';            
            }

            if(!empty($product_in) && is_array($product_in)) {
                $product_in = array_filter($product_in);
                $product_in = array_map(function($product_in){ return substr($product_in,4); },$product_in);

                $link.='products_in='.implode(',',$product_in).'&';
            } 

            //$url=$link.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>(@wbc()->sanitize->get('BEGIN')),'STEP'=>2,'FIRST'=>(wbc()->sanitize->get('BEGIN')==self::$first_slug? wbc()->sanitize->get('FIRST'):''),'SECOND'=>(wbc()->sanitize->get('BEGIN')==self::$second_slug?wbc()->sanitize->get('SECOND'):''),'EO_CHANGE'=>1,'CAT_LINK'=>$cat_link));

            $url=get_bloginfo('url').'/index.php'.'/'.wbc()->wc->wc_permalink('category_base').'/'.$link
                        .wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>(@wbc()->sanitize->get('BEGIN')),'STEP'=>2,'FIRST'=>(wbc()->sanitize->get('BEGIN')==self::$first_slug? wbc()->sanitize->get('FIRST'):''),'SECOND'=>(wbc()->sanitize->get('BEGIN')==self::$second_slug?wbc()->sanitize->get('SECOND'):''),'EO_CHANGE'=>1,'CAT_LINK'=>$CAT_LINK));

            /////////////////////////////////////////////////////////

            /*if(!empty($tax) and is_array($tax)){            
                
                $filter_query=array();
                if( !empty($tax) && (is_object($tax) or is_array($tax)) ) {
                    foreach ($tax as $tax_id) {
                        $term_object=get_term_by('term_taxonomy_id',$tax_id,'category');  
                        if(!empty($term_object)){
                            $filter_query[str_replace('pa_','',$term_object->taxonomy)][]=$term_object->slug;    
                        }                             
                    }            
                }
                if(!empty($filter_query) && (is_object($filter_query) or is_array($filter_query))) {
                    foreach ($filter_query as $filter_name => $filters) {
                        $link.="query_type_{$filter_name}=or&filter_{$filter_name}=".implode(',',$filters)."&";
                    }       
                }
            }        

            if(!empty($category) && is_array($category)) {
                $category = array_filter($category);
                $category = array_map(function($category){ return substr($category,4); },$category);

                $link.='products_in='.implode(',',$category).'&';
            }  
            
            $url=get_bloginfo('url').'/index.php'.'/'.wbc()->wc->wc_permalink('category_base').'/'.$link
                        .wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>(@wbc()->sanitize->get('BEGIN')),'STEP'=>2,'FIRST'=>(wbc()->sanitize->get('BEGIN')==self::$first_slug? wbc()->sanitize->get('FIRST'):''),'SECOND'=>(wbc()->sanitize->get('BEGIN')==self::$second_slug?wbc()->sanitize->get('SECOND'):''),'EO_CHANGE'=>1,'CAT_LINK'=>$cat_link));*/            
                        
            
        }
        return $url;
    }

    public static function get_group_id4map($groups,$term_key,$terms) {        
        $option_key = '';
        foreach ($groups as $gkey => $gvalue) {
            if(array_search($term_key,$gvalue)!==false){
                $option_key = $gkey;
            }

            if( count(array_intersect($gvalue,array_keys($terms))) === count($terms) ) {
                return $gkey;
            }
        }
        return $option_key;
    }

    private static function eo_wbc_breadcrumb_get_category($product_id)
    {   
        if(empty($product_id)){
            return false;
        }

        return wbc()->common->get_category('product',intval($product_id),array(wbc()->options->get_option('configuration','first_slug'),wbc()->options->get_option('configuration','second_slug')));


        if(is_object($product_id) and method_exists($product_id,'get_id')) {
            $product_id = $product_id->get_id();
        }
        
        return wbc()->common->get_category('product',$product_id,array(self::$first_slug,self::$second_slug));


        $terms = get_the_terms( $product_id, 'product_cat' );
       
        $term_slug=[];
        if(!empty($terms)){
            foreach ($terms as $term) {
                $term_slug[]=$term->slug;
            }
        }                

        if(in_array(self::$first_slug/*get_option('eo_wbc_first_slug')*/,$term_slug))
        {
            return self::$first_slug/*get_option('eo_wbc_first_slug')*/;
        }
        elseif(in_array(self::$second_slug/*get_option('eo_wbc_second_slug')*/,$term_slug))
        {
            return self::$second_slug/*get_option('eo_wbc_second_slug')*/;
        }
        return false;
    } 
}
?>
