<?php 
	//Semantic UI : fields
?>

<?php if(!empty($name) and !empty($id)): ?>

<input type="number" 
    name="<?php esc_attr_e($name); ?>" 
    id="<?php echo esc_attr_e($id); ?>"
    class="<?php !empty($class) ? esc_attr_e($class) : ''; ?>" 
    style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>"
    <?php isset($min) ? 'min="'.esc_attr($min).'" ' : ''; ?>
    <?php isset($max) ? 'max="'.esc_attr($max).'" ' : ''; ?>	
    <?php isset($attr) ? _($attr) : ''; ?>	
/>

<?php endif; ?>
