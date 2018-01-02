<?php

add_action('admin_init', 'barnelli_registerPageCustomMetaBox');
add_action('save_post', 'barnelli_savePageCustomMetaBox');

function barnelli_registerPageCustomMetaBox() {
	if (isset($_GET['post']) || isset($_POST['post_ID'])) {

		$post_id = isset($_GET['post']) ? $_GET['post'] : $_POST['post_ID'];

		$template_file = get_post_meta($post_id,'_wp_page_template', true);

		// check for a template type
		if ($template_file == "default" || $template_file == 'blog-template.php' || $template_file == 'page-full-template.php') {
			add_meta_box("sidebar_meta", __("Sidebar Options", THEME_NAME), "barnelli_showSidebarMeta", "page", "side", "low");
		}

		if ($template_file != "home-template.php") {
			add_meta_box("footer_meta", __("Footer Options", THEME_NAME), "barnelli_showFooterMeta", "page", "side", "low");
		}
	} else {
		add_meta_box("sidebar_meta", __("Sidebar Options", THEME_NAME), "barnelli_showSidebarMeta", "page", "side", "low");
		add_meta_box("footer_meta", __("Footer Options", THEME_NAME), "barnelli_showFooterMeta", "page", "side", "low");
	}
}

function barnelli_showSidebarMeta($post) {
	$sidebarObject = esc_html(get_post_meta($post->ID, 'sidebar_object', true));
	$sidebars = array(
		'sidebar'=> __("Blog Sidebar", THEME_NAME),
		'sidebar_1'=> __("Sidebar #1", THEME_NAME),
		'sidebar_2'=> __("Sidebar #2", THEME_NAME),
		'sidebar_3'=> __("Sidebar #3", THEME_NAME)
	);
	$sidebarPostition = esc_html(get_post_meta($post->ID, 'sidebar_position', true));
	$positions = array(
		'global'=> __("Global Settings", THEME_NAME),
		'none'=> __("None", THEME_NAME),
		'left'=> __("Left", THEME_NAME),
		'right'=> __("Right", THEME_NAME)
	);
	?>
	<label for="sidebar_object"><?php _e("Sidebar", THEME_NAME); ?></label><br/>
	<select id="sidebar_object" name="sidebar_object">
		<?php foreach ($sidebars as $key => $sidebar) : ?>
			<?php $selected = ($key == $sidebarObject) ? 'selected="selected"' : ''; ?>
			<option <?php echo $selected; ?> value="<?php echo $key; ?>" name="<?php echo $sidebar; ?>"><?php echo $sidebar; ?></option>	
		<?php endforeach; ?>
	</select>
	<br/>
	<label for="sidebar_position"><?php _e("Sidebar Position", THEME_NAME); ?></label><br/>
	<select id="sidebar_position" name="sidebar_position">
		<?php foreach ($positions as $key => $position) : ?>
			<?php $selected = ($key == $sidebarPostition) ? 'selected="selected"' : ''; ?>
			<option <?php echo $selected; ?> value="<?php echo $key; ?>" name="<?php echo $position; ?>"><?php echo $position; ?></option>	
		<?php endforeach; ?>
	</select>
	<?php
}

function barnelli_showFooterMeta($post) {
	$footerOptions = esc_html(get_post_meta($post->ID, 'footer_options', true));
	$positions = array(
		'global'=>__("Global Settings", THEME_NAME),
		'enabled'=>__("Enabled", THEME_NAME),
		'disabled'=>__("Disabled", THEME_NAME)
	);
	?>
	<label for="footer_options"><?php _e("Footer", THEME_NAME); ?></label><br/>
	<select id="footer_options" name="footer_options">
		<?php foreach ($positions as $key => $position) : ?>
			<?php $selected = ($key == $footerOptions) ? 'selected="selected"' : ''; ?>
			<option <?php echo $selected; ?> value="<?php echo $key; ?>" name="<?php echo $position; ?>"><?php echo $position; ?></option>	
		<?php endforeach; ?>
	</select>
	<?php
}

function barnelli_savePageCustomMetaBox() {
	global $post;

	if (is_object($post)) {
		if ($post->post_type == 'page') {
			if (isset($_POST['sidebar_object'])) {
				update_post_meta($post->ID, 'sidebar_object', $_POST['sidebar_object']);
			}
			if (isset($_POST['sidebar_position'])) {
				update_post_meta($post->ID, 'sidebar_position', $_POST['sidebar_position']);
			}
			if (isset($_POST['footer_options'])) {
				update_post_meta($post->ID, 'footer_options', $_POST['footer_options']);
			}
		}
	}
}

?>