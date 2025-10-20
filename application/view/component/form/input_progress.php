<?php

/**
*	template to show progress bar for the input form.
*/

if(!empty($id) /*and !empty($label)*/){
	?>	
	<progress id="<?php echo esc_attr($id); ?>" value="0" min="0" max="100" style="width:100%;height:14px;display:none;margin-bottom:5px;"> </progress>
	<?php
}