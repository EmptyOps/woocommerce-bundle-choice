<?php

/**
*	template to show hidden as input method.
*/

if(!empty($id) ){
	?>	
		<input type="hidden" id="<?php echo esc_attr($id)/*$id*/; ?>" name="<?php echo esc_attr($id)/*$id*/; ?>" value="<?php echo !empty($value)?esc_attr($value)/*$value*/:''; ?>">	
	<?php
}
