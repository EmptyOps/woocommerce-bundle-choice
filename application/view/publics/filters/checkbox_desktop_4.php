<?php

/*
*	Template to show checkbox filters for desktop
*/

?>
<<<<<<< HEAD
	<div class="<?php echo esc_attr($width_class); ?>" data-tab-group="<?php esc_attr_e($tab_set); ?>">
	<p style="display: inline-block;" class="ui three wide field">
		<span class="ui header"><?php echo esc_html($filter['title']); ?></span>
		<?php if($help): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php esc_attr_e($help); ?>"></i></span>
		<?php endif; ?>
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo esc_attr($filter['slug']); ?>')">&nbsp;<u><?php esc_html(spext_lang("reset", 'woo-bundle-choice')) ?></u></span>
		<?php endif; ?>
	</p>
=======
	<div class="<?php echo $width_class; ?>" data-tab-group="<?php _e($tab_set); ?>">
		<p style="display: inline-block;"class="ui three wide field">
			<span class="ui header"><?php echo($filter['title']); ?></span>
			<?php if($help): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
			<?php endif; ?>
			<?php if($reset): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo $filter['slug'] ?>')">&nbsp;<u><?php echo spext_lang("reset", 'woo-bundle-choice'); ?></u></span>
			<?php endif; ?>
		</p>
>>>>>>> fa937341496810dc75fcd52217f7643fee9907d2

	<div style="display: inline-block;" class="ui twelve wide field">
		<div class="ui tiny form" data-reset="reset_checkbox(new Event('click'),'.checklist_<?php echo esc_attr($filter['slug']); ?>')">

			<?php foreach ($filter['list'] as $term) : ?>
				<div class="ui checkbox checked">
					<input type="checkbox" checked="checked" tabindex="0" class="hidden checklist_<?php echo esc_attr($filter['slug']); ?>" id='check_<?php echo esc_attr($term['slug']); ?>' data-slug="<?php echo esc_attr($term['slug']); ?>" data-filter-slug="<?php echo esc_attr($filter['slug']); ?>">
			        <label><?php echo esc_html($term['name']); ?></label>
			    </div>&nbsp;&nbsp;						
			<?php endforeach; ?>
		</div>
	</div>
</div>
	<?php
	
