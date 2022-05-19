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

	public function get_category($page='product',int $post_id = null,array $in_category=array()){
		$in_category = apply_filters('eoowbc_helper_common_get_category_in_category',$in_category);		
		$page = apply_filters('eoowbc_helper_common_get_category_page',$page);
		$post_id = apply_filters('eoowbc_helper_common_get_category_post_id',$post_id);
		$return_category = '';
		if($page == 'category' ) {
			global $wp_query;
			if(empty($wp_query->get_queried_object()) or !property_exists($wp_query->get_queried_object(),'term_id')) {
				return false;
			}
			if(!empty($in_category) and is_array($in_category)) {
				$term_slug=array_map(array(wbc()->wp,"cat_id2slug"),get_ancestors($wp_query->get_queried_object()->term_id, 'product_cat'));				
				$term_slug[]=$wp_query->get_queried_object()->slug;					
				$matches = array_intersect($in_category,$term_slug);				
				if(!empty($matches) and is_array($matches)){
					$matches = array_values($matches);					
					$return_category = $matches[0];
				} else {
					$return_category = $wp_query->get_queried_object()->slug;
				}
			} else {
				$return_category = $wp_query->get_queried_object()->slug;	
			}			
		} elseif( $page == 'product' and !empty($post_id) and !empty($in_category) and is_array($in_category) ) {
			$post = wbc()->wc->eo_wbc_get_product($post_id);
			$return_category = $this->get_product_category($post, $in_category);
		} else {
			$return_category = false;
		}		

		$return_category = apply_filters('eoowbc_helper_common_get_category_return_category',$return_category);
		return $return_category;
	}

	public function get_product_category($post,$in_category) {
		if(!empty($post) and !empty($in_category) and is_array($in_category)){

			$ancestors = array();
			$ids = $post->get_category_ids();
			if(!empty($ids) and is_array($ids)){
				foreach ($ids as $id) {
					$ancestors = array_merge($ancestors,get_ancestors($id,'product_cat'));	
					$ancestors[] = $id;
				}				
			}
			$term_slug=array_map(array(wbc()->wp,"cat_id2slug"),$ancestors);				

			$matches = array_intersect($in_category,$term_slug);				
			if(!empty($matches) and is_array($matches)){					
				$matches = array_values($matches);
				return $matches[0];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function array_insert_before( $array,$before_key,$key,$value ){
		if(is_array($array) and !empty($array)){
			$new_array = array();
			foreach ($array as $array_key => $array_value) {
				if($array_key==$before_key){
					$new_array[$key] = $value;
				}
				$new_array[$array_key] = $array_value;
			}
			return $new_array;
		} else {
			return array($key=>$value);
		}
	}

	public function pr(array $ar,$force_debug = false,$die = false) {
		//TODO yet to implement optional arg force_debug

		echo "<pre>"; print_r($ar); echo "</pre>";

		if( $die )
		{
			wp_die( 'die from the common helper pr function' );
		}

	}

	public function var_dump($v,$force_debug = false,$die = false) {
		//TODO yet to implement optional arg force_debug

		var_dump($v); 

		if( $die )
		{
			wp_die( 'die from the common helper var_dump function' );
		}

	}
	///////////// 14-05-2022 -- @drashti /////////////
	public function file_get_contents($path, $path_separator = 'woo-bundle-choice') {
        $file_bits = file_get_contents($path);

        if(empty($file_bits)){
            $tmpA = explode($path_separator, $path);
            $newpath = constant('EOWBC_DIRECTORY').$tmpA[1];
            $fs = fopen ($newpath, 'rb');
            $f_size=filesize ($newpath);
            $file_bits= fread ($fs, $f_size);
            fclose ($fs);
        }
        return $file_bits;
	}
	//////////////////////////////////////////////////
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
		if(!is_array($selectedkey)){
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
		} elseif(!empty($selectedkey)) {
			$__selectedkeys = array();
			foreach ($selectedkey as $key => $value) {
				$__selectedkey = "";	
				if( !wbc()->common->nonZeroEmpty($value) ) {
					$__selectedkey = $value;
				}

				if( isset($field["options"][$__selectedkey]) ) {
					$__selectedkeys[] = $field["options"][$__selectedkey];
				}
			}			
			return $__selectedkeys;			
		} else{
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

    public function http_query($param){
    	$param = apply_filters('eowbc_helper_http_query',$param);
    	return http_build_query($param);
    }

    public function is_object($obj){
    	return !empty($obj) && is_object($obj);
    }

    // should move all other such array functions from code igniter helper libs for productivity
    public function isEmptyArr($arr){
    	return empty($arr) || !is_array($arr);
    }

    public function load_fomantic(){
		wp_register_style('eowbc_fomantic_css',constant('EOWBC_ASSET_URL').'css/fomantic/semantic.min.css');
		wp_enqueue_style('eowbc_fomantic_css');
		
		wp_register_script('eowbc_fomantic_js',constant('EOWBC_ASSET_URL').'js/fomantic/semantic.min.js');
		wp_enqueue_script('eowbc_fomantic_js','',array('jquery'),'',true);		
    }

}
