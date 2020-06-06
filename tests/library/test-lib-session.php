<?php

class  Lib_Session_Test extends WP_UnitTestCase {
	function test_get_set_session() {
		$set_session_response = wbc()->session->set('sample_key','sample_value');
		$this->assertEquals(array('sample_key'=>'sample_value'),$set_session_response);

		$get_session_response = wbc()->session->get('sample_key');
		$this->assertEquals('sample_value',$get_session_response);

		$get_session_response = wbc()->session->get('undefined_sample_key');
		$this->assertEquals(false,$get_session_response);

		$get_session_response = wbc()->session->get('undefined_sample_key','dafault_value');
		$this->assertEquals('dafault_value',$get_session_response);
	}

	function test_remove_session() {

		wbc()->session->set('sample_key','sample_value');		
		
		$remove_session_response = wbc()->session->remove('sample_key');
		$this->assertEquals('sample_value',$remove_session_response);

		$remove_session_response = wbc()->session->remove('undefined_sample_key');
		$this->assertEquals(false,$remove_session_response);
	}
}