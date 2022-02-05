<?php
/*
*	SP Model for Query class 
*/

namespace eo\wbc\model\publics;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\publics\SP_Query;

class SP_Model_Query extends SP_Query {

	public function __construct() {

	}

	public function prepare_query( $input_method='GET', $additional_data=array() ) {

		if(($input_method != 'GET' && $input_method != 'POST' && $input_method != 'REQUEST') || !empty(wbc()->sanitize->{strtolower($input_method)}('eo_wbc_filter'))) {

		    add_filter('pre_get_posts',function($query ) use($input_method, $additional_data) {		    		
		    	if( $input_method == 'GET' ) {
	    	    	$_GET = apply_filters('filter_widget_ajax_pre_get',$_GET);		        	
		    	}
		    	else if( $input_method == 'POST' ) {
	    	    	$_POST = apply_filters('filter_widget_ajax_pre_get',$_POST);		        	
		    	}

		    	if(apply_filters('eowbc_filter_override',false) and (!empty($_REQUEST['eo_wbc_filter']))) {
		            echo json_encode(apply_filters('eowbc_filter_response',array()));
		            die();
		        }

		        $this->prepare_query_direct( $query, $input_method, $additional_data );

		        return apply_filters('filter_widget_ajax_post_query',$query);
		    });		   
		}
	}

}
