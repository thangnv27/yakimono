<?php 
//shop 1
	$shop_font = YSettings::g( 'woo_shop_font' );
	$shop_font_URL = str_replace(' ', '+', $shop_font);
?>
<link rel='stylesheet' id='google-fonts-css'  href='<?php echo THEME_PROTOCOL; ?>://fonts.googleapis.com/css?family=<?php echo $shop_font_URL;?>' type='text/css' media='all' />
<style>
.barnelli-menu {
	font-family: '<?php echo $shop_font; ?>', cursive !important;
}
.barnelli-menu p, .barnelli-menu span, .barnelli-menu h2, .barnelli-menu h1 {
	font-family: '<?php echo $shop_font; ?>', cursive !important;
}
.top-menu {
	color: <?php echo YSettings::g( 'woo_shop_title', '#ffffff' ); ?>
}
.barnelli-menu h2 {
	color: <?php echo YSettings::g( 'woo_shop_header_color', '#ffffff' ); ?> !important;
}
.barnelli-menu .menu-list .menu-item .title:before{
	background: <?php echo YSettings::g( 'woo_shop_list_bulk_color', '#ffffff' ); ?>
}
.barnelli-menu .menu-description p {
	color: <?php echo YSettings::g( 'woo_shop_header_cat_description_color', '#ffffff' ); ?>
}
</style>
<div class="barnelli-menu padding-wrapper">
	<div class="slidee">
		<div class="container animate-in animate-in-fade">

		<?php
			/**
			 * woocommerce_before_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>
			<header class="row">
				<div class="col-md-10 col-md-offset-1">
					
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

					<h1 class="page-title top-menu"><?php woocommerce_page_title(); ?></h1>

				<?php endif; ?>

				<?php global $woocommerce; ?>
					<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
					<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart fa-4x"></i></a>

				<?php do_action( 'woocommerce_archive_description' ); ?>

				<?php
					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>

				</div>
			</header>
			<section class="row">
				<div class="col-md-10 col-md-offset-1">

				<?php
					$args = array(
					    'orderby' => 'name',
					    'hide_empty' => 0,
					    'taxonomy' => 'product_cat'
					);
					$product_categories = get_categories($args); 
				?>

				<?php foreach ($product_categories as $pro_cat) : ?>

					<dl>
						<dt>
							<h2><?php echo $pro_cat->name; ?> <i class="<?php echo YSettings::g( 'woo_shop_header_icon', 'fa fa-lemon-o' ); ?>"></i></h2>

						<?php if ( $pro_cat->description !== '' ): ?>

							<div class="menu-description menu-description-list"><p><?php echo $pro_cat->description; ?></p></div>

						<? endif; ?>

						</dt>
						<article>
						<?php 
							$custom_args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => $pro_cat->slug
									)
								)
							);
							$product_query = new WP_Query($custom_args); 
						?>

						<?php if ( $product_query->have_posts() ) : ?>

							<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php 
								/*loop*/
								while ( $product_query->have_posts() ):
									$product_query->the_post();
									wc_get_template_part( 'content', 'product2' );
							 	endwhile; //end of the loop
							?>

							<?php wp_reset_query(); ?>

							<?php woocommerce_product_loop_end(); ?>

							<?php
								/**
								 * woocommerce_after_shop_loop hook
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action( 'woocommerce_after_shop_loop' );
							?>

						<?php 
							elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :
								wc_get_template( 'loop/no-products-found.php' );
							endif; 
						?>

						</article>
					</dl>

				<?php endforeach; ?>

				</div>
			</section>

		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		</div>
	</div>
</div>