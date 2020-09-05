<?php
/*
*	Displays the header part of admin's page.
*/

if( empty($mode) || ( $mode != "setup_wizard" && $mode != "plain" ) ) { 
?>
<h2 class="ui header left aligned">   
	<img class="ui avatar image" src="https://www.emptyops.com/demo/zokri-shop/wp-content/uploads/2020/02/bundle_site_logo_2-1.svg" /> 
  <div class="content" style="height: 2em;"><?php echo constant('EOWBC_NAME'); ?>
      <div class="sub header" style="font-style: italic;">Thank you for installing <?php echo constant('EOWBC_NAME'); ?>! <?php echo eowbc_lang("Product bundling based on user's choice."); ?></div>  
     <i style="font-size: xxx-large;right: -180%;top: -0.75em;position: relative;" class="question circle outline eo_help icon" data-html="
      <div class='ui basic segments'>
        <!--<div class='ui compact segment'>
          <a style='cursor:pointer;' href='https://sphereplugins.com/woo-custom-filter-widget/docs/getting-started/' target='_blank'><i class='hands helping icon'></i>&nbsp;Documentation</a>
        </div>
        <div class='ui compact segment'>
          <a style='cursor:pointer;' href='https://sphereplugins.com/woo-custom-filter-widget/docs/shortcodes-for-filter-widgets/' target='_blank'><i class='file alternate icon'></i>&nbsp;Shortcode Docs</a>
        </div>
        <div class='ui compact segment'>
          <a style='cursor:pointer;' href='https://sphereplugins.com/woo-custom-filter-widget/docs/shop-category-page-filters/' target='_blank'><i class='file alternate icon'></i>&nbsp;Shop/Cat Filter Docs</a>
        </div> --!>
        <div class='ui compact segment'>
          <a style='cursor:pointer;' href='https://wordpress.org/support/plugin/woo-bundle-choice/' target='_blank'><i class='hands helping icon'></i>&nbsp;Contact Support</a>
        </div>
        <div class='ui compact segment'>
          <a style='cursor:pointer;' href='http://sphereplugins.com/contact-us' target='_blank'><i class='comment alternate icon'></i>&nbsp;Feature requests/ideas &amp; feedback</a>
        </div>
      </div>"></i>     
  </div> 
</h2>


<?php 
        $setup_wizard_status = wbc()->options->get_option('_system','setup_wizard_run', false);
        if( empty($setup_wizard_status) ) {
          
          echo ('<p><strong>It seems that you have not completed the setup wizard, <a class="ui link" href="'.admin_url('admin.php?page=eowbc&wbc_setup=1').'">we recommend that you visit it.</a></strong></p>');            
        }
}
else {
    if( $mode == "setup_wizard" ) { ?>

        <!-- header - comment it if its not full screen mode and setup wizard is loaded within wp admin page -->
        <html>
            <head>
                <meta name="viewport" content="width=device-width" />
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title><?php echo constant('EOWBC_NAME'); ?></title>
            </head>
            <body>
        <!-- END header -->

      <?php 
      wbc()->load->asset('css','fomantic/semantic.min',array(),'2.8.1',true);
      wbc()->load->asset('js','fomantic/semantic.min',array('jquery'),'2.8.1',true);
    }
}

