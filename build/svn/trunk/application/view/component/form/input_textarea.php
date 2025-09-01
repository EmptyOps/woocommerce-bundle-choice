<?php

/**
*	template to show select as input method.
*/

if(!empty($id) /*and !empty($label)*/){
	?>
	<div class="<?php echo esc_attr(!empty($size_class)?$size_class:''); ?> field">
		<?php 
			if( !empty($label) ) {
				wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label));	
			} 
		?>		
		<textarea spellcheck="false"  id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" class="ui input <?php echo esc_attr(!empty($class)?$class:''); ?>" placeholder="<?php echo esc_attr($placeholder); ?>" ><?php echo isset($value)?esc_textarea($value):''; ?></textarea>
		<?php
		if (isset($visible_info)) {
				wbc()->load->template('component/form/input_visible_info',$visible_info); 
			}
		?>
	</div>
	<?php
}


