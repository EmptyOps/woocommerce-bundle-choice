<video <?php echo (!empty($class) ? 'class="'.esc_attr($class)/*$class*/.'"':''); ?> <?php echo (!empty($id) ? 'id="'.esc_attr($id)/*$id*/.'"':''); ?> <?php echo (!empty($attr)? esc_attr($attr)/*$attr*/: ''); ?> <?php echo (!empty($src)? 'src="'.esc_attr($src)/*$src*/.'"': ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?> >
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
</video>
