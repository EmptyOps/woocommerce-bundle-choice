<?php

/**
*	template to show textbox as input method.
*/

if(!empty($id) and !empty($label)){
	?>	
	<div class="<?php echo !empty($size_class)?$size_class:''; ?> field">
		<?php wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); ?>
		<input type="text" <?php echo !empty($attr)?$attr:''; ?> id="<?php echo $id; ?>" name="<?php echo $id; ?>" class="ui input <?php echo !empty($class)?$class:''; ?>">		
	</div>	
	<?php
}
