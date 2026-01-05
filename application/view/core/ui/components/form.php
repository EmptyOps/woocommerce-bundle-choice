<?php 
// Semantic UI : form
?>

<form class="ui form <?php echo (!empty($class) ? esc_attr($class) : ''); ?>" id="<?php echo (!empty($id) ? esc_attr($id) : ''); ?>" name="<?php echo (!empty($name) ? esc_attr($name) : ''); ?>" method="<?php echo (!empty($method) ? esc_attr($method) : ''); ?>" <?php  echo (!empty($style) ? 'style="'.esc_attr($style).'"' : ''); ?>>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>
</form>
