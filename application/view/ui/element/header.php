<?php if (!empty($tag)): ?>
<<?php echo esc_html($tag); ?> <?php echo (!empty($class) ? 'class="' . esc_attr($class) . '"' : ''); ?> <?php echo (!empty($id) ? 'id="' . esc_attr($id) . '"' : ''); ?> <?php echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($src) ? 'src="' . esc_url($src) . '"' : ''); /*added on 06-07-2022 @hiren and @bhavesh */ ?> <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?>>
	<?php echo isset($preHTML) ? $preHTML : ''; ?>	
	<?php
		if (!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
	<?php echo isset($postHTML) ? $postHTML  : ''; ?>
</<?php echo esc_html($tag); ?>>
<?php endif; ?>
