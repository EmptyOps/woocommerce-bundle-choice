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
?>
<style>
    .info{
        color:grey;
        font-style: italic;
    }
</style>
<div class="wrap woocommerce">
<h1></h1>
<?php	EO_WBC_Head_Banner::get_head_banner(); ?>  
<hr/>
	<br/>
    <h2>Configurations </h2>    
    <hr/>    
    <form action="" method="post">
    <?php wp_nonce_field('eo_wbc_nonce_config'); ?>
    <input type="hidden" name="eo_wbc_action" value="eo_wbc_save_config">
    <table cellspacing="30">            			
    	<tbody>
    		<tr>
    			<td>
    				<h3>First Category</h3>
    				<span class="info">( The first of any two product that would you like to present. )</span>
    			</td>    			
    			<td>
    				<table cellspacing="30">
    					<tr>    				
    						<td>
    							<strong>Name</strong>
    							<p>&nbsp;</p>    							
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
    							<span class="info">( Name to your first category. )</span>
    						</td>
    					</tr>
    					<tr>
    						<td>
    							<strong>Slug</strong>
    							<p>&nbsp;</p>
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
            					<span class="info">( Optional! slug is url friendly name. )</span>    						
    						</td>
    					</tr>
    					<tr>
    						<td><strong>URL</strong></td>
    						<td>
  								<div><input type="text" width="100%" size=50 placeholder="relative url of first product" 
    									name="eo_wbc_first_url" value="<?php echo get_option("eo_wbc_first_url") ?>"></div>    									
    							<span class="info">( Optional! Set SEO friendly url of your like. )</span>    						
    						</td>
    					</tr>    					 					
    				</table>
    				<hr/>
    			</td>
    		</tr>
    		<tr>
    			<td>
    				<h3>Second Category</h3>
    				<span class="info">( The second of any two product that would you like to present. )</span>
    			</td>
    			<td>
        			<table cellspacing="30">
        					<tr>    				
        						<td><strong>Name</strong></td>
        						<td>
    	    						<select name='eo_wbc_second_name' onChange="nameChanged('second',this)" style="width: 100%;">
                						<?php 
                                            foreach ($cat_name as $name)
                                            {
                                                echo "<option name='".$name."'>".$name."</option>";
                                            }
                						?>
                					</select>
                					<span class="info">( Name to your second category. )</span>
        						</td>
        					</tr>
        					<tr>
        						<td><strong>Slug</strong></td>
        						<td>
      								<select name='eo_wbc_second_slug' onChange="slug2url('second',this)" style="width: 100%;">
                						<?php 
                                            foreach ($cat_slug as $slug)
                                            {
                                                echo "<option name='".$slug."'>".$slug."</option>";
                                            }
                						?>
                					</select> 
                					<span class="info">( Optional! slug is url friendly name. )</span>  						
        						</td>
        					</tr>
        					<tr>
        						<td><strong>URL</strong></td>
        						<td>
      								<div><input type="text" width="100%" size=50 placeholder="relative url of second product" 
    									name="eo_wbc_second_url" value="<?php echo get_option("eo_wbc_second_url") ?>"></div>    							
    								<p class="info">( Optional! Set SEO friendly url of your like )</p> 						
        						</td>
        					</tr>        					    					
        				</table>
        				<hr/>
    			</td>
    		</tr>
    		<tr>
    			<td>
    				<h3>Preview</h3>
    				<span class="info">( The final result of first category and second category. )</span>
    			</td>
    			<td>
    				<table cellspacing="30">
        					<tr>    				
        						<td><strong>Name</strong></td>
        						<td>
    	    						<input type="text" name="eo_wbc_collection_title" value="<?php
                            					
                            					    echo get_option('eo_wbc_collection_title')?get_option('eo_wbc_collection_title'):"Preview";
                            										          					
                    					?>" placeholder="Title of third step" style="width: 100%;" required="required">
                    				<span class="info">( Name to combination of two categories. )</span>
        						</td>
        					</tr>        					    					
        			</table>
        			<hr/>
    			</td>
    		</tr>	
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
    			<td>    			
    				<button class="button button-primary button-hero action" style="float: right">Save</button>    			
    			</td>
    		</tr>		
    	</tbody>    	
    </table>
    </form>    
</div>
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