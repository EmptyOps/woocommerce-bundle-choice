<?php
/*
*	Displays the setup wizard's basic config page
*/
?>
			<input type="hidden" name="action" value="final">
			<div class="ui form segment">			  	
				<div class="ui form">
					<div class="inline fields">
						<div class="field">
				  			<button class="ui inverted red button" type="submit" onclick="window.history.go(-1); return false;">Back</button>
				  		</div>
						<div class="field">
							<div class="ui inverted green button" id="create_product">Add sample and Finish</div>	
						</div>
						<div class="field">
			  				<u><a href="<?php echo admin_url('admin.php?page=eo-wbc-home'); ?>">Skip and finish</a></u>
			  			</div>
					</div>
				</div>
			  	
			</div>
