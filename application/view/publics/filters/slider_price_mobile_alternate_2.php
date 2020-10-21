<?php

/*
*	Template to show slider price filters for mobile
*/

?>
<div class="ui form" style="padding-left: 1em;">
	<p style="display:table-cell;vertical-align: top;width: 16vw;
"class="ui three wide field num_slider">
		<span class="ui header">Price</span>
	</p>
	<div style="display:table-cell;width: 84vw;" class="field twelve ui wide">
		<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price" style="padding-bottom: 0px !important" data-reset="reset_price(new Event('click'),'<?php echo $min; ?>','<?php echo $max; ?>')" data-sep="<?php _e($seprator); ?>" data-prefix="<?php _e($prefix); ?>" data-postfix="<?php _e($postfix); ?>"></div>
		<div class="ui tiny form" style="padding:0px 6%;">
		  <div class="three fields">
		    <div class="field" style="display: inline-block;width: auto;">	      
		      <input style="font-size: 13px; height: 24px; width: 6em; -webkit-appearance: none;padding-left: 0.5em;padding-right: 0.5em;" value="<?php echo $prefix.$min.$postfix; ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php _e($seprator); ?>">
		    </div>
		    <div class="field" style="display: inline-block;width: auto;"></div>
		    <div class="field" style="display: inline-block;width: auto;">	      
		      <input style="font-size: 13px; height: 24px; width: 6em; -webkit-appearance: none;position: absolute;right: 6%;padding-left: 0.5em;padding-right: 0.5em;" value="<?php echo $prefix.$max.$postfix;; ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php _e($seprator); ?>">
		    </div>
		  </div>	  
		</div>				
	</div>
</div>
	