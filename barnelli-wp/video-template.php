<?php
/*
Template Name: Home Video
*/
global $post;
if ( is_page() && $post->post_parent ) {
	$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));
} else {
	$wrapperClass = str_replace(" ", "-", get_the_title());
}
$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);
?>
<?php get_header(); ?>
	<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper" id="main-content">
		<?php get_template_part( 'content', 'video' ); ?>
	</div>
<?php get_footer(); ?>