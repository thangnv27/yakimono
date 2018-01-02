<?php
if (!function_exists ('add_action')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');

	exit();
}

require_once(ABSPATH . '/wp-load.php');
require_once(ABSPATH . '/wp-admin/includes/media.php');
require_once(ABSPATH . '/wp-admin/includes/file.php');
require_once(ABSPATH . '/wp-admin/includes/image.php');

class Demo_Importer {

	public $message = "";
	public $attachments = false;
	public $imagesURL = "";

	public function show_import() {
	?>
	<form method="post" action="" id="importContentForm">
		<table class="form-table">
			<tbody>
				<tr class="form-field" valign="top">
					<th><label for="import_demo">Information</label></th>
					<td>
						
					</td>
				</tr>
<!-- 				<tr class="form-field" valign="top">
					<th><label for="import_demo">Demo Site</label></th>
					<td>
						<select name="import_demo" id="import_demo">
							<option value="demo1">Demo 1 - Extended</option>
							<option value="demo2">Demo 1 - Basic</option>
						</select>
					</td>
				</tr> -->
				<!-- <tr class="form-field">
					<th scope="row">
						<label for="import_attachments"><?php _e('Import media files', THEME_NAME); ?></label>
					</th>
					<td>
						<input type="checkbox" value="1" class="" name="import_attachments" id="import_attachments" />
					</td>
				</tr> -->

				<tr class="form-field">
					<td scope="row" colspan="2">
						<div class="import_load">
							<span>Demo Importer lets you set your Wordpress to look like our demo here<br/><a href="http://demo.yosoftware.com/wp/barnelli-demo/">http://demo.yosoftware.com/wp/barnelli-demo/</a><br/><br/>Please note if you are using WooCommerce make sure you install and setup the plugin first.<br/><br/>
							This import will replace all your content with our. It will delete all posts/pages/menus and then import it from demo. </span><br/><br/>

							<span><?php _e('The import process may take some time. Please be patient.<br/>Allow it to take up to 10 minutes', THEME_NAME); ?> </span><br />

							<div class="html5-progress-bar">
								<div class="progress-bar-wrapper">
									<progress id="progressbar" value="0" max="100"></progress>
								</div>
								<div class="progress-value">0%</div>
								<div class="progress-bar-message">
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr class="form-field">
					<td colspan="2">
						<input type="submit" class="btn btn-primary btn-sm " value="Import" name="import" id="import_demo_data" />
					</td>
				</tr>
			</tbody>
		</table>
		</form>

		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery(document).on('click', '#import_demo_data', function(e) {
					e.preventDefault();

					if (confirm('Make sure you activated recommended plugins! Are you sure, you want to import Demo Data now ? ')) {
						jQuery('.import_load').css('display','block');

						var progressbar = jQuery('#progressbar');
						var import_demo = 'demo1';

						jQuery.ajax({
							type: 'POST',
							url: ajaxurl,
							data: {
								action: 'yopress_import',
								demo: import_demo
							},
							success: function(data, textStatus, XMLHttpRequest) {
								jQuery('.progress-value').html((100) + '%');
								progressbar.val(100);
								jQuery('.progress-bar-message').html('<div class="alert alert-success">Import is completed.</div>');
							},
							error: function(MLHttpRequest, textStatus, errorThrown){
							}
						});
					}

					return false;
				});
			});
		</script>
	<?php
	}

	public function import($file) {
		global $wpdb;

		$file_content = "";
		$file_for_import = get_template_directory() . '/includes/import2/files/' . $file;

		if (file_exists($file_for_import)) {
			$file_content = $this->yopress_file_contents($file_for_import);
		} else {
			$this->message = __("File doesn't exist", THEME_NAME);
		}

		if ($file_content) {
			$prefix = $wpdb->prefix;
			$site_url = site_url();

			if (substr($site_url, -1) != '/') {
				$site_url = $site_url . "/";
			}

			if (is_child_theme()) {
				$file_content = str_replace('[::theme_mods::]', 'theme_mods_barnelli-wp-child', $file_content);
				$file_content = str_replace('[::yopress::]', 'YoPress-Barnelli Child Theme', $file_content);
			} else {
				$file_content = str_replace('[::theme_mods::]', 'theme_mods_barnelli-wp', $file_content);
				$file_content = str_replace('[::yopress::]', 'YoPress-Barnelli', $file_content);
			}


			// replace database prefix
			$file_content = str_replace('[::prefix::]', $prefix, $file_content);
			// replace site url
			$file_content = str_replace('[::site_url::]', $site_url, $file_content);
			//replace year and month

			$file_content = str_replace('[::year::]', date('Y'), $file_content);
			$file_content = str_replace('[::month::]', date('m'), $file_content);

			$theme_name = get_template_directory_uri();
			$themeName = explode('/', $theme_name);
			$theme_name = $themeName[count($themeName)-1];
			$file_content = str_replace('[::theme_name::]', $theme_name, $file_content);

			// Run sql query
			$dbhost = DB_HOST;
			$dbhost = str_replace(':3306', '', $dbhost);

			if (strstr($dbhost, '.sock', true)) {
				//localhost:/tmp/mysql5d.sock
				$s = explode(':', $dbhost);
				$dbhost = $s[0];
				$socket = $s[1];
				$link = mysqli_connect($dbhost, DB_USER, DB_PASSWORD, DB_NAME, 3306, $socket);
			} else {
				$link = mysqli_connect($dbhost, DB_USER, DB_PASSWORD, DB_NAME);	
			}

			/* check connection */
			if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}

			/* execute multi query */
			if (mysqli_multi_query($link, $file_content)) {
				 echo "Success";
				 echo $file_content;
			} else {
				 echo "Fail";
			}

			$remoteImages = array('slide1.jpg',
'slide3.jpg',
'slide1.jpg',
'logo4.png',
'reservation1.jpg',
'reservation2.jpg',
'reservation3.jpg',
'1.png',
'2.png',
'3.png',
'4.png',
'5.png',
'6.png',
'7.png',
'8.png',
'41.png',
'212.png',
'211212.jpg',
'212121.jpg',
'icon-marker.png',
'icon6.png',
'icon2.jpg',
'icon4.png',
'icon6.png',
'icon10.png',
'icon11.png',
'icon14.png',
'icon141.png',
'icon142.png',
'reservation1.jpg',
'reservation2.jpg',
'reservation3.jpg',
'reservation4.jpg',
'11.png',
'10.png',
'14.png',
'4.png',
'logo4.png',
'team1.jpg',
'team11.jpg',
'team2.jpg',
'team3.jpg',
'team4.jpg');

			foreach ($remoteImages as $image) {
				$remoteURL = $this->imagesURL . $image;

				$uploadDir = wp_upload_dir();

				$localImgPath = $uploadDir['path'] . '/' . $image;

				$sizes = array(
						array('width'=>1440, 'height'=>802, 'crop'=>true),
						array('width'=>1140, 'height'=>200, 'crop'=>true),

						array('width'=>800, 'height'=>600, 'crop'=>true),
						array('width'=>800, 'height'=>182, 'crop'=>true),

						array('width'=>753, 'height'=>182, 'crop'=>true),
						array('width'=>680, 'height'=>596, 'crop'=>true),
						array('width'=>560, 'height'=>420, 'crop'=>true),
						array('width'=>560, 'height'=>200, 'crop'=>true),
						array('width'=>500, 'height'=>300, 'crop'=>true),
						array('width'=>400, 'height'=>400, 'crop'=>true),
						array('width'=>320, 'height'=>240, 'crop'=>true),
						array('width'=>290, 'height'=>213, 'crop'=>true),
						array('width'=>270, 'height'=>200, 'crop'=>true),
						array('width'=>217, 'height'=>305, 'crop'=>true),
						array('width'=>40, 'height'=>40, 'crop'=>true),
					);

				if (!file_exists($localImgPath)) {
					if (file_put_contents($localImgPath, file_get_contents($remoteURL))) {

						$image = wp_get_image_editor($localImgPath);
						
						if (!is_wp_error($image)) {
							$image->multi_resize($sizes);
						} 
					}
				}
			}	
			
		}
	}

	public function file_options($file) {
		$file_content = "";
		$file_for_import = get_template_directory() . '/includes/import2/files/' . $file;

		if (file_exists($file_for_import)) {
			$file_content = $this->yopress_file_contents($file_for_import);
		} else {
			$this->message = __("File doesn't exist", THEME_NAME);
		}

		if ($file_content) {
			$unserialized_content = unserialize(base64_decode($file_content));

			if ($unserialized_content) {
				return $unserialized_content;
			}
		}

		return false;
	}

	function yopress_file_contents($path) {
		$yopress_content = '';

		if (function_exists('realpath')) {
			$filepath = realpath($path);
		}
			
		if (!$filepath || !@is_file($filepath)) {
			return '';
		}

		if (ini_get('allow_url_fopen')) {
			$yopress_file_method = 'fopen';
		} else {
			$yopress_file_method = 'file_get_contents';
		}

		if ($yopress_file_method == 'fopen') {
			$yopress_handle = fopen($filepath, 'rb');

			if ($yopress_handle !== false) {
				while (!feof($yopress_handle)) {
					$yopress_content .= fread($yopress_handle, 8192);
				}

				fclose($yopress_handle);
			}

			return $yopress_content;
		} else {
			return file_get_contents($filepath);
		}
	}
}

?>