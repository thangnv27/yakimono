function setHeader() {
	jQuery('#event-header').css('opacity', 0);

	if(calendarType == CALENDAR_YEAR) {
		jQuery('#event-header').html( currentYear);
	} else {
		jQuery('#event-header').html(months[currentMonth] + ' ' + currentYear);
	}

	jQuery('#event-header').animate({opacity: 1});

	if(jQuery('.yocalendar-overlay').length == 0) {
		jQuery('body').append('<div class="yocalendar-overlay ready"><div class="yocalendar-overlay-close"></div><div class="yocalendar-wrapper"><div class="close-button"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></div><div class="yocalendar-wrapper-center"><div class="slidee yocalendar-carousel"></div></div></div></div>');		
	}
}

function setCalendarType(type) {
	calendarType = CALENDAR_GRID;

	switch(type) {
		case 'list':
			calendarType = CALENDAR_LIST;
			break;
		case 'year':
			calendarType = CALENDAR_YEAR;
			break;
	}

	window.location.hash = type;
}

function switchItem(item, dir) {
	inAction = true;

	item.animate({ left: '+=' + 50 * dir, opacity: 0 }, function() {
		item.animate({ left: '+=' + 100 * (dir * -1) }, 0, function() {
			
			if(calendarType == CALENDAR_YEAR){
				item.html( currentYear );
			} else {
				item.html(months[currentMonth] + ' ' + currentYear);
			}
			item.animate({ left: '+=' + 50 * dir, opacity: 1 }, function() {
				inAction = false;
			});
		});
	});

	reloadCalendar(calendarType);
}

function reloadCalendar(calendarType) {
	month = currentMonth+1;
	if(calendarType == CALENDAR_YEAR){
		month = false;
	}
	jQuery.post(sendContactFormMessage.ajaxUrl, { action: 'get-events-data', year: currentYear, month: month, calendarType: calendarType }, function(json) {
		renderCalendar(json, calendarType);
	}, 'json');
	
}

function renderCalendar(events, calendarType) {
	bindMore(events);

	if (calendarType == CALENDAR_GRID) {
		drawGrid(events);
	} else {
		drawList(events);
	}
	updateScrollbar();
}

/**
 * Cell events 
 */
function bindMore(events) {
	jQuery(document).off('click', '.yocalendar-overlay');
	jQuery(document).off("click", "#yocalendar td");
	jQuery(document).off("click", ".yocalendar-overlay-close");
	jQuery(document).off("click", ".yocalendar-overlay .close-button");

	jQuery(document).on('click', '.yocalendar-overlay', function(e) {
		jQuery('.yocalendar-overlay').clearQueue();
		jQuery('.yocalendar-overlay').transition({opacity: 0, queue: true}, 600, function() {
			jQuery('.yocalendar-overlay section').attr('style', '');
			jQuery('.yocalendar-overlay').attr('style', '');
			var owl = jQuery(".yocalendar-carousel").data('owlCarousel');
			if(owl !== undefined) {
				owl.destroy();
				jQuery('.yocalendar-overlay').addClass('ready');
			}
		});
	});

	jQuery(document).on('click', '.yocalendar-overlay .item section > div, .yocalendar-overlay .owl-page, .yocalendar-overlay .owl-controls div', function(e) {
		e.stopPropagation();
	});

	jQuery(document).on('click', '#yocalendar td', function() {
		if(jQuery('.yocalendar-overlay').hasClass('ready')) {
			if(events[jQuery(this).data('month')]) {
				
				if(events[ jQuery(this).data('month') ][ jQuery(this).data('day') ]) {
					jQuery('.yocalendar-overlay').removeClass('ready');
					var postId = [];
					jQuery.each(events[ jQuery(this).data('month') ][ jQuery(this).data('day') ], function(i, e) {
						postId.push(e.postId);
					});
					
					jQuery.post(sendContactFormMessage.ajaxUrl, { action: 'get-single-event-data', id : postId }, function(response) {
						jQuery('.yocalendar-overlay .slidee').html(response);
						var owl = jQuery(".yocalendar-carousel").data('owlCarousel');

						if (owl == undefined || owl == null ) {
							jQuery('.yocalendar-overlay .yocalendar-carousel').owlCarousel({
								navigation : true, // Show next and prev buttons
								slideSpeed : 300,
								paginationSpeed : 400,
								singleItem : true,
								baseClass : "yocalendar-carousel",
								themeClass : "",
								navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
							});
						}

						jQuery('.yocalendar-overlay').clearQueue();
						jQuery('.yocalendar-overlay').show(0, function(){
							jQuery('.yocalendar-overlay').transition({opacity: 1}, 600, function() {
							});
						});
					}, 'html');
				}
			}
		}
	});
}

function scroll(dir, e, el) {
	e.preventDefault();
	if(isAnimating) return;

	var ul = jQuery(el).parent().find('.what-when');
	var currentScroll = parseInt(jQuery(ul).attr('data-scroll'), 10);
	var maxScroll = jQuery(ul).data('maxscroll');

	var nextScrollValue = 0;
	var animationString = '';

	if(dir == SCROLL_DIR_LEFT) {
		if(currentScroll > 0) {
			animationString = '+=200';
			nextScrollValue = currentScroll - 200;
		}
	} else {
		if(currentScroll < maxScroll) {
			animationString = '-=200';
			nextScrollValue = currentScroll + 200;
		}
	}

	if(animationString !== '') {
		isAnimating = true;
		jQuery(ul).animate({ left : animationString }, function() {
			isAnimating = false;
		});

		jQuery(ul).attr('data-scroll', nextScrollValue);

		if(jQuery(ul).attr('data-scroll') == 0) {
			jQuery(ul).closest('td').find('.slider-previous').addClass('event-prev-hidden');
			jQuery(ul).closest('td').find('.slider-next').removeClass('event-next-hidden');
		} else if(jQuery(ul).attr('data-scroll') == maxScroll) {
			jQuery(ul).closest('td').find('.slider-previous').removeClass('event-prev-hidden');
			jQuery(ul).closest('td').find('.slider-next').addClass('event-next-hidden');
		} else {
			jQuery(ul).closest('td').find('.slider-previous').removeClass('event-prev-hidden');
			jQuery(ul).closest('td').find('.slider-next').removeClass('event-next-hidden');
		}
	}
}

/**
* Draw calendar grid
*/
function drawGrid(events) {
	var d = new Date(currentYear, currentMonth, 1);
	var firstDay = d.getDay();

	firstDay = firstDay == 0 ? 6 : (firstDay - 1);

	var maxDay = calculateDaysInMonth(currentMonth, currentYear);
	var prevMax = calculateDaysInMonth(currentMonth-1, currentYear);

	var className = '';

	var day = 1;
	var currentDay = 1;
	var td = null;
	var nextMonth = false;
	var displayMonth = currentMonth;
	if(displayMonth == -1) displayMonth = 11;

	jQuery.each(table.find('tr'), function(i, v) {
		jQuery.each(jQuery(v).find('td span'), function(j, k) {
			td = jQuery(this).parent();
			td.attr('class', '');
			jQuery(this).find('i').remove();

			if (j == 0) {
				td.addClass('first');
			}

			if (j == 6) {
				td.addClass('last');
			}

			currentDay = day;
			currentDisplayMonth = displayMonth;

			jQuery(td).addClass('month'+currentMonth);
			jQuery(td).data('month',currentMonth);
			jQuery(td).data('day',currentDay);

			if(i == 1) {
				if(j >= firstDay) {
					displayMonth = currentMonth;
					jQuery(this).html(day);
					if(day <= maxDay) {
						day++;
					}
				} else {
					jQuery(td).data('month',currentMonth-1);
					displayMonth = currentMonth-1;
					jQuery(this).html(prevMax-(firstDay-j-1));
					currentDay = prevMax-(firstDay-j-1);
					jQuery(td).addClass('prev-month');
					jQuery(td).addClass('month'+(currentMonth-1));
					jQuery(td).removeClass('month'+(currentMonth));
					addEvent = false;
				}
			} else {
				jQuery(k).html(day);
				if(day <= maxDay) {
					displayMonth = currentMonth;
					day++;
				} else {
					day = 1;
					className = 'next-month';
				}
			}

			if (nextMonth) {
				jQuery(td).addClass('next-month');
				jQuery(td).addClass('month'+(currentMonth+1));
				jQuery(td).removeClass('month'+(currentMonth));
				jQuery(td).data('month',currentMonth+1)
				displayMonth = currentMonth+1;
			}

			if(className == 'next-month' || className == 'prev-month') {
				addEvent = false;
			}

			if (day > maxDay) {
				day = 1;
				displayMonth = currentMonth+1;
				if(displayMonth == 12) displayMonth = 0;
				className = 'next-month';
				nextMonth = true;
			}
			td.data('day',currentDay);
			td.html('<span class="day'+currentDay+'">'+jQuery(this).html()+'</span>');

		});
	});

	/* append events */
	jQuery.each(events, function(i, monthEvents){
		jQuery.each(monthEvents, function(j, dayEvents){

			var td = jQuery('.month'+i+' .day'+j).closest('td');
			var count = dayEvents.length;
			td.addClass('event-cell current-month');
			// Draw day
			td.html('<span data-count="'+count+'">' + j + '<i class="event-counter">'+count+'</i></span>');
		});
	});
	table.transition({opacity : 1});
	jQuery('.slider-previous').addClass('event-prev-hidden');
}

/**
* Draw list of events
*/
function drawList(events) {
	var dayEvents = '';
	var currentDay = 0;
	var listView = null;
	

	if (calendarType == CALENDAR_YEAR) {
		listView = jQuery('#yocalendar-year');
		currentEvents = events;
		
		if (currentEvents.length == 0) {
			listView.html('<div class="nodata-container aligncenter"><h3><i class="icon-remove-sign"></i>'+l10n['No event found']+'</h3><p class="nodata"><br/></div>');
			return;
		}

		jQuery.each(currentEvents, function(idx, val) {
			shownEvents = [];
			if(displayOptions.month_header_view == 'yes') {
				dayEvents += '<div class="row month-header"><div class="col-md-12"><h2>'+l10n['Events in month']+': '+l10n[monthId[idx]]+'</h2></div></div>';
				dayEvents += '<div class="row">';
			}

			jQuery.each(val, function(i, a) {
				dayEvents += drawListDay(i, a, currentDay);
			});

			eventCount = 0;
			if(displayOptions.month_header_view == 'yes') {
				dayEvents += '</div>';
			}
		});
	} else {
		listView = jQuery('#yocalendar-list');

		var currentEvents = events[currentMonth];
		if(!currentEvents) {
			listView.html('<div class="nodata-container aligncenter"><h3><i class="icon-remove-sign"></i> '+l10n['No event found']+'</h3><p class="nodata"><br/></div>');
			return;
		}

		var i = 1;
		
		dayEvents += '<div class="row">';
		jQuery.each(currentEvents, function(idx, val) {
			
			if (jQuery.inArray(val[0].postId, shownEvents) == -1) {
				dayEvents += drawListDay(idx, val, currentDay);
				shownEvents.push(val[0].postId);
			}

			i++;
		});
		dayEvents += '</div>';
	}
	if (calendarType == CALENDAR_YEAR) {
		if(displayOptions.month_header_view == 'yes') {
			listView.html('<div id="upcoming-events-list">'+dayEvents+'</div>');
		} else {
			listView.html('<div id="upcoming-events-list"><div class="row">'+dayEvents+'</div></div>');
		}
		
	} else {
		listView.html('<div id="upcoming-events-list">'+dayEvents+'</div>');
	}
	shownEvents = [];
	eventCount = 0;
	listView.transition({opacity : 1});
}

function drawListDay(idx, val, currentDay) {
	dayEvents = '';
	if (currentDay !== idx) {
		currentDay = idx;
	}

	jQuery.each(val, function(i, v) {
		var dateString = v.startDate;

		if(v.endDate !== '') {
			dateString += ' - '+v.endDate;
		}

		if (jQuery.inArray(v.postId, shownEvents) == -1) {

			if (eventCount !== 0 && ((eventCount % 2) == 0)) {
				dayEvents += '</div><div class="row">';
			}

			dayEvents += '<div class="col-md-6">'+
			'<div class="eventcalendar-header">'+
				'<a class="eventcalendar-event-photo pull-left hover-post" href="'+v.link+'"><figure><img src="'+v.img+'" alt="" width="100"/></figure></a>'+
				'<h1><a href="'+v.link+'">'+v.title+'</a></h1>'+
				'<h2>'+v.dateString+' <strong>'+v.timeString+'</strong></h2>'+
				'<h3><strong>'+v.venue+' </strong>'+v.location+'</h3>'+
				'<h4>'+v.price+'</h4>'+
			'</div></div>';
			shownEvents.push(v.postId);

			eventCount++;
		}
	});

	return dayEvents;
}

/**
*  Render social share buttons
*/
function renderSocialShare(title, link) {

	if (!shareOptions['facebook'] && !shareOptions['twitter'] && !shareOptions['google'] && !shareOptions['pintrest'] && !shareOptions['linkedin']) {
		return '';
	}

	var encodedURL = encodeURIComponent(link);
	title = encodeURIComponent(title);

	var click = "onclick=\"return !window.open(this.href, 'popup', 'width=640,height=600,top='+(window.outerHeight/2 - 150)+',left='+(window.outerWidth/2 - 320));return false;\"";
	var shareHTML = '';

	shareHTML += '<dl class="yocalendar-social-media">';

	if (shareOptions['facebook']) {
		shareHTML += '<dd><a '+click+' class="yocalendar-social-share share-facebook" href="http://www.facebook.com/sharer/sharer.php?u='+encodedURL+'"><i class="icon-facebook-sign"></i></a></dd>';
	}

	if (shareOptions['twitter']) {
		shareHTML += '<dd><a '+click+' class="yocalendar-social-share share-twitter" href="http://twitter.com/share?text='+title+'"><i class="icon-twitter-sign"></i></a></dd>';
	}

	if (shareOptions['google']) {
		shareHTML += '<dd><a '+click+' class="yocalendar-social-share share-google" href="https://m.google.com/app/plus/x/?v=compose&amp;content='+title+'"><i class="icon-google-plus-sign"></i></a></dd>';
	}

	if (shareOptions['pintrest']) {
		shareHTML += '<dd><a '+click+' class="yocalendar-social-share share-pinterest" href="https://pinterest.com/pin/create/button/?url='+encodedURL+'"><i class="icon-pinterest-sign"></i></a></dd>';
	}

	if (shareOptions['linkedin']) {
		shareHTML += '<dd><a '+click+' class="yocalendar-social-share share-linkedin" href="https://www.linkedin.com/cws/share?url='+encodedURL+'"><i class="icon-linkedin-sign"></i></a></dd>';
	}

	shareHTML += '</dl>';

	return shareHTML;
}

function ordinal(n) {
	var s = [ l10n["th"], l10n["st"], l10n["nd"], l10n["rd"] ], v = n % 100;
	return n + (s[ (v-20) % 10 ] || s[v] || s[0]);
}

/**
 * Return the number of days in requested month
 */

function calculateDaysInMonth(month, year) {
	var daysInMonth = (32 - new Date(year, month, 32).getDate());

	return daysInMonth;
}

function reloadCalendarOnMobile() {
	if (isMobile) {
		jQuery('#yocalendar-grid .event-info').html();
		
		jQuery('#yocalendar').on('touchend', 'td', function(e){
			e.preventDefault();
			e.stopPropagation();

			if(jQuery(this).find('.event-info').length >= 1) {
				type = 'list';
				setCalendarType(type);

				jQuery.each(calendarTypes, function(i,v){
					jQuery('#yocalendar-' + v).hide();
				});

				jQuery('#yocalendar-' + type).show();

				reloadCalendar(calendarType);
			}
		});
	}
}

function setupCalendar() {
	calendarTypes = [];
	table = jQuery('#upcoming-events');


	/* set calendar Types */
	var type = 'grid';
	jQuery.each(jQuery('#yocalendar-switcher a'), function(i,v) {
		calendarTypes.push(jQuery(v).data('type'));

		if (jQuery('#yocalendar-' + jQuery(v).data('type')).is(':visible')) {
			type = jQuery(v).data('type');
		}
	});

	/* hashtag */
	var windowType = window.location.hash;

	if (windowType !== '') {
		windowType = windowType.split('#')[1];
		setCalendarType(windowType);
		reloadCalendar(calendarType);
		
		jQuery.each(calendarTypes, function(i, v) {
			jQuery('#yocalendar-' + v).hide();
		});

		jQuery('#yocalendar-' + windowType).transition({opacity: 0}, 0).delay(300).show(0, function(){
			jQuery('#yocalendar-' + windowType).transition({ opacity : 1 });
		});
	} else {
		setCalendarType(type);
	}

	setHeader();

	jQuery.each(table.find('tr'), function(i, v) {
		jQuery.each(jQuery(v).find('td > span'), function(j, k) {
			var td = jQuery(this).parent();
			if (j == 0) {
				td.addClass('first');
			}
			if(j == 6) {
				td.addClass('last');
			}
		});
	});

	if (jQuery('#frame').sly) {
		jQuery('#frame').sly('reload');
	}
}

var CALENDAR_GRID = 0;
var CALENDAR_LIST = 1;
var CALENDAR_YEAR = 2;

var months = [l10n['January'], l10n['February'], l10n['March'], l10n['April'], l10n['May'], l10n['June'], l10n['July'], l10n['August'], l10n['September'], l10n['October'], l10n['November'], l10n['December']];
var prevMonth;
var prevYear;
var currentMonth;
var currentYear;
var inAction = false;
var calendarType = CALENDAR_GRID;
var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
var timeout;

var shownEvents = [];
var eventCount = 0;

/**
 * Cache the grid view
 */
var table = '';

var isAnimating = false;
var SCROLL_DIR_LEFT = 0;
var SCROLL_DIR_RIGHT = 1;

prevMonth = 12;
prevYear = new Date().getFullYear();

currentMonth = new Date().getMonth();
currentYear = new Date().getFullYear();

prevMonth = (currentMonth == 1) ? 12 : currentMonth - 1;

if (currentMonth == 1) {
	prevYear = currentYear-1;
}

var calendarTypes = [];

jQuery(document).ready(function() {
//	setupCalendar();

	jQuery(document).on('click', '.event-info .slider-previous', function(e) {
		scroll(SCROLL_DIR_LEFT, e, this);
	});

	jQuery(document).on('click', '.event-info .slider-next', function(e) {
		scroll(SCROLL_DIR_RIGHT, e, this);
	});

	/**
	 * Grid | List switcher
	 */
	jQuery(document).on('click', '.yocalendar-display', function(e) {
		
		e.preventDefault();
		var type = jQuery(this).data('type');
		jQuery.each(calendarTypes, function(i,v){
			jQuery('#yocalendar-' + v).transition({ opacity: 0}, function(){
				
			jQuery('#yocalendar-' + v).hide();
			});
		});
		
		jQuery('#yocalendar-' + type).transition({opacity : 0}, 0).show(0,function(){
			jQuery('#yocalendar-' + type).transition({ opacity : 1 }, 600);
		});
		
		setCalendarType(type);
		setHeader();
		reloadCalendar(calendarType);
	});

	jQuery(document).on('click', '.event-calendar-next', function(e) {
		e.preventDefault();

		if(calendarType == CALENDAR_YEAR) {
			prevYear = currentYear;
			currentYear++;
		} else {
			if (inAction) return;
			prevMonth = currentMonth;
			currentMonth++;

			if (currentMonth > 11) {
				currentMonth = 0;
				prevYear = currentYear;
				currentYear++;
			} else {
				prevYear = currentYear;
			}
		}
		switchItem(jQuery('#event-header'), -1);
	});

	jQuery(document).on('click', '.event-calendar-prev', function(e) {
		e.preventDefault();

		if (inAction) return;

		if(calendarType == CALENDAR_YEAR) {
			prevYear = currentYear;
			currentYear--;
		} else {
			prevMonth = currentMonth;
			currentMonth--;

			if (currentMonth < 0) {
				currentMonth = 11;
				prevYear = currentYear;
				currentYear--;
			} else {
				prevYear = currentYear;
			}
		}

		switchItem(jQuery('#event-header'), 1);
	});

});