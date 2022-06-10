<?php
/**
 *	SP WBC Compatibility class 
 */

namespace eo\wbc\model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\SP_Compatibility;

class SP_WBC_Compatibility extends SP_Compatibility {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}

	public function nnnnnn(){
		// /var/www/html/drashti_project/27-05-2022/woo-variation-gallery/wpml-config.xml
		<wpml-config>
	    <custom-fields>
	        <custom-field action="copy">woo_variation_gallery_images</custom-field>
	    </custom-fields>
		</wpml-config>

		if(!empty($_GET['EO_WBC'])) {
			add_filter('WPML_filter_link',function($url, $lang_info){
				$__get = $_GET;
				unset($__get['lang']);
				$query_url=http_build_query($__get);
				if(strpos($url,'/?')!==false) {
					if(substr($url,-1)==='&'){
						$url.=$query_url;
					} else {
						$url.='&'.$query_url;	
					}					
				} elseif(strpos($url,'?')!==false) {
					if(substr($url,-1)==='&'){
						$url.=$query_url;
					} else {
						$url.='&'.$query_url;	
					}				
				} else {
					$url = untrailingslashit($url).'/?'.$query_url;					
				}
				return $url;			
			},11,2);
		}

		///////////////////////////

		$term = wbc()->wc->get_term_by('id',apply_filters( 'wpml_object_id',$id,'category', FALSE, 'en'),'product_cat');


			$term_list = wbc()->wc->get_terms(apply_filters( 'wpml_object_id',$id,'category', FALSE, 'en'),'menu_order');

		//////////////////////////
		
			$term = wbc()->wc->get_term_by('term_taxonomy_id',apply_filters( 'wpml_object_id',$id,'category', FALSE, 'en'),'product_cat');

			$term_list = wbc()->wc->get_terms(apply_filters( 'wpml_object_id',$term->term_id,'category', FALSE, 'en'),'menu_order');	
	}

	public function variations_gallery_data_compatability(){

	}

	public function variations_gallery_render_compatability(){

	}

	public function variations_swatches_data_compatability(){

	}

	public function variations_swatches_render_compatability(){

	}


}