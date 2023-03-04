<video <?php echo (!empty($class) ? 'class="'.$class.'"':''); ?> <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> <?php echo (!empty($src)? 'src="'.$src.'"': ''); ?> >
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child);
		}
	?>
</video>