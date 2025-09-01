<?php
/*
*	A page builder class.
*/
namespace eo\wbc\model;
use \sp\theme\view\ui\Composer_Elements;

defined( 'ABSPATH' ) || exit;

class SP_WBC_Page_Builder extends \eo\wbc\system\core\SP_Page_Builder {

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

	public function build_page($ui,$key = 'theme_ui',$process_form = true,$ui_definition = null) {

		parent::build_page($ui,$key,$process_form,$ui_definition);

		// ACTIVE_TODO_OC_START
		// --we need to tac car of this wen need to do the need full here, we we impliment composeer supot weri sun after the fast run of thes ui and page builder class hierarche -- to h & to b
		// ACTIVE_TODO_OC_END
		// ACTIVE_TODO temp. below layer is moved inside the if condition while we are now calling this page builder class from the wbc layer because dependancy of the theme ui need to be removed for the wp org update version. but need to upgraded the moved layer as soon as we get chance and remove the if false. -- to h 
		if (false) {	
			$composer = \sp\theme\view\ui\Composer_Elements::instance();
		}

		if(!empty($ui)){

			if(!empty($ui['widgets']) and is_array($ui['widgets'])){
				// ACTIVE_TODO_OC_START
				// --we ma need to du sumthing or the need full wen we implyment externul page builder suport weri sun after the fast or secund run -- to h & to b
				// ACTIVE_TODO_OC_END
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
					
					// ACTIVE_TODO most probeli we ma need to call the ui builder class of the hire layers lick wbc application layer or even other hier layer or shimply the coluer of the function can impliment thar verjon of this function and defined wiche ui builder calss to be colued fast but any way insted of that a hook based of sum other appropriat arcitacer is beter insed of the colur impliment ther of vergan of this function an creat the duplicat code. if nathig cum sub last than simply markitsid todo by 3td revishon -- to h & to b
						// NOTE: so far it seems that below we have implimented the call to wbc ui builder build funaction.
					//$this->build($ui['content']['form'],$key);
					\eo\wbc\model\SP_WBC_Ui_Builder::instance()->build($ui['content']['form'],$key,$this->process_ui_form,null,$ui_definition);

				}				

				// ACTIVE_TODO_OC_START
				// --we ma need to du sumthing or the need full wen we implyment externul page builder suport weri sun after the fast or secund run -- to h & to b
				// ACTIVE_TODO_OC_END
				// ACTIVE_TODO temp. below layer is moved inside the if condition while we are now calling this page builder class from the wbc layer because dependancy of the theme ui need to be removed for the wp org update version. but need to upgraded the moved layer as soon as we get chance and remove the if false. -- to h 
				if (false) {					
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
	}

	public static function build_page_widgets($ui,$page_key,$args = array(),$is_return_html = false,$ui_definition = null){
		
		parent::build_page_widgets($ui,$page_key,$args,$is_return_html,$ui_definition);

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

        /*\sp\theme\view\ui\builder\Page_Builder*/ self::instance()->build_page($ui,'theme_ui',true,$ui_definition);
        
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