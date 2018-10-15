<?php require dirname( __FILE__ ) . '/step_promo.php';?>

<div class="container clearfix">

<?php //include('questions/questions_form.php');?>
<?php require dirname( __FILE__ ) . '/questions/questions_form.php';?>
</div>

<?php /**
//@TODO . To make this template reusable for when updating profile, maybe include different script below based on what they URL they are on? Either: Step1 they are registering, or Taste Profile then another function...simply make the action a dynamic variable
**/?>

<?php 
// if we are on 898 (retake test) then we save the values instead. Else we continue as normal
if(is_page(898)):?>
<script type="text/javascript">
jQuery(function($) {
  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery("#step1btn").click(function() { // changed   
  	//alert(rowID);
    jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=ggc_step1_retake",
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
<?php else:?>
<script type="text/javascript">
jQuery(function($) {
  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery("#step1btn").click(function() { // changed   
    //alert(rowID);
    jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=ggc_step1",
        type: 'post',
        data: jQuery(this).parent().parent().parent().parent().parent().serialize(), // changed
        success: function(data)
        {
          jQuery('body').toggleClass('add-overlay');
          setTimeout(function(){
          window.location.href = '<?php echo site_url();?>/getting-started/step-2';
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
<?php endif;?>