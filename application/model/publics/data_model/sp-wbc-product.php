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

   		// ACTIVE_TODO_OC_START
	    // // -- do we need to create hooks function here -- to h done
	    // 	-- if we create hooks funciton then we need ot add two add_filter hook with the key "wbc_pair_builder_first_cat_title", "wbc_pair_builder_second_cat_title" -- to h & -- to s
	    // 		-- and then need to make sure that above add_filter hook does return the title of the first and second category and when we do this we need to make sure that we set the priority default 10 here and for the earring pendant builder we set the priority to some higher level so let simply set it to 50 for the earring pendant builder -- to h & -- to s
	    // ACTIVE_TODO_OC_END
    }


}
