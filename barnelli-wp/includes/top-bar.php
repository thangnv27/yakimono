<?php

$searchBarEnabled = (YSettings::g('theme_menu_searchbar', '0') == '1') ? true : false;
$wpmlEnabled = function_exists('icl_get_languages') && (YSettings::g('theme_enable_top_bar_languages', '0') == '1'); 

$navMenuFont = urlencode(YSettings::g('top_nav_menu_font', 'Open Sans'));
$navMenuFontSize = YSettings::g('top_nav_menu_font_size', 16);
$navMenuFontColor = YSettings::g('top_nav_menu_font_color', '#333333');
$navMenuFontHoverColor = YSettings::g('top_nav_menu_font_hover_color', '#cccccc');

$backgroundColor = barnelli_hexToRGB(YSettings::g('top_navbar_backgroud_color', '#ffffff'));
$backgroundColorOpacity = (int)YSettings::g('top_navbar_backgroud_color_opacity', '95');
	if ($backgroundColorOpacity < 100) {
		$backgroundRGBA = 'rgba('.$backgroundColor.',.'.$backgroundColorOpacity.') !important;';
	} else {
		$backgroundRGBA = 'rgba('.$backgroundColor.','.$backgroundColorOpacity.') !important;';
	}
if ($wpmlEnabled) {

$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
} else {
	$languages = array();
} // wpmlEnabled
?>

<style>
#wpmlbar {
	font-family: "<?php echo YSettings::g('top_nav_menu_font', 'Open Sans'); ?>", Helvetica, Arial, sans-serif !important;
	font-size: <?php echo $navMenuFontSize; ?>px !important;
	color: <?php echo $navMenuFontColor; ?>;
	background-color: <?php echo $backgroundRGBA;?>
}

.languages-top ul li a:hover span {
  color: <?php echo $navMenuFontHoverColor; ?>;
}
.languages-top ul li a span {
  color: <?php echo $navMenuFontColor; ?>;
}
</style>
<?php

?>

<?php if ($wpmlEnabled || $searchBarEnabled): ?>

<div id="wpmlbar" class="languages-top">
	<ul style="overflow: auto; white-space: nowrap">
	<?php
	if (YSettings::g('theme_enable_top_bar_languages', '0')) {
		if (count($languages) > 1) {
			foreach ($languages as $key => $lang) {
				if ($lang['language_code'] == ICL_LANGUAGE_CODE) {
					$class = "active";
				} else {
					$class = "";
				}
				echo '<li><a class="'.$class.'" href="'.$lang['url'].'" title="'.$lang['native_name'].'"><span>'.strtoupper($lang['language_code']).'</span></a></li>';
			}
		}
	}
	?>

	<?php if ($searchBarEnabled): ?>
		<li><div class="align-helper" style=""></div></li>
		<li>
		<div id="search-outer">
			<div id="search">
				 <div id="search-box">
					<div class="col-md-12">
						<form action="?" method="GET">
							<input type="text" name="s" id="s" style="background: transparent; border: 1px solid #ddd; font-size: 12px; width: 120px;" placeholder="<?php _e('Search for...', THEME_NAME); ?>" />
						</form>
					</div>
				 </div>
			</div>
		</div>
	</li>
	<?php endif; ?>
	</ul>
</div>
<?php endif; ?>