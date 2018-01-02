<?php

function BarnelliEventPosterWidgetLoad() {
	register_widget('BarnelliCalendarEventPoster');
}

class BarnelliCalendarEventPoster extends WP_Widget {

	function BarnelliCalendarEventPoster() {
		$this->WP_Widget('BarnelliCalendarEventPosterWidget', 'YoPress: Event Calendar Poster', array('description' => 'Displays event poster calendar'), array());
	}

	function widget($args, $instance) {
		$attachment = false;
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		if($title) {
			echo $before_title.$title.$after_title;
		}

		$eventLink = '';
		$eventDate = '';
		
		$args = array('post_type' => 'eventcalendar', 'posts_per_page' => 5);
		echo $before_widget;
		?>

		<header>
			<hgroup class="fancy-headers">
				<h3 class="widget-title upcomingevents-title"><?php echo $instance['eventTitle'];?></h3>
			</hgroup>
		</header>

		<?php 

		$args = array(
			'posts_per_page' => $instance['eventNumber'],
			'post_type' => 'eventcalendar'
		);

		$queryObject = null;
		
		if($instance['eventDisplay'] == 'promote') {
			global $wpdb;
			$args['meta_key'] = 'event_promote';
			$args['meta_value'] = 1;
			$queryObject = new WP_Query($args);
		} else if($instance['eventDisplay'] == 'last') {
			$args['orderby'] = 'date'; 
			$args['order'] = 'DESC';
			$queryObject = new WP_Query($args);
		} else if($instance['eventDisplay'] == 'closest') {
			$month = date('m');
			$year = date('Y');
			$args['meta_key'] = 'event_start_date_monthyear';
			$args['meta_value'] = $month.'/'.$year;
			$args['orderby'] = 'date';
			$args['order'] = 'DESC';
			$queryObject = new WP_Query($args);
		}

		global $post;

		?>	
		<?php if (YSettings::g('eventcalendar_header_color', '#a4a4a4')) :

		$textColor = YSettings::g('eventcalendar_header_color', '#a4a4a4');
		$dayColor = YSettings::g('eventcalendar_header_color', '#a4a4a4');
		$dayTextColor = YSettings::g('eventcalendar_header_color', '#a4a4a4');
		$counterTextColor = YSettings::g('eventcalendar_header_color', '#a4a4a4');
		$counterColor = YSettings::g('eventcalendar_header_color', '#a4a4a4');
		$eventBg = YSettings::g('eventcalendar_header_color', '#a4a4a4');
		$eventFontColor = YSettings::g('eventcalendar_header_color', '#a4a4a4');
		$eventBorderColor = YSettings::g('eventcalendar_header_color', '#a4a4a4');
		?>
		<style>
			.event-calendar-description h2 a { color: <?php echo $dayColor; ?> !important; }
			#yocalendar h2, #yocalendar h3,
			#yocalendar-switcher a,
			#event-header,
			#yocalendar th,
			#yocalendar .yocalendar-paymentLink,
			p.additionalInfo,
			.months-holder .event-calendar-prev, .months-holder .event-calendar-next,		
			#yocalendar td > span { color: <?php echo $textColor;?> !important; }
			#yocalendar-months { border-bottom-color: <?php echo $textColor;?> !important}
			p.additionalInfo { border-color: <?php echo $textColor;?> !important; }
			#yocalendar td.event-cell > span { background-color: <?php echo $dayColor;?> !important; color: <?php echo $dayTextColor;?> !important; }
			#yocalendar-grid table td.event-cell .event-counter { background-color: <?php echo $counterColor;?> !important; color: <?php echo $counterTextColor;?> !important; border-color: <?php echo $eventBorderColor;?> !important; }
			#yocalendar-grid table td.event-cell .event-info { background: <?php echo $eventBg;?> !important; color: <?php echo $eventFontColor;?> !important; }		
			#yocalendar-grid table td.event-cell .event-info a { color: <?php echo $eventFontColor;?> !important; border-color: <?php echo $eventFontColor;?> !important; }
			.control-right, .control-left { background: <?php echo $dayColor;?> !important; color:  <?php echo $dayTextColor;?> !important }
			.eventcalendar-poster-title, .eventcalendar-poster-date { background: <?php echo $dayColor;?> !important; color:  <?php echo $dayTextColor;?>  }
			.yocalendar-slider.slider-next, .yocalendar-slider.slider-previous { background: <?php echo $eventBg;?> !important; color: <?php echo $eventFontColor;?> !important; }
		</style>
		<?php endif;?>

		<?php if($instance['eventDisplayType'] == 'poster') : ?>
		
		<!--big images slider-->
		<div id="<?php echo $this->id;?>" class="upcoming-events carousel slide">
			<ol class="carousel-indicators indicators">
				<?php

				$i = 0;
				$active = 'active';

				while ($queryObject->have_posts()) : $queryObject->the_post(); ?>
					<li data-target="#<?php echo $this->id;?>" data-slide-to="<?php echo $i;?>" class="<?php echo $active; $active  = '';?>"></li>
					<?php $i++;?>
				<?php endwhile; ?>
			</ol>

			<div class="carousel-inner">
				<?php $queryObject->rewind_posts(); ?>
				<?php 
					$active = 'active';
					while ($queryObject->have_posts()) : $queryObject->the_post();
						
						$eventLink = get_post_meta($post->ID, 'event_external_link', true);
						if($eventLink == '') {
							$eventLink = get_permalink();
						}

						$eventStartDate = get_post_meta($post->ID, 'event_start_date', true);
						$eventEndDate = get_post_meta($post->ID, 'event_end_date', true);
					
						$paymentLink = get_post_meta($post->ID, 'event_payment_link', true);

					?>
					<div class="item <?php echo $active; $active  = '';?>">
						<div class="poster-container eventcalendar-poster">
							<a href="<?php echo $eventLink;?>">
								<div class="eventcalendar-poster-title"><?php the_title();?></div>
								<div class="eventcalendar-poster-date"><?php echo $eventStartDate;?></div>
								<img src="<?php echo $this->yocalgetImageSize(get_post_meta($post->ID,'event_poster_image', true), '320x460') ;?>"/>
							</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<a class=" control-left" href="#<?php echo $this->id;?>" data-slide="prev"><i class="icon-caret-left"></i></a>
			<a class=" control-right" href="#<?php echo $this->id;?>" data-slide="next"><i class="icon-caret-right"></i></a>
		</div>

		<?php else : ?>
			<!--list view -->
			<?php $active = 'active';?>
			<?php while ($queryObject->have_posts()) : $queryObject->the_post();
					
					$eventLink = get_post_meta($post->ID, 'event_external_link', true);
					if ($eventLink == '') {
						$eventLink = get_permalink();
					}

					$eventStartDate = get_post_meta($post->ID, 'event_start_date', true);
					$eventEndDate = get_post_meta($post->ID, 'event_end_date', true);
				
					$paymentLink = get_post_meta($post->ID, 'event_payment_link', true);

					?>
					<div class="item <?php echo $active; $active  = '';?>">
						<div class="poster-container">
							<div class="event-image">
								<a href="<?php echo $eventLink;?>">
									<img width="100" height="100" src="<?php echo get_post_meta($post->ID,'event_poster_image', true); ?>"/>
								</a>	
							</div>
							<div class="event-description">
								<a href="<?php echo $eventLink;?>"><?php the_title();?></a>
								<span class="event-date"><?php echo $eventStartDate;?></span>
							</div>
						</div>
					</div>
			<?php endwhile; ?>
		<?php endif;?>
		<?php echo $after_widget; ?>
		<?php
	 		wp_reset_postdata();
	 		wp_reset_query();
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = '';
		$instance['eventTitle'] = $new_instance['eventTitle'];
		$instance['eventSubTitle'] = $new_instance['eventSubTitle'];
		$instance['cat_ID'] = $new_instance['cat_ID'];
		$instance['eventNumber'] = $new_instance['eventNumber'];
		$instance['eventDisplay'] = $new_instance['eventDisplay'];
		$instance['eventDisplayType'] = $new_instance['eventDisplayType'];

		return $instance;
	}

	function form($instance) {
		$defaults = array('title' => '', 'eventTitle' => '', 'cat_ID' => 0, 'eventSubTitle' => '', 'eventNumber' => 5, 'eventDisplay'=>'closest', 'eventDisplayType' => 'poster');
		$instance = wp_parse_args((array) $instance, $defaults);
	?>
		<p>
			<label for="<?php echo $this->get_field_id('eventTitle');?>"><?php _e('Title','YoPressEventCalendar');?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name('eventTitle') ?>" id="<?php echo $this->get_field_id('eventTitle');?>" value="<?php echo $instance['eventTitle'];?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('eventSubTitle');?>"><?php _e('Text','YoPressEventCalendar');?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name('eventSubTitle') ?>" id="<?php echo $this->get_field_id('eventSubTitle');?>" value="<?php echo $instance['eventSubTitle'];?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('eventNumber');?>"><?php _e('Number of events','YoPressEventCalendar');?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name('eventNumber') ?>" id="<?php echo $this->get_field_id('eventNumber');?>" value="<?php echo $instance['eventNumber'];?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('eventDisplay');?>"><?php _e('Display Events','YoPressEventCalendar');?>:</label>
			<select name="<?php echo $this->get_field_name('eventDisplay') ?>" id="<?php echo $this->get_field_id('eventDisplay');?>">
				<option value="promote" <?php echo selected( $instance['eventDisplay'], 'promote');?>><?php _e('Promo', 'YoPressEventCalendar');?></option>
				<option value="last" <?php echo selected( $instance['eventDisplay'], 'last');?>><?php _e('Last added', 'YoPressEventCalendar');?></option>
				<option value="closest" <?php echo selected( $instance['eventDisplay'], 'closest');?>><?php _e('Closest', 'YoPressEventCalendar');?></option>	
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('eventDisplayType');?>"><?php _e('Display Type','YoPressEventCalendar');?>:</label>
			<select name="<?php echo $this->get_field_name('eventDisplayType') ?>" id="<?php echo $this->get_field_id('eventDisplay');?>">
				<option value="list" <?php echo selected( $instance['eventDisplayType'], 'list');?>><?php _e('List', 'YoPressEventCalendar');?></option>
				<option value="poster" <?php echo selected( $instance['eventDisplayType'], 'poster');?>><?php _e('Posters', 'YoPressEventCalendar');?></option>
			</select>
		</p>
		
		<p>
			<small>Support custom field: link and date</small>
		</p>
	<?php
	}
}
?>