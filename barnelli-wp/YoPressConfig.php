<?php
return array(
	'child' => false,
	'settingsId' => 'yopress-settings',
	'homeUrl' => get_home_url(),
	'basePath' => get_template_directory(),
	'baseUri' => get_template_directory_uri(),
	'textDomain' => 'BARNELLI',
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
		//'video',
		//'ourteam',
		//'latesttwitter'
	),
	'components' => array(
//		'YoPressOgTags',
//		'YoPressUserProfileExtender',
//		'YoPressTwitterFeed',
//		'YoPressExcerpt',
//		'YoPressNivoSlider',
//		'YoPressFlexSlider',
//		'YoPressSuperSlider',
		'YoPressUploader' => array(
			'adminOnly' => true,
			'avaliableActions'=>  array(
				'yopress-settings',
				'yopress-ad-manager'
			)
		)
	)
);
?>
