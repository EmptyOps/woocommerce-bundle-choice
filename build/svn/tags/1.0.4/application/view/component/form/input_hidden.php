<?php

/**
*	template to show hidden as input method.
*/

if(!empty($id) ){
	?>	
		<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="<?php echo !empty($value)?$value:''; ?>">	
	<?php
}
