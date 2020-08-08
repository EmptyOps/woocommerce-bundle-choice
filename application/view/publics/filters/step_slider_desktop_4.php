<?php

/*
*	Template to show step slider filters for desktop
*/

?>
<div class="<?php echo $width_class; ?>">
	<div style="display: inline-block;" class="ui three wide field text_slider">
		<span class="ui header "><?php echo $filter['title']; ?><span><?php if($help): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
		<?php endif; ?>
		</span></span>
		
	</div>
	<div style="display: inline-block;" class="field twelve ui wide">

		<div class="ui labeled ticked range slider" id="text_slider_<?php echo $filter['slug'] ?>" data-slug="<?php echo $filter['slug'] ?>" data-labels="<?php echo(implode(",", $items_name)); ?>" data-slugs="<?php echo(implode(",", $items_slug)); ?>" style="bottom: -12.5%;" data-reset="reset_slider(new Event('click'),'<?php echo $filter['slug'] ?>',0,<?php echo count(array_filter($items_slug)); ?>)"></div>
	</div>
</div>
<?php
