<?php

/**
*	template to show submit button for the input form.
*/

if(!empty($id) and !empty($label)){
	?>	
	<button <?php echo !empty($attr)? esc_attr($attr)/*$attr*/:''; ?> id="<?php echo esc_attr($id)/*$id*/; ?>" name="<?php echo esc_html($id)/*$id*/; ?>" class="ui button <?php echo !empty($class)? esc_attr($class)/*$class*/:''; ?>"><?php echo esc_html(!empty($label)? esc_attr($label)/*$label*/:'')/*!empty($label)?$label:''*/; ?></button>
	<?php
	if (isset($visible_info))
	{
		wbc()->load->template('component/form/input_visible_info',$visible_info); 
	}	
}
