<?php get_header();?>
<main id="news_pages" class="main-page-content altbodybg" role="main">
	<div class="filter_bar page_title">
		<div class="container-fluid clearfix">
		<h1 class="text-center">News</h1>
		</div>
	</div>
	<div class="container clearfix">
		<aside class="col-md-3 col-xs-12">
			<div class="white_box_holder">
				<?php dynamic_sidebar( 'news' ); ?>
			</div>
		</aside>

		<div class="col-md-9 col-xs-12">
			<div class="white_box_holder">
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</div>
		</div>
	</div>
	<div class="container clearfix">
		
	</div>
</main>
<?php get_footer(); ?>