<?php

/**
*	template to show progress bar for the input form.
*/

if(!empty($id) /*and !empty($label)*/){
	?>	
	<div class="<?php echo !empty($size_class)?$size_class:''; ?> field" <?php echo !empty($attr)?$attr:''; ?>> 
		<?php

		wbc()->load->template('component/form/input_label', array('id'=>$id,'label'=>$label));

		?>
		<div style="display:flex;align-items:center;gap:8px;">
			<progress id="<?php echo esc_attr($id); ?>" value="0" min="0" max="100" style="width:100%;height:45px;"></progress>
			<span id="<?php echo esc_attr($id); ?>_percent" style="font-weight:600;"><?php echo !empty($progress_value)?$progress_value:0; ?>%
			</span>
		</div>
		<?php
		if (isset($visible_info)){

			wbc()->load->template('component/form/input_visible_info', $visible_info);
		}
		?>
	</div>
	<?php
}