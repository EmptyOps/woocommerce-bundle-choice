<?php

/**
*	template to show submit button for the input form.
*/

if(!empty($id) and !empty($label)){
	?>	
	<button <?php echo !empty($attr)?$attr:''; ?> id="<?php echo $id; ?>" name="<?php echo $id; ?>" class="ui button <?php echo !empty($class)?$class:''; ?>"><?php echo !empty($label)?$label:''; ?></button>		
	<?php
}
