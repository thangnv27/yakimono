<?php
//shop layout 3
$shop_font = YSettings::g( 'woo_shop_font', 'Open Sans' );
$shop_font_URL = str_replace(' ', '+', $shop_font);

$sidebarPostition = esc_html(get_post_meta($post->ID, 'sidebar_position', true));
$sidebarPostition = (!isset($sidebarPostition) || $sidebarPostition == 'global') ? YSettings::g( 'theme_page_sidebar_position', 'left' ) : $sidebarPostition;

?>
<link rel='stylesheet' id='google-fonts-css'  href='<?php echo THEME_PROTOCOL; ?>://fonts.googleapis.com/css?family=<?php echo $shop_font_URL;?>' type='text/css' media='all' />
<style>
.barnelli-menu .menu-container {
	font-family: '<?php echo $shop_font; ?>', cursive !important;
}
.barnelli-menu .menu-container p, .barnelli-menu .menu-container span, .barnelli-menu .menu-container h2, .barnelli-menu .menu-container h1 {
	font-family: '<?php echo $shop_font; ?>', cursive !important;
}

.cart-contents span.amount {
	font-family: 'Open Sans', cursive !important;	
}

#third-menu .menu-item .button, #third-menu .menu-item .added_to_cart {
	color: <?php echo YSettings::g('woo_shop_button', '#333333'); ?> !important;
	border: 1px solid <?php echo YSettings::g('woo_shop_button', '#333333'); ?> !important;
}

.wc-user-menu, .wc-user-menu a, .wc-user-menu a span {
	color: <?php echo YSettings::g('woo_shop_button', '#333333'); ?> !important;
}

.wc-user-menu {	
	border: 1px solid <?php echo YSettings::g('woo_shop_button', '#333333'); ?> !important;	
}

.shop-header h2 span {
	color: <?php echo YSettings::g('woo_shop_category_font_color', '#333333'); ?>;
	font-size: <?php echo YSettings::g('woo_shop_category_font_size', '40'); ?>px;
}

.shop-header .menu-description p {
	color: <?php echo YSettings::g('woo_shop_category_desc_font_color', '#333333'); ?> !important;
	font-size: <?php echo YSettings::g('woo_shop_category_desc_font_size', '30'); ?>px;
}

.menu-item .title, .menu-item .title a {
	color: <?php echo YSettings::g('woo_shop_item_font_color', '#333333'); ?> !important;
	font-size: <?php echo YSettings::g('woo_shop_item_font_size', '20'); ?>px !important;
}

.menu-item .description, .menu-item .description a {
	color: <?php echo YSettings::g('woo_shop_desc_font_color', '#333333'); ?> !important;
	font-size: <?php echo YSettings::g('woo_shop_desc_font_size', '18'); ?>px !important;
}

.star-rating {
	color: <?php echo YSettings::g('woo_shop_item_stars', '#333333'); ?> !important;
}

.top-menu {
	color: <?php echo YSettings::g( 'woo_shop_title', '#333333' ); ?>;
}
.barnelli-menu h2 {
	color: <?php echo YSettings::g( 'woo_shop_header_color', '#333333' ); ?> !important;
}
#second-menu .shop-header h2 span:before,
#third-menu .shop-header h2 span:before {
	background: <?php echo YSettings::g( 'woo_shop_header_separator' , '#333333'); ?>;
}
#second-menu .shop-header h2 span:after,
#third-menu .shop-header h2 span:after {
	background: <?php echo YSettings::g( 'woo_shop_header_separator' , '#333333'); ?>;
}
#third-menu .shop-header .menu-description p {
	color: <?php echo YSettings::g( 'woo_shop_header_cat_description_color', '#333333' ); ?>;
}

.menu-item .price span .amount {
	color: <?php echo YSettings::g( 'woo_shop_currency_color', '#333333' ); ?>;
	font-size: <?php echo (int)YSettings::g( 'woo_shop_currency_size', '20' ) - 5; ?>px;
}

.menu-item .price span del .amount {
	color: <?php echo YSettings::g( 'woo_shop_currency_color', '#333333' ); ?>;
	font-size: <?php echo (int)YSettings::g( 'woo_shop_currency_size', '20' ) - 5; ?>px;
}
.menu-item .price span ins .amount {
	color: <?php echo YSettings::g( 'woo_shop_currency_color', '#333333' ); ?>;
	font-size: <?php echo (int)YSettings::g( 'woo_shop_currency_size', '20' ); ?>px;
}

.widget-title {
	color: <?php echo YSettings::g( 'theme_footer_menu_header_color', '#333333' ); ?>;
}
.widget-wrapper, .widget-wrapper form {
	color: <?php echo YSettings::g( 'theme_footer_menu_color', '#333333' ); ?>;	
}

#footer #wp-calendar a, .widget-wrapper ul li a, .widget-wrapper input {
	color: <?php echo YSettings::g( 'theme_footer_menu_link_color', '#333333' ); ?> !important;	
}

#footer #wp-calendar a:hover, .widget-wrapper ul li a:hover, .widget-wrapper input:hover {
	color: <?php echo YSettings::g( 'theme_footer_menu_hover_link_color', '#333333' ); ?> !important;	
}
</style>

<div id="third-menu" class="barnelli-menu">
	<div class="container animate-in animate-in-fade">
		<div class="menu-container">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 * 
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
	?>

		<div class="row">
			<div class="col-md-12">

			<?php if (apply_filters('woocommerce_show_page_title', true)): ?>

				<!--<h1 class="page-title top-menu"><?php woocommerce_page_title(); ?></h1>-->

			<?php endif; ?>

			<?php do_action('woocommerce_archive_description'); ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action('woocommerce_before_shop_loop');
			?>
			</div>
		</div>
<?php get_template_part('woocommerce', 'menu');?>
	<?php
		$args = array(
			'taxonomy' => array('product_cat'),
		    'orderby' => 'name',
		    'hide_empty' => 0
		);

		$product_categories = get_categories($args);

	?>
	<?php foreach ($product_categories as $pro_cat) : ?>

	<?php if (   ($pro_cat->slug == get_query_var('product_cat'))   || !get_query_var('product_cat')  ) : ?>
		<header class="row">
			<div class="col-md-12">
				<div class="menu-header shop-header">
					<h2><span><?php echo $pro_cat->name; ?>
					<?php
						$thumbnail_id = get_woocommerce_term_meta($pro_cat->term_id, 'thumbnail_id', true);
						$image = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail');

						if ($image) {
							echo '<img src="' . $image[0] . '" alt="" height="30" />';
						}
					?>						
						</span></h2>
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

		usort($product_query->posts, create_function('$a, $b', 'return strnatcmp($a->menu_order, $b->menu_order);'));
		
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
				//do_action( 'woocommerce_after_shop_loop' );
			?>
		<?php
			elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ):
				wc_get_template( 'loop/no-products-found.php' );
			endif;
		?>
		</section>
		<?php endif;?>
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
	<?php if (YSettings::g('woo_display_footer', '0') == '1'):?>
	<?php get_template_part('content', 'footer'); ?>
	<?php endif; ?>
	</div>
</div>