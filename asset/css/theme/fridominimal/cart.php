<style type="text/css">
	.woocommerce-cart-form .product-thumbnail img:first-child{
		display: unset !important;
	}

	.woocommerce-cart-form .product-thumbnail img{
		max-width: 50% !important;
	}

	.woocommerce-cart-form [data-title="Price"]{
		overflow: visible !important;
	}
	.cart-collaterals:after, .cart-collaterals:before{
		display: none !important;
	}
</style>

<?php
	add_filter('eowbc_filter_sidebars_widgets','__return_false');
?>