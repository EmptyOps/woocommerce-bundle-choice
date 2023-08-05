<?php

/*
*	Template to show slider price filters for mobile
*/

?>
	<div class="title">
	    <i class="dropdown icon"></i>		    
	    Price		    
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo esc_attr($min)/*$min*/; ?>','<?php echo esc_attr($max)/*$max*/; ?>')">&nbsp;<u><?php spext_lang("reset", 'woo-bundle-choice') ?></u></span>
		<?php endif; ?>
	</div>
  	<div class="content">	
  		<div class="ui tiny form">
		  <div class="two fields">
		    <div class="field" style="width: fit-content !important;">
		      	<input value="<?php echo esc_attr($prefix.$min.$postfix)/*$prefix.$min.$postfix*/; ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php _e($seprator); ?>">
		    </div>			    
		    <div class="field" style="position: absolute;right: 0px;width: fit-content !important;">
		     	<input value="<?php echo esc_attr($prefix.$max.$postfix)/*$prefix.$max.$postfix*/; ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php _e($seprator); ?>"> 
		    </div>
		  </div>	  
		</div>				    
  		<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo esc_attr($min)/*$min*/; ?>" data-max="<?php echo esc_attr($max)/*$max*/; ?>" data-slug="price" data-sep="<?php _e($seprator); ?>" data-reset="reset_price(new Event('click'),'<?php echo esc_attr($min)/*$min*/; ?>','<?php echo esc_attr($max)/*$max*/; ?>')" data-prefix="<?php _e($prefix); ?>" data-postfix="<?php _e($postfix); ?>"></div>
  	</div>		
	
