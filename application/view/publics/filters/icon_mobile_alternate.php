<?php

/*
*	Template to show icon filters for mobile
*/

?>			
<div class="ui four wide column toggle_sticky_mob_filter <?php echo $advance?'advance_filter_mob':'' ?>" style="<?php echo $advance?'display: none;':'' ?><?php echo $hidden?'display:none;':''; ?>" data-target="#sticky_mob_filter_<?php echo $term->slug ?>" data-tab-group="<?php _e($tab_set); ?>">
	<div class="title"><div class="ui segment"><?php echo($title); ?></div></div>
</div>
<div class="bottom_filter_segment hidden ui segment" id="sticky_mob_filter_<?php echo $term->slug ?>" data-filter-slug="<?php echo $term->slug; ?>">
		<div class="ui equal width grid">
				<div class="column close_sticky_mob_filter" data-target="#sticky_mob_filter_<?php echo $term->slug ?>">
					<i class="ui icon times" style="cursor: pointer;"></i>&nbsp;Close
				</div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column" style="text-align: right;" onclick="reset_icon(event,'<?php echo $term->slug; ?>')">
					<i class="ui icon redo" style="cursor: pointer;"></i>&nbsp;Reset
				</div>
		</div>					
	<br/>
	<div class="ui title">
		<strong><?php echo($title); ?></strong><?php if(!empty($help)): ?>&nbsp;<i class="question circle outline icon" data-help="<?php echo $help; ?>"></i><?php endif; ?>
	</div><br/>
	<div class="ui tiny images" data-reset="reset_icon(new Event('click'),'<?php echo $term->slug; ?>')" style="text-align: center;">
		<?php foreach ($list as $filter_icon): ?>
			<div title="<?php $filter_icon["name"]; ?>"
				class="eo_wbc_filter_icon <?php echo $non_edit ? 'none_editable':'' ?> 
					<?php echo $filter_icon['mark'] ? 'eo_wbc_filter_icon_select':''?> ui image" data-single_select="<?php _e($is_single_select); ?>"
				data-slug="<?php echo $filter_icon['slug']; ?>" data-label="<?php echo($filter_icon['name']); ?>" 
				data-filter="<?php echo $term->slug; ?>" style="<?php echo get_option('eo_wbc_alternate_breadcrumb',false)?"border":"border-bottom"?>: 2px solid transparent;"
				data-siblings="<?php echo implode(',',array_column($list,'slug')); ?>" 
				data-type="<?php echo $type; ?>" data-reset="reset_single_icon(new Event(''),'[data-slug=\'<?php echo $filter_icon['slug']; ?>\']')">
				<div>
					<img src='<?php echo ($filter_icon['mark']?$filter_icon['select_icon']:$filter_icon['icon']); ?>' data-imgsrc="<?php echo $filter_icon['icon']; ?>" data-toggleimgsrc="<?php echo $filter_icon['select_icon']; ?>" style="<?php _e($icon_css); ?>" />
				</div>
				<?php if($input=='icon_text'): ?>
					<div><?php echo($filter_icon['name']); ?></div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>			  	
	</div>	
</div>