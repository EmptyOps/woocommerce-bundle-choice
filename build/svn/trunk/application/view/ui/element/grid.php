<?php 
	//Semantic-UI : gride
?>

<div class="ui grid <?php echo !empty($class) ? esc_attr($class) : '' ; ?>" id="<?php echo !empty($id) ? esc_attr($id) : '' ; ?>" <?php echo (!empty($style) ? 'style="'.esc_attr($style.'"':'')); ?>>
  <?php 
    if(!empty($builder) && !empty($child)){
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>
