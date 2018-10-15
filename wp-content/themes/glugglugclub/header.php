<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<meta itemprop="copyrightHolder" content="Avon Scouts">

		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="194x194" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/favicon-194x194.png">
		<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/android-chrome-192x192.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/manifest.json">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/safari-pinned-tab.svg" color="#51337b">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/includes/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/includes/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/includes/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		
		<?php wp_head(); ?>

		<script>
			window.addEventListener("load", function(){
			window.cookieconsent.initialise({
				"palette": {
				"popup": {
				"background": "#0d0d0d"
			},
				"button": {
				"background": "#ffffff"
			}
			},
				"theme": "classic",
				"content": {
				"dismiss": "OK",
				"href": "<?php echo home_url();?>/cookies"
			}
			})});
		</script>

	</head>
	
	<body <?php body_class(); ?>>

	<div id="page-wrapper" class="wow fadeIn"> <?php /** closes in footer.php **/ ?>

		<header class="site-header clearfix">
			<?php 
			$checkbanner = get_field('display_promotional_banner','option');
			if($checkbanner == TRUE):?>
			<div class="woocommerce-notice_message promotional_banner">
				<?php 
				if (is_user_logged_in() ):
					the_field('alt_text_for_promotional_banner','option');
				else:
					the_field('text_for_promotional_banner','option');
				endif;?>
			</div>
			<?php endif;?>
			<div class="container-fluid clearfix">
				<div class="primary_header row clearfix">
					<div class="secondary_navigation pull-left col-md-3 col-xs-3">
						
						<?php 
						$classes = get_body_class();
						if ( (in_array('page-template-step-1-php',$classes)) OR (in_array('page-template-step-2-php',$classes)) OR (in_array('page-template-step-3-php',$classes)) OR (in_array('page-template-step-4-php',$classes))OR (is_page(18)) ):?>
						    <a class="backtomainsite" href="<?php echo site_url();?>"><i class="fa fa-angle-double-left"></i>Go back to site</a>
						<?php elseif(in_array('woocommerce-checkout',$classes) AND (freeCouponForFirstOrder() == false)):?>
							 <a class="backtomainsite" href="<?php echo site_url();?>/getting-started/step-1/"><i class="fa fa-angle-double-left"></i>Taste Test</a>
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu-secondary', 'depth' => 1 ) ); ?>
						<?php endif;?>

							
						
					</div>
					<div class="site-logo col-md-6 col-xs-4 text-center">
						<a href="<?php echo home_url();?>" title="Glug Glug Club">
							<img src="<?php the_field('header_logo_main_logo','option');?>" alt="Logo" class="logo-img">
						</a>
					</div>
					<div class="cta_nav pull-right col-md-3 col-xs-8 text-right">
						<button id="nav-icon3" class="mobile_nav_btn hidden-md hidden-lg">
							<span></span>
							<span></span>
							<span></span> 
							<span></span>
						</button>
						<ul>
							<?php if(is_user_logged_in()):?>
							<li><a href="<?php echo site_url();?>/my-account" class="primary_btn bttn">View Account</a></li>
							<?php if(WC()->cart->get_cart_contents_count() !== 0) :?> 
								<?php if(freeCouponForFirstOrder() !== false):?>
									<li class="checkoutcartlink"><a href="<?php echo site_url();?>/checkout/"><span>Basket</span><i class="fa fa-shopping-cart"></i></a></li>
								<?php else:?>
									<li class="checkoutcartlink"><a href="<?php echo site_url();?>/checkout/"><span>Complete Signup <i class="fa fa-angle-double-right"></i></span></a></li>
								<?php endif;?>
							<?php endif;?>
							<li class="nonecta_link"><a href="<?php echo wp_logout_url(home_url()); ?>">Sign Out</a></li>
						<?php else:?>
							<li><a href="<?php echo site_url();?>/get-started/step-1/" class="primary_btn bttn">Get Started</a></li>
							<?php if(WC()->cart->get_cart_contents_count() !== 0) :?> <li class="checkoutcartlink"><a href="<?php echo site_url();?>/checkout/"><span>Basket</span><i class="fa fa-shopping-cart"></i></a></li><?php endif;?>
							<li class="nonecta_link"><a href="#signin">Sign In</a></li>
						<?php endif;?>
						</ul>
						

					</div>
			
					
					
				</div>
				<div class="secondary_header clearfix">
					<?php html5blank_nav(); ?>
					<ul class="hidden-md hidden-lg">
						<?php if(!is_user_logged_in()):?>
							<li><a href="#signin">Sign In</a></li>
						<?php endif;?>
					</ul>
				</div>
			</div>
		</header>
		<?php if(get_field('block_checkout', 'option') == TRUE): ?>

			<ul class="woocommerce-error woocommerce-notice_message" style="margin-top:25px !important; margin-bottom:25px !important;">
			<li>We are currently processing orders for this month's subscription box. We will not be taking new orders until the 15th.</li>
			</ul>
		<?php endif;?>
	