
<svg path="<?php echo (!empty($path) ? esc_attr($path)/*$path*/:'#'); ?>" <?php echo (!empty($class) ? 'class="'.esc_attr($class)/*$class*/.'"':''); ?> <?php echo (!empty($id) ? 'id="'.esc_attr($id)/*$id*/.'"':''); ?> <?php echo (!empty($attr)? esc_attr($attr)/*$attr*/: ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?> >
	<?php echo isset($preHTML)?esc_html($preHTML)/*$preHTML*/:''; ?>	
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
	<?php echo isset($postHTML)?esc_html($postHTML)/*$postHTML*/:''; ?>	
</svg>
