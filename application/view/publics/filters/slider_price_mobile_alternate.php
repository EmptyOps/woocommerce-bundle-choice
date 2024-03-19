<?php

/*
*	Template to show slider price filters for mobile
*/

?>			
<div class="ui four wide column toggle_sticky_mob_filter" style="<?php echo $advance?'display: none;':'' ?>" data-target="#sticky_mob_filter_price">
	<div class="title"><div class="ui segment"><?php esc_html(spext_lang(wbc()->options->get_option('appearance_filters','appearance_filters_price_filter_title_text','Price',false,true), 'woo-bundle-choice')) ?></div></div>
</div>
<div class="bottom_filter_segment hidden ui segment" id="sticky_mob_filter_price">
	<div class="ui equal width grid">
		<div class="column close_sticky_mob_filter" data-target="#sticky_mob_filter_price">
			<i class="ui icon times" style="cursor: pointer;"></i>&nbsp;Close
		</div>
		<div class="column"></div>
		<div class="column"></div>
		<div class="column" style="text-align: right;" onclick="reset_price(event,'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')">
			<i class="ui icon redo" style="cursor: pointer;"></i>&nbsp;Reset
		</div>
	</div>
	<br/>
	<div class="ui title">
		<strong><?php esc_html(spext_lang(wbc()->options->get_option('appearance_filters','appearance_filters_price_filter_title_text','Price',false,true), 'woo-bundle-choice')) ?></strong><?php if(!empty($help)): ?>&nbsp;<i class="question circle outline icon" data-help="<?php echo esc_attr($help); ?>"></i><?php endif; ?>
	</div><br/>
	<div class="content">
		<div class="ui tiny form">
			<div class="two fields">
				<div class="field" style="width: max-content !important;width:-moz-max-content !important;">
					<input value="<?php echo esc_attr($prefix.$min.$postfix); ?>" type="text" class="text_slider_price aligned left" name="text_min_price" data-sep="<?php esc_attr_e($seprator); ?>">
				</div>
				<div class="field" style="position: absolute;right: 0px;width: max-content !important;width:-moz-max-content !important;">
					<input value="<?php echo esc_attr($prefix.$max.$postfix); ?>" type="text" class="text_slider_price aligned right" name="text_max_price" data-sep="<?php esc_attr_e($seprator); ?>">
				</div>
			</div>
		</div>
		<div class="ui range slider text_slider wbc" id="text_slider_price" data-min="<?php echo esc_attr($min); ?>" data-max="<?php echo esc_attr($max); ?>" data-slug="price" data-prefix="<?php echo esc_attr($prefix); ?>" data-reset="reset_price(new Event('click'),'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')" data-sep="<?php esc_attr_e($seprator); ?>" data-reset="reset_price(new Event(''),'<?php echo esc_attr($min); ?>','<?php echo esc_attr($max); ?>')" data-prefix="<?php esc_attr_e($prefix); ?>" data-postfix="<?php esc_attr_e($postfix); ?>"></div>
	</div>
</div>

