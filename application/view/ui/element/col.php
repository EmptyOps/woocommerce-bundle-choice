<div class="<?php echo (!empty($class) ? esc_attr($class) : ''); ?>" <?php echo (!empty($id) ? 'id="' . esc_attr($id) . '"' : ''); ?> <?php echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?> >
    <?php
    if (!empty($child) && !empty($builder)) {
        $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
    ?>
</div>

