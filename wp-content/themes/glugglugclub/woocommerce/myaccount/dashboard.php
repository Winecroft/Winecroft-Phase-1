<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div id="dashboardpage" class="container clearfix">

<div id="account_profile" class="col-md-8 col-xs-12">
<div class="white_box_holder">

<?php //include('notifications_data.php');?>
<div id="profile_data" class="account_form clearfix">

<?php
do_action( 'woocommerce_before_edit_account_form' ); ?>
<form id="profile_info" class="woocommerce-EditAccountForm edit-account" action="" method="post">
	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	<fieldset>
		<legend>Profile Information <span class="togglefieldset pull-right"><i class="fa fa-angle-down"></i></span></legend>
		<div class="form_rows clearfix">
		<div class="form_row clearfix">
			<div class="form_half">
				<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $current_user->first_name ); ?>" />
			</div>
			<div class="form_half">
				<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $current_user->last_name ); ?>" />
			</div>
		</div>
		<div class="form_row clearfix">
			<div class="form_full">
				<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $current_user->user_email ); ?>" />
			</div>
			<?php /**
			<div class="form_half">
				<label for="date_of_birth"><?php _e( 'Date of Birth', 'woocommerce' ); ?></label>
			
				<input type="text" placeholder="dd/mm/yyyy" class="woocommerce-Input woocommerce-Input--datepicker input-text" name="date_of_birth" id="date_of_birth" value="<?php the_field('date_of_birth','user_'.$current_user->ID);?>" />
			</div>
			**/ ?>
		</div>
		<div class="form_row clearfix">
			<div class="form_full">
				<?php do_action( 'woocommerce_edit_account_form' ); ?>
				<?php wp_nonce_field( 'save_account_details' ); ?>
				<button type="submit" class="account_form_btn" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">Update Your Settings</button>
				<input type="hidden" name="action" value="save_account_details" />
				<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
			</div>
		</div>
	</div>
	</fieldset>
</form>

<?php require dirname( __FILE__ ) . '/form-edit-address.php';?>
<?php require dirname( __FILE__ ) . '/payment-methods.php';?>
<form id="password_reset" class="woocommerce-EditAccountForm edit-account" action="" method="post">
		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	<fieldset>
		<legend><?php _e( 'Password Reset', 'woocommerce' ); ?><span class="togglefieldset pull-right"><i class="fa fa-angle-down"></i></span></legend>
		<div class="form_rows clearfix">
			<div class="form_row clearfix">
				<div class="form_full">
					<label for="password_current"><?php _e( 'To change your password, please enter your current password', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
				</div>

			</div>
			
			<div class="form_row clearfix">

				<div class="form_half">
					<label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
				</div>

				<div class="form_half">
					<label for="password_2"><?php _e( 'Confirm new password', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
				</div>

			</div>
			<span id="password-strength"></span>

				<input type="hidden" name="wc_reset_password" value="true" />
				<input type="hidden" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $current_user->first_name ); ?>" />
				<input type="hidden" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $current_user->last_name ); ?>" />
				<input type="hidden" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $current_user->user_email ); ?>" />

			<div class="form_row clearfix">
				<div class="form_full">
					<?php do_action( 'woocommerce_edit_account_form' ); ?>
					<?php wp_nonce_field( 'save_account_details' ); ?>
					<button type="submit" class="account_form_btn" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">Reset Your Password</button>
					<input type="hidden" name="action" value="save_account_details" />
					<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
				</div>
			</div>
		</div> 
			
	</fieldset>
</form> 
<?php //require dirname( __FILE__ ) . '/notifications_data.php';?>
<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
<?php //require dirname( __FILE__ ) . '/account-mini-profile.php';?>



</div>

</div>
</div>


<?php //include('account-mini-profile.php');?>
<?php require dirname( __FILE__ ) . '/account-mini-profile.php';?>
</div>

<script type="text/javascript">
jQuery(function($){
var subscribe = jQuery('[data-remodal-id=mailingSubscribe]').remodal();
var unsubscribe = jQuery('[data-remodal-id=mailingUnsubscribe]').remodal();
var error = jQuery('[data-remodal-id=error]').remodal();
	$('#notifications_data form').submit(function(){
		jQuery('body').toggleClass('add-overlay');
		var mailchimpform = $(this);
		$.ajax({
			url:mailchimpform.attr('action'),
			type:'POST',
			data:mailchimpform.serialize(),
			success:function(data){
				//alert(data);
				if(data == 1) {
					jQuery('body').toggleClass('add-overlay');
					//they subscribed
					subscribe.open();
					setTimeout(function(){ location.reload(); }, 2000);
				}
				else if (data == 2) {
					jQuery('body').toggleClass('add-overlay');
					unsubscribe.open();
					setTimeout(function(){ location.reload(); }, 2000);
				}
				else if(data == 0) {
					jQuery('body').toggleClass('add-overlay');
					error.open();
					setTimeout(function(){ location.reload(); }, 2000);
				}

				else {
					jQuery('body').toggleClass('add-overlay');
					setTimeout(function(){ location.reload(); }, 2000);
				}

			}
		});
		return false;
	});
});

</script>

<div class="remodal" data-remodal-id="mailingSubscribe" data-remodal-options="hashTracking: false,>
<button data-remodal-action="close" class="remodal-close"></button>
  <div class="remodal_heading">
    <h4 class="remodal_heading">Subscribed</h4>
  
  </div>
  <div class="remodal_body">
    <p>You succesfully usubscribed from this mailing list.</p>
  </div>
   <div class="remodal_footer">
         <button data-remodal-action="close" class="primary_btn bttn">OK</button>
        </div>
</div>

<div class="remodal" data-remodal-id="mailingUnsubscribe" data-remodal-options="hashTracking: false,>
<button data-remodal-action="close" class="remodal-close"></button>
  <div class="remodal_heading">
    <h4 class="remodal_heading">Unsubscribed</h4>
  
  </div>
  <div class="remodal_body">
    <p>You succesfully unsubscribed from this mailing list.</p>
  </div>
   <div class="remodal_footer">
          <button data-remodal-action="close" class="primary_btn bttn">OK</button>
        </div>
</div>

<div class="remodal" data-remodal-id="error" data-remodal-options="hashTracking: false,>
<button data-remodal-action="close" class="remodal-close"></button>
  <div class="remodal_heading">
    <h4 class="remodal_heading">Error</h4>
  
  </div>
  <div class="remodal_body">
    <p>Something went wrong - it looks like you've tried to subscribe too many times recently so we can not subscribe you currently - please try again later.</p>
  </div>
   <div class="remodal_footer">
         <button data-remodal-action="close" class="primary_btn bttn">OK</button>
        </div>
</div>
<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
