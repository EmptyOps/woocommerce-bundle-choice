<?php

/*
*   Template to show breadcrumb final step for desktop
*/

?>
<div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">
        <div class="ui grid">
            <div class="column">3</div>
            <div class="column" style="text-align: left;">
                <div class="description">Complete</div>
                <div class="title"><?php _e($preview_name); ?></div>
            </div>             
        </div>               
        <div class="column ">
            <div class="title" style="text-align: center;">
            <?php 
                if(!empty($first) and !empty($second)){
                    $first_price = $first->get_price() * ( !empty($set['FIRST'][1]) ? $set['FIRST'][1]:$tmp_set['FIRST'][1] );

                $second_price = $second->get_price() * ( !empty($set['SECOND'][1]) ? $set['SECOND'][1]:$tmp_set['SECOND'][1] );

                    _e(wc_price($first_price + $second_price));                
            }
        ?>
        </div>
    </div>
    <div class="column" <?php echo empty(wp_get_attachment_url(wbc()->options->get_option('configuration','preview_icon')/*get_option('eo_wbc_collection_icon')*/))?'style="visibility: hidden;"':""; ?>><img src="<?php echo $preview_icon/*get_option('eo_wbc_collection_icon')*/; ?>" class="ui mini image" style="<?php echo empty($preview_icon)?'visibility: hidden;':''; ?>"/></div>                            
</div>                        