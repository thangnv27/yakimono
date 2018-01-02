<section id="slider">
	<div class="container">
		<div class="flex-container">
			<div class="flexslider">
				<ul class="slides">

				<?php
				foreach ($postsData as $post) {
					?>
					<li>
						<a href="<?php echo $post['permalink']; ?>">
							<img src="<?php echo $post['img_src']; ?>"/>
						</a>
						<div class="flex-caption">
							<div>
								<hgroup class="fancy-headers">
									<h1><?php echo $post['firstline']; ?></h1>
									<h2><?php echo $post['secondline']; ?></h2>
								</hgroup>
								<p><?php echo esc_attr($post['the_excerpt']); ?></p>
							</div>
						</div>
					</li>
					<?php
				}
				?>
				</ul>
			</div>
		</div>
		<!-- End Flexslider Basic Markup -->
	</div>
</section><!-- /slider -->
