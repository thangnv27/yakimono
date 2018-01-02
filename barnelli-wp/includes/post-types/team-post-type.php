<?php

// Team post type

add_action('init', 'barnelli_registerTeamPostType');
add_action('admin_init', 'barnelli_registerTeamCustomMetaBox');
add_action('save_post', 'barnelli_saveTeamDetails');

function barnelli_registerTeamPostType() {
	$labels = array(
		'name' => _x('Team', 'post type general name', THEME_NAME),
		'singular_name' => _x('Team', 'post type singular name', THEME_NAME),
		'add_new' => _x('Add New', 'Team', THEME_NAME),
		'add_new_item' => __('Add New Team', THEME_NAME),
		'edit_item' => __('Edit Team', THEME_NAME),
		'new_item' => __('New Team', THEME_NAME),
		'view_item' => __('View Team', THEME_NAME),
		'search_items' => __('Search Team', THEME_NAME),
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

	register_post_type('team', $args);

	
}

function barnelli_registerTeamCustomMetaBox() {
	add_meta_box("team_social_media", __("Social Media", THEME_NAME), "barnelli_showSocialMediaBox", "team", "normal", "default");
	add_meta_box("team_member_name",__("Team member name",THEME_NAME), "barnelli_showTeamNameBox","team","normal","high");
	add_meta_box("team_member_role",__("Team member role/position",THEME_NAME), "barnelli_showTeamRoleBox","team","normal","core");
	add_meta_box("team_member_description",__("Team member description",THEME_NAME), "barnelli_showTeamDescriptionBox","team","normal","core");
}

function barnelli_showSocialMediaBox($post){
	
	$facebook = esc_html(get_post_meta($post->ID,'facebook',true));
	$linkedin = esc_html(get_post_meta($post->ID,'linkedin',true));

	$twitter = esc_html(get_post_meta($post->ID,'twitter',true));
	$google = esc_html(get_post_meta($post->ID,'google',true));
	$instagram = esc_html(get_post_meta($post->ID,'instagram',true));
	
	echo '<label for="social_facebook">Facebook</label><br/>';
	echo '<input type="text" id="social_facebook" name="social_facebook" value="'.$facebook.'" /><br/>';
	echo '<label for="social_linkedin">LinkedIn</label><br/>';
	echo '<input type="text" id="social_linkedin" name="social_linkedin" value="'.$linkedin.'"/><br/>';

	echo '<label for="social_twitter">Twitter</label><br/>';
	echo '<input type="text" id="social_twitter" name="social_twitter" value="'.$twitter.'" /><br/>';
	echo '<label for="social_google">Google+</label><br/>';
	echo '<input type="text" id="social_google" name="social_google" value="'.$google.'"/><br/>';
	echo '<label for="social_instagram">Instagram</label><br/>';
	echo '<input type="text" id="social_instagram" name="social_instagram" value="'.$instagram.'"/><br/>';
}

function barnelli_showTeamRoleBox($post){
	$role = esc_html(get_post_meta($post->ID,'role',true));
	echo '<label for="team_role">Role</label><br/>';
	echo '<input type="text" id="team_role" name="team_role" value="'.$role.'"/>';
}

function barnelli_showTeamNameBox($post){
	$name = esc_html(get_post_meta($post->ID,'name',true));
	echo '<label for="team_name">Name</label><br/>';
	echo '<input type="text" id="team_name" name="team_name" value="'.$name.'"/>';
}

function barnelli_showTeamDescriptionBox($post){
	$description = esc_html(get_post_meta($post->ID,'description',true));
	echo '<label for="team_description">Description</label><br/>';
	echo '<textarea type="text" id="team_description" name="team_description">'.$description.'</textarea>';
}

function barnelli_saveTeamDetails() {
	global $post;

	if (is_object($post)) {
		if ( $post->post_type == 'team' ) {
			// Store data in post meta table if present in post data
			if ( isset( $_POST['social_facebook'] ) ) {
				update_post_meta( $post->ID, 'facebook', $_POST['social_facebook']);
			}
			if ( isset( $_POST['social_linkedin'] ) ) {
				update_post_meta( $post->ID, 'linkedin', $_POST['social_linkedin']);
			}
			if ( isset( $_POST['social_twitter'] ) ) {
				update_post_meta( $post->ID, 'twitter', $_POST['social_twitter']);
			}
			if ( isset( $_POST['social_google'] ) ) {
				update_post_meta( $post->ID, 'google', $_POST['social_google']);
			}
			if ( isset( $_POST['social_instagram'] ) ) {
				update_post_meta( $post->ID, 'instagram', $_POST['social_instagram']);
			}

			if ( isset($_POST['team_role'])){
				update_post_meta($post->ID,'role',$_POST['team_role']);
			}
			if ( isset($_POST['team_name'])){
				update_post_meta($post->ID,'name',$_POST['team_name']);
			}
			if ( isset($_POST['team_description'])){
				update_post_meta($post->ID,'description',$_POST['team_description']);
			}
		}
	}
}

?>