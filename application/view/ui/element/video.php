<video <?php echo (!empty($class) ? 'class="'.esc_attr($class).'"' : ''); ?> <?php echo (!empty($id) ? 'id="'.esc_attr($id).'"' : ''); ?> <?php echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($src) ? 'src="'.esc_attr($src).'"' : ''); ?> <?php echo (!empty($style) ? 'style="'.esc_attr($style).'"' : ''); ?> >
	<?php
		if (!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
</video>

