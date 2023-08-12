<?php
namespace sp\wbc\controller\publics\feed\loop\selectron;
defined( 'ABSPATH' ) || exit;
class SP_SLCTRN_Swatches_Cart_Form extends \sp\selectron\controller\publics\container\Container{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function hook_render() {

		// if('loop/loop-end.php' === $template_name) {
			// ACTIVE_TODO whenver requred add support in selectron repo to support the local args and other var passing. or is it already implemented by m than jast use it 
			$args = array(); 

			$args['hook_callback_args'] = array();
	        // $args['hook_callback_args']['template_name'] = $template_name;
	        // $args['hook_callback_args']['template_path'] = $template_path;
	        // $args['hook_callback_args']['located'] = $located;
	        // $args['hook_callback_args']['hook_args'] = $hook_args;
			\eo\wbc\controllers\publics\pages\Feed::instance()->selectron_hook_render('swatches_cart_form','SP_SLCTRN_Swatches_Cart_Form',false,$args);
		// }

	}

	public function js_render($selector,$delay) {

		if(empty($selector)) {
			$selector = '';			
		}

		if(empty($delay)) {
			$delay = 0;
		}

		add_action('wp_head',function() use($selector,$delay){

			$selector_selector = $selector;
			$inline_script = "
			window.document.splugins = window.document.splugins || {}; 
			window.document.splugins.tableview = window.document.splugins.tableview || {};
			window.document.splugins.tableview.table_container = ".$selector_selector.";
			";


			wbc()->load->add_inline_script( '', $inline_script,'common' );

			if(false) {
			?>
			<script type="text/javascript">window.document.splugins = window.document.splugins || {}; window.document.splugins.tableview = window.document.splugins.tableview || {}; window.document.splugins.tableview.table_container = '<?php echo $selector; ?>' </script>
			<?php
			}
		});
	}
}
