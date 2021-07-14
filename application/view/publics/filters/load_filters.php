<?php
if(wp_is_mobile()) {
	?>
	<div id="help_modal" class="ui small modal"><i class="close icon" style="top: 0;right: 0;color: #000;" onclick='jQuery("#help_modal").modal("hide")'></i><div class="header"></div>
	<div class="content"></div>
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(document).on('click',".question.circle.icon",function(){
			jQuery("#help_modal").find(".content").html('');	
			_help_text = jQuery(this).data('help');
			jQuery("#help_modal").find(".content").html(_help_text);
			jQuery("#help_modal").modal('show');
		});
		jQuery(document).on('click',"#help_modal .close.icon",function(){
			jQuery("#help_modal").modal('hide');
		});
	});
	</script>
	<?php
	if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1'){

		?>
			<div class="eo-wbc-container filters ui grid container">							
			<?php $filter_ui->load_mobile($non_adv_ordered_filter, $adv_ordered_filter); ?>		
			</div>						
		<?php	
		if(!is_wp_error($adv_ordered_filter) and !empty($adv_ordered_filter)) {
			if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'){
			?>
			<div class="ui grid centered container" id="advance_filter_mob_alternate_container">
				<div class="row" style="padding: 0px;">
					<div class="ui button primary" id="advance_filter_mob_alternate" style="border-radius: 0 0 0 0;width: 100vw !important; display: block !important; position: absolute;"><?php _e('Advance Filter','woo-bundle-choice'); ?>&nbsp;<i class="ui icon angle double down"></i></div>
				</div>
			</div>
			<?php
			} else {
			?>
			<div class="ui grid centered container" id="advance_filter_mob_alternate_container">
				<div class="row" style="padding: 0px;">
					<div class="ui button primary" id="advance_filter_mob_alternate" style="border-radius: 0 0 0 0;width: fit-content !important;"><?php _e('Advance Filter','woo-bundle-choice'); ?>&nbsp;<i class="ui icon angle double down"></i></div>
				</div>
			</div>
			<?php
			}
		}			

	} else {

		if(!is_wp_error($non_adv_ordered_filter) and !empty($non_adv_ordered_filter)) {

			if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)!='mobile_2'){
				?>
				<div class="ui grid container centered" style="margin:auto !important">
					<div class="row">
						<div class="ui button primary fluid" id="primary_filter" style="border-radius: 0 0 0 0;margin-right: 0;"><?php _e('Filters','woo-bundle-choice'); ?>&nbsp;&nbsp;<i class="ui icon angle up"></i></div>
					</div>
				</div>
				<?php
			}

		}	
		//wbc()->common->pr($non_adv_ordered_filter);
		?>
			<div class="eo-wbc-container filters container" style="padding-right: 0px !important;">
				
				<?php if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'){
				?>
				<?php
					$icon_filter_shown = false;
					$price_filter_shown = false;
					if(!is_wp_error($non_adv_ordered_filter) and !empty($non_adv_ordered_filter)){
						
						foreach ($non_adv_ordered_filter as $naof_key => $noaf_filter) {
																
							if(!$icon_filter_shown and isset($noaf_filter['type']) and $noaf_filter['type']==0 and isset($noaf_filter['label']) and in_array($noaf_filter['label'],array(__('Shape','woo-choice-plugin'),__('Ring Style','woo-choice-plugin'),__('Style','woo-choice-plugin'),__('Metal','woo-choice-plugin'))) and isset($noaf_filter['input']) and in_array($noaf_filter['input'],array('icon_text','icon'))) {
								
								$noaf_filter['desktop']=0;
								$noaf_filter['outer_container']=true;
								$filter_ui->eo_wbc_filter_ui_icon($filter_ui->__prefix,$noaf_filter);

								unset($non_adv_ordered_filter[$naof_key]);
								//$icon_filter_shown = true;
							} elseif (!$price_filter_shown and isset($noaf_filter['type']) and $noaf_filter['type']=='price_filter') {

								$filter_ui->slider_price(0);
								unset($non_adv_ordered_filter[$naof_key]);
								$price_filter_shown = true;
							}
						}

						if(!$price_filter_shown){
							$filter_ui->slider_price(0);
							$price_filter_shown = true;
						}
					}
				?>

				<div class="" style="padding-left: 1em;">
					<?php if(!empty($non_adv_ordered_filter)): ?>
					<div class="ui button primary circular" id="primary_filter" style="margin-right: 0;width: max-content !important;"><?php _e('Filters','woo-bundle-choice'); ?>&nbsp;&nbsp;<i class="ui icon chevron up"></i></div>
					<?php endif; ?>
					<span class="reset_all_filters mobile_2 mobile_2_hidden" style="float: right; margin-top: 0.5em;">X Reset All</span>
				</div>
				
				<?php
				} ?>
				<div class="ui segments" style="clear: both;">    			
		<?php
		$filter_ui->load_mobile($non_adv_ordered_filter, $adv_ordered_filter);
		?>		</div>
			</div>
		<?php

		if( !empty($adv_ordered_filter) ) {
			if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'){
			?>
			<div class="ui grid centered">
				<div class="row">
					<div class="ui button primary advance_filter" id="advance_filter" style="padding-left: 1em;padding-right: 1em;border-radius: 0 0 0 0;width: 100vw !important; display: block !important; position: absolute;text-align: left;"><?php _e('Advanced Filters','woo-bundle-choice'); ?>&nbsp;<i class="ui icon chevron right" style="position: absolute;right:1em;"></i></div>
				</div>
			</div>					
			<?php
			} else {
			?>
			<div class="ui grid centered">
				<div class="row">
					<div class="ui button primary advance_filter" id="advance_filter" style="border-radius: 0 0 0 0;width: fit-content !important;">Advance Filter&nbsp;<i class="ui icon angle double up"></i></div>
				</div>
			</div>
			<?php
			}			
		}
	}

} else {	

	$filter_ui->load_desktop($non_adv_ordered_filter, $adv_ordered_filter);				
}