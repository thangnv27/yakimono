<?php get_header(); ?>
<?php
global $post; 
if (is_page() && $post->post_parent) {
	$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));

} else {
	$wrapperClass = str_replace(" ", "-", get_the_title());
}
$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);
?>
<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
		<div class="row">
			<?php
			include_once THEME_INCLUDES . '/Barnelli_Mobile_Detect.php';
			$detect = new Barnelli_Mobile_Detect();
			$mobileSidebar = YSettings::g('disable_mobile_sidebars', '0');
			$disableMobileSidebar = (($detect->isMobile() == 1) && ($mobileSidebar == '1'));

			$sidebarPostition = esc_html(get_post_meta($post->ID, 'sidebar_position', true));
			$sidebarPostition = (!isset($sidebarPostition) || $sidebarPostition == 'global') ? YSettings::g( 'theme_page_sidebar_position', 'left' ) : $sidebarPostition;

			$pageSidebar = esc_html(get_post_meta($post->ID, 'sidebar_object', true));
			if (!isset($pageSidebar)) {
				$pageSidebar = 'sidebar';
			}
			?>
			<?php if (($sidebarPostition == 'right') && ($disableMobileSidebar == false)) : ?>
				<div class="col-md-8">
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<?php if (YSettings::g('theme_show_title_on_pages') == '1'): ?>
					<h1><?php the_title(); ?></h1>
					<?php endif; ?>
					<?php the_content(); ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="col-md-offset-1 col-md-3 widget-sidebar">
					<?php dynamic_sidebar($pageSidebar); ?>
				</div>
			<?php elseif (($sidebarPostition == 'left') && ($disableMobileSidebar == false)) : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar($pageSidebar); ?>
				</div>
				<div class="col-md-offset-1 col-md-8">
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<?php if (YSettings::g('theme_show_title_on_pages') == '1'): ?>
					<h1><?php the_title(); ?></h1>
					<?php endif; ?>
					<?php the_content(); ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			<?php else : ?>
				<?php if (!barnelli_isPluginActive('woocommerce/woocommerce.php')): ?>
				<div class="col-md-8 col-md-offset-2">
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<?php if (YSettings::g('theme_show_title_on_pages') == '1'): ?>
					<h1><?php the_title(); ?></h1>
					<?php endif; ?>
					<?php the_content(); ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<?php else: ?>
				<div class="col-md-12">
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<?php if (YSettings::g('theme_show_title_on_pages') == '1'): ?>
					<h1><?php the_title(); ?></h1>
					<?php endif; ?>
					<?php the_content(); ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			<?php endif; ?>
			
		</div>
	</div>
	<?php get_template_part('content', 'pagefooter'); ?>
</div>
<?php get_footer(); ?>