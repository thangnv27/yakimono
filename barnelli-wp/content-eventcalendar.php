<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<section class="eventcalendar-post">
			<header class="eventcalendar-header">
				<div class="social">
					<?php if (YSettings::g('share_on_facebook', '1') == '1') : ?>
						<a href="javascript:shareThis('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>')" target="_blank" title=""><i class="fa fa-facebook"></i></a>
					<?php endif; ?>
					<?php if (YSettings::g('share_on_twitter', '1') == '1'): ?>
						<a href="javascript:shareThis('http://www.twitter.com/share?url=<?php the_permalink(); ?>')" target="_blank" title=""><i class="fa fa-twitter"></i></a>
					<?php endif; ?>
					<?php if (YSettings::g('share_on_google_plus', '1') == '1') : ?>
						<a href="javascript:shareThis('https://plus.google.com/share?url=<?php the_permalink(); ?>')" target="_blank" title=""><i class="fa fa-google-plus"></i></a>
					<?php endif; ?>
					<?php if( YSettings::g( 'share_on_pinterest', '1') == '1' ) : ?>
						<a href="javascript:shareThis('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>')" target="_blank" title=""><i class="fa fa-pinterest"></i></a>
					<?php endif; ?>
					<?php if( YSettings::g( 'share_on_linkedin', '1') == '1' ) : ?>
						<a href="javascript:shareThis('http://www.linkedin.com/sharer.php?u=<?php the_permalink(); ?>')" target="_blank" title=""><i class="fa fa-linkedin"></i></a>
					<?php endif; ?>
				</div>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php
				$custom = get_post_custom();

				if ($custom['event_start_date'][0] == $custom['event_end_date'][0] || $custom['event_end_date'][0] == '') {
					$startDate = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $custom['event_start_date'][0]))));
					$date = $startDate;
				} elseif ($custom['event_end_date'][0] != '') {
					$startDate = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $custom['event_start_date'][0]))));
					$endDate = mysql2date(get_option('date_format'), date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $custom['event_end_date'][0]))));
					$date = $startDate . ' - ' . $endDate;
				}

				$content = '';
				$content .= '<h2>' . $date . ' <strong>' . $custom['event_start_time'][0] . '</strong></h2>';
				echo $content;
				?>
				<?php echo '<h3><strong>' . $custom['event_venue'][0] . '</strong> ' . $custom['event_location'][0] . '</h3>'; ?>
				<?php

				if ($custom['event_price'][0] != '') {
					echo '<h4>' . $custom['event_price'][0] . '</h4>';
				}

				if (($custom['event_external_link_label'][0] != '') || ($custom['event_payment_link_label'][0] != '')) {
					$content = '';
					$content .= '<div class="btn-row">';

					if ($custom['event_external_link_label'][0] != '') {
						$content .= '<a href="' . $custom['event_external_link'][0] . '" class="btn">' . $custom['event_external_link_label'][0] . '</a>';
					}

					if ($custom['event_payment_link_label'][0] != '') {
						$content .= '<a href="' . $custom['event_payment_link'][0] . '" class="btn">' . $custom['event_payment_link_label'][0] . '</a>';
					}

					$content .= '</div>';
					echo $content;
				}
				?>
			</header>
			<article class="text-post">
				<?php if (get_post_format() == 'video') : ?>
					<?php
					global $content_width;
					$content = get_the_content();

					if ((strpos($content, 'youtube.com') !== false) || (strpos($content, 'youtu.be') !== false)) {
						$link = barnelli_findLink($content);
						$videoId = barnelli_getYoutubeId($link);
						if ($videoId) {
							echo '<iframe id="ytplayer" type="text/html" width="' . $content_width . '" height="400" src="https://www.youtube.com/embed/' . $videoId . '?autoplay=' . YSettings::g('video_auto_play', '1') . '&controls=' . YSettings::g('video_show_controls', '1') . '&showinfo=0" frameborder="0"></iframe>';
						}
						$newContent = str_replace($link, '', $content);
						echo do_shortcode($newContent);
					} else if (strpos($content, 'vimeo.com') !== false) {
						$link = barnelli_findLink($content);
						$videoId = barnelli_getVimeoId($link);
						if ($videoId) {
							echo '<iframe src="//player.vimeo.com/video/' . $videoId . '" width="' . $content_width . '" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
						}
						$newContent = str_replace($link, '', $content);
						echo do_shortcode($newContent);
					}
					?>
				<?php else : ?>
					<?php the_content(); ?>
				<?php endif; ?>
			</article>
		</section>
		<div class="social-media">
			<ul class="social-icon">
				<?php if (YSettings::g('share_on_facebook', '1') == '1') : ?>
					<li>
						<a href="javascript:shareThis('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>')" target="_blank" title=""><i class="fa fa-facebook"></i></a>
					</li>
				<?php endif; ?>
				<?php if (YSettings::g('share_on_twitter', '1') == '1'): ?>
					<li>
						<a href="javascript:shareThis('http://www.twitter.com/share?url=<?php the_permalink(); ?>')" target="_blank" title=""><i class="fa fa-twitter"></i></a>
					</li>
				<?php endif; ?>
				<?php if (YSettings::g('share_on_google_plus', '1') == '1') : ?>
					<li>
						<a href="javascript:shareThis('https://plus.google.com/share?url=<?php the_permalink(); ?>')" target="_blank" title=""><i class="fa fa-google-plus"></i></a>
					</li>
				<?php endif; ?>
				<?php if (YSettings::g( 'share_on_pinterest', '1') == '1') : ?>
					<li>
						<a href="javascript:shareThis('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>')" target="_blank" title=""><i class="fa fa-pinterest"></i></a>
					</li>
				<?php endif; ?>
				<?php if (YSettings::g( 'share_on_linkedin', '1') == '1') : ?>
					<li>
						<a href="javascript:shareThis('http://www.linkedin.com/sharer.php?u=<?php the_permalink(); ?>')" target="_blank" title=""><i class="fa fa-linkedin"></i></a>
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
endif;
?>