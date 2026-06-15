<?php 
namespace eo\wbc\controllers\admin\sample_data;

defined( 'ABSPATH' ) || exit;

class Filters_Shortcode extends Sample_Data {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {        

        $this->feature_key = 'filters_shortcode';  

        $this->feature_title = wbc()->config->get_bonus_features()[$this->feature_key];    
        $this->help_info[2] = "After this step is done, you should add the shortcode [...] to the page where you want to display filters";   //add help info for step 2

        wbc()->load->model('admin/sample_data/sp_wbc_sample_data');
        wbc()->load->model('admin/sample_data/sp_wbc_filters_shortcode');
        $this->model = \eo\wbc\model\admin\sample_data\SP_WBC_Filters_Shortcode::instance();
    }

    public function init() {
        
        parent::init();
    }

}
