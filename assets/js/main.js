
/* Accordion */
$(document).ready( function() {

	//
	$('.accordion .tab-title').click(function() {
		index = $(this).attr('data-index');

		$('.accordion .tab-content.' + index).slideToggle("slow");
		
		/*
		$('.accordion .tab-content').slideUp("normal", function() {
			$('.accordion .tab-content.' + index).addClass('open').slideDown("slow");
		});
		*/
	});


	$('.grid-list tr.click-view td.click-view-control').click(function() {
		//click event of <a> cant be triggered - BUG?
		$(this).parent().find('td a.view-link span').trigger("click");
	});





	
	$('.count-chars').keyup(function() {
		_charLimit = parseInt($(this).attr('maxlength'));
		_charCount = _charLimit - $(this).val().length;

		$(this).parent().find('.char-counter').html(_charCount);
	}); 



	$('.tabs-container .tab-tiles li:first-child').addClass('active');
	$('.tabs-container .tab-contents > div:first-child').addClass('active');

	$('.tabs-container .tab-tiles li').click(function () {
		_index = $(this).attr('data-index');

		$('.tabs-container .tab-tiles li').removeClass('active');
		$('.tabs-container .tab-contents > div').removeClass('active');

		$(this).addClass('active');
		$('.tabs-container .tab-contents > div[data-index=' + _index + ']').addClass('active');
	});

});




/* onkeyup="countChars(this,255)"
function countChars(_element, _limit){
	elem_name = _element.getAttribute('name');
	alert(elem_name);
	alert(_element.value.length);

	var x = document.getElementsByTagName("H1")[0].getAttribute("class");
} */
