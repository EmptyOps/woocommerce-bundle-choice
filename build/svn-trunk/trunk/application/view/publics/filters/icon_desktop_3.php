<?php

/*
*	Template to show icon filters for desktop
*/

?>
<div class="spui-semantic-<?php echo esc_attr($term->slug); ?>-shape-column <?php echo esc_attr($width_class); ?>" data-tab-group="<?php esc_attr_e($tab_set); ?>">
	<p>
		<span class="ui header"><?php echo esc_html($title); ?></span>
		<?php if($help): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php esc_attr_e($help); ?>"></i></span>
		<?php endif; ?>
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_icon(event,'<?php echo esc_attr($term->slug); ?>')">&nbsp;<u>reset</u></span>
		<?php endif; ?>
	</p>
	<div class="ui tiny images ui equal width center aligned grid spui-diamond-filter-container" style="text-align: center;" data-reset="reset_icon(new Event('click'),'<?php echo esc_attr($term->slug); ?>')" data-filter-slug="<?php echo esc_attr($term->slug); ?>">				
		<?php foreach ($list as $filter_icon): ?>
			<div title="<?php esc_attr($filter_icon["name"]); ?>"
				class="eo_wbc_filter_icon column <?php echo $non_edit ? 'none_editable':'' ?> 
					<?php echo $filter_icon['mark'] ? 'eo_wbc_filter_icon_select':''?> ui image spui-semantic-diamond-shape" data-single_select="<?php esc_attr_e($is_single_select); ?>"
				data-slug="<?php echo esc_attr($filter_icon['slug']); ?>" 
				data-filter="<?php echo esc_attr($term->slug); ?>" style="border-bottom: 2px solid transparent;<?php echo esc_attr($icon_css); ?> width: auto !important;"
				data-type="<?php echo esc_attr($type); ?>">
				<div>
					<img src='<?php echo esc_url($filter_icon['mark']?$filter_icon['select_icon']:$filter_icon['icon']); ?>' data-imgsrc="<?php echo esc_url($filter_icon['icon']); ?>" data-toggleimgsrc="<?php echo esc_url($filter_icon['select_icon']); ?>"/>
				</div>
				<?php if($input=='icon_text'): ?>
					<div><?php echo esc_html($filter_icon['name']); ?></div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>			  	
	</div>		    		
</div>

