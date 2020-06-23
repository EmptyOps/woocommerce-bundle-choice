<?php

/*
*	Template to show choice buttons
*/

$first_term = wbc()->options->get_option('configuration','first_name');
$second_term = wbc()->options->get_option('configuration','second_name');

$first_slug = get_term_by( 'term_taxonomy_id', $first_term, 'product_cat')->slug;

$second_slug = get_term_by( 'term_taxonomy_id', $first_term, 'product_cat')->slug;

$first_name = get_term_by( 'term_taxonomy_id', $first_term, 'product_cat')->name;
$first_name = !empty($first_name)?$first_name:'FIRST';

$second_name = get_term_by( 'term_taxonomy_id', $first_term, 'product_cat')->name;
$second_name = !empty($second_name)?$second_name:'SECOND';


$first_url = \eo\wbc\model\Category_Attribute::instance()->get_category_link($first_slug);

$second_url = \eo\wbc\model\Category_Attribute::instance()->get_category_link($second_slug);

$heading = wbc()->options->get_option('appearance_wid_btns','tagline_text',__('Make your own pair from recommendation','woo-bundle-choice'));

$button_text = wbc()->options->get_option('appearance_wid_btns','button_text',__('Start with ','woo-bundle-choice'));

WC()->session->set('EO_WBC_SETS',FALSE);            

// Load assets first to avoid zaping effect
wbc()->load->asset('css','fomantic/semantic.min');
wbc()->load->asset('css','publics/buttons');
wbc()->load->asset('js','fomantic/semantic.min');
wbc()->load->asset('js','publics/buttons');

?>
<!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
<div id="wbc_" class="eo_wbc_container">
	<h2 class="ui center aligned header" style="text-align: center !important;">
		<?php _e($heading); ?>
	</h2>
	<div class="ui grid center aligned container">
		<div class="ui buttons large row stackable">
			<button class="ui button primary column" href="<?php echo $first_url .'EO_WBC=1&BEGIN='.$first_slug.'&STEP=1'; ?>" >
				<?php echo $button_text.$first_name; ?>
			</button>

			<div class="or"></div>

			<button class="ui button primary column" href="<?php echo $second_url .'EO_WBC=1&BEGIN='.$second_slug.'&STEP=1'; ?>">
				<?php echo $button_text.$second_name; ?>
			</button>
		</div>
	</div>
	<style>.ui.grid{margin-left: auto;margin-right: auto;}  '/*.$this->eo_wbc_buttons_css().*/' @media only screen and (max-width: 768px){ .eo-wbc-container .ui.buttons .button{ border-radius: 0 !important; } }</style><br/><br/>
</div>
<!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
