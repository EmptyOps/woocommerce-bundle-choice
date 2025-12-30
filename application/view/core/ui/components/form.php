<?php 
// Semantic UI : form
?>

<form class="ui form <?php !empty($class) ? echo esc_attr($class) : ''; ?>" id="<?php !empty($id) ? echo esc_attr($id) : ''; ?>" name="<?php !empty($name) ? echo esc_attr($name) : ''; ?>" method="<?php !empty($method) ? echo esc_attr($method) : ''; ?>" <?php  !empty($style) ? 'style="'.echo esc_attr($style).'"' : ''; ?>>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>
</form>