<?php

/*
*	Template to show checkbox filters for mobile
*/

?>			
<div class="ui four wide column toggle_sticky_mob_filter <?php echo $advance?'advance_filter_mob':'' ?>"  style="<?php echo $advance?'display: none;':'' ?>" data-target="#sticky_mob_filter_<?php echo $filter['slug']; ?>" data-tab-group="<?php _e($tab_set); ?>">
	<div class="title"><div class="ui segment">
		<?php echo($filter['title']); ?></div>
	</div>
</div>
<div class="bottom_filter_segment hidden ui segment" id="sticky_mob_filter_<?php echo $filter['slug']; ?>">
		<div class="ui equal width grid">
				<div class="column close_sticky_mob_filter" data-target="#sticky_mob_filter_<?php echo $filter['slug']; ?>">
					<i class="ui icon times" style="cursor: pointer;"></i>&nbsp;Close
				</div>
				<div class="column"></div>
				<div class="column"></div>
				<div class="column" style="text-align: right;" onclick="reset_checkbox(event,'.checklist_<?php echo $filter['slug']; ?>')">
					<i class="ui icon redo" style="cursor: pointer;"></i>&nbsp;Reset
				</div>
		</div>					
	<br/>
	<div class="ui title">
		<strong><?php echo($filter['title']); ?></strong><?php if(!empty($help)): ?>&nbsp;<i class="question circle outline icon" data-help="<?php echo $help; ?>"></i><?php endif; ?>
	</div><br/>
	<div class="content">	
  		<div class="ui horizontal segments" data-reset="reset_button(new Event('click'),'.checklist_<?php echo $filter['slug'] ?>')">
		<?php foreach ($filter['list'] as $term) : ?>
				<div class="ui segment wbc-button-input checklist_<?php echo $filter['slug'] ?>" id='check_<?php echo $term['slug']; ?>' data-slug="<?php echo $term['slug']; ?>" data-filter-slug="<?php echo $filter['slug']; ?>" >
			      <span><?php echo $term['name']; ?></span>
			    </div>			
			<?php endforeach; ?>
		</div>					    	  	
  	</div>	
</div>