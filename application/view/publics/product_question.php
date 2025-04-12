<div type="submit" name="eowbc-askq" id="eowbc-askq" value="<?php echo esc_attr($product_id); ?>" class="ui inverted primary button" style="margin-left: 1em;">Question?</div>


<div class="ui tiny modal" id="eowbc-askq-modal" data-modal-name="eowbc-askq-modal">  	
  	<div class="header">ASK US ABOUT THIS DIAMOND</div>
  	<div class="content ui form">
    	<!-- <form class="ui form" name="api_new_form" id="eowbc_askq_form"> -->      
	      	<div class="field required">
	        	<label>YOUR FIRST NAME</label>                
	        	<!-- <input type="hidden" name="action" value="eowbc_askq">
	      		<?php //wp_create_nonce('eowbc_askq');?>       -->
	        	<input type="text" name="eowbc_askq_fname" id="eowbc_askq_fname" required="required">
	      	</div>
	      	<div class="field required">
	        	<label>YOUR LAST NAME</label>                
	        	<input type="text" name="eowbc_askq_lname" id="eowbc_askq_lname">        
	      	</div>
	      	<div class="field required">
	        	<label>YOUR EMAIL</label>        
	         	<input type="email" name="eowbc_askq_email" id="eowbc_askq_email">
	        </div>              
	      	<div class="field required">
	        	<label>YOUR PHONE NUMBER</label>        
	         	<input type="number" name="eowbc_askq_phone" id="eowbc_askq_phone">
	        </div>              
	      	<div class="field required">
	        	<label>MESSAGE</label>        
	        	<textarea placeholder="Your message..." name="eowbc_askq_message" id="eowbc_askq_message"></textarea>
	        </div>        
	    <!-- </form> -->
    </div>
  	<div class="actions">
    	<div class="ui inverted red deny button">Cancel</div>
    	<div class="ui inverted green positive button" id="eowbc_askq_save">Send</div>  
	</div>
</div>
<?php
$wp_create_nonce_eowbc_askq = __(wp_create_nonce('eowbc_askq'));
$__product_id = __($product_id);
$admin_url_admin_ajax = __(admin_url('admin-ajax.php'));

// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
$inline_script = 
"jQuery(document).ready(function(\$){\n" .
"    if(\$('[data-modal-name=\"eowbc-askq-modal\"]').length>1){\n" .
"        \$('[data-modal-name=\"eowbc-askq-modal\"]:gt(0)').remove();    \n" .
"    }\n" .
"    \n" .
"    \$('#eowbc-askq').off('click');\n" .
"    \$('#eowbc-askq').click(function(){\n" .
"        \$('#eowbc-askq-modal').modal('show');\n" .
"        return false;\n" .
"    });\n" .
"    \n" .
"    \$(\"#eowbc_askq_save\").off('click');\n" .
"    \$(\"#eowbc_askq_save\").click(function(){\n" .
"        let fname = \$('#eowbc_askq_fname').val().trim();\n" .
"        let lname = \$('#eowbc_askq_lname').val().trim();\n" .
"        let email = \$('#eowbc_askq_email').val().trim();\n" .
"        let phone = \$('#eowbc_askq_phone').val().trim();\n" .
"        let message = \$('#eowbc_askq_message').val().trim();\n" .
"        \n" .
"        if(fname=='' || lname=='' || email=='' || phone=='' || message==''){\n" .
"            alert('Please fill all required fields.');\n" .
"            return false;\n" .
"        }\n" .
"        \n" .
"        form_data = {\n" .
"            'action':'eowbc_ajax',\n" .
"            'resolver':'eowbc_askq',\n" .
"            '_wpnonce':'".$wp_create_nonce_eowbc_askq."',\n" .
"            'product_id': '".$__product_id."',\n" .
"            'eowbc_askq_fname':fname,\n" .
"            'eowbc_askq_lname':lname,\n" .
"            'eowbc_askq_email':email,\n" .
"            'eowbc_askq_phone':phone,\n" .
"            'eowbc_askq_message':message,\n" .
"        }\n" .
"        jQuery.ajax({\n" .
"            url:'".$admin_url_admin_ajax."',\n" .
"            type: 'POST',\n" .
"            data: form_data,\n" .
"            beforeSend:function(xhr){\n\n" .
"            },\n" .
"            success:function(result,status,xhr){\n" .
"                if(result){\n" .
"                    alert('Your query has been sent successfully, you will hear back soon.');\n" .
"                }\n" .
"            },\n" .
"            error:function(xhr,status,error){\n\n" .
"            },\n" .
"            complete:function(xhr,status){\n" .
"                \$('#eowbc_askq_fname').val('');\n" .
"                \$('#eowbc_askq_lname').val('');\n" .
"                \$('#eowbc_askq_email').val('');\n" .
"                \$('#eowbc_askq_phone').val('');\n" .
"                \$('#eowbc_askq_message').val('');\n" .
"            }\n" .
"        });    \n" .
"    });\n" .
"});\n";
wbc()->load->add_inline_script( '', $inline_script, 'common' );
?>

<style type="text/css">
	/* Chrome, Safari, Edge, Opera */
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}

	/* Firefox */
	input[type=number] {
	  -moz-appearance: textfield;
	}
</style>
