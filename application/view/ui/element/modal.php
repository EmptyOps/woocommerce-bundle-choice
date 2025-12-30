<div class="ui modal <?php !empty($class) ? echo esc_attr($class) : ''; ?>" <?php !empty($id) ? echo esc_attr('id="' . $id . '"') : ''; ?> style="<?php !empty($style) ? echo esc_attr($style) : ''; ?>">
  <?php 
    if (!empty($builder) and !empty($child)) {
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>
