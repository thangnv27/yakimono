<?php get_header(); ?>
<div class="dynamic-content container" id="main-content">
	<div id="post" class=" padding-wrapper">
		<div class="row">
			<?php if ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'right' ) : ?>
				<div class="col-md-8">
					<?php get_template_part('content', 'eventcalendar'); ?>
				</div>
				<div class="col-md-offset-1 col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
			<?php elseif ( YSettings::g( 'theme_sidebar_position', 'left' ) == 'left' ) : ?>
				<div class="col-md-3 widget-sidebar">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</div>
				<div class="col-md-offset-1 col-md-8">
					<?php get_template_part('content', 'eventcalendar'); ?>
				</div>
			<?php else : ?>
				<div class="col-md-9 col-md-offset-1 ">
					<?php get_template_part('content', 'eventcalendar'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php get_template_part('content', 'footer'); ?>
</div>
<?php get_footer(); ?>