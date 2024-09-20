<?php

/**
*	template to show textbox as input method.
*/

if(!empty($id) /*and !empty($label)*/){
	?>	
	<div class="<?php echo !empty($size_class)?$size_class:''; ?> field">
		<?php 
		if( (!isset($no_label) || !$no_label) && !empty($label) ){
			wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label,'label_class'=>$label_class)); 
		}
		?>
		<?php
		if (isset($info_icon))
		{
			wbc()->load->template('component/form/input_info_icon',$info_icon); 
		}

		if(!empty($left_labeled) || !empty($right_labeled)) {
		?>	
			<div class="ui right labeled input">
				
				<?php 
				if(!empty($left_labeled)){ 
				?>
				  	<label for="<?php echo $id; ?>" class="ui label <?php echo !empty($left_labeled_class)?$left_labeled_class:''; ?>"> <?php echo $left_labeled ?> </label>
				<?php 	
				} 
		}
		?>	  	
				<input type="text" <?php echo !empty($attr)?$attr:''; ?> id="<?php echo $id; ?>" name="<?php echo $id; ?>" class="ui input <?php echo !empty($class)?$class:''; ?>" placeholder="<?php echo !empty($placeholder)?$placeholder:''; ?>" value="<?php echo isset($value)?$value:''; ?>" <?php echo $is_disabled ? 'disabled' : '' ; ?> >
		<?php
		if(!empty($left_labeled) || !empty($right_labeled)) {		
		?>	
			  	<?php if(!empty($right_labeled)){ ?>
				  	<label class="ui basic label <?php echo !empty($right_labeled_class)?$right_labeled_class:''; ?>"> <?php echo $right_labeled ?> </label>
				<?php } ?>
			
			</div>

		<?php
		}

		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>	
	</div>	
	<?php
}
