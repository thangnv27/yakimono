var ready = false;
var clicked = false;
var input = false;
var picker = false;
var closeElement = false;

jQuery(document).ready(function() {
	if (ready === false) {
		jQuery(document).on( "click", ".icon-close", function(e) {
			jQuery('.icon-set').toggle();
			jQuery('.icon-close').toggle();
		});

		jQuery(document).on( "click", "#dish-cat-icon-new", function(e) {
			e.preventDefault();

			clicked = jQuery(this);
			input = jQuery(this).next();
			picker = jQuery(this).parent().parent().next().find('.icon-set');
			picker.toggle();
			closeElement = jQuery(this).parent().parent().next().find('.icon-close');
			closeElement.toggle();
		});

		jQuery(document).on( "click", ".icon-picker i", function() {
			var activeIcon = jQuery(this).attr('class');

			if (activeIcon == 'no-icon') {
				jQuery("#restaurant-block-icon").attr('class', '');
				clicked.attr('class', activeIcon);
				clicked.html('empty');
			} else {
				clicked.attr('class', activeIcon);
				clicked.html('');
			}

			input.val(activeIcon);
			picker.toggle();
			closeElement.toggle();
		});

		ready = true;
	}
});