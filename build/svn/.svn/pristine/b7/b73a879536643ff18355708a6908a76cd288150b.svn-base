<?php
class EO_WBC_Breadcrumb
{
    public static function eo_wbc_add_css(){

       require_once 'css/eo_wbc_breadcrumb.php';
    }  
    
    public static function eo_wbc_add_breadcrumb($step=1,$begin){

        /* *
            CLASS: 
            -------------------------------------------------
            ordered - mark as rodered type of breadcrumb.
            completed - mark as completed and add check mark.
            disabled - incomplete breadcrumb.
            title - set title on breadcrumb.
            description - set description on breadcrumb.
         */

        $html='<!-- Created with Wordpress plugin - WooCommerce Product bundle choice --><div class="eo-wbc-container">';
            $html.='<div class="ui ordered steps">';
                if($begin==get_option('eo_wbc_first_slug'))
                {
                    $html.=self::eo_wbc_breadcumb_first_html($step,1).self::eo_wbc_breadcumb_second_html($step,2);
                }
                elseif ($begin==get_option('eo_wbc_second_slug'))
                {
                    $html.=self::eo_wbc_breadcumb_second_html($step,1).self::eo_wbc_breadcumb_first_html($step,2);
                }
                $html.='<div data-href="'.( (empty($_GET['EO_CHANGE']) XOR empty($_GET['EO_VIEW']) ) && !empty($_GET['FIRST']) && !empty($_GET['SECOND'])?get_bloginfo('url')
                    .get_option('eo_wbc_review_page') 
                    .'?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN'])
                    .'&STEP=3&FIRST='.sanitize_text_field($_GET['FIRST']).'&SECOND='.sanitize_text_field($_GET['SECOND']):'#' ).'" class="'.(($step==3)?'active ':(($step>3)?'completed ':'disabled')).' step">';
                        $html.=(($step<=3)&&get_option('eo_wbc_collection_icon',FALSE)&&get_option('eo_wbc_show_hide_breadcrumb_icon','0'))?'<img src="'.wp_get_attachment_url(get_option('eo_wbc_collection_icon')).'"/>':'';
                        $html.='<div class="content">';                                               
                            $html.='<div class="title">'.get_option('eo_wbc_collection_title','Preview').'</div>';
                        $html.='</div>';
                $html.='</div>';
            $html.='</div>';
        $html.='</div>';

        if(get_option('eo_wbc_show_hide_breadcrumb_icon','0')==='1'){
            $html.="<style>.eo-wbc-container>.ui.ordered.steps .step:before{content:''}</style>";
        }        
        $html.="<script>jQuery(document).ready(function(){ jQuery('.eo-wbc-container>.ui.steps .step').on('click',function(){ console.log('click'); if(jQuery(this).attr('data-href')!='#'){  console.log('redirecting'); window.location.href=jQuery(this).attr('data-href'); } }); })</script>";

        return $html;
         
    }

    private static function eo_wbc_breadcumb_first_html($step,$order){



        $html='<div data-href="'.
        (empty($_GET['FIRST'])?'#':
        self::eo_wbc_breadcrumb_view_url(sanitize_text_field($_GET['FIRST']),$order)).'" class="'.(($step==$order)?'active ':(($step>$order)?'completed ':'disabled')).' step">'.            
            (($step<=$order)&&get_option('eo_wbc_first_icon',FALSE)&&get_option('eo_wbc_show_hide_breadcrumb_icon','0')
                ?
                '<img src="'.wp_get_attachment_url(get_option('eo_wbc_first_icon')).'">'
                :''
            ).'
            <div class="content">
              <div class="title">'.get_option('eo_wbc_first_name','').'</div>
              <div class="description">
                <a href="'.(empty($_GET['FIRST'])?'#':self::eo_wbc_breadcrumb_change_url($order,$_GET['FIRST'])).'" >Change
                </a>                
              </div>
            </div>
        </div>';
        return $html;
    }

    private static function eo_wbc_breadcumb_second_html($step,$order){


        $html='<div data-href="'.
        (empty($_GET['SECOND'])?'#':
        self::eo_wbc_breadcrumb_view_url(sanitize_text_field($_GET['SECOND']),$order)).'" class="'.(($step==$order)?'active ':(($step>$order)?'completed ':'disabled')).' step">'.            
            (($step<=$order)&&get_option('eo_wbc_second_icon',FALSE)&&get_option('eo_wbc_show_hide_breadcrumb_icon','0')
                ?
                '<img src="'.wp_get_attachment_url(get_option('eo_wbc_second_icon')).'">'
                :''
            ).'
            <div class="content">
              <div class="title">'.get_option('eo_wbc_second_name','').'</div>
              <div class="description">
                <a href="'.(empty($_GET['FIRST'])?'#':self::eo_wbc_breadcrumb_change_url($order,$_GET['SECOND'])).'" >Change
                </a>                
              </div>
            </div>
        </div>';
        return $html;
    }

    private static function eo_wbc_breadcrumb_view_url($product_id,$order){
        
        if(self::eo_wbc_breadcrumb_get_category($product_id)==get_option('eo_wbc_first_slug')){

            return get_permalink($product_id).
                '?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN']).
                '&STEP='.sanitize_text_field($order).
                '&FIRST='.sanitize_text_field(empty($_GET['FIRST'])?'':$_GET['FIRST']).
                '&SECOND='.sanitize_text_field(empty($_GET['SECOND'])?'':$_GET['SECOND']).
                '&EO_VIEW=1';
        }
        elseif (self::eo_wbc_breadcrumb_get_category($product_id)==get_option('eo_wbc_second_slug')) {

            return get_permalink($product_id).
                '?EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN']).
                '&STEP='.sanitize_text_field($order).
                '&FIRST='.sanitize_text_field(empty($_GET['FIRST'])?'':$_GET['FIRST']).
                '&SECOND='.sanitize_text_field(empty($_GET['SECOND'])?'':$_GET['SECOND']).
                '&EO_VIEW=1';
        } 
    } 

    public static function eo_wbc_breadcrumb_change_url($order,$product_id){        
        $url='';

        $chage_product_id=$product_id;

        if(WC()->session->get('EO_WBC_SETS',FALSE)) {            
            $_session_set=WC()->session->get('EO_WBC_SETS',FALSE);
            if(!($_session_set['FIRST'][0]==$chage_product_id && $_session_set['SECOND'][0]==$chage_product_id)){
                if($_session_set['FIRST'][2]==$chage_product_id){
                    $chage_product_id=$_session_set['FIRST'][0];

                } elseif ($_session_set['SECOND'][2] == $chage_product_id) {
                    $chage_product_id=$_session_set['SECOND'][0];
                }
            }
        }

        if ($order==1) {
            if(self::eo_wbc_breadcrumb_get_category($chage_product_id)==get_option('eo_wbc_first_slug')){

                $url=get_bloginfo('url').get_option('eo_wbc_first_url').
                '?EO_WBC=1&BEGIN='.get_option('eo_wbc_first_slug').
                '&STEP=1'.
                /*'&FIRST='.sanitize_text_field(empty($_GET['FIRST'])?'':$_GET['FIRST']).
                '&SECOND='.sanitize_text_field(empty($_GET['SECOND'])?'':$_GET['SECOND']).*/
                '&EO_CHANGE=1';
            }
            elseif (self::eo_wbc_breadcrumb_get_category($chage_product_id)==get_option('eo_wbc_second_slug')) {

                $url=get_bloginfo('url').get_option('eo_wbc_second_url').
                '?EO_WBC=1&BEGIN='.get_option('eo_wbc_second_slug').
                '&STEP=1'.
                /*'&FIRST='.sanitize_text_field(empty($_GET['FIRST'])?'':$_GET['FIRST']).
                '&SECOND='.sanitize_text_field(empty($_GET['SECOND'])?'':$_GET['SECOND']).*/
                '&EO_CHANGE=1';
            }            
        }
        elseif ($order==2) {
            //Dirty Routing
            $product=NULL;
            //$target=NULL;//determine which parameter to set;
            if(self::eo_wbc_breadcrumb_get_category($chage_product_id)==get_option('eo_wbc_first_slug')){
                //$target='FIRST';
                if(empty($_GET['SECOND'])) return '#';
                $product=new WC_Product($_GET['SECOND']);
            }
            elseif (self::eo_wbc_breadcrumb_get_category($chage_product_id)==get_option('eo_wbc_second_slug')) {
                //$target='SECOND';
                if(empty($_GET['FIRST'])) return '#';
                $product=new WC_Product($_GET['FIRST']);
            }            

            if(empty($product)) return '#';            
            $variable_status=FALSE;//status if product is varaible in nature.
            $cart=NULL;//storage variable for cart data if redirected from 'Add to cart' action.
            
            if($product->is_type( 'variable' ))
            {
                $variable_status=TRUE;
            }

            if(method_exists($product,'get_id')){
                $post_id=$product->get_id();
            } else {
                $post_id=$product->ID;
            } 

            $terms=wp_get_post_terms($post_id,get_taxonomies(),array('fields'=>'ids'));            
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

            $category=array();        
            foreach ($terms as $term)
            {
                global $wpdb;
                $query="select * from `{$wpdb->prefix}eo_wbc_cat_maps` "."where first_cat_id={$term} or second_cat_id={$term}";
                
                $maps=$wpdb->get_results($query,'ARRAY_N');                       
                foreach ($maps as $map){

                    if($map[0]==$term){
                       
                        $category[]=$map[1];
                    }
                    else{
                       
                        $category[]=$map[0];
                    }
                }
            }        
            //remove empty array space and duplicate values
            $category=array_unique(array_filter($category));        
            
            $cat=array();//array to hold category slugs
            $tax=array();//array to hold taxonomy slugs
            foreach ($category as $term_id)
            {
                $term_object=get_term_by('term_taxonomy_id',$term_id,'category');
                if(!empty($term_object)){
                    if($term_object->taxonomy=='product_cat'){
                        $cat[]=$term_object->term_id;
                    }
                    else
                    {
                        $tax[]=$term_object->term_id;                                   
                    }
                }                        
            }
            $link='';

            //if category maping is available then make url filter to category
            //else add default category to the link.
            if(is_array($cat) && count($cat)>0){
                foreach ($cat as $term_id){
                    $link.=get_term_by('term_taxonomy_id',$term_id,'category')->slug.',';    
                }                        
                $link=substr($link,0,-1);//remove ',' at the end of category filter.
            }            
            else
            {
                $link.=(self::eo_wbc_breadcrumb_get_category($product_id)==get_option('eo_wbc_first_slug'))
                            ?
                        get_option('eo_wbc_second_slug')
                            :
                        get_option('eo_wbc_first_slug');
            }
            
            $cat_link=$link;

            $link.="/?";        

            if(is_array($tax) && count($tax)>0){            
                
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

            $url=get_bloginfo('url').'/product-category/'.$link
                        .'EO_WBC=1&BEGIN='.sanitize_text_field($_GET['BEGIN'])
                        .'&STEP=2&FIRST='.( $_GET['BEGIN']==get_option('eo_wbc_first_slug')? sanitize_text_field($_GET['FIRST']):'').'&SECOND='.($_GET['BEGIN']==get_option('eo_wbc_second_slug')?sanitize_text_field($_GET['SECOND']):'').'&EO_CHANGE=1'.'&CAT_LINK='.$cat_link;            
        }
        return $url;
    }

    private static function eo_wbc_breadcrumb_get_category($product_id)
    {        
        $terms = get_the_terms( $product_id, 'product_cat' );
        $term_slug=[];
        foreach ($terms as $term) {
            $term_slug[]=$term->slug;
        }
        if(in_array(get_option('eo_wbc_first_slug'),$term_slug))
        {
            return get_option('eo_wbc_first_slug');
        }
        elseif(in_array(get_option('eo_wbc_second_slug'),$term_slug))
        {
            return get_option('eo_wbc_second_slug');
        }
    } 
}
?>