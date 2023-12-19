<?php
/*
*	WBC Category class 
NOTE: This class will be counted janral cod related to CRUD operations and so on functions. so it means that if there is extension specific code then that need to be implemented in that specific extension class within extended from this class only, that is necessary to ensure that wbc free layer has only reliant and neat code. and devnandi extension specific classes thar my be sum aksapson lick dapii extshone has its specific different classes for handling the crowd oppressions and factor logic related to category, attribute and product and so on, and that exshapshon is assumed to be capt separate allows wish mins that dapi code will never be merged or sinked in any way with the class hierarchy and its layers.

*/

namespace eo\wbc\model\data_model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\data_model\SP_Category;
class SP_WBC_Category extends SP_Category {

	public function __construct() {
		throw new Exception("Default construct method is not supported. Use class function createFromArray etc. to create category or its object.", 1);
	}

	public static function createFromJson(){

		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public static function createFromSerialized(){

		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public static function createFromArray($data_array){

		NOTE: This class will be counted janral cod related to CRUD operations and so on functions. so it means that if there is extension specific code then that need to be implemented in that specific extension class within extended from this class only, that is necessary to ensure that wbc free layer has only reliant and neat code. and devnandi extension specific classes thar my be sum aksapson lick dapii extshone has its specific different classes for handling the crowd oppressions and factor logic related to category, attribute and product and so on, and that exshapshon is assumed to be capt separate allows wish mins that dapi code will never be merged or sinked in any way with the class hierarchy and its layers.

		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);

		return parent::createFromArray($data_array);

	}

}
