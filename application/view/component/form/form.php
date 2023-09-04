<?php 

/*
*	template to generate form as output by taking $form_html as containing parameters.
*/




if(!empty($form_html) and !empty($id) /*and !empty($title)*/){

	if( !empty($title) ){
		?>
			<div class="ui vertical segment"><strong><?php echo esc_attr($title)/*$title*/ ?></strong></div>
		<?php 
	}
	?>
	<div class="ui vertical padded segment">
		<div class="ui form <?php !empty($class) ? esc_attr($class) : ''; ?>">
			<form id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" method="<?php echo empty($method) ? '' : esc_attr($method); ?>" <?php echo !empty($attr) ? $attr : ''; ?>>
				<?php wp_nonce_field(esc_attr($id), '_wpnonce'); ?>
				<input type="hidden" name="action" value="<?php echo 'eowbc_ajax'; ?>">
				<input type="hidden" name="resolver" value="<?php echo esc_attr($id); ?>">
				<?php echo esc_attr($form_html); ?>
			</form>
		</div>
	</div>
	<?php
}
