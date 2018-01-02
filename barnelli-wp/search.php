<?php get_header(); ?>
<div class="dynamic-content container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
		<div class="row">

			<div class="<?php if (YSettings::g( 'theme_sidebar_position', 'left') == 'none' ) { echo 'col-md-8 col-md-offset-2'; } else { echo 'col-md-12';} ?>">
				<header class="search-header">
					<?php
					/* Search Count */
					$allsearch = new WP_Query("s=$s&showposts=-1");
					$key = esc_html($s, 1);
					$count = $allsearch->post_count;
					wp_reset_query();?>
					<h1><?php _t( 'Search results for: ' ); echo $key;?></h1>
					<p><?php _t( 'We\'ve found ' ); echo $count.' '; _t( 'posts' ); ?></p>
				</header>
			</div>
		</div>
		<div class="row">
			<?php if ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'right' ) : ?>
				<div class="col-md-8 search-page">
					<?php get_template_part('content', 'searchloop'); ?>
				</div>
				<div class="col-md-offset-1 col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
			<?php elseif ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'left' ) : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
				<div class="col-md-offset-1 col-md-8 search-page">
					<?php get_template_part('content', 'searchloop'); ?>
				</div>
			<?php else : ?>
				<div class="col-md-offset-2 col-md-8 search-page">
					<?php get_template_part('content', 'searchloop'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php get_template_part('content', 'footer'); ?>
</div>
<?php get_footer(); ?>