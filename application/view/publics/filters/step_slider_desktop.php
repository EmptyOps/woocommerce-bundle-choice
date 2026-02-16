<?php

/*
*	Template to show step slider filters for desktop
*/

?>
		<div class="<?php echo esc_attr($width_class); ?>" data-tab-group="<?php echo esc_attr($tab_set); ?>">
		    <p>
		        <span class="ui header"><?php echo esc_html($filter['title']); ?></span>
		        <?php if($help): ?>
		        &nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php echo esc_attr($help); ?>"></i></span>
		        <?php endif; ?>
		        <?php if($reset): ?>
		        &nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_slider(event,'<?php echo esc_attr($filter['slug']) ?>',0,<?php echo esc_attr(count(array_filter($items_slug))); ?>)">&nbsp;<u> <?php esc_html(spext_lang("reset", 'woo-bundle-choice')) ?></u></span>
		        <?php endif; ?>
		    </p>

		    <div data-label_max_size="<?php echo esc_attr($label_max_size) ?>" data-min="0" data-max="<?php echo esc_attr(count(array_filter($items_slug))-1); ?>" class="ui labeled ticked range slider wbc" data-label_adjust="<?php echo esc_attr($reset_label); ?>" id="text_slider_<?php echo esc_attr($filter['slug']) ?>" data-slug="<?php echo esc_attr($filter['slug']) ?>" data-labels="<?php echo esc_attr(implode(",", $items_name)); ?>" data-slugs="<?php echo esc_attr(implode(",", $items_slug)); ?>" style="bottom: -12.5%;" data-reset="reset_slider(new Event('click'),'<?php echo esc_attr($filter['slug']) ?>',0,<?php echo esc_attr(count(array_filter($items_slug))); ?>)"></div>
		</div>
		<?php
	
