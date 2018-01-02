<?php
YoPressBase::instance()->addDependency('YoPressUploader');

class YoPressUserProfileExtender extends YoPressComponent {

	static $instanceId;

	public function __construct() {
		parent::__construct();
		if(!self::$instanceId) {
			self::$instanceId = 1;
		} else {
			self::$instanceId++;
		}
	}

	function registerHooks($action, $avaiableActions=array()) {
		// Additional fields for user profile
		add_filter('user_contactmethods', array($this, 'additionalProfileFields'), 10, 1);

		// Additional actions for edit/show user profile
		add_action('show_user_profile', array($this, 'userProfileImageField'));
		add_action('edit_user_profile', array($this, 'userProfileImageField'));

		// Save/edit user profile image
		add_action('personal_options_update', array($this, 'saveUserProfileImageField'));
		add_action('edit_user_profile_update', array($this, 'saveUserProfileImageField'));
	}

	function additionalProfileFields($contactmethods) {
		$contactmethods['twitter'] = 'YoPress Twitter';
		$contactmethods['facebook'] = 'YoPress Facebook';
		$contactmethods['googleplus'] = 'YoPress Google+';
		$contactmethods['userrole'] = 'YoPress User Role';

		return $contactmethods;
	}

	function userProfileImageField($user) { ?>
		<h3><?php _e("User Image", "YoPress"); ?></h3>
		<table class="form-table">
		<tr>
			<th><label for="image"><?php _e("YoPress Image", "YoPress"); ?></label></th>
			<td>
			<?php

			$imageUrl = esc_attr(get_the_author_meta('image', $user->ID));

			if ($imageUrl) {
				echo "<img src='" . $imageUrl . "' width='50' height='50' /><br/>";
			}

			$uploader = new YoPressUploader();
			$uploader->uploadForm(array(
				'name'=>'image',
				'id'=>'image',
				'value'=> esc_attr(get_the_author_meta('image', $user->ID)),
				'class'=>'user-upload-image'
			));
			?>
		</td>
		</tr>
		</table>
	<?php
	}

	function saveUserProfileImageField($userId) {
		if (!current_user_can('edit_user', $userId)) {
			return false;
		}

		update_user_meta($userId, 'image', $_POST['image']);
	}

	public function getUsersProfiles() {
		$profiles = array();
		$usersProfilesArray = get_users('orderby=login');

		foreach ($usersProfilesArray as $user) {
			$image = get_the_author_meta('image', $user->ID);

			

			if ($image != '') {
				$image = YoPressHelperModule::getImageSize($image, '300x300');
			} else {
				$imageObject =  get_avatar(get_the_author_meta('ID'), 300);
				$src = preg_match('/src=[\"|\'](.+?)[\"|\']/', $imageObject, $match);
				$image = $match[1];
			}

			$profiles[] = array(
				'user_id'=>$user->ID,
				'image'=>$image,
				'name'=>$user->display_name,
				'url'=>$user->user_url,
				'role'=>get_the_author_meta('userrole', $user->ID),
				'facebook'=>get_the_author_meta('facebook', $user->ID),
				'twitter'=>get_the_author_meta('twitter', $user->ID),
				'googleplus'=>get_the_author_meta('googleplus', $user->ID),
				'description'=>$user->description
			);
		}

		return $profiles;
	}

	public function getUserImage($userId, $size=array(), $imageSize=array()) {
		$size = array_merge(array('width'=>80, 'height'=>80), $size);
		$imageSize = array_merge(array('width'=>$size['width'], 'height'=>$size['height']), $imageSize);

		if (is_user_logged_in()) {
			$imageUrl = esc_attr(get_the_author_meta('image', $userId));

			if (isset($imageUrl) && $imageUrl != '') {
				
				$userImage = YoPressHelperModule::getImageSize($imageUrl, $size['width'] . 'x' . $size['height']);
				return '<img alt="" src="'.$userImage.'" height="'.$imageSize['height'].'" width="'.$imageSize['width'].'" />';
			} else {
				return get_avatar(get_the_author_meta('ID'), $imageSize['width']);
			}
		} else {
			return get_avatar(get_the_author_meta('ID'), $imageSize['width']);
		}
	}

	public function getUserImageURL($userId, $email, $size=array(), $imageSize=array()) {
		$size = array_merge(array('width'=>80, 'height'=>80), $size);
		$imageSize = array_merge(array('width'=>$size['width'], 'height'=>$size['height']), $imageSize);

		if ($userId != 0) {
			$imageUrl = esc_attr(get_the_author_meta('image', $userId));

			if (isset($imageUrl) && $imageUrl != '') {
				$userImage = YoPressHelperModule::getImageSize($imageUrl, $size['width'] . 'x' . $size['height']);
				return $userImage;
			} else {
				$imageObject = get_avatar(get_the_author_meta('ID'), $imageSize['width']);
				$src = preg_match('/src=[\"|\'](.+?)[\"|\']/', $imageObject, $match);
				$image = $match[1];
				return $image;
			}
		} else {
			$imageObject = get_avatar($email, $imageSize['width']);
				$src = preg_match('/src=[\"|\'](.+?)[\"|\']/', $imageObject, $match);
				$image = $match[1];
				return $image;
		}
	}

	public function componentFolderName() {
		return 'userprofileextender';
	}
	
	public function componentPath() {
		return __DIR__;
	}
}