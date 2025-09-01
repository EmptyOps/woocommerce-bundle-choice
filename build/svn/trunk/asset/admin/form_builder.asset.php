<?php 
$json_encode_configs = json_encode($configs);
// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
$inline_script = 
    "window.document.splugins = window.document.splugins || {};\n" .
    "window.document.splugins.common = window.document.splugins.common || {};\n" .
    "\n" .
    "window.document.splugins.common.admin = window.document.splugins.common.admin || {};\n\n" .
    "window.document.splugins.common.admin.form_builder = window.document.splugins.common.admin.form_builder || {};\n" .
    "\n" .
    "window.document.splugins.common.admin.form_builder.core = function( configs ) {\n" .
    "\n" .
    "    var _this = this;\n" .
    "\n" .
    "   // console.log( \"form_builder configs \");\n" .
    "   // console.log( configs );\n" .
    "   _this.configs = jQuery.extend({}, {}/*default configs*/, configs);\n" .
    "   // console.log( _this.configs );\n" .
    "\n" .
    "   // terminology: das=dynamic add support\n" .
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
    "    var das_added_counter = function( plus_button_id, action ) {\n" .
    "\n" .
    "     let added_counter_ele = jQuery('#'+plus_button_id+'_added_count');\t\n" .
    "\n" .
    "        // ACTIVE_TODO bring all the common js function from old CI repo and publish that under the common namespace. -- to d \n" .
    "        //     ACTIVE_TODO and then use that only below -- to d \n" .
    "        console.log( \"added_counter_ele.val() \" + added_counter_ele.val() );\n" .
    "        console.log( parseInt(added_counter_ele.val()) ) ;  \n" .
    "     let added_counter = parseInt( added_counter_ele.val() );\n" .
    "        added_counter = Number.isNaN(added_counter) ? 0 : added_counter;\n" .
    "        console.log( added_counter );  \n" .
    "\n" .
    "     if( action == 'increment' ) {\n" .
    "\n" .
    "      added_counter_ele.val( added_counter + 1 );\n" .
    "     } else if( action == 'decrement' ) {\n" .
    "\n" .
    "      added_counter_ele.val( added_counter - 1 );\n" .
    "     } else {\n" .
    "\n" .
    "      return added_counter;\t\n" .
    "     }\n" .
    "    };\n" .
    "\n" .
    "    var das_init_fields = function( plus_button_id, added_counter ) {\n" .
    "\n" .
    "        console.log( \"das_fields \" + jQuery('#'+plus_button_id).data('das_fields') );   \n" .
    "        console.log( jQuery('#'+plus_button_id).data('das_fields') );   \n" .
    "        let das_fields = jQuery('#'+plus_button_id).data('das_fields');  \n" .
    "\n" .
    "        for (var id in das_fields) {\n" .
    "            if (das_fields.hasOwnProperty(id)) {\n" .
    "\n" .
    "                if( typeof(das_fields[id]['type']) !== undefined ) {\n" .
    "\n" .
    "                    // init fields by type \n" .
    "                    if( das_fields[id]['type'] == \"select\" ) {\n" .
    "\n" .
    "                        console.log( \"id before \" + id );   \n" .
    "\n" .
    "                        //  replace first with actual data \n" .
    "                        id = id.replace( '{{data.added_counter}}', das_added_counter_format( added_counter ) );    \n" .
    "\n" .
    "                        console.log( \"id after \" + id );   \n" .
    "\n" .
    "                        jQuery(\"#\"+id+\"_dropdown_div\").dropdown();\n" .
    "                    }\n" .
    "                }\n" .
    "            }\n" .
    "        }\n" .
    "    };\n" .
    "\n" .
    "    var das_add = function( template, plus_button_id, templating_lib ) {\n" .
    "\n" .
    "     var added_counter = das_added_counter( plus_button_id, 'get' ) + 1;\n" .
    "\n" .
    "        // ACTIVE_TODO find in wbc and dapii repo with {{data.added_counter}} and at all places use it from the das config only, so add it is in das php layer config of form_builder with key added_counter_place_holder -- to s \n" .
    "        //     ACTIVE_TODO and at below when above is changed, need to update the keys. -- to s\n" .
    "     var template_data = { added_counter: das_added_counter_format( added_counter ) }; \t\n" .
    "\n" .
    "     var template_content = das_apply_template_data( template, template_data, templating_lib );\n" .
    "\n" .
    "     das_template_append( template_content, 'before', plus_button_id );\n" .
    "\n" .
    "        //  after all done then increment counter \n" .
    "     das_added_counter( plus_button_id, 'increment' );\n" .
    " \n" .
    "        //  however still here for init fields the added_counter we had before increment will be used, as usual.    \n" .
    "        das_init_fields( plus_button_id, added_counter );  \n" .
    "    };\n" .
    "\n" .
    "    var das_populate_field_data = function( field_id, type, value, ui_framework ) {\n" .
    "\n" .
    "     return window.document.splugins.templating.core.get_template( tmpl_id, templating_lib );\n" .
    "    };\n" .
    "\n" .
    "    var set_sp_eid_private = function( thisObj, target_id ) {\n" .
    "        \n" .
    "        var parentdiv = jQuery( thisObj ).parent();\n" .
    "        // jQuery( parentdiv ).find(\"#\"+target_id)[0].val( jQuery( parentdiv ).dropdown(\"get selected\").data(\"sp_eid\") );\n" .
    "        // console.log( jQuery( thisObj ).dropdown(\"get value\") );\n" .
    "        // console.log( jQuery( thisObj ).dropdown(\"get item\", jQuery( thisObj ).dropdown(\"get value\")) );\n" .
    "        jQuery( \"#\"+target_id ).val( jQuery( jQuery( thisObj ).dropdown(\"get item\", jQuery( thisObj ).dropdown(\"get value\")) ).data(\"sp_eid\") );\n" .
    "        console.log( jQuery( \"#\"+target_id ).val( ) );\n" .
    "    };\n" .
    "\n" .
    "\n" .
    "    return {\n" .
    "\n" .
    "        das_add: function( tmpl_id, plus_button_id, templating_lib ) {\n" .
    "\n" .
    "           // this.subjects.push( new window.document.splugins.events.subject( feature_unique_key, notifications ) );\n" .
    "\n" .
    "            return das_add( das_template( tmpl_id, templating_lib ), plus_button_id, templating_lib );\n" .
    "        }, \n" .
    "        das_edit_populate: function( tmpl_id, plus_button_id, templating_lib, added_count, fields_data, ui_framework ) {\n" .
    "\n" .
    "            var template = das_template( tmpl_id, templating_lib );\n" .
    "\n" .
    "           // loop by added_count \n" .
    "            for(var i=1; i <= added_count; i++ ) {\n" .
    "\n" .
    "               // and then call the private das_add\n" .
    "                das_add( template, plus_button_id, templating_lib );    \n" .
    "\n" .
    "               //  and then the populate or extend add core to accpet the populate layer so that it populates even before the template is bound to the dom, in this case we will not need the set val functions support but anyawy we need to do it standard way that is reliable and the former approach will require maintaining many additional placeholders so that will not work\n\n" .
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
    "window.document.splugins.common.admin.form_builder.api = window.document.splugins.common.admin.form_builder.core( window.document.splugins.common.parseJSON( '" . $json_encode_configs . "', false ) );\n" .
    "\n";
wbc()->load->add_inline_script( '', $inline_script, 'common-admin' );
