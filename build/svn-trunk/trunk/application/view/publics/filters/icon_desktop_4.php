<?php

/*
*	Template to show icon filters for desktop
*/

?>
<div class="<?php echo esc_attr($width_class); ?>" data-tab-group="<?php esc_attr_e($tab_set); ?>">
	<div style="display: inline-block;" class="ui three wide field icon_header">
		<span class="ui header"><?php echo esc_html($title); ?></span>
		<?php if($help): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php esc_attr_e($help); ?>"></i></span>
		<?php endif; ?>
		<?php if($reset): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_icon(event,'<?php echo esc_attr($term->slug); ?>')">&nbsp;<u><?php esc_html(spext_lang("reset", 'woo-bundle-choice')) ?></u></span>
		<?php endif; ?>
	</div>	

	<div style="display: inline-block;" class="field twelve ui wide" data-reset="reset_icon(new Event('click'),'<?php echo esc_attr($term->slug); ?>')">
		<div class="ui equal width center aligned grid" style="text-align: center;margin-top: 0px" data-filter-slug="<?php echo esc_attr($term->slug); ?>">				
			<?php foreach ($list as $filter_icon): ?>
				<div style="padding: 0px;" title="<?php esc_attr($filter_icon["name"]); ?>"
					class="eo_wbc_filter_icon column <?php echo $non_edit ? 'none_editable':'' ?> 
						<?php echo $filter_icon['mark'] ? 'eo_wbc_filter_icon_select':''?> ui image" data-single_select="<?php esc_attr_e($is_single_select); ?>"
					data-slug="<?php echo esc_attr($filter_icon['slug']); ?>" 
					data-filter="<?php echo esc_attr($term->slug); ?>" style="border-bottom: 2px solid transparent;padding-top: 0rem;padding-bottom: 0rem;"
					data-type="<?php echo esc_attr($type); ?>">
					<div style="/*height: <?php esc_attr_e($icon_width); ?>;*/display: flex;">
						<img src='<?php echo esc_url($filter_icon['mark']?$filter_icon['select_icon']:$filter_icon['icon']); ?>' class="ui mini image" style="<?php esc_attr_e($icon_css); ?>;margin: auto;display: block;" data-imgsrc="<?php echo esc_url($filter_icon['icon']); ?>" data-toggleimgsrc="<?php echo esc_url($filter_icon['select_icon']); ?>"/>
					</div>
					<?php if($input=='icon_text'): ?>
						<div style="visibility: hidden;"><?php echo esc_html($filter_icon['name']); ?></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>			  	
		</div>	
	</div>	
</div>

