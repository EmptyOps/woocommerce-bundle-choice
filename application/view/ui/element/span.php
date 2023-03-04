<span <?php echo (!empty($class) ? 'class="'.$class.'"':''); ?> <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> <?php echo (!empty($name) ? 'name="'.$name.'"':''); ?>>
	<?php echo (!empty($preHTML)?$preHTML:''); ?>
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child);
		}
	?>
	<?php echo (!empty($postHTML)?$postHTML:''); ?>	
</span>