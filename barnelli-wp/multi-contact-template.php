<?php
/*
Template Name: Contact - Multiple
*/
?>
<?php get_header(); ?>
<?php 
	global $post;
	if ( is_page() && $post->post_parent ) {
		$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));
	} else {
		$wrapperClass = str_replace(" ", "-", get_the_title());
	}

	$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);
	$tmp = YSettings::g('multiple_contact_locations', '1');
	$locations = explode("|", $tmp);

	$mapLocations = array();

	foreach ($locations as $key => $value) {
		$image = YSettings::g("multiple_contact_map_marker_image_".$value);
		$mapLocations[] = array(
			'uuid' => $value,
			'lat' => YSettings::g("multiple_contact_map_lat_".$value),
			'lng' => YSettings::g("multiple_contact_map_lng_".$value),
			'marker' => ($image == '') ? false : $image,
			'markerHeight' => YSettings::g("multiple_contact_marker_height_".$value, 0),
			'markerWidth' => YSettings::g("multiple_contact_marker_width_".$value, 0),
			'header' => YSettings::g("multiple_contact_address_header_".$value),
			'address' => YSettings::g("multiple_contact_address_".$value)
		);
	}
	?>
	<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper container" id="main-content">
		<section id="contact" class="padding-wrapper">
			<?php if (YSettings::g("multiple_contact_disable_map", "0") == "0") : ?>
			<div id="map" class="map" style="height:<?php echo YSettings::g('multiple_contact_map_height', 300); ?>px !important;"></div>
			<script>
				var mapLocations = <?php echo json_encode(array('locations' => $mapLocations)); ?>;

				function initializeMap() {
					var options = {
						mapTypeId: 'roadmap'
					};

					var map = new google.maps.Map(document.getElementById("map"), options);

					var latLngBounds = new google.maps.LatLngBounds();

					for (var i=0; i <= mapLocations.locations.length; i++) {
						if (mapLocations.locations[i]) {
							var value = mapLocations.locations[i];

							var markerImage = value.marker;
							var latLng = new google.maps.LatLng(value.lat, value.lng);

							latLngBounds.extend(latLng);

							var options = {
								position: latLng,
								title: value.header,
								map: map,
								draggable: false
							};

							if (markerImage) {
								var markerWidth = parseInt(value.markerWidth, 10);
								var markerHeight = parseInt(value.markerHeight, 10);
								options.icon = { url: markerImage, origin: new google.maps.Point(0, 0), anchor: new google.maps.Point(2 + parseInt(markerWidth/2, 10), parseInt(markerHeight, 10) - 5) };
							}

							var marker = new google.maps.Marker(options);
						}
					}

					map.setCenter(latLngBounds.getCenter());
					map.fitBounds(latLngBounds);					
				}
			</script>
			<?php endif; ?>
			<?php
			$counter = 0;
			?>
				<div class="row">
					<?php if (YSettings::g('multiple_contact_order', 'form') == 'form') : ?>

					<?php if (YSettings::g('multiple_contact_form_enabled', '1') == '1') : ?>
					<?php barnelli_contactForm(); ?>
					<?php $counter++ ?>
					<?php endif; ?>

					<?php if (YSettings::g('multiple_contact_info_display', '1') == '1') : ?>
					<?php barnelli_contactInfo(); ?>
					<?php $counter++ ?>
					<?php endif; ?>

					<?php else: ?>

					<?php if (YSettings::g('multiple_contact_info_display', '1') == '1') : ?>
					<?php barnelli_contactInfo(); ?>
					<?php $counter++ ?>
					<?php endif; ?>

					<?php if (YSettings::g('multiple_contact_form_enabled', '1') == '1') : ?>
					<?php barnelli_contactForm(); ?>
					<?php $counter++ ?>
					<?php endif; ?>

					<?php endif; ?>

					<?php if (YSettings::g('multiple_contact_display_contact', '1') == '1') : ?>
					<?php foreach ($mapLocations as $location): ?>
					<?php barnelli_addressInfo($location); ?>
					<?php $counter++ ?>

					<?php if ($counter%3 == 0) : ?>
						</div><br/><div class="row">
					<?php endif; ?>

					<?php endforeach; ?>
					<?php endif; ?>
			</div>
		</section>
		<?php get_template_part('content', 'pagefooter'); ?>
	</div>
<?php get_footer(); ?>