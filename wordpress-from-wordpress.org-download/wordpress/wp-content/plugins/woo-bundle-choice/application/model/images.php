<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model;

defined( 'ABSPATH' ) || exit;

class Images{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

  public function id2url($id){
  	if (empty($id)) {
  		return '';
  	}
  	
    $url = wp_get_attachment_url($id);
    if(is_wp_error($url) or empty($url)) {
      return '';
    }
    return $url;
  }
}
