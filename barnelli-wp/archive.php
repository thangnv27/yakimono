<?php get_header(); ?>
<?php barnelli_setContentWidth(); ?>
<div class="dynamic-content container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
		<div class="row">
			<div class="<?php if (YSettings::g( 'theme_sidebar_position') == 'none' ) { echo 'col-md-12'; } else { echo 'col-md-12';} ?>">
				<header class="search-header">
					<h1><?php _t('You\'re viewing', THEME_NAME); ?></h1>
					<p>
					<span><?php
						if (is_day()) :
							printf(__t('Daily Archives: %s', THEME_NAME), '<span>' . get_the_date() . '</span>');
						elseif (is_month()) :
							printf(__t('Monthly Archives: %s', THEME_NAME), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', THEME_NAME)) . '</span>');
						elseif (is_year()) :
							printf(__t('Yearly Archives: %s', THEME_NAME), '<span>' . get_the_date(_x('Y', 'yearly archives date format', THEME_NAME)) . '</span>');
						else :
							_t('Blog Archives', THEME_NAME);
						endif;
					?></span>
				</p>
				</header>
			</div>
		</div>
		<div class="row">
			<?php
			include_once THEME_INCLUDES . '/Barnelli_Mobile_Detect.php';
			$detect = new Barnelli_Mobile_Detect();
			$mobileSidebar = YSettings::g('disable_mobile_sidebars', '0');
			$disableMobileSidebar = (($detect->isMobile() == 1) && ($mobileSidebar == '1'));
			?>
			<?php if ( ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'right' ) && ($disableMobileSidebar == false) )  : ?>
				<div class="col-md-8">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
				<div class="col-md-offset-1 col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
			<?php elseif ( ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'left' ) && ($disableMobileSidebar == false) ) : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
				<div class="col-md-offset-1 col-md-8">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php else : ?>
				<div class="col-md-10 col-md-offset-1">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if (YSettings::g('theme_footer_archive', '0') == '1'): ?>
	<?php get_template_part('content', 'footer'); ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>