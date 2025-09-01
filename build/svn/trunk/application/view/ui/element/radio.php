<?php
if(empty($class)){
	$class='';
}

if(!empty($inline)){
	if(!empty($class)){
		$class.=" form-check-inline";
	} else {
		$class=" form-check-inline";
	}
}

?>

<?php if (!empty($option) && is_array($option)): ?>
	<?php foreach ($option as $opt_key => $opt_value): ?> 
		<div class="<?php echo esc_attr($class); ?>" <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?>>
            
            <label class="form-check-label">
            	<input type="radio" class="form-check-input" <?php echo (!empty($name) ? "name='" . esc_attr($name) . "'" : ''); ?> value="<?php echo esc_attr($opt_key); ?>">
            	
            	<span class="Radio-title"><?php echo esc_html($opt_value); ?></span>	
            </label>
        </div>
	<?php endforeach; ?>
<?php else: ?>
	<input type="radio" class="<?php echo (!empty($class) ? 'class="' . esc_attr($class) . '"' : ''); ?>" <?php echo (!empty($name) ? "name='" . esc_attr($name) . "'" : ''); ?> value="<?php echo (!empty($value) ? esc_attr($value) : ''); ?>" <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?>>
<?php endif; ?>

