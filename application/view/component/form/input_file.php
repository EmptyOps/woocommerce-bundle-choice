<?php

/**
*	template to show file as input method.
*/

if(!empty($id) /*and !empty($label)*/){
	?>	
	<div class="<?php echo !empty($size_class)?esc_attr($size_class)/*$size_class*/:''; ?> field">
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
		<input type="file" <?php echo !empty($attr)?esc_attr($attr)/*$attr*/:''; ?> id="<?php echo esc_attr($id)/*$id*/; ?>" name="<?php echo esc_attr($id)/*$id*/; ?>" class="ui input <?php echo !empty($class)?esc_attr($class)/*$class*/:''; ?>">	
		<?php
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>	
	</div>	
	<?php
}
