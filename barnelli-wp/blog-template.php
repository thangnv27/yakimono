<?php
/*
Template Name: Blog
*/
?>
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
			$sidebarPostition = esc_html(get_post_meta($post->ID, 'sidebar_position', true));
			$sidebarPostition = ($sidebarPostition == "" || $sidebarPostition == 'global') ? YSettings::g( 'theme_page_sidebar_position', 'left' ) : $sidebarPostition;
			include_once THEME_INCLUDES . '/Barnelli_Mobile_Detect.php';
			$detect = new Barnelli_Mobile_Detect();
			$mobileSidebar = YSettings::g('disable_mobile_sidebars', '0');
			$disableMobileSidebar = (($detect->isMobile() == 1) && ($mobileSidebar == '1'));

			$pageSidebar = esc_html(get_post_meta($post->ID, 'sidebar_object', true));

			if (!isset($pageSidebar)) {
				$pageSidebar = 'sidebar';
			}

			?>
			<?php if (( $sidebarPostition == 'right' ) && ($disableMobileSidebar == false)) : ?>
				<div class="col-md-8">
					<?php the_content(); ?>
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
				<div class="col-md-offset-1 col-md-3 widget-sidebar">
					<?php dynamic_sidebar($pageSidebar); ?>
				</div>
			<?php elseif (( $sidebarPostition == 'left' ) && ($disableMobileSidebar == false)) : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar($pageSidebar); ?>
				</div>
				<div class="col-md-offset-1 col-md-8">
					<?php the_content(); ?>
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php else : ?>
				<div class="col-md-offset-2 col-md-8">
					<?php the_content(); ?>
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php get_template_part('content', 'pagefooter'); ?>
</div>
<?php get_footer(); ?>