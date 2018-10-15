<?php
/**
 * Checkout terms and conditions checkbox
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$terms_page_id = wc_get_page_id( 'terms' );



	// only show the terms once if there is a coupon applied?
if ( $terms_page_id > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) :
	$terms         = get_post( $terms_page_id );
	$terms_content = has_shortcode( $terms->post_content, 'woocommerce_checkout' ) ? '' : wc_format_content( $terms->post_content );
	//if(freeCouponForFirstOrder() == false):

	//if ( $terms_content ) {
		//do_action( 'woocommerce_checkout_before_terms_and_conditions' );
	//	echo '<div class="woocommerce-terms-and-conditions" style="display: none; max-height: 200px; overflow: auto;">' . $terms_content . '</div>';
	//}
	?>
	<!-- dont use this
	<p class="form-row terms wc-terms-and-conditions">
		<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
			<span class="membershipagree h3">How membership works*</span> 
			<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" /> 
			<strong>I agree to the following:</strong>
			<small>We'll recommend 4 bottles for you each month and deliver them to your door.</small>
			<small>You can modify or skip any schedueled order (no fees!)</small>
			<small>Wines start at just £13.99/bottle</small>
			<small>Complimentary shipping on 4+ Bottle Orders</small>
			<small>Prices each month will change based on the bottle selection</small>
		
		</label>
		<input type="hidden" name="terms-field" value="1" />
	</p>
	<?php do_action( 'woocommerce_checkout_after_terms_and_conditions' ); ?>
-->
<?php //endif; 
endif;

?>

	<p class="form-row terms wc-terms-and-conditions">
			
				<span class="membershipagree h3">How membership works</span>
				<label class="tc-label woocommerce-form__label woocommerce-form__label-for-checkbox checkbox"> 
					<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox tc-label-input" name="terms" id="terms" /> 
					<strong>I agree to the following:</strong>
				</label>
				<ul class="tc-ul">
					<li><small>We'll recommend 4 bottles for you each month.</small></li>
					<li><small>After the first month you will be able to change or add to the recommended wines.</small></li>
					<li><small>You can choose to skip a monthly order (no fees).</small></li>
					<li><small>Complimentary delivery on 4+ Bottle Orders to mainland UK customers. For non-mainland UK customers, there will be a delivery charge of £20 per order</small></li>
					<li><small>Membership is free and continues until you cancel.</small></li>
					<li><small>You can cancel at any time.</small></li>
				</ul>
				<small class="nodash">I accept the <a href="<?php echo site_url();?>/terms-and-conditions/" title="Read Terms &amp; Conditions" target="_blank">terms and conditions</a>, and confirm that I am over the required local age limit to purchase alcohol. In the UK, customers must be over 18 years of age.</small>
			</label>
			<input type="hidden" name="terms-field" value="1" />
		</p>

	<script type="text/javascript">
		jQuery(window).on('load', function(){
			jQuery('body').on('change', '.woocommerce-checkout', function() {
				if ( jQuery( ".recurring-total" ).length ) {

					jQuery('.wc-terms-and-conditions').show();
					jQuery('input[name="woocommerce_checkout_place_order"]').addClass('disabled-btn');
				};
			
			});
			jQuery("body").on("click", ".tc-label", function(){
			  jQuery('body').addClass('enable-checkout');
			  jQuery('.tc-label').addClass('unable-tocheck');
			});
	 	});
	</script>