<?php
class YoPressNivoSlider extends YoPressComponent implements IRunableComponent {

	private $run = false;
	private $config;
	private $defaults = array(
			'tab'=>'Slider',
			'section'=>'Nivo Slider',
			'priority'=>0
		);
	
	private $defaultSettings = array('yopress_nivo_slider_number_of_slides'=>3);

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

		add_action('admin_enqueue_scripts', array($this, 'nivoSliderScripts'));
		add_action('admin_enqueue_scripts', array($this, 'nivoSliderStyles'));
		add_action('admin_enqueue_scripts', array($this, 'nivoSliderRun'));
	}

	public function run($config = array()) {
		
		wp_enqueue_script('nivoSliderScript');
		wp_enqueue_style('nivoSlider');
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
					'img_src'=>$imgsrc[0],
					'post_id'=>$post->ID,
					'firstline'=>$firstline,
					'secondline'=>$secondline,
					'the_excerpt'=>$exc
					);


			$postCount++;

		endwhile;
		endif;
		
		if (count($postsData) > 0) {
			YoPressBase::instance()->webView->renderPath('/components/nivoslider/views/index', array('postsData'=>$postsData));
		} else {
			get_template_part('content','slider-empty');
		}

        wp_reset_postdata();
	}
	
	public function nivoSliderRun() {
		if($this->run)
			echo '<script type="text/javascript">jQuery(document).ready(function(){jQuery("#nivoslider").nivoSlider();});</script>';
	}

	public function nivoSliderScripts() {
		wp_register_script('nivoSliderScript', YoPressBase::instance()->getCoreUrl().'/components/nivoslider/js/jquery.nivo.slider.pack.js', array('jquery'));
		
	}

	public function nivoSliderStyles() {
		
		wp_register_style('nivoSlider', YoPressBase::instance()->getCoreUrl().'/components/nivoslider/css/nivoslider.css');
		
	}

	public function registerAdminSettings() {
		parent::registerAdminSettings();

		//YoPressBase::instance()->registerAdminPage(__t('Slider settings'), 'slider-settings',2);
		//YoPressBase::instance()->registerAdminPageSettings('slider-settings', array($this, 'settings'), __t('Slider'), __t('Description'), 4);
	}
	
	public function settings(){
		 return array(
			array(
				'name'=>'nivo_slider_number_of_slides',
				'type' => 'input',
				'label' => 'Number of slides displayed in slider',
				'default' => '5',
				'htmlOptions' => array()
			),
			array(
				'name'=>'nivo_slider_display_category',
				'type' => 'categorySelect',
				'label' => 'Category which will be displayed in slider',
				'default' => '',
				'htmlOptions' => array()
			)
		);
	}
}

?>