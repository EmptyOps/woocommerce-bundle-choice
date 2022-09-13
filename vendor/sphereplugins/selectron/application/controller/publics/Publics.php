<?php
namespace sp\selectron\controller\publics;

defined( 'ABSPATH' ) || exit;

class Publics {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public static function render(string $key = '',array $sections = array()) {

		/*$section = {
			array($class,'handler'),
			'default_hook',
			'section_key'
		}*/

		if(!empty($key) and !empty($sections) and is_array($sections)) {

			foreach($sections as $section) {
				
				/*if(!empty(wbc()->options->get_option($key.'_'.$section['section'],$section['section'].'_render_method'))) {*/

					$handler = $section['handler_object'];
					$default_action = $section['default_action'];


					switch(wbc()->options->get_option($key,$section['section'].'_render_method')) {
						case 'add_filter':
													
							add_filter(	wbc()->options->get_option($key,$section['section'].'_hook_text',$section['default_action']),
										array($handler,'hook_render'),
										wbc()->options->get_option($key,$section['section'].'_hook_params',$section['default_params']),
										wbc()->options->get_option($key,$section['section'].'_hook_priority',$section['default_priority'])
									);
							break;
						
						case 'query_selector':						
							
							$position = wbc()->options->get_option($key,$section['section'].'_query_location','after',false,true);

							call_user_func_array(array($handler,'js_render'),array(wbc()->options->get_option($key,$section['section'].'_query_string'),wbc()->options->get_option($key,$section['section'].'_query_delay'),$position));
							
							break;
						default:
							add_action(	wbc()->options->get_option($key,$section['section'].'_hook_text',$section['default_action']),
										array($handler,'hook_render'),
										wbc()->options->get_option($key,$section['section'].'_hook_params',$section['default_params']),
										wbc()->options->get_option($key,$section['section'].'_hook_priority',$section['default_priority'])
									);
							// halt execution
					}

				/*}*/

			}

		}

	}
}
