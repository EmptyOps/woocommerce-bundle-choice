<?php 
	//Semantic UI : fields
?>

<div class="field <?php !empty($class) ? _e($class) : ''; ?>" id="<?php !empty($id) ? _e($id) : ''; ?>" <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
</div>