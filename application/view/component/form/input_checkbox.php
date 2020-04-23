<?php

/**
*	template to show checkbox as input method.
*   for displaying in table etc. layout use where param like where => "in_table" 
*/

if(!empty($id) /*and !empty($label)*/){	

	if( empty($where) ){

		$style_classes = "toggle";	//default style
		if( !empty($style) && $style == "normal" ){
			$style_classes = "";
		}

	?>	
		<div class="field">
	    	<?php 
			if(!empty($label))
			{
	    		wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); 
			}
			?>
			
	    	<?php if(!empty($options) and is_array($options)): ?>
	    		<div class="fields">
	    		<?php foreach ($options as $checkbox_key => $checkbox_value) : ?>
	    			<div class="field">
				    	<div class="ui <?php echo $style_classes;?> checkbox <?php echo !empty($class)?$class:''; ?>">
				        	<input type="checkbox" name="<?php echo $checkbox_key; ?>" id="<?php echo $checkbox_key; ?>" <?php echo (!empty($value) and in_array($checkbox_key,$value)) ? 'checked="checked"':''; ?>>
				        	<?php 
				        	if( !empty($checkbox_value) ) {?>
				        		<label for="<?php echo $checkbox_key; ?>"><?php echo $checkbox_value; ?></label><?php 
				        	}
							?>
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
	elseif ( $where == "in_table" ) {
		if(!empty($options) and is_array($options)): 
			foreach ($options as $checkbox_key => $checkbox_value) : ?>
				<div class="ui fitted checkbox <?php echo !empty($class)?$class:''; ?>">
				  <input type="checkbox" name="<?php echo $checkbox_key; ?>" id="<?php echo $checkbox_key; ?>" <?php echo (!empty($value) and in_array($checkbox_key,$value)) ? 'checked="checked"':''; ?>>
				  <label><?php echo $checkbox_value; ?></label>
				</div>		
			<?php endforeach; ?>
		<?php endif; ?>

	<?php
	}
}
