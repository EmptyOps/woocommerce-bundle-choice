<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Preview {

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
        if (empty(wbc()->sanitize->get('EO_WBC'))) return true;

        if(empty(wbc()->sanitize->get('FIRST')) || empty(wbc()->sanitize->get('SECOND')))
        {            
            exit(wp_redirect(wbc()->wc->eo_wbc_get_cart_url()));
            return;
        } 

        if( !empty(wbc()->sanitize->post('add_to_cart')) && wbc()->sanitize->post('add_to_cart')==1 && !empty(wbc()->sanitize->get('EO_WBC')))
        {
            $this->eo_wbc_add_this_to_cart();
            //Redirect to cart page.       
            $cart_url = wbc()->wc->eo_wbc_get_cart_url();

            if(strpos($cart_url,'?')!==false){
                $cart_url = explode('?', $cart_url)[0];
            }
            
            exit(wp_redirect($cart_url));
        }     
        
        $this->eo_wbc_render();    //Page Review cart data
        $this->eo_wbc_add_css();    //images style
    }    
    
    private function eo_wbc_add_css()
    {
        wbc()->theme->load('css','review');
        wbc()->theme->load('js','review');
        /*Hide sidebar and make content area full width.*/
        if(apply_filters('eowbc_filter_sidebars_widgets',true)){
            add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
                return array( false );
            });
        }
        $button_backcolor_active = wbc()->options->get_option('appearance_wid_btns','button_backcolor_active','');
        $button_textcolor = wbc()->options->get_option('appearance_wid_btns','button_textcolor','#ffffff');
        $eo_wbc_home_btn_border_color = false;  //dropped this field. wbc()->options->get_option('appearance_wid_btns','button_backcolor_active','');
        $button_radius = wbc()->options->get_option('appearance_wid_btns','button_radius','');
        $button_hovercolor = wbc()->options->get_option('appearance_wid_btns','button_hovercolor','');
    
       
        ob_start();        
        ?>
        <style type="text/css">
            .woocommerce .content-area ,#content,#primary,#main,.content,.primary,.main{
                  width: 100% !important;
             }
             .woocommerce .widget-area {
                  display: none !important;
             }
             .ui.button{
                <?php _e($button_backcolor_active?'background-color:'.$button_backcolor_active.' !important;':''); ?>
                <?php _e($button_textcolor?'color:'.$button_textcolor.' !important;':''); ?>
                <?php _e($eo_wbc_home_btn_border_color?'border-color:'.$eo_wbc_home_btn_border_color.' !important;':''); ?>
                <?php _e($button_radius?'border-radius:'.$button_radius.' !important;':''); ?>
            }

        </style>
        <?php
        echo ob_get_clean();
        add_action( 'wp_enqueue_scripts',function(){ 
            // wp_register_style('eo_wbc_ui_css',EOWBC_ASSET_URL.'css/fomantic/semantic.min.css');
            // wp_enqueue_style( 'eo_wbc_ui_css');
            wbc()->load->asset('css','fomantic/semantic.min');
            // wp_register_script('eo_wbc_ui_js',EOWBC_ASSET_URL.'js/fomantic/semantic.min.js');
            // wp_enqueue_script( 'eo_wbc_ui_js');
            wbc()->load->asset('js','fomantic/semantic.min');
        },100);

        add_action('wp_footer',function(){
            ?>
                <script>
                    jQuery(document).ready(function($){
                        jQuery('.special.cards .image').dimmer({ on: 'hover' });
                    });
                </script>
            <?php
        },100);  

        add_action( 'wp_head',function(){           
           
        });            
    }
    
    public function eo_wbc_add_this_to_cart()
    {
        $eo_wbc_sets=wbc()->session->get('EO_WBC_SETS',NULL);
        $eo_wbc_maps=wbc()->session->get('EO_WBC_MAPS',array());
        
        if(!is_null($eo_wbc_sets)){
            
            foreach (wc()->cart->cart_contents as $cart_key=>$cart_item)
            {
                $product_count=0;
                $single_count=0;
                //loop through each of maps and count total product and single product count.
                foreach ($eo_wbc_maps as $map)
                {
                    if($map["FIRST"][0]==$cart_item["product_id"] && $map["FIRST"][2]==$cart_item["variation_id"]){
                        $product_count+=$map["FIRST"][1];
                        if (!$map["SECOND"]){
                            $single_count+=$map["FIRST"][1];
                        }
                    }
                    if ($map["SECOND"] && $map["SECOND"][0]==$cart_item["product_id"] && $map["SECOND"][2]==$cart_item["variation_id"])
                    {
                        $product_count+=$map["SECOND"][1];
                    }
                }
                //if no such product available in maps then just add as single to the list.
                if ($product_count>0)
                {
                    //if total product count is lesser then cart's total amount.
                    if ($product_count<$cart_item["quantity"])
                    {
                        //if the item is single only.
                        if($single_count>0)
                        {
                            foreach ($eo_wbc_maps as $map_key=>$map)
                            {
                                if($map["FIRST"][0]==$cart_item["product_id"] && $map["FIRST"][2]==$cart_item["variation_id"])
                                {
                                    unset($eo_wbc_maps[$map_key]);
                                }                                
                            }
                            $eo_wbc_maps[]=array(
                                    "FIRST"=>array(
                                        (string)$cart_item["product_id"],
                                        (string)($cart_item["quantity"]-$product_count)+$single_count,
                                        (string)$cart_item["variation_id"]                                        
                                        ),
                                    "SECOND"=>FALSE
                                );
                        }
                        else
                        {
                            $eo_wbc_maps[]=array(
                                "FIRST"=>array(
                                    (string)$cart_item["product_id"],
                                    (string)($cart_item["quantity"]-$product_count),
                                    (string)$cart_item["variation_id"]                                    
                                ),
                                "SECOND"=>FALSE
                            );
                        }
                    }
                }
                else
                {
                    //No product available in maps so add as single to list.
                    $eo_wbc_maps[]=array(
                        "FIRST"=>array(
                            (string)$cart_item["product_id"],
                            (string)$cart_item["quantity"],
                            (string)$cart_item["variation_id"]                            
                        ),
                        "SECOND"=>FALSE
                    );
                }
            } 
            //adding set to the woocommerce cart
            $cart_details=wbc()->session->get('EO_WBC_SETS');
           
           
            if(!empty($cart_details['FIRST']) && !empty($cart_details['SECOND'])){
                $FIRT_CART_ID=wc()->cart->add_to_cart(
                                $cart_details['FIRST'][0],
                                $cart_details['FIRST'][1],
                                $cart_details['FIRST'][2],(
                                is_null($cart_details['FIRST'][2])?null:$cart_details['FIRST']['variation'])
                            );                  
                
                if($FIRT_CART_ID)
                {
                    $SECOND_CART_ID=wc()->cart->add_to_cart(
                                $cart_details['SECOND'][0],
                                $cart_details['SECOND'][1],
                                $cart_details['SECOND'][2],(
                                is_null($cart_details['SECOND'][2])?null:$cart_details['SECOND']['variation'])
                            );
                    
                    if($SECOND_CART_ID)
                    {
                        //All is good so we saved mapps to session.
                        $eo_wbc_maps[]=wbc()->session->get('EO_WBC_SETS');                            
                        wbc()->session->set('EO_WBC_MAPS',$eo_wbc_maps);
                    }
                    else
                    {
                        $FIRST_OB=(array)wc()->cart->get_cart_item($FIRT_CART_ID);
                        if($FIRST_OB['quantity']==$cart_details['FIRST'][1])
                        {
                            wc()->cart->remove_cart_item($FIRT_CART_ID);
                        }
                        elseif($FIRST_OB['quantity']>$cart_details['FIRST'][1])
                        {
                            wc()->cart->set_quantity($FIRT_CART_ID,($FIRST_OB['quantity']-$cart_details['FIRST'][1]));
                        }                   
                    }
                }            
            }            
        }
        else
        {
            wc_add_notice(__('Unexpected error has occured','woo-bundle-choice'),'error');
            wc_print_notices();
        }                
    }
    
    private function eo_wbc_add_to_cart()
    {
        $cart=base64_decode(wbc()->sanitize->get('CART'),TRUE);        
        if (!empty($cart)){
            
            $cart=str_replace("\\",'',$cart);
            $cart=(array)json_decode($cart);
            //wbc()->common->pr($cart);
            if(is_array($cart) OR is_object($cart)){

                if(empty($cart['quantity'])){
                    $cart['quantity'] = 1;
                }

                //if product belongs to first target;
                $eo_wbc_sets=wbc()->session->get('EO_WBC_SETS',array());
                $variation_data = array();
                foreach($cart as $cart_key=>$cart_value){
                    if(substr($cart_key, 0, strlen('attribute_')) === 'attribute_'){
                        $variation_data[$cart_key]=$cart_value;
                    }
                }                
                // if (get_option('eo_wbc_first_slug')==$cart['eo_wbc_target']) {
                if (wbc()->options->get_option('configuration','first_slug')==$cart['eo_wbc_target']) {

                    $eo_wbc_sets['FIRST']=array(
                                        $cart['eo_wbc_product_id'],
                                        $cart['quantity'],
                                        (isset($cart['variation_id'])?$cart['variation_id']:NULL),
                                        'variation'=>$variation_data,
                                    );
                }
                //if product belongs to second target;
                // elseif (get_option('eo_wbc_second_slug')==$cart['eo_wbc_target']) {
                elseif (wbc()->options->get_option('configuration','second_slug')==$cart['eo_wbc_target']) {

                     $eo_wbc_sets['SECOND']=array(
                                        $cart['eo_wbc_product_id'],
                                        $cart['quantity'],
                                        (isset($cart['variation_id'])?$cart['variation_id']:NULL),
                                        'variation'=>$variation_data,                          
                                    );
                }
                wbc()->session->set('EO_WBC_SETS',$eo_wbc_sets);
            }
        }
        
    }

    private function eo_wbc_buttons_css(){
      return '.ui.dimmer .ui.button{'.
          // (get_option('eo_wbc_home_btn_color')?'background-color:'.get_option('eo_wbc_home_btn_color').' !important;':'').
          (wbc()->options->get_option('appearance_wid_btns','button_backcolor_active',false)?'background-color:'.wbc()->options->get_option('appearance_wid_btns','button_backcolor_active',false).' !important;':'').
          // (get_option('eo_wbc_home_btn_text_color')?'color:'.get_option('eo_wbc_home_btn_text_color').' !important;':'').
          (wbc()->options->get_option('appearance_wid_btns','button_textcolor',false)?'color:'.wbc()->options->get_option('appearance_wid_btns','button_textcolor',false).' !important;':'').
          // // (get_option('eo_wbc_home_btn_border_color')?'border-color:'.get_option('eo_wbc_home_btn_border_color').' !important;':'').
          // (wbc()->options->get_option('appearance_wid_btns','button_backcolor_active',false)?'border-color:'.wbc()->options->get_option('appearance_wid_btns','button_backcolor_active',false).' !important;':'').
          // (get_option('eo_wbc_home_btn_radius')?'border-radius:'.get_option('eo_wbc_home_btn_radius').'px !important;':'').'}'.
          (wbc()->options->get_option('appearance_wid_btns','button_radius',false)?'border-radius:'.wbc()->options->get_option('appearance_wid_btns','button_radius',false).'px !important;':'').'}'.
          // (get_option('eo_wbc_home_btn_hover_color')?'.ui.dimmer .ui.button:hover{ background-color:'.get_option('eo_wbc_home_btn_hover_color').' !important; }':'');
          (wbc()->options->get_option('appearance_wid_btns','button_hovercolor',false)?'.ui.dimmer .ui.button:hover{ background-color:'.wbc()->options->get_option('appearance_wid_btns','button_hovercolor',false).' !important; }':'');
            
    }
    
    private function eo_wbc_render()
    {           
        /*add_filter('the_content',function(){*/
           
            
            if( !empty(wbc()->sanitize->get('FIRST')) && !empty(wbc()->sanitize->get('SECOND')) && !empty(wbc()->sanitize->get('CART')) and !empty(wbc()->sanitize->get('EO_WBC')))
            {                
                //if data available at _GET then add to out custom cart
                $this->eo_wbc_add_to_cart();
            }                        
            
            //Add session set data to temporary iff the set data is not empty.
            if(wbc()->session->get('EO_WBC_SETS',FALSE)) {
                
                $_session_set=wbc()->session->get('EO_WBC_SETS',FALSE);
                if(!empty($_session_set['FIRST']) && !empty($_session_set['SECOND']) ){
                    wbc()->session->set('TMP_EO_WBC_SETS',wbc()->session->get('EO_WBC_SETS'));
                }
            }
            
            $set=wbc()->session->get('TMP_EO_WBC_SETS',FALSE);            
            if(!empty($set)){

                $first=wbc()->wc->eo_wbc_get_product((int)($set['FIRST'][2]?$set['FIRST'][2]:$set['FIRST'][0]));
                $second=wbc()->wc->eo_wbc_get_product((int)($set['SECOND'][2]?$set['SECOND'][2]:$set['SECOND'][0]));

                wbc()->load->model('publics/component/eowbc_breadcrumb');
                $content= \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_add_breadcrumb(wbc()->sanitize->get('STEP'),wbc()->sanitize->get('BEGIN')).'<br/>';
                
                $content.='<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><div class="ui special cards centered" style="margin: auto !important;direction: ltr;
    min-width: fit-content !important;max-width: fit-content !important;">'.
                    '<div class="card">'.
                        '<div class="blurring dimmable image">'.
                          '<div class="ui dimmer inverted transition hidden">'.
                            '<div class="content">'.
                                '<div class="center">'.
                                    '<a class="ui button primary" href="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url((!empty(wbc()->sanitize->get('BEGIN')) && wbc()->sanitize->get('BEGIN')==wbc()->options->get_option('configuration','first_slug')/*get_option('eo_wbc_first_slug')*/ ? 1 : 2),(empty($set['FIRST'][2])?$set['FIRST'][0]:$set['FIRST'][2])).'" >Change</a>'.
                                '</div>'.
                            '</div>'.
                          '</div>'.$first->get_image('full').
                          '</div>'.
                        '<div class="content">'.
                            '<div class="header">'.($first->get_title()).'</div>'.
                            '<div class="meta">'.__($set['FIRST'][2]?"<br/>".implode('<br/>',wbc()->wc->eo_wbc_get_product_variation_attributes($set['FIRST'][2],$set['FIRST']['variation'])):'').
                            '</div>'.
                        '</div>'.
                        '<div class="extra content">'.
                            '<div class="header description">'.
                                (wc_price($first->get_price())."&nbsp;X&nbsp;".$set['FIRST'][1]).
                            '</div>'.
                        '</div>'.
                    '</div>'.
                    '<div class="card">'.
                        '<div class="blurring dimmable image">'.
                          '<div class="ui dimmer inverted transition hidden">'.
                            '<div class="content">'.
                                '<div class="center">'.
                                    '<a class="ui button primary" href="'.\eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_breadcrumb_change_url((!empty(wbc()->sanitize->get('BEGIN')) && wbc()->sanitize->get('BEGIN')==wbc()->options->get_option('configuration','first_slug')/*get_option('eo_wbc_first_slug')*/ ? 2 : 1),(empty($set['SECOND'][2])?$set['SECOND'][0]:$set['SECOND'][2])).'">Change</a>'.        
                                '</div>'.
                            '</div>'.
                          '</div>'.
                          $second->get_image('full').
                        '</div>'.
                        '<div class="content">'.
                            '<div class="header">'.__($second->get_title()).'</div>'.
                            '<div class="meta">'.__($set['SECOND'][2]?"<br/>".implode('<br/>',wbc()->wc->eo_wbc_get_product_variation_attributes($set['SECOND'][2],$set['SECOND']['variation'])):'').
                            '</div>'.
                        '</div>'.
                        '<div class="extra content">'.
                            '<div class="header description">'.
                                (wc_price($second->get_price())."&nbsp;X&nbsp;".$set['SECOND'][1]).
                            '</div>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '<div class="ui row" style="display:table !important;margin:auto;margin-bottom: 2em !important;"><form name="preview_add_to_cart" id="preview_add_to_cart" action="" method="post" class="woocommerce" style="float:right;margin-top: 1.5em;display:grid !important;">'.
                    '<input type="hidden" name="add_to_cart" value=1>'.
                    '<button id="preview_add_to_cart_button" class="ui button right floated aligned" style="width: fit-content;margin: auto;background-color:'.wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_active',wbc()->session->get('EO_WBC_BG_COLOR',FALSE))/*get_option('eo_wbc_active_breadcrumb_color',wbc()->session->get('EO_WBC_BG_COLOR',FALSE))*/.'">'.__('Add This To Cart','woo-bundle-choice').
                    '</button><script>jQuery(document).ready(function(){ jQuery("#preview_add_to_cart_button").on("click",function(){ jQuery("#preview_add_to_cart").get(0).submit(); }); })</script>'.
                '</form></div>';                
                add_filter('the_content',function() use($content){
                    if(!in_the_loop() || !is_singular() || !is_main_query() ) return '';
                    return $content;
                });
                //return $content;
            } else {                
                //ob_flush();
                //ob_end_clean();
                //exit(var_dump(wbc()->wc->eo_wbc_get_cart_url()));
                exit(wp_redirect(wbc()->wc->eo_wbc_get_cart_url()));
            }
        /*});          */


    }

}