<?php 
	//Semantic UI : fields
?>

<div class="fields <?php !empty($class) ? esc_attr_e($class) : ''; ?>" id="<?php !empty($id) ? esc_attr_e($id) : ''; ?>">
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>
</div>