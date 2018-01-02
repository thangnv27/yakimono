$ = jQuery.noConflict();

$(document).ready(function(){

	$('.playlist li').on('click', function(){
		$(this).closest('ul').find('.active').removeClass('active');
		$(this).addClass('active');
		var href = $(this).find('.set-name').attr('data-href');
		$('#media-player').attr('src', href);
	});

});