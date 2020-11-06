<?php

/*
*	Template to show icon filters for desktop
*/

?>
<div class="<?php echo $width_class; ?>" data-tab-group="<?php _e($tab_set); ?>">
	<p>
		<span class="ui header"><?php echo($title); ?></span>
		<?php if($help): ?>
	&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
	<?php endif; ?>
		<?php if($reset): ?>
	&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_icon(event,'<?php echo $term->slug; ?>')">&nbsp;<u>reset</u></span>
	<?php endif; ?>
	</p>
	<div class="ui tiny images ui equal width center aligned grid" style="text-align: center;" data-reset="reset_icon(new Event('click'),'<?php echo $term->slug; ?>')" data-filter-slug="<?php echo $term->slug; ?>">				
		<?php foreach ($list as $filter_icon): ?>
			<div title="<?php $filter_icon["name"]; ?>"
				class="eo_wbc_filter_icon column <?php echo $non_edit ? 'none_editable':'' ?> 
					<?php echo $filter_icon['mark'] ? 'eo_wbc_filter_icon_select':''?> ui image" data-single_select="<?php _e($is_single_select); ?>"
				data-slug="<?php echo $filter_icon['slug']; ?>" 
				data-filter="<?php echo $term->slug; ?>" style="border-bottom: 2px solid transparent;<?php echo $icon_css; ?>"
				data-type="<?php echo $type; ?>">
				<div>
					<img src='<?php echo ($filter_icon['mark']?$filter_icon['select_icon']:$filter_icon['icon']); ?>' data-imgsrc="<?php echo $filter_icon['icon']; ?>" data-toggleimgsrc="<?php echo $filter_icon['select_icon']; ?>"/>
				</div>
				<?php if($input=='icon_text'): ?>
					<div><?php echo($filter_icon['name']); ?></div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>			  	
	</div>		    		
</div>
