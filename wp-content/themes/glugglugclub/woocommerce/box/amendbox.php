<?php if( class_exists( 'WC_Subscriptions_Product' ) && WC_Subscriptions_Product::is_subscription( $product ) ):?>

<div class="add_to_cart_holder clearfix">

<?php
//ok so first we check if they are logged in - only people who are logged in can add to their subscription. If they are not logged in the we just take them to step1 of registering
if(is_user_logged_in()):?>

<?php 
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

if (has_woocommerce_subscription('','','active')):?>


<?php if($checkEm <= 1): ?>

<div class="add_to_cart_toggles unabletoupdate">
<p>Available to you next month</p>
</div>

<?php elseif(get_field('are_customers_able_to_update_their_order','option')):?>

<div class="add_to_cart_toggles">
<?php $productID = $product->id;?>
<form name="form_<?php echo $productID;?>">
<div class="alreadyinbox_holder">
<button class="cart_toggle_minus cart_toggle">-</button>
<?php /** so we start with the value as default**/?>
<span class="holder_amount">
<input min="0" id="cart_value_<?php echo $productID;?>" readonly type="text" name="product_amount" value="<?php echo getCurrentSubscriptionProductAmount($productID);?>" class="cart_toggle_amount"/>
<span>in your box</span>
</span>
<button id="cart_increase_<?php echo $productID;?>" class="cart_toggle_plus cart_toggle">+</button>
<input min="0" type="hidden" class="cart_toggle_productid" value="<?php echo $productID;?>" name="product_id"/>
</div>
<button style="display:none" class="not_inbox cart_toggle_start primary_btn bttn fullwidth">Add to your Box</button>
</form>
</div>



<?php else:?>
<div class="add_to_cart_toggles unabletoupdate">
<p>Currently processing this months box</p>
</div>
<?php endif;?>

<?php else: ?>
<a href="<?php echo site_url();?>/getting-started/step-1/" class="add_to_cart_button primary_btn bttn fullwidth enablesubscription">Join the club</a>

<?php endif;?>


<?php /**
<script type="text/javascript">
jQuery(function($) {
  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery(".cart_toggle_plus").click(function() {
  	//so first we update the value to be + 1
  	//jQuery(this).prev().val()+1;
  	var thisID = jQuery(this)
	//$('#counter').get(0).value++ 
	var clickedShape = jQuery(this);
	clickedShape.parent().find('.cart_toggle_amount').get(0).value++;
	//jQuery(this).parent().find('.cart_toggle_amount').get(0).value++;


/**
    $.ajax({
        url: ajaxurl + "?action=increaseProductAmount",
        type: 'post',
        data: jQuery(this).parent().serialize(), // changed
        success: function(data)
        {
        	alert('success');

			setTimeout(function(){
			}, 2000);

          //window.location.replace('http://'+window.location.host+'/mustardmodels');
        },
        error: function(data){
        console.log("FAILURE!");
        }

         });
    return false; // avoid to execute the actual submit of the form.




});
});
</script>
**/?>




<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_html( $product->add_to_cart_text() )
	),
$product );

else:
//user is not logged in so can not add to subscription box
?>
<a href="<?php echo site_url();?>/getting-started/step-1" class="add_to_cart_button primary_btn bttn fullwidth tastetestbtn">Take the taste test</a>
<?php endif; ?>
</div>

<?php else: ?>
<div class="add_to_cart_holder clearfix">

<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
  sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="primary_btn bttn bttn fullwidth">Add to Basket</a>',
    esc_url( $product->add_to_cart_url() ),
    esc_attr( isset( $quantity ) ? $quantity : 1 ),
    esc_attr( $product->get_id() ),
    esc_attr( $product->get_sku() ),
    esc_attr( isset( $class ) ? $class : 'button' ),
    esc_html( $product->add_to_cart_text() )
  ),
$product );?>

</div>

<?php endif;?>