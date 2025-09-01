<?php

$category = $filter_ui->_category;
		
if(	
	(wbc()->options->get_option('configuration','first_slug') === $category and wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts') == 'fc2') 
	or 
	(wbc()->options->get_option('configuration','second_slug') === $category and wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts') == 'sc2') 
){
	?>
	<div class="eo-wbc-container filters container">

		
		<div class="ui horizontal segments" style="border: 0px solid transparent;box-shadow: none !important;">
			<?php $filter_ui->load_collapsable_desktop($general_filters, $advance_filters); ?>
		</div>
	</div>
	<?php
		//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$custom_css= "
		    @media (max-width: 1440px) {
		        .ui.dropdown>.left.menu {
		            left: auto!important;
		            right: -152px !important;
		        }
		    }
		";
	    wbc()->load->add_inline_style('', $custom_css,'common');   
} else {

	?>
	<div id="help_modal" class="ui small modal"><i class="close icon" style="top: 0;right: 0;color: #000;" onclick='jQuery("#help_modal").modal("hide")'></i><div class="header"></div><div class="content"></div></div>
	<div class="eo-wbc-container filters container ui form" style="direction: ltr;">
		<div class="ui segments">
			<div class="ui segment"><?php
			?><div class="ui stackable grid container align middle relaxed" style="margin-bottom: 0px;"><?php

				do_action('eowbc_pre_standard_filters',$general_filters);

				$filter_ui->load_grid_desktop($general_filters,0);
				$order = wbc()->options->get_option('filters_'.$filter_ui->filter_prefix.'filter_setting','price_filter_order_'.$filter_ui->cat_name_part.'_cat','');
				if( !$filter_ui->is_shortcode_filter && !wbc()->options->get_option('filters_'.$filter_ui->filter_prefix.'filter_setting','hide_price_filter_'.$filter_ui->cat_name_part.'_cat',false) && wbc()->common->nonZeroEmpty($order) ) {
					$filter_ui->slider_price();
				}

				do_action('eowbc_post_standard_filters',$general_filters);
			?></div><?php
		?></div><?php

		if(!is_wp_error($advance_filters) and !empty($advance_filters)) {
			?><div class="ui segment secondary"><?php
				?><div class="ui stackable grid container align middle relaxed" style="margin-bottom: 0px;"><?php
					do_action('eowbc_pre_advance_filters',$advance_filters);
					$filter_ui->load_grid_desktop($advance_filters,1);
					do_action('eowbc_post_advance_filters',$advance_filters);	
				?></div><?php
			?></div><?php
		}			
	?>				
		</div>
	</div>
	<?php if( (!empty($advance_filters)) or (!empty(wbc()->options->get_option('filters_'.$filter_ui->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))) ) { ?>
		<div class="ui grid centered">
			<div class="row">
				<?php if(!empty(wbc()->options->get_option('filters_'.$filter_ui->filter_prefix.'filter_setting','filter_setting_reset_now'))): ?>
					<div class="ui button reset_all_filters" id="reset_filter" style="position: absolute;left:1em;top: 1em;border-radius: 0;" > <?php esc_html(spext_lang("Reset Filters", 'woo-bundle-choice')) ?></div>
				<?php endif; ?>

				<?php if(!empty($advance_filters)): ?>
					<div class="ui button primary" id="advance_filter" style="border-radius: 0 0 0 0;width: fit-content !important;"><?php echo esc_html(spext_lang(wbc()->options->get_option('appearance_filters','appearance_filters_advanced_options_btn_text','ADVANCED FILTERS',false,true), 'woo-bundle-choice')); ?>&nbsp;<i class="ui icon angle double up"></i></div>
				<?php endif; ?>

				<?php if(!empty(wbc()->options->get_option('filters_'.$filter_ui->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))): ?>
					<div class="ui button" id="apply_filter" style="position: absolute;right: 1em;top:1em;border-radius: 0;" onclick="jQuery.fn.eo_wbc_filter_change(false,'form#<?php echo esc_attr($filter_ui->filter_prefix); ?>eo_wbc_filter','',{'this':this,'event':new Event('click',this)});"><?php esc_html(spext_lang("Apply Filters", 'woo-bundle-choice')); ?></div> 	
				<?php endif; ?>
			</div>
		</div>
	<?php			
	}
	do_action('eowbc_shortby_area_filters',$general_filters,$advance_filters);
}
