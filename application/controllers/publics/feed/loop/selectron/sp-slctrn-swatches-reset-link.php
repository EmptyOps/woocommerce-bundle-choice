<?php
namespace sp\wbc\controller\publics\feed\loop\selectron;
defined( 'ABSPATH' ) || exit;
class SP_SLCTRN_Swatches_Reset_Link extends \sp\selectron\controller\publics\container\Container {

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

		parent::hook_render();

		//stuff
    	$arg_list = func_get_args();
    	//wbc_pr($arg_list); die;
    	$content = $arg_list[0];

		// if('loop/loop-end.php' === $template_name) {
			// ACTIVE_TODO whenver requred add support in selectron repo to support the local args and other var passing. or is it already implemented by m than jast use it 
			$args = array(); 

			$args['hook_callback_args'] = array();
	        $args['hook_callback_args']['content'] = $content;
			return \eo\wbc\controllers\publics\pages\Feed::instance()->selectron_hook_render('swatches_reset_link','SP_SLCTRN_Swatches_Reset_Link',false,$args);
		// }

	}

	public function js_render($selector,$delay) {

		parent::js_render($selector,$delay);

		if(empty($selector)) {
			$selector = '';			
		}

		if(empty($delay)) {
			$delay = 0;
		}

		add_action('wp_head',function() use($selector,$delay){

			$selector = $selector;

			$inline_script =
			    "window.document.splugins = window.document.splugins || {};\n" .
			    "window.document.splugins.tableview = window.document.splugins.tableview || {};\n" .
			    "window.document.splugins.tableview.table_container = '".$selector."';\n";
			wbc()->load->add_inline_script('', $inline_script, 'common');

			if(false) {
			?>
			<script type="text/javascript">window.document.splugins = window.document.splugins || {}; window.document.splugins.tableview = window.document.splugins.tableview || {}; window.document.splugins.tableview.table_container = '<?php echo $selector; ?>' </script>
			<?php
			}
		});
	}
}
