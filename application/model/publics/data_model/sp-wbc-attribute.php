<?php
/**
 *	WBC Attribute class 
 *	NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.
 *
 */

namespace eo\wbc\model\data_model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Attribute;

class SP_WBC_Attribute extends SP_Attribute {

	public function __construct() {
		/*throw new Exception("Default construct method is not supported. Use class function createFromArray etc. to create Attribute or its object.", 1);*/
		parent::__construct();
	}

	public static function createFromJson(){

		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public static function createFromSerialized(){

		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public static function createFromArray( $platform_key, $platform_name, $data_array, $args = array() ){

		NOTE: This class hierarchy of these clasees will contain janral code related to CRUD operations and so on functions. so it means that if there is any extension specific code then that need to be implemented in that specific extension class which is extended from this class only, that is necessary to ensure that wbc free layer has only relevant and neat code. and beyond the extension specific classes thar might be sum exception like dapii extenshone has its specific different classes for handling the crud operations and factory logic related to category, attribute and product and so on, and that exception is assumed to be kept separate always wich mins that dapii code will never be merged or synced in any way with this class hierarchy and its layers.

		return parent::createFromArray($platform_key, $platform_name, $data_array, $args);
	}

}
