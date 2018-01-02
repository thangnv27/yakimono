<?php

class YoPressTwitterFeed extends YoPressComponent {
	
	private $defaultSettings = array(

	);
	
	private $config;

	private $defaults = array(
		'tab'=>'Twitter',
		'section'=>'Twitter Settings',
		'priority'=>0
	);

	public function __construct($config) {
		if ($config == '') {
			$this->config = $this->defaults;
		} else {
			$this->config = array_merge($this->defaults, $config);
		}
	}

	public function registerHooks($action, $avaiableActions=array()) {
		parent::registerHooks($action, $avaiableActions=array());
	}
	
	public function registerAdminSettings() {
		parent::registerAdminSettings();
	
		YoPressBase::instance()->registerAdminPage('General', 'general-settings', 1);
		YoPressBase::instance()->registerAdminPageSettings('general-settings', array($this, 'settings'), __t('Twitter Feed Settings'), __t('Description'), 4);
	}

	public function settings() {
		return  array(
			array(
				'name'=>'twitter_oauth_access_token',
				'type' => 'input',
				'label' => 'OAuth Access Token',
				'default' => '',
				'htmlOptions' => array()
			),
			array(
				'name'=>'twitter_oauth_access_token_secret',
				'type' => 'input',
				'label' => 'OAuth Access Token Secret',
				'default' => '',
				'htmlOptions' => array()
			),
			array(
				'name'=>'twitter_consumer_key',
				'type' => 'input',
				'label' => 'Consumer Key',
				'default' => '',
				'htmlOptions' => array()
			),
			array(
				'name'=>'twitter_consumer_secret',
				'type' => 'input',
				'label' => 'Consumer Secret',
				'default' => '',
				'htmlOptions' => array()
			),
		);
	}
}

?>