<?php 
//shop layout 2
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
#second-menu .shop-header h2 span:before,
#third-menu .shop-header h2 span:before {
	background: <?php echo YSettings::g( 'woo_shop_header_separator' , '#ffffff'); ?>
}
#second-menu .shop-header h2 span:after,
#third-menu .shop-header h2 span:after {
	background: <?php echo YSettings::g( 'woo_shop_header_separator' , '#ffffff'); ?>
}
#second-menu .shop-header .menu-description p {
	color: <?php echo YSettings::g( 'woo_shop_header_cat_description_color', '#ffffff' ); ?>
}
</style>
<div id="second-menu" class="barnelli-menu">
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

		<div class="row">
			<div class="col-md-10 col-md-offset-1">

			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<h1 class="page-title top-menu"><?php woocommerce_page_title(); ?></h1>

			<?php endif; ?>

			<?php global $woocommerce; ?>

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
		</div>

	<?php
		$args = array(
		    'orderby' => 'name',
		    'hide_empty' => 0,
		    'taxonomy' => 'product_cat'
		);
		$product_categories = get_categories($args);
	?>

	<?php foreach ($product_categories as $pro_cat) : ?>

		<header class="row">
			<div class="col-md-12">
				<div class="menu-header shop-header">
					<h2><span><?php echo $pro_cat->name; ?> <i class="<?php echo YSettings::g( 'woo_shop_header_icon', 'fa fa-lemon-o' ); ?>"></i></span></h2>

				<?php if ( $pro_cat->description !== '' ): ?>

					<div class="menu-description col-md-8 col-md-offset-2 text-center"><p><?php echo $pro_cat->description; ?></p></div>

				<? endif; ?>

				</div>
			</div>
		</header>
		<section class="row">

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
			$count_loop = 0;
		?>

		<?php if ( $product_query->have_posts() ) : ?>

			<?php woocommerce_product_loop_start(); ?>

			<?php woocommerce_product_subcategories(); ?>

			<?php 
				/* loop */
				while ( $product_query->have_posts() ):
					$product_query->the_post();
					wc_get_template_part('content', 'product');
					$count_loop++; 
					if ( $count_loop % 3 == 0 ) {
						echo '<div class="clearfix"></div>';
					}
				endwhile; // end of the loop
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
			elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ):
				wc_get_template( 'loop/no-products-found.php' );
			endif;
		?>

		</section>

	<?php endforeach; ?> 

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