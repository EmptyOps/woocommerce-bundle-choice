<?php 
	//Semantic UI : fields
?>

<?php if(!empty($name) and !empty($id)): ?>

<input type="number" 
    name="<?php echo esc_attr($name); ?>" 
    id="<?php echo esc_attr($id); ?>"
    class="<?php !empty($class) ? echo esc_attr($class) : ''; ?>" 
    style="<?php !empty($style) ? echo esc_attr($style) : ''; ?>"
    <?php isset($min) ? 'min="'.esc_attr($min).'" ' : ''; ?>
    <?php isset($max) ? 'max="'.esc_attr($max).'" ' : ''; ?>	
    <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/isset($attr) ? _($attr) : ''; ?>	
/>

<?php endif; ?>
