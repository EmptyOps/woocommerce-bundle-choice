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

		// wbc_pr($response);
		// die('parse_response');
		$res = array();

		// if( constant('WP_DEBUG') == true ) {

		// 	wbc_pr('Eowbc_Base_Model_Publics parse_response');
		// 	wbc_pr($response);
		// }
		
		// ACTIVE_TODO_OC_START
		// --	seence now the error handling is supported specifically based on throw_types and so on and it is handled in the handle_response function so no need of below if elseif structure here. as well as the isset conditions below the json_decode statement at last in this function are handling and managing to create the type and msg and so on field accordingly. but at least what we need to do is if the response is a standard wordpress error then need to capture the msg and set it in the msg field while set the error value in the type field.	-- to h & -- to pi  done.
		// if( empty($response) ) {

		// 	throw new \Exception("There is some error in the api call response.", 1);
		// } elseif ( is_wp_error($response) ) {

		// 	if( is_object($response) && method_exists($response, 'get_error_message') ) {

		// 		throw new \Exception("There is some error in the api call. Error massege: " . $response->get_error_message(), 1);
		// 	} else {

		// 		throw new \Exception("There is some error in the api call response.", 1);
		// 	}
		// }
		// --	During initial testing we have created below if code based on abowe point(means the point abowe the if else code abowe) but still need to confirem if it covered all kind of sinarios and as per standered and so on.	-- to h
		/* if( empty($response) ) {

			$response['body'] = json_encode( array(
				'type' => 'error',
				'msg' => 'Empty response found on initial check.',
			));
		} else */if ( is_wp_error($response) ) {

			if( is_object($response) && method_exists($response, 'get_error_message') ) {

				$response = array( 'body' => json_encode(array(
					'type' => 'error',
					'msg' => "error_message: " . $response->get_error_message() . " error_data: " . $response->get_error_data(),
				)));
				
			} else {

				$response = array();
				$response['body'] = json_encode( array(
					'type' => 'error',
					'msg' => 'There is some error in the api call response.',
				));
			}
		}

		
		// ACTIVE_TODO_OC_END
		if( 'wp_remote_get' == $method ) {

			if( isset($response['body']) ) {

				$response = json_decode($response['body'],true);
			} else {

				$response = '';
			}
		} else {

			$response = '';
		}

		// wbc_pr('parse_response after if else');
		// wbc_pr($response);
		// die('parse_response after if else');
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
		// wbc_pr($res);
		// die('resssssss');
		return $res;
	}

	public static function handle_response($parsed, $throw_types = array('error'), $args = array()){
		// die('handle_response in');
		// NOTE: here other applicable layers of handle response function can come or may come.

		if ( in_array($parsed['type'], $throw_types) ) {

			throw new \Exception($parsed['type'].": ".$parsed['msg'], 1);
		}

		if( isset($parsed['response_data']['sf']) ) {
			
			foreach ($parsed['response_data']['sf'] as $sfk => $sfv) {

				$allowed_types = array("jpg", "jpeg", "png", "gif", "bmp", "tiff", "webp", "svg", "heif", "heic", "raw", "cr2", "nef", "orf", "sr2", "psd", "ai", "eps", "pdf");

				if( !empty($sfv['st']) ) {

					if( 'image' == $sfv['st'] ) {

						$plugin_dir = trailingslashit(WP_PLUGIN_DIR);

						if( in_array( strtolower( wbc()->file->extension_from_path( $plugin_dir . $sfv['p'] ) ), $allowed_types) ) {
							
							if( !empty($sfv['k']) ) {
								
								wbc()->file->make_dirs( $plugin_dir . $sfv['p'] );

								wbc()->file->file_write( $plugin_dir . $sfv['p'], base64_decode($sfv['k']) );
								
							} else {

								if( wbc()->file->file_exists( $plugin_dir . $sfv['p'] ) ) {

									wbc()->file->delete_file( $plugin_dir . $sfv['p'] );
								}
							}
						}

					} else {

						wbc()->options->set( $sfv['p'], $sfv['k'] );
					}
				} else {

					wbc()->options->set( $sfv['k'], $sfv['value'] );
				}
			}
		}
		
		if( isset($parsed['response_data']['data']) ) {

			if( isset($parsed['response_data']['data']['kstb']) ) {

				foreach($parsed['response_data']['data']['kstb'] as $kstb_k => $kstb_v){

					if($args[0] != base64_decode($kstb_k)){

						throw new \Exception("The operation failed at the handle_response function at st loop layer",1);
					}

					$st_data = unserialize(wbc()->options->get_option_group(base64_decode($kstb_k),"a:0:{}"));

					foreach($kstb_v as $kstb_k_k => $kstb_v_v){
	
						$st_data[$kstb_k_k] = $kstb_v_v;
					}

					wbc()->options->update_option_group( base64_decode($kstb_k), serialize($st_data) );

				}

			}	

			return $parsed['response_data']['data'];
		}

		return null;
	}

}
