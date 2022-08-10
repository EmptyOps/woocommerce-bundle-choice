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

				if( wbc()->sanitize->get('is_test') == 1 ) {
					wbc()->common->var_dump( "SP_Model_Query wbc prepare_query pre_get_posts ".$input_method );
				}

		    	if(apply_filters('eowbc_filter_override',false) and (!empty($_REQUEST['eo_wbc_filter']))) {

					if( wbc()->sanitize->get('is_test') == 1 ) {
						wbc()->common->var_dump( "SP_Model_Query wbc prepare_query pre_get_posts eowbc_filter_override ".$input_method );
					}

		            echo json_encode(apply_filters('eowbc_filter_response',array()));
		            die();
		        }


		        and to get the result obj we can rely on the post_get_posts which might be the alternative of the pre_get_posts -- to h & -- to a 
		        $this->prepare_query_direct( $query, $input_method, $additional_data );

		        return apply_filters('filter_widget_ajax_post_query',$query);
		    });		   
		}
	}

}
