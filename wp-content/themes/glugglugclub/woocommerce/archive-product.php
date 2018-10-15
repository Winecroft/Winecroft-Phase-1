<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<main class="main-page-content shop_pages" role="main">

<?php /** filterbar here**/?>

<header class="filter_bar clearfix">

<div class="container-fluid clearfix">

<div class="row clearfix">

<div class="filters_sort col-md-3 text-left">

<?php 
if(is_product_category( 'gifts' )):
else:?>

<a href="#filtermenu" class="filter_toggle">Filters</a>
<form class="woocommerce-ordering" method="get">
<select name="orderby" class="orderby">
				<option value="menu_order" selected="selected">Default sorting</option>
				<option value="popularity">Sort by popularity</option>
				
				<option value="date">Sort by newness</option>
				<option value="price">Sort by price: low to high</option>
				<option value="price-desc">Sort by price: high to low</option>
				<option value="#sortLightFull">Sort by Light to Full Bodied</option>
				<option value="wine_profile_order">Sort By Profile (Light - Full/White - Red)</option>
				<option value="wine_profile_order_desc">Sort By Profile (Light - Full/Red - White)</option>
				<?php /**
				<option value="wine-sort-white">Sort by: White - Light, Medium, Full Bodied</option>
				<option value="wine-sort-red">Sort by: Red - Light, Medium, Full Bodied</option>
				**/?>
		</select>
		<div class="nice-select orderby" tabindex="0"><span class="current">Default sorting</span><ul class="list"><li data-value="menu_order" class="option selected">Default sorting</li><li data-value="popularity" class="option">Sort by popularity</li><li data-value="date" class="option">Sort by newness</li><li data-value="price" class="option">Sort by price: low to high</li><li data-value="price-desc" class="option">Sort by price: high to low</li><li data-value="wine_profile_order" class="option">Sort By profile (light - full/white - red)</li><li data-value="wine_profile_order_desc" class="option">Sort By profile (light - full/red - white)</li>
			<?php /**
			<li data-value="wine-sort-white" class="option">Sort by: White - Light, Medium, Full Bodied</li>
			<li data-value="wine-sort-red" class="option">Sort by: Red - Light, Medium, Full Bodied</li>
			**/ ?>
		</ul></div>
</form>

<?php endif; ?>
</div>

<div class="categories_tab col-md-6 text-center">
<?php 
if(is_product_category( 'gifts' )):
else:
dynamic_sidebar( 'widget-area-1' ); 
endif;
?>
</div>

<div class="viewmode col-md-3 text-right">
<?php 
if(is_product_category( 'gifts' )):
else:?>


<a class="" href="#classic">Winelist view</a>
<a class="activeview" href="#standard">Shop view</a>

<?php endif;?>
</div>

</div>

</div>
</header>

<div id="filters">
<div class="filters_inner_holder">
<div class="filters_inner_heading clearfix">
<a href="#filtermenu" class="filter_toggle pull-left">Filters</a>

<a href="<?php echo site_url();?>/product-category/club-winelist/" class="clearfilters" style="display:none"> Clear</a>

</div>
<?php dynamic_sidebar( 'widget-area-2' ); ?>
</div>
</div>

	<?php
/**
* woocommerce_before_shop_loop hook.
*
* @hooked wc_print_notices - 10
* @hooked woocommerce_result_count - 20
* @hooked woocommerce_catalog_ordering - 30
*/
//do_action( 'woocommerce_before_shop_loop' );
?>

<div id="products_list" class="container-fluid clearfix"  data-viewmode="#standard">

	<div class="category_opening">

		<div class="category_opening_inner">

			<h1><?php 
			$title = single_cat_title("", false);
			if(!empty($title)):
				echo single_cat_title();
			else:
				echo 'All Wines';
			endif;
			?></h1>
		
				<?php if(!empty(category_description())):
				 echo category_description();
				 else:?>
				 It doesn’t cost a thing to become a member, and you can skip or cancel anytime.
				 <?php endif;?>
		</div>

	</div>



	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>


	<?php if ( have_posts() ) : ?>

	

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>




</div>
<?php //include('/box/amendbox_js.php');?>
<?php require dirname( __FILE__ ) . '/box/amendbox_js.php';?>
<?php// $test = new WC_Order(147);
//var_dump($test);
?>

<script type="text/javascript">
jQuery( document ).ready(function() {
	if (window.location.hash) {
	 if (window.location.hash.indexOf('amendorder') == 1) { // not 0 because # is first character of window.location.hash
	   	jQuery('.backtoupcoming').show();
	 }

	}
});
</script>

<a href="<?php echo site_url();?>/my-account/orders/" class="backtoupcoming" style="display:none;">Back to Upcoming Order <i class="fa fa-long-arrow-right"></i></a>

<?php get_footer( 'shop' ); ?>