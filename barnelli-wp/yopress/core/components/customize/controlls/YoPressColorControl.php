<?php

class YoPressColorControl extends WP_Customize_Control {
	public $type = 'text';

	public function __construct($manager, $id, $args = array()) {
		parent::__construct($manager, $id, $args);
	}

	public function render_content() {
		?>
		<input id="theme_color_value" <?php $this->link(); ?> type="text" style="display:none"/>
		<dl id="styleswitcher">
			<dt>Choose color</dt>
			<dd><a href="#" class="style green" rel="color-green.css">Green</a></dd>
			<dd><a href="#" class="style orange" rel="color-orange.css">Orange</a></dd>
			<dd><a href="#" class="style red" rel="color-red.css">Red</a></dd>
			<dd><a href="#" class="style violet" rel="color-violet.css">Violet</a></dd>
			<dd><a href="#" class="style blue" rel="color-blue.css">Blue</a></dd>
		</dl>
		<?php
	}

	function script_enqueue() {
		wp_enqueue_script(
			'orange-color-themecustomizer',
			get_template_directory_uri().'/framework/admin/js/theme-color-customizer.js',
			array( 'jquery' ),
			'',
			true
		);
	}

	function style_enqueue() {
		 wp_register_style( 'customize-colot-theme-style', 
			get_template_directory_uri() . '/framework/admin/css/customize_color_style.css', 
			array(),
			'', 
			'' 
		);
		wp_enqueue_style( 'customize-colot-theme-style' );
	}

	function registerHooks() {
		add_action( 'customize_controls_print_styles', array($this, 'style_enqueue' ));
		add_action( 'customize_controls_print_footer_scripts', array($this, 'script_enqueue' ));
	}
}
?>