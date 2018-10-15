
<form id="ggc_step1_form" name="ggc_step1_form" action="" method="post" novalidate="novalidate" id="register_step1">
<div class="ggc_step_form_inner">
<div id="question_1" class="question_holder" style="display:block;">

<figure class="question_image">
	<span class="banner_gradient">
		<?php $image1 = get_field('image_1');?>
		<img src="<?php echo $image1['sizes']['step1_question'];?>" alt="<?php echo $image1['alt'];?>"/>
	</span>
<figcaption>Favourite hot drink?</figcaption>
</figure>

<fieldset id="ggc_q1" class="question_responses">
<input id="ggc_q1_r1" type="radio" value="0" name="ggc_q1"/>
<label for="ggc_q1_r1">Tea with milk and sugar, or hot chocolate?</label>

<input id="ggc_q1_r2" type="radio" value="1" name="ggc_q1"/>
<label for="ggc_q1_r2">Tea with milk or fruit tea</label>

<input id="ggc_q1_r3" type="radio" value="2" name="ggc_q1"/>
<label for="ggc_q1_r3">Coffee with milk and sugar, green tea, or black tea </label>

<input id="ggc_q1_r4" type="radio" value="3" name="ggc_q1"/>
<label for="ggc_q1_r4">Coffee with milk or black coffee with sugar</label>

<input id="ggc_q1_r5" type="radio" value="4" name="ggc_q1"/>
<label for="ggc_q1_r5">Black coffee or Espresso with no sugar</label>
</fieldset>
<div class="step_progress_holder">
<?php require dirname( __FILE__ ) . '/steps_numbers.php';?>
<div class="pull-right">
<a href="#question_2" class="primary_btn bttn questionstep_btn disabled">Next Question</a>
</div>
</div>
</div>

<div id="question_2" class="question_holder">

<figure class="question_image">
<span class="banner_gradient">
		<?php $image2 = get_field('image_2');?>
		<img src="<?php echo $image2['sizes']['step1_question'];?>" alt="<?php echo $image2['alt'];?>"/>
	</span>
<figcaption>Whats your take on salt?</figcaption>
</figure>

<fieldset id="ggc_q2" class="question_responses">
<input id="ggc_q2_r1" type="radio" value="0" name="ggc_q2"/>
<label for="ggc_q2_r1">I add a lot to my food</label>

<input id="ggc_q2_r2" type="radio" value="1" name="ggc_q2"/>
<label for="ggc_q2_r2">I add some to my food </label>

<input id="ggc_q2_r3" type="radio" value="2" name="ggc_q2"/>
<label for="ggc_q2_r3">I cook with it, but rarely add more at the table </label>

<input id="ggc_q2_r4" type="radio" value="3" name="ggc_q2"/>
<label for="ggc_q2_r4">I can take it or leave it </label>

<input id="ggc_q2_r5" type="radio" value="4" name="ggc_q2"/>
<label for="ggc_q2_r5">I rarely use it</label>
</fieldset>
<div class="step_progress_holder">
<?php require dirname( __FILE__ ) . '/steps_numbers.php';?>
<div class="buttons_row pull-right clearfix">
<a href="#question_1" class="hollow_primary_btn bttn">Previous Question</a>
<a href="#question_3" class="primary_btn bttn disabled">Next Question</a>
</div>
</div>
</div>

<div id="question_3" class="question_holder">

<figure class="question_image">
<span class="banner_gradient">
		<?php $image3 = get_field('image_3');?>
		<img src="<?php echo $image3['sizes']['step1_question'];?>" alt="<?php echo $image3['alt'];?>"/>
	</span>
<figcaption>Where do you stand on artificial sweeteners in soft drinks?</figcaption>
</figure>

<fieldset id="ggc_q3" class="question_responses">

<input id="ggc_q3_r1" type="radio" value="0" name="ggc_q3"/>
<label for="ggc_q3_r1">They make the drink taste very bitter </label>

<input id="ggc_q3_r2" type="radio" value="1" name="ggc_q3"/>
<label for="ggc_q3_r2">I can taste the difference compared to regular soft drinks and i'm not a fan</label>

<input id="ggc_q3_r3" type="radio" value="2" name="ggc_q3"/>
<label for="ggc_q3_r3">Tastes a bit odd but not too bad</label>

<input id="ggc_q3_r4" type="radio" value="3" name="ggc_q3"/>
<label for="ggc_q3_r4">I don't mind them at all </label>

<input id="ggc_q3_r5" type="radio" value="4" name="ggc_q3"/>
<label for="ggc_q3_r5">I prefer the taste compared to regular soft drinks </label>
</fieldset>
<div class="step_progress_holder">
<?php require dirname( __FILE__ ) . '/steps_numbers.php';?>
<div class="buttons_row pull-right clearfix">
<a href="#question_2" class="hollow_primary_btn bttn">Previous Question</a>
<a href="#question_4" class="primary_btn bttn disabled">Next Question</a>
</div>
</div>
</div>


<div id="question_4" class="question_holder">

<figure class="question_image">
<span class="banner_gradient">
		<?php $image4 = get_field('image_4');?>
		<img src="<?php echo $image4['sizes']['step1_question'];?>" alt="<?php echo $image4['alt'];?>"/>
	</span>
<figcaption>You're allowed two scoops of ice cream...</figcaption>
</figure>

<fieldset id="ggc_q4_1" class="question_responses">
<legend>Choose one of:</legend>
<input id="ggc_q4_1_r1" type="radio" value="0" name="ggc_q4_1"/>
<label for="ggc_q4_1_r1">Lemon</label>

<input id="ggc_q4_1_r2" type="radio" value="1" name="ggc_q4_1"/>
<label for="ggc_q4_1_r2">Peach</label>

<input id="ggc_q4_1_r3" type="radio" value="2" name="ggc_q4_1"/>
<label for="ggc_q4_1_r3">Pineapple </label>

</fieldset>

<fieldset id="ggc_q4_2" class="question_responses">
<legend>And one of:</legend>

<input id="ggc_q4_2_r1" type="radio" value="0" name="ggc_q4_2"/>
<label for="ggc_q4_2_r1">Raspberry </label>

<input id="ggc_q4_2_r2" type="radio" value="1" name="ggc_q4_2"/> 
<label for="ggc_q4_2_r2">Blackcurrant </label>


</fieldset>
<div class="step_progress_holder">
<?php require dirname( __FILE__ ) . '/steps_numbers.php';?>
<div class="buttons_row pull-right clearfix">
<a href="#question_3" class="hollow_primary_btn bttn">Previous Question</a>
<a href="#question_5" class="primary_btn bttn disabled">Next Question</a>
</div>
</div>
</div>

<div id="question_5" class="question_holder">

<figure class="question_image">
<span class="banner_gradient">
    <?php $image5 = get_field('image_5');?>
    <img src="<?php echo $image5['sizes']['step1_question'];?>" alt="<?php echo $image5['alt'];?>"/>
  </span>
<figcaption>And finally, tell us how you feel about these flavours?</figcaption>
</figure>

<fieldset id="ggc_q5_1" class="question_responses">
<legend>Peppers</legend>

<select id="" name="ggc_q5_1">
<option value="9" data-display="Choose...">Choose...</option>
<option value="0">Loathe</option>
<option value="1">Like</option>
<option value="2">Love</option>
</select>

<!--
<input id="ggc_q5_1_r1" type="radio" value="0" name="ggc_q5_1"/> <?php /** 0 = loathe**/ ?>
<label for="ggc_q5_1_r1">Loathe</label>

<input id="ggc_q5_1_r2" type="radio" value="1" name="ggc_q5_1"/> <?php /** 1 = like **/ ?>
<label for="ggc_q5_1_r2">Like</label>


<input id="ggc_q5_1_r3" type="radio" value="2" name="ggc_q5_1"/> <?php /** 2 = love **/ ?>
<label for="ggc_q5_1_r3">Love</label>
-->
</fieldset>

<fieldset id="ggc_q5_2" class="question_responses">
<legend>Dry Toast</legend>

<select id="" name="ggc_q5_2">
<option value="9" data-display="Choose...">Choose...</option>
<option value="0">Loathe</option>
<option value="1">Like</option>
<option value="2">Love</option>
</select>

<!--
<input id="ggc_q5_2_r1" type="radio" value="0" name="ggc_q5_2"/> <?php /** 0 = loathe**/ ?>
<label for="ggc_q5_2_r1">Loathe</label>

<input id="ggc_q5_2_r2" type="radio" value="1" name="ggc_q5_2"/> <?php /** 1 = like **/ ?>
<label for="ggc_q5_2_r2">Like</label>


<input id="ggc_q5_2_r3" type="radio" value="2" name="ggc_q5_2"/> <?php /** 2 = love **/ ?>
<label for="ggc_q5_2_r3">Love</label>
-->
</fieldset>


<fieldset id="ggc_q5_3" class="question_responses">
<legend>Vanilla</legend>

<select id="" name="ggc_q5_3">
<option value="9" data-display="Choose...">Choose...</option>
<option value="0">Loathe</option>
<option value="1">Like</option>
<option value="2">Love</option>
</select>
<!--
<input id="ggc_q5_3_r1" type="radio" value="0" name="ggc_q5_3"/> <?php /** 0 = loathe**/ ?>
<label for="ggc_q5_3_r1">Loathe</label>

<input id="ggc_q5_3_r2" type="radio" value="1" name="ggc_q5_3"/> <?php /** 1 = like **/ ?>
<label for="ggc_q5_3_r2">Like</label>


<input id="ggc_q5_3_r3" type="radio" value="2" name="ggc_q5_3"/> <?php /** 2 = love **/ ?>
<label for="ggc_q5_3_r3">Love</label>
-->
</fieldset>


<fieldset id="ggc_q5_4" class="question_responses">
<legend>Butter</legend>

<select id="" name="ggc_q5_4">
<option value="9" data-display="Choose...">Choose...</option>
<option value="0">Loathe</option>
<option value="1">Like</option>
<option value="2">Love</option>
</select>



<!--
<input id="ggc_q5_4_r1" type="radio" value="0" name="ggc_q5_4"/> <?php /** 0 = loathe**/ ?>
<label for="ggc_q5_4_r1">Loathe</label>

<input id="ggc_q5_4_r2" type="radio" value="1" name="ggc_q5_4"/> <?php /** 1 = like **/ ?>
<label for="ggc_q5_4_r2">Like</label>


<input id="ggc_q5_4_r3" type="radio" value="2" name="ggc_q5_4"/> <?php /** 2 = love **/ ?>
<label for="ggc_q5_4_r3">Love</label>
-->
</fieldset>


<fieldset id="ggc_q5_5" class="question_responses">
<legend>Marmalade</legend>

<select id="" name="ggc_q5_5">
<option value="9" data-display="Choose...">Choose...</option>
<option value="0">Loathe</option>
<option value="1">Like</option>
<option value="2">Love</option>
</select>

<!--
<input id="ggc_q5_5_r1" type="radio" value="0" name="ggc_q5_5"/> <?php /** 0 = loathe**/ ?>
<label for="ggc_q5_5_r1">Loathe</label>

<input id="ggc_q5_5_r2" type="radio" value="1" name="ggc_q5_5"/> <?php /** 1 = like **/ ?>
<label for="ggc_q5_5_r2">Like</label>


<input id="ggc_q5_5_r3" type="radio" value="2" name="ggc_q5_5"/> <?php /** 2 = love **/ ?>
<label for="ggc_q5_5_r3">Love</label>
-->
</fieldset>

<fieldset id="ggc_q5_6" class="question_responses">
<legend>Mushrooms</legend>


<select id="" name="ggc_q5_6">
<option value="9" data-display="Choose...">Choose...</option>
<option value="0">Loathe</option>
<option value="1">Like</option>
<option value="2">Love</option>
</select>

<!--
<input id="ggc_q5_6_r1" type="radio" value="0" name="ggc_q5_6"/> <?php /** 0 = loathe**/ ?>
<label for="ggc_q5_6_r1">Loathe</label>

<input id="ggc_q5_6_r2" type="radio" value="1" name="ggc_q5_6"/> <?php /** 1 = like **/ ?>
<label for="ggc_q5_6_r2">Like</label>


<input id="ggc_q5_6_r3" type="radio" value="2" name="ggc_q5_6"/> <?php /** 2 = love **/ ?>
<label for="ggc_q5_6_r3">Love</label>
-->
</fieldset> 

<fieldset id="ggc_q5_7" class="question_responses">
<legend>Smoky Bacon Crisps</legend>

<select id="lastelement" name="ggc_q5_7">
<option value="9" data-display="Choose...">Choose...</option>
<option value="0">Loathe</option>
<option value="1">Like</option>
<option value="2">Love</option>
</select>
<!--
<input id="ggc_q5_7_r1" type="radio" value="0" name="ggc_q5_7"/> <?php /** 0 = loathe**/ ?>
<label for="ggc_q5_7_r1">Loathe</label>

<input id="ggc_q5_7_r2" type="radio" value="1" name="ggc_q5_7"/> <?php /** 1 = like **/ ?>
<label for="ggc_q5_7_r2">Like</label>


<input id="ggc_q5_7_r3" type="radio" value="2" name="ggc_q5_7"/> <?php /** 2 = love **/ ?>
<label for="ggc_q5_7_r3">Love</label>
-->
</fieldset>
<div class="step_progress_holder">
<?php 
//is retake test page
if(!is_page(898)):?>
<?php require dirname( __FILE__ ) . '/steps_numbers.php';?>
<?php endif;?>
<div class="buttons_row pull-right clearfix">
<a href="#question_4" class="hollow_primary_btn bttn">Previous Question</a>
<?php 
//is retake test page
if(is_page(898)):?>
<button id="step1btn" type="submit" name="ggcstep1button" class="primary_btn bttn disabled">Update Profile</button>
<?php else:?>
<button id="step1btn" type="submit" name="ggcstep1button" class="primary_btn bttn disabled">Next Step</button>
<?php endif;?>
</div>
</div>
</div>





</div>
</form>

<script type="text/javascript">
jQuery( document ).ready(function() {
	jQuery( "#lastelement" ).change(function() {
	//  jQuery('#step1btn').removeClass('disabled');
	});
});

jQuery(window).load(function(){
    jQuery('body').backDetect(function(){
	  // Callback function
      alert("Look forward to the future, not the past!");
    });
});
</script> 