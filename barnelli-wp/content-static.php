<div class="static-elements">
	<?php if (YSettings::g( 'theme_show_social_icons', '0') == '1') : ?>
	<div class="social-share top">
		<ul>
			<?php
			$socialsString = YSettings::g('theme_social_order', 'socicon-easid,socicon-twitter,socicon-facebook,socicon-google,socicon-pinterest,socicon-foursquare,socicon-yahoo,socicon-skype,socicon-yelp,socicon-feedburner,socicon-linkedin,socicon-viadeo,socicon-xing,socicon-myspace,socicon-soundcloud,socicon-spotify,socicon-grooveshark,socicon-lastfm,socicon-youtube,socicon-vimeo,socicon-dailymotion,socicon-vine,socicon-flickr,socicon-500px,socicon-instagram,socicon-wordpress,socicon-tumblr,socicon-blogger,socicon-technorati,socicon-reddit,socicon-dribbble,socicon-stumbleupon,socicon-digg,socicon-envato,socicon-behance,socicon-delicious,socicon-deviantart,socicon-forrst,socicon-play,socicon-zerply,socicon-wikipedia,socicon-apple,socicon-flattr,socicon-github,socicon-chimein,socicon-friendfeed,socicon-newsvine,socicon-identica,socicon-bebo,socicon-zynga,socicon-steam,socicon-xbox,socicon-windows,socicon-outlook,socicon-coderwall,socicon-tripadvisor,socicon-netcodes,socicon-lanyrd,socicon-slideshare,socicon-buffer,socicon-rss,socicon-vkontakte,socicon-disqus,fivehundredpx,aboutme,addme,amazon,aol,appstorealt,appstore,apple,bebo,behance,bing,blip,blogger,coroflot,daytum,delicious,designbump,designfloat,deviantart,diggalt,digg,dribble,drupal,ebay,email,emberapp,etsy,facebook,feedburner,flickr,foodspotting,forrst,foursquare,friendsfeed,friendstar,gdgt,github,githubalt,googlebuzz,googleplus,googletalk,gowallapin,gowalla,grooveshark,heart,hyves,icondock,icq,identica,imessage,itunes,lastfm,linkedin,meetup,metacafe,mixx,mobileme,mrwong,msn,myspace,newsvine,paypal,photobucket,picasa,pinterest,podcast,posterous,qik,quora,reddit,retweet,rss,scribd,sharethis,skype,slashdot,slideshare,smugmug,soundcloud,spotify,squidoo,stackoverflow,star,stumbleupon,technorati,tumblr,twitterbird,twitter,viddler,vimeo,virb,www,wikipedia,windows,wordpress,xing,yahoobuzz,yahoo,yelp,youtube,instagram');
			$socials = explode(',', $socialsString);
			
			global $barnelli_mobileIcons;

			foreach ($socials as $social) : ?>
				<?php if ( YSettings::g( 'theme_'.$social, '' ) != '' ) : ?>
					<?php if ( YSettings::g( 'theme_show_'.$social, '' ) == '1' ) : ?>
						<?php $window = (YSettings::g('share_new_window', '0') == '1') ? 'target="_blank"' : ''; ?>
						<li>
							<?php if (strstr($social, 'socicon')) :?>
							<a <?php echo $window; ?> href="<?php echo YSettings::g( 'theme_'.$social ); ?>"><i class="socicon"><?php echo $barnelli_mobileIcons[$social];?></i></a>
							<?php else: ?>
							<a <?php echo $window; ?> href="<?php echo YSettings::g( 'theme_'.$social ); ?>"><i class="monosymbol"><?php echo $barnelli_mobileIcons[$social];?></i></a>
							<?php endif; ?>
						</li>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	<?php 
	if (function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
		echo '<div class="languages top"><ul>';	

		foreach ($languages as $key => $lang) {
			if ($lang['language_code'] == ICL_LANGUAGE_CODE) {
				$class = "active";
			} else {
				$class = "";
			}

			echo '<li><a class="'.$class.'" data-djax-exclude="true" href="'.$lang['url'].'" title="'.$lang['native_name'].'"><span>'.strtoupper($lang['language_code']).'</span></a></li>';
		}

		echo "</ul></div>";
	}
	?>
	<?php if (YSettings::gWPML( 'arrow_link', YSettings::g( 'arrow_link', '')) != '') : ?>
	<div class="arrow-nav hidden-sm hidden-md hidden-lg">
		<a href="<?php echo YSettings::g( 'arrow_link' ); ?>">
			<i class="fa fa-share"></i>
		</a>
	</div>
	<?php endif; ?>
</div>