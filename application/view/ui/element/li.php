<li class="<?php echo (!empty($class) ? esc_html($class)/*$class*/:''); ?>" <?php echo (!empty($id) ? 'id="'.esc_html($id)/*$id*/.'"':''); ?> <?php echo (!empty($attr)? esc_attr($attr)/*$attr*/: ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?> >
	<?php echo isset($preHTML)?esc_html($preHTML)/*$preHTML*/:''; ?>
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
</li>
