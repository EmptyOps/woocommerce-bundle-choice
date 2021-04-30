<?php

if(!class_exists('WBC_Migration')) {

	class WBC_Migration {

		private static $_instance;

		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		private function __construct() { 

			//	no implemetations 
		}

		public function run() {
			
			// wp_die('migration run called...');

			//$version = wbc()->options->get_option('_system','version', false);

			//added extra check for version on 10-07-2020
			// older versions prior to 1.0.0 was using this option 
			/*if(empty($version)){*/
			$version = get_option('eo_wbc_version');
			/*}*/

			// 1.0.0 beta. check if already beta user of version 1.0.0, if yes then set that version 
			if( get_option('eowbc_option_filters_d_fconfig',false) !== false || get_option('eowbc_option_filters_shortflt_d_fconfig',false) !== false || get_option('eowbc_option_filters_sc_d_fconfig',false) !== false )	//since we believe that all our users are using either the builder or the shop/cat filter module and have used filters once not matter if they are empty now. Relying on filters since the other main fields like inventory type or features field are not reliable since they would be initialized during setup wizard process etc. 
			{
				$version = '1.0.0';
			}

			// check if version is available as per new options lib @since 1.0.0
			if( wbc()->options->get_option('_system','version', false) ) {
				$version = wbc()->options->get_option('_system','version');
			}

			// An array of versions. eg: 1.2.3 and file name
			//$versions = array('0.0.0.1'=>'Sample_Migration');			
			$versions = array('0.5.0'=>'Migration_000500','0.5.70'=>'Migration_000570','1.0.4'=>'Migration_010004','1.0.5'=>'Migration_010004');

			/*if(empty($version)) {
				wbc()->options->update_option('_system','version', constant('EOWBC_VERSION'));
			} else*/
			// below if condition is not necessary since we have the necessary if condition inside for loop, but its fine to keep it here as its just doing extra check
			if(version_compare(constant('EOWBC_VERSION'),$version)>0 and !empty($versions)) {

				foreach ($versions as $version_number => $migration_class) {				

					// if(version_compare(constant('EOWBC_VERSION'),$version_number)>0) {
					if(version_compare($version_number,$version)>0) {

						$migration_file = str_replace('_', '-',strtolower($migration_class)).'.php';	
						
						if(file_exists(constant('EOWBC_MIGRATION_DIR').$migration_file)) {
							require_once constant('EOWBC_MIGRATION_DIR').$migration_file;
							if(class_exists($migration_class)){								
								call_user_func("${migration_class}::run");	
							}							
						}

						// mark the point of last version till which migration run, this inner setting can help when the migration is stopped in between after when some of the version migration ran successfully
						wbc()->options->update_option('_system','version', $version_number);
					}
				}
			} 

			// mark the point of last version till which migration run
			wbc()->options->update_option('_system','version', constant('EOWBC_VERSION'));	
			
		}
	}
}