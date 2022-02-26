<?php
defined( 'ABSPATH' ) || exit;

wbc()->load->model('admin\form-builder');
wbc()->load->model('admin/eowbc_filters');

$form = array();

$form['id']='eowbc_filters';
$form['title']='Filter Settings';
$form['method']='POST';
$form['tabs'] = true;

$form['data'] = eo\wbc\model\admin\Eowbc_Filters::instance()->get( eo\wbc\controllers\admin\menu\page\Filters::get_form_definition() );
$form['attr']= array('data-is_per_tab_save="true"');

// wbc()->load->model('admin\form-builder');
\eo\wbc\model\admin\Form_Builder::instance()->build($form);
wbc()->load->asset('js','admin/filter');

$_childs = array();

$categories = \eo\wbc\model\Category_Attribute::instance()->get_category();
$attributes = \eo\wbc\model\Category_Attribute::instance()->get_attributs();

if(!empty($categories) and is_array($categories)){
	foreach ($categories as $id => $label) {
		$term = wbc()->wc->get_term_by('id',$id,'product_cat');		
		$term_list = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'menu_order', 'parent'=>$id));
		if(!empty($term_list)){
			$child = array();
			foreach ($term_list as $term) {
				$child[$term->term_id] = $term->name;
			}
			$_childs[$id] = $child;
		}
	}
}

if(!empty($attributes) and is_array($attributes)){
	foreach ($attributes as $slug => $value) {

		$term = \eo\wbc\model\Category_Attribute::instance()->get_attribute($slug);
		$term = wbc()->wc->eo_wbc_get_attribute($term->attribute_id);
		
		if(!empty($term) && !is_wp_error($term)) {			
			$taxonomies=get_terms(array('taxonomy'=>wc_attribute_taxonomy_name_by_id($term->id),'hide_empty'=>false));

			if(is_wp_error($taxonomies)){

				$taxonomies=get_terms(wc_attribute_taxonomy_name_by_id($term->id),array('hide_empty'=>false));
			}
			
			if(is_wp_error($taxonomies) or empty($taxonomies)) continue;

			$child = array();
			foreach ($taxonomies as $taxonomy){				
				$child[$taxonomy->slug]=$taxonomy->name;
        	}
        	$_childs['pa_'.$term->id] = $child;
        }		
	}
}

?>

<script type="text/javascript">
	jQuery(window).load(function() {
		$ = jQuery;
		
		_childs = JSON.parse('<?php echo str_replace('"','\"',str_replace("'","\'",json_encode($_childs))); ?>');
		jQuery(".ui.dropdown:has(#d_fconfig_filter)").dropdown({
			onChange:function() {
				let filter_field = $(this).dropdown('get value');
				if(filter_field!==''){
					//if(_childs.hasOwnProperty(filter_field)) {
					if(_childs.hasOwnProperty(filter_field) || _childs.hasOwnProperty('pa_'+filter_field)) {

						let _child_data = false ;
						if(_childs.hasOwnProperty(filter_field)){
							_child_data = _childs[filter_field];
						} else if(_childs.hasOwnProperty('pa_'+filter_field)) {
							_child_data = _childs['pa_'+filter_field];
						}
						let html = '';
						//jQuery.each(_childs[filter_field],function(index,item) {
						jQuery.each(_child_data,function(index,item) {
						    html+='<div class="item" data-value="'+index+'">'+item+'</div>';
						});
						jQuery(".ui.dropdown:has(#d_fconfig_elements)").find(".menu").html(html);
					}
				} else {
					jQuery(".ui.dropdown:has(#d_fconfig_elements)").find(".menu").html("");
				}
			}
		
		});

		jQuery(".ui.dropdown:has(#s_fconfig_filter)").dropdown({
				onChange:function() {
					let filter_field = $(this).dropdown('get value');
					if(filter_field!==''){
						//if(_childs.hasOwnProperty(filter_field)) {
						if(_childs.hasOwnProperty(filter_field) || _childs.hasOwnProperty('pa_'+filter_field)) {

							let _child_data = false ;
							if(_childs.hasOwnProperty(filter_field)){
								_child_data = _childs[filter_field];
							} else if(_childs.hasOwnProperty('pa_'+filter_field)) {
								_child_data = _childs['pa_'+filter_field];
							}
							let html = '';
							//jQuery.each(_childs[filter_field],function(index,item) {
							jQuery.each(_child_data,function(index,item) {
							    html+='<div class="item" data-value="'+index+'">'+item+'</div>';
							});
							jQuery(".ui.dropdown:has(#s_fconfig_elements)").find(".menu").html(html);
						}
					} else {
						jQuery(".ui.dropdown:has(#s_fconfig_elements)").find(".menu").html("");
					}
				}
			
		});

		let pids = JSON.parse('<?php echo json_encode(get_posts( array('post_type' => 'product','numberposts' => -1,'post_status' =>array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash'),'fields' => 'ids',) )); ?>');
		let batches = Math.ceil(pids.length / 100);
		console.log(batches);
		function eowbc_sync_filter_products(batch) {
			if(batch>=batches){
				jQuery("#filter_sync_button").removeClass('disabled');
			} else {

				console.log(pids.slice(batch*100,(batch+1)*100));

				let data = {	                
	                '_wpnonce': '<?php echo wp_create_nonce('sync_filter_products');?>',
	                'action':'eowbc_ajax',
	                'resolver':'sync_filter_products',
	                'ids':pids.slice(batch*100,(batch+1)*100)
	            };	

	            jQuery.ajax({
		            url:'<?php _e(admin_url( 'admin-ajax.php' )); ?>',
		            type: 'POST',
		            data: data,
		            beforeSend:function(xhr){ },
		            success:function(result,status,xhr){
		                eowbc_sync_filter_products(batch+1);
		            },
		            error:function(xhr,status,error){
		                eowbc_sync_filter_products(batch);
		            }
		        });	
			}
		}

		jQuery("#filter_sync_button:not('disabled')").on('click',function(e){
			e.preventDefault();
			e.stopPropagation();
			jQuery("#filter_sync_button").addClass('disabled');
			eowbc_sync_filter_products(0);
		});
	});	
</script>