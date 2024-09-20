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
		<div class="<?php echo $class; ?>" <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
            
            <label class="form-check-label">
            	<input type="radio" class="form-check-input" <?php echo (!empty($name)?"name='".$name."'":""); ?> value="<?php echo $opt_key; ?>">
            	
            	<span class="Radio-title"><?php echo $opt_value ?></span>	
            </label>
        </div>
	<?php endforeach;?>
<?php else: ?>
	<input type="radio" class="<?php echo (!empty($class) ? 'class="'.$class.'"':''); ?>" <?php echo (!empty($name)?"name='".$name."'":""); ?> value="<?php echo (!empty($value)?$value:''); ?>" <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
<?php endif; ?>
