<div class="<?php (!empty($class) ? esc_attr_e($class) : ''); ?> column" style="<?php (!empty($style) ? esc_attr_e($style) : ''); ?>" <?php (!empty($attr) ? _e($attr) : ''); ?> <?php echo (!empty($style) ? 'style="'.esc_attr($style).'"' : ''); ?>>
  <?php 
    if(!empty($builder) && !empty($child)){
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>