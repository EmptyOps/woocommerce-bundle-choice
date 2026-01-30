<?php
/**
*	A devider in form works as seperator in form.
*/
if (!empty($label)) { ?>
	<h4 class="ui dividing header <?php echo !empty($class) ? esc_attr($class) : ''; ?>"><?php echo esc_html($label); ?></h4>
<?php } ?>
