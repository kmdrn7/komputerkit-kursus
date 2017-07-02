$(document).ready(function() {

    $('select').material_select();

    $('.scrollspy--tugas').scrollSpy({
        'scrollOffset': 0,
    });

	$('.button-collapse').sideNav({
		menuWidth: 300, // Default is 300
		edge: 'left', // Choose the horizontal origin
		closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		draggable: true // Choose whether you can drag to open on touch screens
	});

	// $(document).on('click', 'a[href^="#"]', function(e) {
	//     // target element id
	// 	if ( $(this).hasClass('mtbs') ) {
	// 		return false;
	// 	}
	//
	//     var id = $(this).attr('href');
	//
	//     // target element
	//     var $id = $(id);
	//     if ($id.length === 0) {
	//         return;
	//     }
	//
	//     // prevent standard hash navigation (avoid blinking in IE)
	//     e.preventDefault();
	//
	//     // top position relative to the document
	//     var pos = $id.offset().top;
	//
	//     // animated top scrolling
	//     $('body, html').animate({
	//         scrollTop: pos
	//     });
	// });
});

// $(".button-collapse").sideNav();

// $('select').material_select('destroy');
