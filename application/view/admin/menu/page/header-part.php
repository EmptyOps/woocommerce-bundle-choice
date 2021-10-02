<?php
/*
*	Displays the header part of admin's page.
*/

if( empty($mode) || ( $mode != "setup_wizard" && $mode != "plain" ) ) { 
?>
<div class="ui basic segment">
  <div class="ui aligned grid" style="margin-top:1em;">
    <h2 class="ui header left aligned left floated ">   
    	<img class="ui avatar image" src="<?php echo constant('EOWBC_ICON_SVG'); ?>" / style="margin-top: 0px !important"> 
      <div class="content" style="height: 2em;"><?php echo constant('EOWBC_NAME'); ?>
          <div class="sub header" style="font-style: italic;">Thank you for installing <?php echo constant('EOWBC_NAME'); ?>! <?php echo eowbc_lang("Product bundling as per user's choice."); ?></div>  
             
      </div> 
    </h2>
    <i class="right floated question circle outline eo_help icon eowbc_help_context" data-html="
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
        <style type="text/css">
          .eowbc_help_context{
            font-size: xxx-large !important;
            position: absolute !important;
            right: 1em !important;
            /*top: 1.4em !important;*/
          }
          @media only screen and (max-width: 678px) {
            .eowbc_help_context{            
              right: 0.5em !important;

              /*top: 3em !important;*/
            }
          }
        </style>

  </div>
</div>

<?php 
        $setup_wizard_status = wbc()->options->get_option('_system','setup_wizard_run', false);
        if( empty($setup_wizard_status) ) {
          
          echo ('<h4 class="ui dividing header">Attention!</h4><p><span class="ui red text"><strong>It seems that you have not completed the setup wizard, <a class="ui link" href="'.admin_url('admin.php?page=eowbc&wbc_setup=1').'">we recommend that you visit it.</a></strong><span></p>');            
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

