<div class="sub header <?php (!empty($class) ? echo esc_attr($class) : ''); ?>" style="<?php (!empty($style) ? echo esc_attr($style) : ''); ?>">
	<?php (!empty($label) ? echo esc_html($label) : ''); ?>
	<?php 
		if (!empty($builder) && !empty($child)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>	
</div>
