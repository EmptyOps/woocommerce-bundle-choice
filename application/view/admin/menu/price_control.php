<?php
defined( 'ABSPATH' ) || exit;

function eo_wbc_jpc_list_categories($slug='',$prefix='',$opts_arr=array()){
    $map_base = get_categories(array(
        'exclude'=>array(1),
        'hierarchical' => 1,
        'show_option_none' => '',
        'hide_empty' => 0,
        'parent' => (wbc()->wc->get_term_by('slug',$slug,'product_cat')?wbc()->wc->get_term_by('slug',$slug,'product_cat')->term_id:0),
        'taxonomy' => 'product_cat'
    ));
    
    // $category_option_list='';
    
    foreach ($map_base as $base) {

        // $category_option_list.="<div data-type='0' class='item' data-value='{$base->slug}'>{$prefix}{$base->name}</div>".eo_wbc_jpc_list_categories($base->slug,'--');
        $opts_arr[$base->slug] = array( 'label'=>$prefix.$base->name, 'attr'=>'data-type="0"' );
        $opts_arr = eo_wbc_jpc_list_categories($base->slug,'--',$opts_arr);
    }

    // return $category_option_list;
    return $opts_arr;
}

function eo_wbc_jpc_list_attributes( $opts_arr=array() ){
    // $attributes="";        
    foreach (wc_get_attribute_taxonomies() as $item) {                     
        // $attributes .= "<div data-type='1' class='item' data-value='{$item->attribute_name}'>{$item->attribute_label}</div>";            
        $opts_arr[$item->attribute_name] = array( 'label'=>$item->attribute_label, 'attr'=>'data-type="1"' );
    }
    // return $attributes;
    return $opts_arr;
}

function eo_wbc_jpc_attributes_values(){
    
    $attr_vals=array();

    foreach (wc_get_attribute_taxonomies() as $item) {         

        $vals=get_terms(array('taxonomy'=>'pa_'.$item->attribute_name,'hide_empty'=>FALSE));        
        if(is_array($vals) || is_object($vals)){

            //$attr_vals[$item->attribute_name]=array_map( function( $element ){ return array('value'=>$element->slug,'name'=>$element->name); },$vals);    
            foreach ($vals as $key => $value) {
            	$attr_vals[$item->attribute_name][$value->slug]=$value->name;
            }
        }
    }

    return $attr_vals;
}


$form = array();

$form['id']='jpc_form';
$form['title']=eowbc_lang('Price Control(Beta)');
$form['method']='POST';

$form['data'] = array(

					//section - should be sub array? I think yes... may... be...

					'price_control_section_visible_info'=>array(
						'label'=>eowbc_lang('(Set pricing method to update price in bulk. For eg.: based on gold,diamond price changes, you might want to bulk update prices.)'),
						'type'=>'visible_info',
						'class'=>array('fluid', 'medium'),
						'size_class'=>array('sixteen','wide'),
						'inline'=>false,
						), 
					'jpc_field'=>array(
						'label'=>eowbc_lang('Field'),
						'type'=>'select',
						'value'=>'0',
						'sanitize'=>'sanitize_text_field',
						'options'=>eo_wbc_jpc_list_attributes( eo_wbc_jpc_list_categories() ),
						'class'=>array('fluid'),
						'size_class'=>array('eight','wide'),
						'inline'=>false,
						), 
					'select_values_label'=>array(
						'label'=>eowbc_lang('Select Value(s)'),
						'type'=>'label',
						'class'=>array('jpc_rule_fields'),
						'size_class'=>array('three','wide'),
						),
					'jpc_compare'=>array(
						'no_label'=>true,
						'type'=>'select',
						'value'=>'0',
						'sanitize'=>'sanitize_text_field',
						'options'=>array( 'between'=>'Between', 'in'=>'In' ),
						'class'=>array('fluid'),
						'size_class'=>array('four','wide','jpc_rule_fields'),
						'next_inline'=>true,
						'inline'=>true,
						),
				);

// $arr = eo_wbc_jpc_attributes_values();
// $sizearr = sizeof($arr);
// $cnt = -1;
// foreach ($arr as $key => $value) {
	$fieldarr = array(
		'no_label'=>true,
		'type'=>'select',
		'value'=>'0',
		'sanitize'=>'sanitize_text_field',
		'options'=> array(),	// $value,
		'class'=>array('fluid','jpc_attribute_vals'),
		'size_class'=>array('four','wide'),
		'prev_inline'=>true,
		'inline'=>true,
	);

	$fieldarr['next_inline'] = true;
	$form['data']['jpc_values_drop_1_'/*.$key*/] = $fieldarr;


	$fieldarr = array(
		'no_label'=>true,
		'type'=>'select',
		'value'=>'0',
		'sanitize'=>'sanitize_text_field',
		'options'=> array(),	//$value,
		'class'=>array('fluid','jpc_attribute_vals'),
		'size_class'=>array('four','wide'),
		'prev_inline'=>true,
		'inline'=>true,
	);

	// $cnt++;
	// if( $cnt < $sizearr - 1 )
	// {
	// 	$fieldarr['next_inline'] = true;
	// }

	$form['data']['jpc_values_drop_2_'/*.$key*/] = $fieldarr;
// }

$form['data']['eowbc_pc_add_rule_btn'] = array(
						'label'=>eowbc_lang('Add Pricing Method'),
						'type'=>'button',
						'class'=>array('secondary'),
						//'size_class'=>array('eight','wide'),
						'inline'=>false,
						'attr'=>array('type="button"','onclick="eowbc_pc_add_rule_btn_click(); return false;"'),	
						);


// wbc()->load->model('admin\form-builder');
// eo\wbc\model\admin\Form_Builder::instance()->build($form);


//pricing methods list
$table = array();
$table['id']='jpc_rules_table';
$table['head'] = array(
					0=>array(
						0=>array(
							'is_header' => 1, 
							'val' => 'Field',
							'align'=>'left'
						),
						1=>array(
							'is_header' => 1, 
							'val' => 'Type',
							'align'=>'left'
						),
						2=>array(
							'is_header' => 1, 
							'val' => 'Compare'
						),
						3=>array(
							'is_header' => 1, 
							'val' => 'Value'
						),
					),
				);
$table['body'] = array(
					// 0=>array(
					// 	0=>array(
					// 		'is_header' => 0, 
					// 		'val' => 'Diamond',
					// 		'align'=>'left'
					// 	),
					// 	1=>array(
					// 		'val' => 'Category',
					// 		'align'=>'left'
					// 	),
					// 	2=>array(
					// 		'val' => ''
					// 	),
					// 	3=>array(
					// 		'val' => ''
					// 	),
					// ),
				);

// wbc()->load->model('admin\table-builder');
// eo\wbc\model\admin\Table_Builder::instance()->build($table);


$form['data'] = array_merge( $form['data'], array(

						//section - should be sub array? I think yes... may... be...

						'pricing_method_list'=>array_merge( $table , array(
									'type'=>'table', 
									'class'=>array('jpc_rules_table') 
								) 
							), 
						'regular_price_label'=>array(
							'label'=>eowbc_lang('Regular Price'),
							'type'=>'label',
							//'class'=>array('fluid'),
							'size_class'=>array('three','wide','jpc_rules_table'),
							'next_inline'=>true,
							'inline'=>true,
							),
						'regular_price'=>array(
							//'label'=>eowbc_lang('Regular Price'),
							'no_label' => true,
							'placeholder'=>eowbc_lang('Regular Price'),
							'type'=>'text',
							'value'=>'0',
							'sanitize'=>'sanitize_text_field',
							'options'=>array(),
							//'class'=>array('fluid'),
							'size_class'=>array('three','wide','jpc_rules_table'),
							'prev_inline'=>true,
							'next_inline'=>true,
							'inline'=>true,
							),
						'sales_price_label'=>array(
							'label'=>eowbc_lang('Sales Price'),
							'type'=>'label',
							//'class'=>array('fluid'),
							'size_class'=>array('three','wide','jpc_rules_table'),
							'prev_inline'=>true,
							'next_inline'=>true,
							'inline'=>true,
							),
						'sales_price'=>array(
							//'label'=>eowbc_lang('Sales Price'),
							'no_label' => true,
							'placeholder'=>eowbc_lang('Sales Price'),
							'type'=>'text',
							'value'=>'0',
							'sanitize'=>'sanitize_text_field',
							'options'=>array(),
							//'class'=>array('fluid'),
							'size_class'=>array('three','wide','jpc_rules_table'),
							'prev_inline'=>true,
							'inline'=>true,
							),
						'jpc_add_price_ctl'=>array(
							'label'=>eowbc_lang('Save Pricing Method'),
							'type'=>'button',
							'class'=>array('secondary','jpc_rules_table'),
							//'size_class'=>array('eight','wide'),
							'inline'=>false,
							),
						'jpc_field_name'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'jpc_field_value'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'jpc_field_type'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'jpc_compare_name'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'jpc_compare_value'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'jpc_values_name_1'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'jpc_values_value_1'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'jpc_values_name_2'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
						'jpc_values_value_2'=>array(
							'type'=>'hidden',
							'value'=>'',
							'sanitize'=>'sanitize_text_field',
							),
					)
				);

wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);


//save and update prices
$table = array();
$table['id']='jpc_price_ctl_table';
$table['head'] = array(
					0=>array(
						0=>array(
							'is_header' => 1, 
							'val' => 'Action'
						),
						1=>array(
							'is_header' => 1, 
							'val' => 'Price',
							'align'=>'left'
						),
						2=>array(
							'is_header' => 1, 
							'val' => 'Rules'
						),
					),
				);
$table['body'] = array(
					// 0=>array(
					// 	0=>array(
					// 		'is_header' => 0, 
					// 		'is_icon' => true, 
					// 		'icon_class' => 'close link', 
					// 		'val' => 'x'
					// 	),
					// 	1=>array(
					// 		'val' => 'Regular Price:5<br>Sales Price:4',
					// 		'align'=>'left'
					// 	),
					// 	2=>array(
					// 		'val' => '[Uncategorized]'
					// 	),
					// ),
				);
// wbc()->load->model('admin\table-builder');
// eo\wbc\model\admin\Table_Builder::instance()->build($table);

$form = array();
$form['id']='eowbc_price_control_save_update_prices';
$form['title']= '';	// eowbc_lang('Pricing Method');
$form['method']='POST';
// $form['attr']= array('data-is_serialize="false"');

$form['data'] = array(

					//section - should be sub array? I think yes... may... be...

					'save_update_prices_list'=>array_merge( $table , array(
								'type'=>'table',
								'class'=>array('jpc_price_ctl_table'), 
							)
						), 
					'eo_wbc_action'=>array(
						'type'=>'hidden',
						'value'=>'save_jpc_data',
						'sanitize'=>'sanitize_text_field',
						),
					'eo_wbc_jpc_form_data'=>array(
						'type'=>'hidden',
						'value'=>'',
						'sanitize'=>'sanitize_text_field',
						),
					'jpc_save_price_ctl'=>array(
						'label'=>eowbc_lang('Save and Update Prices'),
						'type'=>'button',
						'class'=>array('secondary'),
						//'size_class'=>array('eight','wide'),
						'attr'=>array("data-action='save'"),
						'inline'=>false,
						'visible_info'=>array( 'label'=>'(Upon clicking the \'Save and Update Prices\' button, it may take some time to update product prices in bulk.)',
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('sixteen','wide'),
							),
						)
				);

wbc()->load->model('admin\form-builder');
eo\wbc\model\admin\Form_Builder::instance()->build($form);

$jpc_data = array();
$jpc_str = wbc()->options->get_option('price_control','rules_data', false);
if( $jpc_str ) {
	// $jpc_data = json_decode( stripslashes( unserialize( wbc()->options->get_option('price_control','rules_data',serialize(array())) ) ), true );
	$jpc_data = json_decode( stripslashes( unserialize( $jpc_str ) ), true );
}

//js 
?>
<script type="text/javascript">
    window.eo_wbc=new Object();

	window.eo_wbc.attributes=JSON.parse('<?php echo json_encode(eo_wbc_jpc_attributes_values()); ?>');

    window.eo_wbc.jpc_data=JSON.parse('<?php echo json_encode( $jpc_data ); ?>');
</script>
<?php 
wbc()->load->asset('js','admin/price_control');	
