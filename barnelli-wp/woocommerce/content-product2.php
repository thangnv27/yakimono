<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $product;
?>
<dd class="menu-list">
<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<section class="menu-item">
		<p class="title">
			<a data-djax-exclude="true" href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
			<?php if ( $product->has_weight() ) : ?>
				<span><?php echo '(' . $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ) . ')'; ?></span>
			<?php endif; ?>
			</a>
		</p>
		<p class="description"><?php the_excerpt(); ?></p>
	</section>
<?php
	/**
	 * woocommerce_after_shop_loop_item_title hook
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	do_action( 'woocommerce_after_shop_loop_item' );
?>
</dd>