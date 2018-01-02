<?php

function barnelli_check_php_version($ver) {
	$php_version = phpversion();

	if (version_compare($php_version, $ver) < 0) {
		throw new Exception("This theme requires at least version $ver of PHP. You are running an older version ($php_version). Please upgrade!");
		die();
	}
}

function barnelli_displayCalendar($month = NULL, $year = NULL) {
	$currentMonth = $month == null ? date('n') : $month;
	$currentYear = $year == null ? date('Y') : $year;

	$eventsData = barnelli_getEventsData($currentMonth, $currentYear, 0, false);
	$days = barnelli_generateDaysArray($currentMonth, $year);

	$dayCounter = 0;
	echo "\t<tr>\n";

	foreach($days as $day) {
		if (isset($eventsData[$day['month']][$day['day']])) {
			$eventCounter = count($eventsData[$day['month']][$day['day']]);	
			barnelli_displayEvents($day['day'], $eventsData[$day['month']][$day['day']], $day['class']);
		} else {
			echo '<td class="'.$day['class'].'"><span>'.$day['day'].'</span></td>';	
		}

		$dayCounter++;

		if (($dayCounter % 7) === 0) {
			echo "\t</tr>\n\t<tr>\n";
		}
	}

	echo "\t</tr>";
}

function barnelli_displayEvents($dayOfMonth, $events, $class) {
	if (isset($events) && $events != false) {
		$eventCounter = count($events);
		$ulWidth = $eventCounter * 200;
		require THEME_INCLUDES . '/event-calendar/views/single_grid.php';
	} else {
		echo '<td class="'.$class.'""><span>' . $dayOfMonth . '</span></td>';
	}
}

function barnelli_displayListCalendar($month, $year, $options) {
	$todayMonth = date("n");
	$eventsData = barnelli_getEventsData($month, $year, 1, false);

	if ($month == false) {
		ksort($eventsData);

		foreach($eventsData as $month=>$events) {
			if($options['year_header_view'] == 'yes') {
				echo '<h2>'.__('Events in month:', THEME_NAME).' '.barnelli_monthName($month).'<h2>';
			}

			foreach($events as $day=>$events) {

				barnelli_listDay($events, $day, $options, false);
			}
		}
	} else {
		if (isset($eventsData[$todayMonth])) {
			echo '<div id="upcoming-events-list">';

			foreach($eventsData as $day=>$events) {
				barnelli_listDay($events, $day, $options, $month);
			}
//			$i = 1;
//			foreach($eventsData[$todayMonth] as $day=>$events) {
//				if($i != 0 && (($i % 2) == 0)) {
//					echo '</div><div class="row">';
//				}			
//				barnelli_listDay($events, $day, $options);
//				$i++;
//			}
			echo '</div>';
		}
	}
}

function barnelli_listDay($events, $day, $options, $month='') {
	if (count($events) > 0) : ?>
	<?php
		foreach($events as $event) {
			require THEME_INCLUDES . '/event-calendar/views/single_list.php';
		}
	?>
<?php else: ?>
	<div class="nodata-container">
		<h3 style="color:<?php echo YSettings::g('eventcalendar_no_events_color', '#333'); ?>"><i class="icon-remove-sign"></i> <?php _e('No events found', THEME_NAME);?></h3>
		<p class="nodata"><br />
	</div>
<?php endif;
}

/**
 * Returns pageposts of matching days
 **/
function barnelli_fetchData($month, $year) {
	global $wpdb;

	$qurySubstring = '';

	if ($month) {
		$prevMonth = barnelli_prevMonth($month, true);
		$nextMonth = barnelli_nextMonth($month, true);

		$tmpYear = $year;

		$nextYear = $nextMonth == 1 ? $tmpYear + 1 : $year;
		$prevYear = $prevMonth == 12 ? $tmpYear - 1 : $year;

		$month = str_pad($month, 2, "0", STR_PAD_LEFT);

		$qurySubstring = "AND ($wpdb->postmeta.meta_key = 'event_start_date_monthyear')
		AND
		(
			$wpdb->postmeta.meta_value = '$month/$year'
			OR $wpdb->postmeta.meta_value = '$prevMonth/$prevYear'
			OR $wpdb->postmeta.meta_value = '$nextMonth/$nextYear'
		)";

		$qurySubstring = "AND ($wpdb->postmeta.meta_key = 'event_start_date_monthyear')";
	} else {
		$qurySubstring = "AND $wpdb->postmeta.meta_key = 'event_start_date_year' AND ($wpdb->postmeta.meta_value = '$year') ";
	}

	$querystr = "SELECT $wpdb->postmeta.*, $wpdb->posts.* ";

	global $sitepress, $sitepress_settings;

	if (function_exists('icl_get_languages')) {
		if (@intval($sitepress_settings['custom_posts_sync_option']['eventcalendar']) == 1 )  {
			$querystr .= ", wp_icl_translations.language_code";
		}
	}

	$querystr .= " FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id ";

		if (function_exists('icl_get_languages')) {
			if (@intval($sitepress_settings['custom_posts_sync_option']['eventcalendar']) == 1 )  {
				$querystr .=" LEFT JOIN wp_icl_translations ON $wpdb->posts.ID = wp_icl_translations.element_id";
			}
		}

		$querystr .= " WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
		
		$qurySubstring

		AND $wpdb->posts.post_status = 'publish' 
		AND $wpdb->posts.post_type = 'eventcalendar' ";

		if (function_exists('icl_get_languages')) {
			if (@intval($sitepress_settings['custom_posts_sync_option']['eventcalendar']) == 1 )  {
				$querystr.= " AND wp_icl_translations.language_code = '".ICL_LANGUAGE_CODE."'";
			}
		}

	$querystr .= " ORDER BY $wpdb->posts.post_date DESC";

	return $wpdb->get_results($querystr, OBJECT);
}

function barnelli_yocalgetImageSize($img, $size) {
	return $img;

	$components  = explode('/', $img);
	$file = array_pop($components);

	if (preg_match('/\-[0-9].*x[0-9]{1,4}\./', $file)) {
		$file = preg_replace('/\-[0-9].*x[0-9]{1,4}\./', '.', $file);
	}

	$file = explode('.', $file);	
	
	$f = implode('/', $components).'/'.$file[0].'-'.$size.'.'.$file[1];
	
	$test = explode('uploads', $f);
	
	if (!file_exists(WP_CONTENT_DIR.'/uploads/'.$test[1])) {
		$f = $img;
	}
	
	return $f;
}
	
/**
 * Return array of events as array(month=>array(day=>array(event ... )));
 * 
 * @global type $post
 * @param type $month
 * @param type $year
 * @param type $calendarType 0 - Grid, 1 - List
 * @param type $jsonEncode
 * @return array
 */


function barnelli_getEventsData($month, $year, $calendarType, $jsonEncode=true) {
	global $post;
	$events = array();

	if ($calendarType == 2) $month = false;
	$pageposts = barnelli_fetchData($month, $year);
	
	foreach ($pageposts as $post) {
		setup_postdata($post);
		$postMeta = new BarnelliPostMetaInfo(get_post_custom($post->ID));

		$content = get_the_excerpt();

		$post->post_content = preg_replace('/<img.*>/', '', $post->post_content);
		$imageURL = $postMeta->get('event_poster_image');

		if (!empty($imageURL)) {
			$image = explode('.', $imageURL);
			$image[count($image)-2] = $image[count($image)-2] . '-217x305';
			$imageURL = implode('.', $image);
		}

		$image = $imageURL;
	   
		$permalink = get_post_permalink($post->ID);
		$startDate = $postMeta->get('event_start_date');
		$endDate = $postMeta->get('event_end_date');
		$paymentLink = $postMeta->get('event_payment_link');
		$additionalInfo = $postMeta->get('event_additional_info');
		$postMonthYear = $postMeta->get('event_start_date_monthyear');
		$venue = $postMeta->get('event_venue');
		$location = $postMeta->get('event_location');
		$price = $postMeta->get('event_price');
		$startTime = $postMeta->get('event_start_time');
		$endTime = $postMeta->get('event_end_time');

		$tmp = explode('/', $postMonthYear);
		$postMonth = (int)$tmp[0];
		$postYear = (int)$tmp[1];
		
		$startDateComponents = explode('/', $startDate);
		$endDateComponents = explode('/', $endDate);
	
		$day = isset($startDateComponents[0]) ? intval($startDateComponents[0]) : 0;
		$endDay = isset($endDateComponents[0]) ? intval($endDateComponents[0]) : 0;
		$endDayMonth = isset($endDateComponents[1]) ? intval($endDateComponents[1]) : 0;

		$subTitle = $post->post_title >= 20 ? substr($post->post_title, 0, 20) . "..." : $post->post_title;

		$dayData = array(
			'title' => $subTitle,
			'link' => $permalink,
			'permalink' => $permalink,
			'img' => $image,
			'paymentLink' => $paymentLink,
		);

		if ($calendarType == 1 || $calendarType == 2) {
			$dayData = array_merge($dayData, array('content'=>$content));
		}

		$dateString = '';
		if($startDate == $endDate || $endDate == '') {
			$dateString = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $startDate))));
		} else {
			$dateString = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $startDate)))).' - '.mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $endDate))));
		}
		
		$timeString = '';
		if ($startTime != '' && $endTime != '') {
			$timeString = $startTime .' - ' .$endTime;
		} else {
			$timeString = $startTime;
		}

		$tmpStart = explode('/', $startDate);
		$tmpEnd = explode('/', $endDate);

		$eventStartDay = $tmpStart[0];
		$eventStartMonth = $tmpStart[1];
		$eventStartYear = $tmpStart[2];

		$eventEndDay = $tmpEnd[0];
		$eventEndMonth = $tmpEnd[1];
		$eventEndYear = $tmpEnd[2];

		$dayData = array_merge($dayData, array(
			'fulltitle' => $post->post_title,
			'postId' => $post->post_id,
			'startDate' => $startDate,
			'endDate' => $endDate,
			'newStartDate' => mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $startDate)))),
			'newEndDate' => mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $endDate)))),
			'dateString' => $dateString, 
			'timeString' => $timeString, 
			'additionalInfo' => $additionalInfo,
			'venue' => $venue,
			'location' => $location,
			'price' => $price,
		));

		/* repeat events that last for more than one day*/
		if ($endDay != 0) {

			if($endDayMonth == $postMonth) {
				// event end in the same month
				for ($i=$day;$i<=$endDay;$i++) {
					$events[$postMonth][$i][] = $dayData;
				}
			} else {
				$numberOfDaysInStartMonth = date('t', mktime(0, 0, 0, $postMonth, 1, $eventStartYear));

				for ($i=$eventStartDay; $i<=$numberOfDaysInStartMonth; $i++) {
					$events[$eventStartMonth][$i][] = $dayData;
				}

				if ($eventStartMonth == 12) {

					for ($j=1;$j<=$eventEndMonth-1;$j++) {
						$numberOfDaysInMonth = date('t', mktime(0, 0, 0, $j, 1, $eventEndYear));

						for ($i=1; $i<=$numberOfDaysInMonth; $i++) {
							$events[$j][$i][] = $dayData;
						}
					}
				} else {
					for ($j=$eventStartMonth+1; $j<=$eventEndMonth-1;$j++) {
						$numberOfDaysInMonth = date('t', mktime(0, 0, 0, $j, 1, $eventEndYear));

						for ($i=1; $i<=$numberOfDaysInMonth; $i++) {
							$events[$j][$i][] = $dayData;
						}
					}
				}

				for ($i=1; $i<=$eventEndDay; $i++) {
					$events[$eventEndMonth][$i][] = $dayData;
				}
			}
		} else {
			$events[$postMonth][$day][] = $dayData;
		}
	}

	if ($jsonEncode) {
		$jsonEvents = array();

		foreach($events as $key => $event) {
			$jsonEvents[$key-1] = $event;
		}

		$events = $jsonEvents;
	}

	return $jsonEncode ? json_encode($events) : $events;
}

function barnelli_createContent($post) {
	$custom = get_post_custom($post->ID);
	$content = '';
	$url = get_post_permalink($post->ID);
	$social = barnelli_renderCalendarSocial($url);
	$content .= '<div class="item">';
	$content .= '<section>';
	$content .= '<div class="col-md-10 col-md-offset-1">';
	$content .= '<a class="hover-post event-calendar-poster '.(($social != '') ? 'social-margin' : '').'"  href="'.$url.'"><figure><img src="'.$custom['event_poster_image'][0].'"  /></figure></a>';
	$content .= '<article>';
	$content .= '<header>'. $social  .'<hgroup>';
	$content .= '<h1><a href="'.$url.'">'.$post->post_title.'</a></h1>';
	
	if (isset($custom['event_start_date'][0]) && isset($custom['event_end_date'][0])) {
		$date = '';

		if ($custom['event_start_date'][0] == $custom['event_end_date'][0]) {
			$startDate = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $custom['event_start_date'][0]))));
			$date = $startDate;
		} elseif ($custom['event_end_date'][0] != '') {
			$startDate = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $custom['event_start_date'][0]))));
			$endDate = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $custom['event_end_date'][0]))));
			$date = $startDate . ' - ' . $endDate;
		} else {
			$startDate = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $custom['event_start_date'][0]))));
			$date = $startDate;
		}

		$content .= '<h2>'.$date.' <strong>'.$custom['event_start_time'][0].'</strong></h2>';
	}
	
	if (isset($custom['event_venue'][0]) && isset($custom['event_location'][0])) {
		$content .= '<h3><strong>'.$custom['event_venue'][0].'</strong> '.$custom['event_location'][0].'</h3>';
	}
	
	if (isset($custom['event_price'][0])) {
		if ($custom['event_price'][0] != '') {
			$content .= '<h4>'.$custom['event_price'][0].'</h4>';
		}
	}
	
	if (isset($custom['event_external_link_label'][0]) && isset($custom['event_payment_link_label'][0]) && isset($custom['event_external_link'][0]) && isset($custom['event_payment_link'][0])) {
		if ($custom['event_external_link_label'][0] != '' || $custom['event_payment_link_label'][0] != '') {
			$content .= '<div class="btn-row">';
			$content .= '<a href="'.$custom['event_external_link'][0].'" class="btn">'.$custom['event_external_link_label'][0].'</a>';
			$content .= '<a href="'.$custom['event_payment_link'][0].'" class="btn">'.$custom['event_payment_link_label'][0].'</a>';
			$content .= '</div>';
		}
	}

	$excerpt = barnelli_trim_excerpt(do_shortcode($post->post_content));

	if ($excerpt != '' && strlen($excerpt) > 1) {
		$excerpt = '<p>'.$excerpt.'... <a href="'.$url.'">read more</a>';
	}

	$content .= '</hgroup></header>';
	$content .= $excerpt;
	$content .= '</article>';
	$content .= '</div>';
	$content .= '</section>';
	$content .= '</div>';

	return $content;
}

function barnelli_renderCalendarSocial($url) {
	$content = '';

	if (YSettings::g('share_on_facebook', '1') == '1') {
		$content .= '<a href="javascript:shareThis(\'http://www.facebook.com/sharer.php?u='.$url.'\')"><i class="fa fa-facebook"></i></a>';
	}
	
	if (YSettings::g('share_on_twitter', '1') == '1') {
		$content .= '<a href="javascript:shareThis(\'https://twitter.com/share?url='.$url.'\')"><i class="fa fa-twitter"></i></a>';
	}

	if (YSettings::g('share_on_google_plus', '1') == '1') {
		$content .= '<a href="javascript:shareThis(\'https://plus.google.com/share?url='.$url.'\')"><i class="fa fa-google-plus"></i></a>';
	}

	if (YSettings::g('share_on_pinterest', '1') == '1') {
		$content .= '<a href="javascript:shareThis(\'http://pinterest.com/pin/create/button/?url='.$url.'\')"><i class="fa fa-pinterest"></i></a>';
	}

	if (YSettings::g('share_on_linkedin', '1') == '1') {
		$content .= '<a href="javascript:shareThis(\'http://www.linkedin.com/shareArticle?mini=true&url='.$url.'\')"><i class="fa fa-linkedin"></i></a>';
	}

	if ($content != '') {
		return '<div class="social">'.$content.'</div>';
	}
}

function barnelli_getAllEventsData() {
	$month = (isset($_POST['month'])) ? (int)$_POST['month'] : null;
	$year = (isset($_POST['year'])) ? (int)$_POST['year'] : null;
	$calendarType = (isset($_POST['calendarType'])) ? (int)$_POST['calendarType'] : null;

	if (isset($month) && isset($year) && isset($calendarType)) {
		header('Content-type: application/json');
		echo barnelli_getEventsData($month, $year, $calendarType, true);
		die();
	}
}

function barnelli_getSingleEventData() {
	if ($_POST['id']) {
		$arrayId = array();

		foreach ($_POST['id'] as $id) {
			$arrayId[$id] = $id;
		}

		$args = array( 'post__in' => $arrayId, 'post_type'=> 'eventcalendar');
		$posts = get_posts($args);
		$response = '';

		foreach ($posts as $post) {
			$response .= barnelli_createContent($post);
		}

		header('Content-type: application/json');
		echo $response;
		die();
	}
}

function barnelli_registerWPMLStrings() {
	if (function_exists('icl_register_string')) {
		$registerArray = array(
			'arrow_link' => YSettings::g('arrow_link', ''),
			'reservation_captcha_placeholder' => YSettings::g('reservation_captcha_placeholder', 'captcha'),
			'reservation_title' => YSettings::g('reservation_title', 'Reservation'),
			'reservation_form_header' => YSettings::g('reservation_form_header', 'Reservation details'),
			'reservation_description' => YSettings::g('reservation_description', ''),
			'reservation_name' => YSettings::g('reservation_name', 'name'),
			'reservation_email' => YSettings::g('reservation_email', 'email'),
			'reservation_phone' => YSettings::g('reservation_phone', 'phone'),
			'reservation_people_amount' => YSettings::g('reservation_people_amount', 'people amount'),
			'reservation_message' => YSettings::g('reservation_message', 'message'),
			'reservation_custom_1' => YSettings::g('reservation_custom_1', ''),
			'reservation_custom_2' => YSettings::g('reservation_custom_2', ''),
			'reservation_custom_3' => YSettings::g('reservation_custom_3', ''),
			'button_value' => YSettings::g('button_value', 'confirm'),
			'reservation_send_message' => YSettings::g('reservation_send_message', 'Reservation message was sent. Thank you!'),
			'reservation_send_fail' => YSettings::g('reservation_send_fail', 'Error occurred! Try again later!'),
			'reservation_january' => YSettings::g('reservation_january', 'January'),
			'reservation_february' => YSettings::g('reservation_february', 'February'),
			'reservation_march' => YSettings::g('reservation_march', 'March'),
			'reservation_april' => YSettings::g('reservation_april', 'April'),
			'reservation_may' => YSettings::g('reservation_may', 'May'),
			'reservation_june' => YSettings::g('reservation_june', 'June'),
			'reservation_july' => YSettings::g('reservation_july', 'July'),
			'reservation_august' => YSettings::g('reservation_august', 'August'),
			'reservation_september' => YSettings::g('reservation_september', 'September'),
			'reservation_october' => YSettings::g('reservation_october', 'October'),
			'reservation_november' => YSettings::g('reservation_november', 'November'),
			'reservation_december' => YSettings::g('reservation_december', 'December'),

			'reservation_closed' => YSettings::g('reservation_closed', 'Closed'),
			'reservation_open_label' => YSettings::g('reservation_open_label', 'open'),
			'reservation_closed_label' => YSettings::g('reservation_closed_label', 'closed'),
			'reservation_date_header' => YSettings::g('reservation_date_header', 'Date'),

			'reservation_current_label' => YSettings::g('reservation_current_label', 'Opening hours:'),

			'theme_monday_long' => YSettings::g('theme_monday_long', 'Monday'),
			'theme_monday_short' => YSettings::g('theme_monday_short', 'Md.'),
			'theme_tuesday_long' => YSettings::g('theme_tuesday_long', 'Tuesday'),
			'theme_tuesday_short' => YSettings::g('theme_tuesday_short', 'Tu.'),
			'theme_wednesday_long' => YSettings::g('theme_wednesday_long', 'Wednesday'),
			'theme_wednesday_short' => YSettings::g('theme_wednesday_short', 'We.'),
			'theme_thursday_long' => YSettings::g('theme_thursday_long', 'Thursday'),
			'theme_thursday_short' => YSettings::g('theme_thursday_short', 'Td.'),
			'theme_friday_long' => YSettings::g('theme_friday_long', 'Friday'),
			'theme_friday_short' => YSettings::g('theme_friday_short', 'Fr.'),
			'theme_saturday_long' => YSettings::g('theme_saturday_long', 'Saturday'),
			'theme_saturday_short' => YSettings::g('theme_saturday_short', 'Sa.'),
			'theme_sunday_long' => YSettings::g('theme_sunday_long', 'Sunday'),
			'theme_sunday_short' => YSettings::g('theme_sunday_short', 'Su.'),

			'contact_captcha_placeholder' => YSettings::g('contact_captcha_placeholder', 'captcha'),
			'contact_info_header' => YSettings::g('contact_info_header', 'Info'),
			'contact_info_content' => YSettings::g('contact_info_content', 'this is info text'),
			'contact_social_header' => YSettings::g('contact_social_header', 'Find us on'),
			'contact_form_header' => YSettings::g('contact_form_header', 'Contact Form'),
			'contact_placeholder_name' => YSettings::g('contact_placeholder_name', 'name'),
			'contact_placeholder_email' => YSettings::g('contact_placeholder_email', 'email'),
			'contact_placeholder_subject' => YSettings::g('contact_placeholder_subject', 'subject'),
			'contact_placeholder_text' => YSettings::g('contact_placeholder_text', 'message'),
			'contact_placeholder_message_send' => YSettings::g('contact_placeholder_message_send', 'Your message was sent. Thank You!'),
			'contact_placeholder_message_fail' => YSettings::g('contact_placeholder_message_fail', 'Error occurred! Try again later!'),
			'contact_placeholder_button' => YSettings::g('contact_placeholder_button', 'Send'),
			'theme_contact_company_name'  => YSettings::g('theme_contact_company_name', 'Company name'),
			'theme_contact_address_header' => YSettings::g('theme_contact_address_header', 'Address & phone'),
			'contact_street_address' => YSettings::g('contact_street_address', 'Address'),
			'theme_contact_postal_code' => YSettings::g('theme_contact_postal_code', 'Postal code'),
			'contact_email' => YSettings::g('contact_email', 'email'),
			'contact_mobile' => YSettings::g('contact_mobile', 'mobile'),
			'contact_phone' => YSettings::g('contact_phone', 'phone'),
			'contact_fax' => YSettings::g('contact_fax', 'fax'),

			'multiple_contact_captcha_placeholder' => YSettings::g('multiple_contact_captcha_placeholder', 'captcha'),
			'multiple_contact_info_header' => YSettings::g('multiple_contact_info_header', 'Info'),
			'multiple_contact_info_content' => YSettings::g('multiple_contact_info_content', 'this is info text'),
			'multiple_contact_social_header' => YSettings::g('multiple_contact_social_header', 'Find us on'),
			'multiple_contact_form_header' => YSettings::g('multiple_contact_form_header', 'Contact Form'),
			'multiple_contact_placeholder_name' => YSettings::g('multiple_contact_placeholder_name', 'name'),
			'multiple_contact_placeholder_email' => YSettings::g('multiple_contact_placeholder_email', 'email'),
			'multiple_contact_placeholder_subject' => YSettings::g('multiple_contact_placeholder_subject', 'subject'),
			'multiple_contact_placeholder_text' => YSettings::g('multiple_contact_placeholder_text', 'message'),
			'multiple_contact_placeholder_message_send' => YSettings::g('multiple_contact_placeholder_message_send', 'Your message was sent. Thank You!'),
			'multiple_contact_placeholder_message_fail' => YSettings::g('multiple_contact_placeholder_message_send', 'Error occurred! Try again later!'),
			'multiple_contact_placeholder_button' => YSettings::g('multiple_contact_placeholder_button', 'Send'),
			'multiple_theme_contact_company_name'  => YSettings::g('multiple_theme_contact_company_name', 'Company name'),
			'multiple_theme_contact_address_header' => YSettings::g('multiple_theme_contact_address_header', 'Address & phone'),
			'multiple_contact_street_address' => YSettings::g('multiple_contact_street_address', 'Address'),
			'multiple_theme_contact_postal_code' => YSettings::g('multiple_theme_contact_postal_code', 'Postal code'),
			'multiple_contact_email' => YSettings::g('multiple_contact_email', 'email'),
			'multiple_contact_mobile' => YSettings::g('multiple_contact_mobile', 'mobile'),
			'multiple_contact_phone' => YSettings::g('multiple_contact_phone', 'phone'),
			'multiple_contact_fax' => YSettings::g('multiple_contact_fax', 'fax'),

			'reservation_validation_date' => YSettings::g('reservation_validation_date', 'We are closed at this time'),
			'reservation_validation_name' => YSettings::g('reservation_validation_date', 'Please insert your name'),
			'reservation_validation_email' => YSettings::g('reservation_validation_email', 'Please insert valid email address'),
			'reservation_validation_phone' => YSettings::g('reservation_validation_phone', 'Please insert your telephone number'),
			'reservation_validation_amount' => YSettings::g('reservation_validation_amount', 'Please insert number of people'),
			'reservation_validation_custom_1' => YSettings::g('reservation_validation_custom_1', 'Insert Custom 1 Message'),
			'reservation_validation_custom_2' => YSettings::g('reservation_validation_custom_2', 'Insert Custom 2 Message'),
			'reservation_validation_custom_3' => YSettings::g('reservation_validation_custom_3', 'Insert Custom 3 Message'),
			'reservation_validation_message' => YSettings::g('reservation_validation_message', 'Please insert some message'),
			'reservation_validation_captcha' => YSettings::g('reservation_validation_captcha', 'Inserted wrong captcha, check it again!')
		);

		$currentGridIndexes = explode(',', YSettings::g('restaurant_grid_indexes', '1390903454876,0,1390903454877,0,0,0,1390903454878,1390903454879,1390903480611,1390903480610,1390903480612,0,'));
		array_pop($currentGridIndexes);

		$indexes = array();

		$j = 1;
		foreach ($currentGridIndexes as $key => $curr) {
			if ($curr != '0') {
				//icl_register_string('yopress', 'theme_grid_name_'.$curr, YSettings::g('theme_grid_name_'.$curr, ''));
				icl_register_string('yopress', 'theme_grid_title_'.$curr, YSettings::g('theme_grid_title_'.$curr, ''));
				icl_register_string('yopress', 'theme_grid_subtitle_'.$curr, YSettings::g('theme_grid_subtitle_'.$curr, ''));
				icl_register_string('yopress', 'theme_grid_title_hover_'.$curr, YSettings::g('theme_grid_title_hover_'.$curr, ''));
				icl_register_string('yopress', 'theme_grid_subtitle_hover_'.$curr, YSettings::g('theme_grid_subtitle_hover_'.$curr, ''));
			}
		}

		foreach ($registerArray as $key => $register) {
			icl_register_string('yopress', $key, $register);
		}
	}
}

function barnelli_frontPageStyles() {
	wp_enqueue_style( array('custom-style') );
}

function barnelli_registerStyles() {

	wp_register_style('default-style', get_stylesheet_uri(), null, 1.0, 'screen');
	wp_register_style('custom-style', THEME_DIR_URI . '/less/custom.css', null, 1.0, 'screen');

	// RTL style support
	// if (is_rtl()) {
	// 	wp_enqueue_style('style-rtl', THEME_DIR_URI . '/less/rtl.css', null, 1.0, 'screen');
	// }

	if (barnelli_isPluginActive('woocommerce/woocommerce.php')) {
 		wp_deregister_style('woocommerce-general');
		wp_deregister_style('woocommerce-layout');
	}

	$mainFont = urlencode(YSettings::g('main_theme_font', 'Open Sans'));
	$menuNavFont = urlencode(YSettings::g('nav_menu_font', 'Open Sans'));
	$restaurantFont = urlencode(YSettings::g('restaurant_block_header_title_font', 'Open Sans'));
	$restaurantSubtitleFont = urlencode(YSettings::g('restaurant_block_header_description_font', 'Open Sans'));

	wp_enqueue_style('main-theme-font', THEME_PROTOCOL . '://fonts.googleapis.com/css?family='.$mainFont.':400,300,600&subset=latin,latin-ext');

	if ($menuNavFont != $mainFont) {
		wp_enqueue_style('menu-nav-theme-font', THEME_PROTOCOL . '://fonts.googleapis.com/css?family='.$menuNavFont.':400,300,600&subset=latin,latin-ext');
	}

	if ($menuNavFont != $restaurantFont) {
		wp_enqueue_style('restaurant-theme-font', THEME_PROTOCOL . '://fonts.googleapis.com/css?family='.$restaurantFont.':400,300,600&subset=latin,latin-ext');
		if ($restaurantSubtitleFont != $restaurantFont) {
			wp_enqueue_style('restaurant-theme-subtitle-font', THEME_PROTOCOL . '://fonts.googleapis.com/css?family='.$restaurantSubtitleFont.':400,300,600&subset=latin,latin-ext');
		}
	}	
}

function barnelli_wooStyle() {
//    wp_register_style( 'barnelli-woocommerce', THEME_DIR_URI . '/woo-styles/css/woocommerce.css', null, 1.0, 'all' );
//    wp_register_style( 'barnelli-woocommerce-layout', THEME_DIR_URI . '/woo-styles/css/woocommerce-layout.css', null, 1.0, 'all' );
}

function barnelli_registerAdminScripts($hook_suffix) {
	$IE6 = (preg_match('/MSIE 6/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false;
	$IE7 = (preg_match('/MSIE 7/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false;
	$IE8 = (preg_match('/MSIE 8/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false;

	wp_enqueue_script('jquery');

	wp_register_style('admin', THEME_DIR_URI . '/admin/admin.css', false, '1.0');
	wp_enqueue_style('admin');

	if (is_rtl()) {
		wp_enqueue_style('style-rtl', THEME_DIR_URI . '/admin/rtl-admin.css', false, '1.0');
	}

	wp_register_style('font-awesome', THEME_DIR_URI . '/fonts/font-awesome/css/font-awesome.min.css', false, '1.0');
	wp_enqueue_style('font-awesome');

	wp_enqueue_style('jquery-style', THEME_PROTOCOL . '://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css');

	if (($IE6 == 1) || ($IE7 == 1) || ($IE8 == 1)) {
		wp_register_script('ie8', THEME_DIR_URI . "/js/selectivizr.js",array('jquery'));
		wp_register_style('event-ie8', THEME_INCLUDES_URI . "/css/event_ie8.css", null, 1.0, 'screen');	
	}

	wp_enqueue_script('jquery-ui-datepicker');

	if ($hook_suffix == 'appearance_page_yopress-settings') {
		/* date range picker */
		// wp_register_style('daterangepicker', THEME_DIR_URI . '/css/daterangepicker.css', false, '1.0');
		// wp_enqueue_style('daterangepicker');

		// wp_register_script('jquery-moment', THEME_DIR_URI . '/js/moment.min.js', array('jquery'), '1.0', true);
		// wp_enqueue_script('jquery-moment');

		// wp_register_script('jquery-daterangepicker', THEME_DIR_URI . '/js/jquery.daterangepicker.js', array('jquery'), '1.0', true);
		// wp_enqueue_script('jquery-daterangepicker');


		// wp_register_script('jquery-dynatable', THEME_DIR_URI . '/js/jquery.dynatable.js', array('jquery'), '1.0', true);
		// wp_enqueue_script('jquery-dynatable');

		wp_register_script('google-maps', THEME_PROTOCOL . '://maps.googleapis.com/maps/api/js?sensor=false', false, '1.0', true);
		wp_enqueue_script('google-maps');

		wp_register_script('admin-js', THEME_DIR_URI . '/admin/admin.js', array('jquery'), '1.0', true);
		wp_enqueue_script('admin-js');

		wp_enqueue_script('underscore');
		wp_enqueue_script('jquery-ui-sortable');
		
		wp_enqueue_script('jquery-ui-custom', THEME_DIR_URI . '/admin/includes/js/jquery-ui-1.10.3.custom.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('block', THEME_DIR_URI . '/admin/includes/js/block.js', array('jquery'), '1.0', true);
		wp_enqueue_script('grid', THEME_DIR_URI . '/admin/includes/js/grid.js', array('jquery'), '1.0', true);
		wp_enqueue_script('main-grid', THEME_DIR_URI . '/admin/includes/js/main.js', array('jquery'), '1.0', true);

		wp_enqueue_style('grid-style', THEME_DIR_URI . '/admin/includes/css/grid.css');
		wp_enqueue_style('layout-style', THEME_DIR_URI . '/admin/includes/css/layout.css');
	}

	//$screen = get_current_screen();

	// Term ordering - only when sorting by term_order
	/*if ( ( strstr( $screen->id, 'edit-' ) || ( ! empty( $_GET['taxonomy'] ) && in_array( $_GET['taxonomy'], apply_filters( 'barnelli_sortable_taxonomies', array( 'product_cat' ) ) ) ) ) && ! isset( $_GET['orderby'] ) ) {

		wp_register_script( 'barnelli_term_ordering', THEME_DIR_URI . '/admin/term-ordering.js', array('jquery-ui-sortable'), '1.0' );
		wp_enqueue_script( 'barnelli_term_ordering' );

		$taxonomy = isset( $_GET['taxonomy'] ) ? sanitize_text_field( $_GET['taxonomy'] ) : '';

		$barnelli_term_order_params = array('taxonomy' => $taxonomy);

		wp_localize_script( 'barnelli_term_ordering', 'barnelli_term_ordering_params', $barnelli_term_order_params );
	}*/
}

function barnelli_registerScripts() {
	$IE6 = (preg_match('/MSIE 6/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false;
	$IE7 = (preg_match('/MSIE 7/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false;
	$IE8 = (preg_match('/MSIE 8/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false;

	if (($IE6 == 1) || ($IE7 == 1) || ($IE8 == 1)) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', THEME_PROTOCOL . '://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, '1.8.3', false);
		wp_enqueue_script('jquery');
	}

	if (is_page()) {
		wp_register_script('google-maps', THEME_PROTOCOL . '://maps.googleapis.com/maps/api/js?sensor=false', false, '1.0', false);
		wp_enqueue_script('google-maps');
	}

	if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
		wp_register_script('ajaxcomments', THEME_DIR_URI . '/js/ajaxcomments.js', array('jquery'), '1.0', true);
		wp_enqueue_script('ajaxcomments');
	}

	// wp_register_script('transition', THEME_DIR_URI . '/js/transition.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('transition');

	// wp_register_script('ba-throttle', THEME_DIR_URI . '/js/jquery.ba-throttle-debounce.min.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('ba-throttle');

	// wp_register_script('carousel', THEME_DIR_URI . '/js/carousel.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('carousel');

	if (!barnelli_isPluginActive('woocommerce/woocommerce.php')) {
		if (YSettings::g('theme_disable_djax', '0') != '1') {
			wp_register_script('djax', THEME_DIR_URI . '/js/jquery.djax.js', array('jquery'), '1.0', true);
			wp_enqueue_script('djax');
		}
	}

	// wp_register_script('colorbox', THEME_DIR_URI . '/js/jquery.colorbox-min.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('colorbox');

	// wp_register_script('imagesloaded', THEME_DIR_URI . '/js/imagesloaded.pkgd.min.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('imagesloaded');

	// wp_register_script('superslides', THEME_DIR_URI . '/js/jquery.superslides.min.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('superslides');

	// wp_register_script('owl-carousel', THEME_DIR_URI . '/js/owl.carousel.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('owl-carousel');

	$detect = new Barnelli_Mobile_Detect();

	if (!$detect->isMobile()) {
		wp_register_script('jquery-nicescroll', THEME_DIR_URI . '/js/jquery.nicescroll.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('jquery-nicescroll');
	}

	global $post;

	if (is_object($post)) {
		$postID = $post->ID;
		$template_file = get_post_meta($postID, '_wp_page_template', true);

		if ($template_file == "video-template.php") {
			wp_register_script('youtube-iframe-api', THEME_PROTOCOL . '://www.youtube.com/iframe_api', false, '1.0', false);
			wp_enqueue_script('youtube-iframe-api');

			wp_register_script('jquery-tubular', THEME_DIR_URI . '/js/jquery.tubular.1.0.js', array('jquery'), '1.0', true);
			wp_enqueue_script('jquery-tubular');
		}
	}

	// wp_register_script('jquery-moderniz', THEME_DIR_URI . '/js/modernizr-2.6.2.min.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('jquery-moderniz');

	// wp_register_script('event-calendar-js', THEME_DIR_URI . '/js/event_calendar.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('event-calendar-js');

	// wp_register_script('theme-main-js', THEME_DIR_URI . '/js/main.js', array('jquery'), '1.0', true);
	// wp_enqueue_script('theme-main-js');

	wp_register_script('theme-scripts', THEME_DIR_URI . '/js/scripts.js', array('jquery'), '1.0', true);
	wp_enqueue_script('theme-scripts');

	// wp_enqueue_script( 'send-contact-form-request', THEME_DIR_URI . '/js/contact-form.js', array('jquery'), '1.0', true );
	wp_localize_script( 'theme-scripts', 'sendContactFormMessage', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );
	wp_localize_script( 'theme-scripts', 'sendReservationFormMessage', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );	
}

function barnelli_register_menus() {
		if (function_exists('register_nav_menus')) {
			register_nav_menus(array(
				'primary' => __('Home Page', THEME_NAME),
				'secondary' => __('Mobile Page', THEME_NAME)
			));
		}

		$homeMenu = wp_get_nav_menu_object('Home');
		$mobileMenu = wp_get_nav_menu_object('Mobile');

		$theme = wp_get_theme();
		$themename = $theme->get('Name');

		$mods = get_option("mods_$themename");

		if (!$homeMenu) {
			$primaryMenu = wp_create_nav_menu('Home');
			$mods['nav_menu_locations']['primary'] = $primaryMenu;
		}

		if (!$mobileMenu) {
			$secondaryMenu = wp_create_nav_menu('Mobile');
			$mods['nav_menu_locations']['secondary'] = $secondaryMenu;
		}

		update_option("mods_$themename", $mods);
}

function barnelli_create_page($slug, $option, $page_title = '', $page_content = '', $post_parent = 0, $page_name) {
	global $wpdb;

	$option_value = get_option($option);

	if ($option_value > 0 && get_post($option_value)) {
		return;
	}

	$page_found = $wpdb->get_var($wpdb->prepare("SELECT ID FROM " . $wpdb->posts . " WHERE post_name = %s LIMIT 1;", $slug));

	if ($page_found) {
		if (!$option_value) {
			update_option($option, $page_found);
		}

		return;
	}

	$page_data = array(
		'post_status' 		=> 'publish',
		'post_type' 		=> 'page',
		'post_author' 		=> 1,
		'post_name' 		=> $slug,
		'post_title' 		=> $page_title,
		'post_content' 		=> $page_content,
		'post_parent' 		=> $post_parent,
		'comment_status' 	=> 'closed'
	);

	//Add page
	$page_id = wp_insert_post($page_data);
	update_option($option, $page_id);
	//Set page template
	update_post_meta($page_id, '_wp_page_template', $page_name);

	return $page_id;
}

function barnelli_activate_pages() {
	if (!get_option('barnelli_home_page_id')) {
		update_option('_barnelli_needs_pages', 1);

		if (function_exists('register_nav_menus')) {
			register_nav_menus(array(
				'primary' => __('Home Page', THEME_NAME),
				'secondary' => __('Mobile Page', THEME_NAME)
			));
		}

		$homeMenu = wp_get_nav_menu_object('Home');
		$mobileMenu = wp_get_nav_menu_object('Mobile');

		$theme = wp_get_theme();
		$themename = $theme->get('Name');

		$mods = get_option("mods_$themename");

		if (!$homeMenu->name) {
			$primaryMenu = wp_create_nav_menu('Home');
			$mods['nav_menu_locations']['primary'] = $primaryMenu;
		}

		if (!$mobileMenu->name) {
			$secondaryMenu = wp_create_nav_menu('Mobile');
			$mods['nav_menu_locations']['secondary'] = $secondaryMenu;
		}
		
		update_option("mods_$themename", $mods);

		$homepageId = barnelli_create_page('home', 'barnelli_home_page_id', __('Home', THEME_NAME), '', 0, 'home-template.php');
		$blogpageId = barnelli_create_page('blog', 'barnelli_blog_page_id', __('Blog', THEME_NAME), '', 0, 'blog-template.php');
		$restaurantpageId = barnelli_create_page('restaurant', 'barnelli_restaurant_page_id', __('Restaurant', THEME_NAME), '', 0, 'restaurant-template.php');
		$menupageId = barnelli_create_page('menu', 'barnelli_menu_page_id', __('Menu', THEME_NAME), '', 0, 'menu-template.php');
		$reservationpageId = barnelli_create_page('reservation', 'barnelli_reservation_page_id', __('Reservation', THEME_NAME), '', 0, 'reservation-template.php');
		$teampageId = barnelli_create_page('team', 'barnelli_team_page_id', __('Team', THEME_NAME), '', 0, 'team-template.php');
		$contactpageId = barnelli_create_page('contact', 'barnelli_contact_page_id', __('Contact', THEME_NAME), '', 0, 'contact-template.php');

		// Use a static front page
		// update_option('page_on_front', $homepageId);
		// update_option('show_on_front', 'page');

		// Set the blog page
		//update_option('page_for_posts', $blogpageId);
		delete_option('_barnelli_needs_pages');

		$homeMenu = wp_get_nav_menu_object('Home');
		$homeMenuID = (int)$homeMenu->term_id;
		$mobileMenu = wp_get_nav_menu_object('Mobile');
		$mobileMenuID = (int)$mobileMenu->term_id;

		$locations = get_theme_mod('nav_menu_locations');
		$locations['primary'] = $homeMenuID;
		$locations['secondary'] = $mobileMenuID;

		set_theme_mod('nav_menu_locations', $locations);

		// Add Restaurant item to menus
		$itemData =  array(
			'menu-item-object-id'	=> $restaurantpageId,
			'menu-item-parent-id'	=> 0,
			'menu-item-position'	=> 1,
			'menu-item-object'		=> 'page',
			'menu-item-type'		=> 'post_type',
			'menu-item-status'		=> 'publish'
		);

		wp_update_nav_menu_item($homeMenuID, 0, $itemData);
		wp_update_nav_menu_item($mobileMenuID, 0, $itemData);

		// Add Menu item to menu
		$itemData =  array(
			'menu-item-object-id'	=> $menupageId,
			'menu-item-parent-id'	=> 0,
			'menu-item-position'	=> 2,
			'menu-item-object'		=> 'page',
			'menu-item-type'		=> 'post_type',
			'menu-item-status'		=> 'publish'
		);

		wp_update_nav_menu_item($homeMenuID, 0, $itemData);
		wp_update_nav_menu_item($mobileMenuID, 0, $itemData);

		// Add home to menu
		wp_update_nav_menu_item($homeMenuID, 0, array(
			'menu-item-title'		=>  __('Home', THEME_NAME),
			'menu-item-classes'		=> 'home',
			'menu-item-parent-id'	=> 0,
			'menu-item-position'	=> 3,
			'menu-item-attr-title'	=> 'logo',
			'menu-item-url'			=> home_url('/'),
			'menu-item-status'		=> 'publish')
		);
		wp_update_nav_menu_item($mobileMenuID, 0, array(
			'menu-item-title'		=>  __('Home', THEME_NAME),
			'menu-item-classes'		=> 'home',
			'menu-item-parent-id'	=> 0,
			'menu-item-position'	=> 3,
			'menu-item-url'			=> home_url('/'),
			'menu-item-status'		=> 'publish')
		);

		// Add Reservation item to menus
		$itemData =  array(
			'menu-item-object-id'	=> $reservationpageId,
			'menu-item-parent-id'	=> 0,
			'menu-item-position'	=> 4,
			'menu-item-object'		=> 'page',
			'menu-item-type'		=> 'post_type',
			'menu-item-status'		=> 'publish'
		);

		wp_update_nav_menu_item($homeMenuID, 0, $itemData);
		wp_update_nav_menu_item($mobileMenuID, 0, $itemData);

		// Add Contact item to menus
		$itemData =  array(
			'menu-item-object-id'	=> $contactpageId,
			'menu-item-parent-id'	=> 0,
			'menu-item-position'	=> 5,
			'menu-item-object'		=> 'page',
			'menu-item-type'		=> 'post_type',
			'menu-item-status'		=> 'publish'
		);

		wp_update_nav_menu_item($homeMenuID, 0, $itemData);
		wp_update_nav_menu_item($mobileMenuID, 0, $itemData);
	}
}

function barnelli_loadFancyCommentReply() {
	if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

/* Custom styles and fonts */
function barnelli_menu_styles() {
?>
<style type="text/css">
<?php if (YSettings::g('woo_disable_placeholders', '0') == '1') : ?>
.woocommerce-placeholder { display: none !important; }
<?php endif; ?>
/* custom css */
	<?php
		$calendarHeaderColor = YSettings::g('eventcalendar_header_color', '#333');
		$tableHeaderColor = YSettings::g('eventcalendar_table_header_color', '#333');
		$tableBodyColor =  YSettings::g('eventcalendar_table_text_color', '#333');
		$tableEventBackground = YSettings::g('eventcalendar_background', 'f5f5f5');
		$tableEventColor = YSettings::g('eventcalendar_text', '#333');
		$tableEventHoverBackground = YSettings::g('eventcalendar_hover_background', '#333');
		$tableEventHoverText = YSettings::g('eventcalendar_hover_text', '#fff');
		$tableCounterBackground = YSettings::g('eventcalendar_counter_background', '#ccc');
		$tableCounterColor = YSettings::g('eventcalendar_counter_text_color', '#fff');
		$tableBorder = YSettings::g('eventcalendar_table_border_color', '#f2f2f2');
		$overlayBackground = YSettings::g('eventcalendar_overlay_color', '#000');
	?>
#yocalendar thead th { color: <?php echo $tableHeaderColor; ?> !important; }
/*.event-calendar-description h2 a { color: <?php //echo $dayColor; ?> !important; }*/
#yocalendar-switcher a, #event-header, #yocalendar th, #yocalendar .yocalendar-paymentLink, .yocalendar-paymentLink, p.additionalInfo, .months-holder .event-calendar-prev i, .months-holder .event-calendar-next i { color: <?php echo $calendarHeaderColor ?> }
#yocalendar td { border-color: <?php echo $tableBorder; ?> !important; }
#yocalendar td > span { color: <?php echo $tableBodyColor;?> !important; }
#yocalendar-months .months-holder { border-bottom-color: <?php echo $tableBorder;?> !important}
#yocalendar td.event-cell { background-color: <?php echo $tableEventBackground;?> !important; color: <?php echo $tableEventColor;?> !important; }
#yocalendar td.event-cell:hover { background-color: <?php echo $tableEventHoverBackground; ?> !important;  }
#yocalendar td.event-cell span { color: <?php echo $tableEventColor;?> !important; }
#yocalendar td.event-cell:hover span { color: <?php echo $tableEventHoverText; ?> !important; }
#yocalendar .event-counter { background-color: <?php echo $tableCounterBackground;?> !important; color: <?php echo $tableCounterColor;?> !important; }
.yocalendar-overlay .yocalendar-overlay-close { background-color: <?php echo $overlayBackground; ?>; }

<?php if (YSettings::g('restaurant_block_color' , '#000000') != '#000000') : ?>
#restaurant .square, #blog .square, #post .square { background: <?php echo YSettings::g( 'restaurant_block_color' , '#000000'); ?> }
<?php endif; ?>
<?php if (YSettings::g( 'restaurant_caption_block_color' , '#000000') != '#000000') : ?> 
#restaurant .square-header { background: <?php echo YSettings::g( 'restaurant_caption_block_color' , '#000000'); ?> }
<?php endif;?>

#restaurant .square-post .title, #restaurant .square-header .title {
	color: <?php echo YSettings::g( 'restaurant_block_header_title_color' , '#ffffff'); ?>;
	font-family: <?php echo YSettings::g('restaurant_block_header_title_font', 'Open Sans'); ?>, Helvetica, Arial, sans-serif !important;
	font-size: <?php echo YSettings::g('restaurant_block_header_title_font_size', '32'); ?>px;
}

#restaurant .square-header .description {
	color: <?php echo YSettings::g( 'restaurant_block_header_description_color' , '#9e9e9e'); ?>;
	font-family: <?php echo YSettings::g('restaurant_block_header_description_font', 'Open Sans'); ?>, Helvetica, Arial, sans-serif !important;
	font-size: <?php echo YSettings::g('restaurant_block_header_description_size', '16'); ?>px;
}

#restaurant .square-post-hover .title {
	color: <?php echo YSettings::g( 'restaurant_block_header_title_hover_color' , '#ffffff'); ?>;
	font-family: <?php echo YSettings::g('restaurant_block_header_title_font', 'Open Sans'); ?>, Helvetica, Arial, sans-serif !important;
	font-size: <?php echo YSettings::g('restaurant_block_header_title_font_size', '32'); ?>px;
}

#restaurant .square-post .description, #restaurant .square-post-hover .description {
	color: <?php echo YSettings::g('restaurant_block_header_description_hover_color' , '#9e9e9e'); ?>;
	font-family: <?php echo YSettings::g('restaurant_block_header_description_font', 'Open Sans'); ?>, Helvetica, Arial, sans-serif !important;
	font-size: <?php echo YSettings::g('restaurant_block_header_description_size', '16'); ?>px;
}

<?php if (YSettings::g( 'restaurant_block_weekdays_color' , '#efefef') != '#efefef') : ?>
#restaurant .square-post .days span.small-day, #restaurant .square-post .days span.large-day {
	color: <?php echo YSettings::g( 'restaurant_block_weekdays_color' , '#efefef'); ?>;
}
<?php endif; ?>

<?php if (YSettings::g( 'restaurant_block_opening_hours_color' , '#ffffff') != '#ffffff') : ?>
#restaurant .square-post .days strong, #blog .square-post .days strong, #post .square-post .days strong {
	color: <?php echo YSettings::g( 'restaurant_block_opening_hours_color' , '#ffffff'); ?>;
}
<?php endif; ?>
<?php
$backgroundColor = barnelli_hexToRGB(YSettings::g('navbar_backgroud_color', '#ffffff'));
$backgroundColorOpacity = (int)YSettings::g('navbar_backgroud_color_opacity', '95');
if ($backgroundColorOpacity < 100) {
	$backgroundRGBA = 'rgba('.$backgroundColor.',.'.$backgroundColorOpacity.') !important;';
} else {
	$backgroundRGBA = 'rgba('.$backgroundColor.','.$backgroundColorOpacity.') !important;';
}
?>
div.navbar.hidden-xs { background-color: <?php echo $backgroundRGBA;?> }
.main-menu { background: rgb(<?php echo $backgroundColor; ?>) !important; }
#flyout-container .flyout-menu>li { background-color: rgba(<?php echo $backgroundColor; ?>,.<?php echo $backgroundColorOpacity - 5;?>) !important; }
#flyout-container .flyout-menu>li>ul>li { background-color: rgba(<?php echo $backgroundColor; ?>,.<?php echo $backgroundColorOpacity - 10;?>) !important; }
#flyout-container .flyout-menu>li>ul>li>ul>li { background-color: rgba(<?php echo $backgroundColor; ?>,.<?php echo $backgroundColorOpacity - 15;?>) !important; }

<?php if (YSettings::g('nav_menu_font_color', '#000000') != '#000000') : ?>
#flyout-container .flyout-menu li { border-top: 1px solid <?php echo YSettings::g('nav_menu_font_color', '#000000'); ?> !important; }
<?php endif; ?>

<?php if (YSettings::g('navbar_mobile_hamburger_background_color', '#f1f1f1') != '#f1f1f1') : ?>
.main-menu .reorder, #flyout-container .flyout-menu .menu-item-has-children > .open-children { background: <?php echo YSettings::g('navbar_mobile_hamburger_background_color', '#f1f1f1');?> !important;}
<?php endif; ?>
<?php if (YSettings::g('navbar_mobile_hamburger_color', '#000000') != '#000000') : ?>
#flyout-container .flyout-menu .menu-item-has-children .open-children i, .main-menu .reorder i { color: <?php echo YSettings::g('navbar_mobile_hamburger_color', '#000000');?> !important; }
<?php endif; ?>

<?php if (YSettings::g('navbar_mobile_hamburger_hover_background_color', '#333333') != '#333333') : ?>
.main-menu .reorder.flyout-open, #flyout-container .flyout-menu .menu-item-has-children.subnav-open > .open-children { background: <?php echo YSettings::g('navbar_mobile_hamburger_hover_background_color', '#333333');?> !important; }
<?php endif; ?>
<?php if (YSettings::g('navbar_mobile_hamburger_hover_color', '#ffffff') != '#ffffff') : ?>
.main-menu .reorder.flyout-open i, #flyout-container .flyout-menu .menu-item-has-children.subnav-open > .open-children i { color: <?php echo YSettings::g('navbar_mobile_hamburger_hover_color', '#ffffff');?> !important; }
<?php endif; ?>

<?php if (YSettings::g('theme_menu_line_color', '#000000') != '#000000') : ?>
.navbar .main-nav.single-separator>li:before { border-top: 1px solid <?php echo YSettings::g('theme_menu_line_color', '#000000');?> !important; }
.navbar .main-nav.single-separator>li:after { border-bottom: 1px solid <?php echo YSettings::g('theme_menu_line_color', '#000000');?> !important; }
.navbar .main-nav.double-separator>li:before {
	border-top: 1px solid <?php echo YSettings::g('theme_menu_line_color', '#000000');?> !important;
	border-bottom: 1px solid <?php echo YSettings::g('theme_menu_line_color', '#000000');?> !important;
}
.navbar .main-nav.double-separator>li:after {
	border-top: 1px solid <?php echo YSettings::g('theme_menu_line_color', '#000000');?> !important;
	border-bottom: 1px solid <?php echo YSettings::g('theme_menu_line_color', '#000000');?> !important;
}
<?php endif; ?>
<?php
$mainFont = urlencode(YSettings::g('main_theme_font', 'Open Sans'));
$mainFontSize = YSettings::g('main_theme_font_size', 16);
$mainFontColor = YSettings::g('main_theme_font_color', '#000000');

$navMenuFont = urlencode(YSettings::g('nav_menu_font', 'Open Sans'));
$navMenuFontSize = YSettings::g('nav_menu_font_size', 16);
$navMenuFontColor = YSettings::g('nav_menu_font_color', '#000000');

if ($navMenuFont != ''): ?>
#flyout-container .flyout-menu li a {
	font-family: "<?php echo YSettings::g('nav_menu_font', 'Open Sans'); ?>", Helvetica, Arial, sans-serif !important;
	font-size: <?php echo $navMenuFontSize; ?>px !important;
	color: <?php echo $navMenuFontColor; ?> !important;
}

.navbar .main-nav > li > div > a > span {
	font-family: "<?php echo YSettings::g('nav_menu_font', 'Open Sans'); ?>", Helvetica, Arial, sans-serif !important;
	font-size: <?php echo $navMenuFontSize; ?>px !important;
	color: <?php echo $navMenuFontColor; ?>;
}
<?php endif; ?>
<?php if (YSettings::g('theme_navbar_always_on_top', '0') == '1') : ?>
.social-share.top {
	top: auto;
	bottom: 20px;	
}
<?php endif; ?>
<?php
$customCss = YSettings::g('theme_custom_css', '');

if ($customCss != '') {
	echo '/* Custom CSS */';
	echo $customCss;
	echo '/* Custom CSS */';
}
?>
</style>
<script type="text/javascript">
var l10n = {
	'January' : '<?php echo YSettings::gWPML("reservation_january", "January"); ?>',
	'February' : '<?php echo YSettings::gWPML("reservation_february", "February"); ?>',
	'March' : '<?php echo YSettings::gWPML("reservation_march", "March"); ?>',
	'April' : '<?php echo YSettings::gWPML("reservation_april", "April"); ?>',
	'May' : '<?php echo YSettings::gWPML("reservation_may", "May"); ?>',
	'June' : '<?php echo YSettings::gWPML("reservation_june", "June"); ?>',
	'July' : '<?php echo YSettings::gWPML("reservation_july", "July"); ?>',
	'August' : '<?php echo YSettings::gWPML("reservation_august", "August"); ?>',
	'September' : '<?php echo YSettings::gWPML("reservation_september", "September"); ?>',
	'October' : '<?php echo YSettings::gWPML("reservation_october", "October"); ?>',
	'November' : '<?php echo YSettings::gWPML("reservation_november", "November"); ?>',
	'December' : '<?php echo YSettings::gWPML("reservation_december", "December"); ?>',

	'Mon': '<?php echo YSettings::gWPML("theme_monday_short", YSettings::g("theme_monday_short", "Mo.")); ?>',
	'Tue': '<?php echo YSettings::gWPML("theme_tuesday_short", YSettings::g("theme_tuesday_short", "Tu.")); ?>',
	'Wed': '<?php echo YSettings::gWPML("theme_wednesday_short", YSettings::g("theme_wednesday_short", "We.")); ?>',
	'Thu': '<?php echo YSettings::gWPML("theme_thursday_short", YSettings::g("theme_thursday_short", "Th.")); ?>',
	'Fri': '<?php echo YSettings::gWPML("theme_friday_short", YSettings::g("theme_friday_short", "Fr.")); ?>',
	'Sat': '<?php echo YSettings::gWPML("theme_saturday_short", YSettings::g("theme_saturday_short", "Sa.")); ?>',
	'Sun': '<?php echo YSettings::gWPML("theme_sunday_short", YSettings::g("theme_sunday_short", "Su.")); ?>',

	'View event' : '<?php _e("View event", THEME_NAME); ?>',
	'View events' : '<?php _e("View events", THEME_NAME); ?>',
	'Upcoming event' : '<?php _e("Upcoming event", THEME_NAME); ?>',
	'Upcoming events' : '<?php _e("Upcoming events", THEME_NAME); ?>',
	'Events on' : '<?php _e("Events on", THEME_NAME); ?>',
	'Events in month' : '<?php _e("Events in month", THEME_NAME); ?>',
	'View' : '<?php _e("View", THEME_NAME); ?>',
	'No event found' : '<?php _e("No event found", THEME_NAME); ?>',
	'Share with friends' : '<?php _e("Share with friends", THEME_NAME); ?>',
	'th' : '<?php _e("th", THEME_NAME); ?>',
	'st' : '<?php _e("st", THEME_NAME); ?>',
	'nd' : '<?php _e("nd", THEME_NAME); ?>',
	'rd' : '<?php _e("rd", THEME_NAME); ?>',
	'buy' : '<?php _e("Buy", THEME_NAME);?>'
};

var monthId = { 0 : 'January',1 : 'February',2 : 'March',3 :'April',4 : 'May',5 : 'June',6 : 'July',7 : 'August',8 : 'September',9 : 'October', 10 : 'November', 11 : 'December'};

<?php
$options = array(
	'month_header_view' => YSettings::g('eventcalendar_display_months', 'yes'),
	'year_header_view' => 'yes',
	'default_calendar_view' => YSettings::g('eventcalendar_default_view', 'grid')
);

$shareOptions = array(
	'facebook'	=> (bool)YSettings::g('share_on_facebook', '1'),
	'twitter'	=> (bool)YSettings::g('share_on_twitter', '1'),
	'google'	=> (bool)YSettings::g('share_on_google_plus', '1'),
	'pintrest'	=> (bool)YSettings::g('share_on_pinterest', '1'),
	'linkedin'	=> (bool)YSettings::g('share_on_linkedin', '1')
);
?>
var themeUrl = '<?php echo THEME_DIR_URI; ?>';
var displayMonthHeader = 1;
var displayYearHeader = 1;
var displayOptions = <?php echo json_encode($options); ?>;
var shareOptions = <?php echo json_encode($shareOptions); ?>;

var requiredContactName = <?php echo (YSettings::g("contact_name_required", "1") == "1" ) ? 'true' : 'false'; ?>;
var requiredContactEmail = <?php echo (YSettings::g("contact_email_required", "1") == "1" ) ? 'true' : 'false'; ?>;
var requiredContactSubject = <?php echo (YSettings::g("contact_subject_required", "1") == "1") ? 'true' : 'false'; ?>;
var requiredContactMessage = <?php echo (YSettings::g("contact_message_required", "1") == "1") ? 'true' : 'false'; ?>;
<?php if ((YSettings::g('contact_terms') != '') && (YSettings::g('contact_terms') != ' ')) : ?>
var requiredContactTerms = <?php echo (YSettings::g("contact_terms_required", "0") == "1") ? 'true' : 'false'; ?>;
<?php else: ?>
var requiredContactTerms = false;
<?php endif; ?>

var requiredMultipleContactName = <?php echo (YSettings::g("multiple_contact_name_required", "1") == "1" ) ? 'true' : 'false'; ?>;
var requiredMultipleContactEmail = <?php echo (YSettings::g("multiple_contact_email_required", "1") == "1" ) ? 'true' : 'false'; ?>;
var requiredMultipleContactSubject = <?php echo (YSettings::g("multiple_contact_subject_required", "1") == "1") ? 'true' : 'false'; ?>;
var requiredMultipleContactMessage = <?php echo (YSettings::g("multiple_contact_message_required", "1") == "1") ? 'true' : 'false'; ?>;
<?php if ((YSettings::g('multiple_contact_terms') != '') && (YSettings::g('multiple_contact_terms') != ' ')) : ?>
var requiredMultipleContactTerms = <?php echo (YSettings::g("multiple_contact_terms_required", "0") == "1") ? 'true' : 'false'; ?>;
<?php else: ?>
var requiredMultipleContactTerms = false;
<?php endif; ?>

var disableReservationPicker = <?php echo (YSettings::g("reservation_disable_opening_check", "0") == "1") ? 'true' : 'false'; ?>;
var additionalRevervationInfo = <?php echo (YSettings::g("reservation_validation_show", "0") == "1") ? 'true' : 'false'; ?>;

var requiredReservationName = <?php echo (YSettings::g("reservation_name_required", "1") == "1") ? 'true' : 'false'; ?>;
var requiredReservationEmail = <?php echo (YSettings::g("reservation_email_required", "1") == "1") ? 'true' : 'false'; ?>;
var requiredReservationPhone = <?php echo (YSettings::g("reservation_phone_required", "1") == "1") ? 'true' : 'false'; ?>;
var requiredReservationPeople = <?php echo (YSettings::g("reservation_people_required", "1") == "1") ? 'true' : 'false'; ?>;
var requiredReservationMessage = <?php echo (YSettings::g("reservation_message_required", "1") == "1") ? 'true' : 'false'; ?>;

<?php if ((YSettings::g('reservation_terms') != '') && (YSettings::g('reservation_terms') != ' ')) : ?>
var requiredReservationTerms = <?php echo (YSettings::g("reservation_terms_required", "0") == "1") ? 'true' : 'false'; ?>;
<?php else: ?>
var requiredReservationTerms = false;
<?php endif; ?>
var blogCommentsValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("blog_comments_validation_error", YSettings::g("blog_comments_validation_error", "You might have left one of the fields blank, or be posting too quickly"))); ?>';
var blogCommentsValidationSuccess = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("blog_comments_validation_success", YSettings::g("blog_comments_validation_success", "Thanks for your comment. We appreciate your response."))); ?>';

<?php if (YSettings::g("reservation_validation_show", "0") == "1"): ?>

var dateValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_date", YSettings::g("reservation_validation_date", "We are closed at this time"))); ?>';
var nameValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_name", YSettings::g("reservation_validation_name", "Please insert your name"))); ?>';
var emailValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_email", YSettings::g("reservation_validation_email", "Please insert valid email address"))); ?>';
var phoneValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_phone", YSettings::g("reservation_validation_phone", "Please insert your telephone number"))); ?>';
var amountValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_amount", YSettings::g("reservation_validation_amount", "Please insert number of people"))); ?>';
var custom1ValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_custom_1", YSettings::g("reservation_validation_custom_1", ""))); ?>';
var custom2ValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_custom_2", YSettings::g("reservation_validation_custom_2", ""))); ?>';
var custom3ValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_custom_3", YSettings::g("reservation_validation_custom_3", ""))); ?>';
var messageValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_message", YSettings::g("reservation_validation_message", "Please insert some message"))); ?>';
var captchaValidationError = '<?php echo barnelli_replaceQuotes(YSettings::gWPML("reservation_validation_captcha", YSettings::g("reservation_validation_captcha", "Inserted wrong captcha, check it again!"))); ?>';

<?php endif; ?>

var scrollbarColorMenu = '<?php echo YSettings::g("scrollbar_color_menu", "#ffffff"); ?>';
var scrollbarColor = '<?php echo YSettings::g("scrollbar_color", "#ffffff"); ?>';
var scrollbarWidth = '<?php echo YSettings::g("scrollbar_width", 5); ?>';
var scrollbarVisibility = <?php echo (YSettings::g("scrollbar_visibility", "0") == "1") ? 'true' : 'false'; ?>;
var scrollbarSystem = <?php echo (YSettings::g("scrollbar_system", "0") == "1") ? 'true' : 'false'; ?>;
var turnOffAmazingMenu = <?php echo (YSettings::g("turn_off_amazing_menu", "1") == "1") ? 'true' : 'false'; ?>;
var restaurantCarouselSlideDuration = <?php echo YSettings::g("restaurant_category_slide_duration", 2); ?>;
<?php if (barnelli_isPluginActive('woocommerce/woocommerce.php')) : ?>
var disableDjax = true;
<?php else: ?>
var disableDjax = <?php echo (YSettings::g("theme_disable_djax", "0") == "1") ? 'true' : 'false'; ?>;
<?php endif; ?>
var navMenuAlwaysOnTop = <?php echo (YSettings::g("theme_navbar_always_on_top", "0") == "1") ? 'true' : 'false'; ?>;
</script>
<?php
}

function barnelli_getCommentHTML($comment, $parentId = false) {

	return '<li id="comment-'.$comment->comment_ID.'">
		<a class="photo-user" href="#" title="'.$comment->comment_author.'">
			<figure>'.get_avatar( $comment->comment_author_email, '70').'</figure>
		</a>
		<div class="author-comment">
			<strong>'.$comment->comment_author.'</strong>
			<a class="comment-edit-link" href="'.admin_url().'/comment.php?action=editcomment&amp;c='.$comment->comment_ID.'">Edit</a>
			<p></p><p>'.$comment->comment_content.'</p>
			<p></p>
			<p class="reply">
				<a class="input-submit buttonform comment-reply-link" href="?replytocom='.$comment->comment_ID.'#respond" onclick="return addComment.moveForm(\'comment-'.$comment->comment_ID.'\', \''.$comment->comment_ID.'\', \'respond\', \''.$comment->comment_post_ID.'\')">Reply</a>
			</p>
		</div>
	</li>';
}

/* Method to handle comment submission */
function barnelli_ajaxComment($comment_ID, $comment_status) {
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$parentId = false;
		if (isset($_POST['comment_parent'])) {
			$parentId = (int)$_POST['comment_parent'];
		}

		$comment = get_comment($comment_ID);
		wp_notify_postauthor($comment_ID);
		$commentContent = barnelli_getCommentHTML($comment, $parentId);
		header('Content-type: application/json');
		echo json_encode(array('status'=>'success', 'contents'=>$commentContent, 'parentId'=>$parentId));
		die();
	}
}

function barnelli_trim_excerpt($content) {
	$postExcerptLength = YSettings::g('post_excerpt_length', 160);
	$content = strip_tags($content);
	$excerpt = explode(' ', $content);
	$returnString = '';

	foreach ($excerpt as $word) {
		$returnString .= ' '.$word;

		if (strlen($returnString) > $postExcerptLength) break;
	}

	//$returnString .= '...';
	return $returnString;
}

function barnelli_link_to_yopress($wp_admin_bar) {
	$args = array(
		'id'	=>	'yopress',
		'title'	=>	'YoPress',
		'href'	=>	get_admin_url() . 'themes.php?page=yopress-settings',
		'meta'	=>	array( 'class' => 'yopress-page' )
	);

	$wp_admin_bar->add_node($args);
}

function barnelli_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<?php $add_below = 'comment'; ?>

	<li id="comment-<?php comment_ID() ?>">
		<a class="photo-user" href="#" title="">
			<figure>
				<?php echo get_avatar($comment, 70); ?>
			</figure>
		</a>
		<div class="author-comment">
			<strong><?php echo get_comment_author_link(); ?></strong>
			<div class="date-post"><?php comment_date(); ?></div>
			<?php edit_comment_link(__t('Edit', THEME_NAME)); ?>
			<p><?php if ($comment->comment_approved == '0') : ?>
					<em><?php _t('Your comment is awaiting moderation.', THEME_NAME) ?></em>
					<br/>
				<?php endif; ?>
				<?php comment_text(); ?>
			</p>
			<p class="reply"><?php
				$reply = get_comment_reply_link(array_merge($args, array('reply_text' => __t('Reply', THEME_NAME), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID);

				echo str_replace('comment-reply-link', 'input-submit buttonform comment-reply-link', $reply);
				?>
			</p>
		</div>
	</li>
	<?php
}

/**
 * Set the sort order of a term
 *
 * @access public
 * @param int $term_id
 * @param int $index
 * @param string $taxonomy
 * @param bool $recursive (default: false)
 * @return int
 */
function barnelli_set_term_order($term_id, $index, $taxonomy, $recursive = false) {
	global $wpdb;

	$term_id 	= (int)$term_id;
	$index 		= (int)$index;

	$meta_name = 'order';

	update_barnelli_term_meta($term_id, $meta_name, $index);

	if (!$recursive) return $index;

	$children = get_terms($taxonomy, "parent=$term_id&menu_order=ASC&hide_empty=0");

	foreach ($children as $term) {
		$index++;
		$index = barnelli_set_term_order($term->term_id, $index, $taxonomy, true);
	}

	clean_term_cache($term_id, $taxonomy);

	return $index;
}

function update_barnelli_term_meta($term_id, $meta_key, $meta_value, $prev_value = '') {
	return update_metadata('barnelli_term', $term_id, $meta_key, $meta_value, $prev_value);
}

/**
 * Move a term before the a	given element of its hierarchy level
 *
 * @access public
 * @param int $the_term
 * @param int $next_id the id of the next sibling element in save hierarchy level
 * @param string $taxonomy
 * @param int $index (default: 0)
 * @param mixed $terms (default: null)
 * @return int
 */
function barnelli_order_terms($the_term, $next_id, $taxonomy, $index = 0, $terms = null) {

	if (!$terms )$terms = get_terms($taxonomy, 'menu_order=ASC&hide_empty=0&parent=0');
	if (empty($terms)) return $index;

	$id	= $the_term->term_id;

	$term_in_level = false; // flag: is our term to order in this level of terms

	foreach ($terms as $term) {
		if ($term->term_id == $id) { // our term to order, we skip
			$term_in_level = true;
			continue; // our term to order, we skip
		}

		// the nextid of our term to order, lets move our term here
		if (null !== $next_id && $term->term_id == $next_id) {
			$index++;
			$index = barnelli_set_term_order($id, $index, $taxonomy, true);
		}

		// set order
		$index++;
		$index = barnelli_set_term_order($term->term_id, $index, $taxonomy);

		// if that term has children we walk through them
		$children = get_terms($taxonomy, "parent={$term->term_id}&menu_order=ASC&hide_empty=0");

		if (!empty($children)) {
			$index = barnelli_order_terms($the_term, $next_id, $taxonomy, $index, $children);
		}
	}

	// no nextid meaning our term is in last position
	if ($term_in_level && null === $next_id) {
		$index = barnelli_set_term_order($id, $index+1, $taxonomy, true);
	}

	return $index;
}


/**
 * Ajax request handling for categories ordering
 *
 * @access public
 * @return void
 */
function barnelli_term_ordering() {
	global $wpdb;

	$id = (int)$_POST['id'];
	$next_id  = isset($_POST['nextid']) && (int)$_POST['nextid'] ? (int)$_POST['nextid'] : null;
	$taxonomy = isset($_POST['thetaxonomy']) ? esc_attr( $_POST['thetaxonomy'] ) : null;
	$term = get_term_by('id', $id, $taxonomy);

	if (!$id || !$term || !$taxonomy) die(0);

	barnelli_order_terms($term, $next_id, $taxonomy);

	$children = get_terms($taxonomy, "child_of=$id&menu_order=ASC&hide_empty=0");

	if ($term && sizeof($children)) {
		echo 'children';
		die;
	}
}

add_action('wp_ajax_barnelli-term-ordering', 'barnelli_term_ordering');

/* Remove version from js and css src urls */
function barnelli_remove_cssjs_ver($src) {
	if (strpos($src, 'ver=')) {
		$src = remove_query_arg('ver', $src);
	}

	return $src;
}

// hide wordpress version
function hide_wp_version() {
	return '';
}

/* Remove wp version */
if (YSettings::g('remove_wp_version')) {
	//remove_action('wp_head', 'wp_generator');
	add_filter('the_generator', 'hide_wp_version');
	add_filter('style_loader_src', 'barnelli_remove_cssjs_ver', 10, 2);
}

function barnelli_dynamic_deleteTemplateFile() {
	if (isset($_POST['value'])) {
		$value = $_POST['value'];

		$tmp = explode('[:space:]', $value);
		$slug = $tmp[0];
		$name = $tmp[1];

		$templateFile = THEME_DIR . '/templates/dynamic-menu-'.$slug.'-template.php';

		if (file_exists($templateFile)) {
			@unlink($templateFile);
		}

		$singleFile = THEME_DIR . '/templates/single-'.$slug.'.php';

		if (file_exists($singleFile)) {
			@unlink($singleFile);
		}
	}
}

add_action('wp_ajax_barnelli-food-menu-delete', 'barnelli_dynamic_deleteTemplateFile');

function barnelli_themeforest_themes_update($updates) {
	if (isset($updates->checked)) {
		$username = YSettings::g('themeforest_username', '');
		$apikey = YSettings::g('themeforest_api_key', '');

		if ( ($username != '') && ($apikey != '') ) {
			if (!class_exists('Pixelentity_Themes_Updater')) {
				require_once(THEME_INCLUDES . "/pixelentity-themes-updater/class-pixelentity-themes-updater.php");
			}

			$updater = new Pixelentity_Themes_Updater($username, $apikey);
			$updates = $updater->check($updates);
		}
	}

	return $updates;
}

add_filter("pre_set_site_transient_update_themes", "barnelli_themeforest_themes_update");

// debug
//set_site_transient('update_themes',null);

function barnelli_widgets_init() {
	$tmp = YSettings::g('restaurant_widgets', '["one", "two"]');
	$restaurantWidgets = json_decode($tmp);

	foreach ($restaurantWidgets as $key => $widget) {
		$widgetName = 'widget_restaurant_'.urlencode($widget);

		register_sidebar(array(
			'name' => 'restaurant block '.$widget,
			'id' => $widgetName,
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
		));
	}
}

//add_action( 'widgets_init', 'barnelli_widgets_init' );

function barnelli_favicon() {
	$favicon = YSettings::g('favicon', '');
	if ($favicon != '') {
		if (strstr($favicon, '.ico')) {
			echo '<link rel="shortcut icon" href="'.$favicon.'" />'."\n";
		} else if (strstr($favicon, '.png')) {
			echo '<link rel="icon" type="image/png" href="'.$favicon.'" />'."\n";
		} else {
			echo '<link rel="icon" type="image/jpeg" href="'.$favicon.'" />'."\n";
		}
	}
}

add_filter('add_to_cart_fragments', 'barnelli_woocommerce_header_add_to_cart_fragment');

function barnelli_woocommerce_header_add_to_cart_fragment($fragments) {
	global $woocommerce;

	ob_start();
	?>
	<a class="cart-contents" data-djax-exclude="true" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View Cart', 'woocommerce'); ?>"><?php _e('View Cart', 'woocommerce'); ?> (<?php echo $woocommerce->cart->cart_contents_count;?>) - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}

add_action('init', 'barnelli_allow_contenteditable_on_divs');

function barnelli_allow_contenteditable_on_divs() {
	global $allowedposttags;
 
	$tags = array('a');
	$new_attributes = array('data-djax-exclude' => array());
 
	foreach ($tags as $tag) {
		if (isset($allowedposttags[$tag]) && is_array($allowedposttags[$tag])) {
			$allowedposttags[$tag] = array_merge($allowedposttags[$tag], $new_attributes);
		}
	}
}

function barnelli_sorting_link( $views ) {
	global $post_type, $wp_query;

	if (!current_user_can('edit_others_pages')) {
		return $views;
	}

	$class            = ( isset( $wp_query->query['orderby'] ) && $wp_query->query['orderby'] == 'menu_order title' ) ? 'current' : '';
	$query_string     = remove_query_arg(array( 'orderby', 'order' ));
	$query_string     = add_query_arg( 'orderby', urlencode('menu_order title'), $query_string );
	$query_string     = add_query_arg( 'order', urlencode('ASC'), $query_string );
	$views['byorder'] = '<a href="'. $query_string . '" class="' . esc_attr( $class ) . '">' . __( 'Sort Items', THEME_NAME ) . '</a>';

	return $views;
}

add_filter('views_edit-foodmenu', 'barnelli_sorting_link');

function barnelli_top_bar() {
	$bar = false;

	if (YSettings::g('theme_menu_searchbar', '0') == '1') {
		$bar = true;
	}

	if (YSettings::g('theme_enable_top_bar_languages', '0') == '1') {
		if (function_exists('icl_get_languages')) {
			$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
			$languages = array(); 
			if (count($languages) > 1) {
				$bar = true;	
			}
		}
	}
	if ($bar == true) {
		return 'top-bar';
	}
}

/* Demo Importer */
include_once THEME_INCLUDES . '/import2/importer.php';

global $yopress_Demo_Importer;
$yopress_Demo_Importer = new Demo_Importer();

function yopress_Import() {
	global $yopress_Demo_Importer;
	$yopress_Demo_Importer->imagesURL = 'http://demo.yosoftware.com/wp/barnelli-demo/wp-content/uploads/2014/12/';

	$folder = "demo1/";
	if (!empty($_POST['demo'])) {
		$folder = $_POST['demo'] . "/";
	}

	$yopress_Demo_Importer->import($folder . 'demo.sql');
	die();
}

add_action('wp_ajax_yopress_import', 'yopress_Import');

/**
 * Generate random string 
 * 
 * @param integer $length default length = 32
 * @return string
 */
function random_string($length = 32){
    $key = '';
    $rand = str_split(strtolower(md5(time() * microtime())));
    $keys = array_merge(range(0, 9), range('a', 'z'));
    $keys = array_merge($keys, $rand);

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    
    return $key;
}
if (!function_exists('set_html_content_type')) {

    function set_html_content_type() {
        return 'text/html';
    }

}