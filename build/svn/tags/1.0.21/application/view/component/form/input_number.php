<?php

/**
*	template to show number as input method.
*/

if(!empty($id) /*and !empty($label)*/){
	?>	
	<div class="<?php echo !empty($size_class)?$size_class:''; ?> field">
		<?php 
		if( (!isset($no_label) || !$no_label) && !empty($label) ){
			wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); 
		}
		?>
		<?php
		if (isset($info_icon))
		{
			wbc()->load->template('component/form/input_info_icon',$info_icon); 
		}
		?>	
		<input type="number" <?php echo !empty($attr)?$attr:''; ?> id="<?php echo $id; ?>" name="<?php echo $id; ?>" class="ui input <?php echo !empty($class)?$class:''; ?>" placeholder="<?php echo !empty($placeholder)?$placeholder:''; ?>" value="<?php echo isset($value)?$value:'0'; ?>">	
		<?php
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>	
	</div>	
	<?php
}
