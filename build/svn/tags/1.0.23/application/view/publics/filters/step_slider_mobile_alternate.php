<?php

/*
*	Template to show step slider filters for mobile
*/

?>			
<div class="ui four wide column toggle_sticky_mob_filter <?php echo $advance?'advance_filter_mob':'' ?>" style="<?php echo $advance?'display: none;':'' ?>" data-target="#sticky_mob_filter_<?php echo $filter['slug'] ?>" data-tab-group="<?php _e($tab_set); ?>">
	<div class="title"><div class="ui segment"><?php echo($filter['title']); ?></div></div>
</div>
<div class="bottom_filter_segment hidden ui segment" id="sticky_mob_filter_<?php echo $filter['slug'] ?>">
	<div class="ui equal width grid">
		<div class="column close_sticky_mob_filter" data-target="#sticky_mob_filter_<?php echo $filter['slug'] ?>">
			<i class="ui icon times" style="cursor: pointer;"></i>&nbsp;Close
		</div>
		<div class="column"></div>
		<div class="column"></div>
		<div class="column" style="text-align: right;" onclick="reset_slider(event,'<?php echo $filter['slug'] ?>',0,<?php echo count(array_filter($items_slug)); ?>)">						
			<i class="ui icon redo" style="cursor: pointer;"></i>&nbsp;Reset
		</div>
	</div>					
	<br/>
	<div class="ui title">
		<strong><?php echo($filter['title']); ?></strong><?php if(!empty($help)): ?>&nbsp;<i class="question circle outline icon" data-help="<?php echo $help; ?>"></i><?php endif; ?>
	</div><br/>
	<div data-label_max_size="<?php echo $label_max_size ?>" data-min="0" data-max="<?php echo count(array_filter($items_slug))-1; ?>" class="ui labeled ticked range slider wbc" data-label_adjust="<?php echo $reset_label; ?>" id="text_slider_<?php echo $filter['slug'] ?>" data-slug="<?php echo $filter['slug'] ?>" data-labels="<?php echo(implode(",", $items_name)); ?>" data-slugs="<?php echo(implode(",", $items_slug)); ?>" style="bottom: -12.5%;" data-reset="reset_slider(new Event('click'),'<?php echo $filter['slug'] ?>',0,<?php echo count(array_filter($items_slug)); ?>)" data-reset="reset_slider(new Event(''),'<?php echo $filter['slug'] ?>',0,<?php echo count(array_filter($items_slug)); ?>)"></div>
</div>