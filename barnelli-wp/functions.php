<?php
/* Theme Constans */
if (!defined("THEME_DIR")) {
	define("THEME_DIR", get_template_directory());	
}
if (!defined("THEME_DIR_URI")) {
	define("THEME_DIR_URI", get_template_directory_uri());
}
if (!defined("THEME_NAME")) {
	define("THEME_NAME", "BARNELLI");
}
if (!defined("THEME_PRETTY")) {
	define("THEME_PRETTY", "Barnelli WordPress Theme");
}
if (!defined("THEME_STYLES")) {
	define("THEME_STYLES", THEME_DIR_URI . "/css");
}
if (!defined("THEME_INCLUDES")) {
	define("THEME_INCLUDES", THEME_DIR . "/includes");
}
if (!defined("THEME_POST_TYPES")) {
	define("THEME_POST_TYPES", THEME_DIR . "/includes/post-types");
}
if (!defined("THEME_INCLUDES_URI")) {
	define("THEME_INCLUDES_URI", THEME_DIR_URI . "/includes");
}
if (!defined("THEME_FONTS")) {
	define("THEME_FONTS", THEME_DIR_URI . "/fonts/font-awesome");
}
if (!defined("THEME_PROTOCOL")) {
	define("THEME_PROTOCOL", is_ssl() ? 'https' : 'http');
}

/* YoPressBase */
include_once THEME_DIR . '/yopress/core/YoPressBase.php';
$config = include_once 'YoPressConfig.php';
YoPressBase::init($config);

global $content_width;

$content_width = (YSettings::g('theme_sidebar_position', 'left') == 'none') ? 947 : 753;

include_once THEME_POST_TYPES . '/post-type-init.php';
//include_once THEME_POST_TYPES . '/post-type-menu.php';
include_once THEME_POST_TYPES . '/post-type-dynamic-menu.php';
include_once THEME_POST_TYPES . '/slider-post-type.php';
include_once THEME_POST_TYPES . '/slider-post-type.php';
include_once THEME_POST_TYPES . '/team-post-type.php';
include_once THEME_POST_TYPES . '/post-type-eventcalendar.php';

include_once THEME_INCLUDES . '/custom-page-metabox.php';

/* functions include */
include_once THEME_INCLUDES . '/helpers.php';
include_once THEME_INCLUDES . '/functions.php';
include_once THEME_INCLUDES . '/custom-gallery.php';
include_once THEME_INCLUDES . '/plugins.php';
include_once THEME_INCLUDES . '/contact-form.php';
include_once THEME_INCLUDES . '/reservation-form.php';

include_once THEME_INCLUDES . '/custom-menu.php';
include_once THEME_INCLUDES . '/custom-category-fields.php';

include_once THEME_INCLUDES . '/phpmailer.php';

include_once THEME_DIR . '/widgets/social_widget.php';
include_once THEME_DIR . '/widgets/block_widget.php';


//include_once THEME_DIR . '/widgets/event_calendar_widget.php';
include_once THEME_DIR . '/shortcodes.php';

include_once THEME_DIR . '/includes/HttpFoundation/Request.php';
include_once THEME_DIR . '/includes/HttpFoundation/Response.php';
include_once THEME_DIR . '/includes/HttpFoundation/Session.php';
include_once THEME_DIR . '/ajax.php';

function barnelli_after_setup() {
	// remove_filter('the_content', 'wpautop');
	/* Better organize the functions file */
	add_theme_support('menus');
	add_theme_support('widgets');
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('video', 'gallery', 'image'));
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
	add_theme_support('woocommerce');
	add_theme_support( 'title-tag' );

	// add_theme_support('automatic-feed-links');

	/* Register menus */
	add_action('init', 'barnelli_register_menus');

	/* Register wpml strings */
	add_action('init', 'barnelli_registerWPMLStrings');

	/* Add Pages, set templates add to menus */
	//add_action('init', 'barnelli_activate_pages');

	/* Register, enqueue scripts and styles */
	add_action('admin_enqueue_scripts', 'barnelli_registerAdminScripts');

	/* Register theme styles */
	add_action('wp_enqueue_scripts', 'barnelli_registerStyles');

	/*Register theme woocommerce styles*/
//	add_action( 'wp_enqueue_scripts', 'barnelli_wooStyle' );

	/* Ajax comments */
	//add_action('wp_enqueue_scripts', 'barnelli_ajaxcomments_load_js', 10);
	add_action('wp_enqueue_scripts', 'barnelli_registerScripts');
	add_action('wp_enqueue_scripts', 'barnelli_loadFancyCommentReply');
	add_action('wp_enqueue_scripts', 'barnelli_frontPageStyles');

	/* theme image sizes */
	add_image_size('menu_thumb', 500, 300, true);
	add_image_size('blog_thumb', 753, 182, true);
	add_image_size('slide_thumb', 1440, 802, true);
	add_image_size('team_thumb', 290, 213, true);
	add_image_size('reservation_thumb', 680, 596, true);
	add_image_size('colorbox_thumb', 800, 600, true);
	add_image_size('gallery_thumb', 320, 240, true);
	/* restaurant grid images */
	add_image_size('grid_square_big', 560, 420, true);
	add_image_size('grid_square', 270, 200, true);
	add_image_size('grid_double', 560, 200, true);
	add_image_size('grid_panorama', 1140, 200, true);
	add_image_size('icon', 40, 40, true);
	/* event calendar images */
	add_image_size('event_calendar_thumb', 217, 305, true);
	add_image_size('event_calendar_square', 400, 400, true);

	/* Custom gallery for reservation page and single post */
	if (YSettings::g('general_use_custom_gallery', '1') == '1') {
		remove_shortcode('gallery');
		add_shortcode('gallery', 'barnelli_gallery');
	}

	/* Custom excerpt */
	add_filter('the_excerpt', 'barnelli_trim_excerpt');

	/* Send all comment submissions through my "barnelli_ajaxComment" method */
	add_action('comment_post', 'barnelli_ajaxComment', 20, 2);

	/* Add YoPress link to menu bar */
	add_action('admin_bar_menu', 'barnelli_link_to_yopress', 999);

	register_sidebar(array(
		'id' => 'sidebar',
		'name' => __t('Blog sidebar', THEME_NAME),
		'description' => __t('Sidebar on blog page', THEME_NAME),
		'before_widget' => '<div class="widget-wrapper">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'id' => 'sidebar_1',
		'name' => __t('Sidebar #1', THEME_NAME),
		'description' => __t('Sidebar #1', THEME_NAME),
		'before_widget' => '<div class="widget-wrapper">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'id' => 'sidebar_2',
		'name' => __t('Sidebar #2', THEME_NAME),
		'description' => __t('Sidebar #2', THEME_NAME),
		'before_widget' => '<div class="widget-wrapper">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'id' => 'sidebar_3',
		'name' => __t('Sidebar #3', THEME_NAME),
		'description' => __t('Sidebar #3', THEME_NAME),
		'before_widget' => '<div class="widget-wrapper">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	$numberOfFooterCollumns = (int)YSettings::g('theme_footer_columns', '4');

	for ($i=1;$i<=$numberOfFooterCollumns;$i++) {
		register_sidebar(array(
			'id' => 'footer'.$i,
			'name' => __t('Footer #'.$i, THEME_NAME),
			'description' => __t('Footer #'.$i, THEME_NAME),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));	
	}

	if (barnelli_isPluginActive('woocommerce/woocommerce.php')) {
		register_sidebar(array(
			'id' => 'woocommerce',
			'name' => __t('WooCommerce', THEME_NAME),
			'description' => __t('WooCommerce', THEME_NAME),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}

	/* Contact form actions */
	add_action('wp_ajax_send-contact-form', 'barnelli_sendContactFormMessage');
	add_action('wp_ajax_nopriv_send-contact-form', 'barnelli_sendContactFormMessage');

	/* Reservation form actions */
	add_action('wp_ajax_send-reservation-form', 'barnelli_sendReservationFormMessage');
	add_action('wp_ajax_nopriv_send-reservation-form', 'barnelli_sendReservationFormMessage');

	add_action('wp_ajax_check-opening-time', 'barnelli_checkOpeningTime');
	add_action('wp_ajax_nopriv_check-opening-time', 'barnelli_checkOpeningTime');
	
	if (barnelli_isPluginActive('woocommerce/woocommerce.php')) {
		/* remove sidebar from woocommerce */
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
		
		/* Remove Breadcrumbs in woocommerce*/
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

		/* Remove sorting/ordering in woocommerce*/
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

		/* Remove result count in woocommerce*/
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	}

	/* Event calendar actions */
	add_action('wp_ajax_get-events-data', 'barnelli_getAllEventsData');
	add_action('wp_ajax_nopriv_get-events-data', 'barnelli_getAllEventsData');

	add_action('wp_ajax_get-single-event-data', 'barnelli_getSingleEventData');
	add_action('wp_ajax_nopriv_get-single-event-data', 'barnelli_getSingleEventData');

	/* Custom Barnelli Block Widget */
	add_action('widgets_init', 'BarnelliBlockWidgetLoad');
	/* Custom Barnelli Social Widget */
	add_action('widgets_init', 'BarnelliSocialWidgetLoad');
	/* Event calendar Widget */
//	add_action('widgets_init', 'BarnelliEventPosterWidgetLoad');

	/* Custom nav menu */
	add_action('wp_update_nav_menu_item', 'barnelli_custom_nav_update', 10, 3);
	add_filter('wp_setup_nav_menu_item', 'barnelli_custom_nav_item');
	add_filter('wp_edit_nav_menu_walker', 'barnelli_custom_nav_edit_walker', 10, 2);
	
	function woocommerce_output_related_products() {
		woocommerce_related_products(array('posts_per_page' => 3, 'columns' => 1)); // Display 4 products in rows of 2
	}
}

add_action('after_setup_theme', 'barnelli_after_setup');
