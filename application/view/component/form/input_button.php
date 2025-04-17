<?php

/**
*	template to show submit button for the input form.
*/

if(!empty($id) and !empty($label)){
	?>	
<button <?php echo /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/!empty($attr) ? $attr : ''; ?> id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" class="ui button <?php echo !empty($class) ? esc_attr($class) : ''; ?>"><?php echo !empty($label) ? esc_html($label) : ''; ?></button>
	<?php
	if (isset($visible_info))
	{
		wbc()->load->template('component/form/input_visible_info',$visible_info); 
	}	
}
