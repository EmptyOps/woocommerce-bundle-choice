<?php
/**
*	template to show label for each input's associations.
*/
if(!empty($id) and !empty($label)){

	if (!isset($info_icon)) {
		?> <label for="<?php echo $id; ?>"><?php echo $label; ?></label> <?php
	}
	else {
		?> 
		<div class="<?php echo !empty($size_class)?$size_class:''; ?> field">
			<label for="<?php echo $id; ?>"><?php echo $label; ?></label>

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