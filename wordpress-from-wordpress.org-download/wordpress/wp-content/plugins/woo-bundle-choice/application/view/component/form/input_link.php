<?php

/**
*	template to show submit button for the input form.
*/

if(!empty($id) and !empty($label)){
	?>	
	<a <?php echo !empty($attr)?$attr:''; ?> id="<?php echo $id; ?>" name="<?php echo $id; ?>" class="ui <?php echo !empty($class)?$class:''; ?>"><?php echo !empty($label)?$label:''; ?></a>		
	<?php
}
