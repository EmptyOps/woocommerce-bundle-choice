<?php

/**
 * Bootstrap file for the acceptance tests.
 *
 * Required by Codeception, but currently unused.
 *
 * @package wp-browser-travis-demo
 * @since   1.0.0
 */

echo "bootstrap outer called...";
// throw new Exception("bootstrap outer called...", 1);

$version_nums = explode(".", PHP_VERSION);
if( !isset($version_nums[0]) || /*$version_nums[0] >= 6*/($version_nums[0] == 7 && $version_nums[1] == 2 && $version_nums[2] == 3) ) {
	self::$config['modules']['config']['WPWebDriver']['url'] = 'http://127.0.0.1:8888/tmp/wordpress/src';
} 
else {
	self::$config['modules']['config']['WPWebDriver']['url'] = 'http://127.0.0.1:8888/tmp/WBC_TEST_ENV_with_sample_data/wordpress-latest-1';
}

// EOF