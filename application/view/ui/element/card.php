<div class="ui card <?php echo !empty($class) ? esc_attr($class) : ''; ?>" id="<?php echo !empty($id) ? esc_attr($id) : ''; ?>" style="<?php echo !empty($style) ? esc_attr($style) : ''; ?>">  
 <?php 
    if (!empty($builder) && !empty($child)) {
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>
</div>
