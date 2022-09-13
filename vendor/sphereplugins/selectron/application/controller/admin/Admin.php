<?php
namespace sp\selectron\controller\admin;

defined( 'ABSPATH' ) || exit;

class Admin {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}
	
	public static function add_tab(string $key = '',array $section=array(), $tab = array()) {

		/*
		*	$key : key to the configurations
		*	$section : list of sections { 'key' => 'Label'}
		*	$tab : the form defination
		*/

		add_action('admin_footer',function(){
			?>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery('.required.field[class*="_container_render_method"] .ui.radio').on('change',function(){

						let parent = jQuery(this).closest('.required.field[class*="_container_render_method"]').parent();
						if(jQuery(this).find('input:radio').val() === 'query_selector'){
							jQuery(parent).next().css('display','none');
							jQuery(parent).next().next().css('display','none');
							jQuery(parent).next().next().next().css('display','none');

							jQuery(parent).next().next().next().next().css('display','block');
							jQuery(parent).next().next().next().next().next().css('display','block');

						} else {

							jQuery(parent).next().css('display','block');
							jQuery(parent).next().next().css('display','block');
							jQuery(parent).next().next().next().css('display','block');

							jQuery(parent).next().next().next().next().css('display','none');
							jQuery(parent).next().next().next().next().next().css('display','none');
						}

					});
				});

				jQuery(window).on('load',function(){
					jQuery('.required.field[class*="_container_render_method"] :radio:checked').trigger('change')
				});
			</script>
			<?php
		});

		if(!empty($key) and !empty($section)) {

			foreach($section as $section_key=>$section_name) {

				

				$section_data[$section_key.'_devider'] = array(
					'label'=>$section_name,
					'type'=>'devider',
				);

				$section_data[$section_key.'_render_method'] = array(
					'label'=>'Render Method - '.$section_name,
					'type'=>'radio',
					'value'=>'add_filter',
					'validate'=>array('required'=>''),
					'sanitize'=>'sanitize_text_field',
					'options'=>array('add_filter'=>'Wordpress Filter','add_action'=>'Wordpress Action','query_selector'=>'JS Query Selector'),							
					'class'=>array(),										
					'size_class'=>array('required',$section_key.'_render_method'),
					'visible_info'=>array( 'label'=>'( Set the selector type to render the DOM. )',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				);

				$section_data[$section_key.'_hook_text'] = array(
					'label'=>'Hook Text - '.$section_name,
					'type'=>'text',
					'value'=>'',							
					'sanitize'=>'sanitize_text_field',
					'size_class'=>array($section_key.'_hook_method'),
					'visible_info'=>array( 'label'=>'( The hook\'s textual name on which the render the DOM. )',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				);

				$section_data[$section_key.'_hook_params'] = array(
					'label'=>'Hook Parameter Count - '.$section_name,
					'type'=>'number',
					'value'=>'1',							
					'sanitize'=>'sanitize_text_field',
					'size_class'=>array($section_key.'_hook_method'),
					'visible_info'=>array( 'label'=>'( Number of parameters to the hook. )',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				);

				$section_data[$section_key.'_hook_priority'] = array(
					'label'=>'Hook Priority - '.$section_name,
					'type'=>'number',
					'value'=>'10',							
					'sanitize'=>'sanitize_text_field',
					'size_class'=>array($section_key.'_hook_method'),
					'visible_info'=>array( 'label'=>'( Priority on the hook binding. )',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				);

				$section_data[$section_key.'_query_string'] = array(
					'label'=>'JS Selector String - '.$section_name,
					'type'=>'text',
					'value'=>'',							
					'sanitize'=>'sanitize_text_field',
					'size_class'=>array($section_key.'_query_method'),
					'visible_info'=>array( 'label'=>'( JavaScript selector query. )',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),	
				);

				$section_data[$section_key.'_query_delay'] = array(
					'label'=>'JS Delay(ms) - '.$section_name,
					'type'=>'number',
					'value'=>'',
					'sanitize'=>'sanitize_text_field',
					'size_class'=>array($section_key.'_query_method'),
					'visible_info'=>array( 'label'=>'( Delay the JS execution. )',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),
				);

				$section_data[$section_key.'_query_location'] = array(

					'label'=>'Position - '.$section_name,
					'type'=>'select',
					'value'=>array('after'),
					'options'=> array(
                        'after'=>'After',
                        'before'=>'Before',
                        'replaceWith'=>'Replace',
                        'append'=>'Append',
                        'prepend'=>'Prepend',
                    ),
					'sanitize'=>'sanitize_text_field',
					'size_class'=>array($section_key.'_query_method'),
					'visible_info'=>array( 'label'=>'( Delay the JS execution. )',
						'type'=>'visible_info',
						'class'=>array('fluid', 'small'),
						'size_class'=>array('sixteen','wide'),
					),
				);				
			}


			$section_data['submit_button'] = array(
				'label'=>eowbc_lang('Save'),
				'type'=>'button',
				'class'=>array('primary'),							
				'attr'=>array("data-action='save'",'data-tab_key="'.$key.'"'),
				'inline'=>false
			);

			$section_data = array(
					'label'=>'Dev Only - Selector/Hooks',
					'form'=> $section_data
				); 

			$tab[$key] = $section_data;			
		}

		return $tab;		
	}	
}
