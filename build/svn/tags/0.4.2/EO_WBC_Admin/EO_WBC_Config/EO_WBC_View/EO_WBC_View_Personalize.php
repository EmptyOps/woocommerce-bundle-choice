<?php

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
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank">If you are facing any issue, please write to us immediately.</a></p>
    <br/>
    <hr/>
    <br/>   
    <h2>Extra Features</h2>        
    <hr/>
    
    <form action="" method="post">
    	<input type="hidden" name="eo_wbc_action" value="eo_wbc_personalize">    
        <?php wp_nonce_field('eo_wbc_personalize'); ?>	
        <table cellspacing="30">            			
        	<tbody>    		
        		<tr>
        			<td class="extra-strong">Home page content</td>
        			<td>    				
        				<table cellspacing="30">    					
        					<tr>    				
        						<td class="strong">Custome Tagline</td>
        						<td>
        							<input type="text" name="eo_wbc_home_btn_tagline" value="<?php echo get_option('eo_wbc_home_btn_tagline')?get_option('eo_wbc_home_btn_tagline'):''; ?>" style="width: 100%;">
        							<div class="info">( Tiltle line under which button will appear. )</div>
        						</td>    			
        					</tr>
        					<tr>    				
        						<td class="strong">Button Text</td>
        						<td>
        							<input type="text" name="eo_wbc_home_btn_text" value="<?php echo get_option('eo_wbc_home_btn_text')?get_option('eo_wbc_home_btn_text'):''; ?>" style="width: 100%;">
        							<div class="info">( Adds prefix text on button. )</div>
        						</td>    			
        					</tr>        					 						    			
        					<tr>    				
        						<td class="strong">Default Button</td>
        						<td>                                    
        							<div class="flipswitch">
                                    	<input value="1" type="checkbox" name="eo_wbc_home_default_button" class="flipswitch-cb" id="button_status" <?php echo ( get_option('eo_wbc_home_default_button') OR get_option('eo_wbc_home_default_button')==='0')?'':"checked='checked'";?>>
                                    	<label class="flipswitch-label" for="button_status">
                                            <div class="flipswitch-inner customize-button"></div>
                                            <div class="flipswitch-switch"></div>
        	                            </label>
                                	</div>
                                	<div class="info">( Use default button styling or custom styling. )</div>
        						</td>    			
        					</tr>
        					<tr class="switch-button">    				
        						<td class="strong">Button Background Color</td>
        						<td>
        							<input type="color" name="eo_wbc_home_btn_color" value="<?php echo get_option('eo_wbc_home_btn_color')?get_option('eo_wbc_home_btn_color'):'#4285f4'; ?>" style="width: 100%;">
        							<div class="info">( Set background color of button. )</div>
        						</td>    			
        					</tr>    					
        					<tr class="switch-button">    				
        						<td class="strong">Button Hover Color</td>
        						<td>
        							<input type="color" name="eo_wbc_home_btn_hover_color" value="<?php echo get_option('eo_wbc_home_btn_hover_color')?get_option('eo_wbc_home_btn_hover_color'):'#4285f4'; ?>" style="width: 100%;">
        							<div class="info">( Color to show when mouse moves over button. )</div>
        						</td>    			
        					</tr>
        					<tr class="switch-button">    				
        						<td class="strong">Button Border Color</td>
        						<td>
        							<input type="color" name="eo_wbc_home_btn_border_color" value="<?php echo get_option('eo_wbc_home_btn_border_color')?get_option('eo_wbc_home_btn_border_color'):'#4285f4'; ?>" style="width: 100%;">
        							<div class="info">( Set button's border color. )</div>
        						</td>    			
        					</tr>
        					<tr class="switch-button">    				
        						<td class="strong">Button Text Color</td>
        						<td>
        							<input type="color" name="eo_wbc_home_btn_text_color" value="<?php echo get_option('eo_wbc_home_btn_text_color')?get_option('eo_wbc_home_btn_text_color'):'#000000'; ?>" style="width: 100%;">
        							<div class="info">( Set custome text color on button. )</div>
        						</td>    			
        					</tr>
        					<tr class="switch-button">    				
        						<td class="strong">Button Radius (px)</td>
        						<td>
        							<input type="text" name="eo_wbc_home_btn_radius" value="<?php echo get_option('eo_wbc_home_btn_radius')?get_option('eo_wbc_home_btn_radius'):'5'; ?>" style="width: 100%;">
        							<div class="info">( Give button ronded corner effect. )</div>
        						</td>    			
        					</tr>
        				</table>
        				<hr/>
        			</td>
        			<td>&nbsp;</td>    			
        		</tr>
        		<tr>
        			<td class="extra-strong">Customize Breadcrumb</td>
        			<td>    				
        				<table cellspacing="30">
        					<tr>    				
        						<td class="strong">Active Breadcrumb</td>
        						<td>
        							<input type="color" name="eo_wbc_active_breadcrumb_color" value="<?php echo get_option('eo_wbc_active_breadcrumb_color')?get_option('eo_wbc_active_breadcrumb_color'):'#4285f4'; ?>" style="width: 100%;">
        							<div class="info">( Color for crumb currently in use. )</div>
        						</td>    			
        					</tr>
        					<tr>    				
        						<td class="strong">Non-Active Breadcrumb</td>
        						<td>
        							<input type="color" name="eo_wbc_non_active_breadcrumb_color" value="<?php echo get_option('eo_wbc_non_active_breadcrumb_color')?get_option('eo_wbc_non_active_breadcrumb_color'):'#4285f4'; ?>" style="width: 100%;">
        							<div class="info">( Color for crumb currently not in use. )</div>
        						</td>    			
        					</tr>    					
        					<tr>    				
        						<td class="strong">Radius (px)</td>
        						<td>
        							<input type="text" name="eo_wbc_breadcrumb_radius" value="<?php echo get_option('eo_wbc_breadcrumb_radius')?get_option('eo_wbc_breadcrumb_radius'):'0'; ?>" style="width: 100%;">
        							<div class="info">( Give rounded corner effect to breadcrumb. )</div>
        						</td>
        					</tr>    			
        					<tr>    				
        						<td class="strong">Show/Hide Icons</td>
        						<td>                                    
        							<div class="flipswitch">
                                    	<input type="checkbox" name="eo_wbc_show_hide_breadcrumb_icon" class="flipswitch-cb" id="icon_status" <?php echo (get_option('eo_wbc_show_hide_breadcrumb_icon') ==='1' || get_option('eo_wbc_show_hide_breadcrumb_icon')===false )?'checked="checked"':'' ?> >
                                    	<label class="flipswitch-label" for="icon_status">
                                            <div class="flipswitch-inner"></div>
    	                                    <div class="flipswitch-switch"></div>
        	                            </label>
                                	</div>
                                	<div class="info" style="max-width: 250px !important;padding-top: 3px;" >( You can upload icon from configuration page, click here to go to <a href="<?php echo admin_url('admin.php?page=eo-wbc-setting'); ?>">configuration.</a> )</div>
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
        				<button class="button button-primary button-hero action" style="float: right">Save Settings</button>
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