<?php


/*
*	Sample data filters shortcode Model.
*/

namespace eo\wbc\model\admin\sample_data;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/sample_data/eowbc_sample_data');

class Eowbc_Filters_Shortcode extends Eowbc_Sample_Data {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		$this->number_of_step = 2;
		$this->data_template = \eo\wbc\model\admin\sample_data\data_templates\Filters_Shortcode_Data_Template::instance();
	}

}
