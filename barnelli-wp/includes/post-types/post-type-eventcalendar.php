<?php
// Event calendar post type
add_action('init', 'barnelli_registerEventPostType');
add_action('admin_init', 'barnelli_registerEventCustomMetaBox');
add_action('save_post', 'barnelli_saveEventDetails');

function barnelli_registerEventPostType() {
	$labels = array(
		'name' => _x('Events', 'post type general name', THEME_NAME),
		'singular_name' => _x('Event', 'post type singular name', THEME_NAME),
		'add_new' => _x('Add New', 'Event', THEME_NAME),
		'add_new_item' => __('Add New Event', THEME_NAME),
		'edit_item' => __('Edit Event', THEME_NAME),
		'new_item' => __('New Event', THEME_NAME),
		'view_item' => __('View Events',THEME_NAME),
		'search_items' => __('Search Events', THEME_NAME),
		'not_found' => __('Nothing found', THEME_NAME),
		'not_found_in_trash' => __('Nothing found in Trash', THEME_NAME),
		'parent_item_colon' => '',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug'=>'calendar'),
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'comments')
	);

	register_post_type('eventcalendar', $args);
}

function barnelli_registerEventCustomMetaBox() {
	add_meta_box("event_date-meta", __("Event Date", THEME_NAME), "barnelli_showEventsMetaBox", "eventcalendar", "side", "low");
}

function barnelli_showEventsMetaBox() {
	global $post;

	$custom = get_post_custom($post->ID);
	$postMeta = new BarnelliPostMetaInfo($custom);

	$eventStartDate = $postMeta->get('event_start_date');
	$eventEndDate = $postMeta->get('event_end_date');
	$eventExternalLinkLabel = $postMeta->get('event_external_link_label');
	$eventExternalLink = $postMeta->get('event_external_link');
	$eventAdditionalInfo = $postMeta->get('event_additional_info');
	$eventPosterImage = $postMeta->get('event_poster_image');
	$eventRepeatPeriod = $postMeta->get('repeat_period');
	$eventRepeat = $postMeta->get('event_repeat', 0);
	$eventPaymentLinkLabel = $postMeta->get('event_payment_link_label');
	$eventPaymentLink = $postMeta->get('event_payment_link');
	$eventPromote = $postMeta->get('event_promote', 0);
	$eventStartTime = $postMeta->get('event_start_time');
	$eventEndTime = $postMeta->get('event_end_time');
	$eventVenue = $postMeta->get('event_venue');
	$eventLocation = $postMeta->get('event_location');
	$eventPrice = $postMeta->get('event_price');
	
	require_once THEME_INCLUDES .'/event-calendar/views/admin_meta_box.php';
}

function barnelli_saveEventDetails() {
	global $post;

	if (isset($_POST["event_start_date"])) {
		update_post_meta($post->ID, "event_start_date", $_POST["event_start_date"]);

		$date = explode('/', $_POST["event_start_date"]);
		if(isset($date[1]) && isset($date[2])) {
			update_post_meta($post->ID, "event_start_date_monthyear", $date[1] . '/' . $date[2]);
			update_post_meta($post->ID, "event_start_date_year", $date[2]);
		}
	}

	if (isset($_POST["event_end_date"])) {
		update_post_meta($post->ID, "event_end_date", $_POST["event_end_date"]);

		$date = explode('/', $_POST["event_end_date"]);
		if(isset($date[1]) && isset($date[2])) {
			update_post_meta($post->ID, "event_end_date_monthyear", $date[1] . '/' . $date[2]);
		}
	}
	
	if (isset($_POST["event_start_time"])) {
		update_post_meta($post->ID, "event_start_time", $_POST["event_start_time"]);
	}
	
	if (isset($_POST["event_end_time"])) {
		update_post_meta($post->ID, "event_end_time", $_POST["event_end_time"]);
	}
	
	if (isset($_POST["event_venue"])) {
		update_post_meta($post->ID, "event_venue", $_POST["event_venue"]);
	}
	
	if (isset($_POST["event_location"])) {
		update_post_meta($post->ID, "event_location", $_POST["event_location"]);
	}
	
	if (isset($_POST["event_price"])) {
		update_post_meta($post->ID, "event_price", $_POST["event_price"]);
	}
	
	

	$options = array(
		'event_external_link_label',
		'event_external_link',
		'event_additional_info',
		'event_poster_image',
		'repeat_period',
		'event_repeat',
		'event_payment_link_label',
		'event_payment_link',
		'event_promote'
	);

	foreach($options as $opt) {
		if (isset($_POST[$opt])) {
			update_post_meta($post->ID, $opt, $_POST[$opt]);
		}
	}
}