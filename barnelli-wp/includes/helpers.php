<?php

function barnelli_replaceQuotes($str) {
	return str_replace("'", '&#39;', $str);
}

$timezone = YSettings::g('restaurant_location_timezone', 'Europe/Warsaw');
date_default_timezone_set($timezone);

class BarnelliPostMetaInfo {
	private $meta = null;

	public function __construct($meta) {
		$this->meta = $meta;
	}

	public function bindTo($meta) {
		$this->meta = $meta;
	}

	public function unbind() {
		$this->meta = null;
	}
	
	function get($name, $default = null) {
		if (isset($this->meta[$name][0])) {
			if ($this->meta[$name][0] != '') {
				return $this->meta[$name][0];
			}
		}

		return $default == null ? '' : $default;
	}
}

include_once THEME_INCLUDES . '/Barnelli_Mobile_Detect.php';

global $barnelli_mobileIcons;

$barnelli_mobileIcons = array(
"fivehundredpx" => "&#xe000;",
"aboutme" => "&#xe001;",
"addme" => "&#xe002;",
"amazon" => "&#xe003;",
"aol" => "&#xe004;",
"appstorealt" => "&#xe005;",
"appstore" => "&#xe006;",
"apple" => "&#xe007;",
"bebo" => "&#xe008;",
"behance" => "&#xe009;",
"bing" => "&#xe010;",
"blip" => "&#xe011;",
"blogger" => "&#xe012;",
"coroflot" => "&#xe013;",
"daytum" => "&#xe014;",
"delicious" => "&#xe015;",
"designbump" => "&#xe016;",
"designfloat" => "&#xe017;",
"deviantart" => "&#xe018;",
"diggalt" => "&#xe019;",
"digg" => "&#xe020;",
"dribble" => "&#xe021;",
"drupal" => "&#xe022;",
"ebay" => "&#xe023;",
"email" => "&#xe024;",
"emberapp" => "&#xe025;",
"etsy" => "&#xe026;",
"facebook" => "&#xe027;",
"feedburner" => "&#xe028;",
"flickr" => "&#xe029;",
"foodspotting" => "&#xe030;",
"forrst" => "&#xe031;",
"foursquare" => "&#xe032;",
"friendsfeed" => "&#xe033;",
"friendstar" => "&#xe034;",
"gdgt" => "&#xe035;",
"github" => "&#xe036;",
"githubalt" => "&#xe037;",
"googlebuzz" => "&#xe038;",
"googleplus" => "&#xe039;",
"googletalk" => "&#xe040;",
"gowallapin" => "&#xe041;",
"gowalla" => "&#xe042;",
"grooveshark" => "&#xe043;",
"heart" => "&#xe044;",
"hyves" => "&#xe045;",
"icondock" => "&#xe046;",
"icq" => "&#xe047;",
"identica" => "&#xe048;",
"imessage" => "&#xe049;",
"itunes" => "&#xe050;",
"lastfm" => "&#xe051;",
"linkedin" => "&#xe052;",
"meetup" => "&#xe053;",
"metacafe" => "&#xe054;",
"mixx" => "&#xe055;",
"mobileme" => "&#xe056;",
"mrwong" => "&#xe057;",
"msn" => "&#xe058;",
"myspace" => "&#xe059;",
"newsvine" => "&#xe060;",
"paypal" => "&#xe061;",
"photobucket" => "&#xe062;",
"picasa" => "&#xe063;",
"pinterest" => "&#xe064;",
"podcast" => "&#xe065;",
"posterous" => "&#xe066;",
"qik" => "&#xe067;",
"quora" => "&#xe068;",
"reddit" => "&#xe069;",
"retweet" => "&#xe070;",
"rss" => "&#xe071;",
"scribd" => "&#xe072;",
"sharethis" => "&#xe073;",
"skype" => "&#xe074;",
"slashdot" => "&#xe075;",
"slideshare" => "&#xe076;",
"smugmug" => "&#xe077;",
"soundcloud" => "&#xe078;",
"spotify" => "&#xe079;",
"squidoo" => "&#xe080;",
"stackoverflow" => "&#xe081;",
"star" => "&#xe082;",
"stumbleupon" => "&#xe083;",
"technorati" => "&#xe084;",
"tumblr" => "&#xe085;",
"twitterbird" => "&#xe086;",
"twitter" => "&#xe087;",
"viddler" => "&#xe088;",
"vimeo" => "&#xe089;",
"virb" => "&#xe090;",
"www" => "&#xe091;",
"wikipedia" => "&#xe092;",
"windows" => "&#xe093;",
"wordpress" => "&#xe094;",
"xing" => "&#xe095;",
"yahoobuzz" => "&#xe096;",
"yahoo" => "&#xe097;",
"yelp" => "&#xe098;",
"youtube" => "&#xe099;",
"instagram" => "&#xe100;",
'socicon-easid' => '5',
'socicon-twitter'=> 'a',
'socicon-facebook'=> 'b',
'socicon-google'=> 'c',
'socicon-pinterest'=> 'd',
'socicon-foursquare'=> 'e',
'socicon-yahoo'=> 'f',
'socicon-skype'=> 'g',
'socicon-yelp'=> 'h',
'socicon-feedburner'=> 'i',
'socicon-linkedin'=> 'j',
'socicon-viadeo'=> 'k',
'socicon-xing'=> 'l',
'socicon-myspace'=> 'm',
'socicon-soundcloud'=> 'n',
'socicon-spotify'=> 'o',
'socicon-grooveshark'=> 'p',
'socicon-lastfm'=> 'q',
'socicon-youtube'=> 'r',
'socicon-vimeo'=> 's',
'socicon-dailymotion'=> 't',
'socicon-vine'=> 'u',
'socicon-flickr'=> 'v',
'socicon-500px'=> 'w',
'socicon-instagram'=> 'x',
'socicon-wordpress'=> 'y',
'socicon-tumblr'=> 'z',
'socicon-blogger'=> 'A',
'socicon-technorati'=> 'B',
'socicon-reddit'=> 'C',
'socicon-dribbble'=> 'D',
'socicon-stumbleupon'=> 'E',
'socicon-digg'=> 'F',
'socicon-envato'=> 'G',
'socicon-behance'=> 'H',
'socicon-delicious'=> 'I',
'socicon-deviantart'=> 'J',
'socicon-forrst'=> 'K',
'socicon-play'=> 'L',
'socicon-zerply'=> 'M',
'socicon-wikipedia'=> 'N',
'socicon-apple'=> 'O',
'socicon-flattr'=> 'P',
'socicon-github'=> 'Q',
'socicon-chimein'=> 'R',
'socicon-friendfeed'=> 'S',
'socicon-newsvine'=> 'T',
'socicon-identica'=> 'U',
'socicon-bebo'=> 'V',
'socicon-zynga'=> 'W',
'socicon-steam'=> 'X',
'socicon-xbox'=> 'Y',
'socicon-windows'=> 'Z',
'socicon-outlook'=> '1',
'socicon-coderwall'=> '2',
'socicon-tripadvisor'=> '3',
'socicon-netcodes'=> '4',
'socicon-lanyrd'=> '7',
'socicon-slideshare'=> '8',
'socicon-buffer'=> '9',
'socicon-rss'=> ',',
'socicon-vkontakte'=> ';',
'socicon-disqus'=> ':',
);

function barnelli_resetYoPressSettings() {
	global $wpdb;
	$querystr = "UPDATE $wpdb->options SET option_value = '' WHERE option_name = 'YoPress-Barnelli';";
	$results = $wpdb->get_results($querystr, OBJECT);
}

function barnelli_setYoPressSettings($demoId = '2') {
	$demos = array(
		'1' => array(
			'[:one:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/cofe-logo1.png',
			'[:two:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/icon-marker.png',
			'[:three:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/menu-bg1.png',
			'[:four:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/icon13.png',
			'[:five:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/sushi-slide10.png',
			'[:six:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/icon15.png',
			'[:seven:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/paleczki.png',
			'[:eight:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/Honda-Suzuki-San1.jpg',
			'[:nine:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/opening-times.jpg',
			'[:ten:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/4x1.jpg',
			'[:eleven:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/chef2.jpg',
			'[:twelve:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/sushi-lesson.jpg',
			'[:thirteen:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/02/quiz.jpg',
			'[:fourteen:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/post4.jpg',
			'[:fifteen:]' => 'http://demo.yosoftware.com/wp/barnelli-1/wp-content/uploads/2014/01/post.jpg',
			),
		'2' => array(
			'[:one:]' => 'http://demo.yosoftware.com/wp/barnelli-2/wp-content/uploads/2014/01/table2.png',
			'[:two:]' => 'http://demo.yosoftware.com/wp/barnelli-2/wp-content/uploads/2014/01/opening.png',
			'[:three:]' => 'http://demo.yosoftware.com/wp/barnelli-2/wp-content/uploads/2014/01/reserve1.jpg',
			'[:four:]' => 'http://demo.yosoftware.com/wp/barnelli-2/wp-content/uploads/2014/01/20130412_1449-2.jpg',
			'[:five:]' => 'http://demo.yosoftware.com/wp/barnelli-2/wp-content/uploads/2014/01/menu.jpg',
			'[:six:]' => 'http://demo.yosoftware.com/wp/barnelli-2/wp-content/uploads/2014/01/logo4.png',
			'[:seven:]' => 'http://demo.yosoftware.com/wp/barnelli-2/wp-content/themes/barnelli2-wp/img/chalkboard.jpg',
			'[:eight:]' => 'http://demo.yosoftware.com/wp/barnelli-2/restaurant/',
			'[:nine:]'  => 'http://demo.yosoftware.com/wp/barnelli-2/wp-content/themes/barnelli2-wp/img/chalkboard-loop.jpg',
		),
		'3' => array(
			'[:one:]' => 'http://demo.yosoftware.com/wp/barnelli-3/restaurant/',
			'[:two:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/logo-cake-final.png',
			'[:three:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/bg-cakes4.jpg',
			'[:four:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/icon-marker.png',
			'[:five:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/ania.jpg',
			'[:six:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/opening.jpg',
			'[:seven:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/iphone.jpg',
			'[:eight:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/32.jpg',
			'[:nine:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/04/maliny.jpg',
			'[:ten:]' => 'http://demo.yosoftware.com/wp/barnelli-3/',
			'[:eleven:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/61.jpg',
			'[:twelve:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/baner.jpg',
			'[:thirteen:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/uploads/2014/01/bg-cakes3.jpg',
			'[:fourteen:]' => 'http://demo.yosoftware.com/wp/barnelli-3/wp-content/themes/barnelli2-wp/img/chalkboard.jpg'
		)
	);

	$chosenDemo = $demos[$demoId];
	$upload_dir = wp_upload_dir();

	global $wp_filesystem;

	foreach ($chosenDemo as $key => $url) {
		//echo "key $key -> $url<br/>";
		if (strstr($url, 'wp-content')) {
			if (!file_exists(  )) {
				//$response = wp_remote_get($url);
				//$imageFile = $response['body'];

				$parts = parse_url($url);
				$filename = basename($parts['path']);
				echo " F $filename";

				//$wp_filesystem->put_contents($upload_dir['basedir'] . '/file.jpg' , $imageFile, FS_CHMOD_FILE);	
			}
		}
	}
}

function barnelli_isPluginActive( $plugin ) {
	return in_array( $plugin, (array) get_option('active_plugins', array() ) );
}

function barnelli_downloadImage($url) {
	$image = file_get_contents($url);
	file_put_contents($filePath, $image);
	$resized_file = wp_get_image_editor($filePath);

	if (!is_wp_error($resized_file)) {
		$filename = $resized_file->generate_filename($width . 'x' . $height);

		$resized_file->resize($width, $height, true);
		$resized_file->save($filename);

		$info = $resized_file->get_size();
			
			return 'vimeo/' . wp_basename($filename);
	}
}

function barnelli_hexToRGB($hex) {
	$hex = str_replace("#", "", $hex);

	if (strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}

	$rgb = array($r, $g, $b);

	return implode(",", $rgb); // returns the rgb values separated by commas
	//return $rgb; // returns an array with the rgb values
}

function barnelli_setContentWidth() {
	global $post;
	global $content_width;

	$template_file = get_post_meta($post->ID,'_wp_page_template', true);

	if ($template_file == 'page-full-template.php') {
		$content_width = 1140;
	} else {
		$content_width = (YSettings::g('theme_sidebar_position', 'left') == 'none') ? 1160 : 947;
	}
}

function barnelli_isSidebarActive($index = 1) {
	$sidebars = wp_get_sidebars_widgets();
	$key 	  = 'footer'.$index;

	if (empty($sidebars[$key])) {
		return false;
	}

	return (isset($sidebars[$key]));
}

function barnelli_getWPMLLanguages() {
	if (function_exists('icl_get_languages')) {
		$wpml_languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');

		$wpml_lang = array();
		foreach ($wpml_languages as $key => $lang) {
			$wpml_lang[] = $lang['language_code'];
		}
		return $wpml_lang;
	} else {
		return false;
	}
}

function barnelli_timeElapsed($ptime) {
	$etime = time() - $ptime;

	if ($etime < 1) {
		return '0 ' . __('seconds', THEME_NAME);
	}

	$a = array( 12 * 30 * 24 * 60 * 60	=>  __('year', THEME_NAME),
				30 * 24 * 60 * 60		=>  __('month', THEME_NAME),
				24 * 60 * 60			=>  __('day', THEME_NAME),
				60 * 60					=>  __('hour', THEME_NAME),
				60						=>  __('minute', THEME_NAME),
				1						=>  __('second', THEME_NAME),
				);

	foreach ($a as $secs => $str) {
		$d = $etime / $secs;
		if ($d >= 1) {
			$r = round($d);
			return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ' . __('ago', THEME_NAME);
		}
	}
}

function barnelli_replaceURLWithHTMLLinks($text) {
	$linksExp = '/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/i';
	$hashTagExp = '/#([\_\-A-Z0-9]+?)\:?\ /i';
	$userTagExp = '/@([\_\-A-Z0-9]+?)\:?\ /i';

	$text = preg_replace($linksExp, "<a href='$1' target='_blank'>$1</a>", $text);
	$text = preg_replace($hashTagExp, " <a href='https://twitter.com/search?q=%23$1&src=hash'>#$1</a> ", $text);
	$text = preg_replace($userTagExp, " <a href='https://twitter.com/$1'>@$1</a> ", $text);

	return $text;
}

if (!function_exists('mb_strlen')) {
	function mb_strlen($str, $enc="") {
		$counts = count_chars($str);
		$total = 0;

		// Count ASCII bytes
		for($i = 0; $i < 0x80; $i++) {
			$total += $counts[$i];
		}

		// Count multibyte sequence heads
		for ($i = 0xc0; $i < 0xff; $i++) {
			$total += $counts[$i];
		}

		return $total;
	}
}

function barnelli_the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut ) . '[...]';
		} else {
			return $subex . '[...]';
		}
	} else {
		return $excerpt;
	}
}

function barnelli_findLink($text) {
	$reg_exUrl = "/(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

	// Check if there is a url in the text
	if (preg_match($reg_exUrl, $text, $url)) {
		return $url[0];
	} else {
		return false;
	}
}

/**
 returns youtube video length in seconds or false if no data
 */
function barnelli_getYoutubeDuration($videoId) {
	$data = wp_remote_get('http://gdata.youtube.com/feeds/api/videos/'.$videoId.'?v=2&alt=jsonc');
	if ($data===false) return false;

	$obj = json_decode($data['body']);

	return (int)$obj->data->duration;
}

function barnelli_getYoutubeId($url) {
	if (strpos($url, 'youtu.be') !== false) {
		$tmp = explode('be/', $url);
		return $tmp[1];
	} else {
		parse_str(parse_url($url, PHP_URL_QUERY ), $vars);
		return isset($vars['v']) ? $vars['v'] : false;
	}
}

function barnelli_getVimeoId($url) {
	$vars = explode('.com/', $url);
	return isset($vars[1]) ? $vars[1] : false;
}

function barnelli_get_image_size($name) {
	global $_wp_additional_image_sizes;

	if ( isset( $_wp_additional_image_sizes[$name] ) )
		return $_wp_additional_image_sizes[$name];

	return false;
}

function barnelli_replaceStrong($str) {
	return preg_replace('/\[b\](.*?)\[\/b\]/i', "<strong>$1</strong>", $str);
}

function barnelli_filter_orderby($orderby) {
	global $wpdb;
	return " STR_TO_DATE({$wpdb->postmeta}.meta_value, '%d/%m/%Y') ASC ";
}

function barnelli_sortFunction($a, $b) {
	return strtotime($a->eventDate) - strtotime($b->eventDate);
}

function barnelli_checkDateIsWithinRange($start_date, $end_date, $todays_date, $timezone) {

	// fix for 24:00:00 ??
	if (strstr($end_date, '24:00:00')) {
		$end_date = str_replace('24:00:00', '23:59:59', $end_date);
	}

	$start_timestamp = new DateTime($start_date);
	$start_timestamp->setTimeZone(new DateTimeZone($timezone));

	$end_timestamp = new DateTime($end_date);
	$end_timestamp->setTimeZone(new DateTimeZone($timezone));

	$today_timestamp = new DateTime($todays_date);
	$today_timestamp->setTimeZone(new DateTimeZone($timezone));

	return (($today_timestamp->format('U') >= $start_timestamp->format('U')) && ($today_timestamp->format('U') < $end_timestamp->format('U')));
}

function barnelli_openingTimesCheck($currDate, $currTime) {

	$timezone = YSettings::g('restaurant_location_timezone', 'Europe/Warsaw');

	$status = false;

	$currDateTime = $currDate . ' ' . $currTime;
	$timestamp = new DateTime($currDate.' '.$currTime);
	$timestamp->setTimeZone(new DateTimeZone($timezone));

	$nextDate = date("Y-m-d", strtotime($currDate . '+1 days'));
	$prevDate = date("Y-m-d", strtotime($currDate . '-1 days'));

	$openClosed = YSettings::gWPML('reservation_closed_label', YSettings::g('reservation_closed_label', 'closed'));

	$weekdays = array('lastsunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
		
	$openings = array();

	foreach ($weekdays as $key => $day) {

		$dayname = $day;

		if ($day == 'lastsunday') {
			$dayname = 'sunday';
		}

		if ($key < 6) {
			$nextday = $weekdays[$key+1];
		} else {
			$nextday = $weekdays[0];
		}

		$open = YSettings::g('theme_'.$dayname.'_open', 'Closed');
		$close = YSettings::g('theme_'.$dayname.'_close', 'Closed');
		$second_open = YSettings::g('theme_'.$dayname.'_open_second', '-');
		$second_close = YSettings::g('theme_'.$dayname.'_close_second', '-');

		if (($open != 'Closed' ) && ($close != 'Closed')) {
			$date = new DateTime($currDate." ".$open.":00");
			$date->setTimeZone(new DateTimeZone($timezone));
			$openTmp = explode(":", $open);
			$closeTmp = explode(":", $close);

			if ((int)$openTmp[0] > (int)$closeTmp[0]) {
				if (!isset($lastsunday[$day])) {
					$openings[$day] = array();
				}
				if ($day == 'lastsunday') {
					array_push($openings[$day], array('from' => $prevDate . ' '.$open.':00', 'to' => $currDate . ' ' . $close.':00'));
				} else {
					array_push($openings[$day], array('from' => $currDate . ' '.$open.':00', 'to' => $nextDate . ' ' . $close.':00'));
				}
			} else {
				if (!isset($openings[$day])) {
					$openings[$day] = array();
				}

				array_push($openings[$day], array('from'=>$currDate . ' ' . $open.':00', 'to' => $currDate . ' ' . $close . ':00'));
			}

			//Second times
			if (($second_open != '-' ) && ($second_close != '-')) {
				$seconddate = new DateTime($currDate." ".$second_open.":00");
				$seconddate->setTimeZone(new DateTimeZone($timezone));

				$openTmp = explode(":", $second_open);
				$closeTmp = explode(":", $second_close);

				if ((int)$openTmp[0] > (int)$closeTmp[0]) {
					if (!isset($openings[$day])) {
						$openings[$day] = array();
					}
					if ($day == 'lastsunday') {
						array_push($openings[$day], array('from' => $prevDate . ' '.$second_open.':00', 'to' => $currDate . ' ' . $second_close.':00'));
					} else {
						array_push($openings[$day], array('from' => $currDate . ' '.$second_open.':00', 'to' => $nextDate . ' ' . $second_close.':00'));
					}
				} else {
					if (!isset($openings[$day])) {
						$openings[$day] = array();
					}

					array_push($openings[$day], array('from'=>$currDate . ' ' . $second_open.':00', 'to' => $currDate . ' ' . $second_close . ':00'));
				}
			}
		}
	}

	foreach ($openings as $key => $day) {
		foreach ($day as $k => $range) {
			if (barnelli_checkDateIsWithinRange($range['from'], $range['to'], $currDateTime, $timezone)) {
				return array('status'=>(bool)true);
			}
		}
	}

	return array('status'=>(bool)false);
}

function barnelli_openingTimes($currDate, $currTime, $check = false) {
	$status = false;

	$currDateTime = $currDate . ' ' . $currTime;
	$openClosed = YSettings::gWPML('reservation_closed_label', YSettings::g('reservation_closed_label', 'closed'));

	$timezone = YSettings::g('restaurant_location_timezone', 'Europe/Warsaw');

	$currdate = new DateTime($currDateTime);
	$currdate->setTimeZone(new DateTimeZone($timezone));
	$dayOfWeek = strtolower($currdate->format('l'));

	$today_open = YSettings::g('theme_'.$dayOfWeek.'_open', 'Closed');
	$today_open_second = YSettings::g('theme_'.$dayOfWeek.'_open_second', '-');
	$today_close = YSettings::g('theme_'.$dayOfWeek.'_close', 'Closed');
	$today_close_second = YSettings::g('theme_'.$dayOfWeek.'_close_second', '-');

	$openTmp = explode(":", $today_open);
	$closeTmp = explode(":", $today_close);

	$s = barnelli_openingTimesCheck($currDate, $currTime);
	$finalstatus = $s['status'];

	if ($finalstatus) {
		$finalOpenClosed = YSettings::gWPML('reservation_open_label', YSettings::g('reservation_open_label', 'open'));
	} else {
		$finalOpenClosed = YSettings::gWPML('reservation_closed_label', YSettings::g('reservation_closed_label', 'closed'));
	}

	$format = YSettings::g('opening_times_format', '24h');
	$closed = YSettings::gWPML('reservation_closed', YSettings::g('reservation_closed', 'Closed'));

	$timestamp = strtotime($currDate.' '.$currTime);
	$day = strtolower(date('l', $timestamp));
	$open = YSettings::g('theme_'.$day.'_open', 'Closed');
	$close = YSettings::g('theme_'.$day.'_close', 'Closed');
	$open_second = YSettings::g('theme_'.$day.'_open_second', '-');
	$close_second = YSettings::g('theme_'.$day.'_close_second', '-');

	if ($format == '24h') {
		$openings = '';
		if ( ($open == 'Closed') && (($open_second != '-') && ($close_second != '-'))) {
			$openings .= $open_second . ' - ' . $close_second;
		} else {
			$openings .= ($open == 'Closed') ? $closed : $open . ' - ' . $close;
		}

		if ($open != 'Closed') {
			if (($open_second != '-') && ($close_second != '-')) {
				$openings .= ' / ' . $open_second . ' - ' . $close_second;
			}
		}
	} else {
		$openings = '';
		if ( ($open == 'Closed') && (($open_second != '-') && ($close_second != '-'))) {
			$openings .= date("g:i a", strtotime($open_second)) . ' - ' . date("g:i a", strtotime($close_second));
		} else {
			$openings .= ($open == 'Closed') ? $closed : date("g:i a", strtotime($open)) . ' - ' . date("g:i a", strtotime($close));
		}

		if ($open != 'Closed') {
			if (($open_second != '-') && ($close_second != '-')) {
				$openings .= ' / ' . date("g:i a", strtotime($open_second)) . ' - ' . date("g:i a", strtotime($close_second));
			}
		}
	}

	if ($check) {
		if (strtotime(date('Y-m-d H:i:s')) > $timestamp) {
			$finalstatus = false;
			if (strtotime(date('Y-m-d')) > $timestamp) {
				$openings = YSettings::gWPML('reservation_past_label', YSettings::g('reservation_past_label', 'This day already passed'));
			}
		}
	}

	// Final check if openings is not set to Closed string
	if ($openings == 'Closed') {
		$finalstatus = false;
	}

	return array('label'=>$finalOpenClosed, 'status'=>$finalstatus, 'openings'=>$openings);
}

function barnelli_generateBlock($blockIndex, $imageSize='grid_square') {
	if ($imageSize == 'grid_square') {
		$videoWidth = 270;
		$videoHeight = 200;
	} else if ($imageSize == 'grid_square_big') {
		$videoWidth = 560;
		$videoHeight = 420;
	} else if ($imageSize == 'grid_double') {
		$videoWidth = 560;
		$videoHeight = 200;
	} else if ($imageSize == 'grid_panorama') {
	$videoWidth = 1140;
		$videoHeight = 200;
	} else {
		$videoWidth = 270;
		$videoHeight = 200;
	}

	$function = YSettings::g('theme_grid_function_'.$blockIndex);
	$functionValue = YSettings::g('theme_grid_function_value_'.$blockIndex);

	if (($function == 'custom_code') || ($function == 'link') || ($function == 'category') || ($function == 'slider_category') || ($function == 'twitter') || ($function == 'facebook') || ($function == 'events')) {
		$functionValueNumber = YSettings::g('theme_grid_function_value_number_'.$blockIndex);
		$functionValueDuration = YSettings::g('theme_grid_function_value_duration_'.$blockIndex, 4);
	}

	$excerptLength = 120;

	if ($imageSize == 'grid_panorama') {
		$excerptLength = 300;
	}

	$name = YSettings::g('theme_grid_name_'.$blockIndex);
	$title = YSettings::gWPML('theme_grid_title_'.$blockIndex, YSettings::g('theme_grid_title_'.$blockIndex));
	$subtitle = YSettings::gWPML('theme_grid_subtitle_'.$blockIndex, YSettings::g('theme_grid_subtitle_'.$blockIndex));
	$title_hover = YSettings::gWPML('theme_grid_title_hover_'.$blockIndex, YSettings::g('theme_grid_title_hover_'.$blockIndex));
	$subtitle_hover = YSettings::gWPML('theme_grid_subtitle_hover_'.$blockIndex, YSettings::g('theme_grid_subtitle_hover_'.$blockIndex));
	$icon = YSettings::g('theme_grid_icon_'.$blockIndex, 'fa fa-leaf');
	$iconImage = YSettings::g('theme_grid_icon_image_'.$blockIndex);

	$showIcon = true;
	if ($icon == 'no-icon') {
		$showIcon = false;
	}

	if ($iconImage != '') {
		$image = explode('.', $iconImage);
		$image[count($image)-2] = $image[count($image)-2] . '-40x40';
		$iconImage = implode('.', $image);
	}

	$backgroundImage = YSettings::g('theme_grid_background_image_'.$blockIndex, '');
	
	$detect = new Barnelli_Mobile_Detect();

	if ($detect->isMobile()) {
		$imageSize = 'grid_square';
	}

	if ($backgroundImage != '') {
		$image = explode('.', $backgroundImage);
		$bgImg = $backgroundImage;

		$image_size = barnelli_get_image_size($imageSize);

		$image[count($image)-2] = $image[count($image)-2] . '-'.$image_size['width'].'x'.$image_size['height'];

		$backgroundImage = implode('.', $image);

		$tmp = explode('/wp-content/uploads/', $backgroundImage);
		$wpUploadDir = wp_upload_dir();
		$imagePath = $wpUploadDir['basedir'] . $tmp[1];

		if (!file_exists($imagePath)) {
			$backgroundImage = $bgImg;
		}
	} else {
		$backgroundImage = false;
	}

	switch ($function) {

		case 'facebook':
			require_once THEME_INCLUDES . "/Facebook/facebook.php";
			$appId = YSettings::g('facebook_app_id');
			$appSecret = YSettings::g('facebook_app_secret');

			if (!empty($appId) && !empty($appSecret)) {
				$facebook = new Facebook(array(
					'appId'  => YSettings::g('facebook_app_id'),
					'secret' => YSettings::g('facebook_app_secret'),
				));

				$pageFeed = $facebook->api($functionValue . '/feed', "GET", array('limit' => ($functionValueNumber) ? $functionValueNumber : 5));

				if ($iconImage != '') {
					$output = '<img class="icon" src='.$iconImage.' alt="" />';
				} else {
					if ($showIcon) {
						$output = '<i class="'.$icon.'"></i>';
					} else {
						$output = '';
					}
				}
				
				$output .= '<div id="carousel-menu" class="carousel-menu owl-carousel owl-theme carousel-facebook">';

				foreach ($pageFeed['data'] as $key => $post) {
					if (isset($post['message']) && isset($post['created_time'])) {
						$pic = isset($post['picture']) ? '<img src="' . str_replace('_s.jpg', '_o.jpg', $post['picture']) . '" alt="" />' : '';
						$link = isset($post['link']) ? $post['link'] : '';
						$output .= '<div class="item square-item">' . $pic;
						$output .= '<a href="'.$link.'"><div class="square-post-hover"><p class="title-fb">'. $post['message'] . '</p> <p class="title-ago">' . barnelli_timeElapsed(strtotime($post['created_time'])) . '</p></div></a>';
						$output .= '</div>';
					}
				}

				$output .= '</div>';
			} else {
				$output = 'Set facebook App Id & App Secret';
			}

			return $output;
			break;




		case 'twitter':
			require_once THEME_INCLUDES . '/TwitterOAuth/Exception/TwitterException.php';
			require_once THEME_INCLUDES . '/TwitterOAuth/TwitterOAuth.php';

			$config = array(
				'consumer_key' => YSettings::g('twitter_consumer_key'),
				'consumer_secret' => YSettings::g('twitter_consumer_secret'),
				'oauth_token' => YSettings::g('twitter_oauth_token'),
				'oauth_token_secret' => YSettings::g('twitter_oauth_token_secret'),
				'output_format' => 'object'
			);

			$tw = new TwitterOAuth($config);

			$params = array(
				'screen_name' => $functionValue,
				'count' => ($functionValueNumber) ? $functionValueNumber : 5,
				'exclude_replies' => true
			);

			$response = $tw->get('statuses/user_timeline', $params);

			if ($iconImage != '') {
				$output = '<img class="icon" src='.$iconImage.' alt="" />';
			} else {
				if ($showIcon) {
					$output = '<i class="'.$icon.'"></i>';
				} else {
					$output = '';
				}
			}

			$output .= '<div id="carousel-menu" class="carousel-menu owl-carousel owl-theme carousel-twitter">';

			foreach ($response as $key => $tweet) {
				$output .= '<div class="item square-item">' . barnelli_replaceURLWithHTMLLinks($tweet->text) . " " . barnelli_timeElapsed(strtotime($tweet->created_at)) . '</div>';
			}

			$output .= '</div>';

			return $output;
			break;



		case 'page':
			global $post;

			// get page featured image
			if (function_exists('icl_get_languages')) {
				$functionValue = YSettings::g('theme_grid_function_value_'.ICL_LANGUAGE_CODE.'_'.$blockIndex);
			}

			if (has_post_thumbnail( $functionValue )) {
				$feature_image_id = get_post_thumbnail_id($functionValue); 
				$image = wp_get_attachment_image_src( $feature_image_id, $imageSize );
				$backgroundImage = $image[0];
			}

			if ($iconImage != '') {
				$output = '<img class="icon" src='.$iconImage.' alt="" />';
			} else {
				if ($showIcon) {
					$output = '<i class="'.$icon.'"></i>';
				} else {
					$output = '';
				}
			}

			$output .= '<a href="'.get_page_link($functionValue).'">';
			$output .= ($backgroundImage) ? '<div class="square-bg" style="background-image:url('.$backgroundImage.')"></div>' : '';

			if (($title != '') || ($subtitle != '')) {
				$output .= '<div class="square-header">';
				if ($title != '') {
					$output .= '<p class="title">'.barnelli_replaceStrong($title).'</p>';
				}
				if ($subtitle != '') {
					$output .= '<p class="description">'.barnelli_replaceStrong($subtitle).'</p>';
				}
				$output .= '</div>';
			}

			if (($title_hover != '') || ($subtitle_hover != '')) {
				$output .='<div class="square-post-hover">';
				if ($title_hover != '') {
					$output .= '<p class="title">'.barnelli_replaceStrong($title_hover).'</p>';
				}
				if ($subtitle_hover != '') {
					$output .= '<p class="description">'.barnelli_replaceStrong($subtitle_hover).'</p>';
				}
				$output .= '</div>';
			}

			$output .='</a>';

			return $output;

			break;



		case 'slider_category':
			global $post;
			// get n latet post from this category and if have feature image replace each backgroundImage with it
			$category = $functionValue;
			$idObj = get_category_by_slug($category);
			$id = $idObj->cat_ID;
			$args = array(
				'cat' => $id,
				'posts_per_page' => $functionValueNumber,
				'orderby' => 'date',
				'order' => 'DESC'
			);

			if ($iconImage != '') {
				$output = '<img class="icon" src='.$iconImage.' alt="" />';
			} else {
				if ($showIcon) {
					$output = '<i class="'.$icon.'"></i>';
				} else {
					$output = '';
				}
			}

			$output .= '<div id="carousel-menu" data-slide-duration="'.$functionValueDuration.'" class="carousel-menu owl-carousel owl-theme restaurant-carousel">';

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$backgroundImage = false;

					$the_query->the_post();
					if ( has_post_thumbnail()) {
						$image_id = get_post_thumbnail_id();
						$image = wp_get_attachment_image_src($image_id, $imageSize, true);
						if (YSettings::g('restaurant_overwrite_block_image_with_featured', '1') == '1') {
							$backgroundImage = $image[0];
						}
					}

					$content = get_the_content();

					if (get_post_format() == 'video') {
						$output .= '<div class="item square-item">';
						if ((strpos($content, 'youtube.com') !== false) || (strpos($content, 'youtu.be') !== false)) {
							$link = barnelli_findLink($content);
							$videoId = barnelli_getYoutubeId($link);
							if ($videoId) {
								$output .= '<iframe id="ytplayer" type="text/html" width="'.$videoWidth.'" height="'.$videoHeight.'" src="https://www.youtube.com/embed/'.$videoId.'?autoplay='.YSettings::g('video_auto_play', '1').'&controls='.YSettings::g('video_show_controls', '1').'&showinfo=0" frameborder="0"></iframe>';	
							}
							
						} else if (strpos($content, 'vimeo.com') !== false) {
							$link = barnelli_findLink($content);
							$videoId = barnelli_getVimeoId($link);
							if ($videoId) {
								$output .= '<iframe src="//player.vimeo.com/video/'.$videoId.'" width="'.$videoWidth.'" height="'.$videoHeight.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
							}
						}
						$output .= '</div>';
					} else {

					$output .= '<a href="'.get_permalink().'"><div class="item square-item">';
					$output .= ($backgroundImage) ? '<div class="square-bg" style="background-image:url('.$backgroundImage.')"></div>' : '';

					if (($title != '') || ($subtitle != '')) {
						$output .= '<div class="square-header">';
						if ($title != '') {
							$output.='<p class="title">'.barnelli_replaceStrong($title).'</p>';
						}
						if ($subtitle != '') {
							$output .= '<p class="description">'.barnelli_replaceStrong($subtitle).'</p>';
						}

						$output .= '</div>';
					}
						$output .= '<div class="square-post">';
						$output .= '<p class="title">'.barnelli_replaceStrong($post->post_title).'</p><p class="description">'.barnelli_the_excerpt_max_charlength($excerptLength).'</p>';
						$output .= '</div>';
					//}

					$output .= '</div></a>';
					}
				}
			}



			$output .= '</div>';

			wp_reset_postdata();

		return $output;

			break;




		case 'events':
			global $post;

			if ($iconImage != '') {
				$output = '<img class="icon" src='.$iconImage.' alt="" />';
			} else {
				if ($showIcon) {
					$output = '<i class="'.$icon.'"></i>';
				} else {
					$output = '';
				}
			}

			$output .= '<div id="carousel-menu" data-slide-duration="'.$functionValueDuration.'" class="carousel-menu owl-carousel owl-theme restaurant-carousel">';

			$args = array(
				'post_type' => 'eventcalendar',
				'posts_per_page' => $functionValueNumber,
				'oderby' => 'date',
				'order' => 'DESC'
			);

			$the_query = new WP_Query($args);

			$events = array();

			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$postMeta = new BarnelliPostMetaInfo(get_post_custom($post->ID));

					$tmpEventDate = str_replace('/', '-', $postMeta->get('event_start_date'));
					$eventDate = date("Y-m-d", strtotime($tmpEventDate));
					$post->eventDate = $eventDate;
					$post->startDate = $postMeta->get('event_start_date');
					$post->endDate = $postMeta->get('event_end_date');
					$post->paymentLink = $postMeta->get('event_payment_link');
					$post->additionalInfo = $postMeta->get('event_additional_info');
					$post->postMonthYear = $postMeta->get('event_start_date_monthyear');
					$post->venue = $postMeta->get('event_venue');
					$post->location = $postMeta->get('event_location');
					$post->price = $postMeta->get('event_price');
					$post->startTime = $postMeta->get('event_start_time');
					$post->endTime = $postMeta->get('event_end_time');
					$post->backgroundImage = $postMeta->get('event_poster_image');
					$post->eventPermalink = get_permalink();
					$events[] = $post;
				}
			}

			wp_reset_postdata();

			// Change events order and pick only with >= curr_date
			if ($functionValue == 'upcoming') {
				usort($events, "barnelli_sortFunction");
			}

			$i = 0;
			$max = $functionValueNumber;

			foreach ($events as $key => $event) {
				if ($i < $max) {

					if ( ($functionValue == 'upcoming') && (strtotime($event->eventDate) < strtotime(date('Y-m-d'))) ) {
						continue;
					}

					$startDate = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $event->startDate))));

					$output .= '<a href="'.$event->eventPermalink.'"><div class="item square-item">';
					$output .= ($event->backgroundImage) ? '<div class="square-bg" style="background-image:url('.$event->backgroundImage.')"></div>' : '';

					$output .= '<div class="square-header">';
					$output .= '	<p class="title">'.$event->post_title.'</p>';
					$output .= '	<p class="description">'.$startDate .' <strong>'.$event->price.'</strong></p>';
					$output .= '</div>';

					$output .= '<div class="square-post">';
					$output .= '	<p class="title">'.$event->venue.'</p><p class="description">'.$event->location.'</p>';
					$output .= '</div>';

					$output .= '</div></a>';
					$i++;
				}
			}

			// if ($i == 0) {
			// 	$title = 
			// 	$output .= '<a href="#"><div class="item square-item">';
			// 	$output .= ($backgroundImage) ? '<div class="square-bg" style="background-image:url('.$backgroundImage.')"></div>' : '';

			// 	$output .= '<div class="square-header">';
			// 	$output .= '	<p class="title">'.$title.'</p>';
			// 	$output .= '	<p class="description">'.$subtitle .' </p>';
			// 	$output .= '</div>';

			// 	$output .= '<div class="square-post">';
			// 	$output .= '	<p class="title">'.$title_hover.'</p><p class="description">'.$subtitle_hover.'</p>';
			// 	$output .= '</div>';

			// 	$output .= '</div></a>';
			// }

			$output .= '</div>';

			return $output;

			break;






		case 'custom_code':
			$centered = $functionValueNumber;

			if ($centered == 'yes') {
				$output = '<div style="display:table;width:100%;height:100%;"><div style="display:table-cell;vertical-align:middle;text-align:center;">'.do_shortcode($functionValue).'</div></div>';	
			} else {
				$output = do_shortcode($functionValue);
			}

			return $output;

			break;





		case 'map':

			$centerPositionLat = YSettings::g('contact_map_center_lat', 51);
			$centerPositionLng = YSettings::g('contact_map_center_lng', 0);
			$markerPositionLat = YSettings::g('contact_map_marker_lat', 51);
			$markerPositionLng = YSettings::g('contact_map_marker_lng', 0);
			$zoomLevel = YSettings::g('contact_map_zoom_level', 8);
			$markerImage = YSettings::g('contact_map_marker_image', '');
			$mapStyle = (YSettings::g('contact_map_style', 'grayscale') == 'grayscale') ? '[{"stylers": [{"saturation": "-100"}]}];' : '[];';

			$mapType = YSettings::g("contact_map_type", "roadmap");
			if ($mapType == 'raodmap') {
				$mapType = 'roadmap';
			}


			

			//$output = '<img src="http://maps.googleapis.com/maps/api/staticmap?center='.$centerPositionLat.','.$centerPositionLng.'&zoom='.$zoomLevel.'&size='.$videoWidth.'x'.$videoHeight.'&sensor=false">';

			$output = '<div id="map_'.$blockIndex.'" class="map map_block_'.$blockIndex.'" style="background:transparent;height:100%;width:100%;"></div>
			<script type="text/javascript">
			$ = jQuery.noConflict();
			function initializeMap() {
				var map;
				var centerPosition = new google.maps.LatLng('.$centerPositionLat.', '.$centerPositionLng.');
				var markerPosition = new google.maps.LatLng('.$markerPositionLat.', '.$markerPositionLng.');
				var zoomLevel = '.$zoomLevel.';
				var marker = false;
				var markerImage = \'' . $markerImage . '\';
				var mapTypeId = \'' . $mapType . '\';

				var style = \'' . $mapStyle . '\';

				var options = {
					zoom: zoomLevel,
					center: centerPosition,
					styles:style,
					scrollwheel: false,
					mapTypeId: mapTypeId,
					zoomControl: true,
					zoomControlOptions:{
						style: google.maps.ZoomControlStyle.SMALL
					}
				};

				map = new google.maps.Map(document.getElementById("map_'.$blockIndex.'"), options);

				var image = {
					url: markerImage,
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(12, 59)
				};

				if (markerImage == "") {
					marker = new google.maps.Marker({
						position: centerPosition,
						title: "Location",
						map: map,
						draggable: false
					});
				} else {
					marker = new google.maps.Marker({
						position: centerPosition,
						title: "Location",
						map: map,
						icon: image,
						draggable: false
					});
				}

				setTimeout(function() {
					var center = map.getCenter();
					google.maps.event.trigger(map, "resize");
					map.setCenter(center);
				}, 1000);
			}
			initializeMap();
			</script>';

			if (($title != '') || ($subtitle != '')) {
				$output .= '<div class="square-header">';
				if ($title != '') {
					$output .= '<p class="title">'.barnelli_replaceStrong($title).'</p>';
				}
				if ($subtitle != '') {
					$output .= '<p class="description">'.barnelli_replaceStrong($subtitle) .'</p>';
				}
				$output .= '</div>';
			}

			$output .= '<div class="square-post-hover">
				<p class="title">'.barnelli_replaceStrong($title_hover).'</p>
				<p class="description">'.barnelli_replaceStrong($subtitle_hover).'</p>
			</div>';

			return $output;
			break;

		case 'category':
		
			global $post;

			// get latet post from this category if have feature image replace backgroundImage with it
			$category = $functionValue;
			$idObj = get_category_by_slug($category);

			$id = $idObj->cat_ID;
			$output = '';

			$args = array(
				'cat' => $id,
				'posts_per_page' => 1,
				'orderby' => 'date',
				'order' => 'DESC'
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					if ( has_post_thumbnail()) {
						$image_id = get_post_thumbnail_id();
						$image = wp_get_attachment_image_src($image_id, $imageSize, true);
						if (YSettings::g('restaurant_overwrite_block_image_with_featured', '1') == '1') {
							$backgroundImage = $image[0];	
						}
						
					}
					$content = get_the_content();

					if (get_post_format() == 'video') {
						if ((strpos($content, 'youtube.com') !== false) || (strpos($content, 'youtu.be') !== false)) {
							$link = barnelli_findLink($content);
							$videoId = barnelli_getYoutubeId($link);
							if ($videoId) {
								$output .= '<iframe id="ytplayer" type="text/html" width="'.$videoWidth.'" height="'.$videoHeight.'" src="https://www.youtube.com/embed/'.$videoId.'?autoplay='.YSettings::g('video_auto_play', '1').'&controls='.YSettings::g('video_show_controls', '1').'&showinfo=0" frameborder="0"></iframe>';	
							}
							
						} else if (strpos($content, 'vimeo.com') !== false) {
							$link = barnelli_findLink($content);
							$videoId = barnelli_getVimeoId($link);
							if ($videoId) {
								$output .= '<iframe src="//player.vimeo.com/video/'.$videoId.'" width="'.$videoWidth.'" height="'.$videoHeight.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
							}
						}
					} else {
						if ($iconImage != '') {
							$output .= '<img class="icon" src='.$iconImage.' alt="" />';
						} else {
							if ($showIcon) {
								$output .= '<i class="'.$icon.'"></i>';
							}
						}

						$output .= '<a href="'.get_permalink().'">';
						$output .= ($backgroundImage) ? '<div class="square-bg" style="background-image:url('.$backgroundImage.')"></div>' : '';

						

						if (($title != '') || ($subtitle != '')) {
							$output .= '<div class="square-header">';
							if ($title != '') {
								$output .= '<p class="title">'.barnelli_replaceStrong($title).'</p>';
							}
							if ($subtitle != '') {
								$output .= '<p class="description">'.barnelli_replaceStrong($subtitle) .'</p>';
							}
							$output .= '</div>';
						}

						$output .= '<div class="square-post">
							<p class="title">'.barnelli_replaceStrong($post->post_title).'</p>
							<p class="description">'.barnelli_the_excerpt_max_charlength($excerptLength).'</p>
						</div>';
						
						$output .='</a>';	
					}
					
					return $output;
				}
			}

			wp_reset_postdata();

			break;




		case 'link':
			if ($iconImage != '') {
				$output = '<img class="icon" src='.$iconImage.' alt="" />';
			} else {
				if ($showIcon) {
					$output = '<i class="'.$icon.'"></i>';
				} else {
					$output = '';
				}
			}

			if (function_exists('icl_get_languages')) {
				$functionValue = YSettings::g('theme_grid_function_value_'.ICL_LANGUAGE_CODE.'_'.$blockIndex);
			}

			$link = $functionValue;
			$target = ($functionValueNumber == 'yes') ? ' data-djax-exclude="true" target="_blank" ' : '';

			$output .= '<a '.$target.'href="'.$link.'">';
			$output .= ($backgroundImage) ? '<div class="square-bg" style="background-image:url('.$backgroundImage.')"></div>' : '';
			
			if (($title != '') || ($subtitle != '')) {
				$output .='<div class="square-header">';
				if ($title != '') {
					$output .= '<p class="title">'.barnelli_replaceStrong($title).'</p>';
				}
				if ($subtitle != '') {
					$output .= '<p class="description">'.barnelli_replaceStrong($subtitle).'</p>';
				}
				$output .= '</div>';
			}

			if (($title_hover != '') || ($subtitle_hover != '')) {
				$output .='<div class="square-post-hover">';
				if ($title_hover != '') {
					$output .= '<p class="title">'.barnelli_replaceStrong($title_hover).'</p>';
				}
				if ($subtitle_hover != '') {
					$output .= '<p class="description">'.barnelli_replaceStrong($subtitle_hover).' </p>';
				}
				
				$output .= '</div>';
			}
			$output .= '</a>';
			return $output;

			break;



		case 'opening_hours':
			$currTime = date('H:i:s');
			$currDate = date('Y-m-d');

			$openingTimes = barnelli_openingTimes($currDate, $currTime, false);

			$openClosed = $openingTimes['label'];

			$out =  ($backgroundImage) ? '<div class="square-bg" style="background-image:url('.$backgroundImage.')"></div>' : '';

			if ($iconImage != '') {
				$out .= '<img class="icon" src='.$iconImage.' alt="" />';
			} else {
				if ($showIcon) {
					$out .= '<i class="'.$icon.'"></i>';
				}
			}

			$currentDayOfWeek = YSettings::gWPML('theme_'.strtolower(date('l')).'_long', YSettings::g('theme_'.strtolower(date('l')).'_long', date('l')));
			$openingLabel = barnelli_replaceStrong($openClosed);

			$format = YSettings::g('opening_times_format', '24h');
			$closed = YSettings::gWPML('reservation_closed', YSettings::g('reservation_closed', 'Closed'));

			//Check for current hours override
			if ($functionValue == 'yes') {
				$day = strtolower(date('l'));
				$open = YSettings::g('theme_'.$day.'_open', 'Closed');
				$close = YSettings::g('theme_'.$day.'_close', 'Closed');
				$open_second = YSettings::g('theme_'.$day.'_open_second', '-');
				$close_second = YSettings::g('theme_'.$day.'_close_second', '-');

				if ($format == '24h') {
					$openings = '';
					if ( ($open == 'Closed') && (($open_second != '-') && ($close_second != '-'))) {
						$openings .= $open_second . ' - ' . $close_second;
					} else {
						$openings .= ($open == 'Closed') ? $closed : $open . ' - ' . $close;
					}

					if ($open != 'Closed') {
						if (($open_second != '-') && ($close_second != '-')) {
							$openings .= '<br/><i>' . $open_second . ' - ' . $close_second . '</i>';
						}
					}
				} else {
					$openings = '';
					if ( ($open == 'Closed') && (($open_second != '-') && ($close_second != '-'))) {
						$openings .= date("g:i a", strtotime($open_second)) . ' - ' . date("g:i a", strtotime($close_second));
					} else {
						$openings .= ($open == 'Closed') ? $closed : date("g:i a", strtotime($open)) . ' - ' . date("g:i a", strtotime($close));
					}

					if ($open != 'Closed') {
						if (($open_second != '-') && ($close_second != '-')) {
							$openings .= '<br/><i>' . date("g:i a", strtotime($open_second)) . ' - ' . date("g:i a", strtotime($close_second)) . '</i>';
						}
					}
				}

				$openingLabel = $openings;
			}

			//Override by custom title and subtitle
			if ($title != '') {
				$currentDayOfWeek = $title;
			}

			if ($subtitle != '') {
				$openingLabel = $subtitle;
			}

			$out .= '<div class="square-header">
				<p class="title">'. barnelli_replaceStrong($currentDayOfWeek)  .'</p>
				<p class="description">'. barnelli_replaceStrong($openingLabel) .'</p>
			</div>
			<div class="square-post">
				<ul class="days">';

					$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
					$shortDays = array('Mo.', 'Tu.', 'We.', 'Th.', 'Fr.', 'Sa.', 'Su.');
					$i=0;

					$detect = new Barnelli_Mobile_Detect();

					foreach ($days as &$day) {
						$open = YSettings::g('theme_'.$day.'_open', 'Closed');
						$close = YSettings::g('theme_'.$day.'_close', 'Closed');

						$open_second = YSettings::g('theme_'.$day.'_open_second', '-');
						$close_second = YSettings::g('theme_'.$day.'_close_second', '-');

						if ($format == '24h') {
							$openings = '';

							if ( ($open == 'Closed') && (($open_second != '-') && ($close_second != '-'))) {
								$openings .= $open_second . ' - ' . $close_second;
							} else {
								$openings .= ($open == 'Closed') ? $closed : $open . ' - ' . $close;
							}

							if ($open != 'Closed') {
								if (($open_second != '-') && ($close_second != '-')) {
									$openings .= ' <i> / ' . $open_second . ' - ' . $close_second . '</i>';
								}
							}

							if ($detect->isMobile()) {
								$out .= '<li>
								<span class="small-day">'.YSettings::gWPML('theme_'.$day.'_short', YSettings::g('theme_'.$day.'_short', $shortDays[$i])).' </span>
								<span class="large-day">'.YSettings::gWPML('theme_'.$day.'_short', YSettings::g('theme_'.$day.'_short', ucfirst($shortDays[$i]))).' </span>
								<strong>'.$openings.'</strong>
								</li>';
							} else {
								$out .= '<li>
								<span class="small-day">'.YSettings::gWPML('theme_'.$day.'_short', YSettings::g('theme_'.$day.'_short', $shortDays[$i])).' </span>
								<span class="large-day">'.YSettings::gWPML('theme_'.$day.'_long', YSettings::g('theme_'.$day.'_long', ucfirst($days[$i]))).' </span>
								<strong>'.$openings.'</strong>
								</li>';	
							}
						} else {
							$openings = '';

							if (($open == 'Closed') && (($open_second != '-') && ($close_second != '-'))) {
								$openings .= date("g:i a", strtotime($open_second)) . ' - ' . date("g:i a", strtotime($close_second));
							} else {
								$openings .= ($open == 'Closed') ? $closed : date("g:i a", strtotime($open)) . ' - ' . date("g:i a", strtotime($close));
							}

							if ($open != 'Closed') {
								if (($open_second != '-') && ($close_second != '-')) {
									$openings .= ' <i> / ' . date("g:i a", strtotime($open_second)) . ' - ' . date("g:i a", strtotime($close_second)) . '</i>';
								}
							}

							if ($detect->isMobile()) {
								$out .= '<li>
									<span class="small-day">'.YSettings::gWPML('theme_'.$day.'_short', YSettings::g('theme_'.$day.'_short', $shortDays[$i])).' </span>
									<span class="large-day">'.YSettings::gWPML('theme_'.$day.'_short', YSettings::g('theme_'.$day.'_short', ucfirst($shortDays[$i]))).' </span>
									<strong>'.$openings.'</strong>
									</li>';
							} else {
								$out .= '<li>
									<span class="small-day">'.YSettings::gWPML('theme_'.$day.'_short', YSettings::g('theme_'.$day.'_short', $shortDays[$i])).' </span>
									<span class="large-day">'.YSettings::gWPML('theme_'.$day.'_long', YSettings::g('theme_'.$day.'_long', ucfirst($days[$i]))).' </span>
									<strong>'.$openings.'</strong>
									</li>';
							}
						}
						$i++;
					}

				$out .= '</ul>
			</div>';
			return $out;

			break;



		case 'none':
			if ($iconImage != '') {
				$output = '<img class="icon" src='.$iconImage.' alt="" />';
			} else {
				if ($showIcon) {
					$output = '<i class="'.$icon.'"></i>';
				} else {
					$output = '';
				}
			}
			$link = $functionValue;
			$output .= ($backgroundImage) ? '<div class="square-bg" style="background-image:url('.$backgroundImage.')"></div>' : '';

			if (($title != '') || ($subtitle != '')) {
				$output .='<div class="square-header">';
				if ($title != '') {
					$output .= '<p class="title">'.barnelli_replaceStrong($title).'</p>';
				}
				if ($subtitle != '') {
					$output .= '<p class="description">'.barnelli_replaceStrong($subtitle).'</p>';
				}
				$output .= '</div>';
			}

			if (($title_hover != '') || ($subtitle_hover != '')) {
				$output .='<div class="square-post-hover">';
				if ($title_hover != '') {
					$output .= '<p class="title">'.barnelli_replaceStrong($title_hover).'</p>';
				}
				if ($subtitle_hover != '') {
					$output .= '<p class="description">'.barnelli_replaceStrong($subtitle_hover).'</p>';
				}
					
				$output .= '</div>';
			}
			return $output;
			break;
		default:
			return '';

			break;
	}
}

/**
 * Return next month or 1 if excedded
 * 
 * @param type $month 
 * @param type $zerofill fill to 0X format
 * @return mixed
 */
function barnelli_prevMonth($month, $zerofill = false) {
	$prevMonth = $month == 1 ? 12 : $month-1;
	return $zerofill ? str_pad($prevMonth, 2, "0", STR_PAD_LEFT) : $prevMonth;
}

/**
 * Return prev month or 12 if excedded
 * 
 * @param type $month
 * @param type $zerofill fill to 0X format
 * @return mixed
 */
function barnelli_nextMonth($month, $zerofill = false) {
	$nextMonth = $month == 12 ? 1 : $month+1;
	return $zerofill ? str_pad($nextMonth, 2, "0", STR_PAD_LEFT) : $nextMonth;
}

/**
 * Generate array to build calendar
 * 
 * @param type $month
 * @param type $year
 * @return array
 */
function barnelli_generateDaysArray($month, $year) {
	$currentMonth = $month;
	$prevMonth = barnelli_prevMonth($month);
	$nextMonth = barnelli_nextMonth($month);
	$daysInMonth = date('t', mktime(0, 0, 0, $month, 1, $year));
	$daysInPrevMonth = date('t', mktime(0, 0, 0, $prevMonth, 1, $year));

	$fomts = mktime(0, 0, 0, $month, 1, $year);
	$firstFallsOn = (int)date("w", $fomts) - 1;

	$days = array();

	if($firstFallsOn == 0) {
		$class = '';
		$day = 0;
	} else {
		$class = 'prev-month';
		$day = $daysInPrevMonth - ($firstFallsOn);
		$month = $prevMonth;
	}

	$firstStep = $daysInPrevMonth; $secondStep = $daysInMonth;

	for($i = 1; $i <= 42; $i++) {
		$day++;
		$days[] = array(
			'day' => $day,
			'month' => $month,
			'class' => $class
		);

		if($firstFallsOn == 0) {
			 if($day == $secondStep) {
				$day = 0; $secondStep = -1;
				$month = $nextMonth; $class = 'next-month';
			 }
		} else {
			if (($day == $firstStep) && ($firstStep != -1)) {
				$day = 0; $firstStep = -1;
				$month = $currentMonth; $class = '';
			} else if(($day == $secondStep) && ($firstStep == -1)) {
				$day = 0; $secondStep = -1;
				$month = $nextMonth; $class = 'next-month';
			}
		}
	}

	return $days;
}

/**
 * Returns translated ordinal name of number
 * 
 * @param type $n
 * @return type
 */

function barnelli_ordinal($n) {
	$daysOrdinal = array(
		0 => __("th", THEME_NAME),
		1 => __("st", THEME_NAME),
		2 => __("nd", THEME_NAME),
		3 => __("rd", THEME_NAME)
	);

	$v = $n % 100;
	if(isset($daysOrdinal[ ($v-20) % 10 ])) return $daysOrdinal[ ($v-20) % 10 ];
	else if(isset($daysOrdinal[$v])) return $daysOrdinal[$v];
	else return $daysOrdinal[0];
}

function barnelli_monthName($month) {
	$monthsNames = array(
		1 => __('January', THEME_NAME),
		2 => __('February', THEME_NAME),
		3 => __('March', THEME_NAME),
		4 => __('April', THEME_NAME),
		5 => __('May', THEME_NAME),
		6 => __('June', THEME_NAME),
		7 => __('July', THEME_NAME),
		8 => __('August', THEME_NAME),
		9 => __('September', THEME_NAME),
	   10 => __('October', THEME_NAME),
	   11 => __('November', THEME_NAME),
	   12 => __('December', THEME_NAME)
	);
	
	return $monthsNames[$month];
}

function barnelli_contactInfo() {
?>
<!-- info & find us on -->
<div class="col-md-4">
	<div class="info">
		<h1><?php echo YSettings::gWPML( 'multiple_contact_info_header', YSettings::g( 'multiple_contact_info_header', '' ) ); ?></h1>
		<p><?php echo YSettings::gWPML( 'multiple_contact_info_content', YSettings::g( 'multiple_contact_info_content', '' ) ); ?></p>
	</div>
	<div class="social-media">
		<h1><?php echo YSettings::gWPML( 'multiple_contact_social_header', YSettings::g( 'multiple_contact_social_header','' ) ); ?></h1>
		<ul class="social-icon">
			<?php
			$socialsString = YSettings::g('theme_social_order', 'fivehundredpx,aboutme,addme,amazon,aol,appstorealt,appstore,apple,bebo,behance,bing,blip,blogger,coroflot,daytum,delicious,designbump,designfloat,deviantart,diggalt,digg,dribble,drupal,ebay,email,emberapp,etsy,facebook,feedburner,flickr,foodspotting,forrst,foursquare,friendsfeed,friendstar,gdgt,github,githubalt,googlebuzz,googleplus,googletalk,gowallapin,gowalla,grooveshark,heart,hyves,icondock,icq,identica,imessage,itunes,lastfm,linkedin,meetup,metacafe,mixx,mobileme,mrwong,msn,myspace,newsvine,paypal,photobucket,picasa,pinterest,podcast,posterous,qik,quora,reddit,retweet,rss,scribd,sharethis,skype,slashdot,slideshare,smugmug,soundcloud,spotify,squidoo,stackoverflow,star,stumbleupon,technorati,tumblr,twitterbird,twitter,viddler,vimeo,virb,www,wikipedia,windows,wordpress,xing,yahoobuzz,yahoo,yelp,youtube,instagram');
			$socials = explode(',', $socialsString);
			
			global $barnelli_mobileIcons;

			foreach ($socials as $social) :
				
				if ( YSettings::g( 'theme_'.$social, '' ) != '' ) : ?>
				<?php $window = (YSettings::g('share_new_window', '0') == '1') ? 'target="_blank"' : ''; ?>
				<li>
					<?php if (strstr($social, 'socicon')) :?>
					<a <?php echo $window; ?> href="<?php echo YSettings::g( 'theme_'.$social ); ?>"><i class="socicon"><?php echo $barnelli_mobileIcons[$social];?></i></a>
					<?php else: ?>
					<a <?php echo $window; ?> href="<?php echo YSettings::g( 'theme_'.$social ); ?>"><i class="monosymbol"><?php echo $barnelli_mobileIcons[$social];?></i></a>
					<?php endif; ?>
				</li>
				<?php endif;
			endforeach;
			?>
		</ul>
	</div>
</div>
<!-- end info & find us on -->
<?php
}

function barnelli_addressInfo($location) {
?>
<!-- phone and andress -->
<div class="col-md-4">
	<div class="vcard">
		<h1><?php echo $location['header']; ?></h1>
		<p class="adr"><?php echo do_shortcode(str_replace("\n", "<br/>", $location['address'])); ?></p>
	</div>
</div>
<!-- end phone and andress -->
<?php
}

function barnelli_contactForm() {
?>
<!-- contact form -->
<div class="col-md-4">
	<form id="contact-form" name="contact-form" method="post" data-multiple="true">
		<?php if( YSettings::gWPML( 'multiple_contact_form_header', YSettings::g( 'multiple_contact_form_header' ) ) ) : ?>
		<h1><?php echo YSettings::gWPML( 'multiple_contact_form_header', YSettings::g( 'multiple_contact_form_header' ) ); ?></h1>
		<?php endif; ?>
		
		<div class="input-wrapper">
			<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'multiple_contact_placeholder_name' , YSettings::g( 'multiple_contact_placeholder_name' , 'name')); ?>" name="form-name" id="form-name">
		</div>
		
		<div class="input-wrapper">
			<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'multiple_contact_placeholder_email' , YSettings::g( 'multiple_contact_placeholder_email' ,'e-mail')); ?>" name="form-email" id="form-email">
		</div>	
		
		<div class="input-wrapper">
			<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'multiple_contact_placeholder_subject', YSettings::g( 'multiple_contact_placeholder_subject', 'subject' ) ); ?>" name="form-subject" id="form-subject">
		</div>
		
		<div class="message">
			<div class="input-wrapper">
				<input type="hidden" name="form-type" value="multiple" />
				<textarea class="contact-form" placeholder="<?php echo YSettings::gWPML( 'multiple_contact_placeholder_text' , YSettings::g( 'multiple_contact_placeholder_text' , 'message')); ?>" name="form-message" id="form-message"></textarea>
			</div>
		</div>
		<?php if (YSettings::g('multiple_contact_captcha_enabled','1') == '1') : ?>
		<div class="message">
			<div class="input-wrapper">
				<div class="captcha-container">
					<div> 
						<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'multiple_contact_captcha_placeholder', YSettings::g( 'multiple_contact_captcha_placeholder', 'captcha' ) ); ?>" name="form-captcha" id="form-captcha" />
						<?php
						$captchaType = YSettings::g('multiple_contact_captcha_type', 'mathematic');
						$captchaStringLength = YSettings::g('multiple_contact_captcha_string_length', '6');
						$captchaParameter = 'type=' . $captchaType;

						if ($captchaType == 'string') {
							if ($captchaStringLength > 8) {
								$captchaStringLength = 8;
							}
							if ($captchaStringLength < 2) {
								$captchaStringLength = 2;
							}
							$captchaParameter .= '&length=' . (int)$captchaStringLength;
						}
						?>
						<img id="captcha" src="<?php echo THEME_INCLUDES_URI . '/securimage/securimage_show.php?' . $captchaParameter; ?>" alt="CAPTCHA" />
						<button class="refresh-captcha" data-captcha-type="<?php echo $captchaType; ?>" data-captcha-string-length="<?php echo $captchaStringLength;?>" ><i class="fa fa-refresh"></i></button>
					</div> 	
				</div>
			</div>
		</div>
		<?php endif;?>
		<?php if (YSettings::g('reservation_terms')) : ?>
		<div class="input-wrapper message">
			<input type="checkbox" name="terms" id="form-terms" /> <?php echo YSettings::gWPML( 'multiple_contact_terms', YSettings::g( 'multiple_contact_terms', 'I Accept <a href="#">Terms</a>' ) ); ?>
		</div>
		<?php endif; ?>

		<div class="alert alert-success hidden"><?php echo YSettings::gWPML( 'multiple_contact_placeholder_message_send', YSettings::g( 'multiple_contact_placeholder_message_send' ) ); ?></div>
		<div class="alert alert-danger hidden"><?php echo YSettings::gWPML( 'multiple_contact_placeholder_message_fail', YSettings::g( 'multiple_contact_placeholder_message_fail', 'Error occurred! Try again later!' ) ); ?></div>

		<div>
			<input type="submit" value="<?php echo YSettings::gWPML( 'multiple_contact_placeholder_button', YSettings::g( 'multiple_contact_placeholder_button', 'send' ) ); ?>" class="buttonform">
		</div>	
	</form>
</div>
<!-- end contact form -->
<?php
}
?>