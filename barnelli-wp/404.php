<?php get_header(); ?>
<div class="dynamic-content container" id="main-content">
	<div id="blog" class="padding-wrapper">
		<div class="row page-not-found">
			<div class="col-md-12">
				<header>
					<h1>404 - <?php wp_title('', true);?></h1>
				</header>
				<div class="exclamation-mark">
					<i class="fa fa-exclamation-triangle fa-5x"></i>
				</div>
				<p><?php _t('Sorry, but the page you requested has not been found', THEME_NAME); ?></p>
			</div>
		</div>
	</div>
	<?php if (YSettings::g('theme_footer_archive', '0') == '1'): ?>
	<?php get_template_part('content', 'footer'); ?>
	<?php endif;?>
</div>
<?php get_footer();?>