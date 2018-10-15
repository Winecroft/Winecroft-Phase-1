<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
	<button class="toggleAccountNav hidden-md hidden-lg"><i class="fa fa-bars"></i> Account Menu</button>
	<ul class="container clearfix"><?php
		foreach ( wc_get_account_menu_items() as $endpoint => $label )
		{
			if($label == 'Logout')
			{ ?>

			<li class="cs-logout woocommerce-MyAccount-navigation-link--customer-logout">
				<a href="<?php echo wp_logout_url(site_url()) ?>">Logout</a>
			</li><?php
			}

			if($label == 'Refer a Friend')
			{ ?>

			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo site_url( $endpoint ); ?>"><?php echo esc_html( $label ); ?></a>
			</li><?php
			}
			else
			{ ?>

			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li><?php
			}
		} ?>
		
	</ul>
	<?php /**<ul class="hidden-xs hidden-md hidden-lg pull-right text-right">
		<li><a href="<?php echo site_url();?>/my-account/customer-logout">Logout</a></li>
	</ul>
	**/?>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>