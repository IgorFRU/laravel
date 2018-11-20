//$(document).ready(function() {
	var oldScroll = 0;
	var clickToSmall = false;
	var marginMainMenu = $('.mainmenu').css('margin-top');

	$('.fastmenu__tosmall').click(function() {
		if ($('.fastmenu').hasClass('active')) {
			clickToSmall = false;
			$('.mainmenu').css('margin-top', marginMainMenu);
		} else {
			clickToSmall = true;
			$('.mainmenu').css('margin-top', '45px');
		}
		$('.fastmenu').toggleClass('active');
		$('.fastmenu__tosmall').toggleClass('active');
		$('.fastmenu__tosmall > span').toggleClass('active');
		$('.logo').toggleClass('hide');
		
	});

	
		
	
	$(window).scroll(function() {
		if (!clickToSmall) {
			if($(window).scrollTop() > oldScroll + 50) {
				oldScroll = $(window).scrollTop();
				$('.fastmenu').addClass('active');		
				$('.fastmenu__tosmall > span').addClass('active');
                $('.fastmenu__tosmall').addClass('active');
				$('.logo').addClass('hide');
			};

			if(($(window).scrollTop() < oldScroll - 300) || ($(window).scrollTop() < 100)) {
				oldScroll = $(window).scrollTop();
				$('.fastmenu').removeClass('active');
				$('.fastmenu__tosmall > span').removeClass('active');
                $('.fastmenu__tosmall').removeClass('active');
				$('.logo').removeClass('hide');
			}
		}	
	});

	
//});