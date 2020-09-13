<?php 

/*
*	template to generate form as output by taking $form_html as containing parameters.
*/




if(!empty($form_html) and !empty($id) /*and !empty($title)*/){

	if( !empty($title) ){
		?>
			<div class="ui vertical segment"><strong><?php echo $title ?></strong></div>
		<?php 
	}
	?>
	<div class="ui vertical padded segment">
		<div class="ui form <?php !empty($class)?$class:''; ?>">
			<form id="<?php echo $id; ?>" name="<?php echo $id; ?>" method="<?php echo empty($method)?'':$method; ?>" <?php echo !empty($attr)?$attr:'';?>>	  			
				<?php wp_nonce_field($id, '_wpnonce'); ?>
				<input type="hidden" name="action" value="<?php echo 'eowbc_ajax'; ?>">
				<input type="hidden" name="resolver" value="<?php echo $id; ?>">
	  			<?php echo $form_html; ?>
  			</form>
		</div>
	</div>
	<?php
}
