<?php
//shop results
$shop_font = YSettings::g( 'woo_shop_font', 'Open Sans' );
$shop_font_URL = str_replace(' ', '+', $shop_font);
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
<div id="third-menu" class="barnelli-menu padding-wrapper">
	<div class="container">
		<?php get_template_part('woocommerce', 'menu');?>
		<header class="row">
			<div class="col-md-12">
				<div class="menu-header shop-header">
					<h2><span><?php echo __( 'Search results for &ldquo;', 'woocommerce' )  . get_search_query() . '&rdquo;';?></span></h2>
				</div>
			</div>
		</header>	
	</div>
	
		<div class="container animate-in animate-in-fade">
			<div class="row equal-grid">
				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>
			</div>
			<?php get_template_part('content', 'footer'); ?>
		</div>
	</div>	