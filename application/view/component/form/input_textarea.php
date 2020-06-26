<?php

/**
*	template to show select as input method.
*/

if(!empty($id) /*and !empty($label)*/){
	?>
	<div class="<?php echo !empty($size_class)?$size_class:''; ?> field">
		<?php 
			if( !empty($label) ) {
				wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label));	
			} 
		?>		
		<textarea spellcheck="false"  id="<?php echo $id; ?>" name="<?php echo $id; ?>" class="ui input <?php echo !empty($class)?$class:''; ?>"><?php echo isset($value)?$value:''; ?></textarea>		
		<?php
		if (isset($visible_info)) {
				wbc()->load->template('component/form/input_visible_info',$visible_info); 
			}
		?>
	</div>
	<?php
}


