<?php
namespace eo\wbc\model\publics\component;

defined( 'ABSPATH' ) || exit;

class EOWBC_Filter_Widget {
	
	private static $_instance = null;

	public $is_shop_cat_filter = false;
	public $is_shortcode_filter = false;
	public $filter_prefix = '';

	public $cat_number = -1;
	public $cat_name_part = "";

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
			self::$_instance->_category = '';
									
			self::$_instance->first_theme = apply_filters('first_category_altr_filt_widgts',wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts',''));

			self::$_instance->second_theme = apply_filters('second_category_altr_filt_widgts',wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts',''));
		}

		return self::$_instance;
	}

	private function __construct() {

	}

	public function get_widget_standalone(array $filter) {
		
		// ACTIVE_TODO The hooks like eowbc_before_filter_widget,eowbc_after_filter_widget are not supported for this standalone function which is called only from the tiny fetures layer, so we may need to add support for it. But even better is if we simply refactore the call from tiny fetures layer and merge this function to main rendaring layer may be by creating a wrapper function so that maintainablity and reusablity can be ensured. -- to h && -- to a	
		
		$this->_category = '';
		$current_category=$this->_category;
		

		$prefix = "";
		
		//Hidden input filter lists.
		$this->__filters=array();
		//Advance filters count
		$advance_count=0;		
		//Category Filters
		if(empty($this->___category)){
			$this->___category=array();
		}
		//Attribute Filters
		$_attr_list=array();

		$non_adv_ordered_filter=array();
		$adv_ordered_filter=array();

		if(!(is_array($filter) xor is_object($filter)) or empty($filter)) return false;
		if(apply_filters('eowbc_enque_filter_assets','__return_true')){
			if( wbc()->sanitize->get('is_test') == 1 ){
				wbc_pr('eo_wbc_filter_enque_asset_f_eo_wbc_object');
			}	
			$this->eo_wbc_filter_enque_asset();
		} else {
			$this->localize_script();
		}


		if(!empty($filter) and is_array($filter)) {
			foreach($filter as $filter_key=>$filter_value) {
				$filter[$filter_key][$prefix.'_fconfig_filter'] = str_replace('pa_','',$filter[$filter_key][$prefix.'_fconfig_filter']);
			}
		}

		//map fields to names as per older version, applies to this code block only.
		$field_to_old_fields = array(
			$prefix.'_fconfig_filter'=>'name',
            $prefix.'_fconfig_type'=>'type',
            $prefix.'_fconfig_label'=>'label',
            $prefix.'_fconfig_is_advanced'=>'advance',
            $prefix.'_fconfig_dependent'=>'dependent',
            $prefix.'_fconfig_input_type'=>'input',
            $prefix.'_fconfig_column_width'=>'column_width',
            $prefix.'_fconfig_ordering'=>'order',
            $prefix.'_fconfig_icon_size'=>'icon_size',
            $prefix.'_fconfig_icon_label_size'=>'font_size',
            $prefix.'_fconfig_add_reset_link'=>'reset',
		);
		foreach ($filter as $key => $item) {
			foreach ($item as $kitm => $vitm) {
				if( array_key_exists($kitm, $field_to_old_fields) && !empty($field_to_old_fields[$kitm]) ) {
					$filter[$key][$field_to_old_fields[$kitm]] = $vitm;
				}				
			}

			if(empty($item['filter_template'])) {
				$filter[$key]['filter_template'] = 'default';
			}
		}

		foreach ($filter as $key => $item) {

			if($item['advance']==0){
				$item['order']= ( empty($item['order'])?(-1*count($non_adv_ordered_filter)):$item['order']);
				
				$item['column_width']= ( empty($item['column_width']) ? '50' : $item['column_width'] );

				$non_adv_ordered_filter[$item['order']]=$item;				
			}
			else{
				$item['order']= ( empty($item['order'])?(-1*count($adv_ordered_filter)):$item['order']);

				$item['column_width']= ( empty($item['column_width']) ? '50' : $item['column_width'] );

				$adv_ordered_filter[$item['order']]=$item;
			}
		}		
		ksort($non_adv_ordered_filter);
		ksort($adv_ordered_filter);

		?>
		<!--Primary filter button that will only be visible on desktop/tablet-->
		<!-- This widget is created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
		<div id="loading" style="z-index: -999;height: 100%; width: 100%; position: fixed; top: 0;<?php (wbc()->options->get_option('appearance_filters','appearance_filters_loader') OR apply_filters('eowbc_filter_widget_loader',false))?echo esc_attr('display:none !important;'):'';?>"></div>	
		<?php 
			if(/*wp_is_mobile()*/ wbc_is_mobile_by_page_sections('cat_shop_page')) {

				
				if(!is_wp_error($non_adv_ordered_filter) and !empty($non_adv_ordered_filter)) {

				?>
					<div class="ui grid container centered" style="margin:auto !important">
						<div class="row">
							<div class="ui button primary fluid" id="primary_filter" style="border-radius: 0 0 0 0;margin-right: 0;">Filters&nbsp;&nbsp;<i class="ui icon angle up"></i></div>
						</div>
					</div>
				<?php

				}				
				?>
					<div class="eo-wbc-container filters container">
						<div class="ui segments">    			
				<?php
				$this->load_mobile($non_adv_ordered_filter, $adv_ordered_filter);
				?>		</div>
					</div>
				<?php

				if( !empty($adv_ordered_filter) ) {
					?>
					<div class="ui grid centered">
						<div class="row">
							<div class="ui button primary" id="advance_filter" style="border-radius: 0 0 0 0;width: fit-content !important;">Advance Filter&nbsp;<i class="ui icon angle double up"></i></div>
						</div>
					</div>
					<?php			
				}

			} else {				
				$this->load_desktop($non_adv_ordered_filter, $adv_ordered_filter);				
			}
		
		wbc()->load->template('publics/filters/form', array("thisObj"=>$this,"current_category"=>$current_category,'filter_ui'=>$this)); 				
	}

	public function eo_wbc_filter_enque_asset() {

		// wbc()->load->asset('css','fomantic/semantic.min');
		// wbc()->load->asset('js','fomantic/semantic.min',array('jquery-ui-core'));
		wbc()->load->built_in_asset('semantic');
		wp_add_inline_script('fomantic-semantic.min','jQuery.fn.ui_accordion = jQuery.fn.accordion;
				jQuery.fn.ui_slider = jQuery.fn.slider;
				jQuery.fn.ui_checkbox = jQuery.fn.checkbox;');
		add_action('wp_footer',function(){
			if(false){
				?>
				<script type="text/javascript">
					/*jQuery.fn.ui_accordion = jQuery.fn.accordion;
					jQuery.fn.ui_slider = jQuery.fn.slider;
					jQuery.fn.ui_checkbox = jQuery.fn.checkbox;*/
				</script>
				<?php
			}
		},99);

		// 29-09-2022 @h  @s 
		// wbc()->load->asset('js','publics/eo_wbc_filter');
		$this->load_asset();

		wbc()->theme->load('css','filter');
        wbc()->theme->load('js','filter');
        //wbc()->load->asset('js','filter');
        
		$current_category=$this->_category;
		$site_url=site_url();

		wp_enqueue_script('jquery');	
		//wp_dequeue_script('jquery-ui-core');
		//wp_deregister_script('jquery-ui-core');
		
		add_action( 'wp_footer',function(){

			$default_color = '#dbdbdb';
			if(
				(wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts')=='sc1' and $this->_category==$this->second_category_slug) or (wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts')=='fc1' and $this->_category==$this->first_category_slug) 
			){
				$default_color = '#000';
			}

			$fg_color=wbc()->session->get('EO_WBC_BG_COLOR',$default_color);			

			$active_color=wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_active',$fg_color); //get_option('eo_wbc_active_breadcrumb_color',$fg_color);
			//wp-head here....

				//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.			
				$custom_css = "
				    .ui.labeled.ticked.range.slider .labels{
				        font-size:".wbc()->options->get_option('appearance_filters','appearance_filters_slider_font_size','0.75em',true,true)." !important;
				    }
				    .eo-wbc-container.filters > .segments > .segment:not(.secondary){
				        background-color:".wbc()->options->get_option('appearance_filters','appearance_filters_bg_primary','#ffffff',true,true)." !important;
				    }
				    .eo-wbc-container.filters > .segments > .segment.secondary{
				        background-color:".wbc()->options->get_option('appearance_filters','appearance_filters_bg_advance','#f3f4f5',true,true)." !important;
				    }
				    .wbc-button-input{
				        border-top:2px solid transparent !important;
				        border-bottom:2px solid transparent !important;
				        padding:0.5em !important;
				        text-align: center !important;
				    }
				    .wbc-button-input.eo_wbc_button_selected,.wbc-button-input:hover{
				        border-top:2px solid ".wbc()->options->get_option('appearance_filters','slider_nodes_backcolor_active',$active_color)." !important;
				        border-bottom:2px solid ".wbc()->options->get_option('appearance_filters','slider_nodes_backcolor_active',$active_color)." !important;
				    }
				    .bottom_filter_segment .ui.equal.width.grid .column{
				        display:block;
				    }
				    .ui.slider .inner .thumb{
				        cursor:default !important;
				    }
				    .toggle_sticky_mob_filter .title {
				        width:100%;
				        height:100%;
				    }
				    .ui.labeled.slider>.labels .label {
				        margin: 0 !important;
				        word-break: keep-all;
				        white-space: nowrap;
				        cursor: pointer !important;
				    }
				    .ui.images {
				        font-size: 1em !important;
				    }
				    .product-listing{
				        visibility: hidden;
				    }
				    .row-inner>.col-lg-9:eq(0){
				        visibility: hidden;
				    }
				    .term-description{
				        display:none;
				    }
				    .loading{
				        background-image:url(".constant('EOWBC_ASSET_URL')."icon/spinner.gif);
				        background-color: rgba(255,255,255, 0.6);
				        background-position: center center;
				        background-repeat: no-repeat;
				        margin: 0;
				        position:fixed;
				        top:".((!empty(wbc()->options->get_option('appearance_filters','appearance_filters_non_block_loader')))?"50%":"0")." !important;
				        left:".((!empty(wbc()->options->get_option('appearance_filters','appearance_filters_non_block_loader')))?"50%":"0")." !important;
				        z-index: 10000;
				        width: ".((!empty(wbc()->options->get_option('appearance_filters','appearance_filters_non_block_loader')))?"4.7em":"100vw")." !important;
				        height: ".((!empty(wbc()->options->get_option('appearance_filters','appearance_filters_non_block_loader')))?"4.7em":"100vh")." !important;
				        ".((!empty(wbc()->options->get_option('appearance_filters','appearance_filters_non_block_loader')))?"transform: translateX(-50%);":"")."
				    }
				    .ui.grid.container.mobile.only{
				        padding-bottom: 0px !important;
				        margin-left: 0px !important;
				        margin-right: 0px !important;
				        margin-top: 0px !important;
				    }
				    .ui.styled.fluid.accordion{
				        padding:0px !important;
				    }
				    @media only screen and (max-width: 768px) {
				        .ui.segments>.ui.segment{
				            padding:0px !important;
				        }
				    }
				    .ui.slider:not(.vertical):not(.checkbox){
				        width:auto !important;
				        padding: 1em 1em !important;
				    }
				    .ui.range.slider.text_slider{
				        padding-top:0px !important;
				    }
				    .ui.tiny.images{
				        margin-top: 1em;
				    }
				    .ui.header{
				        z-index: 0 !important;
				    }
				    .eo-wbc-container.filters{
				        text-align:left;
				        min-width:100% !important;
				        max-width:100% !important;
				        margin: 0 !important;
				        width:100% !important;
				        height: fit-content !important;
				        min-height: fit-content !important;
				        max-height: fit-content !important;
				    }
				    #eo_wbc_filter_table th,#eo_wbc_recent_table th,#eo_wbc_compare_table th{
				        background-color: ".get_option('eo_wbc_extension_table_header_color',$active_color)." !important;
				    }
				    #products_table{
				        font-family:".wbc()->options->get_option('appearance_filters','header_font','ZapfHumanist601BT-Roman')." !important;
				    }
				    .ui-widget-header{
				        border: 1px solid {$active_color} !important;
				        background: {$active_color} !important;
				        color: {$active_color} !important;
				    }
				    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active{
				        border: 1px solid {$active_color} !important;
				        background: {$active_color} !important;
				    }
				    .ui-widget.ui-widget-content{
				        border: 1px solid {$active_color} !important;
				        background: {$active_color} !important;
				    }
				    .eo_wbc_filter_icon{
				        padding-left: 2px !important;
				        padding-right: 2px !important;
				    }
				    ".(!(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2' and /*wp_is_mobile()*/ wbc_is_mobile_by_page_sections('cat_shop_page'))?".eo_wbc_filter_icon_select{
				        border-bottom:2px solid ".wbc()->options->get_option('appearance_filters','slider_nodes_backcolor_active',$active_color)." !important;
				    }                
				    .eo_wbc_filter_icon:hover:not(.none_editable){
				        border-bottom:2px solid ".wbc()->options->get_option('appearance_filters','slider_nodes_backcolor_active',$active_color)/*get_option('eo_wbc_filter_config_slidernode_color',$active_color)*/." !important;                        
				    }":"")."
				    .ui.button.primary{
				        background-color:{$active_color} !important;
				    }                                

				    .ui.slider.wbc .inner .track-fill{
				        background-color:".wbc()->options->get_option('appearance_filters','slider_track_backcolor_active',$active_color)/*get_option('eo_wbc_filter_config_slidertrack_color','')*/." !important;
				    }                
				    
				    .ui.slider.wbc .inner .thumb{
				        background-color:".wbc()->options->get_option('appearance_filters','slider_nodes_backcolor_active',$active_color)/*get_option('eo_wbc_filter_config_slidernode_color','')*/." !important;
				    }
				    .eo-wbc-container.filters, .eo-wbc-container.filters .ui.header{
				        font-family:".wbc()->options->get_option('appearance_filters','header_font','ZapfHumanist601BT-Roman')/*get_option('eo_wbc_filter_config_font_family','')*/." !important;
				    }
				    .eo-wbc-container.filters .ui.styled.accordion .title,.eo-wbc-container.filters .ui.header{
				        color:".wbc()->options->get_option('appearance_filters','header_textcolor','')/*get_option('eo_wbc_filter_config_header_color','')*/." !important;
				    }
				    .eo-wbc-container.filters .eo_wbc_filter_icon,.eo-wbc-container.filters .slider .label,.eo-wbc-container.filters input,.eo-wbc-container.filters .ui.checkbox label{
				        color:".wbc()->options->get_option('appearance_filters','labels_textcolor','')/*get_option('eo_wbc_filter_config_label_color','')*/." !important;
				    }
				    .eo_wbc_filter_icon.ui.image{
				        "./*width:fit-content !important;"./*get_option('eo_wbc_filter_config_icon_size','min-content').*/" 
				        font-size:".wbc()->options->get_option('appearance_filters','icon_label_size','0.78571429rem')." !important;
				        cursor:pointer;
				    }
				    .eo_wbc_filter_icon.ui.image img{
				        width:".wbc()->options->get_option('appearance_filters','icon_size','min-content')/*get_option('eo_wbc_filter_config_icon_size','min-content')*/." !important;
				        margin:auto auto;
				    }".(wbc()->options->get_option('filters_filter_setting','filter_icon_wrap_label',false)?".eo_wbc_filter_icon div{ word-break: break-word !important;max-width: fit-content;margin:auto !important; }":"")."

				    #help_modal{
				        max-height: 80vh;
				        margin-left: auto;
				        margin-right: auto;                        
				        margin-top: 10vh;
				        height: fit-content;
				    }

				    #help_modal .close{
				        width:auto;
				    }

				    #help_modal .close:before{
				        content: 'Close  \\f00d  ';
				        white-space: pre;
				    }
				    #help_modal .close{
				        z-index: 99 !important;
				    }

				    .ui.dimmer.modals{
				        z-index: 9999 !important;
				    }

				    #advance_filter,#apply_filter,#reset_filter{
				        width: auto !important;
				    }
				    ".((wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2' and /*wp_is_mobile()*/ wbc_is_mobile_by_page_sections('cat_shop_page'))?'#primary_filter,':'')."#advance_filter,#apply_filter{
				        background-color:".wbc()->options->get_option('appearance_wid_btns','button_backcolor_active',$active_color)." !important;
				    }".((!wp_is_mobile() and !empty(wbc()->options->get_option('appearance_filters','appearance_filters_limit_height')))?".container.filters>.segments>.ui.segment .wide.column{ height: ".wbc()->options->get_option('appearance_filters','appearance_filters_limit_height').";}":"")."
				                                
				    /*Modifications............................*/";

				wbc()->load->add_inline_style('', $custom_css, 'common');			    

				ob_start();
				if ((in_array(wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts') ,array('sc3','sc5')) and $this->_category==$this->second_category_slug) or (in_array(wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts'),array('fc3','fc5')) and $this->_category==$this->first_category_slug)) {

					//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
					$custom_css = "
					    /*.ui.labeled.ticked.slider>.labels .label:after {
					        height: 6px !important;
					        width: 3px !important;
					        top: -61.5% !important;
					        background: #ffffff !important;
					    }
					    .ui.labeled.slider>.labels .label {
					        -webkit-transform: translate(-50%,100%) !important;
					        transform: translate(-50%,100%) !important;
					    }*/
					";

					wbc()->load->add_inline_style('', $custom_css, 'common');
					echo ob_get_clean();
				}
				// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				
					$inline_script = 
					"// console.log('filter_widgets');\n" .
					"jQuery(document).ready(function(\$){\n" .
					"    jQuery.fn.wbc_flip_toggle_image=function(element){\n" .
					"        let img = jQuery(element).find('img');\n" .
					"        if(jQuery(element).hasClass('eo_wbc_filter_icon_select')) {\n" .
					"            let toggle_src = jQuery(img).attr('data-toggleimgsrc');\n" .
					"            if((typeof(toggle_src)!==typeof(undefined)) && toggle_src.trim()!==''){\n" .
					"                console.log(toggle_src);\n" .
					"                jQuery(element).addClass('toggled_image');\n" .
					"                jQuery(img).attr('src',toggle_src);\n" .
					"            }\n" .
					"        } else {\n" .
					"            let img_src = jQuery(img).attr('data-imgsrc');\n" .
					"            if((typeof(img_src)!==typeof(undefined)) && img_src.trim()!==''){\n" .
					"                console.log(img_src);\n" .
					"                jQuery(element).removeClass('toggled_image');\n" .
					"                jQuery(img).attr('src',img_src); \n" .
					"            }\n" .
					"        }\n" .
					"    }\n" .
					"    \n" .
					"    \$('.eo_wbc_filter_icon').click(function(){\n" .
					"        jQuery.fn.wbc_flip_toggle_image(this);\n" .
					"    });\n" .
					"});\n";

					wbc()->load->add_inline_script('', $inline_script, 'sp-wbc-common-footer');
				?>
				<style type="text/css">
					<?php if(wbc()->options->get_option('appearance_filters','appearance_filters_table_head_border')){ ?>
						#products_table table th {
							border: none;
						}
					<?php } ?>

					<?php if(wbc()->options->get_option('appearance_filters','appearance_filters_header_size',false,true,true)){ ?>
						.ui.header:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) {
							font-size: <?php _e(wbc()->options->get_option('appearance_filters','appearance_filters_header_size','',true,true)); ?> !important;
						}
					<?php } ?>

				</style>
				<?php
			if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1' and /*wp_is_mobile()*/ wbc_is_mobile_by_page_sections('cat_shop_page')){
				ob_start();

				//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$custom_css = "
				    /*.ui.labeled.ticked.range.slider .label:first-child span {
				        position: absolute;
				        transform: translate(-50%, -100%);
				        white-space: break-spaces;
				    }*/
				    .eo-wbc-container .toggle_sticky_mob_filter {
				        margin: 0px;					
				        text-align: center;
				        padding: 1px !important;
				        cursor: pointer;
				        max-height: 6em;
				    }
				    .eo-wbc-container .toggle_sticky_mob_filter .segment {
				        border: 1px solid grey !important;
				        padding-left: 1px !important;
				        padding-right: 1px !important;
				    }
				    .advance_filter_mob {
				        display:none;
				    }
				    #advance_filter_mob_alternate_container {
				        width: 96% !important;
				        border-top: 0px solid grey !important;
				    }
				    /*.eo-wbc-container .ui.steps .ui.equal.width.grid {
				        padding-top: 1rem;
				        padding-bottom: 1rem;
				    }*/

				    @media only screen and (max-width: 767.98px) {
				        .ui.container:not(.fluid) {
				            margin: auto !important;					
				        }
				        .ui.grid.container {
				            width:100% !important;
				        }
				    }	

				    .bottom_filter_segment {
				        position: fixed !important;
				        z-index: 99999;
				        bottom: -1em;
				        width: 100vw;
				        width: -webkit-fill-available;
				        width: -moz-available;;
				        left: 0;
				        margin-bottom: 1em !important;
				        -webkit-backface-visibility: hidden;
				        display: none;
				    }			
				    .bottom_filter_segment .ui.tiny.form .field {
				        width: -moz-fit-content !important;
				        width: max-content !important;
				    }	
				";

				wbc()->load->add_inline_style('', $custom_css, 'common');
					// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
					$inline_script = 
					"jQuery(document).ready(function(){\n" .
					"    jQuery(\".toggle_sticky_mob_filter\").on('click tap',function(){\n" .
					"        jQuery('.bottom_filter_segment.active').transition('fade up');\n" .
					"        jQuery('.bottom_filter_segment.active').toggleClass('active');\n" .
					"        jQuery(jQuery(this).data('target')).transition('fade up');\n" .
					"        jQuery(jQuery(this).data('target')).toggleClass('active');\n" .
					"    });\n" .
					"\n" .
					"    jQuery(\".close_sticky_mob_filter\").on('click tap',function(){\n" .
					"        //jQuery(jQuery(this).data('target')).transition('fade up');\n" .
					"        jQuery('.bottom_filter_segment.active').transition('fade up');\n" .
					"        jQuery('.bottom_filter_segment.active').toggleClass('active');\n" .
					"    });\n" .
					"    jQuery('#advance_filter_mob_alternate').on('click tap',function(){\n" .
					"        let is_twoTab = jQuery('.filter_setting_advance_two_tabs .item.active');\n" .
					"\n" .
					"        if(typeof(is_twoTab)!=typeof(undefined) && is_twoTab.length>0){\n" .
					"            is_twoTab = true;\n" .
					"        } else {\n" .
					"            is_twoTab = false;\n" .
					"        }\n" .
					"\n" .
					"        let advance_filter_selector = \".toggle_sticky_mob_filter.advance_filter_mob\";\n" .
					"        if(is_twoTab){\n" .
					"            advance_filter_selector = advance_filter_selector+'[data-tab-group=\"'+jQuery('.filter_setting_advance_two_tabs .item.active').data('tab-name')+'\"],'+advance_filter_selector+'[data-tab-group=\"\"]'\n" .
					"        }\n" .
					"\n" .
					"        if(jQuery('#advance_filter_mob_alternate').hasClass('status_hidden')){\n" .
					"            jQuery(\".toggle_sticky_mob_filter.advance_filter_mob\").hide();\n" .
					"\n" .
					"            jQuery('#advance_filter_mob_alternate').removeClass('status_hidden');\n" .
					"\n" .
					"        } else{\n" .
					"            jQuery(advance_filter_selector).show();\n" .
					"            jQuery('#advance_filter_mob_alternate').addClass('status_hidden');\n" .
					"        }\n" .
					"        //jQuery(\".toggle_sticky_mob_filter.advance_filter_mob\").toggle();\n" .
					"        jQuery('#advance_filter_mob_alternate .ui.icon').toggleClass('up down');\n" .
					"    });\n" .
					"});\n";

					wbc()->load->add_inline_script('', $inline_script, 'common');
				echo ob_get_clean();
			}

			if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2' and /*wp_is_mobile()*/ wbc_is_mobile_by_page_sections('cat_shop_page')){

				//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$custom_css = "
					@media screen and (max-width: 412px) {
					span[title=\"Very Strong\"][alt=\"Very Strong\"]/*
					.ui.labeled.slider>.labels .label*/{						
					    max-width: fit-content;
					    top: -1.5em;
					    left: -1em;
					    position: inherit;
					    line-height: 1;
					    white-space: break-spaces;
					}
					.ui.tabular.menu .item {
					    font-size: 0.7em !important;
					}
					}
					#products_table th {
					font-size: 0.8em !important;
					}

					.mobile_2_hidden {
					visibility: hidden !important;
					}
					i.icon.question.circle:before {
					font-size: 1em !important;
					}
					.ui.segments.transition .ui.accordion .title, .eo-wbc-container.filters .ui.header {
					text-transform: uppercase;
					}
					.ui.segments.transition {
					width: 101vw;
					margin: 1em -0.5em 0 !important;
					left: 0;
					right: 0;
					}
					.ui.button.advance_filter.transition {
					margin-left: 0;
					margin-right: 0;
					}
					.ui.eo_wbc_page {
					margin-top: 2em !important;
					}
					/* Hide scrollbar for Chrome, Safari and Opera */
					.scrollable_image_filters::-webkit-scrollbar {
					display: none;
					}
					/* Hide scrollbar for IE, Edge and Firefox */
					.scrollable_image_filters {
					-ms-overflow-style: none;  /* IE and Edge */
					scrollbar-width: none;  /* Firefox */
					}
					i.icon.plus:before {
					content: \"+\" !important;
					}
					i.icon.minus:before {
					content: \"-\" !important;
					}
					.ui.accordion i.icon:before {
					font-size: 1.5em;
					}
					.eo-wbc-container.filters .ui.styled.accordion .title, .eo-wbc-container.filters .ui.header, #primary_filter, #advance_filter {    
					font-weight: lighter;
					}
					.eo-wbc-container.filters.container {
					position: relative;
					left: -7vw;
					min-width: 102.1vw !important;
					}    
					.eo-wbc-container.filters.container:after {
					content: '';
					clear: both;
					display: block !important;
					position: relative !important;
					}
				";

				wbc()->load->add_inline_style('', $custom_css, 'common');
					// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
					$inline_script =
					"jQuery(document).ready(function(\$){\n" .
					"    \$('.eo-wbc-container.filters.container .ui.accordion .title').click(function(){\n" .
					"        let _icon = \$(this).find('i.icon:not(.question)');\n" .
					"        if(\$(_icon).hasClass('plus')){\n" .
					"            \$('.eo-wbc-container.filters.container .ui.accordion .title').find('i.icon.minus').toggleClass('plus minus');\n" .
					"            \$(_icon).toggleClass('plus minus');\n" .
					"        } else {\n" .
					"            \$(_icon).toggleClass('plus minus');\n" .
					"        }\n" .
					"    });\n" .
					"});\n";

					wbc()->load->add_inline_script('', $inline_script, 'common');
			}

			$sc_cat = wbc()->options->get_option('filters_sc_filter_setting','shop_cat_filter_category');
			if(!empty($sc_cat)){
				$sc_cat = wbc()->wc->get_term_by('term_id',$sc_cat,'product_cat');	
				if(!is_wp_error($sc_cat) and !empty($sc_cat)){
					$sc_cat = $sc_cat->slug;	
				}
			}
			
			if((wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts')=='sc4' and $this->_category==$this->second_category_slug) or (wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts')=='fc4' and $this->_category==$this->first_category_slug) or ( wbc()->options->get_option('filters_sc_altr_filt_widgts','first_category_altr_filt_widgts')=='sc4' 
					and $this->_category==$sc_cat) ){

				ob_start();
					//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
					$custom_css = "
					    #help_modal .close:before{
					        content: 'Close  X  ';
					        white-space: pre;
					        font-family:'Avenir Next' !important;
					    }

					    .eo-wbc-container>.ui.steps .step:not(:first-child):before{
					        border-left: 1em solid #d2d2d2 !important;
					    }
					    .eo-wbc-container.filters.container.ui.form, .eo-wbc-container.filters.container.ui.form .ui.header {
					        font-family: <?php echo wbc()->options->get_option('appearance_filters', 'header_font', 'ZapfHumanist601BT-Roman'); ?> !important;
					    }
					    .eo-wbc-container.filters.container.ui.form .ui.header {
					        font-size: 1em;
					    }
					    .ui.labeled.ticked.range.slider .labels {
					        height: 0px;
					        top: unset;
					        bottom: -10%;
					        font-size: 12px;
					    }
					    .ui.labeled.ticked.range.slider .labels .label::after {
					        top: unset;
					        bottom: 100%;
					    }
					    .ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon:hover:not(.none_editable) {
					        border-bottom: 0px !important;
					    }
					    .eo-wbc-container.filters.container.ui.form .ui.segments {
					        border: none !important;
					    }

					    .ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon_select,
					    .ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon:hover:not(.none_editable) {
					        border-bottom: 0px !important;
					    }
					    .eo-wbc-container.filters.container.ui.form .field:last-child {
					        margin-bottom: -1.4em;
					    }

					    .eo-wbc-container.filters.container.ui.form .field:last-child(:nth-of-type(even)) {
					        position: absolute;
					        right: 0;
					    }

					    .eo_wbc_filter_icon_select div,
					    .ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon:hover:not(.none_editable) div {
					        visibility: unset !important;
					    }
					    .eo-wbc-container.filters.container.ui.form .ui.header {
					        font-size: 0.8em;
					        text-transform: uppercase;
					    }
					    .eo-wbc-container .wide.column:not(.toggle_sticky_mob_filter) {
					        display: inline-flex !important;
					    }
					    .ui.labeled.ticked.range.slider {
					        padding-top: 0px !important;
					    }
					    .eo-wbc-container .wide.column>.wide.field.text_slider {
					        margin-top: 0.7em;
					        margin-bottom: auto;
					    }
					    .eo_wbc_filter_icon {
					        margin-top: 0px !important;
					    }
					    .icon_header {
					        margin-top: 0.5em !important;
					        margin-bottom: auto !important;
					    }
					    .eo-wbc-container.filters>.segments>.ui.segment {
					        padding-bottom: 0em !important;
					    }

					    .eo-wbc-container.filters.ui.form .three.wide.field:nth-child(even) {
					        text-align: right !important;
					    }

					    .eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(even) {
					        text-align: right;
					    }
					    .eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(even)>.wide.field.twelve {
					        position: absolute;
					        right: 0;
					        text-align: left !important;
					    }
					    #help_modal {
					        border-radius: 0 !important;
					        font-family: Avenir !important;
					    }
					    #help_modal .header {
					        border-bottom: none !important;
					    }
					";

					wbc()->load->add_inline_style('', $custom_css, 'common');
				if(!wp_is_mobile()){

					//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
					$custom_css = "
					    .eo-wbc-container.filters>.segments>.ui.segment{
					        padding-bottom: 2em !important;
					    }

					    #help_modal .close:before{
					        content: 'Close  X  ';
					        white-space: pre;
					        font-family:'Avenir Next' !important;
					    }

					    .eo-wbc-container.filters.container.ui.form .field:last-child{
					        margin-bottom: 0em !important;
					    }

					    .ui.container:not(.fluid){
					        width: 100% !important;
					        margin: 0px !important;
					    }

					    #products_table{
					        margin: 0px !important;
					    }

					    #eo_wbc_filter_table th{
					        text-align: center;
					    }

					    .eo-wbc-container .wide.column>.wide.field.text_slider{
					        margin-top: 0.4em !important;
					    }

					    .eo-wbc-container{
					        padding: 0 !important;
					    }

					    i.icon.question.circle{
					        margin-left: 0.25em;
					    }

					    .eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(odd){
					        padding-left: 0px !important;
					    }

					    .eo-wbc-container.filters.container.ui.form>.ui.segments,
					    .eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment{
					        box-shadow: none !important;
					    }

					    #reset_filter{
					        left: 1em !important;
					    }

					    .ui.labeled.ticked.range.slider.wbc ul.labels{
					        z-index: 9999;
					    }

					    .ui.labeled.ticked.range.slider .labels .label::after{
					        top: -1.6em !important;
					        width: 2px;
					        height: 1.55em;
					        background-color: transparent !important;
					    }

					    .ui.labeled.ticked.range.slider .labels{
					        bottom: -20% !important;
					    }

					    .eo-wbc-container.filters>.segments>.ui.segment{
					        padding-left: 0 !important;
					        padding-right: 0 !important;
					    }

					    .container.filters>.segments>.ui.segment .wide.column{
					        padding-right: 0px !important;
					    }
					";

					wbc()->load->add_inline_style('', $custom_css, 'common');
				}
				echo ob_get_clean();
			}

			if(wbc()->options->get_option('filters_filter_setting','filter_setting_alternate_slider_ui', false )){

				ob_start();
				
				//NOTE:From here, we have removed the original code inside the if (false) block.So, whenever there is a need to view the original or any other code for readability purposes, simply take the css below, put it in a new .css file in Sublime Text,and view it in readable format.Apart from that, we had removed the original code, and in some scenarios,that original code might have contained PHP variables like XYZ. Those would have been removed as well. And of course, even if the removed code from the if (false) block is not relevant to the current version,it might be required during future milestone tasks, so for this purpose,refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
				$custom_css = "
				    .ui.labeled.ticked.range.slider .labels .label::after{
				        top: -1em !important;
				        width: 2px;
				        height: 1.55em;
				        background-color: transparent !important;
				    }

				    .ui.labeled.ticked.range.slider .labels{
				        bottom: -20% !important;
				    }

				    .ui.labeled.ticked.slider>.labels .label:after{
				        height: 6px !important;
				        width: 3px !important;
				        top: -6px !important;
				        background: #ffffff !important;
				    }

				    .ui.slider .inner {
				        z-index: 0 !important;
				    }

				    /*.ui.labeled.slider>.labels .label{
				        -webkit-transform: translate(-50%,70%) !important;
				        transform: translate(-50%,70%) !important;
				    }*/
				";

				wbc()->load->add_inline_style('', $custom_css, 'common');
				echo ob_get_clean();
			}	

			/*if(array_intersect(array(wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts'),wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts')),array('fc4','sc4'))){*/
				/*ACTIVE_TODO_OC_START
				ACTIVE_TODO we have moved below css to standerd asset.php file but we need to move all above js css in this hook as soon as we get chance
				ACTIVE_TODO_OC_END*/ 
				// ob_start();
				?>
					<!-- <style type="text/css"> -->
						<?php /*echo wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_additional_css','');*/ ?>
					<!-- </style> -->
				<?php
				// echo ob_get_clean();
				$this->load_asset(array('filter_assets_php'=> true));

				/*
			}  */
			/*if(wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_1' and wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_active','#dde5ed')=='#dde5ed'){
				echo "<style>.ui.slider .inner .track-fill, .ui.slider .inner .thumb,#advance_filter{background-color: #9bb8d3 !important }</style>";	
			} elseif (wbc()->options->get_option('configuration','config_alternate_breadcrumb','default')=='template_2' and wbc()->options->get_option('appearance_breadcrumb','breadcrumb_backcolor_active','#f7f7f7')=='#f7f7f7') {
				echo "<style>.ui.slider .inner .track-fill, .ui.slider .inner .thumb,#advance_filter{background-color: #3e9f8e !important }</style>";
			}*/

        },10);
	
        // wp_register_script('eo_wbc_filter_js',plugins_url('asset/js/eo_wbc_filter.js',__FILE__),array('jquery'));
		// wbc()->load->asset('js','publics/eo_wbc_filter',array('jquery'));
		$this->load_asset();

		global $wp_query;
		$site_url = '';
		$product_url = '';

		$is_apply_compatibility = true; 
		
		/*if( !$this->is_shortcode_filter && !$this->is_shop_cat_filter ) {*/
			$current_category = $wp_query->get_queried_object();
			if(!empty($current_category) and !is_wp_error($current_category)){

				if (!empty($current_category->slug)) {
					
					$current_category = $current_category->slug;

				} else {

					if($is_apply_compatibility) {

						// NOTE: here this is actualy the ultimate sort to get the category id, but off cource we will need to add whenever required the specific compatibility patches like based on elementor or wpml conditions above this patche in hirarchical if structure to ensure that plateform specific issues like of wpml or elementor is handeled matuarly and using standard api.
						
						$c_res = \eo\wbc\model\SP_WBC_Compatibility::instance()->router_compatability('current_page_category_id');

						if(!empty($c_res['slug'])) {
						
							$current_category = $c_res['slug'];

						}
					} 
				}
			} else{

				$current_category=$this->_category;
			}

			if(empty($current_category)) {
				$current_category= apply_filters('eowbc_filter_widget_category_json',$this->_category);
			}

	        $site_url = esc_url(get_term_link( $current_category,'product_cat'));
	        
	      	if(strpos($site_url, '?')!==false){
	          	$site_url.='&';
	      	} else {
	          	$site_url.='?';

	      	}
	      	$product_url = $this->product_url();
		/*}*/
        
        // wp_localize_script('eo_wbc_filter_js','eo_wbc_object',array(
        // 					'eo_product_url'=>$this->product_url(),
        // 					//'eo_view_tabular'=>($current_category=='solitaire'?1:0),
        // 					'disp_regular'=>wbc()->options->get('eo_wbc_e_tabview_status',false)/*get_option('eo_wbc_e_tabview_status',false)*/?1:0,
        // 					'eo_admin_ajax_url'=>admin_url( 'admin-ajax.php'),
        // 					'eo_part_site_url'=>get_site_url().'/index.php',
        // 					'eo_part_end_url'=>'/'.$this->product_url(),
        // 					'eo_cat_site_url'=>$site_url,
        // 					'eo_cat_query'=>'/?'.http_build_query($_GET)
        /*if(empty($this->___category)) {
        	$this->___category = array();
        }

		if(!empty(wbc()->sanitize->get('_category'))) {
			$this->___category = array_replace( explode(',',wbc()->sanitize->get('_category')) , $this->___category );
			unset($_GET['_category']);
			unset($_REQUEST['_category']);
		}*/

		// ACTIVE_TODO it is temporary. and we need to clear it when we clear the eo_wbc_filter js loading. and when we clear eo_wbc_filter js loading at that time also need to drop the redundant loading of eo_wbc_filter js that is from js.vars.asset file.
		$eo_wbc_object = array("eo_wbc_object" => array(
			'eo_product_url'=>$product_url,
			//'eo_view_tabular'=>($current_category=='solitaire'?1:0),
			'disp_regular'=>wbc()->options->get('eo_wbc_e_tabview_status',false)/*get_option('eo_wbc_e_tabview_status',false)*/?1:0,
			'eo_admin_ajax_url'=>admin_url( 'admin-ajax.php'),
			'eo_part_site_url'=>get_site_url().'/index.php',
			'eo_part_end_url'=>'/'.$product_url,
			'eo_cat_site_url'=>$site_url,
			'eo_cat_query'=>http_build_query($_GET),
			'btnfilter_now'=>(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))?false:true),
			'btnreset_now'=>(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_reset_now'))?false:true),
			'_prefix_' => $this->filter_prefix,
			// ACTIVE_TODO_OC_START
			// ACTIVE_TODO temp. below is temparary js layer flag for its php counter part of the function wbc_is_mobile_by_page_sections. So as soon as php template layer is not depandent on the function wbc_is_mobile_by_page_sections than at that time set false for below flag.
			// 	-- And as soon as the js layer depandancy on this flag is removed than delete this flag from here. 
			// ACTIVE_TODO_OC_END
			'wbc_is_mobile_by_page_sections' => /*1*/(wbc_is_mobile_by_page_sections('cat_shop_page') ? 0 : 1),
		) );

		// if( wbc()->sanitize->get('is_test') == 1 ){
		// 	wbc_pr('eo_wbc_object1');
		// 	wbc_pr($eo_wbc_object);
		// }
		
		wbc()->load->asset('localize_data','publics/eo_wbc_filter',$eo_wbc_object);

        // wbc()->load->asset('localize','publics/eo_wbc_filter',array( 'eo_wbc_object' => array(
        // 					'eo_product_url'=>$product_url,
        // 					//'eo_view_tabular'=>($current_category=='solitaire'?1:0),
        // 					'disp_regular'=>wbc()->options->get('eo_wbc_e_tabview_status',false)/*get_option('eo_wbc_e_tabview_status',false)*/?1:0,
        // 					'eo_admin_ajax_url'=>admin_url( 'admin-ajax.php'),
        // 					'eo_part_site_url'=>get_site_url().'/index.php',
        // 					'eo_part_end_url'=>'/'.$product_url,
        // 					'eo_cat_site_url'=>$site_url,
        // 					'eo_cat_query'=>http_build_query($_GET),
        // 					'btnfilter_now'=>(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))?false:true),
        // 					'btnreset_now'=>(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_reset_now'))?false:true),
        // 					'_prefix_' => $this->filter_prefix,
        // 				)));
        wbc()->load->asset('localize','publics/eo_wbc_filter');

       	

        /*wp_enqueue_script('eo_wbc_filter_js');*/
        
	}	

	public function load_asset($args = array()){
		if(!empty($args['filter_assets_php'])){
			
			add_action( ( !is_admin() ? 'wp_footer'/*'wp_enqueue_scripts'*/ : 'admin_enqueue_scripts') ,function(){

				wbc()->load->asset( 'asset.php', constant( 'EOWBC_ASSET_DIR' ).'js/filter.assets.php' );
				
			}, 1049);	

		}else{

			// NOTE: below hook is currently not working and the js is loading from js vars file
			add_action( ( !is_admin() ? 'wp_enqueue_scripts' : 'admin_enqueue_scripts') ,function(){

				wbc()->load->asset('js', 'publics/eo_wbc_filter', array('jquery'), "", false, true, null, null, true);
				
			}, 1049);

		}

	}	

	public function product_url() {
		$url = '';
		if(!empty(wbc()->sanitize->get('BEGIN')) and !empty(wbc()->sanitize->get('STEP')) and isset($_GET['FIRST']) and isset($_GET['SECOND'])) {

			$__get = /*$_GET*/wbc()->sanitize->_read_global_sanitized('get');
			if(isset($__get['EO_WBC'])) {
				unset($__get['EO_WBC']);
			}
			if(isset($__get['BEGIN'])) {
				unset($__get['BEGIN']);
			}
			if(isset($__get['STEP'])) {
				unset($__get['STEP']);
			}
			if(isset($__get['FIRST'])) {
				unset($__get['FIRST']);
			}
			if(isset($__get['SECOND'])) {
				unset($__get['SECOND']);
			}

			$__get['EO_WBC'] = 1;
			$__get['BEGIN'] = wbc()->sanitize->get('BEGIN');
			$__get['STEP'] = wbc()->sanitize->get('STEP');
			$__get['FIRST'] = (
	                	/*$this->_category==$this->first_category_slug*/
		
			                (
			                    !empty(wbc()->sanitize->get('FIRST'))
			                        ? 
			                    wbc()->sanitize->get('FIRST')
			                        :
			                    ''
			                )

			            );
			$__get['SECOND'] =(
		                /*$this->_category==$this->second_category_slug*/

			            /*),
					'SECOND'=>(*/
		                /*$this->_category==wbc()->options->get_option('configuration','second_slug')
					>>>>>>> c3dc42e4fb97d6ae1ea0920712ac0ec198116dc4
			                    ?
			                ''
			                    :*/
			                (
			                    !empty(wbc()->sanitize->get('SECOND'))
			                        ?
			                    wbc()->sanitize->get('SECOND')
			                        :
			                    ''
			                )
			            );


			$url = '?'.wbc()->common->http_query($__get);
		} 
		
        return $url;
	}

	//Returns minimum value and maximum value of range;
	public function range_min_max($id,$title='',$filter_type=0,$__prefix='',$item=null) {
		
		$field_title='';	
		$field_slug='';
		$min_value=array("id"=>'',"slug"=>'',"name"=>"0","type"=>'');
		$max_value=array("id"=>'',"slug"=>'',"name"=>"0","type"=>'');
		$seprator = '.';
		if ($filter_type) {

			$term= wbc()->wc->eo_wbc_get_attribute( str_replace('pa_','',$id) );

			if(!empty($term) && !is_wp_error($term)){

				$field_title=empty($title)?$term->name:$title;		

				$field_slug=$term->slug;			

				$taxonomies=get_terms(array('taxonomy'=>wc_attribute_taxonomy_name_by_id($term->id),'hide_empty'=>false));
				if(!empty($item[$__prefix.'_fconfig_elements']) and !empty(explode(',',$item[$__prefix.'_fconfig_elements']))) {

					$elements = explode(',',$item[$__prefix.'_fconfig_elements']);
					$taxonomy = wbc()->wc->get_term_by('slug',$elements[0],$field_slug);

					$min_value=array("id"=>$taxonomies[0]->term_id,"slug"=>$taxonomies[0]->slug,"name"=>str_replace(',','.',$taxonomies[0]->name),"type"=>'attr');
					$max_value=array("id"=>$taxonomies[0]->term_id,"slug"=>$taxonomies[0]->slug,"name"=>str_replace(',','.',$taxonomies[0]->name),"type"=>'attr');

					foreach ($elements as $term_element) {

						$taxonomy = wbc()->wc->get_term_by('slug',$term_element,$field_slug);
						if(str_replace(',','.',$taxonomy->name) < str_replace(',','.',$min_value['name'])){
							$min_value=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->slug,"name"=>str_replace(',','.',$taxonomy->name),"type"=>'attr');
							//To markdown if coma is used as seperator of in numeric value.
							if(strpos($taxonomy->name,',')!==false){
								$seprator = ',';
							}
						}

						if(str_replace(',','.',$taxonomy->name) > str_replace(',','.',$max_value['name'])){
							$max_value=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->slug,"name"=>str_replace(',','.',$taxonomy->name),"type"=>'attr');
							//To markdown if coma is used as seperator of in numeric value.
							if(strpos($taxonomy->name,',')!==false){
								$seprator = ',';
							}
						}	
					}
				} else {				

					if(is_wp_error($taxonomies) or empty($taxonomies)){
                		NOTE:Changes applied on date 11-09-2025 as per the wordpress review team’s suggestion. 			
						// $taxonomies=get_terms(wc_attribute_taxonomy_name_by_id($term->id),array('hide_empty'=>false));
						$taxonomies=get_terms(array('taxonomy'=> wc_attribute_taxonomy_name_by_id($term->id),'hide_empty'=>false));

					}

					if( is_wp_error($taxonomies) or empty($taxonomies) ) return false;

					$min_value=array("id"=>$taxonomies[0]->term_id,"slug"=>$taxonomies[0]->slug,"name"=>str_replace(',','.',$taxonomies[0]->name),"type"=>'attr');
					$max_value=array("id"=>$taxonomies[0]->term_id,"slug"=>$taxonomies[0]->slug,"name"=>str_replace(',','.',$taxonomies[0]->name),"type"=>'attr');

					foreach ($taxonomies as $taxonomy){
						if(str_replace(',','.',$taxonomy->name) < str_replace(',','.',$min_value['name'])){
							$min_value=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->slug,"name"=>str_replace(',','.',$taxonomy->name),"type"=>'attr');
							//To markdown if coma is used as seperator of in numeric value.
							if(strpos($taxonomy->name,',')!==false){
								$seprator = ',';
							}
						}

						if(str_replace(',','.',$taxonomy->name) > str_replace(',','.',$max_value['name'])){
							$max_value=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->slug,"name"=>str_replace(',','.',$taxonomy->name),"type"=>'attr');
							//To markdown if coma is used as seperator of in numeric value.
							if(strpos($taxonomy->name,',')!==false){
								$seprator = ',';
							}
						}				                	  	
		        	}
		        }
			} else {
				$alternet_data = apply_filters('eowbc_filters_range_min_max',array('min_value'=>false,'max_value'=>false,'title'=>$field_title,'slug'=>$field_slug,'seprator'=>$seprator,'filter_item'=>$item));
				if($alternet_data['min_value']===false and $alternet_data['max_value']===false){
					return false;
				} else {
					return $alternet_data;
				}
			}			
		}		
		else {

			if(!empty($item[$__prefix.'_fconfig_elements']) and !empty(explode(',',$item[$__prefix.'_fconfig_elements']))) {

				$elements = explode(',',$item[$__prefix.'_fconfig_elements']);

				$sub_category = wbc()->wc->get_term_by('slug',$elements[0],'product_cat');

				$min_value=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
				$max_value=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
				
				foreach ($elements as $term_element) {

					$sub_category = wbc()->wc->get_term_by('slug',$term_element,'product_cat');
					if($sub_category->name < $min_value['name']){
						$min_value=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
					}

					if($sub_category->name > $max_value['name']){
						$max_value=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
					}
				}
			} else {

				$category=wbc()->wc->get_term_by('id',$id,'product_cat');

				if(!empty($category) && !is_wp_error($category)){

					$field_title=empty($title)?$category->name:$title;
					$field_slug=$category->slug;

					$sub_categories = get_categories(array(
			            'hierarchical' => 1,
			            'show_option_none' => '',
			            'hide_empty' => false,
			            'parent' => $id,
			            'taxonomy' => 'product_cat'
			        ));

					if( is_wp_error($sub_categories) or empty($sub_categories) ) return false;				

			        $min_value=array("id"=>$sub_categories[0]->term_id,"slug"=>$sub_categories[0]->slug,"name"=>$sub_categories[0]->name,"type"=>'cat');
					$max_value=array("id"=>$sub_categories[0]->term_id,"slug"=>$sub_categories[0]->slug,"name"=>$sub_categories[0]->name,"type"=>'cat');
					
			        foreach ($sub_categories as $sub_category) {

			        	if($sub_category->name < $min_value['name']){
							$min_value=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
						}

						if($sub_category->name > $max_value['name']){
							$max_value=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
						}
			        }			
				   
			    } else {
			    	return false;
			    }
			}
		}		

		$seprator = wbc()->options->get_option('filters_filter_setting','filter_setting_numeric_slider_seperator','.');
		
		/*return array('min_value'=>$min_value,'max_value'=>$max_value,'title'=>$field_title,'slug'=>$field_slug,'seprator'=>$seprator);*/
		
		return apply_filters('eowbc_filters_range_min_max',array('min_value'=>$min_value,'max_value'=>$max_value,'title'=>$field_title,'slug'=>$field_slug,'seprator'=>$seprator,'filter_item'=>$item));
	}
	
	public function get_width_class($percent_value = 50){		
		$percent_value = empty($percent_value)? 50 :$percent_value;

		if(empty($this->width_class)){
			$this->width_class = array( '1' =>'one wide column',
										'2' => 'two wide column',
										'3' => 'three wide column',
										'4' => 'four wide column',
										'5' => 'five wide column',
										'6' => 'six wide column',
										'7' => 'seven wide column',
										'8' => 'eight wide column',
										'9' => 'nine wide column',
										'10' => 'ten wide column',
										'11' => 'eleven wide column',
										'12' => 'twelve wide column',
										'13' => 'thirteen wide column',
										'14' => 'fourteen wide column',
										'15' => 'fifteen wide column',
										'16' => 'sixteen wide column',
									 );

		}
		return $this->width_class[($percent_value/(100/16))];
	}

	//Generate text slider/ non-labeled sliders
	public function input_text_slider($__prefix,$item/*$id,$title,$filter_type,$desktop=1,$width='50',$reset =  0,$help='',$advance = 0,$prefix=''*/) {


		extract($item);	

		$tab_set = (!empty( $item[$__prefix.'_fconfig_set'] )?$item[$__prefix.'_fconfig_set']:'');
	
		$non_edit = false;
		$id = $name;
		$title = $label;
		$filter_type = $type;
		$width = $column_width;
		$reset =  !empty($reset);		
		$help=(!empty(${$__prefix.'_fconfig_add_help'})?${$__prefix.'_fconfig_add_help_text'}:'');		
		$query_list = array();		

		$prefix='';
		if(!empty($text_slider_prefix)){
			$prefix = $text_slider_prefix;
		} elseif (!empty(${$__prefix.'_fconfig_prefix'})) {
			$prefix = ${$__prefix.'_fconfig_prefix'};
		}

		$postfix='';
		if(!empty($text_slider_postfix)){
			$postfix = $text_slider_postfix;
		} elseif (!empty(${$__prefix.'_fconfig_postfix'})) {
			$postfix = ${$__prefix.'_fconfig_postfix'};
		}


		$filter=$this->range_min_max($id,$title,$filter_type,$__prefix,$item);

		if(!$filter) return false;		

		if($type == 1) {

			$_attribute_perams = explode(',', wbc()->sanitize->get('__mapped_attribute') );
		
			if(in_array($filter['slug'], $_attribute_perams)) {
				$non_edit = true;
			}

		}else{

			throw new \Exception("Not implimented yet need to impliment type=0", 1);
		}

		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"min_".$filter['slug'],
										"id"=>"min_".$filter['slug'],
										"class"=>"text_slider_".$filter['slug'],
										"value"=>$filter['min_value']['name'],
									));

		array_push($this->__filters,array(
									"type"=>"hidden",
									"name"=>"max_".$filter['slug'],
									"id"=>"max_".$filter['slug'],
									"class"=>"text_slider_".$filter['slug'],
									"value"=>$filter['max_value']['name'],
									));

		if(empty($item['filter_template'])) {
			if($__prefix==='d'){
				$item['filter_template'] = 'fc1';
			} else {
				$item['filter_template'] = 'sc1';
			}
		}

		/*-------------*/
		// if(!empty(wbc()->sanitize->get('ATT_LINK'))) {
		// 	$query_list = array_filter(explode('|',str_replace([' ','+',','],'|',wbc()->sanitize->get('ATT_LINK'))));

		// 	/*$query_list = explode(' ',wbc()->sanitize->get('ATT_LINK'));*/

		// }

		$query_params = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('attr'), 'REQUEST', null);
		$query_paramas_options = [];
		if(in_array($filter['slug'] , $query_params)){

			$query_paramas_options = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('min_max_attr_options', $filter['slug']) , 'REQUEST', null);
		}			

		// $mark = in_array($term_item->id,$query_list);				
		$mark = $query_paramas_options;				
		/*--------------------------*/

		if($desktop):

		if(($item['filter_template']==apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme'/* and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme' and $this->_category==$this->first_category_slug*/) or ($item['filter_template'] === 'theme' and ($this->is_shop_cat_filter or $this->is_shortcode_filter))) {
				wbc()->load->template('publics/filters/theme_text_slider_desktop', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'prefix'=>$prefix,'postfix'=>$postfix,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this));

			} elseif(($item['filter_template']=='sc4' and $this->_category==$this->first_category_slug) or ($item['filter_template']=='fc4' and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/text_slider_desktop_4', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'prefix'=>$prefix,'postfix'=>$postfix,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this));
			} elseif ((in_array($item['filter_template'],array('sc3','sc5')) and $this->_category==$this->second_category_slug) or (in_array($item['filter_template'],array('fc3','fc5')) and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/text_slider_desktop_3', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'prefix'=>$prefix,'postfix'=>$postfix,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this,'mark'=>$mark));
			} else {
				wbc()->load->template('publics/filters/text_slider_desktop', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'prefix'=>$prefix,'postfix'=>$postfix,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
			}			
		elseif(apply_filters('eowbc_load_them_filters',false)):
			
			wbc()->load->template('publics/filters/theme_text_slider_mobile', array("filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'advance'=>$advance,'prefix'=>$prefix,'postfix'=>$postfix,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this));
		
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1'):
			
			wbc()->load->template('publics/filters/text_slider_mobile_alternate', array("filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'advance'=>$advance,'prefix'=>$prefix,'postfix'=>$postfix,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'):
			
			wbc()->load->template('publics/filters/text_slider_mobile_alternate_2', array("filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'advance'=>$advance,'prefix'=>$prefix,'postfix'=>$postfix,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		else:
			wbc()->load->template('publics/filters/text_slider_mobile', array("filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'prefix'=>$prefix,'postfix'=>$postfix,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		endif;
	}

	//Returns all values in range;
	//@input : filter_type - wether it is category filter or term filter;
	public function range_steps($id,$title='',$filter_type=0,$__prefix='',$item=null) {

		$list=array();		
		$field_title='';	
		$field_slug='';

		if ($filter_type) { 
			
			$term=wbc()->wc->eo_wbc_get_attribute( str_replace('pa_','',$id) );			

			if(!empty($term) && !is_wp_error($term)) {

				$field_title=empty($title)?$term->name:$title;
				$field_slug=$term->slug;

				$taxonomies=get_terms(array('taxonomy'=>wc_attribute_taxonomy_name_by_id($term->id),'hide_empty'=>false));

				if(is_wp_error($taxonomies)){

                	NOTE:Changes applied on date 11-09-2025 as per the wordpress review team’s suggestion. 				
					// $taxonomies=get_terms(wc_attribute_taxonomy_name_by_id($term->id),array('hide_empty'=>false));
					$taxonomies=get_terms(array('taxonomy'=> wc_attribute_taxonomy_name_by_id($term->id),'hide_empty'=>false));
				}

				if(is_wp_error($taxonomies) or empty($taxonomies)) return false;

				foreach ($taxonomies as $taxonomy){
					
					$list[]=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->slug,"name"=>$taxonomy->name,"type"=>'attr');                	  	
	        	}

	        } else {

	        	return false;
	        }
		}		
		else {

			$category=wbc()->wc->get_term_by('id',$id,'product_cat');
			
			if(!empty($category) && !is_wp_error($category)) {

				$field_title=empty($title)?$category->name:$title;
				$field_slug=$category->slug;

				$sub_categories = get_categories(array(
		            'hierarchical' => 1,
		            'show_option_none' => '',
		            'hide_empty' => false,
		            'parent' => $id,
		            'taxonomy' => 'product_cat'
		        ));

				if(is_wp_error($sub_categories) or empty($sub_categories)) return false;

		        foreach ($sub_categories as $sub_category) {
		        	$list[]=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
		        }

		    } else {

	        	return false;
	        }	
		}

		if(!empty($item[$__prefix."_fconfig_elements"])){
			$filter_in_list = explode(',',$item[$__prefix."_fconfig_elements"]);
			if(is_array($filter_in_list) and is_array($list) and !empty($filter_in_list) and !empty($list)){
				foreach ($list as $list_key => $list_value) {
					if(!in_array($list_value['slug'],$filter_in_list)){
						unset($list[$list_key]);
					}
				}
				$list = array_values($list);
			}
		}

		return apply_filters('eowbc_filters_range_steps',array('list'=>$list,'title'=>$field_title,'slug'=>$field_slug,'force_title'=>false,'filter_item'=>$item));			
	}

	//Generate step slider;
	public function input_step_slider($__prefix,$item/*$id,$title,$filter_type,$desktop=1,$width='50',$reset = 0,$help='',$advance = 0,$prefix=''*/) {		
		extract($item);

		$tab_set = (!empty( $item[$__prefix.'_fconfig_set'] )?$item[$__prefix.'_fconfig_set']:'');

		$non_edit = false;
		$id = $name;
		$title = $label;
		$filter_type = $type;
		$width = $column_width;
		$reset =  !empty($reset);
		$reset_label = (empty($item[$__prefix.'_fconfig_non_auto_adjust'])?true:false);
		$help=(!empty(${$__prefix.'_fconfig_add_help'})?${$__prefix.'_fconfig_add_help_text'}:'');		
		$query_list = array();

		if(!empty($text_slider_prefix)){
			$prefix = $text_slider_prefix;
		} elseif (!empty(${$__prefix.'_fconfig_prefix'})) {
			$prefix = ${$__prefix.'_fconfig_prefix'};
		}

		$filter=$this->range_steps($id,$title,$filter_type,$__prefix,$item);
		if(!empty($filter['force_title'])){
			$title = $filter['title'];
		}

		if(empty($label_max_size)){
			$label_max_size = "";
		}

		if(empty($filter)) return false;
		
		if($type == 1) {

			$_attribute_perams = explode(',', wbc()->sanitize->get('__mapped_attribute') );
		
			if(in_array($filter['slug'], $_attribute_perams)) {
				$non_edit = true;
			}

		}else{

			throw new \Exception("Not implimented yet need to impliment type=0", 1);
		}

		$items_name=wbc()->common->array_column($filter['list'],'name');			
		$items_slug=wbc()->common->array_column($filter['list'],'slug');

		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"min_".$filter['slug'],
										"id"=>'min_'.$filter['slug'],
										"class"=>"step_slider_".$filter['slug'],
										"value"=>$items_slug[0],
									));

		array_push($this->__filters,array(
									"type"=>"hidden",
									"name"=>"max_".$filter['slug'],
									"id"=>"max_".$filter['slug'],
									"class"=>"step_slider_".$filter['slug'],
									"value"=>$items_slug[count($items_slug)-1],
								));	
		
		/*-------------*/
		// if(!empty(wbc()->sanitize->get('ATT_LINK'))) {
		// 	$query_list = array_filter(explode('|',str_replace([' ','+',','],'|',wbc()->sanitize->get('ATT_LINK'))));

		// 	/*$query_list = explode(' ',wbc()->sanitize->get('ATT_LINK'));*/

		// }

		$query_params = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('attr'), 'REQUEST', null);
		$query_paramas_options = [];
		if(in_array($filter['slug'] , $query_params)){

			$query_paramas_options = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('min_max_attr_options', $filter['slug']) , 'REQUEST', null);
		}			

		// $mark = in_array($term_item->id,$query_list);				
		$mark = $query_paramas_options;				
		/*--------------------------*/		

		if($desktop):
			if(($item['filter_template']==apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme'/* and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme' and $this->_category==$this->first_category_slug*/) or ($item['filter_template'] === 'theme' and ($this->is_shop_cat_filter or $this->is_shortcode_filter))) {

				wbc()->load->template('publics/filters/theme_step_slider_desktop',  array("width_class"=>$this->get_width_class($width),"reset"=>$reset,"non_edit"=>$non_edit,"filter"=>$filter,"items_slug"=>$items_slug,"items_name"=>$items_name,'help'=>$help,'reset_label'=>$reset_label,'tab_set'=>$tab_set,'label_max_size'=>$label_max_size,'filter_ui'=>$this));

			} elseif(($item['filter_template']=='sc4' and $this->_category==$this->second_category_slug) or ($item['filter_template']=='fc4' and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/step_slider_desktop_4', array("width_class"=>$this->get_width_class($width),"reset"=>$reset,"non_edit"=>$non_edit,"filter"=>$filter,"items_slug"=>$items_slug,"items_name"=>$items_name,'help'=>$help,'reset_label'=>$reset_label,'tab_set'=>$tab_set,'label_max_size'=>$label_max_size,'filter_ui'=>$this)); 
			} elseif ((in_array($item['filter_template'],array('sc3','sc5')) and $this->_category==$this->second_category_slug) or (in_array($item['filter_template'],array('fc3','fc5')) and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/step_slider_desktop_3', array("width_class"=>$this->get_width_class($width),"reset"=>$reset,"non_edit"=>$non_edit,"filter"=>$filter,"items_slug"=>$items_slug,"items_name"=>$items_name,'help'=>$help,'reset_label'=>$reset_label,'tab_set'=>$tab_set,'label_max_size'=>$label_max_size,'filter_ui'=>$this,'mark'=>$mark)); 

			} else {

				wbc()->load->template('publics/filters/step_slider_desktop', array("width_class"=>$this->get_width_class($width),"reset"=>$reset,"non_edit"=>$non_edit,"filter"=>$filter,"items_slug"=>$items_slug,"items_name"=>$items_name,'reset_label'=>$reset_label,'tab_set'=>$tab_set,'help'=>$help,'label_max_size'=>$label_max_size,'filter_ui'=>$this)); 
			}			
		elseif(apply_filters('eowbc_load_them_filters',false)):
			
			wbc()->load->template('publics/filters/theme_step_slider_mobile', array("width_class"=>$this->get_width_class($width),"reset"=>$reset,"non_edit"=>$non_edit,"filter"=>$filter,"items_slug"=>$items_slug,"items_name"=>$items_name,'advance'=>$advance,'reset_label'=>$reset_label,'tab_set'=>$tab_set,'help'=>$help,'label_max_size'=>$label_max_size,'filter_ui'=>$this)); 		
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1'):			
			wbc()->load->template('publics/filters/step_slider_mobile_alternate', array("width_class"=>$this->get_width_class($width),"reset"=>$reset,"non_edit"=>$non_edit,"filter"=>$filter,"items_slug"=>$items_slug,"items_name"=>$items_name,'advance'=>$advance,'reset_label'=>$reset_label,'tab_set'=>$tab_set,'help'=>$help,'label_max_size'=>$label_max_size,'filter_ui'=>$this)); 
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'):			
			wbc()->load->template('publics/filters/step_slider_mobile_alternate_2', array("width_class"=>$this->get_width_class($width),"reset"=>$reset,"non_edit"=>$non_edit,"filter"=>$filter,"items_slug"=>$items_slug,"items_name"=>$items_name,'advance'=>$advance,'reset_label'=>$reset_label,'tab_set'=>$tab_set,'help'=>$help,'label_max_size'=>$label_max_size,'filter_ui'=>$this)); 
		else:
			wbc()->load->template('publics/filters/step_slider_mobile', array("width_class"=>$this->get_width_class($width),"reset"=>$reset,"non_edit"=>$non_edit,"filter"=>$filter,"items_slug"=>$items_slug,"items_name"=>$items_name,'reset_label'=>$reset_label,'tab_set'=>$tab_set,'help'=>$help,'label_max_size'=>$label_max_size,'filter_ui'=>$this)); 
		endif;
	}

	//Generate checkbox based filter option;
	public function input_checkbox($__prefix,$item/*$id,$title,$filter_type,$desktop = 1, $width = '50',$reset = 0,$help='',$advance = 0*/) {

		extract($item);
		$tab_set = (!empty( $item[$__prefix.'_fconfig_set'] )?$item[$__prefix.'_fconfig_set']:'');
		
		$non_edit = false;
		$id = $name;
		$title = $label;
		$filter_type = $type;
		$width = $column_width;
		$reset =  !empty($reset);	
		$help=(!empty(${$__prefix.'_fconfig_add_help'})?${$__prefix.'_fconfig_add_help_text'}:'');	
		
		if(!empty($text_slider_prefix)){
			$prefix = $text_slider_prefix;
		} elseif (!empty(${$__prefix.'_fconfig_prefix'})) {
			$prefix = ${$__prefix.'_fconfig_prefix'};
		}

		$filter= apply_filters( 'eowbc_public_filters_checkbox_filter', $this->range_steps($id,$title,$filter_type,$__prefix,$item), $__prefix,$item );

		if(!empty($filter['force_title'])){
			$title = $filter['title'];
		}
		if(empty($filter)) return false;

		if($type == 1) {

			$_attribute_perams = explode(',', wbc()->sanitize->get('__mapped_attribute') );
		
			if(in_array($filter['slug'], $_attribute_perams)) {
				$non_edit = true;
			}

		}else{

			throw new \Exception("Not implimented yet need to impliment type=0", 1);
		}

		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"checklist_".$filter['slug'],
										"id"=>"checklist_".$filter['slug'],
										"class"=>"",
									"value"=>implode(',',wbc()->common->array_column($filter['list'],'slug')),
									));
		if($desktop):

			if(($item['filter_template']==apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme'/* and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme' and $this->_category==$this->first_category_slug*/) or ($item['filter_template'] === 'theme' and ($this->is_shop_cat_filter or $this->is_shortcode_filter))) {

				wbc()->load->template('publics/filters/theme_checkbox_desktop',array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this));

			} elseif(($item['filter_template']=='sc4' and $this->_category==$this->second_category_slug) or ($item['filter_template']=='fc4' and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/checkbox_desktop_4', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this));
			} elseif ((in_array($item['filter_template'],array('sc3','sc5')) and $this->_category==$this->second_category_slug) or (in_array($item['filter_template'],array('fc3','fc5')) and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/checkbox_desktop_3', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this));

			} else {
				wbc()->load->template('publics/filters/checkbox_desktop', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this));

			}						
		elseif(apply_filters('eowbc_load_them_filters',false)):
			

			wbc()->load->template('publics/filters/theme_checkbox_mobile',array("filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'advance'=>$advance,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 

		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1'):			 
			wbc()->load->template('publics/filters/checkbox_mobile_alternate', array("filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'advance'=>$advance,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'):			 
			wbc()->load->template('publics/filters/checkbox_mobile_alternate_2', array("filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'advance'=>$advance,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		else:
			wbc()->load->template('publics/filters/checkbox_mobile', array("filter"=>$filter,"reset"=>$reset,"non_edit"=>$non_edit,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this));
		endif;
	}

	public function input_button($__prefix,$item/*$id,$title,$filter_type,$desktop = 1, $width = '50',$reset = 0,$help='',$advance = 0*/) {

		if(!defined('EO_WBC_FILTER_INPUT_BUTTON_CALLED')){
			define('EO_WBC_FILTER_INPUT_BUTTON_CALLED',true);
			
			?>

			<script type="text/javascript">
				
				var EO_WBC_FILTER_INPUT_BUTTON_FILTER_SLUG = [];

			</script>

			<?php

		}
			
		extract($item);
		$tab_set = (!empty( $item[$__prefix.'_fconfig_set'] )?$item[$__prefix.'_fconfig_set']:'');
		$id = $name;
		$title = $label;
		$filter_type = $type;
		$width = $column_width;
		$reset =  !empty($reset);	
		$help=(!empty(${$__prefix.'_fconfig_add_help'})?${$__prefix.'_fconfig_add_help_text'}:'');	
		
		if(!empty($text_slider_prefix)) {
			$prefix = $text_slider_prefix;
		} elseif (!empty(${$__prefix.'_fconfig_prefix'})) {
			$prefix = ${$__prefix.'_fconfig_prefix'};
		}

		$filter=$this->range_steps($id,$title,$filter_type,$__prefix,$item);
		if(!empty($filter['force_title'])){
			$title = $filter['title'];
		}
		if( wbc()->sanitize->get('is_test') == 2 ) {
			wbc_pr("input_button filter['slug']");
			wbc_pr($id);
			wbc_pr($filter_type);
			wbc_pr($filter);
		}

		/* to be commented in parag*/
		//$filter = apply_filters('eowbc_filter_button_terms', $filter,$id,$title,$filter_type,$__prefix,$item);
		
		if(empty($filter)) return false;

		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"checklist_".$filter['slug'],
										"id"=>"checklist_".$filter['slug'],
										"class"=>"",
									"value"=>/*implode(',',wbc()->common->array_column($filter['list'],'slug'))*/'',
									));
		if($desktop):
			if(($item['filter_template']==apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme'/* and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme' and $this->_category==$this->first_category_slug*/) or ($item['filter_template'] === 'theme' and ($this->is_shop_cat_filter or $this->is_shortcode_filter))) {

				wbc()->load->template('publics/filters/theme_button_desktop', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"filter_type"=>$filter_type,"reset"=>$reset,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this));

			} elseif(($item['filter_template']=='sc4' and $this->_category==$this->second_category_slug) or ($item['filter_template']=='fc4' and $this->_category==$this->first_category_slug)) {
				
				wbc()->load->template('publics/filters/button_desktop_4', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"filter_type"=>$filter_type,"reset"=>$reset,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this));

			} elseif ((in_array($item['filter_template'],array('sc3','sc5')) and $this->_category==$this->second_category_slug) or (in_array($item['filter_template'],array('fc3','fc5')) and $this->_category==$this->first_category_slug)) {
				
				wbc()->load->template('publics/filters/button_desktop_3', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this,'type'=>$type));

			} else {
			
				wbc()->load->template('publics/filters/button_desktop', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"filter_type"=>$filter_type,"reset"=>$reset,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this));
			}
		elseif(($item['filter_template']==apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme') or ($item['filter_template'] === 'theme' and ($this->is_shop_cat_filter or $this->is_shortcode_filter))): 
			
			wbc()->load->template('publics/filters/theme_button_mobile', array("width_class"=>$this->get_width_class($width),"filter"=>$filter,"reset"=>$reset,'help'=>$help,'tab_set'=>$tab_set,'filter_ui'=>$this));

		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1'):			 
			

			wbc()->load->template('publics/filters/button_mobile_alternate', array("filter"=>$filter,"reset"=>$reset,'advance'=>$advance,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'):			 
			
			wbc()->load->template('publics/filters/button_mobile_alternate_2', array("filter"=>$filter,"reset"=>$reset,'advance'=>$advance,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		else:
			
			wbc()->load->template('publics/filters/button_mobile', array("filter"=>$filter,"reset"=>$reset,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		endif;
	
		?>			
			<script type="text/javascript">
				jQuery(document).ready(function($){
					
					EO_WBC_FILTER_INPUT_BUTTON_FILTER_SLUG.push("<?php echo $filter['slug']; ?>");
					<?php
					if(false){
					?>

					// --- aa code woo-bundle-choice/asset/js/publics/eo_wbc_filter.js input_type_button_click(); ma move karyo se @a---
					// --- start ---
					// $('[data-filter-slug="<?php /*echo $filter['slug']; */?>"]').on('click',function(event){

						<?php /* if($filter_type==1):*/ ?>
					// 		let filter_target = jQuery('form#<?php /*echo $this->filter_prefix; */?>eo_wbc_filter [name="_attribute"]');
					// 	<?php /*else:*/ ?>
					// 		let filter_target = jQuery('form#<?php /*echo $this->filter_prefix; */?>eo_wbc_filter [name="_category"]');
					// 	<?php /*endif;*/?>
						
					// 	let filter_name = jQuery(this).attr('data-filter-slug');

					// 	if($(this).hasClass('eo_wbc_button_selected')){
					// 		$(this).removeClass('eo_wbc_button_selected');
					// 		let old_val = $("form#<?php //echo $this->filter_prefix; ?>eo_wbc_filter  #checklist_<?php //echo $filter['slug']; ?>").val();
					// 		old_val = old_val.split(',');
					// 		if(old_val.indexOf($(this).data('slug'))!=-1){
					// 			let _slug = $(this).data('slug');
					// 			old_val = old_val.filter(function(item){
					// 				return item==_slug?false:true;
					// 			});
					// 			new_val = old_val.join();
								// $("form#<?php /*echo $this->filter_prefix; ?>eo_wbc_filter  #checklist_<?php echo $filter['slug'];*/ ?>").val(new_val);
					// 		}

					// 	} else {
					// 		$(this).addClass('eo_wbc_button_selected');
							// let old_val = $("form#<?php /*echo $this->filter_prefix; ?>eo_wbc_filter  #checklist_<?php echo $filter['slug'];*/ ?>").val();
					// 		old_val = old_val.split(',');
					// 		if(old_val.indexOf($(this).data('slug'))==-1){
					// 			let _slug = $(this).data('slug');
					// 			old_val.push(_slug);
					// 			new_val = old_val.join();
								// $("form#<?php /*echo $this->filter_prefix;*/ ?>eo_wbc_filter  #checklist_<?php /*echo $filter['slug'];*/ ?>").val(new_val);
					// 		}
					// 	}

						// if(filter_target.val().includes(filter_name) && $("form#<?php /*echo $this->filter_prefix;*/ ?>eo_wbc_filter  #checklist_<?php /*echo $filter['slug'];*/ ?>").val().length==0) {
					// 		filter_target.val(filter_target.val().replace(','+filter_name,''));
						// } else { if((!filter_target.val().includes(filter_name)) && $("form#<?php /*echo $this->filter_prefix;*/ ?>eo_wbc_filter #checklist_<?php /*echo $filter['slug'];*/ ?>").val().length) {
					// 		filter_target.val(filter_target.val()+','+filter_name);	
					// 	} }	

						<?php /*if(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))):*/ ?>

					// 		//////// 27-05-2022 - @drashti /////////
					// 		// --add to be confirmed--
							// window.document.splugins.wbc.filters.api.eo_wbc_filter_change_wrapper(false,'form#<?php /*echo $this->filter_prefix;*/ ?>eo_wbc_filter','',{'this':this,'event':event});
					// 		// jQuery.fn.eo_wbc_filter_change(false,'form#<?php /*echo $this->filter_prefix;*/ ?>eo_wbc_filter','',{'this':this,'event':event});
					// 		////////////////////////////////////////
						<?php /*endif;*/ ?>
					// });
					// --- end ---

					// window.document.splugins.wbc.filters.api.input_type_button_click(event);
					<?php } ?>
				});
			</script>
		<?php
		
		$inline_script = 
		    "jQuery(document).ready(function(\$){\n" .
		    "    // --- aa code woo-bundle-choice/asset/js/publics/eo_wbc_filter.js input_type_button_click(); ma move karyo se @a---\n" .
		    "    // --- start ---\n" .
		    "    // commented code uper if false ma or backup file ma jova malse\n" .
		    "});\n";
    
		wbc()->load->add_inline_script('', $inline_script, 'common');
	}
	
	public function slider_price($desktop=1,$width='50', $reset = 1,$help='',$advance = 0,$prefix='') {

		$width = str_replace('%','',wbc()->options->get_option('filters_filter_setting','filter_setting_price_filter_width',$width));

		// if( wbc()->sanitize->get('is_test') == 1 ) {
						
		// 	wbc_pr("eowbc_filter_widget slider_price 1st price");
		// 	var_dump($prices);
		// }
		
		$prices = $this->get_filtered_price($this->_category);
		$min    = floor( $prices->min_price );
		$max    = ceil( $prices->max_price );

		// if( wbc()->sanitize->get('is_test') == 1 ) {
						
		// 	wbc_pr("eowbc_filter_widget slider_price 2st price");
		// 	var_dump($prices);
		// }
		
		$curr_prefix = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','price_filter_prefix');

		$alternet_slider = '';

		$category = $this->_category;
		$query_list = array();		

		if(
			($this->first_category_slug === $category and wbc()->options->get_option('appearance_filters','appearance_filters_alternate_price_filter_first',false)) 
			or 
			($this->second_category_slug === $category and wbc()->options->get_option('appearance_filters','appearance_filters_alternate_price_filter_second',false)) 
		){
			$alternet_slider = '_alternate';			
		}

		$curr_postfix = '';
		if(!empty($curr_prefix)){
			$curr_prefix = wbc()->wc->get_currency_symbol();
		} elseif(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','price_filter_postfix')) {
			$curr_postfix = wbc()->wc->get_currency_symbol();
		}		
		
		/*$min = $curr_prefix.$min.$curr_postfix;
		$max = $curr_prefix.$max.$curr_postfix;
		*/
		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"min_price",
										"id"=>"min_price",
										"class"=>"text_slider_price",
										"value"=>$min,
									));

		array_push($this->__filters,array(
									"type"=>"hidden",
									"name"=>"max_price",
									"id"=>"max_price",
									"class"=>"text_slider_price",
									"value"=>$max,
								));
		$seprator = wbc()->options->get_option('filters_filter_setting','filter_setting_numeric_slider_seperator','.');
		
		if(!empty(wbc()->sanitize->get('min_price')) || !empty(wbc()->sanitize->get('max_price'))) {
			// -- need to plan flow for this -- to h
				// NOTE: since we are just continuing with older flow of m so nothing to here as of now, but if required than we need to manage     
			$query_list = \eo\wbc\model\SP_WBC_Router::instance()->set_query_params_formatted( 'to_filter_field', 
										                array('price_range'), 
										                \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form',
																		                array('price_range'),
																		                'REQUEST',
																		                null))/*wbc()->sanitize->get('CAT_LINK')*/;
		}
		
		$mark = $query_list;
		// $query_paramas_options = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('attr_options', $term->slug) , 'REQUEST', null);

		if($desktop):
			/*===bhavesh@emptyops.com comment foe price filter===*/
			if(/*($this->second_theme=='theme_dropdown' and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme_dropdown' and $this->_category==$this->first_category_slug)*/ (in_array(apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme_dropdown',array_column($this->__filters__,'filter_template')) !== false ) or (in_array('theme_dropdown',array_column($this->__filters__,'filter_template')) !==false)) {
				
				wbc()->load->template('publics/filters/theme_dropdown_slider_price_desktop', array("width_class"=>$this->get_width_class($width),"min"=>$min,"max"=>$max,"reset"=>$reset,'help'=>$help,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'filter_ui'=>$this));

			} elseif(/*($this->second_theme=='theme' and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme' and $this->_category==$this->first_category_slug)*/ (in_array(apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme',array_column($this->__filters__,'filter_template')) !== false ) or (in_array('theme',array_column($this->__filters__,'filter_template')) !==false)) {
				
				wbc()->load->template('publics/filters/theme_slider_price_desktop', array("width_class"=>$this->get_width_class($width),"min"=>$min,"max"=>$max,"reset"=>$reset,'help'=>$help,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'filter_ui'=>$this));

			} elseif((wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts')=='sc4' and $this->_category==$this->second_category_slug) or (wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts')=='fc4' and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/slider_price_desktop_4'.$alternet_slider, array("width_class"=>$this->get_width_class($width),"min"=>$min,"max"=>$max,"reset"=>$reset,'help'=>$help,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'filter_ui'=>$this)); 
			} elseif ((in_array(wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts'),array('sc3','sc5')) and $this->_category==$this->second_category_slug) or (in_array(wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts'),array('fc3','fc5')) and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/slider_price_desktop_3'.$alternet_slider, array("width_class"=>$this->get_width_class($width),"min"=>$min,"max"=>$max,"reset"=>$reset,'help'=>$help,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'filter_ui'=>$this,'mark'=>$mark)); 
			}  else {

				wbc()->load->template('publics/filters/slider_price_desktop'.$alternet_slider, array("width_class"=>$this->get_width_class($width),"min"=>$min,"max"=>$max,"reset"=>$reset,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'help'=>$help,'filter_ui'=>$this)); 
			}
		elseif(apply_filters('eowbc_load_them_filters',false)):
			
			wbc()->load->template('publics/filters/theme_slider_price_mobile', array("min"=>$min,"max"=>$max,"reset"=>$reset,'advance'=>$advance,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'help'=>$help,'filter_ui'=>$this));

		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1'):			
			wbc()->load->template('publics/filters/slider_price_mobile_alternate', array("min"=>$min,"max"=>$max,"reset"=>$reset,'advance'=>$advance,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'help'=>$help,'filter_ui'=>$this));
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'):
			wbc()->load->template('publics/filters/slider_price_mobile_alternate_2', array("min"=>$min,"max"=>$max,"reset"=>$reset,'advance'=>$advance,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'help'=>$help,'filter_ui'=>$this));
		else:
			wbc()->load->template('publics/filters/slider_price_mobile', array("min"=>$min,"max"=>$max,"reset"=>$reset,'seprator'=>$seprator,'prefix'=>$curr_prefix,'postfix'=>$curr_postfix,'help'=>$help,'filter_ui'=>$this));
		endif;			
	}
	
	public function load_mobile($general_filters, $advance_filters) {

		if( file_exists(apply_filters('eowbc_template_path',constant('EOWBC_TEMPLATE_DIR')."'publics/filters/theme_mobile_grid'.php",'publics/filters/theme_mobile_grid',array('general_filters'=>$general_filters,'advance_filters'=>$advance_filters,'filter_ui'=>$this)) ) ) {

			wbc()->load->template('publics/filters/theme_mobile_grid',array('general_filters'=>$general_filters,'advance_filters'=>$advance_filters,'filter_ui'=>$this));

		} elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1') {

			$this->load_grid_mobile($general_filters);
			$order = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','price_filter_order_'.$this->cat_name_part.'_cat','');
			if( !$this->is_shortcode_filter && !wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','hide_price_filter_'.$this->cat_name_part.'_cat',false) && wbc()->common->nonZeroEmpty($order) ) {
				$this->slider_price(0);
			}
			if(!is_wp_error($advance_filters) and !empty($advance_filters)) {
				$this->load_grid_mobile($advance_filters,1);
			}
		} else {
			?><div class="ui segment"><?php
				?><div class="ui styled fluid accordion" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important;border: 0 !important; box-shadow: 0 0 0 transparent;"><?php
					$this->load_grid_mobile($general_filters);
					$order = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','price_filter_order_'.$this->cat_name_part.'_cat','');
					if( !$this->is_shortcode_filter && !wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','hide_price_filter_'.$this->cat_name_part.'_cat',false) && wbc()->common->nonZeroEmpty($order) && !(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2') ) {
						$this->slider_price(0);
					}
				?></div><?php
			?></div><?php
			if(!is_wp_error($advance_filters) and !empty($advance_filters)) {
				?><div class="ui segment secondary"><?php
					?><div class="ui styled fluid accordion" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important;"><?php
						$this->load_grid_mobile($advance_filters);					
					?></div><?php
				?></div><?php
			}
		}
	}

	public function load_grid_mobile($filter,$advance=0) {
		foreach ($filter as $key => $item) {

			if($item["type"] == "price_filter") {
				$this->slider_price(0);
				continue;
			}

			$item['advance']=$advance;
			$item['desktop']=0;
			if($item['type']==0 && ($item['input']=='icon' OR $item['input']=='icon_text')) {
				
				$this->eo_wbc_filter_ui_icon($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],$item['input'],0,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false),0,(isset($item['child_label'])?$item['child_label']:false),(isset($item['popup'])?$item['popup']:false),$advance*/);								
				$term = @wbc()->wc->get_term_by('id',$item['name'],'product_cat');
				if(!empty($term) and !is_wp_error($term)){
					$this->___category[]=$term->slug;	
				}				
			}
			// elseif ($item['type']==0 ) {

			// 	$this->input_step_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],0,$item['column_width'],0,(isset($item['popup'])?$item['popup']:false),$advance*/);		
			// }
			elseif($item['type']==0 || $item['type']==1 || $item['type']=='two_tabs') {				
				switch ($item['input']) {
					case 'icon':
					case 'icon_text':												
						$this->eo_wbc_filter_ui_icon($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],$item['input'],0,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false),(isset($item['child_label'])?$item['child_label']:false),0,(isset($item['popup'])?$item['popup']:false),$advance*/);
						break;
					case 'numeric_slider':
						$this->input_text_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],0,$item['column_width'],0,(isset($item['popup'])?$item['popup']:false),$advance,(isset($item['text_slider_prefix'])?$item['text_slider_prefix']:false)*/);
						break;
					case 'text_slider':
						$this->input_step_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],0,$item['column_width'],0,(isset($item['popup'])?$item['popup']:false),$advance*/);
						break;
					case 'checkbox':
						$this->input_checkbox($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],0,$item['column_width'],0,(isset($item['popup'])?$item['popup']:false),$advance*/);
						break;
					case 'button':
						$this->input_button($this->__prefix,$item);
						break;						
					case 'toggle_column':
						$this->toggle_column($this->__prefix,$item);
						break;
					case 'two_tabs':
							$this->two_tabs($this->__prefix,$item);
							break;
					default:
						$this->input_step_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],0,$item['column_width'],0,(isset($item['popup'])?$item['popup']:false),$advance*/);
				}
				$term=wbc()->wc->eo_wbc_get_attribute($item['name']);
				if(!empty($term) and !is_wp_error( $term )){
					$_attr_list[]=$term->slug;	
				}				
			}
		}
	}


	public function load_desktop($general_filters, $advance_filters) {		
		wbc()->load->template('publics/filters/load_desktop',array('general_filters'=>$general_filters,'advance_filters'=>$advance_filters,'filter_ui'=>$this));
	}

	public function load_grid_desktop($filters,$advance) {
		// wbc_pr('e load_grid_desktop()');
		if(!empty($filters) && (is_array($filters) or is_object($filters) ) ){
			foreach ($filters as $key => $item) {

				if( $item["type"] == "price_filter" ) {
					$this->slider_price();
					continue;
				}
				$item['advance']=$advance;
				$item['desktop']=1;			
				if($item['type']==0 && ($item['input']=='icon' OR $item['input']=='icon_text')) {					 
					
					$this->eo_wbc_filter_ui_icon($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],$item['input'],1,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false),$reset=!empty($item['reset']),false,false,(!empty($item[$this->__prefix.'_fconfig_add_help_text'])?$item[$this->__prefix.'_fconfig_add_help_text']:'')*/);							
									
						$term = wbc()->wc->get_term_by('id',$item['name'],'product_cat');

						if( !empty( $term ) and !is_wp_error( $term ) ) {
							$this->___category[] = $term->slug;
						}
				} 
				//elseif ($item['type']==0 ) {

					//$this->input_step_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,$item['column_width'],$reset=!empty($item['reset'])*/);		
				//}
				elseif($item['type']==0 || $item['type']==1 || $item['type']=='two_tabs' ) {
					switch ($item['input']) {
						case 'icon':
						case 'icon_text':												
							$this->eo_wbc_filter_ui_icon($this->__prefix,$item);				
							break;
						case 'numeric_slider':							
							$this->input_text_slider($this->__prefix,$item);
							break;
						case 'text_slider':
							$this->input_step_slider($this->__prefix,$item);
							break;
						case 'checkbox':
							$this->input_checkbox($this->__prefix,$item);
							break;
						case 'button':
							$this->input_button($this->__prefix,$item);
							break;
						case 'toggle_column':
							$this->toggle_column($this->__prefix,$item);
							break;
						case 'two_tabs':
							$this->two_tabs($this->__prefix,$item);
							break;
						default:
							$this->input_step_slider($this->__prefix,$item);
					}		
					$term = wbc()->wc->eo_wbc_get_attribute($item['name']);		
					if(!empty($term) and !is_wp_error($term) ){
						$_attr_list[]=$term->slug;	
					}			
				}
			}
		}		
	}

	public function two_tabs($prefix,$item){
		$item['filter_ui'] = $this;
		if(($this->first_theme==apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme'/*$this->second_theme=='theme'*//* and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme' and $this->_category==$this->first_category_slug*/) or $this->first_theme === 'theme') {
			// var_dump('two_tabs() filter_widgets');
			if(/*wp_is_mobile()*/ wbc_is_mobile_by_page_sections('cat_shop_page')){
				wbc()->load->template('publics/filters/theme_two_tabs_mobile',$item);
			} else {
				wbc()->load->template('publics/filters/theme_two_tabs',$item);
			}
				
		} else {
			wbc()->load->template('publics/filters/two_tabs',$item);
		}
	}

	//Generate dropdown based filter option;
	public function input_dropdown($slug,$items_name,$items_slug,$id,$type,$opt_title='All') {

		$list_items = array_combine($items_name,$items_slug);

		?>
		<div data-tab-group="">
		    <select style="width: 100%;" name="<?php echo esc_attr($type == 0 ? 'cat_filter_' . $slug : 'dropdown_' . $slug); ?>" id="dropdown_<?php echo esc_attr($slug); ?>" data-slug="<?php echo esc_attr($slug); ?>" data-role="dropdown" data-input="dropdown" data-filter-id="<?php echo esc_attr($id); ?>" data-type="<?php echo esc_attr($type); ?>">

		        <option selected="selected" value=""><?php echo esc_html($opt_title); ?></option>
		        <?php foreach ($list_items as $name => $slug) : ?>
		            <option value="<?php echo esc_attr($slug); ?>"><?php echo esc_html($name); ?></option>
		        <?php endforeach; ?>
		    </select>
		</div>
		<?php
	}

	public function load_collapsable_desktop($general_filters, $advance_filters) {
		// wbc_pr('e load_collapsable_desktop()');
		$filters = array_merge($general_filters,$advance_filters);

		if(!is_wp_error($filters) and !empty($filters)){
			?><div class="ui text menu"><?php	
			foreach ($filters as $item_index=>$item) {
				if($item["type"]=='two_tabs'){
					continue;
				}
				if( $item["type"] == "price_filter" ) {
					$this->load_collapsable_desktop_price_filter();
					continue;
				}

				$item['advance']=0;
				$item['desktop']=1;
 				$term = null;
				if($item['type']==0){
					$term = wbc()->wc->get_term_by('id',$item['name'],'product_cat');
				} else {
					$term = wbc()->wc->eo_wbc_get_attribute($item['name']);
				}				
				?>				
				
				<a class="ui dropdown item">
					<?php echo esc_html($term->name); ?>
					&nbsp;<i class="chevron down icon"></i>
					<div class="menu">
						<div class="item" style="width: max-content !important;min-width: 33vw;display: table-cell;">
				
				    <?php 
				      	if($item['type']==0 && ($item['input']=='icon' OR $item['input']=='icon_text')) {

							$this->eo_wbc_filter_ui_icon($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],$item['input'],1,100,(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false),$reset=!empty($item['reset'])*/);							
											
								$term = wbc()->wc->get_term_by('id',$item['name'],'product_cat');

								if( !empty( $term ) and !is_wp_error( $term ) ) {
									$this->___category[] = $term->slug;
								}
						} elseif ($item['type']==0 || $item['type']=='two_tabs') {
							//on 27-06-2020 now added support for all missing input types. as discussed between hiren and mahesh. 
							// $this->input_step_slider($item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset']));		
							switch ($item['input']) {
								case 'numeric_slider':
									$this->input_text_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset'])*/);
									break;
								case 'text_slider':
									$this->input_step_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset'])*/);
									break;
								case 'checkbox':
									$this->input_checkbox($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset'])*/);
									break;
								case 'button':
									$this->input_button($this->__prefix,$item);
									break;
								case 'toggle_column':
									$this->toggle_column($this->__prefix,$item);
									break;
								case 'two_tabs':
									$this->two_tabs($this->__prefix,$item);
									break;
								default:
									$this->input_step_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset'])*/);
							}		
							$term = wbc()->wc->eo_wbc_get_attribute($item['name']);		
							if(!empty($term) and !is_wp_error($term) ){
								$_attr_list[]=$term->slug;	
							}	
						}
						elseif($item['type']==1 ) {
							switch ($item['input']) {
								case 'icon':
								case 'icon_text':												
									$this->eo_wbc_filter_ui_icon($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],$item['input'],1,100,(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false),$reset=!empty($item['reset'])*/);				
									break;
								case 'numeric_slider':
									$this->input_text_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset'])*/);
									break;
								case 'text_slider':
									$this->input_step_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset'])*/);
									break;
								case 'checkbox':
									$this->input_checkbox($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset'])*/);
									break;
								case 'button':
									$this->input_button($this->__prefix,$item);
									break;
								case 'toggle_column':
									$this->toggle_column($this->__prefix,$item);
									break;
								case 'two_tabs':
									$this->two_tabs($this->__prefix,$item);
									break;					
								default:
									$this->input_step_slider($this->__prefix,$item/*$item['name'],$item['label'],$item['type'],1,100,$reset=!empty($item['reset'])*/);
							}		
							$term = wbc()->wc->eo_wbc_get_attribute($item['name']);		
							if(!empty($term) and !is_wp_error($term) ){
								$_attr_list[]=$term->slug;	
							}			
						}
				    ?>				
						</div>
					</div>
				</a>	
				<?php				
			}

			$order = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','price_filter_order_'.$this->cat_name_part.'_cat','');
			if( !$this->is_shortcode_filter && !wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','hide_price_filter_'.$this->cat_name_part.'_cat',false) && wbc()->common->nonZeroEmpty($order) ) {
				$this->load_collapsable_desktop_price_filter();
			}
			?></div><?php			
		}
		// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$inline_script =
		"jQuery(document).ready(function(){\n" .
		"    jQuery('.dropdown').dropdown({\n" .
		"        keepOnScreen: true,\n" .
		"        on: 'hover',\n" .
		"        onShow: function() {\n" .
		"            toggle_ = jQuery(this).find('.icon');\n" .
		"            jQuery(toggle_).removeClass('down');\n" .
		"            jQuery(toggle_).addClass('up');\n" .
		"        },\n" .
		"        onHide: function() {\n" .
		"            toggle_ = jQuery(this).find('.icon');\n" .
		"            jQuery(toggle_).removeClass('up');\n" .
		"            jQuery(toggle_).addClass('down');\n" .
		"        }\n" .
		"    });\n" .
		"});\n";

		wbc()->load->add_inline_script('', $inline_script, 'sp-wbc-common-footer');
	}
	
	public function load_collapsable_desktop_price_filter() {
		?><a class="ui dropdown item"><?php echo wbc()->options->get_option('appearance_filters','appearance_filters_price_filter_title_text','Price',false,true);?>&nbsp;<i class="chevron down icon"></i>
			<div class="menu">
				<div class="item" style="width: max-content !important;min-width: 33vw;max-width: 33vw;display: table-cell;">				
					<?php $this->slider_price(); ?>
				</div>
			</div>
		</a>
		<?php
	}

	public function eo_wbc_filter_ui_icon($__prefix,$item/*$id,$title='',$type=0,$input='icon',$desktop=1,$width='50',$icon_width=FALSE,$label_size=FALSE,$reset = 0,$child_label=false,$hidden = false,$help='',$advance=0*/) {
		// var_dump('icon_filter');
		// ACTIVE_TODO temp. 
		if(!defined('EO_WBC_FILTER_UI_ICON_CALLED')){
			define('EO_WBC_FILTER_UI_ICON_CALLED',true);
			// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
			$inline_script =
			"var EO_WBC_FILTER_UI_ICON_TERM_SLUG = [];\n" .
			"\n" .
			"// console.log('EO_WBC_FILTER_UI_ICON_TERM_SLUG empty');\n" .
			"// console.log(EO_WBC_FILTER_UI_ICON_TERM_SLUG);\n\n";

			wbc()->load->add_inline_script('', $inline_script, 'sp-wbc-common-footer');
		}

		global $sitepress;

		$current_language = '';
		if(!empty($sitepress)) {
			//remove_filter('get_term', array($sitepress,'get_term_adjust_id'), 1, 1);
			$current_language = constant('ICL_LANGUAGE_CODE');
			$sitepress->switch_lang('en');
		}

		extract($item);
		$tab_set = (!empty( $item[$__prefix.'_fconfig_set'] )?$item[$__prefix.'_fconfig_set']:'');
		$id=$name;
		$title=$label;
		$width=$column_width;
		$icon_width = (isset($icon_size)?$icon_size:wbc()->options->get_option('appearance_filters','icon_size','min-content','30px'));
		$label_size = (isset($font_size)?$font_size:false);
		$reset = !empty($reset);
		$child_label = (isset($child_label)?$child_label:false);		
		$help=(!empty(${$__prefix.'_fconfig_add_help'})?${$__prefix.'_fconfig_add_help_text'}:'');		
		$hidden = !empty($hidden);
		$is_single_select = (!empty(${$__prefix.'_fconfig_is_single_select'})?1:0);
		
		global $woocommerce;
		$icon_css = '';
		if($input == 'icon'){
			$icon_css.=($icon_width?'width:'.$icon_width.' !important;':'');
		} elseif($input == 'icon_text'){
			$icon_css.=($icon_width?'width:'.$icon_width.' !important;':'').($label_size?'font-size:'.$label_size.' !important;':'');
		}

		$term = False;
		$non_edit=false;
		$list=array();
		$cat_filter_list=array();
		$term_list = array();

		if($type == 1){
			$term = wbc()->wc->eo_wbc_get_attribute($id);
			$filter = $this->range_steps($id,$title,$type,$__prefix,$item);			
			if(!empty($filter['force_title'])){			
				$title = $filter['title'];
			}
			$term_list = $filter['list'];
		} else{

			$term = wbc()->wc->get_term_by('term_taxonomy_id',apply_filters( 'wpml_object_id',$id,'category', TRUE/*FALSE the FALSE commented and TRUE is added on 14-09-2023, it is to ensure that original is used if the translation is missing*/, 'en'),'product_cat');

			$term_list = wbc()->wc->get_terms(apply_filters( 'wpml_object_id',$term->term_id,'category', TRUE/*FALSE the FALSE commented and TRUE is added on 14-09-2023, it is to ensure that original is used if the translation is missing*/, 'en'),'menu_order');
									
			if(!empty($item[$__prefix."_fconfig_elements"])){
				$filter_in_list = explode(',',$item[$__prefix."_fconfig_elements"]);

				if(is_array($filter_in_list) and is_array($term_list) and !empty($filter_in_list) and !empty($term_list)){
					
					foreach ($term_list as $list_key => $list_value) {

						if(!in_array($list_value->term_id,$filter_in_list)){
							unset($term_list[$list_key]);
						}
					}
					//$term_list = array_values($term_list);
				}
			}
			
			/*$term = wbc()->wc->get_term_by('id',$id,'product_cat');
			$term_list = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC', 'child_of'=>$id));*/
		}

		if( empty($term) or is_wp_error($term) ) return false;

		if(empty($term_list) or is_wp_error($term_list) or !(is_array($term_list) or is_object($term_list))) return false;
		
		foreach ($term_list  as $term_item) {
			$term_item = (object)$term_item;
			if(!empty($term_item) and is_object($term_item))
			$icon = '';
			$select_icon = '';
			$mark = false;

			$query_list = array();

			if(empty($term_item->term_id) and $type == 1){

				$icon = get_term_meta( $term_item->id, $term->slug . '_attachment',true);
				if(empty($icon)) {					
					$icon = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
				}

				if(!empty(wbc()->sanitize->get('ATT_LINK'))) {
					$query_list = array_filter(explode('|',str_replace([' ','+',','],'|',wbc()->sanitize->get('ATT_LINK'))));

					/*$query_list = explode(' ',wbc()->sanitize->get('ATT_LINK'));*/

				}

				$query_params = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('attr'), 'REQUEST', null);
				$query_paramas_options = [];
				if(in_array($term->slug , $query_params)){

					$query_paramas_options = \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_filter_form', array('attr_options', $term->slug) , 'REQUEST', null);
				}			

				// $mark = in_array($term_item->id,$query_list);				
				$mark = in_array($term_item->slug,$query_paramas_options);				

				// ACTIVE_TODO if non edit required to be supported by our new router based url attribute support than need to manage below 
				// if($non_edit==false && in_array($term_item->id,$query_list)) {
				if($non_edit==false && $mark) {
					$non_edit=true;						
				}
				$select_icon = get_term_meta($term_item->id, 'wbc_attachment',true);
				
				/*if(empty($select_icon)) {					
					$select_icon = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
				}*/

			} else {
				$icon = wp_get_attachment_url( @get_term_meta( $term_item->term_id, 'thumbnail_id', true ));

				if(empty($icon)) {					
					$icon = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
				}			
				
				if(!empty(wbc()->sanitize->get('CAT_LINK'))) {
					// -- need to plan flow for this -- to h
						// NOTE: since we are just continuing with older flow of m so nothing to here as of now, but if required than we need to manage     
					$query_list = array_filter(explode('|',str_replace([' ','+',','],'|',\eo\wbc\model\SP_WBC_Router::instance()->set_query_params_formatted( 'to_filter_field', 
												                array('prod_cat'), 
												                \eo\wbc\model\SP_WBC_Router::instance()->get_query_params_formatted('url_and_form_field_raw',
																				                array('prod_cat'),
																				                'REQUEST',
																				                null))/*wbc()->sanitize->get('CAT_LINK')*/)));

					/*$query_list = explode('|', str_replace('' wbc()->sanitize->get('CAT_LINK') );*/

				}

				$mark = in_array($term_item->slug,$query_list);

				if($non_edit==false && in_array($term_item->slug,$query_list)) {
					$non_edit=true;						
				}

				$select_icon = get_term_meta($term_item->term_id, 'wbc_attachment',true);
				/*if(empty($select_icon)) {					
					$select_icon = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
				}*/
			}

			$truncate_words = wbc()->options->get_option('filters_filter_setting','filter_icon_wrap_filter_label',0,true,true);

			$list[]=array("icon" => $icon ,
							'select_icon'=>$select_icon,
							"name" => (empty($truncate_words)?$term_item->name:implode(' ',array_slice(explode(' ',$term_item->name),0,$truncate_words))),
							"slug"=> $term_item->slug,
							"mark"=> $mark
						);					

			if(in_array($term_item->slug,$query_list)) {
				$cat_filter_list[]=$term_item->slug;
			}
		}

		if( empty($list) ) return false;

		$title=(!empty($title) ? $title : $term->name);
		
		if($type == 1){
			array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"checklist_".$term->slug,
										"id"=>"checklist_".$term->slug,
										"class"=>"",
										"value"=>implode(',',$cat_filter_list),
									));
		} else {

			array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"cat_filter_".$term->slug,
										"id"=>"cat_filter_".$term->slug,
										"class"=>"",
										"value"=>implode(',', $cat_filter_list),
										"edit"=>($non_edit?'0':'1'),
									));
		}
		

		/*var_dump($this->filter_prefix);
		var_dump(apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme');
		var_dump($item['filter_template']);
		die();*/

		if($desktop):
			
			if(($item['filter_template']==apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme_dropdown'/* and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme' and $this->_category==$this->first_category_slug*/)or ($item['filter_template'] === 'theme_dropdown' and ($this->is_shop_cat_filter or $this->is_shortcode_filter))) {

				wbc()->load->template('publics/filters/theme_dropdown_icon_desktop', array("width_class"=>$this->get_width_class($width),"term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,'icon_width'=>$icon_width,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'help'=>$help,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'filter_ui'=>$this));

			} elseif(($item['filter_template']==apply_filters('eowbc_filter_prefix',$this->filter_prefix).'theme'/* and $this->_category==$this->second_category_slug) or ($this->first_theme=='theme' and $this->_category==$this->first_category_slug*/) or ($item['filter_template'] === 'theme' and ($this->is_shop_cat_filter or $this->is_shortcode_filter))) {

				wbc()->load->template('publics/filters/theme_icon_desktop', array("width_class"=>$this->get_width_class($width),"term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,'icon_width'=>$icon_width,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'help'=>$help,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'filter_ui'=>$this));

			} elseif(($item['filter_template']=='sc4' and $this->_category==$this->second_category_slug) or ($item['filter_template']=='fc4' and $this->_category==$this->first_category_slug)) {
				
				wbc()->load->template('publics/filters/icon_desktop_4', array("width_class"=>$this->get_width_class($width),"term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,'icon_width'=>$icon_width,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'help'=>$help,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'filter_ui'=>$this));
			} elseif ((in_array($item['filter_template'],array('sc3','sc5')) and $this->_category==$this->second_category_slug) or (in_array($item['filter_template'],array('fc3','fc5')) and $this->_category==$this->first_category_slug)) {
				wbc()->load->template('publics/filters/icon_desktop_3', array("width_class"=>$this->get_width_class($width),"term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'help'=>$help,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'filter_ui'=>$this));
			} else {

				wbc()->load->template('publics/filters/icon_desktop', array("width_class"=>$this->get_width_class($width),"term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this));
			}

		elseif(apply_filters('eowbc_load_them_filters',false)):
			wbc()->load->template('publics/filters/theme_icon_mobile', array("term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this));
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_1'):			
			wbc()->load->template('publics/filters/icon_mobile_alternate', array("term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'advance'=>$advance,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
		elseif(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2'):
			if(!empty($item['outer_container'])){
				wbc()->load->template('publics/filters/icon_mobile_alternate_2_outer', array("term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'advance'=>$advance,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
			} else{
				wbc()->load->template('publics/filters/icon_mobile_alternate_2', array("term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'advance'=>$advance,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this)); 
			}
		else:
			wbc()->load->template('publics/filters/icon_mobile', array("term"=>$term,"title"=>$title,"list"=>$list,"icon_css"=>$icon_css,"reset"=>$reset,"input"=>$input,"type"=>$type,"non_edit"=>$non_edit,'hidden'=>$hidden,'is_single_select'=>$is_single_select,'tab_set'=>$tab_set,'help'=>$help,'filter_ui'=>$this));
		endif;
		$term_slug = $term->slug;
		$this_filter_prefix = $this->filter_prefix;

		// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$inline_script = 
		    "jQuery(document).ready(function(\$){\n" .
		    "    console.log('EO_WBC_FILTER_UI_ICON_TERM_SLUG');\n" .
		    "    console.log(EO_WBC_FILTER_UI_ICON_TERM_SLUG);\n" .
		    "    EO_WBC_FILTER_UI_ICON_TERM_SLUG.push(\"".$term_slug."\");\n" .
		    "\n" .
		    "    if(\"".$term_slug."\") { \n" .
		    "    // commented code uper if false ma or backup file ma jova malse\n" .
		    "\n" .
		    "        // window.document.splugins.wbc.filters.api.input_type_icon_click();\n" .
		    "\n" .
		    "        jQuery(\".eo_wbc_srch_btn:eq(2)\").on('reset',function(){\n" .
		    "            var icon_filter_type = \"".$type."\";\n" .
		    "            var filter_list= undefined;\n" .
		    "            if(icon_filter_type == 1) {\n" .
		    "                /*filter_list = jQuery('[name=\"checklist_'+__data_filter_slug+'\"]');*/\n" .
		    "                filter_list = jQuery('form#".$this_filter_prefix."eo_wbc_filter [name=\"checklist_'+\"".$term_slug."\"+'\"]');\n" .
		    "            } else {\n" .
		    "                /*filter_list = jQuery('[name=\"cat_filter_'+__data_filter_slug+'\"]');*/\n" .
		    "                filter_list = jQuery('form#".$this_filter_prefix."eo_wbc_filter [name=\"cat_filter_'+\"".$term_slug."\"+'\"]');\n" .
		    "            }\n" .
		    "\n" .
		    "            if(jQuery(filter_list).attr('data-edit')=='1') {\n" .
		    "                jQuery(filter_list).val(\"\");\n" .
		    "\n" .
		    "                jQuery(\"form#".$this_filter_prefix."eo_wbc_filter .eo_wbc_filter_icon_select\").each(function(index,element){\n" .
		    "                    jQuery(element).removeClass(\"eo_wbc_filter_icon_select\");\n" .
		    "                });\n" .
		    "            }               \n" .
		    "        });\n" .
		    "    }               \n" .
		    "});\n";
		wbc()->load->add_inline_script('', $inline_script, 'sp-wbc-common-footer');

		do_action('eowbc_after_icon_filter_widget',$this,$__prefix,$item);

		if(!empty($sitepress)) {
			$sitepress->switch_lang($current_language);
			//remove_filter('get_term', array($sitepress,'get_term_adjust_id'), 1, 1);
		}

	}

	public function reorder_filter($filter) {
		if(!empty($filter)){
			$ordered_filter = array();
			foreach ($filter as $item) {
				$ordered_filter[$item['order']][] = $item;
			}

			ksort($ordered_filter);

			$filter = array();
			foreach ($ordered_filter as $ordered_item) {
				foreach ($ordered_item as $item) {
					$filter[] = $item;
				}
			}
		}
		return $filter;
	}	

	public function toggle_column($__prefix,$item){

		extract($item);
		$id=$name;
		$title=$label;
		$width=$column_width;		
		$reset = !empty($reset);		
		$help=(!empty(${$__prefix.'_fconfig_add_help'})?${$__prefix.'_fconfig_add_help_text'}:'');		

		$hidden = !empty($hidden);
		$is_single_select = (!empty(${$__prefix.'_fconfig_is_single_select'})?1:0);
		$term = false;
		if($type == 1){
			$term = wbc()->wc->eo_wbc_get_attribute($id);			
		} else{
			$term = wbc()->wc->get_term_by('id',$id,'product_cat');			
		}
		
		if($desktop){
			wbc()->load->template('publics/filters/toggle_column_desktop', array("width_class"=>$this->get_width_class($width),"term"=>$term,"title"=>$title,'filter_ui'=>$this));
		} else {
			wbc()->load->template('publics/filters/toggle_column_mobile', array("width_class"=>$this->get_width_class($width),"term"=>$term,"title"=>$title,'filter_ui'=>$this)); 
		}
		//var_dump($term);
		//die();
	}

	//convert category id to slug
	public function eo_wbc_id_2_slug($id) {
		$term = wbc()->wc->get_term_by('id',$id,'product_cat');

		if(empty($term) or is_wp_error($term)){
			return false;
		} else {
			return $term->slug;	
		}
    }
    
    public function eo_wbc_get_category() {        
        
        
        return wbc()->common->get_category('category',null,array($this->first_category_slug,$this->second_category_slug),true);

        global $wp_query;

        if(empty($wp_query) or empty($wp_query->get_queried_object()) or empty($wp_query->get_queried_object()->term_id)) return '';

        //get list of slug which are ancestors of current page item's category
        $term_slug=array_map(array('self',"eo_wbc_id_2_slug"),get_ancestors($wp_query->get_queried_object()->term_id, 'product_cat'));

        //append current page's slug so that create complete list of terms including current term even if it is parent.
        $term_slug[]=$wp_query->get_queried_object()->slug;                 

        // if(in_array(get_option('eo_wbc_first_slug'),$term_slug))
        // {
        //     return get_option('eo_wbc_first_slug');
        // }
        // elseif(in_array(get_option('eo_wbc_second_slug'),$term_slug))
        // {
        //     return get_option('eo_wbc_second_slug');
        // }
        
        if(in_array($this->first_category_slug/*get_option('eo_wbc_first_slug')*/,$term_slug))
        {
            return $this->first_category_slug/*get_option('eo_wbc_first_slug')*/;
        }
        elseif(in_array($this->second_category_slug/*get_option('eo_wbc_second_slug')*/,$term_slug))
        {
            return $this->second_category_slug/*get_option('eo_wbc_second_slug')*/;
        }
    }

    //get min and max price.
	// protected function get_filtered_price() {
	// 	global $wpdb;

	// 	$args = array();

	// 	if(property_exists(wc()->query,'query_vars')){
	// 		$args       = wc()->query->query_vars;
	// 	}

	// 	$args       = wc()->query->query_vars;
	// 	$tax_query  = isset( $args['tax_query'] ) ? $args['tax_query'] : array();
	// 	$meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();

	// 	if ( ! is_post_type_archive('product') && ! empty( $args['taxonomy'] ) && ! empty( $args['term'] ) ) {
	// 		$tax_query[] = array(
	// 			'taxonomy' => $args['taxonomy'],
	// 			'terms'    => array( $args['term'] ),
	// 			'field'    => 'slug',
	// 		);
	// 	}

	// 	foreach ( $meta_query + $tax_query as $key => $query ) {
	// 		if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
	// 			unset( $meta_query[ $key ] );
	// 		}
	// 	}

	// 	$meta_query = new \WP_Meta_Query( $meta_query );
	// 	$tax_query  = new \WP_Tax_Query( $tax_query );

	// 	$meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
	// 	$tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

	// 	$sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
	// 	$sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
	// 	$sql .= " 	WHERE {$wpdb->posts}.post_type IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_post_type', array( 'product' ) ) ) ) . "')
	// 		AND {$wpdb->posts}.post_status = 'publish'
	// 		AND price_meta.meta_key IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_meta_keys', array( '_price' ) ) ) ) . "')
	// 		AND price_meta.meta_value > '' ";
	// 	$sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

	// 	$search = @\WC_Query::get_main_search_query_sql();

	// 	if ( $search ) {
	// 		$sql .= ' AND ' . $search;
	// 	}

	// 	$sql = apply_filters( 'woocommerce_price_filter_sql', $sql, $meta_query_sql, $tax_query_sql );

	// 	$sql = apply_filters( 'eowbc_woocommerce_price_filter_sql', $sql, $meta_query_sql, $tax_query_sql );



	// 	return $wpdb->get_row( $sql ); // WPCS: unprepared SQL ok.
	// }
	protected function get_filtered_price($category_slug = null) {
	    if (!empty($category_slug)) {
	        global $wpdb;

	        $tax_query = array(
	            array(
	                'taxonomy' => 'product_cat',
	                'field' => 'slug',
	                'terms' => $category_slug,
	            )
	        );

	        $meta_query = array(
	            array(
	                'key' => '_price',
	                'value' => '',
	                'compare' => '>',
	            )
	        );

	        $meta_query = new \WP_Meta_Query($meta_query);
	        $tax_query = new \WP_Tax_Query($tax_query);

	        $meta_query_sql = $meta_query->get_sql('post', $wpdb->posts, 'ID');
	        $tax_query_sql = $tax_query->get_sql($wpdb->posts, 'ID');

	        $sql  = "SELECT MIN( FLOOR( price_meta.meta_value ) ) AS min_price, MAX( CEILING( price_meta.meta_value ) ) AS max_price FROM {$wpdb->posts} ";
	        $sql .= "LEFT JOIN {$wpdb->postmeta} AS price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
	        $sql .= " WHERE {$wpdb->posts}.post_type = 'product'
	            AND {$wpdb->posts}.post_status = 'publish'
	            AND price_meta.meta_key = '_price'
	            AND price_meta.meta_value > '' ";
	        $sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

	        $search = @\WC_Query::get_main_search_query_sql();

	        if ($search) {
	            $sql .= ' AND ' . $search;
	        }

	        $sql = apply_filters('woocommerce_price_filter_sql', $sql, $meta_query_sql, $tax_query_sql);
	        $sql = apply_filters('eowbc_woocommerce_price_filter_sql', $sql, $meta_query_sql, $tax_query_sql);

	        return $wpdb->get_row($sql); // WPCS: unprepared SQL ok.

	    } else {
	        
	        global $wpdb;

	        $args = array();

	        if(property_exists(wc()->query,'query_vars')){
	            $args       = wc()->query->query_vars;
	        }

	        $args       = wc()->query->query_vars;
	        $tax_query  = isset( $args['tax_query'] ) ? $args['tax_query'] : array();
	        $meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();

	        if ( ! is_post_type_archive('product') && ! empty( $args['taxonomy'] ) && ! empty( $args['term'] ) ) {
	            $tax_query[] = array(
	                'taxonomy' => $args['taxonomy'],
	                'terms'    => array( $args['term'] ),
	                'field'    => 'slug',
	            );
	        }

	        foreach ( $meta_query + $tax_query as $key => $query ) {
	            if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
	                unset( $meta_query[ $key ] );
	            }
	        }

	        $meta_query = new \WP_Meta_Query( $meta_query );
	        $tax_query  = new \WP_Tax_Query( $tax_query );

	        $meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
	        $tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

	        $sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
	        $sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
	        $sql .= "   WHERE {$wpdb->posts}.post_type IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_post_type', array( 'product' ) ) ) ) . "')
	            AND {$wpdb->posts}.post_status = 'publish'
	            AND price_meta.meta_key IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_meta_keys', array( '_price' ) ) ) ) . "')
	            AND price_meta.meta_value > '' ";
	        $sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

	        $search = @\WC_Query::get_main_search_query_sql();

	        if ( $search ) {
	            $sql .= ' AND ' . $search;
	        }

	        $sql = apply_filters( 'woocommerce_price_filter_sql', $sql, $meta_query_sql, $tax_query_sql );

	        $sql = apply_filters( 'eowbc_woocommerce_price_filter_sql', $sql, $meta_query_sql, $tax_query_sql );



	        return $wpdb->get_row( $sql ); // WPCS: unprepared SQL ok.
	    }
	    
	}

	public function localize_script(){

		global $wp_query;
		$site_url = '';
		$product_url = '';
		/*if( !$this->is_shortcode_filter && !$this->is_shop_cat_filter ) {*/

			$current_category = $this->_category;
			$current_category = get_term_by('slug',$current_category,'product_cat');

	        $site_url = esc_url(get_term_link( $current_category,'product_cat'));
	        
	      	if(strpos($site_url, '?')!==false){
	          	$site_url.='&';
	      	} else {
	          	$site_url.='?';
	      	}
	      	
	      	$product_url = $this->product_url();
		/*}*/

		// wbc_pr("localize_script localize");
		$data = array(
    					'eo_product_url'=>$product_url,
    					//'eo_view_tabular'=>($current_category=='solitaire'?1:0),
    					'disp_regular'=>wbc()->options->get('eo_wbc_e_tabview_status',false)/*get_option('eo_wbc_e_tabview_status',false)*/?1:0,
    					'eo_admin_ajax_url'=>admin_url( 'admin-ajax.php'),
    					'eo_part_site_url'=>get_site_url().'/index.php',
    					'eo_part_end_url'=>'/'.$product_url,
    					'eo_cat_site_url'=>$site_url,
    					'eo_cat_query'=>http_build_query($_GET),
    					'btnfilter_now'=>(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_btnfilter_now'))?false:true),
    					'btnreset_now'=>(empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_reset_now'))?false:true),
    					'_prefix_' => $this->filter_prefix,
    					// ACTIVE_TODO_OC_START
						// ACTIVE_TODO temp. below is temparary js layer flag for its php counter part of the function wbc_is_mobile_by_page_sections. So as soon as php template layer is not depandent on the function wbc_is_mobile_by_page_sections than at that time set false for below flag.
						// 	-- And as soon as the js layer depandancy on this flag is removed than delete this flag from here. 
						// ACTIVE_TODO_OC_END
						'wbc_is_mobile_by_page_sections' => /*1*/(wbc_is_mobile_by_page_sections('cat_shop_page') ? 0 : 1),
    				);
		$json_encode_data = json_encode($data);

		// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
		$inline_script =
		"// console.log('eo_wbc_object');\n" .
		"var eo_wbc_object = JSON.parse('".$json_encode_data."');\n" .
		"// console.log(eo_wbc_object);\n";

		wbc()->load->add_inline_script('', $inline_script, 'common');
		// 29-09-2022 @h  @s 
		// wbc()->load->asset('js','publics/eo_wbc_filter',array('jquery'));	
		$this->load_asset();
	
	}

	public function get_widget() {
		
		if( wbc()->sanitize->get('is_test') == 1 ){
		
			wbc_pr("get_widget_f_eo_wbc_object");
		}
		do_action('eowbc_before_filter_widget');

		$this->_category = apply_filters('eowbc_filter_widget_category',$this->eo_wbc_get_category());
		$current_category=$this->_category;

		$prefix = "";
		
		$filter= array();
		if($this->is_shop_cat_filter===true or $this->is_shortcode_filter){
			
			$filter=$filter_first=unserialize(wbc()->options->get_option_group('filters_'.$this->filter_prefix.'d_fconfig'));
			$prefix = "d";			
			$this->cat_number = 0;
			$this->cat_name_part = "first";
			
		} else {

			$filter_first=unserialize(wbc()->options->get_option_group(/*'filters_d_fconfig'*/'filters_'.$this->filter_prefix.'d_fconfig')/*get_option('eo_wbc_add_filter_first')*/);
			
			$filter_second=unserialize(wbc()->options->get_option_group(/*'filters_s_fconfig'*/'filters_'.$this->filter_prefix.'s_fconfig')/*get_option('eo_wbc_add_filter_second')*/);

			
			if($current_category==$this->first_category_slug/*get_option('eo_wbc_first_slug')*/){
				$filter=$filter_first;
				$prefix = "d";			
				$this->cat_number = 0;
				$this->cat_name_part = "first";
			}
			elseif($current_category==$this->second_category_slug/*get_option('eo_wbc_second_slug')*/){
				$filter=$filter_second;	
				$prefix = "s";
				$this->cat_number = 1;
				$this->cat_name_part = "second";
			}	
		}

		if( wbc()->sanitize->get('is_test') == 2 ) {
			wbc_pr("get_widget filter['slug']");
			wbc_pr($filter['slug']);
		}

		if(!empty($filter) and is_array($filter)) {
			foreach($filter as $filter_key=>$filter_value) {
				$filter[$filter_key][$prefix.'_fconfig_filter'] = str_replace('pa_','',$filter[$filter_key][$prefix.'_fconfig_filter']);
			}
		}

		$filter =  apply_filters( 'eowbc_filter_widget_filters',$filter,$prefix);
		$is_cleanup = apply_filters( 'eowbc_filter_widget_is_reset_cleanup',1);


		if( wbc()->sanitize->get('is_test') == 2 ) {
			wbc_pr("get_widget filter['slug'] 1");
			wbc_pr($filter);
		}	

		if($is_cleanup and !empty($filter) and is_array($filter)) {
			$new_filters = array();
			foreach ($filter as $filter_key => $filter_value) {				
				if(empty($filter_value[$prefix.'_fconfig_builder'])) {
					
					$new_filters[$filter_key] = $filter_value;			
				}		
			}			

			$filter = $new_filters;
		}

		if( wbc()->sanitize->get('is_test') == 2 ) {
			wbc_pr("get_widget filter['slug'] 2");
			wbc_pr($filter);
		}		
		//Hidden input filter lists.
		$this->__filters=array();
		$this->__prefix = $prefix;
		//Advance filters count
		$advance_count=0;		
		//Category Filters
		$this->___category=array();
		//Attribute Filters
		$_attr_list=array();

		$non_adv_ordered_filter=array();
		$adv_ordered_filter=array();

		if(!(is_array($filter) xor is_object($filter)) or empty($filter)) return false;

		if(apply_filters('eowbc_enque_filter_assets','__return_true')){		
			if( wbc()->sanitize->get('is_test') == 1 ){
				wbc_pr('eo_wbc_filter_enque_asset_f1_eo_wbc_object');
			}		
			$this->eo_wbc_filter_enque_asset();
		} else {
			$this->localize_script();
		}

		//map fields to names as per older version, applies to this code block only. 
		$field_to_old_fields = array(
			$prefix.'_fconfig_filter'=>'name',
            $prefix.'_fconfig_type'=>'type',
            $prefix.'_fconfig_label'=>'label',
            $prefix.'_fconfig_is_advanced'=>'advance',
            $prefix.'_fconfig_dependent'=>'dependent',
            $prefix.'_fconfig_input_type'=>'input',
            $prefix.'_fconfig_column_width'=>'column_width',
            $prefix.'_fconfig_ordering'=>'order',
            $prefix.'_fconfig_icon_size'=>'icon_size',
            $prefix.'_fconfig_icon_label_size'=>'font_size',
            $prefix.'_fconfig_add_reset_link'=>'reset',
		);
		$filter = array_filter($filter,function($filter_element) use($prefix){
			return !empty($filter_element[$prefix.'_fconfig_add_enabled']);
		});

		// wbc_pr("eowbc_filter_widget get_widget 2");
		
		$filter =  apply_filters( 'eowbc_filter_widget_filters_post_clean',$filter,$prefix);
		$this->__filters__=$filter;
		if( wbc()->sanitize->get('is_test') == 2 ) {
			wbc_pr("get_widget filter['slug'] 3");
			wbc_pr($filter);
		}	
		$filter =  apply_filters( 'eowbc_filter_widget_filters',$filter,$prefix);
		if( wbc()->sanitize->get('is_test') == 2 ) {
			wbc_pr("get_widget filter['slug'] 4");
			wbc_pr($filter);
		}	
		

		foreach ($filter as $key => $item) {
			/*if(empty($item[$prefix.'_fconfig_add_enabled'])){
				continue;
			}*/
			
			if(empty($item['filter_template'])) {
				if($prefix==='d'){
					$filter[$key]['filter_template'] = 'fc1';
				} else {
					$filter[$key]['filter_template'] = 'sc1';
				}
			}

			foreach ($item as $kitm => $vitm) {

				if( array_key_exists($kitm, $field_to_old_fields) && !empty($field_to_old_fields[$kitm]) ) {
					$filter[$key][$field_to_old_fields[$kitm]] = $vitm;
				}
			}
		}

		foreach ($filter as $key => $item) {

			if(empty($item['advance'])) {
				$item['order']= ( empty($item['order'])?(-1*count($non_adv_ordered_filter)):$item['order']);
				
				$item['column_width']= ( empty($item['column_width']) ? '50' : $item['column_width'] );

				$non_adv_ordered_filter[/*$item['order']*/]=$item;				
			}
			else{
				$item['order']= ( empty($item['order'])?(-1*count($adv_ordered_filter)):$item['order']);

				$item['column_width']= ( empty($item['column_width']) ? '50' : $item['column_width'] );

				$adv_ordered_filter[/*$item['order']*/]=$item;
			}
		}		

		$order = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','price_filter_order_'.$this->cat_name_part.'_cat',false);
		if( !wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','hide_price_filter_'.$this->cat_name_part.'_cat',false) && !wbc()->common->nonZeroEmpty($order) ) {
			$item = array('order'=>(int)wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','price_filter_order_'.$this->cat_name_part.'_cat',false), 'type'=>'price_filter');
			$non_adv_ordered_filter[/*$item['order']*/]=$item;
		}

		$non_adv_ordered_filter = $this->reorder_filter($non_adv_ordered_filter);

		$adv_ordered_filter = $this->reorder_filter($adv_ordered_filter);

		/*ksort($non_adv_ordered_filter);		
		ksort($adv_ordered_filter);*/

		//wbc()->common->pr($non_adv_ordered_filter);

		$non_adv_ordered_filter = apply_filters('custome_filter_widget_non_advance_filter',$non_adv_ordered_filter,$this->filter_prefix);

		// echo "non_adv_ordered_filter and adv_ordered_filter dump";
		// wbc()->common->pr($non_adv_ordered_filter);
		// wbc()->common->pr($adv_ordered_filter);

		?>
		<!--Primary filter button that will only be visible on desktop/tablet-->
		<!-- This widget is created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
		<div id="loading" style="z-index: -999; height: 100%; width: 100%; position: fixed; top: 0;<?php (wbc()->options->get_option('appearance_filters','appearance_filters_loader') OR apply_filters('eowbc_filter_widget_loader',false))?echo esc_attr('display:none !important;'):'';?>"></div>
		
		<?php
			// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
			$inline_script =
			"jQuery(document).ready(function(){\n" .
			"    jQuery(document).on('click', \".question.circle.icon\", function(){\n" .
			"        jQuery(\"#help_modal\").find(\".content\").html('');\n" .
			"        _help_text = jQuery(this).data('help');\n" .
			"        jQuery(\"#help_modal\").find(\".content\").html(_help_text);\n" .
			"        jQuery(\"#help_modal\").semanticModal('show');\n" .
			"    });\n" .
			"    jQuery(document).on('click', \"#help_modal .close.icon\", function(){\n" .
			"        jQuery(\"#help_modal\").semanticModal('hide');\n" .
			"    });\n" .
			"});";

			// Add the script to WordPress using wbc()->load->add_inline_script()
			wbc()->load->add_inline_script('', $inline_script, 'sp-wbc-common-footer');

		// filter_sets_data
		// ACTIVE_TODO/TODO here our asssumption is that the $current_category is pointing to root category but if it is not true than we mange here.
		$is_first_category = false;
		$is_second_category = false;
		if(\eo\wbc\model\SP_WBC_Router::instance()->is_first_category(null, $current_category)){

			$is_first_category = true;

		} elseif(\eo\wbc\model\SP_WBC_Router::instance()->is_second_category(null, $current_category)){

			$is_second_category = true;
		}

		// wbc_pr($current_category); 
		// wbc_pr(wbc()->options->get_option('configuration','first_slug')); 
		// wbc_pr($is_second_category );
		// die();

		$filter_sets_data = array();

		$filter_sets = unserialize(wbc()->options->get_option_group('filters_'.$this->filter_prefix.'filter_set',"a:0:{}"));
		// --- dump ---
		// var_dump('loop_001');
		// var_dump($filter_sets);

		foreach ($filter_sets as $filter_sets_key => $filter_sets_val) {

			$filter_sets_first_tab = $filter_sets_key/*wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_first_tabs',false)*/;

			// $filter_sets_second_tab = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_second_tabs',false);

			$is_continue = true;
			if ($is_first_category) {

				if(!empty($filter_sets[$filter_sets_first_tab]['filter_set_two_tabs_first'])){

					$is_continue = false;
				}

			} elseif($is_second_category){

				if(!empty($filter_sets[$filter_sets_first_tab]['filter_set_two_tabs_second'])){

					$is_continue = false;
				}

			} else{

				$is_continue = true;
			}

			if ($is_continue) {
				
				continue;
			}

			$filter_sets_first = ( (empty($filter_sets[$filter_sets_first_tab]) or empty($filter_sets[$filter_sets_first_tab]['filter_set_name'])) ? $filter_sets_first_tab : $filter_sets[$filter_sets_first_tab]['filter_set_name'] );


			$first_sets_category = wbc()->wc->get_term_by('term_taxonomy_id',/*wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_first_category',false)*/$filter_sets[$filter_sets_first_tab]['filter_set_category'],'product_cat');
			if(!empty($first_sets_category) and !is_wp_error($first_sets_category)){
				$first_sets_category = $first_sets_category->slug;
			}

			// $filter_sets_second = ( (empty($filter_sets[$filter_sets_second_tab]) or empty($filter_sets[$filter_sets_second_tab]['filter_set_name'])) ? $filter_sets_second_tab : $filter_sets[$filter_sets_second_tab]['filter_set_name'] );

			// $second_sets_category = wbc()->wc->get_term_by('term_taxonomy_id',wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_second_category',false),'product_cat');
			// if(!empty($second_sets_category) and !is_wp_error($second_sets_category)){
			// 	$second_sets_category = $second_sets_category->slug;
			// }

			/*var_dump($current_category);
			var_dump($first_sets_category);
			die();*/

			$tab_data = array(
					'first_tab_label'=>$filter_sets_first,
					'first_tab_id'=>$filter_sets_first_tab,
					'first_tab_category'=>$first_sets_category,
				);
	
			if(
				!empty($filter_sets_first) 
				and 
				!empty($filter_sets_first_tab)
				and 
				!empty($first_sets_category)
			){

				array_push($filter_sets_data,$tab_data);

			}	
		
		}
		// --- dump ---
		// var_dump('filter_sets_data');
		// var_dump($filter_sets_data);
		if(
				// !empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_two_tabs',false)) 
				// and 
				// !empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_first_tabs',false))
				// and
				// !empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_second_tabs',false))
				// and 
				// !empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_first_category',false))
				// and 
				// !empty(wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_second_category',false))

				// sizeof($filter_sets_data) >= 2
				sizeof($filter_sets_data) >= 1
			) {
			
			// --- aa code if condition ni bar muki ne loop chalavu se ---
			// 	--- start ---
			// $filter_sets = unserialize(wbc()->options->get_option_group('filters_filter_set',"a:0:{}"));

			// $filter_sets_first_tab = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_first_tabs',false);

			// $filter_sets_second_tab = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_second_tabs',false);

			// $filter_sets_first = ( (empty($filter_sets[$filter_sets_first_tab]) or empty($filter_sets[$filter_sets_first_tab]['filter_set_name'])) ? $filter_sets_first_tab : $filter_sets[$filter_sets_first_tab]['filter_set_name'] );


			// $first_sets_category = wbc()->wc->get_term_by('term_taxonomy_id',wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_first_category',false),'product_cat');
			// if(!empty($first_sets_category) and !is_wp_error($first_sets_category)){
			// 	$first_sets_category = $first_sets_category->slug;
			// }

			// $filter_sets_second = ( (empty($filter_sets[$filter_sets_second_tab]) or empty($filter_sets[$filter_sets_second_tab]['filter_set_name'])) ? $filter_sets_second_tab : $filter_sets[$filter_sets_second_tab]['filter_set_name'] );

			// $second_sets_category = wbc()->wc->get_term_by('term_taxonomy_id',wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_advance_second_category',false),'product_cat');
			// if(!empty($second_sets_category) and !is_wp_error($second_sets_category)){
			// 	$second_sets_category = $second_sets_category->slug;
			// }
				
			// /*var_dump($current_category);
			// var_dump($first_sets_category);
			// die();*/
			// 	--- end ---

			// NOTE: here now this condition is no more necessary so added true or condition below. but in fuser if any issue comes up then we may need to double confirm our decision here. 
			if(true or $current_category === $first_sets_category ){
				$non_adv_ordered_filter = array_merge(
						[array(
							$prefix.'_fconfig_input_type'=>'two_tabs',
							'type'=>'two_tabs',
							'input'=>'two_tabs',
							'name'=>'two_tabs',
							'advance'=>false,
							// 'first_tab_label'=>$filter_sets_first,
							// 'first_tab_id'=>$filter_sets_first_tab,
							// 'first_tab_category'=>$first_sets_category,
							// 'second_tab_label'=>$filter_sets_second,
							// 'second_tab_id'=>$filter_sets_second_tab,
							// 'second_tab_category'=>$second_sets_category,
							'filter_sets_data'=>$filter_sets_data,
						)],array_values($non_adv_ordered_filter));			
			}
		}


		// filter_sets_confings
		$filter_sets_confings = array();
		$filter_sets_confings['filter_setting_alternate_mobile'] = wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile');
		$filter_sets_confings['filter_prefix'] = $this->filter_prefix;
		$filter_sets_confings['filter_sets_data'] = $filter_sets_data;	
		// wbc_pr('filter_sets_confings');

		wbc()->load->asset('localize_data','publics/sp_filter_sets',array("filter_sets_confings" => $filter_sets_confings));

		/*echo "non_adv_ordered_filter and adv_ordered_filter dump 1";
		wbc()->common->pr($non_adv_ordered_filter);
		wbc()->common->pr($adv_ordered_filter);
		die();*/
		
		$this->load_filters($non_adv_ordered_filter,$adv_ordered_filter);
				
		if( $this->is_shortcode_filter ) {
			//wbc()->load->template('publics/filters/shortcode_flt_search_btn', array("is_shortcode_filter"=>$this->is_shortcode_filter,'filter_ui'=>$this)); 	
		}

		// filter_sub_confings
		$filters_sub_confings = array();		
		
		// $filters_sub_confings['filter_setting_btnfilter_now'] = wbc()->options->get_option('filters_'.$filter_prefix.'filter_setting','filter_setting_btnfilter_now');
		$filters_sub_confings['filter_setting_btnfilter_now'] = wbc()->options->get_option('filters_'.$this->filter_prefix.'filter_setting','filter_setting_btnfilter_now');

		//$filters_sub_confings['filter_setting_slider_max_lblsize'] = _e((int)wbc()->options->get_option('filters_'.$filter_prefix.'filter_setting','filter_setting_slider_max_lblsize',6));	
		$filters_sub_confings['filter_setting_slider_max_lblsize'] = (int)wbc()->options->get_option('filters_'.$filter_prefix.'filter_setting','filter_setting_slider_max_lblsize',6);
		$filters_sub_confings['filter_prefix'] = $this->filter_prefix;	
		$filters_sub_confings['filter_slug'] = $filter['slug'];

		if( wbc()->sanitize->get('is_test') == 2 ) {

			wbc_pr("filter['slug']---------");
			wbc_pr($filter['slug']);
		}
		
		$filters_sub_confings['filter_type'] = $filter_type;
		// $filters_sub_confings['term_slug'] = $term->slug;

		wbc()->load->asset('localize_data','filters_sub_confings',array("filters_sub_confings" => $filters_sub_confings));

		wbc()->load->template('publics/filters/form', array("thisObj"=>$this,"current_category"=>$current_category,'filter_prefix'=>$this->filter_prefix,'filter_ui'=>$this)); 
		do_action('eowbc_after_filter_widget');

	}

	public function load_filters($non_adv_ordered_filter,$adv_ordered_filter){
		wbc()->load->template('publics/filters/load_filters',array('non_adv_ordered_filter'=>$non_adv_ordered_filter,'adv_ordered_filter'=>$adv_ordered_filter,'filter_ui'=>$this));		
	}

	public function init($is_shop_cat_filter=false,$filter_prefix='',$is_shortcode_filter=false) {
		
		if( wbc()->sanitize->get('is_test') == 1 ){
		
			wbc_pr("init_f_eo_wbc_object");
		}

		$this->first_category_slug = wbc()->options->get_option('configuration','first_slug');
        $first_category_object = get_term_by('slug',$this->first_category_slug,'product_cat');
        if(!empty($first_category_object) and !is_wp_error($first_category_object)) {
            $this->first_category_slug = $first_category_object->slug;
        }

        $this->second_category_slug = wbc()->options->get_option('configuration','second_slug');
        $second_category_object = get_term_by('slug',$this->second_category_slug,'product_cat');
        if(!empty($second_category_object) and !is_wp_error($second_category_object)) {
            $this->second_category_slug = $second_category_object->slug;
        }

		$this->is_shop_cat_filter = $is_shop_cat_filter;
		$this->is_shortcode_filter = $is_shortcode_filter;
		$this->filter_prefix = $filter_prefix;
		$this->_category= !$this->is_shortcode_filter && !$this->is_shop_cat_filter ? apply_filters('eowbc_filter_widget_category',$this->eo_wbc_get_category()) : '';
		
		if(!empty($this->_category) or $this->is_shop_cat_filter or $this->is_shortcode_filter){
		
			if(get_option('eo_wbc_dropdown_filter',false) and !wp_is_mobile()) {

				require_once 'includes/dropdown_filter.php';				

			} else {	
				$this->get_widget();				
			}
			

		} else {

			//EO_WBC_Log_Message("Could not find current category in EO_WBC_Frontend\EO_WBC_Filter_Widget.php");
			\EOWBC_Error_Handler::log('Could not find current category in eo\wbc\model\publics\component\EO_WBC_Filter_Widget');
		}
	}

	public function get_filter_sets($filter_prefix=''){

		return /*$filter_sets =*/ unserialize(wbc()->options->get_option_group('filters_'.$filter_prefix.'filter_set',"a:0:{}"));
	}	
}	
?>
