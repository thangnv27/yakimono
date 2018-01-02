jQuery('document').ready(function($) {
	'use strict';

	$(document).on("submit", "#commentform", function(e) {
		$('#buttonform').attr('disabled', 'disabled');

		var commentform = $(this);
		commentform.prepend('<div id="comment-status"></div>');
		
		var statusdiv = $('#comment-status');

		var formdata = commentform.serialize();
		statusdiv.html('<p>Processing...</p>');
		var formurl = commentform.attr('action');

		$.ajax({
			dataType: 'json',
			type: 'post',
			url: formurl,
			data: formdata,
			statusCode: {
				500: function() {
					statusdiv.replaceWith('<p class="wdpajax-error">'+blogCommentsValidationError+'</p>');
					setTimeout(function () {
						$('#buttonform').removeAttr('disabled');
					}, 2000);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				statusdiv.html('<p class="wdpajax-error">'+blogCommentsValidationError+'</p>');
				setTimeout(function () {
					$('#buttonform').removeAttr('disabled');
				}, 2000);
			},
			success: function(data, textStatus) {
				if (data.status == 'success') {
					if ($('.no-comments-so-far').length) {
						$('.no-comments-so-far').before('<section id="comments"><ul class="comments animate_element animate_content">'+data.contents+'</ul></section>');
					} else {
						if (data.parentId) {
							$('#comment-'+data.parentId).after('<ul class="children">'+data.contents+'</ul>');
						} else {
							$('ul.comments').append(data.contents);
						}
					}
					$('ul.comments').append(data.contents);
					statusdiv.replaceWith('<p class="ajax-success">'+blogCommentsValidationSuccess+'</p>');
				} else {
					$('ul.comments').append(data.contents);
					statusdiv.replaceWith('<p class="ajax-error">'+blogCommentsValidationError+'</p>');
				}

				commentform.find('textarea[name=comment]').val('');
				setTimeout(function () {
					statusdiv.replaceWith('');
					$('#buttonform').removeAttr('disabled');
				}, 2000);
			}
		});

		return false;
	});
});