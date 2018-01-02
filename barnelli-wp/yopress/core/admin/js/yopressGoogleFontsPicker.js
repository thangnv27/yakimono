jQuery.noConflict();

jQuery(document).ready(function($) {
	function Barnelli_googleFontSelect(slctr, mainID) {

		var _selected = $(slctr).val();
		var _linkclass = 'style_link_' + mainID;
		var _previewer = mainID + '_ggf_previewer';

		if(_selected) {

			$('.' + _previewer).fadeIn();
			if (_selected !== 'none' && _selected !== 'Select a font' ) {
				$('.' + _linkclass).remove();
				var the_font = _selected.replace(/\s+/g, '+');
				$('head').append('<link href="http://fonts.googleapis.com/css?family=' + the_font + '" rel="stylesheet" type="text/css" class="' + _linkclass + '">');
				$('.' + _previewer).css('font-family', _selected + ', sans-serif');
			} else {
				$('.' + _previewer).css('font-family', '');
				$('.' + _previewer).fadeOut();
			}
		}
	}
	
	//init for each element
	jQuery('.google_font_select').each(function() {
		var mainID = jQuery(this).data('id');
		Barnelli_googleFontSelect(this, mainID);
	});
	
	//init when value is changed
	jQuery('.google_font_select').change(function() {
		var mainID = jQuery(this).data('id');
		Barnelli_googleFontSelect(this, mainID);
	});
});
