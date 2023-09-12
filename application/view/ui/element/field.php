<?php 
	//Semantic UI : fields
?>

<div class="field <?php (!empty($class) ? esc_attr_e($class) : ''); ?>" id="<?php (!empty($id) ? esc_attr_e($id) : ''); ?>" <?php echo (!empty($style) ? 'style="'.esc_attr($style).'"' : ''); ?>>
	<?php 
		if(!empty($builder) && !empty($child)){
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
</div>
