<div class="title" data-tab-group="<?php echo esc_attr($tab_set); ?>">
    <i class="dropdown icon"></i>
    <?php echo esc_html($term->name); ?>
</div>
<div class="content">
    <div class="ui toggle button" id="togle_column_<?php echo esc_attr($term->slug); ?>" data-toggle_column="<?php echo esc_attr($term->slug); ?>" style="text-align: center; vertical-align: center; width: 100%; margin: auto;"><?php esc_html(spext_lang("Add Column", 'woo-bundle-choice')); ?></div>
</div>
