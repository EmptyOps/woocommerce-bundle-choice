<?php
/**
*	template to show label for each input's associations.
*/
if(!empty($id) and !empty($label)){
	?> <label for="<?php echo $id; ?>"><?php echo $label; ?></label> <?php
}