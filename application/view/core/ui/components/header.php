<?php if(!empty($header)): ?>
<<?php _e($header); ?> class="ui header <?php echo !empty($class) ? esc_attr($class) : ''; ?>" style="<?php echo !empty($style) ? esc_attr($style) : ''; ?>">
	<?php echo !empty($label) ? esc_html($label) : ''; ?>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>	
</<?php _e($header); ?>>
<?php endif; ?>
