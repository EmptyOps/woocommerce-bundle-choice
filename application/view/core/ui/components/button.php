<?php 
	//Semantic UI : fields
?>

<div 
	class="ui button <?php !empty($class) ? esc_attr_e($class) : ''; ?>" 
	id="<?php !empty($id) ? esc_attr_e($id) : ''; ?>" 
	name="<?php !empty($name) ? esc_attr_e($name) : ''; ?>"
	style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>"
>
	<?php esc_html_e($label); ?>		
</div>
