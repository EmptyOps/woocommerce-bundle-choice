<?php 
if(false){
?>
<script type="text/javascript">
window.document.splugins = window.document.splugins || {};
window.document.splugins.common = window.document.splugins.common || {};

window.document.splugins.common.admin = window.document.splugins.common.admin || {};

window.document.splugins.common.admin.form_builder = window.document.splugins.common.admin.form_builder || {};

window.document.splugins.common.admin.form_builder.core = function( configs ) {

    var _this = this; 

    // console.log( "form_builder configs ");
    // console.log( configs );
	_this.configs = jQuery.extend({}, {}/*default configs*/, configs);	
    // console.log( _this.configs );    

    //	terminology: das=dynamic add support 
    var das_template = function( tmpl_id, templating_lib ) {

    	return window.document.splugins.templating.api.get_template( tmpl_id, templating_lib );
    };

	var das_apply_template_data = function( template, template_data, templating_lib ) {

    	return window.document.splugins.templating.api.apply_data( template, template_data, templating_lib );
    };

    var das_template_append = function( template_content, location, related_element_id ) {

    	let related_element = jQuery('#'+related_element_id).parent().closest('.fields');	

    	if( location == 'before' ) {

    		jQuery( template_content ).insertBefore( related_element );	
    	}
    };

    var das_added_counter_format = function( added_counter ) {

        return ( _this.configs.das.added_counter_sep + added_counter + _this.configs.das.added_counter_sep );   
    };

    var das_added_counter = function( plus_button_id, action ) {

    	let added_counter_ele = jQuery('#'+plus_button_id+'_added_count');	

        // ACTIVE_TODO bring all the common js function from old CI repo and publish that under the common namespace. -- to d 
        //     ACTIVE_TODO and then use that only below -- to d 
        console.log( "added_counter_ele.val() " + added_counter_ele.val() );
        console.log( parseInt(added_counter_ele.val()) ) ;  
    	let added_counter = parseInt( added_counter_ele.val() );
        added_counter = Number.isNaN(added_counter) ? 0 : added_counter;
        console.log( added_counter );  

    	if( action == 'increment' ) {

    		added_counter_ele.val( added_counter + 1 );
    	} else if( action == 'decrement' ) {

    		added_counter_ele.val( added_counter - 1 );
    	} else {

    		return added_counter;	
    	}
    };

    var das_init_fields = function( plus_button_id, added_counter ) {

        console.log( "das_fields " + jQuery('#'+plus_button_id).data('das_fields') );   
        console.log( jQuery('#'+plus_button_id).data('das_fields') );   
        let das_fields = jQuery('#'+plus_button_id).data('das_fields');  

        for (var id in das_fields) {
            if (das_fields.hasOwnProperty(id)) {

                if( typeof(das_fields[id]['type']) !== undefined ) {

                    // init fields by type 
                    if( das_fields[id]['type'] == "select" ) {

                        console.log( "id before " + id );   

                        //  replace first with actual data 
                        id = id.replace( '{{data.added_counter}}', das_added_counter_format( added_counter ) );    

                        console.log( "id after " + id );   

                        jQuery("#"+id+"_dropdown_div").dropdown();
                    }
                }
            }
        }
    };

    var das_add = function( template, plus_button_id, templating_lib ) {

    	var added_counter = das_added_counter( plus_button_id, 'get' ) + 1;

        // ACTIVE_TODO find in wbc and dapii repo with {{data.added_counter}} and at all places use it from the das config only, so add it is in das php layer config of form_builder with key added_counter_place_holder -- to s 
        //     ACTIVE_TODO and at below when above is changed, need to update the keys. -- to s
    	var template_data = { added_counter: das_added_counter_format( added_counter ) };	

    	var template_content = das_apply_template_data( template, template_data, templating_lib );

    	das_template_append( template_content, 'before', plus_button_id );

        //  after all done then increment counter 
    	das_added_counter( plus_button_id, 'increment' );
 
        //  however still here for init fields the added_counter we had before increment will be used, as usual.    
        das_init_fields( plus_button_id, added_counter );  
    };

	var das_populate_field_data = function( field_id, type, value, ui_framework ) {

    	return window.document.splugins.templating.core.get_template( tmpl_id, templating_lib );
    };

    var set_sp_eid_private = function( thisObj, target_id ) {
        
        var parentdiv = jQuery( thisObj ).parent();
        // jQuery( parentdiv ).find("#"+target_id)[0].val( jQuery( parentdiv ).dropdown("get selected").data("sp_eid") );
        // console.log( jQuery( thisObj ).dropdown("get value") );
        // console.log( jQuery( thisObj ).dropdown("get item", jQuery( thisObj ).dropdown("get value")) );
        jQuery( "#"+target_id ).val( jQuery( jQuery( thisObj ).dropdown("get item", jQuery( thisObj ).dropdown("get value")) ).data("sp_eid") );
        console.log( jQuery( "#"+target_id ).val( ) );
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
        },
        set_sp_eid: function( thisObj, target_id ) {

            set_sp_eid_private(thisObj, target_id);
        }

    }
};

window.document.splugins.common.admin.form_builder.api = window.document.splugins.common.admin.form_builder.core( window.document.splugins.common.parseJSON( '<?php echo json_encode($configs);?>', false ) );

</script>
<?php
}
$inline_script = 
    "window.document.splugins = window.document.splugins || {};\n" .
    "window.document.splugins.common = window.document.splugins.common || {};\n" .
    "\n" .
    "window.document.splugins.common.admin = window.document.splugins.common.admin || {};\n" .
    "window.document.splugins.common.admin.form_builder = window.document.splugins.common.admin.form_builder || {};\n" .
    "\n" .
    "window.document.splugins.common.admin.form_builder.core = function( configs ) {\n" .
    "\n" .
    "    var _this = this;\n" .
    "\n" .
    "    var das_template = function( tmpl_id, templating_lib ) {\n" .
    "\n" .
    "        return window.document.splugins.templating.api.get_template( tmpl_id, templating_lib );\n" .
    "    };\n" .
    "\n" .
    "    var das_apply_template_data = function( template, template_data, templating_lib ) {\n" .
    "\n" .
    "        return window.document.splugins.templating.api.apply_data( template, template_data, templating_lib );\n" .
    "    };\n" .
    "\n" .
    "    var das_template_append = function( template_content, location, related_element_id ) {\n" .
    "\n" .
    "        let related_element = jQuery('#'+related_element_id).parent().closest('.fields');\n" .
    "\n" .
    "        if( location == 'before' ) {\n" .
    "\n" .
    "            jQuery( template_content ).insertBefore( related_element );\n" .
    "        }\n" .
    "    };\n" .
    "\n" .
    "    var das_added_counter_format = function( added_counter ) {\n" .
    "\n" .
    "        return ( _this.configs.das.added_counter_sep + added_counter + _this.configs.das.added_counter_sep );   \n" .
    "    };\n" .
    "\n" .
    "    // Rest of the functions...\n" .
    "\n" .
    "    return {\n" .
    "\n" .
    "        das_add: function( tmpl_id, plus_button_id, templating_lib ) {\n" .
    "\n" .
    "            return das_add( das_template( tmpl_id, templating_lib ), plus_button_id, templating_lib );\n" .
    "        }, \n" .
    "        das_edit_populate: function( tmpl_id, plus_button_id, templating_lib, added_count, fields_data, ui_framework ) {\n" .
    "\n" .
    "            var template = das_template( tmpl_id, templating_lib );\n" .
    "\n" .
    "            for(var i=1; i <= added_count; i++ ) {\n" .
    "\n" .
    "                das_add( template, plus_button_id, templating_lib );    \n" .
    "            }\n" .
    "        },\n" .
    "        set_sp_eid: function( thisObj, target_id ) {\n" .
    "\n" .
    "            set_sp_eid_private(thisObj, target_id);\n" .
    "        }\n" .
    "\n" .
    "    }\n" .
    "};\n" .
    "\n" .
    "window.document.splugins.common.admin.form_builder.api = window.document.splugins.common.admin.form_builder.core( window.document.splugins.common.parseJSON( '" . json_encode($configs) . "', false ) );\n" .
    "\n";
wbc()->load->add_inline_script( '', $inline_script, 'common-admin' );
