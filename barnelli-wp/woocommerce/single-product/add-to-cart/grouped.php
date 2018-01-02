<?php
/**
 * Grouped product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     19.1.7
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product, $post;

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart" method="post" enctype='multipart/form-data'>
	<div class="group_table">
		<?php
			foreach ( $grouped_products as $product_id ) :
				$product = get_product( $product_id );
				$post    = $product->post;
				setup_postdata( $post );
				?>
				<div class="grouped_product">
					<div class="">
						<h4>
							<?php echo $product->is_visible() ? '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' : get_the_title(); ?>
						</h4>
					</div>						
					<?php do_action ( 'woocommerce_grouped_product_list_before_price', $product ); ?>

					<div class="price">
						<?php
							echo $product->get_price_html();

							if ( ( $availability = $product->get_availability() ) && $availability['availability'] )
								echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] );
						?>
					</div>
					<div>
						<?php if ( $product->is_sold_individually() || ! $product->is_purchasable() ) : ?>
							<?php woocommerce_template_loop_add_to_cart(); ?>
						<?php else : ?>
							<?php
								$quantites_required = true;
								woocommerce_quantity_input( array( 'input_name' => 'quantity[' . $product_id . ']', 'input_value' => '0' ) );
							?>
						<?php endif; ?>
					</div>



				</div>
				<?php
			endforeach;

			// Reset to parent grouped product
			wp_reset_postdata();
			$product = get_product( $post->ID );
		?>
	</div>

	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	<?php if ( $quantites_required ) : ?>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>