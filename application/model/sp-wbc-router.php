<?php
/*
*   SP_WBC_Router class 
*/

namespace eo\wbc\model;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\SP_Router;

class SP_WBC_Router extends SP_Router {

    private static $_instance = null;

    public static function instance() {

        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    public function __construct() {

    }

    public static function set_query_params($key, $val, $input_method = 'GET') {

        return wbc()->sanitize->{'store_'.strtolower($input_method)}($key, $val);
    }

    public static function get_query_params($key, $input_method = 'GET') {
        ACTIVE_TODO now the way we can do is firstly support the standard woocommerce filter attributes -- to h & -- to t & -- to s
            ACTIVE_TODO sooner or later we should do the woocommerce filters standard based implementation and upgrade or revise and upgrade our filter layers to make sure that simply work based on the woocommerce standard filters backend and so on and so we do that above point will all naturaly be covered.
            --  and then we should use that links on new layers while as backward compatability can support our older structure of CAT_LINK and ATT_LINK -- to h & -- to s 

        return wbc()->sanitize->{strtolower($input_method)}($key);
    }

    public static function set_query_params_formatted($type, $key, $val, $input_method = 'GET', $format = null) {

        // -- HOLD FOR REMOVAL if not of any use 
        // if($type == ?) {

        //     if( $key[0] == 'attr' ) {

        //         return explode(',', self::set_query_params('_attribute', $input_method) );
        //     } elseif( $key[0] == 'attr_options' ) {

        //         return explode(',', self::set_query_params('checklist_'.$key[1], $input_method) );
        //     }
        // }else

        if($type == 'to_form_field') {

            if($key[0] == 'prod_cat'){

                // NOTE: here we are simply returning but if required to controll logic then the standerd approch is to call the above set_query_params function    
                return $val;
            }
        }else if($type == 'to_filter_field'){

            if($key[0] == 'prod_cat'){

                // NOTE: here we are simply returning but if required to controll logic then the standerd approch is to call the above set_query_params function    
                -- need to finalize -- to h
                return $val;
            }
        }else{

            return self::set_query_params($key, $val, $input_method);
        }
    }

    public static function get_query_params_formatted($type, $key, $input_method = 'GET', $format = null) {

        if($type == 'url_and_filter_form') {

            if( $key[0] == 'attr' ) {

                return explode(',', self::get_query_params('_attribute', $input_method) );
            } elseif( $key[0] == 'attr_options' ) {

                return explode(',', self::get_query_params('checklist_'.$key[1], $input_method) );
            }
        }else if($type == 'url_and_form_field_raw') {

            if($key[0] == 'prod_cat'){

                return self::get_query_params('CAT_LINK', $input_method);
            }

        }else {

            return self::get_query_params($key, $input_method);
        }

    }

}