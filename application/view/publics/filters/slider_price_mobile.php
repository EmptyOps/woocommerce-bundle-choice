<?php

/*
*	Template to show slider price filters for mobile
*/

?>
	<div class="title">
<<<<<<< HEAD
	<i class="dropdown icon"></i>
	Price
	<?php if($reset): ?>
	&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')">&nbsp;<u><?php esc_html(spext_lang("reset", 'woo-bundle-choice')); ?></u></span>
	<?php endif; ?>
</div>
<div class="content">
	<div class="ui tiny form">
		<div class="two fields">
			<div class="field" style="width: fit-content !important;">
				<input value="<?php echo esc_attr($prefix.$min.$postfix); ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php esc_attr_e($seprator); ?>">
			</div>
			<div class="field" style="position: absolute;right: 0px;width: fit-content !important;">
				<input value="<?php echo esc_attr($prefix.$max.$postfix); ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php esc_attr_e($seprator); ?>">
			</div>
		</div>
=======
	    <i class="dropdown icon"></i>		    
	    <?php echo wbc()->options->get_option('appearance_filters','appearance_filters_price_filter_title_text','Price',false,true);?>		    
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo $min; ?>','<?php echo $max; ?>')">&nbsp;<u><?php echo spext_lang("reset", 'woo-bundle-choice'); ?></u></span>
		<?php endif; ?>
>>>>>>> fa937341496810dc75fcd52217f7643fee9907d2
	</div>
	<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo esc_attr($min); ?>" data-max="<?php echo esc_attr($max); ?>" data-slug="price" data-sep="<?php esc_attr_e($seprator); ?>" data-reset="reset_price(new Event('click'),'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')" data-prefix="<?php esc_attr_e($prefix); ?>" data-postfix="<?php esc_attr_e($postfix); ?>"></div>
</div>
		
	
