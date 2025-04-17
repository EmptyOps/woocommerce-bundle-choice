<?php

/**
*	template to show submit button for the input form.
*/

if(!empty($attr) and is_string($attr) and strpos($attr,'href')!==false and !empty($id)) {
	?>
	<a <?php echo /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/!empty($attr) ? $attr : ''; ?> id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" class="ui <?php echo !empty($class) ? esc_attr($class) : ''; ?>"><?php echo !empty($label) ? esc_html($label) : ''; ?></a>

	<?php

} elseif(!empty($id) and !empty($label)){

	?>	
	<div class="<?php echo !empty($size_class) ? esc_attr($size_class) : ''; ?> field">
		<?php 
		if ((!isset($no_label) || !$no_label) && !empty($label)) {
			wbc()->load->template('component/form/input_label', array('id' => $id, 'label' => $label));
		}
		?>
		<?php
		if (isset($info_icon)) {
			wbc()->load->template('component/form/input_info_icon', $info_icon);
		}
		?>	
		<input type="text" <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/echo !empty($attr) ? $attr : ''; ?> id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" class="ui input <?php echo !empty($class) ? esc_attr($class) : ''; ?>" placeholder="<?php echo !empty($placeholder) ? esc_attr($placeholder) : ''; ?>" value="<?php echo isset($value) ? esc_attr($value) : ''; ?>">	
		<?php
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>

		<?php
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>

	</div>	

	<!-- <a <?php //echo !empty($attr)?$attr:''; ?> id="<?php //echo $id; ?>" name="<?php //echo $id; ?>" class="ui <?php //echo !empty($class)?$class:''; ?>"><?php //echo !empty($label)?$label:''; ?></a> -->		
	<?php
}
