<?php
class YoPressDynamicSidebar extends YoPressComponent {
	private $defaultSettings = array(
		'dynamic_sidebar_count' => 2
	);

	public function __construct() {
		add_action('init', array($this, 'registerSidebars'));
	}

	public function registerHooks($action, $avaiableActions=array()) {
		parent::registerHooks($action, $avaiableActions=array());
	}

	public function registerAdminSettings() {
		parent::registerAdminSettings();

		$settings = array(
				'name'=>'dynamic_sidebar_count',
				'type' => 'input',
				'label' => 'number of sidebars',
				'default' => $this->defaultSettings['dynamic_sidebar_count'],
				'htmlOptions' => array()
		);

		YoPressBase::instance()->registerAdminSettings('Sidebars','General','Some excerpt settings', 0, $settings);

//		$numberOfSidebars = get_option('dynamic_sidebar_count');
//		if($numberOfSidebars == null || $numberOfSidebars == '') $numberOf = $this->defaultSettings['dynamic_sidebar_count'];
//		for($i = 1; $i <= $numberOfSidebars; $i++){
//			$settings = array(
//				'name'=>'dynamic_sidebar_no_'.$i,
//				'type' => 'input',
//				'label' => 'number of sidebars',
//				'default' => '',
//				'htmlOptions' => array(
//					
//				)
//			);
//		
//			YoPressBase::instance()->registerAdminSettings('Sidebars','Sidebars','Some excerpt settings', 0, $settings);
//		}
	}

	public function registerSidebars() {
		$numberOfSidebars = get_option('dynamic_sidebar_count');
		if($numberOfSidebars == null || $numberOfSidebars == '') $numberOf = $this->defaultSettings['dynamic_sidebar_count'];

		for($i = 1; $i <= $numberOfSidebars; $i++) {
			register_sidebar(array(
				'id' => 'dynamicright-sidebar-'.$i,
				'name' => sprintf(__('Dynamic Sidebar no %s', 'YoPress'), $i),
				'description' => __('Dynamic sidebar', 'YoPress'),
				'before_widget' => '<li class="widget generic">',
				'after_widget' => '</li>',
				'before_title' => '<header><hgroup class="fancy-headers"><h1>',
				'after_title' => '</h1></hgroup></header>'
			));
		}
		
			/*	?>
		<select>
		<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
			 <option value="<?php echo ucwords( $sidebar['id'] ); ?>">
					  <?php echo ucwords( $sidebar['name'] ); ?>
			 </option>
		<?php } ?>
		</select>
		<?php */ 
	}

	public function componentPath(){
		return __DIR__;
	}
}
?>