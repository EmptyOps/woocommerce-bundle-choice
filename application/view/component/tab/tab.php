<?php
/*
*	Generate tabs based on the parameters
*	$tab_data @array : contains details to draw tabs.
*	example:
*			array(	
*				'title'=>'page_title',
*				'menu_title'=>'page_menu_title',
*				'capability'=>'manage_options',
*				'slug'=>'page_slug',
*				'template'=>'path_to_template_filte',
*				'icon'=>'plugin_mini_icon_file',
*				'position'=>66
*				'submenu'=>array(
*								array(
*									'parent_slug'=>'page_slug',
*									'title'=>'submenu_title',
*									'menu_title'=>'submenu_menu_title',
*									'capability'=>'manage_options',
*									'slug'=>'submenu_slug',
*									'template'=>'path_to_template_filte',
*									'position'=>0
*								),...
*							)
*			)
*/

if(!empty($tab_data) and is_array($tab_data)){	

	wbc()->load->template('component/tab/tab-head',array('tabs'=>$tab_data));
	wbc()->load->template('component/tab/tab-content',array('tab_contents'=>$tab_data));
	?>
		<script type="text/javascript">
			jQuery('.menu .item').tab();
			jQuery('.ui.menu .item').off('click');
		</script>
		<style>
			.ui.bottom.attached.tab.segment.active{
				min-height: 75vh;
			}
		</style>
	<?php
}
