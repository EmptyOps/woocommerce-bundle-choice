<?php
/**
 *	WBC Product class 
 *	NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.
 *
 */

namespace eo\wbc\model\data_model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Product;

class SP_WBC_Product extends SP_Product {

	public function __construct() {
		/*throw new Exception("Default construct method is not supported. Use class function createFromArray etc. to create product or its object.", 1);*/
		parent::__construct();
	}

	public static function createFromJson(){

		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public static function createFromSerialized(){

		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public static function createFromArray( $platform_key, $platform_name, $data_array, $args = array() ){

		// NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.

		return parent::createFromArray($platform_key, $platform_name, $data_array, $args);
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

    public static function admin_hooks() {

    	\eo\wbc\model\utilities\SP_Extensions_Api::admin_hooks();
    }


}
