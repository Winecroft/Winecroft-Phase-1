<div id="notifications_data" class="account_form clearfix">
	<fieldset>
		<legend>Notifications <span class="togglefieldset pull-right"><i class="fa fa-angle-down"></i></span></legend>
		<div class="notification_holder clearfix">
			<div class="form_rows clearfix">
				<div class="form_rows_left">
					<label>Monthly Newsletter</label>
					<p>A once-a-month-only rundown, full of the best we have to offer</p>
				</div>
				<div class="form_rows_right">
					<?php 
					$email = esc_attr( $current_user->user_email );
					if(checkMailChimp($email,'d096226d9a') == 'subscribed'):?>
					<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="subscribed_list">
						<input type="hidden" name="fname" value="<?php echo esc_attr( $current_user->first_name ); ?>" />
						<input type="hidden" name="lname" value="<?php echo esc_attr( $current_user->last_name ); ?>" />
						<input type="hidden" name="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required />
						<input type="hidden" name="action" value="mailchimpunsubscribe" />
						<input type="hidden" name="list_id" value="d096226d9a"/>
						<!-- we need action parameter to receive ajax request in WordPress -->
						<button>U</button>
					</form>
					<?php else:?>
					<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="unsubscribed_list">
						<input type="hidden" name="fname" value="<?php echo esc_attr( $current_user->first_name ); ?>" />
						<input type="hidden" name="lname" value="<?php echo esc_attr( $current_user->last_name ); ?>" />
						<input type="hidden" name="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required />
						<input type="hidden" name="action" value="mailchimpsubscribe" />
						<input type="hidden" name="list_id" value="d096226d9a"/>
						<!-- we need action parameter to receive ajax request in WordPress -->
						<button>S</button>
					</form>
					<?php endif;?>
				</div>
			</div>

		<div class="form_rows clearfix">
			<div class="form_rows_left">
				<label>Product Announcements</label>
				<p>First-to-know information about our latest wine releases, partner collaborations, special wine packs, and gifting products.</p>
			</div>
			<div class="form_rows_right">
				<div class="form_rows_right">
	<?php 
	
	if(checkMailChimp($email,'ff8dd1a3cb') == 'subscribed'):?>
	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="subscribed_list">
	<input type="hidden" name="fname" value="<?php echo esc_attr( $current_user->first_name ); ?>" />
	<input type="hidden" name="lname" value="<?php echo esc_attr( $current_user->last_name ); ?>" />
	<input type="hidden" name="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required />
	<input type="hidden" name="action" value="mailchimpunsubscribe" />
	<input type="hidden" name="list_id" value="ff8dd1a3cb"/>
	<!-- we need action parameter to receive ajax request in WordPress -->
	<button>U</button>
</form>
<?php else:?>
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="unsubscribed_list">
	<input type="hidden" name="fname" value="<?php echo esc_attr( $current_user->first_name ); ?>" />
	<input type="hidden" name="lname" value="<?php echo esc_attr( $current_user->last_name ); ?>" />
	<input type="hidden" name="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required />
	<input type="hidden" name="action" value="mailchimpsubscribe" />
	<input type="hidden" name="list_id" value="ff8dd1a3cb"/>
	<!-- we need action parameter to receive ajax request in WordPress -->
	<button>S</button>
</form>
<?php endif;?>
</div>
			</div>
		</div>

		<div class="form_rows clearfix">
			<div class="form_rows_left">
				<label>Wine News</label>
				<p>All things food, drink, and wine lifestyle — plus, expert tips and tricks on making the most of your wine experience.</p>
			</div>
<div class="form_rows_right">
	<?php 
	
	if(checkMailChimp($email,'11632eff88') == 'subscribed'):?>
	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="subscribed_list">
	<input type="hidden" name="fname" value="<?php echo esc_attr( $current_user->first_name ); ?>" />
	<input type="hidden" name="lname" value="<?php echo esc_attr( $current_user->last_name ); ?>" />
	<input type="hidden" name="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required />
	<input type="hidden" name="action" value="mailchimpunsubscribe" />
	<input type="hidden" name="list_id" value="11632eff88"/>
	<!-- we need action parameter to receive ajax request in WordPress -->
	<button>U</button>
</form>
<?php else:?>
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" class="unsubscribed_list">
	<input type="hidden" name="fname" value="<?php echo esc_attr( $current_user->first_name ); ?>" />
	<input type="hidden" name="lname" value="<?php echo esc_attr( $current_user->last_name ); ?>" />
	<input type="hidden" name="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" required />
	<input type="hidden" name="action" value="mailchimpsubscribe" />
	<input type="hidden" name="list_id" value="11632eff88"/>
	<!-- we need action parameter to receive ajax request in WordPress -->
	<button>S</button>
</form>
<?php endif;?>
</div>
		</div>
	</div>
	</fieldset>
</div>