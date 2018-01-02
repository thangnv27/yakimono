<?php
global $barnelli_menu_type;
global $post;

$menuFont = YSettings::g('dynamic_'.$barnelli_menu_type.'_menu_font', 'Covered By Your Grace');
$menuFontURL = str_replace(' ', '+', $menuFont);

if ( is_page() && $post->post_parent ) {
	$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));
} else {
	$wrapperClass = str_replace(" ", "-", get_the_title());
}
// Custom colors & fonts
$categoryFontColor		= YSettings::g('dynamic_'.$barnelli_menu_type.'_cat_font_color', '#ffffff' );
$categoryFontSize		= YSettings::g('dynamic_'.$barnelli_menu_type.'_cat_font_size', 30);
$categoryDescriptionFontColor = YSettings::g('dynamic_'.$barnelli_menu_type.'_cat_description_font_color', '#ffffff' );
$categoryDescriptionFontSize = YSettings::g('dynamic_'.$barnelli_menu_type.'_cat_description_font_size', 30);
$titleFontColor 		= YSettings::g('dynamic_'.$barnelli_menu_type.'_title_font_color', '#ffffff');
$titleFontSize			= YSettings::g('dynamic_'.$barnelli_menu_type.'_title_font_size', 30);
$descriptionColor 		= YSettings::g('dynamic_'.$barnelli_menu_type.'_description_font_color', '#ffffff');
$descriptionSize 		= YSettings::g('dynamic_'.$barnelli_menu_type.'_description_font_size', 30);
$priceColor 			= YSettings::g('dynamic_'.$barnelli_menu_type.'_price_font_color', '#ffffff');
$priceSize	 			= YSettings::g('dynamic_'.$barnelli_menu_type.'_price_font_size', 30);
$currencySide 			= YSettings::g('dynamic_'.$barnelli_menu_type.'_currency_side', 'left');
$currencyValue 			= YSettings::g('dynamic_'.$barnelli_menu_type.'_price_currency', '');

$gridMod 				= (int)YSettings::g('dynamic_'.$barnelli_menu_type.'_grid_mod', 3);
$colorboxEnabled		= (YSettings::g('dynamic_'.$barnelli_menu_type.'_colorbox', '1') == '1');
$centerMenuItems		= YSettings::g('dynamic_'.$barnelli_menu_type.'_center_menu', '0')
					
?>
<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper menu-wrapper" id="main-content" data-menu-type="<?php echo $barnelli_menu_type;?>">
	<link rel='stylesheet' id='google-fonts-css'  href='<?php echo THEME_PROTOCOL; ?>://fonts.googleapis.com/css?family=<?php echo $menuFontURL;?>' type='text/css' media='all' />
	<style>
	.barnelli-menu .menu-container {
		font-family: '<?php echo $menuFont; ?>', cursive !important;
	}
	.barnelli-menu .menu-container p, .barnelli-menu .menu-container span, .barnelli-menu .menu-container h2, .barnelli-menu .menu-container h1 {
		font-family: '<?php echo $menuFont; ?>', cursive !important;
	}
	.top-menu {
		color: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_top_menu_font_color', '#ffffff' ); ?>
	}
	.barnelli-menu h1 {
		font-size: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_top_menu_font_size', 30 ); ?>px !important;
		color: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_top_menu_font_color', '#ffffff' ); ?> !important;
	}
	.barnelli-menu .menu-list .menu-item .title:before{
		background: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_title_font_color', '#ffffff' ); ?>
	}
	#second-menu .menu-header h2 span:before,
	#third-menu .menu-header h2 span:before {
		background: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_seperator_color' , '#ffffff'); ?>
	}
	#second-menu .menu-header h2 span:after,
	#third-menu .menu-header h2 span:after {
		background: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_seperator_color' , '#ffffff'); ?>
	}
	.barnelli-menu i {
		font-size: <?php echo $categoryFontSize; ?>px !important;
	}
	.widget-title {
		color: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_footer_menu_header_color', '#ffffff' ); ?>;
	}
	.widget-wrapper, .widget-wrapper form {
		color: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_footer_menu_color', '#ffffff' ); ?>;	
	}

	#footer #wp-calendar a, .widget-wrapper ul li a, .widget-wrapper input {
		color: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_footer_menu_link_color', '#ffffff' ); ?> !important;	
	}

	#footer #wp-calendar a:hover, .widget-wrapper ul li a:hover, .widget-wrapper input:hover {
		color: <?php echo YSettings::g( 'dynamic_'.$barnelli_menu_type.'_footer_menu_hover_link_color', '#ffffff' ); ?> !important;	
	}
	</style>
	<?php
	$foodMenuSidebar = 'dynamic_'.$barnelli_menu_type .'_sidebar';
	$foodMenuSidebarPosition = YSettings::g($foodMenuSidebar, 'none');
	?>
	<div id="third-menu" class="barnelli-menu padding-wrapper">
		<div class="container animate-in animate-in-fade">
			<div class="menu-container">
				<?php
				the_post();
				the_content();

				$args = array(
					'orderby' => 'order',
					'order' => 'asc',
					'hide_empty' => 0,
					'taxonomy' => $barnelli_menu_type.'_categories'
				);

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

				foreach( $newCategories as $category ) :
					$newargs = array(
						 'post_type' => $barnelli_menu_type,
						 'posts_per_page' => -1,
						 'tax_query' => array(
							array(
								'taxonomy' => $barnelli_menu_type.'_categories',
								'field' => 'slug',
								'terms' => $category->slug
							)
						)
					);

					$t_id = $category->term_id;
					$term_meta = get_option( "taxonomy_$t_id" );
					$categoryIcon = esc_attr( $term_meta['menu_category_icon'] );

					$icon = ($categoryIcon == 'no-icon') ? '' : '<i class="'.$categoryIcon.'"></i>';

					$categoryIconImage = esc_attr( $term_meta['menu_category_icon_image'] );
					if ($categoryIconImage != '') {
						$image = explode('.', $categoryIconImage);
						$image[count($image)-2] = $image[count($image)-2] . '-40x40';
						$custom_icon_image = implode('.', $image);
						$icon = '<img src="'.$custom_icon_image.'" alt="" />';
					}
				?>
				<header class="row">
					<div class="col-md-12">
						<div class="menu-header">
							<h2 style="color: <?php echo $categoryFontColor; ?> !important; font-size: <?php echo $categoryFontSize; ?>px !important;"><span><?php echo $category->name; ?>  <?php echo $icon; ?></span></h2>
							<?php if ($category->description != '') : ?>
								<div class="menu-description col-md-8 col-md-offset-2 text-center"><p style="color: <?php echo $categoryDescriptionFontColor; ?> !important; font-size: <?php echo $categoryDescriptionFontSize; ?>px !important;"><?php echo $category->description; ?></p></div>
							<?php endif;?>
						</div>
					</div>
				</header>
				<section class="row">
					<?php
					$the_query = new WP_Query($newargs);

					usort($the_query->posts, create_function('$a, $b', 'return strnatcmp($a->menu_order, $b->menu_order);'));

					$colOffset = '';
					$postCount = count($the_query->posts);

					$rowId = 1;
					$gridModCheck = $gridMod;

					if ($centerMenuItems == '1') {
						if ($gridModCheck == 3) {
							$mod = 4;
							if ($postCount == 3) {
								$gridMod = 4;
							} else if ($postCount == 2) {
								$gridMod = 6;
							} else if ($postCount == 1) {
								$gridMod = 6;
								$colOffset = 'col-md-offset-3';
							} else {
								$gridMod = 3;
							}
						} else if ($gridModCheck == 4) {
							$mod = 3;
							if ($postCount == 3) {
								$gridMod = 4;
							} else if ($postCount == 2) {
								$gridMod = 6;
							} else if ($postCount == 1) {
								$gridMod = 6;
								$colOffset = 'col-md-offset-3';
							} else {
								$gridMod = 4;
							}
						} else if ($gridModCheck == 6) {
							$mod = 2;
						}
					} else {
						if ($gridModCheck == 3) {
							$mod = 4;
						} else if ($gridModCheck == 4) {
							$mod = 3;
						} else if ($gridModCheck == 6) {
							$mod = 2;
						}
					}

					foreach ($the_query->posts as $post) :
						$custom = get_post_custom($post->ID);
						$postMeta = new BarnelliPostMetaInfo($custom);
						$menuTitle = $postMeta->get('menu_title');
						$menuSecondTitle = $postMeta->get('menu_secondtitle');
						$menuSubitle = $postMeta->get('menu_subtitle');
					?>
					<div class="menu-list col-sm-6 col-md-<?php echo $gridMod; ?> <?php echo $colOffset; ?>">
						<article class="menu-item">
							<?php
							$dish_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'menu_thumb');
							$dish_img_link = wp_get_attachment_image_src(get_post_thumbnail_id(), 'colorbox_thumb');
							$image = ($dish_img[0]) ? $dish_img[0] : false;
							?>
							<?php if ($image) : ?>
								<?php if ($colorboxEnabled) : ?>
									<a data-djax-exclude="true" href="<?php echo $dish_img_link[0]; ?>" class="food-menu-gallery" rel="menu-gallery"><figure><img src="<?php echo $image; ?>" alt=""/></figure></a>
								<?php else: ?>
									<figure><img src="<?php echo $image; ?>" alt=""/></figure>
								<?php endif; ?>
							<?php endif; ?>
							<p class="title" style="color: <?php echo $titleFontColor; ?>;font-size:<?php echo $titleFontSize; ?>px">
								<?php echo $menuTitle; ?>
								<?php if ($menuSecondTitle != '') : ?> (<?php echo $menuSecondTitle; ?>)<?php endif; ?>
							</p>
							<div class="description" style="color: <?php echo $descriptionColor; ?>;font-size:<?php echo $descriptionSize; ?>px"><?php echo do_shortcode($menuSubitle); ?></div>
							<div class="price" style="color: <?php echo $priceColor; ?>;font-size:<?php echo $priceSize;?>px !important">
								<?php
								$numberOfPrices = (int)YSettings::g("dynamic_".$post->post_type."_number_of_prices", 1);

								for ($price=1; $price<=$numberOfPrices; $price++) {
									if ($postMeta->get('menu_price'.$price) !== ''):
									?>
									<span>
										<?php
										$menuPrice = $postMeta->get('menu_price'.$price);

										if ($currencySide == 'left') {
											echo $currencyValue . '' . $menuPrice;
										} else if ($currencySide == 'right') {
											echo $menuPrice . '' .$currencyValue;
										} else {
											echo $menuPrice;
										}
										?>
									</span>
									<?php
									endif;
								}
								?>
							</div>
						</article>
					</div>
					<?php
						if (($rowId % $mod) == 0) {
							echo '</section><section class="row">';
						}
						$colOffset = '';

						$rowId++;
					endforeach;
					wp_reset_query();
					?>
				</section>
				<?php
				$colOffset = '';
				$gridMod = (int)YSettings::g('dynamic_'.$barnelli_menu_type.'_grid_mod', 3);
				endforeach;
				?>
			</div>
			<?php get_template_part('content', 'pagefooter'); ?>
		</div>
	</div>
</div>