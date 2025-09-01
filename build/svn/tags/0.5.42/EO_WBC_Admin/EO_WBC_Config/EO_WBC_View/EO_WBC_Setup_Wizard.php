<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_Admin_Setup_Wizard class.
 */
class EO_WBC_Setup_Wizard {
	
	private $step = '';
	private $steps = array();
	private $deferred_actions = array();

	public function __construct() {		
		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
		add_action( 'admin_init', array( $this, 'setup_wizard' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		$this->setup_wizard();
	}

	/**
	 * Add admin menus/screens.
	 */
	public function admin_menus() {
		add_dashboard_page( '', '', 'install_plugins', 'eowbc-setup', '' );
	}
	
	public function enqueue_scripts() {
		wp_register_style( 'eo-wbc-ui-css',plugin_dir_url(__FILE__).'css/fomantic/semantic.min.css','2.8.1');
        wp_enqueue_style( 'eo-wbc-ui-css');      

        wp_register_script( 'eo-wbc-ui-js',plugin_dir_url(__FILE__).'js/fomantic/semantic.min.js',array('jquery'),'2.8.1',true);
        wp_enqueue_script( 'eo-wbc-ui-js');   
	}
	
	public function setup_wizard() {
		if ( empty( $_GET['page'] ) || 'wc-setup' !== $_GET['page'] ) { // WPCS: CSRF ok, input var ok.
			return;
		}
		$default_steps = array(
			'inventory' => array(
				'name'    => __( 'Inventory', 'woo-bundle-choice' ),
				'view'    => array( $this, 'wbc_setup_inventory' ),
				'handler' => array( $this, 'wbc_setup_inventory_save' ),
			),
			'addons'     => array(
				'name'    => __( 'Addons', 'woo-bundle-choice' ),
				'view'    => array( $this, 'wbc_setup_addons' ),
				'handler' => array( $this, 'wbc_setup_addons_save' ),
			),
			'finish'    => array(
				'name'    => __( 'Finish', 'woo-bundle-choice' ),
				'view'    => array( $this, 'wc_setup_finish' ),
				'handler' => array( $this, 'wc_setup_finish_save' ),
			)
		);

		$this->steps = apply_filters( 'wbc_setup_wizard_steps', $default_steps );

		ob_start();
		$this->setup_wizard_header();
		$this->setup_wizard_steps();
		$this->setup_wizard_content();
		$this->setup_wizard_footer();
		exit;
	}

	public function get_next_step_link( $step = '' ) {
		if ( ! $step ) {
			$step = $this->step;
		}

		$keys = array_keys( $this->steps );
		if ( end( $keys ) === $step ) {
			return admin_url();
		}

		$step_index = array_search( $step, $keys, true );
		if ( false === $step_index ) {
			return '';
		}

		return add_query_arg( 'step', $keys[ $step_index + 1 ], remove_query_arg( 'activate_error' ) );
	}

	public function setup_wizard_header() {
		set_current_screen();
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
			<head>
				<meta name="viewport" content="width=device-width" />
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title><?php esc_html_e( 'WooCommerce Bundle Choice &rsaquo; Setup Wizard', 'woo-bundle-choice' ); ?></title>
				<?php do_action( 'admin_enqueue_scripts' ); ?>
				<?php wp_print_scripts( 'wc-setup' ); ?>
				<?php do_action( 'admin_print_styles' ); ?>
				<?php do_action( 'admin_head' ); ?>
			</head>
			<body class="wp-core-ui">			
				<div class="ui placeholder segment">
				  	<div class="ui icon header">
					    The following wizard will help you configure your store and get you started quickly.
				  	</div>				  
				
		<?php
	}

	public function setup_wizard_footer() {
		?>			

				</div>
			</body>
		</html>
		<?php
	}

	public function setup_wizard_steps() {
		$output_steps      = $this->steps;
		//Steps UI handling here...		
	}

	public function setup_wizard_content() {
		echo '<div class="wbc-setup-content">';
		if ( ! empty( $this->steps[ $this->step ]['view'] ) ) {
			call_user_func( $this->steps[ $this->step ]['view'], $this );
		}
		echo '</div>';
	}
	
	public function wbc_setup_inventory() {
		
	}

	public function wbc_setup_addons() {
		
	}

	public function wc_setup_finish() {
		
	}

	public function wc_setup_recommended_save() {
		check_admin_referer( 'wc-setup' );		
		$address        = isset( $_POST['store_address'] ) ? wc_clean( wp_unslash( $_POST['store_address'] ) ) : '';
		update_option( 'woocommerce_store_address', $address );
		wp_redirect( esc_url_raw( $this->get_next_step_link() ) );
		exit;
	}	
}

new WC_Admin_Setup_Wizard();
