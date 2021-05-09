<?php 
	//Semantic UI : fields
?>

<div class="field <?php !empty($class) ? _e($class) : ''; ?>" id="<?php !empty($id) ? _e($id) : ''; ?>">
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>
</div>