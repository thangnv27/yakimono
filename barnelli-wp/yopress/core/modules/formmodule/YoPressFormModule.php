<?php

class YoPressFormModule {
	private static $instance;
	
	/** @var YoPressFormModel */
	private $model = null;
	
	private $uniqueNameProtector = array(); 
	
	public function init(){
		if(self::$instance != null){
			throw new Exception('Singleton class YoPressFormModule cannot 
				be inited more than one time!');
		}
		
		self::$instance = $this;
		$this->model = new YoPressFormModel;
	}
	
	/**
	 * 
	 * @return YoPressFormModule
	 */
	public static function instance(){
		if(self::$instance)
			return self::$instance;
	}
	
	public function rowHeader($name, $desc) {
		echo '<tr valign="top">
				<td colspan="2">
					<h3>'.$name.'</h3>
					<p class="desc-text">'.$desc.'</p>
				</td>
			</tr>';
	}

	public function rowSpacer(){
		echo '<tr valign="top"><td colspan="2"><hr></td></tr>';
	}
	
	/**
	 * Render the options tags for select
	 * 
	 * @param string $name
	 * @param array $options
	 * @param boolean $return
	 */
	public function listOptions($name, $options, $return=false) {
		$optionValue = $this->model->fieldValue($name);
		$returnValue = '';

		if (($optionValue == '') || !isset($optionValue)) {
			if (isset($options['selected']) && ($options['selected'] != '')) {
				$optionValue = $options['selected'];
			}
		}

		$defaultOptions = $options['default'];
		
		foreach($defaultOptions as $key => $value) {
			$selected = '';
			if ($optionValue == $key) $selected = 'selected="selected"';
			if ($return) {
				$returnValue .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
			} else {
				echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';	
			}
		}
		if ($return) {
			return $returnValue;
		}
	}
	
	/**
	 * Render one row in form avaliable types $options['type']
	 * - checkbox
	 * - input 
	 * - uploader
	 * - categorySelect
	 * - dropdown
	 * - textarea
	 * 
	 * @param string $name
	 * @param array $options
	 */
	public function activeRow($name, $options, $raw = false){
		if(in_array($name, $this->uniqueNameProtector)){
			throw new Exception('Trying add option name that already exist! Name:'.$name);
		} else {
			$this->uniqueNameProtector[] = $name;
		}
		$options['name'] = $name;
		$options['id'] = $name.'_id';

		if(!isset($options['default'])) $options['default'] = '';

		if($options['type'] == 'password') {
			$this->renderPasswordInput($name, $options, $raw);
		} else if($options['type'] == 'checkbox') {
			$this->renderCheckbox($name, $options);
		} else if ($options['type'] == 'hiddenInput') {
			$this->renderInput($name, $options, $raw, true);
		} else if($options['type'] == 'input') {
			$this->renderInput($name, $options, $raw, false);
		} else if($options['type'] == 'uploader') {
			$this->renderUploader($name, $options, $raw);
		} else if($options['type'] == 'categorySelect') {
			$this->renderCategorySelect($name, $options, $raw);
		} else if($options['type'] == 'dropdown') {
			$this->renderDropdown($name, $options, $raw);
		} else if($options['type'] == 'textarea') {
			$this->renderTextarea($name, $options, $raw, false);
		} else if($options['type'] == 'hiddenTextarea') {
			$this->renderTextarea($name, $options, $raw, true);
		} else if($options['type'] == 'slider') {
			$this->renderSlider($name, $options, $raw);
		} else if($options['type'] == 'custom') {
			$options['value'] = $this->model->fieldValue($name);
			$options['name'] = $this->model->fieldName($name);
			call_user_func($options['content'], $options);
		} else if($options['type'] == 'colorpicker') {
			$this->renderColorpicker($name, $options);
		} else if($options['type'] == 'iconpicker') {
			$this->renderIconpicker($name, $options, $raw);
		} else if($options['type'] == 'fontpicker') {
			$this->renderGoogleFontpicker($name, $options, $raw);
		} else {
			throw new Exception('YoPressFormModule: activeRow for type:'.$options['type'].' dosen\'t exist!');
		}
	}

	/*
	 * Private specified render functions
	 */
	private function renderCheckbox($name, $options){
		$checked = ($this->model->fieldValue($name, $options['default']) == 1) ? 'checked="checked"' : '';
		$htmlOptions = $this->makeHtmlOptions($options);
		$content = '<input name="'.$this->model->fieldName($options['name']).'" value="0" type="hidden"/>
					<input style="width:15px;" id="'.$options['id'].'" name="'.$this->model->fieldName($name).'"  type="checkbox" '.$checked.' value="1" '.$htmlOptions.'/>';
		$this->renderRowWrapper($content, $options);
	}
	
	private function renderPasswordInput($name, $options, $raw) {
		$value = $this->model->fieldValue($name, $options['default']);
		$htmlOptions = $this->makeHtmlOptions($options);
		$content = '<input type="password" id="'.$options['id'].'" name="'.$this->model->fieldName($name).'" value="'.$value.'" '.$htmlOptions.'/>';
		if(!$raw) {
			$this->renderRowWrapper($content, $options);
		}

		else echo $content;
	}

	private function renderInput($name, $options, $raw, $hidden) {
		$value = $this->model->fieldValue($name, $options['default']);
		$htmlOptions = $this->makeHtmlOptions($options);
		$type = ($hidden) ? 'hidden' : 'text';
		$content = '<input type="'.$type.'" id="'.$options['id'].'" name="'.$this->model->fieldName($name).'" value="'.$value.'" '.$htmlOptions.'/>';
		if(!$raw) {
			if ($hidden) {
				$this->renderHiddenRowWrapper($content, $options);
			} else {
				$this->renderRowWrapper($content, $options);
			}
		}

		else echo $content;
	}

	private function renderSlider($name, $options, $raw) {
		wp_enqueue_script('jquery-ui-slider');

		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style('jquery-style', $protocol . '://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css');
		$value = $this->model->fieldValue($name, $options['default']);

		$content = '<div style="width:95%" id="slider-'.$options['id'].'"></div><br/><input type="text" id="'.$options['id'].'" name="'.$this->model->fieldName($name).'" value="'.$value.'" />';

		$content .= '<script>
	jQuery(function() {
		jQuery("#slider-'.$options['id'].'").slider({
			width: 200,
			range: "max",
			min: '.$options["htmlOptions"]["min"].',
			max: '.$options["htmlOptions"]["max"].',
			value: '.$value.',
			slide: function(event, ui) {
				jQuery("#'.$options['id'].'").val(ui.value);
			}
		});
		jQuery( "#'.$options['id'].'" ).val(jQuery("#slider-'.$options['id'].'").slider("value"));
	});
	</script>';

		if(!$raw) {
			$this->renderRowWrapper($content, $options);
		}

		else echo $content;
	}

	private function renderTextarea($name, $options, $raw, $hidden) {
		$value = $this->model->fieldValue($name, $options['default']);
		$htmlOptions = $this->makeHtmlOptions($options);

		$content = '<textarea id="'.$options['id'].'" name="'.$this->model->fieldName($name).'" '.$htmlOptions.'/>'.$value.'</textarea>';

		if ($raw) {
			echo $content;
		} else {
			if ($hidden) {
				$this->renderHiddenRowWrapper($content, $options);
			} else {
				$this->renderRowWrapper($content, $options);
			}
		}
	}
	
	private function renderColorpicker($name, $options) {
		$value = $this->model->fieldValue($name, $options['default']);
		$htmlOptions = $this->makeHtmlOptions($options);
		$content = '<input type="text" name="'.$this->model->fieldName($name).'" id="'.$options['id'].'" value="'.$value.'" class="yopressColorPicker" data-default-color="'.$options['default'].'"/>';
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'yopressColorpickerSetup', UrlManagerModule::instance()->baseUrl.'/core/admin/js/yopressColorpickerSetup.js' , array('wp-color-picker'));
	
		$this->renderRowWrapper($content, $options);
	}

	private function renderGoogleFontpicker($name, $options) {
		$value = $this->model->fieldValue($name, $options['default']);
		$htmlOptions = $this->makeHtmlOptions($options);

		$output = '<div class="select_wrapper">';
		$output .= '<select class="select of-input google_font_select" data-id="'.$name.'" id="'.$this->model->fieldName($name).'" name="'.$this->model->fieldName($name).'" '.$htmlOptions.'>';
		$output .= $this->listOptions($name, $options, true);
		$output .= '</select></div>';

		$output .= '<p class="'.$name.'_ggf_previewer">0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz</p>';

		wp_enqueue_script('yopress-font-picker', UrlManagerModule::instance()->baseUrl.'/core/admin/js/yopressGoogleFontsPicker.js', array(), '1.0.0', true );

		$this->renderRowWrapper($output, $options);
	}

	private function renderIconpicker($name, $options, $raw) {
		$value = $this->model->fieldValue($name, $options['default']);
		$htmlOptions = $this->makeHtmlOptions($options);
		$content = '';

		$iconsList = array(
			'fa fa-glass',
			'fa fa-music',
			'fa fa-search',
			'fa fa-envelope-o',
			'fa fa-heart',
			'fa fa-star',
			'fa fa-star-o',
			'fa fa-user',
			'fa fa-film',
			'fa fa-th-large',
			'fa fa-th',
			'fa fa-th-list',
			'fa fa-check',
			'fa fa-times',
			'fa fa-search-plus',
			'fa fa-search-minus',
			'fa fa-power-off',
			'fa fa-signal',
			'fa fa-cog',
			'fa fa-trash-o',
			'fa fa-home',
			'fa fa-file-o',
			'fa fa-clock-o',
			'fa fa-road',
			'fa fa-download',
			'fa fa-arrow-circle-o-down',
			'fa fa-arrow-circle-o-up',
			'fa fa-inbox',
			'fa fa-play-circle-o',
			'fa fa-repeat',
			'fa fa-refresh',
			'fa fa-list-alt',
			'fa fa-lock',
			'fa fa-flag',
			'fa fa-headphones',
			'fa fa-volume-off',
			'fa fa-volume-down',
			'fa fa-volume-up',
			'fa fa-qrcode',
			'fa fa-barcode',
			'fa fa-tag',
			'fa fa-tags',
			'fa fa-book',
			'fa fa-bookmark',
			'fa fa-print',
			'fa fa-camera',
			'fa fa-font',
			'fa fa-bold',
			'fa fa-italic',
			'fa fa-text-height',
			'fa fa-text-width',
			'fa fa-align-left',
			'fa fa-align-center',
			'fa fa-align-right',
			'fa fa-align-justify',
			'fa fa-list',
			'fa fa-outdent',
			'fa fa-indent',
			'fa fa-video-camera',
			'fa fa-picture-o',
			'fa fa-pencil',
			'fa fa-map-marker',
			'fa fa-adjust',
			'fa fa-tint',
			'fa fa-pencil-square-o',
			'fa fa-share-square-o',
			'fa fa-check-square-o',
			'fa fa-arrows',
			'fa fa-step-backward',
			'fa fa-fast-backward',
			'fa fa-backward',
			'fa fa-play',
			'fa fa-pause',
			'fa fa-stop',
			'fa fa-forward',
			'fa fa-fast-forward',
			'fa fa-step-forward',
			'fa fa-eject',
			'fa fa-chevron-left',
			'fa fa-chevron-right',
			'fa fa-plus-circle',
			'fa fa-minus-circle',
			'fa fa-times-circle',
			'fa fa-check-circle',
			'fa fa-question-circle',
			'fa fa-info-circle',
			'fa fa-crosshairs',
			'fa fa-times-circle-o',
			'fa fa-check-circle-o',
			'fa fa-ban',
			'fa fa-arrow-left',
			'fa fa-arrow-right',
			'fa fa-arrow-up',
			'fa fa-arrow-down',
			'fa fa-share',
			'fa fa-expand',
			'fa fa-compress',
			'fa fa-plus',
			'fa fa-minus',
			'fa fa-asterisk',
			'fa fa-exclamation-circle',
			'fa fa-gift',
			'fa fa-leaf',
			'fa fa-fire',
			'fa fa-eye',
			'fa fa-eye-slash',
			'fa fa-exclamation-triangle',
			'fa fa-plane',
			'fa fa-calendar',
			'fa fa-random',
			'fa fa-comment',
			'fa fa-magnet',
			'fa fa-chevron-up',
			'fa fa-chevron-down',
			'fa fa-retweet',
			'fa fa-shopping-cart',
			'fa fa-folder',
			'fa fa-folder-open',
			'fa fa-arrows-v',
			'fa fa-arrows-h',
			'fa fa-bar-chart-o',
			'fa fa-twitter-square',
			'fa fa-facebook-square',
			'fa fa-camera-retro',
			'fa fa-key',
			'fa fa-cogs',
			'fa fa-comments',
			'fa fa-thumbs-o-up',
			'fa fa-thumbs-o-down',
			'fa fa-star-half',
			'fa fa-heart-o',
			'fa fa-sign-out',
			'fa fa-linkedin-square',
			'fa fa-thumb-tack',
			'fa fa-external-link',
			'fa fa-sign-in',
			'fa fa-trophy',
			'fa fa-github-square',
			'fa fa-upload',
			'fa fa-lemon-o',
			'fa fa-phone',
			'fa fa-square-o',
			'fa fa-bookmark-o',
			'fa fa-phone-square',
			'fa fa-twitter',
			'fa fa-facebook',
			'fa fa-github',
			'fa fa-unlock',
			'fa fa-credit-card',
			'fa fa-rss',
			'fa fa-hdd-o',
			'fa fa-bullhorn',
			'fa fa-bell',
			'fa fa-certificate',
			'fa fa-hand-o-right',
			'fa fa-hand-o-left',
			'fa fa-hand-o-up',
			'fa fa-hand-o-down',
			'fa fa-arrow-circle-left',
			'fa fa-arrow-circle-right',
			'fa fa-arrow-circle-up',
			'fa fa-arrow-circle-down',
			'fa fa-globe',
			'fa fa-wrench',
			'fa fa-tasks',
			'fa fa-filter',
			'fa fa-briefcase',
			'fa fa-arrows-alt',
			'fa fa-users',
			'fa fa-link',
			'fa fa-cloud',
			'fa fa-flask',
			'fa fa-scissors',
			'fa fa-files-o',
			'fa fa-paperclip',
			'fa fa-floppy-o',
			'fa fa-square',
			'fa fa-bars',
			'fa fa-list-ul',
			'fa fa-list-ol',
			'fa fa-strikethrough',
			'fa fa-underline',
			'fa fa-table',
			'fa fa-magic',
			'fa fa-truck',
			'fa fa-pinterest',
			'fa fa-pinterest-square',
			'fa fa-google-plus-square',
			'fa fa-google-plus',
			'fa fa-money',
			'fa fa-caret-down',
			'fa fa-caret-up',
			'fa fa-caret-left',
			'fa fa-caret-right',
			'fa fa-columns',
			'fa fa-sort',
			'fa fa-sort-asc',
			'fa fa-sort-desc',
			'fa fa-envelope',
			'fa fa-linkedin',
			'fa fa-undo',
			'fa fa-gavel',
			'fa fa-tachometer',
			'fa fa-comment-o',
			'fa fa-comments-o',
			'fa fa-bolt',
			'fa fa-sitemap',
			'fa fa-umbrella',
			'fa fa-clipboard',
			'fa fa-lightbulb-o',
			'fa fa-exchange',
			'fa fa-cloud-download',
			'fa fa-cloud-upload',
			'fa fa-user-md',
			'fa fa-stethoscope',
			'fa fa-suitcase',
			'fa fa-bell-o',
			'fa fa-coffee',
			'fa fa-cutlery',
			'fa fa-file-text-o',
			'fa fa-building-o',
			'fa fa-hospital-o',
			'fa fa-ambulance',
			'fa fa-medkit',
			'fa fa-fighter-jet',
			'fa fa-beer',
			'fa fa-h-square',
			'fa fa-plus-square',
			'fa fa-angle-double-left',
			'fa fa-angle-double-right',
			'fa fa-angle-double-up',
			'fa fa-angle-double-down',
			'fa fa-angle-left',
			'fa fa-angle-right',
			'fa fa-angle-up',
			'fa fa-angle-down',
			'fa fa-desktop',
			'fa fa-laptop',
			'fa fa-tablet',
			'fa fa-mobile',
			'fa fa-circle-o',
			'fa fa-quote-left',
			'fa fa-quote-right',
			'fa fa-spinner',
			'fa fa-circle',
			'fa fa-reply',
			'fa fa-github-alt',
			'fa fa-folder-o',
			'fa fa-folder-open-o',
			'fa fa-smile-o',
			'fa fa-frown-o',
			'fa fa-meh-o',
			'fa fa-gamepad',
			'fa fa-keyboard-o',
			'fa fa-flag-o',
			'fa fa-flag-checkered',
			'fa fa-terminal',
			'fa fa-code',
			'fa fa-reply-all',
			'fa fa-mail-reply-all',
			'fa fa-star-half-o',
			'fa fa-location-arrow',
			'fa fa-crop',
			'fa fa-code-fork',
			'fa fa-chain-broken',
			'fa fa-question',
			'fa fa-info',
			'fa fa-exclamation',
			'fa fa-superscript',
			'fa fa-subscript',
			'fa fa-eraser',
			'fa fa-puzzle-piece',
			'fa fa-microphone',
			'fa fa-microphone-slash',
			'fa fa-shield',
			'fa fa-calendar-o',
			'fa fa-fire-extinguisher',
			'fa fa-rocket',
			'fa fa-maxcdn',
			'fa fa-chevron-circle-left',
			'fa fa-chevron-circle-right',
			'fa fa-chevron-circle-up',
			'fa fa-chevron-circle-down',
			'fa fa-html5',
			'fa fa-css3',
			'fa fa-anchor',
			'fa fa-unlock-alt',
			'fa fa-bullseye',
			'fa fa-ellipsis-h',
			'fa fa-ellipsis-v',
			'fa fa-rss-square',
			'fa fa-play-circle',
			'fa fa-ticket',
			'fa fa-minus-square',
			'fa fa-minus-square-o',
			'fa fa-level-up',
			'fa fa-level-down',
			'fa fa-check-square',
			'fa fa-pencil-square',
			'fa fa-external-link-square',
			'fa fa-share-square',
			'fa fa-compass',
			'fa fa-caret-square-o-down',
			'fa fa-caret-square-o-up',
			'fa fa-caret-square-o-right',
			'fa fa-eur',
			'fa fa-gbp',
			'fa fa-usd',
			'fa fa-inr',
			'fa fa-jpy',
			'fa fa-rub',
			'fa fa-krw',
			'fa fa-btc',
			'fa fa-file',
			'fa fa-file-text',
			'fa fa-sort-alpha-asc',
			'fa fa-sort-alpha-desc',
			'fa fa-sort-amount-asc',
			'fa fa-sort-amount-desc',
			'fa fa-sort-numeric-asc',
			'fa fa-sort-numeric-desc',
			'fa fa-thumbs-up',
			'fa fa-thumbs-down',
			'fa fa-youtube-square',
			'fa fa-youtube',
			'fa fa-xing',
			'fa fa-xing-square',
			'fa fa-youtube-play',
			'fa fa-dropbox',
			'fa fa-stack-overflow',
			'fa fa-instagram',
			'fa fa-flickr',
			'fa fa-adn',
			'fa fa-bitbucket',
			'fa fa-bitbucket-square',
			'fa fa-tumblr',
			'fa fa-tumblr-square',
			'fa fa-long-arrow-down',
			'fa fa-long-arrow-up',
			'fa fa-long-arrow-left',
			'fa fa-long-arrow-right',
			'fa fa-apple',
			'fa fa-windows',
			'fa fa-android',
			'fa fa-linux',
			'fa fa-dribbble',
			'fa fa-skype',
			'fa fa-foursquare',
			'fa fa-trello',
			'fa fa-female',
			'fa fa-male',
			'fa fa-gittip',
			'fa fa-sun-o',
			'fa fa-moon-o',
			'fa fa-archive',
			'fa fa-bug',
			'fa fa-vk',
			'fa fa-weibo',
			'fa fa-renren',
			'fa fa-pagelines',
			'fa fa-stack-exchange',
			'fa fa-arrow-circle-o-right',
			'fa fa-arrow-circle-o-left',
			'fa fa-caret-square-o-left',
			'fa fa-dot-circle-o',
			'fa fa-wheelchair',
			'fa fa-vimeo-square',
			'fa fa-try',
			'fa fa-plus-square-o');

		$content .= '<link rel="stylesheet" href="'.get_template_directory_uri().'/fonts/css/font-awesome.min.css">
		<div class="yopress-admin-icon-active">
		<i class="'.$value.'"></i>
		<input type="hidden" name="'.$this->model->fieldName($name).'" value="'.$value.'" class="yopressIconPicker" data-default-icon="'.$value.'"/>
		</div>';

		$content .= '<div class="yopress-admin-icon-container" style="display:none">';

		foreach ($iconsList as $icon) {
			$content .= '<i data-icon="'.$icon.'" class="'.$icon.'"></i>';
		}

		$content .= '</div>';

		wp_enqueue_script('yopressIconpicker', UrlManagerModule::instance()->baseUrl.'/core/admin/js/yopressIconpicker.js' , array('jquery'));

		if ($raw) {
			echo $content;
		} else {
			$this->renderRowWrapper($content, $options);	
		}
	}

	private function renderUploader($name, $options, $raw) {
		$value = $this->model->fieldValue($name, $options['default']);
		$htmlOptions = $this->makeHtmlOptions($options);

		$uploader = new YoPressUploader;
		if(!$raw) {
		echo '<tr valign="top">
				<th>
				<label for="'.$options['id'].'">'.$options['label'].'</label>
				</th>
			<td>';
		}
		$uploader->uploadForm(array('name' => $this->model->fieldName($name), 'value' => $value, 'id'=>$options['id']));

		if(!$raw) {
			echo '</td></tr>';
		}
	}

	private function renderCategorySelect($name, $options, $raw) {
		$value = $this->model->fieldValue($name, $options['default']);
		$htmlOptions = $this->makeHtmlOptions($options);
		$htmlOptions['id'] = $options['id'];
		if(!$raw)
		echo '<tr valign="top">
				<th>
				<label for="'.$options['id'].'">'.$options['label'].'</label>
				</th>
				<td>';
		
		$prepend = isset($options['prepend']) ? $options['prepend'] : array();
			YoPressBase::instance()->webView->categorySelect(
					$this->model->fieldName($name), $value, $htmlOptions, $prepend
			);
		if(!$raw)	
		echo '</td></tr>';
	}

	private function renderDropdown($name, $options, $raw) {
		$value = $this->model->fieldValue($name, $options['default']);
		$options['htmlOptions']['id'] = $options['id'];
		$htmlOptions = $this->makeHtmlOptions($options);
		if(!$raw){
		echo '<tr valign="top">
				<th>
				<label for="'.$options['id'].'">'.$options['label'].'</label>
				</th>
				<td>';
		}
		echo "<select name='".$this->model->fieldName($name)."' ".$htmlOptions.">";
		$this->listOptions($name, $options);
		echo "</select>";
		if(!$raw){	
			echo '</td></tr>';
		}
	}

	private function renderRowWrapper($content, $options) {
		echo '<tr class="form-field">
				<th scope="row">
					<label for="'.$options['id'].'">'.$options['label'].'</label>
				</th>
				<td>'.$content.'</td>
			</tr>';
	}

	private function renderHiddenRowWrapper($content, $options) {
		echo '<tr class="form-field" style="display:none;">
				<th scope="row"></th>
				<td>'.$content.'</td>
			</tr>';
	}

	/**
	 * Generate html options
	 * 
	 * @param array $ops
	 * @return string
	 */
	private function makeHtmlOptions($ops){
		if(!isset($ops['htmlOptions'])) $ops['htmlOptions'] = array();
		$ops = $ops['htmlOptions'];
		$o = '';

		if($ops && is_array($ops)) {
			foreach($ops as $key=>$value) {
				$o .= $key .'="'.$value.'" ';
			}
		}

		return $o;
	}
}
?>