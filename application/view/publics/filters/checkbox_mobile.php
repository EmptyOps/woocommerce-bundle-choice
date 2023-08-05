<?php

/*
*	Template to show checkbox filters for mobile
*/

?>
	<div class="title" data-tab-group="<?php _e($tab_set); ?>">
	    <i class="dropdown icon"></i>		    
	    <?php echo esc_attr(($filter['title']))/*($filter['title'])*/; ?>
	    <?php if($help): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
		<?php endif; ?>
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>')">&nbsp;<u><?php spext_lang("reset", 'woo-bundle-choice') ?></u></span>
		<?php endif; ?>
	</div>
  	<div class="content">	
  		<div class="ui tiny form" data-reset="reset_checkbox(new Event('click'),'.checklist_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>')">
		  	<?php foreach ($filter['list'] as $term) : ?>
				<div class="ui checkbox checked">
					<input type="checkbox" checked="checked" tabindex="0" class="hidden checklist_<?php echo esc_attr($filter['slug'])/*$filter['slug']*/ ?>" id='check_<?php echo esc_attr($term['slug'])/*$term['slug']*/; ?>' data-slug="<?php echo esc_attr($term['slug'])/*$term['slug']*/; ?>" data-filter-slug="<?php echo esc_attr($filter['slug'])/*$filter['slug']*/; ?>">
			        <label><?php echo esc_html($term['name'])/*$term['name']*/; ?></label>
			    </div>						
			<?php endforeach; ?>  
		</div>				    	  	
  	</div>		
	<?php
	
