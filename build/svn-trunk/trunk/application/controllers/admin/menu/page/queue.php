<?php
namespace eo\wbc\controllers\admin\menu\page;

defined( 'ABSPATH' ) || exit;
session_start(); 
if ( ! class_exists( 'Queue' ) ) {
	class Queue {
	 
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
			
			wbc()->load->model('admin/form-builder');

			$subtabs = array();

			$page_slug = wbc()->sanitize->get('page');

			if(empty($page_slug)) {
				$current_page_param = wbc()->sanitize->post('current_page_param');
				if(!empty($current_page_param)) {
					$page_slug = $current_page_param;
				}
			}
			$plugin_slug = explode("---", $page_slug)[0];
			$subtabs = apply_filters('sp_queue_subtabs',$plugin_slug, $subtabs);			

				//queue sync details list

				$table = array();
				$table['id']='sp_queue_info_list';
				$table['head'] = array(
									0=>array(
										// 0=>array(
										// 	'is_header' => 1, 
										// 	'val' => '',
										// 	'is_checkbox' => true, 
										// 	'sanitize'=>'sanitize_text_field',
										// 	'checkbox'=> array('id'=>'dummy','value'=>array(),'options'=>array('row0_col0_chk'=>''),'options_attrs'=>array('row0_col0_chk'=>array('data-action="bulk_select_all"', 'data-bulk_table_id="'.$table["id"].'"')),'class'=>'','where'=>'in_table')
										// ),
										0=>array(
											'is_header' => 1, 
											'val' => 'Batch',
											'field_id'=>'sp_queue_batch_size'
										),
										1=>array(
											'is_header' => 1, 
											'val' => 'Last Sync Complete At',
											'field_id'=>'sp_queue_last_sync_time'
										),
										2=>array(
											'is_header' => 1, 
											'val' => 'In Process At Index',
											'field_id'=>'sp_queue_in_process_at_index'
										),
										3=>array(
											'is_header' => 1, 
											'val' => 'In Process Last Updated At',
											'field_id'=>'sp_queue_in_process_last_updated_at'
										),
									),
								);
				$table['body'] = array(
									0=>array(
										0=>array(
											'val' => eowbc_lang('No records available yet'),
											'colspan' => 4, 
											'class'=> ''
										),
									),
								);
			
			$form_definition = array();
			$sbcnt = -1;

			foreach($subtabs as $sbkey => $sbvalue) {

				$sbcnt++;
			
    			$sp_queue_batch_size = \eo\wbc\system\core\SP_Queue::instance()->get_batch_size($sbkey);

				$form_definition['queue___'.$sbkey] = array(
					'label'=>( !empty($sbvalue['display_name']) ? $sbvalue['display_name'].'('.$sbkey.')' : $sbkey /*$sbvalue['api_config_api_name']*/ ).' Sync Details',
					'form'=> array(
						'queue_sync_details_section'=>array('label'=>'Sync Details','type'=>'segment','desc'=>'The details provided below are of last 10 batch process events for particular API. For scheduling the frequency for example at what speed the API should be synced, Edit particular API on Add/Edit APIs tab and then go to scheduler section at bottom.'
						),
						// 'saved_tab_key'=>array(
						// 	'type'=>'hidden',
						// 	'value'=>''
						// ),
						// 'current_page_param'=>array(
						// 	'type'=>'hidden',
						// 	'value'=>$page_slug
						// ),
						
						// 'resolver_path'=>array(
						// 	'type'=>'hidden',
						// 	'value'=>constant('EOWBC_DIRECTORY').'application/controllers/ajax/eowbc_queue.php',
						// ),
						'list'=>array_merge( $table , array(
							'type'=>'table' )
						), 

						'save_sec_title'=>array(
							'label'=>"Queue Settings",
							'type'=>'label',
							'size_class'=>array('eight','wide')
						),

						'sp_queue_reset_link___'.$sbkey=>array(
							'label'=>'Reset',
							'type'=>'link',
							'attr'=>array("href='".esc_url(admin_url('admin.php?page='.$plugin_slug.'---sp-queue&reset=1&sbkey='.$sbkey))."'"),
							'class'=>array('secondary'),
						),
						'visible_info'=>array( 'label'=>'Click above link to reset the queue. After reset it will sync again from the beginning.',
							'type'=>'visible_info',
							'class'=>array('fluid', 'small'),
							'size_class'=>array('sixteen','wide','required'),
						),	

						'sp_queue_flush_and_reset_link___'.$sbkey=>array(
							'label'=>'Flush and Reset',
							'type'=>'link',
							'attr'=>array("href='javascript:void(0);'", " onclick='window.document.splugins.common.confirm_and_redirect( \"Are sure you to delete all synced data? Please confirm. Note that depending on the storage option and the api inventory size it may take sometime for this process to finish.\", \"".esc_url(admin_url('admin.php?page='.$plugin_slug.'---sp-queue&reset=1&sbkey='.$sbkey.'&hsulf=1'))."\" )' "),	
							'class'=>array('secondary'),
						),
						'visible_info_flush_and_reset'=>array( 'label'=>'Click above link to flush existing synced data and reset the queue. Be sure that you understand the outcomes of flushing all synced data since it will make your website frontend feed empty till the sync process do not catch up again. You may not need to do it normally except if there are any exceptional scenarios.',
							'type'=>'visible_info',
							'class'=>array('fluid', 'small'),
							'size_class'=>array('sixteen','wide','required'),
						),	

						'sp_queue_batch_size___'.$sbkey=>array(
							'label' => 'Batch Size',
							'type'=>'text',
							'value'=>$sp_queue_batch_size,	// '',
							'validate'=>array('required'=>''),
							'sanitize'=>'sanitize_text_field',
							'size_class'=>array('one','wide'),
							// 'prev_inline'=>true,
							// 'next_inline'=>true,
							// 'inline'=>true,

							'visible_info'=>array( 'label'=>'Increase or Decrease batch size based on your queue update requirements and server capacity. '.( !empty($sbvalue['batch_size_default_msg']) ? $sbvalue['batch_size_default_msg'] : 'Default batch size is 3.'),
								'type'=>'visible_info',
								'class'=>array('fluid', 'small'),
								'size_class'=>array('eight','wide','required'),
							),
						),

						'sp_queue_flush_everything_link___'.$sbkey=>array(
							'label'=>'Flush Everything',
							'type'=>'link',
							'attr'=>array("href='javascript:void(0);'", " onclick='window.document.splugins.common.confirm_and_redirect( \"Are sure you to delete all synced data created by this plugin? Please confirm. Note that depending on the storage option and the api inventory size it may take sometime for this process to finish.\", \"".esc_url(admin_url('admin.php?page='.$plugin_slug.'---sp-queue&reset=1&sbkey='.$sbkey.'&hsulf=1&hsulf_dt=1'))."\" )' "),	
							'class'=>array('secondary'),
						),
						'visible_info_flush_everything'=>array( 'label'=>'Click above link to flush all synced data(it will flush all APIs data. so ACTIVE_TODO to move it to general tab so need to add general tab) created by this plugin. Be sure that you understand the outcomes of flushing all synced data(created by this plugin) since it will make your website frontend feed empty till the sync process do not catch up again. You may not need to do it normally except if there are any exceptional scenarios. <strong></strong>',
							'type'=>'visible_info',
							'class'=>array('fluid', 'small'),
							'size_class'=>array('sixteen','wide','required'),
						),	

						'sp_queue_save_btn___'.$sbkey=>array(
							'label'=>'Save',
							'type'=>'button',		
							'class'=>array('secondary'),
							'attr'=>array("data-action='save'",'data-tab_key="queue___'.esc_attr($sbkey).'"')	
						)
					)
				);

				if( $sbcnt == 0 ) {
					$form_definition['queue___'.$sbkey]['form']['saved_tab_key'] = array(
						'type'=>'hidden',
						'value'=>'',
						'sanitize'=>'sanitize_text_field',
					);
					$form_definition['queue___'.$sbkey]['form']['resolver_path'] = array(
						'type'=>'hidden',
						'value'=>constant('EOWBC_DIRECTORY').'application/controllers/ajax/eowbc_queue.php',
					);
					$form_definition['queue___'.$sbkey]['form']['current_page_param'] = array(
						'type'=>'hidden',
						'value'=>$page_slug,
					);

				}
				

			}
			
			$form_definition = apply_filters('eowbc_admin_form_queue',$form_definition);
			
			if($is_add_sample_values) {
				//loop through form tabs and set (random) sample values for each field  
				foreach ($form_definition as $key => $tab) {
			    	foreach ($tab["form"] as $fk => $fv) {
					    //here we can override any particular field which needs specific sample values 
					    if( $fv["type"] == "text" || $fv["type"] == "hidden" || $fv["type"] == "textarea" ) {	//non numeric 
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "abc", "xyz", "def", "uvw" );
					    } 
					    else if( $fv["type"] == "color" ) {	
							$form_definition[$key]["form"][$fk]["sample_values"] = array( "red", "white", "green", "black" );
					    } 
					    
					    //no need to set for select/radio/checkboxes as we can use sample from its available options 
						
					}
			    }
			}

			return $form_definition;

		}

	}
}		
