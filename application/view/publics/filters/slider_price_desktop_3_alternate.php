<?php

/*
*	Template to show slider price filters for desktop
*/

?>
<div class="<?php echo esc_attr($width_class)/*$width_class*/; ?>">
	<p>
		<span class="ui header">Price</span>				
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo esc_attr($min)/*$min*/; ?>','<?php echo esc_attr($max)/*$max*/; ?>')">&nbsp;<u><?php spext_lang("reset", 'woo-bundle-choice') ?></u></span>
		<?php endif; ?>
	</p>							
	<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo esc_attr($min)/*$min*/; ?>" data-max="<?php echo esc_attr($max)/*$max*/; ?>" data-slug="price" data-sep="<?php _e($seprator); ?>" data-reset="reset_price(new Event('click'),'<?php echo esc_attr($min)/*$min*/; ?>','<?php echo esc_attr($max)/*$max*/; ?>')" data-prefix="<?php _e($prefix); ?>" data-postfix="<?php _e($postfix); ?>"></div>
	<div class="ui tiny form">
	  <div class="three fields" style="-ms-flex-wrap:nowrap !important; flex-wrap:nowrap !important;">
	    <div class="field">	      
	      <input value="<?php echo esc_attr($prefix.$min.$postfix)/*$prefix.$min.$postfix*/; ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php _e($seprator); ?>">
	    </div>
	    <div class="field"></div>
	    <div class="field">	      
	      <input value="<?php echo esc_attr($prefix.$max.$postfix)/*$prefix.$max.$postfix*/; ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php _e($seprator); ?>">
	    </div>
	  </div>	  
	</div>
</div>
