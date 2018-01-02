$j = jQuery;
$j(document).ready(function(){
	$j('#yopress-saved').show().delay(1000).animate({opacity : 0}, 500, function() {
		$j(this).remove();
	});
});