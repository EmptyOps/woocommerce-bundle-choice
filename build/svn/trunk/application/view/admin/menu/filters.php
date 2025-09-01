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
		$term_taxonomy_id = $term->term_taxonomy_id;
		
		$term_list = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'menu_order', 'parent'=>$id));
		if(!empty($term_list)){
			$child = array();
			foreach ($term_list as $term) {
				$child[$term->term_id] = $term->name;
			}
			$_childs[$term_taxonomy_id] = $child;
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

$_childs_json_encoded = json_encode($_childs);
$_childs_json_escaped = str_replace('"', '\"', str_replace("'", "\'", $_childs_json_encoded));
// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.

$inline_script = 
	"jQuery(window).load(function() {\n" .
	"    \$ = jQuery;\n" .
	"\n" .
	"    _childs = JSON.parse('".$_childs_json_escaped."');\n" .
	"    jQuery(\".ui.dropdown:has(#d_fconfig_filter)\").dropdown({\n" .
	"        onChange:function() {\n" .
	"            let filter_field = \$(this).dropdown('get value');\n" .
	"            if(filter_field !== '') {\n" .
	"				//if(_childs.hasOwnProperty(filter_field)) {\n".
	"                if(_childs.hasOwnProperty(filter_field) || _childs.hasOwnProperty('pa_'+filter_field)) {\n" .
	"                    let _child_data = false ;\n" .
	"                    if(_childs.hasOwnProperty(filter_field)) {\n" .
	"                        _child_data = _childs[filter_field];\n" .
	"                    } else if(_childs.hasOwnProperty('pa_'+filter_field)) {\n" .
	"                        _child_data = _childs['pa_'+filter_field];\n" .
	"                    }\n" .
	"                    let html = '';\n" .
	"					//jQuery.each(_childs[filter_field],function(index,item) {\n".
	"                    jQuery.each(_child_data, function(index, item) {\n" .
	"                        html += '<div class=\"item\" data-value=\"'+index+'\">'+item+'</div>';\n" .
	"                    });\n" .
	"                    jQuery(\".ui.dropdown:has(#d_fconfig_elements)\").find(\".menu\").html(html);\n" .
	"                }\n" .
	"            } else {\n" .
	"                jQuery(\".ui.dropdown:has(#d_fconfig_elements)\").find(\".menu\").html(\"\");\n" .
	"            }\n" .
	"        }\n" .
	"    });\n" .
	"\n" .
	"    jQuery(\".ui.dropdown:has(#s_fconfig_filter)\").dropdown({\n" .
	"        onChange:function() {\n" .
	"            let filter_field = \$(this).dropdown('get value');\n" .
	"            if(filter_field !== '') {\n" .
	"				//if(_childs.hasOwnProperty(filter_field)) {\n".
	"                if(_childs.hasOwnProperty(filter_field) || _childs.hasOwnProperty('pa_'+filter_field)) {\n" .
	"                    let _child_data = false ;\n" .
	"                    if(_childs.hasOwnProperty(filter_field)) {\n" .
	"                        _child_data = _childs[filter_field];\n" .
	"                    } else if(_childs.hasOwnProperty('pa_'+filter_field)) {\n" .
	"                        _child_data = _childs['pa_'+filter_field];\n" .
	"                    }\n" .
	"                    let html = '';\n" .
	"					//jQuery.each(_childs[filter_field],function(index,item) {\n".
	"                    jQuery.each(_child_data, function(index, item) {\n" .
	"                        html += '<div class=\"item\" data-value=\"'+index+'\">'+item+'</div>';\n" .
	"                    });\n" .
	"                    jQuery(\".ui.dropdown:has(#s_fconfig_elements)\").find(\".menu\").html(html);\n" .
	"                }\n" .
	"            } else {\n" .
	"                jQuery(\".ui.dropdown:has(#s_fconfig_elements)\").find(\".menu\").html(\"\");\n" .
	"            }\n" .
	"        }\n" .
	"    });\n" .
	"});";
wbc()->load->add_inline_script('', $inline_script, 'common-admin');
?>

