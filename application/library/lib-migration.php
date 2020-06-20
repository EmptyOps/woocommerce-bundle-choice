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
			
			$version = wbc()->options->get_option('_system','version', false);

			// An array of versions. eg: 1.2.3 and file name
			//$versions = array('0.0.0.1'=>'Sample_Migration');			
			$versions = array();			

			if(empty($version)){
				wbc()->options->update_option('_system','version', constant('EOWBC_VERSION'));
			} elseif(version_compare(constant('EOWBC_VERSION'),$version)>0 and !empty($versions)) {

				foreach ($versions as $version_number => $migration_class) {				

					if(version_compare($version,$version_number)>=0){

						$migration_file = str_replace('_', '-',strtolower($migration_class)).'.php';						
						if(file_exists(constant('EOWBC_MIGRATION_DIR').$migration_file)) {
							require_once constant('EOWBC_MIGRATION_DIR').$migration_file;
							if(class_exists($migration_class)){								
								call_user_func("${migration_class}::run");	
							}							
						}
					}
				}
				wbc()->options->update_option('_system','version', constant('EOWBC_VERSION'));				
			} 
			
		}
	}
}