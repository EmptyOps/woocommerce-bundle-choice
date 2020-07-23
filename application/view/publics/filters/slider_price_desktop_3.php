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
	      <input value="<?php echo $min; ?>" type="text" class="text_slider_price aligned left" name="text_min_price">
	    </div>
	    <div class="field"></div>
	    <div class="field">	      
	      <input value="<?php echo $max; ?>" type="text" class="text_slider_price aligned right" name="text_max_price">
	    </div>
	  </div>	  
	</div>			
	<div class="ui range slider text_slider" id="text_slider_price" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price" data-sep="<?php _e(wbc()->options->get_option('filters_filter_setting','filter_setting_numeric_slider_seperator','.')); ?>"></div>
</div>