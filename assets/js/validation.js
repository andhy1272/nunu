
/* Accordion */
$(document).ready( function() {

	$('.val-required').focusout(function() {
		elem = $(this).val();

		if($.trim(elem) == ""){
			$(this).val("");
			$(this).css('border-color', '#F00');
		}
		else {
			$(this).css('border-color', '');
		}
	});


	//$('.val-date-older').focusout(function() {
		//var d = new Date();
		//var elem = Date.parse($(this).val());

		//alert(d);
		//alert(elem);


	//});

});



