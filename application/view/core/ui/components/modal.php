<div class="ui modal <?php !empty($class) ? esc_attr_e($class) : ''; ?>" <?php !empty($id) ? 'id="' . esc_attr_e($id) . '"' : ''; ?> style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>">

  <?php 
    if(!empty($builder) and !empty($child)){
      $builder->build($child,$option_key,$process_form);
    }
  ?>  
</div>
