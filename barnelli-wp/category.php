<?php get_header();?>
<div class="dynamic-content container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
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
			<?php elseif ( ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'left' ) && ($disableMobileSidebar == false) )  : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
				<div class="col-md-offset-1 col-md-8">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php else : ?>
				<div class="col-md-offset-1 col-md-10">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
	$term_meta = get_option("taxonomy_$cat");
	$customCategoryFooter = esc_attr( $term_meta['custom_category_footer']);

	if ($customCategoryFooter != '0') {
		get_template_part('content', 'footer');
	}
	?>
</div>
<?php get_footer(); ?>