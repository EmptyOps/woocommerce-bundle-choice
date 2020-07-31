<?php

/*
*	Template to show slider price filters for desktop
*/

?>
<div class="<?php echo $width_class; ?>">
	<p style="display: inline-block;"class="ui three wide field">
		<span class="ui header">Price</span>
	</p>
	<div style="display: inline-block;" class="field twelve ui wide">

		<div class="ui range slider text_slider" id="text_slider_price" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price" style="padding-bottom: 0px !important" data-reset="reset_price(new Event('click'),'<?php echo $min; ?>','<?php echo $max; ?>')"></div><div class="ui tiny form" style="padding:0px 6%;">
		  <div class="three fields">
		    <div class="field">	      
		      <input style="font-size: 13px; height: 24px; width: 6em; -webkit-appearance: none;" value="<?php echo $min; ?>" type="text" class="text_slider_price aligned left" name="text_min_price">
		    </div>
		    <div class="field"></div>
		    <div class="field">	      
		      <input style="font-size: 13px; height: 24px; width: 6em; -webkit-appearance: none;position: absolute;right: 6%;" value="<?php echo $max; ?>" type="text" class="text_slider_price aligned right" name="text_max_price">
		    </div>
		  </div>	  
		</div>				
	</div>
</div>
	