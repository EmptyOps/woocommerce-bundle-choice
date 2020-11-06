<div data-href="<?php echo (  (empty(wbc()->sanitize->get('EO_CHANGE')) XOR empty(wbc()->sanitize->get('EO_VIEW'))) &&  !empty( wbc()->sanitize->get('FIRST')) && !empty(wbc()->sanitize->get('SECOND')) ? get_bloginfo('url').'/index.php'.wbc()->options->get_option('configuration','review_page')
        .'?'.wbc()->common->http_query(array('EO_WBC'=>1,'BEGIN'=>wbc()->sanitize->get('BEGIN'),'STEP'=>3,'FIRST'=>wbc()->sanitize->get('FIRST'),'SECOND'=>wbc()->sanitize->get('SECOND'))):'#' ); ?>" 
    class="<?php echo (($step==3)?'active ':(($step>3)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':'disabled'))); ?> step">
    <div class="content"><?php echo $preview_name; ?></div>
</div>