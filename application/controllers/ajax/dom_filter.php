<?php 
ob_start();
wbc()->load->model('publics/component/eowbc_filter_widget');
add_filter('eowbc_filter_widget_category',function($category){
	if(!empty(wbc()->sanitize->post('category'))) {
		return wbc()->sanitize->post('category');
	}
	return $category;
});
	
\eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance()->init($this->is_shop_cat_filter,$this->filter_prefix,false);
$this->filter_showing_status = true;
do_action('eowbc_category_after_filter_rendered');
echo ob_get_clean();
die();
