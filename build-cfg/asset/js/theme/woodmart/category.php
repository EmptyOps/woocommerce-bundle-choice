<?php add_action('wp_footer' ,function(){

$get_link = $_GET;
unset($get_link['per_row']);
unset($get_link['shop_view']);
unset($get_link['per_page']);
$get_link = http_build_query($get_link);

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
	}); 
?>