<?php

/*
*	Template to show checkbox filters for mobile
*/

?>			
<div class="ui four wide column toggle_sticky_mob_filter <?php echo ($advance?'advance_filter_mob':''); ?>"  style="<?php echo ($advance?'display: none;':''); ?>" data-target="#sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>" data-tab-group="<?php echo esc_attr($tab_set); ?>">
	<div class="title"><div class="ui segment">
		<?php echo esc_html($filter['title']); ?></div>
	</div>
</div>
<div class="bottom_filter_segment hidden ui segment" id="sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>">
		<div class="ui equal width grid">
				<div class="column close_sticky_mob_filter" data-target="#sticky_mob_filter_<?php echo esc_attr($filter['slug']); ?>">
					<i class="ui icon times" style="cursor: pointer;"></i>&nbsp;<?php esc_html(spext_lang("Close", 'woo-bundle-choice')); ?>
				</div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column" style="text-align: right;" onclick="reset_checkbox(event,'.checklist_<?php echo esc_attr($filter['slug']); ?>')">
					<i class="ui icon redo" style="cursor: pointer;"></i>&nbsp;<?php esc_html(spext_lang("Reset", 'woo-bundle-choice')); ?>
				</div>
		</div>					
	<br/>
	<div class="ui title">
		<strong><?php echo esc_html($filter['title']); ?></strong><?php if(!empty($help)): ?>&nbsp;<i class="question circle outline icon" data-help="<?php echo esc_attr($help); ?>"></i><?php endif; ?>
	</div><br/>
	<div class="content">	
  		<div class="ui horizontal segments" data-reset="reset_button(new Event('click'),'.checklist_<?php echo esc_attr($filter['slug']); ?>')">
		<?php foreach ($filter['list'] as $term) : ?>
				<div class="ui segment wbc-button-input checklist_<?php echo esc_attr($filter['slug']); ?>" id='check_<?php echo esc_attr($term['slug']); ?>' data-slug="<?php echo esc_attr($term['slug']); ?>" data-filter-slug="<?php echo esc_attr($filter['slug']); ?>" >
			      <span><?php echo esc_html($term['name']); ?></span>
			    </div>			
			<?php endforeach; ?>
		</div>					    	  	
  	</div>	
</div>
