	<footer class="site-footer clearfix">
		<div class="footer_intro container clearfix">
			<a class="footer-logo" href="<?php echo home_url();?>" title="Glug Glug Club">
				<img src="<?php the_field('footer_logo','option');?>" alt="Logo" class="logo-img">
			</a>
			<p><?php the_field('footer_opening_text','option');?></p>
			<a href="<?php echo site_url();?>/getting-started/step-1" class="primary_btn bttn">Get Started</a>
			<hr class="hrdivide"/>
		</div>
		<div class="container clearfix">
			<div class="row clearfix">
				<div class="footer_menu col-md-4">
					<h6>Our Club</h6>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1', 'depth' => 1 ) ); ?>
				</div>
				<div class="footer_menu col-md-3 col-md-offset-1">
					<h6>About</h6>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2', 'depth' => 1 ) ); ?>
				</div>
				<div class="footer_menu col-md-3 pull-right">
					<h6>Policies</h6>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-3', 'depth' => 1 ) ); ?>
				</div>
			</div>
		</div>
	</footer>

	<div class="footer_strapline clearfix">
		<div class="container clearfix">
			<div class="pull-left">
				<p>&copy; <?php echo date('Y');?> - Winecroft - All rights reserved.</p>

			</div>
			<?php /**
			<div class="pull-right text-right">
				<ul class="secondary_navigation">
					<li><a href="<?php echo home_url();?>/terms-of-use">Terms of Use</a></li>
					<li><a href="<?php echo home_url();?>/privacy-policy">Privacy</a></li>
				</ul>
			</div>
			**/?>
		</div>
	</div>

	<?php wp_footer(); ?>
	</div><?php /** opens in header.php **/ ?>
	<script type="application/ld+json">
	{
	  "@context" : "http://schema.org",
	  "@type" : "WebSite",
	  "name" : "Glug Glug Club",
	  "alternateName" : "Glug Glug Club",
	  "url" : "https://www.glugglugclub.com"
	}
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#preloader').delay(2000).fadeOut('slow',function(){jQuery(this).remove();});
		});
	</script>

	<div id="preloader">
	<div class="preloader_container">
	<div class="loader"></div>
	</div>
	</div>	
	<?php // include('includes/partials/sigin_modal.php');?>

	<div class="loading-icon">
		<?php /*8
		<svg width="135" height="135" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#2976ff">
		<path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
		<animateTransform
		attributeName="transform"
		type="rotate"
		from="0 67 67"
		to="-360 67 67"
		dur="2.5s"
		repeatCount="indefinite"/>
		</path>
		<path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
		<animateTransform
		attributeName="transform"
		type="rotate"
		from="0 67 67"
		to="360 67 67"
		dur="8s"
		repeatCount="indefinite"/>
		</path>
		</svg>
		**/?>
		<img src="<?php echo get_template_directory_uri(); ?>/includes/icons/winecroft-loader.gif"/>
	</div>

	<?php /**general modals **/?>
	<?php //include('/includes/partials/tasteometer_modal.php');?>
	<?php //include('/includes/partials/winechoice_modal.php');?>
	<?php //include('/includes/partials/signin_modal.php');?>


	<?php require dirname( __FILE__ ) . '/includes/partials/tasteometer_modal.php';?>
	<?php require dirname( __FILE__ ) . '/includes/partials/winechoice_modal.php';?>
	<?php require dirname( __FILE__ ) . '/includes/partials/signin_modal.php';?>
	</body>
</html>
