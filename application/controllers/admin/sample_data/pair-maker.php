<?php 
namespace eo\wbc\controllers\admin\sample_data;

defined( 'ABSPATH' ) || exit;

class Pair_Maker extends Sample_Data {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private $feature_key = 'pair_maker';  // TODO set the right key here

    private function __construct() {        
        $this->feature_title = $this->feature_key;    // TODO get it dynamically from config file using feature key

        wbc()->load->model('admin/sample_data/eowbc_sample_data');
        wbc()->load->model('admin/sample_data/eowbc_pair_maker');
        $this->model = \eo\wbc\model\admin\sample_data\Eowbc_Pair_Maker::instance();
    }

    public function init() {
        
        parent::init();
    }

}
