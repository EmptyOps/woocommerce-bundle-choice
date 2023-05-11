<?php
	
	if(!empty($href) and is_array($href) ){
		if(!empty($href['filter'])){
			switch ($href['filter']) {
				case 'woocommerce_loop_product_link':
					global $product;
					$href = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
					break;
				
				default:
					break;
			}
		}
		
	}
?>

<a href="<?php echo (!empty($href) ? $href:'#'); ?>" <?php echo (!empty($class) ? 'class="'.$class.'"':''); ?> <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> >
	<?php echo isset($preHTML)?$preHTML:''; ?>	
	<?php
		if(!empty($child) and !empty($builder)) {
			$builder->build($child, $option_key, $process_form, null, $ui_definition);
		}
	?>
	<?php echo isset($postHTML)?$postHTML:''; ?>	
</a>