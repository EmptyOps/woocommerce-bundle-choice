
<?php if(!empty($header)): ?>
<<?php _e($header); ?> class="ui header <?php !empty($class)? _e($class) : ''; ?>" style="<?php !empty($style)?_e($style):''; ?>">
	<?php !empty($label)? _e($label) : ''; ?>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>	
</<?php _e($header); ?>>
<?php endif; ?>