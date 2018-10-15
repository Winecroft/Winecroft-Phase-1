<div class="remodal" data-remodal-id="register">
<button data-remodal-action="close" class="remodal-close"></button>
	<div class="remodal_heading">
		<h4 class="remodal_heading">Register</h4>
		<p>Please enter an email address and password to register</p>
	</div>
	<div class="remodal_body">
	<?php
		$exists = email_exists($_POST['user_email'] );
		if ( $exists ):
		    echo 'That email address is already registered, please use another email address.';
		endif;
	?>
	</div>
		<form name="registerform" action="<?php echo esc_url( site_url( 'wp-login.php?action=register', 'login_post' ) ); ?>" method="post" novalidate="novalidate">
				
				<input type="hidden" name="user_login" id="user_login" class="input" value="" size="40"/>
				<label>Email Address <small style="display:none" class="emailfail">That email address is already in use, please try a different one</small> <small class="emailfail2 small" style="display:none">That email address or password is incorrect, please try again.</small></label>
				<input type="email" name="user_email" id="user_email" class="input" value="" size="40" required/>
				<label>Password</label>
				<input type="password" name="user_password" value="" id="user_password" class="input" required/>
				<span id="password-strength"></span>
				<input type="hidden" name="_wp_http_referer" value="<?php echo site_url();?>#registerModal">
				<input type="hidden" name="redirect_to" value="<?php echo site_url();?>/get-started/step-4" /> 
				<div class="remodal_footer">
					<button type="submit" class="primary_btn bttn" value="<?php esc_attr_e('Register'); ?>" id="registerbtn">Continue</button>
				</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($){ 
		jQuery('form[name="registerform"] #user_email').on('change',function(){
	        jQuery('form[name="registerform"] #user_login').val(jQuery(this).val());
	    });

		var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
		jQuery("#registerbtn").click(function() { // changed   
		  //alert(rowID);
		   $.ajax({
	        url: ajaxurl + "?action=emailcheck",
	        type: 'post',
	        data: jQuery(this).parent().parent().serialize(),
	        
	        success: function(data) {
	            if(data == 'yes') {
	            	jQuery('body').removeClass('add-overlay');
	               jQuery('.emailfail').show();
	            }
	            else if(data == 'no') {
	            	jQuery('.emailfail').hide();
	                jQuery('form[name="registerform"]').submit();
	            }
	        },
	        error: function(data){
	           
	        }
	    });


		return false;
		 
		});

});

</script>
<?php 

if (isset($_GET['y']) && count($_GET) == 1):?>
<style>
.emailfail2 {display:inline-block !important;}
</style>
<?php endif; ?>