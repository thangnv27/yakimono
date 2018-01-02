<?php
class YoPressFlexSlider extends YoPressComponent implements IRunableComponent {

	private $run = false;
	private $slider;
	private $config;
	private $defaults = array(
			'tab'=>'Slider',
			'section'=>'Flex Slider',
			'priority'=>0
		);
	
	private $defaultSettings = array('yopress_flex_slider_number_of_slides'=>3);

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
		add_action('admin_enqueue_scripts', array($this, 'flexSliderScripts'));
		add_action('admin_enqueue_scripts', array($this, 'flexSliderStyles'));
		add_action('admin_enqueue_scripts', array($this, 'flexSliderRun'));
		
	}

	public function run($config = array()) {
		
		wp_enqueue_script('flexSliderScript');
		wp_enqueue_style('flexSlider');
		$this->run = true;
		
		global $post;

		$cat_id = YSettings::g('slider_cat', '');
		$query = array('cat' => $cat_id);
		$queryObject = new WP_Query($query);

		$postCount = 0;
		$maxCount = YSettings::g('slider_post_count', 5);

		
		$postsData = array();

		if ($queryObject->have_posts()) : while ($queryObject->have_posts()) : $queryObject->the_post();
			if (!has_post_thumbnail()) {
				continue;
			}

			if($postCount >= $maxCount) {
				break;
			}

			$postCount++;

			$words = explode(' ', get_the_title());
			$firstline = '';
			$secondline = '';

			foreach ($words as $nextWord) {
				if (strlen($firstline) + strlen($nextWord) < 24) {
					$firstline .=' ' . array_shift($words);
				}
			}

			foreach ($words as $word) {
				$secondline .= ' ' . $word;
			}

			$excerpt = get_the_excerpt();
			$exc = mb_substr($excerpt, 0, 190);

			if (strlen($excerpt) > 190) {
				$exc .= ' ...';
			}

			$imageSize = isset($config['imageSize']) ? $config['imageSize'] : 'original';
			$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id(), $imageSize);

			$postsData[] = array(
				'permalink'=>get_permalink(),
				'firstline'=>$firstline,
				'secondline'=>$secondline,
				'img_src'=>$imgsrc[0],
				'the_excerpt'=>$exc
			);

		endwhile;
		endif;

		
		if (count($postsData) > 0) {
			YoPressBase::instance()->webView->renderPath('/components/flexslider/views/index', array('postsData'=>$postsData));
		} else {
			get_template_part('content','slider-empty');
		}

        wp_reset_postdata();
	}

	public function flexSliderRun() {
		if($this->run)
			echo '<script type="text/javascript">jQuery(document).ready(function(){jQuery(".flexslider").flexslider({animation: "slide"});});</script>';
	}

	public function flexSliderScripts() {
		wp_register_script('flexSliderScript', YoPressBase::instance()->getCoreUrl().'/components/flexslider/js/jquery.flexslider.min.js', array('jquery'));
		
	}

	public function flexSliderStyles() {
		wp_register_style('flexSlider', YoPressBase::instance()->getCoreUrl().'/components/flexslider/css/flexslider.css');
		
	}

	public function registerAdminSettings() {
		parent::registerAdminSettings();

		$settings = array(
			array(
				'name'=>'yopress_flex_slider_number_of_slides',
				'type' => 'input',
				'label' => 'Number of slides displayed in slider',
				'default' => $this->defaultSettings['yopress_flex_slider_number_of_slides'],
				'htmlOptions' => array()
			),
			array(
				'name'=>'yopress_flex_slider_display_category',
				'type' => 'categorySelect',
				'label' => 'Category which will be displayed in slider',
				'default' => '',
				'htmlOptions' => array()
			)
		);

		foreach($settings as $setting) {			
			YoPressBase::instance()->registerAdminSettings($this->config['tab'], $this->config['section'], $this->config['priority'], 0, $setting);
		}
	}
}

?>