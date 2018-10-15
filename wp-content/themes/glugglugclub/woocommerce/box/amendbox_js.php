<?php if(!is_page(19)):?>
<script type="text/javascript">
jQuery(function($) {


var instSuccess = jQuery('[data-remodal-id=boxSuccess]').remodal();
var instFailure = jQuery('[data-remodal-id=boxFailure]').remodal();

	jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
    	jQuery(this).parent().parent().hide();
    	jQuery(this).parent().parent().next().show();
    }
	});

  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery(".cart_toggle_plus").click(function() {
  //alert('test');

  	var getInput = jQuery(this).prev().find('input');
    $plus = jQuery(this);
  	//increase amount by 1
 	  getInput.get(0).value++;
    jQuery('body').toggleClass('add-overlay');

    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value--;
              //jQuery(this).parent().parent().hide();
              //jQuery(this).parent().parent().next().show();
              $plus.parent().parent().hide();
              $plus.parent().parent().next().show()
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
           // instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');	
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

        });

    jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
    	jQuery(this).parent().parent().hide();
    	jQuery(this).parent().parent().next().show();
    }
	});


    return false; // avoid to execute the actual submit of the form.

});

  jQuery(".cart_toggle_minus").click(function() {
  	//so first we update the value to be + 1
  	//jQuery(this).prev().val()+1;
  	//var thisID = jQuery(this).attr("id");
  	var getInput = jQuery(this).next().find('input');

    $minus = jQuery(this);
  	//increase amount by 1
 	getInput.get(0).value--;
  jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value++;
           // jQuery(this).parent().show();
           // jQuery(this).parent().next().hide();

            $minus.parent().show();
            $minus.parent().next().hide();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
           // instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

         });

    jQuery('.cart_toggle_amount').each(function(){
      if(jQuery(this).val() < 1) {
        //	$minus.parent().hide();
        //  $minus.parent().next().show();
      }
	   });
    
    if(getInput.val() == 0) {
      
     //$minus.parent().parent().parent().parent().find('.cart_toggle_start').show();
      //$minus.parent().parent().hide();
      $minus.parent().hide();
      $minus.parent().next().show();

    }

    return false; // avoid to execute the actual submit of the form.




});


  jQuery(".cart_toggle_start").click(function() {

    $start = jQuery(this);
  	//so first we update the value to be + 1
  	//jQuery(this).prev().val()+1;
  	//var thisID = jQuery(this).attr("id");
  	var getInput = jQuery(this).prev().find('.cart_toggle_amount');
    
  	//increase amount by 1
 	getInput.get(0).value++;
  jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value--;
            $start.prev().hide();
            $start.show();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
           // instSuccess.open();
            //jQuery(this).prev().show();
            //jQuery(this).hide();
            $start.hide();
            $start.prev().show();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

        });

    return false; // avoid to execute the actual submit of the form.

});


  jQuery(".removeCart").click(function() {

      //so first we update the value to be + 1
    //jQuery(this).prev().val()+1;
    //var thisID = jQuery(this).attr("id");
    var getInput = jQuery(this).next().find('input');

    $remove = jQuery(this);
    //increase amount by 1
  getInput.get(0).value--;
  jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value++;
           // jQuery(this).parent().show();
           // jQuery(this).parent().next().hide();

            $remove.parent().show();
            $remove.parent().next().hide();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
            //instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

         });

    jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
      //$minus.parent().hide();
      //$minus.parent().next().show();
    }
  });

    return false; // avoid to execute the actual submit of the form.

  });


});
</script>
<?php endif;?>

<div class="remodal" data-remodal-id="boxSuccess">
<button data-remodal-action="close" class="remodal-close"></button>
  <div class="remodal_heading">
    <h4 class="remodal_heading">Success!</h4>
  
  </div>
  <div class="remodal_body">
    <p>You succesfully amended your subscription box.</p>
  </div>
   <div class="remodal_footer">
          <a type="submit" class="primary_btn bttn" href="<?php echo site_url();?>/my-account/subscriptions">View my upcoming subscription box</a>
        </div>
</div>


<div class="remodal" data-remodal-id="boxFailure">
<button data-remodal-action="close" class="remodal-close"></button>
  <div class="remodal_heading">
    <h4 class="remodal_heading">Not possible</h4>
  
  </div>
  <div class="remodal_body">
    <p>You can not amend your subscription box to have less than 4 different wines.</p>
  </div>
   <div class="remodal_footer">
         <button data-remodal-action="close" class="primary_btn bttn">OK</button>
        </div>

</div>

<?php /**if(is_page(19)):?>
<script type="text/javascript">
jQuery( document ).ajaxComplete(function() {

var instSuccess = jQuery('[data-remodal-id=boxSuccess]').remodal();
var instFailure = jQuery('[data-remodal-id=boxFailure]').remodal();

  jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
      jQuery(this).parent().parent().hide();
      jQuery(this).parent().parent().next().show();
    }
  });

  var ajaxurl = '<?php echo site_url();?>/wp-admin/admin-ajax.php';
  jQuery(".cart_toggle_plus").live("click", function(){
    var getInput = jQuery(this).prev().find('input');

    //increase amount by 1
    getInput.get(0).value++;
    jQuery('body').toggleClass('add-overlay');

    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value--;
              jQuery(this).parent().parent().hide();
              jQuery(this).parent().parent().next().show();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
            //instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

        });

    jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
      jQuery(this).parent().parent().hide();
      jQuery(this).parent().parent().next().show();
    }
  });


    return false; // avoid to execute the actual submit of the form.

});

  jQuery(".cart_toggle_minus").click(function() {
    //so first we update the value to be + 1
    //jQuery(this).prev().val()+1;
    //var thisID = jQuery(this).attr("id");
    var getInput = jQuery(this).next().find('input');

    //increase amount by 1
  getInput.get(0).value--;
  jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value++;
            jQuery(this).parent().show();
            jQuery(this).parent().next().hide();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
            //instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

         });

    jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
    //  jQuery(this).parent().parent().hide();
    //  jQuery(this).parent().parent().next().show();
    }
  });

    return false; // avoid to execute the actual submit of the form.




});


  jQuery(".cart_toggle_start").click(function() {
    //so first we update the value to be + 1
    //jQuery(this).prev().val()+1;
    //var thisID = jQuery(this).attr("id");
    var getInput = jQuery(this).prev().find('.cart_toggle_amount');

    //increase amount by 1
  getInput.get(0).value++;
  jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value--;
            jQuery(this).prev().hide();
            jQuery(this).show();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
           // instSuccess.open();
            jQuery(this).prev().show();
            jQuery(this).hide();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

         });

   
   
    
    

    return false; // avoid to execute the actual submit of the form.




});


  jQuery(".removeCart").click(function() {

      //so first we update the value to be + 1
    //jQuery(this).prev().val()+1;
    //var thisID = jQuery(this).attr("id");
    var getInput = jQuery(this).next().find('input');

    //increase amount by 1
  getInput.get(0).value--;
  jQuery('body').toggleClass('add-overlay');
    $.ajax({
        url: ajaxurl + "?action=changeProductAmount",
        type: 'post',
        data: jQuery(this).parent().parent().serialize(), // changed
        success: function(data)
        {
          if (data == 0){
            //alert('You can not have less than 4 different wines in your subscription box.');
            instFailure.open();
            getInput.get(0).value++;
            jQuery(this).parent().show();
            jQuery(this).parent().next().hide();
          }
          else if (data == 1){
            //alert('You have successfully amended your subscription box');
           // instSuccess.open();
          } 
          jQuery('body').toggleClass('add-overlay');  
        },
        error: function(data){
          alert('It looks like something went wrong...try refreshing the page and try again');
          console.log("FAILURE!");
          jQuery('body').toggleClass('add-overlay');
        }

         });

    jQuery('.cart_toggle_amount').each(function(){
    if(jQuery(this).val() < 1) {
     // jQuery(this).parent().parent().hide();
     // jQuery(this).parent().parent().next().show();
    }
  });

    return false; // avoid to execute the actual submit of the form.

  });
});

</script>
<?php endif;

**/?>