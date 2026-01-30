jQuery(document).ready(function($){   

    var getUniqueSelector = function (el) {
          if (!el) { return; }
          var selectors=Array();            
          
          $.each($(el).parentsUntil('body').add($(el)),function(index,element){
              
              if($(element).length>0){

                  var selector = (element.tagName || '').toLowerCase();
                  if (element.id) {
                    selector += '#' + element.id;
                  }
                  
                  for (var i = 0, len = element.attributes.length; i < len; i++) {
                    if((element.attributes[i].name).trim()=='class'){

                        value=((element.attributes[i].value).replace(/red-border-section/g,'')).trim();  
                        if(value!=''){
                            selector += '[' + element.attributes[i].name + '="' + ((element.attributes[i].value).replace(/red-border-section/g,'')).trim() + '"]';    
                        }
                    }                    
                  }
                  var parent = $(element).parent();
                  var sameTagSiblings = parent.children(selector);                                                  
                  /*if (sameTagSiblings.length > 1) { */
                      var allSiblings = parent.children();
                      var index = allSiblings.index(element) + 1;                        
                      selector += ':nth-child(' + index + ')';                        
                  /*}*/
                  selectors.push(selector);
              }
          });
          return selectors.join('>');
    };                     

    $(document).on('click','#_customize-input-btn_position_setting_selector_btn',function(e){
        
        if($(this).val()=='Selection Enabled'){
            
            $(this).val('Enable Selection');                                
            $("#customize-preview iframe").contents().find('.red-border-section').removeClass('red-border-section');
            $("#customize-preview iframe").contents().off('mouseenter','div,section,article,span,main,p');

        } else {
            
            $(this).val('Selection Enabled');    
            $("#customize-preview iframe").contents().on('mouseenter','div,section,article,span,main,p',function(e){
                $("#customize-preview iframe").contents().find('.red-border-section').removeClass('red-border-section');
                $(this).addClass('red-border-section');
            });         
        }

        $("#customize-preview iframe").contents().on('click','.red-border-section',function(){

            $("#_customize-input-btn_position_setting_selector_text").val(CssSelectorGenerator.getCssSelector(jQuery(this)[0],{'selectors': ['tag','id','class','attribute'],'combineBetweenSelectors': true}).split(' > ').splice(4).join(' > '));
            $('#_customize-input-btn_position_setting_selector_btn').val('Enable Selection');                        
            jQuery("#_customize-input-btn_position_setting_selector_text").trigger('change');
        });
        
    });
}); 