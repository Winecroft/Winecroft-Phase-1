<?php require dirname( __FILE__ ) . '/step_promo.php';?>
<div class="container clearfix">

<div id="ggc_step3" class="row clearfix">

<div id="registersignup" class="col-md-10 col-md-offset-1 col-xs-12">

<div class="signupimage">
<?php $image = get_field('image');?>
<img src="<?php echo $image['sizes']['step3_image'];?>" alt="<?php echo $image['alt'];?>"/>
</div>

<div id="signup_setup">

<h3>Sign in to see your Taste Profile</h3>

<a class="primary_btn bttn" href="<?php echo site_url();?>/wp-login.php?loginFacebook=1&redirect=<?php echo site_url();?>/" onclick="window.location = '<?php echo site_url();?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">Sign in with Facebook</a>


<a href="#register" class="black_btn">Continue with Email</a>
<p>Already a member? <a href="#signin">Click here</a>

	<div class="reviews_single">

		<?php //@TODO - SELECT 1 REVIEW TO DISPLAY HERE **/?>
		<?php //include('/../partials/reviewssingle_review.php');?>
		<?php require dirname( __FILE__ ) . '/../partials/reviewssingle_review.php';?>
	</div>

</div>


</div>

</div>

</div>

<?php //include('/../partials/signin_modal.php');?>
<?php //include('/../partials/register_modal.php');?>
<?php //include('/../partials/termsofservice_modal.php');?>

<?php require dirname( __FILE__ ) . '/../partials/signin_modal.php';?>
<?php require dirname( __FILE__ ) . '/../partials/register_modal.php';?>
<?php require dirname( __FILE__ ) . '/../partials/termsofservice_modal.php';?>


<script type="text/javascript">
jQuery( document ).ready(function() {
	jQuery( 'form[name="registerform"] .remodal_footer .primary_btn' ).click(function() {	
  		jQuery('body').toggleClass('add-overlay');
  	});
});
</script>

<div class=" step_progress_holder">
	<?php require dirname( __FILE__ ) . '/questions/steps_numbers.php';?>
</div>