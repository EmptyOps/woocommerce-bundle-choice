<?php

/*
*	Template to show choice buttons
*/

$first_term = wbc()->options->get_option('configuration','first_name');
$second_term = wbc()->options->get_option('configuration','second_name');

$first_slug = wbc()->wc->get_term_by( 'term_taxonomy_id', $first_term, 'product_cat')->slug;

$second_slug = wbc()->wc->get_term_by( 'term_taxonomy_id', $second_term, 'product_cat')->slug;


$first_object = wbc()->wc->get_term_by( 'term_taxonomy_id', $first_term, 'product_cat');
$first_name ='';
if(!empty($first_object) and !is_wp_error($first_object)){
	$first_name = $first_object->name;
}
$first_name = !empty($first_name)?$first_name:'FIRST';


$second_object = wbc()->wc->get_term_by( 'term_taxonomy_id', $second_term, 'product_cat');
$second_name ='';
if(!empty($second_object) and !is_wp_error($second_object)){
	$second_name = $second_object->name;
}
$second_name = !empty($second_name)?$second_name:'SECOND';


$first_url = \eo\wbc\model\Category_Attribute::instance()->get_category_link($first_slug);

$second_url = \eo\wbc\model\Category_Attribute::instance()->get_category_link($second_slug);

$heading = wbc()->options->get_option('appearance_wid_btns','tagline_text','');
if(empty($heading)) {
	$heading = __('Make your own pair from recommendation','woo-bundle-choice');
}

$button_text = wbc()->options->get_option('appearance_wid_btns','button_text','');
if(empty($button_text)) {
	$button_text = __('Start with ','woo-bundle-choice');
}
else {
	//add ending space if missing 
	$button_text = trim($button_text)." ";
}

//clear the session
if(function_exists('wc') && !empty(wc()->session)){
	wbc()->session->set('EO_WBC_SETS',NULL);
}    

// Load assets first to avoid zaping effect. 
// TODO here should not load instantly and follow the wp standard by using hook as well as setting last param to false to our load asset function. 
// add_action( 'wp_enqueue_scripts',function(){ 
	wbc()->load->asset('css','fomantic/semantic.min', array(), "", true);
	wbc()->load->asset('css','publics/buttons', array(), "", true);
	wbc()->load->asset('js','fomantic/semantic.min', array(), "", true);
	wbc()->load->asset('js','publics/buttons', array(), "", true);
// },50);

//moved from the home class of older version 
if(!function_exists('eo_wbc_code')){
	function eo_wbc_code() //script to get color code from buttons
	{
		//commented since set in buttons.js
	    // return '<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) --><script>'.
	    //         'jQuery(document).ready(function($){'.
	    //           '$(".eo_button_container .button").each(function(i,e){'.
	    //             '$(e).attr("href",$(e).attr("href")+"&EO_WBC_CODE="+window.btoa($(".woocommerce a.button").css("background-color")+"/"+$(".woocommerce a.button").css("color")));'.
	    //           '});'.
	    //           '$("#wbc_").find("button").on("click",function(){ document.location.href=$(this).attr("href"); })'.
	    //         '});'.
	    //        '</script>';
	    return '';
	}
}

//moved from the home class of older version 
if(!function_exists('eo_wbc_buttons_css')){
	function eo_wbc_buttons_css(){

		$button_backcolor_active = wbc()->options->get_option('appearance_wid_btns','button_backcolor_active','');
		$button_textcolor = wbc()->options->get_option('appearance_wid_btns','button_textcolor','#ffffff');
		$eo_wbc_home_btn_border_color = false;	//dropped this field. wbc()->options->get_option('appearance_wid_btns','button_backcolor_active','');
		$button_radius = wbc()->options->get_option('appearance_wid_btns','button_radius','');
		$button_hovercolor = wbc()->options->get_option('appearance_wid_btns','button_hovercolor','');
	  	
	  	// return '<style>.eo-wbc-container .ui.buttons .button{'.
	  	return 
	  		'<style>.wbc_wid_btns{'.
				($button_backcolor_active?'background-color:'.$button_backcolor_active.' !important;':'').
				($button_textcolor?'color:'.$button_textcolor.' !important;':'').
				($eo_wbc_home_btn_border_color?'border-color:'.$eo_wbc_home_btn_border_color.' !important;':'').
				($button_radius?'border-radius:'.$button_radius.' !important;':'').
			'}'.
				($button_hovercolor?'.wbc_wid_btns:hover{ background-color:'.$button_hovercolor.' !important; }':'').
			'</style>';
	        
	}
}
?>
<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
<div id="wbc_" class="eo_wbc_container" <?php echo (isset($is_embed_using_js) && $is_embed_using_js) ? 'style="display: none !important;"' : '';?>>
	<h2 class="ui center aligned header" style="text-align: center !important;">
		<?php _e($heading); ?>
	</h2>
	<div class="ui grid center aligned container">
		<div class="ui buttons large row stackable" style="display: inline-block;display: inline-flex;">
			<button class="ui button primary column wbc_wid_btns" href="<?php echo $first_url .'EO_WBC=1&BEGIN='.$first_slug.'&STEP=1&FIRST=&SECOND='; ?>" onclick="window.location.href=jQuery(this).attr('href');">
				<?php echo $button_text.$first_name; ?>
			</button>

			<div class="or" style="margin: auto;"></div>


			<button class="ui button primary column wbc_wid_btns" href="<?php echo $second_url .'EO_WBC=1&BEGIN='.$second_slug.'&STEP=1&FIRST=&SECOND='; ?>" onclick="window.location.href=jQuery(this).attr('href');">
				<?php echo $button_text.$second_name; ?>
			</button>
		</div>
	</div>
	<style>.ui.grid{margin-left: auto;margin-right: auto;} @media only screen and (max-width: 768px){ .eo-wbc-container .ui.buttons .button{ border-radius: 0 !important; } }</style>
	<?php echo eo_wbc_buttons_css(); ?>
	<br/><br/>
	<?php echo eo_wbc_code(); ?>
</div>
<!-- Created with Wordpress plugin - BUNDLOICE (formerly Woo Choice Plugin) -->
