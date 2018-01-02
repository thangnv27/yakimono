<?php
/*
 * Render og tags in header
 */
class YoPressOgTags extends YoPressComponent {
	
	private $defaultSettings = array(
		'theme_og_title' => '%post_title% | %blog_name%'
	);
	
	private $config;
	
	private $defaults = array(
			'tab'=>'Social',
			'section'=>'OG tags',
			'priority'=>0
		);
	
	public function __construct($config) {
		if ($config == '') {
			$this->config = $this->defaults;
		} else {
			$this->config = array_merge($this->defaults, $config);
		}
	}
	
	public function registerHooks($action, $avaiableActions=array()) {
		parent::registerHooks($action, $avaiableActions=array());
		add_action('wp_head', array($this, 'renderOgTags'));
	}
	
	public function registerAdminSettings() {
		parent::registerAdminSettings();
	
		YoPressBase::instance()->registerAdminPage('General', 'general-settings', 1);
		YoPressBase::instance()->registerAdminPageSettings('general-settings', array($this, 'settings'), __t('OGTags'), __t('Description'), 4);
	}

	
	public function settings(){
		return  array(
			array(
				'name'=>'theme_og_title',
				'type' => 'input',
				'label' => 'Title',
				'default' => $this->defaultSettings['theme_og_title'],
				'htmlOptions' => array(		
				)
			),
			array(
				'name'=>'theme_og_default_image',
				'type' => 'uploader',
				'label' => 'Default image',
				'default' => '',
				'htmlOptions' => array(		
				)
			),
			array(
				'name'=>'theme_og_admins',
				'type' => 'input',
				'label' => 'Facebook Admins',
				'default' => '',
				'htmlOptions' => array(		
				)
			),
			array(
				'name'=>'theme_og_app_id',
				'type' => 'input',
				'label' => 'Facebook App Id',
				'default' => '',
				'htmlOptions' => array(		
				)
			)
		);
	}
	/*
	 * Render tags
	 */
	public function renderOgTags(){
		global $post;
		$url;
		
		if(!have_posts()){
			$url = '';
		} else {
			$url = get_page_link();
		}
		
		$type = 'article';
		$title = '';
		$image = '';
		$appId = '';
		$admins = '';

		
		if(is_single()) {

			$type = get_post_format( $post->ID );
			$type = $type == 'video' ? $type : 'article';

			if(has_post_thumbnail()){
				$imgs = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
				$image = $imgs[0];
			} else {
				$image = get_option( 'theme_og_default_image' );
			}

		} else {
			$image = get_option( 'theme_og_default_image' );
		}

		
		
		$title = get_option( 'theme_og_title' );

		
		if(isset($post) && !empty($post)){
			$title = str_replace('%post_title%', $post->post_title, $title);
			$title = str_replace('%permalink%', get_permalink(), $title);
		} else {
			$title = str_replace('%post_title%', '', $title);
			$title = str_replace('%permalink%', '', $title);
		}
		
		$title = str_replace('%blog_name%', get_bloginfo('name'), $title);

		if($title == '') {
			if(isset($post))
				$title = $post->post_title . ' | ' . get_bloginfo('name');
			else $title = get_bloginfo('name');
		}
		
		
		$appId = get_option( 'theme_og_app_id' );
		$admins = get_option( 'theme_og_admins' );

		YoPressBase::instance()->webView->renderPath(
				'components/ogtags/views/ogtags',
				array('url' => $url, 'type' => $type, 'title' => $title, 
					'image' => $image, 'admins' => $admins, 'appId' => $appId
				)
		);
	}
}

?>
