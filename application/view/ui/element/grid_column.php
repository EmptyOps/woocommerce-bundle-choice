<div class="<?php echo (!empty($class) ? esc_attr($class) : ''); ?> column" style="<?php echo (!empty($style) ? esc_attr($style) : ''); ?>" <?php echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($style) ? 'style="'.esc_attr($style).'"' : ''); ?>>
  <?php 
    if(!empty($builder) && !empty($child)){
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>