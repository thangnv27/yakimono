<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
		<?php
		if (YSettings::g('barnelli_seo_enabled', 'no')):
		?>
		<meta name="description" content="<?php echo YSettings::g('barnelli_seo_description', ''); ?>">
		<meta name="keywords" content="<?php echo YSettings::g('barnelli_seo_keywords', ''); ?>">
		<?php else: ?>
		<meta name="description" content="<?php echo get_bloginfo('description'); ?>">
		<?php endif;?>
		<meta name="msapplication-tap-highlight" content="no" />
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
		<?php barnelli_favicon(); ?>
		<?php wp_head(); ?>
		<?php barnelli_menu_styles(); ?>
	</head>
	<body <?php body_class(array('woocommerce', barnelli_top_bar())); ?>>

		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<?php
		if ( (YSettings::g('theme_menu_searchbar', '0') == '1') || (YSettings::g('theme_enable_top_bar_languages', '0') == '1') ) {
			include_once THEME_INCLUDES . '/top-bar.php';
		}
		?>
		<div class="container full-bg visible-xs sm-navbar">
			<nav>
				<div class="row">
					<div class="navbar-inner">
						<ul class="main-menu nav">
							<li>
								<header class="small-logo">
									<a id="mobile-home" href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo(); ?>">
									<?php if ( YSettings::g( 'logo_image' ) ) : ?>
										<img src="<?php echo YSettings::g( 'logo_image' ); ?>" alt="<?php bloginfo('name') ?>" />
									<?php endif; ?>
									</a>
								</header>
							</li>
							<li class="reorder">
								<a href="#" title="" class="exclude" data-djax-exclude="true"><i class="fa fa-bars"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div id="mobile-nav" class="visible-xs">
			<div id="flyout-container">
			<?php
			// mobile menu
			if ( has_nav_menu( 'secondary' ) ) {
				wp_nav_menu( array(
					'container' => '', 
					'menu_class' => 'nav flyout-menu',
					'depth' => 3,
					'theme_location' => 'secondary', 
					'walker' => new barnelli_mobile_walker())
				);
			} else {
				echo "<strong>Assign menu in Appearance -> Menus -> Manage Locations</strong>";
			}
			?>
			</div>
		</div>		
		<div class="navbar hidden-xs">
			<div class="container">
				<div class="row">
					<nav class="col-md-12 clearfix">
						<?php
						$style = YSettings::g('theme_menu_style', 'none');
						$menuStyle = YSettings::g('theme_menu_css_style', 'white');

						if ($style == 'none') {
							$menu_class = 'main-nav '.$menuStyle.'-nav';
						} else if ($style == 'dotted') {
							$menu_class = 'main-nav '.$menuStyle.'-nav dotted-separator';
						} else if ($style == 'single') {
							$menu_class = 'main-nav '.$menuStyle.'-nav single-separator';
						} else {
							$menu_class = 'main-nav '.$menuStyle.'-nav double-separator';
						}

						// Show dynamic cart if woocommerce is active and if enabled in YoPress
						$optional = '<ul class="buttons">';



						if (barnelli_isPluginActive('woocommerce/woocommerce.php')) {
							if (YSettings::g('woocommerce_show_dynamic_cart', '0') == '1') {
								//$dynamicCart = '<li class="menu-item menu-item-type-post_type menu-item-object-page"><div><a class="content-link cart-wrapper" href="#"><span>CART</span><i style="color:#666666 !important;" class="fa fa-circle"></i></a></div></li>';
								//$optional .= '<ul class="sf-menu"></ul>';
							}
						}

						$optional .= '</ul>';

						if (has_nav_menu('primary')) {
							wp_nav_menu(array(
								'container' => '',
								'menu_class' => $menu_class,
								'depth' => 3,
								'theme_location' => 'primary',
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' . $optional,
								'walker' => new barnelli_walker()
								)
							);
						} else {
							echo "<strong>Assign menu in Appearance -> Menus -> Manage Locations</strong>";
						}
						?>
					</nav>
				</div>
			</div>
		</div>



		<div class="loader-container">
			<div>
				<i></i>
			</div>
		</div>
		<div class="scroll-container">
			<div id="frame">
				<div id="content-wrapper">