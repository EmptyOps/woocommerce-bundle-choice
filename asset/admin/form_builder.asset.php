<script type="text/javascript">
window.document.splugins = window.document.splugins || {};
window.document.splugins.common = window.document.splugins.common || {};

window.document.splugins.common.admin = window.document.splugins.common.admin || {};

window.document.splugins.common.admin.form_builder = window.document.splugins.common.admin.form_builder || {};

window.document.splugins.common.admin.form_builder.core = function( configs ) {
	this.configs = jQuery.extend({}, {}/*default configs*/, configs);	

    //	terminology: das=dynamic add support 
    var das_template = function( tmpl_id, templating_lib ) {

    	return window.document.splugins.templating.api.get_template( tmpl_id, templating_lib );
    };

	var das_apply_template_data = function( template, template_data, templating_lib ) {

    	return window.document.splugins.templating.api.apply_data( template, template_data, templating_lib );
    };

    var das_template_append = function( template_content, location, related_element_id ) {

    	let related_element = jQuery('#'+related_element_id);	

    	if( location == 'before' ) {

    		jQuery( template_content ).insertBefore( related_element );	
    	}
    };

    var das_added_counter = function( plus_button_id, action ) {

    	let added_counter_ele = jQuery('#'+plus_button_id+'_added_count');	

    	let added_counter = added_counter_ele.val();

    	if( action == 'increment' ) {

    		added_counter_ele.val( added_counter + 1 );
    	} else if( action == 'decrement' ) {

    		added_counter_ele.val( added_counter - 1 );
    	} else {

    		return added_counter;	
    	}
    };

    var das_add = function( template, plus_button_id, templating_lib ) {

    	var added_counter = das_added_counter( plus_button_id, 'get' ) + 1;

    	var template_data = { data : { added_counter: this.configs.das.added_counter_sep + added_counter + this.configs.das.added_counter_sep } };	

    	var template_content = das_apply_template_data( template, template_data, templating_lib );

    	das_template_append( template_content, 'before', plus_button_id );

    	das_added_counter( plus_button_id, 'increment' );
    };

	var das_populate_field_data = function( field_id, type, value, ui_framework ) {

    	return window.document.splugins.templating.core.get_template( tmpl_id, templating_lib );
    };

    return {

        das_add: function( tmpl_id, plus_button_id, templating_lib ) {

            // this.subjects.push( new window.document.splugins.events.subject( feature_unique_key, notifications ) );

            return das_add( das_template( tmpl_id, templating_lib ), plus_button_id, templating_lib );
        }, 
        das_edit_populate: function( tmpl_id, plus_button_id, templating_lib, added_count, fields_data, ui_framework ) {

        	var template = das_template( tmpl_id, templating_lib );

            // loop by added_count 
            for(var i=1; i <= added_count; i++ ) {

            	// and then call the private das_add 
            	das_add( template, plus_button_id, templating_lib );	

            	//	and then the populate or extend add core to accpet the populate layer so that it populates even before the template is bound to the dom, in this case we will not need the set val functions support but anyawy we need to do it standard way that is reliable and the former approach will require maintaining many additional placeholders so that will not work 

            }
        }

    }
};

window.document.splugins.common.admin.form_builder.api = window.document.splugins.common.admin.form_builder.core( window.document.splugins.common.parseJSON( '<?php echo json_encode($configs);?>', false ) );

</script>