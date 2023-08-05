<?php 

/*
* Tab item
*
* $name @string : label of the tab 
* $slug @string : url friendly name of tab
* $status @integer : indicate wether the tab is active or not
*
*/
if(!empty($menu_title)/*($title)*/ || !empty($slug) || !empty($active))
{
	?>
	
		<a class="<?php if($active) echo 'active'; ?> item" data-tab="<?php echo esc_attr($slug)/*$slug*/; ?>" href="<?php _e(admin_url('admin.php?page='.$slug)); ?>"> <?php echo esc_attr($menu_title)/*$menu_title*//*$title*/; ?></a>

	<?php
 }
