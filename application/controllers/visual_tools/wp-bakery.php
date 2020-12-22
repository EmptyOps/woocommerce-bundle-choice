<?php
namespace eo\wbc\controllers\visual_tools; 

class WP_Bakery {
	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		// no implementation
	}

	public function init() {
		add_filter( 'vc_grid_item_shortcodes',array($this,'two_buttons'));
	}

	public function two_buttons($shortcodes) {
		$shortcodes['eowbc_two_buttons'] = array(
		 	'name' => __( 'The Two Buttons', 'woo-bundle-choice' ),
		 	'base' => array($this,'render_two_buttons'),
		 	'category' => __( 'Content', 'woo-bundle-choice' ),
		 	'description' => __( 'Add two button widget to show the buttons for starting the bundle builder.', 'woo-bundle-choice' ),
		 	'post_type' => Vc_Grid_Item_Editor::postType(),
		  );
		 return $shortcodes;
	}

	public function render_two_buttons() {
		return '<h2>Hello, World!</h2>';
	}
}
