function resizeBackground() {

	var $image = $('img.imgBg');
	var image_width = $image.width();
	var image_height = $image.height();

	var over = image_width / image_height;
	var under = image_height / image_width;
	
	var body_width = $(window).width();
	var body_height = $(window).height();
	
	if (body_width / body_height >= over) {
	  $image.css({
	    'width': body_width + 'px',
	    'height': Math.ceil(under * body_width) + 'px',
	    'left': '0px',
	    'top': Math.abs((under * body_width) - body_height) / -2 + 'px'
	  });
	}

	else { 
	  $image.css({ 
	    'width': Math.ceil(over * body_height) + 'px',
	    'height': body_height + 'px',
	    'top': '0px',
	    'left': Math.abs((over * body_height) - body_width) / -2 + 'px'
	  });
	}
}

// Fonction d'animation du scroll
function smoothScroll(id) {
	if(id === "#") {
		return;
	}

	$('html, body').animate({
		scrollTop:$(id).offset().top
	}, 'slow');

	return false;
}

function stickyNav(winTop) {
	if(winTop > 200) {
    	$('#stickyNav').slideDown(500);
    } else if(winTop < 200) {
    	$('#stickyNav').slideUp(500);
    }
}

function showElements() {
	$('html').css('display', 'none');
	$('article').css('display', 'none');
	$('#sendMail').css('display', 'none');

	setTimeout(function() {
		$('html').fadeIn(2000);
	}, 500);

	setTimeout(function() {
		$('article').fadeIn(2000);
	}, 1000);

	setTimeout(function() {
		$('#sendMail').fadeIn(2000);
	}, 2000);

	setTimeout(function() {
		$('#sendMail').fadeOut(2000);
	}, 15000);
}

$(function() {

	// Au chargement initial   
    resizeBackground();
     
    // En cas de redimensionnement de la fenêtre
    $(window).resize(function(){ 
        resizeBackground(); 
    });
	
	// Animation du contenu
	showElements();

	// Animation du scroll
	$('a[href^="#"]').on('click', function() {
		var id = $(this).attr("href");
		smoothScroll(id); // Lance la fonction d'animation du scroll
	});

	// Apparition du header aprés le scroll
	$(window).scroll(function(){
    	var winTop = $(window).scrollTop();

    	stickyNav(winTop);
	});
});