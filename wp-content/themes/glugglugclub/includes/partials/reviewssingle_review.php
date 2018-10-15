<?php /** @TODO REPLACE WITH REVIEW**/?>
<div class="review review_single">
<?php 
$post_object = get_field('featured_review');
if( $post_object ): 
	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
?>
<div class="review_stars">
<?php 
$star = get_field('rating');
for ($i = 1; $i <= (int)$star; $i++):?>
<span class="star-icon"></span>
<?php endfor;?>
</div>
<div class="review_text">
<div class="review_text_inner">
<?php $string = get_the_content();?>
<p><?php echo mb_strimwidth($string, 0, 120, "...");?></p>
</div>
</div>
<div class="review_author">
<p class="author_name"><?php the_field('author_name');?></p>
</div>
<?php 
wp_reset_postdata(); 
endif;?>
</div> 