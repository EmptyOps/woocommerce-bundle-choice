<?php
namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/sp_wbc_filters');

class SP_WBC_Shortcode_Filters extends SP_WBC_Filters{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		$this->tab_key_prefix='shortflt_';
	}
}
