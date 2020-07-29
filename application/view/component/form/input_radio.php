<?php

/**
*	template to show select as input method.
*/

if(!empty($id) and !empty($label)){	
	?>	

		<div class="<?php echo !empty($size_class)?$size_class:''; ?> field">
	    	<?php wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); ?>	    	
	    	<?php if(!empty($options) and is_array($options)): ?>
	    		<div class="fields">
	    		<?php foreach ($options as $radio_key => $radio_value) : ?>
				    <div class="field">
				    	<div class="ui radio checkbox <?php echo !empty($class)?$class:''; ?>">
				        	<input type="radio" name="<?php echo $id; ?>" id="<?php echo $radio_key; ?>" <?php echo (!empty($value) and $value==$radio_key) ? 'checked="checked"':''; ?> value="<?php echo $radio_key; ?>"/>
				        	<label for="<?php echo $radio_key; ?>"><?php echo $radio_value; ?></label>
				      	</div>
				    </div>
				<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php
			if (isset($visible_info))
			{
				wbc()->load->template('component/form/input_visible_info',$visible_info); 
			}
			?>	
		</div>			
	<?php
}
