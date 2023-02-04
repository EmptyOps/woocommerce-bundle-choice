<?php
/*
*	A page builder class.
*/
namespace eo\wbc\model;
use \sp\theme\view\ui\Composer_Elements;

defined( 'ABSPATH' ) || exit;

class SP_WBC_Page_Builder extends \sp\purple_theme\system\core\SP_Page_Builder {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}


	public function getUI() {
		return $this->ui;
	}

	public function build_page($ui,$key = 'theme_ui',$process_form = true) {

		$composer = \sp\theme\view\ui\Composer_Elements::instance();

		if(!empty($ui)){

			if(!empty($ui['widgets']) and is_array($ui['widgets'])){
				if(array_search('header',$ui['widgets'])!==false) {
					get_template_part('header');
				}
				
				// changes by mahesh as its part of header
				// Please override at the header template with content
				/*if(array_search('menu',$ui['widgets'])!==false) {					
					wp_nav_menu(array(
						'menu_class'=>'menu-item nav-item',
						'container_class'=>'navbar-nav mr-auto'
					));
				}*/

				if(array_search('content',$ui['widgets'])!==false and !empty($ui['content'])) {
					$this->ui = $ui;
					$this->process_ui_form = $process_form;
					$this->build($ui['content']['form'],$key);
				}				

				if(array_search('footer',$ui['widgets'])!==false) {					

					if(array_key_exists($composer->get_prefered_builders(),$composer->get_builders()) and !empty($composer->get_footer_template())) {

						echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($composer->get_footer_template(),true);
					} else {
						get_template_part('footer');
					}					
				}
			}
		}
	}

	public static function build_page_widgets($ui,$page_key,$args = array(),$is_return_html = false){
		/*echo "build_page_widgets";
		wbc_pr($page_key);*/
		$ui=array(
			'widgets'=>array('content'),
			'content'=>array(
				'page'=>$page_key,
				'form'=>array(
					'content'=>$ui
				)
			)
		);
        
        if ($is_return_html) {
        	ob_start();
        }

        \sp\theme\view\ui\builder\Page_Builder::instance()->build_page($ui);
        
        if ($is_return_html) {
        	return ob_get_clean();
        }	
		
	}

}

/*$all_post_ids = get_posts(array(
    'fields'          => 'ids',
    'posts_per_page'  => -1,
    'post_type' => 'case_studies'
));*/