<?php
/**
*	template to show label for each input's associations.
*/
if(!empty($id) and !empty($label)){

	if ( !isset($info_icon) && empty($class) && empty($size_class) ) {
		?> <label for="<?php echo esc_attr($id)/*$id*/; ?>"><?php echo esc_html($label)/*$label*/; ?></label> <?php
	}
	else {
		?> 
		<div class="<?php echo !empty($class)?esc_attr($class)/*$class*/:''; ?> <?php echo !empty($size_class)?esc_attr($size_class)/*$size_class*/:''; ?> field" id="<?php echo esc_attr($id)/*$id*/; ?>_label_div">
			<label for="<?php echo esc_attr($id)/*$id*/; ?>" class="<?php $inline_class ?>"><?php echo esc_html($label)/*$label*/; ?></label>

			<?php
			if (isset($info_icon))
			{
				wbc()->load->template('component/form/input_info_icon',$info_icon); 
			}
			?>	
		</div>	
		<?php
	}

}
