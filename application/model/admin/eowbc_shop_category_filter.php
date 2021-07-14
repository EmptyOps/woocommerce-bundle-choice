<?php
namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/eowbc_filters');

class Eowbc_Shop_Category_Filter extends Eowbc_Filters{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		add_filter('eowbc_ajax_filters_check_duplicate',function($status,$item,$table_data,$key_clean){

			if(($item[$key_clean.'_filter']==$table_data[$key_clean."_filter"] and !empty($item['filter_template']) and !empty($table_data['filter_template']) and $item['filter_template']==$table_data['filter_template'] ) and $item['filter_category'] == $table_data['filter_category']) {
				return true;
			} else {
				return false;
			}
									
		},10,4);

		return self::$_instance;
	}

	private function __construct() {
		//$filter_data = unserialize(wbc()->options->get_option_group('filters_sc_d_fconfig',"a:0:{}"));

		/*echo "<pre>";
		print_r($filter_data);
		die();*/

		$this->tab_key_prefix='sc_';
	}
}
