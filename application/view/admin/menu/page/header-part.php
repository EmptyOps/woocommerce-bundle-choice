<?php
/*
*	Displays the header part of admin's page.
*/

if( empty($mode) || $mode != "setup_wizard" ) { 
?>
<h2 class="ui header center aligned">   
	<img class="ui avatar image" src="https://www.emptyops.com/demo/zokri-shop/wp-content/uploads/2020/02/bundle_site_logo_2-1.svg" /> 
    <div class="content"><?php echo constant('EOWBC_NAME'); ?><?php echo constant('EOWBC_VERSION'); ?>
        <div class="sub header" style="font-style: italic;">Thank you for installing <?php echo constant('EOWBC_NAME'); ?>! <?php echo eowbc_lang("Product bundling based on user's choice."); ?></div>
    </div>
</h2>
<?php 
}

