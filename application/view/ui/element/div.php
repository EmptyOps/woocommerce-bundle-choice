<div <?php echo (!empty($class) ? 'class="'.esc_attr($class)/*$class*/.'"':''); ?> <?php echo (!empty($id) ? 'id="'.esc_attr($id)/*$id*/.'"':''); ?>  <?php echo (!empty($attr)? esc_attr($attr)/*$attr*/: ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?> >
	<?php echo isset($preHTML)?esc_attr($preHTML)/*$preHTML*/:''; ?>	
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
	<?php echo isset($postHTML)?esc_attr($postHTML)/*$postHTML*/:''; ?>	
</div>
