<?php
/*
*	WBC Product class 
*/

namespace eo\wbc\model\data_model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Product;
class SP_WBC_Product extends SP_Product {

	public function __construct() {
		throw new Exception("Default construct method is not supported. Use class function createFromArray etc. to create product or its object.", 1);
	}

   	public static function hooks() {

   		add_filter('sp_data_layer_product_structure_def', function($prod_structure_def) { 

    		// array_push($prod_structure_def['cust_field'], array('legacy_key'=> 'meta', 'map_def_key'=>'video_link', 'meta_key'=>'_video_link', 'requirement'=>'' ) );
    		
    		// ACTIVE_TODO add fields for simple product type that we need tyo support for default gallery
        
        	// ACTIVE_TODO Add fields for variable product type that we need to support for sp_variations swatches and gallery images. in this case may be we can simply call wbc variations class function from here to provide there fields

    		return $prod_structure_def;
    	}, 10, 1);

    }

    ////// @shraddha //////
    public static function sp_variations_data_before_admin_form_render() {



    }

}
