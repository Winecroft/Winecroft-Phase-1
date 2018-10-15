<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/ 
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

$info_message  = apply_filters( 'woocommerce_checkout_login_message', __( 'Returning customer?', 'woocommerce' ) );
//$info_message .= ' <a href="#" class="showlogin" style="color:white;">' . __( 'Click here to login', 'woocommerce' ) . '</a>';
wc_print_notice( $info_message, 'notice' );

woocommerce_login_form(
	array(
		'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'woocommerce' ),
		'redirect' => wc_get_page_permalink( 'checkout' ),
		'hidden'   => true,
	)
);
?>
<style>
.woocommerce-form-login {
	max-width:970px;
    padding: 0 15px !important;
    margin: 0 auto !important;
    border: none !important;
} 
.woocommerce-form__label-for-checkbox,
.woocommerce-error.woocommerce-notice_message,
.woocommerce-error.woocommerce-notice_message + .woocommerce-notice_message {
	display:none !important;
}
.woocommerce-form.woocommerce-form-login.login {
	margin-top:25px;
	display:block !important;
}

.registering_steps {
	display:none;
}

</style>
<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
