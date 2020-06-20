<?php

/*
*	Template to show slider price filters for mobile
*/

?>
	<div class="title">
	    <i class="dropdown icon"></i>		    
	    Price		    
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo $min; ?>','<?php echo $max; ?>')">&nbsp;<u>reset</u></span>
		<?php endif; ?>
	</div>
  	<div class="content">	
  		<div class="ui tiny form">
		  <div class="two fields">
		    <div class="field" style="width: fit-content !important;">
		      	<input value="<?php echo $min; ?>" type="text" class="text_slider_price aligned left" name="text_min_price">
		    </div>			    
		    <div class="field" style="position: absolute;right: 0px;width: fit-content !important;">
		     	<input value="<?php echo $max; ?>" type="text" class="text_slider_price aligned right" name="text_max_price"> 
		    </div>
		  </div>	  
		</div>				    
  		<div class="ui range slider text_slider" id="text_slider_price" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price"></div>
  	</div>		
	