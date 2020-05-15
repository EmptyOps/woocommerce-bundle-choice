<?php
class Model_Category_Attribute_Test extends WP_UnitTestCase {
	function test_get_category() {
		$result = eo\wbc\model\Category_Attribute::instance()->get_category();
		//$this->assertNotEmpty($result);
		$this->assertEquals( is_array($result), true );
	}	
}