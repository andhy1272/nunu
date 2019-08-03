
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


});



