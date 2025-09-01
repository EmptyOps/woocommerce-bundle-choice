<?php
        
    //Footer Rating bar :)
    add_filter( 'admin_footer_text',function($footer_text){
        /* translators: %1s: <strong> tag */
        /* translators: %2s: </strong> tag */
        /* translators: %3s: rating link */
        return "<p id='footer-left' class='alignleft'>".sprintf(__('If you like %1$s WooCommerce Bundle Choice %2$s please leave us a %3$s  rating. A huge thanks in advance!',"woo-bundle-choice"),"<strong>","</strong>","<a href='https://wordpress.org/support/plugin/woo-bundle-choice/reviews?rate=5#new-post' target='_blank' class='wc-rating-link' data-rated='Thanks :)'>★★★★★</a>")."</p>";
    });

    add_action('admin_head',function(){
        var_dump(plugins_url('/EO_WBC_CSS/flipswitch.css',__FILE__));
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
</style>
<div class="wrap woocommerce">
    <?php   EO_WBC_Head_Banner::get_head_banner(); ?>
    <br/>
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e('If you are facing any issue, please write to us immediately.','woo-bundle-choice'); ?></a></p>
    <br/>
    <hr/>
    <br/>   
    <h2><?php _e('Extra Features','woo-bundle-choice'); ?></h2>        
    <hr/>
    
    <form action="" method="post">
    	<input type="hidden" name="eo_wbc_action" value="eo_wbc_personalize">    
        <?php wp_nonce_field('eo_wbc_personalize'); ?>	
        <table cellspacing="30">            			
        	<tbody>    		
        		<tr>
                    <td class="extra-strong"><?php _e('Product page content','woo-bundle-choice'); ?></td>
                    <td>                    
                        <table cellspacing="30">        
                            <tr>                    
                                <td class="strong"><?php _e('Add to Cart Button Text','woo-bundle-choice'); ?></td>
                                <td>
                                    <input type="text" name="eo_wbc_add_to_cart_text" value="<?php echo get_option('eo_wbc_add_to_cart_text',''); ?>" style="width: 100%;">
                                    <div class="info">( <?php _e('Text to be shown on add to cart button on product page.','woo-bundle-choice');?> )</div>
                                </td>               
                            </tr>               
                        </table>
                    </td>
                </tr>
                <tr>
        			<td class="extra-strong"><?php _e('Home page content','woo-bundle-choice'); ?></td>
        			<td>    				
        				<table cellspacing="30">    	                           			
        					<tr>    				
        						<td class="strong"><?php _e('Custome Tagline','woo-bundle-choice'); ?></td>
        						<td>
        							<input type="text" name="eo_wbc_home_btn_tagline" value="<?php echo get_option('eo_wbc_home_btn_tagline',''); ?>" style="width: 100%;">
        							<div class="info">( <?php _e('Tiltle line under which button will appear.','woo-bundle-choice'); ?> )</div>
        						</td>    			
        					</tr>
        					<tr>    				
        						<td class="strong"><?php _e('Button Text','woo-bundle-choice'); ?></td>
        						<td>
        							<input type="text" name="eo_wbc_home_btn_text" value="<?php echo get_option('eo_wbc_home_btn_text',''); ?>" style="width: 100%;">
        							<div class="info">( <?php _e('Adds prefix text on button.','woo-bundle-choice'); ?> )</div>
        						</td>    			
        					</tr>        					 						    			
        					<tr>    				
        						<td class="strong"><?php _e('Default Button','woo-bundle-choice'); ?></td>
        						<td>                                    
        							<div class="flipswitch">
                                    	<input value="1" type="checkbox" name="eo_wbc_home_default_button" class="flipswitch-cb" id="button_status" <?php echo ( get_option('eo_wbc_home_default_button','0')==='0')?"checked='checked'":'';?>>
                                    	<label class="flipswitch-label" for="button_status">
                                            <div class="flipswitch-inner customize-button"></div>
                                            <div class="flipswitch-switch"></div>
        	                            </label>
                                	</div>
                                	<div class="info">( <?php _e('Use default button styling or custom styling.','woo-bundle-choice'); ?> )</div>
        						</td>    			
        					</tr>
        					<tr class="switch-button">    				
        						<td class="strong"><?php _e('Button Background Color','woo-bundle-choice'); ?></td>
        						<td>
        							<input type="color" name="eo_wbc_home_btn_color" value="<?php echo get_option('eo_wbc_home_btn_color','#4285f4'); ?>" style="width: 100%;">
        							<div class="info">( <?php _e('Set background color of button.','woo-bundle-choice'); ?> )</div>
        						</td>    			
        					</tr>    					
        					<tr class="switch-button">    				
        						<td class="strong"><?php _e('Button Hover Color','woo-bundle-choice'); ?></td>
        						<td>
        							<input type="color" name="eo_wbc_home_btn_hover_color" value="<?php echo get_option('eo_wbc_home_btn_hover_color','#4285f4'); ?>" style="width: 100%;">
        							<div class="info">( <?php _e('Color to show when mouse moves over button.','woo-bundle-choice'); ?> )</div>
        						</td>    			
        					</tr>
        					<tr class="switch-button">    				
        						<td class="strong"><?php _e('Button Border Color','woo-bundle-choice'); ?></td>
        						<td>
        							<input type="color" name="eo_wbc_home_btn_border_color" value="<?php echo get_option('eo_wbc_home_btn_border_color','#4285f4'); ?>" style="width: 100%;">
        							<div class="info">( <?php _e("Set button's border color.","woo-bundle-choice");?> )</div>
        						</td>    			
        					</tr>
        					<tr class="switch-button">    				
        						<td class="strong"><?php _e("Button Text Color","woo-bundle-choice");?></td>
        						<td>
        							<input type="color" name="eo_wbc_home_btn_text_color" value="<?php echo get_option('eo_wbc_home_btn_text_color','#000000'); ?>" style="width: 100%;">
        							<div class="info">( <?php _e('Set custome text color on button.',"woo-bundle-choice");?> )</div>
        						</td>    			
        					</tr>
        					<tr class="switch-button">    				
        						<td class="strong"><?php _e('Button Radius (px)',"woo-bundle-choice"); ?></td>
        						<td>
        							<input type="number" step="1" name="eo_wbc_home_btn_radius" value="<?php echo get_option('eo_wbc_home_btn_radius','5'); ?>" style="width: 100%;">
        							<div class="info">( <?php _e('Give button ronded corner effect.',"woo-bundle-choice"); ?> )</div>
        						</td>    			
        					</tr>
        				</table>
        				<hr/>
        			</td>
        			<td>&nbsp;</td>    			
        		</tr>
        		<tr>
        			<td class="extra-strong"><?php _e('Customize Breadcrumb',"woo-bundle-choice"); ?></td>
        			<td>    				
        				<table cellspacing="30">
        					<tr>    				
        						<td class="strong"><?php _e("Active Breadcrumb","woo-bundle-choice"); ?></td>
        						<td>
        							<input type="color" name="eo_wbc_active_breadcrumb_color" value="<?php echo get_option('eo_wbc_active_breadcrumb_color')?get_option('eo_wbc_active_breadcrumb_color'):'#4285f4'; ?>" style="width: 100%;">
        							<div class="info">( <?php _e("Color for crumb currently in use.","woo-bundle-choice"); ?> )</div>
        						</td>    			
        					</tr>
        					<tr>    				
        						<td class="strong"><?php _e("Non-Active Breadcrumb","woo-bundle-choice"); ?></td>
        						<td>
        							<input type="color" name="eo_wbc_non_active_breadcrumb_color" value="<?php echo get_option('eo_wbc_non_active_breadcrumb_color')?get_option('eo_wbc_non_active_breadcrumb_color'):'#4285f4'; ?>" style="width: 100%;">
        							<div class="info">( <?php _e("Color for crumb currently not in use.","woo-bundle-choice"); ?> )</div>
        						</td>    			
        					</tr>    					
        					<tr>    				
        						<td class="strong"><?php _e("Radius (px)","woo-bundle-choice"); ?></td>
        						<td>
        							<input type="number" step="1" name="eo_wbc_breadcrumb_radius" value="<?php echo get_option('eo_wbc_breadcrumb_radius')?get_option('eo_wbc_breadcrumb_radius'):'0'; ?>" style="width: 100%;">
        							<div class="info">( <?php _e("Give rounded corner effect to breadcrumb.","woo-bundle-choice"); ?> )</div>
        						</td>
        					</tr>    			
        					<tr>    				
        						<td class="strong"><?php _e("Show/Hide Icons","woo-bundle-choice"); ?></td>
        						<td>                                    
        							<div class="flipswitch">
                                    	<input type="checkbox" name="eo_wbc_show_hide_breadcrumb_icon" class="flipswitch-cb" id="icon_status" <?php echo get_option('eo_wbc_show_hide_breadcrumb_icon','0') ==='0' ?'':'checked="checked"' ?> >
                                    	<label class="flipswitch-label" for="icon_status">
                                            <div class="flipswitch-inner"></div>
    	                                    <div class="flipswitch-switch"></div>
        	                            </label>
                                	</div>
                                	<div class="info" style="max-width: 250px !important;padding-top: 3px;" >( <?php printf(__('You can upload icon from configuration page, click here to go to %s'),'<a href="'.admin_url('admin.php?page=eo-wbc-setting').'">configuration.</a>'); ?> )</div>
        						</td>    			
        					</tr>		
        				</table>
        				<hr/>
        			</td>
        			<td>&nbsp;</td>    			
        		</tr>    		    		
        		<tr>
        			<td></td>
        			<td></td>
        			<td>
        				<button class="button button-primary button-hero action" style="float: right"><?php _e("Save Settings","woo-bundle-choice"); ?></button>
        			</td>
        		</tr>
    		</tbody>
    	</table>
    </form>

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