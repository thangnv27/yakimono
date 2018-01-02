<?php get_template_part( 'content', 'static' ); ?>

<div class="fullscreen-slider">
	<?php if (YSettings::g('slider_type', 'barnelli') == 'barnelli') : ?>
	<div class="loading-container"><div class="pulse"></div></div>
	<div id="slides" class="slides">
		<ul class="slides-container">
			<?php
				global $post;

				$args = array(
					'posts_per_page'   => YSettings::g('slider_post_count', 3),
					'offset'           => 0,
					'category'         => '',
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'include'          => '',
					'exclude'          => '',
					'meta_key'         => '',
					'meta_value'       => '',
					'post_type'        => 'slider',
					'post_mime_type'   => '',
					'post_parent'      => '',
					'post_status'      => 'publish'
				);

				query_posts($args);
				if (have_posts()) {
				$i = 0;
				while ( have_posts() ) : the_post(); 
					$slider_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slide_thumb');
					$slideLink = esc_html(get_post_meta($post->ID, 'link', true));
					//$slideVideo = esc_html(get_post_meta($post->ID, 'video', true));
					//$videoDuration = esc_html(get_post_meta($post->ID, 'video_duration', true));
					?>
					<li>
						<?php if ($slideLink != '') : ?><a href="<?php echo $slideLink; ?>"><?php endif;?>
						<img class="bgfoto" src="<?php echo $slider_img[0]; ?>" alt=""/>
						<?php if ($slideLink != '') : ?></a><?php endif;?>
					</li>
				<?php $i++;?>
				<?php endwhile; 
				wp_reset_query();
				} else {
					?>
					<li><img class="bgfoto" src="http://placehold.it/2560x1440&amp;text=Add%20Slides%20In%20Admin%20Menu"/></li>
					<li><img class="bgfoto" src="http://placehold.it/2560x1440/000000&amp;text=Add%20Slides%20In%20Admin%20Menu"/></li>
					<?php
				}
				?>
		</ul>
	</div>
	<?php else: ?>
	<?php echo do_shortcode(YSettings::g('revolution_slider', '')); ?>
	<?php endif; ?>
	<script>
	//Slider vars
	var slideDuration = <?php echo ((int)YSettings::g('slider_duration', 5)); ?>;
	var slidePauseOnHover = <?php echo (YSettings::g('slider_pause', '1') == '1') ? 'true' : 'false'; ?>;
	var slideVideoRepeat = <?php echo (YSettings::g('slider_video_repeat', '1') == '1') ? 'true' : 'false'; ?>;
	var slideVideoMute = <?php echo (YSettings::g('slider_video_mute', '1') == '1') ? 'true' : 'false'; ?>;
	var animationSpeed = <?php echo ((int)YSettings::g('slider_transition_duration', 2)); ?>;
	var numberOfSlides = <?php echo ((int)YSettings::g('slider_post_count', 3)); ?>;
	var animationType = '<?php echo YSettings::g('slider_animation_type', 'fadeTransition'); ?>';
	var animationEasing = '<?php echo YSettings::g('slider_animation_easing', 'linear'); ?>';
	</script>
</div>