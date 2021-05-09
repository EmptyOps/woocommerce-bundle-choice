<?php 
// Semantic UI : form
?>

<form class="ui form <?php !empty($class) ? _e($class) : ''; ?>" id="<?php !empty($id) ? _e($id) : ''; ?>" name="<?php !empty($name) ? _e($name) : ''; ?>" method="<?php !empty($method) ? _e($method) : ''; ?>" <?php !empty($style)? _e('style="'.$style.'"'):''; ?>>
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>
</form>