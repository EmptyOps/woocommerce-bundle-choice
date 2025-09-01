<?php

/*
*	Template to show slider price filters for desktop
*/

?>
<div class="<?php echo esc_attr($width_class); ?>">
	<p>
		<span class="ui header"><?php echo wbc()->options->get_option('appearance_filters','appearance_filters_price_filter_title_text','Price',false,true);?></span>				
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')">&nbsp;<u><?php esc_html(spext_lang("reset", 'woo-bundle-choice')); ?></u></span>
		<?php endif; ?>
	</p>							
	<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo esc_attr($min); ?>" data-max="<?php echo esc_attr($max); ?>" data-slug="price" data-sep="<?php esc_attr_e($seprator); ?>" data-reset="reset_price(new Event('click'),'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')" data-prefix="<?php esc_attr_e($prefix); ?>" data-postfix="<?php esc_attr_e($postfix); ?>"></div>
	<div class="ui tiny form">
	  <div class="three fields" style="-ms-flex-wrap:nowrap !important; flex-wrap:nowrap !important;">
	    <div class="field">	      
	      <input value="<?php echo esc_attr($prefix.$min.$postfix); ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php esc_attr_e($seprator); ?>">
	    </div>
	    <div class="field"></div>
	    <div class="field">	      
	      <input value="<?php echo esc_attr($prefix.$max.$postfix); ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php esc_attr_e($seprator); ?>">
	    </div>
	  </div>	  
	</div>
</div>

