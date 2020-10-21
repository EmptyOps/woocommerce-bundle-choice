<?php

/*
*	Template to show step slider filters for mobile
*/

?>
		<div class="title" data-tab-group="<?php _e($tab_set); ?>">
		    
		    <?php echo $filter['title']; ?>
		   <?php if(!empty($help)): ?>
			<span class="ui grey text" style="cursor: pointer;color: #a5a5a5db;;"><i class="question circle icon" data-help="<?php _e($help); ?>"></i></span>
			<?php endif; ?>
			<i class="plus icon" style="position: absolute; right: 0;"></i>
		</div>
	  	<div class="content">		    
	  		<div class="ui labeled ticked range slider wbc" data-label_adjust="<?php echo $reset_label; ?>" id="text_slider_<?php echo $filter['slug'] ?>" data-slug="<?php echo $filter['slug'] ?>" data-labels="<?php echo(implode(",", $items_name)); ?>" data-slugs="<?php echo(implode(",", $items_slug)); ?>" style="bottom: -12.5%;" data-reset="reset_slider(new Event('click'),'<?php echo $filter['slug'] ?>',0,<?php echo count(array_filter($items_slug)); ?>)" data-reset="reset_slider(new Event('click'),'<?php echo $filter['slug'] ?>',0,<?php echo count(array_filter($items_slug)); ?>)"></div>
	  	</div>		
	