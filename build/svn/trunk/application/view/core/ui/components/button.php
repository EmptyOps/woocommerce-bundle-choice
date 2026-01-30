<?php 
	//Semantic UI : fields
?>

<div 
	class="ui button <?php !empty($class) ? echo esc_attr($class) : ''; ?>" 
	id="<?php !empty($id) ? echo esc_attr($id) : ''; ?>" 
	name="<?php !empty($name) ? echo esc_attr($name) : ''; ?>"
	style="<?php !empty($style) ? echo esc_attr($style) : ''; ?>"
>
	<?php echo esc_html($label); ?>		
</div>
