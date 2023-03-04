<footer <?php echo (!empty($class) ? 'class="'.$class.'"':''); ?> <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> >
	<?php echo isset($preHTML)?$preHTML:''; ?>
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child);
		}
	?>
</footer>
