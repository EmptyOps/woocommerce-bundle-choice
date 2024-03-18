<?php

/*
*	Template to show slider price filters for desktop
*/
?>
<div class="spui-semantic-slider-column <?php echo esc_attr($width_class); ?>">
	<p>
		<span class="ui header"><?php echo wbc()->options->get_option('appearance_filters','appearance_filters_price_filter_title_text','Price',false,true);?></span>				
		<?php if($reset): ?>
<<<<<<< HEAD
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')">&nbsp;<u><?php esc_html(spext_lang("reset", 'woo-bundle-choice')) ?></u></span>
=======
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_price(event,'<?php echo $min; ?>','<?php echo $max; ?>')">&nbsp;<u><?php echo spext_lang("reset", 'woo-bundle-choice'); ?></u></span>
>>>>>>> fa937341496810dc75fcd52217f7643fee9907d2
		<?php endif; ?>
	</p>			
	<div class="ui tiny form">
	  <div class="three fields">
	    <div class="field">	      
	      <input value="<?php echo esc_attr($prefix.$min.$postfix); ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php esc_attr_e($seprator); ?>">
	    </div>
	    <div class="field"></div>
	    <div class="field">	      
	      <input value="<?php echo esc_attr($prefix.$max.$postfix); ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php esc_attr_e($seprator); ?>">
	    </div>
	  </div>	  
	</div>			
<<<<<<< HEAD
	<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo esc_attr($min); ?>" data-max="<?php echo esc_attr($max); ?>" data-slug="price" data-sep="<?php esc_attr_e($seprator); ?>" data-reset="reset_price(new Event('click'),'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')" data-prefix="<?php esc_attr_e($prefix); ?>" data-postfix="<?php esc_attr_e($postfix); ?>"></div>
</div>

=======
	<div class="ui range slider text_slider wbc" id="text_slider_price"
		<?php if (!empty($mark)): ?>
			data-range-start=<?php echo $mark['range_start'] ? $mark['range_start'] : $min ;  ?> 
			data-range-end=<?php echo $mark['range_end'] ? $mark['range_end'] : $max ; ?> 
		<?php endif; ?>
		data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price" data-sep="<?php _e($seprator); ?>" data-reset="reset_price(new Event('click'),'<?php echo $min; ?>','<?php echo $max; ?>')" data-prefix="<?php _e($prefix); ?>" data-postfix="<?php _e($postfix); ?>"></div>
</div>
>>>>>>> fa937341496810dc75fcd52217f7643fee9907d2
