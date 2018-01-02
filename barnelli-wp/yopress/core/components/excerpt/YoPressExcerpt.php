<?php
class YoPressExcerpt extends YoPressComponent {
	
	private $settingName = 'theme_post_excerpt_length';
	private $settingSubName = 'theme_post_excerpt_link';
	
	private $config;
	
	private $defaults = array(
			'tab'=>'General',
			'section'=>'Excerpt',
			'priority'=>0
		);
	
	private $defaultSettings = array(
		'length' => 160,
		'link' => true,
		'readMore' => '...'
	);
	
	public function registerHooks($action, $avaiableActions=array()) {
		parent::registerHooks($action, $avaiableActions=array());

		add_filter('the_excerpt', array($this, 'trimExcerpt'));
		add_filter('get_the_excerpt', array($this, 'trimExcerpt'));
	}

	public function __construct($config) {
		if ($config == '') {
			$this->config = $this->defaults;
		} else {
			$this->config = array_merge($this->defaults, $config);
		}

		global $excerptLength;

		$excerptLength = YoPressFormModel::getOption($this->settingName, '160');
		$this->defaultSettings['link'] = YoPressFormModel::getOption($this->settingSubName);
		$this->defaultSettings['excerpt_name'] = YoPressFormModel::getOption('excerpt_name');

		if($this->defaultSettings['excerpt_name'] == '') $this->defaultSettings['excerpt_name'] = '...';
		
		if($excerptLength == '' || $excerptLength == 0) {
			$excerptLength = $this->defaultSettings['length'];
		}
	}

	public function registerAdminSettings() {
		parent::registerAdminSettings();

		YoPressBase::instance()->registerAdminPage('General', 'general-settings', 1);
		YoPressBase::instance()->registerAdminPageSettings('general-settings', array($this, 'settings'), __t('Excerpt'), __t('Description'), 4);

	}
	
	function settings() {
		return  array(
			array(
				'name'=>'excerpt_name',
				'type' => 'input',
				'label' => 'Read more text',
				'default' => '',
				'htmlOptions' => array(
					
				)
			),
			array(
				'name'=>$this->settingName,
				'type' => 'input',
				'label' => 'Excerpt length',
				'default' => $this->defaultSettings['length'],
				'htmlOptions' => array(
					
				)
			),
		);
	}
	
	function trimExcerpt($content) {
		global $excerptLength;
		$excerptLength = YSettings::g('theme_post_excerpt_length', 160);

//		if($excerptLength == '' || $excerptLength == 0) {
//			$excerptLength = 160;
//		}
		if (strlen($content) > $excerptLength) {
			$excerpt = explode(' ', $content);
			$returnString = '';

			foreach($excerpt as $word) {
				$returnString .= ' '.$word;
				if(strlen($returnString) > $excerptLength) break;
			}
	
	
			$returnString .= ' ...';
			return $returnString;

		} else {
			return $content;
		}
	}
}

?>