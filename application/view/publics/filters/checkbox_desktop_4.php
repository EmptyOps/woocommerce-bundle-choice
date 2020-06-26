<?php

/*
*	Template to show checkbox filters for desktop
*/

?>
	<div class="<?php echo $width_class; ?>">
		<p style="display: inline-block;"class="ui three wide field">
			<span class="ui header"><?php echo($filter['title']); ?></span> 
			<span><?php if($help): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
			<?php endif; ?>
			</span>
		</p>
		<div style="display: inline-block;" class="field twelve ui wide">
			<div class="ui tiny form">
				<?php foreach ($filter['list'] as $term) : ?>
					<div class="ui checkbox checked">
						<input type="checkbox" checked="checked" tabindex="0" class="hidden checklist_<?php echo $filter['slug'] ?>" id='check_<?php echo $term['slug']; ?>' data-slug="<?php echo $term['slug']; ?>" data-filter-slug="<?php echo $filter['slug']; ?>">
				        <label><?php echo $term['name']; ?></label>
				    </div>&nbsp;&nbsp;						
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php
	