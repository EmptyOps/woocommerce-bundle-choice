<?php

/*
*	Template to show breadcrumb final step for desktop
*/

?>
<div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">

    <div class="column eowbc_breadcrumb_font"> <?php spext_lang("3", 'woo-bundle-choice') ?> </div>
    <div class="column" style="text-align: left;">
        <div class="description eowbc_breadcrumb_font"> <?php spext_lang("Complete", 'woo-bundle-choice') ?> </div>
        <div class="title eowbc_breadcrumb_font"><?php echo esc_html($preview_name)/*$preview_name*/; ?></div>
        <div>&nbsp;</div>
    </div>                                                                     
    <div class="column " style="<?php echo empty($preview_icon)?'visibility: hidden;':''; ?>"><img src="<?php echo esc_html($preview_icon)/*$preview_icon*/; ?>" class="ui mini image" style="margin: auto auto;"/></div>                            
</div>
