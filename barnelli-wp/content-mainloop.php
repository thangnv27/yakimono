<?php
global $content_width;
global $post;

$blogCategory = YSettings::g('blog_category', 'all');

$tagVar = get_query_var('tag');
$catVar = get_query_var('cat');

if (!empty($tagVar)) {
	$args = array('tag'=>$tagVar);
	query_posts($args);
} else if (!empty($catVar)) {
	$args = array('cat'=>$catVar);
	query_posts($args);
} else {
	if (!strstr($blogCategory, "all")) {
		$args = array('cat'=>$blogCategory);
		query_posts($args);
	} else {
		$args = array('showposts'=>'-1');
		query_posts($args);
	}
}

if (have_posts()):
	while (have_posts()):
		the_post();
		?>		
		<section class="blog-post">
				<?php if (get_post_format() == 'video') : ?>
					<?php
					// check if there is youtbe or vimeo url i content
					$content = get_the_content();

					if ((strpos($content, 'youtube.com') !== false) || (strpos($content, 'youtu.be') !== false)) {
						$link = barnelli_findLink($content);
						$videoId = barnelli_getYoutubeId($link);

						if ($videoId) {
							echo '<iframe id="ytplayer" type="text/html" width="'.$content_width.'" height="400" src="https://www.youtube.com/embed/'.$videoId.'?autoplay=0&controls=1&showinfo=0" frameborder="0"></iframe>';
						}

					} else if (strpos($content, 'vimeo.com') !== false) {
						$link = barnelli_findLink($content);
						$videoId = barnelli_getVimeoId($link);

						if ($videoId) {
							echo '<iframe src="//player.vimeo.com/video/'.$videoId.'" width="'.$content_width.'" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
						}

					}
					?>
				<?php else : ?>
					<?php if (has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" class="img-blog hover-post" title="<?php the_title_attribute(); ?>">
							<figure><?php the_post_thumbnail( 'blog_thumb' ); ?></figure>
						</a>
					<?php endif; ?>
				<?php endif; ?>
			<header>
				<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php if ( (YSettings::g('blog_show_author', '1') == '1') || (YSettings::g('blog_show_date', '1') == '1') ) : ?>
				<div class="data-post">
					<?php if (YSettings::g('blog_show_date', '1') == '1') : ?>
					<span class="date-post"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<?php endif; ?>
					<?php if (YSettings::g('blog_show_author', '1') == '1') : ?>
					<span class="author-post"><?php the_author_posts_link(); ?></span>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</header>
			<?php if (get_post_format() != 'video') : ?>
			<article class="text-post">
				<p>
					<?php the_excerpt(); ?>
					<?php if (YSettings::g('blog_show_readmore', '0') == '1'): ?>
					<a href="<?php the_permalink(); ?>"><?php echo YSettings::g('blog_show_readmore_label', 'Read More...'); ?></a>
					<?php endif; ?>
				</p>
			</article>
			<?php endif; ?>
			<?php if ($post->post_type == 'post'): ?>
			<?php if ( (YSettings::g('blog_show_cat', '1') == '1') || (YSettings::g('blog_show_tag', '1') == '1') ) : ?>
			<div class="categories">
				<p>
					<?php if (YSettings::g('blog_show_cat', '1') == '1') : ?>
					<span><?php _e('Categories: ', THEME_NAME); the_category(', '); ?></span>
					<?php endif; ?>
					<?php if (YSettings::g('blog_show_tag', '1') == '1') : ?>
					<?php the_tags(); ?>
					<?php endif;?>
				</p>
			</div>
			<?php endif; ?>
			<?php endif; ?>
		</section>
	<?php
	endwhile;
	else: ?>
	<h3 class="noposts"><?php _e('Sorry, no posts matched your criteria.', THEME_NAME); ?></h3>
<?php endif; ?>
<div class="pagination">
	<?php
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	if (get_option('permalink_structure') === '') {
		$format = '&paged=%#%';
	} else {
		$format = 'paged/%#%/';
	}

	$paginate = paginate_links(array(
		'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
		'format' => $format,
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'type' => 'plain',
		'prev_text' => __('&laquo; Previous Page', THEME_NAME),
		'next_text' => __('Next Page &raquo;', THEME_NAME),
	));

	echo $paginate;
	wp_link_pages();
	?>
</div>