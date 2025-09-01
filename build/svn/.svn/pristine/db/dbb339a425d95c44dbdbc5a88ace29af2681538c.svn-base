
<?php if(in_array(wbc()->common->get_category('category',null,array(wbc()->options->get_option('configuration','first_slug'),wbc()->options->get_option('configuration','second_slug'))),array($first_tab_category,$second_tab_category))){  ?>
<div class="ui top attached tabular menu filter_setting_advance_two_tabs" style="margin-top: 3em;">
  	<a class="item center <?php echo isset($_GET[$second_tab_id])?'':'active' ?>" data-category="<?php _e($first_tab_category); ?>" style="margin-right: 0px !important;" data-tab="filter_setting_advance_first_tabs" data-tab-name="<?php _e($first_tab_id); ?>" data-tab-altname="<?php _e($second_tab_id); ?>">
  		<!-- $prefix.'_fconfig_set' -->
  	<?php _e($first_tab_label); ?>
  	</a>

  	<a class="center item <?php echo isset($_GET[$second_tab_id])?'active':'' ?>" data-category="<?php _e($second_tab_category); ?>" style="margin-left: 0px !important;" data-tab="filter_setting_advance_second_tabs" data-tab-name="<?php _e($second_tab_id); ?>" data-tab-altname="<?php _e($first_tab_id); ?>">
    <?php _e($second_tab_label); ?>
  	</a>
  	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.filter_setting_advance_two_tabs .item').on('click',function(event){
        
        /*let _category = $("[name='_category']").val();
        _category = _category.split(',');
        if(_category.indexOf('_two_tabs')==-1){
          _category.push('_two_tabs');
          $("[name='_category']").val(_category.join(','));
        }

        $('[name="cat_filter__two_tabs"]').val($(this).data('category'));*/

        jQuery('[name="_current_category"]').val(jQuery(this).data('category'));
        jQuery('[name="_category"]').val(jQuery(this).data('category'));

        //cat_filter__two_tabs
				$('.filter_setting_advance_two_tabs .item').removeClass('active');
				$(this).addClass('active');
        let group_id = $(this).data('tab-name');
        let display_style = 'inline-block';
        <?php if(wp_is_mobile() and !wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
          display_style='block';
        <?php endif; ?>
        $('[data-tab-group="'+group_id+'"]:not(.toggle_sticky_mob_filter.advance_filter_mob)').not('[data-tab-group]:has([data-switch_filter_type-alternate])').css('display',display_style);

        let group_id_alt = $(this).data('tab-altname');
        $('[data-tab-group="'+group_id_alt+'"]').css('display','none');

        $('[data-tab-group="'+group_id_alt+'"]').each(function(){
          let reset_script = $(this).find('[data-reset]').data('reset');
          if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
            eval(reset_script);
          }          
          <?php if(wp_is_mobile() and !wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
            if($(this).hasClass('active')){
              $(this).trigger('click');
            }
            reset_script = $(this).next().find('[data-reset]').data('reset');
            if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
              eval(reset_script);
            }        
          <?php endif; ?>

          <?php if(wp_is_mobile() and wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
            if($(this).hasClass('active')){
              $(this).trigger('click');
            }          
            
            reset_script = $(this).next().find('[data-reset]').data('reset');
            if(typeof(reset_script)!==typeof(undefined) && reset_script!=''){
              eval(reset_script);
            }  

            jQuery(".close_sticky_mob_filter").trigger('click');

          <?php endif; ?>

          
        });

        <?php if(wp_is_mobile() and wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile')): ?>
          $('#advance_filter_mob_alternate').removeClass('status_hidden');
          $(".toggle_sticky_mob_filter.advance_filter_mob[data-tab-group='"+$(this).data('tab-altname')+"'],.toggle_sticky_mob_filter.advance_filter_mob[data-tab-group='']").hide();
        <?php endif; ?>
        jQuery.fn.eo_wbc_filter_change(false,'form#<?php echo $filter_ui->filter_prefix; ?>eo_wbc_filter','',{'this':this,'event':event});
			});
      //jQuery('[data-tab="filter_setting_advance_first_tabs"]').trigger('click');
      jQuery('.filter_setting_advance_two_tabs .item.active').click();
		});
	</script>
</div>
<?php } ?>