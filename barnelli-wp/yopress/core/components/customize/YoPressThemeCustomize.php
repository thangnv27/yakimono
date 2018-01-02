<?php

class YoPressThemeCustomize extends YoPressComponent {
	public function registerHooks($action, $avaiableActions=array()) {
		parent::registerHooks($action, $avaiableActions=array());
		add_action('customize_register', array($this, 'init'));
	}

	public function init($wp_customize) {
		$this->registerControl('Color');

		/*
		 *  Upload logo image
		 */
		$wp_customize->add_section('theme_logo_section' , array(
			'title'			=> __('Logo','orange'),
			'priority'		=> 10,
			'description'	=> 'Set the site logo'
		));

		$wp_customize->add_setting('uploaded_image', array(
			'default'		=> '',
			'transport'		=> 'refresh',
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_upload', array(
			'label'			=> __('Logo', 'orange'),
			'section'		=> 'theme_logo_section',
			'settings'		=> 'uploaded_image',
		)));

		/*
		 * Theme Color picker
		 */
		$wp_customize->add_section('color_theme_section', array(
			'title'			=> __('Color theme','orange'),
			'priority'		=> 12,
			'description'	=> 'Change the base color theme'
		));

		$wp_customize->add_setting('theme_color', array(
			'default'		=> get_theme_mod('theme_color') || 'color-green.css',
			'transport'		=> 'refresh',
		));

		$control = new YoPressColorControl($wp_customize, 'image_preview', array(
			'label'			=> __('Color Theme', 'orange'),
			'section'		=> 'color_theme_section',
			'settings'		=> 'theme_color',
		));

		$control->registerHooks();
		$wp_customize->add_control($control);
	}

	public function registerControl($controlName) {
		$path = 'controlls/YoPress'.$controlName.'Control.php';
		include_once $path;
	}

	public function componentFolderName() {
		return 'customize';
	}
	
	public function componentPath(){
		return __DIR__;
	}
}
?>
