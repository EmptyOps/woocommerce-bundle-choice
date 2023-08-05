<?php
/**
*	template to show small visible info text 
*/
if(!empty($label)){
	?> <span class="ui grey text <?php echo !empty($class)?esc_attr($class)/*$class*/:''; ?> <?php echo !empty($size_class)?esc_attr($size_class)/*$size_class*/:''; ?>"><?php echo esc_html($label)/*$label*/; ?></span> <?php
}
