<?php

/*
*	Template to show icon filters for mobile
*/

?>
<div class="ui form" style="padding-left: 1em;" data-tab-group="<?php _e($tab_set); ?>">
	<p style="display:table-cell;vertical-align: middle;<?php _e(!empty($help)?'min-width: 16vw;':'');?>"class="ui three wide field num_slider">
		<span class="ui header">
			<?php echo($title); ?>    		
		</span>
		<?php if(!empty($help)): ?>
			<span class="ui grey text" style="cursor: pointer;color: #a5a5a5db;;"><i class="question circle icon" data-help="<?php _e($help); ?>"></i></span>
			<?php endif; ?>
	</p>
	<div style="display: table-cell;" class="field twelve ui wide">
		<div class="ui tiny images" style="text-align: center;text-transform: capitalize; scroll-snap-type: x mandatory; display: flex; overflow-x: scroll;" data-reset="reset_icon(new Event('click'),'<?php echo $term->slug; ?>')" data-filter-slug="<?php echo $term->slug; ?>">
		<?php foreach ($list as $filter_icon): ?>
			<div title="<?php $filter_icon["name"]; ?>"
				class="eo_wbc_filter_icon <?php echo $non_edit ? 'none_editable':'' ?> 
					<?php echo $filter_icon['mark'] ? 'eo_wbc_filter_icon_select':''?> ui image" data-single_select="<?php _e($is_single_select); ?>"
				data-slug="<?php echo $filter_icon['slug']; ?>" 
				data-filter="<?php echo $term->slug; ?>" style="border-bottom: 2px solid transparent;"
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
</div>
