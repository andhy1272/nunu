
/* Accordion */
$(document).ready( function() {

	$('.accordion .tab-title').click(function() {
		index = $(this).attr('data-index');

		$('.accordion .tab-content.' + index).slideToggle("slow");
		
		/*
		$('.accordion .tab-content').slideUp("normal", function() {
			$('.accordion .tab-content.' + index).addClass('open').slideDown("slow");
		});
		*/
		
		
	});

	
	$('.count-chars').keyup(function() {
		_charLimit = parseInt($(this).attr('maxlength'));
		_charCount = _charLimit - $(this).val().length;

		$(this).parent().find('.char-counter').html(_charCount);
	}); 


});



/* onkeyup="countChars(this,255)"
function countChars(_element, _limit){
	elem_name = _element.getAttribute('name');
	alert(elem_name);
	alert(_element.value.length);

	var x = document.getElementsByTagName("H1")[0].getAttribute("class");
} */
