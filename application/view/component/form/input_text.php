<?php

/**
*	template to show textbox as input method.
*/

if(!empty($id) /*and !empty($label)*/){
	?>	
	<div class="<?php echo esc_attr(!empty($size_class)?$size_class:''); ?> field">
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
		<input type="text" <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/echo !empty($attr)?$attr:''; ?> id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" class="ui input <?php echo esc_attr(!empty($class)?$class:''); ?>" placeholder="<?php echo esc_attr(!empty($placeholder)?$placeholder:''); ?>" value="<?php echo isset($value)?esc_attr($value):''; ?>">	
		<?php
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>	
	</div>	
	<?php
}
