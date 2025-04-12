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
			// NOTE:From here, we have removed the original code inside the if (false) block. So, whenever there is a need to view the original or any other code for readability purposes, simply take the script below, put it in a new .js file in Sublime Text, and view it in readable format.Apart from that, we had removed the original code, and in some scenarios, that original code might have contained PHP variables like XYZ. Those would have been removed as well.And of course, even if the removed code from the if (false) block is not relevant to the current version, it might be required during future milestone tasks, so for this purpose, refer to the branch named "ui_QCed_ashish_-2" and check the commit dated 07-04-2025 for looking at the original code.
			//$selector = "your_selector_value"; // aa chet gpt ye aapelu chhe Replace this with your actual selector value
			$inline_script =
			    "window.document.splugins = window.document.splugins || {};\n" .
			    "window.document.splugins.tableview = window.document.splugins.tableview || {};\n" .
			    "window.document.splugins.tableview.table_container = '".$selector."';\n";
			wbc()->load->add_inline_script('', $inline_script, 'common');
		});
	}
}