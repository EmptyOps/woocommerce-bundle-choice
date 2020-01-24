<?php
    
    wp_register_style( 'eo-wbc-ui',plugin_dir_url(EO_WBC_PLUGIN_FILE).'css/fomantic/semantic.min.css');
    wp_enqueue_style( 'eo-wbc-ui');      

    wp_register_script( 'eo-wbc-ui',plugin_dir_url(EO_WBC_PLUGIN_FILE).'js/fomantic/semantic.min.js');
    wp_enqueue_script( 'eo-wbc-ui' );  

    add_action('admin_head',function(){        
        echo '<link rel="stylesheet" href="'.plugins_url('/EO_WBC_CSS/flipswitch.css',__FILE__).'" type="text/css" media="all" />';

    })
?>

<style type="text/css">
    .strong,.extra-strong{
        font-weight: bold;
        padding-top: 0px;
        text-align: center;
        vertical-align: text-top;
        vertical-align: initial;
    }
    .extra-strong{
        font-size: medium;
    }
    .info{
        color: grey !important;
    }
    input[type='color']{
        min-width: 5em;
    }
    .flipswitch{
        display: inline-flex;
    }
</style>
<div class="wrap woocommerce">
    <h1></h1>
    <?php   EO_WBC_Head_Banner::get_head_banner(); ?>
    <br/>
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e('If you are facing any issue, please write to us immediately.','woo-bundle-choice'); ?></a></p>
    <br/>   
    <?php do_action('eo_wbc_menu_tabs','eo-wbc-personalize'); ?>
    <hr/>    
    <form action="" method="post">
    	<input type="hidden" name="eo_wbc_action" value="eo_wbc_personalize">    
        <?php wp_nonce_field('eo_wbc_personalize'); ?>	

        <div class="ui top attached tabular menu">            
            <a class="item" data-tab="widget_buttons">Widget Buttons</a>
            <a class="item" data-tab="breadcrumb">Breadcrumb</a>
            <a class="item" data-tab="filters">Filters</a>
            <a class="item active" data-tab="product_page">Product Page</a>
        </div>        
        <div class="ui bottom attached tab segment" data-tab="widget_buttons">
          <h3>Widget Buttons Settings</h3>
          <div class="ui form">
              <div class="inline field">
                    <label><?php _e('Custome Tagline','woo-bundle-choice'); ?></label>
                    <input type="text" name="eo_wbc_home_btn_tagline" value="<?php echo get_option('eo_wbc_home_btn_tagline',''); ?>">
                    <div class="info">( <?php _e('Tiltle line under which button will appear.','woo-bundle-choice'); ?> )</div>
              </div>
              <div class="inline field">
                    <label><?php _e('Button Text','woo-bundle-choice'); ?></label>
                    <input type="text" name="eo_wbc_home_btn_text" value="<?php echo get_option('eo_wbc_home_btn_text',''); ?>">
                    <div class="info">( <?php _e('Adds prefix text on button.','woo-bundle-choice'); ?> )</div>
              </div>
              <div class="inline field">
                    <label><?php _e('Default Button','woo-bundle-choice'); ?></label>
                    <div class="flipswitch">
                        <input value="1" type="checkbox" name="eo_wbc_home_default_button" class="flipswitch-cb" id="button_status" <?php echo ( get_option('eo_wbc_home_default_button','0')==='0')?"checked='checked'":'';?>>
                        <label class="flipswitch-label" for="button_status">
                            <div class="flipswitch-inner customize-button"></div>
                            <div class="flipswitch-switch"></div>
                        </label>
                    </div>
                    <div class="info">( <?php _e('Use default button styling or custom styling.','woo-bundle-choice'); ?> )</div>
              </div>
              <div class="inline field">
                    <label><?php _e('Button Background Color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_home_btn_color" value="<?php echo get_option('eo_wbc_home_btn_color','#4285f4'); ?>">
                    <div class="info">( <?php _e('Set background color of button.','woo-bundle-choice'); ?> )</div>
              </div>
              <div class="inline field">
                    <label><?php _e('Button Hover Color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_home_btn_hover_color" value="<?php echo get_option('eo_wbc_home_btn_hover_color','#4277F4'); ?>">
                    <div class="info">( <?php _e('Color to show when mouse moves over button.','woo-bundle-choice'); ?> )</div>
              </div>
              <div class="inline field hidden">
                    <label><?php _e('Button Border Color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_home_btn_border_color" value="<?php echo get_option('eo_wbc_home_btn_border_color','#4285f4'); ?>">
                    <div class="info">( <?php _e("Set button's border color.","woo-bundle-choice");?> )</div>
              </div>
              <div class="inline field">
                    <label><?php _e('Button Text Color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_home_btn_text_color" value="<?php echo get_option('eo_wbc_home_btn_text_color','#ffffff'); ?>">
                    <div class="info">( <?php _e('Set custome text color on button.',"woo-bundle-choice");?> )</div>
              </div>
              <div class="inline field">
                    <label><?php _e('Button Radius (px)','woo-bundle-choice'); ?></label>
                    <input type="number" step="1" name="eo_wbc_home_btn_radius" style="height: 2.5em;" value="<?php echo get_option('eo_wbc_home_btn_radius','5'); ?>">
                    <div class="info">( <?php _e('Give button ronded corner effect.',"woo-bundle-choice"); ?> )</div>
              </div>              

          </div>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="breadcrumb">
          <h3>Breadcrumbs Settings</h3>
            <div class="ui form">

                <div class="inline field">
                    <label><?php _e('Active Breadcrumb','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_active_breadcrumb_color" value="<?php echo get_option('eo_wbc_active_breadcrumb_color')?get_option('eo_wbc_active_breadcrumb_color'):'#4285f4'; ?>" >
                    <div class="info">( <?php _e("Color for crumb currently in use.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Inactive Breadcrumb','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_non_active_breadcrumb_color" value="<?php echo get_option('eo_wbc_non_active_breadcrumb_color')?get_option('eo_wbc_non_active_breadcrumb_color'):'#78ABFF'; ?>" >
                    <div class="info">( <?php _e("Color for crumb currently not in use.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Radius (px)','woo-bundle-choice'); ?></label>
                    <input type="number" step="1" name="eo_wbc_breadcrumb_radius" style="height: 2.5em;" value="<?php echo get_option('eo_wbc_breadcrumb_radius')?get_option('eo_wbc_breadcrumb_radius'):'0'; ?>">
                    <div class="info">( <?php _e("Give rounded corner effect to breadcrumb.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Breadcrumb number/icon active color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_breadcrumb_icon_color_active" value="<?php echo get_option('eo_wbc_breadcrumb_icon_color_active')?get_option('eo_wbc_breadcrumb_icon_color_active'):'#4285f4'; ?>" >
                    <div class="info">( <?php _e("Color for icon(fontawsome)/number on active breadcrumb.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Breadcrumb number/icon inactive color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_breadcrumb_icon_color_inactive" value="<?php echo get_option('eo_wbc_breadcrumb_icon_color_inactive')?get_option('eo_wbc_breadcrumb_icon_color_inactive'):'#4285f4'; ?>" >
                    <div class="info">( <?php _e("Color for icon(fontawsome)/number on inactive breadcrumb.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Breadcrumb title active color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_breadcrumb_title_color_active" value="<?php echo get_option('eo_wbc_breadcrumb_title_color_active')?get_option('eo_wbc_breadcrumb_title_color_active'):'#4285f4'; ?>" >
                    <div class="info">( <?php _e("Color for title(category) on active breadcrumb.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Breadcrumb title inactive color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_breadcrumb_title_color_inactive" value="<?php echo get_option('eo_wbc_breadcrumb_title_color_inactive')?get_option('eo_wbc_breadcrumb_title_color_inactive'):'#4285f4'; ?>" >
                    <div class="info">( <?php _e("Color for title(category) on inactive breadcrumb.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Breadcrumb actions active color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_breadcrumb_action_color_active" value="<?php echo get_option('eo_wbc_breadcrumb_action_color_active')?get_option('eo_wbc_breadcrumb_action_color_active'):'#4285f4'; ?>" >
                    <div class="info">( <?php _e("Color for actions on active breadcrumb.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Breadcrumb actions inactive color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_breadcrumb_action_color_inactive" value="<?php echo get_option('eo_wbc_breadcrumb_action_color_inactive')?get_option('eo_wbc_breadcrumb_action_color_inactive'):'#4285f4'; ?>" >
                    <div class="info">( <?php _e("Color for actions on inactive breadcrumb.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Show/Hide Icons','woo-bundle-choice'); ?></label>
                    <div class="flipswitch">
                        <input type="checkbox" name="eo_wbc_show_hide_breadcrumb_icon" class="flipswitch-cb" id="icon_status" <?php echo get_option('eo_wbc_show_hide_breadcrumb_icon','0') ==='0' ?'':'checked="checked"' ?> >
                        <label class="flipswitch-label" for="icon_status">
                            <div class="flipswitch-inner"></div>
                            <div class="flipswitch-switch"></div>
                        </label>
                    </div>
                    <div class="info" style="max-width: 250px !important;padding-top: 3px;" >( <?php printf(__('You can upload icon from configuration page, click here to go to %s'),'<a href="'.admin_url('admin.php?page=eo-wbc-setting').'">configuration.</a>'); ?> )</div>
                </div>
            </div>
        </div>
         <div class="ui bottom attached tab segment active" data-tab="filters">
          <h3>Filters Settings</h3>
           <div class="ui form">

                <div class="inline field">
                    <label><?php _e('Header font style','woo-bundle-choice'); ?></label>
                    <input type="text" name="eo_wbc_filter_config_font_family" value="<?php echo get_option('eo_wbc_filter_config_font_family',''); ?>" >
                    <div class="info">( <?php _e("Font family to be used in filters.","woo-bundle-choice"); ?> )</div>
                </div>

                <div class="inline field">
                    <label><?php _e('Header font color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_filter_config_header_color" value="<?php echo get_option('eo_wbc_filter_config_header_color','#4285f4'); ?>" >
                    <div class="info">( <?php _e("Color for headers in filters widget.","woo-bundle-choice"); ?> )</div>
                </div>

                <div class="inline field">
                    <label><?php _e('Labels color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_filter_config_label_color" value="<?php echo get_option('eo_wbc_filter_config_label_color','#4285f4'); ?>" >
                    <div class="info">( <?php _e("Color for crumb currently not in use.","woo-bundle-choice"); ?> )</div>
                </div>

                <div class="inline field">
                    <label><?php _e('Slider nodes color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_filter_config_slidernode_color" value="<?php echo get_option('eo_wbc_filter_config_slidernode_color','#4285f4'); ?>" >
                    <div class="info">( <?php _e("Color for slidable node over sliders.","woo-bundle-choice"); ?> )</div>
                </div>

                <div class="inline field">
                    <label><?php _e('Slider track color','woo-bundle-choice'); ?></label>
                    <input type="color" name="eo_wbc_filter_config_slidertrack_color" value="<?php echo get_option('eo_wbc_filter_config_slidertrack_color','#4285f4'); ?>">
                    <div class="info">( <?php _e("Color for slider's track between nodes.","woo-bundle-choice"); ?> )</div>
                </div>

                <div class="inline field">
                    <label><?php _e('Icon Size','woo-bundle-choice'); ?></label>
                    <input type="text" name="eo_wbc_filter_config_icon_size" value="<?php echo get_option('eo_wbc_filter_config_icon_size','50px'); ?>">
                    <div class="info">( <?php _e("Define size of icon at filter in px.","woo-bundle-choice"); ?> )</div>
                </div>
                <div class="inline field">
                    <label><?php _e('Icon label size','woo-bundle-choice'); ?></label>
                    <input type="text" name="eo_wbc_filter_config_icon_label_size" value="<?php echo get_option('eo_wbc_filter_config_icon_label_size','0.78571429rem'); ?>">
                    <div class="info">( <?php _e("Define size of icon label in rem.","woo-bundle-choice"); ?> )</div>
                </div>
            </div>
        </div>

        <div class="ui bottom attached tab segment" data-tab="product_page">
          <h3><?php _e('Product Page Settings','woo-bundle-choice'); ?></h3>
          <div class="ui form">
              <div class="inline field">
                  <label><?php _e('First Category Add to Cart Button Text','woo-bundle-choice'); ?></label>
                  <input type="text" name="eo_wbc_add_to_cart_text_first" value="<?php echo get_option('eo_wbc_add_to_cart_text_first',''); ?>">
                  <div class="info">( <?php _e('Text to be shown on add to cart button on product page for the first category.','woo-bundle-choice');?> )</div>
              </div>

              <div class="inline field">
                  <label><?php _e('Second Category Add to Cart Button Text','woo-bundle-choice'); ?></label>
                  <input type="text" name="eo_wbc_add_to_cart_text_second" value="<?php echo get_option('eo_wbc_add_to_cart_text_second',''); ?>">
                  <div class="info">( <?php _e('Text to be shown on add to cart button on product page for the second category.','woo-bundle-choice');?> )</div>
              </div>
          </div>
        </div>         

        <button class="ui submit button button-primary button-hero action" style="float: right"><?php _e("Save Settings","woo-bundle-choice"); ?></button>

        <script>
            jQuery(document).ready(function($){
                $('.menu .item').tab();
            });
        </script>	        				
        			
    </form>
</div>
<?php EO_WBC_Head_Banner::get_footer_line(); ?>

<script>
    jQuery(document).ready(function($){
        $("#button_status").on('change',function(){
            if(this.checked) {
                $(".switch-button").hide();
            }
            else{
                $(".switch-button").show();
            }
        }).trigger('change');
    });
</script>