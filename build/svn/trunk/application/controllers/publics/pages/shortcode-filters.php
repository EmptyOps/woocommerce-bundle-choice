<?php
namespace eo\wbc\controllers\publics\pages;
defined( 'ABSPATH' ) || exit;

class Shortcode_Filters extends Category {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {        
        $this->is_shortcode_filter = true;
        $this->filter_prefix ='shortflt_';
    }

    public function init($category = '') {
        
        // parent::instance()->is_shortcode_filter = true;
        // parent::instance()->filter_prefix ='shortflt_';
// ACTIVE_TODO below commented code is part of the unresolved merge conflict. so need to take that into consideration and properly resolve the merge conflict. only the parent::init() call is considered and added below comment. -- to h 
// <<<<<<< HEAD
//         add_filter('eowbc_filter_widget_category_json',function($category){
//             if(!empty($this->_category)){
//                 return $this->_category;
//             }
//             return $category;
//         });

//         parent::init();                    
// =======
//         parent::init();
//         $this->_category = $category;
// >>>>>>> d0ee5bc47d10084771d08a5586b84321af4742af
       
        // add_filter('eowbc_filter_widget_category_json',function($category){
        //     if(!empty($this->_category)){
        //         return $this->_category;
        //     }
        //     return $category;
        // });

        parent::init();                 
        // $this->_category = $category;

        add_filter( 'eowbc_filter_widget_loader','__return_false');
    }    
}