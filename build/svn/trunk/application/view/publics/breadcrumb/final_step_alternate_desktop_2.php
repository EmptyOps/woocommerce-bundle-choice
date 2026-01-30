<?php

/*
*	Template to show breadcrumb first step for desktop
*/

?>
<div class="ui equal width middle aligned grid" style="width: 100%;padding-top: 0px;text-transform:none;font-family: 'ZapfHumanist601BT-Roman';">        

    <div class="ui column left aligned eowbc_breadcrumb_font"> <?php /*spext_lang*/esc_html_e("3", 'woo-bundle-choice') ?> </div>
    <div class="ui column left aligned">
        <div class="title eowbc_breadcrumb_font"> <?php esc_html(spext_lang("Complete", 'woo-bundle-choice')); ?> <?php echo esc_html($preview_name); ?></div>
    </div>
    <div class="ui column mini image left aligned" style="padding-top: 0px;padding-bottom: 0px;<?php echo empty($preview_icon)?'visibility: hidden;':''; ?>">
        <img src='<?php echo esc_url($preview_icon); ?>' class='ui mini image'/>
    </div>
</div>