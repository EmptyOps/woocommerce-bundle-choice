jQuery(document).ready(function($){
	eo_wbc_buttons_bind_events();
});

function eo_wbc_buttons_bind_events() {
	jQuery(".eo_button_container .button").each(function(i,e){
		jQuery(e).attr("href",jQuery(e).attr("href")+"&EO_WBC_CODE="+window.btoa(jQuery(".woocommerce a.button").css("background-color")+"/"+jQuery(".woocommerce a.button").css("color")));
	});
    // jQuery("#wbc_").find("button").on("click",function(){ document.location.href=jQuery(this).attr("href"); });
}