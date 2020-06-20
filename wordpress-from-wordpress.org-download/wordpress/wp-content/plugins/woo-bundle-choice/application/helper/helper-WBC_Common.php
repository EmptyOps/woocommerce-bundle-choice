<?php 
defined( 'ABSPATH' ) || exit;

class WBC_Common {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function pr(array $ar,$force_debug = false,$die = false) {
		//TODO yet to implement optional arg force_debug

		echo "<pre>"; print_r($ar); echo "</pre>";

		if( $die )
		{
			wp_die( 'die from the common helper pr function' );
		}

	}

	public function var_dump(array $ar,$force_debug = false,$die = false) {
		//TODO yet to implement optional arg force_debug

		var_dump($ar); 

		if( $die )
		{
			wp_die( 'die from the common helper var_dump function' );
		}

	}

	public function consistsOfTheSameValues(array $a, array $b, bool $strict = false) {
	    // check size of both arrays
	    if (count($a) !== count($b)) {
	        return false;
	    }

	    foreach ($b as $key => $bValue) {

	        // check that expected value exists in the array
	        if (!in_array($bValue, $a, $strict)) {
	            return false;
	        }

	        // check that expected value occurs the same amount of times in both arrays
	        if (count(array_keys($a, $bValue, $strict)) !== count(array_keys($b, $bValue, $strict))) {
	            return false;
	        }

	    }

	    return true;
	}

	public function nonZeroEmpty(&$var) {

		return ( $var!==0 && $var!=="0" && empty($var) );
	}

	public function createUniqueId() {

		return uniqid();
	}

	/**
	 * @author Hiren
	 * function will convert string to key compliant version, no fancy stuff just underscored version, imported from CI helper libs of he_
	 */
	function stringToKey( $str )
	{
		return strtoupper( str_replace(" ", "_", $str) );
	}

	public function createUniqueHashId(array $a, array $fields_to_use, string $prefix = "") {

		$str = $prefix;
	    
	    foreach ($a as $key => $aValue) {

	        // check that expected value exists in the array
	        if (!in_array($key, $fields_to_use)) {
	            continue;
	        }

	        $str .= $aValue;

	    }

	    return md5($str);
	}

	public function dropdownSelectedvalueText($field, $selectedkey) {

		$__selectedkey = "";
		if( !wbc()->common->nonZeroEmpty($selectedkey) ) {
			$__selectedkey = $selectedkey;
		}

		if( isset($field["options"][$__selectedkey]) ) {
			return $field["options"][$__selectedkey];
		}
		else {
			return "";
		}	
	}

	
    public static function array_column($input = null, $columnKey = null, $indexKey = null) { 
        
        $argc = func_num_args();
        $params = func_get_args();
        if ($argc < 2) {
            trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
            return null;
        }
        
        if (!is_array($params[0])) {
            trigger_error(
                'array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given',
                E_USER_WARNING
            );
            return null;
        }
        
        if (!is_int($params[1]) && !is_float($params[1]) && !is_string($params[1]) && $params[1] !== null && !(is_object($params[1]) && method_exists($params[1], '__toString'))) {
            trigger_error('array_column(): '.__('The index key should be either a string or an integer','woo-bundle-choice') , E_USER_WARNING);
            return false;
        }
        
        if (isset($params[2]) && !is_int($params[2]) && !is_float($params[2]) && !is_string($params[2]) && !(is_object($params[2]) && method_exists($params[2], '__toString'))) {
            trigger_error('array_column(): '.__('The index key should be either a string or an integer','woo-bundle-choice') , E_USER_WARNING);
            return false;
        }
        
        $paramsInput = $params[0];
        $paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
        $paramsIndexKey = null;
        if (isset($params[2])) {
            if (is_float($params[2]) || is_int($params[2])) {
                $paramsIndexKey = (int) $params[2];
            }
            else {
                $paramsIndexKey = (string) $params[2];
            }
        }
        
        $resultArray = array();
        foreach ($paramsInput as $row) {
            $key = $value = null;
            $keySet = $valueSet = false;
            if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
                $keySet = true;
                $key = (string) $row[$paramsIndexKey];
            }
            
            if ($paramsColumnKey === null) {
                $valueSet = true;
                $value = $row;
            }
            elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
                $valueSet = true;
                $value = $row[$paramsColumnKey];
            }
            
            if ($valueSet) {
                if ($keySet) {
                    $resultArray[$key] = $value;
                }
                else {
                    $resultArray[] = $value;
                }
            }
        }
        
        return $resultArray;
    }

}
