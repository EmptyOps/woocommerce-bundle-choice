<?php

/*
*	Template to show checkbox filters for desktop
*/

?>
	<div class="<?php echo esc_attr($width_class)/*$width_class*/; ?>" data-tab-group="<?php _e($tab_set); ?>">
		<p>
			<span class="ui header"><?php echo esc_attr(($filter['title']))/*($filter['title'])*/; ?></span> 
			<?php if($help): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
			<?php endif; ?>
			<?php if($reset): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>')">&nbsp;<u> <?php spext_lang("reset", 'woo-bundle-choice') ?></u></span>
			<?php endif; ?>
		</p>
		<div class="ui tiny form" data-reset="reset_checkbox(new Event('click'),'.checklist_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>')">
			<?php foreach ($filter['list'] as $term) : ?>
				<div class="ui checkbox checked">
					<input type="checkbox" checked="checked" tabindex="0" class="hidden checklist_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>" id='check_<?php echo esc_attr($term['slug'])/*$term['slug']*/; ?>' data-slug="<?php echo esc_attr($term['slug'])/*$term['slug']*/; ?>" data-filter-slug="<?php echo esc_attr($filter['slug'])/*$filter['slug']*/; ?>">
			        <label><?php echo esc_attr($term['name'])/*$term['name']*/; ?></label>
			    </div>&nbsp;&nbsp;						
			<?php endforeach; ?>
		</div>			
	</div>
	<?php
	
