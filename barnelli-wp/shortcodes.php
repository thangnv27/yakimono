<?php

add_shortcode('row', 'barnelli_shortcode_row');

function barnelli_shortcode_row($atts, $content = null) {
	$atts = shortcode_atts(array(), $atts);
	return '<div class="row">' . do_shortcode($content) . '</div>';
}


add_shortcode('yodivider', 'barnelli_divider');

function barnelli_divider($atts, $content = null) {
	$atts = shortcode_atts(array(
		'style' => ''
	), $atts);
	
	$style = array(
		'dottedline'=>'yodivider-dotted',
		'hairline'=>'yodivider-hair',
		'thickline'=>'yodivider-thick',
		'dashedline'=>'yodivider-dashed',
	);
	return '<hr class="'.$style[$atts['style']].'"/>';
}

add_shortcode('column4', 'barnelli_shortcode_column4');
function barnelli_shortcode_column4($atts, $content = null) {
	$atts = shortcode_atts(array(), $atts);
	return '<div class="col-md-4">' . do_shortcode($content) . '</div>';
}

add_shortcode('column6', 'barnelli_shortcode_column6');
function barnelli_shortcode_column6($atts, $content = null) {
	$atts = shortcode_atts(array(), $atts);
	return '<div class="col-md-6">' . do_shortcode($content) . '</div>';
}

add_shortcode('column8', 'barnelli_shortcode_column8');
function barnelli_shortcode_column8($atts, $content = null) {
	$atts = shortcode_atts(array(), $atts);
	return '<div class="col-md-8">' . do_shortcode($content) . '</div>';
}

add_shortcode('column10', 'barnelli_shortcode_column10');
function barnelli_shortcode_column10($atts, $content = null) {
	$atts = shortcode_atts(array(), $atts);
	return '<div class="col-md-10">' . do_shortcode($content) . '</div>';
}

add_shortcode('column12', 'barnelli_shortcode_column10');
function barnelli_shortcode_column12($atts, $content = null) {
	$atts = shortcode_atts(array(), $atts);
	return '<div class="col-md-12">' . do_shortcode($content) . '</div>';
}

add_shortcode('dropcap', 'barnelli_shortcode_dropcap');

function barnelli_shortcode_dropcap($atts, $content = null) {
	$atts = shortcode_atts( array('style'=>'light'), $atts );

	return '<span class="dropcap '.$atts['style'].'">' . do_shortcode($content) . '</span>';
}

add_shortcode('gmap', 'barnelli_shortcode_googlemap');

function barnelli_shortcode_googlemap($atts, $content = null) {
	$atts = shortcode_atts( array('zoom'=>8, 'type'=>'roadmap'), $atts );

	//$locations = explode('|', $atts['locations']);

	$out = '<div id="google_map"></div>';
	$out .= '
	<script type="text/javascript">
	</script>';

	return $out;
}

add_shortcode('yosocial', 'barnelli_shortcode_social');

function barnelli_shortcode_social($atts, $content=null) {
	$atts = shortcode_atts(array(), $atts);
	return '<ul class="social-icon">' . do_shortcode($content) . '</ul>';
}

add_shortcode('yobutton', 'barnelli_shortcode_yobutton');

function barnelli_shortcode_yobutton($atts, $content=null) {
	global $barnelli_mobileIcons;

	$atts = shortcode_atts(array('url'=>'#', 'icon'=>'facebook'), $atts);
	return '<li><a href="'.$atts['url'].'"><i class="contact monosymbol">'.$barnelli_mobileIcons[$atts['icon']].'</i></a></li>';
}

add_shortcode('yocalendar', 'barnelli_shortcode_yocalendarDraw');

function barnelli_shortcode_yocalendarDraw($atts) {
	extract(shortcode_atts(array('yopress_event_calendar_id' => 'yopress_event_calendar'), $atts));
	$config = array('language' => 'en', 'maxDate' => '2099-12-31');

	$options = array(
		'fb_share' => 1,
		'twitter_share' => 1,
		'google_share' => 1,
		'pinterest_share' => 1,
		'linkedin_share' => 1,
		'default_view' => YSettings::g('eventcalendar_default_view', 'grid'),
		'month_header_view' => YSettings::g('eventcalendar_display_months', 'yes'),
		'year_header_view' => 'yes',
		'use_calendar_fonts' => 'yes'
	);

	$defaultView = $options['default_view'];

	?>
	<div id="yocalendar">
		<div id="yocalendar-months" class="months">
			<div class="months-holder">
				<a data-djax-exclude="true" href="#" class="event-calendar-prev"><i class="fa fa-angle-left"></i></a>
				<a data-djax-exclude="true" href="#" class="event-calendar-next"><i class="fa fa-angle-right"></i></a>
				<span id="event-header"></span>
			</div>
		</div>
	
	<?php
	$numberOfTypes = 0;
	if (YSettings::g('eventcalendar_active_list_month', '1') == '1') {
		$listStyle = "";
		$numberOfTypes++;
	} else {
		$listStyle = "display:none;";
	}

	if (YSettings::g('eventcalendar_active_grid', '1') == '1') {
		$gridStyle = "";
		$numberOfTypes++;
	} else {
		$gridStyle = "display:none;";
	}

	if (YSettings::g('eventcalendar_active_list_year', '1') == '1') {
		$yearStyle = "";
		$numberOfTypes++;
	} else {
		$yearStyle = "display:none;";
	}

	if ($numberOfTypes < 2) {
		$yearStyle = "display:none;";	
		$gridStyle = "display:none;";
		$listStyle = "display:none;";
	}

	?>
		<div id="yocalendar-switcher">
			<a style="<?php echo $listStyle; ?>" data-djax-exclude="true" href="" class="yocalendar-display" title="<?php _e('Display month list', THEME_NAME);?>" data-type="list">
				<i class="fa fa-list"></i>
			</a>
			<a style="<?php echo $gridStyle; ?>" data-djax-exclude="true" href="" class="yocalendar-display" title="<?php _e('Display month grid', THEME_NAME);?>" data-type="grid">
				<i class="fa fa-th"></i>
			</a>
			<a style="<?php echo $yearStyle; ?>" data-djax-exclude="true" href="" class="yocalendar-display" title="<?php _e('Display year list', THEME_NAME);?>" data-type="year">
				<i class="fa fa-th-list"></i>
			</a>
		</div>

		<!-- Grid -->
		<?php //if(YSettings::g('eventcalendar_active_grid', '1') == '1') : ?>
		<div id="yocalendar-grid" class="" <?php if($defaultView != 'grid') echo 'style="display:none"';?>>
			<table id="upcoming-events">
				<thead>
					<tr>
						<th><?php echo YSettings::gWPML("theme_monday_short", YSettings::g("theme_monday_short", "Mo.")); ?></th>
						<th><?php echo YSettings::gWPML("theme_tuesday_short", YSettings::g("theme_tuesday_short", "Tu.")); ?></th>
						<th><?php echo YSettings::gWPML("theme_wednesday_short", YSettings::g("theme_wednesday_short", "We.")); ?></th>
						<th><?php echo YSettings::gWPML("theme_thursday_short", YSettings::g("theme_thursday_short", "Th.")); ?></th>
						<th><?php echo YSettings::gWPML("theme_friday_short", YSettings::g("theme_friday_short", "Fr.")); ?></th>
						<th><?php echo YSettings::gWPML("theme_saturday_short", YSettings::g("theme_saturday_short", "Sa.")); ?></th>
						<th><?php echo YSettings::gWPML("theme_sunday_short", YSettings::g("theme_sunday_short", "Su.")); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php barnelli_displayCalendar(date('n'), date('Y')); ?>
				</tbody>
			</table>
		</div>
		<?php //endif; ?>
		<!-- Grid -->

		<!-- List Month -->
		<?php //if(YSettings::g('eventcalendar_active_list_month', '1') == '1') : ?>
			<div id="yocalendar-list" <?php if ($defaultView != 'list') echo 'style="display:none"';?>>
				<?php barnelli_displayListCalendar(date('n'), date('Y'), $options); ?>
			</div>
		<?php //endif; ?>
		<!-- List Month -->

		<!-- List Year -->
		<?php //if(YSettings::g('eventcalendar_active_list_year', '1') == '1') : ?>
			<div id="yocalendar-year" <?php if ($defaultView != 'year') echo 'style="display:none"';?>>
				<?php barnelli_displayListCalendar(false, date('Y'), $options); ?>
			</div>
		<?php //endif; ?>
		<!-- List Year -->
	</div>
<?php
}

/*
 * Add buttons to tinyMCE
 */

function barnelli_add_button() {
	global $typenow;

	if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
		return;
	}

	// check if WYSIWYG is enabled
	if (get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "barnelli_add_plugin");
		add_filter('mce_buttons', 'barnelli_register_button');
	}
}

function barnelli_add_button_old() {
	if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
		add_filter('mce_external_plugins', 'barnelli_add_plugin_old');
		add_filter('mce_buttons_2', 'barnelli_register_button_old');
	}
}

function barnelli_register_button_old($buttons) {
	array_push($buttons, "yopress");

	return $buttons;
}

function barnelli_add_plugin_old($plugin_array) {
	$plugin_array['yopress'] = get_template_directory_uri() . '/tinymc/shortcodes.js';

	return $plugin_array;
}

function barnelli_add_yopress() {
	global $typenow;

	// check user permissions
	if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
		return;
	}

	// verify the post type
	if (!in_array($typenow, array('post', 'page')))
		return;

	// check if WYSIWYG is enabled
	if (get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "barnelli_add_tinymce_plugin");
		add_filter('mce_buttons', 'barnelli_register_yopress');
	}
}

function barnelli_register_yopress($buttons) {
	array_push($buttons, "yopress");

	return $buttons;
}

function barnelli_add_tinymce_plugin($plugin_array) {
	$plugin_array['yopress'] = get_template_directory_uri() . '/tinymc/shortcodes2.js';
	return $plugin_array;
}

global $wp_version;
// Load different javascript for older WP / tinymce
if (version_compare($wp_version, '3.9') >= 0) {
	add_action('admin_head', 'barnelli_add_yopress');
} else {
	add_action('init', 'barnelli_add_button_old');
}
