<?php 
	//Semantic UI : fields
?>

<?php if(!empty($name) and !empty($id)): ?>

	<input type="email" 
    name="<?php esc_attr_e($name); ?>" 
    id="<?php echo esc_attr_e($id); ?>" 
    placeholder="<?php !empty($placeholder) ? esc_attr_e($placeholder) : ''; ?>" 
    class="<?php !empty($class) ? esc_attr_e($class) : ''; ?>" 
    style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>"
    <?php isset($required) ? 'required="required"' : ''; ?>
/>

<?php endif; ?>
