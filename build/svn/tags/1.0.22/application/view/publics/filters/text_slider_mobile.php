<?php

/*
*	Template to show text slider filters for mobile
*/

?>
	<div class="title" data-tab-group="<?php _e($tab_set); ?>">
	    <i class="dropdown icon"></i>		    
	    <?php echo $filter['title']; ?>
	    <?php if($help): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
		<?php endif; ?>
		<?php if($reset): ?>
		&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_slider(event,'<?php echo $filter['slug'] ?>','<?php echo $filter['min_value']['name']; ?>','<?php echo $filter['max_value']['name']; ?>')">&nbsp;<u>reset</u></span>
		<?php endif; ?>
	</div>
  	<div class="content">	
  		<div class="ui tiny form">
		  <div class="two fields">
		    <div class="field" style="width: fit-content !important;">	      
		      <input value="<?php echo $filter['min_value']['name']; ?>" type="text" class="text_slider_<?php echo $filter['slug'] ?> aligned left" name="text_min_<?php echo $filter['slug'] ?>">
		    </div>			    
		    <div class="field" style="position: absolute;right: 0px;width: fit-content !important;">
		      <input value="<?php echo $filter['max_value']['name']; ?>" type="text" class="text_slider_<?php echo $filter['slug'] ?> aligned right" name="text_max_<?php echo $filter['slug'] ?>">
		    </div>
		  </div>	  
		</div>				    
  		<div class="ui range slider text_slider wbc" id="text_slider_<?php echo $filter['slug'] ?>" data-min="<?php echo $filter['min_value']['name']; ?>" data-max="<?php echo $filter['max_value']['name']; ?>" data-slug="<?php echo $filter['slug'] ?>" data-reset="reset_slider(new Event('click'),'<?php echo $filter['slug'] ?>','<?php echo $filter['min_value']['name']; ?>','<?php echo $filter['max_value']['name']; ?>')"></div>
  	</div>		
	<?php
	