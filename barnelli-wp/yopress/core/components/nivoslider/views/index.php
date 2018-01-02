<section id="slider">
	<div class="container">
		<div class="slider-wrapper theme-default">
			<div id="nivoslider" class="nivoSlider">
			<?php
			foreach ($postsData as $post) {
				?>
				<a href="<?php echo $post['permalink']; ?>">
					<img src="<?php echo $post['img_src']; ?>" title="#caption<?php echo $post['post_id']; ?>"/>
				</a>
			<?php
			}
			?>
			</div>
			<?php
			foreach ($postsData as $post) {
				?>
			<div id="caption<?php echo $post['post_id']; ?>" class="nivo-html-caption">
				<div>
					<hgroup class="fancy-headers">
						<h1><?php //echo $post['firstline']; ?></h1>
						<h2><?php //echo $post['secondline']; ?></h2>
					</hgroup>
					<p><?php //echo $post['the_excerpt']; ?></p>
				</div>
			</div>
			<?php
			}
		?>
		</div>
	</div>
</section>
