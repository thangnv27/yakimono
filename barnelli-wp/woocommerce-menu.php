<?php global $woocommerce; ?>

<div class="clearfix wc-user-wrapper">
<p class="text-right wc-user-menu" style="margin-bottom: 20px; ">
	<a class="cart-contents" data-djax-exclude="true" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e( 'View Cart', 'woocommerce' ); ?>">
		<?php _e( 'View Cart', 'woocommerce' ); ?> (<?php echo $woocommerce->cart->cart_contents_count;?>) - <?php echo $woocommerce->cart->get_cart_total(); ?>
	</a> /
	<?php if (sizeof($woocommerce->cart->cart_contents)>0): ?>
	<a data-djax-exclude="true" href="<?php echo $woocommerce->cart->get_checkout_url()?>" title="<?php _e( 'Checkout', 'woocommerce' ); ?>"><?php _e( 'Checkout', 'woocommerce' ); ?></a> /
	<?php endif; ?>
	<a data-djax-exlude="true" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>"><?php _e('Shop', 'woocommerce'); ?></a> /
	<?php if (is_user_logged_in()): ?>
	   <a data-djax-exclude="true" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woocommerce'); ?>"><?php _e('My Account','woocommerce'); ?></a>
	<?php else: ?>
	   <a data-djax-exclude="true" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','woocommerce'); ?>"><?php _e('Login','woocommerce'); ?></a>
	<?php endif; ?>
</p>
</div>