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
	    	    	$_GET = apply_filters('filter_widget_ajax_pre_get',/*$_GET*/wbc()->sanitize->_read_global_sanitized('get'));		        	
		    	}
		    	else if( $input_method == 'POST' ) {
	    	    	$_POST = apply_filters('filter_widget_ajax_pre_get',/*$_POST*/wbc()->sanitize->_read_global_sanitized('post'));		        	
		    	}

				if( wbc()->sanitize->get('is_test') == 1 ) {
					wbc()->common->var_dump( "SP_Model_Query wbc prepare_query pre_get_posts input_method = ".$input_method );
				}
				
				// --- move to ssm_dt submodule sp_tableview/application/library/shared/submodule/sp_experimental_tobe_splitted/application/model/publics/sp-ssm-dt-model-feed.php do_loop() @a ---
				// --- start ---
		  //   	if(apply_filters('eowbc_filter_override',false) and (!empty($_REQUEST['eo_wbc_filter']))) {

				// 	if( wbc()->sanitize->get('is_test') == 1 ) {
				// 		wbc()->common->var_dump( "SP_Model_Query wbc prepare_query pre_get_posts eowbc_filter_override ".$input_method );
				// 	}

				// 	$eowbc_filter_response = apply_filters('eowbc_filter_response',array());

				// 	do_action('sp_wbc_prepare_filter_response_feed',$eowbc_filter_response);
		            

		  //           // echo json_encode(/*apply_filters('eowbc_filter_response',array())*/);
		  //           die();

		  //       }


		        $this->prepare_query_direct( $query, $input_method, $additional_data );

				// -- upper aa do action valo hook comment karyo to aya pan comment karvano se ? @a --
				// do_action('sp_wbc_prepare_filter_response_feed',$eowbc_filter_response);
				// --- end ---

		        return apply_filters('filter_widget_ajax_post_query',$query);
		    },10);		   
		}
	}

}
