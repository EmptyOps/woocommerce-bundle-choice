<?php

/*
*	Template to show checkbox filters for desktop
*/

?>
	<div class="<?php echo esc_attr($width_class); ?>" data-tab-group="<?php echo esc_attr($tab_set); ?>">
		<p>
			<span class="ui header"><?php echo esc_html($filter['title']); ?></span> 
			<?php if($help): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php echo esc_attr($help); ?>"></i></span>
			<?php endif; ?>
			<?php if($reset): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo esc_attr($filter['slug']); ?>')">&nbsp;<u> <?php esc_html(spext_lang("reset", 'woo-bundle-choice')) ?></u></span>
			<?php endif; ?>
		</p>
		<div class="ui horizontal segments" data-reset="reset_button(new Event('click'),'.checklist_<?php echo esc_attr($filter['slug']); ?>')">
			<?php foreach ($filter['list'] as $term) : ?>
				<div class="ui segment wbc-button-input checklist_<?php echo esc_attr($filter['slug']); ?>" id='check_<?php echo esc_attr($term['slug']); ?>' data-slug="<?php echo esc_attr($term['slug']); ?>" data-filter-slug="<?php echo esc_attr($filter['slug']); ?>" >
			      <span><?php echo esc_html($term['name']); ?></span>
			    </div>			
			<?php endforeach; ?>
		</div>				
	</div>
	<?php
	
