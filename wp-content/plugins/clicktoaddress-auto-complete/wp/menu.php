<?php
if ( class_exists( 'WC_Integration' ) && defined( 'WOOCOMMERCE_VERSION' ) && version_compare( WOOCOMMERCE_VERSION, '2.1-beta-1', '>=' ) ) {
	// Register the integration.
	add_filter( 'woocommerce_integrations', c2a_autocomplete_add_integration );
} else {
	add_action( 'admin_notices', array( $this, 'woocommerce_missing_notice' ) );
}

function c2a_autocomplete_add_integration(){
	$integrations[] = 'WC_ClickToAddress_Autocomplete';
	return $integrations;
}
