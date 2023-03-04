
<?php if(!empty($preHTML)): ?>
<?php echo isset($preHTML)?$preHTML:''; ?>	
<?php endif; ?>
<?php
	if(!empty($child) and !empty($builder)) {
		$builder->build($child);
	}
?>
<?php if(!empty($postHTML)): ?>
<?php echo isset($postHTML)?$postHTML:''; ?>	
<?php endif; ?>