		</div>
	</div>
</div>

<?php
$menus = YSettings::g('dynamic_menu_list', 'foodmenu[:space:]Food Menu');
$tmpMenus = explode('[:split:]', $menus);
$defaultImage = THEME_DIR_URI . '/img/chalkboard-loop.jpg';

foreach ($tmpMenus as $key=>$cfm) {
	$m = explode('[:space:]', $cfm);
	if ($m[0] != ''):
		$bgImg = 'dynamic_'.$m[0].'_bg_image';
		$bgColor = 'dynamic_'.$m[0].'_bg_color';
	?>
	<div class="menu-bg <?php echo $m[0];?>-bg" id="menu-bg-<?php echo $m[0];?>" style="background: <?php echo YSettings::g($bgColor, '#000000');?> url('<?php echo YSettings::g($bgImg, '');?>')"></div>
	<?php
	endif;
}
?>
<?php if (YSettings::g('bg_restaurant_img')): ?>
<div id="restaurant-bg" style="background: <?php echo YSettings::g('bg_restaurant_color', '#666666'); ?> url('<?php echo YSettings::g('bg_restaurant_img', ''); ?>')"></div>
<?php else: ?>
<div id="restaurant-bg" style="background-color: <?php echo YSettings::g('bg_restaurant_color', '#666666'); ?> !important;"></div>
<?php endif; ?>
	<?php
	if (YSettings::g('theme_google_analytics')) {
		echo YSettings::g('theme_google_analytics');
	}
	?>
	<?php wp_footer(); ?>
	</body>
</html>