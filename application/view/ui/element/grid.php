<?php 
	//Semantic-UI : gride
?>

<div class="ui grid <?php !empty($class)? _e($class) : ''; ?>" id="<?php !empty($id)?_e($id):''; ?>" style="<?php !empty($style)?_e($style):''; ?>" <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
  <?php 
    if(!empty($builder) and !empty($child)){
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>