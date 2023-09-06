<?php 
	//Semantic-UI : gride
?>

<div class="ui grid <?php (!empty($class) ? esc_attr_e($class) : ''); ?>" id="<?php (!empty($id) ? esc_attr_e($id) : ''); ?>" style="<?php echo (!empty($style) ? esc_attr($style) : ''); ?>">
  <?php 
    if(!empty($builder) && !empty($child)){
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>
