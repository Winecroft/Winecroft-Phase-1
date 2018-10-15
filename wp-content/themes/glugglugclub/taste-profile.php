<?php
/* Template Name: Taste Profile */
get_header();?>

<main class="main-page-content taste-profile-page" role="main">
<div class="woocommerce">
<?php include('woocommerce/myaccount/navigation.php');?>

<div class="woocommerce-MyAccount-content">
<div class="container clearfix">
<div id="taste_profile_results" class="col-md-8 col-xs-12">
<div class="white_box_holder">
<div class="account_form">
<h1 class="account_form_heading">Taste Profile <a href="<?php echo site_url();?>/my-account/retake-taste-test" class="pull-right primary_btn bttn">Retake Taste Test</a></h1>
<form id="ggc_step1_form" name="update_form" action="" method="post" novalidate="novalidate">
<div class="ggc_step_form_inner">
<div class="profile_answers clearfix">
<h3 class="account_form_heading">You can choose two Ice Cream Scoops</h3>
<div id="question_4" class="question_holder can-progress" style="display:block !important;">

<?php 
$user = 'user_'.get_current_user_id();
$q = get_field('ice_cream_scoop_1',$user);
$lemonchecked = '';
$peachchecked = '';
$pineapplechecked = '';
if($q == 0):
	$lemonchecked = 'checked';
elseif($q == 1):
	$peachchecked = 'checked';
elseif($q == 2):
	$pineapplechecked = 'checked';
else:
endif;


$q2 = get_field('ice_cream_scoop_2',$user);
$raspberrychecked = '';
$peachchecked = '';
$blackberrychecked = '';
if($q2 == 0):
	$raspberrychecked = 'checked';
elseif($q2 == 1):
	$blackberrychecked = 'checked';
else:
endif;
?>


<fieldset id="ggc_q4_1" class="question_responses">
<legend>Choose one of:</legend>
<input id="ggc_q4_1_r1" type="radio" value="0" name="ggc_q4_1" <?php echo $lemonchecked;?> />
<label for="ggc_q4_1_r1">Lemon</label>

<input id="ggc_q4_1_r2" type="radio" value="1" name="ggc_q4_1" <?php echo $peachchecked;?> />
<label for="ggc_q4_1_r2">Peach</label>

<input id="ggc_q4_1_r3" type="radio" value="2" name="ggc_q4_1" <?php echo $pineapplechecked;?> />
<label for="ggc_q4_1_r3">Pineapple </label>

</fieldset>

<fieldset id="ggc_q4_2" class="question_responses">
<legend>And one of:</legend>

<input id="ggc_q4_2_r1" type="radio" value="0" name="ggc_q4_2" <?php echo $raspberrychecked;?>/>
<label for="ggc_q4_2_r1">Raspberry </label>

<input id="ggc_q4_2_r2" type="radio" value="1" name="ggc_q4_2" <?php echo $blackberrychecked;?>/> 
<label for="ggc_q4_2_r2">Blackcurrant </label>

</fieldset>
</div>

<div id="question_5" class="question_holder can-progress" style="display:block !important;">
<h3 class="account_form_heading">How do you feel about these flavours?</h3>
<fieldset id="ggc_q5_1" class="question_responses">
<legend>Peppers</legend>

<select id="" name="ggc_q5_1">

<?php $peppers = get_field('peppers',$user);?>
<option value="0" <?php if($peppers == 0): echo 'selected="selected"';endif;?> >Loathe</option>
<option value="1"  <?php if($peppers == 1): echo 'selected="selected"';endif;?> >Like</option>
<option value="2"  <?php if($peppers == 2): echo 'selected="selected"';endif;?> >Love</option>
</select>

</fieldset>

<fieldset id="ggc_q5_2" class="question_responses">
<legend>Dry Toast</legend>
<?php $drytoast = get_field('dry_toast',$user);?>
<select id="" name="ggc_q5_2">

<option value="0" <?php if($drytoast == 0): echo 'selected="selected"';endif;?> >Loathe</option>
<option value="1" <?php if($drytoast == 1): echo 'selected="selected"';endif;?> >Like</option>
<option value="2" <?php if($drytoast == 2): echo 'selected="selected"';endif;?> >Love</option>
</select>
</fieldset>


<fieldset id="ggc_q5_3" class="question_responses">
<legend>Vanilla</legend>
<?php $vanilla = get_field('vanilla',$user);?>
<select id="" name="ggc_q5_3">

<option value="0"  <?php if($vanilla == 0): echo 'selected="selected"';endif;?> >Loathe</option>
<option value="1"  <?php if($vanilla == 1): echo 'selected="selected"';endif;?> >Like</option>
<option value="2"  <?php if($vanilla == 2): echo 'selected="selected"';endif;?> >Love</option>
</select>

</fieldset>


<fieldset id="ggc_q5_4" class="question_responses">
<legend>Butter</legend>
<?php $butter = get_field('butter',$user);?>
<select id="" name="ggc_q5_4">

<option value="0" <?php if($butter == 0): echo 'selected="selected"';endif;?>>Loathe</option>
<option value="1" <?php if($butter == 1): echo 'selected="selected"';endif;?>>Like</option>
<option value="2" <?php if($butter == 2): echo 'selected="selected"';endif;?>>Love</option>
</select>

</fieldset>


<fieldset id="ggc_q5_5" class="question_responses">
<legend>Marmalade</legend>
<?php $marmalade = get_field('marmalade',$user);?>
<select id="" name="ggc_q5_5">

<option value="0"  <?php if($marmalade == 0): echo 'selected="selected"';endif;?>>Loathe</option>
<option value="1"  <?php if($marmalade == 1): echo 'selected="selected"';endif;?>>Like</option>
<option value="2"  <?php if($marmalade == 2): echo 'selected="selected"';endif;?>>Love</option>
</select>

</fieldset>

<fieldset id="ggc_q5_6" class="question_responses">
<legend>Mushrooms</legend>
<?php $mushrooms = get_field('mushrooms',$user);?>
<select id="" name="ggc_q5_6">

<option value="0" <?php if($mushrooms == 0): echo 'selected="selected"';endif;?>>Loathe</option>
<option value="1" <?php if($mushrooms == 1): echo 'selected="selected"';endif;?>>Like</option>
<option value="2" <?php if($mushrooms == 2): echo 'selected="selected"';endif;?>>Love</option>
</select>

</fieldset>

<fieldset id="ggc_q5_7" class="question_responses">
<legend>Smoky Bacon Crisps</legend>
<?php $sbc = get_field('smokey_bacon_crisps',$user);?>
<select id="lastelement" name="ggc_q5_7">

<option value="0"<?php if($sbc == 0): echo 'selected="selected"';endif;?>>Loathe</option>
<option value="1"<?php if($sbc == 1): echo 'selected="selected"';endif;?>>Like</option>
<option value="2"<?php if($sbc == 2): echo 'selected="selected"';endif;?>>Love</option>
</select>

</fieldset>
<div class="step_progress_holder_2">
<button id="step1btn" type="submit" name="ggcstep1button" class="updateTasteTest primary_btn bttn">Update Answers</button>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>

<?php include('woocommerce/myaccount/account-mini-profile.php');?>
</div>
</div>
</div>
</main>
<script type="text/javascript">
jQuery(function($) {
  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery("#step1btn").click(function() { // changed   
  	//alert(rowID);
    jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=ggc_updateQ4_5",
        type: 'post',
        data: jQuery(this).parent().parent().parent().parent().parent().serialize(), // changed
        success: function(data)
        {
          jQuery('body').toggleClass('add-overlay');
          setTimeout(function(){
          window.location.href = '<?php echo site_url();?>/my-account/taste-profile';
        }, 100);

          //window.location.replace('http://'+window.location.host+'/mustardmodels');
        },
        error: function(data){
          console.log("FAILURE!");
          alert('It looks like something went wrong, please try again');
        }

         });
    return false; // avoid to execute the actual submit of the form.
});
});
</script>

<?php get_footer();?>