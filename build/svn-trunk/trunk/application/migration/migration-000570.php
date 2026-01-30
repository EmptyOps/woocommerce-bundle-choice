<?php

defined( 'ABSPATH' ) || exit;

class Migration_000570 {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}
	
	public static function run() {
		self::instance()->db();
		self::instance()->option();
	}

	public function db() {

	}

	public function option() {
		$first_term = wbc()->wc->get_term_by('slug',get_option('eo_wbc_first_slug'),'product_cat');
		$second_term = wbc()->wc->get_term_by('slug',get_option('eo_wbc_second_slug'),'product_cat');

		$first_id = '';
		if(!is_wp_error($first_term) and !empty($first_term)){
			$first_id = $first_term->term_id;
		}

		$second_id = '';
		if(!is_wp_error($second_term) and !empty($second_term)){
			$second_id = $second_term->term_id;
		}

		$features = unserialize(get_option('eo_wbc_feature_option'));
		if(is_array($features) and !empty($features)){
			$new_features = array();
			foreach ($features as $feature) {
				$new_features[$feature] = $feature;
			}
			$features = $new_features;
		} else {
			$features = array();
		}

		// set default: set default to ring_builder since all old users prior to 0570 where (mostly) using that only if they have not ran the setup wizard
		if( sizeof($features) <= 0 ) {
			$features['ring_builder'] = 'ring_builder';
		}

		$mapping = unserialize(get_option('eo_wbc_cat_maps',"a:0:{}"));
		if(!empty($mapping) and is_array($mapping)){
			$new_mapping =array();
			foreach ($mapping as $map_key => $map_value) {
				
				$first_map = explode(',',$map_value[0]);
				$second_map = explode(',',$map_value[1]);

				$uniqueid = wbc()->common->createUniqueId();
				$new_mapping[$uniqueid]=array(
					'range_first'=>(count($first_map)==1?false:count($first_map)),
					'range_second'=>(count($second_map)==1?false:count($second_map)),

					'eo_wbc_first_category'=>$first_map[0],
					'eo_wbc_second_category'=>$second_map[0],
					'eo_wbc_first_category_range'=>(empty($first_map[1])?'':$first_map[1]),
					'eo_wbc_second_category_range'=>(empty($second_map[1])?'':$second_map[1]),
					'eo_wbc_add_discount'=>$map_value[2],
					'id'=>$uniqueid,
				);             
			}			
			wbc()->options->set('eowbc_option_mapping_map_creation_modification',serialize($new_mapping));
			
		}

		$init_options = array( 

							'configuration'=>array(
									'category_count'=>2,
									'buttons_page'=>get_option('eo_wbc_btn_setting'),
									'first_name'=>$first_id,
									'first_slug'=>get_option('eo_wbc_first_slug'),
									'first_url'=>get_option('eo_wbc_first_url'),
									'first_icon'=>get_option('eo_wbc_first_icon'),
									'second_name'=>$second_id,
									'second_slug'=>get_option('eo_wbc_second_slug') ,
									'second_url'=>get_option('eo_wbc_second_url'),
									'second_icon'=>get_option('eo_wbc_second_icon'),
									'preview_name'=>get_option('eo_wbc_collection_title'),
									'preview_icon'=>get_option('eo_wbc_collection_icon'),
									'collection_name'=>"Preview",
									'review_page'=>"/eo-wbc-product-review/",
									'config_category'=>0,
									'config_map'=>0,
									'enable_make_pair'=>get_option('eo_wbc_pair_status'),
									'label_make_pair'=>get_option('eo_wbc_pair_text'),
									'config_alternate_breadcrumb'=>'default',
								),
							'setting_status_setting_status_setting'=>array(
									'inventory_type'=>get_option('eo_wbc_inventory_type','jewelry'),	//set default to jewelry since all old users prior to 0570 where (mostly) using that only if they have not ran the setup wizard
									'features'=>serialize($features),
								),
							'filters_filter_setting'=>array(
									'filter_setting_status'=>(get_option('eo_wbc_filter_enable','filter_setting_status')?'filter_setting_status':''),
								),
							'mapping_prod_mapping_pref'=>array(
									'prod_mapping_pref_category'=>get_option('eo_wbc_map_cat_pref','or'),
									'prod_mapping_pref_attribute'=>get_option('eo_wbc_map_attr_pref','and'),
								),							
							'appearance_wid_btns'=>array(
									'tagline_text'=>get_option('eo_wbc_home_btn_tagline'),
									'button_text'=>get_option('eo_wbc_home_btn_text'),
									'def_button'=>get_option('eo_wbc_home_default_button'),
									'button_backcolor_active'=>get_option('eo_wbc_home_btn_color'),
									'button_hovercolor'=>get_option('eo_wbc_home_btn_hover_color'),
									'button_textcolor'=>get_option('eo_wbc_home_btn_text_color'),
									'button_radius'=>get_option('eo_wbc_home_btn_radius').'px',
								),
							'appearance_breadcrumb'=>array(
									'breadcrumb_radius'=>
										get_option('eo_wbc_breadcrumb_radius','5').'px',
									'breadcrumb_backcolor_active'=>
										get_option('eo_wbc_active_breadcrumb_color','#dbdbdb'),
									'breadcrumb_backcolor_inactive'=>
										get_option('eo_wbc_non_active_breadcrumb_color','#ffffff'),
									'showhide_icons'=>
										get_option('eo_wbc_show_hide_breadcrumb_icon'),
									'breadcrumb_num_icon_backcolor_active'=>
										get_option('eo_wbc_breadcrumb_icon_color_active','#000000'),
									'breadcrumb_num_icon_backcolor_inactive'=>
										get_option('eo_wbc_breadcrumb_icon_color_inactive','#000000'),
									'breadcrumb_actions_backcolor_active'=>
										get_option('eo_wbc_breadcrumb_action_color_active','#4773f7'),
									'breadcrumb_actions_backcolor_inactive'=>
										get_option('eo_wbc_breadcrumb_action_color_inactive','#939ebf'),
									'breadcrumb_title_backcolor_active'=>
										get_option('eo_wbc_breadcrumb_title_color_active','#ffffff'),
									'breadcrumb_title_backcolor_inactive'=>
										get_option('eo_wbc_breadcrumb_title_color_inactive','#9e9e9e'),
								),	
							'appearance_filters'=>array(
									'header_font'=>
										get_option('eo_wbc_filter_config_font_family'),
									'header_textcolor'=>
										get_option('eo_wbc_filter_config_header_color'),
									'labels_textcolor'=>
										get_option('eo_wbc_filter_config_label_color'),
									'slider_nodes_backcolor_active'=>
										get_option('eo_wbc_filter_config_slidernode_color'),
									'slider_track_backcolor_active'=>
										get_option('eo_wbc_filter_config_slidertrack_color'),
									'icon_size'=>
										get_option('eo_wbc_filter_config_icon_size','35').'px',
									'icon_label_size'=>
										get_option('eo_wbc_filter_config_icon_label_size','0.75').'em',
								),
							'appearance_product_page'=>array(
									'fc_atc_button_text'=>
										get_option('eo_wbc_add_to_cart_text_first',''),
									'sc_atc_button_text'=>
										get_option('eo_wbc_add_to_cart_text_second',''),
									'product_page_add_to_basket'=>
										get_option('eo_wbc_add_to_basket',''),	
								),
						);

        if(!empty($init_options) and is_array($init_options)) {
        	foreach ($init_options as $option_key => $option_values) {
        		if(!empty($option_values) and is_array($option_values)){
        			foreach ($option_values as $key => $value) {
	        			wbc()->options->update_option($option_key,$key, $value);	
	        		}
        		}        		
        	}        	
        }
        update_option('btn_position_setting_text',get_option('eo_wbc_btn_position',''));
		
		$filter_first=unserialize(get_option('eo_wbc_add_filter_first'));
		$filter_second=unserialize(get_option('eo_wbc_add_filter_second'));
		
		$new_filter_first = array();
		if(!empty($filter_first) and is_array($filter_first)){
			foreach ($filter_first as $filter_key => $filter_value) {
				$new_filter_first[wbc()->common->createUniqueId()]=
					array(
						'd_fconfig_filter' => $filter_value['name'],
		            	'd_fconfig_type' => $filter_value['type'],
		            	'd_fconfig_dependent' => $filter_value['dependent'],
		            	'd_fconfig_label' => $filter_value['label'],
		            	'd_fconfig_is_advanced' => $filter_value['advance'],
		            	'd_fconfig_column_width' => $filter_value['column_width'],
		            	'filter_template' => '',
		            	'd_fconfig_ordering' => $filter_value['order'],
		            	'd_fconfig_input_type' => $filter_value['input'],
		            	'd_fconfig_icon_size' => (!empty($filter_value['icon_size'])?$filter_value['icon_size']:''),
		            	'd_fconfig_icon_label_size' => (!empty($filter_value['font_size'])?$filter_value['font_size']:''),
		            	'd_fconfig_add_reset_link' => (!empty($filter_value['reset'])?$filter_value['reset']:0),
		            	'd_fconfig_add_help' => 0,
		            	'd_fconfig_add_help_text' => '',
		            	'd_fconfig_add_enabled' => 1,
		            );
			}
		}
		
		wbc()->options->set('eowbc_option_filters_d_fconfig',serialize($new_filter_first));
				
		$new_filter_second = array();
		if(!empty($filter_second) and is_array($filter_second)){
			foreach ($filter_second as $filter_key => $filter_value) {
				$new_filter_second[wbc()->common->createUniqueId()]=
					array(
						's_fconfig_filter' => $filter_value['name'],
		            	's_fconfig_type' => $filter_value['type'],
		            	's_fconfig_dependent' => $filter_value['dependent'],
		            	's_fconfig_label' => $filter_value['label'],
		            	's_fconfig_is_advanced' => $filter_value['advance'],
		            	's_fconfig_column_width' => $filter_value['column_width'],
		            	'filter_template' => '',
		            	's_fconfig_ordering' => $filter_value['order'],
		            	's_fconfig_input_type' => $filter_value['input'],
		            	's_fconfig_icon_size' => (!empty($filter_value['icon_size'])?$filter_value['icon_size']:''),
		            	's_fconfig_icon_label_size' => (!empty($filter_value['font_size'])?$filter_value['font_size']:''),
		            	's_fconfig_add_reset_link' => (!empty($filter_value['reset'])?$filter_value['reset']:0),
		            	's_fconfig_add_help' => 0,
		            	's_fconfig_add_help_text' => '',
		            	's_fconfig_add_enabled' => 1,
		            );
			}
		}
		wbc()->options->set('eowbc_option_filters_s_fconfig',serialize($new_filter_second));
	    
	    wbc()->options->update_option('configuration','config_category',get_option('eo_wbc_config_category','0'));
        wbc()->options->update_option('configuration','config_map',get_option('eo_wbc_config_map','0'));

        // commented since isn't necessary anymore and isn't right either 
        // wbc()->options->set('eo_wbc_version','1.0.0');
	}
}