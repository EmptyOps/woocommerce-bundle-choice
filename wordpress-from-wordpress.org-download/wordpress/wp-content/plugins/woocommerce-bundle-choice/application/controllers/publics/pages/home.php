<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Home {

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
		if(wbc()->options->get_option('configuration','buttons_page')==3 or wbc()->options->get_option('configuration','buttons_page')==1) {


			ob_start();
			wbc()->load->template('publics/buttons');
			$buttons = ob_get_clean(); 
			$script = "<script>jQuery(document).ready(function(){";

			if(!empty(get_option('btn_position_setting_text',false))) {
				$script.='if(jQuery("'.get_option('btn_position_setting_text','').'").length!=0){'.
              				'jQuery("'.get_option('btn_position_setting_text','').'").append("'.$buttons.'");'.
              				'} else if(jQuery("#container,#primary,.entry-content,.main,#main,.post-content,#content,.content,.container").length!=0){'.
              					'jQuery(jQuery("#container,#primary,.entry-content,.main,#main,.post-content,#content,.content,.container")[0]).append("'.$buttons.'");'.
              				'} else {'.
              					'jQuery("body").append("'.$buttons.'");'.
              				'}';
              			
            } else {
            	$script.='if(jQuery("#container,#primary,.entry-content,.main,#main,.post-content,#content,.content,.container").length!=0){'.
      					'jQuery(jQuery("#container,#primary,.entry-content,.main,#main,.post-content,#content,.content,.container")[0]).append("'.$buttons.'");'.
      				'} else {'.
      					'jQuery("body").append("'.$buttons.'");'.
      				'}';
            }
            $script.='});<script>")';
			echo $script;
		}
	}
}
