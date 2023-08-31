<select class="form-control<?php echo (!empty($class) ? ' ' . esc_attr($class) : ''); ?>" <?php echo (!empty($id) ? 'id="' . esc_attr($id) . '"' : ''); ?> <?php echo (!empty($name) ? 'name="' . esc_attr($name) . '"' : ''); ?> <?php echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?> >

	<?php if (!empty($option)) { ?>

		<?php foreach ($option as $option_key => $option_value) {
			?><option value="<?php echo esc_attr($option_key); ?>"><?php echo esc_html($option_value); ?></option><?php
		} 

	} elseif (!empty($child) && !empty($builder)) {

		$builder->build($child, $option_key, $process_form, null, $ui_definition);

	}
	?>
	
</select>
