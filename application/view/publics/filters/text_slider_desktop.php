<?php

/*
*	Template to show text slider filters for desktop
*/

?>
	<div class="<?php echo esc_attr($width_class); ?>" data-tab-group="<?php esc_attr_e($tab_set); ?>">
		<p>
			<span class="ui header"><?php echo esc_html($filter['title']); ?></span>
			<?php if($help): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php esc_attr_e($help); ?>"></i></span>
			<?php endif; ?>
			<?php if($reset): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_slider(event,'<?php echo esc_attr($filter['slug']); ?>','<?php echo esc_attr($filter['min_value']['name']); ?>','<?php echo esc_attr($filter['max_value']['name']); ?>')">&nbsp;<u><?php esc_html(spext_lang("reset", 'woo-bundle-choice')); ?></u></span>
			<?php endif; ?>
		</p>

		<div class="ui tiny form">
			<div class="three fields">
				<div class="field">	      
					<input value="<?php echo esc_attr(($filter['seprator']=='.'?$filter['min_value']['name']:str_replace('.',',',$filter['min_value']['name']))); ?>" type="text" class="text_slider_<?php echo esc_attr($filter['slug']); ?> aligned left" name="text_min_<?php echo esc_attr($filter['slug']); ?>">
				</div>
				<div class="field"></div>
				<div class="field">	      
					<input value="<?php echo esc_attr(($filter['seprator']=='.'?$filter['max_value']['name']:str_replace('.',',',$filter['max_value']['name']))); ?>" type="text" class="text_slider_<?php echo esc_attr($filter['slug']); ?> aligned right" name="text_max_<?php echo esc_attr($filter['slug']); ?>">
				</div>
			</div>	  
		</div>			
		<div class="ui range slider text_slider wbc" id="text_slider_<?php echo esc_attr($filter['slug']); ?>" data-min="<?php echo esc_attr($filter['min_value']['name']); ?>" data-max="<?php echo esc_attr($filter['max_value']['name']); ?>" data-slug="<?php echo esc_attr($filter['slug']); ?>" data-sep="<?php echo esc_attr($filter['seprator']); ?>" data-reset="reset_slider(new Event('click'),'<?php echo esc_attr($filter['slug']); ?>','<?php echo esc_attr($filter['min_value']['name']); ?>','<?php echo esc_attr($filter['max_value']['name']); ?>')"></div>
	</div>
	<?php
	
