<?php
/*
*	Displays the header part of admin's page.
*/

if( empty($mode) || ( $mode != "setup_wizard" && $mode != "plain" ) ) { 

    $singleton_function = "wbc";
    $plugin_slug = "woo-bundle-choice";
    if( isset($SP_Extension) ) {
      $singleton_function = $SP_Extension->singleton_function();
      $plugin_slug = $SP_Extension->extension_slug();
      $singleton_functionUpper = strtoupper( $singleton_function );
    }

?>
<div class="ui basic segment">
  <div class="ui aligned grid" style="margin-top:1em;">
    <h2 class="ui header left aligned left floated ">   
        <img class="ui avatar image" src="<?php echo esc_url(constant('EOWBC_ICON_SVG'))/*constant('EOWBC_ICON_SVG')*/; ?>" / style="margin-top: 0px !important"> 
        <div class="content" style="height: 2em;"><?php echo !isset($SP_Extension) ? esc_html(constant('EOWBC_NAME')) : esc_html(constant($singleton_functionUpper.'_NAME')) ; ?>

            <?php 
                $desc = "";
                if( !isset($SP_Extension) ) {
                    $desc = "Thank you for installing ".constant('EOWBC_NAME')."! ".eowbc_lang("Product bundling as per user's choice.");
                }
                else {
                    $desc = "Thank you for installing ".constant($singleton_functionUpper.'_NAME')."! ";
                }
            ?>
            <div class="sub header" style="font-style: italic;"><?php echo esc_html($desc)/*$desc*/; ?></div>  

        </div> 
    </h2>
    <i class="right floated question circle outline eo_help icon eowbc_help_context" data-html="
          <div class='ui basic segments'>
            <?php if( !isset($SP_Extension) ) { ?>
              <div class='ui compact segment'>
                <a style='cursor:pointer;' href='https://sphereplugins.com/docs/woo-choice-plugin/getting-started/installation-and-setup/' target='_blank'><i class='hands helping icon'></i>&nbsp;Documentation</a>
              </div>
            <?php } ?>

            <!--            <div class='ui compact segment'>
              <a style='cursor:pointer;' href='https://sphereplugins.com/woo-custom-filter-widget/docs/shortcodes-for-filter-widgets/' target='_blank'><i class='file alternate icon'></i>&nbsp;Shortcode Docs</a>
            </div>
            <div class='ui compact segment'>
              <a style='cursor:pointer;' href='https://sphereplugins.com/woo-custom-filter-widget/docs/shop-category-page-filters/' target='_blank'><i class='file alternate icon'></i>&nbsp;Shop/Cat Filter Docs</a>
            </div> --!>
            <?php 

              if( !empty($singleton_function) )
              {
                if( isset($singleton_function()->config) && method_exists($singleton_function()->config, 'required_hooks_n_filters_etc') )
                {
                  $config = $singleton_function()->config->required_hooks_n_filters_etc();
                  if( is_array($config) && sizeof($config) > 0 ) {
            ?>
                    <div class='ui compact segment'>
                        <a style='cursor:pointer;' href='<?php echo esc_url(admin_url('admin.php?page='.$plugin_slug.'---theme-adaption'))/*admin_url('admin.php?page='.$plugin_slug.'---theme-adaption')*/; ?>'><i class='hands helping icon'></i>&nbsp;Theme Adaption Check</a>
                    </div>
            <?php 
                  }
                } 
              }
            ?>
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
          
         echo ('<h4 class="ui dividing header">Attention!</h4><p><span class="ui red text"><strong>It seems that you have not completed the setup wizard, <a class="ui link" href="'.esc_url(admin_url('admin.php?page=eowbc&wbc_setup=1'))/*admin_url('admin.php?page=eowbc&wbc_setup=1')*/.'">we recommend that you visit it.</a></strong><span></p>');  
        }
}
else {
    if( $mode == "setup_wizard" ) { ?>

        <!-- header - comment it if its not full screen mode and setup wizard is loaded within wp admin page -->
        <html>
            <head>
                <meta name="viewport" content="width=device-width" />
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title><?php echo esc_html(constant('EOWBC_NAME'))/*constant('EOWBC_NAME')*/; ?></title>
            </head>
            <body>
        <!-- END header -->

      <?php 
      // -- commented on 01-12-2023 @a
      // wbc()->load->asset('css','fomantic/semantic.min',array(),'2.8.1',true);
      // wbc()->load->asset('js','fomantic/semantic.min',array('jquery'),'2.8.1',true);
      wbc()->load->asset('js','',array('jquery'),'',true);
      wbc()->load->built_in_asset('direct_load_semantic');
    }
}

