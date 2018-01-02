<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     19.3.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();

?>
<?php get_template_part( 'woocommerce', 'menu' ); ?> 

<?php
//remove_action('woocommerce_before_checkout_form','woocommerce_checkout_coupon_form', 10);
do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( !$checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

<form name="checkout" method="post" class="checkout form-inline" action="<?php echo esc_url( $get_checkout_url ); ?>">
		
	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="row">
			<div class="col2-set " id="customer_details">

				<div class="col-1 col-md-5">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>
				<div class="col-2 col-md-5 col-md-offset-1">
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>

			</div>
		</div>
		<?php //add_action('woocommerce_checkout_order_review','woocommerce_checkout_coupon_form', 10);?>
		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

	<?php endif; ?>

	<?php

	remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
	remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
	add_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
	?>

	<?php do_action( 'woocommerce_checkout_order_review' ); ?>
</form>

<?php //do_action( 'woocommerce_after_checkout_form', $checkout ); ?>