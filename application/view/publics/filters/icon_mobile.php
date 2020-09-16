<?php

/*
*	Template to show icon filters for mobile
*/

?>
<div class="title">
    <i class="dropdown icon"></i>		    
    <?php echo($title); ?>
    <?php if($reset): ?>
	&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_icon(event,'<?php echo $term->slug; ?>')">&nbsp;<u>reset</u></span>
	<?php endif; ?>
</div>
	<div class="content">	
		<div class="ui tiny images" style="text-align: center;" data-reset="reset_icon(new Event('click'),'<?php echo $term->slug; ?>')">
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
	