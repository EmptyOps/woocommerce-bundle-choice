<?php

/*
*	Template to show text slider filters for mobile
*/

?>			
<div class="ui four wide column toggle_sticky_mob_filter <?php echo $advance ? 'advance_filter_mob' : ''; ?>" style="<?php echo $advance ? 'display: none;' : ''; ?>" data-target="#sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>" data-tab-group="<?php esc_attr_e($tab_set); ?>">
    <div class="title"><div class="ui segment"><?php echo esc_html($filter['title']); ?></div></div>
</div>
<div class="bottom_filter_segment hidden ui segment" id="sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>">
    <div class="ui equal width grid">
        <div class="column close_sticky_mob_filter" data-target="#sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>">
            <i class="ui icon times" style="cursor: pointer;"></i>&nbsp; <?php esc_html(spext_lang("Close", 'woo-bundle-choice')); ?>
        </div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column" style="text-align: right;" onclick="reset_slider(event,'<?php echo esc_attr($filter['slug']); ?>','<?php echo esc_attr($filter['min_value']['name']); ?>','<?php echo esc_attr($filter['max_value']['name']); ?>')">
            <i class="ui icon redo" style="cursor: pointer;"></i>&nbsp; <?php esc_html(spext_lang("Reset", 'woo-bundle-choice')); ?>
        </div>
    </div>					
    <br/>
    <div class="ui title">
        <strong><?php echo esc_html($filter['title']); ?></strong><?php if (!empty($help)): ?>&nbsp;<i class="question circle outline icon" data-help="<?php echo esc_attr($help); ?>"></i><?php endif; ?>
    </div><br/>
    <div class="content">	
        <div class="ui tiny form">
            <div class="two fields">
                <div class="field" style="width: max-content !important; width:-moz-max-content !important;">	      
                    <input value="<?php echo esc_attr($filter['min_value']['name'] . $prefix); ?>" type="text" class="text_slider_<?php echo esc_attr($filter['slug']); ?> aligned left" name="text_min_<?php echo esc_attr($filter['slug']); ?>">
                </div>			    
                <div class="field" style="position: absolute;right: 0px;width: max-content !important;width:-moz-max-content !important;">
                    <input value="<?php echo esc_attr($filter['max_value']['name'] . $prefix); ?>" type="text" class="text_slider_<?php echo esc_attr($filter['slug']); ?> aligned right" name="text_max_<?php echo esc_attr($filter['slug']); ?>" data-reset="reset_slider(new Event('click'),'<?php echo esc_attr($filter['slug']); ?>','<?php echo esc_attr($filter['min_value']['name']); ?>','<?php echo esc_attr($filter['max_value']['name']); ?>')">
                </div>
            </div>	  
        </div>	
        <div class="ui range slider text_slider wbc" id="text_slider_<?php echo esc_attr($filter['slug']); ?>" data-min="<?php echo esc_attr($filter['min_value']['name']); ?>" data-max="<?php echo esc_attr($filter['max_value']['name']); ?>" data-slug="<?php echo esc_attr($filter['slug']); ?>" data-sep="<?php echo esc_attr($filter['seprator']); ?>" data-postfix="<?php echo esc_attr($prefix); ?>" data-reset="reset_slider(new Event(''),'<?php echo esc_attr($filter['slug']); ?>','<?php echo esc_attr($filter['min_value']['name']); ?>','<?php echo esc_attr($filter['max_value']['name']); ?>')"></div>			
    </div>
</div>
