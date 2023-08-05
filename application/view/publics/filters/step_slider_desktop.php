<?php

/*
*	Template to show step slider filters for desktop
*/

?>
		<div class="<?php echo esc_attr($width_class)/*$width_class*/; ?>" data-tab-group="<?php _e($tab_set); ?>">
			<p>
				<span class="ui header"><?php echo esc_attr($filter['title'])/*$filter['title']*/; ?></span>
				<?php if($help): ?>
				&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
				<?php endif; ?>
				<?php if($reset): ?>
				&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_slider(event,'<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>',0,<?php echo count(array_filter($items_slug)); ?>)">&nbsp;<u> <?php spext_lang("reset", 'woo-bundle-choice') ?></u></span>
				<?php endif; ?>
			</p>

			<div data-label_max_size="<?php echo esc_attr($label_max_size)/*$label_max_size*/ ?>"  data-min="0" data-max="<?php echo count(array_filter($items_slug))-1; ?>" class="ui labeled ticked range slider wbc" data-label_adjust="<?php echo esc_attr( $reset_label)/* $reset_label*/; ?>" id="text_slider_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>" data-slug="<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>" data-labels="<?php echo(implode(",", $items_name)); ?>" data-slugs="<?php echo(implode(",", $items_slug)); ?>" style="bottom: -12.5%;" data-reset="reset_slider(new Event('click'),'<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>',0,<?php echo count(array_filter($items_slug)); ?>)"></div>
		</div>
		<?php
	
