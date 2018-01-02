<?php
class YoPressColorBox extends YoPressComponent implements IRunableComponent {

	private $config;

	private $defaults = array(
		'tab'=>'ColorBox',
		'section'=>'Color Box',
		'priority'=>0
	);

	private $defaultSettings = array(
		'yopress_colorbox_transition'=>array('elastic'=>'Elastic','fade'=>'Fade','none'=>'None'),
		'yopress_colorbox_speed'=>350,
		'yopress_colorbox_slideshow'=>false,
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

		add_action('admin_enqueue_scripts', array($this, 'colorBoxScripts'));
		add_action('admin_enqueue_scripts', array($this, 'colorBoxStyles'));
		add_action('admin_enqueue_scripts', array($this, 'colorBoxRun'));
	}

	public function run($config = array()) {
		//
	}

	public function colorBoxRun() {

		$settingsArray = array(
			'transition'	=> YoPressFormModel::getOption('yopress_colorbox_transition', 'elastic'),
			'speed'			=>	(int)YoPressFormModel::getOption('yopress_colorbox_speed', '300'),
			'slideshow'		=>	(bool)YoPressFormModel::getOption('yopress_colorbox_slideshow', 'false'),
			'maxHeight'		=> '70%',
			'rel'			=> 'gal'
			);
		
		
		
		echo '<script type="text/javascript">
			var def = '.json_encode($settingsArray).';
			jQuery(document).ready(function(){
				r = "gal";
				$.each($(".gallery"), function(i,v){
					r = "gal"+i;
					$.each($(v).find("a"), function(j,b){
						$(b).attr("rel", r);
						$(b).addClass(r);
					});
					def["rel"] = r;
					jQuery("."+r).colorbox(def); 
				});
			});
		</script>';
	}

	public function colorBoxScripts() {
		wp_register_script('colorBoxScripts', YoPressBase::instance()->getCoreUrl().'components/colorbox/src/jquery.colorbox-min.js', array('jquery'), '1.4', true);
		wp_enqueue_script('colorBoxScripts');
	}

	public function colorBoxStyles() {
		wp_register_style('colorBoxStyles', YoPressBase::instance()->getCoreUrl().'components/colorbox/src/colorbox.css');
		wp_enqueue_style('colorBoxStyles');
	}

	public function registerAdminSettings() {
		parent::registerAdminSettings();

		$settings = array(
			array(
				'name'=>'yopress_colorbox_transition',
				'type' => 'dropdown',
				'label' => 'Transition effect',
				'default' => $this->defaultSettings['yopress_colorbox_transition'],
				'htmlOptions' => array()
			),
			array(
				'name'=>'yopress_colorbox_speed',
				'type' => 'input',
				'label' => 'Animation speed (ms)',
				'default' => $this->defaultSettings['yopress_colorbox_speed'],
				'htmlOptions' => array()
			),
			array(
				'name'=>'yopress_colorbox_slideshow',
				'type' => 'checkbox',
				'label' => 'Enable Slideshow',
				'default' => $this->defaultSettings['yopress_colorbox_slideshow'],
				'htmlOptions' => array()
			),
		);

		foreach($settings as $setting) {
			YoPressBase::instance()->registerAdminSettings($this->config['tab'], $this->config['section'], $this->config['priority'], 0, $setting);
		}
	}
}

?>