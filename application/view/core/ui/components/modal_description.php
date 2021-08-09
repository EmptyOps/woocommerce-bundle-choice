<div class="description <?php !empty($class)? _e($class) : ''; ?>" <?php !empty($id)? _e('id="'.$id.'"') : ''; ?> style="<?php !empty($style) ? _e($style) : ''; ?>">
  <?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child,$option_key,$process_form);
		}
	?>	
</div>