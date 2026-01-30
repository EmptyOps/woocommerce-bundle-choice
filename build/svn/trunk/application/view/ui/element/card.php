<div class="ui card <?php !empty($class) ? echo esc_attr($class) : ''; ?>" id="<?php !empty($id) ? echo esc_attr($id) : ''; ?>" style="<?php !empty($style) ? echo esc_attr($style) : ''; ?>">  
 <?php 
    if (!empty($builder) && !empty($child)) {
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>
</div>
