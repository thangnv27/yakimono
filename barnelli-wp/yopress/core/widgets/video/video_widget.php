<?php
YoPressBase::instance()->addDependency('YoPressVideoLinkExtractor');

add_action('widgets_init', 'VideoWidgetLoad');

function VideoWidgetLoad() {
	register_widget('VideoWidget');
}

class VideoWidget extends WP_Widget {
	
	function VideoWidget() {
		$this->WP_Widget('VideoWidget', 'YoPress: Video Player', 
				array('description' => 'Pulls videos into a list from specified category.'),
				array());
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		if($title) {
			echo $before_title.$title.$after_title;
		}
		
		$args = array('category' => $instance['cat_ID']);
			
		$categoryPosts = get_posts( $args );

		$listItems = array();
		$maxReached = false;

		foreach($categoryPosts as $post) {

			$content = $post->post_content;	
			$duration = get_post_meta($post->ID, 'duration', true);
			
			$extractor = new YoPressVideoLinkExtractor;
			$videos = $extractor->extract($content, 5);
			
			
			$iframe = get_post_meta( $post->ID, 'yopress_video_format_iframe', true );
			$link = get_post_meta( $post->ID, 'yopress_video_format_link', true );
			
			
			$videos = array_merge($videos,  $extractor->extract(esc_html($iframe), 5));
			$videos = array_merge($videos,  $extractor->extract($link, 5));
			
			if(count($listItems) >= $instance['maxItems']) {
					$maxReached = true;
					break;
			}
			
			foreach($videos as $links) {
				$listItems[] = array(
					'id' => $links['linkId'], 
					'title' => $post->post_title, 
					'link' => $links['link'], 
					'duration' => $duration);
			}
			
			if($maxReached) break;
		}
		
		$item = false;
		if(count($listItems) >= 1) {
			$item = $listItems[0];
		}

		?>
		<?php echo $before_widget;?>
			<div class="widget-videos">
				<?php if ($item) : ?>
					<header>
					    <hgroup class="fancy-headers">
					    	<h1><?php echo $instance['vidtitleline1'];?></h1>
					    	<h2><?php echo $instance['vidtitleline2'];?></h2>
					    </hgroup>
				    </header>
					<div class="media-container">
						<i<?php echo 'frame'; ?> id="media-player" src="<?php echo $item['link']; ?>" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></i<?php echo 'frame'; ?>>
					</div>
					<?php if (count($listItems) >= 1) : ?>
						<div class="playlist">
							<ul>
								<?php
								$class = 'class="active"';
								foreach ($listItems as $item) : ?>
									<li <?php echo $class; $class = ''; ?>>
										<p><span class="set-name" data-href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></span><span class="set-time"><?php echo $item['duration']; ?></span></p>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
				<?php else: ?>
						<header>
					    	<hgroup class="fancy-headers">
					    		<h1><?php echo $instance['vidtitleline1'];?></h1>
					    		<h2><?php echo $instance['vidtitleline2'];?></h2>
					    	</hgroup>
				    	</header>
						<div>
							<p class="widget-no-data">
								<?php _e('No data to display', 'YoPress'); ?>
							</p>
						</div>
				<?php endif; ?>
			</div>
		<?php echo $after_widget;?>
	<?php
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = '';
		$instance['vidtitleline1'] = $new_instance['vidtitleline1'];
		$instance['vidtitleline2'] = $new_instance['vidtitleline2'];
		$instance['maxItems'] = $new_instance['maxItems'];
		$instance['cat_ID'] = $new_instance['cat_ID'];
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '', 'maxItems'=>5, 'vidtitleline1' => '', 'vidtitleline2'=>'', 'cat_ID'=>'');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
	
		<p>
			<label for="<?php echo $this->get_field_id('vidtitleline1');?>">Title</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('vidtitleline1') ?>" id="<?php echo $this->get_field_id('vidtitleline1');?>" value="<?php echo $instance['vidtitleline1'];?>"/>
		</p>
		<p>	
			<label for="<?php echo $this->get_field_id('vidtitleline2');?>">Subtitle</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('vidtitleline2') ?>" id="<?php echo $this->get_field_id('vidtitleline2');?>" value="<?php echo $instance['vidtitleline2'];?>"/>
		</p>
		<p>
			<label for="">Category</label>
			<?php YoPressBase::instance()->webView->categorySelect($this->get_field_name('cat_ID'), $instance['cat_ID']); ?><br/>
			<small>with post format video</small>			
		</p>
		<p>	
			<label for="<?php echo $this->get_field_id('maxItems');?>">Max items in list</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('maxItems') ?>" id="<?php echo $this->get_field_id('maxItems');?>" value="<?php echo $instance['maxItems'];?>"/>
		</p>
		<p>
			<small>Tip: You can add duration of item by adding custom field called : duration;</small>
		</p>
	<?php
	}
}
?>