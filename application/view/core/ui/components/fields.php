<?php 
	//Semantic UI : fields
?>

<div class="fields <?php !empty($class) ? echo esc_attr($class) : ''; ?>" id="<?php !empty($id) ? echo esc_attr($id) : ''; ?>">
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>
</div>