<?php

/**
*	template to show checkbox as input method.
*/

if(!empty($id) and !empty($label)){	

	?>	
		<div class="field">
	    	<?php wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); ?>
	    	<?php if(!empty($options) and is_array($options)): ?>
	    		<div class="fields">
	    		<?php foreach ($options as $checkbox_key => $checkbox_value) : ?>
	    			<div class="field">
				    	<div class="ui toggle checkbox <?php echo !empty($class)?$class:''; ?>">
				        	<input type="checkbox" name="<?php echo $checkbox_key; ?>" id="<?php echo $checkbox_key; ?>" <?php echo (!empty($value) and in_array($checkbox_key,$value)) ? 'checked="checked"':''; ?> value="<?php echo $checkbox_key; ?>">
				        	<label for="<?php echo $checkbox_key; ?>"><?php echo $checkbox_value; ?></label>
				      	</div>
				    </div>
				<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>			
	<?php
}
