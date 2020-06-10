<?php

/**
 * Basic test to demonstrate that it works.
 *
 * @package wp-browser-travis-demo
 * @since 1.0.0
 */

var_dump( $scenario );
$I = new AcceptanceTester( $scenario );
$I->wantTo( 'Visit WordPress Dashboard' );
$I->loginAsAdmin();
// $I->see( 'Dashboard' );

// EOF
