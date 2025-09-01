<svg path="<?php echo (!empty($path) ? esc_url($path) : '#'); ?>" <?php echo (!empty($class) ? 'class="' . esc_attr($class) . '"':''); ?> <?php echo (!empty($id) ? 'id="' . esc_attr($id) . '"':''); ?> <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"':''); ?> >
	<?php echo isset($preHTML) ? $preHTML : ''; ?>	
	<?php
		if (!empty($child) && !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
	<?php echo isset($postHTML) ? $postHTML : ''; ?>	
</svg>
