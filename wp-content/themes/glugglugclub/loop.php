<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<article class="news_list_item clearfix">
		<div class="card-inner row clearfix">
			<?php if(has_post_thumbnail()):?>
				<div class="card-image-holder col-md-4 col-xs-12">
					<?php the_post_thumbnail();?>
				</div>
				<div class="card-caption col-md-8 col-xs-12">
					<h3><?php the_title();?></h3>
					<p><?php the_excerpt();?></p>
					<a href="<?php the_permalink();?>">Read more</a>
				</div>
			</a>
			<?php else:?>
				<div class="card-caption col-xs-12">
					<h3><?php the_title();?></h3>
					<p><?php the_excerpt();?></p>
					<a href="<?php the_permalink();?>">Read more</a>
				</div>
			<?php endif;?>
		</div>
	</article>
<?php endwhile; ?>

<?php else: ?>

<?php endif; ?>
