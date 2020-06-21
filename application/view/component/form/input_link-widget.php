<?php

/**
*	template to show submit button for the input form.
*/

if(!empty($id) and !empty($label)){
	?>	
	<div class="<?php echo !empty($size_class)?$size_class:''; ?> field">
		<?php wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); ?>
		<?php
		if (isset($info_icon))
		{
			wbc()->load->template('component/form/input_info_icon',$info_icon); 
		}
		
		if(!empty($options) and is_array($options)) {
			foreach ($options as $option_name => $option_link) {
				?>
					<a <?php echo !empty($attr)?$attr:''; ?> id="<?php echo sanitize_title($option_name); ?>" name="<?php echo sanitize_title($option_name); ?>" class="ui button <?php echo !empty($class)?$class:''; ?>" href="<?php echo $option_link; ?>" ><?php echo $option_name; ?></a>
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

