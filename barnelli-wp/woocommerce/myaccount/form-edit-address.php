<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     19.1.0
 */
if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

global $woocommerce, $current_user;

$page_title = ( $load_address == 'billing' ) ? __('Billing Address', 'woocommerce') : __('Shipping Address', 'woocommerce');

get_currentuserinfo();
?>

<?php wc_print_notices(); ?>
<?php get_template_part( 'woocommerce', 'menu' ); ?> 

<div class="row">
	<div class="col-md-5">


		<?php if (!$load_address) : ?>

			<?php wc_get_template('myaccount/my-address.php'); ?>

		<?php else : ?>

			<form method="post" class="form-edit-address form-inline">

				<h3><?php echo apply_filters('woocommerce_my_account_edit_address_title', $page_title); ?></h3>

				<?php foreach ($address as $key => $field) : ?>

					<?php woocommerce_form_field($key, $field, !empty($_POST[$key]) ? wc_clean($_POST[$key]) : $field['value'] ); ?>

				<?php endforeach; ?>

				<p class="clearfix">
					<input type="submit" class="button wc-button pull-right" name="save_address" value="<?php _e('Save Address', 'woocommerce'); ?>" />
					<?php wp_nonce_field('woocommerce-edit_address'); ?>
					<input type="hidden" name="action" value="edit_address" />
				</p>

			</form>

		<?php endif; ?>

	</div>
</div>