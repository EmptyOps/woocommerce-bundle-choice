<?php


/*
*	WBC base Publics Model.
*/

namespace eo\wbc\system\core\publics;

defined( 'ABSPATH' ) || exit;

class Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	private function __construct() {		
	}

	/*ACTIVE_TODO_OC_START
	ACTIVE_TODO eventualy we should move it to the common parent class of this base model publics as well as base model used on admin side -- to h
		-- so most probebly we must have planned for a common parent class and if not then we may need to think about it -- to h 
	ACTIVE_TODO_OC_END*/
	public static function split_sp_eid($sp_eid) {

		$separator = wbc()->config->separator();

		return explode($separator,$sp_eid);

	}

	/*ACTIVE_TODO_OC_START
	ACTIVE_TODO eventualy we should move it to the common parent class of this base model publics as well as base model used on admin side -- to h
		-- so most probebly we must have planned for a common parent class and if not then we may need to think about it -- to h 
	ACTIVE_TODO_OC_END*/
	public static function concate_sp_eid_values($values) {

		if(wbc()->sanitize->get('is_test') == 1) {

			wbc_pr("dapii Eowbc_Base_Model_Publics concate_sp_eid_values");
		}

		$separator = wbc()->config->separator();

		return $separator.$values['type'].$separator.$values['val'].$separator;
	}

	// NOTE: even though this function is related to the widgets and so on but for reusability it is hosted here in this parent class so that all child classes like feed, single product, cart and so on can reuse it. 
	protected function sidebars_widgets() {

		 // /*Hide sidebar and make content area full width.*/
        // if(apply_filters('eowbc_filter_sidebars_widgets',true)){
        //     add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
        //         return array( false );
        //     });
        // }                
        // /*End --Hide sidebar and make content area full width.*/

		$enable_side_bar_widget = array();
        $enable_side_bar_widget['enable_side_bar_widget'] = true;

        $enable_side_bar_widget = unserialize(wbc()->options->get_option('setting_status_advanced_config','enable_side_bar_widget',/*'a:0:{}'*/serialize($enable_side_bar_widget)));

        /*Hide sidebar and make content area full width.*/
        if(empty($enable_side_bar_widget['enable_side_bar_widget'])) {
        	
            if(apply_filters('eowbc_filter_sidebars_widgets',true)){

                add_filter( 'sidebars_widgets',function($sidebars_widgets ) {
                    return array( false );
                });
            }    
        }            
        /*End --Hide sidebar and make content area full width.*/
	}

	public static function parse_response($response, $method){

		$res = array();

		if( constant('WP_DEBUG') == true ) {

			wbc_pr('Eowbc_Base_Model_Publics parse_response');
			wbc_pr($response);
		}
		
		--	we need to check the result of above call and then check if there is any stardered wordprees error otherwise return the result and if there is the error then return the result acodingly. -- to h
		if( empty($response) ) {

			throw new \Exception("There is some error in the api call response.", 1);
		} elseif ( is_wp_error($response) ) {

			if( is_object($response) && method_exists($response, 'get_error_message') ){

				throw new \Exception("There is some error in the api call. error massege: " . $response->get_error_message(), 1);
			} else {

				throw new \Exception("There is some error in the api call response.", 1);
			}
		}

		if( 'wp_remote_get' == $method ) {

			if( isset($response['body']) ) {

				$response = json_decode($response['body'],true);
			} else {

				$response = '';
			}
		} else {

			$response = '';
		}

		if( isset($response['type']) ) {
		
			$res['type'] = $response['type'];
			
			if( isset($response['msg']) ) {
				
				$res['msg'] = $response['msg'];
			} else {

				$res['msg'] = '';
			}
		} else {

			$res['type'] = 'error';

			if( isset($response['msg']) ) {
				
				$res['msg'] = $response['msg'];
			} else {

				$res['msg'] = 'Empty response found.';
			}
		}

		if( isset($response['sub_type']) ) {
		
			$res['sub_type'] = $response['sub_type'];
			
			if( isset($response['sub_msg']) ) {
				
				$res['sub_msg'] = $response['sub_msg'];
			} else {

				$res['sub_msg'] = '';
			}
		} else {

			$res['sub_type'] = 'error';

			if( isset($response['sub_msg']) ) {
				
				$res['sub_msg'] = $response['sub_msg'];
			} else {

				$res['sub_msg'] = 'Empty response found.';
			}
		}

		if( isset($response['response_data']) ) {
		
			$res['response_data'] = $response['response_data'];	
		}

		return $res;
	}

	public static function handle_response($parsed, $throw_types = array('error')){
		
		NOTE: here other applicable layers of handle response function can come or may come.

		if ( in_array($parsed['type'], $throw_types) ) {

			throw new \Exception($parsed['type'].": ".$parsed['msg'], 1);
		}

		--	nicheni if and comment delete karavani che but ek var confirm karavanu che k koi bija sinario applicable hoy to.
		-- most probebly nicheni condition not empty nai pan empty hovi joia.	-- to h
		if( !empty($parsed['response_data']['sf']) ) {

			return $parsed['response_data']['sf'];
		}

		if( isset($parsed['response_data']['sf']) ) {
			
			foreach ($parsed['response_data']['sf'] as $sfk => $sfv) {

				if( !empty($sfv['st']) ) {


				}
			}
		}
		
		if( isset($parsed['response_data']['data']) ) {

			return $parsed['response_data']['data'];
		}

		return null;
	}

}
