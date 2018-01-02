<?php
// Dynamic Menu post type
global $barnelli_menuList;

$tmp = YSettings::g('dynamic_menu_list', 'foodmenu[:space:]Food Menu');
$tmp_barnelli_menuList = explode('[:split:]', $tmp);

$barnelli_menuList = array();

foreach ($tmp_barnelli_menuList as $key => $value) {
	if (!empty($value)) {
		$barnelli_menuList[] = $value;
	}
}

function barnelli_dynamic_createTemplateFile($slug, $name) {
	$contents = '<?php
/*
Template Name: Menu - '.$name.'
*/
get_header();
global $barnelli_menu_type;
$barnelli_menu_type = "'.$slug.'";

if (YSettings::g("dynamic_'.$slug.'_menu_type", "1") == "3") {
	get_template_part("content", "dynamic-menu3");
} else if (YSettings::g("dynamic_'.$slug.'_menu_type", "1") == "2") {
	get_template_part("content", "dynamic-menu2");
} else {
	get_template_part("content", "dynamic-menu1");
}
get_footer();
?>';

	/* Create templates dir */
	wp_mkdir_p(THEME_DIR . '/templates/');

	$templateFile = THEME_DIR . '/templates/dynamic-menu-'.$slug.'-template.php';

	if (!file_exists($templateFile)) {
		$handle = @fopen($templateFile, 'w');
		@fwrite($handle, $contents);
		@fclose($handle);
		@chmod($templateFile, 0777);
	}

	$singleFile = THEME_DIR . '/single-'.$slug.'.php';

	$singleContents = '<?php get_header(); ?>
<div class="dynamic-content Menu-wrapper container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
		<div class="row">
			<?php
			global $post;
			if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>';

	if (!file_exists($singleFile)) {
		$handle = @fopen($singleFile, 'w');
		@fwrite($handle, $singleContents);
		@fclose($handle);
		@chmod($singleFile, 0777);
	}
}

function barnelli_dynamic_showMenuOrder() {
	global $post;

	$custom = get_post_custom($post->ID);
	$postMeta = new BarnelliPostMetaInfo($custom);
	$order = $postMeta->get('menu_order');

	echo  __('Order', THEME_NAME) . ':<br/><input style="width:100%" type="text" name="menu_order" id="menu_order" value="'.$order.'"/>';
}

function barnelli_dynamic_showMenuPrices() {
	global $post;

	$custom = get_post_custom($post->ID);
	$postMeta = new BarnelliPostMetaInfo($custom);

	$numberOfPrices = (int)YSettings::g("dynamic_".$post->post_type."_number_of_prices", 1);

	for ($price=1; $price<=$numberOfPrices; $price++) {
		echo __('Price', THEME_NAME) . ' '.$price.':<br/><input style="width:100%" type="text" name="menu_price'.$price.'" id="menu_price'.$price.'" value="'.$postMeta->get('menu_price'.$price).'"/>';
	}
}

function barnelli_dynamic_showMenuInfo() {
	global $post;

	$custom = get_post_custom($post->ID);
	$postMeta = new BarnelliPostMetaInfo($custom);
	$menuTitle = $postMeta->get('menu_title');
	$menuSecondTitle = $postMeta->get('menu_secondtitle');
	$menuSubitle = $postMeta->get('menu_subtitle');


	if (!isset($menuSubitle)) {
		$menuSubitle = '';
	}

	if (!isset($menuSecondTitle)) {
		$menuSecondTitle = '';
	}

	if (!isset($menuTitle)) {
		$menuTitle = '';
	}

	echo __('Title', THEME_NAME) . ':<br/><textarea style="width:100%" type="text" name="menu_title" id="menu_title">'.$menuTitle.'</textarea>';
	echo __('Second Title', THEME_NAME) . ':<br/><textarea style="width:100%" type="text" name="menu_secondtitle" id="menu_secondtitle">'.$menuSecondTitle.'</textarea>';
	echo __('Subtitle', THEME_NAME) . ':<br/><textarea style="width:100%" type="text" name="menu_subtitle" id="menu_subtitle">'.$menuSubitle.'</textarea>';
}

function barnelli_dynamic_registerMenuCustomMetaBox() {
	global $barnelli_menuList;

	foreach ($barnelli_menuList as $foodmenu) {
		$m = explode('[:space:]', $foodmenu);
		$barnelli_dynamic_dynamic_postType = $m[0];
		$barnelli_dynamic_dynamic_postName = $m[1];

		add_meta_box("post_info", $barnelli_dynamic_dynamic_postName . ": " . __('Titles', THEME_NAME), "barnelli_dynamic_showMenuInfo", $barnelli_dynamic_dynamic_postType, "normal", "high");
		add_meta_box("post_price", $barnelli_dynamic_dynamic_postName . ": " . __('Price', THEME_NAME), "barnelli_dynamic_showMenuPrices", $barnelli_dynamic_dynamic_postType, "normal", "high");
		add_meta_box("post_order", $barnelli_dynamic_dynamic_postName . ": " . __('Order', THEME_NAME), "barnelli_dynamic_showMenuOrder", $barnelli_dynamic_dynamic_postType, "normal", "high");
	}
}

function barnelli_dynamic_saveMenuDetails() {
	global $post;

	if (is_object($post)) {
		if (isset($_POST['menu_title'])) {
			$menu_title = $_POST['menu_title'];
			update_post_meta($post->ID, 'menu_title', $menu_title);
		}

		if (isset($_POST['menu_subtitle'])) {
			$menu_subtitle = $_POST['menu_subtitle'];
			update_post_meta($post->ID, 'menu_subtitle', $menu_subtitle);
		}

		if (isset($_POST['menu_secondtitle'])) {
			$menu_secondtitle = $_POST['menu_secondtitle'];
			update_post_meta($post->ID, 'menu_secondtitle', $menu_secondtitle);
		}

		$numberOfPrices = (int)YSettings::g("dynamic_".$post->post_type."_number_of_prices", 1);

		for ($price=1; $price<=$numberOfPrices; $price++) {
			if (isset($_POST['menu_price'.$price])) {
				$menu_price = sanitize_text_field($_POST['menu_price'.$price]);
				update_post_meta($post->ID, 'menu_price'.$price, $menu_price);
			}
		}

		if (isset($_POST['menu_order'])) {
			$menu_order = sanitize_text_field($_POST['menu_order']);
			update_post_meta($post->ID, 'menu_order', $menu_order);
		}
	}
}

function barnelli_dynamic_foodmenu_taxonomy() {
	global $barnelli_menuList;

	foreach ($barnelli_menuList as $foodmenu) {
		$m = explode('[:space:]', $foodmenu);
		$barnelli_dynamic_dynamic_postType = $m[0];
		$barnelli_dynamic_dynamic_postName = $m[1];

		if (is_admin()) {
			barnelli_dynamic_createTemplateFile($barnelli_dynamic_dynamic_postType, $barnelli_dynamic_dynamic_postName);
		}

		register_taxonomy($barnelli_dynamic_dynamic_postType.'_categories', $barnelli_dynamic_dynamic_postType,
			array(
				'hierarchical' 		=> true,
				'label' 			=> $barnelli_dynamic_dynamic_postName.' Categories',
				'query_var' 		=> true,
				'show_ui'			=> true,
				'rewrite'			=> array(
					'slug' 			=> $barnelli_dynamic_dynamic_postType,
					'with_front' 	=> false,
					'hierarchical' => true,
				)
			)
		);
	}
}

function barnelli_dynamic_filter_post_type_link($link, $post) {
	global $barnelli_menuList;

	foreach ($barnelli_menuList as $foodmenu) {
		$m = explode('[:space:]', $foodmenu);
		$barnelli_dynamic_dynamic_postType = $m[0];
		$barnelli_dynamic_dynamic_postName = $m[1];


		if ( $post->post_type != $barnelli_dynamic_dynamic_postType )
			return $link;

		if ($cats = get_the_terms($post->ID, $barnelli_dynamic_dynamic_postType.'_categories'))
			$link = str_replace('%'.$barnelli_dynamic_dynamic_postType.'_categories%', array_pop($cats)->slug, $link);
		return $link;
	}
}

function barnelli_dynamic_register_foodmenu() {
	global $barnelli_menuList;

	foreach ($barnelli_menuList as $foodmenu) {
		$m = explode('[:space:]', $foodmenu);
		$barnelli_dynamic_dynamic_postType = $m[0];
		$barnelli_dynamic_dynamic_postName = $m[1];

		$labels = array(
			'name' => _x( $barnelli_dynamic_dynamic_postName, 'barnelli_custom_post', THEME_NAME),
			'singular_name' => _x( $barnelli_dynamic_dynamic_postName.' Item', 'barnelli_custom_post', THEME_NAME ),
			'add_new' => _x( 'Add New', 'barnelli_custom_post', THEME_NAME ),
			'add_new_item' => _x( 'Add New '.$barnelli_dynamic_dynamic_postName.' Item', 'barnelli_custom_post', THEME_NAME ),
			'edit_item' => _x( 'Edit '.$barnelli_dynamic_dynamic_postName.' Item', 'barnelli_custom_post', THEME_NAME ),
			'new_item' => _x( 'New '.$barnelli_dynamic_dynamic_postName.' Item', 'barnelli_custom_post', THEME_NAME ),
			'view_item' => _x( 'View '.$barnelli_dynamic_dynamic_postName.' Item', 'barnelli_custom_post', THEME_NAME ),
			'search_items' => _x( 'Search '.$barnelli_dynamic_dynamic_postName.' Items', 'barnelli_custom_post', THEME_NAME ),
			'not_found' => _x( 'No '.$barnelli_dynamic_dynamic_postName.' Items found', 'barnelli_custom_post', THEME_NAME ),
			'not_found_in_trash' => _x( 'No '.$barnelli_dynamic_dynamic_postName.' Items found in Trash', 'barnelli_custom_post', THEME_NAME ),
			'parent_item_colon' => _x( 'Parent '.$barnelli_dynamic_dynamic_postName.' Item:', 'barnelli_custom_post', THEME_NAME ),
			'menu_name' => _x( $barnelli_dynamic_dynamic_postName, 'barnelli_custom_post', THEME_NAME ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => $barnelli_dynamic_dynamic_postName.' Posts',
			'supports' => array('title', 'thumbnail'),
			'taxonomies' => array($barnelli_dynamic_dynamic_postType.'_categories'),
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			//'menu_icon' => get_stylesheet_directory_uri() . '/functions/panel/images/catchinternet-small.png',
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'query_var' => true,
			'can_export' => true,
			//'rewrite' => array('slug' => 'themes/%foodmenu_categories%', 'with_front' => false),
			'public' => true,
			'has_archive' => $barnelli_dynamic_dynamic_postType,
			'capability_type' => 'post'
		);

		register_post_type($barnelli_dynamic_dynamic_postType, $args);

		// Custom columns

		//add_action( 'manage_'.$barnelli_dynamic_dynamic_postType.'_custom_column' , 'barnelli_custom_columns', 10, 2 );
		add_filter('manage_edit-'.$barnelli_dynamic_dynamic_postType.'_columns', 'barnelli_add_new_custom_columns');
		add_action('manage_'.$barnelli_dynamic_dynamic_postType.'_posts_custom_column', 'barnelli_manage_custom_columns', 10, 2);

	}
}

function barnelli_add_new_custom_columns($gallery_columns) {
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('Name', 'column name');
	$new_columns['image'] = __('Image');
	$new_columns['categories'] = __('Categories');

	return $new_columns;
}
 
function barnelli_manage_custom_columns($column_name, $id) {
	global $wpdb;
	switch ($column_name) {
		case 'id':
		echo $id;
		break;
	default:
		break;
	} // end switch
}

function barnelli_custom_columns( $column, $post_id ) {
	switch ($column) {
	case 'category':
		$terms = get_the_term_list( $post_id , 'foodmenu_categories' , '' , ',' , '' );
		if (is_string($terms)) {
			echo $terms;
		}
		else {
			_e( 'Unable to get author(s)', 'your_text_domain' );
		}

		break;
	case 'publisher':
		echo get_post_meta($post_id , 'publisher' , true);

		break;
    }
}

function barnelli_dynamic_add_foodmenu_category_icon_field() {
	// this will add the custom meta field to the add new term page
	add_thickbox();
	wp_enqueue_script('image-upload', THEME_DIR_URI . '/yopress/core/components/uploader/yopressUploader.js', array('jquery'));
	?>
	<div class="form-field">
		<label for="term_meta[menu_category_order]"><?php _e( 'Order', THEME_NAME ); ?></label>
		<input class="menu-cat-order" type="text" name="term_meta[menu_category_order]" id="term_meta[menu_category_order]" value="">
	</div>
	<div class="form-field">
		<label for="term_meta[menu_category_icon]"><?php _e( 'Icon', THEME_NAME ); ?></label>
		<i class="fa fa-leaf" id="menu-cat-icon-new"></i>
		<input class="menu-cat-icon" type="hidden" name="term_meta[menu_category_icon]" id="term_meta[menu_category_icon]" value="">
		<p class="description"><?php _e('Choose icon for this category', THEME_NAME); ?></p>
		<?php
		include_once THEME_INCLUDES . '/icon-picker.php';
		?>
		<label for="term_meta[menu_category_icon_image]"><?php _e( 'Icon Image', THEME_NAME ); ?></label>
		<input style="width:250px;" class="uploadinput-2" type="text" size="20" name="term_meta[menu_category_icon_image]" id="term_meta[menu_category_icon_image]" value="" style="">
		<input style="width:70px;" id="upload_image_button" class="button button-primary upload_image_button" type="button" value="<?php _e( 'Upload', THEME_NAME ); ?>" data-id="2">
		<input style="width:70px;" class="button button-primary upload_image_remove_button" type="button" value="<?php _e( 'Remove', THEME_NAME ); ?>" data-id="2">
	</div>
	
	<script>
	$ = jQuery.noConflict();

	$("#menu-cat-icon-new, .icon-close").on("click", function(e) {
		e.preventDefault();
		$(".icon-set").toggle();
		$(".icon-close").toggle();
	});

	$(".icon-picker i").on("click", function() {
		var activeIcon = $(this).attr('class');
		if (activeIcon == 'no-icon') {
			$("#menu-cat-icon-new").attr('class', '');
			$("#menu-cat-icon-new").html('empty');
		} else {
			$("#menu-cat-icon-new").attr('class', activeIcon);
			$("#menu-cat-icon-new").html('');
		}

		$(".menu-cat-icon").val(activeIcon);
		$(".icon-set").toggle();
		$(".icon-close").toggle();
	});
	</script>
	<?php
}

// Edit term page
function barnelli_dynamic_edit_foodmenu_category_icon_field($term) {
	add_thickbox();
	wp_enqueue_script('image-upload', THEME_DIR_URI . '/yopress/core/components/uploader/yopressUploader.js', array('jquery'));
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" );
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[menu_category_order]"><?php _e( 'Order', THEME_NAME ); ?></label></th>
		<td>
			<input class="menu-cat-order" type="text" name="term_meta[menu_category_order]" id="term_meta[menu_category_order]" value="<?php echo esc_attr( $term_meta['menu_category_order'] ) ? esc_attr( $term_meta['menu_category_order'] ) : ''; ?>">
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[menu_category_icon]"><?php _e( 'Icon', THEME_NAME ); ?></label></th>
		<td>
			<?php
			$iconValue = '';
			$icon = esc_attr( $term_meta['menu_category_icon'] ) ? esc_attr( $term_meta['menu_category_icon'] ) : 'fa fa-circle';
			
			if ($icon == 'no-icon') {
				$iconValue = 'empty';
			}
			?>
			<i class="<?php echo $icon; ?>" id="menu-cat-icon-new"><?php echo $iconValue; ?></i>
			<input class="menu-cat-icon" type="hidden" name="term_meta[menu_category_icon]" id="term_meta[menu_category_icon]" value="<?php echo $icon; ?>">
			<?php include_once THEME_INCLUDES . '/icon-picker.php'; ?>
			<p class="description"><?php _e('Choose icon for this category', THEME_NAME); ?></p>
			<input style="width:250px;" name="term_meta[menu_category_icon_image]" id="term_meta[menu_category_icon_image]" class="uploadinput-2" type="text" size="20" value="<?php echo esc_attr( $term_meta['menu_category_icon_image'] ) ? esc_attr( $term_meta['menu_category_icon_image'] ) : ''; ?>" style="">
			<input style="width:150px;" id="upload_image_button" class="button button-primary upload_image_button" type="button" value="<?php _e( 'Upload', THEME_NAME ); ?>" data-id="2">
			<input style="width:150px;" class="button button-primary upload_image_remove_button" type="button" value="<?php _e( 'Remove', THEME_NAME ); ?>" data-id="2">
		</td>
	</tr>
	<script>
	$ = jQuery.noConflict();

	$("#menu-cat-icon-new, .icon-close").on("click", function(e) {
		e.preventDefault();
		$(".icon-set").toggle();
		$(".icon-close").toggle();
	});

	$(".icon-picker i").on("click", function() {
		var activeIcon = $(this).attr('class');
		if (activeIcon == 'no-icon') {
			$("#menu-cat-icon-new").attr('class', '');
			$("#menu-cat-icon-new").html('empty');
		} else {
			$("#menu-cat-icon-new").attr('class', activeIcon);
			$("#menu-cat-icon-new").html('');
		}

		$(".menu-cat-icon").val(activeIcon);
		$(".icon-set").toggle();
		$(".icon-close").toggle();
	});
	</script>
<?php
}

function barnelli_dynamic_save_taxonomy_custom_meta($term_id) {

	if (isset($_POST['term_meta'])) {
		$t_id = $term_id;
		$term_meta = get_option("taxonomy_$t_id");
		$cat_keys = array_keys($_POST['term_meta']);

		foreach ($cat_keys as $key) {
			if (isset($_POST['term_meta'][$key])) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}

		// Save the option array.
		update_option("taxonomy_$t_id", $term_meta);
	}
}

function barnelli_dynamic_order_columns_content($column_name, $post_ID) {
	$custom = get_post_custom($post_ID);
	$postMeta = new BarnelliPostMetaInfo($custom);
	$order = $postMeta->get('menu_order');

	if ($column_name == 'order') {
		echo $order;
	}
}

function barnelli_dynamic_order_columns_head($defaults) {
	$defaults['order'] = 'Order';

	return $defaults;
}

add_action('save_post', 'barnelli_dynamic_saveMenuDetails');
add_action('admin_init', 'barnelli_dynamic_registerMenuCustomMetaBox');

add_action('init', 'barnelli_dynamic_foodmenu_taxonomy');
add_filter('post_type_link', 'barnelli_dynamic_filter_post_type_link', 10, 2);
add_action('init', 'barnelli_dynamic_register_foodmenu');

//add_action('category_add_form_fields', 'add_menu_category_icon_field', 10, 2);
foreach ($barnelli_menuList as $foodmenu) {
	$m = explode('[:space:]', $foodmenu);
	$barnelli_dynamic_dynamic_postType = $m[0];
	$barnelli_dynamic_dynamic_postName = $m[1];

	add_action($barnelli_dynamic_dynamic_postType.'_categories_add_form_fields', 'barnelli_dynamic_add_foodmenu_category_icon_field', 10, 2);

	//add_action('category_edit_form_fields', 'edit_foodmenu_category_icon_field', 10, 2);
	add_action($barnelli_dynamic_dynamic_postType.'_categories_edit_form_fields', 'barnelli_dynamic_edit_foodmenu_category_icon_field', 10, 2);

	add_action('edited_'.$barnelli_dynamic_dynamic_postType.'_categories', 'barnelli_dynamic_save_taxonomy_custom_meta', 10, 2);  
	add_action('create_'.$barnelli_dynamic_dynamic_postType.'_categories', 'barnelli_dynamic_save_taxonomy_custom_meta', 10, 2);

	// add_filter('manage_'.$barnelli_dynamic_dynamic_postType.'_posts_columns', 'barnelli_dynamic_order_columns_head');  
	// add_action('manage_'.$barnelli_dynamic_dynamic_postType.'_posts_custom_column', 'barnelli_dynamic_order_columns_content', 10, 2);
}

add_action('edited_category', 'barnelli_dynamic_save_taxonomy_custom_meta', 10, 2);  
add_action('create_category', 'barnelli_dynamic_save_taxonomy_custom_meta', 10, 2);

add_action('edited_taxonomy', 'barnelli_dynamic_save_taxonomy_custom_meta', 10, 2);  
add_action('create_taxonomy', 'barnelli_dynamic_save_taxonomy_custom_meta', 10, 2);
?>