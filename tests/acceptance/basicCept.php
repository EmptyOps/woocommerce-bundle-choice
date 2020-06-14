<?php

/**
 * Basic test to demonstrate that it works.
 *
 * @package wp-browser-travis-demo
 * @since 1.0.0
 */

$I = new AcceptanceTester( $scenario );
$I->wantTo( 'Visit WordPress Dashboard' );

//important: loginAsAdmin function will require wp-browser module enabled in codeception yml settings
// $I->loginAsAdmin();

// $I->see( 'Dashboard' );
// // echo $I->grabPageSource();

// EOF
