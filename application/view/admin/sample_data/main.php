<?php
/*
*	Displays the page for adding sample data
*/

$_step = 1; 
if(!empty($_GET['step'])){
	$_step = $_GET['step'];
}

?>
<div class="ui segment container" style="height: 100%;margin-bottom: 0px; border: none !important;
box-shadow: none;">
 	<div class="ui icon header" style="width: 100%;">
		<img src="<?php echo constant('EOWBC_ICON_SVG'); ?>" style = 'max-width: 100;max-height: auto;'/>
		<br/>
		<p><?php echo constant('EOWBC_NAME'); ?></p>
		<hr/>
	</div>

	<div class="wrap woocommerce">
	  <h1></h1>
	  <?php //EO_WBC_Head_Banner::get_head_banner(); ?> 
	  <!-- <br/>
	        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php //_e("If you are facing any issue, please write to us immediately.","woo-bundle-choice"); ?></a></p>
	  <br/> -->
	  <hr/>
	  <div style="clear:both;"></div>
	  
	  <form method="post">
	    <?php wp_nonce_field('eo_wbc_auto_jewel'); ?>
	    <input type="hidden" name="step" value="<?php echo $_step+1; ?>">
	    <div>
	      <h1><strong>Sample Data for <?php echo $feature_title;?></strong></h1>
	      <p>You are at step <?php echo $_step; ?> of <?php echo $number_of_step; ?> steps.</p>
	      <?php if(!empty($help_info[$_step])) {
	      	?>
	      		<p><strong><?php echo $help_info[$_step]; ?></strong></p>
	      	<?php 
	      }
	      ?>
	        <table class="form-table">
	          <tbody>
	            <tr valign="top">
	              <!-- Sample Product Installation -->
	              <?php if( /*!empty(wbc()->sanitize->post('step')) && wbc()->sanitize->post('step')*/$_step==3):?>
	                <th>
	                  <h3>Sample Products</h3>
	                </th>
	              </tr>
	              <tr>
	                <td> Sample products will be added for <?php echo $feature_title;?>.</td>
	              <!-- Attributes Installation -->
	              <?php elseif($_step==2):?>
	                <th>
	                  <h3>Attributes</h3>
	                </th>
	              </tr>
	              <tr>
	                <td>                    
	                  <?php foreach ($_atttriutes as $index=>$_attr): ?>             <tr>                                            
	                    <span>                                                     
	                    <input type="checkbox" name="attr_<?php echo $index; ?>" id="<?php _e($_attr['slug']); ?>" value="<?php _e($_attr['slug']) ?>" checked="checked"></span>
	                    <span><input type="text" name="attr_value_<?php echo $index; ?>" placeholder="<?php _e($_attr['label']) ?>" value="<?php _e($_attr['label']); ?>"></span></tr>
	                    <!--<label for="<?php _e($_attr['slug']); ?>"><?php _e($_attr['label']); ?></label>-->
	                    <br/><br/>                        
	                  <?php endforeach;?>                      
	                </td>
	              <!-- Category Installation -->
	              <?php else:?>
	                <th>
	                  <h3>Category</h3>
	                </th>
	              </tr>
	              <tr>
	                <td>                    
	                  <?php foreach ($_category as $index=>$_cat): ?>  <tr>                                            
	                    <span><input type="checkbox" name="cat_<?php echo $index; ?>" id="<?php _e($_cat['name']); ?>" value="<?php _e($_cat['slug']) ?>" checked="checked"></span>
	                    <!--<label for="<?php //_e($_cat['name']); ?>"><?php //_e($_cat['name']); ?></label> -->    
	                    <span><input type="text" name="cat_value_<?php echo $index; ?>" placeholder="<?php _e($_cat['name']) ?>" value="<?php _e($_cat['name']); ?>"></span></tr>
	                    <br/></br>
	                  <?php endforeach;?>                      
	                </td>
	              <?php endif; ?>
	            </tr>
	          </tbody>
	          <tfoot>
	            <tr>
	              <td>
	                <?php $_steps=["catagorie(s)","attribute(s)","product(s)"]; ?>
	                <input type="submit" name="save" value="<?php printf(__("Create sample %1s","woo-bundle-choice"),$_steps[$_step-1]); ?>"  class="button button-primary button-hero action">                
	              </td>
	              <td>
	                <a href="#" class="button button-hero action" onclick="if(!jQuery(this).hasClass('disabled')){ window.location.href='<?php echo admin_url('admin.php?page=eowbc'); ?>'; }">Cancel</a>
	              </td>
	            </tr>
	          </tfoot>
	        </table>
	    </div>            
	  </form>
	</div>

</div>

<?php if(empty($_GET['step']) or (!empty($_GET['step']) and $_GET['step']!=3 )) { 
	if(empty($_GET['step'])){
		$_GET['step']=1;
	}

	$_GET['step'] = $_GET['step']+1;
	$next_url = admin_url('admin.php?'.http_build_query($_GET));
	
	?>
	<script type="text/javascript" >
	    jQuery(document).ready(function($) {            

	    	
	    	let cat_value = 0;
	    	let attr_value = 0;
	    	let process_flag = '';

	    	let btn_label = '';
	    	let btn_total = 0;

	        function eowbc_add_catat(index){

	            if(process_flag=='cat' && index>=cat_value){
	                //step 2 redirect;
	                //window.location.href="<?php echo($next_url); ?>";
	                var data = {	                
		                '_wpnonce': '<?php echo wp_create_nonce('sample_data_jewelry');?>',
		                'action':'eowbc_ajax',
		                'resolver':'sample_data/catattr',
		                'feature_key':'<?php _e($feature_key); ?>',
		                'type':'save_map',
		            };
	            	jQuery.ajax({
			            url:eowbc_object.admin_url,
			            type: 'POST',
			            data: data,
			            beforeSend:function(xhr){

			            },
			            success:function(result,status,xhr){
			                window.location.href="<?php echo($next_url); ?>";
	                		return false;
			            },
			            error:function(xhr,status,error){
			                /*console.log(xhr);*/			                
			                window.location.href="<?php echo($next_url); ?>";
	                		return false;
			            },
			            complete:function(xhr,status){
			           		window.location.href="<?php echo($next_url); ?>";
	                		return false;     
			            }
			        });	
	                return false;
	            } else if(process_flag=='attr' && index>=attr_value) {
	            	//step 3 redirect;
	            	var data = {	                
		                '_wpnonce': '<?php echo wp_create_nonce('sample_data_jewelry');?>',
		                'action':'eowbc_ajax',
		                'resolver':'sample_data/catattr',
		                'feature_key':'<?php _e($feature_key); ?>',
		                'type':'save_filter',
		            };
	            	jQuery.ajax({
			            url:eowbc_object.admin_url,
			            type: 'POST',
			            data: data,
			            beforeSend:function(xhr){

			            },
			            success:function(result,status,xhr){
			                window.location.href="<?php echo($next_url); ?>";
	                		return false;
			            },
			            error:function(xhr,status,error){
			                /*console.log(xhr);*/			                
			                window.location.href="<?php echo($next_url); ?>";
	                		return false;
			            },
			            complete:function(xhr,status){
			           		window.location.href="<?php echo($next_url); ?>";
	                		return false;     
			            }
			        });	
			        return false;            	
	            }



	            jQuery(".button.button-primary.button-hero.action.disabled").val("Adding "+(index+1)+" of "+btn_total+" "+btn_label);

	            let label = '';
	            let value = '';
	            let field_name = jQuery("[name^='"+process_flag+"_"+index+"']:checkbox:checked");
	            let field_label = jQuery("[name^='"+process_flag+"_value_"+index+"']:not([value=''])");

	            if(field_name.length>0 && field_label.length>0 && jQuery(field_label[0]).val().trim()!=''){
	            	value = jQuery(field_name[0]).val();
	            	label = jQuery(field_label[0]).val();
	            } else {
	            	eowbc_add_catat(index+1);
	            }

	            var data = {	                
	                '_wpnonce': '<?php echo wp_create_nonce('sample_data_jewelry');?>',
	                'action':'eowbc_ajax',
	                'resolver':'sample_data/catattr',
	                'feature_key':'<?php _e($feature_key); ?>',
	                'label':label,
	                'value':value,
	                'index':index,
	                'type':process_flag,	                
	            };

	            jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', data, function(response) {
	            	var resjson = jQuery.parseJSON(response);
	                if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
		                eowbc_add_catat(++index);                    
	                } else {
	                	var type = (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error');
	                	var msg = (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Failed! Please check Logs page for for more details.`);
	                    eowbc_toast_common( type, msg );
	                }  
	            });                
	        }   
	        
	        $(".button.button-primary.button-hero.action").on('click',function(e){
	            e.stopPropagation();
	            e.preventDefault();
	            if(!$(this).hasClass('disabled')) {
	                $(".button.button-hero.action:not(.disabled)").toggleClass('disabled');

	                cat_value = jQuery("[name^='cat_']:checkbox:checked").length;
	                attr_value = jQuery("[name^='attr_']:checkbox:checked").length;

	                if(cat_value>0){
	                	process_flag = 'cat';
	                	btn_label = 'Category';
	                	btn_total = cat_value;
	                } else if(attr_value>0){
	                	process_flag = 'attr';
	                	btn_label = 'Attributes';
	                	btn_total = attr_value;
	                }

	                //let cat_value = jQuery("[name^='cat_value_']:not([value=''])");
			    	//let cat = jQuery("[name^='cat_']:checkbox:checked");

					//let attr_value = jQuery("[name^='attr_value_']:not([value=''])");
			    	//let attr = jQuery("[name^='attr_']:checkbox:checked");

			    	eowbc_add_catat(0);
	                //eo_wbc_add_products(119);
	            }                
	            return false;
	        });

	    });
	</script> <?php 
} elseif($_step==3) { ?>
    <script type="text/javascript" >
	    jQuery(document).ready(function($) {            

	        var eo_wbc_max_products=<?php /*_e(0)*/echo($sample_data_obj->get_model()->get_product_size()); ?>;            
	        function eo_wbc_add_products(index){

	            if(index>=eo_wbc_max_products){
	                
	                window.location.href="<?php echo(admin_url('admin.php?page=eowbc')); ?>";
	                return false;
	            }

	            jQuery(".button.button-primary.button-hero.action.disabled").val("Adding "+(index+1)+" of "+eo_wbc_max_products+" products");

	            var data = {
	                //'action': 'eo_wbc_add_products',
	                '_wpnonce': '<?php echo wp_create_nonce('sample_data_jewelry');?>',
	                'action':'eowbc_ajax',
	                'resolver':'sample_data/<?php _e($feature_key); ?>',
	                'product_index':index 
	            };

	            jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', data, function(response) {
	            	var resjson = jQuery.parseJSON(response);
	                if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
		                eo_wbc_add_products(++index);                    
	                } else {
	                	var type = (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error');
	                	var msg = (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Failed! Please check Logs page for for more details.`);
	                    eowbc_toast_common( type, msg );
	                }  
	            });                
	        }   
	        
	        $(".button.button-primary.button-hero.action").on('click',function(e){
	            e.stopPropagation();
	            e.preventDefault();
	            if(!$(this).hasClass('disabled')) {
	                $(".button.button-hero.action:not(.disabled)").toggleClass('disabled');
	                eo_wbc_add_products(0);
	                //eo_wbc_add_products(119);
	            }                
	            return false;
	        });

	    });
	</script>
<?php } ?>
<?php //EO_WBC_Head_Banner::get_footer_line(); ?>
