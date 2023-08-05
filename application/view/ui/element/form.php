<form <?php echo (!empty($class) ? 'class="'.esc_html($class)/*$class*/.'"':''); ?> <?php echo (!empty($id) ? 'id="'.esc_html($id)/*$id*/.'"':''); ?> <?php echo (!empty($attr)? esc_html($attr)/*$attr*/: ''); ?> <?php echo (!empty($name) ? 'name="'.esc_html($name)/*$name*/.'"':''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
</form>
