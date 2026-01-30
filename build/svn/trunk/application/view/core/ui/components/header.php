<?php if(!empty($header)): ?>
<<?php _e($header); ?> class="ui header <?php !empty($class) ? echo esc_attr($class) : ''; ?>" style="<?php !empty($style) ? echo esc_attr($style) : ''; ?>">
	<?php !empty($label) ? esc_html_e($label) : ''; ?>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>	
</<?php _e($header); ?>>
<?php endif; ?>
