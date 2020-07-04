<?php

/*
*	Template to show checkbox filters for mobile
*/

?>
	<div class="title">
	    <i class="dropdown icon"></i>		    
	    <?php echo($filter['title']); ?>
	    <?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo $filter['slug'] ?>')">&nbsp;<u>reset</u></span>	
		<?php endif; ?>
	</div>
  	<div class="content">	
  		<div class="ui tiny form" data-reset="reset_checkbox(new Event('click'),'.checklist_<?php echo $filter['slug'] ?>')">
		  	<?php foreach ($filter['list'] as $term) : ?>
				<div class="ui checkbox checked">
					<input type="checkbox" checked="checked" tabindex="0" class="hidden checklist_<?php echo $filter['slug'] ?>" id='check_<?php echo $term['slug']; ?>' data-slug="<?php echo $term['slug']; ?>" data-filter-slug="<?php echo $filter['slug']; ?>">
			        <label><?php echo $term['name']; ?></label>
			    </div>						
			<?php endforeach; ?>  
		</div>				    	  	
  	</div>		
	<?php
	