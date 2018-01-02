<style>
	#yocalendar-admin  input								{ -webkit-border-radius: 3px; border-radius: 3px; border-width: 1px;
															border-style: solid; border-color: #dfdfdf; }
	#yocalendar-admin .image-preview						{ margin-top: 5px; padding: 5px;  background: #fff}
	#yocalendar-admin .image-preview img					{ width: 100%;  }
	#yocalendar-admin .nonactive							{ display:none }
	
	#yocalendar-eventposter-label							{ width: 120px; display: inline-block; }
	
	#yocalendar-admin > div									{ padding-top: 5px}
	
	#yocalendar-admin  textarea							{ width: 170px; height: 40px; 
															-webkit-transition: all 0.4s ease-out;
															-moz-transition: all 0.4s ease-out;
															-o-transition: all 0.4s ease-out;
															transition: all 0.4s ease-out }
	
	#yocalendar-admin  .textareaactive						{ width: 260px; height: 200px; }
	#yocalendar_payment_button								{ margin: 10px 0 5px; }
</style>

<div id="yocalendar-admin">
	<div>
		<label><?php _e('Event start date:', THEME_NAME);?></label>
		<input name="event_start_date" id="event_start_date_input" value="<?php echo $eventStartDate; ?>" />		
	</div>

	<div>
		<label><?php _e('Event end date:', THEME_NAME);?></label>
		<input name="event_end_date" id="event_end_date_input" value="<?php echo $eventEndDate; ?>" />
	</div>
	
	
	<div>
		<label><?php _e('Event start time', THEME_NAME);?></label>
		<input name="event_start_time" id="event_start_time" value="<?php echo $eventStartTime; ?>"/>
	</div>
	
	<div>
		<label><?php _e('Event end time', THEME_NAME);?></label>
		<input name="event_end_time" id="event_end_time"  value="<?php echo $eventEndTime; ?>"/>
	</div>
	
	<div>
		
	<div>
		<label><?php _e('Event venue', THEME_NAME);?></label>
		<input name="event_venue" id="event_venue" value="<?php echo $eventVenue; ?>"/>
	</div>
	
	<div>
		<label><?php _e('Event location', THEME_NAME);?></label>
		<input name="event_location" id="event_location" value="<?php echo $eventLocation; ?>"/>
	</div>
		<label><?php _e('Event price', THEME_NAME);?></label>
		<input name="event_price" id="event_price"  value="<?php echo $eventPrice; ?>"/>
	</div>
	
	<div>
		<label><?php _e('External link label: (optional)', THEME_NAME);?></label>
		<input name="event_external_link_label" id="event_external_link_label" value="<?php echo $eventExternalLinkLabel; ?>" />
	</div>
	
	<div>
		<label><?php _e('External link: (optional)', THEME_NAME);?></label>
		<input name="event_external_link" id="event_external_link" value="<?php echo $eventExternalLink; ?>" />
	</div>

	<div>
		<label><?php _e('Payment link label: (optional)', THEME_NAME);?></label>
		<input name="event_payment_link_label" id="event_payment_link_label" class="add-payment-shortcode" value="<?php echo $eventPaymentLinkLabel; ?>" />
	</div>
	
	<div>
		<label><?php _e('Payment link: (optional)', THEME_NAME);?></label>
		<input name="event_payment_link" id="event_payment_link" class="add-payment-shortcode" value="<?php echo $eventPaymentLink; ?>" />
	</div>

<!--	<div>
		<label for="event_promote"><?php _e('Promote event', THEME_NAME);?></label>
		<input type="checkbox" name="event_promote" id="" value="0" checked="checked" style="display:none"/>
		<input type="checkbox" name="event_promote" id="event_promote" value="1" <?php checked($eventPromote, 1);?>/>
	</div>-->
	<!--
	<?php
		$display = 'none;';	
		if (isset($eventRepeat) && $eventRepeat == '1') { $display = 'block;'; }
	?>
	<div id="repeat-box" style="display:<?php echo $display;?>;">
		<label><?php _e('Repeat period', THEME_NAME);?></label>
		
		<select id="repeat-period" name="repeat_period">
			<option value="day" <?php selected($eventRepeatPeriod, 'day', true); ?>><?php _e('daily', THEME_NAME);?></option>
			<option value="week" <?php selected($eventRepeatPeriod, 'week', true); ?>><?php _e('weekly', THEME_NAME);?></option>
			<option value="month" <?php selected($eventRepeatPeriod, 'month', true); ?>><?php _e('monthly', THEME_NAME);?></option>
		</select>
	</div>-->
	<hr/>
	<label id="yocalendar-eventposter-label"><?php _e('Event Poster:', THEME_NAME);?></label>
	<?php 
	wp_enqueue_script('image-upload', THEME_DIR_URI . '/yopress/core/components/uploader/yopressUploader.js', array('jquery'));
	?>
	<input class="uploadinput-2" type="text" size="20" name="event_poster_image" id="event_poster_image" value="<?php echo $eventPosterImage;?>" style="">
	<input id="upload_image_button" class="button button-primary upload_image_button" type="button" value="Upload" data-id="2">
	<input class="button button-primary upload_image_remove_button" type="button" value="Remove" data-id="2">
	<div class="image-preview <?php if($eventPosterImage == '') echo 'nonactive';?>">
		<img id="image_upload_preview" src="<?php echo $eventPosterImage;?>"/>
	</div>
</div>

<script type="text/javascript">
	window.onload = function() {
		jQuery('#event_erepeat').on('click', function() {
			jQuery('#repeat-box').toggle('slow', function() {

			});
		});

		jQuery('#event_additional_info').on('click', function() {
			jQuery(this).addClass('textareaactive');
		});

		jQuery('#event_additional_info').on('blur', function() {
			jQuery(this).removeClass('textareaactive');
		});

		jQuery("#event_start_date_input").datepicker({
			dateFormat: 'dd/mm/yy',
			onClose: function(selectedDate) {
				jQuery('#event_end_date_input').datepicker('option', 'minDate', selectedDate);
			}
		});

		jQuery("#event_end_date_input").datepicker({
			dateFormat: 'dd/mm/yy',
			onClose: function(selectedDate) {
				jQuery('#event_start_date_input').datepicker('option', 'maxDate', selectedDate);
			}
		});
	};
</script>