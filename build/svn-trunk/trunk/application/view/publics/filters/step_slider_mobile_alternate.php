<?php

/*
*	Template to show step slider filters for mobile
*/

?>			
<div class="ui four wide column toggle_sticky_mob_filter <?php echo $advance?'advance_filter_mob':''; ?>" style="<?php echo $advance?'display: none;':''; ?>" data-target="#sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>" data-tab-group="<?php esc_attr_e($tab_set); ?>">
	<div class="title"><div class="ui segment"><?php echo esc_html($filter['title']); ?></div></div>
</div>
<div class="bottom_filter_segment hidden ui segment" id="sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>">
	<div class="ui equal width grid">
		<div class="column close_sticky_mob_filter" data-target="#sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>">
			<i class="ui icon times" style="cursor: pointer;"></i>&nbsp; <?php esc_html(spext_lang("Close", 'woo-bundle-choice')); ?>
		</div>
		<div class="column"></div>
		<div class="column"></div>
		<div class="column" style="text-align: right;" onclick="reset_slider(event,'<?php echo esc_attr($filter['slug']); ?>',0,<?php echo esc_attr(count(array_filter($items_slug))); ?>)">						
			<i class="ui icon redo" style="cursor: pointer;"></i>&nbsp;<?php esc_html(spext_lang("Reset", 'woo-bundle-choice')); ?>
		</div>
	</div>					
	<br/>
	<div class="ui title">
		<strong><?php echo esc_html($filter['title']); ?></strong><?php if(!empty($help)): ?>&nbsp;<i class="question circle outline icon" data-help="<?php echo esc_attr($help); ?>"></i><?php endif; ?>
	</div><br/>
	<div data-label_max_size="<?php echo esc_attr($label_max_size); ?>" data-min="0" data-max="<?php echo esc_attr(count(array_filter($items_slug))-1); ?>" class="ui labeled ticked range slider wbc" data-label_adjust="<?php echo esc_attr($reset_label); ?>" id="text_sl0ider_<?php echo esc_attr($filter['slug']); ?>" data-slug="<?php echo esc_attr($filter['slug']); ?>" data-labels="<?php echo esc_attr(implode(",", $items_name)); ?>" data-slugs="<?php echo esc_attr(implode(",", $items_slug)); ?>" style="bottom: -12.5%;" data-reset="reset_slider(new Event('click'),'<?php echo esc_attr($filter['slug']); ?>',0,<?php echo esc_atrr(count(array_filter($items_slug))); ?>)" data-reset="reset_slider(new Event(''),'<?php echo esc_attr($filter['slug']); ?>',0,<?php echo esc_attr(count(array_filter($items_slug))); ?>)"></div>
</div>

