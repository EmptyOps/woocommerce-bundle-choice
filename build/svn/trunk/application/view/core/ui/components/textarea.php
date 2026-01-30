<?php 
	//Semantic UI : fields
?>

<?php if(!empty($name) and !empty($id)): ?>

<textarea
	name="<?php echo esc_attr($name); ?>" 
	id="<?php echo _e(esc_attr($id)); ?>" 
	placeholder="<?php !empty($placeholder) ? echo esc_attr($placeholder) : ''; ?>" 
	class="<?php !empty($class) ? echo esc_attr($class) : ''; ?>" 
	style="<?php !empty($style) ? echo esc_attr($style) : ''; ?>"
	<?php isset($required) ? 'required="required"' : ''; ?>
></textarea>

<?php endif; ?>
