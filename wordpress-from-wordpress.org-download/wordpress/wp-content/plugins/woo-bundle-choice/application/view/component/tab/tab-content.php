<?php 

/*
* Tab content
*
* $content @string : contains details of tab html
* $slug @string : url friendly name of tab
* $status @integer : indicate wether the tab is active or not
*/

if(!empty($tab_contents) || is_array($tab_contents)) { 
	
	foreach ($tab_contents as $tab_content) {		

		/*
		*	the below changes are made by mahesh@emptyops.com to make single tab load.
		*/

		/**
			if(array_key_exists('content',$tab_content) and array_key_exists('active',$tab_content) and array_key_exists('slug',$tab_content) and !empty($tab_content['active']) ) { ?>
		**/

		if(array_key_exists('content',$tab_content) and array_key_exists('active',$tab_content) and array_key_exists('slug',$tab_content) and !empty($tab_content['active']) ) { ?>

		  	<div class="ui bottom attached <?php if($tab_content['active']) echo 'active'; ?> tab segment" data-tab="<?php echo $tab_content['slug']; ?>">
		  		<?php echo $tab_content['content']; ?>		  
		  	</div>
		<?php }
	}
}