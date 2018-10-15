<?php require dirname( __FILE__ ) . '/step_promo.php';?>
<div class="container clearfix">

<div id="ggc_step2" class="row clearfix">

<div id="wineselection" class="col-lg-6 col-xs-12 pull-right">

<div class="wineselection_holder">

<div class="wineselection_image">
<h2>What colour do you prefer?</h2>
<h3>Select red, white, or both</h3>
</div>

<div id="wineselection_slider" class="clearfix">

<?php
if( have_rows('wine_selection_carousel') ):?>

<?php while ( have_rows('wine_selection_carousel') ) : the_row(); ?>
<div class="wineselection_item" data-wineamount="<?php the_sub_field('label_amount');?>">
<?php $image = get_sub_field('bottles_image');?>
<img src="<?php echo $image['sizes']['wine_bottles_carousel'];?>" alt="<?php echo $image['alt'];?>"/>

<div class="wineselect_label">
<p><?php the_sub_field('label_for_selection');?></p>
</div>

</div>
<?php endwhile; ?>
<?php endif;?>

</div>
<?php the_field('wine_selection_excerpt');?>
<div class=" step_progress_holder">
	<?php require dirname( __FILE__ ) . '/questions/steps_numbers.php';?>
<form id="ggc_step2_form" class="pull-right" name="ggc_step2_form" action="" method="post" novalidate="novalidate" id="register_step2">
<button type="submit" id="step2btn" name="ggcstep2button" class="primary_btn bttn">See your Taste Profile</button>
<?php /** this is populated via jquery for the value of what wine combination. Either 0R4W, 1R3W, 2R2W,3R1W,4R01**/?>
<input id="ws_input" type="hidden" name="ggc_step2" value="0R4W"/>

</form>

</div>
</div>

</div>



<div id="howitworksinfo" class="col-lg-4 col-lg-offset-1 col-md-6 col-xs-12 hidden-sm hidden-xs">
	<div class="white_box_holder">
	<h1 class="heading">OK! Let's show you how Winecroft works.</h1>
	<?php 
	/**STEPS**/
	if( have_rows('steps') ):?>
		<div class="steps clearfix">
			<?php while ( have_rows('steps') ) : the_row(); ?>
				<figure class="step_item clearfix">
					<div class="step_inner_holder clearfix">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<img src="<?php the_sub_field('icon');?>" alt=""/>
					</div>
						<figcaption class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
						
							<?php if(get_sub_field('text')):?>
								<?php the_sub_field('text');?>
							<?php endif;?>
						</figcaption>
					</div>
				</figure>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
	</div>

</div>

</div>

</div>



<script type="text/javascript">
jQuery(function($) {
  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery("#step2btn").click(function() { // changed   
  	jQuery('body').toggleClass('add-overlay');
  	//alert(rowID);
    $.ajax({
        url: ajaxurl + "?action=ggc_step2",
        type: 'post',
        data: jQuery(this).parent().serialize(), // changed
        success: function(data)
        {
           jQuery('body').toggleClass('add-overlay');
          setTimeout(function(){
          window.location.href = '<?php echo site_url();?>/getting-started/step-3';
        }, 100);

          //window.location.replace('http://'+window.location.host+'/mustardmodels');
        },
        error: function(data){
        console.log("FAILURE!");
        }

         });
    return false; // avoid to execute the actual submit of the form.
});
});
</script>