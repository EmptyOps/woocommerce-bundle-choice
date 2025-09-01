<?php 
	//Semantic UI : fields
?>

<?php if(!empty($name) and !empty($id)): ?>

<input type="text" 
	name="<?php _e($name); ?>" 
	id="<?php echo _e($id); ?>" 
	placeholder="<?php !empty($placeholder) ? _e($placeholder) : '' ; ?>" 
	class="<?php !empty($class) ? _e($class) : ''; ?>" 
	style="<?php !empty($style) ? _e($style) : ''; ?>"
	<?php isset($required)?'required="required"' : ''; ?>
/>

<?php endif; ?>
