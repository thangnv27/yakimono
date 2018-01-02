<?php
if (!function_exists ('add_action')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');

	exit();
}

class Demo_Importer {

	public $message = "";
	public $attachments = false;

	public function show_import() {
	?>
	<form method="post" action="" id="importContentForm">
		<table class="form-table">
			<tbody>
				<tr class="form-field" valign="top">
					<th><label for="import_demo">Information</label></th>
					<td>
						Demo Importer lets you set your Wordpress to look like our demo here<br/><a href="http://demo.yosoftware.com/wp/barnelli-demo/">http://demo.yosoftware.com/wp/barnelli-demo/</a><br/>Please note if you are using WooCommerce make sure you install and setup the plugin first. 
					</td>
				</tr>
				<tr class="form-field">
					<th scope="row">
						<label for="import_attachments"><?php _e('Import media files', THEME_NAME); ?></label>
					</th>
					<td>
						<input type="checkbox" value="1" class="" name="import_attachments" id="import_attachments" />
					</td>
				</tr>

				<tr class="form-field">
					<td scope="row" colspan="2" style="padding:15px 0px;">
						<div class="import_load"><span><?php _e('The import process may take some time. Please be patient.<br/>Allow it to take up to 10 minutes', THEME_NAME); ?> </span><br />
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

						var progressbar = jQuery('#progressbar')
						var import_demo = jQuery( "#import_demo" ).val();
						var p = 0;
						var theme_name = 'barnelli';

						if (import_demo == 'demo2') {
							jQuery.ajax({
								type: 'POST',
								url: ajaxurl,
								data: {
									action: 'yopress_activation'
								},
								success: function(data, textStatus, XMLHttpRequest){
									jQuery('.progress-value').html('100%');
									progressbar.val(100);
								},
								error: function(MLHttpRequest, textStatus, errorThrown){
								}
							});
							
							return false;
						}
						
						for (var i=1;i<10;i++) {
							var str;
							if (i < 10)  {
								str = theme_name+'_content_0'+i+'.xml';
							} else {
								str = theme_name+'_content_'+i+'.xml';
							}


							jQuery.ajax({
								type: 'POST',
								url: ajaxurl,
								data: {
									action: 'yopress_dataImport',
									xml: str,
									demo: import_demo,
									import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
								},
								success: function(data, textStatus, XMLHttpRequest){
									p+= 10;
									jQuery('.progress-value').html((p) + '%');
									progressbar.val(p);
									if (p == 90) {
										str = theme_name+'_content_10.xml';
										jQuery.ajax({
											type: 'POST',
											url: ajaxurl,
											data: {
												action: 'yopress_dataImport',
												xml: str,
												demo: import_demo,
												import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
											},
											success: function(data, textStatus, XMLHttpRequest){
												jQuery.ajax({
													type: 'POST',
													url: ajaxurl,
													data: {
														action: 'yopress_otherImport',
														demo: import_demo
													},
													success: function(data, textStatus, XMLHttpRequest){
														jQuery('.progress-value').html((100) + '%');
														progressbar.val(100);
														jQuery('.progress-bar-message').html('<div class="alert alert-success">Import is completed.</div>');
													},
													error: function(MLHttpRequest, textStatus, errorThrown){
													}
												});
											},
											error: function(MLHttpRequest, textStatus, errorThrown){
											}
										});
									}
								},
								error: function(MLHttpRequest, textStatus, errorThrown){
								}
							});
						}
					}

					return false;
				});
			});
		</script>
	<?php
	}

	public function import_content($file) {
		if (!class_exists('WP_Importer')) {
			ob_start();
			$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';

			require_once($class_wp_importer);
			require_once(get_template_directory() . '/includes/import/class.wordpress-importer.php');

			$yopress_import = new WP_Import();
			set_time_limit(0);
			$path = get_template_directory() . '/includes/import/files/' . $file;

			$update_items = false;
			// if ( strstr($file, 'demo1') ) {
			// 	$update_items = true;
			// }

			$yopress_import->fetch_attachments = $this->attachments;
			$returned_value = $yopress_import->import($path);

			if (is_wp_error($returned_value)) {
				$this->message = __("An Error Occurred During Import", THEME_NAME);
			} else {
				$this->message = __("Content imported successfully", THEME_NAME);
			}
			ob_get_clean();
		} else {
			$this->message = __("Error loading files", THEME_NAME);
		}

		if ($update_items) {
			/*

			Get all pages with template blog* then get all post categories with posts
			Set blog_categories meta_value of matched page id's to serialized categories array

			*/
			
			$blog_pages = get_pages(array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'blog.php'
			));

			$blog2_pages = get_pages(array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'blog2.php'
			));

			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false 
			);

			$categories = get_categories($args);
			$cats = array();
			foreach($categories as $cat) {
				$cats[] = $cat->term_id;
			}

			$all_pages = array_merge($blog_pages, $blog2_pages);

			foreach($all_pages as $page) {
				update_post_meta($page->ID, 'blog_categories', $cats);
			}

			$portfolio_pages = get_pages(array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'portfolio.php'
			));

			$args = array(
				'type'                     => 'berg_portfolio',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'berg_portfolio_categories',
				'pad_counts'               => false 
			);

			$portfolio_categories = get_categories($args);
			$pcats = array();

			foreach($portfolio_categories as $cat) {
				$pcats[] = $cat->term_id;
			}

			foreach($portfolio_pages as $page) {
				update_post_meta($page->ID, 'portfolio_categories', $pcats);
			}






			$menu_pages = get_pages(array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'menu.php'
			));

			$menu2_pages = get_pages(array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'menu2.php'
			));

			$menu3_pages = get_pages(array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'menu3.php'
			));

			$all_pages = array_merge($menu_pages, $menu2_pages, $menu3_pages);

			$args = array(
				'type'                     => 'berg_menu',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'berg_menu_categories',
				'pad_counts'               => false 
			);

			$menu_categories = get_categories($args);
			$mcats = array();

			foreach($menu_categories as $cat) {
				$mcats[] = $cat->term_id;

				update_option('taxonomy_' . $cat->term_id, array("menu_category_icon_image"=>"http://lorempixel.com/400/400/"));
			}

			foreach($all_pages as $page) {
				update_post_meta($page->ID, 'menu_categories', $mcats);
			}




			$restaurant_pages = get_pages(array(
				'meta_key' => '_wp_page_template',
				'meta_value' => 'restaurant.php'
			));

			$args = array(
				'type'                     => 'berg_restaurant',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'berg_restaurant_categories',
				'pad_counts'               => false
			);

			$restaurant_categories = get_categories($args);
			$rcats = array();

			foreach($restaurant_categories as $cat) {
				$rcats[] = $cat->term_id;
			}

			foreach($restaurant_pages as $page) {
				update_post_meta($page->ID, 'restaurant_categories', $rcats);
			}

		}
	}

	public function import_widgets($file) {
		$this->import_custom_sidebars('custom_sidebars.txt');
		$options = $this->file_options($file);

		foreach ((array)$options['widgets'] as $widget_id => $widget_data) {
			update_option( 'widget_' . $widget_id, $widget_data );
		}

		$this->import_sidebars_widgets($file);
		$this->message = __("Widgets imported successfully", THEME_NAME);
	}

	public function import_sidebars_widgets($file) {
		$sidebars = get_option("sidebars_widgets");
		unset($sidebars['array_version']);
		$data = $this->file_options($file);

		if (is_array($data['sidebars'])) {
			$sidebars = array_merge((array)$sidebars, (array)$data['sidebars']);
			unset($sidebars['wp_inactive_widgets']);

			$sidebars = array_merge(array('wp_inactive_widgets' => array()), $sidebars);
			$sidebars['array_version'] = 2;
			wp_set_sidebars_widgets($sidebars);
		}
	}

	public function import_custom_sidebars($file) {
		$options = $this->file_options($file);
		update_option('sidebars', $options);
		$this->message = __("Custom sidebars imported successfully", THEME_NAME);
	}

	public function import_options($file) {
		$options = $this->file_options($file);
		update_option('YoPress-Barnelli', $options);
		$this->message = __("Options imported successfully", THEME_NAME);
	}

	public function import_menus($file) {
		global $wpdb;

		$terms_table = $wpdb->prefix . "terms";
		$this->menus_data = $this->file_options($file);
		$menu_array = array();

		foreach ($this->menus_data as $registered_menu => $menu_slug) {
			$term_rows = $wpdb->get_results("SELECT * FROM $terms_table where slug='{$menu_slug}'", ARRAY_A);

			if (isset($term_rows[0]['term_id'])) {
				$term_id_by_slug = $term_rows[0]['term_id'];
			} else {
				$term_id_by_slug = null;
			}

			$menu_array[$registered_menu] = $term_id_by_slug;
		}

		set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );

		// $posts_table = $wpdb->prefix . "posts";
		// $rows = $wpdb->get_results("SELECT * FROM $posts_table where post_name='menu' and post_type='nav_menu_item'", ARRAY_A);

		// if (isset($rows[0]['ID'])) {
		// 	update_post_meta($rows[0]['ID'], '_menu_item_submenu_category', 1);
		// }
	}

	public function import_settings_pages($file) {
		global $wpdb;

		$pages = $this->file_options($file);
		$posts_table = $wpdb->prefix . "posts";

		foreach($pages as $page_option => $page_id) {
			if ($page_option == 'page_on_front') {
				$post_rows = $wpdb->get_results("SELECT * FROM $posts_table where post_name='{$page_id}'", ARRAY_A);
				if (isset($post_rows[0]['ID'])) {
					update_option($page_option, $post_rows[0]['ID']);
				}
			} else if ($page_option == 'page_for_posts') {
				$post_rows = $wpdb->get_results("SELECT * FROM $posts_table where post_name='{$page_id}'", ARRAY_A);
				if (isset($post_rows[0]['ID'])) {
					update_option($page_option, $post_rows[0]['ID']);
				}
			} else {
				update_option($page_option, $page_id);	
			}
		}
	}

	public function file_options($file) {
		$file_content = "";
		$file_for_import = get_template_directory() . '/includes/import/files/' . $file;

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