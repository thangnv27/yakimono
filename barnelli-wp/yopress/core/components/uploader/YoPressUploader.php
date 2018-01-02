<?php

class YoPressUploader extends YoPressComponent {

	static $instanceId;
	public $id;
	
	public function __construct() {
		parent::__construct();
		if(!self::$instanceId) self::$instanceId = 1;
		else self::$instanceId++;
		
		$this->id = self::$instanceId;
	}

	public function uploadForm($arr=array()) {
		$this->getUploadForm($arr);
	}

	public function getUploadForm($arr) {
		
		$name = (isset($arr['name'])) ? $arr['name'] : '';
		$value = (isset($arr['value'])) ? $arr['value'] : '';
		$id = self::$instanceId;
		$mainId = (isset($arr['id'])) ? $arr['id'] : '';
		$class = (isset($arr['class'])) ? $arr['class'] : '';
		$style = (isset($arr['style'])) ? $arr['style'] : '';
		require $this->basePath.'/views/uploadForm.php';
		
	}

	function registerHooks($action, $avaiableActions=array()) {

		// Register this on admin widgets page
		$matches = preg_match('/profile|user-edit|widgets.php/i', $_SERVER['REQUEST_URI']);

		if ((is_array($avaiableActions) && in_array($action, $avaiableActions)) || $matches == 1) {
			parent::registerHooks($action, $avaiableActions);

			add_action('admin_enqueue_scripts', array($this,'uploaderScripts'));
			add_action('admin_enqueue_scripts', array($this,'uploaderStyles'));
		}
	}

	function uploaderScripts() {
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('yopressUploaderScript', YoPressBase::instance()->getComponentUrl().'/uploader/yopressUploader.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('yopressUploaderScript');
	}

	function uploaderStyles() {
		wp_enqueue_style('thickbox');
	}
	
	public function componentFolderName(){
		return 'uploader';
	}
	
	public function componentPath(){
		return __DIR__;
	}
}
?>
