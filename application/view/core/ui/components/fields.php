<?php 
	//Semantic UI : fields
?>

<div class="fields <?php echo !empty($class) ? esc_attr($class) : ''; ?>" id="<?php echo !empty($id) ? esc_attr($id) : ''; ?>">
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>
</div>