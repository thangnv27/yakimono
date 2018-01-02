<?php
/*
 * YoPress Framework
 * v0.4
 * 
 */

require_once 'modules/urlmanagermodule/UrlManagerModule.php';
require_once 'modules/translatemodule/YoPressTranslateModule.php';

class YoPressBase {
	const VERSION = '0.6';
	/** @var YoPressBase */
	private static $instance;
	
	/** @var YoPressWebView */
	public $webView;

	/** @var YoPressComponentManager */
	public $component;

	/** @var WidgetModule */
	public $widgetModule;

	private $modules;
	
	private static $state = true;
	private static $config;
	
	/** true if yopress is located in wp-content, false if located inside 
	 *	theme
	 */
	private static $sharedFolder;

	/*
	 * Enter maintenance mode
	 */
	private $maintenance = false;
	
	/*
	 * Enter debug mode
	 */
	private static $debug = true;
	private static $logAtComplete = false;
	private static $debugMessagesArray = array();
	
	/*
	 * List of components that need to be loaded
	 */
	private $dependency = array();
	private $components = array();
	

	private $adminPages = array();
	private $adminPageSetings = array();

	
	
	public static function init($config = null) {
		ob_start();
		
		global $includes;
		if ($includes == null) $includes = array();

		self::$instance = new YoPressBase();

		if ($config == null)
			throw new Exception('YoPress: Please pass the config to init!');
			
		self::$config = $config;

		UrlManagerModule::instance();
		
		load_theme_textdomain(self::$config['textDomain']);		
		
		spl_autoload_register(array(self::$instance, 'loader'));

		self::$instance->webView = new YoPressWebView();
		self::$instance->component = new YoPressComponentManager();

		$action = UrlManagerModule::instance()->getActionName();


		self::$config['modules'][] = 'Storage';
		self::$config['modules'][] = 'Helper';
		self::$config['modules'][] = array( 'module'=>'Form', 'adminOnly'=>true);
		self::$instance->loadModules();
		

		
		/* resolve post request to update options for components */
		if ( is_admin() && $action == self::$instance->getAdminPageId() && isset($_POST[YoPressFormModel::FORM_NAME]) ) {
			YoPressStorageModule::instance()->attributes = $_POST[YoPressFormModel::FORM_NAME];
			YoPressStorageModule::instance()->synchronize();
		}
		
		self::$instance->registerHooks();
		self::$instance->registerWidgets();
		self::$instance->registerComponents($action);
		self::$instance->registerDependencies($action);
		self::$instance->addActions();
	}

	/**
	 * Collect log messages and display them as they appear or ath the same end 
	 * of file $logAtComplete default false
	 * 
	 * @param type $arg item to log
	 */
	public static function log($arg){
		if(self::$debug){
			if(self::$logAtComplete){
				self::$debugMessagesArray[] = $arg;
			} else {
				print_r($arg);
				echo '<br/>';
			}
		}
	}
	
	/**
	 * Display all logs it the $logAtComplete is enabled
	 */
	public function logEnd(){
		if(self::$debug && self::$logAtComplete){
			foreach(self::$debugMessagesArray as $message){
				print_r($message);
				echo '<br/>';
			}
		}
	}
	
	/**
	 * Comeplet function is invoked at wp_footer action
	 */
	public function complete() {
		if(!self::$state) {
			ob_clean();
			$this->webView->render('error');
			wp_die();
		} else {
			if(ob_get_status())
				ob_end_flush();
		}
	}

	public static function version(){
		return self::VERSION;
	}
	
	/**
	 * @return YoPressBase
	 */
	public static function instance() {
		return self::$instance;
	}

	/**
	 * Return true in yopress is using shared framework folder or false
	 * if yopress is located inside theme
	 */
	public function sharedFolder(){
		return self::$sharedFolder;
	}
	
	/**
	 * @return string name of the setting page
	 */
	public function getAdminPageId() {
		return self::$config['settingsId'];
	}
	
	/**
	 * @return array include Paths
	 */
	public function getIncludePaths() {
		return self::$config['include'];
	}
	
	/**
	 * 
	 * @return string path to /yopress/core
	 */
	public function getCorePath() {
		return UrlManagerModule::instance()->corePath;
	}

	/**
	 * 
	 * @return string url to /yopress/core/components
	 */
	public function getComponentUrl() {
		return UrlManagerModule::instance()->componentUrl;
	}

	/**
	 * 
	 * @return string url to /yopress/core
	 */
	public function getCoreUrl() {
		return UrlManagerModule::instance()->coreUrl;
	}

	/**
	 * 
	 * @return string text domain for translation
	 */
	public function getTextDomain(){
		return self::$config['textDomain'];
	}

	/**
	 * Some components may ask to use for example widgetModule from yopress
	 * base
	 * 
	 * @param string $r
	 * @return property|function call
	 */
	public function getRequirement($r){
		if(isset($this->$r)){
			return $this->$r;
		} else if(method_exists($this, 'get'.ucfirst($r))){
			$fn = 'get'.ucfirst($r);
			return $this->$fn();
		} else return null;
	}

	/**
	 * Get the instance of widget module, create it in first call
	 */
	public function getWidgetModule() {
		if(!$this->widgetModule)
			$this->widgetModule = new WidgetModule();
		return $this->widgetModule;
	}

	/**
	 * Register components needed to run theme, if component need to register 
	 * scripts it must be added as dependency
	 */
	public function addDependency($depName, $config='') {
		if(!key_exists($depName, $this->dependency)) {
			$this->dependency[$depName] = $config;
		} else {
			if (is_array($this->dependency[$depName]) && key_exists('multi', $this->dependency[$depName])) {				
				$this->dependency[$depName]['configs'][] = $config;
			} else {
				$c = $this->dependency[$depName];
				$this->dependency[$depName] = array(
					'multi'=>true,
					'configs'=>array($c, $config)
				);
			}
		}
	}

	/**
	 * Register components needed to run theme
	 */
	public function addComponent($name, $config='') {
		$this->components[$name] = $config;
	}

	/**
	 * Register custom script for our yopresss admin page
	 * 
	 * @param type $hook_suffix
	 */
	public function registerAdminScript($hook_suffix) {
		if($hook_suffix == 'toplevel_page_yopress-settings') {
		}
	}

	/**
	 * Add menu item to to YoPress Admin sidebar
	 * 
	 * @param string $name display name
	 * @param string $id unuqie id of page
	 * @param int $pos position in menu, lower is the higher
	 */
	public function registerAdminPage($name, $id, $pos = 1) {
		if(!isset($this->adminPageSetings[$id])) {
			$this->adminPageSetings[$id] = array();

			if(!isset($this->adminPages[$pos])) {
				$this->adminPages[$pos] = array();
			}

			$this->adminPages[$pos][] = array('name'=>$name, 'id'=>$id);
		}
	}
	
	/**
	 * Add settings to admin page
	 * 
	 * @param string $pageId id of page registered by registerAdminPage
	 * @param type $func callback function to get options from
	 * @param type $name name of setting
	 * @param type $desc description 
	 * @param type $pos position in page, lower is the higher
	 */
	public function registerAdminPageSettings($pageId, $func, $name, $desc, $pos) {
		if(!isset($this->adminPageSetings[$pageId])) {
			$this->adminPageSetings[$pageId] = array();
		}

		if(!isset($this->adminPageSetings[$pageId][$pos])) {
			$this->adminPageSetings[$pageId][$pos] = array();
		}

		$this->adminPageSetings[$pageId][$pos][] = array('func' => $func, 'name' => $name, 'desc' => $desc);
		ksort($this->adminPageSetings[$pageId]);
	}

	public function registerAdminPageSettingsWithParam($pageId, $func, $param, $name, $desc, $pos) {
		if(!isset($this->adminPageSetings[$pageId])) {
			$this->adminPageSetings[$pageId] = array();
		}

		if(!isset($this->adminPageSetings[$pageId][$pos])) {
			$this->adminPageSetings[$pageId][$pos] = array();
		}

		$this->adminPageSetings[$pageId][$pos][] = array('func' => $func, 'param'=>$param, 'name' => $name, 'desc' => $desc);
		ksort($this->adminPageSetings[$pageId]);
	}

	/** @mark TO REMOVE */
	public function registerAdminSettings($pageId, $func, $name, $desc, $pos) {
		
	}

	/**
	 * Get all pages
	 * 
	 * @return array
	 */
	public function getAdminPages() {
		ksort($this->adminPages);
		return $this->adminPages;
	}

	/**
	 * Get options for pages
	 * 
	 * @return array
	 */
	public function getAdminPageSettings() {
		return $this->adminPageSetings;
	}

	/**
	 * Render author link
	 */
	public function author() {
		$this->webView->author();
		self::$state = true;
	}

	/**
	 * Load Scripts needed by widgets
	 * Must be public because of add_action('wp_enqueue_scripts',..
	 */
	public function registerWidgetsScripts() {
		$widgets = self::$config['widgets'];
		if(!is_array($widgets) || count($widgets) == 0)	return;

		foreach($widgets as $widget) {
			$file = 'widgets/'.$widget.'/'.$widget.'_widget_script.js';
			$scriptPath = $this->getCorePath().$file;
			$scriptUrl = $this->getCoreUrl().$file;

			if(file_exists($scriptPath)) {
				wp_enqueue_script($widget.'_widget_script', $scriptUrl, array('jquery'), '1.0', true);
			}
		}
	}

	//------------------------  Private Functions ------------------------------

	/**
	 * Add action used by theme
	 */
	private function addActions() {
		add_action('yopress_credits', array($this, 'author'));
		add_action('shutdown', array($this, 'logEnd'));
	}

	/**
	 * Register main hooks for wp
	 */
	private function registerHooks() {
		add_action('admin_menu', array(new YoPressAdmin(), 'adminMenu'));
		add_action('admin_enqueue_scripts', array(self::$instance, 'registerAdminScript'));
		add_action('wp_enqueue_scripts', array(self::$instance, 'registerWidgetsScripts'));
		add_action('wp_footer', array(self::$instance, 'complete'));
	}

	/**
	 * Register widgets added in YoPressConfig
	 */
	private function registerWidgets() {
		
		/* ensure to load widgets only when needed */
		/*
		if((UrlManagerModule::instance()->getScriptName() == 'widgets' 
			|| UrlManagerModule::instance()->getScriptName() == 'admin-ajax') 
			|| !is_admin()){
		} else {
			return;
		}
		*/
		
		
		
		$widgets = self::$config['widgets'];
		if(!is_array($widgets) || count($widgets) == 0)	return;
		global $includes;
		$val = explode('/', $_SERVER['SCRIPT_NAME']);
		$scriptName =  array_pop($val);

		foreach($widgets as $key => $widget) {
			$widgetName = '';
			if(is_array($widget)){
				$widgetName = $key;
				if(isset($widget['exclude'])){
					if(is_array($widget['exclude'])){
						$cont = false;
						foreach($widget['exclude'] as $exc){
							if($scriptName == $exc) {
								$cont = true;
								break;
							}
						}
						if($cont) {
							
							continue;
						}
					} else {
						if($scriptName == $widget['exclude']) {
							
							continue;
						}
					}
					
				}
				
			} else {
				$widgetName = $widget;
			}
			
			if(!in_array($widgetName, $includes)){
				$includes[] = $widgetName;
				require_once 'widgets/'. $widgetName . '/'. $widgetName . '_widget.php';
				
			}
		}
	}

	/**
	 * Add Dependencies from YoPressConfig and push register to component
	 * manager
	 */
	private function registerComponents($action) {
		foreach (self::$config['components'] as $key=>$comp) {
			if (is_array($comp)) {
				$this->addComponent($key, $comp);
			} else {
				$this->addComponent($comp);
			}			
		}
		$this->component->registerComponents($this->components, $action);
	}

	/* 
	 * Register dependencies that can be eaither component, widget or anything
	 * that implements IDependencyObject
	 */
	private function registerDependencies($action) {
		foreach($this->dependency as $dep=>$config) {
			if(class_exists($dep)) {
				
				if (is_array($config) && key_exists('multi', $config)) {
					foreach ($config['configs'] as $c) {
						$this->loadDependency($dep, $c, $action);
					}
				} else {
					$this->loadDependency($dep, $config, $action);
				}
			} else {
				echo 'Notice: Class '.$dep.' not found! Try adding include 
					path in config';
			}
		}
	}

	/**
	 * Load single dependency(component,widget, etc) and run registerHooks
	 * and registerAdminPage on it
	 * 
	 * @param type $dep name of dependency
	 * @param type $config config 
	 * @param type $action name of current page
	 */
	private function loadDependency($dep, $config, $action) {
		$depObj = new $dep($config);
		
		if($depObj instanceof IDependencyObject) {
			if($depObj) {
				/* call this only once per component */
				if(!$depObj->registered()){
					$depObj->registerHooks($action);
				}

				if(is_admin() && $action == YoPressBase::instance()->getAdminPageId()){
					$depObj->registerAdminSettings();
				}
				
			}
		} else {
			echo 'This class ('.$dep.') do not implements IDependencyObject';
		}
	}
	
	
	/**
	 * Load modules to extend YoPress fnctionality
	 */
	private function loadModules(){
		if(isset(self::$config['modules']) && is_array(self::$config['modules'])){
			foreach(self::$config['modules'] as $module){				
					if(is_array($module)){
						if($module['adminOnly'] && !is_admin()) continue;
						$module = $module['module'];
					}
					
					$class = 'YoPress'.ucfirst($module).'Module';
					$m = new $class;
					
					$m->init();
					$this->modules[$module] = $m;
			}
		}
	}
	

	/**
	 * SPL Autoloader
	 */
	private function loader($className) {

		$corePath = UrlManagerModule::instance()->corePath;
		
		foreach (self::$config['include'] as $path) {
			if(strpos($path, '*') != null) {
				/*
				 * Resolve folder/* request
				 */
				$folder = explode('/', $path);
				$folder = $folder[0];

				if ($handle = opendir($corePath . $folder)) {
					while (false !== ($entry = readdir($handle))) {

						if ($entry != '..') {

							if (strpos($entry, ".") !== false) {
								$classPath = $corePath . $folder . '/'. $className . '.php';
							} else {
								$classPath = $corePath . $folder . '/' . $entry . '/' . $className . '.php';
							}

							if(file_exists($classPath)) {
								if(!class_exists($className)) {

									global $includes;

									if(!in_array($className, $includes)) {
										
										require_once $classPath;
										$includes[] = $className;
									}
								}
								
								break;
							}
						}
					}
					
					closedir($handle);
				}
			} else {
				/*
				 * Resolve direct request folder/component
				 */

				$classPath = $corePath . $path . '/' . $className . '.php';
				if(file_exists($classPath)) {
					require_once $classPath;
					break;
				}
			}
		}
	}
}

?>