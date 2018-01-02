<?php
class YoPressGalleryClean extends YoPressComponent {
	
	private $config;

	private $defaults = array(
		'tab'=>'Gallery',
		'section'=>'General',
		'priority'=>0
	);

	private $defaultSettings = array(
		'yopress_gallery_clean_link'=>array('full'=>'Full','attachement'=>'Attachement'),
		'yopress_gallery_clean_size'=>'thumbnail',
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
		add_filter('post_gallery', array($this, 'cleanGallery'), 10, 2);
	}

	public function init() {
		
	}

	public function registerAdminSettings() {
		parent::registerAdminSettings();

		$settings = array(
			array(
				'name'=>'yopress_gallery_clean_link',
				'type' => 'dropdown',
				'label' => 'Image link leads to ...',
				'default' => $this->defaultSettings['yopress_gallery_clean_link'],
				'htmlOptions' => array()
			)
		);

		foreach($settings as $setting) {
			YoPressBase::instance()->registerAdminSettings($this->config['tab'], $this->config['section'], $this->config['priority'], 0, $setting);
		}
	}
	
	public function cleanGallery($output, $attr) {
		static $cleaner_gallery_instance = 0;
		$cleaner_gallery_instance++;

		if (is_feed())
			return $output;

		/* Default gallery settings. */
		$defaults = array(
			'order'       => 'ASC',
			'orderby'     => 'ID',
			'id'          => get_the_ID(),
			'link'        => '',
			'itemtag'     => 'figure',
			'icontag'     => '',
			'captiontag'  => '',
			'columns'     => 3,
			'size'        => 'thumbnail',
			'ids'         => '',
			'include'     => '',
			'exclude'     => '',
			'numberposts' => -1,
			'offset'      => ''
		);
		
		$attr = array_merge($defaults, $attr);
	
		extract($attr);
		$id = intval($id);

		/* Arguments for get_children(). */
		$children = array(
			'post_status'      => 'inherit',
			'post_type'        => 'attachment',
			'post_mime_type'   => 'image',
			'order'            => $order,
			'orderby'          => $orderby,
			'exclude'          => $exclude,
			'include'          => $include,
			'numberposts'      => $numberposts,
			'offset'           => $offset,
			'suppress_filters' => true
		);

		if (empty($include)) {
			$attachments = get_children(array_merge(array('post_parent' => $id), $children));
		} else {
			$attachments = get_posts($children);
		}

		$attr['link'] = get_option('yopress_gallery_clean_link');

		if ($attr['link'] == '' || $attr['link'] == null) {
			$attr['link'] = 'big-thumbnail';
			update_option('yopress_gallery_clean_link', 'full');
		}

		$size = get_option('yopress_theme_gallery_def_size');

		if ($size == '' || $size == null) {
			$size = 'thumbnail';
			update_option('yopress_gallery_clean_size', 'thumbnail');
		}

		if (empty($attachments))
			return '<!-- No images. -->';
		
		$itemtag    = tag_escape($itemtag);
		$icontag    = tag_escape($icontag);
		$captiontag = tag_escape($captiontag);
		$columns = intval($columns);
	
		$i = 0;

		$galleryWidth = floor(100/$columns);
		
		$style = '<style type="text/css">#gallery-'.$cleaner_gallery_instance.' .gallery-item			{ width : '.$galleryWidth.'%}</style>';
		
		$output = $style;

		$output .= '<div id="gallery-'.$cleaner_gallery_instance.'" class="gallery gallery-columns-'.$columns.' gallery-size-thumbnail">';
	
		$itemInColum = 0;
		foreach ($attachments as $attachment) {
			$output .= '<dl class="gallery-item"><dt class="gallery-icon">';
				$image = ((isset($attr['link']) && 'full' == $attr['link']) ? wp_get_attachment_link($attachment->ID, $size, false, false) : wp_get_attachment_link($attachment->ID, $size, true, false));
			
			$lightbox = $attr['link'] == 'full' ? 'class="apply-lightbox"' : '' ;
			$output .= "<div ".$lightbox.">";
			
			$output .= apply_filters('cleaner_gallery_image', $image, $attachment->ID, $attr, $cleaner_gallery_instance);

			$output .= '</div>';
			
			$output .= '</dt></dl>';			
			$itemInColum++;
			if($itemInColum == $columns){
				$itemInColum = 0;
				$output .= '<br class="clearfix">';
			}
		}
		$output .= '<br class="clearfix">';
		$output .= "</div><!-- .gallery -->";
		return $output;
	}
}
?>