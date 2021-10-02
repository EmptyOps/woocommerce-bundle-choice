<?php

/*
*	Template for the accordian bein sysntex.
*	Created by mahesh@emptyops.com
*/
if(!empty($section_type)){

	switch ($section_type) {

		case 'start':
			if(!empty($label)){
				?></div>
				<div class="ui accordion <?php echo !empty($class)?$class:''; ?>">
					<div class="title <?php echo !empty($class)?$class:''; ?>">
				    	<i class="icon dropdown"></i>
				    	<?php _e($label,'woo-bundle-choice'); ?>
					</div>
					<div class="content <?php echo !empty($class)?$class:''; ?>">
					<div><?php	
			}		
			break;
		/*case 'section':*/
			/*if(!empty($label)){
				?></div>
				<div class="title <?php echo !empty($class)?$class:''; ?>">
				    <i class="icon dropdown"></i>
				    <?php _e($label,'woo-bundle-choice'); ?>
				</div>
				<div class="content <?php echo !empty($class)?$class:''; ?>"><div>
				<?php
			}
			break;*/
		case 'end':			
			?></div></div><?php
			break;
		default:			
			break;
	}
}