<?php
namespace sp\tableview\controller\publics\feed\loop\selectron;
defined( 'ABSPATH' ) || exit;
class SP_SLCTRN_Swatches_Reset_Link extends sp\selectron\controller\publics\container\Container{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function hook_render($content) {

		// if('loop/loop-end.php' === $template_name) {
			// ACTIVE_TODO whenver requred add support in selectron repo to support the local args and other var passing. or is it already implemented by m than jast use it 
			$args = array(); 

			$args['hook_callback_args'] = array();
	        $args['hook_callback_args']['content'] = $content;
			return \eo\tv\controller\publics\pages\Feed::selectron_hook_render('swatches_reset_link','SP_SLCTRN_Swatches_Reset_Link',false,$args);
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
			?>
			<script type="text/javascript">window.document.splugins = window.document.splugins || {}; window.document.splugins.tableview = window.document.splugins.tableview || {}; window.document.splugins.tableview.table_container = '<?php echo $selector; ?>' </script>
			<?php
		});
	}
}