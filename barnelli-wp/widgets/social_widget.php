<?php

function BarnelliSocialWidgetLoad() {
	register_widget('BarnelliSocialWidget');
}

class BarnelliSocialWidget extends WP_Widget {

	function BarnelliSocialWidget() {
		$widgetOptions = array('classname' => 'BarnelliSocialWidget', 'description' => '');
		$controlOptions = array('id_base' => 'BarnelliSocialWidget');
		$this->WP_Widget('BarnelliSocialWidget', 'Barnelli: Social', array('description' => __('Displays social icons.', THEME_NAME)), array());
	}

	function widget($args, $instance) {
		extract($args);
		
		
		
		include_once THEME_INCLUDES . '/helpers.php';
		$title = apply_filters( 'widget_title', empty( $instance['social'] ) ? __( 'Social' ) : $instance['social'], $instance, $this->id_base );
		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo '<ul class="social-widget">';
			
			$socialsString = YSettings::g('theme_social_order', 'socicon-easid,socicon-twitter,socicon-facebook,socicon-google,socicon-pinterest,socicon-foursquare,socicon-yahoo,socicon-skype,socicon-yelp,socicon-feedburner,socicon-linkedin,socicon-viadeo,socicon-xing,socicon-myspace,socicon-soundcloud,socicon-spotify,socicon-grooveshark,socicon-lastfm,socicon-youtube,socicon-vimeo,socicon-dailymotion,socicon-vine,socicon-flickr,socicon-500px,socicon-instagram,socicon-wordpress,socicon-tumblr,socicon-blogger,socicon-technorati,socicon-reddit,socicon-dribbble,socicon-stumbleupon,socicon-digg,socicon-envato,socicon-behance,socicon-delicious,socicon-deviantart,socicon-forrst,socicon-play,socicon-zerply,socicon-wikipedia,socicon-apple,socicon-flattr,socicon-github,socicon-chimein,socicon-friendfeed,socicon-newsvine,socicon-identica,socicon-bebo,socicon-zynga,socicon-steam,socicon-xbox,socicon-windows,socicon-outlook,socicon-coderwall,socicon-tripadvisor,socicon-netcodes,socicon-lanyrd,socicon-slideshare,socicon-buffer,socicon-rss,socicon-vkontakte,socicon-disqus,fivehundredpx,aboutme,addme,amazon,aol,appstorealt,appstore,apple,bebo,behance,bing,blip,blogger,coroflot,daytum,delicious,designbump,designfloat,deviantart,diggalt,digg,dribble,drupal,ebay,email,emberapp,etsy,facebook,feedburner,flickr,foodspotting,forrst,foursquare,friendsfeed,friendstar,gdgt,github,githubalt,googlebuzz,googleplus,googletalk,gowallapin,gowalla,grooveshark,heart,hyves,icondock,icq,identica,imessage,itunes,lastfm,linkedin,meetup,metacafe,mixx,mobileme,mrwong,msn,myspace,newsvine,paypal,photobucket,picasa,pinterest,podcast,posterous,qik,quora,reddit,retweet,rss,scribd,sharethis,skype,slashdot,slideshare,smugmug,soundcloud,spotify,squidoo,stackoverflow,star,stumbleupon,technorati,tumblr,twitterbird,twitter,viddler,vimeo,virb,www,wikipedia,windows,wordpress,xing,yahoobuzz,yahoo,yelp,youtube,instagram');
			$socials = explode(',', $socialsString);
			
			global $barnelli_mobileIcons;

			foreach ($socials as $social) :
				
				if ( YSettings::g( 'theme_'.$social, '' ) != '' ) : ?>
				<?php $window = (YSettings::g('share_new_window', '0') == '1') ? 'target="_blank"' : ''; ?>
				<li>
					<?php if (strstr($social, 'socicon')) :?>
					<a <?php echo $window; ?> href="<?php echo YSettings::g( 'theme_'.$social ); ?>"><i class="socicon"><?php echo $barnelli_mobileIcons[$social];?></i></a>
					<?php else: ?>
					<a <?php echo $window; ?> href="<?php echo YSettings::g( 'theme_'.$social ); ?>"><i class="monosymbol"><?php echo $barnelli_mobileIcons[$social];?></i></a>
					<?php endif; ?>
				</li>
				<?php endif;
			endforeach;
			
		echo '</ul>';
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['social'] = $new_instance['social'];

		return $instance;
	}

	function form($instance) {
		$defaults = array('social' => '');

		$instance = wp_parse_args((array) $instance, $defaults);
		?>
		<p>
			<label name="<?php echo $this->get_field_name('social'); ?>"><?php _e('Title:'); ?></label>
			<input name="<?php echo $this->get_field_name('social'); ?>" id="<?php echo $this->get_field_id('social');?>" value="<?php echo $instance['social']; ?>"><br/>
			<label for=""><?php _e('Configure icons in YoPress -> Social'); ?></label>
		</p>
		<?php
	}
}
?>