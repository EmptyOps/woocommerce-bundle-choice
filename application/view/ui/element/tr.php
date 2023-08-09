<tr <?php echo (!empty($class) ? 'class="'.$class.'"':''); ?> <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?>  <?php echo (!empty($attr)? $attr: ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?> >
	<?php echo isset($preHTML)?$preHTML:''; ?>	
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
	<?php echo isset($postHTML)?$postHTML:''; ?>	
</tr>
