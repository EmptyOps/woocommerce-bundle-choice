<?php

/*
*	Template to show checkbox filters for desktop
*/

?>
	<div class="<?php echo $width_class; ?>">
		<p>
			<span class="ui header"><?php echo($filter['title']); ?></span> 
			<?php if($reset): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo $filter['slug'] ?>')">&nbsp;<u>reset</u></span>
			<?php endif; ?>
		</p>
		<div class="ui tiny form" data-reset="reset_checkbox(new Event('click'),'.checklist_<?php echo $filter['slug'] ?>')">
			<?php foreach ($filter['list'] as $term) : ?>
				<div class="ui checkbox checked">
					<input type="checkbox" checked="checked" tabindex="0" class="hidden checklist_<?php echo $filter['slug'] ?>" id='check_<?php echo $term['slug']; ?>' data-slug="<?php echo $term['slug']; ?>" data-filter-slug="<?php echo $filter['slug']; ?>">
			        <label><?php echo $term['name']; ?></label>
			    </div>&nbsp;&nbsp;						
			<?php endforeach; ?>
		</div>			
	</div>
	<?php
	