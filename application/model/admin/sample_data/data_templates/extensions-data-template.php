<?php


/*
*	extensions template for Sample data.
*/

namespace eo\wbc\model\admin\sample_data\data_templates;

defined( 'ABSPATH' ) || exit;

class Extensions_Data_Template extends \eo\wbc\model\admin\sample_data\data_templates\Sample_Data_Template {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

    protected $singleton_function = null;
    
    $file_suffix = (WBC_SCRIPT_DEBUG) ? '' : '.min';

    private $first_icon = 'first_icon'.$file_suffix .'.png';
    private $second_icon = 'second_icon'.$file_suffix .'.png';
    private $preview_icon = 'preview_icon'.$file_suffix .'.png';

	private function __construct() {

        // NOTE: This function are returning empty array intentionally so that if the extended class of particular extension is not implementing any data related to this function then the underlying leyers will call this overrided function and return empty array so that nothing is set up as far as sample data is considered. and if this function is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
	}

    public function get_attributes($feature_key = null/*ACTIVE_TODO The null value set here is temporary, and the actual value should be set as and when required.*/, $args = null) {

        // NOTE: This function are returning empty array intentionally so that if the extended class of particular extension is not implementing any data related to this function then the underlying leyers will call this overrided function and return empty array so that nothing is set up as far as sample data is considered. and if this function is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }

    public function get_categories($feature_key = null/*ACTIVE_TODO The null value set here is temporary, and the actual value should be set as and when required.*/, $args = null) {
    
        // NOTE: This function are returning empty array intentionally so that if the extended class of particular extension is not implementing any data related to this function then the underlying leyers will call this overrided function and return empty array so that nothing is set up as far as sample data is considered. and if this function is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }

    public function get_maps() {
    
        // NOTE: This function are returning empty array intentionally so that if the extended class of particular extension is not implementing any data related to this function then the underlying leyers will call this overrided function and return empty array so that nothing is set up as far as sample data is considered. and if this function is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }

    public function get_filters($__cat__, $__att__) {
    
        // NOTE: This function are returning empty array intentionally so that if the extended class of particular extension is not implementing any data related to this function then the underlying leyers will call this overrided function and return empty array so that nothing is set up as far as sample data is considered. and if this function is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }  

    public function get_products($feature_key = null/*ACTIVE_TODO The null value set here is temporary, and the actual value should be set as and when required.*/, $args = null) {
    
        // NOTE: This function are returning empty array intentionally so that if the extended class of particular extension is not implementing any data related to this function then the underlying leyers will call this overrided function and return empty array so that nothing is set up as far as sample data is considered. and if this function is not overrided then the perent class would return the default sample data, which we do not want any particular extension to setup if they do not need it.
        return array();
    }    

    public function set_configs_after_categories( $catat_category, $feature_key = null ) {

        // ACTIVE_TODO nothing added here so far but we can add some fundamental and generic operation related to extensions. -- to h  
    }

    public function set_configs_after_attributes() {

        // ACTIVE_TODO nothing added here so far but we can add some fundamental and generic operation related to extensions. -- to h
    }

    public function generate_assets($feature_key, $args = array()) {

        $parsed = \eo\wbc\model\utilities\SP_Extensions_Api::call($args['api_setting']['host'].$args['api_setting']['endpoint'], "ihk=".$args['api_setting']['ihk'], array('sp_api_sf' => $args['api_setting']['sp_api_sf'], 'sp_api_fk' => $feature_key));
        // wbc_pr('generate_assets 11');
        // wbc_pr($args['api_setting']['host']);
        // wbc_pr($args['api_setting']['sp_api_sf']);
        
        // wbc_pr($parsed);
        // die('generate_assets 2222');

        if ('error' == $parsed['sub_type']) {

            throw new \Exception($parsed["sub_msg"], 1);
        }

        return \eo\wbc\system\core\publics\Eowbc_Base_Model_Publics::handle_response($parsed);
        
    }
}
