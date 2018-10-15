<div class="remodal" data-remodal-id="signin">
<button data-remodal-action="close" class="remodal-close"></button>
	<div class="remodal_heading">
		<h4 class="remodal_heading">Sign In</h4>
		<p>Please enter your email address and password to login.</p>
	</div>
	<div class="remodal_body">
		<form name="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
			<label>Email Address  <small class="emailfail2 small" style="display:none">That email address or password is incorrect, please try again.</small></label>
			<input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="Email Address" required/>
			<label>Password</label>
			<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" required />
			<div class="remodal_footer">
				<button type="submit" class="primary_btn bttn" value="<?php esc_attr_e('Login'); ?>">Login</button>
				<p style="display: block;
    float: left;
    margin-top: 15px;
    width: 100%;
    text-align: center;
    margin-bottom: -10px;"><a href="<?php echo site_url();?>/my-account/lost-password/">Forgotten your password?</a></p>
			</div>
		</form>
	</div>
</div>

<?php 

if (isset($_GET['login']) && count($_GET) <= 2):?>
<style>
.emailfail2 {display:inline-block !important;}
</style>

<script>
var inst = jQuery('[data-remodal-id=signin]').remodal();
inst.open();
	</script>
<?php endif; ?>

