<?php
/**
*	An interface for every builders.
*/

defined( 'ABSPATH' ) || exit;

namespace eo\wbc\model\interfaces;

interface Builder {
	/**
	*	A generic function to build an object for the classes.
	*/
	public function build(array $build_data);	
}
