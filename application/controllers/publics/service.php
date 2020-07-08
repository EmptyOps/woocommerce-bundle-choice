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
        echo $first_cat_tax.'<br/>';
        echo $second_cat_tax.'<br/>';
        wbc()->common->pr($query);
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
		$this->enque_asset();
		wbc()->load->model('publics/component/eowbc_filter_widget');
		$widget = \eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance();
		// The two buttons shortcode.
        $configuration_buttons_page = wbc()->options->get_option('configuration','buttons_page',false);
		if( $configuration_buttons_page===0 or $configuration_buttons_page==='0' or $configuration_buttons_page==2 or $configuration_buttons_page==3 ) {			
            add_shortcode('woo-bundle-choice-btn',function(){
            	echo wbc()->load->template('publics/buttons');
            });                              
        }

        // The specification view shortcode
        if(wbc()->options->get_option('tiny_features','specification_view_status',false) and wbc()->options->get_option('tiny_features','specification_view_shortcode_status',false)){

        	add_shortcode('woo-bundle-choice-specification-view',function(){
        		ob_start();
            	wbc()->load->template('publics/features/specification_view');
            	echo ob_get_clean();
            });	
        }
        $_category=array();
        $_attribute=array();

        add_shortcode('woo_custome_filter_begin',function() use(&$widget){
            ob_start();
                ?>
                
                    <form method="GET" class="woo_custome_filter_short_form">
                        <input type="hidden" name="woo_custome_filter" value="1"/>
                        <div class="filter_container" id="filter_container">
                <?php
            return ob_get_clean();
        },10);

        add_shortcode('woo_custome_filter_end',function($config) use(&$widget,&$_category,&$_attribute){
                ob_start();
                extract( shortcode_atts( array(
                    'filter_size'=>2
                ), $config,'woo_custome_filter_end') );

                $config_data=unserialize(get_option('woo_custome_filter_widget_config'));                    

                ?>
                            <a href="#" class="woo-custome-filter-redirect" id="woo-custome-filter-redirect"><?php echo isset($config_data['submit_text'])?$config_data['submit_text']:'OK'; ?></a>
                        </div>                            
                        <input type="hidden" name="_category" value="<?php echo implode(',',$_category) ?>"/>
                        <input type="hidden" name="_attribute" value="<?php echo implode(',',$_attribute) ?>"/>
                    </form>      
                    <?php if(is_array($config_data) and !empty($config_data)): ?>                    
                        <style type="text/css">
                            .filter_container select{
                                /*border: 1px solid <?php //echo $config_data['dropdown_border_color'];?>;
                                color: <?php //echo $config_data['dropdown_font_color'];?>;
                                background-color: <?php //echo $config_data['dropdown_back_color'];?>;
                                padding: <?php //echo $config_data['dropdown_padding'];?>px;
                                font-size: <?php //echo $config_data['dropdown_font_size'];?>;
                                <?php //echo $config_data['dropdown_inline_css'];?>;*/
                            }
                            .filter_container{
                                display: grid;
                                grid-template-columns: <?php for ($i=0; $i < $filter_size ; $i++) { echo 'auto ';} ?> max-content;
                            }
                            .woo-custome-filter-redirect{                                                                        
                                text-decoration: none;
                                align-self: center;                                    
                                /*color: <?php //echo $config_data['submit_font_color'];?>;
                                background-color: <?php //echo $config_data['submit_back_color'];?>;
                                border: 1px solid <?php //echo $config_data['submit_border_color'];?>;
                                padding: <?php //echo $config_data['submit_padding'];?>px !important;
                                font-size:<?php //echo $config_data['submit_font_size'];?>px !important;
                                <?php //echo $config_data['submit_inline_css'];?>;*/
                            }
                            @media only screen and (max-width: 600px) {
                              .woo-custome-filter-redirect{
                                width: 100%;
                              }
                              .filter_container{
                                grid-template-columns: auto;
                              }
                            }
                            <?php //echo $config_data['submit_add_css']; ?>
                            <?php //echo $config_data['dropdown_add_css']; ?>
                        </style>
                    <?php endif; ?>                        
                <?php
                wp_register_script('woo_custome_filter_shortcode_js',plugin_dir_url( __FILE__ ).'/application/frontend/js/shortcode.js');
                wp_enqueue_script('woo_custome_filter_shortcode_js');
                wp_localize_script('woo_custome_filter_shortcode_js','filter_ob',array(
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'cat_url'=> get_option('siteurl').'/product-category/',
                    'shop_url'=>get_permalink(wc_get_page_id('shop')),
                    'not_required_all_select'=>$config_data['flexible_filter']
                    )
                ) ;
                return ob_get_clean();
            },10);

            add_shortcode('woo_custome_filter',function($config) use(&$widget,&$_category,&$_attribute){                    
                ob_start();                        
                    extract( shortcode_atts( array(
                        'input'=>'dropdown',
                        'id'=>'0',
                        'label'=>'Title',
                        'type'=>'0',
                        'node_type'=>'parent',
                        'parent_node'=>'',
                        'node_name'=>''
                    ), $config,'woo_custome_filter') );

                    $this->enque_asset();
                    $term=null;

                    if($type=='0'){
                        $term=get_term_by('id',$id,'product_cat');
                        if(@$term->slug){
                            $_category[]=@$term->slug;
                        }
                    }
                    elseif($type=='1'){
                        $term=\eo\wbc\model\Category_Attribute::instance()->get_attribute($id);
                        $_attribute[]=$id;                        
                    }
               
                    ?><div data-node-name="<?php echo $node_name; ?>" data-node-id="<?php echo $id; ?>"> <?php
                        $filter=$widget->range_steps($term->attribute_id,$label,$type);                                               
                        if($filter){
                            $widget->input_dropdown(
                                    $id,
                                    array_column($filter['list'],'name'),
                                    array_column($filter['list'],'slug'),
                                    $id,
                                    $type,
                                    $label
                                );                                     
                        }
                    ?></div> <?php  
                    
                    echo "<script>console.log('".$parent_node." ".$node_type." ".$node_name."');</script>";

                    if(!empty($parent_node) && $node_type=='Child'){
                        ?>
                            <script>
                                jQuery(document).ready(function($){
                                    bind_dependency("<?php echo $parent_node ?>","<?php echo $node_name; ?>","change");
                                });
                            </script>
                        <?php
                    }
                return ob_get_clean();
            },10);

            add_shortcode('woo_custom_filter_widget_filters',function($config) use(&$widget){
                
               
                    wp_register_script( 'wcfw_filter',plugin_dir_url(__FILE__).'js/wcfw_filter.js',array('jquery'));
                    wp_enqueue_script( 'wcfw_filter');

                    wp_localize_script('wcfw_filter','eo_wcfw_object',array(
                        'eo_product_url'=>'',
                        //'eo_view_tabular'=>($current_category=='solitaire'?1:0),
                        'disp_regular'=>get_option('eo_wbc_e_tabview_status',false)?1:0,
                        'eo_admin_ajax_url'=>admin_url( 'admin-ajax.php'),
                        'eo_part_site_url'=>get_site_url().'/index.php',
                        'eo_part_end_url'=>'/',
                        'eo_cat_site_url'=>site_url(),
                        'eo_cat_query'=>'/?'.http_build_query($_GET),
                        'ajax_url'=>get_permalink(wc_get_page_id( 'shop' ))
                    ));  

                    wp_register_style( 'wcfw_style',plugin_dir_url(__FILE__).'css/fomantic/semantic.min.css',true);
                    wp_enqueue_style( 'wcfw_style' );

                    wp_register_script( 'wcfw_script',plugin_dir_url(__FILE__).'js/fomantic/semantic.min.js',array('jquery'));
                    wp_enqueue_script( 'wcfw_script');                       
              
                /*add_action( 'woocommerce_before_shop_loop',function() use(&$widget){*/
                        $this->enque_asset();
                        //$widget->get_widget();
                                                            
                /*},30);*/
            });
	}

	public function enque_asset() {		
		add_action( 'wp_enqueue_scripts',function(){
            ob_start();
            ?>
            <script type="text/javascript">
                filter_obj = Object();
                filter_obj.ajaxurl ='<?php echo admin_url('admin-ajax.php'); ?>';
                filter_obj.cat_url ='<?php echo get_option("siteurl")."/index.php/product-category/"; ?>';          
                filter_obj.shop_url = '<?php echo get_option("siteurl")."/index.php/shop/"; ?>';         
                filter_obj.not_required_all_select = true;            
            </script>       
            <?php
            echo ob_get_clean();
			wbc()->load->asset('js','shortcode-filter');		
		}, 10, 1 );
		
	}
}
