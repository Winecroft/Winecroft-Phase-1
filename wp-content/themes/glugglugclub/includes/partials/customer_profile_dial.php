			<?php $field = get_field('customer_taste_profile_value',getCurrentUserId());
			$value = $field['value'];
			?>
			<canvas id="tasteprofile_gauge2"></canvas>


			<div class="taste_profile_current clearfix">

				<div class="current_profile_setting">
					<p>The wines we think you'll love are</p>
					<p><strong><?php 
			$profilevalue = get_field('customer_taste_profile_value','user_'.$current_user->ID);
			//echo $profilevalue['label'];
			echo substr($profilevalue['label'], 0, strpos($profilevalue['label'], "("));

			 ?></strong></p>
				</div>
				<div class="change_taste_profile clearfix">
					<p>Didn't quite hit the mark? Just move the slider below to adjust your Taste Profile. </p>
					<p>Dont worry, you can change it at any time, <a href="<?php echo site_url();?>/">Learn more</a> </p>
				</div>
			</div>

			<?php // this is the slider, the default value will be the value in the browser as a cookie ?>
			<input style="display:none;" name="profilerange" id="profilerange" type="range" min="0" max="12" step="1" value="<?php echo $value;?>" />