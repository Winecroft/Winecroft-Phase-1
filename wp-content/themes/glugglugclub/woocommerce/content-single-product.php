<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
?>
<main id="product_single" class="main-page-content shop_pages" role="main">
<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="product_main_info whitebg clearfix">
	<div class="container clearfix">

		<div class="row clearfix">

			<div class="col-lg-4 col-lg-offset-2 col-md-5 col-xs-12">
			<?php
				/**
				 * woocommerce_before_single_product_summary hook.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>
			</div>
			<div class="notrel text-center col-lg-4 col-md-7 col-xs-12">
			<?php
					/**
					 * woocommerce_single_product_summary hook.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>
				<p class="delivery_single"><i class="delivery-icon"></i>Free Delivery for 4 bottles or more</p>
			</div>

		</div>

	</div>
</div>

<?php if( class_exists( 'WC_Subscriptions_Product' ) && WC_Subscriptions_Product::is_subscription( $product ) ):?>
<div class="altbodybg2 clearfix">
	<div class="wine_overview clearfix">

		<div class="container clearfix">

			<div class="row clearfix">

				<div class="wine_excerpt col-lg-3 col-md-4 col-xs-12">
					<!--intro-->
					<h3><?php the_field('wine_exerpt');?></h3>
				</div>

				<div class="winedata_dial col-lg-7 col-md-8">
					<div class="wine_data row clearfix">
					<?php // echo $product->list_attributes(); ?>
					<?php if(get_field('grape_variety')):?>
					<div class="wine_attribute col-md-3 col-xs-12">
					<strong>Grape Variety</strong>
					<p><?php the_field('grape_variety');?></p>
					</div>
					<?php endif;?>

					<?php 
					$sweetness = $product->get_attribute( 'pa_sweetness' );
					if($sweetness): ?>
					<div class="wine_attribute col-md-4 col-md-offset-1 col-xs-12">
						<strong>Sweetness</strong>
						<p><?php echo $sweetness;?></p>
					</div>
					<?php endif;?>

					<?php if(get_field('alcohol_percentage')):?>
					<div class="wine_attribute col-md-4 col-xs-12">
					<strong>Alcohol</strong>
					<p><?php the_field('alcohol_percentage');?>%</p>
					</div>
					<?php endif;?>
					</div>
				</div>
				<div class="wine_dial col-lg-2 col-xs-12 text-center">
					<?php 
					$field = get_field('wine_dial_rating');
					$value = $field['value'];
					?>
					<canvas id="tasteprofile_gauge"></canvas>
					<small data-remodal-target="dialmeter">Winecroft Style Meter</small> 
				</div>

			</div>

		</div>

		<div class="characteristics clearfix">
			<div class="container clearfix">
				<div class="row clearfix">	
					<?php
					$flavours = wp_get_post_terms( $product->id, 'characteristics' );
					if($flavours):?>
					<div class="col-md-3 col-xs-12">
						<strong>Flavour Characteristics</strong>
					</div>
						<div class="col-md-9 col-xs-12">
						<?php foreach($flavours as $flavour):
							$flavourID = $flavour->term_id;
							$image = get_field('characteristic_image','term_'.$flavourID);
							?>
							<?php if(!empty($image['url'])):?>
							<p class="flavour_yimg">
								<img src="<?php echo $image['url'];?>" alt="<?php echo $flavour->name;?>" title="<?php echo $flavour->name;?>" class="flavour_img"/>
								<span><?php echo $flavour->name;?></span>
							</p>
							<?php else:?>
								<p class="flavour_noimg"><?php echo $flavour->name;?></p>
							<?php endif;?>
						<?php endforeach;?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>

	</div>
</div>
<?php endif;?>

<?php if( class_exists( 'WC_Subscriptions_Product' ) && WC_Subscriptions_Product::is_subscription( $product ) ):?>
<div class="subdata_holder whitebg clearfix">

	<div class="container clearfix">

		<div class="row clearfix">

			<div class="main_desc col-md-6 col-xs-12">
				<?php the_content();?>
			</div>

			<div class="col-md-5 col-md-offset-1 col-xs-12">
				<div class="subdata">
					<strong>How to serve it</strong>
					<?php the_field('how_to_serve_it');?>
				</div>
				<div class="subdata">
					<strong>Pairs well with</strong>
					<?php the_field('pairs_well_with');?>
				</div>
			</div>

		</div>
	</div>


	<div class="upsells_holder container clearfix">
		<!-- related -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	</div>

	
</div>

<?php endif;?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
</main>
<script type="text/javascript">
	jQuery( document ).ready(function() {

  var opts = {
  lines: 12, // The number of lines to draw
  angle: 0, // The length of each line
  lineWidth: 0.2, // The line thickness
  pointer: {
    length: 0.6, // The radius of the inner circle
    strokeWidth: 0.035, // The rotation offset
    color: '#000000' // Fill color
  },
  colorStart: '#598ebd',   // Colors
  colorStop: '#8e1d62',    // just experiment with them
  strokeColor: '#E0E0E0',   // to see which ones work best for you
  generateGradient: true,
  renderTicks: {
    divWidth: 0.1
   // divisions: 3,
  //  divWidth: 10,
  //  divLength: 1,
  //  divColor: '#ffffff'//,
    // subDivisions: 3,
    //subLength: 0.5,
    // subWidth: 0.6,
    // subColor: '#666666'
  },
  staticZones: [
   {strokeStyle: "#5c88b8", min: 0, max: 3},
   {strokeStyle: "#725892", min: 4, max: 9},
   {strokeStyle: "#8d1d63", min: 10, max: 12}
],
};



var target = document.getElementById('tasteprofile_gauge'); 
var gauge = new Gauge(target).setOptions(opts); 
gauge.maxValue = 12;
gauge.animationSpeed = 24; 
<?php 
$field = get_field('wine_dial_rating');
?>
gauge.set(<?php echo $field['value'];?>); 

});
</script>

<?php // include('/../includes/partials/dialmeter_modal.php');?>
<?php require dirname( __FILE__ ) . '/../includes/partials/dialmeter_modal.php';?>