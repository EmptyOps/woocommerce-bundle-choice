<?php add_action('wp_footer' ,function(){

$get_link = /*$_GET*/wbc()->sanitize->_read_global_sanitized('get');
unset($get_link['per_row']);
unset($get_link['shop_view']);
unset($get_link['per_page']);
$get_link = http_build_query($get_link);

if(false){
?>
<script>
	jQuery(document).ready(function($){
		jQuery('.per-page-variation, .products-view-grid_list .shop-view').off('click');
		jQuery('.per-page-variation, .products-view-grid_list .shop-view').each(function(){
			$(this).attr('href',$(this).attr('href')+'&<?php _e($get_link); ?>');
		})
	});
</script>
<?php
}
$get_link = __($get_link);
$inline_script =
    "jQuery(document).ready(function(\$){\n" .
    "    jQuery('.per-page-variation, .products-view-grid_list .shop-view').off('click');\n" .
    "    jQuery('.per-page-variation, .products-view-grid_list .shop-view').each(function(){\n" .
    "        \$(this).attr('href',\$(this).attr('href')+'&" . $get_link . "');\n" .
    "    })\n" .
    "});";

wbc()->load->add_inline_script('', $inline_script, 'common');

	}); 
?>