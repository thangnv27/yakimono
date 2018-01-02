<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once('post-gallery.php');

function barnelli_meta_boxes() {
	global $post;

	// Gallery into portfolio
	// add_meta_box( 'vision-portfolio-images', __( 'Images', 'vision-wp' ), 'barnelli_post_images_box', 'portfolio', 'side', 'low' );
	// Videos into portfolio
	// add_meta_box( 'vision-portfolio-videos', __( 'Videos', 'vision-wp' ), 'post_video_box', 'portfolio', 'side', 'low' );

	// Gallery into equipment
	// add_meta_box( 'vision-portfolio-images', __( 'Images', 'vision-wp' ), 'barnelli_post_images_box', 'equipment', 'side', 'low' );
}

add_action('add_meta_boxes', 'barnelli_meta_boxes');

function barnelli_meta_boxes_save( $post_id, $post ) {
	if ( empty( $post_id ) || empty( $post ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( is_int( wp_is_post_revision( $post ) ) ) return;
	if ( is_int( wp_is_post_autosave( $post ) ) ) return;
	if ( empty( $_POST['barnelli_meta_nonce'] ) || ! wp_verify_nonce( $_POST['barnelli_meta_nonce'], 'barnelli_save_data' ) ) return;
	if ( !current_user_can( 'edit_post', $post_id )) return;
	if ( $post->post_type != 'portfolio' && $post->post_type != 'shop_order' && $post->post_type != 'shop_coupon' ) return;

	do_action( 'barnelli_process_' . $post->post_type . '_meta', $post_id, $post );

	barnelli_meta_boxes_save_errors();
}

add_action('save_post', 'barnelli_meta_boxes_save', 1, 2);

function barnelli_pre_post_update($post_id) {
	if (isset($_POST['_visibility'])) {
		update_post_meta($post_id, '_visibility', stripslashes($_POST['_visibility']));
	}

	if (isset($_POST['_stock_status'])) {
		update_post_meta($post_id, '_stock_status', stripslashes($_POST['_stock_status']));
	}
}

add_action('pre_post_update', 'barnelli_pre_post_update');

function barnelli_meta_boxes_save_errors() {
	global $barnelli_errors;

	update_option('barnelli_errors', $barnelli_errors);
}

add_action('admin_footer', 'barnelli_meta_boxes_save_errors');

function barnelli_meta_boxes_show_errors() {
	global $barnelli_errors;

	$barnelli_errors = maybe_unserialize(get_option('barnelli_errors'));

    if (!empty($barnelli_errors)) {
    	echo '<div id="barnelli_errors" class="error fade">';
    	foreach ($barnelli_errors as $error)
    		echo '<p>' . esc_html($error) . '</p>';
    	echo '</div>';

    	// Clear
    	update_option('barnelli_errors', '');
    	$barnelli_errors = array();
    }
}

add_action('admin_notices', 'barnelli_meta_boxes_show_errors');

/**
 * Output a input box.
 *
 * @access public
 * @param array $field
 * @return void
 */

function barnelli_wp_text_input($field) {
	global $thepostid, $post, $vision;

	$thepostid 				= empty( $thepostid ) ? $post->ID : $thepostid;
	$field['placeholder'] 	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
	$field['class'] 		= isset( $field['class'] ) ? $field['class'] : 'short';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value'] 		= isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['name'] 			= isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['type'] 			= isset( $field['type'] ) ? $field['type'] : 'text';

	// Custom attribute handling
	$custom_attributes = array();

	if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) )
		foreach ( $field['custom_attributes'] as $attribute => $value )
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><input type="' . esc_attr( $field['type'] ) . '" class="' . esc_attr( $field['class'] ) . '" name="' . esc_attr( $field['name'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $field['value'] ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" ' . implode( ' ', $custom_attributes ) . ' /> ';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) ) {
			echo '<img class="help_tip" data-tip="' . esc_attr( $field['description'] ) . '" src="' . $vision->plugin_url() . '/assets/images/help.png" height="16" width="16" />';
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}

	}
	echo '</p>';
}


/**
 * Output a hidden input box.
 *
 * @access public
 * @param array $field
 * @return void
 */
function barnelli_wp_hidden_input( $field ) {
	global $thepostid, $post;

	$thepostid = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['value'] = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['class'] = isset( $field['class'] ) ? $field['class'] : '';

	echo '<input type="hidden" class="' . esc_attr( $field['class'] ) . '" name="' . esc_attr( $field['id'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $field['value'] ) .  '" /> ';
}


/**
 * Output a textarea input box.
 *
 * @access public
 * @param array $field
 * @return void
 */
function barnelli_wp_textarea_input( $field ) {
	global $thepostid, $post, $vision;

	$thepostid 				= empty( $thepostid ) ? $post->ID : $thepostid;
	$field['placeholder'] 	= isset( $field['placeholder'] ) ? $field['placeholder'] : '';
	$field['class'] 		= isset( $field['class'] ) ? $field['class'] : 'short';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value'] 		= isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><textarea class="' . esc_attr( $field['class'] ) . '" name="' . esc_attr( $field['id'] ) . '" id="' . esc_attr( $field['id'] ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" rows="2" cols="20">' . esc_textarea( $field['value'] ) . '</textarea> ';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) ) {
			echo '<img class="help_tip" data-tip="' . esc_attr( $field['description'] ) . '" src="' . $vision->plugin_url() . '/assets/images/help.png" height="16" width="16" />';
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}

	}
	echo '</p>';
}


/**
 * Output a checkbox input box.
 *
 * @access public
 * @param array $field
 * @return void
 */
function barnelli_wp_checkbox( $field ) {
	global $thepostid, $post;

	$thepostid 				= empty( $thepostid ) ? $post->ID : $thepostid;
	$field['class'] 		= isset( $field['class'] ) ? $field['class'] : 'checkbox';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value'] 		= isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['cbvalue'] 		= isset( $field['cbvalue'] ) ? $field['cbvalue'] : 'yes';

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><input type="checkbox" class="' . esc_attr( $field['class'] ) . '" name="' . esc_attr( $field['id'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $field['cbvalue'] ) . '" ' . checked( $field['value'], $field['cbvalue'], false ) . ' /> ';

	if ( ! empty( $field['description'] ) ) echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';

	echo '</p>';
}


/**
 * Output a select input box.
 *
 * @access public
 * @param array $field
 * @return void
 */
function barnelli_wp_select( $field ) {
	global $thepostid, $post, $vision;

	$thepostid 				= empty( $thepostid ) ? $post->ID : $thepostid;
	$field['class'] 		= isset( $field['class'] ) ? $field['class'] : 'select short';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value'] 		= isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><select id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['id'] ) . '" class="' . esc_attr( $field['class'] ) . '">';

	foreach ( $field['options'] as $key => $value ) {

		echo '<option value="' . esc_attr( $key ) . '" ' . selected( esc_attr( $field['value'] ), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';

	}

	echo '</select> ';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) ) {
			echo '<img class="help_tip" data-tip="' . esc_attr( $field['description'] ) . '" src="' . $vision->plugin_url() . '/assets/images/help.png" height="16" width="16" />';
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}

	}
	echo '</p>';
}

/**
 * Output a radio input box.
 *
 * @access public
 * @param array $field
 * @return void
 */
function barnelli_wp_radio( $field ) {
	global $thepostid, $post, $vision;

	$thepostid 				= empty( $thepostid ) ? $post->ID : $thepostid;
	$field['class'] 		= isset( $field['class'] ) ? $field['class'] : 'select short';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value'] 		= isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );

	echo '<fieldset class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><legend>' . wp_kses_post( $field['label'] ) . '</legend><ul>';

	if ( ! empty( $field['description'] ) ) {
		echo '<li class="description">' . wp_kses_post( $field['description'] ) . '</li>';
	}

    foreach ( $field['options'] as $key => $value ) {

		echo '<li><label><input
        		name="' . esc_attr( $field['id'] ) . '"
        		value="' . esc_attr( $key ) . '"
        		type="radio"
        		class="' . esc_attr( $field['class'] ) . '"
        		' . checked( esc_attr( $field['value'] ), esc_attr( $key ), false ) . '
        		/> ' . esc_html( $value ) . '</label>
    	</li>';
	}
    echo '</ul></fieldset>';
}