<?php

function barnelli_custom_nav_update($menu_id, $menu_item_db_id, $args ) {
	if (isset($_REQUEST['menu-item-custom-icon']) && is_array($_REQUEST['menu-item-custom-icon'])) {
		if (isset($_REQUEST['menu-item-custom-icon'][$menu_item_db_id])) {
			$custom_value = $_REQUEST['menu-item-custom-icon'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_custom_icon', $custom_value );
		}
	}

	if (isset($_REQUEST['menu-item-custom-icon-image']) && is_array($_REQUEST['menu-item-custom-icon-image'])) {
		if (isset($_REQUEST['menu-item-custom-icon-image'][$menu_item_db_id])) {
			$custom_value = $_REQUEST['menu-item-custom-icon-image'][$menu_item_db_id];
			update_post_meta($menu_item_db_id, '_menu_item_custom_icon_image', $custom_value);
		}
	}
}

/*
 * Adds value of new field to $item object that will be passed to Barnelli_Walker_Nav_Menu_Edit_Custom
 */
function barnelli_custom_nav_item($menu_item) {
	$menu_item->custom_icon = get_post_meta( $menu_item->ID, '_menu_item_custom_icon', true );
	$menu_item->custom_icon_image = get_post_meta( $menu_item->ID, '_menu_item_custom_icon_image', true );
	return $menu_item;
}

function barnelli_custom_nav_edit_walker($walker,$menu_id) {
	return 'Barnelli_Walker_Nav_Menu_Edit_Custom';
}

/**
 * Copied from Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Barnelli_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
/**
 * @see Walker_Nav_Menu::start_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference.
 */
function start_lvl( &$output, $depth = 0, $args = array() ) {}

/**
 * @see Walker_Nav_Menu::end_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference.
 */
function end_lvl( &$output, $depth = 0, $args = array() ) {}

/**
 * @see Walker::start_el()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param object $item Menu item data object.
 * @param int $depth Depth of menu item. Used for padding.
 * @param object $args
 */
function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	global $_wp_nav_menu_max_depth;
	$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

	wp_enqueue_script('icon-picker', THEME_INCLUDES_URI . '/icon-picker.js', array('jquery'));
	add_thickbox();
	wp_enqueue_script('image-upload', THEME_DIR_URI . '/yopress/core/components/uploader/yopressUploader.js', array('jquery'));

	wp_enqueue_style( 'font-awesome', THEME_DIR_URI . '/fonts/font-awesome/css/font-awesome.min.css');

	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

	ob_start();
	$item_id = esc_attr( $item->ID );
	$removed_args = array(
		'action',
		'customlink-tab',
		'edit-menu-item',
		'menu-item',
		'page-tab',
		'_wpnonce',
	);

	$original_title = '';
	if ( 'taxonomy' == $item->type ) {
		$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
		if ( is_wp_error( $original_title ) )
			$original_title = false;
	} elseif ( 'post_type' == $item->type ) {
		$original_object = get_post( $item->object_id );
		$original_title = $original_object->post_title;
	}

	$classes = array(
		'menu-item menu-item-depth-' . $depth,
		'menu-item-' . esc_attr( $item->object ),
		'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
	);

	$title = $item->title;

	if (!empty($item->_invalid)) {
		$classes[] = 'menu-item-invalid';
		/* translators: %s: title of menu item which is invalid */
		$title = sprintf(__('%s (Invalid)', THEME_NAME), $item->title);
	} elseif (isset($item->post_status) && 'draft' == $item->post_status) {
		$classes[] = 'pending';
		/* translators: %s: title of menu item in draft status */
		$title = sprintf(__('%s (Pending)', THEME_NAME), $item->title);
	}

	$title = empty($item->label) ? $title : $item->label;

	?>
	<li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
		<dl class="menu-item-bar">
			<dt class="menu-item-handle">
				<span class="item-title"><?php echo esc_html($title); ?></span>
				<span class="item-controls">
					<span class="item-type"><?php echo esc_html($item->type_label); ?></span>
					<span class="item-order hide-if-js">
						<a href="<?php
							echo wp_nonce_url(
								add_query_arg(
									array(
										'action' => 'move-up-menu-item',
										'menu-item' => $item_id,
									),
									remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
								),
								'move-menu_item'
							);
						?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', THEME_NAME); ?>">&#8593;</abbr></a>
						|
						<a href="<?php
							echo wp_nonce_url(
								add_query_arg(
									array(
										'action' => 'move-down-menu-item',
										'menu-item' => $item_id,
									),
									remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
								),
								'move-menu_item'
							);
						?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', THEME_NAME); ?>">&#8595;</abbr></a>
					</span>
					<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item'); ?>" href="<?php
						echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : esc_url( add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) ) );
					?>"><?php _e( 'Edit Menu Item', THEME_NAME ); ?></a>
				</span>
			</dt>
		</dl>

		<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
			<?php if( 'custom' == $item->type ) : ?>
				<p class="field-url description description-wide">
					<label for="edit-menu-item-url-<?php echo $item_id; ?>">
						<?php _e( 'URL', THEME_NAME ); ?><br />
						<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
					</label>
				</p>
			<?php endif; ?>
			<p class="description description-thin">
				<label for="edit-menu-item-title-<?php echo $item_id; ?>">
					<?php _e( 'Navigation Label', THEME_NAME ); ?><br />
					<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
				</label>
			</p>
			<p class="description description-thin">
				<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
					<?php _e( 'Title Attribute', THEME_NAME ); ?><br />
					<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
				</label>
			</p>
			<p class="field-link-target description">
				<label for="edit-menu-item-target-<?php echo $item_id; ?>">
					<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
					<?php _e( 'Open link in a new window/tab', THEME_NAME ); ?>
				</label>
			</p>
			<p class="field-css-classes description description-thin">
				<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
					<?php _e( 'CSS Classes (optional)', THEME_NAME ); ?><br />
					<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
				</label>
			</p>
			<p class="field-xfn description description-thin">
				<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
					<?php _e( 'Link Relationship (XFN)', THEME_NAME ); ?><br />
					<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
				</label>
			</p>
			<p class="field-description description description-wide">
				<label for="edit-menu-item-description-<?php echo $item_id; ?>">
					<?php _e( 'Description', THEME_NAME ); ?><br />
					<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
					<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', THEME_NAME); ?></span>
				</label>
			</p>        
			<?php
			/*
			 * This is the added field
			 */
			if ($depth < 1) {
			?>      
			<p class="field-custom-icon description description-wide">
				<label for="edit-menu-item-custom-icon-<?php echo $item_id; ?>">
					<?php _e('Icon', THEME_NAME); ?><br />
					<?php
					$iconValue = '';
					$icon = esc_attr($item->custom_icon) ? esc_attr($item->custom_icon) : 'fa fa-circle';

					if ($icon == 'no-icon') {
						$iconValue = 'empty';
					}
					?>
					<i data-picker="picker-<?php echo $item_id; ?>" class="<?php echo $icon; ?>" id="dish-cat-icon-new"><?php echo $iconValue; ?></i>
					<input type="hidden" id="edit-menu-item-custom-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom-icon" name="menu-item-custom-icon[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->custom_icon ); ?>" />
					<div class="icon-picker" style="display: block;">
					<div class="hidden icon-close"><a href="#"><?php _e('Close', THEME_NAME); ?></a> &nbsp;</div>
					<div class="hidden icon-set">
						<?php include THEME_INCLUDES . '/icon-list.php'; ?>
					</div>
				</div>
				<p class="description"><?php _e('or Choose icon image', THEME_NAME); ?></p>
					<?php if (esc_attr($item->custom_icon_image) != ''): ?>
					<img src="<?php echo esc_attr( $item->custom_icon_image ); ?>" width="40" height="40" /><br/>
					<?php endif; ?>
					<input style="width:250px;" id="edit-menu-item-custom-icon-image-<?php echo $item_id; ?>" name="menu-item-custom-icon-image[<?php echo $item_id; ?>]" class="uploadinput-2" type="text" size="20" value="<?php echo esc_attr( $item->custom_icon_image ); ?>" style="">
					<input style="width:65px;" id="upload_image_button" class="button button-primary upload_image_button" type="button" value="Upload" data-id="2">
					<input style="width:65px;" class="button button-primary upload_image_remove_button" type="button" value="Remove" data-id="2">
			</p>
			<?php
			}
			/*
			 * end added field
			 */
			?>
			<div class="menu-item-actions description-wide submitbox">
				<?php if ('custom' != $item->type && $original_title !== false) : ?>
					<p class="link-to-original">
						<?php printf(__('Original: %s', THEME_NAME), '<a href="' . esc_attr($item->url) . '">' . esc_html($original_title) . '</a>'); ?>
					</p>
				<?php endif; ?>
				<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
				echo wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'delete-menu-item',
							'menu-item' => $item_id,
						),
						remove_query_arg($removed_args, admin_url('nav-menus.php'))
					),
					'delete-menu_item_' . $item_id
				); ?>"><?php _e('Remove', THEME_NAME); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url(add_query_arg(array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg($removed_args, admin_url('nav-menus.php'))));
					?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', THEME_NAME); ?></a>
			</div>

			<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
			<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object_id); ?>" />
			<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object); ?>" />
			<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_item_parent); ?>" />
			<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_order); ?>" />
			<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->type); ?>" />
		</div><!-- .menu-item-settings-->
		<ul class="menu-item-transport"></ul>
	<?php
	$output .= ob_get_clean();
	}
}

class barnelli_walker extends Walker_Nav_Menu {
	//start of the sub menu wrap

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"subnav\">\n";
	}

	function end_el(&$output, $item, $depth = 0, $args = array()) {
		if ($depth == 0) {
			$output .= "</div></li>\n";
		} else {
			$output .= "</li>\n";
		}
	}

	//add the description to the menu item output
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;

		$indent = ($depth) ? str_repeat("\t", $depth) : '';
 
		$class_names = $value = '';
 
		$classes = empty($item->classes) ? array() : (array)$item->classes;
 
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));

		$slideUrl = rtrim($item->url, '/');
		$homeUrl = rtrim(get_home_url(), '/');

		$custom_icon = get_post_meta($item->ID, '_menu_item_custom_icon', true);

		if ($custom_icon == '') {
			$custom_icon = 'fa fa-circle';
		}

		$showIcon = true;

		if ($custom_icon == 'no-icon') {
			$showIcon = false;
		}

		$custom_icon_image = get_post_meta($item->ID, '_menu_item_custom_icon_image', true);

		if ($custom_icon_image != '') {
			$bgImg = $custom_icon_image;
			$image = explode('.', $custom_icon_image);
			$image[count($image)-2] = $image[count($image)-2] . '-40x40';
			$custom_icon_image = implode('.', $image);

			$tmp = explode('/wp-content/uploads/', $custom_icon_image);
			$wpUploadDir = wp_upload_dir();
			$imagePath = $wpUploadDir['basedir'] . '/'. $tmp[1];
			
			if (!file_exists($imagePath)) {
				$custom_icon_image = $bgImg;
			}
		}

		if ($custom_icon == 'no-icon') {
			if (strstr($class_names, 'current-menu-item')) {
				$class_names = ' no-icon-active ' . $class_names;
			}

			$class_names = ' no-icon ' . $class_names;			
		}

		if ($item->attr_title == 'logo') {
			$class_names = ' class="menu-slide menu-image ' . esc_attr($class_names) . '"';
		} else if ($item->attr_title == 'slider') {
			$class_names = ' class="menu-slide ' . esc_attr($class_names) . '"';	
		} else {
			$class_names = ' class="' . esc_attr($class_names) . '"';	
		}

		$customLogoText = get_option('blogname');

		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($customLogoText) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';

		$item_output = $args->before;

		if ($item->attr_title == 'logo') {
			$logoImage = YSettings::g( 'logo_image' , 'http://placehold.it/309x120');

			if ($depth == 0) {
				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'><div>';
			} else {
				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			}

			$item_output .= '<a class="content-link" '. $attributes .'>';
			$item_output .= '<img src="'.$logoImage.'" alt="" />';
			$item_output .= '</a>';

			if ($depth == 0) {
				$item_output .= $args->after;
			}

			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

		} else {
			if ($depth == 0) {
				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'><div>';
			} else {
				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			}
 
			$hoverColor = YSettings::g('nav_menu_font_color_hover', '#666666');

			$span = '<span>';

			if ($depth == 0) {
				if ($item->attr_title == 'link') {
					$item_output .= '<a data-djax-exclude="true" class="content-link '.str_replace(" ", "-", $item->title).'-wrapper"'. $attributes .'>'.$span;	
				} else {
					$item_output .= '<a class="content-link '.str_replace(" ", "-", $item->title).'-wrapper"'. $attributes .'>'.$span;	
				}
			} else {
				if ($item->attr_title == 'link') {
					$item_output .= '<a data-djax-exclude="true" '. $attributes .'>'.$span;
				} else {
					$item_output .= '<a '. $attributes .'>'.$span;
				}
			}

			$menu_icon = '';
			if ($custom_icon_image != '') {
				$menu_icon = '<img src="'.$custom_icon_image.'" alt="" />';
			} else {
				$menu_icon = ($custom_icon == 'no-icon') ? '' : '<i style="color:'.$hoverColor.' !important;" class="'.$custom_icon.'"></i>';
			}

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			if(strlen($item->description)>2){ $item_output .= '<br /><span class="sub">' . $item->description . '</span>'; }

			if ($depth == 0) {
				$item_output .= '</span>'.$menu_icon.'</a>';
			} else {
				$item_output .= '</span></a>';
			}

			if ($depth == 0) {
				$item_output .= $args->after;
			}
	 
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
		
	}
}

class barnelli_mobile_walker extends Walker_Nav_Menu {
	//start of the sub menu wrap
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"subnav\">\n";
	}

	//add the description to the menu item output
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
 		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		
		$class_names = $value = '';
 
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

		if ($item->attr_title == 'logo') {
			$class_names = ' class="menu-image ' . esc_attr( $class_names ) . '"';
		} else {
			$class_names = ' class="' . esc_attr( $class_names ) . '"';	
		}

		$attributes  = ! empty($item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty($item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty($item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty($item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
 
 		if ($item->attr_title == 'link') {
			$item_output .= '<a data-djax-exclude="true" '. $attributes .'>';
		} else {
			$item_output .= '<a '. $attributes .'>';
		}

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		if(strlen($item->description)>2){ $item_output .= '<br /><span class="sub">' . $item->description . '</span>'; }
		$item_output .= '</a><span class="open-children"><i class="fa fa-angle-down"></i></span>';
		$item_output .= $args->after;
 
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
	}
}