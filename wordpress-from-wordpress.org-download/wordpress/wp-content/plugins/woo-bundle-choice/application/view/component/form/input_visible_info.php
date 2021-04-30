<?php
/**
*	template to show small visible info text 
*/
if(!empty($label)){
	?> <span class="ui grey text <?php echo !empty($class)?$class:''; ?> <?php echo !empty($size_class)?$size_class:''; ?>"><?php echo $label; ?></span> <?php
}