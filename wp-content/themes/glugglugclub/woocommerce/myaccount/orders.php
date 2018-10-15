<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


do_action( 'woocommerce_before_account_orders', $has_orders ); ?>
<div class="container clearfix">

<div id="account_profile" class="col-md-8 col-xs-12">
<div class="white_box_holder">
<div id="orderhistory" class="account_form clearfix">
	<h3 class="account_form_heading">Order History</h3>


	<div id="load-subscription">
    <?php //require dirname( __FILE__ ) . '/upcoming-subscription.php';?>
	</div>

	<?php //require dirname( __FILE__ ) . '/my-subscriptions.php';?>
<?php if ( $has_orders ) : ?>
	<div class="order-list clearfix">
	<h3 class="account_form_heading">Your Orders</h3>

	<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
					<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php foreach ( $customer_orders->orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				?>
				<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
					<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
						<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
									<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
								</a>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php
								/* translators: 1: formatted order total 2: total order items */
								printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count );
								?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<?php
								$actions = wc_get_account_orders_actions( $order );
								
								if ( ! empty( $actions ) ) {
									foreach ( $actions as $key => $action ) {
										echo '<a href="' . esc_url( $action['url'] ) . '" style="margin-left:5px; " class="primary_btn minibttn pull-right  ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
									}
								}
								?>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
<?php else : ?>
	<?php //include('no_orders.php');?>
	<?php //require dirname( __FILE__ ) . '/no_orders.php';?>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
</div>

</div>
</div>


<?php // include('account-mini-profile.php');?>
<?php require dirname( __FILE__ ) . '/account-mini-profile.php';?>


</div>
<?php //require dirname( __FILE__ ) . '/../box/amendbox_js.php';?>

<div class="remodal changeSubscriptionModal" data-remodal-id="changeSubscription">
	<button data-remodal-action="close" class="remodal-close"></button>
	<div class="remodal_body">
		<?php echo do_shortcode('[caldera_form id="CF5aba3600bce45"]');?>
	</div>
</div>
<script type="text/javascript">
jQuery( document ).ready(function() {
	$mainContent = jQuery('#load-subscription');
	$mainContent.load('<?php echo site_url();?>/my-account/subscriptions/ #mycurrentsubscription > *', function() {
   
  var instSuccess = jQuery('[data-remodal-id=boxSuccess]').remodal();
var instFailure = jQuery('[data-remodal-id=boxFailure]').remodal();

  jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
      jQuery(this).parent().parent().hide();
      jQuery(this).parent().parent().next().show();
    }
  });

  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  //jQuery(".cart_toggle_plus").one('click', function(event) {
    jQuery('#current_subscription').on('click','.cart_toggle_plus', function(event){
    var getInput = jQuery(this).prev().find('input');
$plus = jQuery(this);
    //increase amount by 1 
    getInput.get(0).value++;
    jQuery('body').toggleClass('add-overlay');

    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value--;
              $plus.parent().parent().hide();
              $plus.parent().parent().next().show()
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
           // instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

        });

   jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
      jQuery(this).parent().parent().hide();
      jQuery(this).parent().parent().next().show();
    }
  });


    return false; // avoid to execute the actual submit of the form.

});

  jQuery(".cart_toggle_minus").click(function() {
    //so first we update the value to be + 1
    //jQuery(this).prev().val()+1;
    //var thisID = jQuery(this).attr("id");
    var getInput = jQuery(this).next().find('input');
      $minus = jQuery(this);
    //increase amount by 1
  getInput.get(0).value--;
  jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value++;
            $minus.parent().show();
            $minus.parent().next().hide();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
           // instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

         });

    jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
    //  jQuery(this).parent().parent().hide();
    //  jQuery(this).parent().parent().next().show();
    }
  });

    if(getInput.val() == 0) {
      
     //$minus.parent().parent().parent().parent().find('.cart_toggle_start').show();
      //$minus.parent().parent().hide();
      $minus.parent().hide();
      $minus.parent().next().show();

    }

    return false; // avoid to execute the actual submit of the form.




});


  jQuery(".cart_toggle_start").click(function() {
    //so first we update the value to be + 1
    //jQuery(this).prev().val()+1;
    //var thisID = jQuery(this).attr("id");
    var getInput = jQuery(this).prev().find('.cart_toggle_amount');
    $start = jQuery(this);
    //increase amount by 1
    getInput.get(0).value++;
    jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value--;
             $start.prev().hide();
            $start.show();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
            //instSuccess.open();
           $start.hide();
            $start.prev().show();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

         });

   
   
    
    

    return false; // avoid to execute the actual submit of the form.




  });


  jQuery(".removeCart").click(function() {


      //so first we update the value to be + 1
    //jQuery(this).prev().val()+1;
    //var thisID = jQuery(this).attr("id");
    var getInput = jQuery(this).next().find('input');
 $remove = jQuery(this);
    //increase amount by 1
  getInput.get(0).value--;
  jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value++;
             $remove.parent().show();
            $remove.parent().next().hide();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
           // instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

         });

    jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
     // jQuery(this).parent().parent().hide();
     // jQuery(this).parent().parent().next().show();
    }
  });

    return false; // avoid to execute the actual submit of the form.

  });
  });
});
</script>

<script type="text/javascript">


jQuery( document ).ready(function() {
function initializeMe() {


};
});

</script>


<div class="remodal" data-remodal-id="boxSuccess">
<button data-remodal-action="close" class="remodal-close"></button>
  <div class="remodal_heading">
    <h4 class="remodal_heading">Success!</h4>
  
  </div>
  <div class="remodal_body">
    <p>You succesfully amended your subscription box.</p>
  </div>
   <div class="remodal_footer">
          <a type="submit" class="primary_btn bttn" href="<?php echo site_url();?>/my-account/subscriptions">View my upcoming subscription box</a>
        </div>
</div>


<div class="remodal" data-remodal-id="boxFailure">
<button data-remodal-action="close" class="remodal-close"></button>
  <div class="remodal_heading">
    <h4 class="remodal_heading">Not possible</h4>
  
  </div>
  <div class="remodal_body">
    <p>You can not amend your subscription box to have less than 4 different wines.</p>
  </div>
   <div class="remodal_footer">
         <button data-remodal-action="close" class="primary_btn bttn">OK</button>
        </div>

</div>