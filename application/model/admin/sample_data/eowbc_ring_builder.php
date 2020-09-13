<?php


/*
*	Sample data ring builder Model.
*/

namespace eo\wbc\model\admin\sample_data;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/sample_data/eowbc_sample_data');

class Eowbc_Ring_Builder extends Eowbc_Sample_Data {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		$this->number_of_step = 3;
		$this->data_template = \eo\wbc\model\admin\sample_data\data_templates\Ring_Builder_Data_Template::instance();
	}

}
