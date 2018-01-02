<?php
// Add term page
function barnelli_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[custom_category_footer]"><?php _e('Category Footer', THEME_NAME); ?></label>
		<select name="term_meta[custom_category_footer]" id="term_meta[custom_category_footer]">
			<option value="1"><?php _e('Enabled', THEME_NAME); ?></option>
			<option value="0"><?php _e('Disabled', THEME_NAME); ?></option>
		</select>
		<p class="description"><?php _e('Enable or disable footer on this category', THEME_NAME); ?></p>
	</div>
<?php
}
add_action('category_add_form_fields', 'barnelli_taxonomy_add_new_meta_field', 10, 2);

// Edit term page
function barnelli_taxonomy_edit_meta_field($term) {
	// put the term ID into a variable
	$t_id = $term->term_id;

	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option("taxonomy_$t_id");
	?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[custom_category_footer]"><?php _e('Category Footer', THEME_NAME); ?></label></th>
		<td>
			<select name="term_meta[custom_category_footer]" id="term_meta[custom_category_footer]">
				<?php
				$customCategoryFooter = esc_attr($term_meta['custom_category_footer']);
				?>
				<option <?php selected( $customCategoryFooter, "1"); ?> value="1"><?php _e('Enabled', THEME_NAME); ?></option>
				<option <?php selected( $customCategoryFooter, "0"); ?> value="0"><?php _e('Disabled', THEME_NAME); ?></option>
			</select>
			<p class="description"><?php _e('Enable or disable footer on this category', THEME_NAME); ?></p>
		</td>
	</tr>
<?php
}

add_action('category_edit_form_fields', 'barnelli_taxonomy_edit_meta_field', 10, 2);

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta($term_id) {
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

add_action('edited_category', 'save_taxonomy_custom_meta', 10, 2);
add_action('create_category', 'save_taxonomy_custom_meta', 10, 2);