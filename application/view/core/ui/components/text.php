<?php 
	//Semantic UI : fields
?>

<?php if(!empty($name) and !empty($id)): ?>

<input type="text" 
	name="<?php echo esc_attr($name); ?>" 
	id="<?php echo esc_attr($id); ?>" 
	placeholder="<?php echo !empty($placeholder) ? esc_attr($placeholder) : ''; ?>" 
	class="<?php echo !empty($class) ? esc_attr($class) : ''; ?>" 
	style="<?php echo !empty($style) ? esc_attr($style) : ''; ?>"
	<?php isset($required)?'required="required"' : ''; ?>

/>

<?php endif; ?>
