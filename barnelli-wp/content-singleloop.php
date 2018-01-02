<?php if ( have_posts() ): while( have_posts() ) : the_post(); ?>
				<?php $blog_single_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'colorbox_thumb' );?>
				<?php if ( has_post_thumbnail() ) { ?>
				<figure class="img-blog">
						<?php the_post_thumbnail( 'blog_thumb' ); ?>
				</figure>
				<?php } ?>
				<header id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if (YSettings::g('theme_show_title_on_pages') == '1'): ?>
					<h1><?php the_title(); ?></h1>
					<?php endif; ?>
					<?php if ( (YSettings::g('blog_show_author', '1') == '1') || (YSettings::g('blog_show_date', '1') == '1') ) : ?>
					<div class="data-post">
						<?php if (YSettings::g('blog_show_date', '1') == '1') : ?>
						<span class="date-post"><?php the_time( get_option( 'date_format' ) ); ?></span>
						<?php endif;?>
						<?php if (YSettings::g('blog_show_author', '1') == '1') : ?>
						<span class="author-post"><?php the_author_posts_link(); ?></span>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</header>
				<section class="text-post">
					<?php if (get_post_format() == 'video') : ?>
						<?php
						global $content_width;
						$content = get_the_content();

						if ((strpos($content, 'youtube.com') !== false) || (strpos($content, 'youtu.be') !== false)) {
							$link = barnelli_findLink($content);
							$videoId = barnelli_getYoutubeId($link);
							if ($videoId) {
								echo '<iframe id="ytplayer" type="text/html" width="'.$content_width.'" height="400" src="https://www.youtube.com/embed/'.$videoId.'?autoplay=0&controls=1&showinfo=0" frameborder="0"></iframe>';
							}
							$newContent = str_replace($link, '',  $content);
							echo do_shortcode($newContent);
						} else if (strpos($content, 'vimeo.com') !== false) {
							$link = barnelli_findLink($content);
							$videoId = barnelli_getVimeoId($link);
							if ($videoId) {
								echo '<iframe src="//player.vimeo.com/video/'.$videoId.'" width="'.$content_width.'" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
							}
							$newContent = str_replace($link, '',  $content);
							echo do_shortcode($newContent);
						} else {
							the_content();
						}
						?>
					<?php else : ?>
					<?php the_content(); ?>
					<?php endif; ?>
				</section>
				<?php if($post->post_type == 'post'): ?>
				<?php if ( (YSettings::g('blog_show_cat', '1') == '1') || (YSettings::g('blog_show_tag', '1') == '1') ) : ?>
				<div class="categories">
					<p>
						<?php if (YSettings::g('blog_show_cat', '1') == '1') : ?>
						<span><?php _e('Categories: ', THEME_NAME ); the_category(', '); ?></span>
						<?php endif; ?>
						<?php if (YSettings::g('blog_show_tag', '1') == '1') : ?>
						<?php the_tags(); ?>
						<?php endif;?>
					</p>
				</div>
				<?php endif; ?>
				<?php endif;?>
				<div class="social-media">
					<ul class="social-icon">
						<?php if (YSettings::g('share_on_facebook', '1') == '1') : ?>
						<li>
							<a href="javascript:shareThis('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo urlencode(get_the_title()); ?>')" title=""><i class="fa fa-facebook"></i></a>
						</li>
						<?php endif; ?>
						<?php if( YSettings::g( 'share_on_twitter', '1') == '1' ) : ?>
						<li>
							<a href="javascript:shareThis('http://www.twitter.com/share?url=<?php the_permalink(); ?>')" title=""><i class="fa fa-twitter"></i></a>
						</li>
						<?php endif; ?>
						<?php if( YSettings::g( 'share_on_google_plus', '1') == '1' ) : ?>
						<li>
							<a href="javascript:shareThis('https://plus.google.com/share?url=<?php the_permalink(); ?>')" title=""><i class="fa fa-google-plus"></i></a>
						</li>
						<?php endif; ?>
						<?php if( YSettings::g( 'share_on_pinterest', '1') == '1' ) : ?>
						<li>
							<a href="javascript:shareThis('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>')" title=""><i class="fa fa-pinterest"></i></a>
						</li>
						<?php endif; ?>
						<?php if( YSettings::g( 'share_on_linkedin', '1') == '1' ) : ?>
						<li>
							<a href="javascript:shareThis('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>')" title=""><i class="fa fa-linkedin"></i></a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
				<?php
				if (comments_open()) {
					comments_template();
				}
				?>
			<?php endwhile;
			endif;?>