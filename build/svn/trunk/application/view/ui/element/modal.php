<div class="ui modal <?php echo !empty($class) ? esc_attr($class) : ''; ?>" <?php echo !empty($id) ? esc_attr('id="' . $id . '"') : ''; ?> style="<?php echo !empty($style) ? esc_attr($style) : ''; ?>">
  <?php 
    if (!empty($builder) and !empty($child)) {
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>
