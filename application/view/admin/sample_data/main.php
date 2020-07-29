<?php
/*
*	Displays the page for adding sample data
*/
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
	        <table class="form-table">
	          <tbody>
	            <tr valign="top">
	              <!-- Sample Product Installation -->
	              <?php if( !empty(wbc()->sanitize->post('step')) && wbc()->sanitize->post('step')==3):?>
	                <th>
	                  <h3>Sample Products</h3>
	                </th>
	              </tr>
	              <tr>
	                <td> Sample products of rings and diamond will be added.</td>
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

	<?php //EO_WBC_Head_Banner::get_footer_line(); ?>
