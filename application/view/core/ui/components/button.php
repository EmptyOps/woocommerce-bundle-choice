<?php 
	//Semantic UI : fields
?>

<div 
	class="ui button <?php echo !empty($class) ? esc_attr($class) : ''; ?>" 
	id="<?php echo !empty($id) ? esc_attr($id) : ''; ?>" 
	name="<?php echo !empty($name) ? esc_attr($name) : ''; ?>"
	style="<?php echo !empty($style) ? esc_attr($style) : ''; ?>"
>
	<?php echo esc_html($label); ?>		
</div>
