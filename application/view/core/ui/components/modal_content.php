<div class="content <?php !empty($class)? _e($class) : ''; ?>">
	<?php 
		if(!empty($builder) and !empty($child)){
			$builder->build($child);
		}
	?>	
</div>