<div class="remodal" data-remodal-id="profileconfirm">
	<div class="remodal_header">
		<h4>Your unique Winecroft Taste Profile</h4>
	</div>
	<div class="remodal_intro_text">
		<p>Using your taste preferences, we’ll recommend 4 superb new wines to try every month</p>
	</div>
	<form id="ggc_step4_form" name="ggc_step4_form" action="" method="post" novalidate="novalidate" autocomplete="off">
		<div class="remodal_body">

			<?php //include('customer_profile_dial.php');?>
<?php require dirname( __FILE__ ) . '/customer_profile_dial.php';?>
<?php /**moved to partial
			<?php $field = get_field('customer_taste_profile_value',getCurrentUserId());
			$value = $field['value'];
			?>
			<canvas id="tasteprofile_gauge"></canvas>


			<div class="taste_profile_current clearfix">

				<div class="current_profile_setting">
					<p>Your taste profile is</p>
					<p><strong><?php $profilevalue = get_field('customer_taste_profile_value','user_'.$current_user->ID); echo $profilevalue['label'];?></strong></p>
				</div>
				<div class="change_taste_profile clearfix">
					<p>Didn't hit the mark? Adjust the slider below to set your desired taste profile.</p>
					<p>Don't worry, you can change that later</p>
				</div>
			</div>

			<?php // this is the slider, the default value will be the value in the browser as a cookie ?>
			<input style="display:none;" name="profilerange" id="profilerange" type="range" min="0" max="12" step="1" value="<?php echo $value;?>" />
**/?>
		</div>
		<div class="remodal_footer_text text-center">
			<?php // this is the value we will save to the user and is updated?>
			<input type="hidden" id="tasteprofile_final" name="tasteprofile_final" value="<?php echo $value;?>"/>
			<a href="<?php echo site_url();?>/checkout/#wineSelection" id="nochange" class="primary_btn bttn">Feels Right</a>
			<button type="submit" id="step4btn" class="primary_btn bttn" style="display:none">Feels Right</button>
		</div>
	</form>
</div>

<script type="text/javascript">
jQuery(function($) {


  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery("#step4btn").click(function() { // changed   
  	//alert(rowID);
    $.ajax({
        url: ajaxurl + "?action=ggc_step4",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          //alert('success');
          jQuery('body').toggleClass('add-overlay');
		//they subscribed
		
        setTimeout(function(){
          window.location.href = '<?php echo site_url();?>/checkout/#wineSelection';
        }, 1000);

          //window.location.replace('http://'+window.location.host+'/mustardmodels');
        },
        error: function(data){
        //console.log("FAILURE!");
        }

         });
    return false; // avoid to execute the actual submit of the form.
});
});
</script>