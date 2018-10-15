<?php if ( (is_woocommerce()) OR (is_checkout()) OR (is_account_page()) OR (is_cart())):?>	
<?php get_header(); ?>
<main class="main-page-content" role="main">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		the_content();
	} // end while
} // end if
?>

</main>
<?php get_footer(); ?>

<?php else:?>


<?php get_header(); ?>
<main id="cms_page" class="main-page-content cms_pages altbodybg" role="main">
	<div class="filter_bar page_title">
		<div class="container-fluid clearfix">
		<h1 class="text-center"><?php the_title();?></h1>
		</div>
	</div>
	<div class="cms_page_content container clearfix">
		<div class="row clearfix">
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<div class="white_box_holder">

				<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
							the_content();
						}
					} 
				?>
			</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>


<?php endif;?>



