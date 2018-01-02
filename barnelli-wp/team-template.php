<?php
/*
Template Name: Team
*/

get_header();

global $post;

if (is_page() && $post->post_parent) {
	$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));
} else {
	$wrapperClass = str_replace(" ", "-", get_the_title());
}

$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);
?>
<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper container" id="main-content">
	<div id="team" class="padding-wrapper">
		
		<?php the_post(); the_content(); ?>
		
		<div class="row">
			<?php
			$args = array('post_type' => 'team', 'posts_per_page' => -1, 'order'=> 'ASC', 'orderby'=>'date');
			$loopTeam = new WP_Query( $args );
			$i = 1;
			$j = 1;

			$numberOfColumns = YSettings::g('barnelli_team_number_of_columns', 4);

			if ($numberOfColumns == 6) {
				$columnClass = 'col-md-2';
			} else if ($numberOfColumns == 3) {
				$columnClass = 'col-md-4';
			} else if ($numberOfColumns == 4) {
				$columnClass = 'col-md-3';
			} else {
				$columnClass = 'col-md-2';
			}

			if ($loopTeam->have_posts()):
				while ($loopTeam->have_posts()):
					$loopTeam->the_post();
					$colOffset = '';

					if (($i == 1)) {
						if ((12 % $numberOfColumns) != 0) {
							$colOffset = 'col-md-offset-1';
						} else {
							$colOffset = '';	
						}
					} else {
						$colOffset = '';
					}
			?>
			<div class="col-xs-6 col-sm-6 <?php echo $columnClass; ?> team <?php echo $colOffset; ?>">
				<div class="photo-person">
					<figure>
						<?php $team_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'team_thumb' ); ?>
						<img class="base-photo" src="<?php echo $team_img[0]; ?>" alt="" />
						<img class="color-photo" src="<?php echo $team_img[0]; ?>" alt="" />
					</figure>
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
						<?php if( get_post_meta( get_the_ID(), 'instagram', true ) !== '' ): ?>
						<li>
							<a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'instagram', true ) ); ?>"><i class="fa fa-instagram"></i></a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<?php if (($i % $numberOfColumns) == 0) : ?>
			<div class="clearfix"></div>
			<?php endif; ?>
			<?php $i++; $j++; if ($j == $numberOfColumns+1) { $j = 1; } endwhile;
			endif; 
			wp_reset_query();
			?>
		</div>
	</div>
	<?php get_template_part('content', 'footer'); ?>
</div>
<?php get_footer(); ?>