<?php
class WBC_TEST
{
	protected static $instance = null;
	public $wp_tests_dir;
	public $tests_dir;
	public $plugin_dir;

	public function __construct() {
		require_once(getenv( 'HOME' ) .'/.composer/vendor/autoload.php');


		// phpcs:disable WordPress.PHP.DiscouragedPHPFunctions, WordPress.PHP.DevelopmentFunctions
		ini_set( 'display_errors', 'on' );
		error_reporting( E_ALL );
		// phpcs:enable WordPress.PHP.DiscouragedPHPFunctions, WordPress.PHP.DevelopmentFunctions

		// Ensure server variable is set for WP email functions.
		// phpcs:disable WordPress.VIP.SuperGlobalInputUsage.AccessDetected
		if ( ! isset( $_SERVER['SERVER_NAME'] ) ) {
			$_SERVER['SERVER_NAME'] = 'localhost';
		}
		// phpcs:enable WordPress.VIP.SuperGlobalInputUsage.AccessDetected



		$this->tests_dir    = dirname( __FILE__ );
		$this->plugin_dir   = dirname( $this->tests_dir );
		$this->wp_tests_dir = getenv( 'WP_TESTS_DIR' ) ? getenv( 'WP_TESTS_DIR' ) : '/tmp/wordpress-tests-lib';

		if ( ! file_exists( $this->wp_tests_dir . '/includes/functions.php' ) ) {
			echo "Could not find ".$this->wp_tests_dir."/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			exit( 1 );
		}	

		require_once $this->wp_tests_dir . '/includes/functions.php';
		require_once $this->wp_tests_dir . '/includes/bootstrap.php';
		require_once $this->wp_tests_dir . '/includes/listener-loader.php';

		tests_add_filter( 'muplugins_loaded', array( $this, 'load_wbc' ) );		
		tests_add_filter( 'setup_theme', array( $this, 'install_wbc' ) );

		// load WBC testing framework
		$this->includes();
	}

	public function includes() {				
		
	}

	public function load_wbc() {	
		require_once ABSPATH . '/wp-content/plugins/woocommerce/woocommerce.php';			
		require_once $this->plugin_dir . '/woo-bundle-choice.php';		
	}

	public function install_wbc() {

		// Clean existing install first.
		define( 'WP_UNINSTALL_PLUGIN', true );
		define( 'WC_REMOVE_ALL_DATA', true );

		activate_plugin('woocommerce/woocommerce.php');
		activate_plugin('woocommerce-bundle-choice/woo-bundle-choice.php');		
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
WBC_TEST::instance();