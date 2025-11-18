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

	

	public function get_category($page='product',int $post_id = null,array $in_category=array(), $is_apply_compatibility=false){

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

			$qo_term_id = null;
			$qo_term_slug = null;
			if(empty($wp_query->get_queried_object()) or !property_exists($wp_query->get_queried_object(),'term_id')) {
				
				if($is_apply_compatibility) {

					// NOTE: here this is actualy the ultimate sort to get the category id, but off cource we will need to add whenever required the specific compatibility patches like based on elementor or wpml conditions above this patche in hirarchical if structure to ensure that plateform specific issues like of wpml or elementor is handeled matuarly and using standard api.
					
					$c_res = \eo\wbc\model\SP_WBC_Compatibility::instance()->router_compatability('current_page_category_id');

					if(empty($c_res)) {
					
						return false;
					}
					// $term = wbc()->wc->get_term_by( 'id', $c_res['term_id'], 'product_cat' );

					$qo_term_id = $c_res['term_id'];
					$qo_term_slug = $c_res['slug'];

				} else {

					return false;
				}
			} else {

				$qo_term_id = $wp_query->get_queried_object()->term_id;
				$qo_term_slug = $wp_query->get_queried_object()->slug;
			}

			if(!empty($in_category) and is_array($in_category)) {
				$term_slug=array_map(array(wbc()->wp,"cat_id2slug"),get_ancestors($qo_term_id/*$wp_query->get_queried_object()->term_id*/, 'product_cat'));				
				$term_slug[]=$qo_term_slug/*$wp_query->get_queried_object()->slug*/;					
				$matches = array_intersect($in_category,$term_slug);				
				if(!empty($matches) and is_array($matches)){
					$matches = array_values($matches);					
					$return_category = $matches[0];
				} else {
					$return_category = $qo_term_slug/*$wp_query->get_queried_object()->slug*/;
				}
			} else {
				$return_category = $qo_term_slug/*$wp_query->get_queried_object()->slug*/;	
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

	public function get_product_category($post,$in_category,$is_ids = false) {
		if(!empty($post) and !empty($in_category) and is_array($in_category)){

			$ancestors = array();
			$ids = $post->get_category_ids();
			if(!empty($ids) and is_array($ids)){
				foreach ($ids as $id) {
					$ancestors = array_merge($ancestors,get_ancestors($id,'product_cat'));	
					$ancestors[] = $id;
				}				
			}

			if($is_ids){
				$matches = array_intersect($in_category,$ancestors);				
				if(!empty($matches) and is_array($matches)){	

					$matches = array_values($matches);
					return $matches[0];
				} else {
					return false;
				}
			}else{

				$term_slug=array_map(array(wbc()->wp,"cat_id2slug"),$ancestors);	
				$matches = array_intersect($in_category,$term_slug);				
				if(!empty($matches) and is_array($matches)){

					$matches = array_values($matches);
					return $matches[0];
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}

	public function is_product_under_category($product,$in_category = null,$in_category_array = null) {

		if (!empty($in_category)) {

			if(has_term($in_category,'product_cat',$product->get_id())){

				return true;
			} else {
				
				return !empty($this->get_product_category($product,array($in_category),true))? true : false;
			}
		} else {

			//return $this->get_product_category($product,$in_category);
		}
	}

	public function array_insert_before( $array,$before_key,$key,$value,$is_after = false ){
		if(is_array($array) and !empty($array)){
			$new_array = array();
			foreach ($array as $array_key => $array_value) {
				if(!$is_after && $array_key==$before_key){
					$new_array[$key] = $value;
				}
				$new_array[$array_key] = $array_value;

				if( $is_after && $array_key == $before_key ) {

	                $new_array[$key] = $value; 
	            }
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
			if(is_object($ar)) {

				echo "<pre>";
			}

			// echo 'the common helper pr function says the var provided is not an array. still var dumping.<br><br>';
			$this->var_dump($ar,$force_debug,$die);

			if(is_object($ar)) {

				echo "</pre>";
			}

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

    public function admin_url($path=''){

    	return admin_url( $path );
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

	// public function current_theme_key() {
	// 	$stylesheet     = get_stylesheet();
	//     $theme_root     = get_theme_root( $stylesheet );
	// 	return basename( $theme_root )."___".basename( $stylesheet );
	// }

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
	
	public function array_slice_keys_second_dimension($array, $keys = null) {
	    if (empty($keys)) {
	        return $array;
	    }
	    if (!is_array($keys)) {
	        $keys = array($keys);
	    }
	    if (!is_array($array)) {
	        return array();
	    }

	    $result = array();

	    foreach ($array as $key => $subArray) {
	        if (is_array($subArray)) {
	            $result[$key] = array_intersect_key($subArray, array_fill_keys($keys, '1'));
	        } else {
	            $result[$key] = $subArray;
	        }
	    }

	    return $result;
	}


	public function special_characters() {

		return array('"',"'",".","#"," ","%","~","!","@","$","^","&","*","`","(",")","[","]","-","=","+","{","}",":",";","|","/","?","<",">",",",".","`","¢","£","¤","¥","¦","§","¨","©","ª","«","¬","®","ˉ","°","±","²","³","µ","¶","¸","¹","º","»","¼","¼","¾","¿","À","Á","Â","Ã","Ä","Å","Æ","Ç","È","É","Ê","Ë","Ì","Í","Î","Ï","Ð","Ñ","Ò","Ó","Ô","Õ","Ö","×","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß","à","á","â","ã","ä","å","æ","ç","è","é","ê","ë","ì","í","î","ï","ð","ñ","ò","ó","ô","õ","ö","÷","ø","ù","ú","û","ü","ý","þ","ÿ","\\");

	}

	public function key_to_title( $key, $is_basic_conversion = false ) {

		// ACTIVE_TODO implement this function with simple flow like pgTitle of the ci system, so maybe simply copy from there. -- to s 
		// 	ACTIVE_TODO and also create one more function that applies the sanitization and for that use the wordpress sanitized title function they have -- to s 

		if( $is_basic_conversion ) {

			$key = ucwords( str_replace(array('_', '-'), ' ', $key) );
		}

		return $key;

	}

	public function truncate($str,$limit) {

		if(strlen($str) < $limit)
			return $str;
		else
			return  substr($str,0,$limit)."...";
	}

	public function is_mobile() {

		return  wp_is_mobile();
	}

	public function get_current_url() {

	    global $wp;  
		return home_url(add_query_arg(array($_GET), $wp->request));
	}

	// NOTE: basically it is wp_is_mobile. but conditionally it overrides the default behaviour by adding condition  based on page or section and so on keys.  
		// NOTE: however it is critical note that in normal scenarios override is not supposed to be used at all. but it is only in some exceptional scenarios and that is even only for the temporary period.  
	public function is_mobile_by_page_sections($key = null, $is_other_theme = false) {

		if (wp_is_mobile()) {

			$theme_key = wbc()->common->current_theme_key();

			if ($theme_key == 'themes___purple_theme' or $is_other_theme) {

				if (is_admin()) {
					
					return true;
				}

				if ($key == 'loop') {

					return false;

				} elseif ($key == 'loop_content') {

					return false;

				} elseif ($key == 'cat_shop_page') {

					return false;

				} elseif ($key == 'header') {

					return false;

				} elseif ($key == 'footer') {

					return false;

				} elseif ($key == 'home') {

					return false;

				} elseif ($key == 'product_page') {

					return false;

				} elseif ($key == 'cart') {

					return false;

				} elseif ($key == 'ring_size') {

					return false;

				} elseif ($key == 'product_page_explainer_widgets') {

					return false;

				} elseif ($key == 'product_page_inspection_button') {

					return false;

				} else {

					return true;
				}

			} else {

				if ($key == 'loop_content') {

					return false;

				} else{

					return true;
				}
			}

		} else {

			return false;
		}   
	}


	// reference: https://gist.github.com/Billy-/bc6865066981e80e097f
	public function in_array_r($needle, $haystack, $strict = false) {

	    foreach ($haystack as $item) {

	        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {

	            return true;
	        }
	    }

	    return false;
	}
	
	public function placeholder_img_src() {

		return wc_placeholder_img_src();
	}

	public function countries_list($is_label_as_key = false /*this paramete is only for supporting backward compatability, never use this on newer versions means on any new code*/) {
		
		if( $is_label_as_key ) {
			
			$countries_list = array(''=>__('--- Please Select ---', 'woo-bundle-choice'),
	           'Afghanistan' => __('Afghanistan', 'woo-bundle-choice'),
	           'Aland Islands' => __('Aland Islands', 'woo-bundle-choice'),
	           'Albania' => __('Albania', 'woo-bundle-choice'),
	           'Alggeria' => __('Albania', 'woo-bundle-choice'),
	           'American Samoa' => __('American Samoa', 'woo-bundle-choice'),
	           'Andorra' => __('Andorra', 'woo-bundle-choice'),
	           'Angola' => __('Angola', 'woo-bundle-choice'),
	           'Anguilla' => __('Anguilla', 'woo-bundle-choice'),
	           'Antarctica' => __('Antarctica', 'woo-bundle-choice'),
	           'Antigua and Barbuda' => __('Antigua and Barbuda', 'woo-bundle-choice'),
	           'Argentina' => __('Argentina', 'woo-bundle-choice'),
	           'Armenia' => __('Armenia', 'woo-bundle-choice'),
	           'Aruba' => __('Aruba', 'woo-bundle-choice'),
	           'Austraoptiona' => __('Austraoptiona', 'woo-bundle-choice'),
	           'Austria' => __('Austraoptiona', 'woo-bundle-choice'),
	           'Azerbaijan' => __('Azerbaijan', 'woo-bundle-choice'),
	           'Bahamas' => __('Bahamas', 'woo-bundle-choice'),
	           'Bahrain' => __('Bahrain', 'woo-bundle-choice'),
	           'Bangladesh' => __('Bangladesh', 'woo-bundle-choice'),
	           'Barbados' => __('Barbados', 'woo-bundle-choice'),
	           'Belarus' => __('Belarus', 'woo-bundle-choice'),
	           'Belau' => __('Belau', 'woo-bundle-choice'),
	           'Belggium' => __('Belggium', 'woo-bundle-choice'),
	           'Beoptionze' => __('Beoptionze', 'woo-bundle-choice'),
	           'Benin' => __('Benin', 'woo-bundle-choice'),
	           'Bermuda' => __('Bermuda', 'woo-bundle-choice'),
	           'Bhutan' => __('Bhutan', 'woo-bundle-choice'),
	           'Booptionvia' => __('Booptionvia', 'woo-bundle-choice'),
	           'Bonaire, Saint Eustatius and Saba' => __('Bonaire, Saint Eustatius and Saba', 'woo-bundle-choice'),
	           'Bosnia and Herzegovina' => __('Bosnia and Herzegovina', 'woo-bundle-choice'),
	           'Botswana' => __('Botswana', 'woo-bundle-choice'),
	           'Bouvet Island' => __('Bouvet Island', 'woo-bundle-choice'),
	           'Brazil' => __('Brazil', 'woo-bundle-choice'),
	           'British Indian Ocean Territory' => __('British Indian Ocean Territory', 'woo-bundle-choice'),
	           'Brunei' => __('Brunei', 'woo-bundle-choice'),
	           'Bulggaria' => __('Bulggaria', 'woo-bundle-choice'),
	           'Burkina Faso' => __('Burkina Faso', 'woo-bundle-choice'),
	           'Burundi' => __('Burundi', 'woo-bundle-choice'),
	           'Cambodia' => __('Cambodia', 'woo-bundle-choice'),
	           'Cameroon' => __('Cameroon', 'woo-bundle-choice'),
	           'Canada' => __('Canada', 'woo-bundle-choice'),
	           'Cape Verde' => __('Cape Verde', 'woo-bundle-choice'),
	           'Cayman Islands' => __('Cayman Islands', 'woo-bundle-choice'),
	           'Central African Repuboptionc' => __('Central African Repuboptionc', 'woo-bundle-choice'),
	           'Chad' => __('Chad', 'woo-bundle-choice'),
	           'Chile' => __('Chile', 'woo-bundle-choice'),
	           'China' => __('China', 'woo-bundle-choice'),
	           'Christmas Island' => __('Christmas Island', 'woo-bundle-choice'),
	           'Cocos (Keeoptionng) Islands' => __('Cocos (Keeoptionng) Islands', 'woo-bundle-choice'),
	           'Colombia' => __('Colombia', 'woo-bundle-choice'),
	           'Comoros' => __('Comoros', 'woo-bundle-choice'),
	           'Congo (Brazzaville)' => __('Congo (Brazzaville)', 'woo-bundle-choice'),
	           'Congo (Kinshasa)' => __('Congo (Kinshasa)', 'woo-bundle-choice'),
	           'Cook Islands' => __('Cook Islands', 'woo-bundle-choice'),
	           'Costa Rica' => __('Costa Rica', 'woo-bundle-choice'),
	           'Croatia' => __('Croatia', 'woo-bundle-choice'),
	           'Cuba' => __('Cuba', 'woo-bundle-choice'),
	           'CuraÃ§ao' => __('CuraÃ§ao', 'woo-bundle-choice'),
	           'Cyprus' => __('Cyprus', 'woo-bundle-choice'),
	           'Czech Repuboptionc' => __('Czech Repuboptionc', 'woo-bundle-choice'),
	           'Denmark' => __('Denmark', 'woo-bundle-choice'),
	           'Djibouti' => __('Djibouti', 'woo-bundle-choice'),
	           'Dominica' => __('Dominica', 'woo-bundle-choice'),
	           'Dominican Repuboptionc' => __('Dominican Repuboptionc', 'woo-bundle-choice'),
	           'Ecuador' => __('Ecuador', 'woo-bundle-choice'),
	           'Egypt' => __('Egypt', 'woo-bundle-choice'),
	           'El Salvador' => __('El Salvador', 'woo-bundle-choice'),
	           'Equatorial Guinea' => __('Equatorial Guinea', 'woo-bundle-choice'),
	           'Eritrea' => __('Eritrea', 'woo-bundle-choice'),
	           'Estonia' => __('Estonia', 'woo-bundle-choice'),
	           'Ethiopia' => __('Ethiopia', 'woo-bundle-choice'),
	           'Falkland Islands' => __('Falkland Islands', 'woo-bundle-choice'),
	           'Faroe Islands' => __('Faroe Islands', 'woo-bundle-choice'),
	           'Fiji' => __('Fiji', 'woo-bundle-choice'),
	           'Finland' => __('Finland', 'woo-bundle-choice'),
	           'France' => __('France', 'woo-bundle-choice'),
	           'French Guiana' => __('French Guiana', 'woo-bundle-choice'),
	           'French Polynesia' => __('French Polynesia', 'woo-bundle-choice'),
	           'French Southern Territories' => __('French Southern Territories', 'woo-bundle-choice'),
	           'Gabon' => __('Gabon', 'woo-bundle-choice'),
	           'Gambia' => __('Gambia', 'woo-bundle-choice'),
	           'Georgia' => __('Georgia', 'woo-bundle-choice'),
	           'Germany' => __('Germany', 'woo-bundle-choice'),
	           'Ghana' => __('Ghana', 'woo-bundle-choice'),
	           'Gibraltar' => __('Gibraltar', 'woo-bundle-choice'),
	           'Greece' => __('Greece', 'woo-bundle-choice'),
	           'Greenland' => __('Greenland', 'woo-bundle-choice'),
	           'Grenada' => __('Grenada', 'woo-bundle-choice'),
	           'Guadeloupe' => __('Guadeloupe', 'woo-bundle-choice'),
	           'Guam' => __('Guam', 'woo-bundle-choice'),
	           'Guatemala' => __('Guatemala', 'woo-bundle-choice'),
	           'Guernsey' => __('Guernsey', 'woo-bundle-choice'),
	           'Guinea' => __('Guinea', 'woo-bundle-choice'),
	           'GuineaBissau' => __('GuineaBissau', 'woo-bundle-choice'),
	           'Guyana' => __('Guyana', 'woo-bundle-choice'),
	           'Haiti' => __('Haiti', 'woo-bundle-choice'),
	           'Heard Island and McDonald Islands' => __('Heard Island and McDonald Islands', 'woo-bundle-choice'),
	           'Honduras' => __('Honduras', 'woo-bundle-choice'),
	           'Hong Kong' => __('Hong Kong', 'woo-bundle-choice'),
	           'Hungary' => __('Hungary', 'woo-bundle-choice'),
	           'Iceland' => __('Iceland', 'woo-bundle-choice'),
	           'India' => __('India', 'woo-bundle-choice'),
	           'Indonesia' => __('Indonesia', 'woo-bundle-choice'),
	           'Iran' => __('Iran', 'woo-bundle-choice'),
	           'Iraq' => __('Iraq', 'woo-bundle-choice'),
	           'Ireland' => __('Ireland', 'woo-bundle-choice'),
	           'Isle of Man' => __('Isle of Man', 'woo-bundle-choice'),
	           'Israel' => __('Israel', 'woo-bundle-choice'),
	           'Italy' => __('Italy', 'woo-bundle-choice'),
	           'Ivory Coast' => __('Ivory Coast', 'woo-bundle-choice'),
	           'Jamaica' => __('Jamaica', 'woo-bundle-choice'),
	           'Japan' => __('Japan', 'woo-bundle-choice'),
	           'Jersey' => __('Jersey', 'woo-bundle-choice'),
	           'Jordan' => __('Jordan', 'woo-bundle-choice'),
	           'Kazakhstan' => __('Kazakhstan', 'woo-bundle-choice'),
	           'Kenya' => __('Kenya', 'woo-bundle-choice'),
	           'Kiribati' => __('Kiribati', 'woo-bundle-choice'),
	           'Kuwait' => __('Kuwait', 'woo-bundle-choice'),
	           'Kyrgyzstan' => __('Kyrgyzstan', 'woo-bundle-choice'),
	           'Laos' => __('Laos', 'woo-bundle-choice'),
	           'Latvia' => __('Latvia', 'woo-bundle-choice'),
	           'Lebanon' => __('Lebanon', 'woo-bundle-choice'),
	           'Lesotho' => __('Lesotho', 'woo-bundle-choice'),
	           'optionberia' => __('optionberia', 'woo-bundle-choice'),
	           'optionbya' => __('optionbya', 'woo-bundle-choice'),
	           'optionechtenstein' => __('optionechtenstein', 'woo-bundle-choice'),
	           'optionthuania' => __('optionthuania', 'woo-bundle-choice'),
	           'Luxembourg' => __('Luxembourg', 'woo-bundle-choice'),
	           'Macao' => __('Macao', 'woo-bundle-choice'),
	           'Madagascar' => __('Madagascar', 'woo-bundle-choice'),
	           'Malawi' => __('Malawi', 'woo-bundle-choice'),
	           'Malaysia' => __('Malaysia', 'woo-bundle-choice'),
	           'Maldives' => __('Maldives', 'woo-bundle-choice'),
	           'Maoption' => __('Maoption', 'woo-bundle-choice'),
	           'Malta' => __('Malta', 'woo-bundle-choice'),
	           'Marshall Islands' => __('Marshall Islands', 'woo-bundle-choice'),
	           'Martinique' => __('Martinique', 'woo-bundle-choice'),
	           'Mauritania' => __('Mauritania', 'woo-bundle-choice'),
	           'Mauritius' => __('Mauritius', 'woo-bundle-choice'),
	           'Mayotte' => __('Mayotte', 'woo-bundle-choice'),
	           'Mexico' => __('Mexico', 'woo-bundle-choice'),
	           'Micronesia' => __('Micronesia', 'woo-bundle-choice'),
	           'Moldova' => __('Moldova', 'woo-bundle-choice'),
	           'Monaco' => __('Monaco', 'woo-bundle-choice'),
	           'Mongooptiona' => __('Mongooptiona', 'woo-bundle-choice'),
	           'Montenegro' => __('Montenegro', 'woo-bundle-choice'),
	           'Montserrat' => __('Montserrat', 'woo-bundle-choice'),
	           'Morocco' => __('Morocco', 'woo-bundle-choice'),
	           'Mozambique' => __('Mozambique', 'woo-bundle-choice'),
	           'Myanmar' => __('Myanmar', 'woo-bundle-choice'),
	           'Namibia' => __('Namibia', 'woo-bundle-choice'),
	           'Nauru' => __('Nauru', 'woo-bundle-choice'),
	           'Nepal' => __('Nepal', 'woo-bundle-choice'),
	           'Netherlands' => __('Netherlands', 'woo-bundle-choice'),
	           'New Caledonia' => __('New Caledonia', 'woo-bundle-choice'),
	           'New Zealand' => __('New Zealand', 'woo-bundle-choice'),
	           'Nicaragua' => __('Nicaragua', 'woo-bundle-choice'),
	           'Niger' => __('Niger', 'woo-bundle-choice'),
	           'Nigeria' => __('Nigeria', 'woo-bundle-choice'),
	           'Niue' => __('Niue', 'woo-bundle-choice'),
	           'Norfolk Island' => __('Norfolk Island', 'woo-bundle-choice'),
	           'North Korea' => __('North Korea', 'woo-bundle-choice'),
	           'North Macedonia' => __('North Macedonia', 'woo-bundle-choice'),
	           'Northern Mariana Islands' => __('Northern Mariana Islands', 'woo-bundle-choice'),
	           'Norway' => __('Norway', 'woo-bundle-choice'),
	           'Oman' => __('Oman', 'woo-bundle-choice'),
	           'Pakistan' => __('Pakistan', 'woo-bundle-choice'),
	           'Palestinian Territory' => __('Palestinian Territory', 'woo-bundle-choice'),
	           'Panama' => __('Panama', 'woo-bundle-choice'),
	           'Papua New Guinea' => __('Papua New Guinea', 'woo-bundle-choice'),
	           'Paraguay' => __('Paraguay', 'woo-bundle-choice'),
	           'Peru' => __('Peru', 'woo-bundle-choice'),
	           'Phioptionppines' => __('Phioptionppines', 'woo-bundle-choice'),
	           'Pitcairn' => __('Pitcairn', 'woo-bundle-choice'),
	           'Poland' => __('Poland', 'woo-bundle-choice'),
	           'Portugal' => __('Portugal', 'woo-bundle-choice'),
	           'Puerto Rico' => __('Puerto Rico', 'woo-bundle-choice'),
	           'Qatar' => __('Qatar', 'woo-bundle-choice'),
	           'Reunion' => __('Reunion', 'woo-bundle-choice'),
	           'Romania' => __('Romania', 'woo-bundle-choice'),
	           'Russia' => __('Russia', 'woo-bundle-choice'),
	           'Rwanda' => __('Rwanda', 'woo-bundle-choice'),
	           'SÃ£o TomÃ© and PrÃ­ncipe' => __('SÃ£o TomÃ© and PrÃ­ncipe', 'woo-bundle-choice'),
	           'Saint BarthÃ©lemy' => __('Saint BarthÃ©lemy', 'woo-bundle-choice'),
	           'Saint Helena' => __('Saint Helena', 'woo-bundle-choice'),
	           'Saint Kitts and Nevis' => __('Saint Kitts and Nevis', 'woo-bundle-choice'),
	           'Saint Lucia' => __('Saint Lucia', 'woo-bundle-choice'),
	           'Saint Martin (Dutch part)' => __('Saint Martin (Dutch part)', 'woo-bundle-choice'),
	           'Saint Martin (French part)' => __('Saint Martin (French part)', 'woo-bundle-choice'),
	           'Saint Pierre and Miquelon' => __('Saint Pierre and Miquelon', 'woo-bundle-choice'),
	           'Saint Vincent and the Grenadines' => __('Saint Vincent and the Grenadines', 'woo-bundle-choice'),
	           'Samoa' => __('Samoa', 'woo-bundle-choice'),
	           'San Marino' => __('San Marino', 'woo-bundle-choice'),
	           'Saudi Arabia' => __('Saudi Arabia', 'woo-bundle-choice'),
	           'Senegal' => __('Senegal', 'woo-bundle-choice'),
	           'Serbia' => __('Serbia', 'woo-bundle-choice'),
	           'Seychelles' => __('Seychelles', 'woo-bundle-choice'),
	           'Sierra Leone' => __('Sierra Leone', 'woo-bundle-choice'),
	           'Singapore' => __('Singapore', 'woo-bundle-choice'),
	           'Slovakia' => __('Slovakia', 'woo-bundle-choice'),
	           'Slovenia' => __('Slovenia', 'woo-bundle-choice'),
	           'Solomon Islands' => __('Solomon Islands', 'woo-bundle-choice'),
	           'Somaoptiona' => __('Somaoptiona', 'woo-bundle-choice'),
	           'South Africa' => __('South Africa', 'woo-bundle-choice'),
	           'South Georgia/Sandwich Islands' => __('South Georgia/Sandwich Islands', 'woo-bundle-choice'),
	           'South Korea' => __('South Korea', 'woo-bundle-choice'),
	           'South Sudan' => __('South Sudan', 'woo-bundle-choice'),
	           'Spain' => __('Spain', 'woo-bundle-choice'),
	           'Sri Lanka' => __('Sri Lanka', 'woo-bundle-choice'),
	           'Sudan' => __('Sudan', 'woo-bundle-choice'),
	           'Suriname' => __('Suriname', 'woo-bundle-choice'),
	           'Svalbard and Jan Mayen' => __('Svalbard and Jan Mayen', 'woo-bundle-choice'),
	           'Swaziland' => __('Swaziland', 'woo-bundle-choice'),
	           'Sweden' => __('Sweden', 'woo-bundle-choice'),
	           'Switzerland' => __('Switzerland', 'woo-bundle-choice'),
	           'Syria' => __('Syria', 'woo-bundle-choice'),
	           'Taiwan' => __('Taiwan', 'woo-bundle-choice'),
	           'Tajikistan' => __('Tajikistan', 'woo-bundle-choice'),
	           'Tanzania' => __('Tanzania', 'woo-bundle-choice'),
	           'Thailand' => __('Thailand', 'woo-bundle-choice'),
	           'TimorLeste' => __('TimorLeste', 'woo-bundle-choice'),
	           'Togo' => __('Togo', 'woo-bundle-choice'),
	           'Tokelau' => __('Tokelau', 'woo-bundle-choice'),
	           'Tonga' => __('Tonga', 'woo-bundle-choice'),
	           'Trinvaluead and Tobago' => __('Trinvaluead and Tobago', 'woo-bundle-choice'),
	           'Tunisia' => __('Tunisia', 'woo-bundle-choice'),
	           'Turkey' => __('Turkey', 'woo-bundle-choice'),
	           'Turkmenistan' => __('Turkmenistan', 'woo-bundle-choice'),
	           'Turks and Caicos Islands' => __('Turks and Caicos Islands', 'woo-bundle-choice'),
	           'Tuvalu' => __('Tuvalu', 'woo-bundle-choice'),
	           'Uganda' => __('Uganda', 'woo-bundle-choice'),
	           'Ukraine' => __('Ukraine', 'woo-bundle-choice'),
	           'United Arab Emirates' => __('United Arab Emirates', 'woo-bundle-choice'),
	           'United Kingdom (UK)' => __('United Kingdom (UK)', 'woo-bundle-choice'),
	           'United States (US)' => __('United States (US)', 'woo-bundle-choice'),
	           'United States (US) Minor Outlying Islands' => __('United States (US) Minor Outlying Islands', 'woo-bundle-choice'),
	           'Uruguay' => __('Uruguay', 'woo-bundle-choice'),
	           'Uzbekistan' => __('Uzbekistan', 'woo-bundle-choice'),
	           'Vanuatu' => __('Vanuatu', 'woo-bundle-choice'),
	           'Vatican' => __('Vatican', 'woo-bundle-choice'),
	           'Venezuela' => __('Venezuela', 'woo-bundle-choice'),
	           'Vietnam' => __('Vietnam', 'woo-bundle-choice'),
	           'Virgin Islands (British)' => __('Virgin Islands (British)', 'woo-bundle-choice'),
	           'Virgin Islands (US)' => __('Virgin Islands (US)', 'woo-bundle-choice'),
	           'Waloptions and Futuna' => __('Waloptions and Futuna', 'woo-bundle-choice'),
	           'Western Sahara' => __('Western Sahara', 'woo-bundle-choice'),
	           'Yemen' => __('Yemen', 'woo-bundle-choice'),
	           'Zambia' => __('Zambia', 'woo-bundle-choice'),
	           'Zimbabwe' => __('Zimbabwe', 'woo-bundle-choice'),
	        );

		} else {

			$countries_list = array(''=>__('-- Please Select --', 'woo-bundle-choice'),
				'AF'	=>	__('Afghanistan', 'woo-bundle-choice'),
				'AL'	=>	__('Albania', 'woo-bundle-choice'),
				'DZ'	=>	__('Alggeria', 'woo-bundle-choice'),
				'AS'	=>	__('American Samoa', 'woo-bundle-choice'),
				'AD'	=>	__('Andorra', 'woo-bundle-choice'),
				'AO'	=>	__('Angola', 'woo-bundle-choice'),
				'AI'	=>	__('Anguilla', 'woo-bundle-choice'),
				'AQ'	=>	__('Antarctica', 'woo-bundle-choice'),
				'AG'	=>	__('Antigua and Barbuda', 'woo-bundle-choice'),
				'AR'	=>	__('Argentina', 'woo-bundle-choice'),
				'AM'	=>	__('Armenia', 'woo-bundle-choice'),
				'AW'	=>	__('Aruba', 'woo-bundle-choice'),
				'AU'	=>	__('Australia', 'woo-bundle-choice'),
				'AT'	=>	__('Austria', 'woo-bundle-choice'),
				'AZ'	=>	__('Azerbaijan', 'woo-bundle-choice'),
				'BS'	=>	__('Bahamas (the)', 'woo-bundle-choice'),
				'BH'	=>	__('Bahrain', 'woo-bundle-choice'),
				'BD'	=>	__('Bangladesh', 'woo-bundle-choice'),
				'BB'	=>	__('Barbados', 'woo-bundle-choice'),
				'BY'	=>	__('Belarus', 'woo-bundle-choice'),
				'BE'	=>	__('Belggium', 'woo-bundle-choice'),
				'BZ'	=>	__('Belize', 'woo-bundle-choice'),
				'BJ'	=>	__('Benin', 'woo-bundle-choice'),
				'BM'	=>	__('Bermuda', 'woo-bundle-choice'),
				'BT'	=>	__('Bhutan', 'woo-bundle-choice'),
				'BO'	=>	__('Bolivia (Plurinational State of)', 'woo-bundle-choice'),
				'BQ'	=>	__('Bonaire, Sint Eustatius and Saba', 'woo-bundle-choice'),
				'BA'	=>	__('Bosnia and Herzegovina', 'woo-bundle-choice'),
				'BW'	=>	__('Botswana', 'woo-bundle-choice'),
				'BV'	=>	__('Bouvet Island', 'woo-bundle-choice'),
				'BR'	=>	__('Brazil', 'woo-bundle-choice'),
				'IO'	=>	__('British Indian Ocean Territory (the)', 'woo-bundle-choice'),
				'BN'	=>	__('Brunei Darussalam', 'woo-bundle-choice'),
				'BG'	=>	__('Bulggaria', 'woo-bundle-choice'),
				'BF'	=>	__('Burkina Faso', 'woo-bundle-choice'),
				'BI'	=>	__('Burundi', 'woo-bundle-choice'),
				'CV'	=>	__('Cabo Verde', 'woo-bundle-choice'),
				'KH'	=>	__('Cambodia', 'woo-bundle-choice'),
				'CM'	=>	__('Cameroon', 'woo-bundle-choice'),
				'CA'	=>	__('Canada', 'woo-bundle-choice'),
				'KY'	=>	__('Cayman Islands (the)', 'woo-bundle-choice'),
				'CF'	=>	__('Central African Republic (the)', 'woo-bundle-choice'),
				'TD'	=>	__('Chad', 'woo-bundle-choice'),
				'CL'	=>	__('Chile', 'woo-bundle-choice'),
				'CN'	=>	__('China', 'woo-bundle-choice'),
				'CX'	=>	__('Christmas Island', 'woo-bundle-choice'),
				'CC'	=>	__('Cocos (Keeling) Islands (the)', 'woo-bundle-choice'),
				'CO'	=>	__('Colombia', 'woo-bundle-choice'),
				'KM'	=>	__('Comoros (the)', 'woo-bundle-choice'),
				'CD'	=>	__('Congo (the Democratic Republic of the)', 'woo-bundle-choice'),
				'CG'	=>	__('Congo (the)', 'woo-bundle-choice'),
				'CK'	=>	__('Cook Islands (the)', 'woo-bundle-choice'),
				'CR'	=>	__('Costa Rica', 'woo-bundle-choice'),
				'HR'	=>	__('Croatia', 'woo-bundle-choice'),
				'CU'	=>	__('Cuba', 'woo-bundle-choice'),
				'CW'	=>	__('Curaçao', 'woo-bundle-choice'),
				'CY'	=>	__('Cyprus', 'woo-bundle-choice'),
				'CZ'	=>	__('Czechia', 'woo-bundle-choice'),
				'CI'	=>	__('Côte d\'Ivoire', 'woo-bundle-choice'),
				'DK'	=>	__('Denmark', 'woo-bundle-choice'),
				'DJ'	=>	__('Djibouti', 'woo-bundle-choice'),
				'DM'	=>	__('Dominica', 'woo-bundle-choice'),
				'DO'	=>	__('Dominican Republic (the)', 'woo-bundle-choice'),
				'EC'	=>	__('Ecuador', 'woo-bundle-choice'),
				'EG'	=>	__('Egypt', 'woo-bundle-choice'),
				'SV'	=>	__('El Salvador', 'woo-bundle-choice'),
				'GQ'	=>	__('Equatorial Guinea', 'woo-bundle-choice'),
				'ER'	=>	__('Eritrea', 'woo-bundle-choice'),
				'EE'	=>	__('Estonia', 'woo-bundle-choice'),
				'SZ'	=>	__('Eswatini', 'woo-bundle-choice'),
				'ET'	=>	__('Ethiopia', 'woo-bundle-choice'),
				'FK'	=>	__('Falkland Islands (the) [Malvinas]', 'woo-bundle-choice'),
				'FO'	=>	__('Faroe Islands (the)', 'woo-bundle-choice'),
				'FJ'	=>	__('Fiji', 'woo-bundle-choice'),
				'FI'	=>	__('Finland', 'woo-bundle-choice'),
				'FR'	=>	__('France', 'woo-bundle-choice'),
				'GF'	=>	__('French Guiana', 'woo-bundle-choice'),
				'PF'	=>	__('French Polynesia', 'woo-bundle-choice'),
				'TF'	=>	__('French Southern Territories (the)', 'woo-bundle-choice'),
				'GA'	=>	__('Gabon', 'woo-bundle-choice'),
				'GM'	=>	__('Gambia (the)', 'woo-bundle-choice'),
				'GE'	=>	__('Georgia', 'woo-bundle-choice'),
				'DE'	=>	__('Germany', 'woo-bundle-choice'),
				'GH'	=>	__('Ghana', 'woo-bundle-choice'),
				'GI'	=>	__('Gibraltar', 'woo-bundle-choice'),
				'GR'	=>	__('Greece', 'woo-bundle-choice'),
				'GL'	=>	__('Greenland', 'woo-bundle-choice'),
				'GD'	=>	__('Grenada', 'woo-bundle-choice'),
				'GP'	=>	__('Guadeloupe', 'woo-bundle-choice'),
				'GU'	=>	__('Guam', 'woo-bundle-choice'),
				'GT'	=>	__('Guatemala', 'woo-bundle-choice'),
				'GG'	=>	__('Guernsey', 'woo-bundle-choice'),
				'GN'	=>	__('Guinea', 'woo-bundle-choice'),
				'GW'	=>	__('Guinea-Bissau', 'woo-bundle-choice'),
				'GY'	=>	__('Guyana', 'woo-bundle-choice'),
				'HT'	=>	__('Haiti', 'woo-bundle-choice'),
				'HM'	=>	__('Heard Island and McDonald Islands', 'woo-bundle-choice'),
				'VA'	=>	__('Holy See (the)', 'woo-bundle-choice'),
				'HN'	=>	__('Honduras', 'woo-bundle-choice'),
				'HK'	=>	__('Hong Kong', 'woo-bundle-choice'),
				'HU'	=>	__('Hungary', 'woo-bundle-choice'),
				'IS'	=>	__('Iceland', 'woo-bundle-choice'),
				'IN'	=>	__('India', 'woo-bundle-choice'),
				'ID'	=>	__('Indonesia', 'woo-bundle-choice'),
				'IR'	=>	__('Iran (Islamic Republic of)', 'woo-bundle-choice'),
				'IQ'	=>	__('Iraq', 'woo-bundle-choice'),
				'IE'	=>	__('Ireland', 'woo-bundle-choice'),
				'IM'	=>	__('Isle of Man', 'woo-bundle-choice'),
				'IL'	=>	__('Israel', 'woo-bundle-choice'),
				'IT'	=>	__('Italy', 'woo-bundle-choice'),
				'JM'	=>	__('Jamaica', 'woo-bundle-choice'),
				'JP'	=>	__('Japan', 'woo-bundle-choice'),
				'JE'	=>	__('Jersey', 'woo-bundle-choice'),
				'JO'	=>	__('Jordan', 'woo-bundle-choice'),
				'KZ'	=>	__('Kazakhstan', 'woo-bundle-choice'),
				'KE'	=>	__('Kenya', 'woo-bundle-choice'),
				'KI'	=>	__('Kiribati', 'woo-bundle-choice'),
				'KP'	=>	__('Korea (the Democratic People\'s Republic of)', 'woo-bundle-choice'),
				'KR'	=>	__('Korea (the Republic of)', 'woo-bundle-choice'),
				'KW'	=>	__('Kuwait', 'woo-bundle-choice'),
				'KG'	=>	__('Kyrgyzstan', 'woo-bundle-choice'),
				'LA'	=>	__('Lao People\'s Democratic Republic (the)', 'woo-bundle-choice'),
				'LV'	=>	__('Latvia', 'woo-bundle-choice'),
				'LB'	=>	__('Lebanon', 'woo-bundle-choice'),
				'LS'	=>	__('Lesotho', 'woo-bundle-choice'),
				'LR'	=>	__('Liberia', 'woo-bundle-choice'),
				'LY'	=>	__('Libya', 'woo-bundle-choice'),
				'LI'	=>	__('Liechtenstein', 'woo-bundle-choice'),
				'LT'	=>	__('Lithuania', 'woo-bundle-choice'),
				'LU'	=>	__('Luxembourg', 'woo-bundle-choice'),
				'MO'	=>	__('Macao', 'woo-bundle-choice'),
				'MG'	=>	__('Madagascar', 'woo-bundle-choice'),
				'MW'	=>	__('Malawi', 'woo-bundle-choice'),
				'MY'	=>	__('Malaysia', 'woo-bundle-choice'),
				'MV'	=>	__('Maldives', 'woo-bundle-choice'),
				'ML'	=>	__('Mali', 'woo-bundle-choice'),
				'MT'	=>	__('Malta', 'woo-bundle-choice'),
				'MH'	=>	__('Marshall Islands (the)', 'woo-bundle-choice'),
				'MQ'	=>	__('Martinique', 'woo-bundle-choice'),
				'MR'	=>	__('Mauritania', 'woo-bundle-choice'),
				'MU'	=>	__('Mauritius', 'woo-bundle-choice'),
				'YT'	=>	__('Mayotte', 'woo-bundle-choice'),
				'MX'	=>	__('Mexico', 'woo-bundle-choice'),
				'FM'	=>	__('Micronesia (Federated States of)', 'woo-bundle-choice'),
				'MD'	=>	__('Moldova (the Republic of)', 'woo-bundle-choice'),
				'MC'	=>	__('Monaco', 'woo-bundle-choice'),
				'MN'	=>	__('Mongolia', 'woo-bundle-choice'),
				'ME'	=>	__('Montenegro', 'woo-bundle-choice'),
				'MS'	=>	__('Montserrat', 'woo-bundle-choice'),
				'MA'	=>	__('Morocco', 'woo-bundle-choice'),
				'MZ'	=>	__('Mozambique', 'woo-bundle-choice'),
				'MM'	=>	__('Myanmar', 'woo-bundle-choice'),
				'NA'	=>	__('Namibia', 'woo-bundle-choice'),
				'NR'	=>	__('Nauru', 'woo-bundle-choice'),
				'NP'	=>	__('Nepal', 'woo-bundle-choice'),
				'NL'	=>	__('Netherlands (the)', 'woo-bundle-choice'),
				'NC'	=>	__('New Caledonia', 'woo-bundle-choice'),
				'NZ'	=>	__('New Zealand', 'woo-bundle-choice'),
				'NI'	=>	__('Nicaragua', 'woo-bundle-choice'),
				'NE'	=>	__('Niger (the)', 'woo-bundle-choice'),
				'NG'	=>	__('Nigeria', 'woo-bundle-choice'),
				'NU'	=>	__('Niue', 'woo-bundle-choice'),
				'NF'	=>	__('Norfolk Island', 'woo-bundle-choice'),
				'MP'	=>	__('Northern Mariana Islands (the)', 'woo-bundle-choice'),
				'NO'	=>	__('Norway', 'woo-bundle-choice'),
				'OM'	=>	__('Oman', 'woo-bundle-choice'),
				'PK'	=>	__('Pakistan', 'woo-bundle-choice'),
				'PW'	=>	__('Palau', 'woo-bundle-choice'),
				'PS'	=>	__('Palestine, State of', 'woo-bundle-choice'),
				'PA'	=>	__('Panama', 'woo-bundle-choice'),
				'PG'	=>	__('Papua New Guinea', 'woo-bundle-choice'),
				'PY'	=>	__('Paraguay', 'woo-bundle-choice'),
				'PE'	=>	__('Peru', 'woo-bundle-choice'),
				'PH'	=>	__('Philippines (the)', 'woo-bundle-choice'),
				'PN'	=>	__('Pitcairn', 'woo-bundle-choice'),
				'PL'	=>	__('Poland', 'woo-bundle-choice'),
				'PT'	=>	__('Portugal', 'woo-bundle-choice'),
				'PR'	=>	__('Puerto Rico', 'woo-bundle-choice'),
				'QA'	=>	__('Qatar', 'woo-bundle-choice'),
				'MK'	=>	__('Republic of North Macedonia', 'woo-bundle-choice'),
				'RO'	=>	__('Romania', 'woo-bundle-choice'),
				'RU'	=>	__('Russian Federation (the)', 'woo-bundle-choice'),
				'RW'	=>	__('Rwanda', 'woo-bundle-choice'),
				'RE'	=>	__('Réunion', 'woo-bundle-choice'),
				'BL'	=>	__('Saint Barthélemy', 'woo-bundle-choice'),
				'SH'	=>	__('Saint Helena, Ascension and Tristan da Cunha', 'woo-bundle-choice'),
				'KN'	=>	__('Saint Kitts and Nevis', 'woo-bundle-choice'),
				'LC'	=>	__('Saint Lucia', 'woo-bundle-choice'),
				'MF'	=>	__('Saint Martin (French part)', 'woo-bundle-choice'),
				'PM'	=>	__('Saint Pierre and Miquelon', 'woo-bundle-choice'),
				'VC'	=>	__('Saint Vincent and the Grenadines', 'woo-bundle-choice'),
				'WS'	=>	__('Samoa', 'woo-bundle-choice'),
				'SM'	=>	__('San Marino', 'woo-bundle-choice'),
				'ST'	=>	__('Sao Tome and Principe', 'woo-bundle-choice'),
				'SA'	=>	__('Saudi Arabia', 'woo-bundle-choice'),
				'SN'	=>	__('Senegal', 'woo-bundle-choice'),
				'RS'	=>	__('Serbia', 'woo-bundle-choice'),
				'SC'	=>	__('Seychelles', 'woo-bundle-choice'),
				'SL'	=>	__('Sierra Leone', 'woo-bundle-choice'),
				'SG'	=>	__('Singapore', 'woo-bundle-choice'),
				'SX'	=>	__('Sint Maarten (Dutch part)', 'woo-bundle-choice'),
				'SK'	=>	__('Slovakia', 'woo-bundle-choice'),
				'SI'	=>	__('Slovenia', 'woo-bundle-choice'),
				'SB'	=>	__('Solomon Islands', 'woo-bundle-choice'),
				'SO'	=>	__('Somalia', 'woo-bundle-choice'),
				'ZA'	=>	__('South Africa', 'woo-bundle-choice'),
				'GS'	=>	__('South Georgia and the South Sandwich Islands', 'woo-bundle-choice'),
				'SS'	=>	__('South Sudan', 'woo-bundle-choice'),
				'ES'	=>	__('Spain', 'woo-bundle-choice'),
				'LK'	=>	__('Sri Lanka', 'woo-bundle-choice'),
				'SD'	=>	__('Sudan (the)', 'woo-bundle-choice'),
				'SR'	=>	__('Suriname', 'woo-bundle-choice'),
				'SJ'	=>	__('Svalbard and Jan Mayen', 'woo-bundle-choice'),
				'SE'	=>	__('Sweden', 'woo-bundle-choice'),
				'CH'	=>	__('Switzerland', 'woo-bundle-choice'),
				'SY'	=>	__('Syrian Arab Republic', 'woo-bundle-choice'),
				'TW'	=>	__('Taiwan (Province of China)', 'woo-bundle-choice'),
				'TJ'	=>	__('Tajikistan', 'woo-bundle-choice'),
				'TZ'	=>	__('Tanzania, United Republic of', 'woo-bundle-choice'),
				'TH'	=>	__('Thailand', 'woo-bundle-choice'),
				'TL'	=>	__('Timor-Leste', 'woo-bundle-choice'),
				'TG'	=>	__('Togo', 'woo-bundle-choice'),
				'TK'	=>	__('Tokelau', 'woo-bundle-choice'),
				'TO'	=>	__('Tonga', 'woo-bundle-choice'),
				'TT'	=>	__('Trinidad and Tobago', 'woo-bundle-choice'),
				'TN'	=>	__('Tunisia', 'woo-bundle-choice'),
				'TR'	=>	__('Turkey', 'woo-bundle-choice'),
				'TM'	=>	__('Turkmenistan', 'woo-bundle-choice'),
				'TC'	=>	__('Turks and Caicos Islands (the)', 'woo-bundle-choice'),
				'TV'	=>	__('Tuvalu', 'woo-bundle-choice'),
				'UG'	=>	__('Uganda', 'woo-bundle-choice'),
				'UA'	=>	__('Ukraine', 'woo-bundle-choice'),
				'AE'	=>	__('United Arab Emirates (the)', 'woo-bundle-choice'),
				'GB'	=>	__('United Kingdom of Great Britain and Northern Ireland (the)', 'woo-bundle-choice'),
				'UM'	=>	__('United States Minor Outlying Islands (the)', 'woo-bundle-choice'),
				'US'	=>	__('United States of America (the)', 'woo-bundle-choice'),
				'UY'	=>	__('Uruguay', 'woo-bundle-choice'),
				'UZ'	=>	__('Uzbekistan', 'woo-bundle-choice'),
				'VU'	=>	__('Vanuatu', 'woo-bundle-choice'),
				'VE'	=>	__('Venezuela (Bolivarian Republic of)', 'woo-bundle-choice'),
				'VN'	=>	__('Viet Nam', 'woo-bundle-choice'),
				'VG'	=>	__('Virgin Islands (British)', 'woo-bundle-choice'),
				'VI'	=>	__('Virgin Islands (U.S.)', 'woo-bundle-choice'),
				'WF'	=>	__('Wallis and Futuna', 'woo-bundle-choice'),
				'EH'	=>	__('Western Sahara', 'woo-bundle-choice'),
				'YE'	=>	__('Yemen', 'woo-bundle-choice'),
				'ZM'	=>	__('Zambia', 'woo-bundle-choice'),
				'ZW'	=>	__('Zimbabwe', 'woo-bundle-choice'),
				'AX'	=>	__('Åland Islands', 'woo-bundle-choice'),
			);
		}
	
		return $countries_list;
	}


	public function get_variation_url_part($variation_id, $attributes) {

	    if(!empty($variation_id) && empty($attributes)){
	    
	    	$variation_data = new WC_Product_Variation($variation_id);	
			
			if(!empty($variation_data)){
			
			    $attributes = $variation_data->get_variation_attributes();
			}    
	    }

	    $link_parts = array();
	   	
	   	if(!empty($attributes)){
	   		
		    $attribute_keys = array();

		    foreach ($attributes as $attribute_name_v => $attribute_value) {
		        $attribute_name = str_replace('attribute_', '', $attribute_name_v);
		        $attribute_keys[] = $attribute_name;
		        $link_parts[] = 'checklist_'.$attribute_name.'='.$attribute_value;
		    }

		    $attribute_keys_value = implode(',', $attribute_keys);
		    $link_parts[] = "_attribute=,$attribute_keys_value";
	   	}

	    $link_part = implode('&', $link_parts);

	    return $link_part;
	}

	public function is_nice_urls_enabled() {

		// Check if the constant is already defined
	    if (!defined('WBC_IS_NICE_URLS')) {

	        // Read from the database and set the constant
	        $is_enabled = (wbc()->options->get_option('configuration', 'enable_nice_urls') == 'enable_nice_urls');
	        define('WBC_IS_NICE_URLS', $is_enabled);

	    }

	    // Return the constant value
	    return WBC_IS_NICE_URLS;
	}
		
	/**
	 * NOTE: now any extension that affects the ring builder url should depend on these two beautify and debeautify functions to ensure that they also support nice urls. and to check if the nice urls are enabled in admin settings you can call the function "wbc_is_nice_urls_enabled". and note that we have no hook structure for this since this nice url feature is actually a override and when in future the wbc is refactored deeply for making the urls nicer and clean as per the general standards then wbc core layers itself will not use such url so no need to override then. but now for doing simple overrides these simple functions are provided. and all extensions affecting the wbc URLs which are made nicer by the WBC then those urls must be maintained nicely by the underlying extensions. 
	 *
	 */
	public function beautify_url_data($url, $is_query_string = false, $is_do_merge = false) {

		// Call is_nice_urls_enabled() from wbc()->common at the top
	    if (!$this->is_nice_urls_enabled()) {

	        return $url; // If nice URLs are disabled, return the original URL
	    }

		$queryParams = null;
		$parsedUrl = null;
		$sortedQueryString = null;
		$hash = null;

	    // Parse query string from the URL
	    if ($is_query_string) {

	        parse_str($url, $queryParams);
	    } else {

	        $parsedUrl = parse_url($url);
	        // parse_str($parsedUrl['query'] ?? '', $queryParams);
	        if (isset($parsedUrl['query'])) {

	        	parse_str($parsedUrl['query'], $queryParams);
	        }
	    }

	    $wbcid_merge = null;

	    // Remove the 'wbcid' parameter if it exists
    	if (isset($queryParams['wbcid'])) {

    		if ($is_do_merge) {

    			$wbcid_merge = $queryParams['wbcid'];
    		}

    		unset($queryParams['wbcid']);
    	}

    	if (!is_array($queryParams) or sizeof($queryParams) <= 0) {

    		return $url;
    	}


	    $wbc_nu_hash = null;

	    // Initialize session storage if not already set
	    if (!wbc()->session->isset_key('wbc_nu_hash')) {

	        $wbc_nu_hash = array();
	    } else {

	    	$wbc_nu_hash = wbc()->session->fetch('wbc_nu_hash');
	    }

	    $wbc_nu_data = null;

	    if (!wbc()->session->isset_key('wbc_nu_data')) {

	        $wbc_nu_data = array();
	    } else {

	    	$wbc_nu_data = wbc()->session->fetch('wbc_nu_data');
	    }


		// $wbcid check karo ane jo male to $wbc_nu_data maathi te index extract karo
		if ($wbcid_merge && isset($wbc_nu_data[$wbcid_merge])) {
	    
		    // Array ne merge karo
		    $queryParams = array_merge($wbc_nu_data[$wbcid_merge], $queryParams);

    	}

	    // Sort url array
	    ksort($queryParams);

	    // recovert query string
	    $sortedQueryString = http_build_query($queryParams);

	    // Generate a hash using SHA-256
	    $hash = hash('sha256', $sortedQueryString);


	    // Check if hash already exists
	    if (isset($wbc_nu_hash[$hash])) {

	        $wbcid = $wbc_nu_hash[$hash];
	    } else {

	        // Generate a new wbcid
	        // $wbcid = count($wbc_nu_data) + 1;
	        $retryCount = 0;
			$maxRetries = 3;	//10; // Define maximum retries
			do {

			    if ($retryCount > $maxRetries) {

			        throw new \Exception('There are some issues with the Nice URL feature for Generating ID. Please contact the Sphere Plugins technical support team.', 1);
			    }

			    $minValue = random_int(1, 99999);
			    $maxValue = ($minValue > 75000) ? random_int(75000, 999999) : 99999;
			    $wbcid = random_int($minValue, $maxValue);

			    $retryCount++;
			} while (in_array($wbcid, $wbc_nu_hash));
	        
	        // Store the hash and query parameters
	        $wbc_nu_hash[$hash] = $wbcid;
	        $wbc_nu_data[$wbcid] = $queryParams;

	        wbc()->session->store('wbc_nu_hash',$wbc_nu_hash);
	        wbc()->session->store('wbc_nu_data',$wbc_nu_data);
	    }

	    // Construct the updated URL with the wbcid parameter
	    if ($is_query_string) {

	        // return "?wbcid={$wbcid}";
	        return "wbcid={$wbcid}";
	    } else {

	        $baseUrl = strtok($url, '?');

	        return "{$baseUrl}?wbcid={$wbcid}";
	    }
	}

	/**
	 * NOTE: now any extension that affects the ring builder url should depend on these two beautify and debeautify functions to ensure that they also support nice urls. and to check if the nice urls are enabled in admin settings you can call the function "wbc_is_nice_urls_enabled". and note that we have no hook structure for this since this nice url feature is actually a override and when in future the wbc is refactored deeply for making the urls nicer and clean as per the general standards then wbc core layers itself will not use such url so no need to override then. but now for doing simple overrides these simple functions are provided. and all extensions affecting the wbc URLs which are made nicer by the WBC then those urls must be maintained nicely by the underlying extensions. 
	 *
	 */
	public function debeautify_url_data($wbcid = null) {

		if (!$this->is_nice_urls_enabled()) {

	        return; 
	    }

		$originalParams = null;

	    // Retrieve wbcid from argument or $_GET
	    if ($wbcid == null) {

	        $wbcid = isset($_GET['wbcid']) ? wbc()->sanitize->get('wbcid') : null;

	        unset($_GET['wbcid']);

			// Check if wbcid is present in the URL
			if ($wbcid === 'sd' or $wbcid === 'ss' or $wbcid === 'sd-round' or $wbcid === 'sd-oval' or $wbcid === 'sd-cushion' or $wbcid === 'sd-pear' or $wbcid === 'sd-princess' or $wbcid === 'sd-emerald' or $wbcid === 'sd-marquise' or $wbcid === 'sd-asscher' or $wbcid === 'sd-radiant' or $wbcid === 'sd-heart' or $wbcid === 'bd-brilliant' or $wbcid === 'bd-oval' or $wbcid === 'bd-cushion' or $wbcid === 'bd-tropfen' or $wbcid === 'bd-prinzess' or $wbcid === 'bd-emerald' or $wbcid === 'bd-marquise' or $wbcid === 'bd-asscher' or $wbcid === 'bd-radiant' or $wbcid === 'bd-herz' or $wbcid === 'ss-round' or $wbcid === 'ss-oval' or $wbcid === 'ss-cushion' or $wbcid === 'ss-pear' or $wbcid === 'ss-princess' or $wbcid === 'ss-emeral' or $wbcid === 'ss-marquise' or $wbcid === 'ss-heart' or $wbcid === 'ss-asscher' or $wbcid === 'ldg-brilliant' or $wbcid === 'ldg-oval' or $wbcid === 'ldg-cushion' or $wbcid === 'ldg-tropfen' or $wbcid === 'ldg-prinzess' or $wbcid === 'ldg-emerald' or $wbcid === 'ldg-marquise' or $wbcid === 'ldg-asscher' or $wbcid === 'ldg-radiant' or $wbcid === 'ldg-herz' or $wbcid === 'lg-octagonal' or $wbcid === 'lg-hexagonal' or $wbcid === 'lg-andere' or $wbcid === 'lg-square' or $wbcid === 'lg-triangular' or $wbcid === 'lg-brilliant' or $wbcid === 'lg-asscher' or $wbcid === 'lg-emerald' or $wbcid === 'lg-herz' or $wbcid === 'lg-kissen' or $wbcid === 'lg-marquise' or $wbcid === 'lg-oval' or $wbcid === 'lg-prinzess' or $wbcid === 'lg-radiant' or $wbcid === 'lg-tropfen' or $wbcid === 'sdg' or $wbcid === 'sldg' or $wbcid === 'sfdg' or $wbcid === 'sedg' or $wbcid === 'seg' or $wbcid === 'ss-ring' or $wbcid === 'sd-diamond' or $wbcid === 'sld-diamond' or $wbcid === 'ss-radiant-diamond' or $wbcid === 'ss-round-diamond' or $wbcid === 'ss-cushion-diamond' or $wbcid === 'ss-princess-diamond' or $wbcid === 'ss-marquise-diamond' or $wbcid === 'ss-asscher-diamond' or $wbcid === 'ss-oval-diamond' or $wbcid === 'ss-pear-diamond' or $wbcid === 'ss-emerald-diamond' or $wbcid === 'ss-heart-diamond' or $wbcid === 'ss-solitaire-ring' or $wbcid === 'ss-vintage-ring' or $wbcid === 'ss-trilogy-ring' or $wbcid === 'ss-pave-ring' or $wbcid === 'ss-stone-ring' or $wbcid === 'ss-halo-ring' or $wbcid === 'ss-14k-yellow-gold-ring' or $wbcid === 'ss-14k-rose-gold-ring' or $wbcid === 'ss-14k-white-gold-ring' or $wbcid === 'ss-platinum-ring' or $wbcid === 'ss-18k-yellow-gold-ring' or $wbcid === 'ss-18k-rose-gold-ring' or $wbcid === 'ss-18k-white-gold-ring') {

			    // Handle wbcid = 'sd'
			    if ($wbcid === 'sd') {
			    	
			        // Query string for wbcid = sd
			        $query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat&STEP=1&FIRST&SECOND";
			    } elseif ($wbcid === 'ss') { // Handle wbcid = 'ss'

			        // Query string for wbcid = ss
			        $query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND";
			    } elseif ($wbcid === 'sd-round') {

			    	// Query string for wbcid = sd-round
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_round_shape_cat";
			    } elseif ($wbcid === 'sd-oval') {

			    	// Query string for wbcid = sd-oval
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_oval_shape_cat";
			    } elseif ($wbcid === 'sd-cushion') {

			    	// Query string for wbcid = sd-cushion
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_cushion_shape_cat";
			    } elseif ($wbcid === 'sd-pear') {

			    	// Query string for wbcid = sd-pear
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_pear_shape_cat";
			    } elseif ($wbcid === 'sd-princess') {

			    	// Query string for wbcid = sd-princess
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_princess_shape_cat";
			    } elseif ($wbcid === 'sd-emerald') {

			    	// Query string for wbcid = sd-emerald
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_emerald_shape_cat";
			    } elseif ($wbcid === 'sd-marquise') {

			    	// Query string for wbcid = sd-marquise
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_marquise_shape_cat";
			    } elseif ($wbcid === 'sd-asscher') {

			    	// Query string for wbcid = sd-asscher
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_asscher_shape_cat";
			    } elseif ($wbcid === 'sd-radiant') {

			    	// Query string for wbcid = sd-radiant
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_radiant_shape_cat";
			    } elseif ($wbcid === 'sd-heart') {

			    	// Query string for wbcid = sd-heart
			    	$query_string = "EO_WBC=1&BEGIN=eo_diamond_shape_cat_&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_heart_shape_cat";
			    } elseif ($wbcid === 'bd-brilliant') {	//aa german langvage mate na url che

			    	// Query string for wbcid = bd-brilliant
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-brilliant";
			    } elseif ($wbcid === 'bd-oval') {

			    	// Query string for wbcid = bd-oval
			    	$query_string ="EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-oval";
			    } elseif ($wbcid === 'bd-cushion') {

			    	// Query string for wbcid = bd-cushion
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=eo_diamond_cushion_shape_cat";
			    } elseif ($wbcid === 'bd-tropfen') {

			    	// Query string for wbcid = bd-tropfen
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-tropfen";
			    } elseif ($wbcid === 'bd-prinzess') {

			    	// Query string for wbcid = bd-prinzess
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-prinzess";
			    } elseif ($wbcid === 'bd-emerald') {

			    	// Query string for wbcid = bd-emerald
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-emerald";
			    } elseif ($wbcid === 'bd-marquise') {

			    	// Query string for wbcid = bd-marquise
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-marquise";
			    } elseif ($wbcid === 'bd-asscher') {

			    	// Query string for wbcid = bd-asscher
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-asscher";
			    } elseif ($wbcid === 'bd-radiant') {

			    	// Query string for wbcid = bd-radiant
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-radiant";
			    } elseif ($wbcid === 'bd-herz') {

			    	// Query string for wbcid = bd-herz
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&CAT_LINK=form-herz";
			    } elseif ($wbcid === 'ss-round') {

			    	// Query string for wbcid = ss-round
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=round";
			    } elseif ($wbcid === 'ss-oval') {

			    	// Query string for wbcid = ss-oval
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=oval";
			    } elseif ($wbcid === 'ss-cushion') {

			    	// Query string for wbcid = ss-cushion
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=cushion";
			    } elseif ($wbcid === 'ss-pear') {

			    	// Query string for wbcid = ss-pear
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=pear";
			    } elseif ($wbcid === 'ss-princess') {

			    	// Query string for wbcid = ss-princess
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=princess";
			    } elseif ($wbcid === 'ss-emeral') {

			    	// Query string for wbcid = emeral
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=emeral";
			    } elseif ($wbcid === 'ss-marquise') {

			    	// Query string for wbcid = marquise
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=marquise";
			    } elseif ($wbcid === 'ss-heart') {

			    	// Query string for wbcid = ss-heart
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=heart";
			    } elseif ($wbcid === 'ss-asscher') {

			    	// Query string for wbcid = ss-asscher
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND&_attribute=,pa_eo_shape_attr&checklist_pa_eo_shape_attr=asscher";
			    } elseif ($wbcid === 'ldg-brilliant') {	//aa german langvage mate na url che

			    	// Query string for wbcid = ldg-brilliant
			    	$query_string = "CAT_LINK=form-brilliant";
			    } elseif ($wbcid === 'ldg-oval') {

			    	// Query string for wbcid = ldg-oval
			    	$query_string = "CAT_LINK=form-oval";
			    } elseif ($wbcid === 'ldg-cushion') {

			    	// Query string for wbcid = ldg-cushion
			    	$query_string = "CAT_LINK=eo_diamond_cushion_shape_cat";
			    } elseif ($wbcid === 'ldg-tropfen') {

			    	// Query string for wbcid = ldg-tropfen
			    	$query_string = "CAT_LINK=form-tropfen";
			    } elseif ($wbcid === 'ldg-prinzess') {

			    	// Query string for wbcid = ldg-prinzess
			    	$query_string = "CAT_LINK=form-prinzess";
			    } elseif ($wbcid === 'ldg-emerald') {

			    	// Query string for wbcid = ldg-emerald
			    	$query_string = "CAT_LINK=form-emerald";
			    } elseif ($wbcid === 'ldg-marquise') {

			    	// Query string for wbcid = ldg-marquise
			    	$query_string = "CAT_LINK=form-marquise";
			    } elseif ($wbcid === 'ldg-asscher') {

			    	// Query string for wbcid = ldg-asscher
			    	$query_string = "CAT_LINK=form-asscher";
			    } elseif ($wbcid === 'ldg-radiant') {

			    	// Query string for wbcid = ldg-radiant
			    	$query_string = "CAT_LINK=form-radiant";
			    } elseif ($wbcid === 'ldg-herz') {

			    	// Query string for wbcid = ldg-herz
			    	$query_string = "CAT_LINK=form-herz";
			    } elseif ($wbcid === 'lg-octagonal') {

			    	// Query string for wbcid = lg-octagonal
			    	$query_string = "CAT_LINK=eo_gemstones_octagonal_shape_cat&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-hexagonal') {

			    	// Query string for wbcid = lg-hexagonal
			    	$query_string = "CAT_LINK=hexagonal&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-andere') {

			    	// Query string for wbcid = lg-andere
			    	$query_string = "CAT_LINK=andere&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-square') {

			    	// Query string for wbcid = lg-square
			    	$query_string = "CAT_LINK=eo_gemstones_square_shape_cat&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-triangular') {

			    	// Query string for wbcid = lg-triangular
			    	$query_string = "CAT_LINK=eo_gemstones_triangular_shape_cat&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-brilliant') {

			    	// Query string for wbcid = lg-brilliant
			    	$query_string = "CAT_LINK=brilliant&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-asscher') {

			    	// Query string for wbcid = lg-asscher
			    	$query_string = "CAT_LINK=asscher&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-emerald') {

			    	// Query string for wbcid = lg-emerald
			    	$query_string = "CAT_LINK=emerald&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-herz') {

			    	// Query string for wbcid = lg-herz
			    	$query_string = "CAT_LINK=herz&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-kissen') {

			    	// Query string for wbcid = lg-
			    	$query_string = "CAT_LINK=kissen&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-marquise') {

			    	// Query string for wbcid = lg-marquise
			    	$query_string = "CAT_LINK=marquise&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-oval') {

			    	// Query string for wbcid = lg-oval
			    	$query_string = "CAT_LINK=oval&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-prinzess') {

			    	// Query string for wbcid = lg-prinzess
			    	$query_string = "CAT_LINK=prinzess&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-radiant') {

			    	// Query string for wbcid = lg-radiant
			    	$query_string = "CAT_LINK=eo_gemstones_radiant_shape_cat&67c0122117b5f=1";
			    } elseif ($wbcid === 'lg-tropfen') {

			    	// Query string for wbcid = lg-tropfen
			    	$query_string = "CAT_LINK=tropfen&67c0122117b5f=1";
			    } elseif ($wbcid === 'sdg') {	//aa german langvage mate na url che (main manu ne che)

			    	// Query string for wbcid =sdg 
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND";
			    } elseif ($wbcid === 'sldg') {

			    	// Query string for wbcid = sldg
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&6085412e4cc9b=1";
			    } elseif ($wbcid === 'sfdg') {

			    	// Query string for wbcid = sfdg 
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&67ac391e31929=1";
			    } elseif ($wbcid === 'sedg') {

			    	// Query string for wbcid = sedg
			    	$query_string = "EO_WBC=1&BEGIN=diamanten&STEP=1&FIRST&SECOND&67ac38e9c17be=1";
			    } elseif ($wbcid === 'seg') {

			    	// Query string for wbcid = seg
			    	$query_string = "EO_WBC=1&BEGIN=ringe-modelle&STEP=1&FIRST&SECOND";
			    }elseif ($wbcid === 'ss-ring') {
			    	// User specific slug  (for dlp) 
			    	// ACTIVE_TODO temp. this is highly temporary becouse we are not supposed to add code settings for user spicfic things. And so we will soon add support for specifying user specific nice url at that time need to remove it from here. We need to do it as soon as we get chance. -- to h and -- to bha


			    	// Query string for wbcid = ss-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND";
			    }elseif ($wbcid === 'sd-diamond') {
			    	
			    	// Query string for wbcid =sd-diamond 
			    	$query_string = "orderby=price&EO_WBC=1&BEGIN=eo_diamond_shape_cat&STEP=1&FIRST&SECOND";
			    }elseif ($wbcid === 'sld-diamond') {
			    	
			    	// Query string for wbcid = sld-diamond
			    	$query_string = "orderby=price&EO_WBC=1&BEGIN=eo_diamond_shape_cat&STEP=1&FIRST&SECOND&6085412e4cc9b=1";
			    }elseif ($wbcid === 'ss-round-diamond') {
			    	
			    	// Query string for wbcid = ss-round-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=round";
			    }elseif ($wbcid === 'ss-cushion-diamond') {
			    	
			    	// Query string for wbcid = ss-cushion-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=cushion";
			    }elseif ($wbcid === 'ss-princess-diamond') {
			    	
			    	// Query string for wbcid = ss-princess-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=princess";
			    }elseif ($wbcid === 'ss-marquise-diamond') {
			    	
			    	// Query string for wbcid = ss-marquise-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=marquise";
			    }elseif ($wbcid === 'ss-asscher-diamond') {
			    	
			    	// Query string for wbcid = ss-asscher-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=asscher";
			    }elseif ($wbcid === 'ss-oval-diamond') {
			    	
			    	// Query string for wbcid = ss-oval-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=oval";
			    }elseif ($wbcid === 'ss-pear-diamond') {
			    	
			    	// Query string for wbcid = ss-pear-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=pear";
			    }elseif ($wbcid === 'ss-emeral-diamond') {
			    	
			    	// Query string for wbcid = ss-emeral-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=emerald";
			    }elseif ($wbcid === 'ss-radiant-diamond') {
			    	
			    	// Query string for wbcid = ss-radiant-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=radiant";
			    }elseif ($wbcid === 'ss-heart-diamond') {
			    	
			    	// Query string for wbcid = ss-heart-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=heart";
			    }elseif ($wbcid === 'ss-emerald-diamond') {
			    	
			    	// Query string for wbcid = ss-emerald-diamond
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_diamond-shape&checklist_pa_diamond-shape=emerald";
			    }elseif ($wbcid === 'ss-solitaire-ring') {
			    	
			    	// Query string for wbcid = ss-solitaire-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&CAT_LINK=eo_ring_solitaire_cat";
			    }elseif ($wbcid === 'ss-vintage-ring') {
			    	
			    	// Query string for wbcid = ss-vintage-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&CAT_LINK=vintage";
			    }elseif ($wbcid === 'ss-trilogy-ring') {
			    	
			    	// Query string for wbcid = ss-trilogy-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&CAT_LINK=eo_ring_trilogy_cat";
			    }elseif ($wbcid === 'ss-pave-ring') {
			    	
			    	// Query string for wbcid = ss-pave-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&CAT_LINK=eo_ring_pave_cat";
			    }elseif ($wbcid === 'ss-stone-ring') {
			    	
			    	// Query string for wbcid = ss-stone-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&CAT_LINK=side-stone";
			    }elseif ($wbcid === 'ss-halo-ring') {
			    	
			    	// Query string for wbcid = ss-halo-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&CAT_LINK=eo_ring_halo_cat";
			    }elseif ($wbcid === 'ss-14k-yellow-gold-ring') {
			    	
			    	// Query string for wbcid = ss-14k-yellow-gold-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_eo_metal_attr&checklist_pa_eo_metal_attr=14k-yellow-gold";
			    }elseif ($wbcid === 'ss-14k-rose-gold-ring') {
			    	
			    	// Query string for wbcid = ss-14k-rose-gold-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_eo_metal_attr&checklist_pa_eo_metal_attr=14k-rose-gold";
			    }elseif ($wbcid === 'ss-14k-white-gold-ring') {
			    	
			    	// Query string for wbcid = ss-14k-white-gold-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_eo_metal_attr&checklist_pa_eo_metal_attr=14k-white-gold";
			    }elseif ($wbcid === 'ss-platinum-ring') {
			    	
			    	// Query string for wbcid = ss-platinum-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_eo_metal_attr&checklist_pa_eo_metal_attr=platinum";
			    }elseif ($wbcid === 'ss-18k-yellow-gold-ring') {
			    	
			    	// Query string for wbcid = ss-18k-yellow-gold-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_eo_metal_attr&checklist_pa_eo_metal_attr=18k-yellow-gold";
			    }elseif ($wbcid === 'ss-18k-rose-gold-ring') {
			    	
			    	// Query string for wbcid = ss-18k-rose-gold-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_eo_metal_attr&checklist_pa_eo_metal_attr=18k-rose-gold";
			    }elseif ($wbcid === 'ss-18k-white-gold-ring') {
			    	
			    	// Query string for wbcid = ss-18k-white-gold-ring
			    	$query_string = "EO_WBC=1&BEGIN=eo_setting_shape_cat&STEP=1&FIRST&SECOND&_attribute=%2Cpa_eo_metal_attr&checklist_pa_eo_metal_attr=18k-white-gold";
			    }
			    // If a query string is set, parse it and merge with $_GET
			    if (isset($query_string)) {

			        parse_str($query_string, $parsed_params);

			        $_GET = array_merge($_GET, $parsed_params);
			    }

			    return;
			}

	    }

	    $wbc_nu_hash = wbc()->session->fetch('wbc_nu_hash',array());

	    // Check for duplicate values
		if (count($wbc_nu_hash) !== count(array_unique($wbc_nu_hash))) {

		    throw new \Exception("There are some issues with id in the Nice URL feature. Please contact the Sphere Plugins technical support team.", 1);
		}

	    $wbc_nu_data = wbc()->session->fetch('wbc_nu_data',array());

	    if (!$wbcid) {

	        return; // Return if wbcid is invalid or not found
	    } elseif (!isset($wbc_nu_data[$wbcid])) {

	    	throw new \Exception("There are some issues with the Nice URL feature. Please contact the Sphere Plugins technical support team.", 1);
	    }

	    // Retrieve original query parameters
	    $originalParams = $wbc_nu_data[$wbcid];

	    // Merge into $_GET
	    $_GET = array_merge($_GET, $originalParams);

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

function wbc_key_to_title( $key, $is_basic_conversion = false ) {

	return wbc()->common->key_to_title($key, $is_basic_conversion);

}

function wbc_truncate($str,$limit) {

	return wbc()->common->truncate($str,$limit);
	
}

function wbc_is_mobile() {

	return wbc()->common->is_mobile();
	
}

function wbc_is_mobile_by_page_sections($key = null, $is_other_theme = false) {

	return wbc()->common->is_mobile_by_page_sections($key,$is_other_theme);

}

function wbc_is_nice_urls_enabled() {

    return wbc()->common->is_nice_urls_enabled();
	
}

function wbc_placeholder_img_src() {

	return wbc()->common->placeholder_img_src();

}

function wbc_get_variation_url_part($variation_id,$attributes=array()) {

	return wbc()->common->get_variation_url_part($variation_id,$attributes);

}

