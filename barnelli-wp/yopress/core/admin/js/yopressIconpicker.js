jQuery(document).ready(function($) {
   $(".yopress-admin-icon-active").on("click", function() {
		$(this).next(".yopress-admin-icon-container").toggle();
	});

	$(".yopress-admin-icon-container i").on("click", function() {
		var activeIcon = $(this).parent().prev('.yopress-admin-icon-active').find('i');
		activeIcon.attr('class', $(this).data('icon') + ' icon-2x');
		activeIcon.next().val($(this).data('icon'));
		$(this).parent().toggle();
	});
});