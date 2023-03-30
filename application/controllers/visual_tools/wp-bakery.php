<?php
namespace eo\wbc\controllers\visual_tools; 

class WP_Bakery extends \WPBakeryShortCode {
	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		// no implementation
	}

	public function system_init() {
		//add_filter( 'vc_grid_item_shortcodes',array($this,'two_buttons'));
		add_action('vc_before_init',function(){
			vc_map( array(
		        "name"       => __( 'The Two Buttons', 'woo-bundle-choice' ),
		        "base"       => 'render_two_buttons',
		        'category' => __( 'BUNDLOICE (formerly Woo Choice Plugin)', 'woo-bundle-choice' ),
		        'description' => __( 'Add two button widget to show the buttons for starting the bundle builder.', 'woo-bundle-choice' ),
		        "icon" => 'https://img.icons8.com/ios/2x/button2.png',
		        'params'=>
				 	array( 
				 		array(
			                "type" => "textarea_html",
			                "holder" => "div",
			                "class" => "",                     
			                "heading" => __( "Button's Title", 'woo-bundle-choice' ),
			                "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
			                "value" => __( "<p>I am test text block. Click edit button to change this text.</p>", 'woo-bundle-choice' ),
			                "description" => __( "Enter Button's Header.", 'woo-bundle-choice' )
			            ),    

			            array(
			                'type'          => 'textfield',
			                'heading'       => __( 'First Button Text', 'woo-bundle-choice' ),
			                'param_name'    => 'first_label',
			                'value'         => __( 'FIRST', 'woo-bundle-choice' ),
			                'description'   => __( 'Label on the first button.', 'woo-bundle-choice' ),
			            ),


			            array(
			                'type'          => 'textfield',
			                'heading'       => __( 'Second Button Text', 'woo-bundle-choice' ),
			                'param_name'    => 'second_label',
			                'value'         => __( 'SECOND', 'woo-bundle-choice' ),
			                'description'   => __( 'Label on the second button.', 'woo-bundle-choice' ),
			            ),
			        )
			) );
		},999);
		add_shortcode( 'render_two_buttons', array( $this, 'render_two_buttons' ) );
	}

	public function render_two_buttons(  $atts, $content, $tag  ) {

		$atts = (shortcode_atts(array(
	        'first_label'   => 'FIRST',
	        'second_label'  => 'SECOND',
	    ), $atts));

	    $header = wpb_js_remove_wpautop($content, true);

	    ob_start();
	    ?>
	    <div>
	    	<h3><?php echo $header; ?></h3>
	    	<button><?php echo $atts['first_label']; ?></button> | <button><?php echo $atts['second_label']; ?></button>
	    </div>
	    <?php
	    return ob_get_clean();
	}
}
