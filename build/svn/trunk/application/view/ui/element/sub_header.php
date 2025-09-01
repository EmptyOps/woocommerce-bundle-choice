<div class="sub header <?php (!empty($class) ? esc_attr_e($class) : ''); ?>" style="<?php (!empty($style) ? esc_attr_e($style) : ''); ?>">
	<?php (!empty($label) ? esc_html_e($label) : ''); ?>
	<?php 
		if (!empty($builder) && !empty($child)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>	
</div>
