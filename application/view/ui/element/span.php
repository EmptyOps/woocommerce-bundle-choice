<span <?php echo (!empty($class) ? 'class="'.esc_attr($class)/*$class*/.'"':''); ?> <?php echo (!empty($id) ? 'id="'.esc_attr($id)/*$id*/.'"':''); ?> <?php echo (!empty($attr)? esc_attr($attr)/*$attr*/: ''); ?> <?php echo (!empty($name) ? 'name="'.esc_attr($name)/*$name*/.'"':''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
	<?php echo (!empty($preHTML)?esc_html($preHTML)/*$preHTML*/:''); ?>
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
	<?php echo (!empty($postHTML)?esc_html($postHTML)/*$postHTML*/:''); ?>	
</span>
