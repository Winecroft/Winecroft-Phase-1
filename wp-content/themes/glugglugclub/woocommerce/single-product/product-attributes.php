<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php foreach ( $attributes as $attribute ) : ?>
	<div class="wine_attribute">
		<strong><?php echo wc_attribute_label( $attribute->get_name() ); ?></strong>
		<?php
			$values = array();

			if ( $attribute->is_taxonomy() ) {
				$attribute_taxonomy = $attribute->get_taxonomy_object();
				$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

				foreach ( $attribute_values as $attribute_value ) {
					$value_name = esc_html( $attribute_value->name );

					if ( $attribute_taxonomy->attribute_public ) {
						$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
					} else {
						$values[] = $value_name;
					}
				}
			} else {
				$values = $attribute->get_options();

				foreach ( $values as &$value ) {
					$value = make_clickable( esc_html( $value ) );
				}
			}

			echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
		?>
	</div>
<?php endforeach; ?>

<?php if(get_the_terms($post->ID,'pa_region')):?>
<div class="wine_attribute">
	<strong>Wine Region</strong>
<?php
$terms = get_the_terms($post->ID,'pa_region');
foreach ($terms as $term):
	echo $term->name;
endforeach;
?>
</div>
<?php endif;?>


<?php if(get_field('sub_region')):?>
<div class="wine_attribute">
	<strong>Sub-Region</strong>
	<p><?php the_field('sub_region');?></p>
</div>
<?php endif;?>
<?php if(get_field('alcohol_percentage')):?>
<div class="wine_attribute">
	<strong>Alcohol</strong>
	<p><?php the_field('alcohol_percentage');?>%</p>
</div>
<?php endif;?>

<?php if(get_field('bottle_size')):?>
<div class="wine_attribute">
	<strong>Bottle Size</strong>
	<p><?php the_field('bottle_size');?></p>
</div>
<?php endif;?>


<?php if(get_field('producer')):?>
<div class="wine_attribute">
	<strong>Producer</strong>
	<p><?php the_field('producer');?></p>
</div>
<?php endif;?>

<?php if(get_field('grape_variety')):?>
<div class="wine_attribute">
	<strong>Grape Variety</strong>
	<p><?php the_field('grape_variety');?></p>
</div>
<?php endif;?>
