<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

/**
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
<style>
.cart-empty{
	display:none;
}
</style>
<main class="main-page-content registering_steps" role="main">

	<div class="container clearfix">
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="white_box_holder text-center">
				<h1 class="return-to-shop">
					There are no items in your cart.
				</h1>
					<a class="primary_btn minibtn bttn" href="<?php echo site_url();?>" title="Home">
						Return to Homepage
					</a>
			</div>
		</div>
	</div>
</main>
<?php endif; ?>
