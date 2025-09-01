<?php if(isset($_GET['FIRST']) and isset($_GET['SECOND'])) { ?>

<!-- Widget start Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
<div class="ui container unstackable steps" style="direction: ltr;width: 100% !important; min-width: unset; max-width: unset; margin: auto; margin-bottom: 1em;">
    <?php 
    if(!empty(wbc()->options->get_option('appearance_breadcrumb','appearance_breadcrumb_fixed_navigation'))) {
         if(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->sanitize->get('BEGIN')==$breadcrumb_ui::$first_slug){                    
            $breadcrumb_ui::eo_wbc_breadcumb_first_html_mobile($step,1).$breadcrumb_ui::eo_wbc_breadcumb_second_html_mobile($step,2);
        } elseif(!empty(wbc()->sanitize->get('BEGIN')) and wbc()->sanitize->get('BEGIN')==$breadcrumb_ui::$second_slug) {
            $breadcrumb_ui::eo_wbc_breadcumb_first_html_mobile($step,2).$breadcrumb_ui::eo_wbc_breadcumb_second_html_mobile($step,1);
        }

    }  else {
        if($begin==$breadcrumb_ui::$first_slug/*get_option('eo_wbc_first_slug')*/) {

        $breadcrumb_ui::eo_wbc_breadcumb_first_html_mobile($step,1).$breadcrumb_ui::eo_wbc_breadcumb_second_html_mobile($step,2);

        } elseif ($begin==$breadcrumb_ui::$second_slug/*get_option('eo_wbc_second_slug')*/)  {

        $breadcrumb_ui::eo_wbc_breadcumb_second_html_mobile($step,1).$breadcrumb_ui::eo_wbc_breadcumb_first_html_mobile($step,2);
        }
    }
    ?>          
    <div 
        data-href="<?php echo (  (empty(wbc()->sanitize->get('EO_CHANGE')) XOR empty(wbc()->sanitize->get('EO_VIEW'))) &&  !empty( wbc()->sanitize->get('FIRST')) && !empty(wbc()->sanitize->get('SECOND')) ? get_bloginfo('url').'/index.php'.wbc()->options->get_option('configuration','review_page')
            .'?'.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>wbc()->sanitize->get('SECOND'))):'#' ); ?>" 
        class="<?php echo (($step==3)?'active ':(($step>3)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))); ?> step">
        <div class="content"><?php echo $breadcrumb_ui::$preview_name/*get_option('eo_wbc_collection_title','Preview')*/; ?></div>
    </div>
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

<?php } ?>