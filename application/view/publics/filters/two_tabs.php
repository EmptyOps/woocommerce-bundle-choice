<?php

$is_default_tab_active = true;
foreach ($filter_sets_data as $key => $tab_data ){
    
    if(isset($_GET[$tab_data["first_tab_id"]])){
        
      $is_default_tab_active = false;
      break;
    }

}

?>
<?php $category_array = array_column($filter_sets_data, 'first_tab_category'); ?>
<?php
    // wbc_pr($category_array);

    // wbc_pr(wbc()->common->get_category('category',null,array(wbc()->options->get_option('configuration','first_slug'),wbc()->options->get_option('configuration','second_slug'))));
    //die();
?>
<?php 

// NOTE: now since we are preparing data only on the data layer and from there only the required if condition is applied. so here never should be the requirement to add the if condition here. so added true or condition here. 
if( true or in_array( wbc()->common->get_category('category',null,array(wbc()->options->get_option('configuration','first_slug'),wbc()->options->get_option('configuration','second_slug')),true), /*array($first_tab_category,$second_tab_category)*/$category_array ) ){  ?>
    <div class="ui top attached tabular menu filter_setting_advance_two_tabs" style="margin-top: 3em;">
        <?php 
        $counter = -1;
        foreach ($filter_sets_data as $key => $tab_data ){  
            $counter++;
            $class = '';
            if(isset($_GET[$tab_data["first_tab_id"]]) || ($is_default_tab_active && $counter == 0)){

                $class = 'active';
            }
            ?>
            <!-- <a class="item center <?php //echo isset($_GET[$tab_data["first_tab_id"]])?'active':'' ?>" data-category="<?php //_e($tab_data["first_tab_category"]); ?>" style="margin-right: 0px !important;" data-tab="filter_setting_advance_first_tabs" data-tab-name="<?php //_e($tab_data["first_tab_id"]); ?>" data-tab-altname=""/*<?php //_e($second_tab_id); ?>*/>
                // $prefix.'_fconfig_set' 
            <?php //_e($tab_data["first_tab_label"]); ?>
            </a>  -->

            <a class="item center <?php echo $class/*isset($_GET[$tab_data["first_tab_id"]])?'active':''*/ ?>" data-category="<?php _e($tab_data["first_tab_category"]); ?>" style="margin-right: 0px !important;" data-tab="filter_setting_advance_first_tabs_<?php echo $tab_data["first_tab_id"]; ?>" data-tab-name="<?php _e($tab_data["first_tab_id"]); ?>" data-tab-altname=""> <?php _e($tab_data["first_tab_label"]); ?> </a> 
        <?php } ?>  

      	<!-- <a class="center item <?php /*echo isset($_GET[$second_tab_id])?'active':'' */?>" data-category="<?php/* _e($second_tab_category);*/ ?>" style="margin-left: 0px !important;" data-tab="filter_setting_advance_second_tabs" data-tab-name="<?php/* _e($second_tab_id); */?>" data-tab-altname="<?php /*_e($first_tab_id); */?>">
        <?php _e($second_tab_label); ?> 
      	</a>-->
      	<script type="text/javascript">
            // --- aa code woo-bundle-choice/asset/js/publics/03_06__eo_wbc_filter.js filter_set_click() ma move karyo se @a ---
            // --- start ---
        		jQuery(document).ready(function($){

            	// $('.filter_setting_advance_two_tabs .item').on('click',function(event){
                
                /*let _category = $("[name='_category']").val();
                _category = _category.split(',');
                if(_category.indexOf('_two_tabs')==-1){
                  _category.push('_two_tabs');
                  $("[name='_category']").val(_category.join(','));
                }

                $('[name="cat_filter__two_tabs"]').val($(this).data('category'));*/

                // jQuery('[name="_current_category"]').val(jQuery(this).data('category'));

                // jQuery('[name="_category"]').val(jQuery(this).data('category'));

                //cat_filter__two_tabs
        				// $('.filter_setting_advance_two_tabs .item').removeClass('active');

        				// $(this).addClass('active');

            //     let group_id = $(this).data('tab-name');

            //     let display_style = 'inline-block';
                <?php /*if(wp_is_mobile() and !wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')):*/ ?>
                <?php /*if(wp_is_mobile() and !$two_tabs_confings['filter_setting_alternate_mobile']):*/ ?>
            //       display_style='block';
                <?php /*endif;*/ ?>
            //     $('[data-tab-group="'+group_id+'"]:not(.toggle_sticky_mob_filter.advance_filter_mob)').not('[data-tab-group]:has([data-switch_filter_type-alternate])').css('display',display_style);


                // let group_id_alt = $(this).data('tab-altname');
                // $('[data-tab-group="'+group_id_alt+'"]').css('display','none');

                // $('[data-tab-group="'+group_id_alt+'"]').each(function(){
                //   let reset_script = $(this).find('[data-reset]').data('reset');
                //   if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
                //     eval(reset_script);
                //   }        

                  <?php /*if(wp_is_mobile() and !wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')):*/ ?>
                //     if($(this).hasClass('active')){
                //       $(this).trigger('click');
                //     }
                //     reset_script = $(this).next().find('[data-reset]').data('reset');
                //     if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
                //       eval(reset_script);
                //     }        
                  <?php /*endif;*/ ?>

                  <?php /*if(wp_is_mobile() and wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')):*/ ?>
                //     if($(this).hasClass('active')){
                //       $(this).trigger('click');
                //     }          
                    
                //     reset_script = $(this).next().find('[data-reset]').data('reset');
                //     if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
                //       eval(reset_script);
                //     }  

                //     jQuery(".close_sticky_mob_filter").trigger('click');

                  <?php /*endif;*/ ?>

                  
                // });

                <?php /*if(wp_is_mobile() and wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')):*/ ?>
                //   $('#advance_filter_mob_alternate').removeClass('status_hidden');
                //   $(".toggle_sticky_mob_filter.advance_filter_mob[data-tab-group='"+$(this).data('tab-altname')+"'],.toggle_sticky_mob_filter.advance_filter_mob[data-tab-group='']").hide();
                <?php /*endif;*/ ?>
               

                //////// 27-05-2022 - @drashti /////////
                // --add to be confirmed--
                // -- jo uniq hoy to subscribe mate call back nu emplent karvanu rese -- to a
                // window.document.splugins.wbc.filters.core.eo_wbc_filter_change_wrapper(false,'form#<?php /*echo $filter_ui->filter_prefix;*/ ?>eo_wbc_filter','',{'this':this,'event':event});
                // --- aa code woo-bundle-choice/asset/js/publics/03_06__eo_wbc_filter.js filter_set_click() ma move karyo se @a ---
                // --- start ---       
                // jQuery.fn.eo_wbc_filter_change(false,'form#<?php /*echo $filter_ui->filter_prefix;*/ ?>eo_wbc_filter','',{'this':this,'event':event});
                // --- end ---
                ////////////////////////////////////////
        			// });
                window.document.splugins.events.api.subscribeObserver('filter_sets', 'wbc', 'filter_set_click_before_loop',function(event, stat_object, notification_response){       

                    console.log('filter_set_click_before_loop subscribeObserver default');            

                    notification_response(stat_object);

                });    
              //jQuery('[data-tab="filter_setting_advance_first_tabs"]').trigger('click');
              // jQuery('.filter_setting_advance_two_tabs .item.active').click();

            });
             // --- end ---
    	</script>
    </div>
<?php } ?>