<?php

/**
 * Basic test to demonstrate that it works on multisite.
 *
 * @package wp-browser-travis-demo
 * @since 1.0.0
 */

if ( ! getenv( 'WP_MULTISITE' ) ) {
	$scenario->skip( 'Multisite test skipped, kept the example here for future reference.' );
}

$I = new AcceptanceTester( $scenario );
// $I->wantTo( 'Visit WordPress network Dashboard' );

//important: loginAsAdmin function will require wp-browser module enabled in codeception yml settings
// $I->loginAsAdmin();
// $I->see( 'Dashboard' );

// $I->amOnPage( '/wp-admin/network/' );
// $I->see( 'Network Admin' );
// $I->see( 'Create a New Site' );

// EOF
