<?php

/*
*	Template to show checkbox filters for desktop
*/
?>
<div class="<?php echo $width_class; ?>" data-tab-group="<?php _e($tab_set); ?>">
	<p>
		<span class="ui header"><?php echo($filter['title']); ?></span> 
		<?php if($help): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
		<?php endif; ?>
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo $filter['slug'] ?>')">&nbsp;<u>reset</u></span>
		<?php endif; ?>
	</p>
	
	<div class="ui horizontal segments" data-reset="reset_button(new Event('click'),'.checklist_<?php echo $filter['slug'] ?>')">
		<?php foreach ($filter['list'] as $term) : ?>
			<div class="ui segment wbc-button-input checklist_<?php echo $filter['slug'] ?>" id='check_<?php echo $term['slug']; ?>' data-slug="<?php echo $term['slug']; ?>" data-filter-slug="<?php echo $filter['slug']; ?>" >
		      <span><?php echo $term['name']; ?></span>
		    </div>			
		<?php endforeach; ?>
	</div>	
</div>
<?php
