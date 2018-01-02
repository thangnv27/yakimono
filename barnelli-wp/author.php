<?php get_header(); ?>
<div class="dynamic-content container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
		<div class="row">
			<div class="<?php if (YSettings::g( 'theme_sidebar_position') == 'none' ) { echo 'col-md-10 col-md-offset-1'; } else { echo 'col-md-12';} ?>">
				<header class="search-header">
					<?php
						 $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
					?>
					<h1><?php _e('Posts by:', THEME_NAME); echo ' '.$curauth->nickname; ?></h1>
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
					<?php dynamic_sidebar('sidebar'); ?>
				</div>
			<?php if ( ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'left' ) && ($disableMobileSidebar == false) )  : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
				<div class="col-md-offset-1 col-md-8">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php else : ?>
				<div class="col-md-offset-2 col-md-8">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if (YSettings::g('theme_footer_archive', '0') == '1'): ?>
	<?php get_template_part('content', 'footer'); ?>
	<?php endif;?>
</div>
<?php get_footer(); ?>