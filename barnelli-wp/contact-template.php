<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>
<?php 
	$centerPositionLat = YSettings::g('contact_map_center_lat', 51);
	$centerPositionLng = YSettings::g('contact_map_center_lng', 0);
	$markerPositionLat = YSettings::g('contact_map_marker_lat', 51);
	$markerPositionLng = YSettings::g('contact_map_marker_lng', 0);
	$zoomLevel = YSettings::g('contact_map_zoom_level', 8);
	$markerImage = YSettings::g('contact_map_marker_image', '');
	$mapType = YSettings::g("contact_map_type", "roadmap");
	if ($mapType == 'raodmap') {
		$mapType = 'roadmap';
	}
	global $post;
	if ( is_page() && $post->post_parent ) {
		$wrapperClass = str_replace(" ", "-", get_the_title($post->post_parent));
	} else {
		$wrapperClass = str_replace(" ", "-", get_the_title());
	}

	$wrapperClass = preg_replace("/[^a-zA-Z0-9\-]+/", "", $wrapperClass);
?>
	<div class="dynamic-content <?php echo $wrapperClass; ?>-wrapper container" id="main-content">
		<section id="contact" class="padding-wrapper">
			<?php the_post(); the_content(); ?>


			<?php if (YSettings::g("contact_map_disable", "0") == "0"): ?>
			<script type="text/javascript">
/*!
 * jquery.base64.js 0.0.3 - https://github.com/yckart/jquery.base64.js
 * Makes Base64 en & -decoding simpler as it is.
 *
 * Based upon: https://gist.github.com/Yaffle/1284012
 *
 * Copyright (c) 2012 Yannick Albert (http://yckart.com)
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php).
 * 2013/02/10
 **/
;(function($){var b64="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",a256='',r64=[256],r256=[256],i=0;var UTF8={encode:function(strUni){var strUtf=strUni.replace(/[\u0080-\u07ff]/g,function(c){var cc=c.charCodeAt(0);return String.fromCharCode(0xc0|cc>>6,0x80|cc&0x3f);}).replace(/[\u0800-\uffff]/g,function(c){var cc=c.charCodeAt(0);return String.fromCharCode(0xe0|cc>>12,0x80|cc>>6&0x3F,0x80|cc&0x3f);});return strUtf;},decode:function(strUtf){var strUni=strUtf.replace(/[\u00e0-\u00ef][\u0080-\u00bf][\u0080-\u00bf]/g,function(c){var cc=((c.charCodeAt(0)&0x0f)<<12)|((c.charCodeAt(1)&0x3f)<<6)|(c.charCodeAt(2)&0x3f);return String.fromCharCode(cc);}).replace(/[\u00c0-\u00df][\u0080-\u00bf]/g,function(c){var cc=(c.charCodeAt(0)&0x1f)<<6|c.charCodeAt(1)&0x3f;return String.fromCharCode(cc);});return strUni;}};while(i<256){var c=String.fromCharCode(i);a256+=c;r256[i]=i;r64[i]=b64.indexOf(c);++i;}
function code(s,discard,alpha,beta,w1,w2){s=String(s);var buffer=0,i=0,length=s.length,result='',bitsInBuffer=0;while(i<length){var c=s.charCodeAt(i);c=c<256?alpha[c]:-1;buffer=(buffer<<w1)+c;bitsInBuffer+=w1;while(bitsInBuffer>=w2){bitsInBuffer-=w2;var tmp=buffer>>bitsInBuffer;result+=beta.charAt(tmp);buffer^=tmp<<bitsInBuffer;}
++i;}
if(!discard&&bitsInBuffer>0)result+=beta.charAt(buffer<<(w2-bitsInBuffer));return result;}
var Plugin=$.base64=function(dir,input,encode){return input?Plugin[dir](input,encode):dir?null:this;};Plugin.btoa=Plugin.encode=function(plain,utf8encode){plain=Plugin.raw===false||Plugin.utf8encode||utf8encode?UTF8.encode(plain):plain;plain=code(plain,false,r256,b64,8,6);return plain+'===='.slice((plain.length%4)||4);};Plugin.atob=Plugin.decode=function(coded,utf8decode){coded=coded.replace(/[^A-Za-z0-9\+\/\=]/g,"");coded=String(coded).split('=');var i=coded.length;do{--i;coded[i]=code(coded[i],true,r64,a256,6,8);}while(i>0);coded=coded.join('');return Plugin.raw===false||Plugin.utf8decode||utf8decode?UTF8.decode(coded):coded;};}(jQuery));

				function initializeMap() {
					var map;
					var centerPosition = new google.maps.LatLng(<?php echo $centerPositionLat; ?>, <?php echo $centerPositionLng; ?>);
					var markerPosition = new google.maps.LatLng(<?php echo $markerPositionLat; ?>, <?php echo $markerPositionLng; ?>);
					var zoomLevel = <?php echo $zoomLevel; ?>;
					var marker = false;
					var markerImage = '<?php echo $markerImage; ?>';
					var mapTypeId = '<?php echo YSettings::g("contact_map_type", "roadmap"); ?>';
					var mapTmp = "<?php echo YSettings::g('contact_map_locations', ''); ?>";
					var mapTmpJson = jQuery.parseJSON(jQuery.base64.decode(mapTmp));

					var mapLocations = {};

					if (mapTmpJson != null) {
						mapLocations = jQuery.parseJSON(jQuery.base64.decode(mapTmp));
					} else {
						mapLocations = { 1: {lat: markerPosition.lat(), lng: markerPosition.lng() }};
					}

					var style = <?php echo (YSettings::g('contact_map_style', 'grayscale') == 'grayscale') ? '[{"stylers": [{"saturation": "-100"}]}];' : '[];'; ?>

					var options = {
						zoom: zoomLevel,
						center: centerPosition,
						styles: style,
						scrollwheel: false,
						mapTypeId: mapTypeId
					};

					map = new google.maps.Map(jQuery('#map')[0], options);

					google.maps.event.addDomListener(window, "resize", function() {
						var center = map.getCenter();
						google.maps.event.trigger(map, "resize");
						map.setCenter(center);
					});

					var image = {
						url: markerImage,
						origin: new google.maps.Point(0, 0),
						anchor: new google.maps.Point(12, 59)
					};

					if (markerImage == '') {
						marker = new google.maps.Marker({
							position: markerPosition,
							title: 'Location',
							map: map,
							draggable: false
						});
					} else {
						marker = new google.maps.Marker({
							position: markerPosition,
							title: 'Location',
							map: map,
							icon: image,
							draggable: false
						});
					}
				}
			</script>
			<div id="map" class="map" style="height:<?php echo YSettings::g('contact_map_height', 300); ?>px !important"></div>
			<?php endif; ?>
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="row">
						<div class="col-sm-6 col-md-12">
							<?php if ( YSettings::g( 'contact_info_display' ) ) : ?>
							<div class="info">
								<h1><?php echo YSettings::gWPML( 'contact_info_header', YSettings::g( 'contact_info_header', '' ) ); ?></h1>
								<p><?php echo YSettings::gWPML( 'contact_info_content', YSettings::g( 'contact_info_content', '' ) ); ?></p>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-sm-offset-1 col-sm-5 col-md-12 col-md-offset-0">
							<?php if ( YSettings::g( 'contact_social_display' ) ) : ?>
							<div class="social-media">
								<h1><?php echo YSettings::gWPML( 'contact_social_header', YSettings::g( 'contact_social_header','' ) ); ?></h1>
								<ul class="social-icon">
									<?php
									$socialsString = YSettings::g('theme_social_order', 'fivehundredpx,aboutme,addme,amazon,aol,appstorealt,appstore,apple,bebo,behance,bing,blip,blogger,coroflot,daytum,delicious,designbump,designfloat,deviantart,diggalt,digg,dribble,drupal,ebay,email,emberapp,etsy,facebook,feedburner,flickr,foodspotting,forrst,foursquare,friendsfeed,friendstar,gdgt,github,githubalt,googlebuzz,googleplus,googletalk,gowallapin,gowalla,grooveshark,heart,hyves,icondock,icq,identica,imessage,itunes,lastfm,linkedin,meetup,metacafe,mixx,mobileme,mrwong,msn,myspace,newsvine,paypal,photobucket,picasa,pinterest,podcast,posterous,qik,quora,reddit,retweet,rss,scribd,sharethis,skype,slashdot,slideshare,smugmug,soundcloud,spotify,squidoo,stackoverflow,star,stumbleupon,technorati,tumblr,twitterbird,twitter,viddler,vimeo,virb,www,wikipedia,windows,wordpress,xing,yahoobuzz,yahoo,yelp,youtube,instagram');
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
									?>
								</ul>
							</div>
							<?php endif; ?>
						</div>	
					</div>
				</div>
				<div class=" col-sm-6 col-md-4 col-md-offset-1">
					<?php if ( YSettings::g( 'theme_contact_address' ) ) : ?>
					<div class="vcard">
						<h1><?php echo YSettings::gWPML( 'theme_contact_address_header', YSettings::g( 'theme_contact_address_header', 'Address & phone') ); ?></h1>
						<p class="adr">
							<?php if ( YSettings::gWPML ( 'theme_contact_company_name', YSettings::g( 'theme_contact_company_name' ) ) ) : ?>
							<span class="company-name"><?php echo YSettings::gWPML( 'theme_contact_company_name', YSettings::g( 'theme_contact_company_name' ) );?></span>
							<?php endif; ?>
							<?php if ( YSettings::gWPML( 'contact_street_address', YSettings::g( 'contact_street_address' ) ) ) : ?>
							<span class="street-address"><?php echo str_replace( "\n", "<br/>", YSettings::gWPML( 'contact_street_address', YSettings::g( 'contact_street_address' ) ) ); ?></span>
							<?php endif; ?>
							<?php if ( YSettings::gWPML( 'theme_contact_postal_code', YSettings::g( 'theme_contact_postal_code' ) ) ) : ?>
							<span class="postal-code"><?php echo YSettings::gWPML( 'theme_contact_postal_code', YSettings::g( 'theme_contact_postal_code' ) ); ?></span>
							<?php endif; ?>
						</p>
						<p>
							<?php if ( YSettings::gWPML( 'contact_email', YSettings::g( 'contact_email' ) ) ) : ?>
							<span class="email"><?php echo YSettings::gWPML( 'contact_email', YSettings::g( 'contact_email' ) ); ?></span>
							<?php endif; ?>
							<?php if ( YSettings::gWPML( 'contact_mobile', YSettings::g( 'contact_mobile' ) ) ) : ?>
							<span class="tel"><span><?php echo str_replace( "\n", "<br/>", YSettings::gWPML( 'contact_mobile', YSettings::g( 'contact_mobile' ) ) ); ?></span></span>
							<?php endif; ?>
							<?php if ( YSettings::gWPML( 'contact_phone', YSettings::g( 'contact_phone' ) ) ) : ?>
							<span class="tel"><span><?php echo str_replace( "\n", "<br/>", YSettings::gWPML( 'contact_phone', YSettings::g( 'contact_phone' ) ) ); ?></span></span>
							<?php endif; ?>
							<?php if ( YSettings::gWPML( 'contact_fax', YSettings::g( 'contact_fax' ) ) ) : ?>
							<span class="tel"><span><?php echo str_replace( "\n", "<br/>", YSettings::gWPML( 'contact_fax', YSettings::g( 'contact_fax' ) ) ); ?></span></span>
							<?php endif; ?>
						</p>
					</div>
					<?php endif; ?>	
				</div>
				<?php if (YSettings::g('contact_form_enabled', '1') == '1'): ?>
				<div class="col-sm-offset-1 col-sm-5 col-md-3 col-md-offset-0 form">
					<form id="contact-form" name="contact-form" method="post">
						<?php if( YSettings::gWPML( 'contact_form_header', YSettings::g( 'contact_form_header' ) ) ) : ?>
						<h1><?php echo YSettings::gWPML( 'contact_form_header', YSettings::g( 'contact_form_header' ) ); ?></h1>
						<?php endif; ?>
						
						<div class="input-wrapper">
							<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'contact_placeholder_name' , YSettings::g( 'contact_placeholder_name' , 'name')); ?>" name="form-name" id="form-name">
						</div>
						
						<div class="input-wrapper">
							<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'contact_placeholder_email' , YSettings::g( 'contact_placeholder_email' ,'e-mail')); ?>" name="form-email" id="form-email">
						</div>	
						
						<div class="input-wrapper">
							<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'contact_placeholder_subject', YSettings::g( 'contact_placeholder_subject', 'subject' ) ); ?>" name="form-subject" id="form-subject">
						</div>
						
						<div class="message">
							<div class="input-wrapper">
								<input type="hidden" name="form-type" value="single" />
								<textarea class="contact-form" placeholder="<?php echo YSettings::gWPML( 'contact_placeholder_text' , YSettings::g( 'contact_placeholder_text' , 'message')); ?>" name="form-message" id="form-message"></textarea>
							</div>
						</div>
						<?php if (YSettings::g('contact_captcha_enabled','1') == '1') : ?>
						<div class="message">
							<div class="input-wrapper">
								<div class="captcha-container">
									<div> 
										<input class="contact-form" type="text" placeholder="<?php echo YSettings::gWPML( 'contact_captcha_placeholder', YSettings::g( 'contact_captcha_placeholder', 'captcha' ) ); ?>" name="form-captcha" id="form-captcha" />
										<?php
										$captchaType = YSettings::g('contact_captcha_type', 'mathematic');
										$captchaStringLength = YSettings::g('contact_captcha_string_length', '6');
										$captchaParameter = 'type=' . $captchaType;

										if ($captchaType == 'string') {
											if ($captchaStringLength > 8) {
												$captchaStringLength = 8;
											}
											if ($captchaStringLength < 2) {
												$captchaStringLength = 2;
											}
											$captchaParameter .= '&length=' . (int)$captchaStringLength;
										}
										?>
										<img id="captcha" src="<?php echo THEME_INCLUDES_URI . '/securimage/securimage_show.php?' . $captchaParameter; ?>" alt="CAPTCHA" />
										<button class="refresh-captcha" data-captcha-type="<?php echo $captchaType; ?>" data-captcha-string-length="<?php echo $captchaStringLength;?>" ><i class="fa fa-refresh"></i></button>
									</div> 	
								</div>
							</div>
						</div>
						<?php endif;?>
						<?php if ( (YSettings::g('contact_terms') != '') && (YSettings::g('contact_terms') != ' ') ): ?>
							<div class="input-wrapper message">
								<input type="checkbox" name="terms" id="form-terms" /> <?php echo YSettings::gWPML( 'contact_terms', YSettings::g( 'contact_terms', '' ) ); ?>
							</div>
						<?php endif; ?>
						<div class="alert alert-success hidden"><?php echo YSettings::gWPML( 'contact_placeholder_message_send', YSettings::g( 'contact_placeholder_message_send' ) ); ?></div>
						<div class="alert alert-danger hidden"><?php echo YSettings::gWPML( 'contact_placeholder_message_fail', YSettings::g( 'contact_placeholder_message_fail', 'Error occurred! Try again later!' ) ); ?></div>

						<div>
							<input type="submit" value="<?php echo YSettings::gWPML( 'contact_placeholder_button', YSettings::g( 'contact_placeholder_button', 'send' ) ); ?>" class="buttonform">
						</div>	
					</form>
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php get_template_part('content', 'pagefooter'); ?>
	</div>
<?php get_footer(); ?>