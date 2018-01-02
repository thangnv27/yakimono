<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<?php
$shop_font = YSettings::g( 'woo_shop_font', 'Open Sans' );
$shop_font_URL = str_replace(' ', '+', $shop_font);
?>
<link rel='stylesheet' id='google-fonts-css'  href='<?php echo THEME_PROTOCOL; ?>://fonts.googleapis.com/css?family=<?php echo $shop_font_URL;?>' type='text/css' media='all' />
<style>
.barnelli-menu .menu-container, .product_title {
	font-family: '<?php echo $shop_font; ?>', cursive !important;
}
.barnelli-menu .menu-container p, .barnelli-menu .menu-container span, .barnelli-menu .menu-container h2, .barnelli-menu .menu-container h1 {
	font-family: '<?php echo $shop_font; ?>', cursive !important;
}
</style>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<?php
			/**
			 * woocommerce_before_single_product hook
			 *
			 * @hooked wc_print_notices - 10
			 */
			 do_action( 'woocommerce_before_single_product' );

			 if ( post_password_required() ) {
				echo get_the_password_form();
				return;
			 }
		?>
	</div>
</div>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row wc-single-product">
		<div class="col-md-10 col-md-offset-1">
			<?php get_template_part( 'woocommerce', 'menu' ); ?> 
		</div>
		<div class="col-md-5 col-md-offset-1">
			<?php
				/**
				 * woocommerce_before_single_product_summary hook
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				 
				do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>
		<div class="col-md-5">
			<div class="summary entry-summary">
				<?php do_action( 'woocommerce_product_description_tab' ); ?>
			
				<?php

					remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
					add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 6);
					remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
					add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 9);
					
					remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * 
					 * 
					 * 
					 * 
					 */
//					remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
					do_action( 'woocommerce_single_product_summary' );
					remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
					remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
					add_action('woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 20);
					add_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 21);
					add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 25);
					add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 25);
					do_action( 'woocommerce_after_single_product_summary' );
				?>
			</div><!-- .summary -->
			<meta itemprop="url" content="<?php the_permalink(); ?>" />
			
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">

		</div>
	</div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>