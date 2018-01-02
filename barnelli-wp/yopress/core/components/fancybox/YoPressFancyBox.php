<?php
class YoPressFancyBox extends YoPressComponent implements IRunableComponent {

	private $config;

	private $defaults = array(
		'tab'=>'FancyBox',
		'section'=>'Fancy Box',
		'priority'=>0
	);

	private $defaultSettings = array(
		'yopress_fancybox_open_effect'=>array('elastic'=>'Elastic','fade'=>'Fade','none'=>'None'),
		'yopress_fancybox_open_speed'=>150,
		'yopress_fancybox_close_effect'=>array('elastic'=>'Elastic','fade'=>'Fade','none'=>'None'),
		'yopress_fancybox_close_speed'=>150,
		'yopress_fancybox_close_button_enabled'=>false,
		'yopress_fancybox_thumbs_enabled'=>false,
		'yopress_fancybox_arrows_enabled'=>false,
	);

	public function __construct($config) {
		//$this->multiInstance = true;

		if ($config == '') {
			$this->config = $this->defaults;
		} else {
			$this->config = array_merge($this->defaults, $config);
		}
	}

	function registerHooks($action, $avaiableActions=array()) {
		parent::registerHooks($action, $avaiableActions=array());

		add_action('admin_enqueue_scripts', array($this, 'fancyBoxScripts'));
		add_action('admin_enqueue_scripts', array($this, 'fancyBoxStyles'));
		add_action('admin_enqueue_scripts', array($this, 'fancyBoxRun'));
	}

	public function run($config = array()) {
		//
	}

	public function fancyBoxRun() {

		$settingsArray = array(
			'openEffect'	=>	get_option('yopress_fancybox_open_effect'),
			'openSpeed'		=>	(int)get_option('yopress_fancybox_open_speed'),
			'closeEffect'	=>	get_option('yopress_fancybox_close_effect'),
			'closeSpeed'	=>	(int)get_option('yopress_fancybox_close_speed'),
			'closeBtn'		=>	(bool)get_option('yopress_fancybox_close_button_enabled'),
			'arrows'		=>	(bool)get_option('yopress_fancybox_arrows_enabled'),
			'helpers'		=> array(
								'title'=>array('type'=>'inside'),
								'buttons'=>array(),
								)
			);

			if (get_option('yopress_fancybox_thumbs_enabled')) {
				$settingsArray['helpers'][] = array('thumbs'=>array('width'=>(int)50, 'height'=>(int)50));
			}
		
		echo '<script type="text/javascript">
			$(document).ready(function() {
				$.each($(".gallery"), function(i,v){
					$(this).find("a").attr("rel", "gallery"+i);
				});

				$(".post .apply-lightbox a").fancybox();
			})</script>';
	}

	public function fancyBoxScripts() {
		wp_register_script('fancyBoxScripts', YoPressBase::instance()->getCoreUrl().'/components/fancybox/source/jquery.fancybox.pack.js', array('jquery'));
		wp_enqueue_script('fancyBoxScripts');
	}

	public function fancyBoxStyles() {
		wp_register_style('fancyBoxStyles', YoPressBase::instance()->getCoreUrl().'/components/fancybox/source/jquery.fancybox.css');
		wp_enqueue_style('fancyBoxStyles');
	}

	public function registerAdminSettings() {
		parent::registerAdminSettings();

		$settings = array(
			array(
				'name'=>'yopress_fancybox_open_effect',
				'type' => 'dropdown',
				'label' => 'Open effect',
				'default' => $this->defaultSettings['yopress_fancybox_open_effect'],
				'htmlOptions' => array()
			),
//			array(
//				'name'=>'yopress_fancybox_open_speed',
//				'type' => 'input',
//				'label' => 'Open speed (ms)',
//				'default' => $this->defaultSettings['yopress_fancybox_open_speed'],
//				'htmlOptions' => array()
//			),
			array(
				'name'=>'yopress_fancybox_close_effect',
				'type' => 'dropdown',
				'label' => 'Close effect',
				'default' => $this->defaultSettings['yopress_fancybox_close_effect'],
				'htmlOptions' => array()
			),
//			array(
//				'name'=>'yopress_fancybox_close_speed',
//				'type' => 'input',
//				'label' => 'Close speed (ms)',
//				'default' => $this->defaultSettings['yopress_fancybox_close_speed'],
//				'htmlOptions' => array()
//			),
//			array(
//				'name'=>'yopress_fancybox_close_button_enabled',
//				'type' => 'checkbox',
//				'label' => 'Enable close button',
//				'default' => $this->defaultSettings['yopress_fancybox_close_button_enabled'],
//				'htmlOptions' => array()
//			),
//			array(
//				'name'=>'yopress_fancybox_thumbs_enabled',
//				'type' => 'checkbox',
//				'label' => 'Enable thumbnails',
//				'default' => $this->defaultSettings['yopress_fancybox_thumbs_enabled'],
//				'htmlOptions' => array()
//			),
		);

		foreach($settings as $setting) {
			YoPressBase::instance()->registerAdminSettings($this->config['tab'], $this->config['section'], $this->config['priority'], 0, $setting);
		}
	}
}

?>