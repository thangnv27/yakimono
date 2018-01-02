<?php

/**
 * YoPressComponent is base for all components, register hooks and register admin
 * settings are fired at the same begining of loading components after 
 * widgets are loaded
 * 
 */

class YoPressComponent implements IDependencyObject {
	/**
	 * Base Url to Component Folder
	 * 
	 * @var string $baseUrl 
	 */
	public $baseUrl;
	
	/**
	 * Base Path to Component Folder
	 * 
	 * @var string $baseUrl 
	 */
	public $basePath;
	
	/**
	 *	Path to YoPress
	 * 
	 * @var string  $yopressPath
	 */
	public $yopressPath;
	/*
	 * Tell if component had already registered it hooks
	 */
	private static $registeredClasses = array();
	
	/*
	 * Tell if component can be initialized multiple times
	 */
	protected $multiInstance = false;
	
	/**
	 * Set the base paths for components
	 * TODO: Make paths under yopress control and plugin control
	 */
	public function __construct() {
		/* @var $urlManagerModule UrlManagerModule */
		$urlManagerModule = UrlManagerModule::instance();
		
		$this->baseUrl = $urlManagerModule->componentUrl.$this->componentFolderName();
		$this->basePath = $urlManagerModule->componentPath.$this->componentFolderName();
		$this->yopressPath = $urlManagerModule->componentPath;
	}


	/*
	 * Register hooks for scripts, styles, called once percomponent after
	 * regisrering them
	 */
	public function registerHooks($action, $avaiableActions=array()) {
		self::$registeredClasses[get_class($this)] = get_class($this);
		$this->registerd = true;
	}
	
	/**
	 * Register settings on admin page, called if is_admin() && pageId =
	 * YoPressBase::instance()->getAdminPageId match
	 */
	public function registerAdminSettings() {
		
	}
	
	/**
	 * Tell if component can invoke registerHooks method
	 * that can be done only once per class
	 * 
	 * @return bool all hooks has been registered or not
	 */
	public function registered() {
		if(isset(self::$registeredClasses[get_class($this)])){
			
		}
		return isset(self::$registeredClasses[get_class($this)]);
	}
	
	/**
	 * 
	 * @return bool Component can be  multi instance or not
	 */
	public function isMultiInstance() {
		return $this->multiInstance;
	}
	
	/**
	 * Return the name of component folder, must be overdriven
	 */
	public function componentFolderName(){
		throw new Exception('Overdrive componentFolderName in '. get_class($this));
	}
	
	/**
	 * Return the dir of component folder, must be overdriven
	 */
	public function componentPath(){
		throw new Exception('Overdrive componentFolderName in '. get_class($this));
	}
}
?>