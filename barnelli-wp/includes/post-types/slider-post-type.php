<?php

// Slider post type
add_action('init', 'barnelli_registerSliderPostType');
add_action('admin_init', 'barnelli_registerSliderCustomMetaBox');
add_action('save_post', 'barnelli_saveSliderDetails');

function barnelli_registerSliderPostType() {
	$labels = array(
		'name' => _x('Slider', 'post type general name', THEME_NAME),
		'singular_name' => _x('Slider', 'post type singular name', THEME_NAME),
		'add_new' => _x('Add New', 'Slider', THEME_NAME),
		'add_new_item' => __('Add New Slider', THEME_NAME),
		'edit_item' => __('Edit Slider', THEME_NAME),
		'new_item' => __('New Slider', THEME_NAME),
		'view_item' => __('View Slider', THEME_NAME),
		'search_items' => __('Search Slider', THEME_NAME),
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
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
		'menu_icon' => null,
		'supports' => array('title', 'thumbnail')
	);

	register_post_type('slider', $args);
}

function barnelli_registerSliderCustomMetaBox() {
	add_meta_box("slider_link", __("Link", THEME_NAME), "barnelli_showSliderLinkBox", "slider", "normal", "default");
	//add_meta_box("slider_video", __("Video", THEME_NAME), "barnelli_showSliderVideoBox", "slider", "normal", "default");
}

function barnelli_showSliderLinkBox($post) {
	$link = esc_html(get_post_meta($post->ID, 'link', true));
	echo '<label for="slider_link">'.__("Link", THEME_NAME).'</label><br/>';
	echo '<input style="width:300px;" type="text" id="slider_link" name="slider_link" value="'.$link.'" /><br/>';
}

function barnelli_showSliderVideoBox($post) {
	$video = esc_html(get_post_meta($post->ID, 'video', true));
	$duration = esc_html(get_post_meta($post->ID, 'video_duration', true));

	echo '<label for="slider_video">'.__("Video URL", THEME_NAME).'</label><br/>';
	echo '<input style="width:300px;" type="text" id="slider_video" name="slider_video" value="'.$video.'" /><br/>';
	echo '<label for="slider_video_duration">'.__("Video Duration in seconds (leave blank to auto fetch)", THEME_NAME).'</label><br/>';
	echo '<input style="width:100px;" type="text" id="slider_video_duration" name="slider_video_duration" value="'.$duration.'" /><br/>';
}

function barnelli_saveSliderDetails() {
	global $post;

	if (is_object($post)) {
		if ( $post->post_type == 'slider' ) {
			if ( isset( $_POST['slider_link'] ) ) {
				update_post_meta( $post->ID, 'link', $_POST['slider_link']);
			}

			if ( isset( $_POST['slider_video'] ) ) {
				update_post_meta( $post->ID, 'video', $_POST['slider_video']);

				if ($_POST['slider_video_duration'] == '') {
					$videoId = barnelli_getYoutubeId($_POST['slider_video']);

					$duration = barnelli_getYoutubeDuration($videoId);
					update_post_meta( $post->ID, 'video_duration', $duration);	
				}
			}
		}
	}
}