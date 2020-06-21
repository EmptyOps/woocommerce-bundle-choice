jQuery(document).ready(function($){
	$(".eo_button_container .button").each(function(i,e){
		$(e).attr("href",$(e).attr("href")+"&EO_WBC_CODE="+window.btoa($(".woocommerce a.button").css("background-color")+"/"+$(".woocommerce a.button").css("color")));
	});
    $("#wbc_").find("button").on("click",function(){ document.location.href=$(this).attr("href"); })
});