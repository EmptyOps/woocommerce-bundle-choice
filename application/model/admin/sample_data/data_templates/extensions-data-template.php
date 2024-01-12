<?php


/*
*	extensions template for Sample data.
*/

namespace eo\wbc\model\admin\sample_data\data_templates;

defined( 'ABSPATH' ) || exit;

class Extensions_Data_Template extends Sample_Data_Template {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

    protected $singleton_function = null;

    private $first_icon = 'first_icon.png';
    private $second_icon = 'second_icon.png';
    private $preview_icon = 'preview_icon.png';

	private function __construct() {

        NOTE:This function are returning empty array intesnaly so that if the extended class of particular extension  is not implementing any data related to the function then the underlying leyers call this override function and return  empty array so that nothing is a set up as per as sample data is considered. and if this is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
	}

    public function get_attributes() {

        NOTE:This function are returning empty array intesnaly so that if the extended class of particular extension  is not implementing any data related to the function then the underlying leyers call this override function and return  empty array so that nothing is a set up as per as sample data is considered. and if this is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }

    public function get_categories() {
    
        NOTE:This function are returning empty array intesnaly so that if the extended class of particular extension  is not implementing any data related to the function then the underlying leyers call this override function and return  empty array so that nothing is a set up as per as sample data is considered. and if this is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }

    public function get_maps() {
    
        NOTE:This function are returning empty array intesnaly so that if the extended class of particular extension  is not implementing any data related to the function then the underlying leyers call this override function and return  empty array so that nothing is a set up as per as sample data is considered. and if this is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }

    public function get_filters($__cat__, $__att__) {
    
        NOTE:This function are returning empty array intesnaly so that if the extended class of particular extension  is not implementing any data related to the function then the underlying leyers call this override function and return  empty array so that nothing is a set up as per as sample data is considered. and if this is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }  

    public function get_products() {
    
        NOTE:This function are returning empty array intesnaly so that if the extended class of particular extension  is not implementing any data related to the function then the underlying leyers call this override function and return  empty array so that nothing is a set up as per as sample data is considered. and if this is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }    

    public function set_configs_after_categories($catat_category,$feature_key = null ) {

        ACTIVE_TODO nothing added here so far but we can add some fundamental and generic operation related to extension. -- to h  
    }

    public function set_configs_after_attributes() {

        ACTIVE_TODO nothing added here so far but we can add some fundamental and generic operation related to extension. -- to h
    }

}
