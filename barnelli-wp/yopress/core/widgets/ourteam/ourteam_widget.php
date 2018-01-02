<?php
add_action('widgets_init', 'OurTeamWidgetLoad');

function OurTeamWidgetLoad() {
	register_widget('OurTeamWidget');
}

class OurTeamWidget extends WP_Widget {
	
	function get_clients() {

		$users = array();
		$roles = array('administrator','author', 'editor', 'contributor');

		foreach ($roles as $role) {
			$users_query = new WP_User_Query( array( 
				'fields' => 'all_with_meta', 
				'role' => $role, 
				'orderby' => 'display_name'
			) );
		
			$results = $users_query->get_results();
			if ($results) $users = array_merge($users, $results);
		}

		return $users;
	}

	function OurTeamWidget() {
		$this->WP_Widget('OurTeamWidget', 'YoPress: Our Team', 
				array('description' => 'Lists out people, that contribute to the
					website (based on user roles - lists everyone besides
					subscriber role).'), array());
	}
	
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$authors = $this->get_clients();

		echo $before_widget;
		
	?>

	<div class="fancy-headers"><h3 class="widget-title staff-title"><?php echo $instance['title'];?></h3></div>
	<p><?php echo $instance['text'];?></p>
	<div class="staff-members-container">
		<ul class="staff-members clearfix">
			<?php foreach($authors as $author): ?>
			<li>
				<p class="bubble"><?php echo $author->display_name; ?></p>
				<figure>
					<a href="<?php echo $author->user_url; ?>" data-toggle="popover" data-content="<?php echo get_the_author_meta('user_description', $author->ID); ?>" title="<?php echo $author->display_name; ?>">
						<?php
						echo YoPressUserProfileExtender::getUserImage($author->ID);
						?>
					</a>
				</figure>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = $new_instance['text'];

		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '', 'text' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" value="<?php echo $instance['text']; ?>" />
		</p>


	<?php
	}
}
?>
