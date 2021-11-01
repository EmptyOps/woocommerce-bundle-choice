<?php
namespace eo\wbc\controllers\publics;
defined( 'ABSPATH' ) || exit;

class Service {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function run() {		

		$this->add_shortcode();

        $this->discount_service();
	}

    public function discount_service() {

        add_filter('woocommerce_display_product_attributes',function($product_attributes, $product){

            $_certificate_link = $product->get_meta('_certificate_link',true);
            if(!empty($_certificate_link)){

                $product_attributes[ 'attribute__certificate_link' ] = array(
                    'label' => 'Certificate',
                    'value' => "<a href='${_certificate_link}' target='_blank'>".__('Click here','woo-bundle-choice')."</a>",
                );
            }

            return $product_attributes;          

        },20,2);

        add_action('woocommerce_checkout_update_order_review',array(\eo\wbc\controllers\publics\pages\Checkout::instance(),'update_order_review'));

        add_action( 'woocommerce_update_cart_action_cart_updated',function() {
           if(is_array($_POST['cart']) and !empty($_POST['cart'])) {
                $cart = wbc()->session->get('EO_WBC_MAPS');
                if(is_array($cart)){
                    foreach ($_POST['cart'] as $key => $value) {                    
                        
                        if(array_key_exists($key,$cart) and !empty(sanitize_text_field($value['qty']))) {
                            foreach (wc()->cart->cart_contents as $cart_key=>$cart_item)
                            {
                                if($cart[$key]["FIRST"][0]==$cart_item["product_id"] && $cart[$key]["FIRST"][2]==$cart_item["variation_id"]){
                                    
                                    wc()->cart->set_quantity($cart_key,$cart_item['quantity']+( sanitize_text_field($value['qty'])-$cart[$key]['FIRST'][1]));
                                    $cart[$key]['FIRST'][1] = sanitize_text_field($value['qty']);
                                }
                            }               
                        }
                    }
                    wbc()->session->set('EO_WBC_MAPS',$cart);
                }                  
            }
        },10);
        
        $features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array()))));
        
        if( empty(array_intersect(array_values($features),array_keys(wbc()->config->get_builders())))
                or          
            wbc()->options->get_option('configuration','config_category',0) != 1
                or
            wbc()->options->get_option('configuration','config_map',0) != 1
        ){
            return false;
        }
        /**
        *   --------------------------------------------------------------
        *   adding action hook to fees calculation so that we can apply 
        *   discount on specific combinations only.
        *   --------------------------------------------------------------
        */
        add_action( 'woocommerce_cart_calculate_fees',function($cart) {      
               
            if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

            $total_discount=0;

            foreach (wbc()->session->get('EO_WBC_MAPS',array()) as $set) {

                if(count($set)==2){
                    $this->set_discount($set,$total_discount);                                
                }
            }

            $cart->add_fee( __('Discount','woo-bundle-choice'), -$total_discount, true, 'standard' );     
        });
    }

    public function set_discount($set,&$discount) {           
        //wbc()->common->pr($set);
        if(empty($set['FIRST']) || empty($set['SECOND'])) return $discount;

        global $wpdb; 
        
        $first_cat_tax=(wp_get_post_terms($set['FIRST'][0],get_taxonomies()));
        foreach ($first_cat_tax as $key => $cat_tax) {                    
            $first_cat_tax[$key]=$cat_tax->term_taxonomy_id;
        }
        $first_cat_tax=implode(',',$first_cat_tax);

        $second_cat_tax=(wp_get_post_terms($set['SECOND'][0],get_taxonomies()));
        foreach ($second_cat_tax as $key => $cat_tax) {                    
            $second_cat_tax[$key]=$cat_tax->term_taxonomy_id;
        }
        $second_cat_tax=implode(',',$second_cat_tax);

        if(empty($first_cat_tax) or empty($second_cat_tax)) return 0;

        //$query="SELECT `discount` FROM `".$wpdb->prefix."eo_wbc_cat_maps` WHERE  `first_cat_id` in({$first_cat_tax}) and `second_cat_id` in({$second_cat_tax}) or `first_cat_id` in({$second_cat_tax}) and `second_cat_id` in({$first_cat_tax})";                
        $query = apply_filters('eowbc_product_maps',wp_cache_get( 'cache_maps', 'eo_wbc'));        
        $query = array_filter($query,function($_map_) use($first_cat_tax,$second_cat_tax) {
            return ((in_array($_map_['eo_wbc_first_category'],explode(',',$first_cat_tax)) and in_array($_map_['eo_wbc_second_category'],explode(',',$second_cat_tax))) or (in_array($_map_['eo_wbc_first_category'],explode(',',$second_cat_tax)) and in_array($_map_['eo_wbc_second_category'],explode(',',$first_cat_tax))))?true:false;
        });

        
        //$discount_rates=$wpdb->get_results($query,'ARRAY_N');
        $discount_rates = array_column($query,'eo_wbc_add_discount');

        $_first_product = wbc()->wc->eo_wbc_get_product(empty($set['FIRST'][2])?$set['FIRST'][0]:$set['FIRST'][2]);
        $_second_product = wbc()->wc->eo_wbc_get_product(empty($set['SECOND'][2])?$set['SECOND'][0]:$set['SECOND'][2]);

        $discount = 0;

        if(!empty($_first_product) and !empty($_second_product) and !is_wp_error($_first_product) and !is_wp_error($_second_product)){

            $set_total= $_first_product->get_price() *  $set['FIRST'][1]
                            +
                        $_second_product->get_price() * $set['SECOND'][1];

            if(!empty($discount_rates)){

                foreach ($discount_rates as $rate) {
                    
                    $discount_value=($set_total * str_replace('%','',$rate[0]))/100;

                    $set_total-=$discount_value;
                    $discount+=$discount_value;
                }         
            }
        }

        return $discount;
    }        

	function add_shortcode() {

        add_shortcode('eowbc-breadcrumb-category',function(){
            if(!defined('EOWBC_BREADCRUMB_CATEGORY')){
                
                $category_page = \eo\wbc\controllers\publics\pages\Category::instance();
                if(
                ((($category_page->eo_wbc_get_category()== wbc()->options->get_option('configuration','first_slug')
                  OR
                    $category_page->eo_wbc_get_category()== wbc()->options->get_option('configuration','second_slug'))) and !empty(wbc()->sanitize->get('EO_WBC')) )
                ) {

                    wbc()->load->model('publics/component/eowbc_breadcrumb');       
                    echo \eo\wbc\model\publics\component\EOWBC_Breadcrumb::eo_wbc_add_breadcrumb(wbc()->sanitize->get('STEP'),wbc()->sanitize->get('BEGIN')).'<br/><br/>';
                } else {
                    echo '';    
                }
            } else {
                echo '';
            }
            define('EOWBC_BREADCRUMB_CATEGORY',true);
        });

        add_shortcode('eowbc-filter-category',function(){

            $bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));
            if(!empty($bonus_features['filters_shop_cat']) and ( is_shop() || is_product_category()) and empty(wbc()->sanitize->get('EO_WBC'))) {


                \eo\wbc\controllers\publics\pages\Shop_Category_Filter::instance()->init();
                \eo\wbc\controllers\publics\pages\Shop_Category_Filter::instance()->add_filter_widget();
            } else{


                $category_page = \eo\wbc\controllers\publics\pages\Category::instance();
                if(                 
                    (($category_page->eo_wbc_get_category()==wbc()->options->get_option('configuration','first_slug') && wbc()->options->get_option_group('filters_d_fconfig',FALSE) )
                     OR 
                     ($category_page->eo_wbc_get_category()==wbc()->options->get_option('configuration','second_slug') && wbc()->options->get_option_group('filters_s_fconfig',FALSE) ))
                ) {
                    $category_page->filter_showing_status = false;
                    $category_page->add_filter_widget();
                } else{
                    echo '';    
                }
            }
            
        });

		$this->enque_asset();
		wbc()->load->model('publics/component/eowbc_filter_widget');
		$widget = \eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance();
		
        $features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array()))));

        $bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));

        // The two buttons shortcode.
        $configuration_buttons_page = wbc()->options->get_option('configuration','buttons_page',false);

		if( !empty(array_intersect(array_values($features),array_keys(wbc()->config->get_builders()))) and ($configuration_buttons_page===0 or $configuration_buttons_page==='0' or $configuration_buttons_page==2 or $configuration_buttons_page==3) ) {			
            add_shortcode('woo-bundle-choice-btn',function(){
            	echo wbc()->load->template('publics/buttons');
            });                              
        }

        // The specification view shortcode
        if(
            /*wbc()->options->get_option('tiny_features','specification_view_status',false)*/!empty($bonus_features['spec_view_item_page']) and wbc()->options->get_option('tiny_features','specification_view_shortcode_status',false)){

        	add_shortcode('woo-bundle-choice-specification-view',function(){
        		ob_start();
            	wbc()->load->template('publics/features/specification_view');
            	echo ob_get_clean();
            });	
        }

        if(!empty($bonus_features['filters_shortcode'])){
            add_shortcode('wbc-shortcode-filters',function(){
                \eo\wbc\controllers\publics\pages\Shortcode_Filters::instance()->init();
            },10);
        }
        

	}

	public function enque_asset() {		
		add_action( 'wp_enqueue_scripts',function(){
            ob_start();
            ?>
            <script type="text/javascript">
                filter_obj = Object();
                filter_obj.ajaxurl ='<?php echo admin_url('admin-ajax.php'); ?>';
                filter_obj.cat_url ='<?php echo get_option("siteurl")."/index.php/".wbc()->wc->wc_permalink('category_base')."/"; ?>';          
                filter_obj.shop_url = '<?php echo get_option("siteurl")."/index.php/shop/"; ?>';         
                filter_obj.not_required_all_select = true;            
            </script>       
            <?php
            echo ob_get_clean();
			wbc()->load->asset('js','shortcode-filter');		
		}, 10, 1 );
		
	}
}
