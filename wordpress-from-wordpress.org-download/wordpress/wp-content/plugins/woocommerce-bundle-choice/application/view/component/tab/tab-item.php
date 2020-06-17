<?php 

/*
* Tab item
*
* $name @string : label of the tab 
* $slug @string : url friendly name of tab
* $status @integer : indicate wether the tab is active or not
*
*/
if(!empty($title) || !empty($slug) || !empty($active))
{
	?>
	
		<a class="<?php if($active) echo 'active'; ?> item" data-tab="<?php echo $slug; ?>"> <?php echo $title; ?></a>

	<?php
 }