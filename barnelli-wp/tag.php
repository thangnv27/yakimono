<?php get_header(); ?>
<div class="dynamic-content container" id="main-content">
	<div id="blog" class="blog padding-wrapper">
		<div class="row">
			<div class="<?php if (YSettings::g( 'theme_sidebar_position', 'left') == 'none' ) { echo 'col-md-8 col-md-offset-2'; } else { echo 'col-md-12';} ?>">
				<header class="search-header">
					<h1><?php _t('You\'re viewing', THEME_NAME); ?></h1>
					<p>
					<span><?php _t('Blog Tags', THEME_NAME);?></span>
				</p>
				</header>
			</div>
		</div>
		<div class="row">
			<?php if ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'right' ) : ?>
				<div class="col-md-8">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
				<div class="col-md-offset-1 col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
			<?php elseif ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'left' ) : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
				<div class="col-md-offset-1 col-md-8">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php else : ?>
				<div class="col-md-offset-2 col-md-8">
					<?php get_template_part('content', 'mainloop'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if (YSettings::g('theme_footer_archive', '0') == '1'): ?>
	<?php get_template_part('content', 'footer'); ?>
	<?php endif;?>
</div>
<?php get_footer(); ?>