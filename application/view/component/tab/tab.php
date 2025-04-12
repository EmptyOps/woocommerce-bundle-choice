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

	// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
	$inline_script = 
		"jQuery('.menu .item').tab();\n" .
		"jQuery('.ui.menu .item').off('click');";

	wbc()->load->add_inline_script('', $inline_script, 'common-admin');
	?>	
	<?php 
	
        //NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css = "

	    .ui.bottom.attached.tab.segment.active{
	        min-height: 75vh;
	    }
    	";
   		 wbc()->load->add_inline_style('', $custom_css,'common');
}
    ?>
