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

		// ACTIVE_TODO_OC_START
		// // /var/www/html/drashti_project/27-05-2022/woo-variation-gallery/wpml-config.xml
		// <wpml-config>
	 //    <custom-fields>
	 //        <custom-field action="copy">woo_variation_gallery_images</custom-field>
	 //    </custom-fields>
		// </wpml-config>
		// ACTIVE_TODO_OC_END

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

	public function variations_swatches_render_compatability($page_section,$args = array()){

		parent::variations_swatches_render_compatability($page_section,$args);

		// NOTE: nothing so far here but here the frontend templaet and js/css layer Compatibility would come 

	}

	public function loop_render_compatability($page_section,$args = array()){

		parent::loop_render_compatability($page_section,$args);

		// NOTE: nothing so far here but here the frontend templaet and js/css layer Compatibility would come 

	}

	public function woo_general_broad_matters_compatability($section){

        if($section == 'woocommerce_configure_bundle'){
		    if ( isset( $_POST[ 'action' ] ) && wbc()->sanitize->post('action') === 'woocommerce_configure_bundle_order_item' ) {
            	return true;
        	}
        }
	}

	public function feed_quickview_container_compatability($page_section,$args = array()){

 	}

 	public function router_compatability($page_section,$args = array()) {


		// NOTE: here this is actualy the ultimate sort to get the category id, but off cource we will need to add whenever required the specific compatibility patches like based on elementor or wpml conditions above this patche in hirarchical if structure to ensure that plateform specific issues like of wpml or elementor is handeled matuarly and using standard api.
		
		$c_res = array();
 		if($page_section == 'current_page_category_id') {

			$category = wbc()->wc->get_category_by_url(null, null, true, false, false);

			if( empty($category) ) {

				$category = wbc()->wc->get_category_by_url(null, null, false, true, false);
			
				if( empty($category) ) {

					$category = wbc()->wc->get_category_by_url(null, null, false, false, true);

					if( empty($category) ) {

						return $c_res;
					}
				}
			}

			// $category = wbc()->wc->get_category_by_url($url, 'id');

			$c_res['term_id'] = $category->cat_ID;

			$c_res['slug'] = $category->slug;
 		}

 		return $c_res;
 	}

}