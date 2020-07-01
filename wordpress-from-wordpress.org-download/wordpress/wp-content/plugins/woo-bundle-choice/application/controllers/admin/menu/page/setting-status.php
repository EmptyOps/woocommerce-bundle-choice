<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;

class Setting_status {

	private static $_instance;
	public static function instance() {
	if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		// no implementation.
	}

	public static function get_form_definition( $is_add_sample_values = false ) {
		

		$form_definition = array(
					'setting_status_setting'=>array(
						'label'=>'Settings',
						'form'=>array(
							'inventory_type'=>array(
								'label'=>'Inventory Type',
								'type'=>'select',
								'value'=>wbc()->options->get_option('setting_staus','inventory_type'),
<<<<<<< HEAD
								'options'=>array('jewelery'=>'Jewelery','clothing'=>'Clothing','home_decor'=>'Home Decor','others'=>'Others'),
=======
								'options'=>array('jewelry'=>'Jewelery','clothing'=>'Clothing','home_decor'=>'Home Decor','others'=>'Others'),
>>>>>>> 85b6309ea16a13e290aa6d79c6fc2d053408c6e3
								'class'=>array('fluid'),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
							),
							'features'=>array(
								'label'=>'Choose features',
								'type'=>'checkbox',
								'value'=>unserialize(wbc()->options->get_option('setting_staus','features',serialize(array()))),
								'options'=>array(
									'ring_builder'=>'Ring Builder',
									'pair_maker'=>'Pair Maker',
									'rapnet_api'=>'Rapnet (You will need paid <a href="https://sphereplugins.com/product/woocommerce-rapnet-integration-extension/" target="_blank">extension</a>)',
									'glowstar_api'=>'GlowStart Diamond API (API service is free, but you will need paid <a href="https://sphereplugins.com/product/diamond-api-integration/" target="_blank">extension</a>)',
									'guidance_tool'=>'Guidance Tool',
									'price_control'=>'Price Control'
									),
								'class'=>array('fluid'),
								'size_class'=>array('eight','wide'),
								'inline'=>true,
								'grouped'=>true
							),
							'save'=>array(
								'label'=>'Save',
								'type'=>'button',				
								'class'=>array('primary'),
								'attr'=>array("data-action='save'")
							)
						)							
					),
					'setting_status_log'=>array(
						'label'=>'Logs',
						'form'=>array(
							)
					),
				);
	    

	    return $form_definition;

	}

}	
