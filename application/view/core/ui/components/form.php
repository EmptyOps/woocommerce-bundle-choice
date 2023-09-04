<?php 
// Semantic UI : form
?>

<form class="ui form <?php !empty($class) ? esc_attr_e($class) : ''; ?>" id="<?php !empty($id) ? esc_attr_e($id) : ''; ?>" name="<?php !empty($name) ? esc_attr_e($name) : ''; ?>" method="<?php !empty($method) ? esc_attr_e($method) : ''; ?>" <?php  !empty($style) ? 'style="'.esc_attr_e($style).'"' : ''; ?>>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>
</form>