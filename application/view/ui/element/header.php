<?php if(!empty($tag)): ?>
<<?php echo $tag; ?> <?php echo (!empty($class) ? 'class="'.$class.'"':''); ?> <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> <?php echo (!empty($src) ? 'src="'.$src.'"':''); /*addad on 06-07-2022 @hiren and @bhavesh */ ?>>
	<?php echo isset($preHTML)?$preHTML:''; ?>	
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
	<?php echo isset($postHTML)?$postHTML:''; ?>
</<?php echo $tag; ?>>
<?php endif; ?>
