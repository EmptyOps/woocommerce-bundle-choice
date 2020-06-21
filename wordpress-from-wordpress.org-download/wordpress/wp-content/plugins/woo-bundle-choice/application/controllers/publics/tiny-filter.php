<?php
namespace eo\wbc\controllers\publics;
defined( 'ABSPATH' ) || exit;

class Tiny_Filter {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function init() {
		add_action('woocommerce_archive_description',array($this,'add_filter'),10);
	}	

	public function add_filter() {
		$filter_datas =  unserialize(wbc()->options->get_option('tiny_feature','filter_widget',"a:0:{}"));
		if(!empty($filter_datas)){
			wbc()->load->model('publics/component/eowbc_filter_widget');
			\eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance()->get_widget_standalone($filter_datas);
		}		
	}
}
