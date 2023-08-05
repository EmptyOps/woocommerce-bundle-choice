<?php

/**
*	template to show select as input method.
*/

if(!empty($id) /*and !empty($label)*/){
	?>
	<div class="<?php echo !empty($size_class)?esc_attr($size_class)/*$size_class*/:''; ?> field">
		<?php 
			if( !empty($label) ) {
				wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label));	
			} 
		?>		
		<textarea spellcheck="false"  id="<?php echo esc_attr($id)/*$id*/; ?>" name="<?php echo esc_attr($id)/*$id*/; ?>" class="ui input <?php echo !empty($class)?esc_attr($class)/*$class*/:''; ?>" placeholder="<?php echo esc_html($placeholder)/*$placeholder*/; ?>" ><?php echo isset($value)?esc_attr($value)/*$value*/:''; ?></textarea>		
		<?php
		if (isset($visible_info)) {
				wbc()->load->template('component/form/input_visible_info',$visible_info); 
			}
		?>
	</div>
	<?php
}


