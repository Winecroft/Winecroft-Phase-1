<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
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

?>
<?php 
$terms = get_the_terms($post->ID,'pa_country');
if($terms):?>
<div class="product_country clearfix">
<p>
<?php
if(get_the_terms($post->ID,'pa_region')):
$terms = get_the_terms($post->ID,'pa_region');
foreach ($terms as $term):
	echo $term->name;
endforeach;
endif;
?>
	<?php //the_field('wine_region') .  
$terms = get_the_terms($post->ID,'pa_country');
foreach ($terms as $term):
	echo $term->name;
endforeach;
?></p>
</div>
<div class="product_colour clearfix">
	<?php
	$terms = get_the_terms($product->get_id(),'pa_wine-style');
	$winestyle = $product->get_attribute('wine-style');
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
	?>
</div> 
<?php endif;?>
<div class="price_single clearfix">
<p class="price"><?php echo $product->get_price_html(); ?></p>

</div>
