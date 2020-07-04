<?php

class  Publics_Home_Test extends WP_UnitTestCase {
	function test_render() {
		
		$first_term_id = wp_insert_term('first_category','product_cat',array());
		$second_term_id = wp_insert_term('second_category','product_cat',array());

		wbc()->options->update_option('configuration','first_name',$first_term_id);
		wbc()->options->update_option('configuration','second_name',$second_term_id);

		wbc()->options->set_option('configuration','buttons_page','3');
		update_option('btn_position_setting_text','body>*:eq(0)');

		$home = eo\wbc\controllers\publics\pages\Home::instance();

		ob_start();
		$home->init();
		$content = ob_get_clean();

		$this->assertNotEmpty($content);
	}
}