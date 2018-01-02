<?php get_template_part( 'content', 'static' ); ?>
<?php
$detect = new Barnelli_Mobile_Detect();
if ( (YSettings::g('video_mobile_image_enabled', '0') == '1') && $detect->isMobile() ) : ?>
	<div class="fullscreen-image" style="height: 100%;width: 100%;position: absolute;background-size: cover;background-repeat: no-repeat;background-position: center center;background-image:url('<?php echo YSettings::g('video_mobile_image', '0'); ?>');"></div>
<?php else: ?>
<?php if (YSettings::g('slider_video_type', 'youtube') == 'youtube') : ?>
<div class="fullscreen-video">
	<div class="video_wrapper" data-video-id="<?php echo barnelli_getYoutubeId(YSettings::g('slider_video_url', ''));?>" data-video-skip="<?php echo YSettings::g('slider_video_skip', '0'); ?>"></div>
</div>
<?php else: ?>
<?php $videoAutoplay = (YSettings::g('slider_video_auto_play', '1') == '1') ? 'autoplay' : ''; ?>
<?php $videoMute = (YSettings::g('slider_video_mute', '1') == '1') ? 'muted' : ''; ?>
<?php $videoRepeat = (YSettings::g('slider_video_repeat', '1') == '1') ? 'loop' : ''; ?>
<div class="fullscreen-video">
	<video id="fullscreenVideo" width="100%" height="100%" <?php echo $videoAutoplay; ?> <?php echo $videoMute; ?> <?php echo $videoRepeat; ?>>
    <source src="<?php echo YSettings::g('slider_video_self_hosted_mp4', ''); ?>" type="video/mp4">
    <source src="<?php echo YSettings::g('slider_video_self_hosted_webm', ''); ?>" type="video/webm">
    <source src="<?php echo YSettings::g('slider_video_self_hosted_ogg', ''); ?>" type="video/ogg">
    Your browser does not support HTML5 video.
  </video>
</div>
<div style="display:none"><img src="<?php echo YSettings::g('slider_video_image', ''); ?>" /></div>
<div class="video-controls"><i class="fa fa-play"></i></div>
<?php endif; ?>
<?php endif; ?>
<script>
//Slider vars
var slideDuration = <?php echo ((int)YSettings::g('slider_duration', 5)); ?>;
var slidePauseOnHover = <?php echo (YSettings::g('slider_pause', '1') == '1') ? 'true' : 'false'; ?>;
var slideVideoRepeat = <?php echo (YSettings::g('slider_video_repeat', '1') == '1') ? 'true' : 'false'; ?>;
var slideVideoMute = <?php echo (YSettings::g('slider_video_mute', '1') == '1') ? 'true' : 'false'; ?>;
var slideVideoAutoPlay = <?php echo (YSettings::g('slider_video_auto_play', '1') == '1') ? 'true' : 'false'; ?>;
var slideVideoStillImage = <?php echo (YSettings::g('slider_video_image', 'false') != '') ? "'".YSettings::g('slider_video_image', 'false')."'" : 'false' ?>;
var animationSpeed = <?php echo ((int)YSettings::g('slider_transition_duration', 2)); ?>;
var numberOfSlides = <?php echo ((int)YSettings::g('slider_post_count', 3)); ?>;
var animationType = '<?php echo YSettings::g('slider_animation_type', 'fadeTransition'); ?>';
var animationEasing = '<?php echo YSettings::g('slider_animation_easing', 'linear'); ?>';
</script>