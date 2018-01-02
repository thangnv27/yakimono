<?php

add_action('widgets_init', 'SocialHubWidgetLoad');

function SocialHubWidgetLoad()
{
	register_widget('SocialHubWidget');
}

class SocialHubWidget extends WP_Widget
{
	function SocialHubWidget()
	{
		$this->WP_Widget('SocialHubWidget', 'YoPress: Social Hub', array('description' => 'Disaplays social hub'), array());
	}

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		if ($title){
			echo $before_title.$title.$after_title;
		}
	?>
		<?php echo $before_widget; ?>
		<div>
			<h3 class="widget-title socialhub-title"><?php echo $instance['name'];?></h3>
			<p><?php echo $instance['text'];?></p>
			<ul class="social-hub">
				<?php if(isset($instance['fb'])) : ?>
					<li><a href="<?php echo $instance['fb']; ?>" target="_blank" class=""><i class="icon-facebook-sign icon-2x"></i></a></li>
				<?php endif;?>

				<?php if(isset($instance['twitter'])) : ?>
					<li><a href="<?php echo $instance['twitter']; ?>" target="_blank" class=""><i class="icon-twitter-sign icon-2x"></i></a></li>
				<?php endif;?>

				<?php if(isset($instance['googleplus'])) : ?>
					<li><a href="<?php echo $instance['googleplus']; ?>" target="_blank" class=""><i class="icon-google-plus-sign icon-2x"></i></a></li>
				<?php endif;?>
					
				<?php if(isset($instance['pinterest'])) : ?>
					<li><a href="<?php echo $instance['pinterest']; ?>" target="_blank" class=""><i class="icon-pinterest-sign icon-2x"></i></a></li>
				<?php endif;?>
					
				<?php if(isset($instance['linkedin'])) : ?>
					<li><a href="<?php echo $instance['linkedin']; ?>" target="_blank" class=""><i class="icon-linkedin-sign icon-2x"></i></a></li>
				<?php endif;?>
			</ul>
		</div>
		<?php echo $after_widget; ?>
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = '';
		$instance['name'] = $new_instance['name'];
		$instance['text'] = $new_instance['text'];

		$instance['fb'] = $new_instance['fb'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['googleplus'] = $new_instance['googleplus'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['linkedin'] = $new_instance['linkedin'];

		if (!preg_match('/http(|s):\/\//', $instance['fb']) && $instance['fb'] != '') {
				$instance['fb'] = 'http://'.$instance['fb'];
		}

		if (!preg_match('/http(|s):\/\//', $instance['twitter']) && $instance['twitter'] != '') {
				$instance['twitter'] = 'http://'.$instance['twitter'];
			
		}

		if (!preg_match('/http(|s):\/\//', $instance['googleplus']) && $instance['googleplus'] != ''){
				$instance['googleplus'] = 'http://'.$instance['googleplus'];
		}
		
		if (!preg_match('/http(|s):\/\//', $instance['pinterest']) && $instance['pinterest'] != ''){
				$instance['pinterest'] = 'http://'.$instance['pinterest'];
		}
		
		if (!preg_match('/http(|s):\/\//', $instance['linkedin']) && $instance['linkedin'] != ''){
				$instance['linkedin'] = 'http://'.$instance['linkedin'];
		}

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '', 'name' => '', 'fb' => '', 'twitter' => '', 'text' => '', 'googleplus' => '',
			'pinterest' => '' , 'linkedin' => '');
		$instance = wp_parse_args((array) $instance, $defaults);
	?>
		<p>
			<label for="<?php echo $this->get_field_id('name');?>">Title</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('name') ?>" id="<?php echo $this->get_field_id('name');?>" value="<?php echo $instance['name'];?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text');?>">Text</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('text') ?>" id="<?php echo $this->get_field_id('text');?>" value="<?php echo $instance['text'];?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fb');?>">Facebook link</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('fb') ?>" id="<?php echo $this->get_field_id('fb');?>" value="<?php echo $instance['fb'];?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter');?>">Twitter link</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('twitter') ?>" id="<?php echo $this->get_field_id('twitter');?>" value="<?php echo $instance['twitter'];?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('googleplus');?>">Google+ link</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('googleplus') ?>" id="<?php echo $this->get_field_id('googleplus');?>" value="<?php echo $instance['googleplus'];?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest');?>">Pinterest link</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('pinterest') ?>" id="<?php echo $this->get_field_id('pinterest');?>" value="<?php echo $instance['pinterest'];?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin');?>">Linkedin link</label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('linkedin') ?>" id="<?php echo $this->get_field_id('linkedin');?>" value="<?php echo $instance['linkedin'];?>"/>
		</p>
	<?php
	}
}
?>
