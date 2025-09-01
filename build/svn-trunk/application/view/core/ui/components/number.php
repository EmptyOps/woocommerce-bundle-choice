<?php 
	//Semantic UI : fields
?>

<?php if(!empty($name) and !empty($id)): ?>

<input type="number" 
	name="<?php _e($name); ?>" 
	id="<?php echo _e($id); ?>"
	class="<?php !empty($class) ? _e($class) : ''; ?>" 
	style="<?php !empty($style) ? _e($style) : ''; ?>"
	<?php isset($min)?' min="'.$min.'" ' : ''; ?>
	<?php isset($max)?' max="'.$max.'" ' : ''; ?>	
	<?php isset($attr)?_($attr) : ''; ?>	
/>

<?php endif; ?>
