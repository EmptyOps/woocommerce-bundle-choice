<?php

namespace eo\wbc\system\bootstrap;
//use \eo\wbc\helper\EOWBC_Options; 

defined( 'ABSPATH' ) || exit;


class Setup_Wizard {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		self::$_instance->available_sample = wbc()->config->get_available_samples();
		self::$_instance->available_feature = wbc()->config->get_all_feature();

		return self::$_instance;
	}

	private function __construct() { }

	public function build_setup_page() {

		//add_action( 'admin_menu',array($this,'generate_menu'),11);
		$this->generate_page();
	}

	public function generate_page(){


		$this->step = 1;
		$this->form = 'basic_config';
		$feature_option = array();
		$bonus_features = array();

		if(!empty(wbc()->sanitize->get('_wpnonce')) and wp_verify_nonce(wbc()->sanitize->get('_wpnonce'),'eo_wbc_setup')) {
			
			if(!empty(wbc()->sanitize->get('step'))){
				

				if(wbc()->sanitize->get('step')>3 or wbc()->sanitize->get('step')<1){ $_GET["step"]/*wbc()->sanitize->get('step')*/=1; }

				$forms = array('1' =>'basic_config', '2'=>'feature', '3'=>'finalize');
				$this->step = wbc()->sanitize->get('step');
				$this->form = empty($forms[$this->step])?$forms[1]:$forms[$this->step];
			}
			$this->action();

		}

		if( $this->step == 2 or $this->step == 3 ) {

			$bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));	

			$feature_option = (unserialize( wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())) ));	//unserialize(get_option('eo_wbc_feature_option', serialize(array())) );

		}

  //       ob_start();        
		
		// $this->enqueue_script();
		// $this->head();
		// //render form page 
		// call_user_func(array($this,$this->form));
		// $this->footer();

		// echo ob_get_clean();
  //       exit();

		$callback = $this->get_page( $this->step, $this->form, $feature_option,$bonus_features );

		$position = empty($menu['position'])?66:$menu['position'];

		// add_menu_page( eowbc_lang('BUNDLOICE (formerly Woo Choice Plugin) Setup'),eowbc_lang('Woo Choice Plugin Setup'),'manage_options','eo-wbc-init',$callback,$this->get_icon_url(),$position );   

		return true;
	}

	public function get_icon_url() {
		return esc_url(apply_filters( 'eowbc_icon_url',constant('EOWBC_ICON')));
	}

	public function get_page(int $step, string $template, array $feature_option, array $bonus_features){

		$template = empty($template)?'':$template;
		$callback = (empty($template)?'':function() use(&$step, &$template, &$feature_option){






			wbc()->load->template('admin/menu/page/header-part',array( "mode"=>"setup_wizard" ));
			wbc()->load->template('admin/setup-wizard/setup-wizard',array( "step"=>$step, "template"=>$template, "feature_option"=>$feature_option,'bonus_features'=>$bonus_features,'available_sample'=>$this->available_sample,'available_feature'=>$this->available_feature ) );			
			wbc()->load->template('admin/menu/page/footer-part',array( "mode"=>"setup_wizard" ));
		});
		return $callback;
	}

	public function load_page(int $step, string $template, array $feature_option, array $bonus_features){

		wbc()->load->template('admin/menu/page/header-part',array( "mode"=>"setup_wizard" ));
		wbc()->load->template('admin/setup-wizard/setup-wizard',array( "step"=>$step, "template"=>$template, "feature_option"=>$feature_option,"bonus_features"=>$bonus_features,'available_sample'=>$this->available_sample,'available_feature'=>$this->available_feature ) );			
		wbc()->load->template('admin/menu/page/footer-part',array( "mode"=>"setup_wizard" ));
		
	}

	public function init() {
		
		$this->step = 1;
		$this->form = 'basic_config';
		$feature_option = array();
		$bonus_features = array();

		if(!empty(wbc()->sanitize->get('_wpnonce')) and wp_verify_nonce(wbc()->sanitize->get('_wpnonce'),'eo_wbc_setup')){
			
			if(!empty(wbc()->sanitize->get('step'))) {
				

				if(wbc()->sanitize->get('step')>3 or wbc()->sanitize->get('step')<1){ $_GET["step"]/*wbc()->sanitize->get('step')*/=1; }

				$forms = array('1' =>'basic_config', '2'=>'feature', '3'=>'finalize');
				$this->step = wbc()->sanitize->get('step');
				$this->form = empty($forms[$this->step])?$forms[1]:$forms[$this->step];
			}
			$this->action();

		}

		if( $this->step == 2 or $this->step == 3 ) {

			$bonus_features = array_filter(unserialize(wbc()->options->get_option('setting_status_setting_status_setting','bonus_features',serialize(array()))));	

			$feature_option = (unserialize( wbc()->options->get_option('setting_status_setting_status_setting','features',serialize(array())) ));	//unserialize(get_option('eo_wbc_feature_option', serialize(array())) );
		}

		//06-04-2020: hiren turned off full screen mode enable in future when decided 
		////require_once(ABSPATH . 'wp-admin/includes/screen.php');
		// \set_current_screen();

        ob_start();        
		
		// $this->enqueue_script();
		// $this->head();
		// //render form page 
		// call_user_func(array($this,$this->form));
		// $this->footer();
		$this->load_page( $this->step, $this->form, $feature_option ,$bonus_features);

		echo ob_get_clean();
        exit();
	}

	public function action() {
		if(!empty($_GET) and !empty(wbc()->sanitize->get('action'))) {

			switch(wbc()->sanitize->get('action')) {
				case 'feature':
					
					//on 08-05-2020: hiren changed the feature options that are presented during installation  
					//$options = ['ring_builder','pair_maker','rapnet_api','glowstar_api','guidance_tool','price_control'];
					$options = ['ring_builder','pair_maker','guidance_tool','price_control','filters_on_home','filters_on_shop_cat','opts_uis_on_item_page','spec_view_on_item_page','shortcodes','api_integrations','rapnet_api','glowstar_api'];
					$feature_option= array();
					foreach ($options as $option) {
						if(!empty(wbc()->sanitize->get($option))) {
							// instead of push set the option as key and in val 1 since at every other place in plugin it is assumed like that
							// array_push($feature_option,$option);							
							$feature_option[$option] = $option;
						}						
					}											

					// removed this condition so that if user select nothing then in that case the empty array is saved
					// if(!empty($feature_option)){
						//update_option('eo_wbc_feature_option', serialize($feature_option));

						wbc()->options->update_option('setting_status_setting_status_setting','features', serialize($feature_option));
					// }

					$bonus_options = ['filters_shortcode','filters_shop_cat','opts_uis_item_page','spec_view_item_page','price_control'];
					$bonus_feature_option= array();
					foreach ($bonus_options as $option) {
						if(!empty(wbc()->sanitize->get($option))) {
							// instead of push set the option as key and in val 1 since at every other place in plugin it is assumed like that
							// array_push($feature_option,$option);							
							$bonus_feature_option[$option] = $option;
						}						
					}

					wbc()->options->update_option('setting_status_setting_status_setting','bonus_features', serialize($bonus_feature_option));

					break;
				case 'final':

					break;
				default:
					//basic_config					
					if(!empty(wbc()->sanitize->get('eo_wbc_inventory_type'))) {
						//update_option( 'eo_wbc_inventory_type',sanitize_text_field($_GET['eo_wbc_inventory_type']));

						wbc()->options->update_option('setting_status_setting_status_setting','inventory_type',wbc()->sanitize->get('eo_wbc_inventory_type'));
					}					
			}
		}
	}

	public function enqueue_script() {
		
		add_action('admin_enqueue_scripts',function(){
	        wp_enqueue_script( 'jQuery');   
		});
	}

	public function head() {
		return false;	//this templates are no longer used
		?>
			<html>
		        <head>
		            <meta name="viewport" content="width=device-width" />
		            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		            <title><?php esc_html_e( 'BUNDLOICE (formerly Woo Choice Plugin) &rsaquo; Setup Wizard', 'woocommerce' ); ?></title>
		            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		            <link rel="stylesheet" type="text/css" href="<?php echo constant('EOWBC_ASSET_URL').'css/fomantic/semantic.min.css'; ?>">
		        </head>
		        <body>
		        	<div class="ui segment container" style="height: 100%;margin-bottom: 0px; border: none !important;
    box-shadow: none;">
					 	<div class="ui icon header" style="width: 100%;">
							<img src="<?php echo constant('EO_WBC_PLUGIN_ICO_BIG'); ?>" style = 'max-width: 100;max-height: auto;'/>
							<br/>
							<p>BUNDLOICE (formerly Woo Choice Plugin)</p>
							<hr/>
						</div>
						<?php $this->navigation(); ?>
						<form method="GET">
							<?php wp_nonce_field('eo_wbc_setup'); ?>
							<input type="hidden" name="page" value="<?php echo 'eowbc'; ?>"/>
							<input type="hidden" name="wbc_setup" value="<?php echo '1'; ?>"/>
							<input type="hidden" name="step" value="<?php echo $this->step+1; ?>">
		<?php
	} 

	public function navigation() {
		return false;	//this templates are no longer used
		?>
			<div class="ui ordered fluid steps">
		      	<div class=" <?php echo $this->step == 1 ? 'active':( $this->step > 1 ? 'completed':''); ?> step">		        	
		        	<div class="content">
		          		<div class="title">Inventory</div>
		          		<div class="description">Choose inventory</div>
		        	</div>
		      	</div>
		      	<div class="<?php echo $this->step == 2 ? 'active':( $this->step > 2 ? 'completed':''); ?> step">
			        <div class="content">
				        <div class="title">Features</div>
		          		<div class="description">Choose Features to be enabled</div>
		        	</div>
		      	</div>
		      	<div class="<?php echo $this->step == 3 ? 'active':( $this->step > 3 ? 'completed':''); ?> step">			        
			        <div class="content">
				        <div class="title">Finalize</div>
		          		<div class="description">Add sample products and Complete</div>
		        	</div>
		      	</div>
		    </div>
		<?php
	}

	public function basic_config() {
		?>
			<input type="hidden" name="action" value="basic_config">
			<div class="ui form segment">
			  	<div class="inline fields">
			    	<label><?php _e('Inventory Type','woo-bundle-choice'); ?></label>
			    	<div class="field">
			      		<div class="ui selection dropdown">
						  	<input type="hidden" name="eo_wbc_inventory_type">
						  	<i class="dropdown icon"></i>
						  	<div class="default text"><?php _e('Inventory Type','woo-bundle-choice'); ?></div>
						  	<div class="menu">
							    <div class="item" data-value="jewelryfgdfgfg"><?php _e('Jewelry','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="clothing"><?php _e('Clothing','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="home_decor"><?php _e('Home Decor','woo-bundle-choice'); ?></div>
							    <div class="item" data-value="others"><?php _e('Others','woo-bundle-choice'); ?></div>
						  	</div>
						</div>
			    	</div>			    			    	
			  	</div>
			  	<br/>
			  	<div class="inline fields">			  		
			  		<div class="field">
			  			<button class="ui inverted primary button" type="submit">Submit</button>
			  		</div>
			  	</div>
			</div>
		
		<?php
	}

	public function feature() {				
		$feature_option = unserialize(get_option('eo_wbc_feature_option', serialize(array())) );		
		?>		
			<input type="hidden" name="action" value="feature">
			<div class="ui form segment">
			  	<div class="grouped fields">

			    	<label><?php _e('Choose features','woo-bundle-choice'); ?></label>

			    	<?php if(wbc()->sanitize->get('eo_wbc_inventory_type') == 'jewelry'): ?>	
		      		<div class="field">
					    <div class="ui toggle checkbox">
					      	<input type="checkbox" tabindex="0" class="hidden" name="ring_builder" value="1" <?php echo in_array('ring_builder',$feature_option)?'checked="checked"':''; ?>>
					      	<label>Ring Builder</label>
					    </div>
					</div>
					<?php endif; ?>

					<?php if(wbc()->sanitize->get('eo_wbc_inventory_type') == 'clothing'): ?>	
		      		<div class=" field">
					    <div class="ui toggle checkbox">
					      	<input type="checkbox" tabindex="0" class="hidden" name="pair_maker" value="1" <?php echo in_array('pair_maker',$feature_option)?'checked="checked"':''; ?>>
					      	<label>Pair Maker</label>
					    </div>
					</div>
					<?php endif; ?>
		    		
		    		<?php if(wbc()->sanitize->get('eo_wbc_inventory_type') == 'jewelry'): ?>	
		      		<div class=" field">
					    <div class="ui toggle checkbox">
					      	<input type="checkbox" tabindex="0" class="hidden" name="rapnet_api" value="1" <?php echo in_array('rapnet_api',$feature_option)?'checked="checked"':''; ?>>
					      	<label>Rapnet (You will need paid <a href="https://sphereplugins.com/product/woocommerce-rapnet-integration-extension/" target="_blank">extension</a>)</label>
					    </div>
					</div>

					<div class=" field">
					    <div class="ui toggle checkbox">
					      	<input type="checkbox" tabindex="0" class="hidden" name="glowstar_api" value="1" <?php echo in_array('glowstar_api',$feature_option)?'checked="checked"':''; ?>>
					      	<label>GlowStart Diamond API (API service is free, but you will need paid <a href="https://sphereplugins.com/product/diamond-api-integration/" target="_blank">extension</a>)</label>
					    </div>
					</div>
					<?php endif; ?>

					<?php if(wbc()->sanitize->get('eo_wbc_inventory_type') == 'others' or wbc()->sanitize->get('eo_wbc_inventory_type') == 'home_decore'): ?>	
					<div class=" field">
					    <div class="ui toggle checkbox">
					      	<input type="checkbox" tabindex="0" class="hidden" name="guidance_tool" value="1" <?php echo in_array('guidance_tool',$feature_option)?'checked="checked"':''; ?>>
					      	<label>Guidance Tool</label>
					    </div>
					</div>
					<?php endif; ?>
					
					<div class="field">
					    <div class="ui toggle checkbox">
					      	<input type="checkbox" tabindex="0" class="hidden" name="price_control" value="1" <?php echo in_array('price_control',$feature_option)?'checked="checked"':''; ?>>
					      	<label>Price Control</label>
					    </div>
					</div>		    	

			  	</div>
			  	<div class="inline fields">
			  		<div class="field">
			  			<button class="ui inverted red button" type="submit" onclick="window.history.go(-1); return false;">Back</button>
			  		</div>
			  		<div class="field">
			  			<button class="ui inverted primary button" type="submit">Submit</button>
			  		</div>
			  	</div>
			</div>
		
		<?php
	}

	public function finalize() {		
		?>		
			<input type="hidden" name="action" value="final">
			<div class="ui form segment">			  	
				<div class="ui form">
					<div class="inline fields">
						<div class="field">
				  			<button class="ui inverted red button" type="submit" onclick="window.history.go(-1); return false;">Back</button>
				  		</div>
						<div class="field">
							<div class="ui inverted green button" id="create_product">Add sample and Finish</div>	
						</div>
						<div class="field">
			  				<u><a href="<?php echo admin_url('admin.php?page=eowbc'); ?>">Skip and finish</a></u>
			  			</div>
					</div>
				</div>
			  	
			</div>
		
		<?php
	}

	public function footer() {
		?>
					  	</form>
					</div>
					<script src="<?php echo constant('EOWBC_ASSET_URL').'js/fomantic/semantic.min.js'; ?>"></script>

					<script>
						jQuery(document).ready(function(){
							jQuery('.ui.dropdown').dropdown();
							jQuery('[name="eo_wbc_inventory_type"]').parent().dropdown('set selected','<?php echo get_option('eo_wbc_inventory_type',''); ?>');    
							jQuery('.ui.checkbox').checkbox();

							jQuery("#create_product").on('click',function(e){
								console.log('preventDefault');
								e.preventDefault();
								e.stopPropagation();
								window.location.href = "<?php echo admin_url("admin.php?page=eowbc&eo_wbc_view_auto_jewel=1"); ?>";
							});
						});
					</script>
	        	</body>
	        </html>
        <?php
	}

}

add_action('admin_init',function(){
	Setup_Wizard::instance()->init();
});
