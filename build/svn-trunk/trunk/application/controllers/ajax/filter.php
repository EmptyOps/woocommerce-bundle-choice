<?php
namespace eo\wbc\controllers\ajax;

use eo\wbc\model\publics\SP_Model_Query;

class Filter
{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	function range($term,$min,$max,$numeric_range=FALSE) {
        $list=array();        
        if($numeric_range) {	

        	$list=get_terms(array('taxonomy'=>$term,'hide_empty'=>FALSE));  

        	$min = str_replace(',', '.', $min);
        	$max = str_replace(',', '.', $max);

        	$list=array_filter($list,function($element) use($min,$max){

				return ( (float)str_replace(',','.',$element->name) >= (float)$min AND (float)str_replace(',','.',$element->name) <= (float)$max );
			});			
			$list_slug = array();
			array_walk($list,function($e) use(&$list_slug){
            	array_push($list_slug,$e->term_id);
            });
			$list = $list_slug;					
			
        } else {

            $list=get_terms(array('taxonomy'=>$term,'hide_empty'=>FALSE));                
            
            $list_slug = array();
            array_walk($list,function($e) use(&$list_slug){
            	$list_slug[$e->term_id]=$e->slug;
            });
			$_min=array_search($min,array_values($list_slug));
			$_max=array_search($max,array_values($list_slug));								
			$list = array_slice(array_keys($list_slug),$_min,($_max-$_min)+1);
			/*$list=array_filter($list_slug,function($index) use($_min,$_max){
				return !($index >= $_min AND $index <= $_max);
			},ARRAY_FILTER_USE_KEY);*/				
			/*$list=array_column($list,'term_id');*/				
        }
        return $list;
    }

	//////////////////////////////////////////////////////////////////////////////////////////////////
	//  Enable non table based filter that loads whole page at front :)
	//////////////////////////////////////////////////////////////////////////////////////////////////
	public function filter() {			
		
		do_action('sp_eo_wbc_filter_process');
		
		(new SP_Model_Query())->prepare_query();						
	}	
}