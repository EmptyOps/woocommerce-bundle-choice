<?php

/**
*	template to show submit button for the input form.
*/

if(!empty($id) and !empty($label)){
	?>	
	<div class="<?php echo !empty($size_class) ? esc_attr($size_class) : ''; ?> field">

		<?php wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); ?>
		<?php
		if (isset($info_icon))
		{
			wbc()->load->template('component/form/input_info_icon',$info_icon); 
		}
		
		if(!empty($options) and is_array($options)) {
			foreach ($options as $option_name => $option_link) {
				?>
					<a <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/echo !empty($attr) ? $attr : ''; ?> id="<?php echo esc_attr(sanitize_title($option_name)); ?>" name="<?php echo esc_attr(sanitize_title($option_name)); ?>" class="ui button <?php echo !empty($class) ? esc_attr($class) : ''; ?>" href="<?php echo esc_url($option_link); ?>"><?php echo esc_html($option_name); ?></a>
				<?php
			}
		}
		
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>	
	</div>	
	<?php
}

