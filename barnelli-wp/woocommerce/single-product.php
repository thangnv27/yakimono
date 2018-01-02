<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' );

global $post; 
if (is_page() && $post->post_parent) {
	$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));

} else {
	$wrapperClass = str_replace(" ", "-", get_the_title());
}
$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);

$sidebarPostition = YSettings::g('woo_sidebar_position_product', 'none');

include_once THEME_INCLUDES . '/Barnelli_Mobile_Detect.php';
$detect = new Barnelli_Mobile_Detect();
$mobileSidebar = YSettings::g('disable_mobile_sidebars', '0');
$disableMobileSidebar = (($detect->isMobile() == 1) && ($mobileSidebar == '1'));

?>
<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper container-fluid" id="main-content">
	<div class="padding-wrapper container-fluid">
		<div class="container">


			<div class="row">
				<?php if (( $sidebarPostition == 'right' ) && ($disableMobileSidebar == false)) : ?>
				<div class="col-md-9">
					<?php do_action('woocommerce_before_main_content'); ?>

					<?php while (have_posts()) : the_post(); ?>
						<?php wc_get_template_part('content', 'single-product'); ?>
					<?php endwhile; ?>

					<?php do_action('woocommerce_after_main_content'); ?>
				</div>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'woocommerce' ); ?>
				</div>
				<?php elseif (( $sidebarPostition == 'left' ) && ($disableMobileSidebar == false)) : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'woocommerce' ); ?>
				</div>
				<div class="col-md-9">
					<?php do_action('woocommerce_before_main_content'); ?>

					<?php while (have_posts()) : the_post(); ?>
						<?php wc_get_template_part('content', 'single-product'); ?>
					<?php endwhile; ?>

					<?php do_action('woocommerce_after_main_content'); ?>
				</div>
				<?php else: ?>
				<div class="col-md-12">
					<?php do_action('woocommerce_before_main_content'); ?>

					<?php while (have_posts()) : the_post(); ?>
						<?php wc_get_template_part('content', 'single-product'); ?>
					<?php endwhile; ?>

					<?php do_action('woocommerce_after_main_content'); ?>
				</div>
				<?php endif; ?>
			</div>

			<div class="row">
				<div class="col-md-12">
					<?php if (YSettings::g('woo_display_footer', '0') == '1'):?>
					<?php get_template_part('content', 'footer'); ?>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>

<?php get_footer( 'shop' ); ?>