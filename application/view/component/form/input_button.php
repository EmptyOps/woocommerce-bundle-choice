<?php

/**
*	template to show submit button for the input form.
*/

if(!empty($id) and !empty($label)){
	?>	
<button <?php echo !empty($attr) ? $attr : ''; ?> id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" class="ui button <?php echo !empty($class) ? esc_attr($class) : ''; ?>"><?php echo !empty($label) ? esc_html($label) : ''; ?></button>
	<?php
	if (isset($visible_info))
	{
		wbc()->load->template('component/form/input_visible_info',$visible_info); 
	}	
}
