<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $product;
?>

<div class="menu-list col-sm-3 col-md-3 wc-product-related">
<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<article class="menu-item">
		<figure class="hover-product-wrapper">
			<a data-djax-exclude="true" href="<?php the_permalink(); ?>" rel="gallery" class="menu-gallery hover-product">
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
				<i class="fa fa-shopping-cart"></i>
			</a>
		</figure>
		<p class="title">
		<?php the_title(); ?>
		<?php if ( $product->has_weight() ) : ?>
		 	<span><?php echo '(' . $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ) . ')'; ?></span>
		<?php endif; ?>
		</p>
	<div class="small-price">
	<?php
		/**
		 * woocommerce_after_shop_loop_item_title hook
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
	?>
	</div>
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</article>
</div>