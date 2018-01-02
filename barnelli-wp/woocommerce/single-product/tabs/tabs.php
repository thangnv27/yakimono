<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     19.0.0
 */
if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($tabs)) :
	?>
	<div class="wc-product-info">

		<?php foreach ($tabs as $key => $tab) : ?>
			<?php if ($tab['callback'] == 'comments_template'): ?>
				<?php if (YSettings::g('woo_disable_reviews', '0') == '0') : ?>
				<div class="wc-product-tab">
					<h5 class="">
						<a data-djax-exclude="true" data-toggle="collapse" data-parent="#accordion" href="#tab-<?php echo $key ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', $tab['title'], $key) ?>
							<i class="fa fa-caret-down pull-right"></i>
						</a>
					</h5>
					<div id="tab-<?php echo $key ?>" class="collapse ">
						<div class="collapse-content">
								<?php call_user_func($tab['callback'], $key, $tab) ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php else: ?>
				<div class="wc-product-tab">
					<h5 class="">
						<a data-djax-exclude="true" data-toggle="collapse" data-parent="#accordion" href="#tab-<?php echo $key ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', $tab['title'], $key) ?>
							<i class="fa fa-caret-down pull-right"></i>
						</a>
					</h5>
					<div id="tab-<?php echo $key ?>" class="collapse ">
						<div class="collapse-content">
								<?php call_user_func($tab['callback'], $key, $tab) ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

		<?php endforeach; ?>

	</div>

<?php endif; ?>
