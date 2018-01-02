<?php

require_once '../../../../wp-config.php';
$form = new YoPressFormModel();

?>
<html>
	<head>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="<?php echo home_url();?>/wp-includes/js/jquery/jquery.js"></script>
		<script type="text/javascript" src="<?php echo home_url();?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
		<link rel="stylesheet" href="<?php echo YoPressBase::instance()->getCoreUrl();?>/admin/css/popups.css">
		<script type="text/javascript"> 

		function insertButton() {
			var lat, lng, zoom;

				lat = document.getElementById('contact_address_lat').value;
				lng = document.getElementById('contact_address_lng').value;
				zoom = document.getElementById('contact_address_zoom').value;

				tinyMCEPopup.editor.execCommand('mceInsertContent', false, '[gmap lat="'+lat+'" long="'+lng+'" zoom="'+zoom+'"][/gmap]');
				closeDialog();
		}

		function closeDialog() {
			tinyMCEPopup.close();
		}

		/* map */
		var geocoder = new google.maps.Geocoder();
		var map = null;
		var marker = null;

		window.onload = function() {
			latLng = new google.maps.LatLng(<?php echo $form->fieldValue('yopress_contact_address_lat', '0'); ?>, <?php echo $form->fieldValue('yopress_contact_address_lng', '0'); ?> );
			zoomLevel = <?php echo $form->fieldValue('yopress_contact_address_zoom', '0'); ?>;
			initialize();
		}

		function geocodePosition(pos) {
			geocoder.geocode({
				latLng: pos
			}, function(responses) {
				if (responses && responses.length > 0) {
					updateMarkerAddress(responses[0].formatted_address);
				} else {
					updateMarkerAddress('');
					//map.setZoom(1);
				}
			});
		}

		function updateMarkerPosition(latLng) {
			jQuery('#contact_address_lat').val(latLng.lat());
			jQuery('#contact_address_lng').val(latLng.lng());
			jQuery('#contact_address_zoom').val(map.getZoom());
			jQuery('.gmap-shordcode').html('[gmap lat="'+latLng.lat()+'" long="'+latLng.lng()+'" zoom="'+map.getZoom()+'"][/gmap]');
		}

		function updateMarkerAddress(str) {
			jQuery('#contact_address').val(str);
		}

		function updateZoomLevel(zoomLevel) {
			jQuery('.gmap-shordcode').html('[gmap lat="'+jQuery('#contact_address_lat').val()+'" long="'+jQuery('#contact_address_lng').val()+'" zoom="'+zoomLevel+'"][/gmap]');
		}

		function moveMarker(map, marker, location) {
			marker.setPosition(new google.maps.LatLng(location.lat(), location.lng()));
			map.panTo(new google.maps.LatLng(location.lat(), location.lng()));
		}

		function initialize() {
			map = new google.maps.Map(document.getElementById('map_canvas'), {
				zoom: zoomLevel,
				center: latLng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
		
			marker = new google.maps.Marker({
				position: latLng,
				title: 'Location',
				map: map,
				draggable: true
			});
		
			updateMarkerPosition(latLng);
			geocodePosition(latLng);
		
			// Zoom change event listener
			google.maps.event.addListener(map, 'zoom_changed', function() {
				zoomLevel = map.getZoom();
				updateZoomLevel(zoomLevel);
			});
		
			// Add dragging event listeners.
			google.maps.event.addListener(marker, 'dragstart', function() {
				updateMarkerAddress('Dragging...');
			});
		
			google.maps.event.addListener(marker, 'drag', function() {
				updateMarkerAddress('Dragging...');
				updateMarkerPosition(marker.getPosition());
			});
		
			google.maps.event.addListener(marker, 'dragend', function() {
				updateMarkerAddress('Drag ended');
				geocodePosition(marker.getPosition());
			});
		}

		jQuery('#locate_button').live('click', function(e) {
			e.preventDefault();
			var geocoder = new google.maps.Geocoder();
			var address = jQuery('#contact_address').val();
		
			geocoder.geocode({
				'address': address
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();
					updateMarkerPosition(results[0].geometry.location);
					moveMarker(map, marker, results[0].geometry.location);
				}
			});
		});
		</script>
	</head>
<body>
	<div class="custm-tab">
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<td colspan="2">
						<h2>Contact Map Location</h2>
						<p class="desc-text">In this section you can set one's company location on a map (the map is shown when using our custom contact-page template).</p>
					</td>
				</tr>

				<tr valign="top">
					<td>
						<label for="contact_address">One's company address</label>
					</td>
					<td>
						<input id="contact_address" type="text" style="width:340px" name="<?php echo $form->fieldName('yopress_contact_address'); ?>" value="<?php echo $form->fieldValue('yopress_contact_address'); ?>" />

						<input id="contact_address_lat" type="hidden" name="<?php echo $form->fieldName('yopress_contact_address_lat'); ?>" value="<?php echo $form->fieldValue('yopress_contact_address_lat'); ?>" />

						<input id="contact_address_lng" type="hidden" name="<?php echo $form->fieldName('yopress_contact_address_lng'); ?>" value="<?php echo $form->fieldValue('yopress_contact_address_lng'); ?>" />

						<input id="contact_address_zoom" type="hidden" name="<?php echo $form->fieldName('yopress_contact_address_zoom'); ?>" value="<?php echo $form->fieldValue('yopress_contact_address_zoom'); ?>" />

						<input type="submit" id="locate_button" class="button button-primary" value="Locate">

						<?php if ($form->fieldValue('yopress_contact_address_lat') != '' && $form->fieldValue('yopress_contact_address_lng') != ''): ?>
						<p class="update-nag gmap-shordcode" style="margin-left:0; width:402px">[gmap lat="<?php echo $form->fieldValue('yopress_contact_address_lat');?>" long="<?php echo $form->fieldValue('yopress_contact_address_lng'); ?>" zoom="<?php echo $form->fieldValue('zoom'); ?>"][/gmap]</p>
						<?php endif; ?>

						<div class="welcome-panel panel-custom">
							<div id="map_canvas" style="width: 390px; height:300px"></div>
						</div>
					</td>
				</tr>

				<tr>
					<td>
					</td>
						<td>
							<input type="button" class="button-primary" name="insert" value="Insert" title="Insert" onclick="insertButton();">
							<input type="button" class="button-primary" name="cancel" value="Cancel" title="Close" onclick="closeDialog();">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>