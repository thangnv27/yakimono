<?php

add_action('widgets_init', 'EventPosterWidgetLoad');

function EventPosterWidgetLoad() {
	register_widget('EventPoster');
}

class EventPoster extends WP_Widget {
	
	function GalleryWidget() {
		$this->WP_Widget('EventPosterWidget', 'YoPress: Event Poster', 
				array('description' => 'Displays event poster calendar'),
				array());
	}

	function widget($args, $instance)
	{
		$attachment = false;
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		if($title) {
			echo $before_title.$title.$after_title;
		}
		
		$eventLink = '';
		$eventDate = '';

        
		$args = array( 'post_type' => 'eventcalendar', 'posts_per_page' => 1);
		
        $queryObject = new WP_Query($args);
		global $post;
		if ($queryObject->have_posts()) : while ($queryObject->have_posts()) : $queryObject->the_post();
			$eventLink = get_post_meta($post->ID, 'link', true);
			$eventDate = get_post_meta($post->ID, 'event_date', true);
	?>
	<li>	
		<div class="widget upcoming-events">
				    	<header>
					    	<hgroup class="fancy-headers">
					    		<h1><?php echo $instance['eventTitle'];?></h1>
					    		<h2><?php echo $instance['eventSubTitle'];?></h2>
					    	</hgroup>
				    	</header>
				    	
				    	<div class="flyer-wrapper">
				    		<p class="event-date"><?php echo $eventDate;?></p>
				    		<p class="view-event"><?php echo $post->post_title;?></p>
				    		<figure>
								<a href="<?php echo get_permalink();?>" title="" >
									<?php echo get_the_post_thumbnail($post->ID, 'full', array('title' => '#caption' . $post->ID)); ?>
								</a>
				    		</figure>
				    	</div>
				    </div>
		</li>
		
		<?php
			endwhile;
			else: 
		?>
			
			<li>	
		<div class="widget upcoming-events">
				    	<header>
					    	<hgroup class="fancy-headers">
					    		<h1><?php echo $instance['eventTitle'];?></h1>
					    		<h2><?php echo $instance['eventSubTitle'];?></h2>
					    	</hgroup>
				    	</header>
				    	
							<p class="widget-no-data">
								<?php _e('No data to display', 'YoPress');?>
							</p>
						
				    </div>
		</li>	
			
	<?php	endif;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = '';
		$instance['eventTitle'] = $new_instance['eventTitle'];
		$instance['eventSubTitle'] = $new_instance['eventSubTitle'];
		$instance['cat_ID'] = $new_instance['cat_ID'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '', 'eventTitle' => '', 'cat_ID' => 0, 'eventSubTitle' => '');
		$instance = wp_parse_args((array) $instance, $defaults);
	?>
		<p>
			<label for="<?php echo $this->get_field_id('eventTitle');?>">Title</label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name('eventTitle') ?>" id="<?php echo $this->get_field_id('eventTitle');?>" value="<?php echo $instance['eventTitle'];?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('eventSubTitle');?>">Subtitle</label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name('eventSubTitle') ?>" id="<?php echo $this->get_field_id('eventSubTitle');?>" value="<?php echo $instance['eventSubTitle'];?>"/>
		</p>

		<p>
			<small>Support custom field: link and date</small>
		</p>
	<?php	
	}
}

?>