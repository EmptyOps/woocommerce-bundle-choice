<div class="content <?php !empty($class) ? esc_attr_e($class) : ''; ?>" <?php !empty($id) ? esc_attr_e('id="' . $id . '"') : ''; ?> style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>">
	<?php 
		if (!empty($builder) and !empty($child)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>	
</div>
