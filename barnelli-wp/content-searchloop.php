<?php
if ( have_posts() ): 
	while( have_posts() ):
		the_post();
		?>				
		<section class="blog-post">
			<a href="<?php the_permalink(); ?>" class="img-blog hover-post" title="<?php the_title_attribute(); ?>">
				<figure>
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'blog_thumb' );
					} ?>
				</figure>
			</a>
			<header>
				<?php
					$title = get_the_title();
					$keys = explode( " ", $s );
					$title = preg_replace( '/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title );
				?>
				<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo $title; ?></a></h1>
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
			<article class="text-post">
				<?php
					$searchcontent = get_the_excerpt();
					$keys = explode( " ", $s );
					$searchcontent = preg_replace( '/(\ '.implode( '|\ ', $keys ) .')/iu', ' <span class="search-excerpt">\0</span>', $searchcontent );
				?>
				<p>
					<?php echo $searchcontent; ?>
					<?php if (YSettings::g('blog_show_readmore', '0') == '1'): ?>
					<a href="<?php the_permalink(); ?>"><?php echo YSettings::g('blog_show_readmore_label', 'Read More...'); ?></a>
					<?php endif; ?>
				</p>
			</article>
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
		</section>
	<?php
	endwhile;
	else: ?>
	<h3 class="noposts"><?php _t('Sorry, no posts matched your criteria.', THEME_NAME); ?></h3>
	<?php get_search_form(); ?>
<?php endif; ?>
<div class="pagination">
		<?php
		global $wp_query;

		$big = 999999999;
		if ( get_option('permalink_structure') === '' ) {
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
		// $paginate = str_replace("<span class='page-numbers current'>", "<a title='' class='current'>", $paginate);
		// $paginate = str_replace('</span>', '</a>', $paginate);

		echo $paginate;
		?>
	</div>