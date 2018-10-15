<?php $current_user = wp_get_current_user();?>
<div id="account_mini_profile" class="col-md-4 col-xs-12">
<div class="white_box_holder">
	<div class="account_image">
		<div class="holder">
		<?php echo getProfilePicture();?>
		<button data-remodal-target="updateProfilePicture" id="replacePicture"><i class="fa fa-pencil"></i></button>
	</div>
	</div>
	<div class="account_name">
		<p>Welcome back, <?php echo esc_attr( $current_user->first_name ) .' '. esc_attr( $current_user->last_name ); ?></p>
		<p class="account_email"><?php echo $current_user->user_email;?></p>
	</div>
	<div class="taste_profile_meter clearfix">

	<p class="blue clearfix">Your Winecroft Style Meter <span class="pull-right" data-remodal-target="tasteometer">Learn More</span></p>

	<div class="taste_profile_current clearfix">

		<div class="current_profile_setting">
			<p>Your taste profile is</p>
			<p><strong>
			<?php 
			$profilevalue = get_field('customer_taste_profile_value','user_'.$current_user->ID);
			//echo $profilevalue['label'];
			echo substr($profilevalue['label'], 0, strpos($profilevalue['label'], "("));

			 ?>
			 	
			 </strong></p>
		</div>
		<div class="current_profile_dial">
			<canvas id="tasteprofile_gauge_mini"></canvas>
		</div>
		<div class="change_taste_profile clearfix">
			<a href="<?php echo site_url();?>/my-account/taste-profile/#changeTasteProfile" class="hollow_primary_btn bttn">Change your taste preferences</a>
		</div>

		


	</div>
	</div>


		<div class="winesmonth taste_profile_meter clearfix">

	<p class="blue clearfix">Wines each month<span class="pull-right" data-remodal-target="winechoice">Learn More</span></p>

	<div class="taste_profile_current clearfix">

		<div class="current_profile_setting fullwidth">
			<p>Currently you'll receive</p>
			<?php $wineamounts = get_field('wine_selection', 'user_'.$current_user->ID);?>
			<div class="row clearfix">
				<p class="col-md-6 col-xs-12"><span><?php echo mb_substr($wineamounts, 0, 1);?> </span>Red Wine(s)</p>
				<p class="col-md-6 col-xs-12"><span><?php echo mb_substr($wineamounts,-2,1);?> </span>White Wine(s)</p>
			</div>
		</div>
		
		<div class="change_taste_profile clearfix">
		<a href="#changeWinePreferences" class="hollow primary_btn bttn">Change your mix</a>
		</div>

		


	</div>
	</div>





</div>
<?php /*<div id="nextshipment" class="clearfix">
<div class="blue_box_holder text-center">

<?php 
//functions.php to work out current subscription status and show message
echo getUserActiveSubscriptionStatus($current_user->ID);?>

<p><a href="<?php echo home_url();?>/my-account/subscriptions">Manage your subscription</a><br/> if you'd like to change your details</p>
</div>
</div> */ ?>
</div>



<div class="remodal" data-remodal-id="updateProfilePicture">
<button data-remodal-action="close" class="remodal-close"></button>
	<div class="remodal_heading">
		<h4 class="remodal_heading">Upload a new profile picture</h4>
		
		<p>If your account is linked with facebook, then this won't replace it.</p>
	</div>
	<div class="remodal_body">
	<form action="<?php echo get_stylesheet_directory_uri();?>/updateProfilePicture.php" id="updateProfilePicture2" method="post" enctype="multipart/form-data">
	  <input type="file" name="profilepicture" size="25">
	  <input type="hidden" name="userid" value="<?php echo getCurrentUserId();?>"/>
	  <button type="submit" id="submitNewPicture" name="updatePicture" class="primary_btn bttn">Upload</button>
	</form>
	</div>
</div>


<div class="remodal" data-remodal-id="changeWinePreferences">
<button data-remodal-action="close" class="remodal-close"></button>
	<div class="remodal_heading">
		<h4 class="remodal_heading">Change how your wine choices for each month</h4>
		<p>Update how many white and red wines you will receive each month in your generated box.</p><br/>
		<p>You are currently on: <strong><?php echo mb_substr($wineamounts, 0, 1);?> Red, <?php echo mb_substr($wineamounts,-2,1);?> White Wines</strong></p>
	</div>
	<div class="remodal_body">
	<div id="wineselection" class="">

<div class="wineselection_holder">

<div id="wineselection_slider" class="clearfix">

<?php
if( have_rows('wine_selection_carousel',157) ):?>

<?php while ( have_rows('wine_selection_carousel',157) ) : the_row(); ?>
<div class="wineselection_item" data-wineamount="<?php the_sub_field('label_amount',157);?>">
<?php $image = get_sub_field('bottles_image',157);?>
<img src="<?php echo $image['sizes']['wine_bottles_carousel'];?>" alt="<?php echo $image['alt'];?>"/>

<div class="wineselect_label">
<p><?php the_sub_field('label_for_selection',157);?></p>
</div>

</div>
<?php endwhile; ?>
<?php endif;?>

</div>

<div class="step2_next_holder">
<form id="updateWinePreferences" name="updateWinePreferences" action="" method="post" novalidate="novalidate" enctype="multipart/form-data">

<button type="submit" id="newWineChoices" name="newwinechoice" class="primary_btn bttn">Update</button>
<?php /** this is populated via jquery for the value of what wine combination. Either 0R4W, 1R3W, 2R2W,3R1W,4R01**/?>
<input id="ws_input" type="hidden" name="ggc_step2" value="<?php the_field('wine_selection',getCurrentUserId());?>"/>
<?php the_field('wine_selection_excerpt');?>
</form>

</div>
</div>

</div>
	</div>
</div>


<div class="remodal" data-remodal-id="changeTasteProfile">
<button data-remodal-action="close" class="remodal-close"></button>
	<div class="remodal_heading">
		<h4 class="remodal_heading">Change Taste Profile</h4>
		<p>Please adjust the dial accordingly to match your desired Taste Profile. Upon saving your next box will reflect those changes.</p>
	</div>
	<form id="updateTasteProfile" name="updateTasteProfile" action="" method="post" novalidate="novalidate">
	<div class="remodal_body">
	<?php include('wp-content/themes/glugglugclub/includes/registration/profile_override.php');?>
	</div>

	<div class="remodal_footer_text text-center">
		<?php // this is the value we will save to the user and is updated?>
		<input type="hidden" id="tasteprofile_final" name="tasteprofile_final" value="<?php echo $value;?>"/>
		<a href="<?php echo site_url();?>/checkout" id="nochange" class="primary_btn bttn">Feels right</a>
		<button type="submit" id="step4btn" class="primary_btn bttn" style="display:none">Feels right</button>
	</div>
	</form>
</div>

<div class="remodal" data-remodal-id="skipSubscription">
<button data-remodal-action="close" class="remodal-close"></button>
	<div class="remodal_heading">
		<h4 class="remodal_heading">Skip a Month</h4>
		<p>Are you sure you want to skip a month? You will not be billed for the next billing cycle, and then it will automatically restart after the next cycle.</p>
		<br/>
		<p>
			<strong>
<?php

   		$day            = '17';
        $currentMonth   = date('m');
        $currentYear    = date('Y');

        $thisMonthBox = strtotime($currentYear.'-'.$currentMonth.'-'.$day);
        //this will get the current months box date. i.e 15/{currentmonth}/{currentyear}.

        $nextMonthBox = date("Y-m-d", strtotime("+1 month", $thisMonthBox));

        ?>
        Your monthly box will start again on <?php echo $nextMonthBox;?>
		</strong>
	</p>
		<form id="skipMonth" name="skipMonth" action="" method="post" novalidate="novalidate">
			<input type="hidden" name="skipmonth" value="1"/>
			<input type="hidden" name="userid_skip" value=""/>
			<input type="hidden" name="subscriptionidskip" value=""/>
			<button class="primary_btn bttn">Yes, I would like to skip my next months box</button>
		</form>
		</div>
</div>

<script type="text/javascript">
jQuery(function($) {
 	
 
	jQuery(document).on('opened', '.remodal', function () {
		
		jQuery('#wineselection_slider').slick('resize');
	})
    



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
	divWidth: 0.2
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



	var target = document.getElementById('tasteprofile_gauge_mini'); 
	var gauge = new Gauge(target).setOptions(opts); 
	gauge.maxValue = 12;
	gauge.animationSpeed = 24; 
	<?php 
	$field = get_field('customer_taste_profile_value',getCurrentUserId());?>
	gauge.set(<?php echo $field['value'];?>); 

});


jQuery(function($) {

  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery("#step4btn").click(function() { // changed   
  	//alert(rowID);
    $.ajax({
        url: ajaxurl + "?action=updateTasteProfile",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
         //alert(data);
        //successTaste.open();
        setTimeout(function(){
          window.location.href = '<?php echo site_url();?>/my-account/';
        }, 1000);

          //window.location.replace('http://'+window.location.host+'/mustardmodels');
        },
        error: function(data){
         	setTimeout(function(){
          		 window.location.href = '<?php echo site_url();?>/my-account/';
        	}, 1000);
        }

         });
    return false; // avoid to execute the actual submit of the form.
});


 jQuery("#skipMonth button").click(function() { // changed   
  	//alert(rowID);
    $.ajax({
        url: ajaxurl + "?action=skipMonth",
        type: 'post',
        data: jQuery(this).parent().serialize(), // changed
        success: function(data)
        {
         //alert(data);
        //successTaste.open();
        setTimeout(function(){
          window.location.href = '<?php echo site_url();?>/my-account/orders';
        }, 1000);

          //window.location.replace('http://'+window.location.host+'/mustardmodels');
        },
        error: function(data){
         	setTimeout(function(){
          		 window.location.href = '<?php echo site_url();?>/my-account/orders';
        	}, 1000);
        }

         });
    return false; // avoid to execute the actual submit of the form.
});



});



jQuery(function($) {

  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery("#newWineChoices").click(function() { // changed   
  	//alert(rowID);
    $.ajax({
        url: ajaxurl + "?action=updateWineChoice",
        type: 'post',
        data: jQuery(this).parent().serialize(), // changed
        success: function(data)
        {
        // alert(data);
        //successTaste.open();
        setTimeout(function(){
          window.location.href = '<?php echo site_url();?>/my-account/';
        }, 500);

          //window.location.replace('http://'+window.location.host+'/mustardmodels');
        },
        error: function(data){
        //	alert(data);
         	setTimeout(function(){
          		 window.location.href = '<?php echo site_url();?>/my-account/';
        	}, 500);
        }

         });
    return false; // avoid to execute the actual submit of the form.
});
});


</script>