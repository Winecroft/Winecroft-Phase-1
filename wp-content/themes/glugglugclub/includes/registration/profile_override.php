<?php //include('/../partials/customer_profile_dial.php');?>
<?php require dirname( __FILE__ ) . '/../partials/customer_profile_dial.php';?>
<script type="text/javascript">

  //this is the gauge meter
jQuery( document ).ready(function() {
jQuery(document).on('opened', '.remodal', function () {
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



var target = document.getElementById('tasteprofile_gauge2'); 
var gauge = new Gauge(target).setOptions(opts); 
gauge.maxValue = 12;
gauge.animationSpeed = 24; 
<?php 

$field = get_field('customer_taste_profile_value',getCurrentUserId());?>
gauge.set(<?php echo $field['value'];?>); 


  //listen for update of the original range input field, and take the value of the arai-valuenow of fd-slider to update a hidden input field to use as final
  jQuery("#profilerange").on("input change", function() {
  jQuery('#nochange').hide();
  jQuery('#step4btn').show();
  var finalValue = jQuery('.fd-slider-handle').attr('aria-valuenow');
    console.log(finalValue);
    gauge.set(finalValue);

  jQuery('#tasteprofile_final').val(finalValue);

    if (finalValue >= 0 && finalValue <= 3) {
      jQuery('.current_profile_setting strong').text('Light');
    }
    if (finalValue >= 4 && finalValue <= 9) {
      jQuery('.current_profile_setting strong').text('Medium Bodied');
    }
    if (finalValue >= 10 && finalValue <= 12) {
      jQuery('.current_profile_setting strong').text('Full Bodied');
    }


  });
   });
  });
</script>