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

<?php if(!empty($option) and is_array($option)): ?>
	<?php foreach ($option as $opt_key => $opt_value): ?> 
		<div class="<?php echo esc_attr($class)/*$class*/; ?>" <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
            
            <label class="form-check-label">
            	<input type="checkbox" class="form-check-input" <?php echo (!empty($name)?"name='".esc_attr($name)/*$name*/."'":""); ?> value="<?php echo esc_attr($opt_key)/*$opt_key*/; ?>">
            	
            	<span class="Radio-title"><?php echo esc_attr($opt_value)/*$opt_value*/ ?></span>	
            </label>
        </div>
	<?php endforeach;?>
<?php else: ?>
	<input type="checkbox" class="<?php echo (!empty($class) ? esc_attr($class)/*$class*/ :''); ?>" <?php echo (!empty($name)?"name='".esc_attr($name)/*$name*/."'":""); ?> value="<?php echo (!empty($value)?esc_attr($value)/*$value*/:''); ?>">
<?php endif; ?>
