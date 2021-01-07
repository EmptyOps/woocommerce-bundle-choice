<?php

/*
*	Template to show text slider filters for desktop
*/

?>
	<div class="<?php echo $width_class; ?>" data-tab-group="<?php _e($tab_set); ?>">
		<p>
			<span class="ui header"><?php echo $filter['title']; ?></span>
			<?php if($help): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php _e($help); ?>"></i></span>
			<?php endif; ?>
			<?php if($reset): ?>
			&nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_slider(event,'<?php echo $filter['slug'] ?>','<?php echo $filter['min_value']['name']; ?>','<?php echo $filter['max_value']['name']; ?>')">&nbsp;<u>reset</u></span>
			<?php endif; ?>
		</p>

		<div class="ui tiny form">
		  <div class="three fields">
		    <div class="field">	      
		      <input value="<?php echo ($filter['seprator']=='.'?$filter['min_value']['name']:str_replace('.',',',$filter['min_value']['name'])); ?>" type="text" class="text_slider_<?php echo $filter['slug'] ?> aligned left" name="text_min_<?php echo $filter['slug'] ?>">
		    </div>
		    <div class="field"></div>
		    <div class="field">	      
		      <input value="<?php echo ($filter['seprator']=='.'?$filter['max_value']['name']:str_replace('.',',',$filter['max_value']['name'])); ?>" type="text" class="text_slider_<?php echo $filter['slug'] ?> aligned right" name="text_max_<?php echo $filter['slug'] ?>">
		    </div>
		  </div>	  
		</div>			
		<div class="ui range slider text_slider wbc" id="text_slider_<?php echo $filter['slug'] ?>" data-min="<?php echo $filter['min_value']['name']; ?>" data-max="<?php echo $filter['max_value']['name']; ?>" data-slug="<?php echo $filter['slug'] ?>" data-sep="<?php echo $filter['seprator']; ?>" data-reset="reset_slider(new Event('click'),'<?php echo $filter['slug'] ?>','<?php echo $filter['min_value']['name']; ?>','<?php echo $filter['max_value']['name']; ?>')"></div>
	</div>
	<?php
	