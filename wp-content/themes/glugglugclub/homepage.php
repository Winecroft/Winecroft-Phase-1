<?php
/* Template Name: Homepage */ 
get_header(); ?>

<main class="main-site-content" role="main">

<?php 
/**BANNER**/
if( have_rows('page_banner') ):?>
	<div class="page_banner">
		<?php while ( have_rows('page_banner') ) : the_row(); ?>
			<figure class="banner_item">
			<?php $image = get_sub_field('image');?>
			<span class="banner_gradient">
				<img src="<?php echo $image['sizes']['page_banner'];?>" alt="<?php echo $image['alt'];?>"/>
			</span>
				<figcaption class="banner_item_caption">
					<h3 class="h3"><?php the_sub_field('title');?></h3>
					<?php if(get_sub_field('text')):?>
						<p><?php the_sub_field('text');?></p>
					<?php endif;?>
					<a href="<?php the_sub_field('link_page');?>" class="primary_btn bttn"><?php the_sub_field('link_text');?></a>
				</figcaption>
			</figure>
		</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php /**HOWDOESTHISWORK**/?>
<?php if(get_field('intro_title')):?>
<div id="howdoesthiswork" class="page_section clearfix">
	<div class="container clearfix">
	<div class="intro_area text-center clearfix">
			<p class="intro_title"><?php the_field('intro_title');?></p>
			<h2 class="main_title"><?php the_field('main_title');?></h2>
		</div>
		<?php 
		/**STEPS**/
		if( have_rows('steps') ):?>
			<div class="steps row clearfix">
				<?php while ( have_rows('steps') ) : the_row(); ?><figure class="step_item col-md-4 col-sm-4 col-xs-12 vcenter"><div class="step_inner_holder"><img src="<?php the_sub_field('icon');?>" alt=""/>
						<figcaption class="banner_item_caption">
							<h4 class="step_title"><?php the_sub_field('title');?></h4>
							<?php if(get_sub_field('text')):?>
								<p><?php the_sub_field('text');?></p>
							<?php endif;?>
						</figcaption>
					</div></figure><!--dontdeleteforvcentercsstrick
				--><?php endwhile; ?>
		</div>
		<?php endif; ?>
		<div class="clearer_btn text-center clearfix">
			<a href="<?php echo site_url();?>/getting-started/step-1" title="Get Started" class="hollow_primary_btn bttn">Get Started</a>


		</div>
	</div>
	<hr class="hr1"/>
</div>
<?php endif;?>
<?php if(get_field('reviews_title')):?>
<?php /**REVIEWSSECTION**/?>
<div id="reviews" class="page_section clearfix">
	<div class="container clearfix">
		<div class="row clearfix">
		<div class="intro_reviews col-md-4">
			<h3 class="h2 reviews_title"><?php the_field('reviews_title');?></h3>
			<?php the_field('reviews_text');?>
			<a href="<?php echo home_url();?>/all-reviews" title="Read all Reviews">Read all Reviews &raquo;</a>
		</div>
	</div>
	</div>
	<div id="reviews_slider">
		<?php
			$args = array(
				'post_type'              => array( 'customer-reviews' ),
				'order'                  => 'DESC',
			);
			$reviews = new WP_Query( $args );
			if ( $reviews->have_posts() ):
				while ( $reviews->have_posts() ):
					$reviews->the_post(); ?>
					<div class="review_item">
						<div class="review_text">
							<div class="review_text_inner">
								<?php $string = get_the_content();?>
								<p><?php echo mb_strimwidth($string, 0, 120, "...");?></p>
							</div>
						</div>
						<div class="review_author">
							<span class="author_image">
							<?php if(has_post_thumbnail()):?>
									<?php the_post_thumbnail('author_circle');?>
							<?php else:?>
								<img src="http://via.placeholder.com/50x50" alt="<?php the_field('author_name');?>"/>
							<?php endif;?>
							</span>
							<p class="author_name"><?php the_field('author_name');?></p>
							<?php if(get_field('author_job')):?>
								<p class="author_job"><?php the_field('author_job');?></p>
							<?php endif;?>
						</div>
					</div>
			<?php	
				endwhile;
			endif;
			wp_reset_postdata();
		?>
	</div>
</div>
<?php endif;?>

<?php /**3STEPPROCESS**/?>
<?php if(get_field('how_intro_title')):?>
<div id="signupprocess" class="page_section clearfix">
	<div class="container clearfix">
	<div class="intro_area text-center clearfix">
			<p class="intro_title"><?php the_field('how_intro_title');?></p>
			<h2 class="main_title"><?php the_field('how_main_title');?></h2>
			<?php the_field('how_text');?>
		</div>
		<?php 
		/**HOWSTERPS**/
		if( have_rows('how_steps') ):?>
			<div class="steps steps_process clearfix">
				<div class="steps_process_inner">
					<?php 
					$x = 1;
					while ( have_rows('how_steps') ) : the_row(); ?><figure class="step_item col-md-4 col-xs-6 vcenter">
						<div class="step_inner_holder">
						<span class="counter"><?php echo $x;?></span>
							<img src="<?php the_sub_field('icon');?>" alt=""/>
							<figcaption class="banner_item_caption">
								<h4 class="step_title"><?php the_sub_field('title');?></h4>
								<?php if(get_sub_field('text')):?>
									<p><?php the_sub_field('text');?></p>
								<?php endif;?>
							</figcaption>
						</div>
						</figure><!--dontdeleteforvcentercsstrick
					--><?php $x++; endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php endif;?>

<?php /**BLUEOUTRO**/?>
<?php if(get_field('outro_intro_title')):?>
<div id="outro" class="page_section clearfix">
	<div class="container clearfix">
		<div class="outro_area intro_area text-center clearfix">
			<p class="intro_title"><?php the_field('outro_intro_title');?></p>
			<h2 class="main_title"><?php the_field('outro_title');?></h2>
			<a href="<?php echo site_url();?>/getting-started/step-1/" class="secondary_btn bttn">Sign up Now</a>
		</div>
	</div>
</div>
<?php endif;?>
<?php if(get_field('highlighted_title')):?>
<?php /**HIGHLIGHTEDPRODUCTS**/?>

<div id="highlightedproducts" class="page_section clearfix">
	<div class="container clearfix">
		<div class="intro_reviews">
			<h3 class="h2 reviews_title"><?php the_field('highlighted_title');?></h3>
			<?php the_field('highlighted_text');?>
			<a href="<?php echo home_url();?>/club-winelist/" title="Explore Wines" class="pull-right hollow_primary_btn">Explore Wines</a>
		</div>
	</div>
	<div class="container clearfix">
	<?php 
	global $product;
	$post_objects = get_field('highlighted_products');
	if( $post_objects ): ?>
		<div id="products_slider">
			<?php foreach( $post_objects as $post): ?>
			<?php setup_postdata($post); ?>
				<div <?php post_class(''); ?>>
	<div class="product_inner">

		<?php echo tasteMatchProfile($product->id);?>
		<?php echo monthlyPickBadge($product->id);?>

	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );


	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	echo '<p class="woocommerce-loop-product__profile">';
	echo '<span class="woocommerce-loop-product_sdesc">';
	echo '<span class="left_holder">';
		
	if (strlen($product->post->post_excerpt) > 20):
	   echo substr($product->post->post_excerpt, 0, 20) . '...';
	else:
		echo $product->post->post_excerpt;
	endif;
	echo '<span class="origin">| Origin: </span>';
	echo $product->get_attribute( 'country' ).' <span class="sep">|</span> ';
	echo '</span>';
	echo '<span class="right_holder">';
	//do i get attribute of "wine style" or do i get wine profile used for questions/sub box. i'll get attribute to start to allow variation of items not in box.
	//@TODO Taste Match here
	$winestyle = $product->get_attribute('wine-style');
	echo '<strong>';
	$terms = get_the_terms($product->get_id(),'pa_wine-style');
	if(!empty(tasteMatchProfile($product->id))):
		echo tasteMatchProfile($product->id);
	else:
		echo '<span class="left_holder empty">&nbsp;</span>';
	endif;
	echo '<span class="wine_colour_holder">';
	if($terms):
		foreach ( $terms as $term ):
			echo '<span class="wine_colour"  style="background-color:'.get_field('colour_circle','term_'.$term->term_id).';"></span>';
		endforeach; 
	endif;
	echo $winestyle;
	echo '</span>';
	echo '</strong>';
	echo '</span>';
	echo '</span>';
	echo '</p>';

	
	//$termid = get_term_by('id', 'wine-style', 'product_attributes');
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );

	?>

	<?php /** this closes the opened link in the function **/?> </a>
	<div class="product_country clearfix">
		<p><?php echo $product->get_attribute('region').' <span class="sep">|</span> ';
	echo $product->get_attribute( 'country' );?>
	</div>
	<div class="wine_featured_btn">
		<?php //var_dump($product);?>
	<a href="<?php echo site_url().'/product/'.$product->slug;?>/" class="primary_btn bttn featuredbtn">View Wine</a>
</div>
</div>
</div>
			<?php endforeach; ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
	
	</div>
</div>
<?php endif;?>

</main>

<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
"url": "SiteUrl",
"logo": "<?php echo get_template_directory_uri();?>/includes/img/site-logo.jpg",
"contactPoint" : [{
"@type" : "ContactPoint",
"telephone" : "SiteTelephoneNumber",
"contactType" : "customer service"
}],
"sameAs" : [
    "http://www.facebook.com/NEEDFB",
    "http://www.twitter.com/NEEDTW",
    "http://plus.google.com/NEEDGP"
  ]

}


</script>

<?php get_footer(); ?>
