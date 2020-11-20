<?php

/*
*	Template to show slider price filters for mobile
*/

?>
<div class="ui form" style="padding-left: 1em;">
	<p style="display:table-cell;vertical-align: top;width: 22vw !important;
"class="ui three wide field num_slider">
		<span class="ui header">Price</span>
		<span class="ui grey text" style="cursor: pointer;color: #a5a5a5db;;"><i class="question circle icon" data-help="<h2>Price</h2><br/>All of our prices are in <?php _e(get_woocommerce_currency()); ?>"></i></span>
	</p>
	<div style="display:table-cell;width: 74vw !important;" class="field twelve ui wide">
		<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price" style="padding-bottom: 0px !important" data-reset="reset_price(new Event('click'),'<?php echo $min; ?>','<?php echo $max; ?>')" data-sep="<?php _e($seprator); ?>" data-prefix="<?php _e($prefix); ?>" data-postfix="<?php _e($postfix); ?>"></div>
		<div class="ui tiny form" style="padding:0px 6%;">
		  <div class="three fields">
		    <div class="field" style="display: inline-block;width: min-content !important;">	      
		      <input style="font-size: 13px; height: 24px; width: 7.9em; -webkit-appearance: none;padding-left: 0.5em;padding-right: 0.5em;" value="<?php echo $prefix.' '.number_format($min,2,$seprator,',').' '.$postfix; ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php _e($seprator); ?>">
		    </div>
		    <div class="field" style="display: inline-block;width: min-content !important;"></div>
		    <div class="field" style="display: inline-block;width: min-content !important;">	      
		      <input style="font-size: 13px; height: 24px; width: 7.9em; -webkit-appearance: none;position: absolute;right: 6%;padding-left: 0.5em;padding-right: 0.5em;" value="<?php echo $prefix.' '.number_format($max,2,$seprator,',').' '.$postfix; ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php _e($seprator); ?>">
		    </div>
		  </div>	  
		</div>				
	</div>
</div>
	