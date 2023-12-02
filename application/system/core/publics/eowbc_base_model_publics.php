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

}
