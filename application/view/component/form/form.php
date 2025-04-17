<?php 

/*
*	template to generate form as output by taking $form_html as containing parameters.
*/




if(!empty($form_html) and !empty($id) /*and !empty($title)*/){

	if( !empty($title) ){
		?>
			<div class="ui vertical segment"><strong><?php echo esc_html($title)/*$title*/ ?></strong></div>
		<?php 
	}
	?>
	<div class="ui vertical padded segment">
		<div class="ui form <?php !empty($class) ? esc_attr($class) : ''; ?>">
			<form id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" method="<?php echo empty($method) ? '' : esc_attr($method); ?>" <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/echo !empty($attr) ? $attr : ''; ?>>
				<?php wp_nonce_field($id, '_wpnonce'); ?>
				<input type="hidden" name="action" value="<?php echo 'eowbc_ajax'; ?>">
				<input type="hidden" name="resolver" value="<?php echo esc_attr($id); ?>">
				<?php echo $form_html; ?>
			</form>
		</div>
	</div>
	<?php
}
