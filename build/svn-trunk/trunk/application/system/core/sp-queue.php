<?php
/*
*	SP Queue class 
*/

namespace eo\wbc\system\core;

defined( 'ABSPATH' ) || exit;

class SP_Queue {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct( ) {

	}

	public static function should_init(){

		// //do action if cron is detected
		// if( ( !empty(wbc()->sanitize->get('sp_crjob')) or !empty(wbc()->sanitize->get('dapii_job')) ) and !empty(wbc()->sanitize->get('key'))){
		// 	return true;
		// }

		// return false;
	}

	public function init(){

	}

	protected function reset($queue_key, $sub_queue_key=""){

		//	a (options) db based queue, simple one that works for our batch processing requirements

			//	and extended batch management for csv/excel so that updated csv/excel read & processing becomes efficient and delete etc. actions become seamless


		// Queue management, I think we would need queue manager class which also provides options like the reset, batch control, Last Sync Complete At, In Process At Index, In Process Last Updated At, schedule(msg. for scheduling go to scheduler section of APIs or otherwise scheduler will be provided below) and so on. We already have the scheduler so think of something in that line and use that which is already good
			//	On admin, a filter to define number of sub-tabs to show and a filter on model to get data of each subtabs 
				// a extended sub class of this, will implement above admin logic on dapii
					// how about core queue management, implement that in this class or extended class? maybe even though that is not necessary here but if we want to publish it in core and feel that it is very general logic then should keep here
						// can keep here the very generalized and anomymous logic here, like push($queue_key, $processed_batch_size) so no mention of api, cron and nothing else 


		//	TODO should actually first stop all the batch process under progress for this queue_key, in any module simply in entire system. it is critical, since otherwise it is bound to create realtime issues in scenario where admin had reset the queue but a process under progress finish after the reset so that will mark the batch_number increment by 1 while that had actually processed the batch_number anything more than 1 at that time. 


		wbc()->options->set( 'sp_queue_batch_number___'.$queue_key, 1 );

		if( !empty($sub_queue_key) ) {
			wbc()->options->set( 'sp_queue_batch_number___'.$queue_key.$sub_queue_key, 1 );
		}

	}

	protected function set_batch_size($queue_key, $batch_size){

		if( $this->get_batch_size($queue_key) == $batch_size ) {
			// nothing to do, just return
			return;
		}

		// TODO do_action. before_batch_size_updated. implement it when necessary. 


		// set batch size
		$key = 'queue___'.$queue_key;
		$fk = 'sp_queue_batch_size___'.$queue_key;
		wbc()->options->update_option('queue_'.$key,$fk,$batch_size);

		//	take care of updating queue state index accordingly. simply reset but only if the batch_size is actually changed.  
		$this->reset($queue_key);


		// TODO do_action. after_batch_size_updated. implement it when necessary. 

	}

	public function get_batch_size($queue_key, $default=3){
		return wbc()->options->get_option( 'queue_queue___'.$queue_key, 'sp_queue_batch_size___'.$queue_key, $default );
	}

	protected function increment_curr_batch_number($queue_key, $processed_batch_size, $sub_queue_key="", $desc=null){
		wbc()->options->set( 'sp_queue_batch_number___'.$queue_key.$sub_queue_key, $this->get_curr_batch_number($queue_key, $sub_queue_key)+1 );

		// record info for displaying states
		if( $this->should_set_info($queue_key) ) {
			$this->set_info($queue_key, $this->prepare_info_entry($queue_key,$processed_batch_size,$desc));
		}
	}

	public function get_curr_batch_number($queue_key, $sub_queue_key=""){

		// NOTE: sub_queue_key is additional sub queues that may needed for keeping stat of the operations like initialization, cleanup and so on. it will mostly be requiring stat of the batch number only and nothing else like batch_size and so on so its support is added on relevant functions only. 

		return wbc()->options->get( 'sp_queue_batch_number___'.$queue_key.$sub_queue_key, 1 );
	}

	public function is_finished($result_cnt, $batch_size){
		return ( $result_cnt < $batch_size );
	}

	public function mark_finished($queue_key,$processed_batch_size, $sub_queue_key=""){
		// update sync complete time 
		wbc()->options->set( 'sp_queue_last_sync_complete___'.$queue_key, date('Y-m-d H:i:s') );

		// prepare and set info entry
		if( $this->should_set_info($queue_key) ) {
			$this->set_info($queue_key, $this->prepare_info_entry($queue_key,$processed_batch_size)); 
		}

		// reset 
		$this->reset($queue_key, $sub_queue_key);

	}

	private function should_set_info($queue_key, $is_disable_logging=null){
		//	TODO give option to disable logging, as soon as it seems necessary. this option should be on the queue/sync admin page and here if this function is called with a non null val for arg is_disable_logging then simply use that as flag without reading in options db to save system from that time also but that is possible when we do synchronization of whole config read of any entity once in one web call, system wide. 
		return true;
	}

	private function prepare_info_entry($queue_key,$processed_batch_size,$desc=null) {

		//	prepare info
		$table_data = array();
		$table_data['sp_queue_batch_size'] = $processed_batch_size; 
		$table_data['sp_queue_last_sync_time'] = wbc()->options->get( 'sp_queue_last_sync_complete___'.$queue_key ); 
		$table_data['sp_queue_in_process_at_index'] = $this->get_curr_batch_number($queue_key); 
		$table_data['sp_queue_in_process_last_updated_at'] = date('Y-m-d H:i:s'); 
		$table_data['sp_queue_desc'] = !empty($desc) ? $desc : ""; 

		return $table_data;
	}

	private function set_info($queue_key, $info_entry){
		// should maintain list entry of last 10 udpates? maybe yes
		$info_keep_size = 10; 

		if( wbc()->sanitize->get('is_test') == 1 ) {
			$info_keep_size = 5000;
		}			

		$key = 'queue_info___'.$queue_key;

		$queue_data = unserialize(wbc()->options->get_option_group('queue_'.$key,"a:0:{}"));
		if( sizeof($queue_data) >= $info_keep_size ) {
			// Make sure to reset the array's current index
			reset($queue_data);

			$arkey = key($queue_data);
			unset($queue_data[$arkey]);
		}

        $queue_data[] = $info_entry;

        wbc()->options->update_option_group( 'queue_'.$key, serialize($queue_data) );

	}

	public function get_info($queue_key){

		$key = 'queue_info___'.$queue_key;

		return unserialize(wbc()->options->get_option_group('queue_'.$key,"a:0:{}"));
	}

}
