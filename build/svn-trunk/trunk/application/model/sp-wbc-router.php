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
        
        /*ACTIVE_TODO_OC_START
        ACTIVE_TODO now the way we can do is firstly support the standard woocommerce filter attributes -- to h & -- to t & -- to s
            ACTIVE_TODO sooner or later we should do the woocommerce filters standard based implementation and upgrade or revise and upgrade our filter layers to make sure that simply work based on the woocommerce standard filters backend and so on and so we do that above point will all naturaly be covered.
            --  and then we should use that links on new layers while as backward compatability can support our older structure of CAT_LINK and ATT_LINK -- to h & -- to s 
        ACTIVE_TODO_OC_END*/

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
                // -- need to finalize -- to h
                    // NOTE: since we are just continuing with older flow of m so nothing to here as of now, but if required than we need to manage     
                return $val;
            }elseif($key[0] == 'price_range'){

                // NOTE: here we are simply returning but if required to controll logic then the standerd approch is to call the above set_query_params function    
                // -- need to finalize -- to h
                    // NOTE: since we are just continuing with older flow of m so nothing to here as of now, but if required than we need to manage     
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
            } elseif( $key[0] == 'min_max_attr_options' ) {

                return array(
                    'range_start'=>self::get_query_params('min_'.$key[1], $input_method),
                    'range_end'=>self::get_query_params('max_'.$key[1], $input_method),
                );
            } elseif( $key[0] == 'price_range' ) {
                
                return array(
                    'range_start'=>self::get_query_params('min_price', $input_method),
                    'range_end'=>self::get_query_params('max_price', $input_method),
                );
            }
        }else if($type == 'url_and_form_field_raw') {

            if($key[0] == 'prod_cat'){

                return self::get_query_params('CAT_LINK', $input_method);
            }

        }else {

            return self::get_query_params($key, $input_method);
        }

    }

    public static function is_number_category($step_number,$id = null, $slug = null){

        $result = false;

        // $term = wbc()->wc->get_term_by('id',$id,'product_cat');

        // if( !empty($term) and !is_wp_error($term) ) {
        //     $term_slug = $term->slug;
        // }  

        if (!empty($id)) {

            // ACTIVE_TODO nid to imliment
            if ($id == wbc()->options->get_option('configuration',($step_number == 1 ?'first_slug':'second_slug'))) {
           
                $result = true;
            }

        }elseif(!empty($slug)){

            if ($slug == wbc()->options->get_option('configuration',($step_number == 1 ?'first_slug':'second_slug'))) {
           
                $result = true;
            }

        }else{

            if (is_product()) {

                global $post;
                if (has_term(wbc()->options->get_option('configuration',($step_number == 1 ?'first_name':'second_name')),'product_cat',$post->ID)) {
               
                    $result = true;
                }

            }else{
                if (get_queried_object()->slug == wbc()->options->get_option('configuration',($step_number == 1 ?'first_slug':'second_slug'))) {
               
                    $result = true;
                }
            }
        }

        // ACTIVE_TODO we may like to publish hook here to suport the pair builders provided by extensions 

        return $result;
    }

    public static function is_first_category($id = null, $slug = null){

        return self::is_number_category(1, $id, $slug);
    }

    public static function is_second_category($id = null, $slug = null){

        return self::is_number_category(2, $id, $slug);
    }

}
