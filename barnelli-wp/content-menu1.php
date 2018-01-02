<div class="dynamic-content <?php the_title(); ?>-wrapper" id="main-content">
	<div class="barnelli-menu padding-wrapper">
		<div class="slidee">
			<div class="container animate-in animate-in-fade">
				<header class="row">
					<div class="col-md-10 col-md-offset-1">
						<h1 class="top-menu"><?php wp_title( '', true ); ?></h1>
					</div>
				</header>
				<section class="row">
					<?php
					$args = array(
					    'orderby' => 'order',
					    'order' => 'asc',
					    'hide_empty' => 0,
					    'taxonomy' => 'foodmenu_categories'
					);

					// Custom colors
					$categoryFontColor = YSettings::g('cat_font_color', '#ffffff');
					$titleFontColor = YSettings::g('title_font_color', '#ffffff');
					$descriptionColor = YSettings::g('description_font_color', '#ffffff');
					$priceColor = YSettings::g('price_font_color', '#ffffff');
					$currencySide = YSettings::g('currency_side', 'left');
					$currencyValue = YSettings::g('price_currency', '$');

					$gridMod = (int)YSettings::g('grid_mod', 3);

					//get categories
					$categories = get_categories($args);
					$newCategories = $categories;

					//add custom order field into object
					foreach ($categories as $key => $category) {
						$t_id = $category->term_id;
						$term_meta = get_option("taxonomy_$t_id");
						$order = $term_meta['menu_category_order'];
						$category->order = (int)$order;
						$newCategories[$key] = $category;
					}

					//sort categories by custom order field
					usort($newCategories, create_function('$a, $b', 'return strnatcmp($a->order, $b->order);'));

					foreach ($newCategories as $category):
						$newargs = array(
							 'post_type' => 'foodmenu',
							 'posts_per_page' => -1,
							 'tax_query' => array(
								array(
									'taxonomy' => 'foodmenu_categories',
									'field' => 'slug',
									'terms' => $category->slug
								)
							)
						);

						$t_id = $category->term_id;
						$term_meta = get_option("taxonomy_$t_id");
						$categoryIcon = esc_attr($term_meta['menu_category_icon']);

						$icon = '<i class="'.$categoryIcon.'"></i>';

						$categoryIconImage = esc_attr($term_meta['menu_category_icon_image']);

						if ($categoryIconImage != '') {
							$image = explode('.', $categoryIconImage);
							$image[count($image)-2] = $image[count($image)-2] . '-40x40';
							$custom_icon_image = implode('.', $image);
							$custom_icon_image = $categoryIconImage;
							$icon = '<img src="'.$custom_icon_image.'" alt="" />';
						}
					?>
					<div class="col-md-10 col-md-offset-1">
						<dl>
							<dt>
								<h2 style="color: <?php echo $categoryFontColor; ?>"><?php echo $category->name; ?> <?php echo $icon; ?></i></h2>
							</dt>
							<?php
							$the_query = new WP_Query( $newargs );

							usort($the_query->posts, create_function('$a, $b', 'return strnatcmp($a->menu_order, $b->menu_order);'));

							foreach ($the_query->posts as $post):
							
								$custom = get_post_custom($post->ID);
								$postMeta = new BarnelliPostMetaInfo($custom);
								$menuTitle = $postMeta->get('menu_title');
								$menuSecondTitle = $postMeta->get('menu_secondtitle');
								$menuSubitle = $postMeta->get('menu_subtitle');

								$menuPrice1 = $postMeta->get('menu_price1');
								$menuPrice2 = $postMeta->get('menu_price2');
								$menuPrice3 = $postMeta->get('menu_price3');
							?>
							<article>
								<dd class="menu-list">
									<section class="menu-item">
										<p class="title" style="color: <?php echo $titleFontColor; ?>">
											<?php echo $menuTitle; ?>
											<?php if ($menuSecondTitle != ''): ?> <span>(<?php echo $menuSecondTitle; ?>)</span><?php endif; ?>
										</p>
										<div class="description" style="color: <?php echo $descriptionColor; ?>"><?php echo $menuSubitle; ?></div>
									</section>
									<section class="price" style="color: <?php echo $priceColor; ?>">
										<?php if ( $menuPrice1 !== '' ) : ?>
										<span>
											<?php
											if ($currencySide == 'left') {
												echo $currencyValue . ' ' . $menuPrice1;
											} else if ($currencySide == 'right') {
												echo $menuPrice1 . ' ' .$currencyValue;
											} else {
												echo $menuPrice1;
											}
											?>
										</span>
										<?php endif; ?>

										<?php if ($menuPrice2 !== '') : ?>
										<span>
											<?php
											if ($currencySide == 'left') {
												echo $currencyValue . ' ' . $menuPrice2;
											} else if ($currencySide == 'right') {
												echo $menuPrice2 . ' ' .$currencyValue;
											} else {
												echo $menuPrice2;
											}
											?>
										</span>
										<?php endif; ?>

										<?php if ($menuPrice3 !== '') : ?>
										<span>
											<?php
											if ($currencySide == 'left') {
												echo $currencyValue . ' ' . $menuPrice3;
											} else if ($currencySide == 'right') {
												echo $menuPrice3 . ' ' .$currencyValue;
											} else {
												echo $menuPrice3;
											}
											?>
										</span>
										<?php endif; ?>
									</section>
								</dd>
							</article>
							<?php
							endforeach;
							wp_reset_query();
							?>
						</dl>
					</div>
					<?php
					endforeach;
					?>
				</section>
			</div>
		</div>
	</div>
	<?php get_template_part('content', 'footer'); ?>
</div>