<?php
/**
 * My Subscriptions section on the My Account page
 *
 * @author 		Prospress
 * @category 	WooCommerce Subscriptions/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div id="mycurrentsubscription" class="current-subscription clearfix">

<div id="" class="">
<div class="">
<div id="current_subscription" class="account_form clearfix">
<div class="woocommerce_account_subscriptions">

<?php 


$countme = 0;

$totalCheck = count($subscriptions);


// Get all customers subscriptions
$customer_subscriptions = get_posts( array(
    'numberposts' => -1,
     'meta_key'    => '_customer_user',
     'meta_value'  => get_current_user_id(), // Or $user_id
    'post_type'   => 'shop_subscription', // WC orders post type
    'post_status' => 'wc-active' // Only orders with status "completed"
) );

// Iterating through each post subscription object
foreach( $customer_subscriptions as $customer_subscription ){
  // The subscription ID
  $subscription_id = $customer_subscription->ID;

  // IMPORTANT HERE: Get an instance of the WC_Subscription Object
  $subscription = new WC_Subscription( $subscription_id );

  $related_orders_ids_array = $subscription->get_related_orders();
  $checkEm = count($related_orders_ids_array);
}

if($checkEm > 1): ?>

<h3 class="account_form_heading"><?php esc_html_e( 'Your upcoming order', 'woocommerce-subscriptions' ); ?> due on <?php echo date("jS F Y", getUserActiveSubscriptionDate()); ?> <a class="pull-right bluelink" href="<?php echo site_url();?>/club-winelist#amendorder" title="Add more Wines">Add more wines +</a></h3>

<?php elseif($checkEm <= 1):?>
	<div class="hide-if-shouldntbe">
<h3 class="account_form_heading">Your first order</h3>
<p>It look's like you haven't ordered any Wine yet.</p>
<p>Have you completed your taste profile? If not then please start it again to get an updated Winebox!</p>
<a href="<?php echo site_url();?>/getting-started/step-1" class="secondary_btn bttn">Get Started</a>
</div>
<?php elseif(empty($subscriptions)):?>



<?php else:?>


<?php endif;?>

	<?php 

	if ( ! empty( $subscriptions ) ) : ?>
	<style>
.hide-if-shouldntbe {
	display:none;
}
</style>

	<?php 

	$customer_orders = get_posts(array
	(
		'fields'      => 'ids',
		'order'       => 'DESC',
		'orderby'     => 'date',
		'numberposts' => -1,
		'meta_key'    => '_customer_user',
		'meta_value'  => get_current_user_id(),
		'post_type'   => wc_get_order_types(),
		'post_status' => array_keys(wc_get_order_statuses()),
	));

	foreach ( $subscriptions as $subscription_id => $subscription ) :

		$actions = wcs_get_all_user_actions_for_subscription( $subscription, get_current_user_id() );
		
		if(count($customer_orders) == 0)
		{
			$order = wc_get_order($customer_orders[0]); ?>

		<div class="subscription_actions clearfix">
			<div class="row clearfix">
				<div class="col-md-4 col-xs-12">
					<p><strong>Last Order:</strong> &pound;<?php echo $order->get_total(); ?></p>
				</div>
				<div class="col-md-7 col-xs-12 text-right pull-right">
					<a href="#changeSubscription"  class="pull-right primary_btn">Cancel Subscription</a>
					<?php if($subscription->data['status'] !== 'on-hold'):?>
						<a href="#skipSubscription" class="pull-right primary_btn">Skip a Month</a>
					<?php endif;?>
				</div>
			</div>
		</div><?php
		}
		
		if( sizeof( $subscription_items = $subscription->get_items() ) > 0 ) {

			foreach ( $subscription_items as $item_id => $item ) {
				$_product  = apply_filters( 'woocommerce_subscriptions_order_item_product', $subscription->get_product_from_item( $item ), $item );
				if ( apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
					?>
 
			

				<div class="wine_order_row clearfix">
					<div class="wine_image">
						<?php echo get_the_post_thumbnail($item['product_id'],'box_upcoming');?>
					</div>

					<div class="wine_details">
						<h4><?php if ( $_product && ! $_product->is_visible() ) {
								echo esc_html( apply_filters( 'woocommerce_order_item_name', $item['name'], $item, false ) );
							} else {
								echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item, false ) );
							}?>
						</h4>
						<p>
						<?php
						$productID 	= $item['product_id'];
						/**REMOVED REQUESTED
						$bottleSize = get_field('bottle_size',$productID);
						$wineType 	= get_field('red_or_white',$productID);

						if($bottleSize): echo $bottleSize.' - '; endif;
						if($winteType !== 'notused'): echo $wineType.' wine'; endif;?> 
						 <?php if ( wcs_can_item_be_removed( $item, $subscription ) ) : ?>
						 <?php /**not gonna have anything here
						 echo '|';
							<?php $confirm_notice = apply_filters( 'woocommerce_subscriptions_order_item_remove_confirmation_text', __( 'Are you sure you want remove this item from your subscription?', 'woocommerce-subscriptions' ), $item, $_product, $subscription );?>
								<a href="<?php echo esc_url( WCS_Remove_Item::get_remove_url( $subscription->get_id(), $item_id ) );?>" class="remove_item" onclick="return confirm('<?php printf( esc_html( $confirm_notice ) ); ?>');">x Remove</a>
								endif; 
							**/
							$regions = get_the_terms($productID,'pa_region');
								foreach($regions as $region):
									echo $region->name;
								endforeach;
								echo '<span class="sep"> | </span>';
								$countries = get_the_terms($productID,'pa_country');
								foreach($countries as $country):
									echo $country->name;
								endforeach;

							 ?>

<?php
//$winestyle = $item->get_attributes('wine-style');
$wineType = $_product->get_attribute('pa_wine-type');
echo $wineType;
$terms = get_the_terms($productID,'pa_wine-style');
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
					<?php if($subscription->data['status'] !== 'active'):?>
						<div class="wine_quantity emptydiv">
							&nbsp;
						</div>

					<?php elseif($checkEm <= 1):?>
						<div class="wine_quantity emptydiv">
							&nbsp;
						</div>
					<?php else:?>
						
					<div class="wine_quantity">
						<?php 	
						// we replace this with our custom toggle function to amend the subscription
						//echo wp_kses_post( apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', $item['qty'] ) . '</strong>', $item ) ); ?>
						<?php if(get_field('are_customers_able_to_update_their_order','option')):?>
						<div class="add_to_cart_holder clearfix">
							<div class="add_to_cart_toggles">
								<form name="form_<?php echo $productID;?>">
									<div class="alreadyinbox_holder">
										<button class="cart_toggle_minus cart_toggle">-</button>
										<?php /** so we start with the value as default**/?>
										<span class="holder_amount">
										<input min="0" id="cart_value_<?php echo $productID;?>" readonly type="text" name="product_amount" value="<?php echo getCurrentSubscriptionProductAmount($productID);?>" class="cart_toggle_amount"/>
										</span>
										<button id="cart_increase_<?php echo $productID;?>" class="cart_toggle_plus cart_toggle">+</button>
										<input min="0" type="hidden" class="cart_toggle_productid" value="<?php echo $productID;?>" name="product_id"/>
									</div>
								<button style="display:none" class="not_inbox cart_toggle_start primary_btn bttn fullwidth">Add +</button>
								</form>
							</div>
						</div>
						<?php endif;?>
					</div>
				

					<?php endif;?>

					<div class="wine_price <?php if($totalCheck <= 1): echo 'pull-right'; endif;?>">
						<?php 
					
						$_product = wc_get_product( $productID );
							//removes the "/ month"
							$wineprice = wp_kses_post( $subscription->get_formatted_line_subtotal( $item ));
							//echo substr($wineprice, 0, strpos($wineprice, " / month"));
							echo '<span>£'.$_product->get_price().'</span>';
							echo '<small>(per bottle) / x ';
							getCurrentSubscriptionProductAmount($productID);
							echo '</small>';
						?>
					</div>

				</div>

				<?php
				}

				if ( $subscription->has_status( array( 'completed', 'processing' ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) ) ) {
					?>
					<tr class="product-purchase-note">
						<td colspan="3"><?php echo wp_kses_post( wpautop( do_shortcode( $purchase_note ) ) ); ?></td>
					</tr>
					<?php
				}
			}
		}
		?>
		<?php if($totalCheck > 1 ):?>
		<a href="<?php echo site_url();?>/club-winelist#amendorder" class="account_form_btn bttn morewines">Want to add more Wines? Click here to view our winelist</a>
	<?php endif;?>


	<?php 
	$countme++;
	if($countme == 1):
		break;
	endif;
	endforeach;?>

	<?php else : ?>
<?php //include('no_orders.php');?>
<?php //require dirname( __FILE__ ) . '/no_orders.php';?>
	<?php endif; ?>

</div>
</div>

</div>
</div>


<?php //include('account-mini-profile.php');?>
<?php //include('/../box/amendbox_js.php');?>
<?php require dirname( __FILE__ ) . '/../box/amendbox_js.php';?>


</div>