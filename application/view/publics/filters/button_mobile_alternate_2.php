<?php

/*
*	Template to show checkbox filters for mobile
*/

?>
	<div class="title" data-tab-group="<?php _e($tab_set); ?>">
	    
	    <?php echo($filter['title']); ?>
	    <?php if(!empty($help)): ?>
		<span class="ui grey text" style="cursor: pointer;color: #a5a5a5db;;"><i class="question circle icon" data-help="<?php _e($help); ?>"></i></span>
		<?php endif; ?>
		<i class="plus icon" style="position: absolute; right: 0;"></i>
	</div>
  	<div class="content">	
  		<div class="ui horizontal segments" data-reset="reset_button(new Event('click'),'.checklist_<?php echo $filter['slug'] ?>')">
		<?php foreach ($filter['list'] as $term) : ?>
			<div class="ui segment wbc-button-input checklist_<?php echo $filter['slug'] ?>" id='check_<?php echo $term['slug']; ?>' data-slug="<?php echo $term['slug']; ?>" data-filter-slug="<?php echo $filter['slug']; ?>" >
		      <span><?php echo $term['name']; ?></span>
		    </div>			
		<?php endforeach; ?>
	</div>					    	  	
  	</div>		
	<?php
	