<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<table class="productsreview shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<td class="product-name">
							<?php $productid = $_product->get_id();?>
							<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $productid ), 'product_thumbnail' );?>
							<img class="productimagetable" src="<?php echo $image_url[0];?>"/>
							<div class="inlinecartdata">
							<div>
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
							<?php echo WC()->cart->get_item_data( $cart_item ); ?>
							</div>
							<div class="cartitemsmall">
								<p><?php $regions = get_the_terms($productid,'pa_region');
								foreach($regions as $region):
									echo $region->name;
								endforeach;
								echo '<span class="sep"> | </span>';
								$countries = get_the_terms($productid,'pa_country');
								foreach($countries as $country):
									echo $country->name;
								endforeach;
								?>
								<?php
								//$winestyle = $item->get_attributes('wine-style');
								$wineType = $_product->get_attribute('pa_wine-type');
								
								$terms = get_the_terms($productid,'pa_wine-style');
								if($terms):
								echo '<span class="wine_colour_holder inline-winecolour">';
								foreach($terms as $term):
								if($wineType == 'Red'):
								echo '<span class="wine_colour"  style="display:inline-block; background-color:'.get_field('colour_circle','term_'.$term->term_id).';"></span>';
								elseif($wineType == 'White'):
								echo '<span class="wine_colour"  style="display:inline-block; background-color:'.get_field('colour_circle_white_wine','term_'.$term->term_id).';"></span>';
								else:
								echo '<span class="wine_colour"  style="display:inline-block; background-color:'.get_field('colour_circle','term_'.$term->term_id).';"></span>';
								endif;
								echo $term->name;
								endforeach;
								echo '</span>';
								endif;
								?>
								</p>
							</div>
						</div>
						</td>
						<td class="product-total">
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
						</td>
					</tr>
					<?php
				}
			}

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php
				echo $coupon->get_description();

				$this_coupon_id        = $coupon->get_id();
				$first_order_coupon_id = get_field('first_order_coupon', 'options');

				if($this_coupon_id != $first_order_coupon_id)
				{
				?>: <span class="couponcodevalue"><?php echo $coupon->code;?></span><?php
				}
				?></th>
				<td><?php
				if($this_coupon_id == $first_order_coupon_id)
				{
					ob_start();

					wc_cart_totals_coupon_html($coupon);

					$coupon_totals = ob_get_clean();
					$coupon_totals = preg_replace("/<a([\s\S]+?)<\/a>/i", "", $coupon_totals);

					echo $coupon_totals;
				}
				else
				{
					wc_cart_totals_coupon_html($coupon);
				}
				?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php _e( 'Total', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>
