<?php
/**
 * Storage module responsible for retriving options from database any syncing
 * it at the end of wordpress call.
 */

class YoPressStorageModule {
	private static $instance;
	private $data;
	private $optionName;
	private $change = false;

	/**
	 * Initialize the shared instance and retrive options from database
	 * 
	 * @param mixed $config
	 * @throws Exception can be called only once
	 */
	public function init($config = null) {
		if(self::$instance != null){
			throw new Exception('Singleton class YoStorageModule cannot be inited more than one time!');
		}
		
		self::$instance = $this;
		add_action('shutdown', array($this, 'synchronize'));

		$this->optionName = 'YoPress-'.wp_get_theme();
		
		$this->data = get_option($this->optionName);
		
		if($this->data == '') $this->data = array();
		
		foreach($this->data as &$option){
			$option = html_entity_decode(html_entity_decode($option));
		}
	}
	
	/**
	 * Custom setter for attributes
	 * 
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name, $value) {
		if ($name == 'attributes') {
			$this->change = true;
			foreach($value as $key=>$v) {

				// if (strstr($v, '"')) {
				// 	if ( ($key != 'theme_google_analytics') && (!strstr($key, 'theme_grid_function_value')) && ($key != 'theme_custom_css') ) {
				// 		$v = str_replace('"', "'", $v);
				// 	}
				// }

				$this->data[$key] = $v;
			}
		}
	}
	
	/**
	 * @return YoPressStorageModule
	 */
	public static function instance(){
		if(self::$instance)
			return self::$instance;
	}
	
	/**
	 * Get saved option
	 * 
	 * @param string $name
	 * @param mixed $default
	 * @return mixed option value
	 */
	public function getOption($name, $default){
		if(isset($this->data[$name]) && $this->data[$name] != ''){
			return $this->data[$name];
		} else {
			return $default;
		}
	}
	
	/**
	 * Update option
	 * 
	 * @param string $name
	 * @param mixed $value
	 */
	public function updateOption($name, $value){
		$this->change = true;
		$this->data[$name] = $value;
	}
	
	/**
	 * Save all changes to database
	 */
	public function synchronize(){
		if(!$this->change) return;
		foreach($this->data as &$option){
			$option = htmlspecialchars(stripslashes($option));
		}
		update_option($this->optionName, $this->data);
	}
}


/* Move to some helper clases */
class YSettings {

	public static function gWPML($settingName, $default = '') {
		if (function_exists('icl_t')) {
			return icl_t('yopress', $settingName, $default);
		} else {
			return YoPressStorageModule::instance()->getOption($settingName, $default);	
		}
	}

	public static function g($settingName, $default = ''){
		return YoPressStorageModule::instance()->getOption($settingName, $default);
	}
	
	public static function s($settingName, $value){
		return YoPressStorageModule::instance()->updateOption($settingName, $value);
	}
}
?>
