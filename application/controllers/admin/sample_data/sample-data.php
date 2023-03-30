<?php 
namespace eo\wbc\controllers\admin\sample_data;

defined( 'ABSPATH' ) || exit;

class Sample_Data {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    protected $feature_key = '';  

    protected $feature_title = null;
    protected $model = null;
    protected $help_info = null;

    private function __construct() {        
    }

    public function init() {
        
        $callback = $this->get_page( $this->model->data_template()->get_attributes(), $this->model->data_template()->get_categories(), $this->model->data_template()->get_maps() );
        $position = empty($position)?66:$position;    
        add_menu_page( eowbc_lang('BUNDLOICE (formerly Woo Choice Plugin)'),eowbc_lang('BUNDLOICE (formerly Woo Choice Plugin)'),'manage_options','eowbc',$callback,$this->get_icon_url(),$position );
    }

    public function get_icon_url() {
        return esc_url(apply_filters( 'eowbc_icon_url',constant('EOWBC_ICON')));
    }

    public function get_model(){
        return $this->model;
    }

    public function get_page(array $_atttriutes, array $_category, array $_maps){

        $callback = function() use(&$_atttriutes, &$_category, &$_maps){

            wbc()->load->template('admin/menu/page/header-part',array( "mode"=>"plain" ));
            
            $_step=1;

            // wbc()->load->model('admin/sample_data/eowbc_jewelry');
            // $res = \eo\wbc\model\admin\sample_data\Eowbc_Sample_Data::instance()->process_post( $_step, $_category, $_atttriutes ); 
            $res = $this->model->process_post( $_step, $_category, $_atttriutes, $_maps, $this->feature_key );

            wbc()->load->template('admin/sample_data/main', array("feature_title"=>$this->feature_title,'feature_key'=>$this->feature_key,"_step"=>$_step,"number_of_step"=>$this->model->number_of_step(),"_atttriutes"=>$_atttriutes,"_category"=>$_category,"help_info"=>$this->help_info,'sample_data_obj'=>$this)); 

            wbc()->load->template('admin/menu/page/footer-part',array( "mode"=>"plain" ));
        };
        return $callback;
    }

}
