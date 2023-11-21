<?php
/*
*	SP Model Cart class 
*/

namespace eo\wbc\model\publics;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\publics\SP_Cart;

class SP_Model_Cart extends SP_Cart {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	public function init(){

	}

	public function render_ui($ui) {

	}

	public function get_data($for_section="default", $args=array()) {

		
		global $product;	

		/*ACTIVE_TODO_OC_START
		ACTIVE_TODO here it seems that we had made an error during feed model implementation that the swatces init if is missing here. which seems to be fundamnetal and is already there on the item page. so we must fix this as soon as we get chance after the stuller run. -- to h 
			now added the swatches_init key in below if on 05-12-2022
		ACTIVE_TODO_OC_END*/
		// add that four conditions here in below if, simply as or conditions -- to d or -- to b done
		if( $for_section == "gallery_images_init" || $for_section == "gallery_images" || $for_section == 'swatches_init') {

			if( wbc()->sanitize->get('is_test') == 1 ) {
				
                wbc()->common->var_dump( "wbc model feed get_data ".$for_section);
            }

			if($for_section == 'gallery_images_init') {
				$args['data_definition'] = null;
				$args['form_definition'] = null;	
				$args['ui_definition'] = null;
			}

			return \eo\wbc\model\publics\data_model\SP_WBC_Variations::fetch_data($for_section, $product, $args );	
		}
		
	}

	public function load_asset(){

		add_action( 'wp_footer'/*'wp_enqueue_scripts'*/ ,function(){
			
			// wbc()->load->asset('css','fomantic/semantic.min');
			// wbc()->load->asset('js','fomantic/semantic.min',array('jquery'));
			wbc()->load->built_in_asset('semantic');

			wbc()->load->asset( 'asset.php', constant( 'EOWBC_ASSET_DIR' ).'variations.assets.php');
		}, 1049);	

	}
}