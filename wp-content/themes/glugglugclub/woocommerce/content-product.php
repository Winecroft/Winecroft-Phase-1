<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php post_class('col-md-3 col-sm-4 col-xs-6'); ?>  data-profileorder="<?php the_field('wine_profile_order');?>">
	<div class="product_inner">
<?php $gift_title = $product->get_title();
if (strpos($gift_title, 'Gift') !== false) {
	echo '<a href="'.$product->get_permalink().'" class="secondary_btn bttn">Give them wine </a>';
} else {?>
		<?php echo tasteMatchProfile($product->id);?>

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
	/** REQUEST REMOVED
	if (strlen($product->post->post_excerpt) > 20): 
	   echo substr($product->post->post_excerpt, 0, 20) . '...';
	else:
		echo $product->post->post_excerpt;
	endif;
	**/
	echo $product->get_attribute('region').' <span class="sep">|</span> ';
	echo $product->get_attribute( 'country' );
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
	$winetype = $product->get_attribute('pa_wine-type');

	if($terms):
	echo '<span class="wine_colour_holder">';
		foreach ( $terms as $term ):
			if($winetype == 'Red'):
			echo '<span class="wine_colour"  style="background-color:'.get_field('colour_circle','term_'.$term->term_id).';"></span>';
		elseif($winetype == 'White'):
			echo '<span class="wine_colour"  style="background-color:'.get_field('colour_circle_white_wine','term_'.$term->term_id).';"></span>';
		else:
			echo '<span class="wine_colour"  style="background-color:'.get_field('colour_circle','term_'.$term->term_id).';"></span>';
		endif;
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
	do_action( 'woocommerce_after_shop_loop_item' );
}//end else
	?>
</div>
</div>
