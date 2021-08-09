<?php
/*
*	Displays the setup wizard's basic config page
*/
?>
			<input type="hidden" name="action" value="basic_config">
			<div class="ui form segment">
			  	<div class="inline fields">
			    	<label><?php _e('Inventory Type','woo-bundle-choice'); ?></label>
			    	<div class="three wide field">
			      		<div class="ui selection dropdown fluid">
						  	<input type="hidden" name="eo_wbc_inventory_type" id="eo_wbc_inventory_type">
						  	<i class="dropdown icon"></i>
						  	<div class="default text"><?php _e('Inventory Type','woo-bundle-choice'); ?></div>
						  	<div class="menu">
							    <div class="item" data-value="jewelry"><?php _e('Jewelry','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="clothing"><?php _e('Clothing','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="home_decor"><?php _e('Home Decor','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="others"><?php _e('Others','woo-bundle-choice'); ?></div>
						  	</div>
						</div>
			    	</div>		
			    	<i class="exclamation circle icon" data-content="Please select the Inventory you are selling on this site, if you are selling more than one then select Others." data-variation="very wide"></i>
			  	</div>
			  	<br/>
			  	<div class="inline fields">			  		
			  		<div class="field">
			  			<button class="ui inverted primary button" type="submit"><?php echo eowbc_lang('Next');?></button>
			  		</div>
			  	</div>
			</div>
