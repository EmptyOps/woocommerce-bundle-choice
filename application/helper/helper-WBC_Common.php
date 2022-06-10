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

		// ACTIVE_TODO just for the notes that, almost all the logic of this function seems to be deeply implemented for the proper working of the different premium pair builders supported by the earring pendant builder extension, so let keep that in mind while we are getting into the refactoring of those earring pendant builder and other related extensions of category page and item page set 

		// ACTIVE_TODO currently with new upgraded flows we are just using the old category structure, but that need to be revisted and revised deeply while taking in to considerations different facts that as per the old method we are just using the same root diamond category for all apis(for old system if it was about the natural and lab diamond coming from same api like vdb then it was implicit as there was only one API instance being created for fetching any kind of feed from the one particular API but now with the new system that is not true as to fetch different category/feeds the different API instances are created), there are data mapping fields for the lab and gemstone category which we are not sure how much depended on in the old system, there are search layers which works in the old system with this mix of root category, lab category and so on but not sure how this search layers take care of it so just need to revisit that flow make it in sync with data funnel flows of the new updrade from bottom up. -- to h HIGH PRIORITY --	even in old system it works with the two different APIs csv-ftp/csv-ftp-2 being set with two diff categories diamond & lab diamond and it works but that is because there is no category check on the front end category page layers of these two class and so it comes with the side effect that any search event would be excuted twice means for each class and returns results and some how on frontend either the wrong results would be shown or no product found result would be shown on the inactive tab but since that was hidden so that went unnoticed I guess. -- anyway for now we are also temporarily setting the diamond category as main category in both APIs, it is other way around of what is done in older system but it will let the APIs feed layer to be accessed and in this case also it will be two search event and the other will not be noticed on inactive tab but we must fix it asap within 2-3 days otherwise it is massive performance overhead and slowdown the response by a second or so. 
		// 	ACTIVE_TODO and at this point not sure how the default search means without any search filters applied would behave for the sub categories like lab category which route from the filter set tab -> _current_category (_GET) + _category (_GET) -> search filters prepare query -> query execution layers, so this is high priority -- to h HIGH PRIORITY -- when the filter set tab is selected that belongs to some other sub category like the lab category then the filter js layer will pass the _current_category and especially the _category field accordingly and that will take care of it. 
		// 		ACTIVE_TODO and since it is business logic of the application layer, it should not be in the wc helper but think about it if this common helper is right place for it or if it should be moved to some appropriate module -- it seems that the appropriate layer it would be the routing module. so let me work on the definition of the module and then you create the initial prorotype of the class and move such functions there, but yeah we can not change calls system wide so from this common function that rounting functions called -- to s or to d HIGH PRIORITY 
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

	public function pr($ar,$force_debug = false,$die = false) {
		//TODO yet to implement optional arg force_debug

		if( !is_array($ar) )
		{
			echo 'the common helper pr function says the var provided is not an array. skipping.';
			return false;
		}

		echo "<pre>"; print_r($ar); echo "</pre>";

		if( $die )
		{
			wp_die( 'die from the common helper pr function' );
		}

	}

	public function var_dump($v,$force_debug = false,$die = false,$add_br = true) {
		//TODO yet to implement optional arg force_debug

		var_dump($v); 

		if( $add_br )
		{
			echo "<br>";
		}

		if( $die )
		{
			wp_die( 'die from the common helper var_dump function' );
		}

	}

	///////////// 14-05-2022 -- @drashti /////////////
	public function file_get_contents($path, $path_separator = 'woo-bundle-choice', $source_path = null) {
        $file_bits = file_get_contents($path);

        if(empty($file_bits)){
            $tmpA = explode($path_separator, $path);
            $newpath = null;
            if(empty($source_path)){
 				$newpath = constant('EOWBC_DIRECTORY').$tmpA[1];
            }
            else{
            	$newpath = constant($source_path).$tmpA[1];
            }
           
            $fs = fopen ($newpath, 'rb');
            $f_size=filesize ($newpath);
            $file_bits= fread ($fs, $f_size);
            fclose ($fs);
        }
        return $file_bits;
	}
	//////////////////////////////////////////////////


	public function free_memory( &$var ) {
		//TODO do research and implement most appropriate approach, in case, anything is not good

		//	TODO previously in older systems we were relying on null assignment but maybe unset is better, anyway check which is better when we take into consideration garbage collector and so on 
		$var = null;
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

	public function dropdownSelectedvalueText($field, $selectedkey, $inner_key=null) {
		if(!is_array($selectedkey)){
			$__selectedkey = "";
			if( !wbc()->common->nonZeroEmpty($selectedkey) ) {
				$__selectedkey = $selectedkey;
			}

			if( isset($field["options"][$__selectedkey]) && !empty($inner_key) && is_array($field["options"][$__selectedkey]) ) {
				return $field["options"][$__selectedkey][$inner_key];
			}
			else {
				if( isset($field["options"][$__selectedkey]) ) {
					return $field["options"][$__selectedkey];
				}
				else {
					return "";
				}	
			}	

			
		} elseif(!empty($selectedkey)) {
			$__selectedkeys = array();
			foreach ($selectedkey as $key => $value) {
				$__selectedkey = "";	
				if( !wbc()->common->nonZeroEmpty($value) ) {
					$__selectedkey = $value;
				}

				if( isset($field["options"][$__selectedkey]) && is_array($field["options"][$__selectedkey]) ) {
					$__selectedkeys[] = $field["options"][$__selectedkey][$inner_key];
				} else {
					if( isset($field["options"][$__selectedkey]) ) {
						$__selectedkeys[] = $field["options"][$__selectedkey];
					}
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

    public function is_ajax(){
    	return wp_doing_ajax();
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
    
    public function current_theme_key() {
		$stylesheet     = get_stylesheet();
	    $theme_root     = get_theme_root( $stylesheet );
		return basename( $theme_root )."___".basename( $stylesheet );
	}

    public function site_url($slug='', $query_string=''){
    	$url = site_url( $slug );
    	if( !empty($query_string) ) {
    		if( strpos($url, "?") !== FALSE ) {
    			$url .= "&".$query_string;
    		}
    		else {
    			$url .= "?".$query_string;
    		}
    	}
    	return $url;
    }

    public function current_uri(){
    	return $_SERVER['REQUEST_URI'];
    }

    public function current_url(){
    	$pageURL = 'http';
        if(isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

	public function current_theme_key() {
		$stylesheet     = get_stylesheet();
	    $theme_root     = get_theme_root( $stylesheet );
		return basename( $theme_root )."___".basename( $stylesheet );
	}

	private function makeNestedArray($keys, $value, $target_array=null)
    {
	    $var = !is_null($target_array) ? $target_array : array();   
	    $index=array_shift($keys);
	    if (!isset($keys[0]))
        {
	        $var[$index]=$value;
        }
	    else 
        {   
	        $var[$index]= $this->makeNestedArray($keys,$value);            
        }
	    return $var;
    }

	public function arrValuesToNestedArr($arr, $target_value, $target_array=null) { 

		$keys = array_values($arr);		// array('key1', 'key2', 'key3');
		return $this->makeNestedArray($keys,$target_value,$target_array);
	}

	public function array_slice_keys($array, $keys = null) {
	    if ( empty($keys) ) {
	        $keys = array_keys($array);
	    }
	    if ( !is_array($keys) ) {
	        $keys = array($keys);
	    }
	    if ( !is_array($array) ) {
	        return array();
	    } else {
	        return array_intersect_key($array, array_fill_keys($keys, '1'));
	    }
	}

	public function special_characters() {

		return array('"',"'",".","#"," ","%","~","!","@","$","^","&","*","`","(",")","[","]","-","=","+","{","}",":",";","|","/","?","<",">",",",".","`","¢","£","¤","¥","¦","§","¨","©","ª","«","¬","®","ˉ","°","±","²","³","µ","¶","¸","¹","º","»","¼","¼","¾","¿","À","Á","Â","Ã","Ä","Å","Æ","Ç","È","É","Ê","Ë","Ì","Í","Î","Ï","Ð","Ñ","Ò","Ó","Ô","Õ","Ö","×","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß","à","á","â","ã","ä","å","æ","ç","è","é","ê","ë","ì","í","î","ï","ð","ñ","ò","ó","ô","õ","ö","÷","ø","ù","ú","û","ü","ý","þ","ÿ","\\");

	}

	public function key_to_title( $key ) {

		// ACTIVE_TODO implement this function with simple flow like pgTitle of the ci system, so maybe simply copy from there. -- to s 
		// 	ACTIVE_TODO and also create one more function that applies the sanitization and for that use the wordpress sanitized title function they have -- to s 
		return $key;

	}

	public function truncate($str,$limit) {

		if(strlen($str) < $limit)
			return $str;
		else
			return  substr($str,0,$limit)."...";
	}

}

function wbc_pr($ar, $force_debug = false, $die = false) {
		
	return wbc()->common->pr($ar, $force_debug, $die);

}

function wbc_var_dump($v, $force_debug = false,$die = false, $add_br = true) {
		
	return wbc()->common->var_dump($v, $force_debug, $die, $add_br);

}

function wbc_free_memory( &$var ) {
		
	return wbc()->common->free_memory($var);

}

function wbc_consistsOfTheSameValues(array $a, array $b, bool $strict = false) {
	   
   	return wbc()->common->consistsOfTheSameValues($a, $b, $strict);
}

function wbc_nonZeroEmpty(&$var) {

	return wbc()->common->nonZeroEmpty($var);
}

function wbc_createUniqueId() {

	return wbc()->common->createUniqueId();

}

function wbc_stringToKey( $str )
{

	return wbc()->common->stringToKey($str);

}

function wbc_createUniqueHashId(array $a, array $fields_to_use, string $prefix = "") {

	return wbc()->common->createUniqueHashId($a, $fields_to_use, $prefix);

}

function wbc_array_column($input = null, $columnKey = null, $indexKey = null) { 
    
	return wbc()->common->array_column($input, $columnKey, $indexKey);
    
}

function wbc_http_query($param){

	return wbc()->common->http_query($param);

}

function wbc_is_ajax(){

	return wbc()->common->is_ajax();

}

function wbc_is_object($obj){

	return wbc()->common->is_object($obj);

}

function wbc_isEmptyArr($arr){

	return wbc()->common->isEmptyArr($arr);

}

function current_theme_key() {
	
	return wbc()->common->current_theme_key();

}

function wbc_site_url($slug='', $query_string=''){

	return wbc()->common->site_url($slug, $query_string);

}

function wbc_makeNestedArray($keys, $value, $target_array=null)
{

    return wbc()->common->makeNestedArray($keys, $value, $target_array);

}

function wbc_arrValuesToNestedArr($arr, $target_value, $target_array=null) { 

	return wbc()->common->arrValuesToNestedArr($arr, $target_value, $target_array);

}

function wbc_special_characters() {

	return wbc()->common->special_characters();

}

function wbc_key_to_title( $key ) {

	return wbc()->common->key_to_title($key);

}

function truncate($str,$limit) {

	return wbc()->common->truncate($str,$limit);
	
}