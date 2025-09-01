<?php
/*
*	Displays the setup wizard's basic config page
*/
/*var_dump($bonus_features);
var_dump($feature_option);*/
//var_dump($available_sample);
$features = array_filter(array_replace($feature_option,$bonus_features));
/*var_dump($features);
var_dump($available_feature);*/


?>
			<input type="hidden" name="action" value="final">
			<div class="ui form segment">			  	
				<?php if(!empty($features)): ?>
				<h4>You enabled below features:</h4>
				<hr/>
				<div class="segment">
					<div class="ui list">
						<?php foreach ($features as $feature): ?>

						<div class="item">
							<i class="<?php (in_array($feature,$available_sample)?esc_attr_e('check green'):esc_attr_e('exclamation')) ?> icon"></i>	
							<div class="content"><?php esc_html_e($available_feature[$feature]); ?> - <?php ( in_array($feature, $available_sample) ? esc_html_e('Sample Data available') : esc_html_e('Sorry Sample Data Not available yet')); ?></div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<br/>
				<?php endif; ?>
				<div class="ui form">
					<div class="inline fields">
						<div class="field">
				  			<button class="ui inverted red button" type="submit" onclick="window.history.go(-1); return false;">Back</button>
				  		</div>
						<div class="field">
						    <div class="ui inverted green button <?php echo empty(array_intersect(array_keys($features), $available_sample)) ? esc_attr_e('disabled') : ''; ?>" id="create_product" data-link="<?php echo esc_url(admin_url("admin.php?setup_wizard_run=1&page=eowbc&eo_wbc_view_auto_jewel=1&f=" . implode(',', $features))); ?>">Add sample and Finish</div>	
						</div>
						<div class="field">
						    <u><a href="<?php echo esc_url(admin_url('admin.php?setup_wizard_run=1&page=eowbc')); ?>">Skip and finish</a></u>
						</div>
					</div>
				</div>
			  	
			</div>
