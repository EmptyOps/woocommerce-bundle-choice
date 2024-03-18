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
	           'Algeria' => __('Albania', 'woo-bundle-choice'),
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
	           'Belgium' => __('Belgium', 'woo-bundle-choice'),
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
	           'Bulgaria' => __('Bulgaria', 'woo-bundle-choice'),
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
				'DZ'	=>	__('Algeria', 'woo-bundle-choice'),
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
				'BE'	=>	__('Belgium', 'woo-bundle-choice'),
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
				'BG'	=>	__('Bulgaria', 'woo-bundle-choice'),
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

	public function get_variation_url_part($variation_id,$attributes) {

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

function wbc_placeholder_img_src() {

	return wbc()->common->placeholder_img_src();

}

function wbc_get_variation_url_part($variation_id,$attributes=array()) {

	return wbc()->common->get_variation_url_part($variation_id,$attributes);

}