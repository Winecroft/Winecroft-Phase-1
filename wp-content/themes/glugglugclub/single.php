<?php get_header(); ?>



<main id="news_single" class="main-page-content altbodybg" role="main" itemscope="" itemtype="http://schema.org/BlogPosting">
	<div class="filter_bar page_title">
		<div class="container-fluid clearfix">
		<h1 class="text-center"  itemprop="headline"><?php the_title();?></h1>
		<small class="text-center">Published on <?php the_time('F j, Y'); ?></small>
		</div>
	</div>
	<div class="container clearfix">
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="white_box_holder">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<span  itemprop="articleBody">
					<?php the_content();  ?>
				</span>
					<div id="share-buttons" class="clearfix">
					<h6>Enjoyed this article? Why not share with your friends</h6>
					<a class="emailshare shareicon" href="mailto:?Subject=Read this article from Winecroft! &amp;Body=<?php the_title();?> - <?php the_permalink();?>">
					<i class="fa fa-envelope-o"></i>
					</a>
					<a class="whatsappshare shareicon" href="whatsapp://send?text=<?php the_permalink();?>" data-action="share/whatsapp/share""><i class="fa fa-whatsapp"></i></a>
					<a class="facebookshare shareicon" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank">
					<i class="fa fa-facebook"></i>
					</a>
					<a class="googleshare shareicon" href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank">
					<i class="fa fa-google-plus"></i>
					</a>
					<a class="linkedinshare shareicon" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>" target="_blank">
					<i class="fa fa-linkedin"></i>
					</a>
					<a class="printshare shareicon" href="javascript:;" onclick="window.print()">
					<i class="fa fa-print"></i>
					</a>
					<a class="twittershare shareicon" href="https://twitter.com/share?url=<?php the_permalink();?>&amp;hashtags=winecroft" target="_blank">
					<i class="fa fa-twitter"></i>
					</a>
				</div>
				<?php endwhile; ?>
				<?php else: ?>
				<?php endif; ?>
			</div>
		</div>
	</div>


<?php 
if ( has_post_thumbnail( $_post->ID ) ):?>
<span itemprop="image" itemscope itemtype="http://schema.org/ImageObject" >
<meta itemprop="url" content="<?php echo get_the_post_thumbnail_url($post_id, 'fullnews');?>"/>
</span>    
<?php else: ?>
<?php endif; ?>
<meta itemprop="author" content="Winecroft"/> 
<meta itemprop="publisher" content="Winecroft"/>
<meta itemprop="datePublished" content="<?php echo get_the_time('Y-m-d');?>">
<meta itemprop="dateModified" content="<?php echo get_the_time('Y-m-d');?>">

</main>
 

<?php get_footer(); ?>