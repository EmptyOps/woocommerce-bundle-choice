<?php if(!empty($header)): ?>
<<?php _e($header); ?> class="ui header <?php !empty($class) ? esc_attr_e($class) : ''; ?>" style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>">
	<?php !empty($label) ? esc_html_e($label) : ''; ?>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>	
</<?php _e($header); ?>>
<?php endif; ?>
