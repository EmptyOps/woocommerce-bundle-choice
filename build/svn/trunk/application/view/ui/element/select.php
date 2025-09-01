<select class="form-control<?php echo (!empty($class) ? ' ' . esc_attr($class) : ''); ?>" <?php echo (!empty($id) ? 'id="' . esc_attr($id) . '"' : ''); ?> <?php echo (!empty($name) ? 'name="' . esc_attr($name) . '"' : ''); ?> <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?> >

	<?php if (!empty($option)) { ?>

		<?php foreach ($option as $option_key => $option_value) {
			?><option value="<?php echo esc_attr($option_key); ?>"><?php echo esc_html($option_value); ?></option><?php
		} 

	} elseif (!empty($child) && !empty($builder)) {

		$builder->build($child, $option_key, $process_form, null, $ui_definition);

	}
	?>
	
</select>
