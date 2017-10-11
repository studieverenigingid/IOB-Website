function menuToggler () {

	var menuToggle = $('.js-menu-toggle'),
		menu = $('.primary-menu');

	menuToggle.click(function () {
		menu.toggleClass('opened');
		menuToggle.toggleClass('opened');
	});

}

function menuSticky() {
	var menu = $('.primary-menu');
	var biesImage = $('.bies__image');
	var posFromTop = menu.offset().top

	$(window).scroll(function() {
		var scroll = $(window).scrollTop();

		if (scroll > posFromTop) {
	    menu.addClass("primary-menu--sticky");
			biesImage.addClass("bies__image--sticky");
	  } else {
			menu.removeClass("primary-menu--sticky");
			biesImage.removeClass("bies__image--sticky");
	  }
	});

}
