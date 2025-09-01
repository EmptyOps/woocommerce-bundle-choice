<?php
/**
*	template to show small visible info text 
*/
if(!empty($text)){
	?> <i class="exclamation circle icon" data-content="<?php echo !empty($text)?$text:''; ?>" data-variation="very wide"></i> <?php
}