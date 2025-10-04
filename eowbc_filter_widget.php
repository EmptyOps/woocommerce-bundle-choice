<?php
namespace eo\wbc\model\publics\component;

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
		<!-- This widget is created with Wordpress plugin - WooCommerce Product bundle choice -->
		<div id="loading" style="z-index: -999;height: 100%; width: 100%; position: fixed; top: 0;<?php (wbc()->options->get_option('appearance_filters','appearance_filters_loader') OR apply_filters('eowbc_filter_widget_loader',false))?_e('display:none !important;'):'';?>"></div>	
		    							
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
			?>
			<script type="text/javascript">
				/*jQuery.fn.ui_accordion = jQuery.fn.accordion;
				jQuery.fn.ui_slider = jQuery.fn.slider;
				jQuery.fn.ui_checkbox = jQuery.fn.checkbox;*/
			</script>
			<?php
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
			echo "<?php
					if(WBC_SCRIPT_DEBUG == true){
					?>    
					    <style>
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
					        .toggle_sticky_mob_filter  .title {
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
					        
					        /*.products{
					            visibility: hidden;
					        }*/

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
					            min-height: fit-content !important
					            max-height: fit-content !important
					        }
					        
					        /*Modifications............................*/
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
					                        
					        /*Modifications............................*/
					    </style>

					<?php
					}else{
					?>
					    
					    <style>
					        .image_text-variable-item,table.variations td{border:none!important}.image_text-variable-item:not(.selected) div{visibility:hidden}.image_text-variable-item:hover div{visibility:visible}.image_text-variable-item.selected,.image_text-variable-item:hover{box-shadow:none!important}.woocommerce .summary.entry-summary table.variations tr{width:auto!important}.rotate-up{-webkit-animation:.3s linear spin-up;-moz-animation:.3s linear spin-up;animation:.3s linear forwards spin-up}@-moz-keyframes spin-up{100%{-moz-transform:rotate(-180deg)}}@-webkit-keyframes spin-up{100%{-webkit-transform:rotate(-180deg)}}@keyframes spin-up{100%{-webkit-transform:rotate(-180deg);transform:rotate(-180deg)}}.rotate-down{-webkit-animation:.3s linear spin-down;-moz-animation:.3s linear spin-down;animation:.3s linear forwards spin-down}@-moz-keyframes spin-down{0%{-moz-transform:rotate(180deg)}100%{-moz-transform:rotate(360deg)}}@-webkit-keyframes spin-down{0%{-webkit-transform:rotate(180deg)}100%{-webkit-transform:rotate(360deg)}}@keyframes spin-down{0%{-webkit-transform:rotate(180deg);transform:rotate(180deg)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}#wbc_variation_toggle{padding:.7em;margin-bottom:.7em;border:1px solid #5e5c5b;display:inline-block;color:#2d2d2d;font-size:1rem;cursor:pointer;border-radius:1px!important}table.variations{padding:5px;border:1px solid #5e5c5b}.ui.images{width:100%!important;margin:auto!important;float:none!important}table.variations td.label{display:none!important}table.variations .value{padding-left:1rem!important}.variable-items-wrapper{list-style:none;display:table-cell!important}.ui.red.ribbon.label{margin-bottom:5px!important}.variable-items-wrapper .variable-item div{margin:auto;display:block}
					    </style>  
					<?php
					}
					?>";	

				ob_start();
				if ((in_array(wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts') ,array('sc3','sc5')) and $this->_category==$this->second_category_slug) or (in_array(wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts'),array('fc3','fc5')) and $this->_category==$this->first_category_slug)) {
					?>
					<style type="text/css">
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
					</style>
					<?php
				}
				?>
				<?php
				if(WBC_SCRIPT_DEBUG == true){
				?>    
				    <script type="text/javascript">

				        // //console.log('filter_widgets');

				        jQuery(document).ready(function($){         

				            jQuery.fn.wbc_flip_toggle_image=function(element){
				                //console.log('eo_wbc_filter_icon_select --');
				                let img = jQuery(element).find('img');                      
				                if(jQuery(element).hasClass('eo_wbc_filter_icon_select')) {
				                    let toggle_src = jQuery(img).attr('data-toggleimgsrc');
				                    if((typeof(toggle_src)!==typeof(undefined)) && toggle_src.trim()!==''){
				                        //console.log(toggle_src);
				                        jQuery(element).addClass('toggled_image');
				                        jQuery(img).attr('src',toggle_src);
				                    }           
				                } else {
				                    let img_src = jQuery(img).attr('data-imgsrc');
				                    if((typeof(img_src)!==typeof(undefined)) && img_src.trim()!==''){
				                        //console.log(img_src);
				                        jQuery(element).removeClass('toggled_image');
				                        jQuery(img).attr('src',img_src); 
				                    }
				                }
				            }
				            
				            // ACTIVE_TODO/NOTE below function of toggle image function is moved inside the layers of eo wbc filter js file to fix the issue that it was not working from here since the selected class was not added when it is called from here. so during the upgrade take note of this refactoring. 
				            // $('.eo_wbc_filter_icon').click(function(){                   
				            //  jQuery.fn.wbc_flip_toggle_image(this);
				            // });
				        })
				    </script>

				<?php
				}else{
				?>
				    <script type="text/javascript">

				        jQuery(document).ready((function(e){jQuery.fn.wbc_flip_toggle_image=function(e){let t=jQuery(e).find("img");if(jQuery(e).hasClass("eo_wbc_filter_icon_select")){let r=jQuery(t).attr("data-toggleimgsrc");void 0!==r&&""!==r.trim()&&(jQuery(e).addClass("toggled_image"),jQuery(t).attr("src",r))}else{let r=jQuery(t).attr("data-imgsrc");void 0!==r&&""!==r.trim()&&(jQuery(e).removeClass("toggled_image"),jQuery(t).attr("src",r))}}}));
				    </script>

				    
				<?php
				}
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
				?>
					<?php
					if(WBC_SCRIPT_DEBUG == true){
					?>    
					    <style type="text/css">
					        /*.ui.labeled.ticked.range.slider .label:first-child span{
					            position: absolute;
					            transform: translate(-50%, -100%);
					            white-space: break-spaces;
					        }*/
					        .eo-wbc-container .toggle_sticky_mob_filter{
					            margin: 0px;                    
					            text-align: center;
					            padding: 1px !important;
					            cursor: pointer;
					            max-height: 6em;
					        }
					        .eo-wbc-container .toggle_sticky_mob_filter .segment{
					            border: 1px solid grey !important;
					            padding-left: 1px !important;
					            padding-right: 1px !important;
					        }
					        .advance_filter_mob{
					            display:none;
					        }
					        #advance_filter_mob_alternate_container{
					            width: 96% !important;
					            border-top: 0px solid grey !important;
					        }
					        /*.eo-wbc-container .ui.steps .ui.equal.width.grid{
					            padding-top:1rem;
					            padding-bottom:1rem;
					        }*/

					        @media only screen and (max-width: 767.98px){
					            .ui.container:not(.fluid){
					                margin: auto !important;                    
					            }
					            .ui.grid.container {
					                width:100% !important;
					            }
					        }   

					        .bottom_filter_segment{
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
					        .bottom_filter_segment .ui.tiny.form .field{
					            width:-moz-fit-content !important;
					            width: max-content !important;
					        }   
					        
					    </style>

					<?php
					}else{
					?>
					    <style type="text/css">
					        .eo-wbc-container .toggle_sticky_mob_filter{margin:0;text-align:center;padding:1px!important;cursor:pointer;max-height:6em}.eo-wbc-container .toggle_sticky_mob_filter .segment{border:1px solid grey!important;padding-left:1px!important;padding-right:1px!important}.advance_filter_mob{display:none}#advance_filter_mob_alternate_container{width:96%!important;border-top:0 solid grey!important}@media only screen and (max-width:767.98px){.ui.container:not(.fluid){margin:auto!important}.ui.grid.container{width:100%!important}}.bottom_filter_segment{position:fixed!important;z-index:99999;bottom:-1em;width:100vw;width:-webkit-fill-available;width:-moz-available;left:0;margin-bottom:1em!important;-webkit-backface-visibility:hidden;display:none}.bottom_filter_segment .ui.tiny.form .field{width:-moz-fit-content!important;width:max-content!important}
					    </style>  
					    
					<?php
					}
					?>
					<?php
					if(WBC_SCRIPT_DEBUG == true){
					?>    
					    <script>
					        jQuery(document).ready(function(){
					            jQuery(".toggle_sticky_mob_filter").on('click tap',function(){
					                jQuery('.bottom_filter_segment.active').transition('fade up');
					                jQuery('.bottom_filter_segment.active').toggleClass('active');
					                jQuery(jQuery(this).data('target')).transition('fade up');
					                jQuery(jQuery(this).data('target')).toggleClass('active');
					            });

					            jQuery(".close_sticky_mob_filter").on('click tap',function(){
					                //jQuery(jQuery(this).data('target')).transition('fade up');
					                jQuery('.bottom_filter_segment.active').transition('fade up');
					                jQuery('.bottom_filter_segment.active').toggleClass('active');
					            });
					            jQuery('#advance_filter_mob_alternate').on('click tap',function(){
					                let is_twoTab = jQuery('.filter_setting_advance_two_tabs .item.active');
					                
					                if(typeof(is_twoTab)!=typeof(undefined) && is_twoTab.length>0){
					                    is_twoTab = true;
					                } else {
					                    is_twoTab = false;
					                }

					                let advance_filter_selector = ".toggle_sticky_mob_filter.advance_filter_mob";
					                if(is_twoTab){
					                    advance_filter_selector = advance_filter_selector+'[data-tab-group="'+jQuery('.filter_setting_advance_two_tabs .item.active').data('tab-name')+'"],'+advance_filter_selector+'[data-tab-group=""]'
					                }

					                if(jQuery('#advance_filter_mob_alternate').hasClass('status_hidden')){
					                    jQuery(".toggle_sticky_mob_filter.advance_filter_mob").hide();

					                    jQuery('#advance_filter_mob_alternate').removeClass('status_hidden');

					                } else{
					                    jQuery(advance_filter_selector).show();
					                    jQuery('#advance_filter_mob_alternate').addClass('status_hidden');
					                }
					                //jQuery(".toggle_sticky_mob_filter.advance_filter_mob").toggle();
					                jQuery('#advance_filter_mob_alternate .ui.icon').toggleClass('up down');
					            });
					        });
					    </script>

					<?php
					}else{
					?>
					    <script>
					        jQuery(document).ready((function(){jQuery(".toggle_sticky_mob_filter").on("click tap",(function(){jQuery(".bottom_filter_segment.active").transition("fade up"),jQuery(".bottom_filter_segment.active").toggleClass("active"),jQuery(jQuery(this).data("target")).transition("fade up"),jQuery(jQuery(this).data("target")).toggleClass("active")})),jQuery(".close_sticky_mob_filter").on("click tap",(function(){jQuery(".bottom_filter_segment.active").transition("fade up"),jQuery(".bottom_filter_segment.active").toggleClass("active")})),jQuery("#advance_filter_mob_alternate").on("click tap",(function(){let t=jQuery(".filter_setting_advance_two_tabs .item.active");t=void 0!==t&&t.length>0;let e=".toggle_sticky_mob_filter.advance_filter_mob";t&&(e=e+'[data-tab-group="'+jQuery(".filter_setting_advance_two_tabs .item.active").data("tab-name")+'"],'+e+'[data-tab-group=""]'),jQuery("#advance_filter_mob_alternate").hasClass("status_hidden")?(jQuery(".toggle_sticky_mob_filter.advance_filter_mob").hide(),jQuery("#advance_filter_mob_alternate").removeClass("status_hidden")):(jQuery(e).show(),jQuery("#advance_filter_mob_alternate").addClass("status_hidden")),jQuery("#advance_filter_mob_alternate .ui.icon").toggleClass("up down")}))}));
					    </script>
					    
					<?php
					}
					?>
				<?php
				echo ob_get_clean();
			}

			if(wbc()->options->get_option('filters_altr_filt_widgts','filter_setting_alternate_mobile',false)=='mobile_2' and /*wp_is_mobile()*/ wbc_is_mobile_by_page_sections('cat_shop_page')){
				ob_start();
				?>
					<?php
					if(WBC_SCRIPT_DEBUG == true){
					?>    
					    <style type="text/css">

					        @media screen and (max-width: 412px) {
					            span[title="Very Strong"][alt="Very Strong"]/*
					            .ui.labeled.slider>.labels .label*/{                        
					                max-width: fit-content;
					                top: -1.5em;
					                left: -1em;
					                position: inherit;
					                line-height: 1;
					                white-space: break-spaces;
					            }
					            .ui.tabular.menu .item{
					                font-size: 0.7em !important;
					            }
					        }
					        #products_table th {
					            font-size: 0.8em !important;
					        }

					        .mobile_2_hidden{
					            visibility: hidden !important;
					        }
					        i.icon.question.circle:before{
					            font-size: 1em !important;
					        }
					        .ui.segments.transition .ui.accordion .title,.eo-wbc-container.filters .ui.header{
					            text-transform: uppercase;
					        }
					        .ui.segments.transition{
					            width: 101vw;
					            margin: 1em -0.5em 0 !important;
					            left: 0;
					            right: 0;
					        }
					        .ui.button.advance_filter.transition{
					            margin-left: 0;
					            margin-right: 0;
					        }
					        .ui.eo_wbc_page{
					            margin-top: 2em !important;
					        }
					        /* Hide scrollbar for Chrome, Safari and Opera */
					        .scrollable_image_filters::-webkit-scrollbar {
					            display: none;
					        }
					        /* Hide scrollbar for IE, Edge and Firefox */
					        .scrollable_image_filters{
					            -ms-overflow-style: none;  /* IE and Edge */
					            scrollbar-width: none;  /* Firefox */
					        }
					        i.icon.plus:before{
					            content: "+" !important;
					        }
					        i.icon.minus:before{
					            content: "-" !important;
					        }
					        .ui.accordion i.icon:before{
					            font-size: 1.5em;
					        }
					        .eo-wbc-container.filters .ui.styled.accordion .title, .eo-wbc-container.filters .ui.header,#primary_filter,#advance_filter{    
					            font-weight: lighter;
					        }
					        .eo-wbc-container.filters.container{
					            position: relative;
					            left: -7vw;
					            min-width: 102.1vw !important;
					        }   
					        .eo-wbc-container.filters.container:after{
					            content: '';
					            clear: both;
					            display: block !important;
					            position: relative !important;
					        }
					    </style>

					<?php
					}else{
					?>
					    <style type="text/css">

					        @media screen and (max-width:412px){span[title="Very Strong"][alt="Very Strong"]{max-width:fit-content;top:-1.5em;left:-1em;position:inherit;line-height:1;white-space:break-spaces}.ui.tabular.menu .item{font-size:.7em!important}}#products_table th{font-size:.8em!important}.mobile_2_hidden{visibility:hidden!important}i.icon.question.circle:before{font-size:1em!important}.eo-wbc-container.filters .ui.header,.ui.segments.transition .ui.accordion .title{text-transform:uppercase}.ui.segments.transition{width:101vw;margin:1em -.5em 0!important;left:0;right:0}.ui.button.advance_filter.transition{margin-left:0;margin-right:0}.ui.eo_wbc_page{margin-top:2em!important}.scrollable_image_filters::-webkit-scrollbar{display:none}.scrollable_image_filters{-ms-overflow-style:none;scrollbar-width:none}i.icon.plus:before{content:"+"!important}i.icon.minus:before{content:"-"!important}.ui.accordion i.icon:before{font-size:1.5em}#advance_filter,#primary_filter,.eo-wbc-container.filters .ui.header,.eo-wbc-container.filters .ui.styled.accordion .title{font-weight:lighter}.eo-wbc-container.filters.container{position:relative;left:-7vw;min-width:102.1vw!important}.eo-wbc-container.filters.container:after{content:"";clear:both;display:block!important;position:relative!important}
					    </style>
					    
					<?php
					}
					?>
					<?php
					if(WBC_SCRIPT_DEBUG == true){
					?>    
					    <script type="text/javascript">
					        jQuery(document).ready(function($){
					            $('.eo-wbc-container.filters.container .ui.accordion .title').click(function(){
					                let _icon = $(this).find('i.icon:not(.question)');
					                if($(_icon).hasClass('plus')){
					                    $('.eo-wbc-container.filters.container .ui.accordion .title').find('i.icon.minus').toggleClass('plus minus');
					                    $(_icon).toggleClass('plus minus');
					                } else {
					                    $(_icon).toggleClass('plus minus');
					                }
					            });
					        });
					    </script>

					<?php
					}else{
					?>
					    <script type="text/javascript">
					        jQuery(document).ready((function(i){i(".eo-wbc-container.filters.container .ui.accordion .title").click((function(){let n=i(this).find("i.icon:not(.question)");i(n).hasClass("plus")?(i(".eo-wbc-container.filters.container .ui.accordion .title").find("i.icon.minus").toggleClass("plus minus"),i(n).toggleClass("plus minus")):i(n).toggleClass("plus minus")}))}));
					    </script>
					    
					<?php
					}
					?>
				<?php
				echo ob_get_clean();
			}

			$sc_cat = wbc()->options->get_option('filters_sc_filter_setting','shop_cat_filter_category');
			if(!empty($sc_cat)){

				— SP_WBC_PSFAR possible to skip for ajax ring builder
				if( !defined('SP_WBC_ARBU') || constant('SP_WBC_ARBU') !== true ) {
					
					$sc_cat = wbc()->wc->get_term_by('term_id',$sc_cat,'product_cat');	
				} else {

					global $SP_WBC_ARB_first_cat_obj;
					global $SP_WBC_ARB_second_cat_obj;
					global $wp_query;

					$matched_sc_cat_obj = null;

					if (!empty($SP_WBC_ARB_first_cat_obj) && is_object($SP_WBC_ARB_first_cat_obj)) {
					    if ($sc_cat == $SP_WBC_ARB_first_cat_obj->term_id) {
					        $matched_sc_cat_obj = $SP_WBC_ARB_first_cat_obj;
					    }
					}

					if (empty($matched_sc_cat_obj) && !empty($SP_WBC_ARB_second_cat_obj) && is_object($SP_WBC_ARB_second_cat_obj)) {
					    if ($sc_cat == $SP_WBC_ARB_second_cat_obj->term_id) {
					        $matched_sc_cat_obj = $SP_WBC_ARB_second_cat_obj;
					    }
					}

					if (
					    empty($matched_sc_cat_obj) &&
					    isset($wp_query->queried_object) &&
					    is_object($wp_query->queried_object)
					) {
					    if ($sc_cat == $wp_query->queried_object->term_id) {
					        $matched_sc_cat_obj = $wp_query->queried_object;
					    }
					}

					if (!empty($matched_sc_cat_obj)) {
					    $sc_cat = $matched_sc_cat_obj;
					} else {

						— SP_WBC_PSFAR possible to skip for ajax ring builder
						if( !defined('SP_WBC_ARBU') || constant('SP_WBC_ARBU') !== true ) {

					    	$sc_cat = wbc()->wc->get_term_by('term_id', $sc_cat, 'product_cat');
			    		} else {
			    			
					    	global $SP_WBC_ARB_first_cat_obj, $SP_WBC_ARB_second_cat_obj, $wp_query;

					    	if (!empty($sc_cat)) {
					    	    $matched_obj = null;

					    	    if (isset($SP_WBC_ARB_first_cat_obj) && $SP_WBC_ARB_first_cat_obj->term_id === $sc_cat) {
					    	        $matched_obj = $SP_WBC_ARB_first_cat_obj;
					    	    } elseif (isset($SP_WBC_ARB_second_cat_obj) && $SP_WBC_ARB_second_cat_obj->term_id === $sc_cat) {
					    	        $matched_obj = $SP_WBC_ARB_second_cat_obj;
					    	    } elseif (isset($wp_query->queried_object) && isset($wp_query->queried_object->term_id) && $wp_query->queried_object->term_id === $sc_cat) {
					    	        $matched_obj = $wp_query->queried_object;
					    	    } else {
					    	        $matched_obj = wbc()->wc->get_term_by('term_id', $sc_cat, 'product_cat');
					    	    }

					    	    if (!empty($matched_obj) && !is_wp_error($matched_obj)) {
					    	        $sc_cat = $matched_obj->slug;
					    	    }
					    	}
			    		}

					}

				}

				if(!is_wp_error($sc_cat) and !empty($sc_cat)){
					$sc_cat = $sc_cat->slug;	
				}
			}
			
			if((wbc()->options->get_option('filters_altr_filt_widgts','second_category_altr_filt_widgts')=='sc4' and $this->_category==$this->second_category_slug) or (wbc()->options->get_option('filters_altr_filt_widgts','first_category_altr_filt_widgts')=='fc4' and $this->_category==$this->first_category_slug) or ( wbc()->options->get_option('filters_sc_altr_filt_widgts','first_category_altr_filt_widgts')=='sc4' 
					and $this->_category==$sc_cat) )

					 {

				ob_start();
				?>
					<?php
					if(WBC_SCRIPT_DEBUG == true){
					?>    
					    <style type="text/css">

					        #help_modal .close:before{
					            content: 'Close  X  ';
					            white-space: pre;
					            font-family:'Avenir Next' !important;
					        }

					        .eo-wbc-container>.ui.steps .step:not(:first-child):before{
					                border-left: 1em solid #d2d2d2 !important;
					        }
					        .eo-wbc-container.filters.container.ui.form,.eo-wbc-container.filters.container.ui.form .ui.header{font-family: <?php echo wbc()->options->get_option('appearance_filters','header_font','ZapfHumanist601BT-Roman'); ?> !important; }.eo-wbc-container.filters.container.ui.form .ui.header{font-size:1em;}.ui.labeled.ticked.range.slider .labels{height:0px; top:unset;bottom:-10%;font-size:12px}.ui.labeled.ticked.range.slider .labels .label::after{top:unset;bottom:100%;}
					        .ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon:hover:not(.none_editable){ border-bottom: 0px !important; } .eo-wbc-container.filters.container.ui.form .ui.segments{ border:none !important;}

					        .ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon_select,.ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon:hover:not(.none_editable){ border-bottom: 0px !important; }
					        .eo-wbc-container.filters.container.ui.form .field:last-child{
					            margin-bottom: -1.4em;
					        }

					        .eo-wbc-container.filters.container.ui.form .field:last-child(:nth-of-type(even)){
					            position: absolute;
					            right: 0;
					        }

					        .eo_wbc_filter_icon_select div,.ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon:hover:not(.none_editable) div{ visibility: unset !important; 
					        }
					        .eo-wbc-container.filters.container.ui.form .ui.header{
					            font-size: 0.8em;
					            text-transform: uppercase;                          
					        }
					        .eo-wbc-container .wide.column:not(.toggle_sticky_mob_filter){
					            display: inline-flex !important;
					        }
					        .ui.labeled.ticked.range.slider{
					            padding-top: 0px !important;    
					        }                       
					        .eo-wbc-container .wide.column>.wide.field.text_slider{
					            margin-top: 0.7em;
					            margin-bottom: auto;
					        }
					        .eo_wbc_filter_icon{
					            margin-top: 0px !important;
					        }
					        .icon_header{
					            margin-top: 0.5em !important;
					            margin-bottom: auto !important;
					        }
					        .eo-wbc-container.filters>.segments>.ui.segment{
					            padding-bottom: 0em !important;
					        }


					        .eo-wbc-container.filters.ui.form .three.wide.field:nth-child(even){
					            text-align: right !important;
					        }
					        /**/
					        .eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(even){
					            text-align: right;
					        }
					        .eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(even)>.wide.field.twelve{
					            position: absolute;
					            right: 0;
					            text-align: left !important;
					        }
					        #help_modal{
					            border-radius:0 !important;
					            font-family: Avenir !important;
					        }
					        #help_modal .header{
					            border-bottom:none !important;
					        }
					    </style>

					<?php
					}else{
					?>
					       <style type="text/css">

					       #help_modal .close:before{content:'Close  X  ';white-space:pre;font-family:'Avenir Next'!important}.eo-wbc-container>.ui.steps .step:not(:first-child):before{border-left:1em solid #d2d2d2!important}.eo-wbc-container.filters.container.ui.form,.eo-wbc-container.filters.container.ui.form .ui.header{font-family:<?php echo wbc() ->options->get_option('appearance_filters','header_font','ZapfHumanist601BT-Roman')?>}.ui.labeled.ticked.range.slider .labels{height:0;top:unset;bottom:-10%;font-size:12px}.ui.labeled.ticked.range.slider .labels .label::after{top:unset;bottom:100%}.eo-wbc-container.filters.container.ui.form .ui.segments{border:none!important}.ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon:hover:not(.none_editable),.ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon_select{border-bottom:0!important}.eo-wbc-container.filters.container.ui.form .field:last-child{margin-bottom:-1.4em}.eo-wbc-container.filters.container.ui.form .field:last-child(:nth-of-type(2n)){position:absolute;right:0}.eo_wbc_filter_icon_select div,.ui.segment:not(.bottom_filter_segment) .eo_wbc_filter_icon:hover:not(.none_editable) div{visibility:unset!important}.eo-wbc-container.filters.container.ui.form .ui.header{font-size:.8em;text-transform:uppercase}.eo-wbc-container .wide.column:not(.toggle_sticky_mob_filter){display:inline-flex!important}.ui.labeled.ticked.range.slider{padding-top:0!important}.eo-wbc-container .wide.column>.wide.field.text_slider{margin-top:.7em;margin-bottom:auto}.eo_wbc_filter_icon{margin-top:0!important}.icon_header{margin-top:.5em!important;margin-bottom:auto!important}.eo-wbc-container.filters>.segments>.ui.segment{padding-bottom:0!important}.eo-wbc-container.filters.ui.form .three.wide.field:nth-child(2n){text-align:right!important}.eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(2n){text-align:right}.eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(2n)>.wide.field.twelve{position:absolute;right:0;text-align:left!important}
					       #help_modal{border-radius:0!important;font-family:Avenir!important}#help_modal .header{border-bottom:none!important}
					    </style> 
					    
					<?php
					}
					?>
				<?php
				if(!wp_is_mobile()){
					?>
						<?php
						if(WBC_SCRIPT_DEBUG == true){
						?>    
						    <style type="text/css">

						        .eo-wbc-container.filters>.segments>.ui.segment{
						            padding-bottom: 2em !important;                     
						        }

						        #help_modal .close:before{
						            content: 'Close  X  ';
						            white-space: pre;
						            font-family:'Avenir Next' !important;
						        }

						        .eo-wbc-container.filters.container.ui.form .field:last-child{ margin-bottom: 0em !important; 
						        } 
						        .ui.container:not(.fluid){ 
						            width:100% !important; margin:0px !important; 
						        } 
						        #products_table{
						            margin:0px !important
						        }
						        #eo_wbc_filter_table th{
						            text-align: center;
						        }       
						        .eo-wbc-container .wide.column>.wide.field.text_slider{ 
						            margin-top: 0.4em !important; 
						        }
						        
						        .eo-wbc-container{ 
						            padding:0 !important; 
						        }
						        i.icon.question.circle{
						            margin-left:0.25em;
						        }
						        .eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(odd){
						            padding-left:0px !important;
						        }
						        .eo-wbc-container.filters.container.ui.form>.ui.segments,.eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment{ 
						            box-shadow: none !important; 
						        }

						        #reset_filter{
						            left:1em !important;
						        }

						        .ui.labeled.ticked.range.slider.wbc ul.labels{
						            z-index:9999;
						        }

						        .ui.labeled.ticked.range.slider .labels .label::after{
						            top:-1.6em !important;
						            width:2px;
						            height:1.55em;
						            background-color:transparent !important;
						        }

						        .ui.labeled.ticked.range.slider .labels{
						            bottom: -20% !important;
						        }

						        .eo-wbc-container.filters>.segments>.ui.segment{
						            padding-left:0 !important;
						            padding-right:0 !important;
						        }
						        .container.filters>.segments>.ui.segment .wide.column{
						            padding-right:0px !important;
						        }


						    </style>

						<?php
						}else{
						?>
						    <style type="text/css">

						        .eo-wbc-container.filters>.segments>.ui.segment{padding-bottom:2em!important;padding-left:0!important;padding-right:0!important}#help_modal .close:before{content:'Close  X  ';white-space:pre;font-family:'Avenir Next'!important}.eo-wbc-container.filters.container.ui.form .field:last-child{margin-bottom:0!important}.ui.container:not(.fluid){width:100%!important;margin:0!important}#products_table{margin:0!important}#eo_wbc_filter_table th{text-align:center}.eo-wbc-container .wide.column>.wide.field.text_slider{margin-top:.4em!important}.eo-wbc-container{padding:0!important}i.icon.question.circle{margin-left:.25em}.eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment>.ui.grid.container>.wide.column:nth-of-type(odd){padding-left:0!important}.eo-wbc-container.filters.container.ui.form>.ui.segments,.eo-wbc-container.filters.container.ui.form>.ui.segments>.ui.segment{box-shadow:none!important}#reset_filter{left:1em!important}.ui.labeled.ticked.range.slider.wbc ul.labels{z-index:9999}.ui.labeled.ticked.range.slider .labels .label::after{top:-1.6em!important;width:2px;height:1.55em;background-color:transparent!important}.ui.labeled.ticked.range.slider .labels{bottom:-20%!important}.container.filters>.segments>.ui.segment .wide.column{padding-right:0!important}


						    </style>

						    
						<?php
						}
						?>
					<?php
				}

				echo ob_get_clean();
			}

			if(wbc()->options->get_option('filters_filter_setting','filter_setting_alternate_slider_ui', false )){

				ob_start();
				?>
					<?php
					if(WBC_SCRIPT_DEBUG == true){
					?>    
					    <style type="text/css">

					        .ui.labeled.ticked.range.slider .labels .label::after{
					            top:-1em !important;
					            width:2px;
					            height:1.55em;
					            background-color:transparent !important;
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
					            z-index:0 !important;
					        }
					        /*.ui.labeled.slider>.labels .label{
					            -webkit-transform: translate(-50%,70%) !important;
					            transform: translate(-50%,70%) !important;
					        }*/

					    </style>

					<?php
					}else{
					?>
					    <style type="text/css">

					        .ui.labeled.ticked.range.slider .labels .label::after{top:-1em!important;width:2px;height:1.55em;background-color:transparent!important}.ui.labeled.ticked.range.slider .labels{bottom:-20%!important}.ui.labeled.ticked.slider>.labels .label:after{height:6px!important;width:3px!important;top:-6px!important;background:#fff!important}.ui.slider .inner{z-index:0!important}

					    </style>    
					    
					<?php
					}
					?>
				<?php
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

        }, 10 );
	
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
			'enable_scroll_pagination'=>$this->scroll_pagination_setting($this->_category),
		),
		);

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
				$file_suffix = (WBC_SCRIPT_DEBUG) ? '' : '.min';
				wbc()->load->asset( 'asset.php', constant( 'EOWBC_ASSET_DIR' ).'js/filter.assets'.$file_suffix.'.php' );
				
			}, 1049);	

		}else{

			// NOTE: below hook is currently not working and the js is loading from js vars file
			add_action( ( !is_admin() ? 'wp_enqueue_scripts' : 'admin_enqueue_scripts') ,function(){
				$file_suffix = (WBC_SCRIPT_DEBUG) ? '' : '.min';
				wbc()->load->asset('js', 'publics/eo_wbc_filter'.$file_suffix, array('jquery'), "", false, true, null, null, true);
				
			}, 1049);

		}

	}	

	public function product_url() {
		$url = '';
		if(!empty(wbc()->sanitize->get('BEGIN')) and !empty(wbc()->sanitize->get('STEP')) and isset($_GET['FIRST']) and isset($_GET['SECOND'])) {


			$__get = $_GET;
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
						$taxonomies=get_terms(wc_attribute_taxonomy_name_by_id($term->id),array('hide_empty'=>false));
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
							$max_value=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->s