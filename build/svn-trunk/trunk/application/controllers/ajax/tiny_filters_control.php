<?php
if(isset($_POST['slug']) && isset($_POST['type']) ) {
    wbc()->load->model('publics/component/eowbc_filter_widget');
    $widget = \eo\wbc\model\publics\component\EOWBC_Filter_Widget::instance();       
        
    $slug = wbc()->sanitize->post('slug');

    $term=wbc()->wc->get_term_by('slug',$slug,'product_cat');

    $id=$term->term_id;
    $label=wbc()->sanitize->post('title');
    $type=wbc()->sanitize->post('type');

    $filter=$widget->range_steps($id,$label,$type);                                                     
    $widget->input_dropdown($filter['slug'],
            array_column($filter['list'],'name'),
            array_column($filter['list'],'slug'),
            $id,
            $type,
            $label
    );
}
else{
   	echo '';
}