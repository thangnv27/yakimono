<?php get_header(); ?>
<div class="dynamic-content Menu-wrapper container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
		<div class="row">
			<?php
			global $post;
			if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php get_template_part('content', 'footer'); ?>
</div>
<?php get_footer(); ?>