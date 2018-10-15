<?php if ( ! defined( 'ABSPATH' ) ) { exit;
} ?>

<?php
if ( function_exists( 'wc_get_template' ) ) {
	wc_get_template( 'emails/email-header.php', array( 'email_heading' => $email_heading ) );
} else {
	woocommerce_get_template( 'emails/email-header.php', array( 'email_heading' => $email_heading ) );
}
?>

<style type="text/css">
		.coupon-container {
			margin: .2em;
			box-shadow: 0 0 5px #e0e0e0;
			display: inline-table;
			text-align: center;
			cursor: pointer;
		}
		.coupon-container.blue { background-color: #D7E9FC }

		.coupon-container.medium {
			padding: .55em;
			line-height: 1.4em;
		}

		.coupon-content.small { padding: .2em 1.2em }
		.coupon-content.dashed { border: 1px dashed }
		.coupon-content.blue { border-color: rgba(0,0,0,.28) }
		.coupon-content .code {
			font-family: monospace;
			font-size: 1.2em;
			font-weight:700;
		}

		.coupon-content .coupon-expire,
		.coupon-content .discount-info {
			font-family: Helvetica, Arial, sans-serif;
			font-size: 1em;
		}
		.coupon-content .discount-description {
		    font: .7em/1 Helvetica, Arial, sans-serif;
		    width: 250px;
		    margin: 10px inherit;
		    display: inline-block;
		}
</style>

<?php echo $message_from_sender; ?>
<p>Visit <a href="<?php echo $url;?>">winecroft.com</a> and use your voucher code:</p>
<p><strong><?php echo $coupon_code;?></strong></p>
<p>If you are already a member of Winecroft, simply use the voucher code when you confirm your next monthly wine box.</p>
<p>If you are a new member, take the Winecroft Taste Test and then use your gift voucher against your first wine box from Winecroft.  (We will give you an additional £20 discount as a new member treat) </p>



<?php

$coupon = new WC_Coupon( $coupon_code );

if ( $this->is_wc_gte_30() ) {
	$coupon_id        = $coupon->get_id();
	$coupon_amount    = $coupon->get_amount();
	$is_free_shipping = ( $coupon->get_free_shipping() ) ? 'yes' : 'no';
	$expiry_date      = $coupon->get_date_expires();
	$coupon_code      = $coupon->get_code();
} else {
	$coupon_id        = ( ! empty( $coupon->id ) ) ? $coupon->id : 0;
	$coupon_amount    = ( ! empty( $coupon->amount ) ) ? $coupon->amount : 0;
	$is_free_shipping = ( ! empty( $coupon->free_shipping ) ) ? $coupon->free_shipping : '';
	$expiry_date      = ( ! empty( $coupon->expiry_date ) ) ? $coupon->expiry_date : '';
	$coupon_code      = ( ! empty( $coupon->code ) ) ? $coupon->code : '';
}

$coupon_post = get_post( $coupon_id );

$coupon_data = $this->get_coupon_meta_data( $coupon );

	$coupon_target = '';
	$wc_url_coupons_active_urls = get_option( 'wc_url_coupons_active_urls' );
if ( ! empty( $wc_url_coupons_active_urls ) ) {
	$coupon_target = ( ! empty( $wc_url_coupons_active_urls[ $coupon_id ]['url'] ) ) ? $wc_url_coupons_active_urls[ $coupon_id ]['url'] : '';
}
if ( ! empty( $coupon_target ) ) {
	$coupon_target = home_url( '/' . $coupon_target );
} else {
	$coupon_target = home_url( '/?sc-page=shop&coupon-code=' . $coupon_code );
}

	$coupon_target = apply_filters( 'sc_coupon_url_in_email', $coupon_target, $coupon );
?>

<?php if ( ! empty( $from ) ) { ?>
	<p><?php echo __( 'You got this gift card', WC_Smart_Coupons::$text_domain ) . ' ' . $from . $sender; ?></p>
<?php } ?>

<div style="clear:both;"></div>

<?php
if ( function_exists( 'wc_get_template' ) ) {
	wc_get_template( 'emails/email-footer.php' );
} else {
	woocommerce_get_template( 'emails/email-footer.php' );
}
?>
