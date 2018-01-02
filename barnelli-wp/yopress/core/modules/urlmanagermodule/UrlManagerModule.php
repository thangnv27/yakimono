<?php
/**
 * Url Manager for YoPress and plugins
 */
class UrlManagerModule {
	
	const YOPRESS_FOLDER = '/yopress';
	const COMPONENTS_FOLDER = 'components/';
	const CORE_FOLDER = '/core/';
	
	private static $instance = null;

	/*
	 *  Main YoPress Folder
	 */
	public $baseUrl; // yopress/
	public $basePath;

	/*
	 * YoPress Core Folder
	 */
	public $coreUrl; // yopress/core/
	public $corePath;
	
	/*
	 * Components folder
	 */
	public $componentUrl; // yopress/core/components/
	public $componentPath;
	
	private $actionName;
	private $scriptName;

	public function __construct($plugin = null) {
		//define __DIR__ for older php versions
		if (!defined('__DIR__')) define('__DIR__', dirname(__FILE__));

		$yopressSharedUrl = WP_CONTENT_URL . self::YOPRESS_FOLDER;
		$yopressSharedPath = WP_CONTENT_DIR . self::YOPRESS_FOLDER;

		if (is_dir($yopressSharedPath)) {
			$this->basePath = $yopressSharedPath;
			$this->baseUrl = $yopressSharedUrl;
		} else {
			$this->basePath = get_template_directory() . self::YOPRESS_FOLDER;
			$this->baseUrl = get_template_directory_uri() . self::YOPRESS_FOLDER;
		}
		
		$this->corePath = $this->basePath . self::CORE_FOLDER;
		$this->coreUrl = $this->baseUrl . self::CORE_FOLDER;
			
		$this->componentPath = $this->corePath . self::COMPONENTS_FOLDER;
		$this->componentUrl = $this->coreUrl . self::COMPONENTS_FOLDER;
			
		/* setup action and script name */
		$this->actionName = isset($_GET['page']) ? $_GET['page'] : '';
		$val = explode('/', $_SERVER['SCRIPT_NAME']);
		$this->scriptName = array_pop($val);
		$this->scriptName = str_replace('.php', '', $this->scriptName);
		
	}

	/**
	 * 
	 * @return UrlManagerModule
	 */
	public static function instance() {
		if(self::$instance === null) {
			self::$instance = new UrlManagerModule();
		}

		return self::$instance;
	}
	
	/**
	 * Return the current action or empty string
	 * 
	 * @return string
	 */
	public function getActionName(){
		return $this->actionName;
	}
	
	/**
	 * Return the script name without .php extension
	 * 
	 * @return string
	 */
	public function getScriptName(){
		return $this->scriptName;
	}
	
}

?>