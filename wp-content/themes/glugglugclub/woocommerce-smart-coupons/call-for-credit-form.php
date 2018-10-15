<?php if ( ! defined( 'ABSPATH' ) ) { exit;
} ?>


<div id="call_for_credit">
	<?php /**modification of submit, store a cookie from this form to populate the gift reciever on checkout**/?>
	<div class="gift-recipient-form">
		<span class="error_message_gift" style="display:none;">Please fill in all required fields marked by an asterix <abbr class="required" title="required">*</abbr></span>
		<div class="form_row">
			<label for="gift_email">Recipient Email Address...<abbr class="required" title="required">*</abbr></label>
			<input type="text" name="gift_email" id="giftemail" required/>
		</div>
		<div class="form_row">
			<label for="gift_message">Message...</label>
			<textarea name="gift_message" id="giftmessage"></textarea>
		</div>

	</div>
	<?php
		$currency_symbol = get_woocommerce_currency_symbol();
	?>
	<label>
	<?php
	if ( ! empty( $currency_symbol ) ) {
		echo __( stripslashes( $smart_coupon_store_gift_page_text ) ) . ' (' . $currency_symbol . ')';
	} else {
		echo __( stripslashes( $smart_coupon_store_gift_page_text ) );
	}
		echo '<abbr class="required" title="required">*</abbr></label>';
		echo "<input id='credit_called' step='any' type='hidden' min='1' name='credit_called' value='' autocomplete='off' autofocus />";
		// This line is required in this template
	?>

	<select name="credit_selector" id="credit_selector" required>
		<option value="0.00">Select a value to gift...</option>
		<option value="10.00">£10</option>
		<option value="20.00">£20</option>
		<option value="30.00">£30</option>
		<option value="40.00">£40</option>
		<option value="50.00">£50</option>
		<option value="60.00">£60</option>
		<option value="80.00">£80</option>
		<option value="100.00">£100</option>
		<option value="150.00">£150</option>
		<option value="200.00">£200</option>
		<option value="300.00">£300</option>
		<option value="400.00">£400</option>
		<option value="500.00">£500</option>
	</select>
	<p id="error_message" style="color: red;"></p>
</div>


<script type="text/javascript">
	jQuery( document ).ready(function() {

		
		jQuery('#credit_selector').change( function() {
			var selectVal = parseInt(jQuery('#credit_selector option:selected').val());
			//alert(selectVal);
			jQuery('#credit_called').val(selectVal);
			jQuery('#credit_called').keyup();
			//plugin needs this line as listens for keyups...
		});

		jQuery('button[name="add-to-cart"]').click(function(){

			if( (jQuery('#call_for_credit').find("input[name='gift_email']").val() == "") || (jQuery('#credit_selector').val() == "0.00")){
				jQuery('.error_message_gift').show();
				return false;
			} else {
				function setCookie(key, value) {
			    	var expires = new Date();
			    	expires.setTime(expires.getTime() + 31536000000); //1 year  
			    	document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() +";path=/";
				}
				function getCookie(key) {
	    			var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
	    			return keyValue ? keyValue[2] : null;
				} 
	    		var getEmail = jQuery('#giftemail').val();
	    		var getMessage = jQuery('#giftmessage').val();
	    		setCookie('giftemail', getEmail);
	    		setCookie('giftmessage', getMessage);
	    	}
		});
		
	});
</script>