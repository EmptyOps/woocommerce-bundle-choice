<?php

/*
*	Template to show slider price filters for desktop
*/

?>
<div class="<?php echo $width_class; ?>">
	<p>
		<span class="ui header">Price</span>				
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo $min; ?>','<?php echo $max; ?>')">&nbsp;<u>reset</u></span>
		<?php endif; ?>
	</p>			
	<div class="ui tiny form">
	  <div class="three fields">
	    <div class="field">	      
	      <input value="<?php echo $prefix.$min.$postfix; ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php _e($seprator); ?>">
	    </div>
	    <div class="field"></div>
	    <div class="field">	      
	      <input value="<?php echo $prefix.$max.$postfix; ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php _e($seprator); ?>">
	    </div>
	  </div>	  
	</div>			
	<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price" data-sep="<?php _e($seprator); ?>" data-reset="reset_price(new Event('click'),'<?php echo $min; ?>','<?php echo $max; ?>')" data-prefix="<?php _e($prefix); ?>" data-postfix="<?php _e($postfix); ?>"></div>
</div>