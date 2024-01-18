<?php
/*
*	SP Entity class 
*/

namespace eo\wbc\system\core\data_model;

defined( 'ABSPATH' ) || exit;

class SP_Entity {


	private static $_instance = null;

	private static $id = null;

	public static function instance() {

		throw new Exception("Sorry, singleton instance method not supported for this class. Always use construct method to create object.", 1);
	}

	public function __construct() {

	}

	public static function createFromJson(){
		throw new Exception("Not supported yet", 1);
	}

	public static function createFromSerialized(){
		throw new Exception("Not supported yet", 1);
	}

	public static function createFromArray($data_array){
		throw new Exception("Not supported yet", 1);
	}

	protected static function create(){
		throw new Exception("Not supported yet", 1);
	}

	protected static function update(){
		throw new Exception("Not supported yet", 1);
	}

	protected static function delete(){
		throw new Exception("Not supported yet", 1);
	}

	public function set_platform_key(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public function set_platform_name(){
		throw new Exception("Set method is not supposed to be supported for this property, rely on construct method to set this property.", 1);
	}

	public function platform_key(){
		return $this->platform_key;
	}

	public function platform_name(){
		return $this->platform_name;
	}

	public static function transform_older_format_to_new_format($data, $args = array()){

		$res = array("type" => "success", "msg" => "", "data_new_format" => array());

        $separator = wbc()->config->separator();

		foreach($data as $data_key => $data_value) {

			if (isset($data[$data_key.$separator.'new_format'])) {

				$res['data_new_format'][$data_key] = $data[$data_key.$separator.'new_format'];
			} else {

				if (strpos($data_key, $separator.'new_format') === FALSE) {

					if (!is_array($data_value) && !is_object($data_value)) {

						$res['data_new_format'][$data_key] = array('key'=>$data_key, 'value'=>$data_value);
					} else {

						$res["type"] = "error";
						$res["msg"] = "The new format value is not found for the key " . $data_key . "\n<br>";

						return $res;
					}

				}
 
			}
		}

		return $res;
	}


}
