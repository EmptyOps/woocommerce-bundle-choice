<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Mapping' ) ) {
	class Mapping {

		private static $_instance;
		public static function instance() {
		if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() {
			// no implementation.
		}

		public static function eo_wbc_prime_category($slug='',$prefix='',$opts_arr=array()) {        
        
	        $map_base = get_categories(array(
	            'hierarchical' => false,
	            'show_option_none' => '',
	            'hide_empty' => 0,
	            'parent' => !empty(wbc()->wc->get_term_by('slug',$slug,'product_cat')) ?wbc()->wc->get_term_by('slug',$slug,'product_cat')->term_id : '',
	            'taxonomy' => 'product_cat'
	        ));
	        
	        $category_option_list='';
	        /*if(!empty($slug)) {
	        	echo "<pre>";
	        	print_r(wbc()->wc->get_term_by('slug',$slug,'product_cat'));
	        	echo "</pre>";
	        }*/
	        //$parent_name = (!empty(wbc()->wc->get_term_by('slug',$slug,'product_cat')) ?' - '.wbc()->wc->get_term_by('slug',$slug,'product_cat')->name : '');
	        
	        foreach ($map_base as $base) {            

	        	$parent_name='';
	        	if(!empty($base->parent)) {
	        		$parent_name = (!empty(wbc()->wc->get_term_by('id',$base->parent,'product_cat')) ?' - '.wbc()->wc->get_term_by('id',$base->parent,'product_cat')->name : '');
	        	}

	            // $category_option_list.= "<div class='item' data-value='".$base->term_taxonomy_id."'>".$prefix.$base->name."</div>".eo_wbc_prime_category($base->slug, $prefix.'-');
	            $opts_arr[$base->term_taxonomy_id] = array( 'label'=>$prefix.$base->name.$parent_name );
		        $opts_arr = \eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_prime_category($base->slug, $prefix.'-',$opts_arr);
	        }

	        // return $category_option_list;
	        return $opts_arr;
	    }   

	    public static function eo_wbc_attributes($opts_arr=array())
	    {        
	        // $taxonomies="";
	        foreach (wc_get_attribute_taxonomies() as $attribute) {                 
	            // $taxonomies.="<div class='divider'></div><div class='header'>".($attribute->attribute_label?$attribute->attribute_label:$attribute->attribute_name)."</div>";
	            $opts_arr[wbc()->common->stringToKey( ($attribute->attribute_label?$attribute->attribute_label:$attribute->attribute_name) )] = array( 'label'=>($attribute->attribute_label?$attribute->attribute_label:$attribute->attribute_name), 'is_header'=>true );                  
	            foreach (get_terms(['taxonomy' => wc_attribute_taxonomy_name($attribute->attribute_name),'hide_empty' => false]) as $term) {
	                // $taxonomies.="<div class='item' data-value='".$term->term_taxonomy_id."'>".$term->name."</div>";   
	                $opts_arr[$term->term_taxonomy_id] = array( 'label'=>$term->name );  
	            }
	        }
	        // return $taxonomies;
	        return $opts_arr;
	    }  

		public static function get_form_definition( $is_add_sample_values = false ) {
			
			wbc()->load->model('admin/form-builder');

			$dropdown_opts_first_cat = apply_filters('eowbc_admin_form_mapping_first_cat',\eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_attributes( \eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_prime_category(/*wbc()->options->get_option('configuration','first_slug')*/'',' ') ));
			$dropdown_opts_second_cat = apply_filters('eowbc_admin_form_mapping_second_cat',\eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_attributes( \eo\wbc\controllers\admin\menu\page\Mapping::eo_wbc_prime_category(''/*wbc()->options->get_option('configuration','second_slug')*/,' ') ));

			//map list
			$table = array();
			$table['id']='eowbc_price_control_methods_list';
			$table['head'] = array(
								0=>array(
									0=>array(
										'is_header' => 1, 
										'val' => '',
										'is_checkbox' => true, 
										'sanitize'=>'sanitize_text_field',
										'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''),'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$table["id"].'"')),'class'=>'','where'=>'in_table')
									),
									1=>array(
										'is_header' => 1, 
										'val' => 'First Term',
										'field_id'=>'eo_wbc_first_category'
									),
									2=>array(
										'is_header' => 1, 
										'val' => 'Second Term',
										'field_id'=>'eo_wbc_second_category'
									),
									3=>array(
										'is_header' => 1, 
										'val' => 'Discount',
										'field_id'=>'eo_wbc_add_discount'
									),
								),
							);
			$table['body'] = array(
								0=>array(
									0=>array(
										'val' => eowbc_lang('No map(s) exists, please add some maps.'),
										'colspan' => 4, 
										'class'=> 'red'
									),
								),
							);

			$form_definition = array(
				'prod_mapping_pref'=>array(
					'label'=>'Product mapping preference',
					'form'=> array(
						'prod_mapping_pref_section'=>array('label'=>'Configure product mapping','type'=>'segment','desc'=>'Configure the product mapping settings.'
						),
						'saved_tab_key'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'mapping_preference_tab_visible_info'=>array(
							'label'=>eowbc_lang('(Determine how the product mapping should behave. For example AND means product belongs to both category/attribute A and B, OR means product belongs to either of category/attribute A or B)'),
							'type'=>'visible_info',
							'class'=>array('fluid', 'medium'),
							'size_class'=>array('sixteen','wide'),
							'inline'=>false,
						), 
						'prod_mapping_pref_category'=>array(
							'label'=>eowbc_lang('Category'),
							'type'=>'radio',
							'sanitize'=>'sanitize_text_field',
							'value'=>'and',
							'validate'=>array('required'=>''),
							'options'=>array( 'and'=> eowbc_lang('AND'),'or'=>eowbc_lang('OR') ),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide','required'),
							'inline'=>false,
						),
						'prod_mapping_pref_attribute'=>array(
							'label'=>eowbc_lang('Attribute'),
							'type'=>'radio',
							'value'=>'or',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'options'=>array( 'and'=> eowbc_lang('AND'),'or'=>eowbc_lang('OR') ),
							'class'=>array('fluid'),						
							'size_class'=>array('eight','wide','required'),
							'inline'=>false,
						),
						'submit_btn'=>array(
							'label'=>eowbc_lang('Save'),
							'type'=>'button',
							'class'=>array('secondary'),
							//'size_class'=>array('eight','wide'),
							'inline'=>false,
							'attr'=>array('data-tab_key="prod_mapping_pref"', 'data-action="save"'),
						)
					)
				),							
				'map_creation_modification'=>array(
						'label'=>"Map creation and modification",
						'form'=>array(
							'map_creation_modification_section'=>array('label'=>'Add/Edit product maps','type'=>'segment','desc'=>'Add or Edit the product maps.'
							),
							$table["id"].'_bulk'=>array(
								// 'label'=>'Bulk Actions',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>array(''=>eowbc_lang('Bulk Actions'), 'delete'=>'Delete'),
								'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'next_inline'=>true,
								'inline'=>true,
							),
							'd_fconfig_submit_btn_bulk'=>array(
								'label'=>'Apply',
								'type'=>'button',
								'class'=>array('secondary'),
								// 'size_class'=>array('eight','wide'),
								'prev_inline'=>true,
								'inline'=>true,
								'attr'=>array('data-tab_key="map_creation_modification"', 'data-bulk_table_id="'.$table["id"].'"', 'data-action="bulk"' )
							),
							'list'=>array_merge( $table , array(
								'type'=>'table' )
							), 
							'map_creation_modification_id'=>array(
								'type'=>'hidden',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
							),
							'save_sec_title'=>array(
								'label'=>"Add/Edit Maps",
								'type'=>'label',
								'size_class'=>array('eight','wide')
							),
							'range_first'=>array(
								'type'=>'checkbox',
								'value'=>array(''),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>eowbc_lang('Select range?')),
								'is_id_as_name'=>true,
								'inline_class'=>array('three'),
								'style'=>'normal_without_parent_div',
								'next_inline'=>true,
								'inline'=>true,								
							),
							'emptylabel'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'range_second'=>array(
								'type'=>'checkbox',
								'value'=>array(''),
								'sanitize'=>'sanitize_text_field',
								'options'=>array('1'=>eowbc_lang('Select range?')),
								'is_id_as_name'=>true,
								'style'=>'normal_without_parent_div',
								'prev_inline'=>true,
								'inline'=>true,
							),

							'eo_wbc_first_category'=>array(
								'label'=>'First field',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'options'=>$dropdown_opts_first_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid','search','clearable'),
								'inline_class'=>array('three'),
								'next_inline'=>true,
								'inline'=>true,
								'size_class'=>array('required'),
							),
							'emptylabel1'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'eo_wbc_second_category'=>array(
								'label'=>'Second field',
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'validate'=>array('required'=>''),
								'options'=>$dropdown_opts_second_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid','search','clearable'),
								'prev_inline'=>true,
								'inline'=>true,
								'size_class'=>array('required'),
							),

							'eo_wbc_first_category_range'=>array(
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>$dropdown_opts_first_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid'),
								'inline_class'=>array('three', 'range_section'),
								'next_inline'=>true,
								'inline'=>true,
								'size_class'=>array('required'),
							),
							'emptylabel2'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'eo_wbc_second_category_range'=>array(
								'type'=>'select',
								'value'=>'',
								'sanitize'=>'sanitize_text_field',
								'options'=>$dropdown_opts_second_cat,	//array('0'=>'Category 1', '1'=>'Category 2','2'=>'Attribute 1', '3'=>'Attribute 2',),
								'class'=>array('fluid'),
								'prev_inline'=>true,
								'inline'=>true,
								'size_class'=>array('required'),
							),

							'eo_wbc_first_category_vis_info'=>array( 
								'label'=>'Select sub-category or attribute from first category.',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small','field'),
								'inline_class'=>array('three'),
								'next_inline'=>true,
								'inline'=>true,
							),
							'emptylabel3'=>array(
								'label'=>'<------------->',
								'type'=>'label',
								//'class'=>array('fluid'),
								'size_class'=>array('two','wide'),
								'prev_inline'=>true,
								'next_inline'=>true,
								'inline'=>true,
							),
							'eo_wbc_second_category_vis_info'=>array(
								'label'=>'Select sub-category or attribute from second category.',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small','field'),
								'prev_inline'=>true,
								'inline'=>true,
							),

							'eo_wbc_add_discount'=>array(
								'no_label' => true,
								'type'=>'text',
								'value'=>'0',
								'sanitize'=>'sanitize_text_field',
								'size_class'=>array('one','wide'),
								// 'prev_inline'=>true,
								// 'next_inline'=>true,
								// 'inline'=>true,

								'visible_info'=>array( 'label'=>'Discount rate in %',
									'type'=>'visible_info',
									'class'=>array('fluid', 'small'),
									'size_class'=>array('eight','wide','required'),
								),
							),
							
							'map_creation_modification_save_btn'=>array(
								'label'=>eowbc_lang('Save'),
								'type'=>'button',
								'class'=>array('secondary'),
								//'size_class'=>array('eight','wide'),
								'inline'=>false,
								'attr'=>array('data-tab_key="map_creation_modification"', 'data-action="save"'),
							)
						)
					),
				
			);
			
			$form_definition = apply_filters('eowbc_admin_form_mapping',$form_definition);

			if($is_add_sample_values) {
				//loop through form tabs and set (random) sample values for each field  
				foreach ($form_definition as $key => $tab) {
			    	foreach ($tab["form"] as $fk => $fv) {
					    //here we can override any particular field which needs specific sample values 
					    if( $fv["type"] == "text" || $fv["type"] == "hidden" || $fv["type"] == "textarea" ) {	//non numeric 
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "abc", "xyz", "def", "uvw" );
					    } 
					    else if( $fv["type"] == "color" ) {	
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "red", "white", "green", "black" );
					    } 
					    
					    //no need to set for select/radio/checkboxes as we can use sample from its available options 
						
					}
			    }
			}

			return $form_definition;

		}

	}
}		
