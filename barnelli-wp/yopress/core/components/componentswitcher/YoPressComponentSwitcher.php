<?php

/**
 * Component Switcher, display dropdown with components passed from config
 * and switch between them, loading one by adding dependency to yopressbase
 */

class YoPressComponentSwitcher extends YoPressComponent implements IComponentName {

	private $config;
	private $optionName;
	private $defaultName = 'yopress_slider_switcher_chosen_slider';
	static $instanceId;

	public function __construct($config) {
		$this->config = $config;
		$this->multiInstance = true;

		/*
		 * Check for components to implement IRunableComponent
		 */
		if(empty($this->config['components'])) return;
		foreach($this->config['components'] as $class => $component) {
			if(!in_array('IRunableComponent', class_implements($class, true))) {
				throw new Exception('Class '.$class.' must implements 
					IRunableComponent in order to be used in SwitcherComponent');
			}
		}

		if(!self::$instanceId) self::$instanceId = 1;
		else self::$instanceId++;

		$this->optionName = 'yopress_switcher_option_no_'.self::$instanceId.'_'.strtolower($config['name']);

		if (empty($this->config)) {
			throw new Exception('No config for YoPressSliderSwitcher!');
		}

		$depName = YoPressFormModel::getOption($this->optionName);

		if ($depName == null || $depName == '') {
			$depName = array_shift(array_keys($config['components']));
			YoPressFormModel::updateOption($this->optionName, $depName);
			//update_option($this->optionName, $depName);
		}

		YoPressBase::instance()->addDependency($depName, array('tab'=>$this->config['config']['tab']));
	}

	/**
	 * Unique name of multiinstance component 
	 * 
	 * @return string unique name of instance
	 */
	public function componentName() {
		return $this->config['name'];
	}

	public function run() {
		YoPressBase::log('Component switcher run');
		$componentName = get_option($this->optionName);

		if ($componentName == '' || $componentName == null) {
			$componentName = array_shift(array_keys($this->config['components']));
		}

		if ($componentName) {
			YoPressBase::instance()->component->$componentName->run();
		} else {
			YoPressBase::log('Component switcher no class found'.$componentName);
		}
	}

	public function registerHooks($action, $avaiableActions=array()) {
		parent::registerHooks($action, $avaiableActions=array());
	}

	public function registerAdminSettings() {
		parent::registerAdminSettings();

		$settings = array(
			array(
				'name'=>$this->optionName,
				'type' => 'dropdown',
				'label' => $this->config['label'],
				'default' => $this->config['components'],
				'htmlOptions' => array()
			)
		);

		foreach($settings as $setting) {
			YoPressBase::instance()->registerAdminSettings($this->config['config']['tab'], $this->config['config']['section'], '', 0, $setting);
		}
	}
	
	public function componentPath(){
		return __DIR__;
	}
}
?>
