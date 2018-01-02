<?php

//$scriptName =  array_pop(explode('/',$_SERVER['SCRIPT_NAME']));
//
//if((is_admin() && $scriptName == 'widgets.php' ) || !is_admin()){
//	add_action('widgets_init', 'GalleryWidgetLoad');
//}


add_action('widgets_init', 'GalleryWidgetLoad');

function GalleryWidgetLoad(){
	register_widget('GalleryWidget');
}

class GalleryWidget extends WP_Widget
{
	function GalleryWidget()
	{
		$this->WP_Widget('GalleryWidget', 'YoPress: Gallery', 
				array('description' => 'Shows gallery'), array());
	}

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$cat_id = apply_filters('widget_cat_id', $instance['cat_id']);

		echo $before_widget;

		if($title)
		{
			echo $before_title.$title.$after_title;
		}

		$query = array ('cat' => $cat_id);
		$queryObject = new WP_Query($query);
		?>

		<div class="type-gallery">
			<?php if($queryObject->have_posts()) : ?>
			<ul>
			<?php 
				global $post;
				if ( $queryObject->have_posts() ) : while ( $queryObject->have_posts() ) : $queryObject->the_post(); ?>			
					<li>
						<a href="<?php the_permalink()?>">
						<?php  the_post_thumbnail('thumbnail');
						?>
						</a>
					</li>
				<?php endwhile; endif;?>
			</ul>
			<?php else:?>
				<p class="widget-no-data">
					<?php _e('No data to display', 'YoPress');?>
				</p>
		<?php endif;?>
		</div>    
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['cat_id'] = $new_instance['cat_id'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Gallery Title', 'cat_id' => 0);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="">Category</label>
			<?php
			YoPressBase::instance()->webView->categorySelect($this->get_field_name('cat_id'), $instance['cat_id']);
			?>
		</p>
	<?php
	}
}
?>