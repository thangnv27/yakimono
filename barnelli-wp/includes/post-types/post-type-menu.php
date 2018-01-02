<?php
// Menu post type
add_action('save_post', 'barnelli_saveMenuDetails');
add_action('admin_init', 'barnelli_registerMenuCustomMetaBox');

function barnelli_registerMenuCustomMetaBox() {
	add_meta_box("post_info", __("Food Menu: Titles", THEME_NAME), "barnelli_showMenuInfo", "foodmenu", "normal", "high");
	add_meta_box("post_price", __("Food Menu: Price", THEME_NAME), "barnelli_showMenuPrices", "foodmenu", "normal", "high");
	add_meta_box("post_order", __("Food Menu: Order", THEME_NAME), "barnelli_showMenuOrder", "foodmenu", "normal", "high");
}

function barnelli_showMenuOrder() {
	global $post;

	$custom = get_post_custom($post->ID);
	$postMeta = new BarnelliPostMetaInfo($custom);
	$order = $postMeta->get('menu_order');

	echo 'Order:<br/><input style="width:100%" type="text" name="menu_order" id="menu_order" value="'.$order.'"/>';
}

function barnelli_showMenuPrices() {
	global $post;

	$custom = get_post_custom($post->ID);
	$postMeta = new BarnelliPostMetaInfo($custom);
	$menuPrice1 = $postMeta->get('menu_price1');
	$menuPrice2 = $postMeta->get('menu_price2');
	$menuPrice3 = $postMeta->get('menu_price3');

	echo 'Price 1:<br/><input style="width:100%" type="text" name="menu_price1" id="menu_price1" value="'.$menuPrice1.'"/>';
	echo 'Price 2:<br/><input style="width:100%" type="text" name="menu_price2" id="menu_price2" value="'.$menuPrice2.'"/>';
	echo 'Price 3:<br/><input style="width:100%" type="text" name="menu_price3" id="menu_price3" value="'.$menuPrice3.'"/>';
}

function barnelli_showMenuInfo() {
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

	echo 'Title:<br/><input style="width:100%" type="text" name="menu_title" id="menu_title" value="'.$menuTitle.'"/>';
	echo 'Second Title:<br/><input style="width:100%" type="text" name="menu_secondtitle" id="menu_secondtitle" value="'.$menuSecondTitle.'"/>';
	echo 'Subtitle:<br/><input style="width:100%" type="text" name="menu_subtitle" id="menu_subtitle" value="'.$menuSubitle.'"/>';
}

function barnelli_saveMenuDetails() {
	global $post;
	if (is_object($post)) {
		if (isset($_POST['menu_title'])) {
			$menu_title = sanitize_text_field($_POST['menu_title']);
			update_post_meta($post->ID, 'menu_title', $menu_title);
		}

		if (isset($_POST['menu_subtitle'])) {
			$menu_subtitle = sanitize_text_field($_POST['menu_subtitle']);
			update_post_meta($post->ID, 'menu_subtitle', $menu_subtitle);
		}

		if (isset($_POST['menu_secondtitle'])) {
			$menu_secondtitle = sanitize_text_field($_POST['menu_secondtitle']);
			update_post_meta($post->ID, 'menu_secondtitle', $menu_secondtitle);
		}

		if (isset($_POST['menu_price1'])) {
			$menu_price1 = sanitize_text_field($_POST['menu_price1']);
			update_post_meta($post->ID, 'menu_price1', $menu_price1);
		}

		if (isset($_POST['menu_price2'])) {
			$menu_price2 = sanitize_text_field($_POST['menu_price2']);
			update_post_meta($post->ID, 'menu_price2', $menu_price2);
		}

		if (isset($_POST['menu_price3'])) {
			$menu_price3 = sanitize_text_field($_POST['menu_price3']);
			update_post_meta($post->ID, 'menu_price3', $menu_price3);
		}

		if (isset($_POST['menu_order'])) {
			$menu_order = sanitize_text_field($_POST['menu_order']);
			update_post_meta($post->ID, 'menu_order', $menu_order);
		}
	}
}

function barnelli_foodmenu_taxonomy() {
	register_taxonomy('foodmenu_categories', 'foodmenu',
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Food Menu Categories',
			'query_var' 		=> true,
			'rewrite'			=> array(
				'slug' 			=> 'foodmenu',
				'with_front' 	=> false
			)
		)
	);
}

add_action('init', 'barnelli_foodmenu_taxonomy');

/**
 * Maintain the permalink structure for custom taxonomy
 * Display custom taxonomy term name before post related to that term
 * @uses post_type_filter hook
 */
function barnelli_filter_post_type_link($link, $post) {
	if ( $post->post_type != 'foodmenu' )
		return $link;

	if ($cats = get_the_terms($post->ID, 'foodmenu_categories'))
		$link = str_replace('%foodmenu_categories%', array_pop($cats)->slug, $link);
	return $link;
}

add_filter('post_type_link', 'barnelli_filter_post_type_link', 10, 2);

function barnelli_register_foodmenu() {
	$labels = array(
		'name' => _x( 'Food Menu', 'menu_custom_post', THEME_NAME),
		'singular_name' => _x( 'Food Menu Item', 'menu_custom_post', THEME_NAME ),
		'add_new' => _x( 'Add New', 'menu_custom_post', THEME_NAME ),
		'add_new_item' => _x( 'Add New Food Menu Item', 'menu_custom_post', THEME_NAME ),
		'edit_item' => _x( 'Edit Food Menu Item', 'menu_custom_post', THEME_NAME ),
		'new_item' => _x( 'New Food Menu Item', 'menu_custom_post', THEME_NAME ),
		'view_item' => _x( 'View Food Menu Item', 'menu_custom_post', THEME_NAME ),
		'search_items' => _x( 'Search Food Menu Items', 'menu_custom_post', THEME_NAME ),
		'not_found' => _x( 'No Food Menu Items found', 'menu_custom_post', THEME_NAME ),
		'not_found_in_trash' => _x( 'No Food Menu Items found in Trash', 'menu_custom_post', THEME_NAME ),
		'parent_item_colon' => _x( 'Parent Food Menu Item:', 'menu_custom_post', THEME_NAME ),
		'menu_name' => _x( 'Food Menu', 'menu_custom_post', THEME_NAME ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Food Menu Posts',
		'supports' => array('title', 'thumbnail'),
		'taxonomies' => array('foodmenu_categories'),
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
		'has_archive' => 'foodmenu',
		'capability_type' => 'post'
	);

	register_post_type('foodmenu', $args );
}

add_action('init', 'barnelli_register_foodmenu');

function barnelli_add_foodmenu_category_icon_field() {
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
		<input style="width:70px;" id="upload_image_button" class="button button-primary upload_image_button" type="button" value="Upload" data-id="2">
		<input style="width:70px;" class="button button-primary upload_image_remove_button" type="button" value="Remove" data-id="2">
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

//add_action('category_add_form_fields', 'add_menu_category_icon_field', 10, 2);
add_action('foodmenu_categories_add_form_fields', 'barnelli_add_foodmenu_category_icon_field', 10, 2);

// Edit term page
function barnelli_edit_foodmenu_category_icon_field($term) {
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
			<?php
			include_once THEME_INCLUDES . '/icon-picker.php';
			?>
			<p class="description"><?php _e('Choose icon for this category', THEME_NAME); ?></p>
			<input style="width:250px;" name="term_meta[menu_category_icon_image]" id="term_meta[menu_category_icon_image]" class="uploadinput-2" type="text" size="20" value="<?php echo esc_attr( $term_meta['menu_category_icon_image'] ) ? esc_attr( $term_meta['menu_category_icon_image'] ) : ''; ?>" style="">
			<input style="width:150px;" id="upload_image_button" class="button button-primary upload_image_button" type="button" value="Upload" data-id="2">
			<input style="width:150px;" class="button button-primary upload_image_remove_button" type="button" value="Remove" data-id="2">
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

//add_action('category_edit_form_fields', 'edit_foodmenu_category_icon_field', 10, 2);
add_action('foodmenu_categories_edit_form_fields', 'barnelli_edit_foodmenu_category_icon_field', 10, 2 );

function barnelli_save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}

function barnelli_order_columns_content($column_name, $post_ID) {
	$custom = get_post_custom($post_ID);
	$postMeta = new BarnelliPostMetaInfo($custom);
	$order = $postMeta->get('menu_order');
	if ($column_name == 'order') {
		echo $order;
	}
}

function barnelli_order_columns_head($defaults) {  
	$defaults['order'] = 'Order';  
	return $defaults;  
}  

add_action( 'edited_category', 'barnelli_save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_category', 'barnelli_save_taxonomy_custom_meta', 10, 2 );

add_action( 'edited_taxonomy', 'barnelli_save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_taxonomy', 'barnelli_save_taxonomy_custom_meta', 10, 2 );

add_action( 'edited_foodmenu_categories', 'barnelli_save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_foodmenu_categories', 'barnelli_save_taxonomy_custom_meta', 10, 2 );

add_filter('manage_foodmenu_posts_columns', 'barnelli_order_columns_head');  
add_action('manage_foodmenu_posts_custom_column', 'barnelli_order_columns_content', 10, 2);


/*add_action( 'quick_edit_custom_box', 'display_custom_quickedit_book', 10, 2 );

function display_custom_quickedit_book($column_name, $post_type ) {

	static $printNonce = TRUE;
	if ($printNonce) {
		$printNonce = FALSE;
		wp_nonce_field( 'update_foodmenu_order', 'foodmenu_edit_nonce' );
	}
	if ($post_type == 'foodmenu') {
	?>
	<fieldset class="inline-edit-col-right inline-edit-book">
		<div class="inline-edit-col column-<?php echo $column_name ?>">
			<label class="inline-edit-group">
			<?php
			if ($column_name == 'order') {
				?><span class="title">Order</span> <input name="menu_order" value="" /><?php
			}
			?>
			</label>
		</div>
	</fieldset>
	<?php
	}
}
*/