<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     19.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices(); ?>
<div class="wc-container">
	<?php get_template_part( 'woocommerce', 'menu' ); ?> 


<div class="row">
<div class="col-md-4">
	<?php

	$login_info = sprintf(
		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
		$current_user->display_name,
		wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
	);	
	
	
	echo '<h5>'.str_replace('<a', '<a data-djax-exclude="true" ', $login_info).'</h5>';
	?>
	<p class="myaccount_user exclude-djax">
		<?php
		$dashboard_info = sprintf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
			wc_customer_edit_account_url()
		);

		echo(str_replace('<a', '<a data-djax-exclude="true" ', $dashboard_info));
		?>
	</p>

<?php do_action( 'woocommerce_before_my_account' ); ?>



<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>

</div>
	<div class="col-md-7 col-md-offset-1">
		
		
<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>
<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
	</div>
</div>
</div>	