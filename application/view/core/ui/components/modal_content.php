<div class="content <?php echo (!empty($class) ? esc_attr($class) : ''); ?>" <?php echo (!empty($id) ? 'id="' . esc_attr($id) . '"' : ''); ?> style="<?php echo (!empty($style) ? esc_attr($style) : ''); ?>">
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>	
</div>
