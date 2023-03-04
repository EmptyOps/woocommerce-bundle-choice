<ul class="<?php echo (!empty($class) ? $class:''); ?>" <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> >
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child);
		}
	?>
</ul>