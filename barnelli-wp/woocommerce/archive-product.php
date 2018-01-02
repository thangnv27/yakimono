<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop');

global $post; 
if (is_page() && $post->post_parent) {
	$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));

} else {
	$wrapperClass = str_replace(" ", "-", get_the_title());
}
$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);
$sidebarPostition = YSettings::g('woo_sidebar_position_shop', 'none');

include_once THEME_INCLUDES . '/Barnelli_Mobile_Detect.php';
$detect = new Barnelli_Mobile_Detect();
$mobileSidebar = YSettings::g('disable_mobile_sidebars', '0');
$disableMobileSidebar = (($detect->isMobile() == 1) && ($mobileSidebar == '1'));
?>

<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper padding-wrapper" id="main-content">
	
	<div class="container">

		<div class="row">
			<?php if (( $sidebarPostition == 'right' ) && ($disableMobileSidebar == false)) : ?>
			<div class="col-md-9">
				<?php
				if (!is_search()) {
					wc_get_template_part('content', 'shop3');
				} else {
					wc_get_template_part('content', 'results');
				}
				?>
			</div>
			<div class="col-md-3 widget-sidebar">
				<?php dynamic_sidebar( 'woocommerce' ); ?>
			</div>
			<?php elseif (( $sidebarPostition == 'left' ) && ($disableMobileSidebar == false)) : ?>
			<div class="col-md-3 widget-sidebar">
				<?php dynamic_sidebar( 'woocommerce' ); ?>
			</div>
			<div class="col-md-9">
				<?php
				if (!is_search()) {
					wc_get_template_part('content', 'shop3');
				} else {
					wc_get_template_part('content', 'results');
				}
				?>
			</div>
			<?php else: ?>
			<div class="col-md-12">
				<?php
				if (!is_search()) {
					wc_get_template_part('content', 'shop3');
				} else {
					wc_get_template_part('content', 'results');
				}
				?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php
$chalkboardImage = YSettings::g('woo_shop_background', '');
$backgroundColor = YSettings::g('woo_shop_background_color', '#ffffff');
?>
<div id="restaurant-bg" style="background: <?php echo $backgroundColor; ?> url('<?php echo $chalkboardImage; ?>') center center; display: block !important;"></div>
</div>
<?php get_footer('shop'); ?>