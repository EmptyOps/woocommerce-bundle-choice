<div class="<?php echo esc_attr($width_class); ?>" data-tab-group="<?php esc_attr_e($tab_set); ?>">
    <p>
        <span class="ui header"><?php echo esc_html($term->name); ?></span>
    </p>
    <div class="ui toggle button" id="togle_column_<?php echo esc_attr($term->slug); ?>" data-toggle_column="<?php echo esc_attr($term->slug); ?>" style="text-align: center; vertical-align: center; width: 100%; margin: auto;"><?php esc_html(spext_lang("Add Column", 'woo-bundle-choice')); ?></div>
</div>
