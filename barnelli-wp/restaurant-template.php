<?php
/*
Template Name: Restaurant
*/
?>
<?php
get_header();
global $post;

if ( is_page() && $post->post_parent ) {
	$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));
} else {
	$wrapperClass = str_replace(" ", "-", get_the_title());
}
$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);
?>
<style>
.widget-title {
	color: <?php echo YSettings::g( 'theme_footer_restaurant_header_color', '#ffffff' ); ?> !important;
}
.widget-wrapper, .widget-wrapper form {
	color: <?php echo YSettings::g( 'theme_footer_restaurant_color', '#ffffff' ); ?> !important;
}

#footer #wp-calendar a, .widget-wrapper ul li a, .widget-wrapper input {
	color: <?php echo YSettings::g( 'theme_footer_restaurant_link_color', '#ffffff' ); ?> !important;	
}

#footer #wp-calendar a:hover, .widget-wrapper ul li a:hover, .widget-wrapper input:hover {
	color: <?php echo YSettings::g( 'theme_footer_restaurant_hover_link_color', '#ffffff' ); ?> !important;	
}
</style>
<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper" id="main-content">
	<div class="container">
		<div id="restaurant" class="padding-wrapper">
			<?php
			include_once THEME_INCLUDES . '/helpers.php';

			$i = 0;

			$indexesArray = explode(',', YSettings::g('restaurant_grid_indexes','1390903454876,0,1390903454877,0,0,0,1390903454878,1390903454879,1390903480611,1390903480610,1390903480612,0,'));
			array_pop($indexesArray);

			$gridArray = array();
			$gridArrayTemp = explode('|', YSettings::g('restaurant_grid_array','s2x2,0,s2x1,0,|0,0,s1x1,s1x1,|s1x1,s1x1,s2x1,0,|'));
			array_pop($gridArrayTemp);

			$tempArray = $indexesArray;
			$contentArray = array();

			$x = 0;

			foreach ($gridArrayTemp as $row) {
				$blockArrayTemp = explode(',', $row);
				array_pop($blockArrayTemp);
				$gridArray[] = $blockArrayTemp;
			}

			for ($j=0; $j<=count($gridArray); $j++) {

				if (isset($gridArray[$j])) {	
					$row = $gridArray[$j];
				} else {
					$row = false;
				}

				if (isset($gridArray[$j+1])) {							
					$nextRow = $gridArray[$j+1];
				} else {
					$nextRow = false;
				}
				if (isset($gridArray[$j+2])) {
					$thirdRow = $gridArray[$j+2];
				} else {
					$thirdRow = false;
				}
				if (isset($gridArray[$j+3])) {
					$forthRow = $gridArray[$j+3];
				} else {
					$forthRow = false;
				}
				if (isset($gridArray[$j+4])) {
					$fifthRow = $gridArray[$j+4];
				} else {
					$forthRow = false;
				}

				if ($row) :
				
				if ($row[0] == 's4x2') {
					?><div class="row">
						<div class="col-md-12">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square_big'); ?></div>
						</div>
					</div>
					<?php
					$i+=8;
				}
				// 2x2 2x2
				else if (($row[0] == 's2x2') && ($row[2] == 's2x2')) {
					?><div class="row">
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square_big'); ?></div>
						</div>
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_square_big'); ?></div>
						</div>
					</div>
					<?php
					$i+=8;
				}
				// four 2x2 right ok
				else if (($row[2] == 's2x2') && ($nextRow[0] == 's2x2') && ($thirdRow[2] == 's2x2') && ($forthRow[0] == 's2x2') ) {
					?><div class="row">
						<div class="col-md-6">
							<?php if ($row[0] == 's1x1') : ?>
							<div class="row">
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[0], 'grid_square'); ?></div></div>
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[1], 'grid_square'); ?></div></div>
							</div>
							<?php else : ?>
							<div class="row">
								<div class="col-md-12"><div class="square"><?php echo barnelli_generateBlock($indexesArray[0], 'grid_double'); ?></div></div>
							</div>
							<?php endif; ?>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[4], 'grid_square_big'); ?></div>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[12], 'grid_square_big'); ?></div>
						</div>
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[2], 'grid_square_big'); ?></div>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[10], 'grid_square_big'); ?></div>
							<?php if ($fifthRow[2] == 's1x1') : ?>
							<div class="row">
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[18], 'grid_square'); ?></div></div>
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[19], 'grid_square'); ?></div></div>
							</div>
							<?php else : ?>
							<div class="row">
								<div class="col-md-12"><div class="square"><?php echo barnelli_generateBlock($indexesArray[18], 'grid_double'); ?></div></div>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php
					$j = $j + 6;
					$i+=20;
				}
				// four 2x2 left ok
				else if (($row[0] == 's2x2') && ($nextRow[2] == 's2x2') && ($thirdRow[0] == 's2x2') && ($forthRow[2] == 's2x2') ) {
					?><div class="row">
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[0], 'grid_square_big'); ?></div>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[8], 'grid_square_big'); ?></div>
							<?php if ($fifthRow[0] == 's1x1') : ?>
							<div class="row">
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[16], 'grid_square'); ?></div></div>
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[17], 'grid_square'); ?></div></div>
							</div>
							<?php else : ?>
							<div class="row">
								<div class="col-md-12"><div class="square"><?php echo barnelli_generateBlock($indexesArray[16], 'grid_double'); ?></div></div>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-md-6">
							<?php if ($row[2] == 's1x1') : ?>
							<div class="row">
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[2], 'grid_square'); ?></div></div>
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[3], 'grid_square'); ?></div></div>
							</div>
							<?php else : ?>
							<div class="row">
								<div class="col-md-12"><div class="square"><?php echo barnelli_generateBlock($indexesArray[2], 'grid_double'); ?></div></div>
							</div>
							<?php endif; ?>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[6], 'grid_square_big'); ?></div>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[14], 'grid_square_big'); ?></div>
						</div>
					</div>
					<?php
					$j = $j + 6;
					$i+=20;
				}
				// 2x2 / 2x1 and 2x1/2x2  ok
				else if ((($row[0] == 's2x2') && ($nextRow[2] == 's2x2')) && ($thirdRow[0] != 's2x2')) {
					?><div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square_big'); ?></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<?php if ($thirdRow[0] == 's1x1'): ?>
										<div class="col-md-6">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+8], 'grid_square'); ?></div>
										</div>
										<div class="col-md-6">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+9], 'grid_square'); ?></div>
										</div>
										<?php else : ?>
										<div class="col-md-12">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+8], 'grid_double'); ?></div>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<?php if ($row[2] == 's1x1'): ?>
										<div class="col-md-6">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_square'); ?></div>
										</div>
										<div class="col-md-6">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+3], 'grid_square'); ?></div>
										</div>
										<?php else: ?>
										<div class="col-md-12">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_double'); ?></div>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+6], 'grid_square_big'); ?></div>
								</div>
							</div>
						</div>
					</div>
					<?php
					$i+=12;
					$j = $j + 2;
				}
				// 2x1/2x2 and 2x2 / 2x1
				else if ((($row[2] == 's2x2') && ($nextRow[0] == 's2x2')) && ($thirdRow[2] != 's2x2')) {
					?><div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<?php if ($row[0] == 's1x1'): ?>
										<div class="col-md-6">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square'); ?></div>
										</div>
										<div class="col-md-6">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+1], 'grid_square'); ?></div>
										</div>
										<?php else: ?>
										<div class="col-md-12">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_double'); ?></div>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+4], 'grid_square_big'); ?></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_square_big'); ?></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<?php if ($thirdRow[2] == 's1x1'): ?>
											<div class="col-md-6">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+10], 'grid_square'); ?></div>
										</div>
										<div class="col-md-6">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+11], 'grid_square'); ?></div>
										</div>
										<?php else : ?>
										<div class="col-md-12">
											<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+10], 'grid_double'); ?></div>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					$i+=12;
					$j = $j + 2;
				}
				// 2x2 / 2x2 ok
				else if (($row[0] == 's2x2') && ($thirdRow[0] == 's2x2') && ($nextRow[2] == 's2x2')) {
					?><div class="row">
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square_big'); ?></div>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+8], 'grid_square_big'); ?></div>
						</div>
						<div class="col-md-6">
							<?php if ($row[2] == 's1x1') : ?>
							<div class="row">
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_square'); ?></div></div>
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+3], 'grid_square'); ?></div></div>
							</div>
							<?php else : ?>
							<div class="row">
								<div class="col-md-12"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_double'); ?></div></div>
							</div>
							<?php endif; ?>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+6], 'grid_square_big'); ?></div>
							<?php if ($forthRow[2] == 's1x1') : ?>
							<div class="row">
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+14], 'grid_square'); ?></div></div>
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+15], 'grid_square'); ?></div></div>
							</div>
							<?php else : ?>
							<div class="row">
								<div class="col-md-12"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+14], 'grid_double'); ?></div></div>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php
					$i+=16;
					// Go to third row already
					$j = $j + 2;
				} else if (($row[2] == 's2x2') && ($thirdRow[2] == 's2x2') && ($nextRow[0] == 's2x2')) {
					?>
					<div class="row">
						<div class="col-md-6">
							<?php if ($row[0] == 's1x1') : ?>
							<div class="row">
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square'); ?></div></div>
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+1], 'grid_square'); ?></div></div>
							</div>
							<?php else : ?>
							<div class="row">
								<div class="col-md-12"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_double'); ?></div></div>
							</div>
							<?php endif; ?>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+4], 'grid_square_big'); ?></div>
							<?php if ($forthRow[0] == 's1x1') : ?>
							<div class="row">
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+12], 'grid_square'); ?></div></div>
								<div class="col-md-6"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+13], 'grid_square'); ?></div></div>
							</div>
							<?php else : ?>
							<div class="row">
								<div class="col-md-12"><div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+12], 'grid_double'); ?></div></div>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_square_big'); ?></div>
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+10], 'grid_square_big'); ?></div>
						</div>
					</div>
					<?php
					$i+=16;
					$j = $j + 2;
				}
				// 2x2 2x1/2x1
				// 2x1/2x1 2x2
				if ((($row[0] == 's2x2') && ( ($row[2] == 's2x1') || ($row[2] == 's1x1') )) && ($nextRow[2] != 's2x2')) {
					?><div class="row">
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square_big'); ?></div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<?php if ($row[2] == 's1x1') : ?>
								<div class="col-md-6">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_square'); ?></div>
								</div>
								<div class="col-md-6">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+3], 'grid_square'); ?></div>
								</div>
								<?php else: ?>
								<div class="col-md-12">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_double'); ?></div>
								</div>
								<?php endif; ?>
							</div>
							<div class="row">
								<?php if ($nextRow[2] == 's1x1') : ?>
								<div class="col-md-6">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+6], 'grid_square'); ?></div>
								</div>
								<div class="col-md-6">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+7], 'grid_square'); ?></div>
								</div>
								<?php else: ?>
								<div class="col-md-12">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+6], 'grid_double'); ?></div>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php
					$i+=8;
				} else if (((($row[0] == 's2x1') || ($row[0] == 's1x1')) && ($row[2] == 's2x2')) && ($nextRow[0] != 's2x2')) {
					?><div class="row">
						<div class="col-md-6">
							<div class="row">
								<?php if ($row[0] == 's1x1') : ?>
								<div class="col-md-6">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square'); ?></div>
								</div>
								<div class="col-md-6">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+1], 'grid_square'); ?></div>
								</div>
								<?php endif; ?>
								<?php if ($row[0] == 's2x1') : ?>
								<div class="col-md-12">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_double'); ?></div>
								</div>
								<?php endif; ?>
							</div>
							<div class="row">
								<?php if ($nextRow[0] == 's1x1') : ?>
								<div class="col-md-6">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+4], 'grid_square'); ?></div>
								</div>
								<div class="col-md-6">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+5], 'grid_square'); ?></div>
								</div>
								<?php endif; ?>
								<?php if ($nextRow[0] == 's2x1') : ?>
								<div class="col-md-12">
									<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+4], 'grid_double'); ?></div>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+2], 'grid_square_big'); ?></div>
						</div>
					</div>
					<?php
					$i+=8;
				}
				
				// 1x1/1x1 2x2 1x1/1x1 ok
				else if (($row[0] == 's1x1') && ($row[1] == 's2x2')) {
					?><div class="row">
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_square'); ?></div>
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+4], 'grid_square'); ?></div>
						</div>
						<div class="col-md-6">
							<div class="square square-big"><?php echo barnelli_generateBlock($indexesArray[$i+1], 'grid_square_big'); ?></div>
						</div>
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+3], 'grid_square'); ?></div>
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i+7], 'grid_square'); ?></div>
						</div>
					</div>
					<?php
					$i+=8;
				}
				
				// 4x1
				else if ($row[0] == 's4x1') {
					?><div class="row">
						<div class="col-md-12">
							<div class="square square-huge"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_panorama'); $i=$i+4; ?></div>
						</div>
					</div>
					<?php
				}
				// 1x1 1x1 1x1 1x1 
				else if (($row[0] == 's1x1') && ($row[1] == 's1x1') && ($row[2] == 's1x1') && ($row[3] == 's1x1')) {
					?><div class="row">
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
					</div>
					<?php
				}
				// 1x1 2x1 1x1
				else if (($row[0] == 's1x1') && ($row[1] == 's2x1')) {
					?><div class="row">
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
						<div class="col-md-6">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_double'); $i=$i+2; ?></div>
						</div>
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
					</div>
					<?php
				}

				// 1x1 1x1 2x1
				else if (($row[0] == 's1x1') && ($row[2] == 's2x1')) {
					?><div class="row">
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
						<div class="col-md-6">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_double'); $i=$i+2; ?></div>
						</div>
					</div>
					<?php
				}

				// 2x1 1x1 1x1
				else if (($row[0] == 's2x1') && ($row[2] == 's1x1')) {
					?><div class="row">
						<div class="col-md-6">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_double'); $i=$i+2; ?></div>
						</div>
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
						<div class="col-md-3">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i]); $i++; ?></div>
						</div>
					</div>
					<?php
				}

				// 2x1 2x1
				else if (($row[0] == 's2x1') && ($row[2] == 's2x1')) {
					?><div class="row">
						<div class="col-md-6">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_double'); $i=$i+2; ?></div>
						</div>
						<div class="col-md-6">
							<div class="square"><?php echo barnelli_generateBlock($indexesArray[$i], 'grid_double'); $i=$i+2; ?></div>
						</div>
					</div>
					<?php
				}
				endif;
			}
			?>
		</div>
		<?php get_template_part('content', 'pagefooter'); ?>
	</div>
</div>
<?php get_footer(); ?>