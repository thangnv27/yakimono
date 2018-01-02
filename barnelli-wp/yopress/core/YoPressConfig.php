<?php

return array(
	'child' => false,
	'settingsId' => 'yopress-settings',
	'homeUrl' => get_home_url(),
	'basePath' => get_template_directory(),
	'baseUri' => get_template_directory_uri(),
	'textDomain' => 'YoPress',
	'include' => array(
		'admin',
		'models',
		'web',
		'web/views',
		'componentmanager',
		'components/*',
		'interface/*',
		'modules/*'
	), 
	'widgets' => array(
		'video',
		'ourteam',
		'gallery',
		'socialhub',
	),
	//default load only on yopress admin page
	'components' => array(
		'YoPressOgTags',
		'YoPressUserProfileExtender',
		'YoPressUploader' => array(
			'adminOnly' => true,
			'avaliableActions'=>  array(
				'yopress-settings'
			)
		),
		'YoPressThemeCustomize'=> array('adminOnly' => true),
		//'YoPressGalleryClean',
		//'YoPressEventCalendar',
	//	'YoPressDynamicSidebar'
	),
	'themeSupport' => array(
		'menus',
		'widgets',
		'post-thumbnails',
		'post-formats' => array('video', 'image'),
		'automatic-feed-links'
	)
);
?>
