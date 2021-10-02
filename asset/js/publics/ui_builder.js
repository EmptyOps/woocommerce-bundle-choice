window.document.splugins = window.document.splugins || {};
jQuery(function(){
	
	class EmailForm {
		constructor(field_class,button_selector){
			let _this = this;
			if(typeof(field_class) === typeof(undefined) || field_class===''){
				this.field_class = '.email_form_field';
			} else {
				this.field_class = field_class;
			}

			if(typeof(button_selector) === typeof(undefined)){
				this.button_selector = '.email_form_button';
			} else {
				this.button_selector = button_selector;
			}

			jQuery(button_selector).on('click',function(e){				
				e.preventDefault();
				e.stopPropagation();
				_this.init();
			});		
		}

		unique_email(fields,cfield) {
			
		}

		validate(form_fields) {
			let required_fields = jQuery(form_fields).filter('.required');			
			let numeric_fields = jQuery(form_fields).filter('.numeric');
			let email_fields = jQuery(form_fields).filter('.email:not(.unique)');
			let email_unique_fields = jQuery(form_fields).filter('.email.unique');

			let validation_status = true;

			if(required_fields.hasOwnProperty('length') && required_fields.length>0){
				jQuery(required_fields).each(function(index,field){
					let value = jQuery(field).val();					
					if( typeof(value)===typeof(undefined) || value.trim()==='' ){
						alert('Please fill the required fields.');
						validation_status = false;						
						return validation_status;
					}
				});
			}

			if(validation_status===false) {
				return validation_status;
			}

			if((numeric_fields.hasOwnProperty('length') && numeric_fields.length>0)) {
				jQuery(numeric_fields).each(function(index,field){
					let value = jQuery(field).val();
					if( typeof(value)===typeof(undefined) || isNaN(value.trim()) ){
						alert('Please provide numeric value to the numeric fields.');
						validation_status = false;
						return validation_status;
					}
				});
			}

			if(validation_status===false) {
				return validation_status;
			}

			if((email_fields.hasOwnProperty('length') && email_fields.length>0)) {
				jQuery(email_fields).each(function(index,field){
					let value = jQuery(field).val();

					if( typeof(value)===typeof(undefined) || !value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/) ){
						alert('Please provide valid email to the email field.');
						validation_status = false;
						return validation_status;
					}
				});
			}

			if(validation_status===false) {
				return validation_status;
			}

			if((email_unique_fields.hasOwnProperty('length') && email_unique_fields.length>0)) {
				jQuery(email_unique_fields).each(function(index,field){
					let value = jQuery(field).val();

					if( typeof(value)===typeof(undefined) || !value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/) ){
						alert('Please provide valid email to the email field.');
						validation_status = false;
						return validation_status;
					}

					if( !(function(email_unique_fields,field){ 
						jQuery(fields).each(function(index,field){
							if(jQuery(cfield).val() === jQuery(field).val()) {
								return false;
							}
						});
						return true; }) ) {

						alert('Please set unique email to the fields.');
						validation_status = false;
						return validation_status;	
					}

				});
			}
			
			return validation_status;
		}

		

		init() {

			let form_fields = jQuery(this.field_class);
			let form_button = jQuery(this.button_selector);
			
			if( (!form_fields.hasOwnProperty('length') || form_fields.length<1)
				|| 
				(!form_button.hasOwnProperty('length') || form_button.length<1)
			){				
				console.log('no field found.');
				return false;
			}
			
			if( this.validate(form_fields)===true ){
				console.log('sending ajax');				
				let _data = jQuery(form_fields).serialize();
				jQuery.ajax({
					url: sp_urls.ajax_url,
					data:_data,
					method:'POST',
					success:function($res){						
						$res = JSON.parse($res);
						if($res.type=='success'){
							alert('A request is been sent.');
							//window.location.reload();
						} else {

							alert( ($res.msg).replace('u0027',"'") /*'Failed to submit request.'*/);
						}
					}
				});
			}
		}
	}

	window.document.splugins.EmailForm = function(field_class,button_selector){
		return new EmailForm(field_class,button_selector);
	};
});