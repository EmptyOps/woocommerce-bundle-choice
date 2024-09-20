<?php
/*
*	A page builder class.
*/
namespace eo\wbc\system\core;
use \sp\theme\view\ui\Composer_Elements;
use eo\wbc\model\interfaces\Builder;

defined( 'ABSPATH' ) || exit;

class SP_Page_Builder implements Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}


	public function getUI() {
		return $this->ui;
	}

	public function build_page($ui,$key = 'theme_ui',$process_form = true,$ui_definition = null) {

		// nothing to do here so far 
	}

	public static function build_page_widgets($ui,$page_key,$args = array(),$is_return_html = false,$ui_definition = null){

		// nothing to do here so far 
	}

}

/*$all_post_ids = get_posts(array(
    'fields'          => 'ids',
    'posts_per_page'  => -1,
    'post_type' => 'case_studies'
));*/