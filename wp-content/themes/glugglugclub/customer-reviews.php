<?php 
/** Template Name: All Reviews */
get_header(); ?>
<main id="cms_page" class="main-page-content cms_pages altbodybg" role="main">
	<div class="filter_bar page_title">
		<div class="container-fluid clearfix">
		<h1 class="text-center"><?php the_title();?></h1>
		</div>
	</div>
	<div class="cms_page_content all_reviews container clearfix">
		<div class="row clearfix">
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<div class="white_box_holder">
<?php 
$args = array(
'post_type'              => array( 'customer-reviews' ),
'order'                  => 'DESC',
'orderby'                => 'date',
);
$allreviews = new WP_Query( $args );


if ( $allreviews->have_posts() ):
while ( $allreviews->have_posts() ):
$allreviews->the_post();?>
<div class="review_item">
<div class="review_text">
	<div class="review_text_inner">
		<?php the_content();?>
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
<?php endwhile;
endif;
wp_reset_postdata();?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
