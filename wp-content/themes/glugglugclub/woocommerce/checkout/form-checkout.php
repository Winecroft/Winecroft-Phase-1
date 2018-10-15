<?php

	/**
	 * Checkout Form
	 * @version 2.3.0
	 */

	if(!defined('ABSPATH'))
	{
		exit;
	}

	wc_print_notices();

	global $current_user;

	if(!freeCouponForFirstOrder())
	{
		require __DIR__ . '/../../includes/registration/step_promo.php';

	 	global $woocommerce, $subtotal;

	    $first_order_coupon      = get_field('first_order_coupon', 'options');
	    $first_order_coupon_code = sanitize_text_field(wc_get_coupon_code_by_id($first_order_coupon));

	    if(!$woocommerce->cart->add_discount($first_order_coupon_code))
	    { ?>

	        <style>.woocommerce-NoticeGroup-updateOrderReview ul,.woocommerce-message.woocommerce-notice_message,.woocommerce-NoticeGroup.woocommerce-NoticeGroup-updateOrderReview > div.woocommerce-message.woocommerce-notice_message{display:none}</style><?php
	    }
	    else
	    { ?>

			<style>.woocommerce-NoticeGroup.woocommerce-NoticeGroup-updateOrderReview > div.woocommerce-message.woocommerce-notice_message{display:none}</style><?php
		} 
	}

	if(get_field('block_checkout', 'option') == FALSE)
	{
		do_action('woocommerce_before_checkout_form', $checkout); ?>

<main class="main-page-content registering_steps" role="main">
	<div class="container clearfix"><?php 
		// If checkout registration is disabled and not logged in, the user cannot checkout
		if(!$checkout->is_registration_enabled() and $checkout->is_registration_required() and !is_user_logged_in())
		{
			echo apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce'));
			
			return;
		} ?>

		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
			<div class="col-md-7 col-xs-12">
				<div class="white_box_holder"><?php
		if($checkout->get_checkout_fields())
		{
			do_action('woocommerce_checkout_before_customer_details'); ?>

					<div id="customer_details">
						<div class="col-1"><?php do_action('woocommerce_checkout_billing'); ?></div>
						<div class="col-2"><?php do_action('woocommerce_checkout_shipping'); ?></div>
					</div><?php
			do_action('woocommerce_checkout_after_customer_details');
		} ?>

				</div>
			</div>
			<div class="col-md-5 col-xs-12">
				<!--<div id="applycoupon" class="clearfix">
					<div class="white_box_holder">
						<div class="row clearfix">
							<div class="col-md-4 col-xs-12">
								<h3>Have a coupon?</h3>
							</div>
							<div class="col-md-8 col-xs-12">
								<div id="applycoupon" class="checkout_coupon" method="post">
									<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Type in your coupon/gift card code', 'woocommerce' ); ?>" id="coupon_code_holder" value="" />
									<span class="primary-btn fullwidth couponbtn pre-submit">Apply</span>
								</div>
							</div>
						</div>
					</div>
					<div id="coupon-response"></div>
				</div>--><?php
		do_action('woocommerce_checkout_before_order_review'); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<div class="white_box_holder">
						<h3 class="order_review_heading">
							Your Order
							<span id="learnMoreSelection" class="pull-right coupontrigger2" data-remodal-target="wineSelection"  style="display:none;">Learn more about your selection</span>
						</h3><?php
		do_action('woocommerce_checkout_order_review');
		do_action('woocommerce_checkout_after_order_review');
		do_action('woocommerce_after_checkout_form', $checkout); ?>

				</div>
			</div>
		</form>
	</div>
</main><?php
// we need to have the form outside the checkout form as we are submitting elsewhere and then populating it above ?>

<div class="applycoupon clearfix hidden">
	<form class="checkout_coupon" method="post">
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Type in your coupon/gift card code', 'woocommerce' ); ?>" id="coupon_code" value="" />
		<input type="submit" class="primary_btn fullwidth couponbtn" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'woocommerce' ); ?>" />
	</form>
</div>
<div class="remodal" data-remodal-id="wineSelection">
	<div class="remodal_heading">
		<h4 class="meetwines remodal_heading">Meet your wine!</h4>
		<p>These wonderful wines have been selected for you based on your taste profile.  We are sure you will enjoy them.  Each subsequent month, we will select a box containing four more stunning wines that you will be able to add to or change to suit your evolving palate.</p>
	</div>
	<div class="remodal_body">
		<div id="wineselection_slider_checkout"><?php
		$product_id ='';

		foreach(WC()->cart->get_cart() as $cart_item)
		{
			$product_id = $cart_item['product_id'];
			$product    = new WC_Product($product_id);
			$image_url  = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'product_thumbnail'); ?>

			<div class="wine-selection">
				<div class="row clearfix">
					<div class="wine-image col-md-4 col-xs-12">
						<img src="<?php echo $image_url[0]; ?>" />
					</div>	
					<div class="wine-info col-md-8">
						<h5><?php echo get_the_title($product_id);?></h5>
						<p><?php echo $product->post->post_excerpt;?></p>
					</div>
					<div class="wine-attributes col-xs-12">
						<div class="row clearfix">
							<div class="col-md-4 col-xs-6">
								<p>Wine Style</p>
								<p><?php echo $product->get_attribute('wine-style') . ' ' .  $product->get_attribute('wine-type'); ?></p>
							</div>
							<div class="col-md-4 col-xs-6">
								<p>Alcohol</p>
								<p><?php the_field('alcohol_percentage',$product_id); ?>%</p>
							</div>
							<div class="col-md-4 col-xs-6">
								<p>Sweetness</p>
								<p><?php echo $product->get_attribute('sweetness'); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div><?php
		} ?>

		</div>
		<button data-remodal-action="close" class="primary_btn bttn fullwidth winecheckoutbtn">Complete Order<i class="fa fa-double-angle-right"></i></button>
	</div>
</div><?php
	}
	else
	{ ?>

<main class="registering_steps">
	<div class="container clearfix">
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="white_box_holder text-center">
				<p>We are currently not taking orders as we are working through this months subscription box. Please try again on a date after the 15th of each month.</p>
				<p>If you are ordering for the first time, your box is currently stored so when you try to checkout again after above said date, you will be able to with the items.</p>
				<a href="<?php echo site_url();?>/my-account" class="primary_btn bttn">Back to my account</a>
			</div>
		</div>
	</div>
</main><?php
	} ?>

<div id="checkoutStepProgressHolder" class="step_progress_holder" style="display: none;">
	<div class="pull-left">
		<ul>
			<li>
				<span>1. Taste Test</span>
			</li>
			<li>
				<span>2. Select Wines</span>
			</li>
			<li>
				<span>3. Confirm Subscription</span>
			</li>
		</ul>
	</div>
</div>
<script type="text/javascript">
	// now we prepopulate the field if it exists with our cookie from the gift page.
	jQuery(function($)
	{
		$('#coupons_list').prependTo("#order_review");

		$('body').on('change', '.woocommerce-checkout', function()
		{
			if(window.location.hash)
			{
				$('#learnMoreSelection').show();
				$('#checkoutStepProgressHolder').show();
			}
			else
			{
				// $('.wc-terms-and-conditions, .tc-ul, .nodash').hide();
			}

			function getCookie(key)
			{
				var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
				return keyValue ? keyValue[2] : null;
			}

			//set the other option to be available so we fake it being clicked
			$('#show_form').prop('checked',true);
			$('.show_hide_list').hide();
			$('.gift-certificate-receiver-detail-form').show();

			// $('.gift_receiver_email').val(getCookie('giftemail'));
			// $('.gift_receiver_message').val(getCookie('giftmessage'));
		
			$('#coupon_code_holder').bind('keypress keyup blur', function()
			{
			    $('#coupon_code').val($(this).val());
			});

			$('.pre-submit').click(function()
			{
				$('form.checkout_coupon').submit();
			});
		});

		if(window.location.hash)
		{
			$('#learnMoreSelection').show();
			$('#checkoutStepProgressHolder').show();
		}
		else
		{
			// $('.wc-terms-and-conditions, .tc-ul, .nodash').hide();
		}
		
		var ajaxUrl = '<?php echo site_url();?>/?wc-ajax=apply_coupon';

		$(document).ajaxComplete(function(event, xhr, settings)
		{
			if(settings.url == ajaxUrl)
			{
				$('#coupon-response').html(xhr.responseText);
			}
		});
	});
</script>