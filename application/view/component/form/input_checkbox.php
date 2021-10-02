<?php

/**
*	template to show checkbox as input method.
*   for displaying in table etc. layout use where param like where => "in_table" 
*/

if(!empty($id) /*and !empty($label)*/){	

	if( empty($where) ){

		$style_classes = "toggle";	//default style
		if( isset($style) ){
			if( $style == "normal" || $style == "normal_without_parent_div" ) {
				$style_classes = "";	
			}
		}
		else {
			$style = "";
		}

	?>	
		<?php 
		if($style != "normal_without_parent_div") { ?>
			<div class="field">
		<?php 
		}
	
			if(!empty($label))
			{
	    		wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); 
			}
			?>
			
	    	<?php if(!empty($options) and is_array($options)): ?>

	    		<?php 
				if($style != "normal_without_parent_div") { ?>
		    		<div class="<?php !empty($grouped)?_e('grouped'):'inline' ?> fields" style="margin-bottom:0px !important;">
				<?php 
				}
				?>			
	    		<?php foreach ($options as $checkbox_key => $checkbox_value) : ?>
	    			<div class="field">
				    	<div class="ui <?php echo $style_classes;?> checkbox <?php echo !empty($class)?$class:''; ?>">
				        	<input type="checkbox" name="<?php echo (!empty($is_id_as_name) && $is_id_as_name) ? $id : $checkbox_key;?>" id="<?php echo (!empty($is_id_as_name) && $is_id_as_name) ? $id."_".$checkbox_key : $checkbox_key;?>" <?php echo (!empty($value) and ( ( is_array($value) && in_array($checkbox_key,$value) ) || ( !is_array($value) && $checkbox_key==$value ) ) ) ? 'checked="checked"':''; ?> value="<?php echo $checkbox_key; ?>" <?php echo isset($options_attrs[$checkbox_key]) ? sanitize_text_field(implode( ' ', $options_attrs[$checkbox_key] )) : ""; ?>>
				        	<?php 
				        	if( !empty($checkbox_value) ) {?>
				        		<label for="<?php echo (!empty($is_id_as_name) && $is_id_as_name) ? $id."_".$checkbox_key : $checkbox_key; ?>"><?php echo $checkbox_value; ?></label><?php 
				        	}
							?>
				      	</div>
					</div>
				    
				<?php endforeach; ?>

				<?php 
				if($style != "normal_without_parent_div") { ?>
		    		</div>
				<?php 
				}
				?>


			<?php else:  ?>
				<div class="field">
			    	<div class="ui toggle checkbox <?php echo !empty($class)?$class:''; ?>">
			        	<input type="checkbox" name="<?php echo (!empty($id)? $id :'');?>" id="<?php echo (!empty($id)) ? $id:''; ?>" <?php echo (!empty($value)) ? 'checked="checked"':''; ?> value="1">			        	
			      	</div>
				</div>
			<?php endif; ?>

			<?php
			if (isset($visible_info))
			{
				wbc()->load->template('component/form/input_visible_info',$visible_info); 
			}
			?>	
			
		<?php 
		if($style != "normal_without_parent_div") { ?>
    		</div>
		<?php 
		}
		?>

	<?php
	}
	elseif ( $where == "in_table" ) {
		if(!empty($options) and is_array($options)): 
			foreach ($options as $checkbox_key => $checkbox_value) : ?>
				<div class="ui fitted checkbox <?php echo !empty($class)?$class:''; ?>">
				  <input type="checkbox" name="<?php echo $checkbox_key; ?>" id="<?php echo $checkbox_key; ?>" <?php echo (!empty($value) and in_array($checkbox_key,$value)) ? 'checked="checked"':''; ?> <?php echo isset($options_attrs[$checkbox_key]) ? sanitize_text_field(implode( ' ', $options_attrs[$checkbox_key] )) : ""; ?> value="<?php echo $checkbox_key; ?>">
				  <label><?php echo $checkbox_value; ?></label>
				</div>		
			<?php endforeach; ?>
		<?php endif; ?>

	<?php
	}
}
