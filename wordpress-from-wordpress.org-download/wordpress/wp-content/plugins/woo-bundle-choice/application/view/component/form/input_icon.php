<?php

/**
*
*	Form icon template
*/

if(!empty($id) and !empty($label)){

?>
<div class="<?php echo !empty($size_class)?$size_class:''; ?> field upload_image">
	<?php wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); ?>
	<div class="ui tiny image">
	  <img src="<?php echo empty($value)?wc_placeholder_img_src():wp_get_attachment_url($value); ?>">	  
	</div>
	<input type="hidden" name="<?php echo $id ?>" value="<?php echo $value; ?>">
	<div class="ui button inverted primary"><i class="cloud upload icon"></i>&nbsp; Change</div>
</div>
<?php 
}
?>
