/*<<<<<<< HEAD*/
/*window.eo_wbc_object = window.eo_wbc_object || {};
window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;*/
/*=======*/
window.eo_wbc_object = window.eo_wbc_object || {};
window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;
/*>>>>>>> dad35916d59c134734156ded85678133f6c607a0*/

// YITH wishlist fix
function eowbc_yith_wishlist_fix(){
	jQuery(document).ready((function(t){function i(){void 0!==t.fn.selectBox&&t("select.selectBox").filter(":visible").not(".enhanced").selectBox().addClass("enhanced")}function e(){if(void 0!==t.prettyPhoto){var e={hook:"data-rel",social_tools:!1,theme:"pp_woocommerce",horizontal_padding:20,opacity:.8,deeplinking:!1,overlay_gallery:!1,default_width:500,changepicturecallback:function(){i(),t(".wishlist-select").filter(":visible").change(),t(document).trigger("yith_wcwl_popup_opened",[this])},markup:'<div class="pp_pic_holder"><div class="ppt">&nbsp;</div><div class="pp_top"><div class="pp_left"></div><div class="pp_middle"></div><div class="pp_right"></div></div><div class="pp_content_container"><div class="pp_left"><div class="pp_right"><div class="pp_content"><div class="pp_loaderIcon"></div><div class="pp_fade"><a href="#" class="pp_expand" title="Expand the image">Expand</a><div class="pp_hoverContainer"><a class="pp_next" href="#">next</a><a class="pp_previous" href="#">previous</a></div><div id="pp_full_res"></div><div class="pp_details"><a class="pp_close" href="#">Close</a></div></div></div></div></div></div><div class="pp_bottom"><div class="pp_left"></div><div class="pp_middle"></div><div class="pp_right"></div></div></div><div class="pp_overlay yith-wcwl-overlay"></div>'};t('a[data-rel^="prettyPhoto[add_to_wishlist_"]').add('a[data-rel="prettyPhoto[ask_an_estimate]"]').add('a[data-rel="prettyPhoto[create_wishlist]"]').unbind("click").prettyPhoto(e),t('a[data-rel="prettyPhoto[move_to_another_wishlist]"]').on("click",(function(){var i=t(this),e=t("#move_to_another_wishlist").find("form"),a=e.find(".row-id"),o=i.closest("[data-row-id]").data("row-id");a.length&&a.remove(),e.append('<input type="hidden" name="row_id" class="row-id" value="'+o+'"/>')})).prettyPhoto(e);var a=function(i,e){if(void 0!==i.classList&&i.classList.contains("yith-wcwl-overlay")){var a="remove"===e?"removeClass":"addClass";t("body")[a]("yith-wcwl-with-pretty-photo")}},o=function(t){a(t,"add")},n=function(t){a(t,"remove")};new MutationObserver((function(t){for(var i in t){var e=t[i];"childList"===e.type&&(void 0!==e.addedNodes&&e.addedNodes.forEach(o),void 0!==e.removedNodes&&e.removedNodes.forEach(n))}})).observe(document.body,{childList:!0})}}function a(){t(".wishlist_table").find('.product-checkbox input[type="checkbox"]').off("change").on("change",(function(){var i=t(this);i.parent().removeClass("checked").removeClass("unchecked").addClass(i.is(":checked")?"checked":"unchecked")})).trigger("change")}function o(){t(".add_to_cart").filter("[data-icon]").not(".icon-added").each((function(){var i,e=t(this),a=e.data("icon");i=a.match(/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi)?t("<img/>",{src:a}):t("<i/>",{class:"fa "+a}),e.prepend(i).addClass("icon-added")}))}function n(){i(),e(),a(),o(),l(),s(),_(),d(),c(),r(),t(document).trigger("yith_wcwl_init_after_ajax")}function s(){yith_wcwl_l10n.enable_tooltip&&t(".yith-wcwl-add-to-wishlist").find("[data-title]").each((function(){var i=t(this);i.hasClass("tooltip-added")||(i.on("mouseenter",(function(){var i,e=t(this),a=null,o=e.outerWidth(),n=0;a=t("<span>",{class:"yith-wcwl-tooltip",text:e.data("title")}),e.append(a),i=a.outerWidth()+6,a.outerWidth(i),n=(o-i)/2,a.css({left:n.toFixed(0)+"px"}).fadeIn(200),e.addClass("with-tooltip")})).on("mouseleave",(function(){var i=t(this);i.find(".yith-wcwl-tooltip").fadeOut(200,(function(){i.removeClass("with-tooltip").find(".yith-wcwl-tooltip").remove()}))})),i.addClass("tooltip-added"))}))}function l(){t(".yith-wcwl-add-button").filter(".with-dropdown").on("mouseleave",(function(){var i=t(this).find(".yith-wcwl-dropdown");i.length&&i.fadeOut(200)})).children("a").on("mouseenter",(function(){var i=t(this).closest(".with-dropdown"),e=i.find(".yith-wcwl-dropdown");e.length&&e.children().length&&i.find(".yith-wcwl-dropdown").fadeIn(200)}))}function d(){void 0!==yith_wcwl_l10n.enable_drag_n_drop&&yith_wcwl_l10n.enable_drag_n_drop&&t(".wishlist_table").filter(".sortable").not(".no-interactions").each((function(){var i=t(this),e=!1;i.sortable({items:"[data-row-id]",scroll:!0,helper:function(i,e){return e.children().each((function(){t(this).width(t(this).width())})),e},update:function(){var a=i.find("[data-row-id]"),o=[],n=0;a.length&&(e&&e.abort(),a.each((function(){var i=t(this);i.find('input[name*="[position]"]').val(n++),o.push(i.data("row-id"))})),e=t.ajax({data:{action:yith_wcwl_l10n.actions.sort_wishlist_items,positions:o,wishlist_token:i.data("token"),page:i.data("page"),per_page:i.data("per-page")},method:"POST",url:yith_wcwl_l10n.ajax_url}))}})}))}function c(){var i,e;t(".wishlist_table").on("change",".product-quantity input",(function(){var a=t(this),o=a.closest("[data-row-id]"),n=o.data("row-id"),s=a.closest(".wishlist_table"),l=s.data("token");clearTimeout(e),o.find(".add_to_cart").attr("data-quantity",a.val()),e=setTimeout((function(){i&&i.abort(),i=t.ajax({beforeSend:function(){b(s)},complete:function(){k(s)},data:{product_id:n,wishlist_token:l,quantity:a.val(),action:yith_wcwl_l10n.actions.update_item_quantity},method:"POST",url:yith_wcwl_l10n.ajax_url})}),1e3)}))}function r(){t(".copy-trigger").on("click",(function(){var i=t(".copy-target");if(i.length>0)if(i.is("input"))S()?i[0].setSelectionRange(0,9999):i.select(),document.execCommand("copy");else{var e=t("<input/>",{val:i.text(),type:"text"});t("body").append(e),S()?e[0].setSelectionRange(0,9999):e.select(),document.execCommand("copy"),e.remove()}}))}function _(){t(".wishlist_table").filter(".images_grid").not(".enhanced").on("click","[data-row-id] .product-thumbnail a",(function(i){var e=t(this).closest("[data-row-id]"),a=e.siblings("[data-row-id]"),o=e.find(".item-details");i.preventDefault(),o.length&&(a.removeClass("show"),e.toggleClass("show"))})).on("click","[data-row-id] a.close",(function(i){var e=t(this).closest("[data-row-id]"),a=e.find(".item-details");i.preventDefault(),a.length&&e.removeClass("show")})).on("click","[data-row-id] a.remove_from_wishlist",(function(i){var e=t(this);return i.stopPropagation(),w(e),!1})).addClass("enhanced"),t(document).on("click",(function(i){t(i.target).closest("[data-row-id]").length||t(".wishlist_table").filter(".images_grid").find(".show").removeClass("show")})).on("added_to_cart",(function(){t(".wishlist_table").filter(".images_grid").find(".show").removeClass("show")}))}function h(i,e,a){i.action=yith_wcwl_l10n.actions.move_to_another_wishlist_action,""!==i.wishlist_token&&""!==i.destination_wishlist_token&&""!==i.item_id&&t.ajax({beforeSend:e,url:yith_wcwl_l10n.ajax_url,data:i,dataType:"json",method:"post",success:function(e){a(e),n(),t("body").trigger("moved_to_another_wishlist",[t(this),i.item_id])}})}function w(i){var e=i.parents(".cart.wishlist_table"),a=i.parents("[data-row-id]"),o=a.data("row-id"),s=e.data("id"),l=e.data("token"),d={action:yith_wcwl_l10n.actions.remove_from_wishlist_action,remove_from_wishlist:o,wishlist_id:s,wishlist_token:l,fragments:j(o)};t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:d,method:"post",success:function(e){void 0!==e.fragments&&T(e.fragments),n(),t("body").trigger("removed_from_wishlist",[i,a])},url:yith_wcwl_l10n.ajax_url})}function f(i){var e=t(this),a=e.closest(".wishlist_table"),o=null;i.preventDefault(),(o=a.length?e.closest("[data-wishlist-id]").find(".wishlist-title"):e.parents(".wishlist-title")).next().show().find('input[type="text"]').focus(),o.hide()}function p(i){var e=t(this);i.preventDefault(),e.parents(".hidden-title-form").hide(),e.parents(".hidden-title-form").prev().show()}function u(i){var e,a=t(this),o=a.closest(".hidden-title-form"),n=a.closest("[data-wishlist-id]").data("wishlist-id"),s=o.find('input[type="text"]'),l=s.val();if(i.preventDefault(),!l)return o.addClass("woocommerce-invalid"),void s.focus();e={action:yith_wcwl_l10n.actions.save_title_action,wishlist_id:n,title:l,fragments:j()},t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:e,dataType:"json",beforeSend:function(){b(o)},complete:function(){k(o)},success:function(t){var i=t.fragments;t.result?(o.hide(),o.prev().find(".wishlist-anchor").text(l).end().show()):(o.addClass("woocommerce-invalid"),s.focus()),void 0!==i&&T(i)}})}function m(){var i=t(this),e=i.val(),a=i.closest("[data-wishlist-id]").data("wishlist-id"),o={action:yith_wcwl_l10n.actions.save_privacy_action,wishlist_id:a,privacy:e,fragments:j()};t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:o,dataType:"json",success:function(t){var i=t.fragments;void 0!==i&&T(i)}})}function v(i){if(void 0!==t.prettyPhoto&&void 0!==t.prettyPhoto.close)if(void 0!==i){var e=t(".pp_content_container"),a=e.find(".pp_content"),o=e.find(".yith-wcwl-popup-form"),n=o.closest(".pp_pic_holder");if(o.length){var s=t("<div/>",{class:"yith-wcwl-popup-feedback"});s.append(t("<i/>",{class:"fa fa-check heading-icon"})),s.append(t("<p/>",{class:"feedback",html:i})),s.css("display","none"),a.css("height","auto"),o.after(s),o.fadeOut(200,(function(){s.fadeIn()})),n.addClass("feedback"),n.css("left",t(window).innerWidth()/2-n.outerWidth()/2+"px"),(void 0===yith_wcwl_l10n.auto_close_popup||yith_wcwl_l10n.auto_close_popup)&&setTimeout(v,yith_wcwl_l10n.popup_timeout)}}else try{t.prettyPhoto.close()}catch(t){}}function g(i){var e=t("#yith-wcwl-popup-message"),a=t("#yith-wcwl-message"),o=void 0!==yith_wcwl_l10n.popup_timeout?yith_wcwl_l10n.popup_timeout:3e3;(void 0===yith_wcwl_l10n.enable_notices||yith_wcwl_l10n.enable_notices)&&(a.html(i),e.css("margin-left","-"+t(e).width()+"px").fadeIn(),window.setTimeout((function(){e.fadeOut()}),o))}function y(i){var e=t("select.wishlist-select"),a=t("ul.yith-wcwl-dropdown");e.each((function(){var e=t(this),a=e.find("option"),o=a.filter('[value="new"]');a.not(o).remove(),t.each(i,(function(i,a){t("<option>",{value:a.id,html:a.wishlist_name}).appendTo(e)})),e.append(o)})),a.each((function(){var e=t(this),a=e.find("li"),o=e.closest(".yith-wcwl-add-button").children("a.add_to_wishlist"),n=o.attr("data-product-id"),s=o.attr("data-product-type");a.remove(),t.each(i,(function(i,a){a.default||t("<li>").append(t("<a>",{rel:"nofollow",html:a.wishlist_name,class:"add_to_wishlist",href:a.add_to_this_wishlist_url,"data-product-id":n,"data-product-type":s,"data-wishlist-id":a.id})).appendTo(e)}))}))}function b(i){void 0!==t.fn.block&&i.fadeTo("400","0.6").block({message:null,overlayCSS:{background:"transparent url("+yith_wcwl_l10n.ajax_loader_url+") no-repeat center",backgroundSize:"40px 40px",opacity:1}})}function k(i){void 0!==t.fn.unblock&&i.stop(!0).css("opacity","1").unblock()}function x(){if(navigator.cookieEnabled)return!0;document.cookie="cookietest=1";var t=-1!==document.cookie.indexOf("cookietest=");return document.cookie="cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT",t}function j(i){var e={},a=null;return i?"object"==typeof i?(a=(i=t.extend({fragments:null,s:"",container:t(document),firstLoad:!1},i)).fragments?i.fragments:i.container.find(".wishlist-fragment"),i.s&&(a=a.not("[data-fragment-ref]").add(a.filter('[data-fragment-ref="'+i.s+'"]'))),i.firstLoad&&(a=a.filter(".on-first-load"))):(a=t(".wishlist-fragment"),"string"!=typeof i&&"number"!=typeof i||(a=a.not("[data-fragment-ref]").add(a.filter('[data-fragment-ref="'+i+'"]')))):a=t(".wishlist-fragment"),a.each((function(){var i=t(this),a=i.attr("class").split(" ").filter(t=>t.length&&"exists"!==t).join(yith_wcwl_l10n.fragments_index_glue);e[a]=i.data("fragment-options")})),e}function C(i){if(yith_wcwl_l10n.enable_ajax_loading){var e=j(i=t.extend({firstLoad:!0},i));e&&t.ajax({data:{action:yith_wcwl_l10n.actions.load_fragments,fragments:e},method:"post",success:function(a){void 0!==a.fragments&&(T(a.fragments),n(),t(document).trigger("yith_wcwl_fragments_loaded",[e,a.fragments,i.firstLoad]))},url:yith_wcwl_l10n.ajax_url})}}function T(i){t.each(i,(function(i,e){var a="."+i.split(yith_wcwl_l10n.fragments_index_glue).filter(t=>t.length&&"exists"!==t).join("."),o=t(a),n=t(e).filter(a);n.length||(n=t(e).find(a)),o.length&&n.length&&o.replaceWith(n)}))}function S(){return navigator.userAgent.match(/ipad|iphone/i)}t(document).on("yith_wcwl_init",(function(){var S=t(this),P="undefined"!=typeof wc_add_to_cart_params&&null!==wc_add_to_cart_params?wc_add_to_cart_params.cart_redirect_after_add:"";S.on("click",".add_to_wishlist",(function(i){var e,a=t(this),o=a.attr("data-product-id"),s=t(".add-to-wishlist-"+o),l={add_to_wishlist:o,product_type:a.data("product-type"),wishlist_id:a.data("wishlist-id"),action:yith_wcwl_l10n.actions.add_to_wishlist_action,fragments:j(o)};if((e=t(document).triggerHandler("yith_wcwl_add_to_wishlist_data",[a,l]))&&(l=e),i.preventDefault(),jQuery(document.body).trigger("adding_to_wishlist"),yith_wcwl_l10n.multi_wishlist&&yith_wcwl_l10n.modal_enable){var d=a.parents(".yith-wcwl-popup-footer").prev(".yith-wcwl-popup-content"),c=d.find(".wishlist-select"),r=d.find(".wishlist-name"),_=d.find(".wishlist-visibility").filter(":checked");if(l.wishlist_id=c.is(":visible")?c.val():"new",l.wishlist_name=r.val(),l.wishlist_visibility=_.val(),"new"===l.wishlist_id&&!l.wishlist_name)return r.closest("p").addClass("woocommerce-invalid"),!1;r.closest("p").removeClass("woocommerce-invalid")}if(x())return t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:l,dataType:"json",beforeSend:function(){b(a)},complete:function(){k(a)},success:function(i){var e=i.result,o=i.message;yith_wcwl_l10n.multi_wishlist?(v(o),void 0!==i.user_wishlists&&y(i.user_wishlists)):g(o),"true"!==e&&"exists"!==e||(void 0!==i.fragments&&T(i.fragments),yith_wcwl_l10n.multi_wishlist&&!yith_wcwl_l10n.hide_add_button||s.find(".yith-wcwl-add-button").remove(),s.addClass("exists")),n(),t("body").trigger("added_to_wishlist",[a,s])}}),!1;window.alert(yith_wcwl_l10n.labels.cookie_disabled)})),S.on("click",".wishlist_table .remove_from_wishlist",(function(i){var e=t(this);return i.preventDefault(),w(e),!1})),S.on("adding_to_cart","body",(function(t,i,e){void 0!==i&&void 0!==e&&i.closest(".wishlist_table").length&&(e.remove_from_wishlist_after_add_to_cart=i.closest("[data-row-id]").data("row-id"),e.wishlist_id=i.closest(".wishlist_table").data("id"),"undefined"!=typeof wc_add_to_cart_params&&(wc_add_to_cart_params.cart_redirect_after_add=yith_wcwl_l10n.redirect_to_cart),"undefined"!=typeof yith_wccl_general&&(yith_wccl_general.cart_redirect=yith_wcwl_l10n.redirect_to_cart))})),S.on("added_to_cart","body",(function(t,i,e,a){if(void 0!==a&&a.closest(".wishlist_table").length){"undefined"!=typeof wc_add_to_cart_params&&(wc_add_to_cart_params.cart_redirect_after_add=P),"undefined"!=typeof yith_wccl_general&&(yith_wccl_general.cart_redirect=P);var o=a.closest("[data-row-id]"),n=o.closest(".wishlist-fragment").data("fragment-options");a.removeClass("added"),o.find(".added_to_cart").remove(),yith_wcwl_l10n.remove_from_wishlist_after_add_to_cart&&n.is_user_owner&&o.remove()}})),S.on("added_to_cart","body",(function(){var i=t(".woocommerce-message");0===i.length?t("#yith-wcwl-form").prepend(yith_wcwl_l10n.labels.added_to_cart_message):i.fadeOut(300,(function(){t(this).replaceWith(yith_wcwl_l10n.labels.added_to_cart_message).fadeIn()}))})),S.on("cart_page_refreshed","body",n),S.on("click",".show-title-form",f),S.on("click",".wishlist-title-with-form h2",f),S.on("click",".remove_from_all_wishlists",(function(i){var e=t(this),a=e.attr("data-product-id"),o=e.data("wishlist-id"),s=e.closest(".content"),l={action:yith_wcwl_l10n.actions.remove_from_all_wishlists,prod_id:a,wishlist_id:o,fragments:j(a)};i.preventDefault(),t.ajax({beforeSend:function(){b(s)},complete:function(){k(s)},data:l,dataType:"json",method:"post",success:function(t){void 0!==t.fragments&&T(t.fragments),n()},url:yith_wcwl_l10n.ajax_url})})),S.on("click",".hide-title-form",p),S.on("click",".save-title-form",u),S.on("change",".wishlist_manage_table .wishlist-visibility",m),S.on("change",".change-wishlist",(function(){var i=t(this),e=i.parents(".cart.wishlist_table"),a=e.data("token"),o=i.parents("[data-row-id]").data("row-id");h({wishlist_token:a,destination_wishlist_token:i.val(),item_id:o,fragments:j()},(function(){b(e)}),(function(t){void 0!==t.fragments&&T(t.fragments),k(e)}))})),S.on("click",".yith-wcwl-popup-footer .move_to_wishlist",(function(){var i=t(this),e=i.attr("data-product-id"),a=i.data("origin-wishlist-id"),o=i.closest("form"),s=o.find(".wishlist-select").val(),l=o.find(".wishlist-name"),d=l.val(),c=o.find(".wishlist-visibility").filter(":checked").val();if("new"===s&&!d)return l.closest("p").addClass("woocommerce-invalid"),!1;l.closest("p").removeClass("woocommerce-invalid"),h({wishlist_token:a,destination_wishlist_token:s,item_id:e,wishlist_name:d,wishlist_visibility:c,fragments:j(e)},(function(){b(i)}),(function(t){var e=t.message;yith_wcwl_l10n.multi_wishlist?(v(e),void 0!==t.user_wishlists&&y(t.user_wishlists)):g(e),void 0!==t.fragments&&T(t.fragments),n(),k(i)}))})),S.on("click",".delete_item",(function(){var i=t(this),e=i.attr("data-product-id"),a=i.data("item-id"),o=t(".add-to-wishlist-"+e);return t.ajax({url:yith_wcwl_l10n.ajax_url,data:{action:yith_wcwl_l10n.actions.delete_item_action,item_id:a,fragments:j(e)},dataType:"json",beforeSend:function(){b(i)},complete:function(){k(i)},method:"post",success:function(e){var a=e.fragments,s=e.message;yith_wcwl_l10n.multi_wishlist&&v(s),i.closest(".yith-wcwl-remove-button").length||g(s),void 0!==a&&T(a),n(),t("body").trigger("removed_from_wishlist",[i,o])}}),!1})),S.on("change",".yith-wcwl-popup-content .wishlist-select",(function(){var i=t(this);"new"===i.val()?i.parents(".yith-wcwl-first-row").next(".yith-wcwl-second-row").show():i.parents(".yith-wcwl-first-row").next(".yith-wcwl-second-row").hide()})),S.on("change","#bulk_add_to_cart",(function(){var i=t(this),e=i.closest(".wishlist_table").find("[data-row-id]").find('input[type="checkbox"]:not(:disabled)');i.is(":checked")?e.attr("checked","checked").change():e.removeAttr("checked").change()})),S.on("submit",".wishlist-ask-an-estimate-popup",(function(){var i=t(this),e=i.closest("form"),a=i.closest(".pp_content"),o=e.serialize();return t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:o+"&action="+yith_wcwl_l10n.actions.ask_an_estimate,dataType:"json",method:"post",success:function(i){if(void 0!==i.result&&i.result){var o=i.template;void 0!==o&&(e.replaceWith(o),a.css("height","auto"),setTimeout(v,yith_wcwl_l10n.time_to_close_prettyphoto))}else void 0!==i.message&&(e.find(".woocommerce-error").remove(),e.find(".popup-description").after(t("<div>",{text:i.message,class:"woocommerce-error"})))},url:yith_wcwl_l10n.ajax_url}),!1})),S.on("click",".yith-wfbt-add-wishlist",(function(i){i.preventDefault();var e=t(this),a=t("#yith-wcwl-form");t("html, body").animate({scrollTop:a.offset().top},500),function(i,e){var a=i.attr("data-product-id"),o=t(document).find(".cart.wishlist_table"),s=o.data("pagination"),l=o.data("per-page"),d=o.data("id"),c=o.data("token"),r={action:yith_wcwl_l10n.actions.reload_wishlist_and_adding_elem_action,pagination:s,per_page:l,wishlist_id:d,wishlist_token:c,add_to_wishlist:a,context:"frontend",product_type:i.data("product-type")};if(!x())return void window.alert(yith_wcwl_l10n.labels.cookie_disabled);t.ajax({type:"POST",url:yith_wcwl_l10n.ajax_url,data:r,dataType:"html",beforeSend:function(){b(o)},complete:function(){k(o)},success:function(i){var a=t(i),o=a.find("#yith-wcwl-form"),s=a.find(".yith-wfbt-slider-wrapper");e.replaceWith(o),t(".yith-wfbt-slider-wrapper").replaceWith(s),n(),t(document).trigger("yith_wcwl_reload_wishlist_from_frequently")}})}(e,a)})),S.on("submit",".yith-wcwl-popup-form",(function(){return!1})),S.on("yith_infs_added_elem",(function(){e()})),S.on("found_variation",(function(i,e){var a=t(i.target).data("product_id"),o=e.variation_id,n=t('[data-product-id="'+a+'"]').add('[data-original-product-id="'+a+'"]'),s=n.closest(".wishlist-fragment");a&&o&&n.length&&(n.each((function(){var i,e=t(this),n=e.closest(".yith-wcwl-add-to-wishlist");e.attr("data-original-product-id",a),e.attr("data-product-id",o),n.length&&(void 0!==(i=n.data("fragment-options"))&&(i.product_id=o,n.data("fragment-options",i)),n.removeClass((function(t,i){return i.match(/add-to-wishlist-\S+/g).join(" ")})).addClass("add-to-wishlist-"+o).attr("data-fragment-ref",o))})),b(s),C({fragments:s,firstLoad:!1}))})),S.on("reset_data",(function(i){var e=t(i.target).data("product_id"),a=t('[data-original-product-id="'+e+'"]'),o=a.closest(".wishlist-fragment");e&&a.length&&(a.each((function(){var i,a=t(this),o=a.closest(".yith-wcwl-add-to-wishlist"),n=a.attr("data-product-id");a.attr("data-product-id",e),a.attr("data-original-product-id",""),o.length&&(void 0!==(i=o.data("fragment-options"))&&(i.product_id=e,o.data("fragment-options",i)),o.removeClass("add-to-wishlist-"+n).addClass("add-to-wishlist-"+e).attr("data-fragment-ref",e))})),b(o),C({fragments:o,firstLoad:!1}))})),S.on("yith_wcwl_reload_fragments",C),S.on("yith_infs_added_elem",(function(t,i){C({container:i,firstLoad:!1})})),S.on("yith_wcwl_fragments_loaded",(function(i,e,a,o){o&&t(".variations_form").find(".variations select").last().change()})),S.on("click",".yith-wcwl-popup-feedback .close-popup",(function(t){t.preventDefault(),v()})),function(){if(void 0!==yith_wcwl_l10n.enable_notices&&!yith_wcwl_l10n.enable_notices)return;if(t(".yith-wcwl-add-to-wishlist").length&&!t("#yith-wcwl-popup-message").length){var i=t("<div>").attr("id","yith-wcwl-message"),e=t("<div>").attr("id","yith-wcwl-popup-message").html(i).hide();t("body").prepend(e)}}(),s(),l(),d(),c(),_(),t(document).on("click",".show-tab",(function(i){var e=t(this),a=e.closest(".yith-wcwl-popup-content"),o=e.data("tab"),n=a.find(".tab").filter("."+o);if(i.preventDefault(),!n.length)return!1;e.addClass("active").siblings(".show-tab").removeClass("active"),n.show().siblings(".tab").hide(),"create"===o?a.prepend('<input type="hidden" id="new_wishlist_selector" class="wishlist-select" value="new">'):a.find("#new_wishlist_selector").remove()})),t(document).on("change",".wishlist-select",(function(){var i=t(this),e=i.closest(".yith-wcwl-popup-content"),a=i.closest(".tab"),o=e.find(".tab.create"),n=e.find(".show-tab"),s=n.filter('[data-tab="create"]');"new"===i.val()&&o.length&&(a.hide(),o.show(),n.removeClass("active"),s.addClass("active"),i.find("option").removeProp("selected"),i.change())})),i(),a(),e(),o(),function(){var i=!1;if(!yith_wcwl_l10n.is_wishlist_responsive)return;t(window).on("resize",(function(){var e=t(".wishlist_table.responsive"),a=e.is(".mobile"),o=window.matchMedia("(max-width: 768px)"),s=e.closest("form"),l=s.attr("class"),d=s.data("fragment-options"),c={},r=!1;e.length&&(o.matches&&e&&!a?(d.is_mobile="yes",r=!0):!o.matches&&e&&a&&(d.is_mobile="no",r=!0),r&&(i&&i.abort(),c[l.split(" ").join(yith_wcwl_l10n.fragments_index_glue)]=d,i=t.ajax({beforeSend:function(){b(e)},complete:function(){k(e)},data:{action:yith_wcwl_l10n.actions.load_mobile_action,fragments:c},method:"post",success:function(i){void 0!==i.fragments&&(T(i.fragments),n(),t(document).trigger("yith_wcwl_responsive_template",[a,i.fragments]))},url:yith_wcwl_l10n.ajax_url})))}))}(),r(),C()})).trigger("yith_wcwl_init")}));
}

//lazyload
function eowbc_lazyload(){
	!function(t,n){"object"==typeof exports&&"undefined"!=typeof module?module.exports=n():"function"==typeof define&&define.amd?define(n):(t=t||self).LazyLoad=n()}(this,(function(){"use strict";function t(){return(t=Object.assign||function(t){for(var n=1;n<arguments.length;n++){var e=arguments[n];for(var i in e)Object.prototype.hasOwnProperty.call(e,i)&&(t[i]=e[i])}return t}).apply(this,arguments)}var n="undefined"!=typeof window,e=n&&!("onscroll"in window)||"undefined"!=typeof navigator&&/(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent),i=n&&"IntersectionObserver"in window,a=n&&"classList"in document.createElement("p"),o=n&&window.devicePixelRatio>1,r={elements_selector:"IMG",container:e||n?document:null,threshold:300,thresholds:null,data_src:"src",data_srcset:"srcset",data_sizes:"sizes",data_bg:"bg",data_bg_hidpi:"bg-hidpi",data_bg_multi:"bg-multi",data_bg_multi_hidpi:"bg-multi-hidpi",data_poster:"poster",class_applied:"applied",class_loading:"loading",class_loaded:"loaded",class_error:"error",unobserve_completed:!0,unobserve_entered:!1,cancel_on_exit:!1,callback_enter:null,callback_exit:null,callback_applied:null,callback_loading:null,callback_loaded:null,callback_error:null,callback_finish:null,callback_cancel:null,use_native:!1},c=function(n){return t({},r,n)},l=function(t,n){var e,i=new t(n);try{e=new CustomEvent("LazyLoad::Initialized",{detail:{instance:i}})}catch(t){(e=document.createEvent("CustomEvent")).initCustomEvent("LazyLoad::Initialized",!1,!1,{instance:i})}window.dispatchEvent(e)},s=function(t,n){return t.getAttribute("data-"+n)},u=function(t,n,e){var i="data-"+n;null!==e?t.setAttribute(i,e):t.removeAttribute(i)},d=function(t){return s(t,"ll-status")},f=function(t,n){return u(t,"ll-status",n)},_=function(t){return f(t,null)},g=function(t){return null===d(t)},v=function(t){return"native"===d(t)},b=function(t,n,e,i){t&&(void 0===i?void 0===e?t(n):t(n,e):t(n,e,i))},p=function(t,n){a?t.classList.add(n):t.className+=(t.className?" ":"")+n},h=function(t,n){a?t.classList.remove(n):t.className=t.className.replace(new RegExp("(^|\\s+)"+n+"(\\s+|$)")," ").replace(/^\s+/,"").replace(/\s+$/,"")},m=function(t){return t.llTempImage},E=function(t,n){if(n){var e=n._observer;e&&e.unobserve(t)}},I=function(t,n){t&&(t.loadingCount+=n)},A=function(t,n){t&&(t.toLoadCount=n)},L=function(t){for(var n,e=[],i=0;n=t.children[i];i+=1)"SOURCE"===n.tagName&&e.push(n);return e},y=function(t,n,e){e&&t.setAttribute(n,e)},w=function(t,n){t.removeAttribute(n)},k=function(t){return!!t.llOriginalAttrs},z=function(t){if(!k(t)){var n={};n.src=t.getAttribute("src"),n.srcset=t.getAttribute("srcset"),n.sizes=t.getAttribute("sizes"),t.llOriginalAttrs=n}},O=function(t){if(k(t)){var n=t.llOriginalAttrs;y(t,"src",n.src),y(t,"srcset",n.srcset),y(t,"sizes",n.sizes)}},C=function(t,n){y(t,"sizes",s(t,n.data_sizes)),y(t,"srcset",s(t,n.data_srcset)),y(t,"src",s(t,n.data_src))},M=function(t){w(t,"src"),w(t,"srcset"),w(t,"sizes")},N=function(t,n){var e=t.parentNode;e&&"PICTURE"===e.tagName&&L(e).forEach(n)},x=function(t,n){L(t).forEach(n)},R={IMG:function(t,n){N(t,(function(t){z(t),C(t,n)})),z(t),C(t,n)},IFRAME:function(t,n){y(t,"src",s(t,n.data_src))},VIDEO:function(t,n){x(t,(function(t){y(t,"src",s(t,n.data_src))})),y(t,"poster",s(t,n.data_poster)),y(t,"src",s(t,n.data_src)),t.load()}},G=function(t,n){var e=R[t.tagName];e&&e(t,n)},T=function(t,n,e){I(e,1),p(t,n.class_loading),f(t,"loading"),b(n.callback_loading,t,e)},D={IMG:function(t,n){u(t,n.data_src,null),u(t,n.data_srcset,null),u(t,n.data_sizes,null),N(t,(function(t){u(t,n.data_srcset,null),u(t,n.data_sizes,null)}))},IFRAME:function(t,n){u(t,n.data_src,null)},VIDEO:function(t,n){u(t,n.data_src,null),u(t,n.data_poster,null),x(t,(function(t){u(t,n.data_src,null)}))}},F=function(t,n){u(t,n.data_bg_multi,null),u(t,n.data_bg_multi_hidpi,null)},V=function(t,n){var e=D[t.tagName];e?e(t,n):function(t,n){u(t,n.data_bg,null),u(t,n.data_bg_hidpi,null)}(t,n)},j=["IMG","IFRAME","VIDEO"],P=function(t,n){!n||function(t){return t.loadingCount>0}(n)||function(t){return t.toLoadCount>0}(n)||b(t.callback_finish,n)},S=function(t,n,e){t.addEventListener(n,e),t.llEvLisnrs[n]=e},U=function(t,n,e){t.removeEventListener(n,e)},$=function(t){return!!t.llEvLisnrs},q=function(t){if($(t)){var n=t.llEvLisnrs;for(var e in n){var i=n[e];U(t,e,i)}delete t.llEvLisnrs}},H=function(t,n,e){!function(t){delete t.llTempImage}(t),I(e,-1),function(t){t&&(t.toLoadCount-=1)}(e),h(t,n.class_loading),n.unobserve_completed&&E(t,e)},B=function(t,n,e){var i=m(t)||t;$(i)||function(t,n,e){$(t)||(t.llEvLisnrs={});var i="VIDEO"===t.tagName?"loadeddata":"load";S(t,i,n),S(t,"error",e)}(i,(function(a){!function(t,n,e,i){var a=v(n);H(n,e,i),p(n,e.class_loaded),f(n,"loaded"),V(n,e),b(e.callback_loaded,n,i),a||P(e,i)}(0,t,n,e),q(i)}),(function(a){!function(t,n,e,i){var a=v(n);H(n,e,i),p(n,e.class_error),f(n,"error"),b(e.callback_error,n,i),a||P(e,i)}(0,t,n,e),q(i)}))},J=function(t,n,e){!function(t){t.llTempImage=document.createElement("IMG")}(t),B(t,n,e),function(t,n,e){var i=s(t,n.data_bg),a=s(t,n.data_bg_hidpi),r=o&&a?a:i;r&&(t.style.backgroundImage='url("'.concat(r,'")'),m(t).setAttribute("src",r),T(t,n,e))}(t,n,e),function(t,n,e){var i=s(t,n.data_bg_multi),a=s(t,n.data_bg_multi_hidpi),r=o&&a?a:i;r&&(t.style.backgroundImage=r,function(t,n,e){p(t,n.class_applied),f(t,"applied"),F(t,n),n.unobserve_completed&&E(t,n),b(n.callback_applied,t,e)}(t,n,e))}(t,n,e)},K=function(t,n,e){!function(t){return j.indexOf(t.tagName)>-1}(t)?J(t,n,e):function(t,n,e){B(t,n,e),G(t,n),T(t,n,e)}(t,n,e)},Q=["IMG","IFRAME"],W=function(t){return t.use_native&&"loading"in HTMLImageElement.prototype},X=function(t,n,e){t.forEach((function(t){return function(t){return t.isIntersecting||t.intersectionRatio>0}(t)?function(t,n,e,i){b(e.callback_enter,t,n,i),function(t,n,e){n.unobserve_entered&&E(t,e)}(t,e,i),function(t){return!g(t)}(t)||K(t,e,i)}(t.target,t,n,e):function(t,n,e,i){g(t)||(function(t,n,e,i){e.cancel_on_exit&&function(t){return"loading"===d(t)}(t)&&"IMG"===t.tagName&&(q(t),function(t){N(t,(function(t){M(t)})),M(t)}(t),function(t){N(t,(function(t){O(t)})),O(t)}(t),h(t,e.class_loading),I(i,-1),_(t),b(e.callback_cancel,t,n,i))}(t,n,e,i),b(e.callback_exit,t,n,i))}(t.target,t,n,e)}))},Y=function(t){return Array.prototype.slice.call(t)},Z=function(t){return t.container.querySelectorAll(t.elements_selector)},tt=function(t){return function(t){return"error"===d(t)}(t)},nt=function(t,n){return function(t){return Y(t).filter(g)}(t||Z(n))},et=function(t,e){var a=c(t);this._settings=a,this.loadingCount=0,function(t,n){i&&!W(t)&&(n._observer=new IntersectionObserver((function(e){X(e,t,n)}),function(t){return{root:t.container===document?null:t.container,rootMargin:t.thresholds||t.threshold+"px"}}(t)))}(a,this),function(t,e){n&&window.addEventListener("online",(function(){!function(t,n){var e;(e=Z(t),Y(e).filter(tt)).forEach((function(n){h(n,t.class_error),_(n)})),n.update()}(t,e)}))}(a,this),this.update(e)};return et.prototype={update:function(t){var n,a,o=this._settings,r=nt(t,o);A(this,r.length),!e&&i?W(o)?function(t,n,e){t.forEach((function(t){-1!==Q.indexOf(t.tagName)&&(t.setAttribute("loading","lazy"),function(t,n,e){B(t,n,e),G(t,n),V(t,n),f(t,"native")}(t,n,e))})),A(e,0)}(r,o,this):(a=r,function(t){t.disconnect()}(n=this._observer),function(t,n){n.forEach((function(n){t.observe(n)}))}(n,a)):this.loadAll(r)},destroy:function(){this._observer&&this._observer.disconnect(),Z(this._settings).forEach((function(t){delete t.llOriginalAttrs})),delete this._observer,delete this._settings,delete this.loadingCount,delete this.toLoadCount},loadAll:function(t){var n=this,e=this._settings;nt(t,e).forEach((function(t){K(t,e,n)}))}},et.load=function(t,n){var e=c(n);K(t,e)},et.resetStatus=function(t){_(t)},n&&function(t,n){if(n)if(n.length)for(var e,i=0;e=n[i];i+=1)l(t,e);else l(t,n)}(et,window.lazyLoadOptions),et}));
	 window.addEventListener('LazyLoad::Initialized', function (e) {
        var lazyLoadInstance = e.detail.instance;

        if (window.MutationObserver) {
            var observer = new MutationObserver(function(mutations) {
                var image_count = 0;
                var iframe_count = 0;
                var rocketlazy_count = 0;

                mutations.forEach(function(mutation) {
                    for (i = 0; i < mutation.addedNodes.length; i++) {
                        if (typeof mutation.addedNodes[i].getElementsByTagName !== 'function') {
                            return;
                        }

                       if (typeof mutation.addedNodes[i].getElementsByClassName !== 'function') {
                            return;
                        }

                        images = mutation.addedNodes[i].getElementsByTagName('img');
                        is_image = mutation.addedNodes[i].tagName == "IMG";
                        iframes = mutation.addedNodes[i].getElementsByTagName('iframe');
                        is_iframe = mutation.addedNodes[i].tagName == "IFRAME";
                        rocket_lazy = mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');

                        image_count += images.length;
		                iframe_count += iframes.length;
		                rocketlazy_count += rocket_lazy.length;

                        if(is_image){
                            image_count += 1;
                        }

                        if(is_iframe){
                            iframe_count += 1;
                        }
                    }
                } );

                if(image_count > 0 || iframe_count > 0 || rocketlazy_count > 0){
                    lazyLoadInstance.update();
                }
            } );

            var b      = document.getElementsByTagName("body")[0];
            var config = { childList: true, subtree: true };

            observer.observe(b, config);
        }
    }, false);
}

var render_data = '';
var _render_container = '';

//render products DOM to view
function eo_wbc_filter_render_html(data,render_container) {


	/*jQuery("#loading").removeClass('loading');
	return true;*/

	render_data = data;
	_render_container = render_container;

	jQuery("#loading").removeClass('loading');
	//Replace Result Count Status...
	if(jQuery('.woocommerce-result-count',jQuery(data)).html()!==undefined){
		if(jQuery(".woocommerce-result-count").length>0){
			jQuery(".woocommerce-result-count").html(jQuery('.woocommerce-result-count',jQuery(data)).html());
		} else {
			jQuery(jQuery('.woocommerce-result-count',jQuery(render_data)).get(0).outerHTML).insertBefore('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products');
		}
	}
	else {
		jQuery(".woocommerce-result-count").html('');	
	}

	//Replacing Product listings....

	document.wbc_data = data;
	
	/*console.log(data);*/

	let container_html = jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products',jQuery(data)).html();	
	
	/*if(container_html===undefined || container_html==='') {
		container_html = jQuery(jQuery(data),'.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').html();
	}*/

	if(container_html===undefined || container_html==='') {
		container_html = jQuery(".elementor-products-grid",jQuery(data)).html();
	}

	if(container_html!==undefined && container_html!=='') {	
		if( typeof(is_card_view_rendered) == undefined || typeof(is_card_view_rendered) == 'undefined' || is_card_view_rendered == false ) {
			if(jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products').length<=0) {
				jQuery(render_container).html(container_html);
			} else {
				jQuery(render_container).html(container_html);
			}			
		}						
		else {
			wbc_attach_card_views();
		}

		var links=jQuery(".products a,.product-listing a");
		jQuery.each(links,function(index,element) {

			var href=jQuery(element).attr('href');
			if(typeof(href)!==typeof(undefined) && href.hasOwnProperty('indexOf')){
				if(href.indexOf('?')==-1) {
					jQuery(element).attr('href',jQuery(element).attr('href')+eo_wbc_object.eo_product_url);
				} else {
					jQuery(element).attr('href',href.substring(0,href.indexOf('?'))+eo_wbc_object.eo_product_url);
				}
			}
			
		});
	}
	else {
		jQuery(render_container/*".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"*/).html('<p class="woocommerce-info" style="width: 100%;">No products were found matching your selection.</p>');	
	}	

	/*if(render_container===".products,.product-listing,.row-inner>.col-lg-9:eq(0),.jet-woo-products"){*/
		//Replacing Pagination details.....		
		//console.log(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());

		if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()!==undefined) {
			if(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination').length>0){
				jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html(jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html());
			} else {
				let product_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
				if(product_container.length<=0) {
					product_container = jQuery(".elementor-products-grid");
					if(product_container.length<=0) {
						product_container = jQuery(".elementor-widget-container").has('[data-elementor-type="loop"]');
						if(product_container.length<=0) {
							product_container = jQuery("[data-widget_type='archive-posts.archive_custom']");						
						}
					}
				}
				//jQuery(product_container).append('<nav class="woocommerce-pagination">'+jQuery('.woocommerce-pagination,.pagination,jet-filters-pagination',jQuery(data)).html()+'</nav>');
			}
		}
		else {
			jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html('');	
		}
	/*}*/

	//jQuery("body").fadeTo('fast','1')									
	jQuery("#loading").removeClass('loading');
	jQuery('.products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)').addClass('product_grid_view');
	//jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination').css('visibility','visible');
	if(jQuery(".row-inner>.col-lg-9").length>0){
		jQuery(".row-inner>.col-lg-9 *").each(function(i,e) {		
		    if(jQuery(e).css('opacity') == '0'){
				jQuery(e).css('opacity','1');        
		    }
		});
		jQuery(".t-entry-visual-overlay").removeClass('t-entry-visual-overlay');
		jQuery(".double-gutter .tmb").css('width','50%');
		jQuery(".double-gutter .tmb").css('display','inline-flex');
	}
	
	jQuery('.products,.product-listing,.row-inner>.col-lg-9:eq(0),.woocommerce-pagination,.pagination,jet-filters-pagination').css('visibility','visible');

	// Fix for the yith wishlist.
	if(typeof(yith_wcwl_l10n)=='object'){
		eowbc_yith_wishlist_fix();
	}
	// lazyload
	if(typeof(LazyLoad)=='function'){
		eowbc_lazyload();
	}
}

/*if(eo_wbc_object.disp_regular=='1'){
	*/
	window.eo_wbc_object.enable_filter = true;
	jQuery.fn.eo_wbc_filter_change_native= function(init_call=false,form_selector="form#eo_wbc_filter",render_container='',parameters={}) {
	//flag indicates if to show products in tabular view or woocommerce's default style.		

		if(window.eo_wbc_object.enable_filter===false){
			return false;
		}

		if(render_container==='') {
			render_container = jQuery(".products:eq(0),.product-listing:eq(0),.row-inner>.col-lg-9:eq(0)");
			if(render_container.length<=0) {
				render_container = jQuery(".elementor-products-grid");
			}
		}

		var form=jQuery(form_selector/*"form#eo_wbc_filter"*/);	
		if(form.find('[name="html_destination"]').length>0){
			render_container = form.find('[name="html_destination"]').val();
		}
		var site_url=eo_wbc_object.eo_cat_site_url;
		var ajax_url = '';

		if(site_url.includes('?')) {
			ajax_url = site_url+eo_wbc_object.eo_cat_query;
		} else {
			ajax_url = site_url+'/?'+eo_wbc_object.eo_cat_query;
		}

		console.log(eo_wbc_object);

		jQuery.ajax({
			url: ajax_url,//form.attr('action'),
			data:form.serialize(), // form data
			type:'GET'/*form.attr('method')*/, // POST
			beforeSend:function(xhr){
				//jQuery("body").fadeTo('slow','0.3')
				window.eo_wbc_object.enable_filter = false;	
				jQuery("#loading").addClass('loading');							
				console.log(this.url);					
			},
			complete : function(){
				//console.log(this.url);
			},
			success:function(data){		
				//console.log(JSON.stringify(data));
				eo_wbc_filter_render_html(data,render_container);
				window.eo_wbc_object.enable_filter = true;
			},
			error:function(data){
				jQuery("#loading").removeClass('loading');
				window.eo_wbc_object.enable_filter = true;
			}
		});
		return false;
	}	
	
	if(typeof(window.eo_wbc_filter_change) === 'undefined') {
		window.eo_wbc_filter_change = jQuery.fn.eo_wbc_filter_change_native;
	}

	if( (typeof(jQuery.fn.eo_wbc_filter_change)=="undefined" || jQuery.fn.eo_wbc_filter_change==undefined) && typeof(window.eo_wbc_e_tabview) !== 'object' ){		
		jQuery.fn.eo_wbc_filter_change = jQuery.fn.eo_wbc_filter_change_native;
	}
/*}*/

jQuery(document).ready(function($){

	window.eo_wbc_object = window.eo_wbc_object || {};
	window.eo_wbc_object.enable_filter = window.eo_wbc_object.enable_filter || false;

	jQuery('body').on('click','.navigation .page-numbers,.woocommerce-pagination a.page-numbers',function(e){
	    e.preventDefault();
	    e.stopPropagation();
	    
		jQuery('[name="paged"]').val(parseInt(jQuery(this).text().replace(',','')));
		jQuery.fn.eo_wbc_filter_change();
	});
	
	jQuery("[data-toggle_column]").click(function(){
		if(jQuery(this).hasClass('active')){		
			jQuery("[data-toggle_slug='"+jQuery(this).data('toggle_column')+"']").css('display','none');
			jQuery(this).removeClass('active');

		} else {
			jQuery("[data-toggle_slug='"+jQuery(this).data('toggle_column')+"']").css('display','table-cell');
			jQuery(this).addClass('active');
			
		}
	});

	jQuery(document).on('click',".reset_all_filters",function(){
        jQuery("[data-reset]").each(function(e){
            eval(jQuery(this).data('reset'));
        })
        jQuery.fn.eo_wbc_filter_change();
        return false;
    })  

	if(eo_wbc_object.disp_regular){
	
		//jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").html('');		
		if(!eo_wbc_object.btnfilter_now){			
			jQuery("#eo_wbc_filter").on('change',"input:not(:checkbox)",function(){
				jQuery('[name="paged"]').val('1');
				jQuery.fn.eo_wbc_filter_change();										
			});
		}

		if(typeof(jQuery.fn.eo_wbc_filter_change) === typeof(undefined) &&  typeof(window.eo_wbc_filter_change) === 'function') {
			jQuery.fn.eo_wbc_filter_change = window.eo_wbc_filter_change;				
		}
		

		//changes: mahesh@emptyops.com
		// To prevent initila call for the ajax -- speed optimization -- stop ajax at init load;
		if(typeof(eo_wbc_e_tabview)===typeof(undefined) || typeof(eo_wbc_e_tabview.init_data)===typeof(undefined) || typeof(eo_wbc_object)==typeof(eo_wbc_object) ){
			jQuery.fn.eo_wbc_filter_change(true);
		}

		//pagination for non-table based view

		jQuery(".woocommerce-pagination,.pagination,jet-filters-pagination").on('click','a,.jet-filters-pagination__link',function(event){
			
			event.preventDefault();
			event.stopPropagation();								
			
			if(jQuery(this).hasClass("next") || jQuery(this).hasClass("prev")){
			
				if(jQuery(this).hasClass("next")){
					jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())+1);
				}
				if(jQuery(this).hasClass("prev")){
					jQuery("[name='paged']").val(parseInt(jQuery(".page-numbers.current").text())-1);
				}	
			}		
			else {
				jQuery("[name='paged']").val(jQuery(this).text());
			}		
			jQuery.fn.eo_wbc_filter_change();
		});
	}
	/////////////////////////
	////////////////////////
	if(jQuery.fn.hasOwnProperty('accordion') && typeof(jQuery.fn.accordion)==='function'){
		jQuery( ".eo_wbc_advance_filter" ).accordion({
		  collapsible: true,
		  active:false
		});
	}

	//Reset form and display
	jQuery(".eo_wbc_srch_btn:eq(2)").click(function(){					
		///////////////////////////////////////////
		document.forms.eo_wbc_filter.reset();
		jQuery(".eo_wbc_srch_btn:eq(2)").trigger('reset');
		jQuery("#eo_wbc_attr_query").val("");
		jQuery('[name="paged"]').val('1');
		jQuery.fn.eo_wbc_filter_change(true);

	});	
});

function reset_icon(e,selector){
	e.preventDefault();
	e.stopPropagation()
	jQuery('.eo_wbc_filter_icon_select[data-filter="'+selector+'"]').trigger('click');
	return false;
}

function reset_slider(e,selector,first,second){	
	e.preventDefault();
	e.stopPropagation()

	window.document.splugins = window.document.splugins || {};
	window.document.splugins.ui = window.document.splugins.ui || {};
	window.document.splugins.ui.slider = window.document.splugins.ui.slider || jQuery.fn.slider;

	let ui_slider = jQuery.fn.slider;		
	jQuery.fn.slider = window.document.splugins.ui.slider;	

	jQuery(".ui.slider[data-slug='"+selector+"']").slider('set rangeValue',first,second);
	if(jQuery("[name='_attribute']").val().includes(selector)) {					    			
		_values=jQuery("[name='_attribute']").val().split(',')
		_index=_values.indexOf(selector)
		_values.splice(_index,1)
		jQuery("[name='_attribute']").val(_values.join());
	}

	jQuery.fn.slider = ui_slider;
	return false;
}

function reset_price(e,min,max) {
	e.preventDefault();
	e.stopPropagation()
	jQuery(".ui.slider[data-slug='price']").slider('set rangeValue',min,max);
	return false;	
}

function reset_checkbox(e,selector){
	e.preventDefault();
	e.stopPropagation()
	jQuery(selector).filter(":not(:checked)").trigger('click');
	return false;
}

function reset_button(e,selector){
	e.preventDefault();
	e.stopPropagation()
	jQuery(selector).filter(".eo_wbc_button_selected").trigger('click');
	return false;
}