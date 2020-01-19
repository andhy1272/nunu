
/* Accordion */
$(document).ready( function() {

	$('.required').focusout(function() {
		alert ($(this).val());
		$(this).css('border-color', '#F00');
	});



});



