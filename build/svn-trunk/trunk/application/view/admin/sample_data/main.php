<?php
/*
*	Displays the page for adding sample data
*/

$_step = 1; 
if(!empty(wbc()->sanitize->get('step'))){
	$_step = wbc()->sanitize->get('step');
}

?>
<div class="ui segment container" style="height: 100%;margin-bottom: 0px; border: none !important;
box-shadow: none;">
			<div class="ui icon header" style="width: 100%;">
			    <img src="<?php echo esc_url(constant('EOWBC_ICON_SVG')); ?>" style='max-width: 100; max-height: auto;'/>
			    <br/>
			    <p><?php echo esc_html(constant('EOWBC_NAME')); ?></p>
			    <hr/>
			</div>

	<div class="wrap woocommerce">
	  <h1></h1>
	  <?php //EO_WBC_Head_Banner::get_head_banner(); ?> 
	  <!-- <br/>
	        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php //_e("If you are facing any issue, please write to us immediately.","woo-bundle-choice"); ?></a></p>
	  <br/> -->
	  <hr/>
	  <div style="clear:both;"></div>
	  
	  <form method="post">
	    <?php wp_nonce_field('eo_wbc_auto_jewel'); ?>
	    <input type="hidden" name="step" value="<?php echo esc_attr($_step+1)/*$_step+1*/; ?>">
	    <div>
	      <h1><strong>Sample Data for <?php echo esc_html($feature_title)/*$feature_title*/;?></strong></h1>
	      <p>You are at step <?php echo esc_html($_step)/*$_step*/; ?> of <?php echo esc_html($number_of_step)/*$number_of_step*/; ?> steps.</p>
	      <?php if(!empty($help_info[$_step])) {
	      	?>
	      		<p><strong><?php echo esc_html($help_info[$_step])/*$help_info[$_step]*/; ?></strong></p>
	      	<?php 
	      }
	      ?>
	        <table class="form-table">
	          <tbody>
	            <tr valign="top">
	              <!-- Sample Product Installation -->
	              <?php if( /*!empty(wbc()->sanitize->post('step')) && wbc()->sanitize->post('step')*/$_step==3):?>
	                <th>
	                  <h3>Sample Products</h3>
	                  <p>Sample products will be added for <?php echo esc_html($feature_title)/*$feature_title*/;?>.</p>
	                </th>
	              </tr>
	              <tr>
	                <td>Total <?php echo esc_html($sample_data_obj->get_model()->get_product_size())/*$sample_data_obj->get_model()->get_product_size()*/;?> products will be created.</td>
	              <!-- Attributes Installation -->
	              <?php elseif($_step==2):?>
	                <th>
	                  <h3>Attributes</h3>
	                </th>
	              </tr>
	              <tr>
	                <td>Total <?php echo esc_html($sample_data_obj->get_model()->get_attributes_size())/*$sample_data_obj->get_model()->get_attributes_size()*/;?> attributes will be created.</td>
	              </tr>
	              <tr>
 						<td>
						    <?php foreach ($_atttriutes as $index=>$_attr): ?>       <tr>   
						            <span>                                      
						                <input type="checkbox" name="attr_<?php echo esc_attr($index)/*$index*/; ?>" id="<?php esc_attr_e($_attr['slug']); ?>" value="<?php esc_attr_e($_attr['slug']) ?>" checked="checked" disabled="disabled"></span>
						            <span><input type="text" name="attr_value_<?php echo esc_attr($index)/*$index*/; ?>" placeholder="<?php esc_attr_e($_attr['label']) ?>" value="<?php esc_attr_e($_attr['label']); ?>"></span></tr>
						        <!--<label for="<?php //esc_attr_e($_attr['slug']); ?>"><?php //esc_html_e($_attr['label']); ?></label>-->
						        <br/><br/>                        
						    <?php endforeach;?>                      
						</td>

	              <!-- Category Installation -->
	              <?php else:?>
	                <th>
	                  <h3>Category</h3>
	                </th>
	              </tr>
	              <tr>
	                <td>Total <?php echo esc_html($sample_data_obj->get_model()->get_categories_size())/*$sample_data_obj->get_model()->get_categories_size()*/;?> categories will be created. (Note: Since there are sub categories to above main categories the actual count is higher.<?php echo esc_html(($feature_key == 'pair_maker' ? ' Later you can simply remove these categories but right now its neccessary to accurately present the sample data demo.' : ''))/*($feature_key == 'pair_maker' ? ' Later you can simply remove these categories but right now its neccessary to accurately present the sample data demo.' : '')*/;?>)</td>
	              </tr>
	              <tr>
	                <td> 
	               	<?php foreach ($_category as $index=>$_cat): ?>  
					    <tr>                                            
					        <span><input type="checkbox" name="cat_<?php echo esc_attr($index)/*$index*/; ?>" id="<?php esc_attr_e($_cat['name']); ?>" value="<?php esc_attr_e($_cat['slug']) ?>" checked="checked" disabled="disabled"></span>
					        <!--<label for="<?php //esc_attr_e($_cat['name']); ?>"><?php //esc_html_e($_cat['name']); ?></label> -->    
					        <span><input type="text" name="cat_value_<?php echo esc_attr($index)/*$index*/; ?>" placeholder="<?php esc_attr_e($_cat['name']) ?>" value="<?php esc_attr_e($_cat['name']); ?>"></span>
					    </tr>
					    <br/></br>
					<?php endforeach;?>

	                </td>
	              <?php endif; ?>
	            </tr>
	          </tbody>
	          <tfoot>
	            <tr>
	              <td>
	                <?php $_steps=["catagorie(s)","attribute(s)","product(s)"]; ?>
	                <input type="submit" name="save" value="<?php printf(__("Create sample %1s","woo-bundle-choice"),$_steps[$_step-1]); ?>"  class="button button-primary button-hero action ui button secondary">
	              </td>
	              <td>
					    <a href="#" class="button button-hero action ui button secondary inverted" onclick="if(!jQuery(this).hasClass('disabled')){ window.location.href='<?php echo esc_url(admin_url('admin.php?page=eowbc')); ?>'; }">Cancel</a>
				  </td>

	            </tr>
	          </tfoot>
	        </table>
	    </div>            
	  </form>
	</div>

</div>
<?php if(empty(wbc()->sanitize->get('step')) or (!empty(wbc()->sanitize->get('step')) and wbc()->sanitize->get('step')!=3 )) { 
	if(empty(wbc()->sanitize->get('step'))){
		// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
		// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
		// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
		$_GET['step']=1;
	}

	// phpcs:ignore WordPress.Security.SuperGlobalInputModification -- Temporarily modifying superglobal as part of an interim solution. Will refactor later.
	// As discussed with the WordPress review team it is discouraged to modify superglobals($_GET, $_POST, and $_REQUEST) but currently, these superglobals are modified in a temporary manner as part of an interim solution.
	// We plan to refactor the entire flow in the future to ensure that our backend structure eliminates the need to directly modify or rely on superglobals.
	$_GET['step'] = wbc()->sanitize->get('step')+1;
 	$next_url = admin_url('admin.php?'.http_build_query($_GET));
	$main_categories_size = sizeof($_category);
	$cat_value = $sample_data_obj->get_model()->get_categories_size();
	$attr_value = $sample_data_obj->get_model()->get_attributes_size();
	$wp_create_nonce_sample_data_jewelry = wp_create_nonce('sample_data_jewelry');
	$apply_filters_eowbc_catattr_sample_data_resolver_path = apply_filters('eowbc_catattr_sample_data_resolver_path', '');
	$feature_key = __($feature_key);
	$admin_url = admin_url('admin-ajax.php');

	// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
	$inline_script =
	    "jQuery(document).ready(function(\$) { \n" .
	    "    \n" .
	    "    \n" .
	    "    let cat_value = 0;\n" .
	    "    let attr_value = 0;\n" .
	    "    let process_flag = '';\n" .
	    "    \n" .
	    "    let btn_label = '';\n" .
	    "    let btn_total = 0;\n" .
	    "    \n" .
	    "    let main_categories_size = 0;\n" .
	    "    \n" .
	    "    \n" .
	    "    function eowbc_add_catat(index){\n" .
	    "    \n" .
	    "        if(process_flag=='cat' && index>=cat_value){\n" .
	    "            var msg = 'There is some error while finishing the category creation process, please contact Sphere Plugins Support for a quick fix on this if the problem persist.';\n" .
	    "            \n" .
	    "            //step 2 redirect;\n" .
	    "            var data = {	\n" .
	    "                '_wpnonce': '" . $wp_create_nonce_sample_data_jewelry . "',\n" .
	    "                'action':'eowbc_ajax',\n" .
	    "                'resolver':'sample_data/catattr',\n" .
	    "                'resolver_path':'" . $apply_filters_eowbc_catattr_sample_data_resolver_path . "', \n" .
	    "                'feature_key':'" . $feature_key . "',\n" .
	    "                'type':'after_cat_created',\n" .
	    "            };\n" .
	    "            jQuery.ajax({\n" .
	    "                url:eowbc_object.admin_url,\n" .
	    "                type: 'POST',\n" .
	    "                data: data,\n" .
	    "                beforeSend:function(xhr){\n\n" .
	    "                },\n" .
	    "                success:function(result,status,xhr){\n" .
	    "                    window.location.href=\"" . $next_url . "\";\n" .
	    "                    return false;\n" .
	    "                },\n" .
	    "                error:function(xhr,status,error){\n" .
	    "					/*console.log(xhr);*/\n".
	    "                    eowbc_toast_common( 'error', msg );\n" .
	    "                    return false;\n" .
	    "                },\n" .
	    "                complete:function(xhr,status){\n" .
	    "						//window.location.href=\"" . $next_url . "\";	//commented since can't allow redirect on error etc.\n" .
	    "                    return false;\n" .
	    "                }\n" .
	    "            });\t\n" .
	    "            return false;\n" .
	    "        } else if(process_flag=='attr' && index>=attr_value) {\n" .
	    "            var msg = 'There is some error while finishing the attribute creation process, please contact Sphere Plugins Support for a quick fix on this if the problem persist.';\n" .
	    "            \n" .
	    "            //step 3 redirect;\n" .
	    "            var data = {	\n" .
	    "            \n" .
	    "                '_wpnonce': '" . $wp_create_nonce_sample_data_jewelry . "',\n" .
	    "                'action':'eowbc_ajax',\n" .
	    "                'resolver':'sample_data/catattr',\n" .
	    "                'resolver_path':'" . $apply_filters_eowbc_catattr_sample_data_resolver_path . "',\n" .
	    "                'feature_key':'" . $feature_key . "',\n" .
	    "                'type':'after_attr_created',\n" .
	    "            };\n" .
	    "            jQuery.ajax({\n" .
	    "                url:eowbc_object.admin_url,\n" .
	    "                type: 'POST',\n" .
	    "                data: data,\n" .
	    "                beforeSend:function(xhr){\n" .
	    "                },\n" .
	    "                success:function(result,status,xhr){\n" .
	    "                    window.location.href=\"" . $next_url . "\";\n" .
	    "                    return false;\n" .
	    "                },\n" .
	    "                error:function(xhr,status,error){\n" .
	    "					/*console.log(xhr);*/\n".
	    "                    eowbc_toast_common( 'error', msg );\n" .
	    "                    return false;\n" .
	    "                },\n" .
	    "                complete:function(xhr,status){\n" .
	    "					//window.location.href=". $next_url .";	//commented since can't allow redirect on error etc.\n" .
	    "                    return false;\n" .
	    "                }\n" .
	    "            });\n" .
	    "            return false;\n" .
	    "        }\n" .
	    "        \n\n\n" .
	    "        jQuery(\".button.button-primary.button-hero.action.disabled\").val(\"Adding \"+(index+1)+\" of \"+btn_total+\" \"+btn_label);\n" .
	    "        \n" .
	    "        let label = '';\n" .
	    "        let value = '';\n" .
	    "        let field_name = jQuery(\"[name^='\"+process_flag+\"_\"+index+\"']:checkbox:checked\");\n" .
	    "        let field_label = jQuery(\"[name^='\"+process_flag+\"_value_\"+index+\"']:not([value=''])\");\n" .
	    "        \n" .
	    "        if(field_name.length>0 && field_label.length>0 && jQuery(field_label[0]).val().trim()!=''){\n" .
	    "            value = jQuery(field_name[0]).val();\n" .
	    "            label = jQuery(field_label[0]).val();\n" .
	    "        } \n" .
	    "        else {\n" .
	    "            // do not skip. If the name is not provided default will be used since we are going to disable checkboxes which means we will add all the cats and attributes presented.\n" .
	    "            //eowbc_add_catat(index+1);\n" .
	    "        }\n" .
	    "        \n" .
	    "        var data = {	\n" .
	    "            '_wpnonce': '" . $wp_create_nonce_sample_data_jewelry . "',\n" .
	    "            'action':'eowbc_ajax',\n" .
	    "            'resolver':'sample_data/catattr',\n" .
	    "            'resolver_path':'" . $apply_filters_eowbc_catattr_sample_data_resolver_path . "',\n" .
	    "            'feature_key':'" . $feature_key . "',\n" .
	    "            'label':label,\n" .
	    "            'value':value,\n" .
	    "            'index':index,\n" .
	    "            'type':process_flag,\n\n" .
	    "        };\n" .
	    "        \n" .
	    "        if( process_flag == 'cat' ) {\n" .
	    "            // pass all main categories so that name can be read, since there are child also involved its hard to maintain index otherwise\n" .
	    "            for (var mci = 0; mci < main_categories_size; mci++) {\n" .
	    "                data['cat_value_'+mci] = jQuery(\"[name='cat_value_\"+mci+\"']\").val();\n" .
	    "            }\n" .
	    "        }\n" .
	    "        \n" .
	    "        jQuery.post('" . $admin_url . "', data, function(response) {\n" .
	    "            var resjson = jQuery.parseJSON(response);\n" .
	    "            if( typeof(resjson[\"type\"]) != undefined && resjson[\"type\"] == \"success\" ){\n" .
	    "                eowbc_add_catat(++index);                    \n" .
	    "            } else {\n" .
	    "                var type = (typeof(resjson[\"type\"]) != undefined ? resjson[\"type\"] : 'error');\n" .
	    "                var msg = (typeof(resjson[\"msg\"]) != undefined && resjson[\"msg\"] != \"\" ? resjson[\"msg\"] : `Failed! Please check Logs page for for more details.`);\n" .
	    "                eowbc_toast_common( type, msg );\n" .
	    "            }  \n" .
	    "        });\n" .
	    "    }   \n" .
	    "    \n" .
	    "    \$(\".button.button-primary.button-hero.action\").on('click',function(e){\n" .
	    "        e.stopPropagation();\n" .
	    "        e.preventDefault();\n" .
	    "        if(!\$(this).hasClass('disabled')) {\n" .
	    "            \$(\".button.button-hero.action:not(.disabled)\").toggleClass('disabled');\n" .
	    "            \n" .
	    "            cat_value = jQuery(\"[name^='cat_']:checkbox:checked\").length;\n" .
	    "            attr_value = jQuery(\"[name^='attr_']:checkbox:checked\").length;\n" .
	    "            \n" .
	    "            if(cat_value>0){\n" .
	    "                process_flag = 'cat';\n" .
	    "                btn_label = 'Categories';\n" .
	    "                main_categories_size = " . $main_categories_size . ";\n" .
	    "                cat_value = " . $cat_value . ";\n" .
	    "                btn_total = cat_value;\n" .
	    "            } else if(attr_value>0){\n" .
	    "                process_flag = 'attr';\n" .
	    "                btn_label = 'Attributes';\n" .
	    "                attr_value = " . $attr_value . ";\n" .
	    "                btn_total = attr_value;\n" .
	    "            }\n" .
	    "            \n" .
	    "            //let cat_value = jQuery(\"[name^='cat_value_']:not([value=''])\");\n" .
	    "            //let cat = jQuery(\"[name^='cat_']:checkbox:checked\");\n" .
	    "            \n" .
	    "            //let attr_value = jQuery(\"[name^='attr_value_']:not([value=''])\");\n" .
	    "            //let attr = jQuery(\"[name^='attr_']:checkbox:checked\");\n" .
	    "            \n" .
	    "            eowbc_add_catat(0);\n" .
	    "            //eo_wbc_add_products(119);\n" .
	    "        }                \n" .
	    "        return false;\n" .
	    "    });\n\n" .
	    "});\n";
	wbc()->load->add_inline_script('', $inline_script, 'common-admin');

} elseif($_step==3) { 
	$wp_create_nonce_sample_data_jewelry = wp_create_nonce('sample_data_jewelry');
	$admin_url_1 = admin_url('admin.php?page=eowbc');
	$admin_url_2 = admin_url('admin-ajax.php');
	$eo_wbc_max_products = $sample_data_obj->get_model()->get_product_size();
	$feature_key = __($feature_key);
	$apply_filters_eowbc_product_sample_data_resolver_path = apply_filters('eowbc_product_sample_data_resolver_path','');
	// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
	$inline_script = 
		"jQuery(document).ready(function(\$) {            \n" .
		"\n" .
		"    var eo_wbc_max_products=" . $eo_wbc_max_products . ";\n" .
		"    function eo_wbc_add_products(index){\n" .
		"\n" .
		"        if(index>=eo_wbc_max_products){\n" .
		"            \n" .
		"            window.location.href=\"" . $admin_url_1 . "\";\n" .
		"            return false;\n" .
		"        }\n" .
		"\n" .
		"        jQuery(\".button.button-primary.button-hero.action.disabled\").val(\"Adding \"+(index+1)+\" of \"+eo_wbc_max_products+\" products\");\n" .
		"\n" .
		"        var data = {\n" .
		"            //'action': 'eo_wbc_add_products',\n" .
		"            '_wpnonce': '" . $wp_create_nonce_sample_data_jewelry . "',\n" .
		"            'action':'eowbc_ajax',\n" .
		"            'resolver':'sample_data/" . $feature_key . "',\n" .
		"            'resolver_path':'" . $apply_filters_eowbc_product_sample_data_resolver_path . "', \n" .
		"            'product_index':index \n" .
		"        };\n" .
		"\n" .
		"        jQuery.post('" . $admin_url_2 . "', data, function(response) {\n" .
		"            var resjson = jQuery.parseJSON(response);\n" .
		"            if( typeof(resjson[\"type\"]) != undefined && resjson[\"type\"] == \"success\" ){\n" .
		"                eo_wbc_add_products(++index);                    \n" .
		"            } else {\n" .
		"                var type = (typeof(resjson[\"type\"]) != undefined ? resjson[\"type\"] : 'error');\n" .
		"                var msg = (typeof(resjson[\"msg\"]) != undefined && resjson[\"msg\"] != \"\" ? resjson[\"msg\"] : `Failed! Please check Logs page for for more details.`);\n" .
		"                eowbc_toast_common( type, msg );\n" .
		"            }  \n" .
		"        });                \n" .
		"    }   \n" .
		"    \n" .
		"    \$(\".button.button-primary.button-hero.action\").on('click',function(e){\n" .
		"        e.stopPropagation();\n" .
		"        e.preventDefault();\n" .
		"        if(!\$(this).hasClass('disabled')) {\n" .
		"            \$(\".button.button-hero.action:not(.disabled)\").toggleClass('disabled');\n" .
		"            eo_wbc_add_products(0);\n" .
		"            //eo_wbc_add_products(119);\n" .
		"        }                \n" .
		"        return false;\n" .
		"    });\n" .
		"\n" .
		"});";
		wbc()->load->add_inline_script('', $inline_script, 'common-admin');
} ?>
<?php //EO_WBC_Head_Banner::get_footer_line(); ?>
