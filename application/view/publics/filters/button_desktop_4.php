<?php

/*
*	Template to show checkbox filters for desktop
*/

?>
	<div class="<?php echo esc_attr($width_class)/*$width_class*/; ?>" data-tab-group="<?php _e($tab_set); ?>">
		<p style="display: inline-block;"class="ui three wide field">
			<span class="ui header"><?php echo esc_attr(($filter['title']))/*($filter['title'])*/; ?></span><?php if($help): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
			<?php endif; ?>
			<?php if($reset): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>')">&nbsp;<u><?php spext_lang("reset", 'woo-bundle-choice') ?></u></span>
			<?php endif; ?>			
		</p>
		<div style="display: inline-block;" class="ui twelve wide field">
			<div class="ui horizontal segments" data-reset="reset_button(new Event('click'),'.checklist_<?php echo esc_attr($filter['slug'] )/*$filter['slug'] */?>')">
				<?php foreach ($filter['list'] as $term) : ?>
					<div class="ui segment wbc-button-input checklist_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>" id='check_<?php echo esc_attr($term['slug'])/*$term['slug']*/; ?>' data-slug="<?php echo esc_attr($term['slug'])/*$term['slug']*/; ?>" data-filter-slug="<?php echo esc_attr($filter['slug'])/*$filter['slug']*/; ?>" >
				      <span><?php echo esc_attr($term['name'])/*$term['name']*/; ?></span>
				    </div>			
				<?php endforeach; ?>
			</div>	
		</div>
	</div>
	<?php
	
