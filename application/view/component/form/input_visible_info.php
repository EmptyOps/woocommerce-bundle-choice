<?php
/**
*	template to show small visible info text 
*/
if(!empty($label)){
	?> <span class="ui grey text <?php echo esc_attr(!empty($class)?$class:''); ?> <?php echo esc_attr(!empty($size_class)?$size_class:''); ?>"><?php echo esc_html($label); ?></span><?php
}
