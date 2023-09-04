<div class="<?php !empty($class) ? esc_attr_e($class) : ''; ?> column" style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>" <?php !empty($attr) ? esc_attr_e($attr) : ''; ?>>
  <?php 
    if(!empty($builder) and !empty($child)){
      $builder->build($child,$option_key,$process_form);
    }
  ?>  
</div>