<?php 
	//Semantic UI : fields
?>

<div 
	class="ui button <?php !empty($class) ? _e($class) : ''; ?>" 
	id="<?php !empty($id) ? _e($id) : ''; ?>" 
	name="<?php !empty($name) ? _e($name) : '';  ?>"
	style="<?php !empty($style) ? _e($style) : ''; ?>"
>
	<?php _e($label); ?>		
</div>
