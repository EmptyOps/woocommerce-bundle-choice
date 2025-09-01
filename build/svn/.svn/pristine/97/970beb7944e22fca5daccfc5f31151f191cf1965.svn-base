<?php    

function eo_wbc_admin_config_category_options()
{
    return  get_categories(array(
        'hierarchical' => 1,
        'show_option_none' => '',
        'hide_empty' => 0,
        'parent' => 0,
        'taxonomy' => 'product_cat'
    ));    
}

//the below code is intended to be used in future.
/*function eo_wbc_admin_page_lists()
{
    $args = array(
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
        'hierarchical' => 1,
        'exclude' => '',
        'include' => '',
        'meta_key' => '',
        'meta_value' => '',
        'authors' => '',
        'child_of' => 0,
        'parent' => -1,
        'exclude_tree' => '',
        'number' => '',
        'offset' => 0,
        'post_type' => 'page',
        'post_status' => 'publish'
    ); 
    return get_pages($args); 
}*/
        //deviding super-category details ie: name and slug to array container
        // - So that it can be attached to <select> menu item 
        $cat_name=array();
        $cat_slug=array(); 
        $categories=eo_wbc_admin_config_category_options();
        foreach ($categories as $cat)
        {
            $cat_name[]=$cat->name;
            $cat_slug[]=$cat->slug;
        }
    wp_enqueue_media();
?>
<style>
    .info{
        color:grey;
        font-style: italic;
    }
    fieldset{
        border: 1px solid black;
    }
    @media only screen and (max-width: 600px) {
        #wpwrap input,select,tr{
           display: grid !important;        
        }
        table,input,select{
            width: 100%;
        }
    }
    legend{
        font-size: larger;
        font-weight: bold;
        margin: 3px;
        background-color:rgb(255,255,255);
    }
    fieldset{
        padding: 10px;
        border-radius: 3px;
    }
    #form_ui table,input,select{
        width: -webkit-fill-available;
    }
    tr{
        vertical-align: initial;
    }    
</style>
<div class="wrap woocommerce">
<h1></h1>
<?php	EO_WBC_Head_Banner::get_head_banner(); ?>  
    <br/>
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e("If you are facing any issue, please write to us immediately.","woo-bundle-choice"); ?></a></p>
	<br/>
    
    <?php do_action('eo_wbc_menu_tabs','eo-wbc-setting'); ?>         
    <hr/>        
    <form action="" method="post">
    <?php wp_nonce_field('eo_wbc_nonce_config'); ?>
    <input type="hidden" name="eo_wbc_action" value="eo_wbc_save_config">    
    <table id="form_ui">
    	<tbody>           
            <tr>
                <td>
                    <fieldset>
                        <legend><?php _e("Automated Configuration","woo-bundle-choice"); ?></legend>
                        <span class="info">( <?php _e("Install some basic inventory and configuration to kickstart your store.","woo-bundle-choice"); ?> )</span>                            
                        <hr/>
                        <table>
                            <tr>
                                <td><strong><?php _e("What do yo stands for?","woo-bundle-choice"); ?></strong></td>
                                <td style="max-width: 25em;">
                                    <select name="eo_wbc_inventory_type">
                                        <option value="jewelry">Jewelry</option>
                                        <option value="clothing">Clothing</option>
                                        <option value="home_decor">Home Decor</option>
                                        <option value="others">Others</option>
                                    </select>
                                    <span class="info">( <?php _e("Select the type of business you stands for to get best solution.","woo-bundle-choice");?> )</span>
                                    <br/><br/>                                    
                                </td>        
                                <script>
                                    jQuery(document).ready(function($){
                                        $("[name='eo_wbc_inventory_type']").val('<?php echo get_option('eo_wbc_inventory_type'); ?>')
                                        $("[name='eo_wbc_inventory_type']").on('change',function(){
                                            if($(this).val()=='clothing'<?php echo get_option('eo_wbc_pair_maker_status')?'':' && 1' ?>){
                                                $('[name="eo_wbc_pair_maker_status"]').attr("checked",true);
                                            }
                                        });
                                    });
                                </script>                                                
                            </tr>                            
                            <tr>
                                <td><strong><?php _e("Jewelry","woo-bundle-choice"); ?></strong></td>
                                <td style="max-width: 25em;">
                                    if your website sells jewelry inventory then, please <a href="<?php  echo admin_url('admin.php?page=eo-wbc-home&eo_wbc_view_auto_jewel=1'); ?>">click here</a>. It will automatically install the sample categories, attributes, and products and configure all settings and mapping so that you can see sample shop feature in a ready state.                                    
                                </td>                                                        
                            </tr>                                    
                            <tr>
                                <td></td>
                                <td><a class='button button-primary primary' style="float: right;" href="<?php  echo admin_url('admin.php?page=eo-wbc-home&eo_wbc_view_auto_jewel=1'); ?>">Click here for automated configuration and setup</a></td>
                            </tr>          
                        </table>
                    </fieldset>                    
                </td>                
            </tr>      
            <tr>
                <th colspan="2" style="text-align: left;"><h2><u><?php _e("Choice Buttons Configuration","woo-bundle-choice"); ?></u></h2></th>
            </tr>
            <tr>               
                <td>
                    <fieldset>
                        <legend><?php _e("Buttons Configuration","woo-bundle-choice"); ?></legend>
                        <span class="info">( <?php _e("Set custom position of choice buttons.","woo-bundle-choice"); ?> )</span>
                        <hr/>
                        <table>
                            <tr>
                                <td><strong><?php _e("Setting","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <div>
                                        <select name="eo_wbc_btn_setting" style="width: 100%;">
                                            <option value="0" selected="selected"><?php _e("Home page + Shortcode","woo-bundle-choice"); ?></option>                                            
                                            <option value="1"><?php _e("Shortcode only","woo-bundle-choice") ?></option>
                                            <option value="2"><?php _e("Home page only","woo-bundle-choice"); ?></option>
                                        </select>
                                    </div>
                                    <span class="info">( <?php _e("Choose type of setup.<br/>&nbsp;Default : non-technical users.<br/>&nbsp;Shortcode : technical users only.","woo-bundle-choice"); ?> )</span>
                                </td>                        
                            </tr>
                            <tr class="eo_wbc_btn_setting_position_toggle">
                                <td>
                                    <strong><?php _e("Position","woo-bundle-choice"); ?></strong>
                                    <div class="eo_wbc_position_toggle" hidden="hidden">
                                        <br/>                                    
                                        <p>&nbsp;</p>                                  
                                    </div>                                
                                </td>                           
                                <td>
                                    <select name='eo_wbc_btn_position' style="width: 100%;">
                                        <option value="begining" selected="selected"><?php _e("Begining","woo-bundle-choice"); ?></option>
                                        <option value="middle"><?php _e("Middle","woo-bundle-choice"); ?></option>
                                        <option value="end"><?php _e("End","woo-bundle-choice"); ?></option>
                                        <option value="2"><?php _e("After 1st section","woo-bundle-choice"); ?></option>
                                        <option value="3"><?php _e("After 2nd section","woo-bundle-choice"); ?></option>
                                        <option value="4"><?php _e("After 3rd section","woo-bundle-choice"); ?></option>
                                        <option value="5"><?php _e("After 4th section","woo-bundle-choice"); ?></option>
                                        <option value="6"><?php _e("After 5th section","woo-bundle-choice"); ?></option>
                                        <option value="7"><?php _e("After 6th section","woo-bundle-choice"); ?></option>
                                        <option value="8"><?php _e("After 7th section","woo-bundle-choice"); ?></option>
                                        <option value="9"><?php _e("After 8th section","woo-bundle-choice"); ?></option>
                                        <option value="10"><?php _e("After 9th section","woo-bundle-choice"); ?></option>
                                        <option value="hide"><?php _e("Hide on home page","woo-bundle-choice");?></option>
                                    </select>                                
                                    <span class="info">( <?php _e("Position of buttons on your home page.","woo-bundle-choice");?> )</span>
                                </td>
                            </tr>                        
                        </table>
                    </fieldset>                    
                </td>                
            </tr>            
            <tr>               
                <td>
                    <hr/>
                    <fieldset>
                        <legend><?php _e("Make Pair Button Configuration","woo-bundle-choice"); ?></legend>
                        <span class="info">( <?php _e("Configure make pair button available on product page.","woo-bundle-choice"); ?> )</span>
                        <hr/>
                        <table>
                            <tr>
                                <td><strong><?php _e("Enabled","woo-bundle-choice"); ?></strong></td>
                                <td>                                    
                                    <span>
                                        <input type="checkbox" name="eo_wbc_pair_status" <?php echo get_option('eo_wbc_pair_status')==='0'?'':'checked="checked"'; ?> value="1">
                                    </span>
                                    <span class="info">( <?php _e("Check here to show make pair button on product pages.","woo-bundle-choice"); ?> )</span>
                                    <br/><br/>
                                </td>                        
                            </tr>                            
                            <tr>
                                <td>
                                    <strong><?php _e("Button Label","woo-bundle-choice"); ?></strong>                                    
                                </td>                           
                                <td>
                                    <input type="text" name="eo_wbc_pair_text" placeholder="Make Pair" value="<?php echo get_option('eo_wbc_pair_text'); ?>">
                                    <span class="info">( <?php _e("Text that will be displayed on button.","woo-bundle-choice");?> )</span>
                                </td>
                            </tr>                        
                        </table>
                    </fieldset>                    
                </td>                
            </tr>
            <tr>
                <th colspan="2" style="text-align: left;"><h2><u><?php _e("Navigation & Product Category","woo-bundle-choice"); ?></u></h2></th>
            </tr>
    		<tr>    			
    			<td>
                    <fieldset>
                        <legend><?php _e("First Category","woo-bundle-choice"); ?></legend>                        
                        <span class="info">( <?php _e("The first of any two product that would you like to present.","woo-bundle-choice"); ?> )</span>                        
                        <hr/>
                        <table>
                        <tr>                    
                            <td>
                                <strong><?php _e("Name","woo-bundle-choice"); ?></strong>                                                           
                            </td>
                            <td>
                                <select name='eo_wbc_first_name' onChange="nameChanged('first',this)" style="width: 100%;">
                                <?php 
                                    foreach ($cat_name as $name)
                                    {
                                        echo "<option name='".$name."'>".$name."</option>";
                                    }
                                  ?>
                                </select>
                                <span class="info">( <?php _e("Name to your first category.","woo-bundle-choice"); ?> )</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><?php _e("Slug","woo-bundle-choice"); ?></strong>
                            </td>                           
                            <td>
                                <select name='eo_wbc_first_slug' onChange="slug2url('first',this)" style="width: 100%;">
                                    <?php 
                                        foreach ($cat_slug as $slug)
                                        {
                                            echo "<option name='".$slug."'>".$slug."</option>";
                                        }
                                    ?>
                                </select>
                                <span class="info">( <?php _e("Optional! slug is url friendly name.","woo-bundle-choice"); ?> )</span>                          
                            </td>
                        </tr>
                        <tr>
                            <td><strong><?php _e("URL","woo-bundle-choice"); ?></strong></td>
                            <td>
                                <div><input type="text" width="100%" size=30 placeholder="relative url of first product" 
                                        name="eo_wbc_first_url" value="<?php echo get_option("eo_wbc_first_url") ?>"></div>                                     
                                <span class="info">( <?php _e("Optional! Set SEO friendly url of your like.","woo-bundle-choice"); ?> )</span>                          
                            </td>
                        </tr>                                           
                        <tr>
                            <td><strong><?php _e("Icon","woo-bundle-choice"); ?></strong></td>
                            <td>
                                <div class='image-preview-wrapper'>
                                    <img 
                                        src='<?php
                                          echo get_option('eo_wbc_first_icon') ? wp_get_attachment_url(get_option('eo_wbc_first_icon')) : plugins_url('/EO_WBC_Img/EO_WBC_Default.png',__FILE__) ;
                                          ?>' width='75' height='75' style='max-height: 90px; width: 90px;'>
                                </div>
                                <input type='button' class='button upload_image_button' value='<?php _e('Upload Icon'); ?>' />
                                <input type='hidden' name='eo_wbc_first_icon' value='<?php echo get_option('eo_wbc_first_icon') ?>'>
                                <span class='info'> ( <?php _e("Icon to be shown on breadcrumb.","woo-bundle-choice"); ?> )</span>
                            </td>
                        </tr>
                    </table>
                    </fieldset>    				
    				<br/><hr/><br/>
    			</td>
    		</tr>
    		<tr>
    			<td>
                    <fieldset>
                        <legend><?php _e("Second Category","woo-bundle-choice"); ?></legend>
                        <span class="info">( <?php _e("The second of any two product that would you like to present.","woo-bundle-choice"); ?> )</span>
                        <hr/>
                        <table>
                            <tr>                    
                                <td><strong><?php _e("Name","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <select name='eo_wbc_second_name' onChange="nameChanged('second',this)" style="width: 100%;">
                                        <?php 
                                            foreach ($cat_name as $name)
                                            {
                                                echo "<option name='".$name."'>".$name."</option>";
                                            }
                                        ?>
                                    </select>
                                    <span class="info">( <?php _e("Name to your second category.","woo-bundle-choice"); ?> )</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong><?php _e("Slug","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <select name='eo_wbc_second_slug' onChange="slug2url('second',this)" style="width: 100%;">
                                        <?php 
                                            foreach ($cat_slug as $slug)
                                            {
                                                echo "<option name='".$slug."'>".$slug."</option>";
                                            }
                                        ?>
                                    </select> 
                                    <span class="info">( <?php _e("Optional! slug is url friendly name.","woo-bundle-choice"); ?> )</span>                          
                                </td>
                            </tr>
                            <tr>
                                <td><strong><?php _e("URL","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <div><input type="text" width="100%" size=30 placeholder="relative url of second product" 
                                        name="eo_wbc_second_url" value="<?php echo get_option("eo_wbc_second_url") ?>"></div>                               
                                    <p class="info">( <?php _e("Optional! Set SEO friendly url of your like","woo-bundle-choice"); ?> )</p>                         
                                </td>
                            </tr>
                            <tr>
                                <td><strong><?php _e("Icon","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <div class='image-preview-wrapper'>
                                        <img 
                                            src='<?php
                                              echo get_option('eo_wbc_second_icon') ? wp_get_attachment_url(get_option('eo_wbc_second_icon') ) : plugins_url('/EO_WBC_Img/EO_WBC_Default.png',__FILE__) ;
                                              ?>' width='75' height='75' style='max-height: 90px; width: 90px;'>
                                    </div>
                                    <input type='button' class='button upload_image_button' value='<?php _e('Upload Icon'); ?>' />
                                    <input type='hidden' name='eo_wbc_second_icon' value='<?php echo get_option('eo_wbc_second_icon') ?>'>
                                    <span class='info'> ( <?php _e("Icon to be shown on breadcrumb.","woo-bundle-choice"); ?> )</span>
                                </td>
                            </tr>                                                   
                        </table>
                    </fieldset>
                    <br/><hr/><br/>
    			</td>
    		</tr>                     
    		<tr>    			
    			<td>
                    <fieldset>
                        <legend><?php _e("Preview","woo-bundle-choice"); ?></legend>
                        <span class="info">( <?php _e("The final result of first category and second category.","woo-bundle-choice"); ?> )</span>
                        <hr/>
                        <table>
                            <tr>                    
                                <td><strong><?php _e("Name","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <input type="text" name="eo_wbc_collection_title" value="<?php
                                                
                                                    echo get_option('eo_wbc_collection_title')?get_option('eo_wbc_collection_title'):"Preview";
                                                                                                
                                        ?>" placeholder="Title of third step" style="width: 100%;" required="required">
                                    <span class="info">( <?php _e("Name to combination of two categories.","woo-bundle-choice"); ?> )</span>
                                </td>
                            </tr>
                            <tr>
                            <td><strong><?php _e("Icon","woo-bundle-choice"); ?></strong></td>
                            <td>
                                <div class='image-preview-wrapper'>
                                    <img 
                                        src='<?php
                                          echo get_option('eo_wbc_collection_icon') ? wp_get_attachment_url(get_option('eo_wbc_collection_icon')) : plugins_url('/EO_WBC_Img/EO_WBC_Default.png',__FILE__) ;
                                          ?>' width='75' height='75' style='max-height: 90px; width: 90px;'>
                                </div>
                                <input type='button' class='button upload_image_button' value='<?php _e('Upload Icon'); ?>' />
                                <input type='hidden' name='eo_wbc_collection_icon' value='<?php echo get_option('eo_wbc_collection_icon') ?>'>
                                <span class='info'> ( <?php _e("Icon to be shown on breadcrumb.","woo-bundle-choice"); ?> )</span>
                            </td>
                        </tr>                                                   
                        </table>
                    </fieldset>    				
        			<br/><hr/><br/>
    			</td>
    		</tr>
            <tr>
                <th colspan="2" style="text-align: left;"><h2><u><?php _e("Extra Configurations","woo-bundle-choice"); ?></u></h2></th>
            </tr>  
            <tr>               
                <td>
                    <fieldset>
                        <legend><?php _e("Filter Configuration","woo-bundle-choice"); ?></legend>
                        <span class="info">( <?php _e("Configure horizontal filter bar.","woo-bundle-choice"); ?> )</span>
                        <hr/>
                        <table>
                            <tr>
                                <td><strong><?php _e("Filter Status","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <div>
                                        &nbsp;<input type="checkbox" name="eo_wbc_filter_enable" <?php echo (get_option('eo_wbc_filter_enable')=='1')?'checked="checked"':''; ?> value='1'/>
                                        <span class="info">( <?php _e("check here to enable horizontal filter bar at category page.","woo-bundle-choice"); ?> )</span>
                                    </div>                                    
                                    <br/>
                                </td>                        
                            </tr>
                        </table>
                    </fieldset>
                    <br/><hr/><br/>
                </td>
            </tr>	
            <tr>               
                <td>
                    <fieldset>
                        <legend><?php _e("Pair Maker Configuration","woo-bundle-choice"); ?></legend>
                        <span class="info">( <?php _e("Enables pair maker view at second step.","woo-bundle-choice"); ?> )</span>
                        <hr/>
                        <table>
                            <tr>
                                <td><strong><?php _e("Pair Maker Status","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <div>
                                        &nbsp;<input type="checkbox" name="eo_wbc_pair_maker_status" <?php echo (get_option('eo_wbc_pair_maker_status')=='1')?'checked="checked"':''; ?> value='1'/>
                                        <span class="info">( <?php _e("check here to enable pair maker view at second step of category page.","woo-bundle-choice"); ?> )</span>
                                    </div>                                    
                                    <br/>
                                </td>                        
                            </tr>
                            <tr>
                                <td><strong><?php _e("Upper card","woo-bundle-choice"); ?></strong></td>
                                <td>
                                    <div>
                                        <label><input type="radio" name="eo_wbc_pair_upper_card" <?php echo (get_option('eo_wbc_pair_upper_card',2)===1)||(get_option('eo_wbc_pair_upper_card',TRUE))?'checked="checked"':''; ?> value="1"/>First Category</label>
                                        &nbsp;<label><input type="radio" name="eo_wbc_pair_upper_card" <?php echo (get_option('eo_wbc_pair_upper_card',1)==2)?'checked="checked"':'';?> value="2"/>Second Category</label><br/>
                                        <span class="info">( <?php _e("Mark the category's card to be always shown at top of other, for e.g. in clothing should be a top wear category.","woo-bundle-choice"); ?> )</span>
                                    </div>                                    
                                    <br/>
                                </td>                        
                            </tr>
                        </table>
                    </fieldset>
                    <br/><hr/><br/>
                </td>
            </tr>
			<tr>				
    			<td>    			
    				<button class="button button-primary button-hero action" style="float: right"><?php _e("Save","woo-bundle-choice"); ?></button>    			
    			</td>
                <td></td>
                <td></td>
    		</tr>		
    	</tbody>    	
    </table>
    </form>    
</div>
<?php EO_WBC_Head_Banner::get_footer_line(); ?>
<script type="text/javascript">	
	<?php 
	   if(!is_null($categories))
	   {
	       $cat_map=array();
	       foreach ($categories as $cat)
	       {
	           $cat_map[$cat->name]=$cat->slug;
	       }
	       echo "var category = ".json_encode($cat_map).";";
	   }
	   // initializing values of all configuration controllers
	   // by collecting data from database 
	   echo "document.getElementsByName('eo_wbc_first_name')[0].value='".get_option('eo_wbc_first_name')."';";
	   echo "document.getElementsByName('eo_wbc_first_slug')[0].value='".get_option('eo_wbc_first_slug')."';";
	   echo "document.getElementsByName('eo_wbc_first_url')[0].value='".get_option('eo_wbc_first_url')."';";
	   echo "document.getElementsByName('eo_wbc_second_name')[0].value='".get_option('eo_wbc_second_name')."';";
	   echo "document.getElementsByName('eo_wbc_second_slug')[0].value='".get_option('eo_wbc_second_slug')."';";
	   echo "document.getElementsByName('eo_wbc_second_url')[0].value='".get_option('eo_wbc_second_url')."';";       
	   
	?>
    jQuery(document).ready(function($){

        //Open wordpress media manager on button click
        jQuery('.button.upload_image_button').on('click',function(event){
            event.preventDefault();
            action_root=$(this).parent();                   
            // If the media frame already exists, reopen it.
            /*if (typeof(file_frame)!=undefined) {                 
                // Open frame
                file_frame.open();
                return;
            }*/
            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: 'Select an image to upload',
                button: {
                    text: 'Use this image',
                },
                multiple: false // Set to true to allow multiple files to be selected
            });
            file_frame.on('select', function() {
                attachment = file_frame.state().get('selection').first().toJSON();          
                action_root.find("img").attr('src',attachment.url).css( 'width', 'auto' );                                      
                action_root.find("input[type='hidden']").val( attachment.id );
            });
            // Finally, open the modal
            file_frame.open();
        });
        
        //Load values before any action.
        $("[name='eo_wbc_btn_position']").val("<?php echo get_option('eo_wbc_btn_position')?get_option('eo_wbc_btn_position'):'begining'; ?>");        

        //function to toggle textbox which indicates position of buttons in container.
        function toggle_btn_position(){
            if($("[name='eo_wbc_btn_position']").val()=='custom'){
                $(".eo_wbc_position_toggle").fadeIn();
            }
            else{
                $(".eo_wbc_position_toggle").hide();
            }
        }

        //function to handle change in setting type of two buttons.
        $("[name='eo_wbc_btn_setting']").change(function(){            
            if($(this).val()==0 || $(this).val()==2 ){ //Default setting routine is selected
                $(".eo_wbc_btn_setting_position_toggle").show();
                $(".eo_wbc_btn_setting_page_toggle").hide();
                $(".eo_wbc_position_toggle").show();                
                toggle_btn_position();
            }
            else{ //Shortcode setting routine is selected
                $(".eo_wbc_btn_setting_page_toggle").show();
                $(".eo_wbc_btn_setting_position_toggle").hide();
            }            
        }).val("<?php echo get_option('eo_wbc_btn_setting')?get_option('eo_wbc_btn_setting'):"0"; ?>").trigger('change');

        //function to handle on change of page positon if value is "custom".
        $("[name='eo_wbc_btn_position']").change(function(){
            toggle_btn_position();
        });        
    });  

    //function to change ulr controller's text on change of slug dropbox.
    function slug2url(option,element)
    {
        if(element.value.trim().length>0){
            var target=document.getElementsByName("eo_wbc_"+option.trim()+"_url")[0];
            target.value="";
            target.placeholder='/product-category/'+element.value+'/';
        }       
    }

    //function to change slug dropbox on change occured on name dropbox
    function nameChanged(option,element)
    {               
        document.getElementsByName("eo_wbc_"+option.trim()+"_slug")[0].value=category[element.value];
        document.getElementsByName("eo_wbc_"+option.trim()+"_slug")[0].onchange();
    }  
</script>	