<?php
namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin/eowbc_filters');

class Eowbc_Shop_Category_Filter extends Eowbc_Filters{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		$this->tab_key_prefix='sc_';
	}
}


/*$diamond_category = get_term_by( 'slug','eo_diamond_shape_cat','product_cat');
$setting_category = get_term_by( 'slug','eo_setting_shape_cat','product_cat');


if((is_wp_error($diamond_category) or is_wp_error($setting_category) or empty($diamond_category) or empty($setting_category)) and !is_ajax()) {
	ob_start();
	?>
		<script>
			jQuery(document).ready(function($){
				$("[name='first_category_altr_filt_widgts'],[name='second_category_altr_filt_widgts']").on('change',function(){
					eowbc_toast_common('warning','For alternate widget templates to setup preview filters and make your work easy to set up them, it is recommended that you add sample data and then select and save your desired template. If the sample is not available no preview filters can be set and you will need to add filters manually.',15000);
                    
				});
			});
		</script>
	<?php
	echo ob_get_clean();
}*/