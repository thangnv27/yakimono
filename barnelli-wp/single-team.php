<?php get_header(); ?>
<div class="dynamic-content Team-wrapper container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
		<div class="row">
			<?php
			global $post;
			if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="photo-person">
				<a href="<?php echo get_permalink(get_the_ID()); ?>">
					<figure>
						<?php $team_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'gallery_thumb' ); ?>
						<img class="color-photo" src="<?php echo $team_img[0]; ?>" alt="" />
					</figure>
				</a>
			</div>

			<div class="name">
				<strong><?php echo get_post_meta( get_the_ID(), 'name', true ); ?></strong>
				<span><?php echo get_post_meta( get_the_ID(), 'role', true ); ?></span>
			</div>

			<div class="description">
				<p><?php echo get_post_meta( get_the_ID(), 'description', true ); ?></p>
			</div>

			<div class="social-media">
				<ul>
					<?php if( get_post_meta( get_the_ID(), 'linkedin', true ) !== '' ): ?>
					<li>
						<a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'linkedin', true ) ); ?>"><i class="fa fa-linkedin"></i></a>
					</li>
					<?php endif; ?>
					<?php if( get_post_meta( get_the_ID(), 'facebook', true ) !== '' ): ?>
					<li>
						<a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'facebook', true ) ); ?>"><i class="fa fa-facebook"></i></a>
					</li>
					<?php endif; ?>
					<?php if( get_post_meta( get_the_ID(), 'twitter', true ) !== '' ): ?>
					<li>
						<a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'twitter', true ) ); ?>"><i class="fa fa-twitter"></i></a>
					</li>
					<?php endif; ?>
					<?php if( get_post_meta( get_the_ID(), 'google', true ) !== '' ): ?>
					<li>
						<a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'google', true ) ); ?>"><i class="fa fa-google-plus"></i></a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
			<?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php get_template_part('content', 'footer'); ?>
</div>
<?php get_footer(); ?>