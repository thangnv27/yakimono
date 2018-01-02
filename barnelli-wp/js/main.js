//jQuery easing 1.3
jQuery.easing.jswing=jQuery.easing.swing;
jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,a,c,b,d){return jQuery.easing[jQuery.easing.def](e,a,c,b,d)},easeInQuad:function(e,a,c,b,d){return b*(a/=d)*a+c},easeOutQuad:function(e,a,c,b,d){return-b*(a/=d)*(a-2)+c},easeInOutQuad:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a+c:-b/2*(--a*(a-2)-1)+c},easeInCubic:function(e,a,c,b,d){return b*(a/=d)*a*a+c},easeOutCubic:function(e,a,c,b,d){return b*((a=a/d-1)*a*a+1)+c},easeInOutCubic:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a+c:
b/2*((a-=2)*a*a+2)+c},easeInQuart:function(e,a,c,b,d){return b*(a/=d)*a*a*a+c},easeOutQuart:function(e,a,c,b,d){return-b*((a=a/d-1)*a*a*a-1)+c},easeInOutQuart:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a*a+c:-b/2*((a-=2)*a*a*a-2)+c},easeInQuint:function(e,a,c,b,d){return b*(a/=d)*a*a*a*a+c},easeOutQuint:function(e,a,c,b,d){return b*((a=a/d-1)*a*a*a*a+1)+c},easeInOutQuint:function(e,a,c,b,d){return 1>(a/=d/2)?b/2*a*a*a*a*a+c:b/2*((a-=2)*a*a*a*a+2)+c},easeInSine:function(e,a,c,b,d){return-b*Math.cos(a/
d*(Math.PI/2))+b+c},easeOutSine:function(e,a,c,b,d){return b*Math.sin(a/d*(Math.PI/2))+c},easeInOutSine:function(e,a,c,b,d){return-b/2*(Math.cos(Math.PI*a/d)-1)+c},easeInExpo:function(e,a,c,b,d){return 0==a?c:b*Math.pow(2,10*(a/d-1))+c},easeOutExpo:function(e,a,c,b,d){return a==d?c+b:b*(-Math.pow(2,-10*a/d)+1)+c},easeInOutExpo:function(e,a,c,b,d){return 0==a?c:a==d?c+b:1>(a/=d/2)?b/2*Math.pow(2,10*(a-1))+c:b/2*(-Math.pow(2,-10*--a)+2)+c},easeInCirc:function(e,a,c,b,d){return-b*(Math.sqrt(1-(a/=d)*
a)-1)+c},easeOutCirc:function(e,a,c,b,d){return b*Math.sqrt(1-(a=a/d-1)*a)+c},easeInOutCirc:function(e,a,c,b,d){return 1>(a/=d/2)?-b/2*(Math.sqrt(1-a*a)-1)+c:b/2*(Math.sqrt(1-(a-=2)*a)+1)+c},easeInElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(1==(a/=d))return c+b;f||(f=0.3*d);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return-(g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f))+c},easeOutElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(1==
(a/=d))return c+b;f||(f=0.3*d);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInOutElastic:function(e,a,c,b,d){var e=1.70158,f=0,g=b;if(0==a)return c;if(2==(a/=d/2))return c+b;f||(f=d*0.3*1.5);g<Math.abs(b)?(g=b,e=f/4):e=f/(2*Math.PI)*Math.asin(b/g);return 1>a?-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+c:0.5*g*Math.pow(2,-10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInBack:function(e,a,c,b,d,f){void 0==
f&&(f=1.70158);return b*(a/=d)*a*((f+1)*a-f)+c},easeOutBack:function(e,a,c,b,d,f){void 0==f&&(f=1.70158);return b*((a=a/d-1)*a*((f+1)*a+f)+1)+c},easeInOutBack:function(e,a,c,b,d,f){void 0==f&&(f=1.70158);return 1>(a/=d/2)?b/2*a*a*(((f*=1.525)+1)*a-f)+c:b/2*((a-=2)*a*(((f*=1.525)+1)*a+f)+2)+c},easeInBounce:function(e,a,c,b,d){return b-jQuery.easing.easeOutBounce(e,d-a,0,b,d)+c},easeOutBounce:function(e,a,c,b,d){return(a/=d)<1/2.75?b*7.5625*a*a+c:a<2/2.75?b*(7.5625*(a-=1.5/2.75)*a+0.75)+c:a<2.5/2.75?
b*(7.5625*(a-=2.25/2.75)*a+0.9375)+c:b*(7.5625*(a-=2.625/2.75)*a+0.984375)+c},easeInOutBounce:function(e,a,c,b,d){return a<d/2?0.5*jQuery.easing.easeInBounce(e,2*a,0,b,d)+c:0.5*jQuery.easing.easeOutBounce(e,2*a-d,0,b,d)+0.5*b+c}});

jQuery('document').ready(function(jQuery) {

	initVideos();

	if (jQuery('.dynamic-content').hasClass('menu-wrapper')) {
		initScrollbar(scrollbarColorMenu);
	} else {
		initScrollbar(scrollbarColor);
	}

	var transition = function(newEl) {
		var oldEl = this;
		newEl.hide();

		jQuery('.hover-active').removeClass('hover-active');

		oldEl.transition({opacity: 0}, 500, function() {
			oldEl.replaceWith(newEl);
			animateDarkBg(newEl.data('menuType'));
			newEl.show().css({opacity: 0}, 500);
			oldEl.transition({opacity: 1}, 500);
			newEl.transition({opacity: 1}, 500);
			jQuery('html').removeClass('loading');
			animateBlog('in');
			animateMenu();
			slider('on');
			initMap();
			initCarousel();
			refreshMenu(newEl);
			addGrayFilter();
			updatePadding();
			naviFloat();
			reloadPostColorBox();
			setupEventCalendar();
			recalculateMenuHeight();
			initVideos();
			jQuery(window).trigger('reload.tubular');
			jQuery(window).scrollTop(0);
			changeScrollbarColor(newEl);

			if (scrollbarVisibility && !scrollbarSystem) {
				jQuery('html').getNiceScroll().resize();
			}
		});
	};

	if (!disableDjax) {
		jQuery(window).bind('djaxClick', function(e, data) {
			hideDarkBg();
			jQuery('.dynamic-content').transition({opacity:0}, function() {
				slider('off');
				jQuery('html').addClass('loading');
			});
		});

		jQuery('body').djax('.dynamic-content', ['wp-login', 'wp-admin', '.jpg', 'jp-carousel'], transition);

		jQuery(window).bind('djaxLoad', function(e, params) {
			slider('off');
			hideDarkBg();
		});
	}

	// jQuery('.content-link, .subnav a').click(function() {
	// 	if (jQuery('body').hasClass('splash')) {
	// 		jQuery(".hover-active").removeClass("hover-active");
	// 	}
	// });

	//jQuery('.flyout-menu').css('padding-top', jQuery('.sm-navbar').height());

	jQuery('#mobile-home').click(function(e) {
		e.preventDefault();
		if (jQuery('body').hasClass('mobile-nav-show')) {
			jQuery('body').removeClass('mobile-nav-show');
		}
	});

	jQuery('.reorder a').click(function(e) {
		e.preventDefault();
		if (jQuery('body').hasClass('mobile-nav-show')) {
			jQuery(this).parent().removeClass('flyout-open');
			jQuery('#flyout-container').animate({ height : 0}, function(){
				jQuery('#flyout-container .open').css('height', 0).removeClass('open');
				jQuery('#flyout-container .subnav-open').removeClass('subnav-open');
			});

			jQuery('body').removeClass('mobile-nav-show');
		} else {
			jQuery(this).parent().addClass('flyout-open');
			jQuery('#flyout-container').animate({ height : jQuery('#flyout-container #menu-mobile > li').height() * jQuery('#flyout-container #menu-mobile > li').length}, function(){
				jQuery('#flyout-container').css('height', 'auto');
			});
			jQuery('body').addClass('mobile-nav-show');
		}
	});

	var oldVideo = '';

	jQuery("#fullscreenVideo").bind("play", function() {
		jQuery('.video-controls i').removeClass('fa fa-play').addClass('fa fa-pause');
	});

	jQuery("#fullscreenVideo").bind("ended", function() {
		if (slideVideoStillImage && !slideVideoRepeat) {
			oldVideo = jQuery(".fullscreen-video").html();
			jQuery(".video-controls i").removeClass('fa fa-pause').addClass('fa fa-play reload');
			jQuery( ".fullscreen-video" ).replaceWith( '<div class="fullscreen-image" style="height: 100%;width: 100%;position: absolute;background-size: cover;background-repeat: no-repeat;background-position: center center;background-image:url('+slideVideoStillImage+');"></div>' );
		}
	});

	jQuery(document).on('click', '#fullscreenVideo, .video-controls i', function(e) {
		if (jQuery(this).hasClass('reload')) {
			jQuery( ".fullscreen-image" ).replaceWith('<div class="fullscreen-video">'+oldVideo+'</div>');

			jQuery("#fullscreenVideo").bind("ended", function() {
				if (slideVideoStillImage && !slideVideoRepeat) {
					oldVideo = jQuery(".fullscreen-video").html();
					jQuery(".video-controls i").addClass('fa fa-play reload');
					jQuery( ".fullscreen-video" ).replaceWith( '<div class="fullscreen-image" style="height: 100%;width: 100%;position: absolute;background-size: cover;background-repeat: no-repeat;background-position: center center;background-image:url('+slideVideoStillImage+');"></div>' );
				}
			});
		}

		var video = jQuery('#fullscreenVideo').get(0);
		if (video.paused) {
			jQuery('.video-controls i').removeClass('fa fa-play').addClass('fa fa-pause');
			video.play();
		} else {
			video.pause();
			jQuery('.video-controls i').removeClass('fa fa-pause').addClass('fa fa-play');
		}
	});

	if (!disableDjax) {
		jQuery('.menu-item a').on('click',function(e) {
			if (!jQuery(this).data('djax-exclude')) {

				//turn off amazing menu;
				if (turnOffAmazingMenu) {
					jQuery('.reorder').removeClass('flyout-open');
					jQuery('#flyout-container').animate({ height : 0}, function() {
						jQuery('#flyout-container .open').css('height', 0).removeClass('open');
						jQuery('#flyout-container .subnav-open').removeClass('subnav-open');
						jQuery('body').removeClass('mobile-nav-show');
					});
				}
			}
		});
	}

	jQuery('.flyout-menu .open-children').click(function(e) {
		e.preventDefault();
		var that = this;
		if(jQuery(this).next('.subnav').length > 0) {
			//has submenu
			if(jQuery(this).next('.subnav').hasClass('open')) {
				
				jQuery(this).parent().removeClass('subnav-open');
				
				jQuery(this).next('.subnav').animate({height : 0 }, function() {
					jQuery(that).next('.open').removeClass('open');
					jQuery(that).next('.subnav').find('.open').css('height', 0).removeClass('open');
					jQuery(that).next('.subnav').find('.subnav-open').removeClass('subnav-open');
				});
			} else {
				jQuery(this).parent().addClass('subnav-open');
				jQuery(this).next('.subnav').animate({ height : jQuery(this).next('.subnav').children('li').height() * jQuery(this).next('.subnav').children('li').length}, function(){
					jQuery(that).next('.subnav').css('height', 'auto').addClass('open');
				});
			}
		}
	});

	jQuery('.main-nav li a').click(function() {
		jQuery('.main-nav .active').removeClass('active');
		jQuery('.main-nav .no-icon-active').removeClass('no-icon-active');
		
		if (!jQuery(this).parent().parent().hasClass('no-icon')) {
			jQuery(this).addClass('active');
		} else {
			jQuery(this).parent().parent().addClass('no-icon-active');	
		}
		
	});

	jQuery('.home-switcher .fa').click(function() {
		if(jQuery('.home-switcher ul').is(':visible')) {
			jQuery('.home-switcher ul').transition({opacity: 0}, function() {
				jQuery(this).hide();
			});
		} else {
			jQuery('.home-switcher ul').show().transition({opacity: 1});
		}
	});

	jQuery(".group1").colorbox({rel:'group1'});

	jQuery('.main-nav li').hover(function() {
		clearTimeout(jQuery(this).data('timeout'));
		jQuery(this).css('overflow', 'visible');
		var that = this;
		var t = setTimeout(function() {
			jQuery(that).addClass('hover-active');
		}, 100);
		jQuery(that).data('timeout-in', t);
	}, function() {
		clearTimeout(jQuery(this).data('timeout-in'));
		var that = this;
		jQuery(that).removeClass("hover-active");
		var t = setTimeout(function() {
			jQuery(that).css('overflow', 'hidden');
		}, 400);

		jQuery(that).data('timeout', t);
	});

	/********dynamic li width in navbar/navbar center************/
	if (jQuery('.menu-image').length > 0 ) {
		var li_numb = jQuery('.navbar .main-nav >li').length -1;
		var li_width = 70/li_numb;
		jQuery('.navbar .main-nav >li').css('width', ''+li_width+'%');
	} else {
		var li_width2 = 100/jQuery('.navbar .main-nav >li').length;
		jQuery('.navbar .main-nav >li').css('width', ''+li_width2+'%' );
	}

	/**************navbar hover******************/
	jQuery('.navbar .main-nav >li').hover(function() {
		if (!jQuery(this).hasClass('no-icon')) {
			jQuery(this).find('div >a').addClass('current');	
		}
	}, function() {
		if (!jQuery(this).hasClass('no-icon')) {
			jQuery(this).find('div >a').removeClass('current');
		}
	});


	/***************** Search ******************/
	var $placeholder = $('#search input[type=text]').attr('data-placeholder');
	var logoHeight = parseInt($('#header-outer').attr('data-logo-height'));

	$('body').on('click', '#search-btn a', function() {
		return false;
	});
	

	$('body').on('mousedown', '#search-btn a', function() {
		if ($(this).hasClass('open-search')) {
			return false;
		}

		$('#search-outer').stop(true).fadeIn(600, 'easeOutExpo');

		$('body #search-outer > #search input[type="text"]').css({
			'top' : ($('#search-outer').height() / 2) - ($('#search-outer > #search input[type="text"]').height() / 2)
		});
		
		$('#search input[type=text]').focus();
		
		if ($('#search input[type=text]').attr('value') == $placeholder) {
			$('#search input[type=text]').setCursorPosition(0);
		}

		if ($('body').hasClass('ascend')) {
			searchFieldCenter();
		}

		$(this).toggleClass('open-search');

		$('.slide-out-widget-area-toggle a.open:not(.animating)').trigger('click');

		return false;
	});

	$('body').on('keydown', '#search input[type=text]', function() {
		if ($(this).attr('value') == $placeholder) {
			$(this).attr('value', '');
		}
	});

	$('body').on('keyup', '#search input[type=text]', function() {
		if ($(this).attr('value') == '') {
			$(this).attr('value', $placeholder);
			$(this).setCursorPosition(0);
		}
	});

	$('body').on('click', '#close', function() {
		closeSearch();
		$('#search-btn a').removeClass('open-search');

		return false;
	});

	$('body').on('blur', '#search-box input[type=text]', function(e) {
		closeSearch();
		$('#search-btn a').removeClass('open-search');
	});

	function closeSearch() {
		$('#search-outer').stop(true).fadeOut(450, 'easeOutExpo');
	}

	//mobile search
	$('body').on('click', '#mobile-menu #mobile-search .container a#show-search', function() {
		$('#mobile-menu .container > ul').slideUp(500);

		return false;
	});

	/***************** Search ******************/

});

jQuery(window).load(function() {
	animateDarkBg(jQuery('.barnelli-menu').parent().data('menuType'));
	refreshMenu(jQuery(".dynamic-content"));
	initDatePicker();
	animateBlog('in');
	animateMenu(); 
	scrollContent();
	slider('on');
	initCarousel();
	initMap();
	addGrayFilter();
	updatePadding();
	naviFloat();
	reloadPostColorBox();
	recalculateMenuHeight();
	setupEventCalendar();
	//initVideos();
});

jQuery(window).resize(jQuery.debounce(250, function() {
	updatePadding();
}));

/* Videos */
function initVideos() {
	if (jQuery('.video_wrapper').length > 0) {
		var videoId = jQuery('.video_wrapper').data('video-id');
		var videoSkip = jQuery('.video_wrapper').data('video-skip');

		jQuery('.video_wrapper').tubular({videoId: videoId, repeat: slideVideoRepeat, mute: slideVideoMute, start: videoSkip});
	}
}

function changeScrollbarColor(el) {
	if (!detectIE()) {
		var color = scrollbarColor;

		if (el && el.hasClass('menu-wrapper')) {
			color = scrollbarColorMenu;
		}

		jQuery('#ascrail2000 div').css('background-color', color).css('border-color', color);
	}
}

function initScrollbar(color) {
	if (!detectIE()) {
		if (scrollbarSystem) return;

		var options = {
			cursorwidth: scrollbarWidth,
			cursorcolor: color,
			cursorborder: '1px solid ' + color,
			autohidemode: !scrollbarVisibility,
		};

		try {
			jQuery("html").niceScroll(options);
		} catch(e) {

		}
	}
}

function detectIE() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    if (trident > 0) {
        // IE 11 (or newer) => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    // other browser
    return false;
}

function recalculateMenuHeight() {
	var h = jQuery(window).height();

	if (jQuery('.Menu-wrapper').length) {
		jQuery('.dynamic-content').css('min-height', h+'px');
	}
}

function setupEventCalendar() {
	if (jQuery('#yocalendar').length) {
		setupCalendar();
		var types = {"grid" : 0, "list" : 1, "year" : 2};
		reloadCalendar(types[displayOptions['default_calendar_view']]);
	}
}

function reloadPostColorBox() {
	if (jQuery('a.gallery').length) {
		jQuery('a.gallery').colorbox({transition: 'fade', maxWidth: '80%', maxHeight: '80%', closeButton:true, close: '', next: '<i class="fa fa-angle-right"></i>', previous: '<i class="fa fa-angle-left"></i>'});	
	}
	if (jQuery('a.food-menu-gallery').length) {
		jQuery('a.food-menu-gallery').colorbox({transition: 'fade', maxWidth: '80%', maxHeight: '80%', closeButton:true, close: '', next: '<i class="fa fa-angle-right"></i>', previous: '<i class="fa fa-angle-left"></i>'});	
	}
}

function updatePadding() {
	if (jQuery('.navbar').height() == 0) {
		console.log('add padding top ' + jQuery('.sm-navbar').height());
		jQuery('.padding-wrapper').css('padding-top', jQuery('.sm-navbar').height());
	} else {
		console.log('add padding top ' + jQuery('.navbar').height());
		jQuery('.padding-wrapper').css('padding-top', jQuery('.navbar').height());
	}	
}

function checkOpeningTime() {

	jQuery('#date-error').remove();

	var day = jQuery('#select-day').val();
	var month = jQuery('#select-month').val();
	var year = jQuery('#select-year').val();

	var minutes = jQuery('#select-minutes').val();
	var hours = jQuery('#select-hour').val();

	if (day<10) day = '0'+day;
	if (month<10) month = '0'+month;

	var ampm = '';

	if (jQuery('#ampm').length) {
		ampm = jQuery('.select-time.part').text();
	}

	if ((ampm == 'am') && (hours == '12')) {
		hours = '00';
	}

	if ((ampm == 'pm')) {
		if (parseInt(hours, 10) < 12) {
			hours = parseInt(hours, 10) + 12;
		}
	}

	var date = year + '-' + month + '-' + day;
	var time = hours + ':' + minutes + ':00';

	jQuery.ajax({
		url: sendReservationFormMessage.ajaxUrl,
		type: 'POST',
		dataType: 'json',
		data: { action: 'check-opening-time', date: date, time: time }
	}).done(function(responseData) {
		jQuery('.opening').text(responseData.openings);
		var reg = new RegExp("[0-9]:[0-9]");

		if (reg.test(jQuery('.opening').text())) {
			jQuery('.opening-description').show();
		} else {
			jQuery('.opening-description').hide();
		}

		if(responseData.status === true) {
			jQuery('div.select-time.day, div.select-time.month, div.select-time.year, div.select-time.hour, div.select-time.minutes, div.select-time.part').removeClass('error');
			jQuery('#date-error').remove();
		} else {
			jQuery('div.select-time.day, div.select-time.month, div.select-time.year, div.select-time.hour, div.select-time.minutes, div.select-time.part').addClass('error');
			if (additionalRevervationInfo) {
				jQuery('.select-date').append('<small id="date-error" class="error">'+dateValidationError+'</small>');
			}
		}
	});
	
}

function initDatePicker() {
	jQuery('#frame').delegate('.select-time.part', 'click', function() {
		if(jQuery(this).html() == 'pm') {
			jQuery(this).html('am');
		} else {
			jQuery(this).html('pm');
		}

		checkOpeningTime();
	});

	jQuery('#frame').delegate('#select-day', 'change', function() {
		jQuery('.select-time.day span').html(jQuery(this).val());
		checkOpeningTime();
	});

	jQuery('#frame').delegate('#select-month', 'change', function() {
		jQuery('.select-time.month span').html(jQuery( "#select-month option:selected" ).data('name'));
		daysInCurrentMonth = daysInMonth(jQuery(this).val(), jQuery('.select-time.year span').html());
		generateDays(daysInCurrentMonth);
		selectDay(jQuery('.select-time.day span').html());
	});

	jQuery('#frame').delegate('#select-year', 'change', function() {
		jQuery('.select-time.year span').html(jQuery(this).val());
		checkOpeningTime();
	});

	jQuery('#frame').delegate('#select-hour', 'change', function() {
		jQuery('.select-time.hour span').html(jQuery(this).val());
		checkOpeningTime();
	});

	jQuery('#frame').delegate('#select-minutes', 'change', function() {
		jQuery('.select-time.minutes span').html(jQuery(this).val());
		checkOpeningTime();
	});
}

function selectDay(day) {
	jQuery("#select-day").val(day);
	jQuery('.select-time.day span').html(day);
	checkOpeningTime();
}

function generateDays(n) {
	jQuery('#select-day').html('');
	for (var i=1;i<=n; i++) {
		jQuery('#select-day').append('<option value="'+i+'">'+i+'</option>');
	}
}

function daysInMonth(month,year) {
	return new Date(year, month, 0).getDate();
}

function shuffleArray(array) {
	for (var i = array.length - 1; i > 0; i--) {
		var j = Math.floor(Math.random() * (i + 1));
		var temp = array[i];
		array[i] = array[j];
		array[j] = temp;
	}
	return array;
}

function animateBlog(direction) {

	direction = direction == "in" ? direction : "out";

	var sizes = new Array();
	var columns = new Array();
	var items = jQuery('.square').length;

	jQuery('.square').each(function(i, e) {
		columns[i] = jQuery(this);
		sizes[i] = columns[i].length;
	});

	columns = shuffleArray(columns);
	var max = Math.max.apply(null, sizes);

	for (var item = 0; item < max; item++) {

		jQuery(columns).each(function(column) {

			if (columns[column][item] !== undefined) {

				if (direction == "in") { 
					var $item = jQuery(columns[column][item]),
					timeout = item * columns.length + column;

					setTimeout(function() {
						$item.addClass('is-loaded');
					}, 200 * timeout);
				} else {

					var $item = jQuery(columns[column][item]), timeout = items - (item * columns.length + column);

					setTimeout(function() {
						$item.removeClass('is-loaded');
					}, 200 * timeout);
				}
			}
		});
	}
}

function shareThis(url) {
	var w = 460;
	var h = 500;
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	window.open(url, "shareWindow", "status=1,height=" + h + ",width=" + w + ",left=" + left + ",top=" + top + ",resizable=0");
}

function updateScrollbar() {
}

function scrollContent() {
//	
//	if (jQuery('html').hasClass('no-touch')) {
//		jQuery('#frame').sly({
//			speed: 300,
//			easing: 'easeOutExpo',
//			scrollBar: jQuery('.scrollbar'),
//			scrollBy: 20,
//			dragHandle: 1,
//			dynamicHandle: 1,
//			clickBar: 1
//		});	
//	}
}

function addGrayFilter(){
	if (jQuery.browser.msie) {
		jQuery('.base-photo').addClass('ie-grayscale');
	}

	if (jQuery.browser.mozilla) {
		jQuery('.base-photo').addClass('ff-grayscale');
	}
}

function animateMenu() {
	if (jQuery('.barnelli-menu').length > 0) {
		setTimeout(function() {
			jQuery('.animate-in').removeClass('animate-in-fade');
		}, 600);
	}
}

function animateDarkBg(menuType) {
	if (jQuery('.barnelli-menu').length > 0) {
		
		jQuery('body').addClass('dark-bg');
		jQuery('.menu-bg.'+menuType+'-bg').transition({opacity: 0},0, function() {
			jQuery('.menu-bg.'+menuType+'-bg').show().transition({opacity: 1});
		});
	} 
	
	if ( jQuery('#restaurant').length > 0) {

		jQuery('body').addClass('dark-bg');
		jQuery('#restaurant-bg').transition({opacity: 0},0, function() {
			jQuery('#restaurant-bg').show().transition({opacity: 1});
		});
	}
}

function hideDarkBg() {
	jQuery('body').removeClass('dark-bg');
	jQuery('.menu-bg:visible').transition({opacity: 0}, function() {
		jQuery('.menu-bg:visible').hide();
	});
	jQuery('#restaurant-bg').transition({opacity: 0}, function() {
		jQuery('#restaurant-bg').hide();
	});
}

function naviFloat() {
	if (navMenuAlwaysOnTop) {
		jQuery('.social-share.top').css({'top':'auto', 'bottom': 20});
		jQuery('.navbar').css({opacity: 1});
	} else {
		if (jQuery('.static-elements').length > 0) {
			if (!jQuery('body').hasClass('splash')) {
				jQuery('.navbar').transition({y: '-100%'}, function() {
					jQuery(this).css({'bottom': 0, 'top': 'auto'}).transition({y: '100%'}, 0).transition({y: 0}, function() {
						jQuery('body').addClass('splash');
						jQuery('.navbar').animate({ opacity: 1}, 500);
					});
				});	
			}
		} else {
			jQuery('.navbar').animate({ opacity: 1}, 500);
			if (jQuery('body').hasClass('splash')) {
				jQuery('.navbar').transition({y: '100%'}, function() {
					jQuery(this).css({'bottom': 'auto', 'top': 0}).transition({y: '-100%'}, 0).transition({y: 0}, function() {
						jQuery('body').removeClass('splash');
					});
				});
			}
		}
	}
}

//googleMap
function initMap() {
	if (jQuery('#map').length > 0) {
		initializeMap();
	}
}

function slider(mode) {
	if (mode === 'on' && (jQuery('.fullscreen-slider').length > 0)) {
		jQuery.fn.superslides.fx = jQuery.extend({
			fadeTransition: function(orientation, complete) {
				var that = this,
					$children = that.$container.children(),
					$outgoing = $children.eq(orientation.outgoing_slide),
					$target = $children.eq(orientation.upcoming_slide);
				$target.css({
					left: this.width,
					opacity: 1,
					display: 'block'
				});

				jQuery('.slides-container li:eq(' + orientation.outgoing_slide + ')').removeClass('current-slide');
				jQuery('.slides-container li:eq(' + orientation.upcoming_slide + ')').addClass('current-slide');

				$target.transition({
					scale: 1
				}, 0);

				if (that.$container.children('li').length > 1) {

					if (orientation.outgoing_slide >= 0) {
						$outgoing.transition({
							opacity: 0,
							scale: 1.5,
						}, that.options.animation_speed, function() {
							if (that.size() > 1) {
								$children.eq(orientation.upcoming_slide).css({
									zIndex: 2
								});
								if (orientation.outgoing_slide >= 0) {
									$children.eq(orientation.outgoing_slide).css({
										opacity: 1,
										display: 'none',
										zIndex: 0
									});
								}
							}
							complete();
						});
					} else {
						$target.css({
							zIndex: 2
						});
						complete();
					}
				} else {
					complete();
				}
			}
		}, jQuery.fn.superslides.fx);

		jQuery('#slides').superslides({
			hashchange: false,
			animation: animationType,
			animation_easing: animationEasing,
			play: slideDuration * 1000,
			animation_speed: animationSpeed * 1000,
			inherit_height_from: 'body',
		});

		if (slidePauseOnHover) {
			jQuery('#slides').on('mouseenter', function() {
				jQuery(this).superslides('stop');
			});
			jQuery('#slides').on('mouseleave', function() {
				jQuery(this).superslides('start');
			});
		}

		jQuery('#slides').imagesLoaded(function() {
			jQuery('.fullscreen-slider').transition({
				opacity: 1
			});
		});

		jQuery('.slides-navigation .next').on('click', function() {
			jQuery('#slides').superslides('animate', 'next');
		});

		jQuery('.slides-navigation .prev').on('click', function() {
			jQuery('#slides').superslides('animate', 'prev');
		});

		jQuery(window).resize();
	}
}

function refreshMenu(element) {
	var wrapperClass = element.attr('class').replace('   ', '  ').replace('  ', ' ').split(' ');
	jQuery(".main-nav a").removeClass("active");
	if (wrapperClass[1]) {
		var $el = jQuery(".main-nav ."+wrapperClass[1]);

		if (!$el.parent().parent().hasClass('no-icon')) {
			$el.addClass("active");
		} else {
			$el.parent().parent().addClass('no-icon-active');
		}
	}
}

function initCarousel() {
	var figureCount=jQuery('#slider-res .item').length;

	jQuery("#slider-res").owlCarousel({
		pagination:false,
		slideSpeed:2000,
		paginationSpeed:2000,
		stopOnHover:true,
		singleItem:true,
		transitionStyle:'fade',
		autoPlay:4000
	});
	var carousel=jQuery('#slider-res').data('owlCarousel');
	if(figureCount===1){
		carousel.stop();
	}

	jQuery(".owl-carousel").each(function (index) {
		var slideDuration = jQuery(this).data('slide-duration') * 1000;

		jQuery(this).owlCarousel({
			singleItem:true,
			stopOnHover:true,
			autoPlay: slideDuration,
			afterInit : function() {
				var that = this;
				that.owlControls.prependTo(jQuery(".controls"));
			}
		});
	});

}

/* ========================================================================
 * Bootstrap: collapse.js v3.1.1
 * http://getbootstrap.com/javascript/#collapse
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // COLLAPSE PUBLIC CLASS DEFINITION
  // ================================

  var Collapse = function (element, options) {
    this.$element      = $(element)
    this.options       = $.extend({}, Collapse.DEFAULTS, options)
    this.transitioning = null

    if (this.options.parent) this.$parent = $(this.options.parent)
    if (this.options.toggle) this.toggle()
  }

  Collapse.DEFAULTS = {
    toggle: true
  }

  Collapse.prototype.dimension = function () {
    var hasWidth = this.$element.hasClass('width')
    return hasWidth ? 'width' : 'height'
  }

  Collapse.prototype.show = function () {
    if (this.transitioning || this.$element.hasClass('in')) return

    var startEvent = $.Event('show.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    var actives = this.$parent && this.$parent.find('> .panel > .in')

    if (actives && actives.length) {
      var hasData = actives.data('bs.collapse')
      if (hasData && hasData.transitioning) return
      actives.collapse('hide')
      hasData || actives.data('bs.collapse', null)
    }

    var dimension = this.dimension()

    this.$element
      .removeClass('collapse')
      .addClass('collapsing')[dimension](0)

    this.transitioning = 1

    var complete = function (e) {
      if (e && e.target != this.$element[0]) {
        this.$element
          .one($.support.transition.end, $.proxy(complete, this))
        return
      }
      this.$element
        .removeClass('collapsing')
        .addClass('collapse in')[dimension]('auto')
      this.transitioning = 0
      this.$element.trigger('shown.bs.collapse')
    }

    if (!$.support.transition) return complete.call(this)

    var scrollSize = $.camelCase(['scroll', dimension].join('-'))

    this.$element
      .one($.support.transition.end, $.proxy(complete, this))
      .emulateTransitionEnd(350)[dimension](this.$element[0][scrollSize])
  }

  Collapse.prototype.hide = function () {
    if (this.transitioning || !this.$element.hasClass('in')) return

    var startEvent = $.Event('hide.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    var dimension = this.dimension()

    this.$element[dimension](this.$element[dimension]())[0].offsetHeight

    this.$element
      .addClass('collapsing')
      .removeClass('collapse')
      .removeClass('in')

    this.transitioning = 1

    var complete = function (e) {
      if (e && e.target != this.$element[0]) {
        this.$element
          .one($.support.transition.end, $.proxy(complete, this))
        return
      }
      this.transitioning = 0
      this.$element
        .trigger('hidden.bs.collapse')
        .removeClass('collapsing')
        .addClass('collapse')
    }

    if (!$.support.transition) return complete.call(this)

    this.$element
      [dimension](0)
      .one($.support.transition.end, $.proxy(complete, this))
      .emulateTransitionEnd(350)
  }

  Collapse.prototype.toggle = function () {
    this[this.$element.hasClass('in') ? 'hide' : 'show']()
  }


  // COLLAPSE PLUGIN DEFINITION
  // ==========================

  var old = $.fn.collapse

  $.fn.collapse = function (option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.collapse')
      var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option)

      if (!data && options.toggle && option == 'show') option = !option
      if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.collapse.Constructor = Collapse


  // COLLAPSE NO CONFLICT
  // ====================

  $.fn.collapse.noConflict = function () {
    $.fn.collapse = old
    return this
  }


  // COLLAPSE DATA-API
  // =================

jQuery(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function (e) {
    var $this   = jQuery(this), href
    var target  = $this.attr('data-target')
        || e.preventDefault()
        || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') //strip for ie7
    var $target = jQuery(target)
    var data    = $target.data('bs.collapse')
    var option  = data ? 'toggle' : $this.data()
    var parent  = $this.attr('data-parent')
    var $parent = parent && jQuery(parent)

    if (!data || !data.transitioning) {
    	if ($parent) $parent.find('[data-toggle="collapse"][data-parent="' + parent + '"]').not($this).addClass('collapsed')
    	$this[$target.hasClass('in') ? 'addClass' : 'removeClass']('collapsed')
    }

    $target.collapse(option)
  });

}(jQuery);
