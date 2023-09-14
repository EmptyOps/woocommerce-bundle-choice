
<div class="<?php !empty($class)? _e($class) : ''; ?> column" style="<?php !empty($style) ? _e($style) : ''; ?>" <?php  !empty($attr) ? _e($attr) : ''; ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
  <?php 
    if(!empty($builder) and !empty($child)){
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>